<?php
session_start();
include("includes/DBConn.php");

// protect page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST['title'];
$brand = $_POST['brand'];
$description = $_POST['description'];
$price = $_POST['price'];
    $user_id = $_SESSION['user_id'];

    // image upload
    $imageName = time() . "_" . $_FILES['image']['name'];
    $target = "images/" . $imageName;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {

        // BASIC SECURITY IMPROVEMENT (escape input)
        $title = mysqli_real_escape_string($conn, $title);
        $description = mysqli_real_escape_string($conn, $description);
        $brand = mysqli_real_escape_string($conn, $brand);

       $sql = "INSERT INTO tblClothes
(title, description, brand, price, image, user_id)
VALUES
('$title', '$description', '$brand', '$price', '$imageName', '$user_id')";

if(mysqli_query($conn, $sql))
{
    $message = "✅ Clothing item submitted successfully.";
}
else
{
    $message = "❌ Database error: " . mysqli_error($conn);
}
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sell Item</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<?php include("includes/nav.php"); ?>

<div class="container">

    <h2>Sell Clothing Item 👕</h2>

    <form method="POST" enctype="multipart/form-data">

        <input type="text" name="title" placeholder="Title" required>

<input type="text" name="brand" placeholder="Brand" required>

<textarea name="description" placeholder="Description"></textarea>

<input type="number" name="price" placeholder="Price" required>

<input type="file" name="image" required>

        <button type="submit">Upload Item</button>

    </form>

    <p><strong><?php echo $message; ?></strong></p>

</div>

</body>
</html>