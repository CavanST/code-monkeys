<?php

use PHPUnit\Framework\TestCase;
require_once "classes/InputHandler.php";

class InputHandlerTest extends TestCase
{
    public function testJsonToArrayMakesArray()
    {
        $inputString = "[{\"from\": \"Adolfo Suárez Madrid–Barajas Airport, Spain\",\"to\": \"London Heathrow, UK\"},{\"from\": \"Fazenda São Francisco Citros, Brazil\",\"to\": \"São Paulo–Guarulhos International Airport, Brazil\"},{\"from\": \"London Heathrow, UK\",\"to\": \"Loft Digital, London, UK\"},{\"from\": \"Porto International Airport, Portugal\",\"to\": \"Adolfo Suárez Madrid–Barajas Airport, Spain\"},{\"from\": \"São Paulo–Guarulhos International Airport, Brazil\",\"to\": \"Porto International Airport, Portugal\"}]";
        $actualArray = InputHandler::jsonToArray([$inputString]);
        $this->assertIsArray($actualArray);
    }

    public function testJsonToArrayMakesJourneyObject()
    {
        $inputString = "[{\"from\": \"Adolfo Suárez Madrid–Barajas Airport, Spain\",\"to\": \"London Heathrow, UK\"},{\"from\": \"Fazenda São Francisco Citros, Brazil\",\"to\": \"São Paulo–Guarulhos International Airport, Brazil\"},{\"from\": \"London Heathrow, UK\",\"to\": \"Loft Digital, London, UK\"},{\"from\": \"Porto International Airport, Portugal\",\"to\": \"Adolfo Suárez Madrid–Barajas Airport, Spain\"},{\"from\": \"São Paulo–Guarulhos International Airport, Brazil\",\"to\": \"Porto International Airport, Portugal\"}]";

        $steps = [
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

        $journey = new Journey($steps);
        $actualArray = InputHandler::jsonToArray([$inputString]);
        $this->assertEquals($journey, $actualArray[0]);
    }

    // TODO test when jsonToArray is given JSON for 2 journeys
}