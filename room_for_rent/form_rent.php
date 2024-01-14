<?php 
    include('../con_db.php');
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
    <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>
    <link rel="icon" href="../logo/home_stay.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<script>
    $(document).ready(function(){
        $("#click").click(function(){
            var ren_number = $("#ren_number").val();
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
                $.post("insert_rent.php",{
                    ren_number:ren_number,
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
                        <h4><i class="fa fa-bed"></i> ຟອມບັນທືກຂໍ້ມູນຫ້ອງ</h4>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="form-group">
                                <label for="">ເລກຫ້ອງ:</label>
                            </div>
                           <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-house"></i></span>
                                <input type="text" class="form-control" id="ren_number" placeholder='ກະລຸນາປ້ອນເລກຫ້ອງ......'>
                           </div>
                            <div class="form-group">
                                <label for="">ປະເພດຫ້ອງ:</label>
                            </div>
                           <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-bed"></i></span>
                                <select name="" id="t_name" class="form-select">
                                    <option value="">ເລືອກປະເພດຫ້ອງ</option>
                                    <?php while($room_name = mysqli_fetch_array($select_room)){ ?>
                                        <option value="<?php echo $room_name['room_id']; ?>"><?php echo $room_name['room_name']; ?></option>
                                    <?php }?>
                                </select>
                           </div>
                            <div class="form-group mt-3">
                                <label for="">ລາຄາ/ຄືນ:</label>
                            </div>
                           <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-credit-card"></i></span>
                                <input type="text" class="form-control" id="rprice" placeholder="ກະລຸນາປ້ອນຄ່າພັກ/ຄືນ....">
                           </div>
                            <div class="form-group mt-3">
                                <label for="">ລາຄາຊົ່ວໂມງ/3ຊົ່ວໂມງ:</label>
                            </div>
                           <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-credit-card"></i></span>
                                <input type="text" class="form-control" id="tprice" placeholder="ລາຄາພັກ/ຊົ່ວໂມງ...." readonly>
                           </div>
                            <div class="form-group mt-3">
                                <label for="">ໝາຍເຫດ:</label>
                            </div>
                           <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-exclamation"></i></span>
                                <input type="text" class="form-control" id="remark" >
                           </div>
                           
                           <div class="form-group text-center mt-2">
                                <button type="button" id="click" class="btn btn-success "><i class="fa fa-upload"></i> ບັນທືກ</button>
                                <button type="reset"  class="btn btn-danger "><i class="fa fa-refresh fa-spin"></i> ລ້າງຂໍ້ມູນ</button>
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