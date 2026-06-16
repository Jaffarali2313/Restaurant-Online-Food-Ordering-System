<?php
$conn = mysqli_connect("localhost","root","","mca");

if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM feedback ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>View Feedback</title>

<style>
body {
    font-family: Arial;
    background: #f4f4f4;
    padding: 20px;
}

h2 {
    text-align: center;
}

table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

th, td {
    padding: 12px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

th {
    background: #ff7e5f;
    color: white;
}

tr:hover {
    background: #f1f1f1;
}
.delete-btn {
    padding: 8px 15px;
    background: linear-gradient(135deg, #ff416c, #ff4b2b);
    color: white;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    font-size: 14px;
    transition: all 0.3s ease;
}

/* Hover effect */
.delete-btn:hover {
    transform: scale(1.1);
    box-shadow: 0 5px 15px rgba(255,0,0,0.4);
}

/* Click effect */
.delete-btn:active {
    transform: scale(0.95);
}
</style>

</head>
<body>

<h2>📋 Customer Feedback List</h2>

<table>
<tr>
<th>ID</th>
<th>Customer Name</th>
<th>Phone Number</th>
<th>Food Name</th>
<th>Rating</th>
<th>Comment</th>
<th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['customer_name']; ?></td>
<td><?php echo $row['phone_number']; ?></td>
<td><?php echo $row['food_name']; ?></td>
<td><?php echo $row['rating']; ?> ⭐</td>
<td><?php echo $row['comment']; ?></td>
<td>
<a href="delete_feedback.php?id=<?php echo $row['id']; ?>" 
onclick="return confirm('Are you sure to delete?');">
<button class="delete-btn">Delete</button>
</a>
</td>
</tr>
<?php } ?>

</table>

</body>
</html>
