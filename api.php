<?php

// create a new cURL resource
$ch = curl_init();

// set URL and other appropriate options
$opt = [
    CURLOPT_URL => "172.18.0.3",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => ['nome' => "Luis", 'cpf' => "01020392039230293"]
];

curl_setopt_array($ch, $opt);

// grab URL and pass it to the browser
$return = curl_exec($ch);

// close cURL resource, and free up system resources
curl_close($ch);

echo $return;