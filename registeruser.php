<?php
if (isset($_POST['register'])) {
    $usertype = isset($_POST['usertype']) ? 1 : 0;
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $birthdate = $_POST['birthdate'];

    $mysqli = new mysqli('localhost', 'root', '', 'bankmanagementsystem') or die(mysqli_error($mysqli));

    $stmt = $mysqli->prepare("INSERT INTO users (usertype, firstname, middlename, lastname, birthdate) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $usertype, $firstname, $middlename, $lastname, $birthdate);
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
<form action="registeruser.php" method="post">
        <div class="box-title">
            <h1>Register User</h1>
        </div>
        <div class="box1">
        <label for="usertype">Employee</label>
        <input type="checkbox" name="usertype" id="usertype" value="1">
        </div>
        <br>
        <label for="firstname">First Name:</label>
        <input type="text" name="firstname" id="firstname" required>
        <br>
        <label for="middlename">Middle Name:</label>
        <input type="text" name="middlename" id="middlename" required>
        <br>
        <label for="lastname">Last Name:</label>
        <input type="text" name="lastname" id="lastname" required>
        <br>
        <label for="birthdate">Birthdate:</label>
        <input type="date" name="birthdate" id="birthdate" required>
        <br>
        <button type="submit" name="register">Register</button>
    </form>


</body>
</html>






    
