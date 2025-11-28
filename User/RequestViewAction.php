<?php
include ("../DbOperation.php");
$obj = new dboperation();
if(isset($_POST['btn_Submit'])) {
    $i = $_POST['hdn_BookingID'];
    $r = $_POST['txt_Remark'];
    $s = "NOT CONFIRMED";
echo $sql1 = "UPDATE tbl_booking SET Status='$s',Description='$r' WHERE Booking_ID='$i'";
$obj->executequery($sql1);
echo "<script>alert('Booking Not Confirmed....');window.location='RequestView.php';</script>";

}
else{
    $s="CONFIRMED";
    $bid = $_POST['hdn_BookingID'];
echo $sql1 = "UPDATE tbl_booking SET Status='$s' WHERE Booking_ID='$bid'";
$obj->executequery($sql1);
$p = $_POST['hdn_BookingID'];
$d = date('y-m-d');
$s = 'INTIAL';
$sql="INSERT INTO tbl_payment(Booking_ID,Date_Payment,Payment,Payment_Status)
VALUES('$bid','$d','$p','$s')";
$res = $obj->executequery($sql);
echo "<script>alert('Booking Confirmed....');window.location='RequestView.php';</script>";
}
?>