<?php 
    include('../con_db.php');
    $u_id = $_POST['u_id'];
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
    $tel = $_POST['tel'];
    $remark = $_POST['remark'];
    if(is_array($_FILES)){
        if(is_uploaded_file($_FILES['up_image']['tmp_name']) == ""){
            $update_user = mysqli_query($conn,"UPDATE user SET fname = '$fname',lname = '$lname',gender = '$gender',dob = '$date',pro_id = '$pro', dis_id = '$dis',vill_id = '$vill',vill_now = '$vill_n',status = '$status',tel = '$tel',username = '$username',u_remark = '$remark' WHERE u_id = $u_id");
            if($update_user){
                echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'ແກ້ໄຂສຳເລັດ',
                        showConfirmButton:false,
                        timer:1500
                    })
                    setTimeout(() =>{
                        window.location='select_user.php';
                    },1500)
                </script>";
            }
        }else{
            $check = getimagesize($_FILES['up_image']['tmp_name']);
            if($check){
                $file_name = $_FILES['up_image']['name'];
                $file_image = '../upload/'.$file_name;
                $array = pathinfo($file_image,PATHINFO_EXTENSION);
                    if(!file_exists($file_image)){
                        if(move_uploaded_file($_FILES['up_image']['tmp_name'],$file_image)){
                            $update_user = mysqli_query($conn,"UPDATE user SET fname = '$fname',lname = '$lname',gender = '$gender',dob = '$date',pro_id = '$pro', dis_id = '$dis',vill_id = '$vill',vill_now = '$vill_n',status = '$status',tel = '$tel',username = '$username',u_remark = '$remark',image = '$file_name' WHERE u_id = $u_id");
                            if($update_user){
                                echo "<script>
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'ແກ້ໄຂສຳເລັດ',
                                        showConfirmButton:false,
                                        timer:1500
                                    })
                                    setTimeout(() =>{
                                        window.location='select_user.php';
                                    },1500)
                                </script>";
                            }
                        }
                    }else{
                        $new_name = $file_image.time().".".$array;
                        if(move_uploaded_file($_FILES['up_image']['tmp_name'],$new_name)){
                            $update_user = mysqli_query($conn,"UPDATE user SET fname = '$fname',lname = '$lname',gender = '$gender',dob = '$date',pro_id = '$pro', dis_id = '$dis',vill_id = '$vill',vill_now = '$vill_n',status = '$status',tel = '$tel',username = '$username',u_remark = '$remark',image = '$new_name' WHERE u_id = $u_id");
                            if($update_user){
                                echo "<script>
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'ແກ້ໄຂສຳເລັດ',
                                        showConfirmButton:false,
                                        timer:1500
                                    })
                                    setTimeout(() =>{
                                        window.location='select_user.php';
                                    },1500)
                                </script>";
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
    }













    // if(isset($_POST['submit'])){
       
    //     $u_id = $_POST['u_id'];
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
    //     $tel = $_POST['tel'];
    //     $remark = $_POST['remark'];
    //     $image = $_POST['up_image2'];
    //     $upload = $_FILES['up_image']['name'];
    //     if($upload != ""){
    //         $target = "../upload/";
    //         $file_image = $target . basename($_FILES['up_image']['name']);
    //         $array = pathinfo($file_image,PATHINFO_EXTENSION);
    //         if(!file_exists($file_image)){
    //             if(move_uploaded_file($_FILES['up_image']['tmp_name'],$file_image)){
                    
    //             }
    //         }else{
    //             $new_name = $file_image . time().".".$array;
    //             if(move_uploaded_file($_FILES['up_image']['tmp_name'],$new_name)){
                 
    //             }
    //         }
    //     }else{
    //         $file_image = $image;
    //     }
    //     $update_user = mysqli_query($conn,"UPDATE user SET fname = '$fname',lname = '$lname',gender = '$gender',dob = '$date',pro_id = '$pro', dis_id = '$dis',vill_id = '$vill',vill_now = '$vill_n',status = '$status',tel = '$tel',username = '$username',u_remark = '$remark',image = '$file_image' WHERE u_id = $u_id");
    //     if($update_user){
    //         header("location:select_user.php");
    //     }
    // }
        
?>