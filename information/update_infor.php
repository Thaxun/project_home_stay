<?php 
    include("../con_db.php");
    $i_id = $_POST['i_id'];
    $ren_number = $_POST['ren_number'];
    // $i_numuser = $_POST['i_numuser'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $tel = $_POST['tel'];
    $remark = $_POST['remark'];
    // $i_numuser2 = $_POST['i_numuser2'];
    $update_infor = mysqli_query($conn,"UPDATE information SET ren_id = '$ren_number',fname = '$fname',lname = '$lname',tel = '$tel',i_remark = '$remark' WHERE i_id = $i_id");
        if($update_infor){
            echo "<script>
            Swal.fire({
                position: 'top-right',
                icon: 'success',
                title: 'ແກ້ໄຂສຳເລັດ',
                showConfirmButton:false
            })
            setTimeout(() =>{
                window.location='select_infor.php';
            },1500)
        </script>";
        }
    
?>