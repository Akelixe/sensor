/* Programme de   SIGA */

#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>

#define ipserveur "192.168.1.134:80" ; // Addresse IP de votre PC qui vous sert de serveur (taper ipconfig dans la console CMD) pour le voir
#define capteur 0
#define STASSID "SIGA"
#define STAPSK  "Ibr@him@2024"

WiFiClient client;
HTTPClient http;

void setup()
{
  Serial.begin(115200);
  pinMode(capteur,INPUT);
  
  WiFi.begin(STASSID, STAPSK);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println();
  Serial.print("address-IP --> ");
  Serial.println(WiFi.localIP());
}

void loop(){

  if ((WiFi.status() == WL_CONNECTED)) {
    
    float value = 150;
    String httpurl = ""; // a ne pas remplir
    String postdata = ""; // a ne pas remplir
       
    httpurl ="http://";
    httpurl += ipserveur;
    httpurl += "/sensor/receive.php";
    
    http.begin(client, httpurl);  // Preparation de la requette HTTP
    http.addHeader("Content-Type", "application/x-www-form-urlencoded"); // Entete de la requette et type d'encodage

    postdata += "id=carte01"; 
    postdata += "&capteur=";
    postdata += value;

    int httpCode = http.POST(postdata); // Envoie de la requette HTTP avec la methode POST 

    if (httpCode == HTTP_CODE_OK) {
        const String payload = http.getString(); // Permet de lire la reponse de la requette si elle a été bien envoyé
        Serial.println(payload);
     }  
    else {
        Serial.printf("Requette HTTP echouee , error: %s\n", http.errorToString(httpCode).c_str());
    }
    http.end(); //on arreter la requette
  }
  
  delay(5000);
}
