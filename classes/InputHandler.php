<?php

/**
 * Class InputHandler
 *
 * @author Cavan Scoffin-Thomas
 */
class InputHandler
{
    /**
     * Convert JSON strings to arrays and return a list of Journey objects
     *
     * @author Cavan Scoffin-Thomas
     * @param $json
     * @return array
     */
    public static function jsonToArray($json)
    {
        $journeys = [];
        foreach ($json as $arg) {
            // convert JSON string to array
            $steps = json_decode($arg, true);

            // create Journey object and add to journeys array
            $journeys[] = new Journey($steps);
        }
        return $journeys;
    }
}