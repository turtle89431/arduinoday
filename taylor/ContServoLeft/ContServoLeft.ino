/*
 Robotics with the BOE Shield – LeftServoClockwise
 Generate a servo full speed clockwise signal on digital pin 13.
 */

#include <Servo.h>// Include servo library
#include <ESP8266WiFi.h>
#include <WiFiClientSecure.h>
#include <ESP8266HTTPClient.h>
#define leftPin 4
#define rightPin 14
Servo servoLeft;                             // Declare left servo
Servo servoRight;
const char* ssid = "hotrod";
const char* password = "pyramid100red";
int boundLow=0;
char dir;
int  ang;
char delimiter=',';
void setup()                                 // Built in initialization block
{
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
  Serial.println(http.GET());        // 1.3 ms full speed clockwise
}

void right(int t){
  servoRight.attach(rightPin);                      // Attach right signal to pin d5 gpio 14
  servoRight.writeMicroseconds(1300);
  delay(t);
  servoRight.detach();
  }  
void left(int t){
  servoLeft.attach(leftPin);                      // Attach left signal to pin d2 gpio 4
  servoLeft.writeMicroseconds(1300);
  delay(t);
  servoLeft.detach();
  }
void forward(int t){
  servoRight.attach(rightPin);                      // Attach right signal to pin d5 gpio 14
  servoRight.writeMicroseconds(1300);
  servoLeft.attach(leftPin);                      // Attach left signal to pin d2 gpio 4
  servoLeft.writeMicroseconds(1300);
  delay(t);
  servoRight.detach();
  servoLeft.detach();
  }
  void chdir(char d,int t){
  if(d=='l'){
    left(t);
    }else if(d=='r'){
    right(t);
    }else if(d=='f'){
    forward(250);  
    }else{
      
    }
  }  
void loop()                                  // Main loop auto-repeats
{  
  if (WiFi.status() == WL_CONNECTED) { //Check WiFi connection status
 
    HTTPClient http;  //Declare an object of class HTTPClient
 
    http.begin("http://arduinoday.azurewebsites.net/data.txt");  //Specify request destination
    int httpCode = http.GET();                                                                  //Send the request
 
    if (httpCode > 0) { //Check the returning code
 
      String payload = http.getString();   //Get the request response payload
      Serial.println(payload);                     //Print the response payload
      if(payload.length()>0){
           boundLow = payload.indexOf(',');
           dir = payload.substring(0, boundLow)[0];
           ang = payload.substring(boundLow+1,payload.length()).toInt();
           chdir(dir,ang);
      }
      
    }
    http.begin("http://arduinoday.azurewebsites.net/done.php?done=true");
    
}}

