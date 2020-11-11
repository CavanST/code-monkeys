#!/usr/bin/php
<?php

require_once "Journey.php";
require_once "InputHandler.php";

unset($argv[0]);

// orders multiple journeys
$journeys = InputHandler::jsonToArray($argv);

// print all ordered journeys
foreach ($journeys as $j) {
    echo "\n";
    print_r($j->getItinerary());
}

die();

// example input
// "[{\"from\": \"Adolfo Suárez Madrid–Barajas Airport, Spain\",\"to\": \"London Heathrow, UK\"},{\"from\": \"Fazenda São Francisco Citros, Brazil\",\"to\": \"São Paulo–Guarulhos International Airport, Brazil\"},{\"from\": \"London Heathrow, UK\",\"to\": \"Loft Digital, London, UK\"},{\"from\": \"Porto International Airport, Portugal\",\"to\": \"Adolfo Suárez Madrid–Barajas Airport, Spain\"},{\"from\": \"São Paulo–Guarulhos International Airport, Brazil\",\"to\": \"Porto International Airport, Portugal\"}]"