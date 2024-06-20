<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


// Fungsi untuk membuat koneksi ke database
function connectDatabase() {
    $conn = mysqli_connect("localhost", "root", "", "rekomendasi_db");

    // Memeriksa koneksi
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    return $conn;
}

// Fungsi untuk melakukan pencarian buku berdasarkan judul
function searchbuku($keyword) {
    $conn = connectDatabase();

    // Template query
    $template = "SELECT * FROM buku WHERE judul LIKE ? ORDER BY judul ASC";
    $stmt = mysqli_prepare($conn, $template);

    // Wildcard untuk pencarian
    $keyword = "%{$keyword}%";

    // Menambahkan statement
    mysqli_stmt_bind_param($stmt, "s", $keyword);

    // Eksekusi
    mysqli_stmt_execute($stmt);

    // Mengambil hasil
    $result = mysqli_stmt_get_result($stmt);

    // Menutup statement
    mysqli_stmt_close($stmt);

    // Menutup koneksi
    mysqli_close($conn);

    return $result;
}

// Fungsi untuk logout
function logout() {
    // Hapus semua data sesi
    $_SESSION = array();

    // Jika menggunakan cookie sesi, hapus cookie-nya juga
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Hancurkan sesi
    session_destroy();
}

// Cek apakah tombol logout ditekan
if (isset($_POST['logout'])) {
    logout();
    // Redirect ke halaman lain setelah logout (jika diperlukan)
    // header("Location: halaman_lain.php");
    // exit();
}

// Fungsi untuk mengambil nama pengguna berdasarkan username dari session
function getUsername($conn, $username) {
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username ='$username'");
    return mysqli_fetch_assoc($result);
}

function getUsername_id($conn, $user_id) {
    $result = mysqli_query($conn, "SELECT * FROM user WHERE id ='$user_id'");
    return mysqli_fetch_assoc($result);
}

function addFavorite($user_id, $buku_id) {
    $conn = connectDatabase();

    // Cek apakah user sudah memfavoritkan buku ini
    $check_query = $conn->prepare("SELECT * FROM favorit WHERE user_id = ? AND buku_id = ?");
    $check_query->bind_param("ii", $user_id, $buku_id);
    $check_query->execute();
    $result = $check_query->get_result();

    if ($result->num_rows == 0) {
        // Tambah hitungan favorit di tabel buku
        $update_buku_query = $conn->prepare("UPDATE buku SET favorit = favorit + 1 WHERE buku_id = ?");
        $update_buku_query->bind_param("i", $buku_id);
        $update_buku_query->execute();

        // Masukkan ke tabel favorit
        $insert_favorite_query = $conn->prepare("INSERT INTO favorit (user_id, buku_id) VALUES (?, ?)");
        $insert_favorite_query->bind_param("ii", $user_id, $buku_id);
        $insert_favorite_query->execute();

        if ($update_buku_query->affected_rows > 0 && $insert_favorite_query->affected_rows > 0) {
            return "buku berhasil ditambahkan ke favorit!";
        } else {
            return "Gagal menambahkan buku ke favorit.";
        }
    } else {
        return "buku sudah ada di daftar favorit.";
    }
}

//hapus favorit
function removeFavorite($user_id, $buku_id) {
    $conn = connectDatabase();

    // Hapus dari tabel favorit
    $delete_favorite_query = $conn->prepare("DELETE FROM favorit WHERE user_id = ? AND buku_id = ?");
    $delete_favorite_query->bind_param("ii", $user_id, $buku_id);
    $delete_favorite_query->execute();

    // Kurangi hitungan favorit di tabel buku
    $update_buku_query = $conn->prepare("UPDATE buku SET favorit = favorit - 1 WHERE buku_id = ?");
    $update_buku_query->bind_param("i", $buku_id);
    $update_buku_query->execute();

    if ($delete_favorite_query->affected_rows > 0 && $update_buku_query->affected_rows > 0) {
        return "buku berhasil dihapus dari favorit!";
    } else {
        return "Gagal menghapus buku dari favorit.";
    }
}

//cek favorit
function checkIfFavorited($user_id, $buku_id) {
    $conn = connectDatabase();;

    $query = $conn->prepare("SELECT * FROM favorit WHERE user_id = ? AND buku_id = ?");
    $query->bind_param("ii", $user_id, $buku_id);
    $query->execute();
    $result = $query->get_result();

    return $result->num_rows > 0;
}

//tambah readlist
function addToreadlist($user_id, $buku_id) {
    $conn = connectDatabase();;

    // Periksa apakah buku_id ada di tabel buku
    $buku_check_query = $conn->prepare("SELECT * FROM buku WHERE buku_id = ?");
    $buku_check_query->bind_param("i", $buku_id);
    $buku_check_query->execute();
    $buku_result = $buku_check_query->get_result();

    if ($buku_result->num_rows == 0) {
        return "buku ID tidak ditemukan.";
    }

    // Cek apakah user sudah menambahkan buku ini ke readlist
    $check_query = $conn->prepare("SELECT * FROM readlist WHERE user_id = ? AND buku_id = ?");
    $check_query->bind_param("ii", $user_id, $buku_id);
    $check_query->execute();
    $result = $check_query->get_result();

    if ($result->num_rows == 0) {
        // Masukkan ke tabel readlist
        $insert_readlist_query = $conn->prepare("INSERT INTO readlist (user_id, buku_id) VALUES (?, ?)");
        $insert_readlist_query->bind_param("ii", $user_id, $buku_id);
        $insert_readlist_query->execute();

        if ($insert_readlist_query->affected_rows > 0) {
            return "buku berhasil ditambahkan ke readlist!";
        } else {
            return "Gagal menambahkan buku ke readlist.";
        }
    } else {
        return "buku sudah ada di readlist.";
    }
}

function removeFromreadlist($user_id, $buku_id) {
    $conn = connectDatabase();;

    // Hapus dari tabel readlist
    $delete_readlist_query = $conn->prepare("DELETE FROM readlist WHERE user_id = ? AND buku_id = ?");
    $delete_readlist_query->bind_param("ii", $user_id, $buku_id);
    $delete_readlist_query->execute();

    if ($delete_readlist_query->affected_rows > 0) {
        return "buku berhasil dihapus dari readlist!";
    } else {
        return "Gagal menghapus buku dari readlist.";
    }
}

//cek readlist
function checkIfInreadlist($user_id, $buku_id) {
    $conn = connectDatabase();;

    $query = $conn->prepare("SELECT * FROM readlist WHERE user_id = ? AND buku_id = ?");
    $query->bind_param("ii", $user_id, $buku_id);
    $query->execute();
    $result = $query->get_result();

    return $result->num_rows > 0;
}

function getFavoritebukus($user_id) {
    $conn = connectDatabase();;

    $query = $conn->prepare("
        SELECT *
        FROM favorit
        JOIN buku ON favorit.buku_id = buku.buku_id
        WHERE favorit.user_id = ?
    ");
    $query->bind_param("i", $user_id);
    $query->execute();
    $result = $query->get_result();

    $bukus = [];
    while ($row = $result->fetch_assoc()) {
        $bukus[] = $row;
    }

    return $bukus;
}

function getreadlistbukus($user_id) {
    $conn = connectDatabase();;

    $query = $conn->prepare("
        SELECT *
        FROM readlist
        JOIN buku ON readlist.buku_id = buku.buku_id
        WHERE readlist.user_id = ?
    ");
    $query->bind_param("i", $user_id);
    $query->execute();
    $result = $query->get_result();

    $bukus = [];
    while ($row = $result->fetch_assoc()) {
        $bukus[] = $row;
    }

    return $bukus;
}

?>
