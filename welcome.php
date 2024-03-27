<?php
session_start();
// Cek apakah pengguna sudah login
if (!isset($_SESSION["username"])) {
    header("Location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h1>Selamat datang, <?php echo $_SESSION["username"]; ?>!</h1>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>
