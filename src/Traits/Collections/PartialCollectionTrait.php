<?php namespace Aedart\Util\Traits\Collections;

use Traversable;

/**
 *
 * @deprecated Use \Illuminate\Support\Collection instead
 *
 * Trait Partial Collection
 *
 * This trait offers some predefined implementation of a "partial" collection, by
 * making use of Laravel's Collection class. Thus, this trait acts as a wrapper
 * or decorator for such a collection.
 *
 * However, not all methods are offered by this trait. The reason for this is to
 * allow you to decide how your concrete collection should behave.
 *
 * @see \Aedart\Util\Contracts\Collections\PartialCollection
 * @see \Illuminate\Support\Collection
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Util\Traits
 */
trait PartialCollectionTrait
{
    use InternalCollectionTrait;

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Count elements of an object
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     */
    public function count() : int
    {
        return $this->getInternalCollection()->count();
    }

    /**
     * Check if this collection is empty or not
     *
     * @return bool True if empty, false if not
     */
    public function isEmpty() : bool
    {
        return $this->getInternalCollection()->isEmpty();
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Retrieve an external iterator
     * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable An instance of an object implementing <b>Iterator</b> or
     * <b>Traversable</b>
     */
    public function getIterator() : Traversable
    {
        return $this->getInternalCollection()->getIterator();
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->getInternalCollection()->toArray();
    }

    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param  int $options
     *
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->jsonSerialize(), $options);
    }

    /**
     * Get the string representation of this collection
     *
     * @return string Representation of this collection
     */
    public function __toString() : string
    {
        return $this->toJson();
    }
}
