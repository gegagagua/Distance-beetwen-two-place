<?php
$country1 = isset($_POST['country1'])?$_POST['country1']: "";
$country2 = isset($_POST['country2'])?$_POST['country2']: "";
function branchaddress($point_map,$point_map2){
	$url ="http://maps.google.com/maps/api/geocode/json?address=$point_map&sensor=false";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
	curl_setopt($ch, CURLOPT_PROXYPORT,3128); 
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,0); 
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0); 
	$response = curl_exec($ch); curl_close($ch);
	$response = json_decode($response);
	$lat = $response->results[0]->geometry->location->lat;
	$long = $response->results[0]->geometry->location->lng;

	$arr['lat1'] = $lat;
	$arr['long1'] = $long;

	$url2 ="http://maps.google.com/maps/api/geocode/json?address=$point_map2&sensor=false";
	$ch2 = curl_init();
	curl_setopt($ch2, CURLOPT_URL, $url2); 
	curl_setopt($ch2, CURLOPT_RETURNTRANSFER,1); 
	curl_setopt($ch2, CURLOPT_PROXYPORT,3128); 
	curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST,0); 
	curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER,0); 
	$response2 = curl_exec($ch2); curl_close($ch2);
	$response2 = json_decode($response2);
	$lat2 = $response2->results[0]->geometry->location->lat;
	$long2 = $response2->results[0]->geometry->location->lng;
	
	$arr['lat2'] = $lat2;
	$arr['long2'] = $long2;

	echo json_encode($arr);
};

branchaddress($country1 , $country2);	
?>