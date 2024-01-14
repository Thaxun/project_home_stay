<?php 
    include('../con_db.php');
    $id = $_GET['ren_id'];
    $select_edit = mysqli_query($conn,"SELECT * FROM room_for_rent as a,room_type as b WHERE a.room_id=b.room_id AND  ren_id = $id");
    $show_row = mysqli_fetch_array($select_edit);
    $select_room = mysqli_query($conn,"SELECT * FROM room_type");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form_rent</title>
    <link rel="stylesheet" href="../bootstrap-5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../icon/css/all.min.css">
    <script src="../jquery.js"></script>
    <link rel="icon" href="../logo/home_stay.jpeg">
    <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<script>
    $(document).ready(function(){
        $("#click").click(function(){
            var ren_id = $("#ren_id").val();
            var ren_number = $("#ren_number").val();
            var ren_number2 = $("#ren_number2").val();
            var t_name = $("#t_name").val();
            var tprice = $("#tprice").val();
            var rprice = $("#rprice").val();
            var remark = $("#remark").val();
            if(ren_number == ""){
                Swal.fire({
                    icon: 'warning',
                    title: 'ກະລຸນາປ້ອນເລກຫ້ອງ',
                })
            }else if(t_name == ""){
                Swal.fire({
                    icon: 'warning',
                    title: 'ກະລຸນາເລືອກປະເພດຫ້ອງ',
                })
            }else if(rprice == ""){
                Swal.fire({
                    icon: 'warning',
                    title: 'ກະລຸນາປ້ອນຄ່າເຊົ່າ',
                })
            }else{
                $.post("update_rent.php",{
                    ren_id:ren_id,
                    ren_number:ren_number,
                    ren_number2:ren_number2,
                    t_name:t_name,
                    tprice:tprice,
                    rprice: rprice,
                    remark:remark
                },function(data){
                    $(".show").html(data);
                })
            }
        })
         // ການໄລ່ເງິນເປັນຊົ່ວໂມງ
         $("#rprice").keyup(function(){
            let price = parseInt($("#rprice").val());
            let r = 0.60;
            let sum = parseFloat(price * r) || 0
            $("#tprice").val(sum)
            console.log(sum)
        })
    })
</script>
<style>
    *{
        font-family:phetsarath ot;
    }
    .card-header{
        padding: 25px 0;
    }
    .card-body{
        background-color:#d9d9d9;
        font-size:1.2rem;
    }
    .input-group h4{
        margin-top:100px;
    }
    
</style>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-success text-center">
                        <h4><i class="fa fa-bed"></i> ຟອມແກ້ໄຂຂໍ້ມູນຫ້ອງ</h4>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="form-group">
                                <label for="">ເລກຫ້ອງ:</label>
                                <input type="hidden" name="" id="ren_id" value="<?php echo $show_row['ren_id']; ?>">
                            </div>
                           <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-house"></i></span>
                                <input type="text" class="form-control" id="ren_number" value="<?php echo $show_row['ren_number'] ?>" placeholder='ກະລຸນາປ້ອນເລກຫ້ອງ......'>
                                <input type="hidden" class="form-control" id="ren_number2" value="<?php echo $show_row['ren_number'] ?>" placeholder='ກະລຸນາປ້ອນເລກຫ້ອງ......'>
                           </div>
                            <div class="form-group">
                                <label for="">ປະເພດຫ້ອງ:</label>
                            </div>
                           <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-bed"></i></span>
                                <select name="" id="t_name" class="form-select">
                                    <option value="<?php echo $show_row['room_id'] ?>"><?php echo $show_row['room_name'] ?></option>
                                    <?php while($room_name = mysqli_fetch_array($select_room)){ ?>
                                        <option value="<?php echo $room_name['room_id']; ?>"><?php echo $room_name['room_name']; ?></option>
                                    <?php }?>
                                </select>
                           </div>
                            
                            <div class="form-group mt-3">
                                <label for="">ຄ່າເຊົ່າ/ຄືນ:</label>
                            </div>
                           <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-credit-card"></i></span>
                                <input type="text" class="form-control" id="rprice" value="<?php echo $show_row['ren_price']; ?>" placeholder="ກະລຸນາປ້ອນຄ່າເຊົ່າ/ຄືນ....">
                           </div>
                           <div class="form-group mt-3">
                                <label for="">ລາຄາຊົ່ວໂມງ/3ຊົ່ວໂມງ:</label>
                            </div>
                           <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-credit-card"></i></span>
                                <input type="text" class="form-control" id="tprice" value="<?php echo $show_row['time_price']; ?>" readonly>
                           </div>
                            <div class="form-group mt-3">
                                <label for="">ໝາຍເຫດ:</label>
                            </div>
                           <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-exclamation"></i></span>
                                <input type="text" class="form-control" id="remark" value="<?php echo $show_row['ren_remark']; ?>">
                           </div>
                           
                           <div class="form-group text-center mt-2">
                                <button type="button" id="click" class="btn btn-success "><i class="fa fa-edit"></i> ແກ້ໄຂຂໍ້ມູນ</button>
                                <a href="select_rent.php"  class="btn btn-secondary "><i class="fa fa-arrow-left"></i> ຍ້ອນກັບ</a>
                           </div>

                        </form>
                    </div>
                </div>
                <div class="show"></div>
            </div>
        </div>
    </div>
</body>
</html>