<?php
include("../DbOperation.php");
$obj = new dboperation();
if (isset($_POST['btn_Pay'])) {
    $s = "CONFIRMED";
    $bid = $_POST['hdn_BookingID'];
    echo $sql1 = "UPDATE tbl_booking SET Status='$s' WHERE Booking_ID='$bid'";
    $obj->executequery($sql1);
    $p = $_POST['hdn_AdvanceAmount'];
    $d = date('y-m-d');
    $s = 'INTIAL';
    echo $sql = "INSERT INTO tbl_payment(Booking_ID,Date_Payment,Payment,Payment_Status)
            VALUES('$bid','$d','$p','$s')";
    $res = $obj->executequery($sql);
    echo "<script>alert('Booking Confirmed....');window.location='RequestView.php';</script>";
}
?>