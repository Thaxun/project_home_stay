<?php 
    include("../con_db.php");
    $select_province = mysqli_query($conn,"SELECT * FROM province");
    $select_district = mysqli_query($conn,"SELECT * FROM district");
    $select_village = mysqli_query($conn,"SELECT * FROM village");

    $id = $_GET['u_id'];
    $select_user = mysqli_query($conn,"SELECT * FROM user as a,province as b,district as c,village as d  WHERE a.pro_id=b.pro_id AND a.dis_id=c.dis_id AND a.vill_id=d.vill_id  AND u_id = $id");
    $show_user = mysqli_fetch_array($select_user);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit_user</title>
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
        $("#username").bind('keyup blur',function(){
            var node = $(this);
            node.val(node.val().replace(/[^a-z A-Z 0-9]/,''));
        })
        $("#go").on('submit',function(e){
        e.preventDefault();
        $.ajax({
            url:'update_user.php',
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
                        <h5><i class="fa fa-user"></i> ຟອມແກ້ໄຂຜູ້ໃຊ້ງານ</h5>
                    </div>
                    <form action="update_user.php" id="go" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                            <div class="row">
                                <input type="hidden" name='u_id' value="<?php echo $show_user['u_id']; ?>">
                                <input type="hidden" name='up_image2' value="<?php echo $show_user['image']; ?>">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">ຮູບພາບ:</label><br>
                                        <img src="../upload/<?php echo $show_user['image']; ?>" width="100%" height="300px" id="showimage" alt="">
                                        <input type="file" name="up_image" class="mt-3 file-btn" id="up_image" >
                                        <p>ໝາຍເຫດ: ຮູບທີ່ໃຊ້ຄວນມີຂະໜາດ 160X160 ຈະພໍດີ</p>
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="form-group mt-3">
                                        <label for="">ຊື່:</label>
                                        <input type="text" name="fname" class='form-control' id="fname" value="<?php echo $show_user['fname']; ?>" placeholder="ກະລຸນາປ້ອນຊື່...." required>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">ນາມສະກຸນ:</label>
                                        <input type="text" name="lname" class='form-control' id="fname" value="<?php echo $show_user['lname']; ?>" placeholder="ກະລຸນາປ້ອນນາມສະກຸນ...." required>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">ເພດ:</label>
                                        <input type="radio" name="gender" class='form-check-input' id="gender" value="M" required <?php if($show_user['gender'] == "M"){echo "checked";} ?>>ຊາຍ
                                        <input type="radio" name="gender" class='form-check-input' id="gender" value="F" required <?php if($show_user['gender'] == "F"){echo "checked";} ?>>ຍິງ
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">ວັນເດືອນປີເກີດ:</label>
                                        <input type="date" name="date" class='form-control' id="date" value="<?php echo $show_user['dob']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mt-3">
                                        <label for="">ແຂວງ:</label>
                                        <select name="pro" id="pro" class="form-select" required>
                                            <option value="<?php echo $show_user['pro_id'] ?>"><?php echo $show_user['pro_name'] ?></option>
                                            <?php while($show_pro = mysqli_fetch_array($select_province)){?>
                                                <option value="<?php echo $show_pro['pro_id'] ?>"><?php echo $show_pro['pro_name'] ?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">ເມືອງ:</label>
                                        <select name="dis" id="dis" class="form-select" required>
                                            <option value="<?php echo $show_user['dis_id'] ?>"><?php echo $show_user['dis_name'] ?></option>
                                            <?php while($show_dis = mysqli_fetch_array($select_district)){?>
                                                <option value="<?php echo $show_dis['dis_id'] ?>"><?php echo $show_dis['dis_name'] ?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">ບ້ານ:</label>
                                        <select name="vill" id="vill" class="form-select" required>
                                            <option value="<?php echo $show_user['vill_id'] ?>"><?php echo $show_user['vill_name'] ?></option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">ບ້ານຢູ່ປັດຈຸບັນ:</label>
                                        <input type="text" name="vill_n" class='form-control' id="vill_n" value="<?php echo $show_user['vill_now']; ?>" required placeholder="ກະລຸນາປ້ອນບ້ານຢູ່ປັດຈຸບັນ....">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mt-3">
                                        <label for="">ຊື່ຜູ້ໃຊ້ງານ:</label>
                                        <input type="text" name="username" class='form-control' id="username" value="<?php echo $show_user['username']; ?>" placeholder="ກະລຸນາປ້ອນຊື່ຜູ້ໃຊ້ງານ...." required>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">ສະຖານະໃຊ້ງານ:</label>
                                        <select name="status" id="status" class="form-select" required>
                                            <option value="<?php echo $show_user['status']; ?>">
                                                <?php if($show_user['status'] == "admin"){ ?>
                                                    ຜູ້ບໍລິຫານ
                                                <?php }elseif($show_user['status'] == 'user'){?>
                                                    ຜູ້ໃຊ້
                                                <?php }?>
                                            </option>
                                            <option value="admin">ຜູ້ບໍລິຫານ</option>
                                            <option value="user">ຜູ້ໃຊ້</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">ເບີໂທ:</label>
                                        <input type="number" name="tel" class="form-control" id="tel" value="<?php echo $show_user['tel'] ?>" placeholder="ກະລຸນາປ້ອນເບີໂທ..." required>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">ໝາຍເຫດ:</label>
                                        <input type="text" name="remark" class="form-control" id="remark" value="<?php echo $show_user['u_remark'] ?>" placeholder="ກະລຸນາປ້ອນໝາຍເຫດ...">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="form-group text-center">
                                <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-edit"></i> ແກ້ໄຂ</button>
                                <a href="select_user.php" type="reset"  class="btn btn-danger"><i class="fa fa-arrow-left"></i> ຍ້ອນກັບ</a>
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