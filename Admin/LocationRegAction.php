<?php
include ("../DbOperation.php");
$obj = new dboperation();
if (isset($_POST['btn_Location'])) {

    $d = $_POST['txt_DistrictID'];
    $l = $_POST['txt_LocationName'];
    $sql = "SELECT * FROM tbl_location WHERE District_ID='$d' and Location_Name='$l'";
    $res = $obj->executequery($sql);
    if (mysqli_num_rows($res) > 0) {
        echo "<script>alert('Data already Exist....');window.location='LocationRegistration.php';</script>";
    } else if($d=='' && $l==''){
        echo "<script>alert('Data Not Added');window.location='LocationRegistration.php';</script>";
    }else{
        $sql1 = "INSERT INTO tbl_location(District_ID,Location_Name) VALUES('$d','$l')";
        $obj->executequery($sql1);
        echo "<script>alert('Data Inserted....');window.location='LocationRegistration.php';</script>";
    }
}
?>