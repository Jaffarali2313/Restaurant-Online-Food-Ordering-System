<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "mca";

$conn = mysqli_connect($host,$user,$pass,$dbname);
$username=$_POST['user'];
$password=$_POST['pass'];

$sql="SELECT * FROM login 
WHERE Username='$username' 
AND Password='$password'";

$result=mysqli_query($conn,$sql);

$count=mysqli_num_rows($result);

if($count==1)
{
header("Location: admin/dashboard.php");
}
else
{
echo "Login Failed";
}

?>


