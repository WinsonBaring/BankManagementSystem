<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

$userId = $_SESSION['loggedin'];

// Fetch the user's profile data from the database based on the $userId
// Replace this with your own logic to fetch user data
$mysqli = new mysqli('localhost', 'root', '', 'bankmanagementsystem') or die(mysqli_error($mysqli));

$result = $mysqli->query("SELECT * FROM account WHERE accountid = $userId") or die($mysqli->error);
$row = $result->fetch_assoc();

$username = $row['username'];
$joindate = $row['joindate'];
$status = $row['status'];
$accounttype = $row['accounttype'];

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $joindate = $_POST['joindate'];
    $status = $_POST['status'];
    $accounttype = $_POST['accounttype'];

    // Update the user's profile information in the database
    $mysqli->query("UPDATE account SET username = '$username', joindate = '$joindate', status = '$status', accounttype = '$accounttype' WHERE userid = $userId") or die($mysqli->error);

    // Redirect back to the dashboard page after updating the data
    header("Location:dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
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
            justify-content: space-evenly;
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
<form action="registeruseredit.php" method="post">
        <div class="box-title">
            <h1>Edit Profile</h1>
        </div>
        <div class="box1">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="<?php echo $username; ?>" required>
        </div>
        <br>
        <div class="box1">
            <label for="joindate">Join Date:</label>
            <input type="text" name="joindate" id="joindate" value="<?php echo $joindate; ?>" required>
        </div>
        <br>
        <div class="box1">
            <label for="status">Status:</label>
            <input type="text" name="status" id="status" value="<?php echo $status; ?>" required>
        </div>
        <br>
        <div class="box1">
            <label for="accounttype">Account Type:</label>
            <input type="text" name="accounttype" id="accounttype" value="<?php echo $accounttype; ?>" required>
        </div>
        <br>
        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>
