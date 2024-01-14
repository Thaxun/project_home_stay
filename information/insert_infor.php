<?php 
    session_start();
    include("../con_db.php");
    $ren_number = $_POST['ren_number'];
    // $i_numuser = $_POST['i_numuser'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $tel = $_POST['tel'];
    $status_price = $_POST['status_price'];
    $remark = $_POST['remark'];
    $user_id = $_SESSION['u_id'];
    $insert = mysqli_query($conn,"INSERT INTO information(ren_id,fname,lname,tel,i_remark,check_in,status_price,u_id)VALUES('$ren_number','$fname','$lname','$tel','$remark',NOW(),'$status_price','$user_id')");
    if($insert){
        mysqli_query($conn,"UPDATE room_for_rent SET status_room='0'  WHERE ren_id = $ren_number");
        echo "<script>
            Swal.fire({
                position: 'top-right',
                icon: 'success',
                title: 'ບັນທືກສຳເລັດ',
                showConfirmButton:false
            })
            setTimeout(() =>{
                location.reload();
            },1500)
        </script>";
    }
   
?>