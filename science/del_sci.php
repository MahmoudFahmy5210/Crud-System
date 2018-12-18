<?php
include'../crud_conn.php';
$id=$_GET['id'];
$sql="DELETE FROM sci WHERE id='$id'";
mysqli_query($conn, $sql);
header("location: sci.php");
?>

