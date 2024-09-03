<?php

function determineInputType($input) {
    if (is_numeric($input)) {
        return "The input is a number.";
    } else {
        return "The input is text.";
    }
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userInput = $_POST['userInput'];
    $result = determineInputType($userInput);
    
    // Display the result
    echo "<h2>Result:</h2>";
    echo "<p>$result</p>";
}
?>
