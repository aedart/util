<?php
namespace Aedart\Util\Interfaces;

/**
 * @deprecated Since version 4.0, use \Aedart\Util\Contracts\Populatable instead
 *
 * Interface Populatable
 *
 * <br />
 *
 * Components implementing this interface promise, that the given component can
 * be populated with some kind of data and thereby set its internal properties or
 * states to the given value(s)
 *
 * <br />
 *
 * What kind of properties can be populated / set, is completely implementation
 * dependent.
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Util\Interfaces
 */
interface Populatable extends \Aedart\Util\Contracts\Populatable
{

}