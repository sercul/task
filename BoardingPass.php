<?php
/**
 * Created by PhpStorm.
 * User: jeremy
 * Date: 18.10.17
 * Time: 14:17
 */

namespace Trip;

class BoardingPass
{
    /** @var string */
    private $departure;
    /** @var string */
    private $arrival;
    /** @var string */
    private $type;
    /** @var string */
    private $number;
    /** @var string */
    private $seat;
    /** @var string */
    private $gate;
    /** @var int */
    private $baggageCounter;

    /**
     * @return string
     */
    public function getDeparture()
    {
        return $this->departure;
    }

    /**
     * @param string $departure
     * @return BoardingPass
     */
    public function setDeparture($departure)
    {
        $this->departure = $departure;
        return $this;
    }

    /**
     * @return string
     */
    public function getArrival()
    {
        return $this->arrival;
    }

    /**
     * @param string $arrival
     * @return BoardingPass
     */
    public function setArrival($arrival)
    {
        $this->arrival = $arrival;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return BoardingPass
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $number
     * @return BoardingPass
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return string
     */
    public function getSeat()
    {
        return $this->seat;
    }

    /**
     * @param string $seat
     * @return BoardingPass
     */
    public function setSeat($seat)
    {
        $this->seat = $seat;
        return $this;
    }

    /**
     * @return string
     */
    public function getGate()
    {
        return $this->gate;
    }

    /**
     * @param string $gate
     * @return BoardingPass
     */
    public function setGate($gate)
    {
        $this->gate = $gate;
        return $this;
    }

    /**
     * @return int
     */
    public function getBaggageCounter()
    {
        return $this->baggageCounter;
    }

    /**
     * @param int $baggageCounter
     * @return BoardingPass
     */
    public function setBaggageCounter($baggageCounter)
    {
        $this->baggageCounter = $baggageCounter;
        return $this;
    }

}