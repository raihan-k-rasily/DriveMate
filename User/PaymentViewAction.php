<?php
include("../DbOperation.php");
$obj = new dboperation();
$pid = $_POST['hdn_PaymentID'];
$d = date('y-m-d');
if (isset($_POST['btn_Feedback_'])) {
    $f = $_POST['txt_Feedback'];
    echo $sql = "INSERT INTO tbl_feedback(Payment_ID,Feedback_Date,Feedback)
    VALUES('$pid','$d','$f')";
    $res = $obj->executequery($sql);
    echo "<script>alert('Feedback Registered Successfully....');window.location='PaymentView.php';</script>";
} else if (isset($_POST['btn_Complaint'])) {
    $c = $_POST['txt_Complaint'];
    echo $sql = "INSERT INTO tbl_complaint(Payment_ID,Complaint_Date,Complaint)
    VALUES('$pid','$d','$c')";
    $res = $obj->executequery($sql);
    echo "<script>alert('Complaint Registered Successfully...');window.location='PaymentView.php';</script>";
}
?>