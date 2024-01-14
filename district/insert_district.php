<?php 
    include("../con_db.php");
    $pro = $_POST['pro'];
    $dis = $_POST['dis'];
    $remark = $_POST['remark'];

    $select_district = mysqli_query($conn,"SELECT * FROM district WHERE dis_name = '$dis' AND pro_id ='$pro'");
    $check = mysqli_num_rows($select_district);
    if($check <> 0){
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'ແຂວງ ແລະ  ເມືອງມີແລ້ວ',
        })
    </script>";
    }else{
        $insert_district = mysqli_query($conn,"INSERT INTO district(pro_id,dis_name,remark) VALUES('$pro','$dis','$remark')");
        if($insert_district){
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