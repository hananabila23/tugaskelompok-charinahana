<?php 
include 'Kuliah.php'; 
$id = $_GET['id'];
$id = intval($id);
mysqli_query($conn, "DELETE FROM KRS WHERE id = $id");
header("Location: index.php");
exit;
?>
