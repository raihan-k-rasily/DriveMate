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
                        <h4 class="card-title">Bookings Verified Details</h4>
                        <p class="card-description">
                            Details of the<code>Bookings</code>
                        </p>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Booking Status</label>
                            <select class="form-control" id="txt_Status" name="txt_Status">
                                <option value="0" selected disabled>---CHOOSE A STATUS---</option>
                                <?php
                                    $sql = "SELECT DISTINCT(Status) FROM tbl_booking WHERE Status !='Requested' ";
                                    $res = $obj->executequery($sql);
                                    while ($display1 = mysqli_fetch_array($res)) {
                                        ?>
                                        <option value="<?php echo $display1['Status']; ?>">
                                            <?php echo $display1['Status']; ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                            </select>
                        </div>
                        <div class="table-responsive">
                            <table class="table" id="tbl_Request">
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
        $("#txt_Status").change(function () {
            var status = $(this).val();
            // alert(auto_id);
            $.ajax({
                url: "GetRequest.php",
                method: "POST",
                data: {
                    s: status
                },
                success: function (response) {
                    $("#tbl_Request").html(response);
                },
                error: function () {
                    $("#tbl_Request").html("Errror occured while getting Model!");
                }
            });
        });
    });
</script>
