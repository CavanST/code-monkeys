#!/usr/bin/php
<?php

require_once "classes/Journey.php";
require_once "classes/InputHandler.php";

unset($argv[0]);

// orders multiple journeys
$journeys = InputHandler::jsonToArray($argv);

// print all ordered journeys
foreach ($journeys as $i => $j) {
    $journeyNum = $i + 1;
    echo "\n****** Journey {$journeyNum} ******\n";
    print_r($j->getItinerary());
}

die();