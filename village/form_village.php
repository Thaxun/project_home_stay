<?php 
    include("../con_db.php");
    $select = "SELECT * FROM province AS a,district AS b,village AS c WHERE a.pro_id=c.pro_id AND b.dis_id=c.dis_id ORDER BY c.vill_id DESC";
    $query = mysqli_query($conn,$select);
    $order = 1;
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
            var a = $("#pro").val();
            var b = $("#dis").val();
            var c = $(".vill").val();
            var d = $(".remark").val();
            if(a == ''){
                 Swal.fire({
                    icon: 'warning',
                    title : 'ທ່ານຍັງບໍ່ໄດ້ເລືອກແຂວງ'
                })
            }else if(b == ''){
                Swal.fire({
                    icon: 'warning',
                    title : 'ທ່ານຍັງບໍ່ໄດ້ເລືອກເມືອງ'
                })
            }else if(c== ''){
                Swal.fire({
                    icon: 'warning',
                    title : 'ທ່ານຍັງບໍ່ໄດ້ປ້ອນບ້ານ'
                })
                $(".dis").css('border','1px solid red');
            }else{
                $.post("insert_village.php",{
                pro:a,
                dis_name:b,
                vill:c,
                remark:d
                },function(output){
                    $(".sho").html(output);
                })
            }
            
        });
        $(".dis").keyup(function(){
            $(".dis").css("border",'');
        })
        $(".delete").click(function(e){
           e.preventDefault();
           var href = $(this).attr("href");
           Swal.fire({
            title: 'ຕ້ອງການລົບແທ້ບໍ່',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ຕົກລົງ',
            cancelButtonText: 'ຍົກເລີກ'
            }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
            })
            
        })

        $("#pro").change(function(){
            var c_provin = $("#pro").val();
            $.post("get_district.php",{
                c_province:c_provin
            },function(output){
                $("#dis").html(output);
            })
        })

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
            <h3>ຂໍ້ມູນບ້ານ</h3>
        </div>
        <form action="" class="d-flex">
            <div class="form-group">
              <select name="" class="form-select pro" id="pro">
                <option value="">ເລືອກແຂວງ</option>
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
                <option value="">ເລືອກເມືອງ</option>
                <?php 
                    $select_province = mysqli_query($conn,"SELECT * FROM district");
                    while($row_dis = mysqli_fetch_array($select_province)){
                ?>
                <option value="<?php echo $row_dis['dis_id'] ?>"><?php echo $row_dis['dis_name']; ?></option>
                <?php }?>
              </select>
            </div>
            <div class="form-floating mx-sm-3">
                <input type="text" class="form-control vill" placeholder="ກະລຸນາປ້ອນບ້ານ">
                <label for="floatingInput">ກະລຸນາປ້ອນບ້ານ</label>
            </div>
            <div class="form-floating mx-sm-3">
                <input type="text" class="form-control remark" placeholder="ໝາຍເຫດ">
                <label for="floatingInput">ໝາຍເຫດ</label>
            </div>
            <div class="form-group mx-sm-3 mt-1">
                <button type="button" class="btn btn-success btn-lg" id="btn"><i class="fa fa-download"></i> ບັນທືກ</button>
            </div>
            <div class="form-group mx-sm-3 mt-1">
                <button type="reset" class="btn btn-danger btn-lg"><i class="fa fa-exclamation-triangle fa-spin"></i> ຍົກເລີກ</button>
            </div>
        </form>
        <table class="table table-bordered bg-light mt-4">
            <thead class="bg-primary">
                <tr>
                    <th>ລຳດັບ</th>
                    <th>ແຂວງ</th>
                    <th>ເມືອງ</th>
                    <th>ບ້ານ</th>
                    <th>ໝາຍເຫດ</th>
                    <th></th>
                </tr>
            </thead>
            <tbod>
                <?php while($row = mysqli_fetch_array($query)){ ?>
                <tr>
                    <td><?php echo $order++; ?></td>
                    <td><?php echo $row['pro_name']; ?></td>
                    <td><?php echo $row['dis_name']; ?></td>
                    <td><?php echo $row['vill_name']; ?></td>
                    <td><?php echo $row["remark"]; ?></td>
                    <td>
                        <a href="edit_village.php?vill_id=<?php echo $row['vill_id']; ?>" class="btn btn-warning"><i class="fa fa-wrench "></i> ແກ້ໄຂ</a>
                        <a href="delete_village.php?vill_id=<?php echo $row['vill_id']; ?>" class="btn btn-danger delete"><i class="fa fa-trash" aria-hidden="true"></i> ລົບ</a>
                    </td>
                </tr>
                <?php } ?>
            </tbod>
        </table>
    </div>
    <div class="sho"></div>
</body>
</html>