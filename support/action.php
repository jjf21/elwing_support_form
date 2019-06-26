
<?php
	$orderReference = $_POST["reference"];
	$customerFirstName = $_POST["prenom"];
	$customerLastName = $_POST["nom"];
	$companyName = $_POST["seller"];
	$streetAddress = $_POST["adresse"];
	$additionalAddress = $_POST["adresse2"];
	$zipCode = $_POST["zipcode"];
	$city = $_POST["ville"];
	$countryCode = $_POST["pays"];
	$phoneNumber = $_POST["phone"];
	$customerMail = $_POST["mail"];
	$purchaseDateUtc = $_POST["purchase_date"];
	$modelId = $_POST["modele"];
	$amout = $_POST["price"];
	$currency = "EUR";
	$orderLineReference = "1";


//Premier appel pour obtenir un TOKEN
function CallAPI($GET, $url = "https://demo-customer-api.revers.io/api/v1/token")
{

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://demo-customer-api.revers.io/api/v1/token?secret=acR4uV49zH13AYSjr5S8fuqrbWLT4IUcXp01oPLE",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Accept: */*",
    "Cache-Control: no-cache",
    "Connection: keep-alive",
    "Host: demo-customer-api.revers.io",
    "Ocp-Apim-Subscription-Key: af2c3b808b004e9ba952ab7a586b80bf",
    "Postman-Token: a85d25f7-0937-4dce-8840-cf3829e90804,98b0f528-aa92-4206-86bd-71756e7f8073",
    "User-Agent: PostmanRuntime/7.13.0",
    "accept-encoding: gzip, deflate",
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;//LE token est stocké dans $response
}

//deuxième appel pour importer les données sur revers
  
function CallAPI($PUT, $url = "https://demo-customer-api.revers.io/api/v1/orders", $data:  
  "orderReference": "$orderReference",
  "customerLastName": "$customerLastName",
  "customerFirstName": "$customerFirstName",
  "address": {
    "companyName": "$companyName",
    "streetAddress": "$streetAddress",
    "additionalAddress": "$additionalAddress",
    "zipCode": "$zipCode",
    "city": "$city",
    "countryCode": "$countryCode"
  },
  "phoneNumber": "$phoneNumber",
  "customerMail": "$customerMail",
  "purchaseDateUtc": "$purchaseDateUtc",
  "products": [
    {
      "modelId": "00000000-0000-0000-0000-000000000000",
      "price": {
        "amount": "$amount,
        "currency": "EUR"
      },
      "orderLineReference": "1"
    }
  ],
})


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://demo-customer-api.revers.io/api/v1/orders",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "PUT",
  CURLOPT_HTTPHEADER => array(
    "Accept: */*",
    "Authorization: "Bearer $response",
    "Cache-Control: no-cache",
    "Connection: keep-alive",
    "Host: demo-customer-api.revers.io",
    "Ocp-Apim-Subscription-Key: af2c3b808b004e9ba952ab7a586b80bf",
    "Postman-Token: 71ad1af0-95c8-4f11-82ef-7e14d9cff4d2,c4666cda-aebf-49fc-b98c-db356f05148b",
    "User-Agent: PostmanRuntime/7.13.0",
    "accept-encoding: gzip, deflate",
    "cache-control: no-cache",
    "content-length: "
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

// troisieme appel pour rediriger le client vers le site. Mais je ne trouve pas l'ID

{
  "orderId": "?"
}
	
	
	

	echo 'Bonjour ' . $city . ', vous allez être redirigé vers notre plateforme de SAV <br>' ;
	echo '<br>';
	echo 'Cordialement, <br>';
	echo ' l équipe ELWING';

	// 1 : on ouvre le fichier
	//$monfichier = fopen('donneesformulaire.xls', 'a+'); 
	//fputs($monfichier, $nom."\n"); 
	//fputs($monfichier, $prenom."\n"); 
	//fputs($monfichier, $Adresse."\n"); 
	//fputs($monfichier, $Remarques."\n"); 

	// 3 : quand on a fini de l'utiliser, on ferme le fichier
	//fclose($monfichier);


?>