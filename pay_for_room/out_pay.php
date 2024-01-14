<?php 
    include("../con_db.php");
    $select_rent = "SELECT a.ren_number,b.name,b.check_out,b.price,b.pay_id,c.status_price,a.time_price,a.ren_price FROM room_for_rent as a,pay_for_room as b,information as c WHERE a.ren_id=b.ren_id AND b.i_id=c.i_id ORDER BY b.ren_id ASC";
    $query_rent = mysqli_query($conn,$select_rent);
    $order = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pay_out</title>
    <link rel="stylesheet" href="../bootstrap-5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../icon/css/all.min.css">
    <script src="../jquery.js"></script>
    <link rel="icon" href="../logo/home_stay.jpeg">
    <script src="../sweetalert/dist/sweetalert2.all.min.js"></script>
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
    })
</script>
<style>
    *{
        font-family:phetsarath ot;
    }
</style>
<body>
    <div class="container">
        <div class="card-header bg-primary text-center">
            <h4>ລາຍການຂອງຜູ້ທີ່ຊຳລະເງິນແລ້ວ</h4>
        </div>
        <table class="table table-hover table-striped table-bordered" id="mytable">
            <thead class="bg-primary">
                <tr>
                    <th>#</th>
                    <th>ເລກຫ້ອງ</th>
                    <th>ຊື່ ນາມສະກຸນ</th>
                    <th>ວັນທີ ແລະ ເວລາ ທີ່ອອກ</th>
                    <th>ຄ່າເຊົ່າ</th>
                    <th>ອອກບິນ</th>
                    <th>ຂໍ້ມູນ</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_array($query_rent)){ ?>
                <tr>
                    <td><?php echo $order++; ?></td>
                    <td><?php echo $row['ren_number']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['check_out']; ?></td>
                    <td>
                    <?php if($row['status_price'] == 11){?>
                           ພັກ/ຄືນ <?php echo number_format($row['ren_price']); ?>
                        <?php }elseif($row['status_price'] == 22){?>
                            ພັກ/3ຊົ່ວໂມງ <?php echo number_format($row['time_price']); ?>
                        <?php }?>
                         ກີບ
                    </td>
                    <td>
                    <a href="bill2.php?pay_id=<?php echo $row['pay_id']; ?>" class="btn btn-success"><i class="fa fa-print"></i> ອອກບິນ</a>
                    </td>
                    <td>
                    <a href="show_pay.php?pay_id=<?php echo $row['pay_id']; ?>" class="btn btn-primary">ເປີດ</a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</body>
</html>