<?php

use PHPUnit\Framework\TestCase;

// Include the file with the determineInputType function
require_once 'scripts/DetermineInputType.php';

class DetermineInputTypeTest extends TestCase
{
    // Test if the input is a number
    public function testInputIsNumber()
    {
        $input = '12345';
        $result = determineInputType($input);
        $this->assertEquals('The input is a number.', $result);
    }

    // Test if the input is a float number
    public function testInputIsFloat()
    {
        $input = '123.45';
        $result = determineInputType($input);
        $this->assertEquals('The input is a number.', $result);
    }

    // Test if the input is text
    public function testInputIsText()
    {
        $input = 'HelloWorld';
        $result = determineInputType($input);
        $this->assertEquals('The input is text.', $result);
    }

    // Test if the input is alphanumeric text
    public function testInputIsAlphanumeric()
    {
        $input = 'Hello123';
        $result = determineInputType($input);
        $this->assertEquals('The input is text.', $result);
    }

    // Test if the input is an empty string
    public function testInputIsEmpty()
    {
        $input = '';
        $result = determineInputType($input);
        $this->assertEquals('The input is text.', $result);
    }
}
