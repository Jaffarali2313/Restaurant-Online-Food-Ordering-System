<?php
$conn = mysqli_connect("localhost","root","","mca");

$id = $_GET['id'];

$sql = "DELETE FROM feedback WHERE id='$id'";

if(mysqli_query($conn,$sql)){
    header("Location: view_feedback.php");
}else{
    echo "Error deleting record";
}
?>