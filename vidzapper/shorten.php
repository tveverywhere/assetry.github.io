<?php
//This is the URL you want to shorten
if (isset($_POST['longurl'])){
	$longUrl = $_POST['longurl'];
}

$apiKey = 'AIzaSyDE2V27GUS0iBScc-32WcAIfis9KoiIzJE';
//Get API key from : http://code.google.com/apis/console/
 
$postData = array('longUrl' => $longUrl, 'key' => $apiKey);
$jsonData = json_encode($postData);
 
$curlObj = curl_init();
 
curl_setopt($curlObj, CURLOPT_URL, 'https://www.googleapis.com/urlshortener/v1/url');
curl_setopt($curlObj, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curlObj, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curlObj, CURLOPT_HEADER, 0);
curl_setopt($curlObj, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
curl_setopt($curlObj, CURLOPT_POST, 1);
curl_setopt($curlObj, CURLOPT_POSTFIELDS, $jsonData);
 
$response = curl_exec($curlObj);
curl_close($curlObj);
 
//echo 'Shortened URL is: '.$json->id;
header('Content-type: application/json');
echo  $response;
?>