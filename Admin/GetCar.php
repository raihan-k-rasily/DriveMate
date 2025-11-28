<?php
include ("../DbOperation.php");
$obj = new dboperation();
$s = 0;

// if(isset($_POST['id']))
// {
$id = $_POST['id'];
$st = $_POST['Status'];
?>
<table>
    <thead>
        <tr>
            <th>Sl No.</th>
            <th>Plate No.</th>
            <th>Car's Image</th>
            <th>Car's Variant</th>
            <th>Description</th>
            <th>Colour</th>
            <th>Fuel Type</th>
            <th>Ownership</th>
            <th>Owner's Name</th>
            <th>Amount/Day</th>
            <th>Remark</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM tbl_Car where Car_Model='$id' and Car_Status = '$st'";
        $res = $obj->executequery($sql);
        while ($display = mysqli_fetch_array($res)) {
            ?>
            <tr>
                <td><?php echo ++$s; ?></td>
                <td><?php echo $display['Plate_Number']; ?></td>
                <td><img src="../Uploads/<?php echo $display['Car_Image'];?>" width="400" height="400"></td>
                <td><?php echo $display['Car_Variant']; ?></td>
                <td><?php echo $display['Car_Description']; ?></td>
                <td>
                <input type="text" style ="background-color :<?php echo $display['Car_Colour']; ?>;width:40px;height:40px" 
                readonly>    
                </td>
                <td><?php echo $display['Fuel_Type']; ?></td>
                <td><?php echo $display['Car_Ownership']; ?></td>
                <td><?php echo $display['Owners_Name']; ?></td>
                <td><?php echo $display['AmountperDay']; ?></td>
                <td><?php echo $display['Car_Remark']; ?></td>
                <td><?php echo $display['Car_Status']; ?></td>
                <td><a href="CarEdit.php?id=<?php echo $display['Car_ID']; ?>">
                        <input type="button" class="btn btn-primary" value="Edit"></a></td>
                <td><a href="CarDelete.php?id=<?php echo $display['Car_ID']; ?>"
                        onclick="return confirm('Are you sure you wants to delete the <?php echo $display['Plate_Number']; ?> name?')">
                        <input type="button" class="btn btn-danger" value="Delete"></a></td>
            </tr>
            <?php
        }

        ?>
    </tbody>
</table>
<!-- <?php
// }
?> -->