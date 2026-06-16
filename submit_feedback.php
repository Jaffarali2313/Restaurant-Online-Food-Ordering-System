<?php
$conn = mysqli_connect("localhost","root","","mca");

// Check connection
if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}

// Get form values
$customer_name = $_POST['customer_name'];
$phone_number = $_POST['phone_number'];
$food_name = $_POST['food_name'];
$rating = $_POST['rating'];
$comment = $_POST['comment'];

// Insert query
$sql = "INSERT INTO feedback 
(customer_name, phone_number, food_name, rating, comment) 
VALUES 
('$customer_name','$phone_number','$food_name','$rating','$comment')";

if(mysqli_query($conn, $sql)){
    echo "✅ Feedback Submitted Successfully!";
} else {
    echo "❌ Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
