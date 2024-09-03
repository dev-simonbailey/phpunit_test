<?php

use PHPUnit\Framework\TestCase;

require_once 'scripts/DateCheck.php';

class DateCheckTest extends TestCase
{
    public function testDateBeforeToday()
    {
        $date = '2023-10-01'; // A date before today (assuming today is after this date)
        $result = checkDateBeforeToday($date);
        $this->assertEquals("The supplied date is before today's date.", $result);
    }

    public function testDateToday()
    {
        $date = date('Y-m-d'); // Today's date
        $result = checkDateBeforeToday($date);
        $this->assertEquals("The supplied date is today or in the future.", $result);
    }

    public function testDateInFuture()
    {
        $date = '2025-12-31'; // A date in the future
        $result = checkDateBeforeToday($date);
        $this->assertEquals("The supplied date is today or in the future.", $result);
    }

    public function testInvalidDateFormat()
    {
        $this->expectException(Exception::class); // Expect an exception for invalid date
        $date = 'invalid-date';
        checkDateBeforeToday($date);
    }

    public function testLeapYearDate()
    {
        $date = '2028-02-29'; // A leap year date
        $result = checkDateBeforeToday($date);
        $this->assertEquals("The supplied date is today or in the future.", $result);
    }

    public function testEdgeCaseEndOfMonth()
    {
        $date = '2023-10-31'; // End of October (assuming today is November 1st)
        $result = checkDateBeforeToday($date);
        $this->assertEquals("The supplied date is before today's date.", $result);
    }
}

?>