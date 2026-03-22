<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $file = $_FILES['profileImage'];

    echo "<p>Form submitted successfully</p>";
}

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $file = $_FILES['profileImage'];

    $fileName = $file['name'];
    $tempName = $file['tmp_name'];

    $uploadPath = "uploads/" . $fileName;

    if (move_uploaded_file($tempName, $uploadPath)) {
        echo "<p>Upload successful!</p>";
    } else {
        echo "<p>Upload failed.</p>";
    }
}