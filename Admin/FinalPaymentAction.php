<?php
include("../DbOperation.php");
$obj = new dboperation();
if (isset($_POST['btn_Pay'])) {
    $did=$_POST['hdn_DriverID'];
    $bid = $_POST['hdn_BookingID'];
    $cid = $_POST['hdn_CarID'];
    $p = $_POST['hdn_FinalAmount'];
    $d = date('y-m-d');
    $s = 'FINAL';
    echo $sql = "INSERT INTO tbl_payment(Booking_ID,Date_Payment,Payment,Payment_Status)
            VALUES('$bid','$d','$p','$s')";
    $res = $obj->executequery($sql);
    if($did ==''){
        $obj->executequery($sql1);
        $sql2 = "UPDATE tbl_car SET Car_Status='ACTIVE' WHERE Car_ID=$cid";
        $obj->executequery($sql2);
        $sql3 = "UPDATE tbl_booking SET Status='COMPLETED' WHERE Booking_ID=$bid";
        $obj->executequery($sql3);
    }else{
        $sql2 = "UPDATE tbl_car SET Car_Status='ACTIVE' WHERE Car_ID=$cid";
        $obj->executequery($sql2);
        $sql3 = "UPDATE tbl_booking SET Status='COMPLETED' WHERE Booking_ID=$bid";
        $obj->executequery($sql3);
        $sql4 = "UPDATE tbl_driver SET Driver_Status='ACTIVE' WHERE Driver_ID=$did";
        $obj->executequery($sql4);
    }
    echo "<script>alert('Booking Confirmed....');window.location='RequestView.php';</script>";
}
?>
