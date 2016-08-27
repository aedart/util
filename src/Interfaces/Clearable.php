<?php
namespace Aedart\Util\Interfaces;

/**
 * Interface Clearable
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Util\Interfaces
 */
interface Clearable
{

    /**
     * Clear this component, e.g. collection, list, set...etc.
     *
     * Method removes all internal values, which this component
     * holds.
     *
     * @return void
     */
    public function clear();

}