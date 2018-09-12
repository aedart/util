<?php namespace Aedart\Util\Traits\Collections;

use Aedart\Util\Contracts\Clearable;
use Aedart\Util\Contracts\Collections\PartialCollection;

/**
 * @deprecated Use \Illuminate\Support\Collection instead
 *
 * Trait Clearable Partial Collection
 *
 * @see PartialCollection
 * @see Clearable
 * @see \Illuminate\Support\Collection
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Util\Traits
 */
trait ClearablePartialCollectionTrait
{
    use PartialCollectionTrait;

    /**
     * Clear this component, e.g. collection, list, set...etc.
     *
     * Method removes all internal values, which this component
     * holds.
     *
     * @return void
     */
    public function clear() : void
    {
        $this->setInternalCollection($this->getDefaultInternalCollection());
    }
}
