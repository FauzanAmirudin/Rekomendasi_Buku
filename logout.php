<?php
session_start();
session_unset();
session_destroy();
header('location: login.php')
?>

<!-- <script type="text/javascript">
    alert('selamat, anda berhasil logout');
    location.href = 'login.php'
</script> -->