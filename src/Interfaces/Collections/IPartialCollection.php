<?php namespace Aedart\Util\Interfaces\Collections;

use Aedart\Util\Contracts\Collections\PartialCollection;

/**
 * @deprecated Since version 4.0, use \Aedart\Util\Contracts\Collections\PartialCollection
 *
 * Interface Partial Collection
 *
 * <br />
 *
 * A partial collection is a "incomplete" collection. It defines but a few methods,
 * which allows any concrete implementation to specify how insert, search and obtain
 * operations are to be performed.
 *
 * <br />
 *
 * In other words, a partial collection forms the basis for a real / full collection
 * implementation. In such an implementation, you would ideally define what is allowed
 * and what isn't allowed in the given collection
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Util\Interfaces
 */
interface IPartialCollection extends PartialCollection
{
    /**
     * @deprecated Since 4.0, interface will not longer force require __toString implementation
     *
     * Get the string representation of this collection
     *
     * @return string Representation of this collection
     */
    public function __toString();
}