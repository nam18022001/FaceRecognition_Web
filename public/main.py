import cv2
import numpy as np
import face_recognition
import os
import sys
import webbrowser
import mysql.connector
from datetime import datetime
from threading import Timer


mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="",
  database="face_recognition_web"
)

idLichHoc = sys.argv[1]
tenBang = sys.argv[2]
arr = []

mycursor = mydb.cursor()
mycursor.execute("SELECT * FROM lichhoc WHERE id="+idLichHoc)
myresult = mycursor.fetchall()
for x in myresult:
    arr.append(x[5])
    
def exitfunc():
    print ("Exit Time"), datetime.now()
    webbrowser.open_new('http://localhost:8000/diemdanh/dssv/'+sys.argv[1])
    os._exit(0)
    
Timer(60, exitfunc).start()

idCamera = 1
path=arr[0]
images = []
className = []
myList = os.listdir(path)

for cls in myList:
    curImg = cv2.imread(f'{path}/{cls}')
    images.append(curImg)
    className.append(os.path.splitext(cls)[0])   

    
def findEncoding(images):
    encodeList = []
    for img in images:
        img = cv2.cvtColor(img, cv2.COLOR_RGB2BGR)
        encode = face_recognition.face_encodings(img)[0]
        encodeList.append(encode)
    return encodeList

def markAttendance(name):
    findSV = mydb.cursor()
    findSV.execute("UPDATE "+tenBang+" SET diemdanh='1', thoigiandiemdanh='"+str(datetime.now().strftime("%d/%m/%Y Lúc %H:%M"))+"' WHERE MaSV='"+name+"'")
    mydb.commit()


encodeListKnown = findEncoding(images)

cap = cv2.VideoCapture(0)

while True:
    success, img = cap.read()
    imgS = cv2.resize(img, (0,0), None, 0.25, 0.25)
    imgS = cv2.cvtColor(imgS, cv2.COLOR_RGB2BGR)

    facesCurFrame = face_recognition.face_locations(imgS)
    encodesCurFrame = face_recognition.face_encodings(imgS, facesCurFrame)

    for encodeFace, faceLoc in zip(encodesCurFrame, facesCurFrame):
        matches = face_recognition.compare_faces(encodeListKnown, encodeFace)
        faceDis = face_recognition.face_distance(encodeListKnown, encodeFace)
        
        matchIndex = np.argmin(faceDis)

        if matches[matchIndex]:
            name = className[matchIndex].upper()
            y1,x2,y2,x1 = faceLoc
            y1,x2,y2,x1 = y1*4, x2*4, y2*4, x1*4
            cv2.rectangle(img, (x1,y1), (x2,y2),(0,255,0) , 2)
            cv2.rectangle(img, (x1, y2-35), (x2,y2) , (0,255,0),cv2.FILLED)
            cv2.putText(img, name, (x1+6, y2-6), cv2.FONT_HERSHEY_COMPLEX, 1, (255,0,255), 2)
            markAttendance(name)
        else:
            name = "unknown"
            y1,x2,y2,x1 = faceLoc
            y1,x2,y2,x1 = y1*4, x2*4, y2*4, x1*4
            cv2.rectangle(img, (x1,y1), (x2,y2),(0,255,0) , 2)
            cv2.rectangle(img, (x1, y2-35), (x2,y2) , (0,255,0),cv2.FILLED)
            cv2.putText(img, name, (x1+6, y2-6), cv2.FONT_HERSHEY_COMPLEX, 1, (0,0,255), 2)
    cv2.imshow("Diem danh "+sys.argv[2], img)
    cv2.waitKey(1)         