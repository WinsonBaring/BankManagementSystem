<?php
session_start();

// Check if the user is already logged in, redirect to the dashboard if true
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: dashboard.php");
    exit;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the submitted form data
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bankmanagementsystem";

    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL statement
    $sql = "SELECT userid, username, password FROM user WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $input_username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Check if the user exists and the password is correct
    if ( $input_password == $row['password'] ) {
        // Set the session variables
        $_SESSION['loggedin'] = true;
        $_SESSION['userid'] = $row['userid'];
        $_SESSION['username'] = $row['username'];

        // Redirect to the dashboard
        header("Location: dashboard.php");
        exit;
    } else {
        // Invalid credentials
        $login_error = "Invalid username or password.";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .container form label {
            display: block;
            margin-bottom: 10px;
        }

        .container form input[type="text"],
        .container form input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .container form input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #4caf50;
            border: none;
            color: #ffffff;
            cursor: pointer;
            border-radius: 4px;
        }

        .container form input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error {
            color: #ff0000;
            margin-top: 10px;
        }
    </style>
    </head>
    <?php 
    $title = 'Home';
    require_once 'loginheader.php'; 
?>
<body>
    <div class="container">
        <h2>Login</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required><br><br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br><br>
            <input type="submit" value="Login">
        </form>

        <?php
        // Display login error (if any)
        if (isset($login_error)) {
            echo '<p class="error">' . $login_error . '</p>';
        }
        ?>
    </div>
</body>
</html>
