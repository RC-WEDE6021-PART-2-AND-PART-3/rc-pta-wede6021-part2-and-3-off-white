<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<?php include("includes/nav.php"); ?>

<div class="container">

    <h2>👋 Welcome, <?php echo $_SESSION['name']; ?></h2>

    <p>Explore second-hand fashion, shop, or sell your items below.</p>

    <div class="card">
        <h3>🛍 Start Shopping</h3>
        <p>Browse available second-hand clothing items.</p>
        <a href="clothes.php">Go to Shop</a>
    </div>

    <div class="card">
        <h3>➕ Sell Items</h3>
        <p>Upload your clothing and earn money.</p>
        <a href="addClothes.php">Sell Now</a>
    </div>

    <div class="card">
        <h3>🛒 Your Cart</h3>
        <p>View items you added to cart.</p>
        <a href="cart.php">View Cart</a>
    </div>

    <div class="card">
        <h3>📦 Orders</h3>
        <p>Track your purchases and order history.</p>
        <a href="orders.php">View Orders</a>
    </div>

    <br>

    <a href="logout.php">🚪 Logout</a>

</div>

</body>
</html>