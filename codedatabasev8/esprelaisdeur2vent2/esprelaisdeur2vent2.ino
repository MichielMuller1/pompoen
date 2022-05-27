#include <WiFi.h>
#include <HTTPClient.h>
#include <Arduino_JSON.h>

const int relay = 18;
const int relay1 = 33;
int statedeuropenA = LOW;
int statedeurtoeA = LOW;
int statedeuropen = LOW;
int statedeurtoe = LOW;

const int relay2 = 21;



//const char* ssid     = "Neerzijde 16_IoT";
//const char* password = "E4u6c1blockx";

const char* ssid     = "telenet-A646FD4";
const char* password = "cdedjzam7uXd";



const char* serverName = "http://192.168.0.5/esp-data-getv8.php";

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
      Serial.print("temperatuur totaal: ");
      Serial.println(temptot);
      Serial.println("tijd" + sensorReadingsArr[0]);
      //ventilator1
      if (sensorReadingsArr[19] == "1"){
        Serial.println("deur automatisch");
        Serial.println(sensorReadingsArr[42].toInt());
      if (temptot >= sensorReadingsArr[42].toInt() && statedeuropenA == LOW){
          digitalWrite(relay, HIGH);
          delay(5000);
          digitalWrite(relay, LOW);
          Serial.println("deur open");
          statedeuropenA = HIGH;
          statedeurtoeA = LOW;
      }
           else if (temptot <= sensorReadingsArr[42].toInt() && statedeurtoeA == LOW){
           digitalWrite(relay1, HIGH);
           delay(5000);
           digitalWrite(relay1, LOW);
           Serial.println("deur toe");
           statedeurtoeA = HIGH;
           statedeuropenA = LOW;
        }
      }
      else{
          if (sensorReadingsArr[6] == "1" && statedeuropen == LOW){
          digitalWrite(relay, HIGH);
          delay(5000);
          digitalWrite(relay, LOW);
          Serial.println("deuropen");
          statedeuropen = HIGH;
          statedeurtoe = LOW;
        }
        else if (sensorReadingsArr[6] == "0" && statedeurtoe == LOW){
           digitalWrite(relay1, HIGH);
           delay(5000);
           digitalWrite(relay1, LOW);
           Serial.println("deurtoe");
           statedeurtoe = HIGH;
           statedeuropen = LOW;
        }
      }
      

      //ventilator
      if (sensorReadingsArr[15] == "1" && temptot >= sensorReadingsArr[38].toInt()){
        Serial.println("ventilator aan automode");
        digitalWrite(relay2, HIGH);
      }
      else if(sensorReadingsArr[2] == "1"){
        Serial.println("ventilator aan controlmode");
        digitalWrite(relay2, HIGH);
      }
      else{
        Serial.println("ventilator uit");
        digitalWrite(relay2, LOW);
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
