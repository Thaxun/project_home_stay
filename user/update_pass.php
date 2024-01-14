<?php 
    include("../con_db.php");
    $u_id = $_POST['u_id'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];
    if($password_1 <> $password_2){
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'ລະຫັດຜ່ານບໍ່ຕົງກັນ',
                text: 'ກະລຸນາປ້ອນລະຫັດຜ່ານໃໝ່',
                showConfirmButton:false,
                timer: 1500
            })
        </script>";
    }else{
        $password = md5($password_1);
        $update = mysqli_query($conn,"UPDATE user SET password = '$password' WHERE u_id = $u_id");
        if($update){
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'ແກ້ໄຂລະຫັດຜ່ານສຳເລັດ',
                showConfirmButton:false,
            })
            setTimeout(() =>{
                window.location = 'select_user.php';
            },1500);
        </script>";
        }
    }
?>