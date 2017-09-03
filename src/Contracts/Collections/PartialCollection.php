<?php

namespace Aedart\Util\Contracts\Collections;

use Aedart\Util\Contracts\Populatable;
use ArrayAccess;
use Countable;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use IteratorAggregate;
use JsonSerializable;

/**
 * Partial Collection
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
 * @package Aedart\Util\Contracts\Collections
 */
interface PartialCollection extends Populatable,
    Arrayable,
    ArrayAccess,
    IteratorAggregate,
    Countable,
    JsonSerializable,
    Jsonable
{
    /**
     * Check if this collection is empty or not
     *
     * @return bool True if empty, false if not
     */
    public function isEmpty() : bool;
}