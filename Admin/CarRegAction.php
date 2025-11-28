<?php
include_once ("../DbOperation.php");
$obj = new dboperation();

if (isset($_POST["btn_submit"])) {
    $pn = $_POST["txt_PlateNo"];
    $m = $_POST["txt_ModelID"];
    $cv = $_POST["txt_CarVarient"];
    $f = $_POST["txt_FuelType"];
    $cd = $_POST["txt_Description"];
    $cc = $_POST["txt_CarColour"];
    $os = $_POST["txt_Ownership"];
    $a = $_POST["txt_Amount/Day"];
    $r = $_POST["txt_Remark"];
    $s = "ACTIVE";
    $image = $_FILES["file_CarImage"]["name"];
    move_uploaded_file($_FILES["file_CarImage"]["tmp_name"], "../Uploads/" . $image);
    if($os=='ACQUIRED'){
        $on='DriveMate';
    }else{
        $on = $_POST["txt_OwnersName"];
    }
    $sql = "SELECT * FROM tbl_car WHERE Plate_Number='$pn'";
    $res = $obj->executequery($sql);

    if (mysqli_num_rows($res) > 0) {
        echo "<script>alert('Car's Data already exists');window.location='CarRegistration.php';</script>";
    }
    // else if($n=='' && $d==''&& $l==''&& $p==''&& $e==''&& $c==''&& $r==''&& $photo==''&& $image==''){
    //     echo "<script>alert('Cars Data Not Added....');window.location='CarRegistration.php';</script>";
    // }
    else {
        echo $s = "INSERT INTO tbl_Car(Plate_Number,Car_Image,Car_Model,Car_Variant,Car_Description,Fuel_Type, Car_Colour, Car_Ownership,Owners_Name,AmountperDay,Car_Remark,Car_Status) VALUES('$pn','$image','$m','$cv','$cd','$f','$cc', '$os','$on', '$a','$r','$s')";
        $r = $obj->executequery($s);
        echo "<script>alert('Cars Data Inserted......');window.location='CarRegistration.php';</script>";
    }
}
?>