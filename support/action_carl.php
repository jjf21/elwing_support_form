
<?php
	$gender = $_POST["gender"];
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
	$orderLineReference = "1";

	// Definition de la method CallAPI
	function CallAPI($method, $url, $headers, $data = false){
    $curl = curl_init();
    switch ($method){
      case "POST":
        curl_setopt($curl, CURLOPT_POST, 1);
        if ($data)
          curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        break;
      case "PUT":
        curl_setopt($curl, CURLOPT_PUT, 1);
        break;
      default:
        if ($data)
          $url = sprintf("%s?%s", $url, http_build_query($data));
    }

		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_TIMEOUT, 0);

    $result = curl_exec($curl);
		if(curl_exec($curl) === false){
	    echo 'Erreur Curl : ' . curl_error($curl);
		}
    curl_close($curl);
    return json_decode($result, true);
	}

	$getToken = CallAPI("GET", "https://demo-customer-api.revers.io/api/v1/token?secret=acR4uV49zH13AYSjr5S8fuqrbWLT4IUcXp01oPLE", array("Ocp-Apim-Subscription-Key: af2c3b808b004e9ba952ab7a586b80bf"));
	$token = $getToken['value'];

	$order_json = '{
  "orderReference": '.$orderReference.',
  "civility": '.$gender.'",
  "customerLastName": '.$customerLastName.'",
  "customerFirstName": '.$customerFirstName.'",
  "address": {
    "companyName": '.$companyName.'",
    "streetAddress": '.$streetAddress.'",
    "additionalAddress": '.$additionalAddress.'",
    "zipCode": '.$zipCode.'",
    "city": '.$city.'",
    "countryCode": "string"
  },
  "phoneNumber": '.$phoneNumber.'",
  "customerMail": '.$customerMail.'",
  "purchaseDateUtc": '.$purchaseDateUtc.'",
  "products": [
    {
      "modelId": '.$modelId.'",
      "price": {
        "amount": '.$amout.'",
        "currency": "EUR"
      }
    }
  ],
  "shippingPrice": {
    "amount": 0.0,
    "currency": "EUR"
  },
  "salesChannel": "NC"
}';

// print_r($order_json);
print_r($getToken);

// $order_result = CallAPI("PUT", "https://demo-customer-api.revers.io/api/v1/orders", array("Ocp-Apim-Subscription-Key: af2c3b808b004e9ba952ab7a586b80bf", "Authorization: Bearer $token", "Content-Type: application/json"), json_decode($order_json, true));
 
// print_r($order_result);

// What is required ?
// CountryCode ?


?>
