<?php
session_start();
include("includes/DBConn.php");

// optional: protect admin page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$result = $conn->query("SELECT * FROM tblClothes");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Clothes</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include("includes/nav.php"); ?>

<h2>Admin - Manage Clothes</h2>

<table border="1" width="100%">
    <tr>
        <th>Image</th>
        <th>Title</th>
        <th>Brand</th>
        <th>Price</th>
        <th>Actions</th>
    </tr>

    <?php while($row = $result->fetch_assoc()) { ?>

    <tr>
        <td><img src="images/<?php echo $row['image']; ?>" width="80"></td>
        <td><?php echo $row['title']; ?></td>
        <td><?php echo $row['brand']; ?></td>
        <td>R <?php echo $row['price']; ?></td>
        <td>
            <a href="editClothing.php?id=<?php echo $row['id']; ?>">Edit</a> |
            <a href="deleteClothing.php?id=<?php echo $row['id']; ?>"
               onclick="return confirm('Delete item?')">Delete</a>
        </td>
    </tr>

    <?php } ?>

</table>

</body>
</html>