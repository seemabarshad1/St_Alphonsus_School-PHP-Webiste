<?php
include 'connection.php';

// Fetch all parents
$result = $conn->query("SELECT * FROM Parents");

// Handle form submission for adding a new parent
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "INSERT INTO Parents (FirstName, LastName, Email, Phone, Address) 
            VALUES ('$first_name', '$last_name', '$email', '$phone', '$address')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Parent added successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
    header("Location: parent.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style1.css">
    <title>Manage Parents</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="teacher.php">Manage Teachers</a></li>
            <li><a href="class.php">Manage Classes</a></li>
            <li><a href="pupil.php">Manage Pupils</a></li>
            <li><a href="parent.php">Manage Parents</a></li>
        </ul>
    </nav>

    <h2>Parent List</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['Parent_ID']; ?></td>
            <td><?php echo $row['FirstName']; ?></td>
            <td><?php echo $row['LastName']; ?></td>
            <td><?php echo $row['Email']; ?></td>
            <td><?php echo $row['Phone']; ?></td>
            <td><?php echo $row['Address']; ?></td>
            <td>
                <a href="update_parent.php?id=<?php echo $row['Parent_ID']; ?>">Edit</a>
                <a href="delete_parent.php?id=<?php echo $row['Parent_ID']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>

    <h2>Add New Parent</h2>
    <form action="parent.php" method="post">
        <input type="text" name="first_name" placeholder="First Name" required>
        <input type="text" name="last_name" placeholder="Last Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="phone" placeholder="Phone" required>
        <textarea name="address" placeholder="Address" required></textarea>
        <input type="submit" value="Add Parent">
    </form>
</body>
</html>
