<?php
require "includes/auth.php";

// clear session data
$_SESSION = [];
session_unset();
session_destroy();

// send user back to login page
header("Location: login.php");
exit;