from time import sleep
import requests
import json
from datetime import datetime, timedelta
import pytz
import mysql.connector
from mysql.connector import errorcode


######variablen######
isWarmerGeweest = False
alreadySendStart = False
alreadySendStop = False
alreadyGotWeatherPrediction = False
databaseTemp = 0
databaseMinuten = 0


####functies#######
def getTreshold():
    try:
        cnx = mysql.connector.connect(user='pi', password='raspberry',
                                    host='localhost',
                                    database='pompoen')
    except mysql.connector.Error as err:
        if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
            print("Something is wrong with your user name or password")
        elif err.errno == errorcode.ER_BAD_DB_ERROR:
            print("Database does not exist")
        else:
            print(err)
    else:
        cursor = cnx.cursor()

        query = ("SELECT apiTemperatuur, apiMinuten FROM threshold")
        cursor.execute(query)
        
        for (apiTemperatuur, apiMinuten) in cursor:
            print(apiTemperatuur,apiMinuten)
            databaseTemp = apiTemperatuur
            databaseMinuten = apiMinuten
        
        cnx.close()
    return databaseTemp,databaseMinuten


def getWeatherPrediction():
    api_key = "74761ab81d590f5158485fd887b5e435"
    lat = "51.243276"
    lon = "4.995369"
    exclude = "current,daily,minutely"
    url = "https://api.openweathermap.org/data/2.5/onecall?lat=%s&lon=%s&exclude=%s&appid=%s&units=metric" % (lat, lon, exclude,api_key)
    response = requests.get(url)
    data = response.json()

    with open('data.json','w') as f:
        json.dump(data,f)

def getstartAndEndHour(minTemperatuur,periode):
    global isWarmerGeweest
    startUur = 0
    eindUur = 0
    with open('data.json') as file:
        data = json.load(file)
        hourly = data["hourly"]
        hoursFromNow = 0
        for entry in hourly:
            dt = datetime.fromtimestamp(entry["dt"], pytz.timezone('Europe/Brussels'))
            temp = entry["temp"]
            print("in: ",hoursFromNow," the temperature will be",temp)
            if temp > minTemperatuur and not isWarmerGeweest:
                isWarmerGeweest = True
                print(hoursFromNow)
                startUur = datetime.now() + timedelta(hours=hoursFromNow)
                startUur = startUur - timedelta(minutes=periode)
            if temp < minTemperatuur and isWarmerGeweest:
                isWarmerGeweest = False
                print(hoursFromNow)
                eindUur = datetime.now() + timedelta(hours=hoursFromNow)
                break
            hoursFromNow+=1
        hoursFromNow = 0
        print(startUur, eindUur)
    return startUur,eindUur

def apiToDatabase(aanOfAf):
    try:
        cnx = mysql.connector.connect(user='pi', password='raspberry',
                                    host='localhost',
                                    database='pompoen')
    except mysql.connector.Error as err:
        if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
            print("Something is wrong with your user name or password")
        elif err.errno == errorcode.ER_BAD_DB_ERROR:
            print("Database does not exist")
        else:
            print(err)
    else:
        cursor = cnx.cursor()

        query = ("UPDATE `weersvoorspelling` SET `tijd` = `"+ str(datetime.now()) +"`,` weersvoorspelling` =`"+ str(aanOfAf)+"`, WHERE `id` = `1`;")
        cursor.execute(query)
        
        cnx.close()


#####code#####
while True:
    newDatabaseTemp,newDatabaseMinute = getTreshold()
    if databaseTemp!=newDatabaseTemp or databaseMinuten!=newDatabaseMinute:#als de waardes uit de database verandert zijn opnieuw het start en einduur bepalen
        databaseTemp = newDatabaseTemp
        databaseMinuten = newDatabaseMinute
        startUur,eindUur = getstartAndEndHour(databaseTemp,databaseMinuten)


    if datetime.now().hour == 3 and not alreadyGotWeatherPrediction:#om 3 uur 's nachts de weersvoorspelling opvragen
        databaseTemp, databaseMinuten = getTreshold()
        getWeatherPrediction()
        startUur,eindUur = getstartAndEndHour(databaseTemp,databaseMinuten)
        alreadyGotWeatherPrediction = True
    if datetime.now().hour == 4:
        alreadyGotWeatherPrediction = False

    if startUur.hour == datetime.now().hour and startUur.minute == datetime.now().minute and not alreadySendStart:
        apiToDatabase(1)
        alreadySendStart = True
        alreadySendStop = False
    if eindUur.hour == datetime.now().hour and startUur.minute == datetime.now().minute and not alreadySendStop:
        apiToDatabase(0)
        alreadySendStart = False
        alreadySendStop = True

    sleep(20)









