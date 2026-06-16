<?php

include("db.php");

$date = $_POST['date'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['add'];
$city = $_POST['cty'];

$chicken = $_POST['chicken'];
$hydrabadi = $_POST['hydrabadi'];
$mutton = $_POST['mutton'];
$prawn = $_POST['prawn'];
$thanduri = $_POST['thanduri'];
$sekabab = $_POST['sekabab'];
$kolambu = $_POST['kolambu'];
$fry = $_POST['fry'];

// Price list (Server side)
$chicken_price = 200;
$hydrabadi_price = 300;
$mutton_price = 700;
$prawn_price = 500;
$thanduri_price = 500;
$sekabab_price = 20;
$kolambu_price = 250;
$fry_price = 100;

// Secure total calculation
$total = ($chicken * $chicken_price) +
         ($hydrabadi * $hydrabadi_price) +
         ($mutton * $mutton_price) +
         ($prawn * $prawn_price) +
         ($thanduri * $thanduri_price) +
         ($sekabab * $sekabab_price) +
         ($kolambu * $kolambu_price) +
         ($fry * $fry_price);


if(strtolower($city) != "hosur"){
    echo "Delivery available only in Hosur city.";
    exit();
}
if($total<=0){
    echo "Please Select Food Items.";
    exit();
}


$sql = "INSERT INTO orders
(date,name,phone,address,city,chicken,hydrabadi,mutton,prawn,thanduri,sekabab,kolambu,fry,total)
VALUES
('$date','$name','$phone','$address','$city','$chicken','$hydrabadi','$mutton','$prawn','$thanduri',
'$sekabab','$kolambu','$fry','$total')";
if(mysqli_query($conn,$sql)){

  $order_id=mysqli_insert_id($conn);      
  header("Location: payment.php?order_id=$order_id");
    echo $total;
    exit();
}else{
echo "Order failed";
}

?>
