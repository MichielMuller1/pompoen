#ifdef ESP32
#include <WiFi.h>
#include <HTTPClient.h>
#else
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>
#endif

#include <SPI.h>
#include <Wire.h>

const int AirValue = 2950;
const int WaterValue = 1375;
const int SensorPin = 34;
const int SensorPin1 = 36;
const int SensorPin2 = 33;
const int SensorPin3 = 32;

int soilMoistureValue1 = 0;
int soilMoistureValue2 = 0;
int soilMoistureValue3 = 0;
int soilMoistureValue4 = 0;
int soilmoisturepercent = 0;
int gemiddelde = 0;

const char* ssid     = "Neerzijde 16_IoT";
const char* password = "E4u6c1blockx";

const char* serverName = "http://192.168.0.5/post-esp-data.php";

String apiKeyValue = "tPmAT5Ab3j7F9";


uint32_t delayMS;

void setup() {
  Serial.begin(9600);
  WiFi.begin(ssid, password);
  Serial.println("Connecting");
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.print("Connected to WiFi network with IP Address: ");
  Serial.println(WiFi.localIP());


}

void loop() {
  // Delay between measurements

  delay(delayMS);
  // Get temperature event and print its value.


  if (WiFi.status() == WL_CONNECTED) {
    WiFiClient client;
    HTTPClient http;

    // Your Domain name with URL path or IP address with path
    http.begin(client, serverName);

    soilMoistureValue1 = analogRead(SensorPin);  //put Sensor insert into soil
    Serial.println(soilMoistureValue1);
    soilMoistureValue2 = analogRead(SensorPin1);  //put Sensor insert into soil
    Serial.println(soilMoistureValue2);
    soilMoistureValue3 = analogRead(SensorPin2);  //put Sensor insert into soil
    Serial.println(soilMoistureValue3);
    soilMoistureValue4 = analogRead(SensorPin3);  //put Sensor insert into soil
    Serial.println(soilMoistureValue4);
    gemiddelde = (soilMoistureValue1 + soilMoistureValue2 + soilMoistureValue3 + soilMoistureValue4) / 4;
    soilmoisturepercent = map(gemiddelde, AirValue, WaterValue, 0, 100);
    int gemgem = 0;
    if (soilmoisturepercent > 100)
    {
      gemgem = 100;
    }
    else if (soilmoisturepercent < 0)
    {
      gemgem = 0;
    }
    else if (soilmoisturepercent >= 0 && soilmoisturepercent <= 100)
    {
      gemgem = soilmoisturepercent;

    }


    http.addHeader("Content-Type", "application/x-www-form-urlencoded");
    String httpRequestData = "api_key=" + apiKeyValue + "&laag2=" + gemgem + "";
    Serial.print("httpRequestData: ");
    Serial.println(httpRequestData);

    int httpResponseCode = http.POST(httpRequestData);

    if (httpResponseCode > 0) {
      Serial.print("HTTP Response code: ");
      Serial.println(httpResponseCode);
    }
    else {
      Serial.print("Error code: ");
      Serial.println(httpResponseCode);
    }
    // Free resources
    http.end();
  }
  delay(1000);

}
