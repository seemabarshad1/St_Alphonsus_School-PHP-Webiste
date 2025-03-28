<?php
include 'connection.php';

// Get pupil details if ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM Pupils WHERE Pupil_ID=$id");
    $row = $result->fetch_assoc();
}

// Handle form submission for updating pupil
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $medical_info = $_POST['medical_info'];
    $class_id = $_POST['class_id'];

    $sql = "UPDATE Pupils 
            SET FirstName='$first_name', LastName='$last_name', DOB='$dob', Address='$address', 
                Medical_Info='$medical_info', Class_ID='$class_id' 
            WHERE Pupil_ID=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Pupil updated successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
    header("Location: pupil.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style1.css">
    <title>Update Pupil</title>
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

    <h2>Update Pupil</h2>
    <form action="update_pupil.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['Pupil_ID']; ?>">
        <input type="text" name="first_name" value="<?php echo $row['FirstName']; ?>" required>
        <input type="text" name="last_name" value="<?php echo $row['LastName']; ?>" required>
        <input type="date" name="dob" value="<?php echo $row['DOB']; ?>" required>
        <textarea name="address" required><?php echo $row['Address']; ?></textarea>
        <textarea name="medical_info"><?php echo $row['Medical_Info']; ?></textarea>
        <input type="number" name="class_id" value="<?php echo $row['Class_ID']; ?>">
        <input type="submit" value="Update Pupil">
    </form>
</body>
</html>
