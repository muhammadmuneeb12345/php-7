<?php
    session_start();
    if(isset($_SESSION['isAdmin']) || $_SESSION['isAdmin']){
        header('login.php');
    }
?>