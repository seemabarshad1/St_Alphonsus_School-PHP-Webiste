<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM Parents WHERE Parent_ID=$id");
}

header("Location: parent.php");
exit();
?>
