<?php 
    session_start();
    include("../../con_db.php");
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = md5($password);
    $select_user = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username' AND password = '$password'");
    $check_user = mysqli_num_rows($select_user);
    if($check_user <> 0){
        $row = mysqli_fetch_array($select_user);
        if($row['status'] == 'admin'){
            $_SESSION['u_id'] = $row['u_id'];
            $_SESSION['f_name'] = $row['fname'];
            $_SESSION['l_name'] = $row['lname'];
            $_SESSION['image'] = $row['image'];
            $_SESSION['tel'] = $row['tel'];
            $_SESSION['sts'] = $row['status'];
            $_SESSION['checks'] = 1;
            echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'ເຂົ້າສູ່ລະບົບສຳເລັດ',
                    showConfirmButton:false
                })
                setTimeout(() =>{
                    window.location = 'menu_admin.php';
                },1500)
            </script>";
        }elseif($row['status'] == 'user'){
            $_SESSION['u_id'] = $row['u_id'];
            $_SESSION['f_name'] = $row['fname'];
            $_SESSION['l_name'] = $row['lname'];
            $_SESSION['image'] = $row['image'];
            $_SESSION['tel'] = $row['tel'];
            $_SESSION['checks'] = 1;
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'ເຂົ້າສູ່ລະບົບສຳເລັດ',
                showConfirmButton:false
            })
            setTimeout(() =>{
                window.location = 'menu_user.php';
            },1500)
        </script>";
        }elseif($row['status'] == 'counter'){
            $_SESSION['u_id'] = $row['u_id'];
            $_SESSION['f_name'] = $row['fname'];
            $_SESSION['l_name'] = $row['lname'];
            $_SESSION['image'] = $row['image'];
            $_SESSION['tel'] = $row['tel'];
            $_SESSION['checks'] = 1;
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'ເຂົ້າສູ່ລະບົບສຳເລັດ',
                showConfirmButton:false
            })
            setTimeout(() =>{
                window.location = 'emp/all_rent.php';
            },1500)
        </script>";
        }elseif($row['status'] == 'clean'){
            $_SESSION['u_id'] = $row['u_id'];
            $_SESSION['f_name'] = $row['fname'];
            $_SESSION['l_name'] = $row['lname'];
            $_SESSION['image'] = $row['image'];
            $_SESSION['tel'] = $row['tel'];
            $_SESSION['checks'] = 1;
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'ເຂົ້າສູ່ລະບົບສຳເລັດ',
                showConfirmButton:false
            })
            setTimeout(() =>{
                window.location = 'emp/all_rent_clean.php';
            },1500)
        </script>";
        }
    }else{
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'ຊື່ ຫຼື ລະຫັດຜ່ານບໍ່ຖືກຕ້ອງ',
            text: 'ກະລຸນາປ້ອນໃໝ່',
            showConfirmButton:false,
            timer:1500
        })
    </script>";
    }
?>