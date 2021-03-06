#define CurrentSensorPin  36
#define CurrentSensorPin1  39

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


const int relay = 33;
int statevat1 = LOW;
//vat1 wateren
const int relay1 = 18;
int statevat1w = LOW;
//vat2
const int relay2 = 21;
int statevat2 = LOW;
//vat2 wateren
const int relay3 = 32;
int statevat2w = LOW;

int state = LOW;
int state1 = LOW;


#define VREF 5000 // ADC's reference voltage on your Arduino,typical value:5000mV

unsigned int voltage; //unit:mV
float current;  //unit:mA
unsigned int voltage1; //unit:mV
float current1;  //unit:mA

//instellen data ophalen
const char* ssid     = "Neerzijde 16_IoT";
const char* password = "E4u6c1blockx";


const char* serverName1 = "http://192.168.0.5/post-esp-data-druk.php";
const char* serverName = "http://192.168.0.5/esp-data-getv8.php";

unsigned long lastTime = 0;
// Timer set to 10 minutes (600000)
//unsigned long timerDelay = 600000;
// Set timer to 5 seconds (5000)
unsigned long timerDelay = 5000;
String sensorReadings;
String sensorReadingsArr[100];

void setup()
{
  Serial.begin(115200);
  pinMode(relay, OUTPUT);
  pinMode(relay1, OUTPUT);
  pinMode(relay2, OUTPUT);
  pinMode(relay3, OUTPUT);
  digitalWrite(relay, LOW);
  digitalWrite(relay1, LOW);
  digitalWrite(relay2, LOW);
  digitalWrite(relay3, LOW);

  pinMode(CurrentSensorPin, INPUT);
  pinMode(CurrentSensorPin1, INPUT);

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
    http.begin(client, serverName1);
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

    //vat3 code
    //voltage2 = analogRead(CurrentSensorPin2) / 1024.0 * VREF;
    //Serial.print("voltage2:");
    //Serial.print(voltage2);
    //Serial.print("mV  ");
    //current2 = voltage2 / 120.0; //Sense Resistor:120ohm
    //Serial.print("current2:");
    //Serial.print(current2);
    //Serial.println("mA");
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");
    String httpRequestData = "api_key=" + apiKeyValue + "&vat1=" + voltage
                             + "&vat2=" + voltage1 + "&vat3=" + "" + "";
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

    delay(5000);
  } else {
    Serial.println("Reconnecting");
    WiFi.reconnect();
    while (WiFi.status() != WL_CONNECTED) {
      delay(500);
      Serial.print(".");
    }
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

      int mini1 = sensorReadingsArr[43].toInt();
      Serial.println(sensorReadingsArr[43]);
      int maxi1 = sensorReadingsArr[44].toInt();
      Serial.println(sensorReadingsArr[44]);
      int mini2 = sensorReadingsArr[45].toInt();
      Serial.println(sensorReadingsArr[45]);
      int maxi2 = sensorReadingsArr[46].toInt();
      Serial.println(sensorReadingsArr[46]);
      int mini3 = sensorReadingsArr[47].toInt();
      Serial.println(sensorReadingsArr[47]);
      int maxi3 = sensorReadingsArr[48].toInt();
      Serial.println(sensorReadingsArr[48]);

      int mini11 = mini1 + 100;
      int maxi11 = maxi1 - 100;
      int mini22 = mini2 + 100;
      int maxi22 = maxi2 - 100;
      int mini33 = mini3 + 100;
      int maxi33 = maxi3 - 100;

      Serial.println("tijd" + sensorReadingsArr[0]);
      //vat1 bijvullen
      Serial.println("vat1 uitlezen");
      Serial.println(mini11);
      Serial.println(sensorReadingsArr[55].toInt());
      Serial.println(maxi11);




      if (mini11 + 400 >= sensorReadingsArr[55].toInt()) {
        Serial.println("vat1 bijvullen automatisch");
        digitalWrite(relay, HIGH);

      }
      else if (maxi11 - 400 >= sensorReadingsArr[55].toInt()) {
        Serial.println("vat1 niet bijvullen");
        digitalWrite(relay, LOW);

      }
      else {
        Serial.println("vat1 niet bijvullen");
        digitalWrite(relay, LOW);
      }

      //vat2 bijvullen
      Serial.println("vat2 uitlezen");
      Serial.println(mini22);
      Serial.println(sensorReadingsArr[56].toInt());
      Serial.println(maxi22);



      if (mini22 + 400 >= sensorReadingsArr[56].toInt()) {
        Serial.println("vat2 bijvullen automatisch");
        digitalWrite(relay2, HIGH);

      }
      else if (maxi22 - 400 >= sensorReadingsArr[56].toInt()) {
        Serial.println("vat2 niet bijvullen");
        digitalWrite(relay2, LOW);

      }
      else {
        Serial.println("vat2 niet bijvullen");
        digitalWrite(relay2, LOW);
      }

      /*
           //vat3 bijvullen
           if (maxi33 <= sensorReadingsArr[57].toInt() && mini33 >= sensorReadingsArr[57].toInt()) {
             Serial.println("vat3 bijvullen automatisch");
             digitalWrite(relay3, HIGH);
           }
           else {
             digitalWrite(relay3, LOW);
           }
      */




      //vat1 wateren
      if (sensorReadingsArr[8] == "1" && mini11 <= sensorReadingsArr[55].toInt()) {
        Serial.println("vat1 wateren");
        digitalWrite(relay1, HIGH);
      }
      else if (sensorReadingsArr[20] == "1" && mini11 <= sensorReadingsArr[55].toInt()) {
        Serial.println("vat1 wateren");
        digitalWrite(relay1, HIGH);
      }
      else {
        Serial.println("vat1 GEEN wateren");
        digitalWrite(relay1, LOW);
      }

      //vat2 wateren
      if (sensorReadingsArr[10] == "1" && mini22 <= sensorReadingsArr[56].toInt()) {
        Serial.println("vat2 wateren");
        digitalWrite(relay3, HIGH);
      }
      else if (sensorReadingsArr[21] == "1" && mini22 <= sensorReadingsArr[56].toInt()) {
        Serial.println("vat2 wateren");
        digitalWrite(relay3, HIGH);
      }
      else {
        Serial.println("vat2 GEEN wateren");
        digitalWrite(relay3, LOW);
      }

      //vat3 wateren
      //if (sensorReadingsArr[12] == "1") {
      // Serial.println("vat1 wateren");
      //digitalWrite(relay3, HIGH);
      //}
      //      else if(sensorReadingsArr[22] == "1"){
      //  Serial.println("vat1 wateren");
      //  digitalWrite(relay1, HIGH);
      //}


      //else {
      //Serial.println("vat3 GEEN wateren");
      //digitalWrite(relay3, LOW);
      //}



    } else {
      Serial.println("Reconnecting");
      WiFi.reconnect();
      while (WiFi.status() != WL_CONNECTED) {
        delay(500);
        Serial.print(".");
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

  if (httpResponseCode > 0) {
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
