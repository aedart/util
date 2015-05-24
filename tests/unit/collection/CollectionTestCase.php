<?php

use Faker\Factory as FakerFactory;

/**
 * Class Collection Test Case
 *
 * Base test case class for most collection tests
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 * @package unit\collection
 */
abstract class CollectionTestCase extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    /**
     * Instance of faker
     *
     * @var \Faker\Generator
     */
    protected $faker = null;

    protected function _before()
    {
        $this->faker = FakerFactory::create();
    }

    protected function _after()
    {
    }

    /*********************************************************************************
     * Helpers
     ********************************************************************************/

    /**
     * Returns a list of key => value pairs, where the keys are
     * unique
     *
     * @return array
     */
    protected function getListOfKeyValuePairs(){
        return [
            $this->faker->unique()->word => $this->faker->boolean(),
            $this->faker->unique()->word => $this->faker->sentence(),
            $this->faker->unique()->word => $this->faker->randomNumber(),
        ];
    }

    /*********************************************************************************
     * Actual tests
     ********************************************************************************/

}