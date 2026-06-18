<?php
session_start();
include("includes/DBConn.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $message = $_POST['message'];

    $conn->query("
        INSERT INTO tblMessages (sender, receiver, message)
        VALUES ('$user', 'admin', '$message')
    ");
}
?>

<h2>Messages</h2>

<form method="POST">

    <textarea name="message" required></textarea><br><br>

    <button type="submit">Send Message</button>

</form>

<hr>

<h3>Inbox</h3>

<?php
$result = $conn->query("
    SELECT * FROM tblMessages
    WHERE receiver='admin'
    ORDER BY date_sent DESC
");

while($row = $result->fetch_assoc()) {
    echo "<p><b>From:</b> ".$row['sender']."<br>";
    echo $row['message']."<hr></p>";
}
?>