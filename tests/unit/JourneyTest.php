<?php

use PHPUnit\Framework\TestCase;
require_once "Journey.php";

class JourneyTest extends TestCase
{
    private $steps = [
        [
            "from"=> "Adolfo Suárez Madrid–Barajas Airport, Spain",
            "to" => "London Heathrow, UK",
        ],
        [
            "from"=> "Fazenda São Francisco Citros, Brazil",
            "to" => "São Paulo–Guarulhos International Airport, Brazil",
        ],
        [
            "from"=> "London Heathrow, UK",
            "to" => "Loft Digital, London, UK",
        ],
        [
            "from"=> "Porto International Airport, Portugal",
            "to" => "Adolfo Suárez Madrid–Barajas Airport, Spain",
        ],
        [
            "from"=> "São Paulo–Guarulhos International Airport, Brazil",
            "to" => "Porto International Airport, Portugal",
        ],
    ];

    public function testJourneyStartPoint()
    {
        $expectedStartPoint = [
            "from" => "Fazenda São Francisco Citros, Brazil",
            "to" => "São Paulo–Guarulhos International Airport, Brazil"
        ];

        $journey = new Journey($this->steps);
        $this->assertEquals($expectedStartPoint, $journey->getStartPoint());
    }

    public function testJourneyEndPoint()
    {
        $expectedEndPoint = [
            "from" => "London Heathrow, UK",
            "to" => "Loft Digital, London, UK"
        ];

        $journey = new Journey($this->steps);
        $this->assertEquals($expectedEndPoint, $journey->getEndPoint());
    }

    // TODO test getItinerary() and getJourney()
}