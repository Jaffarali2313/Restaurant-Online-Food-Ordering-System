<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Author" content="Jaffar ali">
    <meta name="description" content="feedback form">
    <title>Feedback Form</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #ff7e5f, #feb47b);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: #fff;
            padding: 30px;
            width: 350px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            animation: fadeIn 0.8s ease-in-out;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            font-weight: bold;
            color: #555;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 8px;
            border: 1px solid #ccc;
            outline: none;
            transition: 0.3s;
        }

        input:focus, select:focus, textarea:focus {
            border-color: #ff7e5f;
            box-shadow: 0 0 5px rgba(255,126,95,0.5);
        }

        textarea {
            resize: none;
            height: 80px;
        }

        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #ff7e5f, #feb47b);
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>

</head>

<body>

<div class="container">

<h2>Customer Feedback:)</h2>

<form action="submit_feedback.php" method="POST">

    <label>Customer Name:</label>
    <input type="text" name="customer_name" placeholder="Enter your name" required>

    <br><br>

    <label>Phone Number:</label>
    <input type="text" name="phone_number" placeholder="Enter phone number" required>

    <br><br>

    <label>Food Name:</label>
    <input type="text" name="food_name" placeholder="Review Ordered Food Here" required>

    <br><br>

    <label>Rating:</label>
    <select name="rating" required>
        <option value="">Select Rating</option>
        <option value="1">1⭐</option>
        <option value="2">2⭐</option>
        <option value="3">3⭐</option>
        <option value="4">4⭐</option>
        <option value="5">5⭐</option>
    </select>

    <br><br>

    <label>Comment:</label>
    <textarea name="comment" placeholder="Write your feedback..." required></textarea>

    <br><br>

    <button type="submit">Submit Feedback</button>

</form>

</div>

</body>
</html>



