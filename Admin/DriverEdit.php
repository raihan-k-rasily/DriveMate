<?php
include_once ('header.php');
include ("../DbOperation.php");
$obj = new dboperation();
$id = $_GET['id'];
$sql = "SELECT * FROM tbl_driver td 
INNER JOIN tbl_location tl ON td.Driver_Location = tl.Location_ID 
INNER JOIN tbl_district tdi ON tl.District_ID = tdi.District_ID 
where td.Driver_ID='$id'";
$res = $obj->executequery($sql);
$display = mysqli_fetch_array($res);
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-10 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mr-1 mb-3"
                    onclick='window.location.href="DriverView.php"'>View
                    Data </button>
            </div>

            <div class="col-md-10 grid-margin stretch-card  ">

                <div class="card">

                    <div class="card-body">

                        <h4 class="card-title">Driver Registration</h4>
                        <p class="card-description">
                            Add a Driver
                        </p>
                        <form class="forms-sample" action="DriverEditAction.php" method="post"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Driver's Photo</label>
                                <div class="col-sm-9">
                                    <img src="../Uploads/<?php echo $display['Driver_Photo']; ?>" width="100"
                                        height="50">
                                    <input type="file" name="file_DriverPhoto" class="form-control" placeholder="Description">
                                    <input type="hidden" name="file_DriverPhotoOld" value="<?php echo $display['Driver_Photo'];?>">
                                </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Driver's Name</label>
                                <input type="text" class="form-control" name="txt_DriverName" id="exampleInputUsername1"
                                    value="<?php echo $display['Driver_Name']; ?>" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Date of Birth</label>
                                <input type="date" class="form-control" name="txt_DriverDOB" id="exampleInputUsername1"
                                value="<?php echo $display['Driver_DOB']; ?>" placeholder="DOB">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Driver's License No.</label>
                                <input type="text" class="form-control" name="txt_DriverLicenseNo" id="exampleInputUsername1"
                                value="<?php echo $display['Driver_LicenseNo']; ?>" placeholder="License Number">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Add License Image</label>
                                <div class="col-sm-9">
                                    <img src="../Uploads/<?php echo $display['Driver_License']; ?>" width="100"
                                        height="50">
                                    <input type="file" name="file_DriverLicense" class="form-control" placeholder="Description">
                                    <input type="hidden" name="file_DriverLicenseOld" value="<?php echo $display['Driver_License'];?>" >
                                </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">District Name</label>
                                <select class="form-control" id="txt_DistrictID" name="txt_DistrictID">
                                    <option value="<?php echo $display['District_ID']; ?>" selected disabled>---CHOOSE A DISTRICT....</option>
                                    <?php
                                    $sql = "select * from tbl_district";
                                    $res = $obj->executequery($sql);
                                    while ($display1 = mysqli_fetch_array($res)) {
                                        ?>
                                        <option value="<?php echo $display1['District_ID']; ?>" <?php echo ($display['District_ID'] == $display1['District_ID']) ? "selected=selected" : "" ?>>
                                            <?php echo $display1['District_Name']; ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Location Name</label>
                                <select class="form-control" id="txt_LocationID" name="txt_LocationID">
                                    <option value="0" selected disabled>---CHOOSE A Location---</option>
                                    <?php
                                    $sql = "select * from tbl_location";
                                    $res = $obj->executequery($sql);
                                    while ($display1 = mysqli_fetch_array($res)) {
                                        ?>
                                        <option value="<?php echo $display1['Location_ID']; ?>" <?php echo ($display1['Location_ID'] == $display['Driver_Location']) ? "selected=selected" : "" ?>>
                                            <?php echo $display1['Location_Name']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Date of Registration</label>
                                <input type="date" class="form-control" name="txt_DriverDOB" id="exampleInputUsername1"
                                value="<?php echo $display['Date_Registration']; ?>" placeholder="DOB">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Pincode</label>
                                <input type="text" class="form-control" name="txt_Pincode" id="exampleInputUsername1"
                                    value="<?php echo $display['Driver_Pincode']; ?>" placeholder="Pincode">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">EmailID</label>
                                <input type="text" class="form-control" name="txt_EmailID" id="exampleInputUsername1"
                                    value="<?php echo $display['Driver_EmailID']; ?>" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Contact</label>
                                <input type="text" class="form-control" name="txt_Contact" id="exampleInputUsername1"
                                    value="<?php echo $display['Driver_Contact']; ?>" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Amount/Day</label>
                                <input type="text" class="form-control" name="txt_Amount/Day" id="exampleInputUsername1"
                                value="<?php echo $display['DAmountperDay']; ?>" placeholder="Amount/Day">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Remark</label>
                                <input type="text" class="form-control" name="txt_Remark" id="exampleInputUsername1"
                                    value="<?php echo $display['Driver_Remark']; ?>" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="txt_DriverID"
                                    value="<?php echo $display['Driver_ID']; ?>" id="exampleInputUsername1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Status :</label><br>
                                <input type="radio" class="form-check-input" name="txt_Status" value="ACTIVE" id="exampleInputUsername1"
                                    placeholder="Status"<?php echo ($display['Driver_Status'] == "ACTIVE") ? "checked=checked" : "" ?>>ACTIVE<br>
                                <input type="radio" class="form-check-input" name="txt_Status" value="INACTIVE" id="exampleInputUsername1"
                                    placeholder="Status"<?php echo ($display['Driver_Status'] == "INACTIVE") ? "checked=checked" : "" ?>>INACTIVE<br>
                                <input type="radio" class="form-check-input" name="txt_Status" value="ON DRIVE" id="exampleInputUsername1"
                                    placeholder="Status"<?php echo ($display['Driver_Status'] == "ON DRIVE") ? "checked=checked" : "" ?>>ON DRIVE<br>
                            </div>
                            <button type="Submit" name="btn_Update" id="exampleInputUsername1"
                                class="btn btn-primary mr-2">Update</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
include_once ('footer.php');
?>
<script src="../jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // alert('hi');
        $("#txt_DistrictID").change(function () {
            var dist_id = $(this).val();
            // alert(dist_id);
            $.ajax({
                url: "GetDriverLocation.php",
                method: "POST",
                data: {
                    id: dist_id
                },
                success: function (response) {
                    $("#txt_LocationID").html(response);
                },
                error: function () {
                    $("#txt_LocationID").html("Errror occured while getting location!");
                }
            });
        });
    });
</script>