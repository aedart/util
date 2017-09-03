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
     * Internal Collection instance
     *
     * @var Collection|null
     */
    protected $internalCollection = null;

    /**
     * Set internal collection
     *
     * @param Collection|null $collection Internal Collection instance
     *
     * @return self
     */
    protected function setInternalCollection(?Collection $collection)
    {
        $this->internalCollection = $collection;

        return $this;
    }

    /**
     * Get internal collection
     *
     * If no internal collection has been set, this method will
     * set and return a default internal collection, if any such
     * value is available
     *
     * @see getDefaultInternalCollection()
     *
     * @return Collection|null internal collection or null if none internal collection has been set
     */
    protected function getInternalCollection(): ?Collection
    {
        if (!$this->hasInternalCollection()) {
            $this->setInternalCollection($this->getDefaultInternalCollection());
        }
        return $this->internalCollection;
    }

    /**
     * Check if internal collection has been set
     *
     * @return bool True if internal collection has been set, false if not
     */
    protected function hasInternalCollection(): bool
    {
        return isset($this->internalCollection);
    }

    /**
     * Get a default internal collection value, if any is available
     *
     * @return Collection|null A default internal collection value or Null if no default value is available
     */
    protected function getDefaultInternalCollection(): ?Collection
    {
        return new Collection();
    }
}