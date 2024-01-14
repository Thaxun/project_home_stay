<?php 
    include('../con_db.php');
    $pro_id = $_GET['pro_id'];
    $delete = mysqli_query($conn,"DELETE FROM province WHERE pro_id = $pro_id ");
    if($delete){
        echo "<script>
            location='form_province.php';
        </script>";
    }
?>