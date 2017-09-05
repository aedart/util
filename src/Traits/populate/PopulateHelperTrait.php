<?php namespace Aedart\Util\Traits\populate;

use Exception;

/**
 * Trait Populate Helper
 *
 * Contains a few utilities for assisting to populate a component
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package Aedart\Util\Traits\populate
 */
trait PopulateHelperTrait
{
    /**
     * Assert that the given data array contains all of the required
     * keys
     *
     * @param array $data List of key => value pairs, which should contains all of the required...
     * @param array $required List of keys that must be present in the data-list
     *
     * @throws Exception If there are too few properties provided or if the required properties are not present
     *                  in the given data array
     */
    public function assertPopulateData(array $data, array $required) : void
    {
        // Check if the provided data has less entries, than the
        // required
        if (count($data) < count($required)) {
            throw new Exception(sprintf('Cannot populate %s, incorrect amount of properties given', get_class($this)));
        }

        // Check that all of the required are present
        foreach ($required as $requiredKey) {
            if( ! isset($data[$requiredKey])){
                throw new Exception(sprintf('Cannot populate %s, missing %s', get_class($this), $requiredKey));
            }
        }
    }
}