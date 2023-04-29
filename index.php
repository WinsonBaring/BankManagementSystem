<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        table {
            width: 80%;
            margin: 2rem auto;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #dee2e6;
            padding: 1rem;
            text-align: left;
        }

        th {
            background-color: #800000;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            padding: 0.5rem 1rem;
            margin: 0.5rem 0;
            border-radius: 0.25rem;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }
        body{
            background-color: #940000;
        }
        </style>
<?php 
    $title = 'Home';
    require_once 'header.php'; 
?>
<body>
<div class="img">
</div>
</body >
<!-- <?php require_once 'includes/footer.php'; ?> -->
</html>