<?php

use Aedart\Util\Traits\Collections\InternalCollectionTrait;
use Illuminate\Support\Collection;

/**
 * Class InternalCollectionTest
 *
 * @coversDefaultClass Aedart\Util\Traits\Collections\InternalCollectionTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class InternalCollectionTest extends CollectionTestCase
{
    /*********************************************************************************
     * Helpers
     ********************************************************************************/

    /**
     * Get a dummy internal collection
     *
     * @return DummyInternalCollection
     */
    protected function getDummyInternalCollection(){
        return new DummyInternalCollection();
    }

    /*********************************************************************************
     * Actual tests
     ********************************************************************************/

    /**
     * @test
     * @covers ::setInternalCollection
     * @covers ::getInternalCollection
     * @covers ::getDefaultInternalCollection
     */
    public function getDefaultInternalCollection(){
        $collection = $this->getDummyInternalCollection()->getInternalCollection();
        $this->assertNotNull($collection, 'Expected a collection - something is off!');
        $this->assertInstanceOf('Illuminate\Support\Collection', $collection);
    }
}

/**
 * Class Dummy Internal Collection
 *
 * For testing only - exposes the protected methods
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class DummyInternalCollection {

    use InternalCollectionTrait {
        setInternalCollection as setInternalCollectionTrait;
        getInternalCollection as getInternalCollectionTrait;
        getDefaultInternalCollection as getDefaultInternalCollectionTrait;
    }

    public function setInternalCollection(Collection $internalCollection) {
        $this->setInternalCollectionTrait($internalCollection);
    }

    public function getInternalCollection() {
        return $this->getInternalCollectionTrait();
    }

    public function getDefaultInternalCollection() {
        return $this->getDefaultInternalCollectionTrait();
    }


}