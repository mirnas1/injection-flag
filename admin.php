<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['username'])) {
}

$servername = "localhost";
$dbusername = "root"; 
$dbpassword_db = "";  
$dbname = "injections";

$conn = new mysqli($servername, $dbusername, $dbpassword_db, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT username FROM users";
$result = $conn->query($sql);

if ($result === FALSE) {
    die("SQL Error: " . $conn->error);
}

$users = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $users[] = $row['username'];
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Page - SQL Injection CTF</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Admin Page</h2>
    <p>List of Users:</p>
    <ul>
        <?php foreach ($users as $user): ?>
            <li>username: <?php echo htmlspecialchars($user); ?></li>
        <?php endforeach; ?>
    </ul>
    <br>
    <a href="logout.php">Logout</a>
</body>
</html>
