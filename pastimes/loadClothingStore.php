<?php
include("includes/DBConn.php");

// DROP TABLES IF THEY EXIST
$conn->query("DROP TABLE IF EXISTS tblOrderItems");
$conn->query("DROP TABLE IF EXISTS tblOrders");
$conn->query("DROP TABLE IF EXISTS tblClothes");
$conn->query("DROP TABLE IF EXISTS tblUser");

// CREATE USER TABLE
$conn->query("
CREATE TABLE tblUser (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    username VARCHAR(100),
    password VARCHAR(255),
    isVerified INT DEFAULT 0
)");

// CREATE CLOTHES TABLE
$conn->query("
CREATE TABLE tblClothes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    description TEXT,
    price DECIMAL(10,2),
    image VARCHAR(255),
    user_id INT
)");

// CREATE ORDERS TABLE
$conn->query("
CREATE TABLE tblOrders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    total DECIMAL(10,2),
    status VARCHAR(50)
)");

// CREATE ORDER ITEMS TABLE
$conn->query("
CREATE TABLE tblOrderItems (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    product_id INT
)");

echo "Database rebuilt successfully!";
?>