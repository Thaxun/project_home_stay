<?php 
    include("../con_db.php");
    $pro_id = $_POST['c_province'];
    $select = mysqli_query($conn,"SELECT * FROM district WHERE pro_id=$pro_id");

?>
<select name="" id="">
    <option value="">ເລືອກເມືອງ</option>
    <?php 
        while($row = mysqli_fetch_array($select)){
    ?>
    <option value="<?php echo $row['dis_id'] ?>"><?php echo $row['dis_name']; ?></option>
    <?php }?>
</select>