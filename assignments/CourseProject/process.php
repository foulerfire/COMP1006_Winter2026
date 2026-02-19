<?php
//script only runs when form is submitted using submit
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Invalid request');
}

// sanitize user input
$firstName = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
$lastName  = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
$position  = filter_input(INPUT_POST, 'position', FILTER_SANITIZE_SPECIAL_CHARS);
$email     = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$phone     = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
$team      = filter_input(INPUT_POST, 'team', FILTER_SANITIZE_SPECIAL_CHARS);

// validat user input on server
$errors = [];

if ($firstName === null || $firstName === '') 
    $errors[] = "First name required";
if ($lastName === null || $lastName === '') 
    $errors[] = "Last name required";
if ($position === null || $position === '') 
    $errors[] = "Position required";
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    $errors[] = "Valid email required";
if ($phone === null || $phone === '') 
    $errors[] = "Phone number required";
if ($team === null || $team === '') 
    $errors[] = "Team name required";
// loops through all errors that occured
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<p>$error</p>";
    }
    exit;
}

require "includes/connect.php";
//insert player data in to table
$sql = "
INSERT INTO players
(first_name, last_name, position, email, phone, team_name)
VALUES
(:first, :last, :position, :email, :phone, :team)
";

$stmt = $db->prepare($sql);

//bind player info
$stmt->bindValue(':first', $firstName);
$stmt->bindValue(':last', $lastName);
$stmt->bindValue(':position', $position);
$stmt->bindValue(':email', $email);
$stmt->bindValue(':phone', $phone);
$stmt->bindValue(':team', $team);

$stmt->execute();

// redirect to list after player successfully added to database
header("Location: players.php");
exit;
