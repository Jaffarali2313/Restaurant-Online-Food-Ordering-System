<?php
$conn=mysqli_connect("localhost","root","","mca");

//  Selected Month (default current month)
$selected_month = $_GET['month'] ?? date("Y-m");

//  COD total (NULL include)
$sql_cod = "SELECT SUM(total) AS cod_total FROM orders 
WHERE (payment_method='COD' OR payment_method IS NULL) 
AND DATE_FORMAT(date,'%Y-%m')='$selected_month'";
$res_cod = mysqli_query($conn,$sql_cod);
$row_cod = mysqli_fetch_assoc($res_cod);
$cod_total = $row_cod['cod_total'] ?? 0;

//  Online total
$sql_online = "SELECT SUM(total) AS online_total FROM orders 
WHERE payment_method='Online' 
AND DATE_FORMAT(date,'%Y-%m')='$selected_month'";
$res_online = mysqli_query($conn,$sql_online);
$row_online = mysqli_fetch_assoc($res_online);
$online_total = $row_online['online_total'] ?? 0;

// Grand total
$grand_total = $cod_total + $online_total;

// Orders fetch (month filter)
$sql="SELECT * FROM orders 
WHERE DATE_FORMAT(date,'%Y-%m')='$selected_month'
ORDER BY id DESC";
$result=mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Monthly Report</title>

<style>
table { border-collapse: collapse; width: 100%; }
th, td { border: 1px solid black; padding: 10px; text-align: center; }
th { background-color: #f2f2f2; }
.box { background:#f2f2f2; padding:15px; margin-bottom:20px; border-radius:10px; }
</style>

</head>

<body>

<h2><b>📊 Monthly Sales Report</b></h2>

<!-- 🔥 MONTH PICKER -->
<form method="GET" style="margin-bottom:20px;">
<label>Select Month:</label>
<input type="month" name="month" value="<?php echo $selected_month; ?>">
<input type="submit" value="View">
</form>

<!-- 🔥 SALES BOX -->
<div class="box">

<h3>📅 Month: <?php echo $selected_month; ?></h3>

<p>💰 COD Sales: ₹ <?php echo $cod_total; ?></p>
<p>💳 Online Sales: ₹ <?php echo $online_total; ?></p>

<h2>🔥 Total Sales: ₹ <?php echo $grand_total; ?></h2>

</div>

<table>
<tr>
<th>ID</th>
<th>Date</th>
<th>Name</th>
<th>Phone</th>
<th>Amount</th>
<th>Payment</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)) { ?>
<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['date']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['phone']; ?></td>

<td><?php echo $row['total']; ?></td>

<td>
<?php
if($row['payment_method']=="COD")
    echo "<span style='color:red;'>COD</span>";
elseif($row['payment_method']=="Online")
    echo "<span style='color:green;'>Online</span>";
else
    echo "<span style='color:gray;'>Test payment</span>";
?>
</td>

</tr>
<?php } ?>

</table>

</body>
</html>