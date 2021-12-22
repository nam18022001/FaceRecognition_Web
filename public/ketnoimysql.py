import mysql.connector
import sys
import webbrowser

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="",
  database="face_recognition_web"
)
# webbrowser.open_new("http://google.com/search?q="+sys.argv[1]+"--"+sys.argv[2])
arr = []
mycursor = mydb.cursor()
mycursor.execute("SELECT * FROM lichhoc WHERE id="+sys.argv[1])
myresult = mycursor.fetchall()
for x in myresult:
    arr.append(x[5])
    # webbrowser.open_new("http://google.com/search?q="+arr[0])

findSV = mydb.cursor()
findSV.execute("UPDATE "+sys.argv[2]+" SET diemdanh='1' WHERE MaSV='19IT123'")
mydb.commit()

    
