import argparse
import boto3
import time
import os
import pymysql

db = pymysql.connect(host='asst.c5iupdmpxqlq.us-east-1.rds.amazonaws.com',user='admin',password='deep_blue',database='asst')
cursor = db.cursor()

#get args
parser = argparse.ArgumentParser(description='Take the profile image and add to collection.')
parser.add_argument('--collection', help='Collection Name', default='asst-faces')
parser.add_argument('--name', help='Face Name') # name in db
args = parser.parse_args()

dirname = os.path.dirname(__file__)
#directory = os.path.join(dirname, 'images')
image = os.path.join(dirname, 'images/BhaveshBhatia.jpg') # change the name of file


#initialize reckognition sdk
client = boto3.client('rekognition')
with open(image, mode='rb') as file:
	response = client.index_faces(Image={'Bytes': file.read()}, CollectionId=args.collection, ExternalImageId=args.name, DetectionAttributes=['ALL'])
print (response)
face_id = response['FaceRecords'][0]['Face']['FaceId']
ext_id = response['FaceRecords'][0]['Face']['ExternalImageId'] # the external image id should be same as his name in the db.

sql = '''update visitor_regulars
        set qr_id = face_id
        where name = ext_id;'''

cursor.execute(sql)
db.commit()
print(cursor.fetchall())
