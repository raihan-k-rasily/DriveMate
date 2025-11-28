<?php
include("Header.php");
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>>Clinic_Management</title>
</head>

<body>
    <form action="./Report/Excel/excel_Payment.php" method="post">
        <div class="logo">
            <a href="./index.php">
                <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <img src="img/logo.png" alt="">&nbsp; &nbsp;</a>
        </div>
        <div class="container" style="width:114%;margin-left:3%;margin-bottom: 5%;">
            <div class="row">
                <div class="col-md-12"
                    style="box-shadow: 2px 2px 10px #1b93e1; border-radius:15px; top: 106px;   margin-bottom: 59px; width:1000px">
                    <div class="row" style="margin-left: -173%;margin-top: 2%;margin-bottom: -5%;">
                        <input type="submit" name="addnew" value="Export" class="btn btn-primary"
                            style="margin-left:63%">
                    </div>
                    <h2 style="text-align: center;margin-top: 6%;font-family: fantasy;">PAYMENT REPORT</h2>
                    <div class="form-horizontal" style="margin-left:0px;">
                        <table class="table table-hover"
                            style="border: 2px solid #adaaaa; box-shadow: 3px 3px 11px #777777; margin-bottom:7%">

                            <tr>
                                <th>Sl No.</th>
                                <th>Customer Name</th>
                                <th>Total Amount</th>
                            </tr>

                            <?php
                            $pd = date('Y-m-d');
                            include("../DbOperation.php");
                            $obj = new dboperation();
                            $s = 0;
                            $t=0;
                                $sql = "SELECT DISTINCT(tc.Customer_ID) FROM tbl_payment tp 
                                                INNER JOIN tbl_booking tb ON tb.Booking_ID=tp.Booking_ID 
                                                INNER JOIN tbl_customer tc ON tc.Customer_ID=tb.Customer_ID 
                                                WHERE tp.Date_Payment='$pd'";
                                $res = $obj->executequery($sql);
                                while ($display = mysqli_fetch_array($res)) {
                                    $cid=$display['Customer_ID']; 
                                    $sql1 = "SELECT SUM(Payment) as Total,tc.Customer_Name FROM tbl_payment tp 
                                                    INNER JOIN tbl_booking tb ON tb.Booking_ID=tp.Booking_ID 
                                                    INNER JOIN tbl_customer tc ON tc.Customer_ID=tb.Customer_ID 
                                                    WHERE tp.Date_Payment='$pd' AND tc.Customer_ID='$cid'";
                                $res1 = $obj->executequery($sql1);
                                while ($display1 = mysqli_fetch_array($res1)) {
                                    $st = $display1['Total']; 
                                    $t = $t+ $st;
                                ?>
                                <tr>
                                    <td><?php echo ++$s; ?></td>
                                    <td><?php echo $display1['Customer_Name']; ?></td>
                                    <td><?php echo $display1['Total']; ?></td>
                                </tr>
                                <?php
                                }
                            }
                            ?>
                            <tr>
                            <td>Today's Total Payment</td>
                            <td><?php echo $t ?></td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
            <div> </div>
        </div>
        </div>
    </form>
</body>

</html>
<?php
include("footer.php");
?>