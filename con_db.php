<?php 
    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'home_stay2022';
    $conn = mysqli_connect($server,$user,$pass,$dbname);
    if(!$conn){
        die("error".mysqli_error($conn));
    }
?>