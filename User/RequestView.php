<?php
// session_start();
include('Header.php');
include('../Dboperation.php');
$obj = new dboperation;
$id = $_SESSION["Customer_ID"];
$s = 0;
?>
<div style="background-image: url('img/tblbg1'); background-position: center center; background-size: cover; padding: 20px;">
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
            <div >
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th>Automakers Image</th>
                            <th>Model Image</th>
                            <th>Model Name</th>
                            <th>From Date</th>
                            <th>To Date</th>
                            <th>Driver Status</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Advance Amount</th>
                            <th>Admin Remark</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM tbl_booking tb INNER JOIN tbl_model tm ON tb.Model_ID=tm.Model_ID 
                                    INNER JOIN tbl_automakers ta ON tm.Automakers_ID=ta.Automakers_ID 
                                    WHERE tb.Customer_ID='$id' AND (Status='ACCEPTED' OR Status='REJECTED')";
                        $res = $obj->executequery($sql);
                        while ($display = mysqli_fetch_array($res)) {
                            $d = $display['Description'];
                            $d = str_replace(".", "<br>", $d);
                            ?>
                            <tr>
                                <td><?php echo ++$s; ?></td>
                                <td><img src="../Uploads/<?php echo $display['Automakers_Image']; ?>" width="100"
                                        height="50"></td>
                                <td><img src="../Uploads/<?php echo $display['Model_FImage']; ?>" width="100" height="50">
                                </td>
                                <td><?php echo $display['Model_Name']; ?></td>
                                <td><?php echo $display['From_Date']; ?></td>
                                <td><?php echo $display['To_Date']; ?></td>
                                <td><?php echo $display['Driver_Required']; ?></td>
                                <td><?php echo $d;?></td>
                                <td><?php echo $display['Status']; ?></td>
                                <?php 
                                    if($display['Status']=='ACCEPTED'){
                                ?>
                                <td><?php echo $display['Advance_Amount']; ?></td>
                                <td><?php echo $display['Remark']; ?></td>
                                <FORM action="AdvancePayment.php" method="POST">
                                    <input type="hidden" name="hdn_BookingID" value="<?php echo $display['Booking_ID']; ?>">
                                    <td>
                                        <button type="submit" name="btn_Confirm" href="" class="btn btn-primary">Confirm</button>
                                    </td>
                                </FORM>
                                <td>
                                    <button id="btn_NotConfirm" name="btn_NotConfirm" class="btn btn-danger">Not Confirm</button>
                                    <form action="RequestViewAction.php" method="POST">
                                        <div class="popup" popup-name="popup-1">
                                        <input type="hidden" name="hdn_BookingID" value="<?php echo $display['Booking_ID']; ?>">
                                            <div class="popup-content">
                                                <label>Enter your reason</label>
                                                <input type="text" name="txt_Remark" id="txt_Remark" placeholder="Enter the reason">
                                                <button id="btn_Submit" name="btn_Submit" class="open-button">Submit</button>
                                                <a class="close-button" popup-close="popup-1"
                                                    href="javascript:void(0)">x</a>
                                            </div>
                                        </div>
                                    </form>
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
        // Open Popup
        $('#btn_NotConfirm').on('click', function () {
            var popup_name = $(this).attr('id').toLowerCase();
            $('[popup-name="popup-1"]').fadeIn(300);
        });

        // Close Popup
        $('[popup-close]').on('click', function () {
            var popup_name = $(this).attr('popup-close');
            $('[popup-name="' + popup_name + '"]').fadeOut(1000);
        });
    });
</script>
<?php
include('Footer.php');
?>