<?php

use Behat\Behat\Context\Context;
use PHPUnit\Framework\Assert as PHPUnit;
use HelloPHPUnit\Calculator;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private $calculator;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->calculator = new Calculator();
    }

    /**
     * @Given I have entered :number into the calculator
     */
    public function iHaveEnteredIntoTheCalculator($number)
    {
        $this->calculator->addNumber($number);
    }

    /**
     * @When I press add
     */
    public function iPressAdd()
    {
        $this->calculator->doCalculation();
    }

    /**
     * @Then the result should be :result on the screen
     */
    public function theResultShouldBeOnTheScreen($result)
    {
        PHPUnit::assertEquals($result, $this->calculator->getTotal());
    }
}