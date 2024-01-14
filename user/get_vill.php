<?php 
    include("../con_db.php");
    $dis_id = $_POST['dis_id'];
    $select = mysqli_query($conn,"SELECT * FROM village WHERE dis_id = $dis_id");
?>
<select disabled selected>
    <option value="">ເລືອກບ້ານ</option>
    <?php while($row = mysqli_fetch_array($select)){ ?>
        <option value="<?php echo $row['vill_id'] ?>"><?php echo $row['vill_name'] ?></option>
    <?php } ?>
</select>