<?php 
    session_start();
    include("../con_db.php");
    // ລະບົບອັບໂຫລດຮູບ ແບບ ajax
    $t_name = $_POST['t_name'];
    $remark = $_POST['remark'];
    $user_id = $_SESSION['u_id'];
    if(is_array($_FILES)){
        if($t_name == ""){
            echo "<script>
                Swal.fire({
                    icon: 'warning',
                    title: 'ກະລຸນາປ້ອນຊື່',
                    showConfirmButton:false,
                    timer:1500
                })
            </script>";
        }elseif(is_uploaded_file($_FILES['up_image']['tmp_name']) == ""){
            echo "<script>
                Swal.fire({
                    icon: 'warning',
                    title: 'ກະລຸນາເລືອກຮູບ',
                    showConfirmButton:false,
                    timer:1500
                })
            </script>";
        }else{
            $check = getimagesize($_FILES['up_image']['tmp_name']);
            if($check){
                $file_name = $_FILES['up_image']['name'];
                $file_image = '../upload/'.$file_name;
                $array = pathinfo($file_image,PATHINFO_EXTENSION);
                $select_room = mysqli_query($conn,"SELECT * FROM room_type WHERE room_name = '$t_name'");
                $check_room = mysqli_num_rows($select_room);
                if($check_room <> 0){
                    echo "<script>
                        Swal.fire({
                            icon: 'warning',
                            title: 'ຊື່ຫ້ອງນີ້ມີແລ້ວ',
                            showConfirmButton:false,
                            timer:1500
                        })
                    </script>";
                }else{
                    if(!file_exists($file_image)){
                        if(move_uploaded_file($_FILES['up_image']['tmp_name'],$file_image)){
                            $insert_room = mysqli_query($conn,"INSERT INTO room_type(room_name,img,room_remark,u_id)VALUE('$t_name','$file_name','$remark','$user_id')");
                            if($insert_room){
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
                            $insert_room = mysqli_query($conn,"INSERT INTO room_type(room_name,img,room_remark,u_id)VALUE('$t_name','$new_name','$remark','$user_id')");
                            if($insert_room){
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
    }




    // ລະບົບອັບໂຫລດຮູບ ແບບ PHP
    //if(isset($_POST['submit'])){
    //     echo "<pre>";
    //         print_r($_FILES);
    //    echo "</pre>";
    
    // $check = getimagesize($_FILES['up_image']['tmp_name']);
    // if($check){
    //     $t_name = $_POST['t_name'];
    //     $remark = $_POST['remark'];
    //     $target = "../upload/";
    //     // $file_img = $target . basename($_FILES['up_image']['name']); upload image in PHP
    //     $array = pathinfo($file_img,PATHINFO_EXTENSION);
    //     $select_room = mysqli_query($conn,"SELECT * FROM room_type WHERE room_name = '$t_name'");
    //     $check_room = mysqli_num_rows($select_room);
    //     if($check_room <> 0){
    //         echo "<script>
    //             alert('ຊື່ນີ້ມີແລ້ວ');location='form_room.php';
    //         </script>";
    //     }else{
    //         if(!file_exists($file_img)){
    //             if(move_uploaded_file($_FILES['up_image']['tmp_name'],$file_img)){
    //                 $insert_room = mysqli_query($conn,"INSERT INTO room_type(room_name,img,room_remark)VALUE('$t_name','$file_img','$remark')");
    //                 if($insert_room){
    //                     echo "<script>
    //                     alert('ບັນທືກສຳເລັດ');location='form_room.php';
    //                 </script>";
    //                 }
    //             }
    //         }else{
    //             $new_name = $file_img.time().".".$array;
    //             if(move_uploaded_file($_FILES['up_image']['tmp_name'],$new_name)){
    //                 $insert_room = mysqli_query($conn,"INSERT INTO room_type(room_name,img,room_remark)VALUE('$t_name','$file_img','$remark')");
    //                 if($insert_room){
    //                     echo "<script>
    //                     alert('ບັນທືກສຳເລັດ');location='form_room.php';
    //                 </script>";
    //                 }
    //             }
    //         }
    //     }
        
    // }else{
    //     echo "<script>
    //             alert('ນີ້ບໍ່ແມ່ນຮູບພາບ');location='form_room.php';
    //         </script>";
    // }
    
    
    // }
?>