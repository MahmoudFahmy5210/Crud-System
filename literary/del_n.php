<?php
include'../crud_conn.php';
$id=$_GET['id'];
$sql="DELETE FROM lit_novels WHERE id='$id'";
mysqli_query($conn, $sql);
header("location: lit.php");
?>

