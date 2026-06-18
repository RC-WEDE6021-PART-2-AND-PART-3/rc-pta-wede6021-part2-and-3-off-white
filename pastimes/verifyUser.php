<?php
session_start();
include("includes/DBConn.php");

// protect admin access
if (!isset($_SESSION['admin'])) {
    header("Location: adminLogin.php");
    exit();
}

// validate ID
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {

    $conn->query("UPDATE tblUser SET isVerified=1 WHERE id=$id");
}

// redirect back
header("Location: adminDashboard.php");
exit();
?>