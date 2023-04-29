<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
<?php 
    $title = 'viewrecords';
    require_once 'header.php'; 
?>
    
<div style='background-color: #800000'>
    <center>
        <p style='color:white'><h2 style='color:white'>Bank Management System</h2></p>
    </center>

    </div> <center><p style="color:white"><h5>List of Accounts information</h5></p></center> 
    <div> 
        <?php
    
            $mysqli = new mysqli('localhost', 'root','','bankmanagementsystem') or die (mysqli_error($mysqli));
            
            $resultset = $mysqli->query("SELECT accountid, username, joindate, status, accounttype from account") or die($mysqli->error);
        ?>
        <table id="tblcardrecords " class="table
            table-striped table-bordered table-sm" cellspacing="0" width="100%"> 
            <thead>
                <tr> 
                    <th>Id</th> 
                    <th>username</th>
                    <th>date join</th> 
                    <th>status</th>
					<th>Account Type</th>
                </tr> 
            </thead>  
            <tbody>
                <?php
                    while($row = $resultset->fetch_assoc()):
                ?>
                <tr>
                    <td><?php echo $row['accountid'] ?></td>
                    <td><?php echo $row['username'] ?></td>
                    <td><?php echo $row['joindate'] ?></td>
                    <td><?php echo $row['status'] ?></td>
					<td><?php echo $row['accounttype'] ?></td>
                    <td>
                        <a href = "" class="btn btn-primary">VIEW</a>                        
                        <a href = "" class="btn btn-danger">DELETE</a>
                    </td>
                </tr>
                <?php endwhile;?>
            </tbody>         
        </table>
    </div>



<!-- <?php require_once 'includes/footer.php'; ?> -->


</body>
</html>