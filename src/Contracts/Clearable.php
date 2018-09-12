<?php

namespace Aedart\Util\Contracts;

/**
 * @deprecated Use \Aedart\Contracts\Utils\Clearable instead, in aedart/athenaeum package
 *
 * Clearable
 *
 * <br />
 *
 * Component is able to clear it's properties or list items.
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Util\Contracts
 */
interface Clearable
{
    /**
     * Clear this component, e.g. collection, list, set...etc.
     *
     * @return void
     */
    public function clear() : void;
}
