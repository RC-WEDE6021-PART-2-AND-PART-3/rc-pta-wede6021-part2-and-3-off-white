<?php
session_start();
include("includes/DBConn.php");

// protect page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// check cart
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    $message = "🛒 Your cart is empty";
} else {

    $total = 0;

    // calculate total safely
    foreach ($_SESSION['cart'] as $id) {
        $result = $conn->query("SELECT price FROM tblClothes WHERE id=$id");
        $row = $result->fetch_assoc();
        $total += $row['price'];
    }

    // create order
    $conn->query("
        INSERT INTO tblOrders (user_id, total, status)
        VALUES ($user_id, $total, 'Pending')
    ");

    $order_id = $conn->insert_id;

    // insert order items
    foreach ($_SESSION['cart'] as $id) {
        $conn->query("
            INSERT INTO tblOrderItems (order_id, product_id)
            VALUES ($order_id, $id)
        ");
    }

    // clear cart
    unset($_SESSION['cart']);

    $message = "✅ Order placed successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<?php include("includes/nav.php"); ?>

<div class="container">

    <h2>🧾 Checkout</h2>

    <p><strong><?php echo $message; ?></strong></p>

    <?php if (!isset($error)) { ?>
        <a href="orders.php">📦 View Orders</a>
        <br><br>
        <a href="clothes.php">🛍 Continue Shopping</a>
    <?php } ?>

</div>

</body>
</html>