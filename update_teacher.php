<!-- update_teacher.php (Update Teacher) -->
<?php
include 'connection.php';

// Get teacher details if ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM Teachers WHERE Teacher_ID=$id");
    $row = $result->fetch_assoc();
}

// Handle update form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];

    $sql = "UPDATE Teachers SET FirstName='$firstname', LastName='$lastname', phone='$phone', address='$address', AnnualSalary='$salary' WHERE Teacher_ID=$id";
    $conn->query($sql);
    header("Location: teacher.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style1.css">
    <title>Update Teacher</title>
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

    <h2>Update Teacher</h2>
    <form action="update_teacher.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['Teacher_ID']; ?>">
        <input type="text" name="firstname" value="<?php echo $row['FirstName']; ?>" required>
        <input type="text" name="lastname" value="<?php echo $row['LastName']; ?>" required>
        <input type="text" name="phone" value="<?php echo $row['phone']; ?>" required>
        <input type="text" name="address" value="<?php echo $row['address']; ?>" required>
        <input type="number" step="0.01" name="salary" value="<?php echo $row['AnnualSalary']; ?>" required>
        <input type="submit" value="Update Teacher">
    </form>
</body>
</html>
