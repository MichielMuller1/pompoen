#define CurrentSensorPin  A2
#define CurrentSensorPin1  A3

#include <WiFi.h>
#include <Arduino_JSON.h>

//wifi esp
#ifdef ESP32
#include <WiFi.h>
#include <HTTPClient.h>
#else
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>
#endif

String apiKeyValue = "tPmAT5Ab3j7F9";

//relay

//vat1
const int relay = 27;
int statevat1 = HIGH;

//vat1 wateren
const int relay1 = 12;
int statevat1w = HIGH;

//vat2
const int relay2 = 15;
int statevat2 = HIGH;

//vat2 wateren
const int relay3 = 33;
int statevat2w = HIGH;



#define VREF 5000 // ADC's reference voltage on your Arduino,typical value:5000mV

unsigned int voltage; //unit:mV
float current;  //unit:mA
unsigned int voltage1; //unit:mV
float current1;  //unit:mA

//instellen data ophalen
const char* ssid     = "Neerzijde 16_IoT";
const char* password = "E4u6c1blockx";
const char* serverName1 = "http://192.168.0.5/post-esp-data-druk.php";
const char* serverName = "http://192.168.0.5/esp-data-get.php";

unsigned long lastTime = 0;
// Timer set to 10 minutes (600000)
//unsigned long timerDelay = 600000;
// Set timer to 5 seconds (5000)
unsigned long timerDelay = 5000;
String sensorReadings;
String sensorReadingsArr[50];

void setup()
{
  Serial.begin(115200);
    pinMode(relay, OUTPUT);
  pinMode(relay1, OUTPUT);
  pinMode(relay2, OUTPUT);
  pinMode(relay3, OUTPUT);
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

void loop()
{

 if (WiFi.status() == WL_CONNECTED) {
    WiFiClient client;
    HTTPClient http;

    // Your Domain name with URL path or IP address with path
    http.begin(client, serverName1);

        // Your Domain name with URL path or IP address with path
        http.begin(client, serverName);
        voltage = analogRead(CurrentSensorPin) / 1024.0 * VREF;
        Serial.print("voltage:");
        Serial.print(voltage);
        Serial.print("mV  ");
        current = voltage / 120.0; //Sense Resistor:120ohm
        Serial.print("current:");
        Serial.print(current);
        Serial.println("mA");
        voltage1 = analogRead(CurrentSensorPin1) / 1024.0 * VREF;
        Serial.print("voltage1:");
        Serial.print(voltage1);
        Serial.print("mV  ");
        current1 = voltage1 / 120.0; //Sense Resistor:120ohm
        Serial.print("current1:");
        Serial.print(current1);
        Serial.println("mA");
        http.addHeader("Content-Type", "application/x-www-form-urlencoded");
        String httpRequestData = "api_key=" + apiKeyValue + "&vat1=" + voltage
                                 + "&vat2=" + voltage1 + "";
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
      
      delay(1000);
 }



  
  //relay
  if ((millis() - lastTime) > timerDelay) {
    //Check WiFi connection status
    if (WiFi.status() == WL_CONNECTED) {

      sensorReadings = httpGETRequest(serverName);
      Serial.println(sensorReadings);
      JSONVar myObject = JSON.parse(sensorReadings);

      // JSON.typeof(jsonVar) can be used to get the type of the var
      if (JSON.typeof(myObject) == "undefined") {
        Serial.println("Parsing input failed!");
        return;
      }

      Serial.print("JSON object = ");
      Serial.println(myObject);

      // myObject.keys() can be used to get an array of all the keys in the object
      JSONVar keys = myObject.keys();

      for (int i = 0; i < keys.length(); i++) {
        JSONVar value = myObject[keys[i]];
        String jsonString = JSON.stringify(value);
        Serial.print(keys[i]);
        Serial.print(" = ");
        Serial.println(value);
        sensorReadingsArr[i] = value;
      }

      int mini1 = sensorReadingsArr[36].toInt();
      int maxi1 = sensorReadingsArr[37].toInt();
      int mini2 = sensorReadingsArr[38].toInt();
      int maxi2 = sensorReadingsArr[39].toInt();

      Serial.println("tijd" + sensorReadingsArr[0]);
      //vat1 bijvullen
      if (sensorReadingsArr[7] == "1" && mini1 >= sensorReadingsArr[]) {
        Serial.println("vat1 bijvullen automatisch");
        digitalWrite(relay, LOW);
      }
      else {
        digitalWrite(relay, HIGH);
      }

      //vat2 bijvullen
      if (sensorReadingsArr[9] == "1" && mini2 >= sensorReadingsArr[]) {
        Serial.println("vat2 bijvullen automatisch");
        digitalWrite(relay2, LOW);
      }
      else {
        digitalWrite(relay2, HIGH);
      }




            //vat1 wateren
      if (sensorReadingsArr[8] == "1") {
        Serial.println("vat1 wateren");
        digitalWrite(relay1, LOW);
      }
      else {
        digitalWrite(relay1, HIGH);
      }

            //vat2 wateren
      if (sensorReadingsArr[10] == "1") {
        Serial.println("vat1 wateren");
        digitalWrite(relay3, LOW);
      }
      else {
        digitalWrite(relay3, HIGH);
      }
      

    }
  }
}

String httpGETRequest(const char* serverName) {
  WiFiClient client;
  HTTPClient http;
    
  // Your Domain name with URL path or IP address with path
  http.begin(client, serverName);
  
  // Send HTTP POST request
  int httpResponseCode = http.GET();
  
  String payload = "{}"; 
  
  if (httpResponseCode>0) {
    Serial.print("HTTP Response code: ");
    Serial.println(httpResponseCode);
    payload = http.getString();
  }
  else {
    Serial.print("Error code: ");
    Serial.println(httpResponseCode);
  }
  // Free resources
  http.end();

  return payload;
}

     
      



  
