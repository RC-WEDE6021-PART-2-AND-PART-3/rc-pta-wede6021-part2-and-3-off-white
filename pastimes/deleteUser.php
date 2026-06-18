<?php
include("includes/DBConn.php");

$id = (int)$_GET['id'];

$conn->query("DELETE FROM tblUser WHERE id=$id");

header("Location: adminUsers.php");
exit();
?>