<?php

use Aedart\Util\Traits\ClearablePartialCollectionTrait;

/**
 * Class Clearable-Partial-Collection Trait Test
 *
 * @coversDefaultClass Aedart\Util\Traits\ClearablePartialCollectionTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class ClearablePartialCollectionTraitTest extends CollectionTestCase{

    /*********************************************************************************
     * Helpers
     ********************************************************************************/

    /**
     * Get a dummy internal collection
     *
     * @return DummyClearablePartialCollection
     */
    protected function getDummyCollection(){
        return new DummyClearablePartialCollection();
    }

    /*********************************************************************************
     * Actual tests
     ********************************************************************************/

    /**
     * @test
     * @covers ::clear
     */
    public function clearTheCollection(){
        $collection = $this->getDummyCollection();

        $collection->addFrom($this->getListOfKeyValuePairs());

        $collection->clear();

        $this->assertTrue($collection->isEmpty(), 'Collection should be empty');
    }

}

class DummyClearablePartialCollection {

    use ClearablePartialCollectionTrait;

    public function addFrom(array $list){
        $this->setInternalCollection($this->getInternalCollection()->merge($list));
    }

}