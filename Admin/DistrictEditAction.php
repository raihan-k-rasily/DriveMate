<?php
include ("../DbOperation.php");
$obj = new dboperation();
if (isset($_POST['btn_District'])) {
    $n = $_POST['txt_DistrictName'];
    $i = $_POST['txt_DistrictID'];
    $sql = "SELECT * FROM tbl_district WHERE District_Name='$n'";
    $res = $obj->executequery($sql);
    if (mysqli_num_rows($res) > 0) {
        $sql = "SELECT * FROM tbl_district WHERE District_Name='$n' and District_ID='$i'";
        $res = $obj->executequery($sql);
        if (mysqli_num_rows($res) > 0) {
            echo "<script>alert('Data Not Changed');window.location='DistrictView.php';</script>";
        }

        echo "<script>alert('Data Duplication....');window.location='DistrictView.php';</script>";
    } else {
        echo $sql1 = "UPDATE tbl_district SET District_Name='$n' where District_ID='$i'";
        $obj->executequery($sql1);
        echo "<script>alert('Data Updated Successfully....');window.location='DistrictView.php';</script>";
    }
}
?>