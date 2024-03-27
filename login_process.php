<?php
// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Cek apakah username dan password sesuai
    if ($username === "admin" && $password === "password") {
        // Redirect ke halaman setelah login sukses
        header("Location: welcome.php");
        exit;
    } else {
        // Jika tidak sesuai, tampilkan pesan error
        echo "Username atau password salah.";
    }
}
?>
