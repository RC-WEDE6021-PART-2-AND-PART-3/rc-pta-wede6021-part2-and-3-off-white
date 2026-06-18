<?php
include("includes/DBConn.php");

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // sanitize inputs
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // validation
    if (strlen($password) < 8) {
        $message = "⚠️ Password must be at least 8 characters long.";
    } else {

        // hash password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // insert user (default unverified)
        $sql = "INSERT INTO tblUser 
        (name, email, username, password, isVerified)
        VALUES 
        ('$name', '$email', '$username', '$hashedPassword', 0)";

        if ($conn->query($sql)) {
            $message = "✅ Registration successful! Await admin verification.";
        } else {
            $message = "❌ Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="container">

    <h2>📝 Create Account</h2>

    <form method="POST">

        <input type="text" name="name" placeholder="Full Name" required><br><br>

        <input type="email" name="email" placeholder="Email" required><br><br>

        <input type="text" name="username" placeholder="Username" required><br><br>

        <input type="password" name="password" placeholder="Password (min 8 chars)" required><br><br>

        <button type="submit">Register</button>

    </form>

    <p><strong><?php echo $message; ?></strong></p>
    
    <!--  ADMIN ACCESS LINK -->
    <p style="text-align:center; margin-top:20px;">
        🛠 Are you an admin? 
        <a href="adminLogin.php">Admin Login</a>
    </p>

</div>

</body>
</html>