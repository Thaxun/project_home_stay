<?php 
    include("../con_db.php");
    $province = $_POST['province'];
    $remark = $_POST['remark'];
    $select = mysqli_query($conn,"SELECT * FROM province WHERE pro_name = '$province' ");
    $check_name = mysqli_num_rows($select);
    if($check_name <> 0){
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'ແຂວງນີ້ມີແລ້ວ',
            })
          
        </script>";
    }else{
        $insert = mysqli_query($conn,"INSERT INTO province SET pro_name='$province',remark = '$remark' ");
    if($insert){
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