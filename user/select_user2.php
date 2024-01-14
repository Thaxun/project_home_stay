<?php 
    session_start();
    include("../con_db.php");
    $select_user = mysqli_query($conn,"SELECT * FROM user");
    $order = 1;
    if(@$_SESSION['checks']<>1){
        echo "<script>location = '../index.php';
        </script>";
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>select_user</title>
    <link rel="stylesheet" href="../bootstrap-5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../icon/css/all.min.css">
    <script src="../jquery.js"></script>
    <link rel="icon" href="../logo/home_stay.jpeg">
    <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
</head>
<script>
    $(document).ready(function(){
        $(".delete").click(function(e){
            e.preventDefault();
            var href = $(this).attr("href");
            Swal.fire({
            title: 'ທ່ານຕ້ອງການລົບ ແທ້ ບໍ່?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ຕົກລົງ',
            cancelButtonText: 'ຍົກເລີກ'
            }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
            })
        })
    })
</script>
<style>
    *{
        font-family:phetsarath ot;
    }
</style>
<body>
    <div class="container-fluid">
        <div class="card-header bg-white text-center">
            <h4><i class="fa fa-users"></i> ລາຍງານຂໍ້ມູນຜູ້ໃຊ້</h4>
        </div>
        <table class="table table-bordered  border-primary">
                <tr>
                    <th>#</th>
                    <th>ຮູບຜູ້ໃຊ້ງານ</th>
                    <th>ຊື່ ແລະ ນາມສະກຸນ</th>
                    <th>ເພດ</th>
                    <th>ເບີໂທ</th>
                    <th>ຊື່ຜູ້ໃຊ້ງານ</th>
                    <th>ບ້ານຢູ່ປັດຈຸບັນ</th>
                    <th>ເບີໂທ</th>
                    <th>ສະຖານະ</th>
                </tr>
                <?php while($row = mysqli_fetch_array($select_user)){ ?>
                <tr>
                    <td width="60px"><?php echo $order++;?></td>
                    <td width="150px" class="text-center"><img src="../upload/<?php echo $row['image']; ?>"  class="rounded-circle" width="50%" alt=""></td>
                    <td width="15%"><?php echo $row['fname']." ".$row['lname']; ?></td>
                    <td width="60px">
                        <?php if($row['gender'] == "F"){ ?>
                            ຍິງ
                        <?php }elseif($row['gender'] == "M"){?>
                            ຊາຍ
                        <?php }?>
                    </td>
                    <td><?php echo $row['tel']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td> <?php echo $row['vill_now']; ?></td>
                    <td> <?php echo $row['tel']; ?></td>
                    <td> <?php echo $row['status']; ?></td>
                </tr>
                <?php }?>
        </table>
    </div>
</body>
</html>