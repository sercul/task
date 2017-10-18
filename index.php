<?php
// Simple API call
$requestMethod = $_SERVER["REQUEST_METHOD"];

if($requestMethod === 'GET'){

    try {
        $passesJson = json_decode(file_get_contents('passes.json'), true);
        $manager   = new Trip\TripManager($passesJson);
        var_dump($manager->printTrip());

    } catch (Exception $e) {
        throw $e;
    }
} else {
    header("HTTP/1.0 405 Method Not Allowed");
    die();
}
