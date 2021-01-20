#include "DHT.h"
#include <SPI.h>
#include <Ethernet.h>
#include <Servo.h>
byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED }; //Setting MAC Address

#define DHTPIN 3
#define DHTTYPE DHT11
#define MQ2pin (1)//gaz

Servo myservo;
DHT dht(DHTPIN, DHTTYPE);

int magnet = 5 ;
int val ; 
int mag = 5 ;
int pos = 0;
int btnMotor = 0;
int btnLed = 0; 
int ledPin = 8;
int foto;
int count=0;

float gazData;
float humidityData;
float temperatureData;
//char server[]= "198.168.0.20";
char server[]="192.168.0.9";
int port = 80;
EthernetClient client;

void setup() {
   
  Serial.begin(9600);
  pinMode(magnet, INPUT) ;
  dht.begin();
  //pinMode(7, OUTPUT);
  myservo.attach(9);
  Serial.println("Initialize Ethernet with DHCP:");
  //daca  nu se conecteaza
  if (Ethernet.begin(mac) == 0) {
    Serial.println("Failed to configure Ethernet using DHCP");
  } else {
    Serial.println(" DHCP assigned IP ");
  }
  delay(1000);
  Serial.print("connecting to ");
  Serial.print(server);
  Serial.println("...");

}

void loop() {
  count=count+1;
  // put your main code here, to run repeatedly:
  humidityData = dht.readHumidity();
  temperatureData = dht.readTemperature();
  Sending_To_phpmyadmindatabase_TEMP_UMID();
  delay(1000);
  DateLed();
  AprindeStange();
  delay(1000);
  primesteDateMotor();
  DeschideInchide();
  delay(1000);
  Sending_To_phpmyadmindatabase_Magnet();
  delay(1000);
  Serial.print(count);
  if(count%20==0){
    Sending_To_phpmyadmindatabase_TEMP_UMID_GAZ();
    }
    delay(1000);
  
}

// trimit date despre temp si umid
void Sending_To_phpmyadmindatabase_TEMP_UMID()
{
      gazData=analogRead(MQ2pin);
      
  if (client.connect(server, port)) {
     Serial.println("connected temp");
     
     Serial.print("GET /info.php?temperature=");
     client.print("GET /info.php?temperature=");
     Serial.print(temperatureData);
     client.print(temperatureData);
     client.print("&humidity=");
     Serial.print("&humidity=");
     client.print(humidityData);
     Serial.print(humidityData);
     client.print("&gaz=");
     Serial.print("&gaz=");
     client.print(gazData);
     Serial.println(gazData);
     client.print(" ");
     client.print("HTTP/1.1");
     client.println();
     client.println("Host: 198.168.0.20");
     client.println("Connection: close");
     client.println();
  } else {
    // if you didn't get a connection to the server:
    Serial.println("connection failed");
  }
}
void Sending_To_phpmyadmindatabase_TEMP_UMID_GAZ()
{
      gazData=analogRead(MQ2pin);
      
  if (client.connect(server, port)) {
     Serial.println("connected temp");
     
     Serial.print("GET /infoInsert.php?temperature=");
     client.print("GET /infoInsert.php?temperature=");
     Serial.print(temperatureData);
     client.print(temperatureData);
     client.print("&humidity=");
     Serial.print("&humidity=");
     client.print(humidityData);
     Serial.print(humidityData);
     client.print("&gaz=");
     Serial.print("&gaz=");
     client.print(gazData);
     Serial.println(gazData);
     client.print(" ");
     client.print("HTTP/1.1");
     client.println();
     client.println("Host: 198.168.0.20");
     client.println("Connection: close");
     client.println();
  } else {
    // if you didn't get a connection to the server:
    Serial.println("connection failed");
  }
}
 
  //aprind stang led
 void AprindeStange() {
  if (btnLed == 49) {
    digitalWrite(ledPin, HIGH);
  } else if (btnLed == 48) {
    digitalWrite(ledPin, LOW);
  }
}
// incarcam datele despre led
void DateLed() {

  if (client.connect(server, port)) {
    client.print(String("GET /") + "ledIntroducem.php"); //YOUR URL
    client.print(" HTTP/1.1");
    client.println();
    client.println("Host: 198.168.0.20");
    client.println("Connection: close");
    client.println();

    while (client.connected()) {
      if (client.available()) {
        char c = client.read();
       // Serial.print(c);
        btnLed = int(c);///////////////////////////in variabila asta se baga valoarea din db
      }
    }
    Serial.println("Butonul led  ");
    Serial.println(btnLed);
    client.stop();
  } else {
    // if you didn't get a connection to the server:
    Serial.println("connection failed");
  }
}

void primesteDateMotor() {
  
  if (client.connect(server, port)) {
    client.print(String("GET /") + "motor.php"); //YOUR URL
    client.print(" HTTP/1.1");
    client.println();
    client.println("Host: 198.168.0.20");
    client.println("Connection: close");
    client.println();

    while (client.connected()) {
      if (client.available()) {
        char cM = client.read();
       // Serial.print(cM);
        btnMotor = int(cM);///////////////////////////in variabila asta se baga valoarea din db
      }
    }
    Serial.println("Butonul motor  ");
   Serial.println(btnMotor);
    client.stop();
  } else {
    Serial.println("connection failed");
  }
}

void DeschideInchide() {
  if (btnMotor == 49) {
    for (pos = 0; pos <= 75; pos++) {
      myservo.write(pos); 
      
    }
  } else if (btnMotor == 48) {
    for (pos = 75; pos >= 0; pos--) {
      myservo.write(pos);  
       
    }
  }
}

// trimit date despre magnet
void Sending_To_phpmyadmindatabase_Magnet()
{
    val = digitalRead(magnet) ; 
    foto = analogRead(A2);
  if (client.connect(server, port)) {
     Serial.println("connected");
     
     Serial.print("GET /magnet.php?magnet=");
     client.print("GET /magnet.php?magnet=");
     Serial.println(val);
     client.print(val);
     client.print("&foto=");
     Serial.print("&foto=");
     client.print(foto);
     Serial.println(foto);
     client.print(" ");
     client.print("HTTP/1.1");
     client.println();
     client.println("Host: 198.168.0.20");
     client.println("Connection: close");
     client.println();
  } else {
    // if you didn't get a connection to the server:
    Serial.println("connection failed");
    }
  }
