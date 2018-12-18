<?php
include'../crud_conn.php';
$id=$_GET['id'];
$sql="DELETE FROM rel WHERE id='$id'";
mysqli_query($conn, $sql);
header("location: rel.php");
?>

