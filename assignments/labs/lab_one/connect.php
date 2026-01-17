<?php
declare(strict_types=1);

$host = "localhost";//host name
$db = "lab1";//database name
$user = "root";//username
$password = "";//password

$dsn = "mysql:host=$host;dbname=$db";//points to database

//try to connect, if connected echo a yay message
try{
    $pdo = new PDO ($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "<p> Yay Connected! </p>";

}
//what happens if there is an error connecting
catch(PDOException $e){
    die("database connection failed: " . $e->getMessage());
}