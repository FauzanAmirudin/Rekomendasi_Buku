<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Gaya CSS */
        .signup-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
    <title>Sign Up</title>
</head>
<body>
    <div class="signup-container">
        <h1>Sign Up</h1>
        <form action="signup.php" method="post">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" required>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <label for="konfirmasi_password">Konfirmasi Password</label>
            <input type="password" id="konfirmasi_password" name="konfirmasi_password" required>
            <input type="submit" value="Sign Up">
        </form>
        <p>Silakan cek email Anda untuk memverifikasi akun.</p>
    </div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST["nama"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $konfirmasi_password = $_POST["konfirmasi_password"];

        if ($password !== $konfirmasi_password) {
            echo "Konfirmasi password tidak sesuai.";
        } else { 
            echo "Pendaftaran berhasil! Silakan cek email Anda untuk memverifikasi akun.";
        }
    }
    ?>
</body>
</html>
