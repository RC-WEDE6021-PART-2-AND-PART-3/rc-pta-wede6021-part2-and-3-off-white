<?php
include("includes/DBConn.php");

$id = (int)$_GET['id'];

$result = $conn->query("SELECT * FROM tblClothes WHERE id=$id");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST['title'];
    $brand = $_POST['brand'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $conn->query("
        UPDATE tblClothes SET
        title='$title',
        brand='$brand',
        description='$description',
        price='$price'
        WHERE id=$id
    ");

    header("Location: adminClothes.php");
    exit();
}
?>

<h2>Edit Clothing</h2>

<form method="POST">

    <input type="text" name="title" value="<?php echo $row['title']; ?>"><br><br>

    <input type="text" name="brand" value="<?php echo $row['brand']; ?>"><br><br>

    <textarea name="description"><?php echo $row['description']; ?></textarea><br><br>

    <input type="number" name="price" value="<?php echo $row['price']; ?>"><br><br>

    <button type="submit">Update</button>

</form>