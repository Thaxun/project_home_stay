<?php 
    include("../con_db.php");
    $id = $_GET['room_id'];
    $select = mysqli_query($conn,"SELECT * FROM room_type WHERE room_id = $id");
    $row = mysqli_fetch_array($select);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form_room</title>
    <link rel="stylesheet" href="../bootstrap-5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../icon/css/all.min.css">
    <script src="../jquery.js"></script>
    <link rel="icon" href="../logo/home_stay.jpeg">
    <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<script>
    $(document).ready(function(){
        $("#go").on('submit',function(e){
        e.preventDefault();
        $.ajax({
            url:'update_room.php',
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
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-center">
                        <h4><i class="fa fa-home"></i> ຟອມບັນທືກປະເພດຫ້ອງ</h4>
                    </div>
                    <div class="card-body">
                        <form action="update_room.php" id="go" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" name="room_id" id="room_id" value="<?php echo $row['room_id'] ?>">
                                <label for="">ປະເພດຫ້ອງ:</label>
                            </div>
                           <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-bed"></i></span>
                                <input type="text" name="t_name" class="form-control" id="t_name" value="<?php echo $row['room_name'] ?>" required placeholder='ກະລຸນາປ້ອນປະເພດຫ້ອງ......'>
                                <input type="hidden" name="t_name2" id="t_name2" value="<?php echo $row['room_name'] ?>" >
                           </div>
                            <div class="form-group mt-3">
                                <label for="">ໝາຍເຫດ:</label>
                            </div>
                           <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-exclamation"></i></span>
                                <input type="text" class="form-control" name="remark" id="remark" value="<?php echo $row['room_remark'] ?>">
                           </div>
                           <div class="input-group text-center mt-3">
                                <img src="../upload/<?php echo $row['img'] ?>" width="300px" height="250px" id="image" alt="">
                                <h4><i class="fa fa-image"></i> ຮູບຫ້ອງ</h4>
                           </div>
                           <div class="form-group mt-2  ">
                                <input type="file" id="in_image" name="up_image" class="file-btn" >                                
                           </div>
                           <div class="form-group text-center mt-2">
                                <button type="submit" id="click" class="btn btn-outline-success " name="submit" value=""><i class="fa fa-edit"></i> ແກ້ໄຂຂໍ້ມູນ</button>
                                <a href="select_room.php" class="btn btn-outline-secondary "><i class="fa fa-arrow-right"></i> ຍ້ອນກັບ</a>
                           </div>

                        </form>
                    </div>
                </div>
                <div class="show"></div>
            </div>
        </div>
    </div>
    <script>
    let fileimg = document.getElementById("in_image");
    let showimg = document.getElementById("image");
    fileimg.onchange = e =>{
        var [file] = fileimg.files;
        if(file){
            showimg.src = URL.createObjectURL(file);
        }
    }
</script>
</body>
</html>