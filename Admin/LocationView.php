<?php
include_once ('Header.php');
include ("../Dboperation.php");
$obj = new dboperation();
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-10 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mr-1 mb-3"
                    onclick='window.location.href="LocationRegistration.php"'>Add
                    Data </button>
            </div>
            <div class="col-md-12 grid-margin stretch-card  ">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Location View</h4>
                        <p class="card-description">
                            View of the<code>Location</code>
                        </p>
                        <div class="form-group">
                            <label for="exampleInputUsername1">District Name</label>
                            <select class="form-control" id="txt_DistrictID" name="txt_DistrictID">
                                <option value="0" selected disabled>---CHOOSE A DISTRICT---</option>
                                <?php
                                $sql = "select * from tbl_district";
                                $res = $obj->executequery($sql);
                                while ($display = mysqli_fetch_array($res)) {
                                    ?>
                                    <option value="<?php echo $display['District_ID']; ?>">
                                        <?php echo $display['District_Name']; ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="table-responsive">
                            <table class="table" id="location">
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
<script src="../jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // alert('hi');
        $("#txt_DistrictID").change(function () {
            var dist_id = $(this).val();
            // alert(dist_id);
            $.ajax({
                url: "GetLocation.php",
                method: "POST",
                data: {
                    id: dist_id
                },
                success: function (response) {
                    $("#location").html(response);
                },
                error: function () {
                    $("#location").html("Errror occured while getting location!");
                }
            });
        });
    });
</script>