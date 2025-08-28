<?php
// Google Apps Script Web App URL
$scriptUrl = "https://script.google.com/macros/s/AKfycbyVkraaGBrWWMSd3YT8uX3MdVhXOLJuWvj2itMWlJ6dwbSFdT2_VaujKe8BUIeELRUlwg/exec";

$ch = curl_init($scriptUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $_POST);
$response = curl_exec($ch);
curl_close($ch);

// Allow CORS
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

echo $response;
