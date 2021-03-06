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

#include <Adafruit_Sensor.h>
#include <DHT.h>
#include <DHT_U.h>

#define DHTPIN 5    // Digital pin connected to the DHT sensor 

// Feather HUZZAH ESP8266 note,




//: use pins 3, 4, 5, 12, 13 or 14 --
// Pin 15 can work but DHT must be disconnected during program upload.

// Uncomment the type of sensor in use:
//#define DHTTYPE    DHT11     // DHT 11
#define DHTTYPE    DHT22     // DHT 22 (AM2302)
//#define DHTTYPE    DHT21     // DHT 21 (AM2301)

// See guide for details on sensor wiring and usage:
//   https://learn.adafruit.com/dht/overview

DHT_Unified dht(DHTPIN, DHTTYPE);


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


  // Initialize device.
  dht.begin();

  Serial.println(F("DHTxx Unified Sensor Example"));
  // Print temperature sensor details.
  sensor_t sensor;
  dht.temperature().getSensor(&sensor);

  Serial.println(F("------------------------------------"));
  Serial.println(F("Temperature Sensor"));
  Serial.print  (F("Sensor Type: ")); Serial.println(sensor.name);
  Serial.print  (F("Driver Ver:  ")); Serial.println(sensor.version);
  Serial.print  (F("Unique ID:   ")); Serial.println(sensor.sensor_id);
  Serial.print  (F("Max Value:   ")); Serial.print(sensor.max_value); Serial.println(F("??C"));
  Serial.print  (F("Min Value:   ")); Serial.print(sensor.min_value); Serial.println(F("??C"));
  Serial.print  (F("Resolution:  ")); Serial.print(sensor.resolution); Serial.println(F("??C"));
  Serial.println(F("------------------------------------"));
  // Print humidity sensor details.
  dht.humidity().getSensor(&sensor);

  Serial.println(F("Humidity Sensor"));
  Serial.print  (F("Sensor Type: ")); Serial.println(sensor.name);
  Serial.print  (F("Driver Ver:  ")); Serial.println(sensor.version);
  Serial.print  (F("Unique ID:   ")); Serial.println(sensor.sensor_id);
  Serial.print  (F("Max Value:   ")); Serial.print(sensor.max_value); Serial.println(F("%"));
  Serial.print  (F("Min Value:   ")); Serial.print(sensor.min_value); Serial.println(F("%"));
  Serial.print  (F("Resolution:  ")); Serial.print(sensor.resolution); Serial.println(F("%"));
  Serial.println(F("------------------------------------"));
  // Set delay between sensor readings based on sensor details.
  delayMS = sensor.min_delay / 1000;
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

    sensors_event_t event;
    dht.temperature().getEvent(&event);
    int temp1 = event.temperature;
    Serial.println(temp1);
    dht.humidity().getEvent(&event);
    int hum1 = event.relative_humidity;
    Serial.println(hum1);


    soilMoistureValue1 = analogRead(SensorPin);  //put Sensor insert into soil
    Serial.println(soilMoistureValue1);
    soilMoistureValue2 = analogRead(SensorPin1);  //put Sensor insert into soil
    Serial.println(soilMoistureValue2);
    soilMoistureValue3 = analogRead(SensorPin2);  //put Sensor insert into soil
    Serial.println(soilMoistureValue2);
    soilMoistureValue4 = analogRead(SensorPin3);  //put Sensor insert into soil
    Serial.println(soilMoistureValue2);
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
    String httpRequestData = "api_key=" + apiKeyValue + "&temp=" + temp1
                             + "&hum=" + hum1 + "&laag1=" + gemgem + "";
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
