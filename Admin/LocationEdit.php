<?php
include_once ('header.php');
include ("../DbOperation.php");
$obj = new dboperation();
$id = $_GET['id'];
$sql = "SELECT * FROM tbl_location tl INNER JOIN tbl_district td on tl.District_ID=td.District_ID WHERE Location_ID='$id'";
$res = $obj->executequery($sql);
$display1 = mysqli_fetch_array($res);
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-10 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mr-1 mb-3"
                    onclick='window.location.href="LocationView.php"'>View
                    Data </button>
            </div>
            <div class="col-md-10 grid-margin stretch-card  ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Location Registration</h4>
                        <p class="card-description">
                            Add new Location
                        </p>
                        <form class="forms-sample" action="LocationEditAction.php" method="POST">
                            <div class="form-group">
                                <label for="exampleInputUsername1">District Name</label>
                                <select class="form-control" name="txt_DistrictID">
                                    <option value="<?php echo $display1['District_ID']; ?>" selected disabled>---CHOOSE
                                        A OPTION---</option>
                                    <?php
                                    $sql = "select * from tbl_district";
                                    $res = $obj->executequery($sql);
                                    while ($display = mysqli_fetch_array($res)) {
                                        ?>
                                        <option value="<?php echo $display['District_ID']; ?>" <?php echo ($display['District_ID'] == $display1['District_ID']) ? "selected=selected" : "" ?>>
                                            <?php echo $display['District_Name']; ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Location Name</label>
                                <input type="text" class="form-control" name="txt_LocationName"
                                    id="exampleInputUsername1" value="<?php echo $display1['Location_Name']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="txt_LocationID"
                                    value="<?php echo $display1['Location_ID']; ?>" id="exampleInputUsername1">
                            </div>
                            <button type="submit" name="btn_Location" class="btn btn-primary mr-2">Update</button>
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