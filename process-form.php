<?php

// Database connection details
$host = 'localhost';
$dbname = 'loveworld';
$user = 'root';
$password = '';

// Connect to the database
try {
    $conn = new PDO("mysql:host=$localhost;dbname=$loveworld", $root, $'');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: ". $e->getMessage();
}

// Get form data
$name = $_POST['cName'];
$email = $_POST['cEmail'];
$website = $_POST['cWebsite'];
$message = $_POST['cMessage'];

// Insert form data into the database
$sql = "INSERT INTO love (name, email, website, message) VALUES (:cName, :cEmail, :cWebsite, :cMessage)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':website', $website);
$stmt->bindParam(':message', $message);
$stmt->execute();

// Close the database connection
$conn = null;

// Redirect to the form page
header('Location: contact.html');

?>