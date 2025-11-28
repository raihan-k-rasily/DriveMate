<?php
include ("../DbOperation.php");
$obj = new dboperation();
$s = 0;

// if(isset($_POST['id']))
// {
$id = $_POST['id'];
?>
<table>
    <thead>
        <tr>
            <th>Sl No.</th>
            <th>Front Image</th>
            <th>Right Image</th>
            <th>Left Image</th>
            <th>Back Image</th>
            <th>Model Name</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM tbl_model where Automakers_ID='$id'";
        $res = $obj->executequery($sql);
        while ($display = mysqli_fetch_array($res)) {
            $d=$display['Model_Description'];
            $d=str_replace(";","<br>",$d);
            ?>
            <tr>
                <td><?php echo ++$s; ?></td>
                <td><img src="../Uploads/<?php echo $display['Model_FImage'];?>" width="400" height="200"></td>
                <td><img src="../Uploads/<?php echo $display['Model_RImage'];?>" width="400" height="200"></td>
                <td><img src="../Uploads/<?php echo $display['Model_LImage'];?>" width="400" height="200"></td>
                <td><img src="../Uploads/<?php echo $display['Model_BImage'];?>" width="400" height="200"></td>
                <td><?php echo $display['Model_Name']; ?></td>
                <td>
                     <details>
                <summary> Details about your selected car </summary>
                <?php echo $d ?>
                </details>
                </td>
                <td><a href="ModelEdit.php?id=<?php echo $display['Model_ID']; ?>">
                        <input type="button" class="btn btn-primary" value="Edit"></a></td>
                <td><a href="ModelDelete.php?id=<?php echo $display['Model_ID']; ?>"
                        onclick="return confirm('Are you sure you wants to delete the <?php echo $display['Model_Name']; ?> name?')">
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