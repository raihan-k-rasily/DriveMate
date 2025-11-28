<?php
session_start();
$ci = $_SESSION["Customer_ID"];
include_once ("../DbOperation.php");
$obj = new dboperation();

if (isset($_POST["btn_submit"])) {
    $mi = $_POST["txt_Model_ID"];
    $fd = $_POST["txt_FromDate"];
    $td = $_POST["txt_ToDate"];
    $dr = $_POST["rdo_Driver"];
    $d = $_POST["txt_Description"];
    $bd = date('y-m-d');
    $am = 0;
    $s = "Requested";
    $r = "Not Added";
    // echo $sql = "SELECT * FROM tbl_booking WHERE Booking_ID='$bi'";
    // $res = $obj->executequery($sql);
    // if (mysqli_num_rows($res) > 0) {
    //     echo "<script>alert('Username Excist...');window.location='Model.php';</script>";
    // }else 
    if($fd=='' || $td=='' ||$dr=='' || $d==''){
        echo "<script>alert('DATA NOT ADDED COMPLETLY....');window.location='Model.php';</script>";
    }else {
        echo $s = "INSERT INTO tbl_booking(Customer_ID,Model_ID,Booking_Date,From_Date,To_Date,Driver_Required,Description,Advance_Amount,Status,Remark) VALUES('$ci','$mi','$bd','$fd','$td','$dr','$d','$am','$s','$r')";
        $r = $obj->executequery($s);
        echo "<script>alert('Booking Request Successful...');window.location='Model.php';</script>";
    }
}
?>