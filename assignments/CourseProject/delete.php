<?php
// deletes a player from the database using the player id
//database connection and user authentication
require "includes/auth.php";
require "includes/connect.php";

// make sure an id was passed in the url
$playerId = $_GET['id'];

// sql query to delete player
$userId = $_SESSION['user_id'];
$sql = "DELETE FROM players WHERE player_id = :player_id AND user_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':player_id', $playerId);
$stmt->bindValue(':user_id', $userId, PDO::PARAM_INT);
$stmt->execute();

// prepare sql statement
$stmt = $pdo->prepare($sql);

// bind player id to query
$stmt->bindParam(':player_id', $playerId);

// execute delete
$stmt->execute();

// redirect back to players list
header("Location: players.php");
exit;
