<?php
// deletes a player from the database using the player id

// database connection
require "includes/connect.php";

// make sure an id was passed in the url
$playerId = $_GET['id'];

// sql query to delete player
$sql = "DELETE FROM players WHERE player_id = :player_id";

// prepare sql statement
$stmt = $pdo->prepare($sql);

// bind player id to query
$stmt->bindParam(':player_id', $playerId);

// execute delete
$stmt->execute();

// redirect back to players list
header("Location: players.php");
exit;
