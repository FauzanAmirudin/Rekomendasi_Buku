<?php
// Lakukan koneksi ke database
include 'databse.php';

// Inisialisasi variabel untuk menampung hasil pencarian
$searchResults = "";

if (isset($_GET['q'])) {
    $searchQuery = $_GET['q'];

    // Query untuk mencari buku berdasarkan judul, penulis, atau kategori
    $sql = "SELECT * FROM books 
            WHERE title LIKE ? OR author LIKE ? OR category LIKE ?";
    
    // Persiapan statement
    $stmt = $conn->prepare($sql);
    
    // Bind parameter dan eksekusi statement
    $searchTerm = "%$searchQuery%";
    $stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
    $stmt->execute();
    
    // Ambil hasil query
    $result = $stmt->get_result();
    
    // Tampilkan hasil jika ada
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $searchResults .= "<div class='book-card'>";
            $searchResults .= "<img src='../img/" . $row['image'] . "' alt='" . $row['title'] . "'>";
            $searchResults .= "<div class='book-info'>";
            $searchResults .= "<h3>" . $row['title'] . "</h3>";
            $searchResults .= "<p>" . $row['author'] . "</p>";
            $searchResults .= "<div class='details'>";
            // Tambahkan elemen lain seperti harga, rating, dll.
            $searchResults .= "</div>";
            $searchResults .= "<div class='tags'>";
            // Tambahkan elemen tag sesuai dengan kebutuhan
            $searchResults .= "</div>";
            $searchResults .= "</div>";
            $searchResults .= "</div>";
        }
    } else {
        $searchResults = "<p>No books found matching your search.</p>";
    }
    
    // Tutup statement dan koneksi
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekomendasi Buku</title>
    <link rel="stylesheet" href="../css/search1.css">
</head>

<body>
    <div class="container">
        <header>
            <div class="search-bar">
                <a href="homepage.php" class="back-button">&larr;</a>
                <form action="search.php" method="get">
                    <input type="text" name="q" placeholder="Cari Judul Buku dan Penulis" id="search-box">
                </form>
            </div>
        </header>

        <h2>Hasil pencarian</h2>
        <section class="content">
            
            <div class="book-list">
                <?php
                echo $searchResults;
                ?>
            </div>
        </section>

        <footer>
            <p>&copy; RekomendasiBuku 2024. All Rights Reserved</p>
        </footer>
    </div>
</body>
</html>
