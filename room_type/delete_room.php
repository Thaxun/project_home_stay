<?php 
    include("../con_db.php");
    $de_id = $_GET['room_id'];
    $delete_room = mysqli_query($conn,"DELETE FROM  room_type WHERE room_id = $de_id");
    if($delete_room){
        echo "<script>location='select_room.php'</script>";
    }else{
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'ບໍ່ສາມາດລົບໄດ້',
                text: 'ເນື່ອງຈາກວ່າມີການເຊື່ອມປະເພດຫ້ອງໃສ່ກັບເບີຫ້ອງແລ້ວ',
                showConfirmButton:false
            })
            setTimeout(() =>{
                location = 'select_room.php';
            },1500)
        </script>";
    }
?>