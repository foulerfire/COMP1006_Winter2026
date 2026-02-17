<?php
//script only runs when form is submitted using submit
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Invalid request');
}
require "includes/connect.php";

// sanitize user input
$firstName = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
$lastName  = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
$position  = filter_input(INPUT_POST, 'position', FILTER_SANITIZE_SPECIAL_CHARS);
$email     = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$phone     = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
$team      = filter_input(INPUT_POST, 'team', FILTER_SANITIZE_SPECIAL_CHARS);

// validat user input
$errors = [];

if ($firstName === null || $firstName === '') $errors[] = "First name required";
if ($lastName === null || $lastName === '') $errors[] = "Last name required";
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid email required";

if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<p>$error</p>";
    }
    exit;
}