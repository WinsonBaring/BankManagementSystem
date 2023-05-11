<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Accounts Information</title>
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

    </style>
</head>
<body>
<?php 
    $title = 'List of Accounts Information';
    require_once 'header.php'; 
?>
    
<div style='background-color: #800000'>
    <center>
        <p style='color:white'><h2 style='color:white'>Bank Management System</h2></p>
    </center>

</div> 

<center>
    <p style="color:white"><h5>List of Usersinformation</h5></p>
</center>

<div> 
    <?php
        $mysqli = new mysqli('localhost', 'root', '', 'bankmanagementsystem') or die(mysqli_error($mysqli));
        $resultset = $mysqli->query("SELECT userid, usertype, firstname, middlename,  lastname,birthdate from users") or die($mysqli->error);
    ?>

    <table id="tblcardrecords" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%"> 
        <thead>
            <tr> 
                <th>ID</th> 
                <th>User Type</th>
                <th>First Name</th> 
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Birthdate</th>
            </tr> 
        </thead>  
        <tbody>
            <?php
                while($row = $resultset->fetch_assoc()):
            ?>
            <tr>
                <td><?php echo $row['userid'] ?></td>
                <td><?php echo $row['usertype'] ?></td>
                <td><?php echo $row['firstname'] ?></td>
                <td><?php echo $row['middlename'] ?></td>
                <td><?php echo $row['lastname'] ?></td>
                <td><?php echo $row['birthdate'] ?></td>
                <td>
                    <a href="#" class="btn btn-primary">VIEW</a>                        
                    <a href="#" class="btn btn-danger">DELETE</a>
                </td>
            </tr>
            <?php endwhile;?>
        </tbody>         
    </table>
</div>



</body>
</html>
``
