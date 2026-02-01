<?php
//grab the data, clean and store in a variable
$firstName = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
$lastName  = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);

//validate serverside
$errors = [];

//require text fields
//first name validation
if ($firstName === null || $firstName === ''){
    $errors[] = "First name is required";
}
//last name validation
if ($lastName === null || $lastName === ''){
    $errors[] = "Last name is required";
}
//email validation
if ($email=== null || $email === ''){
    $errors[] = "email is required";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "You must enter a valid email";
}
// message validation
if ($message === null || $message === ''){
    $errors[] = "Message is required";
}
//loop throuhg error messages
if (!empty($errors)) {
    echo "<ul>";
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul>";
    exit;
}
?>

<main>
<!-- validation confirmation message with user enter information -->
<?php 
    echo "<h2> Thank you for contacting us " . $firstName . " ". $lastName. "</h2>"; 
    echo "<h2>The message you sent was</h2>";
    echo "<p>" . ($message) . "</p>";
?>

</main>




