<?php
include 'connection.php';

// Get class details if ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM Classes WHERE Class_ID=$id");
    $row = $result->fetch_assoc();
}

// Handle form submission for updating class
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $class_name = $_POST['class_name'];
    $teacher_id = $_POST['teacher_id'];
    $capacity = $_POST['capacity'];

    $sql = "UPDATE Classes SET ClassName='$class_name', Teacher_ID='$teacher_id', Capacity='$capacity' WHERE Class_ID=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Class updated successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
    header("Location: class.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style1.css">
    <title>Update Class</title>
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

    <h2>Update Class</h2>
    <form action="update_class.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['Class_ID']; ?>">
        <input type="text" name="class_name" value="<?php echo $row['ClassName']; ?>" required>
        <input type="number" name="teacher_id" value="<?php echo $row['Teacher_ID']; ?>" required>
        <input type="number" name="capacity" value="<?php echo $row['Capacity']; ?>" required>
        <input type="submit" value="Update Class">
    </form>
</body>
</html>
