<?php
include("includes/DBConn.php");

$id = (int)$_GET['id'];

$result = $conn->query("SELECT * FROM tblUser WHERE id=$id");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];

    $conn->query("
        UPDATE tblUser SET
        name='$name',
        email='$email',
        username='$username'
        WHERE id=$id
    ");

    header("Location: adminUsers.php");
    exit();
}
?>

<h2>Edit User</h2>

<form method="POST">

    <input type="text" name="name" value="<?php echo $row['name']; ?>"><br><br>

    <input type="email" name="email" value="<?php echo $row['email']; ?>"><br><br>

    <input type="text" name="username" value="<?php echo $row['username']; ?>"><br><br>

    <button type="submit">Update</button>

</form>