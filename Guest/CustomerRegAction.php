<?php
include_once ("../DbOperation.php");
$obj = new dboperation();

if (isset($_POST["btn_submit"])) {
    $n = $_POST["txt_CustName"];
    $l = $_POST["txt_LocationID"];
    $e = $_POST["txt_EmailID"];
    $c = $_POST["txt_Contact"];
    $rd = date('y-m-d');
    $u = $_POST["txt_Username"];
    $p = $_POST["txt_Password"];
    echo $sql = "SELECT * FROM tbl_customer WHERE Customer_Username='$u'";
    $res = $obj->executequery($sql);
    if (mysqli_num_rows($res) > 0) {
        echo "<script>alert('Username Excist...');window.location='CustomerRegistration.php';</script>";
    }else if($n=='' || $l=='' ||$e=='' || $c=='' || $rd=='' || $u=='' || $p=='' ){
        echo "<script>alert('Customer Data Not Added....');window.location='CustomerRegistration.php';</script>";
    }else {
        echo $s = "INSERT INTO tbl_customer(Customer_Name,Customer_Location,Customer_EmailID,Customer_Contact,Date_Registration,Customer_Username,Customer_Password) VALUES('$n','$l','$e','$c','$rd','$u','$p')";
        $r = $obj->executequery($s);
        echo "<script>alert('Customer Data Inserted......');window.location='CustomerRegistration.php';</script>";
    }
}
?>