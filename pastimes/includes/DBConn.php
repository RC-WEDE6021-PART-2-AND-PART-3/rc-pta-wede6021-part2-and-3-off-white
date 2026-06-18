<?php
// Pastimes - Database Connection File
// Student: YOUR NAME & STUDENT NUMBER

$host = "localhost";
$user = "root";
$password = "";
$dbname = "ClothingStore";

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>