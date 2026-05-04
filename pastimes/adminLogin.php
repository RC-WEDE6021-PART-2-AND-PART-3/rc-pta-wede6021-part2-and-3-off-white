<?php
session_start();
include("includes/DBConn.php");

$message = "";

// If already logged in, redirect
if (isset($_SESSION['admin'])) {
    header("Location: adminDashboard.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = md5($_POST['password']); // PoE consistency

    $sql = "SELECT * FROM tblAdmin WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {

        $_SESSION['admin'] = true;
        $_SESSION['admin_name'] = $username;

        header("Location: adminDashboard.php");
        exit();

    } else {
        $message = "❌ Invalid admin login credentials";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="container">

    <h2>🛠 Admin Login</h2>

    <div class="card" style="max-width:350px; margin:auto;">

        <form method="POST">

            <input type="text" name="username" placeholder="Username" required style="width:100%; padding:10px;"><br><br>

            <input type="password" name="password" placeholder="Password" required style="width:100%; padding:10px;"><br><br>

            <button type="submit" style="width:100%;">Login</button>

        </form>

        <p style="color:red; text-align:center;">
            <?php echo $message; ?>
        </p>

    </div>

    <!--  NAVIGATION -->
    <p style="text-align:center; margin-top:20px;">
        👤 Not an admin? 
        <a href="login.php">User Login</a>
    </p>

</div>

</body>
</html>