<?php

use Aedart\Util\Traits\Collections\PartialCollectionTrait;

/**
 * Class PartialCollectionTraitTest
 *
 * @coversDefaultClass Aedart\Util\Traits\Collections\PartialCollectionTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class PartialCollectionTraitTest extends CollectionTestCase
{

    /*********************************************************************************
     * Helpers
     ********************************************************************************/

    /**
     * Get a dummy partial collection implementation
     *
     * @return DummyPartialCollection
     */
    protected function getDummyCollection(){
        return new DummyPartialCollection();
    }

    /*********************************************************************************
     * Actual tests
     ********************************************************************************/

    /**
     * @test
     * @covers ::count
     */
    public function countItems(){
        $collection = $this->getDummyCollection();

        $list = $this->getListOfKeyValuePairs();

        $collection->addFrom($list);
        $collection->put($this->faker->unique()->word, $this->faker->sentence());

        $this->assertSame(count($list) + 1, $collection->count());
    }

    /**
     * @test
     * @covers ::isEmpty
     */
    public function collectionIsEmpty(){
        $collection = $this->getDummyCollection();
        $this->assertTrue($collection->isEmpty());
    }

    /**
     * @test
     * @covers ::isEmpty
     */
    public function collectionIsNotEmpty(){
        $collection = $this->getDummyCollection();

        $collection->put($this->faker->word, $this->faker->sentence());

        $this->assertFalse($collection->isEmpty());
    }

    /**
     * @test
     * @covers ::getIterator
     */
    public function getCollectionIterator(){
        $collection = $this->getDummyCollection();
        $this->assertInstanceOf('Traversable', $collection->getIterator());
    }

    /**
     * @test
     * @covers ::toArray
     */
    public function exportToArray(){
        $collection = $this->getDummyCollection();

        $list = $this->getListOfKeyValuePairs();
        $collection->addFrom($list);

        $this->assertSame($list, $collection->toArray());
    }

    /**
     * @test
     * @covers ::jsonSerialize
     */
    public function getTheJsonSerializableData(){
        $collection = $this->getDummyCollection();

        $list = $this->getListOfKeyValuePairs();
        $collection->addFrom($list);

        $this->assertSame($list, $collection->jsonSerialize());
    }

    /**
     * @test
     * @covers ::toJson
     */
    public function exportToJson(){
        $collection = $this->getDummyCollection();

        $list = $this->getListOfKeyValuePairs();
        $collection->addFrom($list);

        $expected = json_encode($list);

        $this->assertSame($expected, $collection->toJson());
    }

    /**
     * @test
     * @covers ::__toString
     */
    public function exportToString(){
        $collection = $this->getDummyCollection();

        $list = $this->getListOfKeyValuePairs();
        $collection->addFrom($list);

        $this->assertInternalType('string', $collection->__toString());
    }
}

class DummyPartialCollection {

    use PartialCollectionTrait;

    public function addFrom(array $list){
        $this->setInternalCollection($this->getInternalCollection()->merge($list));
    }

    public function put($key, $value){
        $this->getInternalCollection()->put($key, $value);
    }

}