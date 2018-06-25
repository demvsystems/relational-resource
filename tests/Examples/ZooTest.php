<?php
declare(strict_types=1);

namespace RelationalResourceFramework\Examples;

use Exception;
use PHPUnit\Framework\TestCase;
use RelationalResourceFramework\Examples\Zoo\Models\Buffalo;
use RelationalResourceFramework\Examples\Zoo\Models\Lion;
use RelationalResourceFramework\Examples\Zoo\Models\Zoo;
use RelationalResourceFramework\Examples\Zoo\ZooResourceCollection;

/**
 * Class ZooTest
 * @package Examples
 */
final class ZooTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testZoo()
    {
        $collection = new ZooResourceCollection();
        $data       = $collection->getResponseData(
            [
                new Zoo(1, 'Zoo 1', [Lion::findById(1)], [Buffalo::findById(1)]),
                new Zoo(2, 'Zoo 2', [Lion::findById(2), Lion::findById(3)], [Buffalo::findById(1)]),
            ]
        );

        $this->assertCount(2, $data['zoo']);
        $this->assertCount(1, $data['buffalos']);
        $this->assertCount(3, $data['lions']);
    }

    /**
     * @throws Exception
     */
    public function testZoo2()
    {
        $collection = new ZooResourceCollection();
        $data       = $collection->getResponseData(
            [
                new Zoo(1, 'Zoo 1', [Lion::findById(1)], [Buffalo::findById(999)]),
                new Zoo(2, 'Zoo 2', [Lion::findById(2), Lion::findById(3)], []),
            ]
        );

        $this->assertCount(2, $data['zoo']);
        $this->assertCount(0, $data['buffalos']);
        $this->assertCount(3, $data['lions']);
    }

    /**
     * @throws Exception
     */
    public function testZoo3()
    {
        $collection = new ZooResourceCollection();
        $data       = $collection->getResponseData(
            [
                new Zoo(1, 'Zoo 1', [Lion::findById(999)], [Buffalo::findById(2)])
            ]
        );

        $this->assertCount(1, $data['zoo']);
        $this->assertCount(1, $data['buffalos']);
        $this->assertCount(0, $data['lions']);
    }
}