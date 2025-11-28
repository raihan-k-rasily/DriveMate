<?php
include ("../DbOperation.php");
$obj = new dboperation();
if (isset($_POST['btn_Location'])) {
    $n = $_POST['txt_LocationName'];
    $i = $_POST['txt_LocationID'];
    $id = $_POST['txt_DistrictID'];
    $sql = "SELECT * FROM tbl_Location WHERE Location_Name='$n' and District_ID='$id'";
    $res = $obj->executequery($sql);
    if (mysqli_num_rows($res) > 0) {
        $sql = "SELECT * FROM tbl_location WHERE Location_Name='$n' and Location_ID='$i'";
        $res = $obj->executequery($sql);
        if (mysqli_num_rows($res) > 0) {
            echo "<script>alert('Data Not Changed');window.location='LocationView.php';</script>";
        }

        echo "<script>alert('Data Duplication....');window.location='LocationView.php';</script>";
    } else {
        echo $sql1 = "UPDATE tbl_location SET Location_Name='$n',District_ID='$id' where Location_ID='$i'";
        $obj->executequery($sql1);
        echo "<script>alert('Data Updated Successfully....');window.location='LocationView.php';</script>";
    }
}
?>