<?php

use PHPUnit\Framework\TestCase;

class ValidateEmailTest extends TestCase
{
    /**
     * Test valid email POST request
     */
    public function testValidEmail()
    {
        // Simulate a POST request
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST['email'] = 'test@example.com';

        // Capture the output
        ob_start();
        include 'scripts/validate_email.php'; // Replace with the actual filename
        $output = ob_get_clean();

        // Assert the expected output
        $this->assertEquals("The email address 'test@example.com' is valid.", $output);
    }

    /**
     * Test invalid email POST request
     */
    public function testInvalidEmail()
    {
        // Simulate a POST request
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST['email'] = 'invalid-email';

        // Capture the output
        ob_start();
        include 'scripts/validate_email.php'; // Replace with the actual filename
        $output = ob_get_clean();

        // Assert the expected output
        $this->assertEquals("The email address 'invalid-email' is not valid.", $output);
    }

    /**
     * Test invalid request method (GET)
     */
    public function testInvalidRequestMethod()
    {
        // Simulate a GET request
        $_SERVER['REQUEST_METHOD'] = 'GET';

        // Capture the output
        ob_start();
        include 'scripts/validate_email.php'; // Replace with the actual filename
        $output = ob_get_clean();

        // Assert the expected output
        $this->assertEquals("Invalid request method.", $output);
    }
    /**
    * Test valid request method (POST), but with mno email address passed in
    */
    public function testValidSubDomainEmailAddress()
    {
        // Simulate a POST request
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST['email'] = 'test@subdomain.example.com';

        // Capture the output
        ob_start();
        include 'scripts/validate_email.php'; // Replace with the actual filename
        $output = ob_get_clean();

        // Assert the expected output
        $this->assertEquals("The email address 'test@subdomain.example.com' is valid.", $output);
    }
}
