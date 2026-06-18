<?php
include("includes/DBConn.php");

// DROP & CREATE USER TABLE
$conn->query("DROP TABLE IF EXISTS tblUser");

$conn->query("
CREATE TABLE tblUser (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    username VARCHAR(100),
    password VARCHAR(255),
    isVerified INT DEFAULT 0
)");

// READ TEXT FILE
$file = fopen("data/tblUser.txt", "r");

while (($line = fgetcsv($file)) !== FALSE) {

    $name = $line[0];
    $email = $line[1];
    $username = $line[2];
    $password = $line[3];

    $conn->query("
        INSERT INTO tblUser (name, email, username, password)
        VALUES ('$name', '$email', '$username', '$password')
    ");
}

fclose($file);

echo "Users loaded successfully!";
?>