<?php 
    include('../con_db.php');
    $dl_id = $_GET['dis_id'];
    $delete_district = mysqli_query($conn,"DELETE FROM district WHERE dis_id = $dl_id");
    if($delete_district){
        echo "<script>
            location='form_district.php';
             </script>";
    }
?>