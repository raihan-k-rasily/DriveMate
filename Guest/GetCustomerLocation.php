<?php
include ("../DbOperation.php");
$obj = new dboperation();
$s = 0;

// if(isset($_POST['id']))
// {
$id = $_POST['id'];
?>
<div class="form-group">
    <label for="exampleInputUsername1">Location Name</label>
    <select class="form-control" id="txt_LocationID" name="txt_LocationID">
        <option value="0" selected disabled>---CHOOSE A LOCATION---</option>
        <?php
        $sql = "select * from tbl_Location where District_ID='$id'";
        $res = $obj->executequery($sql);
        while ($display = mysqli_fetch_array($res)) {
            ?>
            <option value="<?php echo $display['Location_ID']; ?>"><?php echo $display['Location_Name']; ?></option>
            <?php
        }
        ?>
    </select>
</div>
<!-- <?php
// }
?> -->