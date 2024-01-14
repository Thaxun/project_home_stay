<?php 
    include("../con_db.php");
    $select_rent = "SELECT * FROM room_for_rent as a,room_type as b,user as c WHERE a.room_id=b.room_id AND a.u_id=c.u_id";
    $query_rent = mysqli_query($conn,$select_rent);
    $order = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>select_rent</title>
    <link rel="stylesheet" href="../bootstrap-5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../icon/css/all.min.css">
    <script src="../jquery.js"></script>
    <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>
    <link rel="icon" href="../logo/home_stay.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
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
        <div class="card-header bg-light text-center">
            <h4><i class="fa fa-bed"></i> ລາຍງານຂໍ້ມູນຫ້ອງເຊົ່າ</h4>
        </div>
        <table class="table table-hover table-striped table-bordered" id="mytable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ປະເພດຫ້ອງ</th>
                    <th>ຊື່ຫ້ອງ</th>
                    <th>ລາຄາ/ຄືນ</th>
                    <th>ລາຄາ/3ຊົ່ວໂມງ</th>
                    <th>ສະຖານະຫ້ອງ</th>
                    <th>ໝາຍເຫດ</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_array($query_rent)){ ?>
                <tr>
                    <td><?php echo $order++; ?></td>
                    <td><?php echo $row['room_name']; ?></td>
                    <td><?php echo $row['ren_number']; ?></td>
                    <td><?php echo number_format($row['ren_price']); ?> ກີບ</td>
                    <td><?php echo number_format($row['time_price']); ?> ກີບ</td>
                    <td>
                        <?php if($row['status_room'] == 0){ ?>
                            <span class="text-danger">ບໍ່ວ່າງ</span>
                        <?php }elseif($row['status_room'] == 1){?>
                            <span class="text-success">ວ່າງ</span>
                        <?php }elseif($row['status_room'] == 2){?>
                            <span class="text-warning">ຍັງບໍ່ທັນອະນາໄມເທື່ອ</span>
                        <?php }?>
                    </td>
                    <td><?php echo $row['ren_remark']; ?></td>
                    <td>
                    <a href="edit_rent.php?ren_id=<?php echo $row['ren_id']; ?>" class="btn btn-warning"><i class="fa fa-edit"></i> ແກ້ໄຂ</a>
                    <a href="delete_rent.php?ren_id=<?php echo$row['ren_id']; ?>" class="btn btn-danger delete"><i class="fa fa-trash"></i> ລົບ</a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</body>
</html>