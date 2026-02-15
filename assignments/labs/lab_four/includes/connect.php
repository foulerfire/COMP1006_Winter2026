<?php
$dsn = "mysql:host=localhost;dbname=LabFourSubscribers;charset=utf8";
$username = "root";
$password = "";

$db = new PDO($dsn, $username, $password);

//echo "database connected successfully"; //quick check to see if the connect to db was successful 
