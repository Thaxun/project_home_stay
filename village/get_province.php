<?php 
    include("../con_db.php");
    if(isset($_POST['function']) && $_POST['function']== 'pro'){
    $p_id = $_POST['id'];
    $select_province = mysqli_query($conn,"SELECT * FROM district WHERE pro_id = $p_id");
    echo "<option selected disabled>ກະລຸນາເລືອກເມືອງ</option>";
    foreach($select_province as $show){
        echo "<option value='".$show['dis_id']."'>".$show['dis_name']."</option>";
    }
}
?>

