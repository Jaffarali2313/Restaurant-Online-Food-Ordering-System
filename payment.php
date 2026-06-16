<?php
include("db.php");
$order_id=$_GET['order_id'];
$sql="SELECT total FROM orders WHERE id='$order_id'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$amount = $row['total'];
if(!$amount || $amount<=0){
  echo"Invalid Amount";
  exit();
}
$upi_id ="jaffarali.a2313@okaxis";
$name="Jaffarali";
//UPI link
$upi_link = "upi://pay?pa=$upi_id&pn=$name&am=$amount&cu=INR";
// URL encode 
$qr_data = urlencode($upi_link);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Payment page</title>
<style>
body{
font-family:Arial;
background:#f2f2f2;
text-align:center;
}

.box{
background:white;
padding:80px;
width:350px;
margin:auto;
margin-top:80px;
border-radius:20px;
box-shadow:0 0 10px gray;
}

.method{
margin-top:15px;
padding:10px;
border:1px solid #ddd;
border-radius:5px;
}

.paybtn{
background:#ff9f00;
border:none;
padding:12px;
font-size:18px;
cursor:pointer;
border-radius:5px;
}
.paybtn1{
background:#ff9f00;
border:none;
padding:12px;
font-size:18px;
cursor:pointer;
border-radius:10px;
}
</style>
<script>
    let methods=document.getElementByName("method");
     methods.forEach(function(radio){
     radio.onclick = function(){

    if(this.value == "cod"){
      document.getElementById("txnbox").style.display="none";
  }
    else{
      document.getElementById("txnbox").style.display="block";
  }

  }
  });
</script>
</head>
<body>
<div class="box">
<h2>Secure Payment</h2>

<p>Order ID : <?php echo $order_id; ?></p>

<p>Total Amount : ₹<?php echo $amount; ?></p>
<br>
<img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=<?php echo urlencode($upi_link); ?>"alt="UPI QR Code"> 
<form action="payment_save.php" method="POST">   
<input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
<input type="hidden" name="amount" value="<?php echo $amount; ?>">
<div class="method">
<input type="radio" name="method" value="upi"checked>Online Payment
</div><br>
<label>Enter UPI Transaction ID</label><br><br>
<input type="text" name="txn_id"placeholder="Enter Transaction ID"><br><br>
<div class="method">
<input type="radio" name="method" value="cod"> Cash on Delivery
</div><br>
<button type="button" class="paybtn"
onclick="window.location.href='<?php echo $upi_link;?>'">

Pay ₹<?php echo $amount;?> using UPI

</button><br><br>
<button class="paybtn" type="submit">Confirm Payment</button>
</form>
</div>
</body>
</html>
