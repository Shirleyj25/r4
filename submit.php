<?php
// Enable error reporting for debugging (disable in production)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Check if the request is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate inputs
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars($_POST['phone'] ?? '');
    $address = htmlspecialchars($_POST['address'] ?? '');

    // Validation checks
    if (empty($name) || empty($email) || empty($phone) || empty($address)) {
        echo "<p style='color: red;'>All fields are required!</p>";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p style='color: red;'>Invalid email address!</p>";
        exit;
    }

    // Simulate success output with formatting
    echo "<h2 style='color: green;'>Registration Successful</h2>";
    echo "<p><strong>Name:</strong> $name</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Phone:</strong> $phone</p>";
    echo "<p><strong>Address:</strong> $address</p>";
} else {
    // Handle non-POST requests
    echo "<p style='color: red;'>Invalid request method. Please submit the form.</p>";
}
?>
