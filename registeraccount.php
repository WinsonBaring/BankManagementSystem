<?php

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $joindate = date('Y-m-d');
    $status = isset($_POST['status']) ? 1 : 0;
    $accounttype = $_POST['accounttype'];

    $mysqli = new mysqli('localhost', 'root', '', 'bankmanagementsystem') or die(mysqli_error($mysqli));

    $stmt = $mysqli->prepare("INSERT INTO account (username, joindate, status, accounttype) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssii", $username, $joindate, $status, $accounttype);
    $stmt->execute();
    $stmt->close();
    $mysqli->close();

    header('Location: dashboard.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register User</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
        }

        form {
            background-color: #fff;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 420px;
        }

        h1 {
            margin: 0 0 1.5rem;
            font-size: 1.75rem;
            font-weight: 600;
        }

        label {
            display: block;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        input, select {
            display: block;
            width: 100%;
            padding: 0.5rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            margin-bottom: 1rem;
        }

        button {
            display: inline-block;
            font-weight: 600;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            color: #fff;
            background-color: #800000;
            border: 1px solid transparent;
            transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        button:hover {
            background-color: #b30000;
        }

        .box1{
            display: flex;
            align-items: center;
            justify-content: space-evenly
        }
    .box-title{
        display: flex;
        align-items: center;
        justify-content: space-evenly;
        padding-bottom: 2rem;
    }
</style>
</head>
<body>
<form action="registeraccount.php" method="post">
        <div class="box-title">
            <h1>Register Account</h1>
        </div>

        <!-- <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        <br>
        <div class="box1">
            <label for="status">ActiveStatus:</label>
            <input type="checkbox" name="status" id="status" value="1">
        </div>
        <br>
        <label for="accounttype">Account Type:</label>
        <select name="accounttype" id="accounttype" required>
            <option value="">Select Account Type</option>
            <option value="1">Savings</option>
            <option value="2">Checking</option>
            <option value="3">Investment</option>
        </select>
        <br> -->
        <!-- <button type="submit" name="register">Register</button> -->
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        <br>
        <label for="status">Active Status:</label>
        <input type="checkbox" name="status" id="status" value="1">
        <br>
        <label for="accounttype">Account Type:</label>
        <select name="accounttype" id="accounttype">
            <option value="1">Savings</option>
            <option value="2">Checking</option>
            <option value="3">Investment</option>
        </select>
        <br>
        <button type="submit" name="register">Register</button>
    </form>
</body>
</html>

