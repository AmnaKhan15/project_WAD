<?php

// Create a database connection
$db = new mysqli("localhost", "root", "", "sign");

// Check if the connection was successful
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Get the product data from the HTML form
$productName = $_POST['productName'];
$productPrice = $_POST['productPrice'];
$productQuantity = $_POST['quantity'];
$email = $_POST['email'];

// Insert the product into the database
$sql = "INSERT INTO products (name, price,quantity,email) VALUES ('$productName', '$productPrice','$productQuantity','$email');";

// Execute the query
if ($db->query($sql) === TRUE) {
    echo "Product inserted successfully";
} 


// Close the database connection
$db->close();

?>