<?php
include('../config/constants.php');

if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $delivery_status = $_POST['delivery_status'];

    $sql2 = "UPDATE orders SET 
    delivery_status='$delivery_status'
    WHERE id=$id";

    $res2 = mysqli_query($conn, $sql2);

    if($res2==true)
    {
        $_SESSION['update'] = "<div class='success'>Delivery Status Updated Successfully.</div>";
        header('location:delivery_partner.php');
    }
    else
    {
        $_SESSION['update'] = "<div class='error'>Failed to Update.</div>";
        header('location:delivery_partner.php');
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Delivery Partner Panel</title>

<style>

body{
    font-family: Arial;
    background:#f4f6f9;
    margin:0;
    padding:20px;
}

.container{
    width:95%;
    margin:auto;
}

h1{
    text-align:center;
    color:#ff4757;
    margin-bottom:30px;
}

table{
    width:100%;
    border-collapse:collapse;
    background:white;
    box-shadow:0px 0px 10px rgba(0,0,0,0.1);
}

table th{
    background:#ff4757;
    color:white;
    padding:15px;
}

table td{
    padding:12px;
    text-align:center;
    border-bottom:1px solid #ddd;
}

tr:hover{
    background:#f1f1f1;
}

.radio-group{
    display:flex;
    justify-content:center;
    gap:10px;
}

.btn{
    background:#2ed573;
    color:white;
    padding:8px 15px;
    border:none;
    border-radius:5px;
    cursor:pointer;
    font-weight:bold;
}

.btn:hover{
    background:#20bf6b;
}

.delivered{
    color:green;
    font-weight:bold;
}

.notdelivered{
    color:red;
    font-weight:bold;
}

</style>

</head>

<body>

<div class="container">

<h1>🚚 Delivery Partner Order Tracking</h1>

<?php
if(isset($_SESSION['update']))
{
    echo $_SESSION['update'];
    unset($_SESSION['update']);
}
?>

<table>

<tr>
<th>S.No</th>
<th>Order Date</th>
<th>Customer Name</th>
<th>Phone</th>
<th>Address</th>
<th>Total</th>
<th>Current Status</th>
<th>Update Delivery</th>
<th>Action</th>
</tr>

<?php

$sql = "SELECT * FROM orders ORDER BY id DESC";
$res = mysqli_query($conn, $sql);

$count = mysqli_num_rows($res);

$sn=1;

if($count>0)
{
    while($row=mysqli_fetch_assoc($res))
    {
        $id = $row['id'];
        $order_date = $row['date'];
        $customer_name = $row['name'];
        $customer_contact = $row['phone'];
        $customer_address = $row['address'];
        $total = $row['total'];
        $delivery_status = $row['delivery_status'];

?>

<tr>

<td><?php echo $sn++; ?></td>

<td><?php echo $order_date; ?></td>

<td><?php echo $customer_name; ?></td>

<td><?php echo $customer_contact; ?></td>

<td><?php echo $customer_address; ?></td>

<td><?php echo $total; ?></td>

<td>

<?php

if($delivery_status=="Delivered")
{
    echo "<span class='delivered'>Delivered ✅</span>";
}
else
{
    echo "<span class='notdelivered'>Not Delivered Yet ❌</span>";
}

?>

</td>

<td>

<form method="POST">

<div class="radio-group">

<label>
<input type="radio" 
name="delivery_status" 
value="Not Delivered Yet"

<?php
if($delivery_status=="Not Delivered Yet")
{
    echo "checked";
}
?>

>
Not Delivered
</label>

<label>
<input type="radio" 
name="delivery_status" 
value="Delivered"

<?php
if($delivery_status=="Delivered")
{
    echo "checked";
}
?>

>
Delivered
</label>

</div>

</td>

<td>

<input type="hidden" name="id" value="<?php echo $id; ?>">

<input type="submit" 
name="update" 
value="Update" 
class="btn">

</form>

</td>

</tr>

<?php

    }
}
else
{
?>

<tr>
<td colspan="8">
<div class="error">No Orders Available.</div>
</td>
</tr>

<?php
}
?>

</table>

</div>

</body>
</html>
