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

    $id = $_GET['add'];

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]++;
    } else {
        $_SESSION['cart'][$id] = 1;
    }
}

// REMOVE ITEM
if (isset($_GET['remove'])) {

    $id = $_GET['remove'];

    if (isset($_SESSION['cart'][$id])) {
        unset($_SESSION['cart'][$id]);
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

    foreach ($_SESSION['cart'] as $id => $quantity) {

  $result = $conn->query("SELECT * FROM tblClothes WHERE id=".(int)$id);

if (!$result || $result->num_rows == 0) {
    continue;
}

$row = $result->fetch_assoc();

if (!$row) {
    continue;
}

        echo "
        <div class='card'>
            <img src='images/".$row['image']."'>
            <h3>".$row['title']."</h3>
            <p>R ".$row['price']."</p>
            <p>Quantity: ".$quantity."</p>

            <a href='cart.php?remove=".$row['id']."'>Remove</a>
        </div>
        ";
        $total += ($row['price'] * $quantity);
    }

    echo "<h3>Total: R ".$total."</h3>";
    echo "<a href='checkout.php'>Proceed to Checkout</a>";

    echo "<div><a href='clothes.php' class='continue-btn'>Continue Shopping</a></div>";
} else {
    echo "<p>🛒 Your cart is empty</p>";
    echo "<a href='clothes.php'>Go Shopping</a>";
}

?>

</div>

</body>
</html>