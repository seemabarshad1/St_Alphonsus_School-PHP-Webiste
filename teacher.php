<!-- teacher.php (Manage Teachers) -->
<?php
include 'connection.php';

// Handle form submission to add a new teacher
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];

    $sql = "INSERT INTO Teachers (FirstName, LastName, phone, address, AnnualSalary) VALUES ('$firstname', '$lastname', '$phone', '$address', '$salary')";
    $conn->query($sql);
    header("Location: teacher.php");
    exit();
}

// Fetch all teachers
$result = $conn->query("SELECT * FROM Teachers");
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style1.css">
    <title>Manage Teachers</title>
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
    
    <h2>Teacher List</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Salary</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['Teacher_ID']; ?></td>
            <td><?php echo $row['FirstName'] . ' ' . $row['LastName']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['AnnualSalary']; ?></td>
            <td>
                <a href="update_teacher.php?id=<?php echo $row['Teacher_ID']; ?>">Edit</a>
                <a href="delete_teacher.php?id=<?php echo $row['Teacher_ID']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
    
    <h2>Add Teacher</h2>
    <form action="teacher.php" method="post">
        <input type="text" name="firstname" placeholder="First Name" required>
        <input type="text" name="lastname" placeholder="Last Name" required>
        <input type="text" name="phone" placeholder="Phone" required>
        <input type="text" name="address" placeholder="Address" required>
        <input type="number" step="0.01" name="salary" placeholder="Salary" required>
        <input type="submit" value="Add Teacher">
    </form>
</body>
</html>
