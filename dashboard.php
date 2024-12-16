<?php
//debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();


if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

$flag = "CTF{Hardcoded_Flag_XYZ789}";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - SQL Injection CTF</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
    <?php if ($username === 'NOTFLAG'): ?>
        <p>You have successfully logged in as NOTFLAG.</p>
        <p>Your Secret: <strong><?php echo htmlspecialchars($flag); ?></strong></p>
    <?php else: ?>
        <p>You have successfully logged in.</p>
        <p>Nice Hacking, you're on the right track soldier</p>
    <?php endif; ?>
    <br>
    <a href="logout.php">Logout</a>
</body>
</html>
