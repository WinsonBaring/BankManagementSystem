<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Maroon Buttons</title>
    <style>
        body {
        }

        .buttons-container {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            padding: 0.75rem 1.5rem;
            border-radius: 0.25rem;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-maroon {
            background-color: #800000;
            color: white;
            border: none;
        }

        .btn-maroon:hover {
            background-color: #b30000;
            transform: scale(1.05);
        }
        .buttons-container{
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 2rem 10%;
        }

    </style>
</head>
<body>
    
<?php 
    $title = 'Dash Board';
    require_once 'header.php'; 
?>
    <div class="buttons-container">
        <button > <a href="registeraccount.php"class="btn btn-maroon">Add New Record for Account</a></button>
        <button > <a href="registeruser.php"class="btn btn-maroon">Add New Record for Users</a></button>
        <button > <a href="viewaccount.php"class="btn btn-maroon">View Records of Accounts</a></button>
        <button > <a href="viewuser.php"class="btn btn-maroon">View Records of Users</a></button>
    </div>
<?php 
    $title = 'dashboard';
    require_once 'footer.php'; 
?>
</body>
</html>
