<?php
include_once('header.php');
include("../DbOperation.php");
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
                        <h4 class="card-title">Automakers Details</h4>
                        <p class="card-description">
                            View of the<code>Automakers</code>
                        </p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sl No.</th>
                                        <th>Customer Name</th>
                                        <th>Automakers Image</th>
                                        <th>Car Image</th>
                                        <th>Model Name</th>
                                        <th>Driver Name</th>
                                        <th>Complaint Date</th>
                                        <th>Amount Paid</th>
                                        <th>Complaint</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM tbl_booking tb INNER JOIN tbl_payment tp ON tb.Booking_ID=tp.Booking_ID
                                    INNER JOIN tbl_model tm ON tb.Model_ID=tm.Model_ID 
                                    INNER JOIN tbl_rental tr ON tb.Booking_ID=tr.Booking_ID
                                    INNER JOIN tbl_car tc ON tr.Car_ID=tc.Car_ID
                                    INNER JOIN tbl_driver td ON td.Driver_ID=tr.Driver_ID
                                    INNER JOIN tbl_automakers ta ON tm.Automakers_ID=ta.Automakers_ID 
                                    INNER JOIN tbl_complaint tcom ON tcom.Payment_ID=tp.Payment_ID
                                    INNER JOIN tbl_customer tcus ON tcus.Customer_ID=tb.Customer_ID
                                    WHERE tb.Status='COMPLETED'";
                                    $res = $obj->executequery($sql);
                                    while ($display = mysqli_fetch_array($res)) {
                                        $bid = $display['Booking_ID'];
                                        $sql1 = "SELECT SUM(Payment) as Total FROM tbl_payment 
                                        WHERE Booking_ID='$bid'";
                                        $res1 = $obj->executequery($sql1);
                                        $display1 = mysqli_fetch_array($res1);
                                        $sql2 = "SELECT * FROM tbl_booking tb INNER JOIN tbl_payment tp ON tb.Booking_ID=tp.Booking_ID INNER JOIN tbl_feedback tf ON tf.Payment_ID=tp.Payment_ID  
                                    WHERE tb.Booking_ID='$bid'";
                                        $res2 = $obj->executequery($sql2);
                                        $display2 = mysqli_fetch_array($res2);
                                        $trd = $display['Driver_ID'];
                                        if ($trd == 0) {
                                            $trdn = 'Not Wanted';
                                        } else {
            
                                            $sql4 = "SELECT * FROM tbl_rental tr INNER JOIN tbl_driver td ON tr.Driver_ID=td.Driver_ID  
                                        WHERE td.Driver_ID='$trd' ";
                                            $res4 = $obj->executequery($sql4);
                                            $display4 = mysqli_fetch_array($res4);
                                            $trdn=$display4['Driver_Name'];
                                        }
                                        ?>
                                        <tr>
                                            <td><?php echo ++$s?></td>
                                            <td><?php echo $display['Customer_Name']; ?></td>
                                            <td><img src="../Uploads/<?php echo $display['Automakers_Image']; ?>"
                                                    width="100" height="50"></td>
                                            <td><img src="../Uploads/<?php echo $display['Car_Image']; ?>" width="100"
                                                    height="50">
                                            </td>
                                            <td><?php echo $display['Model_Name']; ?></td>
                                                <td><?php echo $trdn ?></td>
                                            <td><?php echo $display['Complaint_Date']; ?></td>
                                            <td><?php echo $display1['Total']; ?></td>
                                            <td><?php echo $display['Complaint']; ?></td>
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
    include_once('footer.php');
    ?>