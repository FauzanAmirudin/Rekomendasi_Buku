<?php
    // session_start();
    // require "session.php" ;
    require "../koneksi.php";
    $queryKategori = mysqli_query($koneksi, "SELECT * FROM kategori");
    $jumlahKategori = mysqli_num_rows($queryKategori);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>

    <style>

.table-container {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-left: 170px;
    margin-right: 170px;
}

.genre-table {
    width: 100%;
    border-collapse: collapse;
}

.genre-table th, .genre-table td {
    padding: 12px 15px;
    border: 1px solid #ddd;
    text-align: left;
}

.genre-table th {
    background-color: #FF7622;
    color: white;
}

.genre-table tr:nth-child(even) {
    background-color: #f2f2f2;
}

.genre-table tr:hover {
    background-color: #ddd;
}
.form-container {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}

.form-container h2 {
    margin-top: 0;
}

.form-container form {
    display: flex;
    gap: 10px;
}

.form-container input[type="text"] {
    flex: 1;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.form-container button {
    padding: 10px 20px;
    border: none;
    background-color: #FF7622;
    color: white;
    border-radius: 5px;
    cursor: pointer;
}

.form-container button:hover {
    background-color: #45a049;
}

    </style>
</head>
<body>
<?php require "navbar.php" ?>

<h2 style="margin-left: 170px;">List Kategori</h2>
<div class="table-container">
        <div class="form-container">
            <h2>Tambah Genre Baru</h2>
            <form id="genreForm" action="" method="post">
                <!-- <label for="kategori">Kategori</label> -->
                <input type="text" id="genreInput" name="kategori" placeholder="Masukkan Genre Baru" required>
                <button type="submit" name="simpan_kategori">Tambah Genre</button>
            </form>

            <?php 
                if(isset($_POST['simpan_kategori'])){
                    $kategori = htmlspecialchars($_POST['kategori']);

                    $queryExist = mysqli_query($koneksi, "SELECT nama FROM kategori WHERE nama = '$kategori'");
                    $jumlahDataKategoriBaru = mysqli_num_rows($queryExist);
                    
                    if ($jumlahDataKategoriBaru > 0){
                        ?>
                        <script>alert("Kategori sudah ada");</script>
                        <?php
                    } else {
                        $querySimpan = mysqli_query($koneksi, "INSERT INTO kategori (nama) VALUES ('$kategori')");
                       
                        if($querySimpan){
                            ?>
                                <script>alert("Kategori Berhasil Tersimpan");</script>

                                <meta http-equiv="refresh" content="2; url=kategori.php" />
                            <?php 
                        }
                        else {
                            echo mysqli_error($koneksi);
                        }
                    }                  
                }
            ?>


        </div>
        <table class="genre-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Genre</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($jumlahKategori == 0){
                ?>
                    <tr>
                        <td colspan="3" style="text-align: center;">Data Kategori Tidak Tersedia</td>
                    </tr>
                <?php
                    } else {
                        $jumlah = 1;
                        while($data = mysqli_fetch_array($queryKategori)){
                ?>
                    <tr>
                        <td> <?php echo $jumlah?> </td>
                        <td> <?php echo $data['nama']?> </td>
                    </tr>

                <?php
                        $jumlah++;
                        }
                    }

                ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>