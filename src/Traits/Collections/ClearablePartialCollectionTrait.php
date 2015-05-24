<?php namespace Aedart\Util\Traits\Collections;

use Aedart\Util\Traits\Collections\PartialCollectionTrait;

/**
 * Trait Clearable Partial Collection
 *
 * @see \Aedart\Util\Interfaces\IPartialCollection
 * @see \Aedart\Util\Interfaces\Clearable
 * @see \Illuminate\Support\Collection
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Util\Traits
 */
trait ClearablePartialCollectionTrait {

    use PartialCollectionTrait;

    /**
     * Clear this component, e.g. collection, list, set...etc.
     *
     * Method removes all internal values, which this component
     * holds.
     *
     * @return void
     */
    public function clear(){
        $this->setInternalCollection($this->getDefaultInternalCollection());
    }

}