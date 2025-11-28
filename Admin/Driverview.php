<?php
include_once ('Header.php');
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
                    onclick='window.location.href="DriverRegistration.php"'>Add New</button>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Driver Details</h4>
                        <p class="card-description">
                            View of the<code>Driver</code>
                        </p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sl No.</th>
                                        <th>Driver's Photo</th>
                                        <th>Driver's Name</th>
                                        <th>Driver's DOB</th>
                                        <th>Driver's License No.</th>
                                        <th>Driver's License</th>
                                        <th>District</th>
                                        <th>Location</th>
                                        <th>Pincode</th>
                                        <th>EmailID</th>
                                        <th>Contact</th>
                                        <th>Amount/Day</th>
                                        <th>Date of Registration</th>
                                        <th>Remark</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Correct SQL query with appropriate join conditions
                                    $sql = "SELECT * FROM tbl_Driver tdr
                                            INNER JOIN tbl_location tl ON tdr.Driver_Location = tl.Location_ID
                                            INNER JOIN tbl_district tdi ON tl.District_ID = tdi.District_ID";
                                    $res = $obj->executequery($sql);
                                    while ($display = mysqli_fetch_array($res)) {
                                        ?>
                                        <tr>
                                            <td><?php echo ++$s; ?></td>
                                            <td><img src="../Uploads/<?php echo ($display['Driver_Photo']); ?>"
                                                    width="100" height="50"></td>
                                            <td><?php echo $display['Driver_Name']; ?></td>
                                            <td><?php echo $display['Driver_DOB']; ?></td>
                                            <td><?php echo $display['Driver_LicenseNo']; ?></td>
                                            <td><img src="../Uploads/<?php echo ($display['Driver_License']); ?>"
                                                    width="100" height="50"></td>
                                            <td><?php echo $display['District_Name']; ?></td>
                                            <td><?php echo $display['Location_Name']; ?></td>
                                            <td><?php echo $display['Driver_Pincode']; ?></td>
                                            <td><?php echo $display['Driver_EmailID']; ?></td>
                                            <td><?php echo $display['Driver_Contact']; ?></td>
                                            <td><?php echo $display['DAmountperDay']; ?></td>
                                            <td><?php echo $display['Date_Registration']; ?></td>
                                            <td><?php echo $display['Driver_Remark']; ?></td>
                                            <td><?php echo $display['Driver_Status']; ?></td>
                                            <td><a href="DriverEdit.php?id=<?php echo $display['Driver_ID']; ?>"><input
                                                        type="button" class="btn btn-primary" value="Edit"></a></td>
                                            <td><a href="DriverDelete.php?id=<?php echo $display['Driver_ID']; ?>"
                                                    onclick="return confirm('Are you sure you want to delete the <?php echo $display['Driver_Name']; ?>?')"><input
                                                        type="button" class="btn btn-danger" value="Delete"></a></td>
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
include_once ('Footer.php');
?>