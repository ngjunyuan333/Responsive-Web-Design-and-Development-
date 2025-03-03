<?php
$host = 'localhost';  // Your database host
$db = 'webassignmentdatabase';  // The wishlist database name
$user = 'root';  // Database username (default for XAMPP is 'root')
$pass = '';  // Database password (default for XAMPP is empty)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
