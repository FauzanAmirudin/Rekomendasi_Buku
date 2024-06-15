<?php
    // session_start();
    // require "session.php" ;
    require "../koneksi.php";
    $queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori");
    $jumlahKategori = mysqli_num_rows($queryKategori);

    $queryBuku = mysqli_query($koneksi, "SELECT * FROM buku");
    $jumlahBuku = mysqli_num_rows($queryBuku);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

.card-container {
    display: flex;
    gap: 20px;
    justify-content: center;
    align-items: center;
    margin-top: 40px;
}

.card {
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    display: flex;
    align-items: center;
    padding: 20px;
    width: 300px;
}

.card-icon {
    flex-shrink: 0;
    width: 50px;
    height: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-right: 20px;
}

.card-icon img {
    max-width: 100%;
    max-height: 100%;
}

.card-content h2 {
    margin: 0;
    font-size: 24px;
}

.card-content p {
    margin: 5px 0;
}

.card-content a {
    color: white;
    text-decoration: none;
    font-weight: bold;
}

.kategori-card {
    background-color: #FF7622;
    color: white;
}

.produk-card {
    background-color: #FF7622;
    color: white;
}

.produk-card .highlight {
    background-color: #007bff;
    padding: 2px 5px;
    border-radius: 3px;
    color: white;
}

    </style>
</head>
<body>
    <?php require "navbar.php" ?>
    <!-- <h2>Halo <?php echo $_SESSION['username']; ?></h2> -->

    <div class="card-container">
        <div class="card kategori-card">
            <div class="card-content">
                <h2>Kategori</h2>
                <p> <?php echo $jumlahKategori; ?> Kategori</p>
                <a href="kategori.php">Lihat Detail</a>
            </div>
        </div>
        <div class="card kategori-card">
            <div class="card-content">
                <h2>Buku</h2>
                <p><?php echo $jumlahBuku; ?> Buku</p>
                <a href="#">Lihat Detail</a>
            </div>
        </div>
    </div>
    
</body>
</html>