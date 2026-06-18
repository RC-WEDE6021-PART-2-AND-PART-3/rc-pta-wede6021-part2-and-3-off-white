<?php
session_start();
include("includes/DBConn.php");

// protect page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$result = $conn->query("SELECT * FROM tblOrders WHERE user_id=$user_id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Orders</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<?php include("includes/nav.php"); ?>

<div class="container">

    <h2>📦 My Orders</h2>

    <?php if ($result && $result->num_rows > 0) { ?>

        <?php while ($row = $result->fetch_assoc()) { ?>

            <div class="card">

                <h3>Order #<?php echo $row['id']; ?></h3>

                <p><strong>Total:</strong> R <?php echo number_format($row['total'], 2); ?></p>

                <p><strong>Status:</strong> <?php echo $row['status']; ?></p>

            </div>

        <?php } ?>

    <?php } else { ?>

        <p>📭 You have no orders yet.</p>
        <a href="clothes.php">Start Shopping</a>

    <?php } ?>

</div>

</body>
</html>