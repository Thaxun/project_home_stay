<?php 
    include('../con_db.php');
    $id = $_GET['id'];
    $select = mysqli_query($conn,"SELECT * FROM room_for_rent WHERE ren_id = $id");
    $row = mysqli_fetch_array($select);
    $select_ren = mysqli_query($conn,"SELECT * FROM room_for_rent");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form_infor</title>
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
            var i_numuser = $("#i_numuser").val();
            var fname = $("#fname").val();
            var lname = $("#lname").val();
            var status_price = $("#status_price").val();
            var tel = $("#tel").val();
            var remark = $("#remark").val();
            if(ren_number == ""){
                Swal.fire({
                    icon: 'warning',
                    title: 'ກະລຸນາເລືອກຫ້ອງ',
                })
            }else if(i_numuser == ""){
                Swal.fire({
                    icon: 'warning',
                    title: 'ກະລຸນາປ້ອນບັດປະຊາຊົນ',
                })
            }else if(fname == ""){
                Swal.fire({
                    icon: 'warning',
                    title: 'ກະລຸນາປ້ອນຊື່',
                })
            }else if(lname == ""){
                Swal.fire({
                    icon: 'warning',
                    title: 'ກະລຸນາປ້ອນນາມສະກຸນ',
                })
            }else if(tel == ""){
                Swal.fire({
                    icon: 'warning',
                    title: 'ກະລຸນາປ້ອນເບີໂທ',
                })
            }else{
                $.post("insert_infor.php",{
                    ren_number:ren_number,
                    i_numuser:i_numuser,
                    fname:fname,
                    lname:lname,
                    status_price:status_price,
                    tel: tel,
                    remark:remark
                },function(data){
                    $(".show").html(data);
                })
            }
        })
    })
</script>
<style>
    *{
        font-family:phetsarath ot;
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
                    <div class="card-header bg-primary text-center">
                        <h4><i class="fa fa-id-card"></i> ຟອມບັນທືກຂໍ້ມູນຜູ້ເຊົ່າຫ້ອງ</h4>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">ເລືອກຫ້ອງ:</label>
                                    </div>
                                    <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-house"></i></span>
                                            <select id="ren_number"  disabled class="form-select">
                                                <option  value="<?php echo $row['ren_id'] ?>" ><?php echo $row['ren_number'] ?></option>
                                                <?php while($show = mysqli_fetch_array($select_ren)){ ?>
                                                    <option value="<?php echo $show['ren_id'] ?>"><?php echo $show['ren_number']; ?></option>
                                                <?php }?>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">ເລືອກພັກ/ຄືນ ຫຼື ຊົ່ວໂມງ:</label>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-credit-card"></i></span>
                                        <select class="form-select" id="status_price">
                                            <option value="">ເລືອກ</option>
                                            <option value="11">ພັກ/ຄືນ <?= number_format($row['ren_price']) ?> ກີບ</option>
                                            <option value="22">ພັກ/3ຊົ່ວໂມງ <?= number_format($row['time_price']) ?> ກີບ</option>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">ເລກບັດປະຊາຊົນ:</label>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-address-card"></i></span>
                                        <input type="number" id="i_numuser" class="form-control" placeholder="ກະລຸນາປ້ອນເລກບັດປະຊາຊົນ....">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">ຊື່:</label>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-id-card"></i></span>
                                        <input type="text" id="fname" class="form-control" placeholder="ກະລຸນາປ້ອນຊື່....">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">ນາມສະກຸນ:</label>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-id-card"></i></span>
                                       <input type="text" id="lname" class="form-control" placeholder="ກະລຸນາປ້ອນນາມສະກຸນ...">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">ເບີໂທ:</label>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i></span>
                                        <input type="number" class="form-control" id="tel" placeholder="ກະລຸນາປ້ອນເບີໂທ....">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">ໝາຍເຫດ:</label>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-exclamation"></i></span>
                                        <input type="text" class="form-control" id="remark" >
                                    </div>
                                </div>
                            </div>
                           <div class="form-group text-center mt-3">
                                <button type="button" id="click" class="btn btn-success "><i class="fa fa-plus-circle"></i> ບັນທືກ</button>
                                <button type="reset"  class="btn btn-danger "><i class="fa fa-refresh fa-spin"></i> ລ້າງຂໍ້ມູນ</button>
                           </div>
                        </form>
                    </div>
                </div>
                <input type="hidden" id="status">
                <div class="show"></div>
            </div>
        </div>
    </div>
</body>
</html>