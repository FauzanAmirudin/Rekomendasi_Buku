<?php
session_start();
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #121223;
            font-family: 'Montserrat';
        }

        .container {
            width: 100%;
            max-width: 400px;
            background: white;
            border-radius: 24px;
        }

        .login {
            width: 400px;
        }

        form {
            width: 250px;
            margin: 60px auto;
        }

        h1 {
            margin: 20px;
            text-align: center;
            font-weight: bolder;
            text-transform: uppercase;
        }

        p {
            text-align: center;
            margin: 10px;
        }

        form label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            padding: 5px;
        }

        input {
            width: 100%;
            margin: 2px;
            border: none;
            outline: none;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid black;
        }

        button {
            border: none;
            outline: none;
            padding: 8px;
            width: 252px;
            font-size: 14px;
            cursor: pointer;
            margin-top: 20px;
            border-radius: 5px;
            background-color: #FF7622;
        }
    </style>
</head>

<body>

    <?php
        if(isset($_POST['username'])){
            $username = $_POST['username'];
            $password = md5 ($_POST['password']);

            $query = mysqli_query($koneksi, "SELECT*FROM user where username ='$username' and password='$password'");

            if(mysqli_num_rows($query) > 0) {
                $data = mysqli_fetch_array($query);
                $_SESSION['user'] = $data;
                echo '<script>alert("selamat datang, '.$data['nama'].'");
                location.href="homepage.php";</script>';
            } else {
                echo '<script>alert("username/password tidak sesuai.");</script>';
            }
        }
    ?>

    <div class="container">
        <div class="login">
            <form action="" method="post">
                <h1>Log in</h1>
                <p>Please sign in to your account</p>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="username / email" required>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
                <p>
                    <a href="signup.php">Daftar?</a>
                </p>
            </form>
        </div>
    </div>
</body>

</html>
