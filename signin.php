<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sign";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {

    // Check if the username and password are entered
    if (!isset($_POST['email']) || !isset($_POST['password'])) {
        // Username and password are not entered
        echo "Please enter your username and password.";
    } else {
        // Check if the username and password exist in the database
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 0) {
            // Username and password do not exist
            echo "Invalid password and email. Please try again.";
        } else {
            // Username and password exist
            $row = mysqli_fetch_assoc($result);
            $email = $row['email'];

            echo "Login successful. Redirecting to dashboard...";
           
            exit();
        }
    }
}



// Close the database connection
$conn->close();

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php if (isset($_POST['submit']) && isset($username)) : ?>
        <h5 class="card-title">Hello, <?php echo $username; ?></h5>
        <p class="card-text">This is your profile page.</p>
    <?php endif; ?>
</body>
</html>