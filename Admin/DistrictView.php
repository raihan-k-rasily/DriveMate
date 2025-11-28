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
                    onclick='window.location.href="DistrictRegistration.php"'>Add
                    New </button>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">District </h4>
                        <p class="card-description">
                            View of the<code>Details</code>
                        </p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sl No.</th>
                                        <th>District Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM tbl_district";
                                    $res = $obj->executequery($sql);
                                    while ($display = mysqli_fetch_array($res)) {
                                        ?>
                                        <tr>
                                            <td><?php echo ++$s; ?></td>
                                            <td><?php echo $display['District_Name']; ?></td>
                                            <td><a href="DistrictEdit.php?id=<?php echo $display['District_ID']; ?>">
                                                    <input type="button" class="btn btn-primary" value="Edit"></a></td>
                                            <td><a href="DistrictDelete.php?id=<?php echo $display['District_ID']; ?>"
                                                    onclick="return confirm('Are you sure you wants to delete the <?php echo $display['District_Name']; ?> name?')">
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
<?php
include_once ('Footer.php');
?>