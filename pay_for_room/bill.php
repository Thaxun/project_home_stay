<?php
    session_start();
    include('../con_db.php');
    include('../link.php');
    // $id = $_GET['pay_id'];
    $id =  $_SESSION['pay_id'];
    $select_show = mysqli_query($conn,"SELECT * FROM room_for_rent as a,information as b,pay_for_room as c WHERE a.ren_id=c.ren_id AND b.i_id=c.i_id AND c.pay_id = $id");
    $a = 1;
    $select_date = mysqli_query($conn,"SELECT NOW()");
    $show_date = mysqli_fetch_array($select_date);
    $select_max = mysqli_query($conn,"SELECT max(bill_no) FROM pay_for_room");
    $show_max = mysqli_fetch_array($select_max);
    if($show_max[0] == 0){
        $add = $show_max[0]+1000;
        mysqli_query($conn,"UPDATE pay_for_room SET bill_no = '$add' WHERE pay_id = $id");
    }else{
        $add2 = $show_max[0]+1;
        mysqli_query($conn,"UPDATE pay_for_room SET bill_no = '$add2' WHERE pay_id = $id");
    }
    $select_bill = mysqli_query($conn,"SELECT bill_no FROM pay_for_room WHERE pay_id = $id");
    $show_bill = mysqli_fetch_array($select_bill);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>print</title>
    <link rel="icon" href="../logo/home_stay.jpeg">
    <link rel="stylesheet" href="../css/print.css" media="print">
    <style>
        .card{
            padding:20px;
        }
    </style>
</head>
<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h4 class="text-center mt-2">ອອກໃບບິນ</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <h6>ບ້ານ ໂນນສະຫວ່າງ ເມືອງ ວຽງຄຳ ແຂວງ ວຽງຈັນ</h6><br>
                            <h6>ເບີໂທ: <?php echo $_SESSION['tel']; ?></h6>
                        </div>
                        <div class="col-md-6 text-end">
                            <h6>ເລກບິນ: <?php echo $show_bill[0]; ?></h6><br>
                            <h6>ວັນທີເດືອນປີ ແລະ ເວລາ: <?php echo $show_date[0]; ?></h6>
                        </div>
                        <table class="table table-bordered mt-5">
                            <tr>
                                <th>ລຳດັບ</th>
                                <th>ເລກຫ້ອງ</th>
                                <th>ຊື່ ແລະ ນາມສະກຸນ</th>
                                <th>ຄ່າຫ້ອງ</th>
                            </tr>
                            <?php while($row = mysqli_fetch_array($select_show)){?>
                            <tr>
                                <td height="80px"><?php echo $a++; ?></td>
                                <td height="80px"><?php echo $row['ren_number']; ?></td>
                                <td height="80px"><?php echo $row['name']; ?></td>
                                <td height="80px">
                                <?php if($row['status_price'] == 11){?>
                                    ພັກ/ຄືນ <?php echo number_format($row['ren_price']); ?>
                                    <?php }elseif($row['status_price'] == 22){?>
                                        ພັກ/3ຊົ່ວໂມງ <?php echo number_format($row['time_price']); ?>
                                    <?php }?>
                                    ກີບ
                                </td>
                            </tr>
                            <?php }?>
                            <tr>
                                <td colspan="5">
                                    <div class="row mt-5">
                                        <div class="col-md-6">
                                            <div class="text-center">
                                                <p>ຜູ້ຮັບ:</p><br>
                                                <p>..........................................</p><br>
                                                <p>(<?php echo $_SESSION['f_name']." ".$_SESSION['l_name']; ?>)</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                        <div class="text-center">
                                                <p>ຜູ້ຈ່າຍ:</p><br>
                                                <p>..........................................</p><br>
                                                <p>(...........................................)</p>
                                            </div>
                                        </div>
                                        <div class="text-end mt-5">
                                            <button class="btn btn-primary" id="print" onclick="window.print();"><i class="fa fa-print"></i> ອອກໃບບິນ</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>