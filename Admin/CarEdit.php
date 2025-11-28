<?php
include_once ('header.php');
include ("../DbOperation.php");
$obj = new dboperation();
$id = $_GET['id'];
$sql = "SELECT * FROM tbl_car tc 
INNER JOIN tbl_model tm ON tc.Car_Model = tm.Model_ID 
INNER JOIN tbl_automakers ta ON tm.Automakers_ID = ta.Automakers_ID 
where tc.Car_ID='$id'";
$res = $obj->executequery($sql);
$display = mysqli_fetch_array($res);
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
                        <form class="forms-sample" action="CarEditAction.php" method="POST"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Plate Number</label>
                                <input type="text" class="form-control" name="txt_PlateNo" id="exampleInputUsername1"
                                value="<?php echo $display['Plate_Number']; ?>" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Car's Image</label>
                                <div class="col-sm-9">
                                <img src="../Uploads/<?php echo $display['Car_Image']; ?>" width="100"
                                height="50">
                                    <input type="file" name="file_CarImage" class="form-control">
                                        <input type="hidden" name="file_CarImageOld"
                                        value="<?php echo $display['Car_Image']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Automaker Name</label>
                                <select class="form-control" id="txt_AutomakerID" name="txt_AutomakerID">
                                    <option value="<?php echo $display['Automakers_ID']; ?>" selected disabled>---CHOOSE A AUTOMAKER---</option>
                                    <?php
                                    $sql = "select * from tbl_automakers";
                                    $res = $obj->executequery($sql);
                                    while ($display1 = mysqli_fetch_array($res)) {
                                        ?>
                                        <option value="<?php echo $display['Automakers_ID']; ?>" <?php echo ($display['Automakers_ID'] == $display1['Automakers_ID']) ? "selected=selected" : "" ?>>
                                            <?php echo $display1['Automakers_Name']; ?>
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
                                    $sql = "select * from tbl_model";
                                    $res = $obj->executequery($sql);
                                    while ($display1 = mysqli_fetch_array($res)) {
                                        ?>
                                        <option value="<?php echo $display['Model_ID']; ?>" <?php echo ($display['Car_Model'] == $display1['Model_ID']) ? "selected=selected" : "" ?>>
                                            <?php echo $display1['Model_Name']; ?>
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
                                    <option value="PREMIUM-END"<?php echo ($display['Car_Variant'] == "PREMIUM-END") ? "selected=selected" : "" ?>>PREMIUM-END </option>
                                    <option value="HIGH-END"<?php echo ($display['Car_Variant'] == "HIGH-END") ? "selected=selected" : "" ?>>HIGH-END</option>
                                    <option value="MEDIUM-END"<?php echo ($display['Car_Variant'] == "MEDIUM-END") ? "selected=selected" : "" ?>>MEDIUM-END</option>
                                    <option value="LOW-END"<?php echo ($display['Car_Variant'] == "LOW-END") ? "selected=selected" : "" ?>>LOW-END</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Description</label>
                                <input type="text" class="form-control" name="txt_Description"
                                    value="<?php echo $display['Car_Description']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Colour</label>
                                <input type="color" name="txt_CarColour" id="exampleInputUsername1"
                                value="<?php echo $display['Car_Colour']; ?>" placeholder="Pincode">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Fuel Type</label>
                                <select class="form-control" id="txt_FuelType" name="txt_FuelType">
                                    <option value="0" name="txt_FuelType" selected disabled>---CHOOSE A FUEL TYPE---</option>
                                    <option value="Gasoline (Petrol)"<?php echo ($display['Fuel_Type'] == "Gasoline (Petrol)") ? "selected=selected" : "" ?>>Gasoline (Petrol) </option>
                                    <option value="Diesel"<?php echo ($display['Fuel_Type'] == "Diesel") ? "selected=selected" : "" ?>>Diesel</option>
                                    <option value="Electric"<?php echo ($display['Fuel_Type'] == "Electric") ? "selected=selected" : "" ?>>Electric</option>
                                    <option value="Hybrid"<?php echo ($display['Fuel_Type'] == "Hybrid") ? "selected=selected" : "" ?>>Hybrid</option>
                                    <option value="Compressed Natural Gas (CNG)"<?php echo ($display['Fuel_Type'] == "Compressed Natural Gas (CNG)") ? "selected=selected" : "" ?>>Compressed Natural Gas (CNG)</option>
                                    <option value="Liquefied Petroleum Gas (LPG)"<?php echo ($display['Fuel_Type'] == "Liquefied Petroleum Gas (LPG)") ? "selected=selected" : "" ?>>Liquefied Petroleum Gas (LPG)</option>
                                    <option value="Hydrogen"<?php echo ($display['Fuel_Type'] == "Hydrogen") ? "selected=selected" : "" ?>>Hydrogen</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Ownership:</label><br>
                                <input type="radio"  name="txt_Ownership" value="ACQUIRED" <?php echo ($display['Car_Ownership'] == "ACQUIRED") ? "checked=checked" : "" ?>>ACQUIRED<br><br>
                                <input type="radio" name="txt_Ownership" id="txt_Ownership" onclick="ownersname()" value="BORROWED"
                                <?php echo ($display['Car_Ownership'] == "BORROWED") ? "checked=checked" : "" ?>>BORROWED<br> 
                                <input type="hidden" name="txt_OwnersNameOld"
                                    value="<?php echo $display['Owners_Name']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Amount/Day</label>
                                <input type="text" class="form-control" name="txt_Amount/Day" id="exampleInputUsername1"
                                value="<?php echo $display['AmountperDay']; ?>" txt_CarColourplaceholder="Amount/Day">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Remark</label>
                                <input type="text" class="form-control" name="txt_Remark" id="exampleInputUsername1"
                                value="<?php echo $display['Car_Remark']; ?>" placeholder="Remark">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Status :</label><br>
                                <input type="radio" class="form-check-input" name="txt_Status" value="ACTIVE" id="exampleInputUsername1"
                                    placeholder="Status"<?php echo ($display['Car_Status'] == "ACTIVE") ? "checked=checked" : "" ?>>ACTIVE<br>
                                <input type="radio" class="form-check-input" name="txt_Status" value="INACTIVE" id="exampleInputUsername1"
                                    placeholder="Status"<?php echo ($display['Car_Status'] == "INACTIVE") ? "checked=checked" : "" ?>>INACTIVE<br>
                                <input type="radio" class="form-check-input" name="txt_Status" value="ON DRIVE" id="exampleInputUsername1"
                                    placeholder="Status"<?php echo ($display['Car_Status'] == "ON DRIVE") ? "checked=checked" : "" ?>>ON DRIVE<br>
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="txt_CarID"
                                    value="<?php echo $display['Car_ID']; ?>">
                            </div>
                            <button type="submit" name="btn_submit" id="exampleInputUsername1"
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