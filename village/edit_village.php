<?php 
    include("../con_db.php");
    $ed_id = $_GET['vill_id'];
    $select = "SELECT * FROM province AS a,district AS b,village AS c WHERE a.pro_id=c.pro_id AND b.dis_id=c.dis_id AND c.vill_id = $ed_id";
    $query = mysqli_query($conn,$select);
    $show_val = mysqli_fetch_array($query);
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
    <link rel="icon" href="../logo/home_stay.jpeg">
    <link rel="stylesheet" href="../icon/css/all.min.css">
</head>
<script>
    $(function(){
        $("#btn").click(function(){
            var a = $("#vill_id").val();
            var b = $("#pro").val();
            var c = $("#dis").val();
            var d = $(".vill").val();
            var e = $(".remark").val();
            if(b == ''){
                 Swal.fire({
                    icon: 'warning',
                    title : 'ທ່ານຍັງບໍ່ໄດ້ເລືອກແຂວງ'
                })
            }else if(c == ''){
                Swal.fire({
                    icon: 'warning',
                    title : 'ທ່ານຍັງບໍ່ໄດ້ເລືອກເມືອງ'
                })
            }else if(d == ''){
                Swal.fire({
                    icon: 'warning',
                    title : 'ທ່ານຍັງບໍ່ໄດ້ປ້ອນບ້ານ'
                })
                $(".dis").css('border','1px solid red');
            }else{
                $.post("update_village.php",{
                vill_id : a,
                pro_id : b,
                dis_id : c,
                vill_name : d,
                remark : e
                },function(output){
                    $(".sho").html(output);
                })
            }
            
        });
        $(".dis").keyup(function(){
            $(".dis").css("border",'');
        })

        // $("#pro").change(function(){
        //     var c_provin = $("#pro").val();
        //     $.post("get_province.php",{
        //         c_province:c_province
        //     },function(output){
        //         $("#dis").html(output);
        //     })
        // })

        // $("#pro").change(function(){
        //     var id = $(this).val();
        //     $.ajax({
        //         url: 'get_province.php',
        //         method: 'post',
        //         data:{id:id,function:'pro'},
        //         success:function(data){
        //             $("#dis").html(data);
        //         }
        //     })
        // })
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
    
    <div class="container-fluid">
        <div class="card-header bg-primary text-center mb-3 ">
            <h3>ແກ້ໄຂຂໍ້ມູນ</h3>
        </div>
        <input type="hidden" name="" id="vill_id" value="<?php echo $show_val['vill_id']; ?>">
        <form action="" class="d-flex">
            <div class="form-group">
              <select  name="" class="form-select pro" id="pro">
                <option value="<?php echo $show_val['pro_id'] ?>"><?php echo $show_val['pro_name'] ?></option>
                <?php 
                    $select_province = mysqli_query($conn,"SELECT * FROM province");
                    while($row = mysqli_fetch_array($select_province)){
                ?>
                <option value="<?php echo $row['pro_id'] ?>"><?php echo $row['pro_name']; ?></option>
                <?php }?>
              </select>
            </div>
            <div class="form-group mx-sm-3">
              <select name="" class="form-select pro" id="dis">
                <option value="<?php echo $show_val['dis_id'] ?>"><?php echo $show_val['dis_name'] ?></option>
                <?php 
                    $select_province = mysqli_query($conn,"SELECT * FROM district");
                    while($row_dis = mysqli_fetch_array($select_province)){
                ?>
                <option value="<?php echo $row_dis['dis_id'] ?>"><?php echo $row_dis['dis_name']; ?></option>
                <?php }?>
              </select>
            </div>
            <div class="form-floating mx-sm-3">
                <input type="text" class="form-control vill" value="<?php echo $show_val['vill_name'] ?>"  placeholder="ກະລຸນາປ້ອນບ້ານ">
                <label for="floatingInput">ກະລຸນາປ້ອນບ້ານ</label>
            </div>
            <div class="form-floating mx-sm-3">
                <input type="text" class="form-control remark" value="<?php echo $show_val['remark'] ?>" placeholder="ໝາຍເຫດ">
                <label for="floatingInput">ໝາຍເຫດ</label>
            </div>
            <div class="form-group mx-sm-3 mt-1">
                <button type="button" class="btn btn-success btn-lg" id="btn"><i class="fa fa-edit"></i> ແກ້ໄຂ</button>
            </div>
            <div class="form-group mx-sm-3 mt-1">
                <a href="form_village.php" type="reset" class="btn btn-danger btn-lg"><i class="fa fa-angle-left"></i> ຍ້ອນກັບ</a>
            </div>
        </form>
        
    </div>
    <div class="sho"></div>
</body>
</html>