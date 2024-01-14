<?php 
    session_start();
    include("../con_db.php");
    $ren_number = $_POST['ren_number'];
    $t_name = $_POST['t_name'];
    $rprice = $_POST['rprice'];
    $tprice = $_POST['tprice'];
    $remark = $_POST['remark'];
    $user_id = $_SESSION['u_id'];
    $select = mysqli_query($conn,"SELECT * FROM room_for_rent WHERE ren_number = '$ren_number'");
    $check = mysqli_fetch_array($select);
    if($check <> 0){
        echo "<script>
                Swal.fire({
                    icon:'warning',
                    title:'ຊື່ຫ້ອງນີ້ມີແລ້ວ',
                    text:'ກະລຸນາປ້ອນຊື່ຫ້ອງໃໝ່',
                    showConfirmButton:false,
                    timer:1500
                })
            </script>";
    }else{
        $insert_rent = mysqli_query($conn,"INSERT INTO room_for_rent(ren_number,room_id,status_room,ren_price,time_price,ren_remark,u_id) VALUES('$ren_number','$t_name','1','$rprice','$tprice','$remark','$user_id')");
        if($insert_rent){
            echo "<script>
                Swal.fire({
                    icon:'success',
                    title:'ບັນທືກສຳເລັດ',
                    showConfirmButton:false
                })
                setTimeout(() =>{
                    location.reload();
                },1500)
            </script>";
        }
    }
?>