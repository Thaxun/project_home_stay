<?php 
    include("../con_db.php");
    $id = $_GET['dis_id'];
    $select = "SELECT * FROM district AS a,province AS b WHERE a.pro_id=b.pro_id AND a.dis_id= $id";
    $query = mysqli_query($conn,$select);
    $row = mysqli_fetch_array($query);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form_district</title>
    <link rel="stylesheet" href="../bootstrap-5/css/bootstrap.min.css">
    <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>
    <script src="../jquery.js"></script>
    <link rel="stylesheet" href="../icon/css/all.min.css">
    <link rel="icon" href="../logo/home_stay.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css">
</head>
<script>
    $(function(){
        $("#btn").click(function(){
            var d = $("#dis_id").val();
            var c = $("#pro").val();
            var a = $(".dis").val();
            var b = $(".remark").val();
            if(a == ''){
                Swal.fire({
                    icon: 'warning',
                    title : 'ທ່ານຍັງບໍ່ໄດ້ປ້ອນເມືອງ'
                })
                $(".province").css('border','1px solid red');
            }else if(c == ''){
                Swal.fire({
                    icon: 'warning',
                    title : 'ທ່ານຍັງບໍ່ໄດ້ເລືອກແຂວງ'
                })
            }else{
                $.post("update_district.php",{
                dis:a,
                remark:b,
                pro:c,
                dis_id:d
                },function(output){
                    $(".sho").html(output);
                })
            }
            
        });
        $(".province").keyup(function(){
            $(".province").css("border",'');
        })
       
    })
</script>
<style>
    *{
        font-family:Noto sans lao;
    }
    .form-select{
        padding:16px;
    }
</style>
<body>
    <div class="container">
        <div class="card-header bg-primary text-center mb-3 ">
            <h3>ແກ້ໄຂເມືອງ</h3>
        </div>
        <form action="" class="d-flex">
            <div class="form-group">
                <input type="hidden"  id="dis_id" value="<?php echo $row['dis_id']; ?>">

              <select name="" class="form-select pro" id="pro">
                <option value="<?php echo $row['pro_id']; ?>"><?php echo $row['pro_name']; ?></option>
                <?php 
                    $select_province = mysqli_query($conn,"SELECT * FROM province");
                    while($show_name = mysqli_fetch_array($select_province)){
                ?>
                <option value="<?php echo $show_name['pro_id'] ?>"><?php echo $show_name['pro_name']; ?></option>
                <?php }?>
              </select>
            </div>
            <div class="form-floating mx-sm-3">
                <input type="text" class="form-control dis" value="<?php echo $row['dis_name']; ?>" placeholder="ກະລຸນາປ້ອນເມືອງ">
                <label for="floatingInput">ກະລຸນາປ້ອນເມືອງ</label>
            </div>
            <div class="form-floating mx-sm-3">
                <input type="text" class="form-control remark" value="<?php echo $row[3]; ?>" placeholder="ໝາຍເຫດ">
                <label for="floatingInput">ໝາຍເຫດ</label>
            </div>
            <div class="form-group mx-sm-3 mt-1">
                <button type="button" class="btn btn-success btn-lg" id="btn"><i class="fa fa-expeditedssl"></i> ແກ້ໄຂຂໍ້ມູນ</button>
            </div>
            <div class="form-group mx-sm-3 mt-1">
                <a href="form_district.php" type="reset" class="btn btn-danger btn-lg"><i class="fa fa-arrow-circle-left"></i> ຍ້ອນກັບ</a>
            </div>
        </form>
        
    <div class="sho"></div>
</body>
</html>