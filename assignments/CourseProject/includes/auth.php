<?php
session_start();

// prevent browser caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");

// check if user is logged in
if (empty($_SESSION["user_id"])) {
    header("Location: restricted.php");
    exit();
}