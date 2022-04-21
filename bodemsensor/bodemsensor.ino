#include <SPI.h>
#include <Wire.h>
#include <Adafruit_GFX.h>

 

 
const int AirValue = 3568;   
const int WaterValue = 1300;  
const int SensorPin = 15;
int soilMoistureValue = 0;
int soilmoisturepercent=0;
 
 
void setup() {
  Serial.begin(115200); // open serial port, set the baud rate to 9600 bps
 
  
}
 
 
void loop() 
{
soilMoistureValue = analogRead(SensorPin);  //put Sensor insert into soil
Serial.println(soilMoistureValue);
soilmoisturepercent = map(soilMoistureValue, AirValue, WaterValue, 0, 100);
if(soilmoisturepercent > 100)
{
  Serial.println("100 %");
  
}}
