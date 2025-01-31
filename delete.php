<?php
include 'db.php';

$id = $_GET['id'];
$sql = "SELECT file_name FROM videos WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$file_name = $row['file_name'];

unlink("videos/" . $file_name);

$sql = "DELETE FROM videos WHERE id=$id";
$conn->query($sql);

header("Location: index.php");
exit();
?>
