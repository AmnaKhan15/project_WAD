<?php

// Define the connection variable
$conn = new mysqli("localhost", "root", "", "sign");

// Handle sign-up form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" || isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Escape user input
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    $email = mysqli_real_escape_string($conn, $email);
    $phone = mysqli_real_escape_string($conn, $phone);

    // Insert user data into the database
    $sql = "INSERT INTO users (username, password, email, phone_number) VALUES ('$username', '$password', '$email', '$phone')";
    if ($conn->query($sql) === TRUE) {
        echo "Sign-up successful!";
        // You can redirect the user to a success page here
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
      // Start the session
      session_start();

      // Set the session variables
      $_SESSION['username'] = $username;
      $_SESSION['logged_in'] = true;

      // Redirect the user to the home page
      header("Location: index.html");
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }



$conn->close();
?>