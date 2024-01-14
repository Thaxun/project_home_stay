<?php 
    include("../con_db.php");
    $pro_id = $_POST['pro_id'];
    $province = $_POST['province'];
    $remark = $_POST['remark'];
    $update = mysqli_query($conn,"UPDATE province SET pro_name = '$province',remark = '$remark' WHERE pro_id = '$pro_id' ");
    if($update){
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'ແກ້ໄຂສຳເລັດ',
                showConfirmButton:false
            })
            window.setTimeout(function(){
                window.location='form_province.php';
            },1500)
        </script>";
    }
?>