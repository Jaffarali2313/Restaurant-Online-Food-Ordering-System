<?php
$conn=mysqli_connect("localhost","root","","mca");

// SELECTE DATE
$selected_date = $_GET['date'] ??date("y-m-d");

// COD total
$sql_cod = "SELECT SUM(total) AS cod_total FROM orders 
WHERE payment_method='COD' AND date='$selected_date'";
$res_cod = mysqli_query($conn,$sql_cod);
$row_cod = mysqli_fetch_assoc($res_cod);
$cod_total = $row_cod['cod_total'] ?? 0;

// Online total
$sql_online = "SELECT SUM(total) AS online_total FROM orders 
WHERE payment_method='Online' AND date='$selected_date'";
$res_online = mysqli_query($conn,$sql_online);
$row_online = mysqli_fetch_assoc($res_online);
$online_total = $row_online['online_total'] ?? 0;

// Grand total
$grand_total = $cod_total + $online_total;

// Orders Fetch
$sql="SELECT * FROM orders ORDER BY id DESC";
$result=mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Daily Orders</title>
<style>
table {
    border-collapse: collapse;
    width: 100%;
}
th, td {
    border: 1px solid black;
    padding: 10px;
    text-align: center;
}
th {
    background-color: #f2f2f2;
}
.box{
    background:#f2f2f2;
    padding:15px;
    margin-bottom:20px;
    border-radius:10px;
}
</style>

</head>

<body>

<h2><b>Daily Orders</b></h2>
<a href="view_feedback.php"><button style="padding:10px 20px;background:#ff7e5f;color:white;bordor:none;
border-radius:5px;cursor:pointor;">View Feedback</button></a>
<a href="monthly_report.php"> 
<button style="background:green;color:white;padding:8px 15px;text-decoration:none;border-radius:5px;">
📊 Monthly Report</button></a>
<a href="daily_sales.php">
<button style="background:blue;color:white;padding:8px 15px;text-decoration:none;border-radius:5px;">
📊 Daily Sales</button></a>
<a href="delivery_partner.php">
<button style="background:black;color:white;padding:8px 15px;text-decoration:none;border-radius:5px;">
🚚 Delivery Partner</button></a>
</a><br><br>
<table>
<tr>
<th>Order ID</th>
<th>Date</th>
<th>Customer</th>
<th>Phone</th>
<th>Address</th>
<th>Chicken</th>
<th>HydChicken</th>
<th>Mutton</th>
<th>Prawn</th>
<th>Thanduri</th>
<th>Sekab</th>
<th>Kolambu</th>
<th>Fry</th>
<th>Amount</th>
<th>ORDER_TIME</th>
<th>Status</th>
<th>Payment</th>
<th>Update</th>
<th>Action</th>
</tr>

<?php
while($row=mysqli_fetch_assoc($result))
{
?>    
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo date("Y-m-d",strtotime($row['date'])); ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo $row['address']; ?></td>
<td><?php echo $row['chicken']; ?></td>
<td><?php echo $row['hydrabadi']; ?></td>
<td><?php echo $row['mutton']; ?></td>
<td><?php echo $row['prawn']; ?></td>
<td><?php echo $row['thanduri']; ?></td>
<td><?php echo $row['sekabab']; ?></td>
<td><?php echo $row['kolambu']; ?></td>
<td><?php echo $row['fry']; ?></td>
<td><?php echo $row['total']; ?></td>
<td><?php echo date("h:i:A",strtotime($row['order_time'])); ?></td>

<!-- STATUS -->
<td>
<?php
$status = $row['status'];

if($status=="Pending")
    echo "<span style='color:red;'>$status</span>";
elseif($status=="Preparing")
    echo "<span style='color:orange;'>$status</span>";
else
    echo "<span style='color:green;'>$status</span>";
?>
</td>

<!-- PAYMENT -->
<td>
<?php
$pm = $row['payment_method'];

if($pm=="COD")
    echo "<span style='color:red;'>COD</span>";
elseif($pm=="Online")
    echo "<span style='color:green;'>Online</span>";
else
    echo "<span style='color:gray;'>Not Paid</span>";
?>
</td>

<!-- UPDATE -->
<td>
<form method="post" action="status_update.php">
<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

<select name="status">
<option value="Pending" <?php if($row['status']=="Pending") echo "selected"; ?>>Pending</option>
<option value="Preparing" <?php if($row['status']=="Preparing") echo "selected"; ?>>Preparing</option>
<option value="Out for Delivery" <?php if($row['status']=="Out for Delivery") echo "selected"; ?>>Out for Delivery</option>
</select>

<input type="submit" value="Update">
</form>
</td>

<!-- DELETE -->
<td>
<a href="delete.php?id=<?php echo $row['id'];?>"
onclick="return confirm('Delete this order?')"
style="color:white;background:red;padding:5px 10px;text-decoration:none;border-radius:5px;">
Delete
</a>
</td>

</tr>

<?php } ?>
</table>

</body>
</html>
