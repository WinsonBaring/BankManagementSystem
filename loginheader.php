<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <style>
    /* Add your custom styles here */

    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    header {
        background-color: #800000;
        color: white;
        text-align: center;
        padding: 0.5rem; /* Reduce the padding to make the header smaller */
    }

    nav {
        background-color: #800000; /* Change the color to maroon */
    }

    nav ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
    }

    nav ul li {
        margin: 0 0.5rem;
    }

    nav ul li a {
        display: block;
        color: white;
        text-decoration: none;
        padding: 0.5rem 1rem;
    }

    nav ul li a:hover {
        background-color: #993333;
    }

</style>
</head>
<body>
    <header>
        <h1><?php echo $title; ?></h1>
        <nav>
            <ul>
                <li><a href="userregister.php">Register</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>

</body>

