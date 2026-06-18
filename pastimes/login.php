<?php
session_start();
include("includes/DBConn.php");

$message = "";

// If already logged in
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM tblUser WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $user = $result->fetch_assoc();

        // Check verification
        if ($user['isVerified'] == 0) {
            $message = "⏳ Your account is not verified by admin yet.";
        } else {

            if (password_verify($password, $user['password'])) {

                $_SESSION['user_id'] = $user['id'];
                $_SESSION['name'] = $user['name'];

                header("Location: dashboard.php");
                exit();

            } else {
                $message = "❌ Incorrect password.";
            }
        }

    } else {
        $message = "❌ User not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="container">

    <h2>👤 User Login</h2>

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

    <!--  ADMIN ACCESS LINK -->
    <p style="text-align:center; margin-top:20px;">
        🛠 Are you an admin? 
        <a href="adminLogin.php">Admin Login</a>
    </p>

    <!-- OPTIONAL: REGISTER LINK -->
    <p style="text-align:center;">
        Don't have an account? 
        <a href="register.php">Register</a>
    </p>

</div>

</body>
</html>