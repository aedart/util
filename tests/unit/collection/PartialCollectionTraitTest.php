<?php

use Aedart\Util\Traits\Collections\PartialCollectionTrait;

/**
 * Class PartialCollectionTraitTest
 *
 * @group collections
 * @group collections-partial
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
    protected function getDummyCollection() : DummyPartialCollection
    {
        return new DummyPartialCollection();
    }

    /*********************************************************************************
     * Actual tests
     ********************************************************************************/

    /**
     * @test
     */
    public function countItems()
    {
        $collection = $this->getDummyCollection();

        $list = $this->getListOfKeyValuePairs();

        $collection->addFrom($list);
        $collection->put($this->faker->unique()->word, $this->faker->sentence());

        $this->assertSame(count($list) + 1, $collection->count());
    }

    /**
     * @test
     */
    public function collectionIsEmpty()
    {
        $collection = $this->getDummyCollection();
        $this->assertTrue($collection->isEmpty());
    }

    /**
     * @test
     */
    public function collectionIsNotEmpty()
    {
        $collection = $this->getDummyCollection();

        $collection->put($this->faker->word, $this->faker->sentence());

        $this->assertFalse($collection->isEmpty());
    }

    /**
     * @test
     */
    public function getCollectionIterator()
    {
        $collection = $this->getDummyCollection();
        $this->assertInstanceOf('Traversable', $collection->getIterator());
    }

    /**
     * @test
     */
    public function exportToArray()
    {
        $collection = $this->getDummyCollection();

        $list = $this->getListOfKeyValuePairs();
        $collection->addFrom($list);

        $this->assertSame($list, $collection->toArray());
    }

    /**
     * @test
     */
    public function getTheJsonSerializableData()
    {
        $collection = $this->getDummyCollection();

        $list = $this->getListOfKeyValuePairs();
        $collection->addFrom($list);

        $this->assertSame($list, $collection->jsonSerialize());
    }

    /**
     * @test
     */
    public function exportToJson()
    {
        $collection = $this->getDummyCollection();

        $list = $this->getListOfKeyValuePairs();
        $collection->addFrom($list);

        $expected = json_encode($list);

        $this->assertSame($expected, $collection->toJson());
    }

    /**
     * @test
     */
    public function exportToString()
    {
        $collection = $this->getDummyCollection();

        $list = $this->getListOfKeyValuePairs();
        $collection->addFrom($list);

        $this->assertInternalType('string', $collection->__toString());
    }
}

class DummyPartialCollection
{
    use PartialCollectionTrait;

    public function addFrom(array $list)
    {
        $this->setInternalCollection($this->getInternalCollection()->merge($list));
    }

    public function put($key, $value)
    {
        $this->getInternalCollection()->put($key, $value);
    }
}