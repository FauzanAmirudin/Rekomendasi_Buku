<?php
    session_start();
    if($_SESSION['user'] == false){
        header('location: login.php');
    }
?>