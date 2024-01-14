<?php 
    include("../con_db.php");
    $ren_id = $_POST['ren_id'];
    $select = mysqli_query($conn,"SELECT * FROM room_for_rent WHERE ren_id = $ren_id");
    $row = mysqli_fetch_array($select);
?>
<select>
    <option value="">ເລືອກ</option>
    <option value="11">ພັກ/ຄືນ <?= number_format($row['ren_price']) ?> ກີບ</option>
    <option value="22">ພັກ/3ຊົ່ວໂມງ <?= number_format($row['time_price']) ?> ກີບ</option>
    
</select>