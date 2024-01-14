<?php 
    include('../con_db.php');
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $date = $_POST['date'];
    $pro = $_POST['pro'];
    $dis = $_POST['dis'];
    $vill = $_POST['vill'];
    $vill_n = $_POST['vill_n'];
    $status = $_POST['status'];
    $username = $_POST['username'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];
    $tel = $_POST['tel'];
    $remark = $_POST['remark'];
    if(is_array($_FILES)){
        $check = getimagesize($_FILES['up_image']['tmp_name']);
        if($check){
            $file_name = $_FILES['up_image']['name'];
            $file_image = '../upload/'.$file_name;
            $array = pathinfo($file_image,PATHINFO_EXTENSION);
            $select_room = mysqli_query($conn,"SELECT * FROM user WHERE tel = '$tel' OR username = '$username'");
            $check_room = mysqli_num_rows($select_room);
            if($password_1 != $password_2){
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'ລະຫັດຜ່ານບໍ່ຕົງກັນ',
                        showConfirmButton:false,
                        timer:1500
                    })
                </script>";
            }elseif($check_room <> 0){
                echo "<script>
                    Swal.fire({
                        icon: 'warning',
                        title: 'ຊື່ ຫຼື ເບີໂທນີ້ມີແລ້ວ',
                        text: 'ກະລຸນາປ້ອນໃໝ່',
                        showConfirmButton:false,
                        timer:1500
                    })
                </script>";
            }else{
                if(!file_exists($file_image)){
                    if(move_uploaded_file($_FILES['up_image']['tmp_name'],$file_image)){
                        $password = md5($password_1);
                        $insert_user = mysqli_query($conn,"INSERT INTO user(fname,lname,gender,dob,pro_id,dis_id,vill_id,vill_now,status,username,password,tel,u_remark,image) VALUES('$fname','$lname','$gender','$date','$pro','$dis','$vill','$vill_n','$status','$username','$password','$tel','$remark','$file_name')");
                        if($insert_user){
                            echo "<script>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'ບັນທືກສຳເລັດ',
                                    showConfirmButton:false,
                                    timer:1500
                                })
                                setTimeout(() =>{
                                    location.reload();
                                },1500)
                            </script>";
                        }
                    }
                }else{
                    $new_name = $file_image.time().".".$array;
                    if(move_uploaded_file($_FILES['up_image']['tmp_name'],$new_name)){
                        $insert_user = mysqli_query($conn,"INSERT INTO user(fname,lname,gender,dob,pro_id,dis_id,vill_id,vill_now,status,username,password,tel,u_remark,image) VALUES('$fname','$lname','$gender','$date','$pro','$dis','$vill','$vill_n','$status','$username','$password','$tel','$remark','$new_name')");
                        if($insert_user){
                            echo "<script>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'ບັນທືກສຳເລັດ',
                                    showConfirmButton:false,
                                    timer:1500
                                })
                                setTimeout(() =>{
                                    location.reload();
                                },1500)
                            </script>";
                        }
                    }
                }
            }
        }else{
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'ນີ້ບໍ່ແມ່ນຮູບ',
                text: 'ກະລຸນາເລືອກຮູບໃໝ່',
                showConfirmButton:false,
                timer:3000
            })
        </script>";
        }
    }




    // if(isset($_POST['submit'])){
    //     $check_image = getimagesize($_FILES['up_image']['tmp_name']);
    //     if($check_image){
    //     $fname = $_POST['fname'];
    //     $lname = $_POST['lname'];
    //     $gender = $_POST['gender'];
    //     $date = $_POST['date'];
    //     $pro = $_POST['pro'];
    //     $dis = $_POST['dis'];
    //     $vill = $_POST['vill'];
    //     $vill_n = $_POST['vill_n'];
    //     $status = $_POST['status'];
    //     $username = $_POST['username'];
    //     $password_1 = $_POST['password_1'];
    //     $password_2 = $_POST['password_2'];
    //     $tel = $_POST['tel'];
    //     $remark = $_POST['remark'];
    //     $target = "../upload/";
    //     $file_image = $target . basename($_FILES['up_image']['name']);
    //     $array = pathinfo($file_image,PATHINFO_EXTENSION);

    //     if($password_1 != $password_2){
    //         echo "<script>alert('ລະຫັດຜ່ານບໍ່ຕົງກັນ')</script>";
    //     }
    //     $select_user = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username' OR tel = '$tel'");
    //     $check_user = mysqli_num_rows($select_user);
    //     if($check_user <> 0){
    //         echo "<script>alert('ຊື່ຜູ້ໃຊ້ງານ ແລະ ເບີໂທນີ້ມີແລ້ວ')</script>";
    //     }else{
    //         if(!file_exists($file_image)){
    //             if(move_uploaded_file($_FILES['up_image']['tmp_name'],$file_image)){
    //                 $password = md5($password_1);
    //                 $insert_user = mysqli_query($conn,"INSERT INTO user(fname,lname,gender,dob,pro_id,dis_id,vill_id,vill_now,status,username,password,tel,u_remark,image) VALUES('$fname','$lname','$gender','$date','$pro','$dis','$vill','$vill_n','$status','$username','$password','$tel','$remark','$file_image')");
    //                 if($insert_user){
    //                     echo "<script>alert('ບັນທືກສຳເລັດ');location = 'form_user.php';</script>";
    //                 }
    //             }
    //         }else{
    //             $new_name = $file_image . time().".".$array;
    //             if(move_uploaded_file($_FILES['up_image']['tmp_name'],$new_name)){
    //                 $insert_user = mysqli_query($conn,"INSERT INTO user(fname,lname,gender,dob,pro_id,dis_id,vill_id,vill_now,status,username,password,tel,u_remark,image) VALUES('$fname','$lname','$gender','$date','$pro','$dis','$vill','$vill_n','$status','$username','$password','$tel','$remark','$file_image')");
    //                 if($insert_user){
    //                     echo "<script>alert('ບັນທືກສຳເລັດ');location = 'form_user.php';</script>";
    //                 }
    //             }
    //         }
    //     }
    //     }else{
    //         echo "<script>
    //                 alert('ນີ້ບໍ່ແມ່ນຮູບພາບ');location='form_room.php';
    //             </script>";
    //     }
    // }
?>