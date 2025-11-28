<?php
include_once ('header.php');
include ("../DbOperation.php");
$obj = new dboperation();
$s = 0;
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-11 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mr-1 mb-3"
                    onclick='window.location.href="AutomakersRegistration.php"'>Add
                    New </button>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Automakers Details</h4>
                        <p class="card-description">
                            View of the<code>Automakers</code>
                        </p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sl No.</th>
                                        <th>Automaker's LOGO</th>
                                        <th>Automaker's Name</th>
                                        <th>Founded On</th>
                                        <th>Automaker's Country</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM tbl_automakers";
                                    $res = $obj->executequery($sql);
                                    while ($display = mysqli_fetch_array($res)) {
                                        ?>
                                        <tr>
                                            <td><?php echo ++$s; ?></td>
                                            <td><img src="../Uploads/<?php echo $display['Automakers_Image']; ?>"
                                                    width="100" height="50"></td>
                                            <td><?php echo $display['Automakers_Name']; ?></td>
                                            <td><?php echo $display['Automakers_Established']; ?></td>
                                            <td><?php echo $display['Automakers_Country']; ?></td>
                                            <td><a href="AutomakersEdit.php?id=<?php echo $display['Automakers_ID']; ?>">
                                                    <input type="button" class="btn btn-primary" value="Edit"></a></td>
                                            <td><a href="AutomakersDelete.php?id=<?php echo $display['Automakers_ID']; ?>"
                                                    onclick="return confirm('Are you sure you wants to delete the <?php echo $display['Automakers_Name']; ?> name?')">
                                                    <input type="button" class="btn btn-danger" value="Delete"></a></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
include_once ('footer.php');
?>