<?php

$_url = "https://maps.googleapis.com/maps/api/geocode/json?rua braulio brito 137";
$a = curl_init();

curl_setopt($a, CURLOPT_URL, $_url);
curl_setopt($a, CURLOPT_POST, 1);

curl_setopt($a, CURLOPT_HTTPHEADER, array(
    'Authorization: AIzaSyA0JiJzP1h-aiZEG6lNwBFmHo_MJxYAkuY'
    ));

curl_setopt($a, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($a);

curl_close($a);

var_dump($result);
?>