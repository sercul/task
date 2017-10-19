<?php
/**
 * Created by PhpStorm.
 * User: jeremy
 * Date: 18.10.17
 * Time: 14:10
 */

namespace Trip;

/**
 * Class TripManager
 */
class TripManager
{
    /**
     * @var BoardingPass[]
     */
    protected $passes = [];

    /**
     * @param array $passes
     */
    public function __construct(array $passes)
    {
        $this->fillModels($passes);
    }

    /**
     * @return BoardingPass[]
     */
    public function getPasses(): array
    {
        return $this->passes;
    }

    /**
     * Fill the pass models
     *
     * @param array $passes
     */
    public function fillModels(array $passes)
    {
        foreach ($passes as $pass) {
            $this->passes[] = (new BoardingPass())
                ->setArrival($pass['arrival'])
                ->setDeparture($pass['departure'])
                ->setType($pass['type'])
                ->setNumber(isset($pass['number']) ? $pass['number'] : '')
                ->setGate(isset($pass['gate']) ? $pass['gate'] : '')
                ->setBaggageCounter(isset($pass['baggage']) ? $pass['baggage'] : '')
                ->setSeat(isset($pass['seat']) ? $pass['seat'] : '');
        }
    }


    /**
     * Sorting passes and print boarding passes info.
     *
     * @return string
     */
    public function getTrip()
    {
        $this->sortPasses(count($this->passes));
        return $this->printPasses();
    }

    /**
     * Sorting passes.
     *
     * @param int $amount
     * @param int $exitIndex
     *
     * @return null
     */
    public function sortPasses($amount, $exitIndex = 0)
    {
        if ($exitIndex == $amount - 1) {
            return null;
        }

        for ($i = $exitIndex; $i < $amount; $i++) {
            for ($k = $i + 1; $k < $amount; $k++) {
                if ($this->passes[$i]->getDeparture() == $this->passes[$k]->getArrival()) {
                    $temp = $this->passes[$i];
                    $this->passes[$i] = $this->passes[$k];
                    $this->passes[$k]  = $temp;

                    return $this->sortPasses($amount, $i);
                }
            }
        }
    }

    /**
     * Print boarding passes based on transport type.
     *
     * @return string
     */
    public function printPasses()
    {
        $output = "";
        foreach ($this->passes as $pass) {
            switch ($pass->getType()) {
                case "Plane":
                    $output .= $pass->processPlane();
                    break;
                case "Train":
                    $output .= $pass->processTrain();
                    break;
                case "Bus":
                    $output .= $pass->processBus();
                    break;
                default:
                    $output .= $pass->processDefault();
                    break;
            }
        }

        $output .=  "You have arrived at your final destination.\n";

        return $output;
    }
}