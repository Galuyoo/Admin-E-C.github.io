
<?php
$host = "localhost:3308";
$user = "root";
$password = '';
$dbname = "e-c"; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
} catch (PDOException $e) {
    die("Failed to connect with MySQL using PDO: " . $e->getMessage());
}

// Now you can use $pdo...
?>
