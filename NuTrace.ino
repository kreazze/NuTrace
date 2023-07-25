// Sensors Libraries
#include <WiFi.h>                     // WiFi Library
#include <OneWire.h>                  // Soil Temperature
#include <DallasTemperature.h>        // Soil Temperature
#include <Wire.h>                     // NPK + pH
#include <HTTPClient.h>


// Soil Temperature
#define ONE_WIRE_BUS 15 
OneWire oneWire(ONE_WIRE_BUS);
DallasTemperature sensors(&oneWire);

// Soil Moisture
const int soilMoisturePin = 36;
int moisture;

// NPK = pH
#define RE 16             // NPK + pH
#define DE 17             // NPK + pH
const byte ph[]   = {0x01,0x03, 0x00, 0x03, 0x00, 0x01, 0x74, 0x0a};  // NPK + pH 
const byte nitro[]= {0x01,0x03, 0x00, 0x04, 0x00, 0x01, 0xc5, 0xcb};  // NPK + pH 
const byte phos[] = {0x01,0x03, 0x00, 0x05, 0x00, 0x01, 0x94, 0x0b};  // NPK + pH 
const byte pota[] = {0x01,0x03, 0x00, 0x06, 0x00, 0x01, 0x64, 0x0b};  // NPK + pH 
byte values[7];                                                       // NPK + pH 
HardwareSerial modSerial(2); // Use Serial2 for NPK
char nitrogenBuffer[30];                                              // NPK + pH 
char phosphorusBuffer[30];                                            // NPK + pH 
char potassiumBuffer[30];                                             // NPK + pH 
char pHBuffer[30];                                                    // NPK + pH 


// Connect to SQL
const char* ssid = "SKYFiber_MESH_33B2";
const char* password = "130004413";
const char* host = "http://nutrace.website";  // Use "localhost" when running XAMPP on your local machine

void setup()
{
  Serial.begin(9600);
  sensors.begin(); // Start up the library
  modSerial.begin(4800, SERIAL_8N1, 32, 33); // Initialize Serial2 for NPK
  pinMode(RE, OUTPUT);
  pinMode(DE, OUTPUT);

  // Connect to WiFi
  Serial.println();
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);

  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  } 
  
  Serial.println("");
  Serial.println("WiFi connected");
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());
}

void loop()
{
    // Soil Moisture
    moisture = analogRead(soilMoisturePin);
    moisture = map(moisture, 0, 4095, 0, 110);
    Serial.print("Moisture : ");
    Serial.print(moisture);
    Serial.println("%");

    // Soil Temperature
    int temperature;
    sensors.requestTemperatures();
    temperature = sensors.getTempCByIndex(0);
    Serial.print("Temperature: ");
    Serial.print(temperature);  // print the temperature in Celsius
    Serial.print((char)176);    // shows degrees character
    Serial.println("C");

    // NPK + pH
    uint16_t val1, val2, val3, val4;

    val1 = sensor_request(nitro[0], nitro[1], nitro[2], nitro[3], nitro[4], nitro[5], nitro[6], nitro[7]);
    sprintf(nitrogenBuffer, "Nitrogen = %02u mg/kg\r\n", val1);
    Serial.print(nitrogenBuffer);
    delay(450);

    val2 = sensor_request(phos[0], phos[1], phos[2], phos[3], phos[4], phos[5], phos[6], phos[7]);
    sprintf(phosphorusBuffer, "Phosphorus = %02u mg/kg\r\n", val2);
    Serial.print(phosphorusBuffer);
    delay(450);

    val3 = sensor_request(pota[0], pota[1], pota[2], pota[3], pota[4], pota[5], pota[6], pota[7]);
    sprintf(potassiumBuffer, "Potassium = %02u mg/kg\r\n", val3);
    Serial.print(potassiumBuffer);
    delay(450);

    val4 = sensor_request(ph[0], ph[1], ph[2], ph[3], ph[4], ph[5], ph[6], ph[7])/10;
    sprintf(pHBuffer, "pH = %04u  \r\n", val4);
    Serial.print(pHBuffer);
    delay(450);

    // Display value to firebase
    double nitrogen = val1;
    double phosphorus = val2;
    double potassium = val3;
    double ph = static_cast<double>(val4) / 10.0;

    // Connect to server
    Serial.print("Connecting to ");
    Serial.println(host);
    WiFiClient client;
    const int httpPort = 80; // Assuming you are using the default HTTP port 80 for XAMPP
  // if (!client.connect(host, httpPort)) {
      // Serial.println("Connection failed");
      // Serial.print("WiFi status: ");
      // Serial.println(WiFi.status());
      // return;
  // }
    String url = "https://nutrace.website/update.php";
    url += "?nitrogen=" + String(nitrogen);
    url += "&phosphorus=" + String(phosphorus);
    url += "&potassium=" + String(potassium);
    url += "&moisture=" + String(moisture);
    url += "&temperature=" + String(temperature);
    url += "&ph=" + String(ph);

    /*
    Serial.print("Request URL: ");
    Serial.println(url);
    client.print(String("GET ") + url + " HTTP/1.1\r\n" +
                 "Host: " + host + "\r\n" +
                 "Connection: close\r\n\r\n");
    unsigned long timeout = millis();
    while (client.available() == 0) {
        if (millis() - timeout > 1000) {
            Serial.println(">>> Client Timeout !");
            client.stop();
            return;
        }
    }
    while (client.available()) {
        String line = client.readStringUntil('\r');
        Serial.print(line);
    }*/

    // Your target website URL

  // Create an HTTPClient object
  HTTPClient http;

  // Start the HTTP request
  http.begin(url);

  // Get the HTTP response code
  int httpResponseCode = http.GET();

  if (httpResponseCode > 0) {
    // HTTP request was successful
    Serial.print("HTTP Response Code: ");
    Serial.println(httpResponseCode);

    // Print the response data (the webpage contents)
    String response = http.getString();
    Serial.println(url);
    Serial.println("Website Contents:");
    Serial.println(response);
  } else {
    // Error handling if the request fails
    Serial.print("Error in HTTP request. HTTP Response Code: ");
    Serial.println(httpResponseCode);
  }

  // Close the connection
  http.end();
    Serial.println();
    delay(5000); // Wait for 5 seconds before repeating the loop
}

// functions for NPK + pH
uint16_t sensor_request(byte d1, byte d2, byte d3, byte d4, byte d5, byte d6, byte d7, byte d8) {
  byte initial;
  while (modSerial.available()) modSerial.read(); // Empty Read Buffer
  digitalWrite(DE, HIGH);
  digitalWrite(RE, HIGH);
  delay(1);
  modSerial.write(d1);
  modSerial.write(d2);
  modSerial.write(d3);
  modSerial.write(d4);
  modSerial.write(d5);
  modSerial.write(d6);
  modSerial.write(d7);
  modSerial.write(d8);
  modSerial.flush();
  digitalWrite(DE, LOW);
  digitalWrite(RE, LOW);
  delay(250);

  initial = 0;
  for (byte i = 0; i < 7; i++) {
    values[i] = modSerial.read();
    if (initial == 0 && values[i] == 0 && modSerial.available()) values[i] = modSerial.read();
    if (initial == 0 && values[i] == 0 && modSerial.available()) values[i] = modSerial.read();
    if (initial == 0 && values[i] == 0 && modSerial.available()) values[i] = modSerial.read();
    initial = 1;
  }
  return (values[3] << 8 | values[4]);
}

uint16_t pH() {
  while (modSerial.available()) modSerial.read(); // Empty Read Buffer
  digitalWrite(DE, HIGH);
  digitalWrite(RE, HIGH);
  delay(1);
  for (uint16_t i = 0; i < sizeof(ph); i++) modSerial.write(ph[i]);
  modSerial.flush();
  digitalWrite(DE, LOW);
  digitalWrite(RE, LOW);
  delay(200);
  if (modSerial.available() > 7) modSerial.read();
  for (byte i = 0; i < 7; i++) {
    values[i] = modSerial.read();
  }
  return values[4];
}

uint16_t phosphorus() {
  while (modSerial.available()) modSerial.read(); // Empty Read Buffer
  digitalWrite(DE, HIGH);
  digitalWrite(RE, HIGH);
  delay(1);
  for (uint16_t i = 0; i < sizeof(phos); i++) modSerial.write(phos[i]);
  modSerial.flush();
  digitalWrite(DE, LOW);
  digitalWrite(RE, LOW);
  delay(200);
  if (modSerial.available() > 7) modSerial.read();
  for (byte i = 0; i < 7; i++) {
    values[i] = modSerial.read();
  }
  return (values[3] << 8 | values[4]);
}

uint16_t potassium() {
  while (modSerial.available()) modSerial.read(); // Empty Read Buffer
  digitalWrite(DE, HIGH);
  digitalWrite(RE, HIGH);
  delay(1);
  for (uint16_t i = 0; i < sizeof(pota); i++) modSerial.write(pota[i]);
  modSerial.flush();
  digitalWrite(DE, LOW);
  digitalWrite(RE, LOW);
  delay(200);
  if (modSerial.available() > 7) modSerial.read();
  for (byte i = 0; i < 7; i++) {
    values[i] = modSerial.read();
  }
  return (values[3] << 8 | values[4]);
}