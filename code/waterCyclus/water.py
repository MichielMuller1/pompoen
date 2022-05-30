from time import sleep
from datetime import datetime, timedelta
import mysql.connector
from mysql.connector import errorcode

def get_cyclusFromDatabase():
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
        query = ("SELECT cyclus1A, cyclus12A,cyclus13A,cyclus2A,cyclus22A,cyclus23A FROM automatisch")
        cursor.execute(query)
        for (cyclus1A, cyclus12A,cyclus13A,cyclus2A,cyclus22A,cyclus23A) in cursor:
                print(cyclus1A, cyclus12A,cyclus13A,cyclus2A,cyclus22A,cyclus23A)
                return cyclus1A,cyclus12A,cyclus13A,cyclus2A,cyclus22A,cyclus23A

def get_vatStatusFromDatabase():
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
        query = ("SELECT vat1A,vat2A,vat3A FROM automatisch")
        cursor.execute(query)
        for (vat1A,vat2A,vat3A) in cursor:
                print(vat1A,vat2A,vat3A)
                return vat1A,vat2A,vat3A

def get_cyclusstartFromDatabase():
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
    cursor = cnx.cursor()
    query = ("SELECT cyclus1Astart, cyclus12Astart,cyclus13Astart,cyclus2Astart,cyclus22Astart,cyclus23Astart FROM automatisch")
    cursor.execute(query)
    for(cyclus1Astart, cyclus12Astart,cyclus13Astart,cyclus2Astart,cyclus22Astart,cyclus23Astart) in cursor:
        print(cyclus1Astart, cyclus12Astart,cyclus13Astart,cyclus2Astart,cyclus22Astart,cyclus23Astart)
        return cyclus1Astart,cyclus12Astart,cyclus13Astart,cyclus2Astart,cyclus22Astart,cyclus23Astart

def get_tijdenFromDatabase():
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
    cursor = cnx.cursor()
    query = ("SELECT tijdvat1A,tijdvat2A,tijdvat3A FROM automatisch")
    cursor.execute(query)
    for(tijdvat1A,tijdvat2A,tijdvat3A) in cursor:
        print(tijdvat1A,tijdvat2A,tijdvat3A)
        return tijdvat1A,tijdvat2A,tijdvat3A

def time_check(cyclus,starttijd,vat,minutenLatenLopen, vatStatus):   
    starttijdSeconden = starttijd.total_seconds()
    print("starttijdSeconden", starttijdSeconden)
    minuten = starttijdSeconden/60
    uren = (starttijdSeconden/60)/60
    uren = int(uren//1)
    print(minuten)
    while minuten-60 >60:
        #print(minuten)
        minuten = minuten-60
    minuten = minuten-60
    minuten = int(minuten)
    print("start",minuten,uren)

    secondenLatenLopen = minutenLatenLopen*60
    
    eindtijdSeconden = starttijdSeconden+secondenLatenLopen
    minutenEindtijd = eindtijdSeconden/60
    urenEindtijd = (eindtijdSeconden/60)/60
    urenEindtijd = int(urenEindtijd//1)
    print(minutenEindtijd)
    while minutenEindtijd-60 >60:
        #print(minuten)
        minutenEindtijd = minutenEindtijd-60
    minutenEindtijd = minutenEindtijd-60
    minutenEindtijd = int(minutenEindtijd)
    print("einde",minutenEindtijd,urenEindtijd)


    if not cyclus:
        change_database(0,vat,'automatisch') 
    else:
        if cyclus and uren == datetime.now().hour and minuten==datetime.now().minute:#als de cyclus mag gaan en het uur is de starttijd een 1 in de database zetten
            if not vatStatus:
                change_database(1,vat,'automatisch') 
                print("aan")
        if cyclus and urenEindtijd==datetime.now().hour and minutenEindtijd==datetime.now().minute:#als de cyclus nog aangevinkt staat en de tijd is op een 0 in de database zetten
            if vatStatus:
                change_database(0,vat,'automatisch')
                print("uit")

        

def change_database(value,kolom,tabel):
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
    cursor = cnx.cursor()
    query = "update "+str(tabel)+" set "+str(kolom)+" = "+str(value)+" where ID=1"
    print(query)
    cursor.execute(query)
    cnx.commit()




print(datetime.now())
while True:
    cyclus1A, cyclus12A,cyclus13A,cyclus2A,cyclus22A,cyclus23A = get_cyclusFromDatabase()
    cyclus1Astart,cyclus12Astart,cyclus13Astart,cyclus2Astart,cyclus22Astart,cyclus23Astart = get_cyclusstartFromDatabase()
    tijdvat1A,tijdvat2A,tijdvat3A = get_tijdenFromDatabase()
    vat1A,vat2A,vat3A = get_vatStatusFromDatabase()
    time_check(cyclus1A,cyclus1Astart,'vat1A',tijdvat1A,vat1A)
    time_check(cyclus12A,cyclus12Astart,'vat1A',tijdvat1A,vat1A)
    time_check(cyclus13A,cyclus13Astart,'vat1A',tijdvat1A,vat1A)
    time_check(cyclus2A,cyclus2Astart,'vat2A',tijdvat2A,vat2A)
    time_check(cyclus22A,cyclus22Astart,'vat2A',tijdvat2A,vat2A)
    time_check(cyclus23A,cyclus23Astart,'vat2A',tijdvat2A,vat2A)
    sleep(5)
