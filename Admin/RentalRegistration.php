<?php
include_once ('Header.php');
include ("../DbOperation.php");
$obj = new dboperation();
$bid = $_GET['bid'];
$cid = $_GET['cid'];
$sql = "SELECT * FROM tbl_booking tb INNER JOIN tbl_car tc ON tb.Model_ID=tc.Car_Model WHERE tb.Booking_ID=$bid AND tc.Car_ID=$cid";
$res = $obj->executequery($sql);
$display = mysqli_fetch_array($res)
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-10 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mr-1 mb-3"
                    onclick='window.location.href="AutomakersView.php"'>View
                    Data </button>
            </div>

            <div class="col-md-10 grid-margin stretch-card  ">

                <div class="card">

                    <div class="card-body">

                        <h4 class="card-title">Rental Registration</h4>
                        <p class="card-description">
                            Rent a Car
                        </p>
                        <form class="forms-sample" action="RentalRegAction.php" method="post"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Enter Starting KiloMeter</label>
                                <input type="text" class="form-control" name="txt_StartingKM" id="txt_StartingKM"
                                    placeholder="IN KILOMETERS" required>
                            </div>
                            <?php 
                                if($display['Driver_Required']=='Required'){
                            ?>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Driver Name</label>
                                <select class="form-control" name="txt_DriverID" required>
                                    <option value="" selected disabled>---CHOOSE A DRIVER---</option>
                                    <?php
                                    $sql = "SELECT * FROM tbl_driver WHERE Driver_Status='ACTIVE'";
                                    $res = $obj->executequery($sql);
                                    while ($display1 = mysqli_fetch_array($res)) {
                                        ?>
                                        <option value="<?php echo $display1['Driver_ID']; ?>">
                                            <?php echo $display1['Driver_Name']; ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <?php 
                                }
                            ?>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Car Status</label>
                                <input type="text" class="form-control" name="txt_CarStatus" id="txt_CarStatus"
                                    placeholder="Car Status"required>
                            </div>
                            <div class="form-group">
                                <input type="hidden" value="<?php echo $display['Car_ID'] ?>" class="form-control" name="hdn_CarID" id="hdn_CarID">
                            </div>
                            <div class="form-group">
                                <input type="hidden" value="<?php echo $display['Booking_ID'] ?>" class="form-control" name="hdn_BookingID" id="txt_BookingStatus">
                            </div>
                            <button type="submit" name="btn_Rental" id="exampleInputUsername1"
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