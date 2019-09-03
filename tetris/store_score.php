<?php
$host = "localhost";
$user = "id9791891_lulu98";
$password = "a1b2c3d4";
$database = "id9791891_luludb";
// 1. Verbindungsaufbau zum DBMS (Zugangsdaten aus .my.cnf):
$conn = new mysqli($host , $user , $password , $database);
// 2. Ausführen der SELECT -Query:
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// prepare and bind
$stmt = $conn->prepare("INSERT INTO tetris (name, score) VALUES (?, ?)");
$stmt->bind_param("si", $name, $score);

// set parameters and execute
$name = $_POST["name"];
$score = $_POST["score"];
$stmt->execute();

$stmt->close();
$conn->close();

header("Location: show_highscore.php");
 ?>
