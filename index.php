<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="teacher.php">Manage Teachers</a></li>
            <li><a href="classes.php">Manage Classes</a></li>
            <li><a href="pupil.php">Manage Pupils</a></li>
            <li><a href="parent.php">Manage Parents</a></li>
        </ul>
    </nav>
    
    <div class="container">
        <h2>Dashboard</h2>
        <table>
            <tr>
                <th>Total Classes</th>
                <th>Total Teachers</th>
                <th>Total Pupils</th>
                <th>Total Parents</th>
            </tr>
            <tr>
                <td><?php echo mysqli_fetch_array($conn->query("SELECT COUNT(*) FROM Classes"))[0]; ?></td>
                <td><?php echo mysqli_fetch_array($conn->query("SELECT COUNT(*) FROM Teachers"))[0]; ?></td>
                <td><?php echo mysqli_fetch_array($conn->query("SELECT COUNT(*) FROM Pupils"))[0]; ?></td>
                <td><?php echo mysqli_fetch_array($conn->query("SELECT COUNT(*) FROM Parents"))[0]; ?></td>
            </tr>
        </table>
    </div>
</body>
</html>
