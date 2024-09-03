<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];

    if(empty($email)){
        echo "No Email Address Supplied";
    }

    // Validate the email address
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "The email address '$email' is valid.";
    } else {
        echo "The email address '$email' is not valid.";
    }
} else {
    echo "Invalid request method.";
}
?>