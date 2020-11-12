<?php

use PHPUnit\Framework\TestCase;
require_once "classes/InputHandler.php";

/**
 * Class InputHandlerTest
 *
 * @author Cavan Scoffin-Thomas
 */
class InputHandlerTest extends TestCase
{
    /**
     * Check InputHandler returns an array
     *
     * @author Cavan Scoffin-Thomas
     * @test
     */
    public function testJsonToArrayMakesArray()
    {
        $inputString = "[{\"from\": \"Adolfo Suárez Madrid–Barajas Airport, Spain\",\"to\": \"London Heathrow, UK\"},{\"from\": \"Fazenda São Francisco Citros, Brazil\",\"to\": \"São Paulo–Guarulhos International Airport, Brazil\"},{\"from\": \"London Heathrow, UK\",\"to\": \"Loft Digital, London, UK\"},{\"from\": \"Porto International Airport, Portugal\",\"to\": \"Adolfo Suárez Madrid–Barajas Airport, Spain\"},{\"from\": \"São Paulo–Guarulhos International Airport, Brazil\",\"to\": \"Porto International Airport, Portugal\"}]";
        $actualArray = InputHandler::jsonToArray([$inputString]);
        $this->assertIsArray($actualArray);
    }

    /**
     * Check InputHandler adds the correct Journey object to an array
     *
     * @author Cavan Scoffin-Thomas
     * @test
     */
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

    /**
     * Check InputHandler creates multiple Journey objects in an array
     *
     * @author Cavan Scoffin-Thomas
     * @test
     */
    public function testJsonToArrayMakesMultipleJourneyObjects()
    {
        $firstArg = "[{\"from\": \"Adolfo Suárez Madrid–Barajas Airport, Spain\",\"to\": \"London Heathrow, UK\"},{\"from\": \"Fazenda São Francisco Citros, Brazil\",\"to\": \"São Paulo–Guarulhos International Airport, Brazil\"},{\"from\": \"London Heathrow, UK\",\"to\": \"Loft Digital, London, UK\"},{\"from\": \"Porto International Airport, Portugal\",\"to\": \"Adolfo Suárez Madrid–Barajas Airport, Spain\"},{\"from\": \"São Paulo–Guarulhos International Airport, Brazil\",\"to\": \"Porto International Airport, Portugal\"}]";
        $secondArg = "[{\"from\": \"London Heathrow, UK\",\"to\": \"Loft Digital, London, UK\"},{\"from\": \"Adolfo Suárez Madrid–Barajas Airport, Spain\",\"to\": \"London Heathrow, UK\"},{\"from\": \"Nairobi, Kenya\",\"to\": \"Adolfo Suárez Madrid–Barajas Airport, Spain\"}]";

        $firstSteps = [
            ["from"=> "Adolfo Suárez Madrid–Barajas Airport, Spain",
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

        $secondSteps = [
            [
                "from"=> "London Heathrow, UK",
                "to" => "Loft Digital, London, UK",
            ],
            [
                "from"=> "Adolfo Suárez Madrid–Barajas Airport, Spain",
                "to" => "London Heathrow, UK",
            ],
            [
                "from"=> "Nairobi, Kenya",
                "to" => "Adolfo Suárez Madrid–Barajas Airport, Spain",
            ],
        ];

        $firstJourney = new Journey($firstSteps);
        $secondJourney = new Journey($secondSteps);
        $actualArray = InputHandler::jsonToArray([$firstArg, $secondArg]);
        $this->assertEquals([$firstJourney, $secondJourney], $actualArray);
    }
}