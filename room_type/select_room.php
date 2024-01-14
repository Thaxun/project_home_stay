<?php 
    include("../con_db.php");
    $select_room = "SELECT * FROM room_type as a,user as b WHERE a.u_id=b.u_id";
    $show_room = mysqli_query($conn,$select_room);
    $order = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>select_room</title>
    <link rel="stylesheet" href="../bootstrap-5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../icon/css/all.min.css">
    <script src="../jquery.js"></script>
    <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>
    <link rel="icon" href="../logo/home_stay.jpeg">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
</head>
<script>
    $(document).ready(function(){
        $('#mytable').DataTable({
            language : {
                    "decimal":        "",
                    "emptyTable":     "No data available in table",
                    "info":           "ສະແດງ _START_ - _END_ ຈາກ _TOTAL_ ລາຍການ",
                    "infoEmpty":      "Showing 0 to 0 of 0 entries",
                    "infoFiltered":   "(filtered from _MAX_ total entries)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "ສະແດງ _MENU_ ລາຍການ",
                    "loadingRecords": "Loading...",
                    "processing":     "",
                    "search":         "ຄົ້ນຫາ:",
                    "zeroRecords":    "No matching records found",
                    "paginate": {
                        "first":      "First",
                        "last":       "Last",
                        "next":       "ໜ້າຕໍ່ໄປ",
                        "previous":   "ກ່ອນໜ້າ"
                    },
                    "aria": {
                        "sortAscending":  ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    }
                }
        });
        $(".delete").click(function(e){
            e.preventDefault();
            var href = $(this).attr("href");
            Swal.fire({
            title: 'ທ່ານຕ້ອງການລົບ ແທ້ ບໍ່?',
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
    })
</script>
<style>
    *{
        font-family:phetsarath ot;
    }
</style>
<body>
    <div class="container-fluid">
        <div class="card-header text-center bg-success mb-3">
            <h4><i class="fa fa-home"></i> ລາຍງານຂໍ້ມູນ</h4>
        </div>
        <table class="table table-striped " id="mytable">
            <thead class="bg-dark text-light">
                <tr>
                    <th>ລຳດັບ</th>
                    <th>ຮູບຫ້ອງ</th>
                    <th>ປະເພດຫ້ອງ</th>
                    <th>ໝາຍເຫດ</th>
                    <th>ຜູ້ບັນທືກຂໍ້ມູນ</th>
                    <th class="bg-warning">ແກ້ໄຂຂໍ້ມູນ</th>
                    <th class="bg-danger">ລົບ</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_array($show_room)){ 
                    // $image = "../upload/".$row['img']; ວິທີທີ່1
                    // <img src="<?php echo image; >">
                    // <img src="../upload/<?php echo $row['img']>"> ວິທີ2
                    ?>
                <tr>
                    <td><?php echo $order++; ?></td>
                    <td><img src="../upload/<?php echo $row['img']; ?>" width="200px" alt=""></td>
                    <td><?php echo $row['room_name'] ?></td>
                    <td><?php echo $row['room_remark'] ?></td>
                    <td><?php echo $row['fname']." ".$row['lname']; ?></td>
                    <td>
                        <a href="edit_room.php?room_id=<?php echo $row['room_id']; ?>" class="btn btn-warning"><i class="fa fa-edit"></i> ແກ້ໄຂ</a>
                    </td>
                    <td>
                    <a href="delete_room.php?room_id=<?php echo$row['room_id']; ?>" class="btn btn-danger delete"><i class="fa fa-trash"></i> ລົບ</a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</body>
</html>