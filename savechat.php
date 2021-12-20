<?php 
include 'php/process.php';
session_start();
$from = $_SESSION["id"];
$to= $_SESSION["to"];
$message = $_POST["message"];
$timestamp=date("Y-m-d H:i:s");

connect_database();
$sql= "INSERT INTO chat (`user_from`,`user_to`,`message`,`TIMESTAMP`) values ('$from','$to','$message','$timestamp')";

$conn->query($sql);

echo "ok";