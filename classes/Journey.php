<?php

/**
 * Class Journey
 *
 * @author Cavan Scoffin-Thomas
 */
class Journey
{
    private $orderedJourney = [];
    private $startPoint;
    private $middleSteps;
    private $endPoint;

    public function __construct(array $steps)
    {
        // create array of possible end and start points
        $possibleStartPoints = [];
        $possibleEndPoints = [];
        foreach ($steps as $step) {
            $possibleStartPoints[] = $step['from'];
            $possibleEndPoints[] = $step['to'];
        }

        // find real start and end point
        foreach ($steps as $key => $step) {
            if (!in_array($step['from'], $possibleEndPoints)) {
                $this->startPoint = $step;
            } else if (!in_array($step['to'], $possibleStartPoints)) {
                $this->endPoint = $step;
            }
        }

        // add start point to the ordered journey
        $this->orderedJourney[] = $this->startPoint;

        // remove start point
        if (($key = array_search($this->startPoint, $steps)) !== false) {
            unset($steps[$key]);
        }
        // remove end point
        if (($key = array_search($this->endPoint, $steps)) !== false) {
            unset($steps[$key]);
        }

        $this->middleSteps = $steps;

        // order middle steps
        $prevTo = $this->startPoint['to'];
        $count = count($this->middleSteps);
        for ($i = $count; $i > 0; $i--) {
            foreach ($this->middleSteps as $middleStep) {
                if ($prevTo == $middleStep['from']) {
                    $this->orderedJourney[] = $middleStep;
                    $prevTo = $middleStep['to'];
                    break;
                }
            }
        }

        // complete ordered journey by adding end point
        $this->orderedJourney[] = $this->endPoint;
    }

    /**
     * Get the ordered journey steps
     *
     * @author Cavan Scoffin-Thomas
     * @return array
     */
    public function getJourney()
    {
        return $this->orderedJourney;
    }

    /**
     * Get the journey itinerary
     *
     * @author Cavan Scoffin-Thomas
     * @return array
     */
    public function getItinerary()
    {
        $steps = [];

        // add all "from" locations to steps array
        foreach ($this->orderedJourney as $step) {
            $steps[] = $step['from'];
        }

        // add "to" location from the end point
        $steps[] = $this->endPoint['to'];

        return $steps;
    }

    /**
     * Get the start point of the journey
     *
     * @author Cavan Scoffin-Thomas
     * @return array
     */
    public function getStartPoint()
    {
        return $this->startPoint;
    }

    /**
     * Get the end point of the journey
     *
     * @author Cavan Scoffin-Thomas
     * @return array
     */
    public function getEndPoint()
    {
        return $this->endPoint;
    }
}