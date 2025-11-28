<?php
include_once ('Header.php');
include ("../Dboperation.php");
$obj = new dboperation();
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-10 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mr-1 mb-3"
                    onclick='window.location.href="CarRegistration.php"'>Add Data </button>
            </div>
            <div class="col-md-12 grid-margin stretch-card  ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Car View</h4>
                        <p class="card-description">
                            View of the<code>Cars</code>
                        </p>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Automakers Name</label>
                            <select class="form-control" id="txt_AutomakersID" name="txt_AutomakersID">
                                <option value="0" selected disabled>---CHOOSE A AUTOMAKER---</option>
                                <?php
                                $sql = "select * from tbl_automakers";
                                $res = $obj->executequery($sql);
                                while ($display = mysqli_fetch_array($res)) {
                                    ?>
                                    <option value="<?php echo $display['Automakers_ID']; ?>">
                                        <?php echo $display['Automakers_Name']; ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Model Name</label>
                            <select class="form-control" id="txt_ModelID" name="txt_ModelID">
                                <option value="0" selected disabled>---CHOOSE A MODEL---</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Status</label>
                            <select class="form-control" id="txt_Status" name="txt_Status">
                                <option value="0" selected disabled>---CHOOSE STATUS---</option>
                                <option value="ACTIVE" >ACTIVE</option>
                                <option value="INACTIVE">INACTIVE</option>
                                <option value="ON DRIVE">ON DRIVE</option>
                            </select>
                        </div>
                        <div class="table-responsive">
                            <table class="table" id="Car">
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
<script src="../jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // alert('hi');
        $("#txt_AutomakersID").change(function () {
            var auto_id = $(this).val();
            // alert(auto_id);
            $.ajax({
                url: "GetCarModel.php",
                method: "POST",
                data: {
                    id: auto_id
                },
                success: function (response) {
                    $("#txt_ModelID").html(response);
                },
                error: function () {
                    $("#txt_ModelID").html("Errror occured while getting Model!");
                }
            });
        });
    });
</script>
<script src="../jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // alert('hi');
        $("#txt_Status").change(function () {
            var Model_id = $(txt_ModelID).val();
            var Car_Status = $(this).val();
            // alert(Model_id);
            $.ajax({
                url: "GetCar.php",
                method: "POST",
                data: {
                    id: Model_id,
                    Status: Car_Status
                },
                success: function (response) {
                    $("#Car").html(response);
                },
                error: function () {
                    $("#car").html("Errror occured while getting Model!");
                }
            });
        });
    });
</script>