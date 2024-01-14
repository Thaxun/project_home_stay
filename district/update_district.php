<?php 
    include("../con_db.php");
    $dis_id = $_POST['dis_id'];
    $pro = $_POST['pro'];
    $dis = $_POST['dis'];
    $remark = $_POST['remark'];
    $update_district = mysqli_query($conn,"UPDATE district SET pro_id = '$pro',dis_name = '$dis',remark = '$remark' WHERE dis_id = $dis_id");
    if($update_district){
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'ແກ້ໄຂສຳເລັດ',
                showConfirmButton: false
            })
            window.setTimeout(function(){
                window.location='form_district.php';
            },1500)
             </script>";
    }
?>