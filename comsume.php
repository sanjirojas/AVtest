<?php

$url = $_POST['link'];
//$xml = $_POST['Data'] ; 

$xml = $_POST['Data'];
 
//Initiate cURL
$curl = curl_init($url);
 
//Set the Content-Type to text/xml.
curl_setopt ($curl, CURLOPT_HTTPHEADER, array("Content-Type: text/xml"));
 
//Set CURLOPT_POST to true to send a POST request.
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
//Attach the XML string to the body of our request.
curl_setopt($curl, CURLOPT_POSTFIELDS, $xml);
 
//Tell cURL that we want the response to be returned as
//a string instead of being dumped to the output.
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
 
//Execute the POST request and send our XML.
$result = curl_exec($curl);
 
//Do some basic error checking.
if(curl_errno($curl)){
    throw new Exception(curl_error($curl));
}
 
//Close the cURL handle.
curl_close($curl);

print_r($result);
$xmlresult = simplexml_load_string($result);
$json = json_encode($xmlresult);
$array = json_decode($json,TRUE);
//Print out the response output.

return $array ;


?>