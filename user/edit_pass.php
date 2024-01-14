<?php 
    include("../con_db.php");
    $id = $_GET['u_id'];
    $select_u = mysqli_query($conn,"SELECT * FROM user WHERE u_id = $id");
    $row = mysqli_fetch_array($select_u);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit_pass</title>
    <link rel="stylesheet" href="../bootstrap-5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../icon/css/all.min.css">
    <script src="../jquery.js"></script>
    <link rel="icon" href="../logo/home_stay.jpeg">
    <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<script>
    $(document).ready(function(){
        $("#pass").click(function(){
            var u_id = $('#u_id').val();
            var password_1 = $("#password_1").val();
            var password_2 = $("#password_2").val();
           if(password_1 == ''){
             Swal.fire({
                icon: 'warning',
                title: 'ກະລຸນາປ້ອນລະຫັດຜ່ານ'
             })
           }else if(password_2 == ''){
            Swal.fire({
                icon: 'warning',
                title: 'ກະລຸນາປ້ອນຢືນຢັນລະຫັດຜ່ານ'
             })
           }else{
            $.post("update_pass.php",{
                u_id:u_id,
                password_1:password_1,
                password_2:password_2
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
</style>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-center">
                        <h4><i class="fa fa-lock"></i> ປ່ຽນລະຫັດຜ່ານ</h4>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <input type="hidden" name="" id="u_id" value="<?php echo $row['u_id'] ?>">
                            <div class="form-group">
                                <label for="">ຊື່ຜູ້ໃຊ້ງານ:</label>
                                <input type="text" id="username" value="<?php echo $row['username'] ?>" disabled class="form-control">
                            </div>
                            <div class="form-group mt-">
                                <label for="">ລະຫັດຜ່ານໃໝ່:</label>
                                <input type="password" id="password_1" class="form-control" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="">ຢືນຢັນລະຫັດຜ່ານ:</label>
                                <input type="password" id="password_2" class="form-control" required>
                            </div>
                            <div class="form-guroup mt-3 ">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="select_user.php" class="btn btn-secondary"><i class="fa fa-arrow-left"></i></a>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <button class="btn btn-success" type="button" id="pass"><i class="fa fa-password"></i> ປ່ຽນລະຫັດຜ່ານ</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="show"></div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>
</html>
