<?php
include("includes/DBConn.php");

$id = (int)$_GET['id'];

$conn->query("DELETE FROM tblClothes WHERE id=$id");

header("Location: adminClothes.php");
exit();
?>