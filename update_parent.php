<?php
include 'connection.php';

// Get parent details if ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM Parents WHERE Parent_ID=$id");
    $row = $result->fetch_assoc();
}

// Handle form submission for updating parent
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "UPDATE Parents 
            SET FirstName='$first_name', LastName='$last_name', Email='$email', 
                Phone='$phone', Address='$address' 
            WHERE Parent_ID=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Parent updated successfully!');</script>";
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
    <title>Update Parent</title>
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

    <h2>Update Parent</h2>
    <form action="update_parent.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['Parent_ID']; ?>">
        <input type="text" name="first_name" value="<?php echo $row['FirstName']; ?>" required>
        <input type="text" name="last_name" value="<?php echo $row['LastName']; ?>" required>
        <input type="email" name="email" value="<?php echo $row['Email']; ?>" required>
        <input type="text" name="phone" value="<?php echo $row['Phone']; ?>" required>
        <textarea name="address" required><?php echo $row['Address']; ?></textarea>
        <input type="submit" value="Update Parent">
    </form>
</body>
</html>
