<?php
session_start();
include("db.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = $_POST['username'];
    $phone = $_POST['phone'];

    // Insert into database
    $sql = "INSERT INTO users (username, phone) VALUES ('$username','$phone')";
    mysqli_query($conn, $sql);

    // Store username in session
    $_SESSION['username'] = $username;

    // Redirect to home page
    header("Location: home.php");
    exit();
}
?>