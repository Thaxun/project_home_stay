<?php 
    include('../con_db.php');
    $pro_id = $_POST['pro'];
    $dis_id = $_POST['dis_name'];
    $vill = $_POST['vill'];
    $remark = $_POST['remark'];
    $select_village = "SELECT * FROM village WHERE dis_id = '$dis_id' AND vill_name = '$vill'";
    $query_village = mysqli_query($conn,$select_village);
    $check_village = mysqli_num_rows($query_village);
    if($check_village <> 0){
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'ແຂວງ ເມືອງ ແລະ ບ້ານ ມີແລ້ວ',
        })
    </script>";
    }else{
        $insert_village = mysqli_query($conn,"INSERT INTO village(pro_id,dis_id,vill_name,remark) VALUES('$pro_id','$dis_id','$vill','$remark')");
    if($insert_village){
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'ບັນທືກສຳເລັດ',
            showConfirmButton: false
        })
        window.setTimeout(function(){
            location.reload();
        },1500)
         </script>";
    }
    }
?>