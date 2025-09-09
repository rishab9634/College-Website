<?php
// Database Connection
$conn = new mysqli("localhost", "admin", "password", "college_db");

// Check connection
if($conn->connect_error){
    die("Connection Failed: " . $conn->connect_error);
}

// Sanitize and get form data
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$message = htmlspecialchars($_POST['message']);

// Prepare SQL statement to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $message);
$stmt->execute();

$stmt->close();
$conn->close();

// Redirect or show confirmation
echo "Thank you, $name! Your message has been received.";
?>
