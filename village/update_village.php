<?php 
    include("../con_db.php");
    $vill_id = $_POST['vill_id'];
    $pro_id = $_POST['pro_id'];
    $dis_id = $_POST['dis_id'];
    $vill_name = $_POST['vill_name'];
    $remark = $_POST['remark'];
    $update_village = mysqli_query($conn,"UPDATE village SET pro_id = '$pro_id',dis_id = '$dis_id',vill_name = '$vill_name',remark = '$remark' WHERE vill_id = $vill_id");
    if($update_village){
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'ແກ້ໄຂຂໍ້ມູນສຳເລັດ',
                showConfirmButton: false
            })
            setTimeout (() => {
                location = 'form_village.php';
            },1500)
        </script>";
    }
?>