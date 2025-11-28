<?php
include ("../DbOperation.php");
$obj = new dboperation();
$s = 0;

// if(isset($_POST['id']))
// {
$id = $_POST['id'];
?>
<div class="form-group">
    <label for="exampleInputUsername1">Model Name</label>
    <select class="form-control" id="txt_ModelID" name="txt_ModelID">
        <option value="0" selected disabled>---CHOOSE A MODEL---</option>
        <?php
        $sql = "select * from tbl_Model where Automakers_ID='$id'";
        $res = $obj->executequery($sql);
        while ($display = mysqli_fetch_array($res)) {
            ?>
            <option value="<?php echo $display['Model_ID']; ?>"><?php echo $display['Model_Name']; ?></option>
            <?php
        }
        ?>
    </select>
</div>
<!-- <?php
// }
?> -->