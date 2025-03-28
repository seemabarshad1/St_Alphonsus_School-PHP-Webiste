<?php
include 'connection.php';
$id = $_GET['id'];
$conn->query("DELETE FROM Teachers WHERE Teacher_ID=$id");
header("Location: teacher.php");
?>
