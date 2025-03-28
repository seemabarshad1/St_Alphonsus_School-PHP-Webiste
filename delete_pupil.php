
<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM Pupils WHERE Pupil_ID=$id");
}

header("Location: pupil.php");
exit();
?>
