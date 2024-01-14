<?php 
    session_start();
    include('../con_db.php');
    $select_rent = mysqli_query($conn,"SELECT * FROM room_for_rent as a,room_type as b WHERE a.room_id=b.room_id ORDER BY ren_number");
    // ນັກຈຳນວນຫ້ອງທັງໝົດ
    $select_all_room = mysqli_query($conn,"SELECT count(ren_id) FROM room_for_rent");
    $show_all_room = mysqli_fetch_array($select_all_room);
    // ນັບຈຳນວນຫ້ອງທີ່ຍັງຫວ່າງ
    $count = mysqli_query($conn,"SELECT count(ren_id) FROM room_for_rent WHERE status_room = 1");
    $row_count = mysqli_fetch_array($count);
    // ນັບຈຳນວນຫ້ອງທີ່ບໍ່ຫວ່າງ
    $count_no = mysqli_query($conn,"SELECT count(ren_id) FROM room_for_rent WHERE status_room = 0");
    $row_no = mysqli_fetch_array($count_no);
    // ນັບຈຳນວນຫ້ອງທີ່ບໍ່ໄດ້ອະນາໄມເທື່ອ
    $count_c = mysqli_query($conn,"SELECT count(ren_id) FROM room_for_rent WHERE status_room = 2");
    $row_c = mysqli_fetch_array($count_c);
    //ກວດສອບວ່າຖ້າຫາກບໍ່ມີການເຂົ້າສູ່ລະບົບຈະໃຫ້ມັນກັບໄປໜ້າຫຼັກ
    if(@$_SESSION['checks'] <> 1){
        header('location:../index.php');
    }elseif($_SESSION['sts'] != 'admin'){
        header('location:../emp/all_rent.php');
    }
    // elseif(@$_SESSION['admin']){

    // }elseif(@$_SESSION['']){

    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>all_room</title>
    <link rel="stylesheet" href="../bootstrap-5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../icon/css/all.min.css">
    <script src="../jquery.js"></script>
    <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>
    <link rel="icon" href="../logo/home_stay.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<style>
    *{
        font-family:phetsarath ot;
    }
    a{
        text-decoration:none;
        color: black;
    }
    a:hover{
        text-decoration:none;
        color: black;
    }
    p{
        font-size:13px;
    }
</style>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card-header text-center bg-primary">
                    <h4><i class="fa fa-table"></i> ຫ້ອງທັງໝົດ</h4>
                </div>
                <hr>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <p>ລວມຫ້ອງທັງໝົດມີ: <?php echo $show_all_room[0]; ?> </p>
                        </div>
                        <div class="col-md-3">
                            <p>ຫ້ອງທີ່ຫວ່າງມີ: <?php echo $row_count[0]; ?></p>
                        </div>
                        <div class="col-md-3">
                            <p>ຫ້ອງທີ່ບໍ່ຫວ່າງມີ: <?php echo $row_no[0]; ?></p>
                        </div>
                        <div class="col-md-3">
                            <p>ຫ້ອງທີ່ຍັງບໍ່ໄດ້ອະນາໄມ: <?php echo $row_c[0]; ?></p>
                        </div>
                    </div>
                    <p class="text-danger">ສີແດງແມ່ນຫ້ອງ = ບໍ່ຫວ່າງ</p>
                    <p class="text-success">ສີຂຽວແມ່ນຫ້ອງ = ຫວ່າງ</p>
                    <p class="text-warning">ສີເຫຼືອງແມ່ນຫ້ອງ = ຫ້ອງຍັງບໍ່ໄດ້ອະນາໄມເທື່ອ</p>
                    <div class="row text-center">
                        <?php while($row = mysqli_fetch_array($select_rent)){ ?>
                            <div class="col-md-2 mt-2">
                                <?php if($row['status_room'] == 0){ ?>
                                    <a href="#">
                                        <p>ປະເພດຫ້ອງ: <?php echo $row['room_name']; ?></p>
                                        <div class="card-body bg-danger">
                                            <h3><?php echo $row['ren_number']; ?></h3>
                                        </div>
                                    </a>
                                <?php }elseif($row['status_room'] == 1){?>
                                    <a href="form_infor.php?id=<?php echo $row['ren_id'] ?>">
                                        <p>ປະເພດຫ້ອງ: <?php echo $row['room_name']; ?></p>
                                        <div class="card-body bg-success">
                                            <h3><?php echo $row['ren_number']; ?></h3>
                                        </div>
                                    </a>
                                <?php }elseif($row['status_room'] == 2){?>
                                    <a href="#">
                                        <p>ປະເພດຫ້ອງ: <?php echo $row['room_name']; ?></p>
                                        <div class="card-body bg-warning">
                                            <h3><?php echo $row['ren_number']; ?></h3>
                                        </div>
                                    </a>
                                <?php }?>
                            </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>