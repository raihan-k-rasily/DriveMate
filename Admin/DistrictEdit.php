<?php
include_once ('header.php');
include_once ('../Dboperation.php');
$obj = new dboperation();
$id = $_GET['id'];
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-10 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mr-1 mb-3"
                    onclick='window.location.href="DistrictView.php"'>View
                    Data </button>
            </div>
            <div class="col-md-10 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">District Editing</h4>
                        <p class="card-description">
                            Editing of District List
                        </p>
                        <form class="forms-sample" action="DistrictEditAction.php" method="POST">
                            <?php
                            $sql = "SELECT * FROM tbl_district where District_ID='$id'";
                            $res = $obj->executequery($sql);
                            while ($display = mysqli_fetch_array($res)) {
                                ?>
                                <div class="form-group">
                                    <label for="exampleInputDistrict">Enter the New District Name</label>
                                    <input type="text" class="form-control" name="txt_DistrictName"
                                        value="<?php echo $display['District_Name']; ?>" id="exampleInputUsername1"
                                        placeholder="District Name">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="txt_DistrictID"
                                        value="<?php echo $display['District_ID']; ?>" id="exampleInputUsername1">
                                </div>
                                <?php
                            }
                            ?>
                            <button type="submit" name="btn_District" class="btn btn-primary mr-2">Update</button>
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