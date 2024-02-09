<?php
session_start();

if (isset($_SESSION['user_id'])) {
    $userID = $_SESSION['user_id'];
} else {
    // The user is not logged in, so redirect them to the sign-in page
    header("Location: signin.php");
    exit();
}

// Create a database connection
$db = new mysqli("localhost", "root", "", "sign");

// Check if the connection was successful
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Get the product ID
$productID = $db->insert_id;

// Add the product to the cart
$sql = "INSERT INTO cart (user_id, product_id) VALUES ($userID, $productID);";

// Execute the query
if ($db->query($sql) === TRUE) {
    echo "Product added to cart successfully";

    // Get the product name
    $productName = $_POST['productName'];

    // Redirect the user to the product page
    header("Location: product.php?productName=$productName");
} else {
    echo "Error adding product to cart: " . $db->error;
}

// Close the database connection
$db->close();

?>