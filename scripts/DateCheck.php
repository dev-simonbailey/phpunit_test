<?php

function checkDateBeforeToday($date) {
    $inputDate = new DateTime($date);
    $today = new DateTime(); // Current date and time

    // Set both dates to midnight to ignore the time component
    $inputDate->setTime(0, 0);
    $today->setTime(0, 0);

    if ($inputDate < $today) {
        return "The supplied date is before today's date.";
    } else {
        return "The supplied date is today or in the future.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userDate = $_POST['userDate'];

    // Call the function to check the date
    $result = checkDateBeforeToday($userDate);

    // Display the result
    echo "<h2>Result:</h2>";
    echo "<p>$result</p>";
}
?>
