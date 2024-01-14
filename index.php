
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" href="bootstrap-5/css/bootstrap.min.css">
    <link rel="stylesheet" href="icon/css/all.min.css">
    <script src="jquery.js"></script>
    <script src="sweetalert/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="css/js.js"></script>
    <script src="css/showpw.js"></script>
    <link rel="icon" href="logo/home_stay.jpeg">
</head>
<style>
        *{
            font-family:phetsarath ot;
        }
    </style>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img src="dist/img/home_stay.jpeg" width="80%" class="rounded-circle" alt="">
            </div>
            <div class="col-md-6">
                <div class="text-center mt-5">
                    <h3>ລະບົບບໍລິຫານ ບ້ານພັກ</h3>
                </div>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <img src="dist/img/bed.jpg" width="70%" alt="">
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <div class="form-group">
                        <label for="">ຊື່ຜູ້ໃຊ້ງານ:</label>
                        <input type="text" id="userlog" class="form-control" placeholder="ກະລຸນາປ້ອນຊື່ຜູ້ໃຊ້ງານ....">
                    </div>
                    <div class="form-group mt-3">
                        <label for="">ລະຫັດຜ່ານ:</label>
                        <input type="password" id="input" class="form-control" placeholder="ກະລຸນາປ້ອນລະຫັດຜ່ານ....">
                        <input type="checkbox" onclick="showPw();">ສະແດງລະຫັດຜ່ານ
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn" type="button" id="check">ເຂົ້າສູ່ລະບົບ</button>
                    </div>
                </div>
            </div>
            <div class="show"></div>
        </div>
    </div>
    <div class="footer mt-4">
       <div class="row">
        <div class="col-md-6 text-center">
            <p>© ພັດທະນາໂດຍນັກສຶກສາປີ​ 2</p>
        </div>
        <div class="col-md-6">
            <p>ລະບົບໂປຣແກຣມນີ້ສ້າງມາເພື່ອເປັນແນວທາງໃນການຮຽນຮູ້ທີ່ຈະຂຽນລະບົບໂປຣແກຣມ</p>
            <p>ໂດຍນຳໃຊ້ພາສາຕ່າງໆເຊັ່ນ: PHP,jQuery,HTML,Bootstrap 5,CSS,SQL ແລະ ອື່ນໆ...</p>
        </div>
       </div>
    </div>
</body>
</html>