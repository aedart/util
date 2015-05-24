<?php

use Aedart\Util\Traits\populate\PopulateHelperTrait;

/**
 * Class PopulateHelperTraitTest
 *
 * @coversDefaultClass Aedart\Util\Traits\populate\PopulateHelperTrait
 *
 * @author Alin Eugen Deac <aedart@gmail.com>
 */
class PopulateHelperTraitTest extends UnitTestCase {

    /*********************************************************************************
     * Helpers
     ********************************************************************************/

    /**
     * Get the trait in question
     *
     * @return PHPUnit_Framework_MockObject_MockObject|Aedart\Util\Traits\populate\PopulateHelperTrait
     */
    protected function getTraitMock(){
        return $this->getMockForTrait('Aedart\Util\Traits\populate\PopulateHelperTrait');
    }

    /*********************************************************************************
     * Actual tests
     ********************************************************************************/

    /**
     * @test
     *
     * @covers ::assertPopulateData
     *
     * @expectedException Exception
     */
    public function failWhenTooFewPropertiesAreProvided(){
        $trait = $this->getTraitMock();

        $required = ['a', 'b', 'c'];
        $data = [
            'a' => $this->faker->word,
            'b' => $this->faker->word,
        ];

        $trait->assertPopulateData($data, $required);
    }

    /**
     * @test
     *
     * @covers ::assertPopulateData
     *
     * @expectedException Exception
     */
    public function failWhenIncorrectPropertiesAreProvided(){
        $trait = $this->getTraitMock();

        $required = ['a', 'b', 'c'];
        $data = [
            'a' => $this->faker->word,
            'b' => $this->faker->word,
            'd' => $this->faker->word,
        ];

        $trait->assertPopulateData($data, $required);
    }

    /**
     * @test
     *
     * @covers ::assertPopulateData
     */
    public function doNothingIfAllRequiredAreProvided(){
        $trait = $this->getTraitMock();

        $required = ['a', 'b', 'c'];
        $data = [
            'a' => $this->faker->word,
            'b' => $this->faker->word,
            'c' => $this->faker->word,
        ];

        $trait->assertPopulateData($data, $required);
    }
}