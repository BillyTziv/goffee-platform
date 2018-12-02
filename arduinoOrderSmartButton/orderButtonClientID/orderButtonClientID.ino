/*
 * HTTP Client POST Request
 * Copyright (c) 2018, Tzivaras Vasilis
 * All rights reserved.
 * vtzivaras@gmail.com 
 * Connects to WiFi HotSpot. */

#include <ESP8266WiFi.h>
#include <WiFiClient.h> 
#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>

/* Set these to your desired credentials. */
const char *ssid = "NSK Global";
const char *password = "U9vS8tuh!!!#123";

//Web/Server address to read/write from 
const char *host = "http://skynode.info";

int buttonPressed = LOW;  // Smart button connected to D0 pin of arduino ESP8266 board

String syncOrderDetails() {
  HTTPClient http;    //Declare object of class HTTPClient
  
  String ADCData, station, postData;
  
  //Post Data
  postData = "productNo=3" ;
  
  http.begin("http://skynode.info/goffee/profileUpdate.php");              //Specify request destination
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");    //Specify content-type header
  
  int httpCode = http.POST(postData);   //Send the request
  String payload = http.getString();    //Get the response payload
  
  Serial.println(httpCode);   //Print HTTP return code
  Serial.println(payload);    //Print request response payload
  Serial.println("I hope everthing went well!");
  Serial.println();
  
  http.end();  //Close connection
  return payload;
}

//=======================================================================
//                    Power on setup
//=======================================================================

void setup() {
  delay(1000);
  Serial.begin(115200);
  WiFi.mode(WIFI_OFF);        //Prevents reconnection issue (taking too long to connect)
  delay(1000);
  WiFi.mode(WIFI_STA);        //This line hides the viewing of ESP as wifi hotspot
  
  WiFi.begin(ssid, password);     //Connect to your WiFi router
  Serial.println("");

  Serial.print("Establishing WiFi connection with the Internet...");

  // Wait for connection
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  //If connection successful show IP address in serial monitor
  Serial.println("");
  Serial.print("Connected to ");
  Serial.println(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());  //IP address assigned to your ESP
  Serial.println("System will be ready in 3 sec...");
  Serial.println();
  delay(3000);
}

//=======================================================================
//                    Main Program Loop
//=======================================================================
void loop() {
  // Read the smart button status
  buttonPressed = digitalRead(D0);
  
  // IF the button is pressed, then send the HTTP request.
  if(buttonPressed == HIGH) {
    String dataToSend = syncOrderDetails();
    HTTPClient http;    //Declare object of class HTTPClient
  
    String ADCData, station, postData;
  
    //Post Data
    postData = "productNo=325262" ;
    
    http.begin("http://skynode.info/grabber.php");              //Specify request destination
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");    //Specify content-type header
    
    digitalWrite(D2, HIGH);
    delay(200);
    digitalWrite(D2, LOW);
    delay(200);
    digitalWrite(D2, HIGH);
    delay(200);
    digitalWrite(D2, LOW);
    
    int httpCode = http.POST(dataToSend);   //Send the request
    String payload = http.getString();    //Get the response payload
  
    Serial.println(httpCode);   //Print HTTP return code
    Serial.println(payload);    //Print request response payload
    Serial.println("Coffee was ordered successfully!");
    Serial.println();
    
    http.end();  //Close connection
  }
  delay(500);  //Post Data at every 5 seconds
}
