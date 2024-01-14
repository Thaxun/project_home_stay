<?php

session_start();
if(@$_SESSION['checks']<>1){
echo"<script>location='index.php';</script>";
}
else{
}
  
  
?>
<html>
<style>
   * {
      font-family: 'phetsarath ot';
   }
   body{
      background: #ccc;

   }

   #save {
      margin-top: 30;
   }
</style>

<head>

   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>ລະບົບບໍລິຫານ ບ້ານພັກ</title>
   <link rel="icon" href="logo/home_stay.jpeg">
   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
   <!-- Ionicons -->
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- Tempusdominus Bootstrap 4 -->
   <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
   <!-- iCheck -->
   <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
   <!-- JQVMap -->
   <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="dist/css/adminlte.min.css">
   <!-- overlayScrollbars -->
   <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
   <!-- Daterange picker -->
   <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
   <!-- summernote -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
   <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
   <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="icon/css/all.min.css">
   <script src="sweetalert/dist/sweetalert2.all.min.js"></script>
   <script src="jquery.js"></script>
</head>
<?php
   include("con_db.php");
   include("con_db.php");
   $select_all_room = mysqli_query($conn,"SELECT sum(price) FROM room_for_rent as a,pay_for_room as b WHERE a.ren_id=b.ren_id AND b.check_out = curdate()");
   $show_all_room = mysqli_fetch_array($select_all_room);
   $select_sum = mysqli_query($conn,"SELECT sum(price) FROM pay_for_room");
   $show_sum = mysqli_fetch_array($select_sum);
   // $select_infor = mysqli_query($conn,"SELECT count(i_id) FROM information WHERE check_out ");
   // $show_infor = mysqli_fetch_array($select_infor);
   $all_r = mysqli_query($conn,"SELECT count(ren_id) from room_for_rent");
   $show_allroom=mysqli_fetch_array($all_r);
   $not_free = mysqli_query($conn,"SELECT count(ren_id) from room_for_rent where status_room=0");
   $show_notfree=mysqli_fetch_array($not_free);
   $free = mysqli_query($conn,"SELECT count(ren_id) from room_for_rent where status_room=1");
   $show_free=mysqli_fetch_array($free);
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="container-fluid">
      <div class="row">
      <div class="col-lg-3 col-6">
         <div class="small-box bg-info">
            <div class="inner">
               <h4><?php echo number_format($show_all_room[0]); ?>  ກີບ</h4>
               <p>ລາຍຮັບທັງໝົດຂອງວັນນີ້</p>
            </div>
            <div class="icon">
            <i class="fa fa-calendar"></i>
            </div>
            <a href="#" class="small-box-footer">ລາຍຮັບທັງໝົດຂອງວັນນີ້ <i class="fas fa-dollar-sign"></i></a>
         </div>
      </div>
      <div class="col-lg-3 col-6">
         <div class="small-box bg-success">
            <div class="inner">
               <h4><?php echo number_format($show_sum[0]); ?>  ກີບ</h4>
               <p>ລາຍຮັບທັງໝົດ</p>
            </div>
            <div class="icon">
            <i class="fas fa-dollar-sign"></i>
            </div>
            <a href="#" class="small-box-footer">ລາຍຮັບທັງໝົດ <i class="fas fa-dollar-sign"></i></a>
         </div>
      </div>
      <div class="col-lg-3 col-6">
         <div class="small-box bg-primary">
            <div class="inner">
               <h4><?php echo $show_allroom[0]; ?>  ຫ້ອງ</h4>
               <p>ຜູ້ເຂົ້າພັກທັງໝົດ</p>
            </div>
            <div class="icon">
               <i class="fa fa-user-plus"></i>
            </div>
            <a href="information/select_infor.php" class="small-box-footer">ເບິ່ງຂໍ້ມູນເພີ່ມ <i class="fas fa-arrow-right"></i></a>
         </div>
      </div>
      <div class="col-lg-3 col-6">
         <div class="small-box bg-info">
            <div class="inner">
               <h4><?php echo $show_free[0]; ?>  ຄົນ</h4>
               <p>ຈຳນວນຫ້ອງທີ່ຫວ່າງ</p>
            </div>
            <div class="icon">
               <i class="fa fa-users"></i>
            </div>
            <a href="#" class="small-box-footer">ເບິ່ງຂໍ້ມູນເພີ່ມ <i class="fas fa-arrow-right"></i></a>
         </div>
      </div>
      <div class="col-lg-3 col-6">
         <div class="small-box bg-danger">
            <div class="inner">
               <h4><?php echo $show_notfree[0]; ?>  ຄົນ</h4>
               <p>ຈຳນວນຫ້ອງທີ່ບໍ່ຫວ່າງ</p>
            </div>
            <div class="icon">
               <i class="fa fa-users"></i>
            </div>
            <a href="user/select_user.php" class="small-box-footer">ເບິ່ງຂໍ້ມູນເພີ່ມ <i class="fas fa-arrow-right"></i></a>
         </div>
      </div>
        

   <!-- jQuery -->
   <script src="plugins/jquery/jquery.min.js"></script>
   <!-- jQuery UI 1.11.4 -->
   <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
   <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
   <script>
      $.widget.bridge('uibutton', $.ui.button)
   </script>
   <!-- Bootstrap 4 -->
   <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
   <!-- ChartJS -->
   <script src="plugins/chart.js/Chart.min.js"></script>
   <!-- Sparkline -->
   <script src="plugins/sparklines/sparkline.js"></script>
   <!-- JQVMap -->
   <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
   <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
   <!-- jQuery Knob Chart -->
   <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
   <!-- daterangepicker -->
   <script src="plugins/moment/moment.min.js"></script>
   <script src="plugins/daterangepicker/daterangepicker.js"></script>
   <!-- Tempusdominus Bootstrap 4 -->
   <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
   <!-- Summernote -->
   <script src="plugins/summernote/summernote-bs4.min.js"></script>
   <!-- overlayScrollbars -->
   <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
   <!-- AdminLTE App -->
   <script src="dist/js/adminlte.js"></script>
   <!-- AdminLTE for demo purposes -->
   <script src="dist/js/demo.js"></script>
   <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
   <script src="dist/js/pages/dashboard.js"></script>
</body>

</html>