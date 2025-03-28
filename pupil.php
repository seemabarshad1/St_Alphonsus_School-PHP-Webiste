<?php
include 'connection.php';

// Fetch all pupils
$result = $conn->query("SELECT * FROM Pupils");

// Handle form submission for adding a new pupil
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $medical_info = $_POST['medical_info'];
    $class_id = $_POST['class_id'];

    $sql = "INSERT INTO Pupils (FirstName, LastName, DOB, Address, Medical_Info, Class_ID) 
            VALUES ('$first_name', '$last_name', '$dob', '$address', '$medical_info', '$class_id')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Pupil added successfully!');</script>";
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
    <title>Manage Pupils</title>
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

    <h2>Pupil List</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Date of Birth</th>
            <th>Address</th>
            <th>Medical Info</th>
            <th>Class ID</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['Pupil_ID']; ?></td>
            <td><?php echo $row['FirstName']; ?></td>
            <td><?php echo $row['LastName']; ?></td>
            <td><?php echo $row['DOB']; ?></td>
            <td><?php echo $row['Address']; ?></td>
            <td><?php echo $row['Medical_Info']; ?></td>
            <td><?php echo $row['Class_ID']; ?></td>
            <td>
                <a href="update_pupil.php?id=<?php echo $row['Pupil_ID']; ?>">Edit</a>
                <a href="delete_pupil.php?id=<?php echo $row['Pupil_ID']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>

    <h2>Add New Pupil</h2>
    <form action="pupil.php" method="post">
        <input type="text" name="first_name" placeholder="First Name" required>
        <input type="text" name="last_name" placeholder="Last Name" required>
        <input type="date" name="dob" required>
        <textarea name="address" placeholder="Address" required></textarea>
        <textarea name="medical_info" placeholder="Medical Info"></textarea>
        <input type="number" name="class_id" placeholder="Class ID">
        <input type="submit" value="Add Pupil">
    </form>
</body>
</html>
