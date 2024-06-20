<?php
require 'function.php';
$conn = connectDatabase();

$user_id = $_GET['user_id'];
if(!$user_id){
    header("Location: index.php");
    exit();
}


//koneksi
$conn = connectDatabase();
$result10teratas = mysqli_query($conn, "SELECT * FROM buku ORDER BY pembaca DESC LIMIT 10");
$result = mysqli_query($conn, "SELECT * FROM buku");
$genres = mysqli_query($conn, "SELECT * FROM genres");
$resultfavorit = mysqli_query($conn, "SELECT * FROM buku ORDER BY favorit DESC");
$favorites = getFavoritebukus($user_id);
$readlist = getreadlistbukus($user_id);
$username = getUsername_id($conn, $user_id)['username'];
$nama =  getUsername_id($conn, $user_id)['nama'];

//cari
if(isset($_GET['cari'])){
    $keyword = $_GET['keyword'];
    header("location: search.php?keyword=$keyword");
}

//user_rating
$queryUR = "SELECT buku_id, AVG(user_rating) AS avg_rating FROM komentar GROUP BY buku_id";
$resultUR = mysqli_query($conn, $queryUR);

$average_ratings = array(); // Inisialisasi array untuk menyimpan rata-rata rating

while ($row = mysqli_fetch_assoc($resultUR)) {
    $buku_id = $row['buku_id'];
    $avg_rating = $row['avg_rating'];

    // Menyimpan hasil ke dalam array dengan buku_id sebagai kunci
    $average_ratings[$buku_id] = round($avg_rating, 2);
}

$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
if($username){
    $nama = getUsername($conn, $username)['nama'];
    $user_id = getUsername($conn, $username)['id'];
    $readlist = getreadlistbukus($user_id);
    //cek favorit
    while ($row = mysqli_fetch_assoc($result)) {
        $buku_id = $row['buku_id']; // Ambil ID buku dari hasil query
        // Cek apakah buku sudah difavoritkan oleh pengguna
        $is_favorited[$buku_id] = checkIfFavorited($user_id, $buku_id);
        // Cek apakah buku sudah ada di readlist pengguna
        $is_in_readlist[$buku_id] = checkIfInreadlist($user_id, $buku_id);
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar buku</title>
    <link href="./output.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="text/javascript" src="yeah.js"></script>
</head>
<body lass="flex font-ibm " data-theme="business">

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
<div class="min-h-screen">
    <div class="flex flex-col justify-center mt-20 w-full">


        <!-- Profile name start -->
        <div class="flex max-h-40 mt-20 mb-10 mx-10  w-full ">
            <div class="w-8/12 flex flex-col ">
                <div class="font-bold text-4xl">Profile</div>
                <div class="flex w-4/12">
                    <div class="mr-5" style="color: white;">by</div>
                    <div class="w-10/12 mr-5" style="color: orange;"><?php echo $nama;?></div>
                    <div class="mr-5" style="color: white;">.</div>
                    <div class="w-10/12 mr-5 " style="color: cornflowerblue;"><?php echo $username;?></div>
                </div>
            </div>
        </div>


        <div class="">
        <div class="flex flex-col px-10">
            <div class="w-6/12 text-2xl border-l-4 border-yellow-500 px-3">List Bacaan readlist <?php echo $nama?></div>
            <div class="text-lg text-gray-500">readlist Bacaan <?php echo $nama?></div>
        </div>


        <?php if (count($readlist) > 0): ?>
            <div class="carousel w-screen my-10 p-10 pt-5">
                <?php foreach ($readlist as $buku): ?>
                    <a href="detail.php?id=<?php echo $buku['buku_id']; ?>">
                        <div class="carousel-item">
                            <div class="flex flex-col">
                                <div class="mx-10 border border-neutral-700 card w-72 py-3 bg-base-100 h-[37rem] px-3 shadow-2xl transition transform hover:scale-105 hover:bg-opacity-90 duration-200">
                                    <div class="w-full flex text-sm">
                                        <div class="w-6/12 flex mr-1 items-center  ">
                                        </div>
                                        <div class="w-6/12 flex flex-col items-center">
                                            <div class="flex p-2">
                                                <img src="img/mafilmstar.png" alt="star" class=" h-5 mx-2">
                                                <div class="font-bold text-lg">
                                                    <?php 
                                                        if(isset($average_ratings[$buku['buku_id']])) {
                                                            echo $average_ratings[$buku['buku_id']];
                                                        } else {
                                                            echo "0";
                                                        }
                                                    ?>
                                                </div>
                                                <div class="text-sm pt-2">/10</div>
                                            </div>
                                        </div>
                                    </div>
                                    <figure class="border w-64 h-80 overflow-hidden rounded-lg">
                                        <img src="img/<?php echo $buku['gambar']; ?>" alt="buku" class="w-44 " />
                                    </figure>
                                    <div class="card-body -mt-5 px-0 py-5">
                                        <h2 class="card-title"><?php echo $buku['judul']; ?></h2>
                                    </div>
                                    <div class="card-actions justify-end">
                                        <div class="badge badge-outline ml-auto"><?php echo $buku['tahun']; ?></div>
                                    </div>

                                    <!--readlist-->
                                    <form method="post" action="removereadlist.php">
                                        <input type="hidden" name="buku_id" value="<?php echo $buku['buku_id']; ?>">
                                        <button type="submit" name="remove_readlist" class="flex  hover:bg-blue-800 p-2 rounded-md w-full mt-2 transition-colors duration-300">
                                            <div class="w-full flex-col">
                                                <div class="font-bold text-sm mx-auto">Hapus dari readlist</div>
                                            </div>
                                        </button>
                                    </form>


                                    <!-- Favorit -->
                                    <form method="post" action="unfavorite.php">
                                        <input type="hidden" name="buku_id" value="<?php echo htmlspecialchars($buku['buku_id']); ?>">
                                        <?php if ($is_favorited[$buku['buku_id']]): ?>
                                            <button type="submit" name="unfavorite" class="flex  hover:bg-red-800 p-2 rounded-md w-full mt-2 transition-colors duration-300">
                                                <div class="w-full flex-col">
                                                    <div class="font-bold text-sm mx-auto">Hapus Favorit</div>
                                                </div>
                                            </button>
                                        <?php else: ?>
                                            <button type="submit" name="favorite" class="flex bg-red-600 hover:bg-red-800 p-2 rounded-md w-full mt-2 transition-colors duration-300">
                                                <div class="my-auto mx-1">
                                                    <img src="img/plussign.png" alt="">
                                                </div>
                                                <div class="w-full flex-col">
                                                    <div class="font-bold text-sm mx-auto">Tambahkan ke List Favorit</div>
                                                </div>
                                            </button>
                                        <?php endif; ?>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>Tidak ada buku di readlist.</p>
        <?php endif; ?>


        <div class="flex flex-col px-10">
            <div class="w-6/12 text-2xl border-l-4 border-yellow-500 px-3">List Bacaan Favorit <?php echo $nama?></div>
            <div class="text-lg text-gray-500">Bacaan favorit <?php echo $nama?></div>
        </div>

        <?php if (count($favorites) > 0): ?>
            <div class="carousel w-screen my-10 p-10 pt-5">
                <?php foreach ($favorites as $buku): ?>
                    <a href="detail.php?id=<?php echo $buku['buku_id']; ?>">
                        <div class="carousel-item">
                            <div class="flex flex-col">
                                <div class="mx-10 border border-neutral-700 card w-72 py-3 bg-base-100 h-[37rem] px-3 shadow-2xl transition transform hover:scale-105 hover:bg-opacity-90 duration-200">
                                    <div>
                                        <div class="w-full flex text-sm">
                                            <div class="w-6/12 flex mr-1 items-center  ">
                                            </div>
                                            <div class="w-6/12 flex flex-col items-center">
                                                <div class="flex p-2">
                                                    <img src="img/mafilmstar.png" alt="star" class=" h-5 mx-2">
                                                    <div class="font-bold text-lg">
                                                    <?php 
                                                        if(isset($average_ratings[$buku['buku_id']])) {
                                                            echo $average_ratings[$buku['buku_id']];
                                                        } else {
                                                            echo "0";
                                                        }
                                                    ?>
                                                    </div>
                                                    <div class="text-sm pt-2">/10</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <figure class="border w-64 h-80 overflow-hidden rounded-lg">
                                        <img src="img/<?php echo $buku['gambar']; ?>" alt="buku" class="w-44">
                                    </figure>
                                    <div class="card-body -mt-5 px-0 py-5">
                                        <h2 class="card-title"><?php echo $buku['judul']; ?></h2>
                                    </div>
                                    <div class="card-actions justify-end">
                                        <div class="badge badge-outline ml-auto"><?php echo $buku['tahun']; ?></div>
                                    </div>

                                    <!-- readlist -->
                                    <form method="post" action="removereadlist.php">
                                        <input type="hidden" name="buku_id" value="<?php echo htmlspecialchars($buku['buku_id']); ?>">
                                        <?php if ($is_in_readlist[$buku['buku_id']]): ?>
                                            <button type="submit" name="remove_readlist" class="flex  hover:bg-blue-800 p-2 rounded-md w-full mt-2 transition-colors duration-300">
                                            <div class="w-full flex-col">
                                                <div class="font-bold text-sm mx-auto">Hapus dari readlist</div>
                                            </div>
                                        </button>
                                        <?php else: ?>
                                            <button class="flex bg-blue-600 hover:bg-blue-800 p-2 rounded-md w-full mt-2 transition-colors duration-300" name="add_readlist" type="submit">
                                                <div class="my-auto mx-1">
                                                    <img src="img/plussign.png" alt="">
                                                </div>
                                                <div class="w-full flex-col">
                                                    <div class="font-bold text-sm mx-auto">Tambahkan ke List Bacaan</div>
                                                </div>
                                            </button>
                                        <?php endif; ?>
                                    </form>

                                    <!-- Favorit -->
                                    <form method="post" action="unfavorite.php">
                                        <input type="hidden" name="buku_id" value="<?php echo $buku['buku_id']; ?>">
                                        <button class="flex hover:bg-red-800 p-2 rounded-md w-full mt-2 transition-colors duration-300" type="submit" name="unfavorite">
                                            <div class="w-full flex-col">
                                                <div class="font-bold text-sm mx-auto">Hapus Favorit</div>
                                            </div>
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>Tidak ada buku favorit.</p>
        <?php endif; ?>

</div>

    </div>    
</body>
