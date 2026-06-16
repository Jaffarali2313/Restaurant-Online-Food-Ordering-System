<?php
$conn=mysqli_connect("localhost","root","","mca");
$id=$_GET['id'];
mysqli_query($conn,"DELETE FROM orders WHERE id=$id");
header("Location: orders.php");
?>