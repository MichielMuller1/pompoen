#include <SPI.h>
#include <Wire.h>
#include <Adafruit_GFX.h>




const int AirValue = 2950;
const int WaterValue = 1375;
const int SensorPin = A1;
const int SensorPin1 = A2;
const int SensorPin2 = A3;
const int SensorPin3 = 15;

int soilMoistureValue1 = 0;
int soilMoistureValue2 = 0;
int soilMoistureValue3 = 0;
int soilMoistureValue4 = 0;
int soilmoisturepercent = 0;
int gemiddelde = 0;


void setup() {
  Serial.begin(115200); // open serial port, set the baud rate to 9600 bps


}


void loop()
{
  soilMoistureValue1 = analogRead(SensorPin);  //put Sensor insert into soil
  delay (10);
 

  soilMoistureValue2 = analogRead(SensorPin1);  //put Sensor insert into soil


  soilMoistureValue3 = analogRead(SensorPin2);  //put Sensor insert into soil
 
  soilMoistureValue4 = analogRead(SensorPin3);  //put Sensor insert into soil
  
  gemiddelde = (soilMoistureValue1 + soilMoistureValue2 + soilMoistureValue3 + soilMoistureValue4) / 4;
  soilmoisturepercent = map(gemiddelde, AirValue, WaterValue, 0, 100);
  if (soilmoisturepercent > 100)
  { Serial.print("gem: ");
    Serial.println("100 %");

  }
  else if (soilmoisturepercent < 0)
  { Serial.print("gem: ");
    Serial.println("0 %");
  }
  else if (soilmoisturepercent >= 0 && soilmoisturepercent <= 100)
  { Serial.print("gem: ");
    Serial.print(soilmoisturepercent);
    Serial.println("%");
  }

}
