<?php
include ("../DbOperation.php");
$obj = new dboperation();
if (isset($_POST['btn_Update'])) {
    $i = $_POST['txt_DriverID'];
    $n = $_POST["txt_DriverName"];
    $ln =  $_POST["txt_DriverLicenseNo"];
    $d = $_POST["txt_DistrictID"];
    $l = $_POST["txt_LocationID"];
    $p = $_POST["txt_Pincode"];
    $e = $_POST["txt_EmailID"];
    $c = $_POST["txt_Contact"];
    $a = $_POST["txt_Amount/Day"];
    $r = $_POST["txt_Remark"];
    $s = $_POST["txt_Status"];
    echo $photo = $_FILES["file_DriverPhoto"]["name"];
    echo $image = $_FILES["file_DriverLicense"]["name"];
    if($image=="")
    {
        $image=$_POST["file_DriverLicenseOld"];
    }else{
        move_uploaded_file($_FILES["file_DriverLicense"]["tmp_name"], "../Uploads/" . $image);
    }
    if($photo==""){
        $photo=$_POST["file_DriverPhotoOld"];
    }else{
        move_uploaded_file($_FILES["file_DriverPhoto"]["tmp_name"], "../Uploads/" . $photo);
    }
    echo $sql = "SELECT * FROM tbl_driver WHERE Driver_Name='$n' AND Driver_Photo='$photo' AND Driver_License='$image' AND Driver_LicenseNo='$ln' AND  Driver_Location='$l' AND  Driver_Pincode='$p' AND  Driver_Contact='$c' AND Driver_EmailID='$e' AND DAmountperDay='$a' AND Driver_Remark='$r',Driver_Status='$s'";
    $res = $obj->executequery($sql);
    if (mysqli_num_rows($res) > 0) {
        echo $sql = "SELECT * FROM tbl_driver WHERE Driver_Name='$n' and Driver_ID='$i'";
        $res = $obj->executequery($sql);
        if (mysqli_num_rows($res) > 0) {
            echo "<script>alert('Data Not Changed');window.location='DriverView.php';</script>";
        }

        echo "<script>alert('Data Duplication....');window.location='DriverView.php';</script>";
    }else{
            echo $sql1 = "UPDATE tbl_driver SET Driver_Photo='$photo',Driver_Name='$n',Driver_License='$image',Driver_LicenseNo='$ln',Driver_Location='$l', Driver_Pincode='$p', Driver_Contact='$c',Driver_EmailID='$e',Driver_Remark='$r',Driver_Status='$s' where Driver_ID='$i'";
            $obj->executequery($sql1);
            echo "<script>alert('Data Updated Successfully....');window.location='DriverView.php';</script>";
    }
}else{
    echo "<script>alert('Button Error....');window.location='DriverView.php';</script>";
}
?>