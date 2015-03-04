<?php  namespace Aedart\Util\Interfaces; 

/**
 * Interface Populatable
 *
 * Components implementing this interface, promise that the given component can
 * be populated with some kind of data and thereby set its properties or state
 * to the given value(s)
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Util\Interfaces
 */
interface Populatable {

    /**
     * Populate this component via an array
     *
     * @param array $data Key-value pair, where the key corresponds to a
     * property name and the value to be set, e.g. <p>
     * <pre>
     * [
     *  'myProperty' => 'myPropertyValue',
     *  'myOtherProperty' => 42.5
     * ]
     * </pre>
     * </p>
     *
     * @return void
     *
     * @throws \InvalidArgumentException In case that one or more of the given array entries are invalid
     */
    public function populate(array $data);

}