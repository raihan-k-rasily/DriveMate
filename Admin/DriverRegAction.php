<?php
include_once ("../DbOperation.php");
$obj = new dboperation();

if (isset($_POST["btn_submit"])) {
    $n = $_POST["txt_DriverName"];
    $d = $_POST["txt_DriverDOB"];
    $ln = $_POST["txt_DriverLicenseNo"];
    $l = $_POST["txt_LocationID"];
    $p = $_POST["txt_Pincode"];
    $e = $_POST["txt_EmailID"];
    $c = $_POST["txt_Contact"];
    $a = $_POST["txt_Amount/Day"];
    $rd = date('y-m-d');
    $r = $_POST["txt_Remark"];
    $s ="ACTIVE";
    $photo = $_FILES["file_DriverPhoto"]["name"];
    move_uploaded_file($_FILES["file_DriverPhoto"]["tmp_name"], "../Uploads/" . $photo);
    $image = $_FILES["file_DriverLicense"]["name"];
    move_uploaded_file($_FILES["file_DriverLicense"]["tmp_name"], "../Uploads/" . $image);

    $sql = "SELECT * FROM tbl_driver WHERE Driver_Name='$n'";
    $res = $obj->executequery($sql);

    if (mysqli_num_rows($res) > 0) {
        echo "<script>alert('Driver's Data already exists');window.location='DriverRegistration.php';</script>";
    }else if($n=='' && $d==''&& $l==''&& $p==''&& $e==''&& $c==''&& $r==''&& $photo==''&& $image==''){
        echo "<script>alert('Drivers Data Not Added....');window.location='DriverRegistration.php';</script>";
    }else {
        echo $s = "INSERT INTO tbl_driver(Driver_Name,Driver_Photo,Driver_DOB,Driver_LicenseNo,Driver_License, Driver_Location, Driver_Pincode,Driver_EmailID,Driver_Contact,DAmountperDay,Date_registration,Driver_Remark,Driver_Status) VALUES('$n','$photo','$d','$ln','$image','$l', '$p','$e', '$c','$a','$rd','$r','$s')";
        $r = $obj->executequery($s);
        echo "<script>alert('Drivers Data Inserted......');window.location='DriverRegistration.php';</script>";
    }
}
?>