<?php
$conn = mysqli_connect("localhost","root","","mca");

if(!$conn)
{
    die("Database Connection Failed");
}

// 🔥 Selected Date (default today)
$selected_date = $_GET['date'] ?? date("Y-m-d");

// 🔥 COD Total
$sql_cod = "SELECT SUM(total) AS cod_total FROM orders
WHERE (payment_method='COD' OR payment_method IS NULL)
AND DATE(date)='$selected_date'";

$res_cod = mysqli_query($conn,$sql_cod);
$row_cod = mysqli_fetch_assoc($res_cod);

$cod_total = $row_cod['cod_total'] ?? 0;


// 🔥 Online Total
$sql_online = "SELECT SUM(total) AS online_total FROM orders
WHERE payment_method='Online'
AND DATE(date)='$selected_date'";

$res_online = mysqli_query($conn,$sql_online);
$row_online = mysqli_fetch_assoc($res_online);

$online_total = $row_online['online_total'] ?? 0;


// 🔥 Grand Total
$grand_total = $cod_total + $online_total;


// 🔥 Fetch Orders
$sql = "SELECT * FROM orders
WHERE DATE(date)='$selected_date'
ORDER BY id DESC";

$result = mysqli_query($conn,$sql);


// 🔥 Count Orders
$count_sql = "SELECT COUNT(*) AS total_orders FROM orders
WHERE DATE(date)='$selected_date'";

$count_result = mysqli_query($conn,$count_sql);
$count_row = mysqli_fetch_assoc($count_result);

$total_orders = $count_row['total_orders'];

?>

<!DOCTYPE html>
<html>

<head>

<title>Daily Sales Report</title>

<style>

body
{
    font-family: Arial;
    padding: 20px;
    background: #f5f5f5;
}

h2
{
    text-align: center;
}

form
{
    margin-bottom: 20px;
}

.box
{
    background: white;
    padding: 20px;
    border-radius: 10px;
    margin-bottom: 20px;
    box-shadow: 0px 0px 10px #ccc;
}

table
{
    width: 100%;
    border-collapse: collapse;
    background: white;
}

th, td
{
    border: 1px solid black;
    padding: 10px;
    text-align: center;
}

th
{
    background: #333;
    color: white;
}

.no-orders
{
    color: red;
    font-size: 20px;
    text-align: center;
    margin-top: 20px;
}

</style>

</head>

<body>

<h2>📊 Daily Sales Report</h2>

<!-- 🔥 Date Picker -->

<form method="GET">

<label><b>Select Date:</b></label>

<input type="date" name="date"
value="<?php echo $selected_date; ?>">

<input type="submit" value="View Report">

</form>


<!-- 🔥 Sales Summary -->

<div class="box">

<h3>📅 Selected Date :
<?php echo $selected_date; ?>
</h3>

<p>🛒 Total Orders :
<b><?php echo $total_orders; ?></b>
</p>

<p>💰 COD Sales :
<b>₹ <?php echo $cod_total; ?></b>
</p>

<p>💳 Online Sales :
<b>₹ <?php echo $online_total; ?></b>
</p>

<h2>🔥 Total Sales :
₹ <?php echo $grand_total; ?>
</h2>

</div>


<?php

if($total_orders > 0)
{

?>

<table>

<tr>

<th>ID</th>
<th>Date</th>
<th>Name</th>
<th>Phone</th>
<th>Amount</th>
<th>Payment</th>

</tr>

<?php

while($row = mysqli_fetch_assoc($result))
{

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['date']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['phone']; ?></td>

<td>₹ <?php echo $row['total']; ?></td>

<td>

<?php

if($row['payment_method']=="COD")
{
    echo "<span style='color:red;font-weight:bold;'>COD</span>";
}
elseif($row['payment_method']=="Online")
{
    echo "<span style='color:green;font-weight:bold;'>Online</span>";
}
else
{
    echo "<span style='color:gray;'>Test Payment</span>";
}

?>

</td>

</tr>

<?php

}

?>

</table>

<?php

}
else
{

?>

<div class="no-orders">

❌ No Orders Found On
<b><?php echo $selected_date; ?></b>

</div>

<?php

}

?>

</body>
</html>
