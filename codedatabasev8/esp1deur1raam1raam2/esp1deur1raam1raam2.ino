#include <WiFi.h>
#include <HTTPClient.h>
#include <Arduino_JSON.h>

//ventilator1
const int relay6 = 5;
const int relay7 = 32;
int stateventaanA = LOW;
int stateventuitA = LOW;
int stateventaan = LOW;
int stateventuit = LOW;

//raam1
const int relay = 23;
const int relay1 = 22;
int stateraamopenA = LOW;
int stateraamtoeA = LOW;
int stateraamopen = LOW;
int stateraamtoe = LOW;

//raam2
const int relay2 = 21;
const int relay3 = 19;
int stateraamopen2A = LOW;
int stateraamtoe2A = LOW;
int stateraamopen2 = LOW;
int stateraamtoe2 = LOW;

//deur1
const int relay4 = 18;
const int relay5 = 36;
int statedeuropen = LOW;
int statedeurtoe = LOW;
int statedeuropen2 = LOW;
int statedeurtoe2 = LOW;


const char* ssid     = "Neerzijde 16_IoT";
const char* password = "E4u6c1blockx";

const char* serverName = "http://192.168.0.5/esp-data-get.php";

// the following variables are unsigned longs because the time, measured in
// milliseconds, will quickly become a bigger number than can be stored in an int.
unsigned long lastTime = 0;
// Timer set to 10 minutes (600000)
//unsigned long timerDelay = 600000;
// Set timer to 5 seconds (5000)
unsigned long timerDelay = 5000;

String sensorReadings;
String sensorReadingsArr[100];

void setup() {
  Serial.begin(115200);
  pinMode(relay, OUTPUT);
  pinMode(relay1, OUTPUT);
  pinMode(relay2, OUTPUT);
  pinMode(relay3, OUTPUT);
  pinMode(relay4, OUTPUT);
  pinMode(relay5, OUTPUT);
  pinMode(13, OUTPUT); 
  WiFi.begin(ssid, password);
  Serial.println("Connecting");
  while(WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.print("Connected to WiFi network with IP Address: ");
  Serial.println(WiFi.localIP());
 
  Serial.println("Timer set to 5 seconds (timerDelay variable), it will take 5 seconds before publishing the first reading.");
}

void loop() {
  //Send an HTTP POST request every 10 minutes
  if ((millis() - lastTime) > timerDelay) {
    //Check WiFi connection status
    if(WiFi.status()== WL_CONNECTED){
              
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

      int temptot = (sensorReadingsArr[29].toInt() + sensorReadingsArr[33].toInt())/2;

      Serial.println("tijd" + sensorReadingsArr[0]);
      //
      if (sensorReadingsArr[14] == "1"){
        Serial.println("ventilator automatisch");
        if (temptot >= sensorReadingsArr[37].toInt() && stateventaanA == LOW){
          digitalWrite(relay6, HIGH);
          delay(5000);
          digitalWrite(relay6, LOW);
          Serial.println("ventilator 1 aan");
          stateventaanA = HIGH;
          stateventuitA = LOW;
        }
        else if (temptot <= sensorReadingsArr[37].toInt() && stateventuitA == LOW){
           digitalWrite(relay7, HIGH);
           delay(5000);
           digitalWrite(relay7, LOW);
           Serial.println("ventilator 1 uit");
           stateventuitA = HIGH;
           stateventaanA = LOW;
        }
      }
      else{
          if ( sensorReadingsArr[1] == "1" && stateventaan == LOW){
          digitalWrite(relay6, HIGH);
          delay(5000);
          digitalWrite(relay6, LOW);
          Serial.println("ventilator 1 aan");
          stateventaan = HIGH;
          stateventuit = LOW;
        }
        else if (sensorReadingsArr[1] == "0" && stateventuit == LOW){
           digitalWrite(relay7, HIGH);
           delay(5000);
           digitalWrite(relay7, LOW);
           Serial.println("ventilator 1 uit");
           stateventuit = HIGH;
           stateventaan = LOW;
        }
      }
      

      //raam1
      if (sensorReadingsArr[16] == "1"){
        Serial.println("raam1 automatisch");
        if (temptot >= sensorReadingsArr[39].toInt() && stateraamopenA == LOW){
          digitalWrite(relay, HIGH);
          delay(5000);
          digitalWrite(relay, LOW);
          Serial.println("raam1 omhoog");
          stateraamopenA = HIGH;
          stateraamtoeA = LOW;
        }
        else if (temptot <= sensorReadingsArr[39].toInt() &&stateraamtoeA == LOW){
           digitalWrite(relay1, HIGH);
           delay(5000);
           digitalWrite(relay1, LOW);
           Serial.println("raam1 omlaag");
           stateraamtoeA = HIGH;
           stateraamopenA = LOW;
        }
      }
      else{
        if ( sensorReadingsArr[3] == "1" && stateraamopen == LOW){
          digitalWrite(relay, HIGH);
          delay(5000);
          digitalWrite(relay, LOW);
          Serial.println("raam1 omhoog");
          stateraamopen = HIGH;
          stateraamtoe = LOW;
        }
        else if (sensorReadingsArr[3] == "0" && stateraamtoe == LOW){
           digitalWrite(relay1, HIGH);
           delay(5000);
           digitalWrite(relay1, LOW);
           Serial.println("raam1 omlaag");
           stateraamtoe = HIGH;
           stateraamopen = LOW;
        }
      }
      
      
      //raam2
      if (sensorReadingsArr[17] == "1"){
        Serial.println("raam2 automatisch");
        if (temptot >= sensorReadingsArr[40].toInt() && stateraamopen2A == LOW){
          digitalWrite(relay2, HIGH);
          delay(5000);
          digitalWrite(relay2, LOW);
          Serial.println("raam2 omhoog");
          stateraamopen2A = HIGH;
          stateraamtoe2A = LOW;
        }
        else if (temptot <= sensorReadingsArr[40].toInt() && stateraamtoe2A == LOW){
           digitalWrite(relay3, HIGH);
           delay(5000);
           digitalWrite(relay3, LOW);
           Serial.println("raam2 omlaag");
           stateraamtoe2A = HIGH;
           stateraamopen2A = LOW;
        }
      }
      else{
        if ( sensorReadingsArr[4] == "1" && stateraamopen2 == LOW){
          digitalWrite(relay2, HIGH);
          delay(5000);
          digitalWrite(relay2, LOW);
          Serial.println("raam2 omhoog");
          stateraamopen2 = HIGH;
          stateraamtoe2 = LOW;
        }
        else if (sensorReadingsArr[4] == "0" && stateraamtoe2 == LOW){
           digitalWrite(relay3, HIGH);
           delay(5000);
           digitalWrite(relay3, LOW);
           Serial.println("raam2 omlaag");
           stateraamtoe2 = HIGH;
           stateraamopen2 = LOW;
        }
   
      }




      //deur1
      if (sensorReadingsArr[18] == "1"){
       Serial.println("deur1 automatisch");
        if (temptot >= sensorReadingsArr[41].toInt() && statedeuropen == LOW){
          digitalWrite(relay4, HIGH);
          delay(5000);
          digitalWrite(relay4, LOW);
          Serial.println("deur1 omhoog");
          statedeuropen = HIGH;
          statedeurtoe = LOW;
        }
        else if (temptot <= sensorReadingsArr[41].toInt() && statedeurtoe == LOW){
           digitalWrite(relay5, HIGH);
           delay(5000);
           digitalWrite(relay5, LOW);
           Serial.println("deur1 omlaag");
           statedeurtoe = HIGH;
           statedeuropen = LOW;
        }
      }
      else{
        if ( sensorReadingsArr[5] == "1" && statedeuropen2 == LOW){
          digitalWrite(relay4, HIGH);
          delay(5000);
          digitalWrite(relay4, LOW);
          Serial.println("deur omhoog");
          statedeuropen2 = HIGH;
          statedeurtoe2 = LOW;
        }
        else if (sensorReadingsArr[5] == "0" && statedeurtoe2 == LOW){
           digitalWrite(relay5, HIGH);
           delay(5000);
           digitalWrite(relay5, LOW);
           Serial.println("deur omlaag");
           statedeurtoe2 = HIGH;
           statedeuropen2 = LOW;
        }
   
      }

      
      
    }
    else {
      Serial.println("WiFi Disconnected");
    }
    lastTime = millis();
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
