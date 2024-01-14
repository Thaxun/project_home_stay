<?php 
    require('../link.php');
    include('../con_db.php');
    $id = $_GET['pay_id'];
    $select = mysqli_query($conn,"SELECT * FROM pay_for_room as a,room_for_rent as b,information as c,user as d WHERE a.ren_id=b.ren_id AND a.i_id=c.i_id AND a.u_id=d.u_id AND  pay_id = $id");
    $show = mysqli_fetch_array($select);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show_pay</title>
    <link rel="icon" href="../logo/home_stay.jpeg">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>ຂໍ້ມູນຜູ້ທີ່ຈ່າຍແລ້ວ</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="text text-center mt-5">
                                    <h5>ເລກບັດປະຊາຊົນ:</h5>
                                    <h5><?php echo $show['numuser']; ?></h5>
                                </div>
                                <div class="text text-center mt-5">
                                    <h5>ອອກໃນວັນທີ່ເດືອນປີ ແລະ ເລວາ:</h5>
                                    <h5><?php echo $show['check_out']; ?></h5>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text text-center mt-5">
                                    <h5>ຊື່ ແລະ ນາມສະກຸນ:</h5>
                                    <h5><?php echo $show['name']; ?></h5>
                                </div>
                                <div class="text text-center mt-5">
                                    <h5>ເບີໂທ:</h5>
                                    <h5><?php echo $show['tel']; ?></h5>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text text-center mt-5">
                                    <h5>ພັກຢູ່ຫ້ອງ:</h5>
                                    <h5><?php echo $show['ren_number']; ?></h5>
                                </div>
                                <div class="text text-center mt-5">
                                    <h5>ຜູ້ບັນທືກຂໍ້ມູນ</h5>
                                    <h5><?php echo $show['fname']." ".$show['lname'] ?></h5>
                                </div>
                            </div>
                            <div class="text-ended">
                                <a href="out_pay.php" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> ຍ້ອນກັບ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>