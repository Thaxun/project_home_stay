<?php 
    session_start();
    include("../con_db.php");
    $select_province = mysqli_query($conn,"SELECT * FROM province");
    $select_district = mysqli_query($conn,"SELECT * FROM district");
    $select_village = mysqli_query($conn,"SELECT * FROM village");
    if(@$_SESSION['checks']<>1){
        echo "<script>location = '../index.php';
        </script>";
    }elseif($_SESSION['sts'] != 'admin'){
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
    <title>form_user</title>
    <link rel="stylesheet" href="../bootstrap-5/css/bootstrap.min.css">
    <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>
    <script src="../jquery.js"></script>
    <link rel="icon" href="../logo/home_stay.jpeg">
    <link rel="stylesheet" href="../icon/css/all.min.css">
</head>
<script>
    $(document).ready(function(){
        $("#pro").change(function(){
            var pro_id = $("#pro").val();
            $.post("get_dis.php",{
                pro_id:pro_id
            },function(data){
                $("#dis").html(data);
            })
        })
        $("#dis").change(function(){
            var dis_id = $("#dis").val();
            $.post("get_vill.php",{
                dis_id:dis_id
            },function(data){
                $("#vill").html(data);
            })
        })
        $("#go").on('submit',function(e){
        e.preventDefault();
        $.ajax({
            url:'insert_user.php',
            type: 'post',
            data: new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            success:function(data){
                $(".show").html(data);
            }
        })
       })
       $("#username").bind('keyup blur',function(){
            var node = $(this);
            node.val(node.val().replace(/[^a-z A-Z 0-9]/,''));
        })
    })
</script>
<style>
    *{
        font-family:Phetsarath ot;
    }
    .file-btn{
        color:transparent;
    }
    .file-btn::-webkit-file-upload-button {
        visibility: hidden;
    }
    .file-btn::before{
        content: 'ເລືອກຮູບ';
        color: white;
        display: inline-block;
        background: #157347;
        padding: 10px;
        border-radius:5px;
    }
</style>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center bg-white">
                        <h5><i class="fa fa-user-plus"></i> ຟອມບັນທືກຜູ້ໃຊ້ງານ</h5>
                    </div>
                    <form action="insert_user.php" id="go" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mt-3">
                                        <label for="">ຊື່:</label>
                                        <input type="text" name="fname" class='form-control' id="fname" placeholder="ກະລຸນາປ້ອນຊື່...." required>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">ນາມສະກຸນ:</label>
                                        <input type="text" name="lname" class='form-control' id="fname" placeholder="ກະລຸນາປ້ອນນາມສະກຸນ...." required>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">ເພດ:</label>
                                        <input type="radio" name="gender" class='form-check-input' id="gender" value="M" required>ຊາຍ
                                        <input type="radio" name="gender" class='form-check-input' id="gender" value="F" required>ຍິງ
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">ວັນເດືອນປີເກີດ:</label>
                                        <input type="date" name="date" class='form-control' id="date" required>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">ຮູບພາບ:</label><br>
                                        <img src="" width="90%" height="250px" id="showimage" alt="">
                                        <input type="file" name="up_image" class="mt-3 file-btn" id="up_image" required>
                                        <p>ໝາຍເຫດ: ຮູບທີ່ໃຊ້ຄວນມີຂະໜາດ 160X160 ຈະພໍດີ</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mt-3">
                                        <label for="">ແຂວງ:</label>
                                        <select name="pro" id="pro" class="form-select" required>
                                            <option value="">ເລືອກແຂວງ</option>
                                            <?php while($show_pro = mysqli_fetch_array($select_province)){?>
                                                <option value="<?php echo $show_pro['pro_id'] ?>"><?php echo $show_pro['pro_name'] ?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">ເມືອງ:</label>
                                        <select name="dis" id="dis" class="form-select" required>
                                            <option value="">ເລືອກເມືອງ</option>
                                            <?php while($show_dis = mysqli_fetch_array($select_district)){?>
                                                <option value="<?php echo $show_dis['dis_id'] ?>"><?php echo $show_dis['dis_name'] ?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">ບ້ານ:</label>
                                        <select name="vill" id="vill" class="form-select" required>
                                            <option value="">ເລືອງບ້ານ</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">ບ້ານຢູ່ປັດຈຸບັນ:</label>
                                        <input type="text" name="vill_n" class='form-control' id="vill_n" required placeholder="ກະລຸນາປ້ອນບ້ານຢູ່ປັດຈຸບັນ....">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">ສະຖານະໃຊ້ງານ:</label>
                                        <select name="status" id="status" class="form-select" required>
                                            <option value="">ເລືອກ</option>
                                            <option value="admin">ຜູ້ບໍລິຫານ</option>
                                            <option value="user">ຜູ້ໃຊ້</option>
                                            <option value="counter">ພະນັກງານເຄົ້າເຕີ້</option>
                                            <option value="clean">ພະນັກງານອານາໄມ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mt-3">
                                        <label for="">ຊື່ຜູ້ໃຊ້ງານ:</label>
                                        <input type="text" name="username" class='form-control' id="username" placeholder="ກະລຸນາປ້ອນຊື່ຜູ້ໃຊ້ງານ...." required>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">ລະຫັດຜ່ານ:</label>
                                        <input type="password" name="password_1" class='form-control' id="password_1" placeholder="ກະລຸນາປ້ອນລະຫັດຜ່ານ...." required>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">ຢືນຢັນລະຫັດຜ່ານ:</label>
                                        <input type="password" name="password_2" class='form-control' id="password_2" placeholder="ຢືນຢັນລະຫັດຜ່ານ...." required>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">ເບີໂທ:</label>
                                        <input type="number" name="tel" class="form-control" id="tel" placeholder="ກະລຸນາປ້ອນເບີໂທ..." required>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">ໝາຍເຫດ:</label>
                                        <input type="text" name="remark" class="form-control" id="remark" placeholder="ກະລຸນາປ້ອນໝາຍເຫດ...">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="form-group text-center">
                                <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-upload"></i> ບັນທືກ</button>
                                <button type="reset" onclick="window.location.reload()" class="btn btn-danger"><i class="fa fa-retweet"></i> ລ້າງຂໍ້ມູນ</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="show"></div>
        </div>
    </div>
    <script>
        var fileimage = document.getElementById("up_image");
        var showimage = document.getElementById("showimage");
        fileimage.onchange = e => {
            var [file] = fileimage.files;
            if(file){
                showimage.src = URL.createObjectURL(file);
            }
        }
    </script>
</body>
</html>