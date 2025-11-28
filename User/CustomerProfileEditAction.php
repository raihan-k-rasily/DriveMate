<?php
include_once ("../DbOperation.php");
$obj = new dboperation();

if (isset($_POST["btn_submit"])) {
    $i = $_POST["txt_CustID"];
    $n = $_POST["txt_CustName"];
    $l = $_POST["txt_LocationID"];
    $e = $_POST["txt_EmailID"];
    $c = $_POST["txt_Contact"];
    // echo $sql = "SELECT * FROM tbl_customer WHERE Customer_EmailID='$e'";
    // $res = $obj->executequery($sql);
    // if (mysqli_num_rows($res) > 0) {
    //     echo "<script>alert('Username Excist...');window.location='CustomerRegistration.php';</script>";
    // }else if($n=='' || $l=='' ||$e=='' || $c=='' || $rd=='' || $u=='' || $p=='' ){
    //     echo "<script>alert('Customer Data Not Added Completely....');window.location='CustomerRegistration.php';</script>";
    // }else 
    {
        echo $s = "UPDATE tbl_customer SET Customer_Name ='$n',Customer_Location='$l',Customer_EmailID='$e',Customer_Contact='$c' WHERE Customer_ID='$i'";
        $r = $obj->executequery($s);
        echo "<script>alert('Customer Data Updated......');window.location='CustomerProfileEdit.php';</script>";
    }
}
?>