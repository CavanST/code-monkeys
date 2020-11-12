<?php

use PHPUnit\Framework\TestCase;
require_once "classes/Journey.php";

/**
 * Class JourneyTest
 *
 * @author Cavan Scoffin-Thomas
 */
class JourneyTest extends TestCase
{
    /**
     * Mock journey steps
     *
     * @var array
     */
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

    /**
     * Check the Journey is constructed with the correct start point
     *
     * @author Cavan Scoffin-Thomas
     * @test
     */
    public function testJourneyStartPoint()
    {
        $expectedStartPoint = [
            "from" => "Fazenda São Francisco Citros, Brazil",
            "to" => "São Paulo–Guarulhos International Airport, Brazil"
        ];

        $journey = new Journey($this->steps);
        $this->assertEquals($expectedStartPoint, $journey->getStartPoint());
    }

    /**
     * Check the Journey is constructed with the correct end point
     *
     * @author Cavan Scoffin-Thomas
     * @test
     */
    public function testJourneyEndPoint()
    {
        $expectedEndPoint = [
            "from" => "London Heathrow, UK",
            "to" => "Loft Digital, London, UK"
        ];

        $journey = new Journey($this->steps);
        $this->assertEquals($expectedEndPoint, $journey->getEndPoint());
    }

    /**
     * Check Journey returns the correct itinerary
     *
     * @author Cavan Scoffin-Thomas
     * @test
     */
    public function testGetItinerary()
    {
        $expectedItinerary = [
            "Fazenda São Francisco Citros, Brazil",
            "São Paulo–Guarulhos International Airport, Brazil",
            "Porto International Airport, Portugal",
            "Adolfo Suárez Madrid–Barajas Airport, Spain",
            "London Heathrow, UK",
            "Loft Digital, London, UK",
        ];

        $journey = new Journey($this->steps);
        $this->assertEquals($expectedItinerary, $journey->getItinerary());
    }

    /**
     * Check Journey correctly orders the journey steps
     *
     * @author Cavan Scoffin-Thomas
     * @test
     */
    public function testGetJourney()
    {
        $expectedJourney = [
            [
                "from"=> "Fazenda São Francisco Citros, Brazil",
                "to" => "São Paulo–Guarulhos International Airport, Brazil",
            ],
            [
                "from"=> "São Paulo–Guarulhos International Airport, Brazil",
                "to" => "Porto International Airport, Portugal",
            ],
            [
                "from"=> "Porto International Airport, Portugal",
                "to" => "Adolfo Suárez Madrid–Barajas Airport, Spain",
            ],
            [
                "from"=> "Adolfo Suárez Madrid–Barajas Airport, Spain",
                "to" => "London Heathrow, UK",
            ],
            [
                "from"=> "London Heathrow, UK",
                "to" => "Loft Digital, London, UK",
            ],
        ];

        $journey = new Journey($this->steps);
        $this->assertEquals($expectedJourney, $journey->getJourney());
    }
}