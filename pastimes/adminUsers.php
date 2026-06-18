<?php
include("includes/DBConn.php");

$result = $conn->query("SELECT * FROM tblUser");
?>

<h2>Admin - Users</h2>

<table border="1" width="100%">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Username</th>
        <th>Verified</th>
        <th>Actions</th>
    </tr>

    <?php while($row = $result->fetch_assoc()) { ?>

    <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['isVerified']; ?></td>
        <td>
            <a href="editUser.php?id=<?php echo $row['id']; ?>">Edit</a> |
            <a href="deleteUser.php?id=<?php echo $row['id']; ?>">Delete</a>
        </td>
    </tr>

    <?php } ?>

</table>