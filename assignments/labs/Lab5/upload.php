<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $file = $_FILES['profileImage'];

    echo "<p>Form submitted successfully</p>";
}