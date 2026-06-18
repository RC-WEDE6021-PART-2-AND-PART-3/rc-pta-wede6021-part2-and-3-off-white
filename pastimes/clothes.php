<?php
session_start();
include("includes/DBConn.php");

// protect page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// inputs
$search = $_GET['search'] ?? '';
$maxPrice = $_GET['price'] ?? '';

// base query
$sql = "SELECT * FROM tblClothes WHERE 1=1";

// safe filtering (basic sanitization)
$search = mysqli_real_escape_string($conn, $search);
$maxPrice = mysqli_real_escape_string($conn, $maxPrice);

// search filter
if (!empty($search)) {
    $sql .= " AND title LIKE '%$search%'";
}

// price filter
if (!empty($maxPrice)) {
    $sql .= " AND price <= $maxPrice";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shop</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<?php include("includes/nav.php"); ?>

<div class="container">

    <h2>🛍 Browse Clothes</h2>

    <!-- FILTER SEARCH -->
    <form method="GET">
        <input type="text" name="search" placeholder="Search item..." value="<?php echo $search; ?>">
        <input type="number" name="price" placeholder="Max price" value="<?php echo $maxPrice; ?>">
        <button type="submit">Filter</button>
    </form>

    <br>

    <!-- AJAX SEARCH (kept but cleanly separated) -->
    <input type="text" id="searchBox" placeholder="Live search...">
    <div id="results"></div>

    <br>

    <!-- PRODUCTS -->
    <div>

        <?php if ($result->num_rows > 0) { ?>

            <?php while($row = $result->fetch_assoc()) { ?>

                <div class="card">

                    <img src="images/<?php echo $row['image']; ?>">

                    <h3><?php echo $row['title']; ?></h3>
                    <p><strong>Brand:</strong> <?php echo $row['brand']; ?></p>

                    <p>R <?php echo number_format($row['price'], 2); ?></p>

                    <a href="product.php?id=<?php echo $row['id']; ?>">View</a>
                    <a href="cart.php?add=<?php echo $row['id']; ?>">Add to Cart</a>

                </div>

            <?php } ?>

        <?php } else { ?>

            <p>❌ No items found</p>

        <?php } ?>

    </div>

</div>

<script>
document.getElementById("searchBox").addEventListener("keyup", function() {

    let query = this.value;

    fetch("search.php?q=" + query)
    .then(res => res.text())
    .then(data => {
        document.getElementById("results").innerHTML = data;
    });

});
</script>

</body>
</html>