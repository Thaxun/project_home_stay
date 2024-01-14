<?php 

    // session_start();
    // include('connect_dbstock.php');
    // if(!isset($_SESSION['user'])){
    //   header("location:index.php");
    // }
    // if(isset($_GET['logout'])){
    //   session_destroy();
    //   header("location:index.php");
    // }
?>
<html>
<style>
*{font-family:'Phetsarath OT';}
</style>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ລະບົບບໍລິຫານ ບ້ານພັກ</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
<link rel="stylesheet" href="icon/css/all.min.css">
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
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
	<script src="sweetalert/dist/sweetalert2.all.min.js"></script>		
	<script src="jquery.js"></script>
  <link rel="icon" href="logo/home_stay.jpeg">
</head>
<body class="hold-transition sidebar-mini layout-fixed" onload="startTime();">
<?php

session_start();
if(@$_SESSION['checks']<>1){
	echo "<script>location = 'index.php';
	</script>";
	}
else{
   
?>
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light bg-">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="home_user_admin.php" target="frame" class="nav-link">ໜ້າຫຼັກ</a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
		         <i class="fas fa-expand-arrows-alt"></i>
        
        </a>
      </li>   
	  <li class="nav-item">

      <p id="showtime"></p>
      <script>
        function startTime (){
          var today = new Date();
          var dd = today.getDate();
          var mm = today.getMonth()+1;
          var yy = today.getFullYear();
          var h = today.getHours();
          var m = today.getMinutes();
          var s = today.getSeconds();
              m = checkTime(m);
              s = checkTime(s);
            document.getElementById('showtime').innerHTML = "ວັນທີເດືອນປີ: " + dd + '/' + mm + '/' + yy + '<br>' + 'ເວລາ: ' + h + ':' + m + ':' + s;
            var t = setTimeout(startTime, 500);
        }
        function checkTime (i){
          if (i < 10) {
            i = '0'+ i
          }
          return i;
        }
      </script>
        <!-- <a class="nav-link" href="#" role="button">
		<i class="fas fa-user-clock"></i>
	<?php
	 //echo $_SESSION['f_name']." ".$_SESSION['l_name'];
	?>
        </a> -->
      </li>
      <li class="nav-item ">
      <a class="nav-link" href="css/check/logout.php" 
      role="button"><button class="btn btn-outline-danger"> 
       <i class="fa fa-power-off" aria-hidden="true"></i>&ensp;ອອກຈາກລະບົບ
        </button></a>
       
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="dist/img/home_stay.jpeg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ລະບົບ ບ້ານພັກ</span>
    </a>
    <a href="#" class="brand-link">
      <img src="upload/<?php echo $_SESSION['image']; ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo $_SESSION['f_name']." ".$_SESSION['l_name']; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->


      <!-- SidebarSearch Form -->
     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="room_for_rent/all_rent.php" target="frame" class="nav-link">	
              <i class="fas fa-table"></i>
              <p>
                ລວມຫ້ອງ
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">	
              <i class="fas fa-home"></i>
              <p>
                ປະເພດຫ້ອງພັກ
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
               <!-- ຕໍາແໜງຂອງຟອມບັນທຶກປະເພດຫ້ອງພັກ -->
                <a href="room_type/form_room.php" target="frame" class="nav-link">
                  <i class="fas fa-plus"></i>
                  <p>ເພີ່ມປະເພດຫ້ອງພັກ</p>
                </a>
              </li>
              <li class="nav-item">
               <!-- ຕໍາແໜງຂອງລາຍງານປະເພດຫ້ອງພັກ -->
                <a href="room_type/select_room.php" target="frame" class="nav-link">
                  <i class="fas fa-eye"></i>
                  <p>ສະແດງປະເພດຫ້ອງພັກ </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fa fa-bed"></i>
              <p>
                ຂໍ້ມູນຫ້ອງ
                 <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
               <!-- ຟອມບັນທຶກຂໍ້ມູນຫ້ອງພັກ -->
                <a href="room_for_rent/form_rent.php" target="frame" class="nav-link">
                  <i class="fas fa-plus"></i>
                  <p>ບັນທຶກຂໍ້ມູນຫ້ອງພັກ</p>
                </a>
              </li>
              <li class="nav-item">
               <!-- ຟາຍລາຍງານຂໍ້ມູນຫ້ອງພັກ -->
                <a href="room_for_rent/select_rent.php" target="frame" class="nav-link">
                  <i class="fas fa-eye"></i>
                  <p>ລາຍງານຂໍ້ມູນຫ້ອງພັກ</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fa fa-user-plus"></i>
              <p>
                ຂໍ້ມູນຜູ້ເຂົ້າພັກ
                 <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
               <!-- ຟອມບັນທຶກຂໍ້ມູນຜູ້ເຂົ້າພັກ-->
                <a href="information/form_infor.php" target="frame" class="nav-link">
                  <i class="fas fa-plus-circle"></i>
                  <p>ບັນທຶກຂໍ້ມູນຜູ້ເຂົ້າພັກ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="information/select_infor.php" target="frame" class="nav-link">
                  <i class="fas fa-eye"></i>
                  <p>ສະແດງຂໍ້ມູນຜູ້ເຂົ້າພັກ</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fa-solid fa-house-circle-check"></i>
              <p>
                ລາຍການຊຳລະເງິນ
                 <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
               <!-- ຟອມບັນທຶກລໍຖ້າຊຳລະ -->
                <a href="pay_for_room/select_pay.php" target="frame" class="nav-link">
                  <i class="fas fa-plus-circle"></i>
                  <p>ລໍຖ້າຊຳລະເງິນ</p>
                </a>
              </li>
              <li class="nav-item">
               <!-- ຟາຍລາຍງານຂໍ້ມູນຊຳລະເງິນແລ້ວ -->
                <a href="pay_for_room/out_pay.php" target="frame" class="nav-link">
                  <i class="fas fa-eye"></i>
                  <p>
                    ສະແດງຂໍ້ມູນຜູ້ທີ່ສຳລະເງິນແລ້ວ
                  </p>
                </a>
              </li>
            </ul>
          </li>
		     <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fas fa-users"></i>
              <p>
                ພະນັກງານ
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
               <!-- ຟອມບັນທຶກຂໍ້ມູນພະນັກງານ -->
                <a href="user/form_user.php" target="frame" class="nav-link">
                <i class="fas fa-User-Cog"></i>
                  <p>ບັນທຶກຂໍ້ມູນພະນັກງານ</p>
                </a>
              </li>
              <li class="nav-item">
               <!-- ຟາຍລາຍງານຂໍ້ມູນພະນັກງານ -->
                <a href="user/select_user.php" target="frame" class="nav-link">
                  <i class="fas fa-User-Circle"></i>
                  <p>ລາຍງານຂໍ້ມູນພະນັກງານ</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


	<iframe width="100%" height="100%" frameborder="0" name="frame" src="home_user_admin.php"></iframe>
       
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
   
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

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

<?php
 }
?>
<!-- update !-->

