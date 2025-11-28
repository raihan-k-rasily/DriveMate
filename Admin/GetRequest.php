<?php
include ("../DbOperation.php");
$obj = new dboperation();
$s = 0;

// if(isset($_POST['id']))
// {
$st = $_POST['s'];
?>
<table class="table" id="tbl_Request">
                                <thead>
                                    <tr>
                                        <th>Sl No.</th>
                                        <th>Customer Name</th>
                                        <th>Automakers Image</th>
                                        <th>Model Image</th>
                                        <th>Model Name</th>
                                        <th>From Date</th>
                                        <th>To Date</th>
                                        <th>Driver Status</th>
                                        <th>Description</th>
                                        <th>Remark</th>
                                        <?php 
                                                if ($st!='REJECTED'){
                                        ?>
                                        <th>Advance Amount</th>
                                        <?php 
                                                }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM tbl_booking tb INNER JOIN tbl_model tm ON tb.Model_ID=tm.Model_ID 
                                    INNER JOIN tbl_automakers ta ON tm.Automakers_ID=ta.Automakers_ID 
                                    INNER JOIN tbl_customer tc ON tb.Customer_ID=tc.Customer_ID WHERE Status='$st'";
                                    $res = $obj->executequery($sql);
                                    while ($display = mysqli_fetch_array($res)) {
                                        $d=$display['Description'];
                                        $d=str_replace(".","<br>",$d);
                                        ?>
                                        <tr>
                                            <td><?php echo ++$s; ?></td>
                                            <td><?php echo $display['Customer_Name']; ?></td>
                                            <td><img src="../Uploads/<?php echo $display['Automakers_Image']; ?>"
                                            width="100" height="50"></td>
                                            <td><img src="../Uploads/<?php echo $display['Model_FImage']; ?>"
                                                    width="100" height="50"></td>
                                            <td><?php echo $display['Model_Name']; ?></td>
                                            <td><?php echo $display['From_Date']; ?></td>
                                            <td><?php echo $display['To_Date']; ?></td>
                                            <td><?php echo $display['Driver_Required']; ?></td>
                                            <td><?php echo $d; ?></td>
                                            <td><?php echo $display['Remark']; ?></td>
                                            <?php 
                                                if ($st!='REJECTED'){
                                            ?>
                                            <input type="hidden" name="hdn_BookingID" value="<?php echo $display['Booking_ID']; ?>">
                                            <td><?php echo $display['Advance_Amount']; ?></td>
                                            <?php 
                                                }
                                            ?>
                                            <?php 
                                                if ($st=='CONFIRMED'){
                                            ?>
                                            <td>
                                            <a href="GetCarRental.php?bid=<?php echo $display['Booking_ID'];?>"
                                                onclick="return confirm('Are you sure you wants to rent the <?php echo $display['Model_Name'];?> to <?php echo $display['Customer_Name']; ?>?')">
                                                <input type="button" class="btn btn-primary" value="RENT">
                                            </a>
                                            </td>
                                            <?php 
                                                }
                                            ?>
                                            <?php 
                                                if ($st=='RENTED'){
                                            ?>
                                            <input type="hidden" name="hdn_BookingID" value="<?php echo $display['Booking_ID']; ?>">
                                            <td>
                                            <a href="FinalPayment.php?bid=<?php echo $display['Booking_ID'];?>"
                                                onclick="return confirm('Are you sure you wants to rent the <?php echo $display['Model_Name'];?> to <?php echo $display['Customer_Name']; ?>?')">
                                                <input type="button" class="btn btn-primary" value="PAYMENT">
                                            </a>
                                            </td>
                                            <?php 
                                                }
                                            ?>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                </tbody>
                            </table>
                        
<!-- <?php
// }
?> -->