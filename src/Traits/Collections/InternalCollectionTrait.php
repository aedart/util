<?php namespace Aedart\Util\Traits\Collections;

use Illuminate\Support\Collection;

/**
 * Trait Internal Collection
 *
 * Offers components a getter and setter for an internal / protected
 * Laravel collection
 *
 * @see \Illuminate\Support\Collection
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Util\Traits
 */
trait InternalCollectionTrait
{

    /**
     * This collection's internal collection.
     * It is being used to store the actual values
     *
     * @var \Illuminate\Support\Collection|null
     */
    protected $internalCollection = null;

    /**
     * Set the internal collection, which contain the actual
     * values of this collection
     *
     * @param \Illuminate\Support\Collection $internalCollection
     */
    protected function setInternalCollection(Collection $internalCollection)
    {
        $this->internalCollection = $internalCollection;
    }

    /**
     * Get the internal collection, which contain the actual
     * values of this collection
     *
     * If no internal collection has been set, this method will
     * set and return a default empty collection
     *
     * @return \Illuminate\Support\Collection
     */
    protected function getInternalCollection()
    {
        if (is_null($this->internalCollection)) {
            $this->setInternalCollection($this->getDefaultInternalCollection());
        }
        return $this->internalCollection;
    }

    /**
     * Returns a default empty collection
     *
     * @return Collection A default empty collection
     */
    protected function getDefaultInternalCollection()
    {
        return new Collection();
    }

}