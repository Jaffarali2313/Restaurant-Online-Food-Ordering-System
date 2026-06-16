<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<style>
    body{
        margin: 0;
        font-family: Arial,sans-serif;
        background-color: linear-gradient(toright,#667eea,#764ba2);
        background-color:gold;
    }
    .container{
        width: 700px;
        margin: 150px auto;
        background: yellow;
        padding: 85px;
        border-radius: 20px;
        text-align:center;
        box-shadow: 0px 10px 28px rgba(0,0,0,0,2);
    }
    h2{
        color:#333;
        margin-bottom: 30px;
    }
    .btn{
        display: block;
        width: 100%;
        padding:12px;
        margin: 10px 0;
        text-decoration: none;
        color: white;
        border-radius: 8px;
        font-size :16px;
        transition: 0.3s;
    }
    .orders{
        background-color: #28a745;
    }
    .orders:hover{
        background--color: #218838;
    }
    .logout
    {
       background-color: #dc3545;
    }
    .logout:hover{
        background-color: #c82333;
    }
    .title{
        font-size: 22px;
        font-weight: bold;
        color: #555;
    }
</style>   
</head>
<body>
 <div class="container">   
 <h2>Restaurant Admin Panel</h2>
 <a href="orders.php" class="btn orders">View Customer Orders</a>
 <br><br>
 <a href="logout.php" class="btn logout">Logout</a>
 </div>
</body>
</html>