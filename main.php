#!/usr/bin/php
<?php

require_once "Journey.php";

unset($argv[0]);

// allows for ordering multiple journeys
$journeys = [];
foreach ($argv as $arg) {
    $steps = json_decode($argv[1], true);
    $journeys[] = new Journey($steps);
}

// print all ordered journeys
foreach ($journeys as $j) {
    echo "\n";
    print_r($j->getItinerary());
}

die();

// example input
// "[{\"from\": \"Adolfo Suárez Madrid–Barajas Airport, Spain\",\"to\": \"London Heathrow, UK\"},{\"from\": \"Fazenda São Francisco Citros, Brazil\",\"to\": \"São Paulo–Guarulhos International Airport, Brazil\"},{\"from\": \"London Heathrow, UK\",\"to\": \"Loft Digital, London, UK\"},{\"from\": \"Porto International Airport, Portugal\",\"to\": \"Adolfo Suárez Madrid–Barajas Airport, Spain\"},{\"from\": \"São Paulo–Guarulhos International Airport, Brazil\",\"to\": \"Porto International Airport, Portugal\"}]"