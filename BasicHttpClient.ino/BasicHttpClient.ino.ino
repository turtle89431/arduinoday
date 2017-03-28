#include <Arduino.h>

#include <ESP8266WiFi.h>
#include <ESP8266WiFiMulti.h>

#include <ESP8266HTTPClient.h>

#define USE_SERIAL Serial
#define Webpage "http://arduinoday.azurewebsites.net/data.txt"
#define UP 0 //up pin
#define DOWN 1 //down pin
#define LEFT 2 //left pin
#define RIGHT 3 //right pin
ESP8266WiFiMulti WiFiMulti;
int index,last,msec,dir;

void moveDir(int d,int t){
    switch(d){
    case 0:    
      digitalWrite(UP,HIGH);
      delay(t);
      digitalWrite(UP,LOW);
      break;
    case 1:    
      digitalWrite(DOWN,HIGH);
      delay(t);
      digitalWrite(DOWN,LOW);
      break;
    case 2:   
      digitalWrite(LEFT,HIGH);
      delay(t);
      digitalWrite(LEFT,LOW);
      break;
    case 3:    
      digitalWrite(RIGHT,HIGH);
      delay(t);
      digitalWrite(RIGHT,LOW);
      break;
      }
}
void setup() {
    pinMode(UP,OUTPUT);
    pinMode(DOWN,OUTPUT);
    pinMode(LEFT,OUTPUT);
    pinMode(DOWN,OUTPUT);
    USE_SERIAL.begin(115200);
    USE_SERIAL.println();
    USE_SERIAL.println();
    USE_SERIAL.println();
// wait for wifi module to turn on
    for(uint8_t t = 4; t > 0; t--) {
        USE_SERIAL.printf("[SETUP] WAIT %d...\n", t);
        USE_SERIAL.flush();
        delay(1000);
    }
//network and password
    WiFiMulti.addAP("SSID", "PASSWORD");
    last=0;
}

void loop() {
    // wait for WiFi connection
    if((WiFiMulti.run() == WL_CONNECTED)) {

        HTTPClient http;

        USE_SERIAL.print("[HTTP] begin...\n");
        //connect to address
        http.begin(Webpage); //HTTP

        USE_SERIAL.print("[HTTP] GET...\n");
         int httpCode = http.GET();

        // httpCode will be negative on error
        if(httpCode > 0) {
            // HTTP header has been send and Server response header has been handled
            USE_SERIAL.printf("[HTTP] GET... code: %d\n", httpCode);

            // file found at server
            if(httpCode == HTTP_CODE_OK) {
                String payload = http.getString();
                USE_SERIAL.println(payload);
                sscanf(payload,"%d %d : %d",index,dir,msec);
                if(index>last){
                  moveDir(dir,msec);  
                }
            }
        } else {
            USE_SERIAL.printf("[HTTP] GET... failed, error: %s\n", http.errorToString(httpCode).c_str());
        }

        http.end();
    }

    delay(10000);
}

