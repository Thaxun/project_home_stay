<?php 
    session_start();
    include("../con_db.php");
    $i_id = $_POST['i_id'];
    $ren_id = $_POST['ren_id'];
    $i_numuser = $_POST['i_numuser'];
    $datetime  = $_POST['datetime'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $user_id = $_SESSION['u_id'];
    $insert_pay = mysqli_query($conn,"INSERT INTO pay_for_room(i_id,ren_id,numuser,name,check_out,price,u_id) VALUES('$i_id','$ren_id','$i_numuser','$name','$datetime','$price','$user_id')");
    if($insert_pay){
        mysqli_query($conn,"UPDATE room_for_rent SET status_room = 2 WHERE ren_id = $ren_id");
        $show_pay =  mysqli_query($conn,"SELECT max(pay_id) FROM pay_for_room");
        $show_id = mysqli_fetch_array($show_pay);
        $_SESSION['pay_id'] = $show_id[0];
    }
?>