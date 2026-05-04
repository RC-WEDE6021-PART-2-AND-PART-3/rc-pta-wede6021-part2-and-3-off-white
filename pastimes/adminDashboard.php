<?php
session_start();
include("includes/DBConn.php");

// protect page
if (!isset($_SESSION['admin'])) {
    header("Location: adminLogin.php");
    exit();
}

// fetch unverified users
$result = $conn->query("SELECT * FROM tblUser WHERE isVerified=0");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<?php include("includes/nav.php"); ?>

<div class="container">

    <h2>🛠 Admin Dashboard</h2>
    <h3>Unverified Users</h3>

    <?php if ($result->num_rows > 0) { ?>

        <?php while ($row = $result->fetch_assoc()) { ?>

            <div class="card">

                <h3><?php echo $row['name']; ?></h3>
                <p><?php echo $row['email']; ?></p>

                <a href="verifyUser.php?id=<?php echo $row['id']; ?>">
                    ✅ Verify User
                </a>

            </div>

        <?php } ?>

    <?php } else { ?>

        <p>🎉 No users pending verification</p>

    <?php } ?>

</div>

</body>
</html>