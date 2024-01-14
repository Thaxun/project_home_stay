<?php 
    require_once '../con_db.php';
    $id = $_POST['ren_id'];
    $sql = mysqli_query($conn,"UPDATE room_for_rent SET status_room = 1 WHERE ren_id = $id");
?>