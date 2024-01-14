<?php 
    include("../con_db.php");
    $room_id = $_POST['room_id'];
    $t_name = $_POST['t_name'];
    $t_name2 = $_POST['t_name2'];
    $remark = $_POST['remark'];
    if(is_array($_FILES)){
        if(is_uploaded_file($_FILES['up_image']['tmp_name']) == ""){
            $select_room = mysqli_query($conn,"SELECT * FROM room_type WHERE room_name = '$t_name'");
            $check_room = mysqli_num_rows($select_room);
            if($t_name == $t_name2){
                $update = mysqli_query($conn,"UPDATE room_type SET room_name = '$t_name', room_remark = '$remark' WHERE room_id = $room_id");
                if($update){
                    echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'ບັນທືກສຳເລັດ',
                        showConfirmButton:false,
                        timer:1500
                    })
                    setTimeout(() =>{
                        window.location = 'select_room.php';
                    },1500)
                </script>";
                }
            }elseif($check_room <> 0){
                echo "<script>
                    Swal.fire({
                        icon: 'warning',
                        title: 'ຊື່ຫ້ອງນີ້ມີແລ້ວ',
                        showConfirmButton:false,
                        timer:1500
                    })
                </script>";
            }else{
                $update = mysqli_query($conn,"UPDATE room_type SET room_name = '$t_name', room_remark = '$remark' WHERE room_id = $room_id");
                if($update){
                    echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'ບັນທືກສຳເລັດ',
                        showConfirmButton:false,
                        timer:1500
                    })
                    setTimeout(() =>{
                        window.location = 'select_room.php';
                    },1500)
                </script>";
                }
            }
        }else{
            $check = getimagesize($_FILES['up_image']['tmp_name']);
            if($check){
                $file_name = $_FILES['up_image']['name'];
                $file_image = '../upload/'.$file_name;
                $array = pathinfo($file_image,PATHINFO_EXTENSION);
                $select_room = mysqli_query($conn,"SELECT * FROM room_type WHERE room_name = '$t_name'");
                $check_room = mysqli_num_rows($select_room);
                if($t_name == $t_name2){
                    if(!file_exists($file_image)){
                        if(move_uploaded_file($_FILES['up_image']['tmp_name'],$file_image)){
                            $update = mysqli_query($conn,"UPDATE room_type SET room_name = '$t_name', img = '$file_name', room_remark = '$remark' WHERE room_id = $room_id");
                            if($update){
                                echo "<script>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'ບັນທືກສຳເລັດ',
                                    showConfirmButton:false,
                                    timer:1500
                                })
                                setTimeout(() =>{
                                    window.location = 'select_room.php';
                                },1500)
                            </script>";
                            }
                        }
                    }else{
                        $new_name = $file_image.time().".".$array;
                        if(move_uploaded_file($_FILES['up_image']['tmp_name'],$new_name)){
                            $update = mysqli_query($conn,"UPDATE room_type SET room_name = '$t_name', img = '$file_name', room_remark = '$remark' WHERE room_id = $room_id");
                            if($update){
                                echo "<script>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'ບັນທືກສຳເລັດ',
                                    showConfirmButton:false,
                                    timer:1500
                                })
                                setTimeout(() =>{
                                    window.location = 'select_room.php';
                                },1500)
                            </script>";
                            }
                        }
                    }
                }elseif($check_room <> 0){
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
                            $update = mysqli_query($conn,"UPDATE room_type SET room_name = '$t_name', img = '$file_name', room_remark = '$remark' WHERE room_id = $room_id");
                            if($update){
                                echo "<script>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'ບັນທືກສຳເລັດ',
                                    showConfirmButton:false,
                                    timer:1500
                                })
                                setTimeout(() =>{
                                    window.location = 'select_room.php';
                                },1500)
                            </script>";
                            }
                        }
                    }else{
                        $new_name = $file_image.time().".".$array;
                        if(move_uploaded_file($_FILES['up_image']['tmp_name'],$new_name)){
                            $update = mysqli_query($conn,"UPDATE room_type SET room_name = '$t_name', img = '$file_name', room_remark = '$remark' WHERE room_id = $room_id");
                            if($update){
                                echo "<script>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'ບັນທືກສຳເລັດ',
                                    showConfirmButton:false,
                                    timer:1500
                                })
                                setTimeout(() =>{
                                    window.location = 'select_room.php';
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


    // if(isset($_POST['submit'])){
    // //     echo "<pre>";
    // //         print_r($_FILES);
    // //    echo "</pre>";
    
        
    //     $room_id = $_POST['room_id'];
    //     $t_name = $_POST['t_name'];
    //     $t_name2 = $_POST['t_name2'];
    //     $remark = $_POST['remark'];
    //     $target = "../upload/";
    //     $room_img = $_POST['up_image2'];
    //     $upload = $_FILES['up_image']['name'];
    //     if($upload != ""){
    //         $file_img = $target . basename($_FILES['up_image']['name']);
    //         $array = pathinfo($file_img,PATHINFO_EXTENSION);
    //         if(!file_exists($file_img)){
    //             if(move_uploaded_file($_FILES['up_image']['tmp_name'],$file_img)){
    //             }
    //         }else{
    //             $new_name = $file_img.time().".".$array;
    //             if(move_uploaded_file($_FILES['up_image']['tmp_name'],$new_name)){
    //             }
    //         }
    //     }else{
    //         $file_img = $room_img;
    //     }
    //     $select_room = mysqli_query($conn,"SELECT * FROM room_type WHERE room_name = '$t_name'");
    //     $check_room = mysqli_num_rows($select_room);
    //     if($t_name == $t_name2){
    //         $update = mysqli_query($conn,"UPDATE room_type SET room_name = '$t_name', img = '$file_img', room_remark = '$remark' WHERE room_id = $room_id");
    //         if($update){
    //            header("location:select_room.php");
    //         }
    //     }else if($check_room <> 0){
    //         echo "<script>alert('ຊື່ປະເພດຫ້ອງມີແລ້ວ');window.history.back();</script>";
    //     }else{
    //         $update = mysqli_query($conn,"UPDATE room_type SET room_name = '$t_name', img = '$file_img', room_remark = '$remark' WHERE room_id = $room_id");
    //         if($update){
    //            header("location:select_room.php");
    //         }
    //     }
       
    
    // }
?>