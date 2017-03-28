#include <ESP8266WiFi.h>
#include <WiFiClientSecure.h>
#include <ESP8266HTTPClient.h>
#define UP 0 //up pin
#define DOWN 1 //down pin
#define LEFT 2 //left pin
#define RIGHT 3 //right pin
const char* ssid = "cit";
const char* password = "H@rlan817";
int boundLow=0;
int boundHigh=0;
int index2=0;
int last=1;
int msec=0;
int dir=0;
char delimiter=':';
void setup() {
  Serial.begin(115200);
  Serial.setDebugOutput(true);
  Serial.println();
  Serial.print("connecting to ");
  Serial.println(ssid);
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.println("WiFi connected");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
  HTTPClient http;
 http.begin("http://arduinoday.azurewebsites.net/");
  Serial.println(http.GET());
}

void loop() {
  if (WiFi.status() == WL_CONNECTED) { //Check WiFi connection status
 
    HTTPClient http;  //Declare an object of class HTTPClient
 
    http.begin("http://arduinoday.azurewebsites.net/data.txt");  //Specify request destination
    int httpCode = http.GET();                                                                  //Send the request
 
    if (httpCode > 0) { //Check the returning code
 
      String payload = http.getString();   //Get the request response payload
      Serial.println(payload);                     //Print the response payload
      if(payload.length()>0){
                  boundLow = payload.indexOf(':');
                  index2 = payload.substring(0, boundLow).toInt();
                  boundHigh = payload.indexOf(delimiter, boundLow+1);
                  dir = payload.substring(boundLow+1, boundHigh).toInt();
                  boundLow = payload.indexOf(delimiter, boundHigh+1);
                  msec = payload.substring(boundHigh+1, boundLow).toInt();
                  }
                  Serial.printf("index: %d, dir: %d time%d",index2,dir,msec);
    }
 
    http.end();   //Close connection
 
  }
  delay(15000);
}
