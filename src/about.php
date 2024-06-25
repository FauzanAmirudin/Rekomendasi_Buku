<?php
require 'function.php';

//koneksi
$conn = connectDatabase();
$result10teratas = mysqli_query($conn, "SELECT * FROM buku ORDER BY pembaca DESC");
$result10 = mysqli_query($conn, "SELECT * FROM buku ORDER BY pembaca DESC");
$genres = mysqli_query($conn, "SELECT * FROM genres");
$resultfavorit = mysqli_query($conn, "SELECT * FROM buku ORDER BY favorit DESC");

//cari
if(isset($_GET['keyword'])){
    $keyword = $_GET['keyword'];
    header("location: search.php?keyword=$keyword");
}

//mengambil session
$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
if($username){
    $nama = getUsername($conn, $username)['nama'];
    $user_id = getUsername($conn, $username)['id'];
    $readlist = getreadlistbukus($user_id);
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./output.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>About Us</title>
</head>

<body class=" font-ibm " data-theme="business">
    <!-- navbar -->
    <div class="navbar flex justify-between bg-base-100 fixed top-0 left-0 w-full z-50 shadow-lg px-10">
        <div class="w-10/12 ">
            <a class="flex items-center " href="index.php">
                <p>Home</p>
            </a>
            <div class="flex-none  ">
                <ul class="menu menu-horizontal px-1">
                    <li>
                        <details>
                            <summary class="text-lg">
                                Menu
                            </summary>
                            <ul class="p-2 bg-base-100 rounded-t-none ">
                                <li><a href="about.php">About Us</a></li>
                            </ul>
                        </details>
                    </li>
                </ul>
            </div>
            <div class="flex-grow  mx-auto w-full">
                <div class="form-control mx-auto w-auto ">
                    <form action="search.php" method="get" class="search">
                        <input type="text" placeholder="Cari Buku" class="input input-ed w-full bg-neutral-50" name="keyword" autocomplete="off"/>
                    </form>
                </div>
            </div>
        </div>

        <div class="w-2/10 ">
            <div class=" w-full ">
                <ul class="menu menu-horizontal px-1 mx-auto">
                    <div class="flex items-center ">
                        <?php
                            if(!isset($username)){
                                echo    "<a href='login.php'>
                                            <div class='flex items-center h-10 my-auto mx-auto'>
                                                <li>Login</li>
                                            </div>
                                        </a>";
                            } else {

                                echo    "<a href='profil.php?user_id={$user_id}'>
                                            <div class='flex items-center h-10 my-auto mr-10'>
                                                <li>{$nama}</li>
                                            </div>
                                        </a>";

                                echo    '<form action="" method="post">
                                            <div class="flex items-center h-10 my-auto ml-10">
                                                <button type="submit" name="logout">Logout</button>
                                            </div>
                                        </form>';
                            }
                            ?>
                    </div>
                </ul>
            </div>
        </div>
    </div>
    <!-- navbar ends -->

        <div class="w-10/12 mx-auto py-32 font-montserrat mb-52">
            <div class="text-3xl font-bold mb-5">Tentang Kami Kelompok 2</div>
            <div class="text-justify text-lg">
            <p>Anggota Kelompok :</p> 
            <p>Fauzan Amirudin Basith(2213025041)</p>
            <p>Reyma Nabilla Gunawan(2213025071)</p>
            <p>Aura Daniarta(2213025049)</p>
            <p>Bela Novia Saputri(2213025027)</p>
            <p>Rosdiyanna Safitri(2213025063)</p>
            <p>Rendy Pahlevi Ramadhani(2213025031)</p>
            <p>Muhammad Irghi Fahrezi(2213025055)</p>
            </div>
        </div>
        

</body>
<footer class="footer footer-center p-4 bg-base-300 text-base-content">
  <aside>
    <p>Copyright © 2024 - All right reserved by Kelompok 2</p>
  </aside>
</footer>
</html>