<?php
include_once ("../DbOperation.php");
$obj = new dboperation();
if (isset($_POST["btn_submit"])) {
    $i = $_POST["txt_AutomakersID"];
    $m = $_POST["txt_ModelName"];
    $fimage = $_FILES["fimage"]["name"];
    move_uploaded_file($_FILES["fimage"]["tmp_name"], "../Uploads/" . $fimage);
    $rimage = $_FILES["rimage"]["name"];
    move_uploaded_file($_FILES["rimage"]["tmp_name"], "../Uploads/" . $rimage);
    $limage = $_FILES["limage"]["name"];
    move_uploaded_file($_FILES["limage"]["tmp_name"], "../Uploads/" . $limage);
    $bimage = $_FILES["bimage"]["name"];
    move_uploaded_file($_FILES["bimage"]["tmp_name"], "../Uploads/" . $bimage);
    $md = $_POST["txt_ModelDescription"];
    $sql = "SELECT * FROM tbl_Model WHERE Model_Name='$m'";
    $res = $obj->executequery($sql);
    if (mysqli_num_rows($res) > 0) {
        echo "<script>alert('Product already exist');window.location='ModelRegistration.php';</script>";
    } else if($i=='' && $m=='' && $fimg=='' && $limg=='' && $rimg=='' && $bimg=='' && $mg==''){
        echo "<script>alert('Enter the Complete Data to Proceed......');window.location='ModelRegistration.php';</script>";
    }else {
        echo $s = "INSERT INTO tbl_Model(Model_Name,Automakers_ID,Model_FImage,Model_RImage,Model_LImage,Model_BImage,Model_Description) VALUES('$m','$i','$fimage','$rimage','$limage','$bimage','$md')";
        $r = $obj->executequery($s);
        // echo "<script>alert('Model Data Inserted......');window.location='ModelRegistration.php';</script>";
        $sql = "SELECT * FROM tbl_Model WHERE Model_Name='$m'";
        $res = $obj->executequery($sql);
        if (mysqli_num_rows($res) == 1) {
            echo "<script>alert('Model Data Inserted......');window.location='ModelRegistration.php';</script>";
        }else{
            echo "<script>alert('Model Data Insertion Invalid......');window.location='ModelRegistration.php';</script>";
        }
    }
}
?>