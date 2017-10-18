<?php
require_once __DIR__ . '/vendor/autoload.php';

try {
    $passesJson = json_decode(file_get_contents('passes.json'), true);
    $manager   = new Trip\TripManager($passesJson);
    echo $manager->getTrip();

} catch (Exception $e) {
    throw $e;
}

