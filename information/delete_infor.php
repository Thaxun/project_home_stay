<?php 
    include("../con_db.php");
    $id = $_GET['i_id'];
    $delete = mysqli_query($conn,"DELETE FROM information WHERE i_id = $id");
    if($delete){
        echo "<script>
        location = 'select_infor.php';
    </script>";
    }
?>