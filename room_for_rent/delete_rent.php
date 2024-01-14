<?php 
    include('../con_db.php');
    $id = $_GET['ren_id'];
    $delete = mysqli_query($conn,"DELETE FROM room_for_rent WHERE ren_id = $id");
    if($delete){
        header("location:select_rent.php");
        exit(0);
    }
?>