/*********
  Rui Santos
  Complete project details at https://RandomNerdTutorials.com/esp32-relay-module-ac-web-server/
  
  The above copyright notice and this permission notice shall be included in all
  copies or substantial portions of the Software.
*********/

const int relay = 23;
const int relay1 = 22;
const int relay3 = 4;
const int relay2= 2;


void setup() {
  Serial.begin(115200);
  pinMode(relay, OUTPUT);
  pinMode(relay1, OUTPUT);
  pinMode(relay2, OUTPUT);
  pinMode(relay3, OUTPUT);
  
}

void loop() {

  // Normally Open configuration, send LOW signal to let current flow
  // (if you're usong Normally Closed configuration send HIGH signal)
  digitalWrite(relay, LOW);
  delay(2000); 
  digitalWrite(relay1, LOW);
   delay(2000);
  digitalWrite(relay2, LOW);
   delay(2000);
  digitalWrite(relay3, LOW);
   delay(2000);
  Serial.println("Current Flowing");

  
  // Normally Open configuration, send HIGH signal stop current flow
  // (if you're usong Normally Closed configuration send LOW signal)
  digitalWrite(relay, HIGH);
   delay(2000);
  digitalWrite(relay1, HIGH);
   delay(2000);
  digitalWrite(relay2, HIGH);
   delay(2000);
  digitalWrite(relay3, HIGH);
   delay(2000);
  Serial.println("Current not Flowing");


}
