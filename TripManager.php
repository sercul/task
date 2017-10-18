<?php
/**
 * Created by PhpStorm.
 * User: jeremy
 * Date: 18.10.17
 * Time: 14:10
 */

namespace Trip;

use Trip\BoardingPass;

/**
 * Class TripManager
 */
class TripManager
{
    /**
     * @var BoardingPass
     */
    protected $passes = [];

    /**
     *
     *
     * @param array $passes
     */
    public function __construct(array $passes)
    {
       $this->fillModels($passes);
    }

    /**
     * Fill the pass model
     *
     */
    public function fillModels(array $passes)
    {
        foreach ($passes as $pass){
            $this->passes[] = (new BoardingPass())
                ->setArrival($pass['arrival'])
                ->setDeparture($pass['departure'])
                ->setType($pass['type'])
                ->setGate(isset($pass['gate'])?$pass['gate']:'')
                ->setBaggageCounter(isset($pass['counter'])?$pass['counter']:'')
                ->setSeat(isset($pass['seat'])?$pass['seat']:'');
        }
    }


    /**
     *
     */
    public function printTrip()
    {
        $sortedPasses = $this->sortPasses($this->passes);
    die(var_dump($sortedPasses));
    }
}