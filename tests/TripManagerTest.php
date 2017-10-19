<?php
/**
 * Created by PhpStorm.
 * User: jeremy
 * Date: 18.10.17
 * Time: 14:10
 */

use PHPUnit\Framework\TestCase;
use Trip\TripManager;
use Trip\BoardingPass;

/**
 * Class TripManagerTest
 */
class TripManagerTest extends TestCase
{
    public $passesJson = [];

    public $manager;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        $this->passesJson = json_decode(file_get_contents('passes.json'), true);
        $this->manager    = new TripManager([]);
        parent::__construct($name, $data, $dataName);
    }

    public function testConstruct()
    {
        $this->assertInstanceOf(
            TripManager::class,
            new TripManager($this->passesJson)
        );
    }

    public function testFillModels()
    {
        $this->manager->fillModels($this->passesJson);

        $this->assertInstanceOf(
            BoardingPass::class,
            $this->manager->getPasses()[0]
        );

        $this->assertEquals(
            'Stockholm',
            $this->manager->getPasses()[0]->getDeparture()
        );
    }

    public function testSortPasses()
    {
        $this->manager->fillModels($this->passesJson);

        $this->assertEquals(
            'Stockholm',
            $this->manager->getPasses()[0]->getDeparture()
        );

        $this->manager->sortPasses(count($this->passesJson));

        $this->assertEquals(
            'Madrid',
            $this->manager->getPasses()[0]->getDeparture()
        );

        $this->assertEquals(
            'Barcelona',
            $this->manager->getPasses()[0]->getArrival()
        );

        $this->assertEquals(
            'Barcelona',
            $this->manager->getPasses()[1]->getDeparture()
        );
    }

    public function testPrintPasses()
    {
        $this->manager->fillModels($this->passesJson);

        $this->assertEquals(
            'Take train 78A from Madrid to Barcelona.  Sit in seat 45B.
            Take the airport bus from Barcelona to Gerona Airport. No seat assignment.
            From Gerona Airport, take flight SK455 to Stockholm. Gate 45B,  Sit in seat 3A. Baggage drop at ticket counter 334.
            From Stockholm, take flight SK22 to New York. Gate 22,  Sit in seat 7B. Baggage will we automatically transferred from your last leg.
            You have arrived at your final destination.
            ', $this->manager->getTrip()
        );
    }
}