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
                        <h4 class="card-title">Automakers Details</h4>
                        <p class="card-description">
                            Details of the<code>Bookings</code>
                        </p>
                        <div class="table-responsive">
                            <table class="table">
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM tbl_booking tb INNER JOIN tbl_model tm ON tb.Model_ID=tm.Model_ID 
                                    INNER JOIN tbl_automakers ta ON tm.Automakers_ID=ta.Automakers_ID 
                                    INNER JOIN tbl_customer tc ON tb.Customer_ID=tc.Customer_ID WHERE Status='Requested'";
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
                                            <td>
                                                <button class="btn btn-primary btn-Accept" data-booking-id="<?php echo $display['Booking_ID']; ?>">Accept</button>
                                                <form action="RequestModelAction.php" method="POST">
                                                    <input type="hidden" name="hdn_BookingID" value="<?php echo $display['Booking_ID']; ?>">
                                                    <div class="popup" popup-name="popup-accept-<?php echo $display['Booking_ID']; ?>" style="display: none;">
                                                        <div class="popup-content">
                                                            <label>Remark</label>
                                                            <input type="text" name="txt_Remark" id="txt_Remark_Accept_<?php echo $display['Booking_ID']; ?>">
                                                            <label>Advance Amount</label>
                                                            <input type="text" name="txt_AdvanceAmount" id="txt_AdvanceAmount_Accept_<?php echo $display['Booking_ID']; ?>">
                                                            <button type="submit" name="btn_SubmitAccept" class="open-button">Submit</button>
                                                            <a class="close-button" popup-close="popup-accept-<?php echo $display['Booking_ID']; ?>" href="javascript:void(0)">x</a>
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger btn-Reject" data-booking-id="<?php echo $display['Booking_ID']; ?>">Reject</button>
                                                <form action="RequestModelAction.php" method="POST">
                                                    <input type="hidden" name="hdn_BookingID" value="<?php echo $display['Booking_ID']; ?>">
                                                    <div class="popup" popup-name="popup-reject-<?php echo $display['Booking_ID']; ?>" style="display: none;">
                                                        <div class="popup-content">
                                                            <label>Remark</label>
                                                            <input type="text" name="txt_Remark" id="txt_Remark_Reject_<?php echo $display['Booking_ID']; ?>">
                                                            <button type="submit" name="btn_SubmitReject" class="open-button">Submit</button>
                                                            <a class="close-button" popup-close="popup-reject-<?php echo $display['Booking_ID']; ?>" href="javascript:void(0)">x</a>
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>

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
include_once ('footer.php');
?>
<style>
body {
    font-family: Arial, Helvetica, sans-serif;
}

p {
    font-size: 16px;
    line-height: 26px;
    letter-spacing: 0.5px;
    color: #484848;
}

/* Popup Open button */    
.open-button {
    color: #FFF;
    background: #0066CC;
    padding: 10px;
    text-decoration: none;
    border: 1px solid #0157ad;
    border-radius: 3px;
}

.open-button:hover {
    background: #01478e;
}

.popup {
    position: fixed;
    top: 0px;
    left: 0px;
    background: rgba(0,0,0,0.75);
    width: 100%;
    height: 100%;
    display: none;
}

/* Popup inner div */
.popup-content {
    width: 700px;
    margin: 0 auto;
    box-sizing: border-box;
    padding: 40px;
    margin-top: 100px;
    box-shadow: 0px 2px 6px rgba(0,0,0,1);
    border-radius: 3px;
    background: #fff;
    position: relative;
}

/* Popup close button */
.close-button {
    width: 25px;
    height: 25px;
    position: absolute;
    top: -10px;
    right: -10px;
    border-radius: 20px;
    background: rgba(0,0,0,0.8);
    font-size: 20px;
    text-align: center;
    color: #fff;
    text-decoration: none;
}

.close-button:hover {
    background: rgba(0,0,0,1);
}

@media screen and (max-width: 720px) {
    .popup-content {
        width: 90%;
    }    
}
</style>



<script src="jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Open Popup
    $('.btn-Accept').on('click', function() {
        var bookingId = $(this).data('booking-id');
        $('[popup-name="popup-accept-' + bookingId + '"]').fadeIn(300);
    });

    $('.btn-Reject').on('click', function() {
        var bookingId = $(this).data('booking-id');
        $('[popup-name="popup-reject-' + bookingId + '"]').fadeIn(300);
    });

    // Close Popup
    $('[popup-close]').on('click', function() {
        var popupName = $(this).attr('popup-close');
        $('[popup-name="' + popupName + '"]').fadeOut(300);
    });
});

</script>