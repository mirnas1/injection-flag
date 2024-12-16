<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];
$password = $_SESSION['password'];

$flag = "meer{sup3r_s3cr3t_flvg}";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - SQL Injection CTF</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
    
    <?php if ($username === 'NOTFLAG' && $password === 'itoldyouso'): ?>
        <p>You have successfully logged in as NOTFLAG.</p>
        <p><strong><?php echo htmlspecialchars($flag); ?></strong></p>
    <?php elseif ($username === 'NOTFLAG'): ?>
        <p>Not so fast, find the password first.</p>
    <?php else: ?>
        <p>You have successfully logged in.</p>
        <p>Nice Hacking, you're on the right track, soldier.</p>
    <?php endif; ?>
    
    <br>
    <a href="logout.php">Logout</a>
</body>
</html>
