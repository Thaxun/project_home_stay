<?php 
    include("../con_db.php");
    $pro_id = $_GET['pro_id'];
    $sql = mysqli_query($conn,"SELECT * FROM province WHERE pro_id = '$pro_id' ");
    $row = mysqli_fetch_array($sql);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form_province</title>
    <link rel="stylesheet" href="../bootstrap-5/css/bootstrap.min.css">
    <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>
    <script src="../jquery.js"></script>
    <link rel="icon" href="../logo/home_stay.jpeg">
    <link rel="stylesheet" href="../icon/css/all.min.css">
</head>
<script>
    $(function(){
        $("#btn").click(function(){
            var c = $(".pro_id").val();
            var a = $(".province").val();
            var b = $(".remark").val();
            if(a == ''){
                Swal.fire({
                    icon: 'warning',
                    title : 'ທ່ານຍັງບໍ່ໄດ້ປ້ອນແຂວງ'
                })
            }else{
                $.post("update_province.php",{
                province:a,
                remark:b,
                pro_id:c
                },function(output){
                    $(".sho").html(output);
                })
            }
            
        });
       
    })
</script>
<style>
    *{
        font-family:Noto sans lao;
    }
</style>
<body>
    <div class="container">
        <div class="card-header bg-primary text-center mb-3 ">
            <h3>ແກ້ໄຂຂໍ້ມູນແຂວງ</h3>
        </div>
        <form action="" class="d-flex">
            <div class="form-floating">
                <input type="text" class="form-control pro_id" value="<?php echo $row[0]; ?>" readonly placeholder="ລະຫັດແຂວງ">
                <label for="floatingInput">ລະຫັດແຂວງ</label>
            </div>
            <div class="form-floating mx-sm-3">
                <input type="text" class="form-control province" value="<?php echo $row[1]; ?>" placeholder="ກະລຸນາປ້ອນແຂວງ">
                <label for="floatingInput">ກະລຸນາປ້ອນແຂວງ</label>
            </div>
            <div class="form-floating mx-sm-3">
                <input type="text" class="form-control remark" value="<?php echo $row[2]; ?>" placeholder="ໝາຍເຫດ">
                <label for="floatingInput">ໝາຍເຫດ</label>
            </div>
            <div class="form-group mx-sm-3 mt-1">
                <button type="button" class="btn btn-success btn-lg" id="btn"><i class="fa fa-download"></i> ແກ້ໄຂຂໍ້ມູນ</button>
            </div>
            <div class="form-group mx-sm-3 mt-1">
                <a href="form_province.php" class="btn btn-danger btn-lg"><i class="fa fa-share " aria-hidden="true"></i> ຍ້ອນກັບ</a>
            </div>
        </form>
        
    </div>
    <div class="sho"></div>
</body>
</html>