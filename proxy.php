<?php
// Replace with your Google Apps Script Web App URL
$scriptUrl = "https://script.google.com/macros/s/AKfycbwGedn6dyiH5RBUTgrMVZo1z4JsrYW0_2TWNtWV4LlhWAt9nEXH-JOk37lXpKs6xxnD8g/exec";

// Forward POST data to Google Apps Script
$ch = curl_init($scriptUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $_POST);
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Always return JSON with CORS enabled
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

if ($httpCode == 200 && $response) {
    echo $response; // should already be JSON
} else {
    echo json_encode([
        "result" => "error",
        "error"  => "No response from Apps Script (HTTP $httpCode)"
    ]);
}
