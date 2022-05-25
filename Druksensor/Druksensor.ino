#define CurrentSensorPin  A2
#define CurrentSensorPin1  A3

#define VREF 5000 // ADC's reference voltage on your Arduino,typical value:5000mV

unsigned int voltage; //unit:mV
float current;  //unit:mA
unsigned int voltage1; //unit:mV
float current1;  //unit:mA


void setup()
{
   Serial.begin(115200);
}

void loop()
{
    voltage = analogRead(CurrentSensorPin)/1024.0*VREF;
    Serial.print("voltage:");
    Serial.print(voltage);
    Serial.print("mV  ");
    current = voltage/120.0;  //Sense Resistor:120ohm
    Serial.print("current:");
    Serial.print(current);
    Serial.println("mA");
    voltage1 = analogRead(CurrentSensorPin1)/1024.0*VREF;
    Serial.print("voltage1:");
    Serial.print(voltage1);
    Serial.print("mV  ");
    current1 = voltage1/120.0;  //Sense Resistor:120ohm
    Serial.print("current1:");
    Serial.print(current1);
    Serial.println("mA");
    delay(1000);
    
}
