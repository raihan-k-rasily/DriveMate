<?php
include("../DbOperation.php");
$obj = new dboperation();
$i = $_POST['hdn_BookingID'];
$r = $_POST['txt_Remark'];
$sql = "SELECT * FROM tbl_booking tb INNER JOIN tbl_model tm ON tb.Model_ID=tm.Model_ID 
        INNER JOIN tbl_automakers ta ON tm.Automakers_ID=ta.Automakers_ID
        INNER JOIN tbl_customer tc ON tb.Customer_ID=tc.Customer_ID WHERE Booking_ID='$i'";
$res = $obj->executequery($sql);
$display = mysqli_fetch_array($res);
$cname = $display['Customer_Name'];
$email = $display['Customer_EmailID'];
$mname = $display['Model_Name'];
 $aname = $display['Automakers_Name'];
if (isset($_POST['btn_SubmitAccept'])) {
    $a = $_POST['txt_AdvanceAmount'];
    $s = "ACCEPTED";
    echo $sql1 = "UPDATE tbl_booking SET Advance_Amount=$a,Status='$s',Remark='$r' WHERE Booking_ID='$i'";
    $obj->executequery($sql1);
    $bodyContent = "Dear $cname, Your request for the model $mname of the Automaker $aname is ACCEPTED and the advance amount is $a. You can access more information on the website";
    $mailtoaddress = $email;
    require('phpmailer.php');
    echo "<script>alert('Data Accepted Successfully....');window.location='RequestModelView.php';</script>";

} else {
    $s = "REJECTED";
    echo $sql1 = "UPDATE tbl_booking SET Status='$s',Remark='$r' WHERE Booking_ID='$i'";
    $obj->executequery($sql1);
    $bodyContent = "Dear $cname, Your request for the model $mname of the Automaker $aname is REJECTED. You can access more information on the website";
    $mailtoaddress = $email;
    require('phpmailer.php');
    echo "<script>alert('Data Rejected Successfully....');window.location='RequestModelView.php';</script>";

}
?>