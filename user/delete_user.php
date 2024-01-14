<?php 
    include("../con_db.php");
    $u_id = $_GET['u_id'];
    $delete = mysqli_query($conn,"DELETE FROM user WHERE u_id = $u_id");
    if($delete){
        echo "<script>location='select_user.php';</script>";
    }
?>