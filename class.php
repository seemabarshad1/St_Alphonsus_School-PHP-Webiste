<?php
include 'connection.php';

// Fetch all classes
$result = $conn->query("SELECT * FROM Classes");

// Handle form submission for adding a new class
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $class_name = $_POST['class_name'];
    $teacher_id = $_POST['teacher_id']; 
    $capacity = $_POST['capacity'];

    $sql = "INSERT INTO Classes (ClassName, Teacher_ID, Capacity) VALUES ('$class_name', '$teacher_id', '$capacity')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Class added successfully!');</script>";
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
    <title>Manage Classes</title>
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

    <h2>Class List</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Class Name</th>
            <th>Teacher ID</th>
            <th>Capacity</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['Class_ID']; ?></td>
            <td><?php echo $row['ClassName']; ?></td>
            <td><?php echo $row['Teacher_ID']; ?></td>
            <td><?php echo $row['Capacity']; ?></td>
            <td>
                <a href="update_class.php?id=<?php echo $row['Class_ID']; ?>">Edit</a>
                <a href="delete_class.php?id=<?php echo $row['Class_ID']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>

    <h2>Add New Class</h2>
    <form action="class.php" method="post">
        <input type="text" name="class_name" placeholder="Class Name" required>
        <input type="number" name="teacher_id" placeholder="Teacher ID" required>
        <input type="number" name="capacity" placeholder="Capacity" required>
        <input type="submit" value="Add Class">
    </form>
</body>
</html>
