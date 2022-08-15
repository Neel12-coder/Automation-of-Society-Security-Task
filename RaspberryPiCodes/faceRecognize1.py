from picamera import PiCamera
import RPi.GPIO as gpio
import cv2 as cv
import argparse
import boto3
import time
import os

from smbus2 import SMBus
from mlx90614 import MLX90614

import pymysql

# aws rds url
db = pymysql.connect(host='asst.c5iupdmpxqlq.us-east-1.rds.amazonaws.com',user='admin',password='deep_blue',database='asst')
cursor = db.cursor()

# set up for blinking led light Green-> all fine, Red-> temperature is more or person unrecognized.
led_green = 23 #GPIO pin 23 = board pin 16
led_red = 17 #GPIO pin 17 = board pin 11
gpio.setmode(gpio.BCM)
gpio.setup(led_green, gpio.OUT)
gpio.setup(led_red, gpio.OUT)

def recognizeFace(client,image,collection):
	face_matched = False
	with open(image, 'rb') as file:
		response = client.search_faces_by_image(CollectionId=collection, Image={'Bytes': file.read()}, MaxFaces=1, FaceMatchThreshold=85)
		if(not response['FaceMatches']):
			face_matched = False
		else:
			face_matched = True
	return face_matched, response

def detectFace(frame,face_cascade):	
	face_detected = False
	#Detect faces
	faces = face_cascade.detectMultiScale(frame,
		scaleFactor=1.1,
		minNeighbors=5,
		minSize=(30, 30),
		flags = cv.CASCADE_SCALE_IMAGE)
	print("Found {0} faces!".format(len(faces)))
	timestr = time.strftime("%Y%m%d-%H%M%S")
	image = '{0}/image_{1}.png'.format(directory, timestr)
	if len(faces) > 0 :
		face_detected = True
		cv.imwrite(image,frame) 
		print('Your image was saved to %s' % image)

	return face_detected, image

def main():	

	#get args
	parser = argparse.ArgumentParser(description='Facial recognition')
	parser.add_argument('--collection', help='Collection Name', default='asst-faces')
	parser.add_argument('--face_cascade', help='Path to face cascade.', default='Cascades/haarcascade_frontalface_default.xml')
	parser.add_argument('--camera', help='Camera device number.', type=int, default=0)
	args = parser.parse_args()

	#intialize opencv face detection
	face_cascade_name = args.face_cascade
	face_cascade = cv.CascadeClassifier()
	#Load the cascades
	if not face_cascade.load(cv.samples.findFile(face_cascade_name)):
		print('--(!)Error loading face cascade')
		exit(0)

	camera_device = args.camera

	#Read the video stream
	cam = cv.VideoCapture(camera_device)
	#setting the buffer size and frames per second, to reduce frames in buffer
	cam.set(cv.CAP_PROP_BUFFERSIZE, 1)
	cam.set(cv.CAP_PROP_FPS, 2);

	if not cam.isOpened:
		print('--(!)Error opening video capture')
		exit(0)

	#initialize reckognition sdk
	client = boto3.client('rekognition')

	while True:
		frame = {}
		#calling read() twice as a workaround to clear the buffer.
		cam.read()
		cam.read()
		ret, frame = cam.read()		
		if frame is None:
			print('--(!) No captured frame -- Break!')
			break

		face_detected, image = detectFace(frame,face_cascade)

		if (face_detected):
			face_matched, response = recognizeFace(client, image , args.collection)
			bus = SMBus(1)
			sensor = MLX90614(bus, address=0x5A)
			temp = sensor.get_object_1()
			temp = round(temp,4)
			if (face_matched):
				print ('Identity matched %s with %r confidence.' % (response['FaceMatches'][0]['Face']['ExternalImageId'], round(response['FaceMatches'][0]['Face']['Confidence'], 2)))
				#print ('Identity matched %s with %r similarity and %r confidence...' % (response['FaceMatches'][0]['Face']['ExternalImageId'], round(response['FaceMatches'][0]['Similarity'], 1), round(response['FaceMatches'][0]['Face']['Confidence'], 2)))
				#espeak.synth('Hello %s! What is my purpose?' % (response['FaceMatches'][0]['Face']['ExternalImageId']))
				print ('Hello %s! ' % (response['FaceMatches'][0]['Face']['ExternalImageId']))
				qrId = response['FaceMatches'][0]['Face']['FaceId']
				print('QR id is %s ' % (qrId))
				
				print ("Your body temperature is:", temp)
				bus.close()
				if (temp > 29.7):
					gpio.output(led_red, gpio.HIGH)
					time.sleep(30)
					gpio.output(led_red,gpio.LOW)
					cursor.execute("INSERT INTO regular_visitor_logs (qr_id,temperature) VALUES (%s, %s)", (qrId, temp))
					
					db.commit()
					print('Added to the database')
                    
				else: # temp is below threshold
					gpio.output(led_green, gpio.HIGH)
					time.sleep(20)
					gpio.output(led_green,gpio.LOW)
					
					cursor.execute("INSERT INTO regular_visitor_logs (qr_id,temperature,entry_allowed) VALUES (%s, %s, %s)", (qrId, temp, '1'))
					
					db.commit()
					print('Added to the database')
                    
			else:
				print ('Unknown Human Detected!')
				# store irregular visitor data in the db.
				print ("Your body temperature is:", temp)
				gpio.output(led_red, gpio.HIGH)
				time.sleep(30)
				gpio.output(led_red,gpio.LOW)
				cursor.execute("INSERT INTO irregular_visitor_logs (temperature) VALUES (%s)", (temp))
					
				db.commit()
				print('Temp added to the database')
			time.sleep(60) # wait for 1 min before starting detection from live feed.

		if cv.waitKey(20) & 0xFF == ord('q'):
			break

	# When everything done, release the capture
	cam.release()
	cv.destroyAllWindows()

dirname = os.path.dirname(__file__)
directory = os.path.join(dirname, 'faces')
main()
