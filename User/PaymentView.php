<?php
include('Header.php');
include('../Dboperation.php');
$obj = new dboperation;
$id = $_SESSION["Customer_ID"];
$s = 0;
?>
<div
    style="background-image: url('img/tblbg1'); background-position: center center; background-size: cover; padding: 20px;">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="container d-flex justify-content-center mt-50 mb-50" style="max-width: 1700px;">
        <div class="card w-100">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">User data with hover row</h5>
                <div class="header-elements">
                    <div class="list-icons text-muted font-weight-light"> <a class="list-icons-item"
                            data-action="collapse" data-abc="true"><i class="fa fa-minus font-weight-light"></i></a> <a
                            class="list-icons-item" data-action="reload" data-abc="true"><i
                                class="fa fa-refresh"></i></a> <a class="list-icons-item" data-action="remove"
                            data-abc="true"><i class="fa fa-close"></i></a> </div>
                </div>
            </div>
            <div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th>Automakers Image</th>
                            <th>Car Image</th>
                            <th>Model Name</th>
                            <th>Driver Required</th>
                            <th>Payment Date</th>
                            <th>Amount Paid</th>
                            <th>Feedback</th>
                            <th>Complaint</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT tb.Booking_ID,tb.Driver_Required,tp.Date_Payment, MAX(tp.Payment_ID) AS Payment_ID, tm.*, tr.*, tc.*, ta.*
                        FROM tbl_booking tb
                        INNER JOIN tbl_payment tp ON tb.Booking_ID = tp.Booking_ID
                        INNER JOIN tbl_model tm ON tb.Model_ID = tm.Model_ID
                        INNER JOIN tbl_rental tr ON tb.Booking_ID = tr.Booking_ID
                        INNER JOIN tbl_car tc ON tr.Car_ID = tc.Car_ID
                        INNER JOIN tbl_automakers ta ON tm.Automakers_ID = ta.Automakers_ID
                        WHERE tb.Customer_ID = '$id' AND tb.Status = 'COMPLETED'
                        GROUP BY tb.Booking_ID";
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
                            $sql3 = "SELECT * FROM tbl_booking tb INNER JOIN tbl_payment tp ON tb.Booking_ID=tp.Booking_ID
                                    INNER JOIN tbl_complaint tc ON tc.Payment_ID=tp.Payment_ID  
                                    WHERE tb.Booking_ID='$bid'";
                            $res3 = $obj->executequery($sql3);
                            $display3 = mysqli_fetch_array($res3);
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
                                <td><?php echo $display['Booking_ID']; ?></td>
                                <td><img src="../Uploads/<?php echo $display['Automakers_Image']; ?>" width="100"
                                        height="50"></td>
                                <td><img src="../Uploads/<?php echo $display['Car_Image']; ?>" width="100" height="50"></td>
                                <td><?php echo $display['Model_Name']; ?></td>
                                <td><?php echo $trdn ?>
                                </td>
                                <td><?php echo $display['Date_Payment']; ?></td>
                                <td><?php echo $display1['Total']; ?></td>

                                <td>
                                    <?php if (mysqli_num_rows($res2) > 0) { ?>
                                        <?php echo $display2['Feedback']; ?>
                                    <?php } else { ?>
                                        <button id="btn_Feedback_<?php echo $bid; ?>"
                                            class="btn btn-primary open-button">Feedback</button>
                                        <form action="PaymentViewAction.php" method="POST">
                                            <div class="popup" popup-name="popup-1_<?php echo $bid; ?>">
                                                <input type="hidden" name="hdn_PaymentID"
                                                    value="<?php echo $display['Payment_ID']; ?>">
                                                <div class="popup-content">
                                                    <label>Enter your Feedback</label>
                                                    <input type="text" name="txt_Feedback" placeholder="Enter your Feedback"
                                                        required>
                                                    <button type="submit" name="btn_Feedback_"
                                                        class="open-button">Submit</button>
                                                    <a class="close-button" popup-close="popup-1_<?php echo $bid; ?>"
                                                        href="javascript:void(0)">x</a>
                                                </div>
                                            </div>
                                        </form>
                                    <?php } ?>
                                </td>

                                <td>
                                    <?php
                                    if (mysqli_num_rows($res3) > 0) {
                                        // Complaint already submitted
                                        echo $display3['Complaint'];
                                    } else { ?>
                                        <button id="btn_Complaint_<?php echo $bid; ?>"
                                            class="btn btn-danger open-button">Complaint</button>
                                        <form action="PaymentViewAction.php" method="POST">
                                            <div class="popup" popup-name="popup-2_<?php echo $bid; ?>">
                                                <input type="hidden" name="hdn_PaymentID"
                                                    value="<?php echo $display['Payment_ID']; ?>">
                                                <div class="popup-content">
                                                    <label>Enter your Complaint</label>
                                                    <input type="text" name="txt_Complaint" placeholder="Enter your Complaint"
                                                        required>
                                                    <button type="submit" name="btn_Complaint"
                                                        class="open-button">Submit</button>
                                                    <a class="close-button" popup-close="popup-2_<?php echo $bid; ?>"
                                                        href="javascript:void(0)">x</a>
                                                </div>
                                            </div>
                                        </form>
                                    <?php } ?>
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
<style>
    body {
        margin: 0;
        font - family: Roboto, -apple - system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans - serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        font - size: .8125rem;
        font - weight: 400;
        line - height: 1.5385;
        color: #333;
        text - align: left;
        background - color: #eee;
    }

    .mt - 50 {

        margin - top: 50px;
    }

    .mb - 50 {

        margin - bottom: 50px;
    }


    a {
        text - decoration: none !important;
    }


    .card {
        position: relative;
        display: -ms - flexbox;
        display: flex;
        -ms - flex - direction: column;
        flex - direction: column;
        min - width: 0;
        word - wrap: break-word;
        background - color: #fff;
        background - clip: border - box;
        border: 1px solid rgba(0, 0, 0, .125);
        border - radius: .1875rem;
    }


    .card - header: not([class*=bg -]): not([class*=alpha -]) {
        background - color: transparent;
        padding - top: 1.25rem;
        padding - bottom: 1.25rem;
        border - bottom - width: 0;
    }

    .card - body {
        -ms - flex: 1 1 auto;
        flex: 1 1 auto;
        padding: 1.25rem;
    }



    .header - elements - inline {
        display: -ms - flexbox;
        display: flex;
        -ms - flex - align: center;
        align - items: center;
        -ms - flex - pack: justify;
        justify - content: space - between;
        -ms - flex - wrap: nowrap;
        flex - wrap: nowrap;
    }
</style>

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
        background: rgba(0, 0, 0, 0.75);
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
        box-shadow: 0px 2px 6px rgba(0, 0, 0, 1);
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
        background: rgba(0, 0, 0, 0.8);
        font-size: 20px;
        text-align: center;
        color: #fff;
        text-decoration: none;
    }

    .close-button:hover {
        background: rgba(0, 0, 0, 1);
    }

    @media screen and (max-width: 720px) {
        .popup-content {
            width: 90%;
        }
    }
</style>


<script src="../jquery-3.6.0.min.js"></script>
<script>
    $(function () {
        // Open Feedback Popup
        $(document).on('click', '[id^=btn_Feedback_]', function () {
            var bid = $(this).attr('id').split('_')[2]; // Get the Booking ID
            $('[popup-name="popup-1_' + bid + '"]').fadeIn(300);
        });

        // Open Complaint Popup
        $(document).on('click', '[id^=btn_Complaint_]', function () {
            var bid = $(this).attr('id').split('_')[2]; // Get the Booking ID
            $('[popup-name="popup-2_' + bid + '"]').fadeIn(300);
        });

        // Close Popup
        $(document).on('click', '[popup-close]', function () {
            var popup_name = $(this).attr('popup-close');
            $('[popup-name="' + popup_name + '"]').fadeOut(1000);
        });
    });
</script>

<?php
include('Footer.php');
?>