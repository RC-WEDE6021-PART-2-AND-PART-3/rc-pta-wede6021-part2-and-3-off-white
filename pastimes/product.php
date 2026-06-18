<?php
session_start();
include("includes/DBConn.php");

// protect page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// get product id safely
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// fetch product
$result = $conn->query("SELECT * FROM tblClothes WHERE id=$id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Details</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<?php include("includes/nav.php"); ?>

<div class="container">

<?php if ($row) { ?>

    <div class="card">

        <h2><?php echo $row['title']; ?></h2>

        <img src="images/<?php echo $row['image']; ?>" width="300">

        <p><?php echo $row['description']; ?></p>

        <h3>💰 Price: R <?php echo number_format($row['price'], 2); ?></h3>

        <a href="cart.php?add=<?php echo $row['id']; ?>">
            🛒 Add to Cart
        </a>

    </div>

<?php } else { ?>

    <p>❌ Product not found</p>
    <a href="clothes.php">Back to Shop</a>

<?php } ?>

</div>

</body>
</html>