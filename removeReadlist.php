<?php
require 'function.php';
$conn = connectDatabase();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $buku_id = $_POST['buku_id'];
    $username = $_SESSION['username'];
    $user_id = getUsername($conn, $username)['id'];

    if ($buku_id > 0) {
        if (isset($_POST['add_readlist'])) {
            $message = addToreadlist($user_id, $buku_id);
        } elseif (isset($_POST['remove_readlist'])) {
            $message = removeFromreadlist($user_id, $buku_id);
        } else {
            $message = "Aksi tidak valid.";
        }
        echo $message;
    } else {
        echo "buku ID tidak valid.";
    }
        header("Location: profil.php?user_id=$user_id");
        exit();
}
?>