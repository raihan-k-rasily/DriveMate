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
                    onclick='window.location.href="ModelRegistration.php"'>Add Data </button>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Model View</h4>
                        <p class="card-description">
                            View of the<code>Model</code>
                        </p>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Automakers Name</label>
                            <select class="form-control" id="txt_AutomakersID" name="txt_AutomakersID">
                                <option value="0" selected disabled>..CHOOSE A AUTOMAKER....</option>
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
                        <div class="table-responsive">
                            <table class="table" id="Model">
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
                url: "GetModel.php",
                method: "POST",
                data: {
                    id: auto_id
                },
                success: function (response) {
                    $("#Model").html(response);
                },
                error: function () {
                    $("#Model").html("Errror occured while getting Model!");
                }
            });
        });
    });
</script>