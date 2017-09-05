<?php

use Aedart\Util\Traits\Collections\ClearablePartialCollectionTrait;

/**
 * Class Clearable-Partial-Collection Trait Test
 *
 * @group collections
 * @group collections-clearable
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class ClearablePartialCollectionTraitTest extends CollectionTestCase
{

    /*********************************************************************************
     * Helpers
     ********************************************************************************/

    /**
     * Get a dummy internal collection
     *
     * @return DummyClearablePartialCollection
     */
    protected function getDummyCollection() : DummyClearablePartialCollection
    {
        return new DummyClearablePartialCollection();
    }

    /*********************************************************************************
     * Actual tests
     ********************************************************************************/

    /**
     * @test
     */
    public function clearTheCollection()
    {
        $collection = $this->getDummyCollection();

        $collection->addFrom($this->getListOfKeyValuePairs());

        $collection->clear();

        $this->assertTrue($collection->isEmpty(), 'Collection should be empty');
    }

}

class DummyClearablePartialCollection
{
    use ClearablePartialCollectionTrait;

    public function addFrom(array $list) : void
    {
        $this->setInternalCollection($this->getInternalCollection()->merge($list));
    }

}