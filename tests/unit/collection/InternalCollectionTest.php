<?php

use Aedart\Util\Traits\Collections\InternalCollectionTrait;
use Illuminate\Support\Collection;

/**
 * Class InternalCollectionTest
 *
 * @group collections
 * @group collections-internal
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
    protected function getDummyInternalCollection() : DummyInternalCollection
    {
        return new DummyInternalCollection();
    }

    /*********************************************************************************
     * Actual tests
     ********************************************************************************/

    /**
     * @test
     */
    public function getDefaultInternalCollection()
    {
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
class DummyInternalCollection
{
    use InternalCollectionTrait {
        setInternalCollection as setInternalCollectionTrait;
        getInternalCollection as getInternalCollectionTrait;
        getDefaultInternalCollection as getDefaultInternalCollectionTrait;
    }

    public function setInternalCollection(?Collection $internalCollection)
    {
        $this->setInternalCollectionTrait($internalCollection);
    }

    public function getInternalCollection() : ?Collection
    {
        return $this->getInternalCollectionTrait();
    }

    public function getDefaultInternalCollection() : ?Collection
    {
        return $this->getDefaultInternalCollectionTrait();
    }


}