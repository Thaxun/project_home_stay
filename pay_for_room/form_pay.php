<?php 
    session_start();
    include('../con_db.php');
    $id = $_GET['i_id'];
    $select_checkout = mysqli_query($conn,"SELECT * FROM information as a,room_for_rent as b,room_type as c WHERE a.ren_id=b.ren_id AND b.room_id=c.room_id AND i_id = $id");
    $show_check = mysqli_fetch_array($select_checkout);
    $select_date = mysqli_query($conn,"SELECT NOW()");
    $show_date = mysqli_fetch_array($select_date);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pay</title>
    <link rel="stylesheet" href="../bootstrap-5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../icon/css/all.min.css">
    <script src="../jquery.js"></script>
    <link rel="icon" href="../logo/home_stay.jpeg">
    <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<script>
    $(document).ready(function(){
        $("#save").click(function(){
            var i_id = $("#i_id").val();
            var ren_id = $("#ren_id").val();
            var i_numuser = $("#i_numuser").val();
            var datetime = $("#datetime").text();
            var name = $("#name").text();
            var price = $("#price").val();
            $.post("insert_pay.php",{
                i_id : i_id,
                ren_id : ren_id,
                i_numuser:i_numuser,
                datetime : datetime,
                name : name,
                price:price
            },function(data){
                Swal.fire({
                icon : 'success',
                title: 'ຊຳລະສຳເລັດ',
                showConfirmButton:false
                })
                setTimeout(() =>{
                    window.location = 'bill.php';
                },1500)
            })
        })
    })
</script>
<style>
    *{
        font-family:phetsarath ot;
    }
    .mar{
        margin:20px;
    }
</style>
<body>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-boder">
                    <div class="mar">
                        <h2 class="text-center mt-3"><i class="fa-solid fa-money-bill"></i> ຈ່າຍຄ່າຫ້ອງ</h2>
                        <p class="text-center mt-2">ຜູ້ບັນທືກການຈ່າຍ: <?php  echo $_SESSION['f_name'].$_SESSION['l_name']." ເບີໂທ:".$_SESSION['tel']  ?> </p>
                        <table class="table table-bordered mt-5">
                            <thead>
                                <tr>
                                    <th>ຮູບຫ້ອງ</th>
                                    <th>ເລກຫ້ອງ</th>
                                    <th>ວັນທີ່ເດືອນປີ ແລະ ເວລາ</th>
                                    <th>ຜູ້ພັກ</th>
                                    <th>ເບີໂທ</th>
                                    <th>ເງິນທີ່ຕ້ອງຈ່າຍ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <input type="hidden" id="price" value="<?php echo $show_check['ren_price'] ?>">
                                    <input type="hidden" id="ren_id" value="<?php echo $show_check['ren_id']; ?>">
                                    <input type="hidden" id="i_id" value="<?php echo $show_check['i_id']; ?>">
                                    <input type="hidden" id="i_numuser" value="<?php echo $show_check['i_numuser'] ?>">
                                    <td width="200px"><img src="../upload/<?php echo $show_check['img']; ?>" width="200px" alt=""></td>
                                    <td ><?php echo $show_check['ren_number']; ?></td>
                                    <td id="datetime"><?php echo $show_date[0]; ?></td>
                                    <td id="name"><?php echo $show_check['fname']." ".$show_check['lname']; ?></td>
                                    <td><?php echo $show_check['tel'] ?></td>
                                    <td id="">
                                    <?php if($show_check['status_price'] == 11){?>
                                        ພັກ/ຄືນ <?php echo number_format($show_check['ren_price']); ?>
                                        <?php }elseif($show_check['status_price'] == 22){?>
                                            ພັກ/3ຊົ່ວໂມງ <?php echo number_format($show_check['time_price']); ?>
                                        <?php }?>
                                        ກີບ
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group text-end mt-5">
                            <button type="button" class="btn btn-success" id="save"><i class="fa fa-edit"></i> ຊຳລະເງິນ</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="show"></div>
        </div>
    </div>
</body>
</html>