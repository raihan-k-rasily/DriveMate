<?php
include ("../DbOperation.php");
$obj = new dboperation();
if (isset($_POST['btn_Rental'])) {
    $ekm = 0;
    $skm = $_POST['txt_StartingKM'];
    $did = $_POST['txt_DriverID'];
    $s = $_POST['txt_CarStatus'];
    $cid = $_POST['hdn_CarID'];
    $bid = $_POST['hdn_BookingID'];
    if($did ==''){
        $did = 0;
        $sql1 = "INSERT INTO tbl_rental(Booking_ID,Car_ID,Driver_ID,Starting_KM,Ending_KM,Car_Status) 
        VALUES('$bid','$cid','$did','$skm','$ekm','$s')";
        $obj->executequery($sql1);
        $sql2 = "UPDATE tbl_car SET Car_Status='ON DRIVE' WHERE Car_ID=$cid";
        $obj->executequery($sql2);
        $sql3 = "UPDATE tbl_booking SET Status='RENTED' WHERE Booking_ID=$bid";
        $obj->executequery($sql3);
        echo "<script>alert('Data Inserted....');window.location='RequestView.php';</script>";
    }else{
        $sql1 = "INSERT INTO tbl_rental(Booking_ID,Car_ID,Driver_ID,Starting_KM,Ending_KM,Car_Status) 
        VALUES('$bid','$cid','$did','$skm','$ekm','$s')";
        $obj->executequery($sql1);
        $sql2 = "UPDATE tbl_car SET Car_Status='ON DRIVE' WHERE Car_ID=$cid";
        $obj->executequery($sql2);
        $sql3 = "UPDATE tbl_booking SET Status='RENTED' WHERE Booking_ID=$bid";
        $obj->executequery($sql3);
        $sql4 = "UPDATE tbl_driver SET Driver_Status='ON DRIVE' WHERE Driver_ID=$did";
        $obj->executequery($sql4);
        echo "<script>alert('Data Inserted....');window.location='RequestView.php';</script>";
    }
}
?>
