
/*
This is designed for Nodemcu esp8266 module.
Algorithm will work with every microcontroller which has at least two GPIO pins and a WiFi connection.
If your device only have one GPIO pin, do not use the restart function then you will be able the use this code as well.
In my system device casuses network problems after long use so I have added a restart function which restarts the device every 5 hours by a short circle.
I have used a MOSFET which gate connected to D0, restart and ground connected to other legs of mosfet. 

10.05.2018
ANIL CAN SAATÇI
SAMSUN/TURKEY

*/

#include <Arduino.h>
#include <ESP8266WiFi.h>
#include <ESP8266WiFiMulti.h>
#include <ESP8266HTTPClient.h>
#define USE_SERIAL Serial
ESP8266WiFiMulti WiFiMulti;
void setup() {
pinMode(D2,OUTPUT); // D2 has been connected to relay which turns on or off the lights(or any device you like).
digitalWrite(D2,HIGH); // Relay is on without any internet connection so if there is no internet you can use that light by the switch on your wall.Old school method
    USE_SERIAL.begin(115200); // Starts serial commincation
  

    USE_SERIAL.println();
    USE_SERIAL.println();
    USE_SERIAL.println();

    for(uint8_t t = 4; t > 0; t--) {
        USE_SERIAL.printf("[SETUP] WAIT %d...\n", t);
        USE_SERIAL.flush();
        delay(1000);
    }

    WiFiMulti.addAP("YOUR SSID ","YOUR PASSWORD"); // Change it suitable to your network. leave password part blank if there is none

}

void loop() {
    // wait for WiFi connection
    if((WiFiMulti.run() == WL_CONNECTED)) {

        HTTPClient http;

        USE_SERIAL.print("");
        
		
        http.begin("http://ev.leblebi19.com/esp.php"); // This is my website adress change it to yours if you do not prefer to I turn on or off your lights

        USE_SERIAL.print("");
        // Get the code writen in the page
        int httpCode = http.GET();

       
        if(httpCode > 0) {            
            
            if(httpCode == HTTP_CODE_OK) {
                String payload = http.getString();
                USE_SERIAL.println(payload);
				// If the anser is equal to 1 which means lights on relay will turn on or stay on
if(payload == "1"){
digitalWrite(D2,HIGH);
Serial.println("Relay is on."); 
  resat(); // restart function at the bottom shut downs the device after 5 hours of work 
}
// if the answer is 2 it will turn off or stay off 
if(payload == "2"){
digitalWrite(D2,LOW);
Serial.println("Relay is off");
  resat();
}
                
            }
        } else {
            USE_SERIAL.printf("[HTTP] GET... failed, error: %s\n", http.errorToString(httpCode).c_str());
        }

        http.end();
    }
// It does that in a circle if you want it get faster enter a lower number for the delay below but too fast will cause instability.
    delay(4000);
}



// 18000000 equals 5 hours you can change that number if you want or relase it but if your going to use that function
// do not change where pinmode d0 is. If you use it anywhere else your device will not work.

int resat(){
if(millis() > 18000000){
pinMode(D0,OUTPUT);

digitalWrite(D0,LOW);
  
}
}



