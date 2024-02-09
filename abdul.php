<?php

// Create a database connection
$db = new mysqli("localhost", "root", "", "my_database");

// Check if the connection was successful
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Get the product data from the HTML form
$productName = $_POST['productName'];
$productPrice = $_POST['productPrice'];
$productImage = $_POST['productImage'];

// Insert the product into the database
$sql = "INSERT INTO products (name, price, image) VALUES ('$productName', '$productPrice', '$productImage');";

// Execute the query
if ($db->query($sql) === TRUE) {
    echo "Product inserted successfully";
} else {
    echo "Error inserting product: " . $db->error;
}

// Close the database connection
$db->close();

?>