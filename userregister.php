<?php
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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the submitted form data
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];


    // Prepare and execute the SQL statement to insert the user into the database
    $sql = "INSERT INTO user (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $input_username, $input_password);
    if ($stmt->execute()) {
        // Registration successful, redirect to the login page
        header("Location: login.php");
        exit;
    } else {
        // Registration failed
        $registration_error = "Registration failed. Please try again.";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
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
    $title = 'Register';
    require_once 'loginheader.php'; 
?>
<body>
    <div class="container">
        <h2>Registration</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required><br><br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br><br>
            <input type="submit" value="Register">
        </form>

        <?php
        // Display registration error (if any)
        if (isset($registration_error)) {
            echo '<p class="error">' . $registration_error . '</p>';
        }
        ?>
    </div>
</body>
</html>
