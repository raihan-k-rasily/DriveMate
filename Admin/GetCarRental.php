<?php
include("../DbOperation.php");
$obj = new dboperation();
$s = 0;
include_once('Header.php');
// if(isset($_POST['id']))
// {
$bid = $_GET['bid'];
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
                        <h4 class="card-title">Car Details</h4>
                        <p class="card-description">
                            View of the<code>Car</code>
                        </p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sl No.</th>
                                        <th>Plate No.</th>
                                        <th>Car's Image</th>
                                        <th>Car's Variant</th>
                                        <th>Description</th>
                                        <th>Colour</th>
                                        <th>Fuel Type</th>
                                        <th>Ownership</th>
                                        <th>Owner's Name</th>
                                        <th>Amount/Day</th>
                                        <th>Remark</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM tbl_Booking tb INNER JOIN 
                                    tbl_Car tc ON tb.Model_ID=tc.Car_Model INNER JOIN
                                    tbl_model tm ON tb.Model_ID=tm.Model_ID INNER JOIN
                                    tbl_customer tcu ON tb.Customer_ID=tcu.Customer_ID
                                    where tb.Booking_ID='$bid' and tc.Car_Status = 'ACTIVE'";
                                    $res = $obj->executequery($sql);
                                    while ($display = mysqli_fetch_array($res)) {
                                        ?>
                                        <tr>
                                            <td><?php echo ++$s; ?></td>
                                            <td><?php echo $display['Plate_Number']; ?></td>
                                            <td><img src="../Uploads/<?php echo $display['Car_Image']; ?>" width="40"
                                                    height="40"></td>
                                            <td><?php echo $display['Car_Variant']; ?></td>
                                            <td><?php echo $display['Car_Description']; ?></td>
                                            <td>
                                                <input type="text"
                                                    style="background-color :<?php echo $display['Car_Colour']; ?>;width:40px;height:40px"
                                                    readonly>
                                            </td>
                                            <td><?php echo $display['Fuel_Type']; ?></td>
                                            <td><?php echo $display['Car_Ownership']; ?></td>
                                            <td><?php echo $display['Owners_Name']; ?></td>
                                            <td><?php echo $display['AmountperDay']; ?></td>
                                            <td><?php echo $display['Car_Remark']; ?></td>
                                            <td><?php echo $display['Car_Status']; ?></td>
                                            <td><a href="RentalRegistration.php?bid=<?php echo $display['Booking_ID']; ?> & cid=<?php echo $display['Car_ID']; ?>"
                                                    onclick="return confirm('Are you sure you wants to rent the <?php echo $display['Plate_Number'];?> <?php echo $display['Model_Name'];?> to <?php echo $display['Customer_Name'];?> ?')">
                                                    <input type="button" class="btn btn-primary" value="Rent"></a></td>
                                        </tr>
                                        <?php
                                    }

                                    ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    // }
    include_once('Footer.php');
    ?>