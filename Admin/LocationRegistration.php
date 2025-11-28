<?php
include_once ('header.php');
include ("../DbOperation.php");
$obj = new dboperation();
?>
<html>
    <head>
    <script>
       function capitalizeFirstLetter(input) {
    const words = input.value.split(' ');
    for (let i = 0; i < words.length; i++) {
        if (words[i]) {
            words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1).toLowerCase();
        }
    }
    input.value = words.join(' ');
} 

    </script>
    </head>
</html>
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
                        <form class="forms-sample" action="LocationRegAction.php" method="POST">
                            <div class="form-group">
                                <label for="exampleInputUsername1">District Name</label>
                                <select class="form-control" name="txt_DistrictID" required>
                                    <option value="" selected disabled>---CHOOSE A DISTRICT---</option>
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
                            <div class="form-group">
                                <label for="exampleInputEmail1">Location Name</label>
                                <input type="text" class="form-control" name="txt_LocationName"
                                    id="exampleInputUsername1" placeholder="Location Name"  pattern="^([A-Z][a-zA-Z]*(?: [A-Z][a-zA-Z]*)*)?$"  oninput="capitalizeFirstLetter(this)" required title="Must enter the location name">
                            </div>
                            <button type="submit" name="btn_Location" class="btn btn-primary mr-2">Submit</button>
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