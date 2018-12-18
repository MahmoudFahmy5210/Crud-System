<?php
include'../crud_conn.php';
$id=$_GET['id'];
$sql="DELETE FROM lit_s_story WHERE id='$id'";
mysqli_query($conn, $sql);
header("location: lit.php");
?>

