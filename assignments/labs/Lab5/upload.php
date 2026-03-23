<?php

// check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // get uploaded file info
    $file = $_FILES['profileImage'];

    // store file name and temp location
    $fileName = $file['name'];
    $tempName = $file['tmp_name'];

    // set upload path
    $uploadPath = "uploads/" . $fileName;

    // move file to uploads folder
    if (move_uploaded_file($tempName, $uploadPath)) {

        echo "<p>Upload successful!</p>";

        // display uploaded image
        echo "<img src='$uploadPath' width='200'>";

    } else {
        echo "<p>Upload failed.</p>";
    }
}