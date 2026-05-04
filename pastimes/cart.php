<?php
session_start();
include("includes/DBConn.php");

// protect page FIRST
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// create cart if not exists
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// ADD ITEM
if (isset($_GET['add'])) {
    $_SESSION['cart'][] = $_GET['add'];
}

// REMOVE ITEM
if (isset($_GET['remove'])) {
    $key = array_search($_GET['remove'], $_SESSION['cart']);
    if ($key !== false) {
        unset($_SESSION['cart'][$key]);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Cart</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<?php include("includes/nav.php"); ?>

<div class="container">

<h2>🛒 Your Cart</h2>

<?php

$total = 0;

if (!empty($_SESSION['cart'])) {

    foreach ($_SESSION['cart'] as $id) {

        $result = $conn->query("SELECT * FROM tblClothes WHERE id=$id");
        $row = $result->fetch_assoc();

        echo "
        <div class='card'>
            <img src='images/".$row['image']."'>
            <h3>".$row['title']."</h3>
            <p>R ".$row['price']."</p>

            <a href='cart.php?remove=".$row['id']."'>Remove</a>
        </div>
        ";

        $total += $row['price'];
    }

    echo "<h3>Total: R ".$total."</h3>";
    echo "<a href='checkout.php'>Proceed to Checkout</a>";

} else {
    echo "<p>🛒 Your cart is empty</p>";
    echo "<a href='clothes.php'>Go Shopping</a>";
}

?>

</div>

</body>
</html>