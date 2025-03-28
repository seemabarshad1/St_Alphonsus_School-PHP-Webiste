
<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM Classes WHERE Class_ID=$id");
}

header("Location: class.php");
exit();
?>
