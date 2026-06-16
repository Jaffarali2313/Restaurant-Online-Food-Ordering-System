<?php
include("db.php");
$order_id = $_POST['order_id'];
$amount = $_POST['amount'];
$method = $_POST['method'];
$txn_id = $_POST['txn_id'];
$order_id = $_POST['order_id'];
$query = mysqli_query($conn,"SELECT total FROM orders WHERE id='$order_id'");
$row = mysqli_fetch_assoc($query);

$amount = $row['total']; 

if($method == "upi"){

if($txn_id == ""){
echo "Please enter Transaction ID";
exit();
}
$status = "Paid";
$payment_method="online";
}else{
$status = "Pending";
$txn_id="COD";
$payment_method="COD";
}
date_default_timezone_set("Asia/Kolkata");
$order_time=date("H:i:s");
$sql = "INSERT INTO payments(order_id,amount,payment_method,transaction_id,payment_status)
VALUES('$order_id','$amount','$method','$txn_id','$status')";

if(mysqli_query($conn,$sql)){
mysqli_query($conn,"UPDATE orders SET order_time='$order_time',payment_method='$payment_method' WHERE id='$order_id'");
header("Location: success.php?order_id=$order_id");
}else{

echo "payment failed";

}

?>
