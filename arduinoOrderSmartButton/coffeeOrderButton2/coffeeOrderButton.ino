// Include any library here.
#include <ESP8266WiFi.h>
#include <WiFiClientSecure.h>

/*****************************************************************************
 * Pinout definition
*****************************************************************************/
// Domain name of the server
const char* host = "https://orderts.entypwseis.gr";

// Second part of the slack url request
String url = "/beta/taskManager/README.md";

// HTTPS port number for the slack API request.
const int httpsPort = 443;

// SHA1 fingerprint of the SLACK certificate
const char* fingerprint = "36 EF EB 1C FA 24 09 23 67 1C 11 E4 8C 9C 0C 73 B5 A5 DE 11";

// Credentials for the WiFi network or hotspot.
const char* ssid = "Cronos";
const char* password = "U9vS8tuh";
String product="Espresso";
String sugar = "MET";
String address = "Kardamistisa";
String clientname = "Vyrwnas";
String comment = "SugarFree";

/*****************************************************************************
 * Place your functions below. Before each function use comments to describe
 * what it does.
*****************************************************************************/

/*
 * Create a request using the slack API to a specific channel. The function input
 * is a simple string (the message to be send)
 */
void requestFunc(String myStr) {
  // Use WiFiClientSecure class to create TLS connection
  WiFiClientSecure client;
  Serial.print("Connecting to ");
  Serial.println(host);

  // Verify that the connection was established successfully.
  int res = client.connect(host, httpsPort);
  if (!res ) {
    Serial.println("Connection failed");
    Serial.print("Error code returned: ");
    Serial.println(res);
    return;
  }

  // Verify the ESP8266 using the pre-defined fingerprint.
  //if (client.verify(fingerprint, host)) {
  //  Serial.println("certificate matches");
  //} else {
  //  Serial.println("certificate doesn't match");
  //}

  // Prepare the message as a json file.
  //String msgtoSend = "product=Latto&sugar=2&address=KardamitsiaFilikis&name=Lampisks&comment=No";
  String msgtoSend = "name:chris";

  // Prepare the reqeust headers.
  String sendReq = String("GET") + url + " HTTP/1.1\r\n" +
               "Host: "+ url + "\r\n" +
               "User-Agent: ESP8266\r\n" +
               "Connection: close\r\n" +
               "Content-Type: text/plain\r\n" +
               "Content-Length: 1555 \r\n"
               "\r\n" +
               "\r\n";

  Serial.println(sendReq);
  Serial.println();
  
  // Send the request to the slack server.
  client.print(sendReq);

  // Read the header response from the slack server (for debuggin purposes)
  while (client.connected()) {
    String line = client.readStringUntil('\n');
    Serial.println(line);
    if (line == "\r") {
      Serial.println("headers received");
      break;
    }
  }

  // Read the data response from the slack server (for debuggin purposes)
  String line = client.readStringUntil('\n');
  Serial.println(line);
  if (line.startsWith("{\"state\":\"success\"")) {
    //Serial.println("esp8266/Arduino CI successfull!");
  } else {
    //Serial.println("esp8266/Arduino CI has failed");
  }

  // delay 5 seconds before sending anything else.
  delay(5000);
}

/*
 * Setup function will be executed everytime the ESP8266 board connects 
 * to a power or reboots it self.
 */
void setup() {
  Serial.begin(115200);
  Serial.println();

  // Connect to the WiFi network
  Serial.print("Connecting to ");
  Serial.println(ssid);
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.println("WiFi connection was successfull!");
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());

  // Wait 5 sec for any hardware changes that you need to make (usually connect jumper wires).
  // All the TX/RX pins in the ESP8266 must NOT be connected before this step.
  Serial.println("I am gonna sleep now for 5 sec...");
  delay(5000);
  



  // Prepare all the strings and variables (initial slack report stage)
  String product_msg = "product:";  
  String sugar_msg = "sugar:";
  String address_msg = "address:";
  String name_msg = "name:";
  String comment_msg = "comment: ";
 
  String msg = product_msg+product+sugar_msg+sugar+address_msg+address+name_msg+clientname+comment_msg+comment;
  Serial.println(msg);
  requestFunc(msg);
  delay(2000);
}

/*
 * Loop function is like a while loop that is always true.
 */
void loop() {
  // This function was through all of the defined rules and decides if the
  // ESP8266 will send any messages to slack.

  // Debuggin Purposes
  //printStatus();
  
  // Delay 1/2 sec before the next sensors read
  delay(500);
}

