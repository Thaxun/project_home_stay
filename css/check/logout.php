<?php 
    session_start();
    include('../../con_db.php');
    unset($_SESSION['u_id']);
    unset($_SESSION['f_name']);
    unset($_SESSION['l_name']);
    unset($_SESSION['checks']);
    session_destroy();
    header("location:../../index.php");
    exit();
?>