<?php

namespace Aedart\Util\Contracts;

use Exception;

/**
 * @deprecated Use \Aedart\Contracts\Utils\Populatable instead, in aedart/athenaeum package
 *
 * Populatable
 *
 * <br />
 *
 * Components implementing this interface promise, that the given component can
 * be populated with some kind of data and thereby set its internal properties or
 * states to the given value(s)
 *
 * <br />
 *
 * What kind of properties can be populated and set, is completely implementation
 * dependent.
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Util\Contracts
 */
interface Populatable
{
    /**
     * Populate this component via an array
     *
     * <br />
     *
     * If an empty array is provided, nothing is populated.
     *
     * <br />
     *
     * If a value or property is not given via $data, then it
     * is NOT modified / changed.
     *
     * <br />
     *
     * <pre>
     *      $myComponent->populate([
     *          'myProperty' => 'myPropertyValue',
     *          'myOtherProperty' => 42.5
     *      ])
     * </pre>
     *
     * @param array $data [optional] Key-value pair, where the key corresponds to a
     * property name and the value to be set
     *
     * @return void
     *
     * @throws Exception In case that one or more of the given array entries are invalid
     */
    public function populate(array $data = []) : void;
}
