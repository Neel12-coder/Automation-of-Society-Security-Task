import pymysql
db = pymysql.connect(host='asst.c5iupdmpxqlq.us-east-1.rds.amazonaws.com',user='admin',password='deep_blue',database='asst')
cursor = db.cursor()
print(cursor)
print(cursor.execute("select version()"))
data = cursor.fetchone()
print(data)
sql = '''desc members'''
'''sql = insert into visitor_regulars (qr_id) values
        ('af73d52d-f661-48e9-93be-f038fbcc8b37')'''

'''sql = update visitor_regulars
        set qr_id = 'af73d52d-f661-48e9-93be-f038fbcc8b37'
        where visitor_regular_id = 'V0003';'''
cursor.execute(sql)
#db.commit()
print(cursor.fetchall())
