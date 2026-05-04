<?php
session_start();
include("includes/DBConn.php");

// optional: protect (recommended for PoE system consistency)
if (!isset($_SESSION['user_id'])) {
    exit();
}

// get query safely
$search = isset($_GET['q']) ? mysqli_real_escape_string($conn, $_GET['q']) : "";

$sql = "SELECT * FROM tblClothes WHERE title LIKE '%$search%' LIMIT 5";
$result = $conn->query($sql);

// if no results
if ($result->num_rows == 0) {
    echo "<p>No results found</p>";
    exit();
}

// output results
while ($row = $result->fetch_assoc()) {

    echo "
    <div class='card'>

        <img src='images/".$row['image']."'>

        <h4>".$row['title']."</h4>

        <p>R ".number_format($row['price'], 2)."</p>

        <a href='product.php?id=".$row['id']."'>View</a>

    </div>
    ";
}
?>