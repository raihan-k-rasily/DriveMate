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
                    onclick='window.location.href="CarView.php"'>View
                    Data </button>
            </div>

            <div class="col-md-10 grid-margin stretch-card  ">

                <div class="card">

                    <div class="card-body">

                        <h4 class="card-title">Car Registration</h4>
                        <p class="card-description">
                            Add a Car
                        </p>
                        <form class="forms-sample" action="CarRegAction.php" method="POST"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Plate Number</label>
                                <input type="text" class="form-control" name="txt_PlateNo" id="exampleInputUsername1"
                                    placeholder="Plate Number">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Car's Image</label>
                                <div class="col-sm-9">
                                    <input type="file" name="file_CarImage" class="form-control"
                                        placeholder="Description">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Automaker Name</label>
                                <select class="form-control" id="txt_AutomakerID" name="txt_AutomakerID">
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
                                    <?php
                                    $sql = "select * from tbl_car";
                                    $res = $obj->executequery($sql);
                                    while ($display = mysqli_fetch_array($res)) {
                                        ?>
                                        <option value="<?php echo $display['Car_ID']; ?>">
                                            <?php echo $display['Car_Name']; ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Car's Variant</label>
                                <select class="form-control" id="txt_CarVarient" name="txt_CarVarient">
                                    <option value="0" name="txt_CarVarient" selected disabled>---CHOOSE A VARIANT---</option>
                                    <option value="PREMIUM-END">PREMIUM-END </option>
                                    <option value="HIGH-END">HIGH-END</option>
                                    <option value="MEDIUM-END">MEDIUM-END</option>
                                    <option value="LOW-END">LOW-END</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Description</label>
                                <input type="text" class="form-control" name="txt_Description" id="exampleInputUsername1"
                                    placeholder="Description">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Colour</label>
                                <input type="color" name="txt_CarColour" id="exampleInputUsername1"
                                    placeholder="Pincode">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Fuel Type</label>
                                <select class="form-control" id="txt_FuelType" name="txt_FuelType">
                                    <option value="0" name="txt_FuelType" selected disabled>---CHOOSE A FUEL TYPE---</option>
                                    <option value="Gasoline (Petrol)">Gasoline (Petrol) </option>
                                    <option value="Diesel">Diesel</option>
                                    <option value="Electric">Electric</option>
                                    <option value="Hybrid">Hybrid</option>
                                    <option value="Compressed Natural Gas (CNG)">Compressed Natural Gas (CNG)</option>
                                    <option value="Liquefied Petroleum Gas (LPG)">Liquefied Petroleum Gas (LPG)</option>
                                    <option value="Hydrogen">Hydrogen</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Ownership:</label><br>
                                <input type="radio"  name="txt_Ownership" value="ACQUIRED">ACQUIRED<br><br>
                                <input type="radio" name="txt_Ownership" id="txt_Ownership" onclick="ownersname()" value="BORROWED">BORROWED<br> 
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="txt_OwnersName" id="txt_OwnersName">
                            </div>        
                            <div class="form-group">
                                <label for="exampleInputUsername1">Amount/Day</label>
                                <input type="text" class="form-control" name="txt_Amount/Day" id="txt_Amount/Day"
                                    placeholder="Amount/Day">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Remark</label>
                                <input type="text" class="form-control" name="txt_Remark" id="txt_Remark"
                                    placeholder="Remark">
                            </div>
                            <button type="submit" name="btn_submit" id="btn_submit"
                                class="btn btn-primary mr-2">Submit</button>
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
        $("#txt_AutomakerID").change(function () {
            var dist_id = $(this).val();
            // alert(dist_id);
            $.ajax({
                url: "GetCarModel.php",
                method: "POST",
                data: {
                    id: dist_id
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
<script>
            function ownersname() {
  var o = prompt("Enter Owner's Name : ", "Owner's Name");
  document.getElementById("txt_OwnersName").value = o;
}

        </script>