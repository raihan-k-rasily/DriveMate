<?php
include ("../DbOperation.php");
$obj = new dboperation();
if (isset($_POST['btn_District'])) {
    $d = $_POST['txt_DistrictName'];
    $sql = "SELECT * FROM tbl_district WHERE District_Name='$d'";
    $res = $obj->executequery($sql);
    if (mysqli_num_rows($res) > 0) {
        echo "<script>alert('Data already Exist....');window.location='DistrictRegistration.php';</script>";
    } else if($d==''){
        echo "<script>alert('Data is not Added....');window.location='DistrictRegistration.php';</script>";
    }else {
        $sql1 = "INSERT INTO tbl_district(District_Name) VALUES('$d')";
        $obj->executequery($sql1);
        echo "<script>alert('Data Inserted....');window.location='DistrictRegistration.php';</script>";
    }
}
?>