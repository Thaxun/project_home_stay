<?php 
    include('../con_db.php');
    $del_id = $_GET['vill_id'];
    $delete_village = $conn->query("DELETE FROM village WHERE vill_id = $del_id");
    if($delete_village){
        echo "<script>
            location='form_village.php';
        </script>";
    }
?>