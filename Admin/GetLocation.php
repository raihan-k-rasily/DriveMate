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
            <th>Location Name</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM tbl_location where District_ID='$id'";
        $res = $obj->executequery($sql);
        while ($display = mysqli_fetch_array($res)) {
            ?>
            <tr>
                <td><?php echo ++$s; ?></td>
                <td><?php echo $display['Location_Name']; ?></td>
                <td><a href="LocationEdit.php?id=<?php echo $display['Location_ID']; ?>">
                        <input type="button" class="btn btn-primary" value="Edit"></a></td>
                <td><a href="LocationDelete.php?id=<?php echo $display['Location_ID']; ?>"
                        onclick="return confirm('Are you sure you wants to delete the <?php echo $display['Location_Name']; ?> name?')">
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