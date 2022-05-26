#include <WiFi.h>
#include <HTTPClient.h>
#include <Arduino_JSON.h>

const char* ssid     = "pompoen";
const char* password = "IoTpompoen";
String stringOne = "1";
const char* serverName = "http://192.168.137.253/esp-data-get.php";

// the following variables are unsigned longs because the time, measured in
// milliseconds, will quickly become a bigger number than can be stored in an int.
unsigned long lastTime = 0;
// Timer set to 10 minutes (600000)
//unsigned long timerDelay = 600000;
// Set timer to 5 seconds (5000)
unsigned long timerDelay = 5000;

String sensorReadings;
String sensorReadingsArr[50];

void setup() {
  Serial.begin(115200);
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

      Serial.println("tijd" + sensorReadingsArr[0]);
      //ventilator1
      if (sensorReadingsArr[7] == "1"){
        Serial.println("ventilator1 automatisch");
      }
      else{
        Serial.println("ventilator1 control");
      }
      
      //ventilator2
      if (sensorReadingsArr[8] == "1"){
        Serial.println("ventilator2 automatisch");
      }
      else{
        Serial.println("ventilator2 control");
      }

      //raam1
      if (sensorReadingsArr[9] == "1"){
        Serial.println("raam1 automatisch");
      }
      else{
        Serial.println("raam1 control");
      }
      
      //raam2
      if (sensorReadingsArr[10] == "1"){
        Serial.println("raam2 automatisch");
      }
      else{
        Serial.println("raam2 control");
      }

      //raam1
      if (sensorReadingsArr[11] == "1"){
        Serial.println("deur1 automatisch");
      }
      else{
        Serial.println("deur1 control");
      }
      
      //raam2
      if (sensorReadingsArr[12] == "1"){
        Serial.println("deur2 automatisch");
      }
      else{
        Serial.println("deur2 control");
      }

      //vat1
      if (sensorReadingsArr[13] == "1"){
        Serial.println("vat1 automatisch");
      }
      else{
        Serial.println("vat1 control");
      }
      
      //vat2
      if (sensorReadingsArr[14] == "1"){
        Serial.println("vat2 automatisch");
      }
      else{
        Serial.println("vat2 control");
      }

      //vat3
      if (sensorReadingsArr[15] == "1"){
        Serial.println("vat3 automatisch");
      }
      else{
        Serial.println("vat3 control");
      }

      //licht
      if (sensorReadingsArr[16] == "1"){
        Serial.println("licht automatisch");
      }
      else{
        Serial.println("licht control");
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
