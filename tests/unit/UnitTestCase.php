<?php

use Faker\Factory as FakerFactory;

/**
 * Class UnitTestCase
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
abstract class UnitTestCase extends \Codeception\TestCase\Test
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

}