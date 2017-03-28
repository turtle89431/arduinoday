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
int index2=0;
int last=1;int msec=0;int dir=0;

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
    WiFiMulti.addAP("cit", "H@rlan817");
    last=0;
}

void loop() {
  char delimiter=' ';
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
            int boundLow=0;
            int boundHigh=0;
            // file found at server
            if(httpCode == HTTP_CODE_OK) {
                String payload = http.getString();
                USE_SERIAL.println(payload);
                //sscanf(payload.c_str(),"%d %d : %d",&index2,&dir,&msec);
                if(payload.length()>0){
                  boundLow = payload.indexOf(' ');
                  index2 = payload.substring(0, boundLow).toInt();
                  boundHigh = payload.indexOf(delimiter, boundLow+1);
                  dir = payload.substring(boundLow+1, boundHigh).toInt();
                  boundLow = payload.indexOf(delimiter, boundHigh+1);
                  msec = payload.substring(boundHigh+1, boundLow).toInt();
                if(index2 != last){
                  moveDir(dir,msec);  
                }}
            }
        } else {
            USE_SERIAL.printf("[HTTP] GET... failed, error: %s\n", http.errorToString(httpCode).c_str());
        }

        http.end();
    }

    delay(10000);
}

