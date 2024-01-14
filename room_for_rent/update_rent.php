<?php 
    include("../con_db.php");
    $ren_id = $_POST['ren_id'];
    $ren_number = $_POST['ren_number'];
    $ren_number2 = $_POST['ren_number2'];
    $t_name = $_POST['t_name'];
    $tprice = $_POST['tprice'];
    $rprice = $_POST['rprice'];
    $remark = $_POST['remark'];
    $select = mysqli_query($conn,"SELECT * FROM room_for_rent WHERE ren_number = '$ren_number'");
    $check = mysqli_fetch_array($select);
    if($ren_number == $ren_number2){
        $update_rent = mysqli_query($conn,"UPDATE room_for_rent SET ren_number = '$ren_number',room_id = '$t_name',time_price = '$tprice',ren_price = '$rprice',ren_remark = '$remark' WHERE ren_id = $ren_id");
        if($update_rent){
            echo "<script>
                    Swal.fire({
                        position: 'top',
                        icon:'success',
                        title:'ແກ້ໄຂສຳເລັດ',
                        showConfirmButton:false
                    })
                    setTimeout(() =>{
                        window.location='select_rent.php';
                    },1500)
                </script>";
        }
    }else if($check <> 0){
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
        $update_rent = mysqli_query($conn,"UPDATE room_for_rent SET ren_number = '$ren_number',room_id = '$t_name',time_price = '$tprice',ren_price = '$rprice',ren_remark = '$remark' WHERE ren_id = $ren_id");
        if($update_rent){
            echo "<script>
                    Swal.fire({
                        position: 'top',
                        icon:'success',
                        title:'ແກ້ໄຂສຳເລັດ',
                        showConfirmButton:false
                    })
                    setTimeout(() =>{
                        window.location='select_rent.php';
                    },1500)
                </script>";
        }
    }
    
?>