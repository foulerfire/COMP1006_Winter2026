<?php
require "includes/connect.php";

// sanitize
$firstName = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
$lastName  = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
$position  = filter_input(INPUT_POST, 'position', FILTER_SANITIZE_SPECIAL_CHARS);
$email     = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$phone     = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
$team      = filter_input(INPUT_POST, 'team', FILTER_SANITIZE_SPECIAL_CHARS);