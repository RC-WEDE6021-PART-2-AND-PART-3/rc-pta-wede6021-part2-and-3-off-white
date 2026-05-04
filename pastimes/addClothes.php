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

        $sql = "INSERT INTO tblClothes (title, description, price, image, user_id)
                VALUES ('$title','$description','$price','$imageName','$user_id')";

        if ($conn->query($sql)) {
            $message = "✅ Item added successfully!";
        } else {
            $message = "❌ Database error: " . $conn->error;
        }

    } else {
        $message = "❌ Image upload failed.";
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

        <input type="text" name="title" placeholder="Item Title" required><br><br>

        <textarea name="description" placeholder="Item Description" required></textarea><br><br>

        <input type="number" name="price" placeholder="Price (R)" required><br><br>

        <input type="file" name="image" required><br><br>

        <button type="submit">Upload Item</button>

    </form>

    <p><strong><?php echo $message; ?></strong></p>

</div>

</body>
</html>