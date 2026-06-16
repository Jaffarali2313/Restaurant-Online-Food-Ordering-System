<?php
$conn=mysqli_connect("localhost","root","","mca");

$id = $_POST['id'];
$status = $_POST['status'];

$sql = "UPDATE orders SET status='$status' WHERE id='$id'";

if(mysqli_query($conn,$sql))
{
    header("Location: orders.php");
}
else
{
    echo "Error updating status";
}
?>