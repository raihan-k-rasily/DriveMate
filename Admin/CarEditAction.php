<?php
include_once ("../DbOperation.php");
$obj = new dboperation();

if (isset($_POST["btn_submit"])) {
    $i= $_POST["txt_CarID"];
    $pn = $_POST["txt_PlateNo"];
    $m = $_POST["txt_ModelID"];
    $cv = $_POST["txt_CarVarient"];
    $f = $_POST["txt_FuelType"];
    $cd = $_POST["txt_Description"];
    $cc = $_POST["txt_CarColour"];
    $os = $_POST["txt_Ownership"];
    $a = $_POST["txt_Amount/Day"];
    $r = $_POST["txt_Remark"];
    $s = $_POST["txt_Status"];
    $image = $_FILES["file_CarImage"]["name"];
    if($image=="")
    {
        $image=$_POST["file_CarImageOld"];
    }else{
        move_uploaded_file($_FILES["file_CarImage"]["tmp_name"],"../Uploads/" . $image);
    }
    if($os=='ACQUIRED'){
        $on='DriveMate';
    }else if($os=='BORROWED'){
        $on = $_POST["txt_OwnersName"];
    }else{
            $on = $_POST["txt_OwnersNameOld"];
    }
    $sql = "SELECT * FROM tbl_car WHERE Plate_Number='$pn' AND Car_ID NOT IN ($i)";
    $res = $obj->executequery($sql);

    if (mysqli_num_rows($res) > 0) {
        echo $sql = "SELECT * FROM tbl_Car WHERE Plate_Number='$pn' and Car_ID='$i'";
        $res = $obj->executequery($sql);
        if (mysqli_num_rows($res) > 0) {
            echo "<script>alert('Data Not Changed');window.location='CarView.php';</script>";
        }

        echo "<script>alert('Data Duplication....');window.location='CarView.php';</script>";
    }else{
            echo $sql1 = "UPDATE tbl_Car SET Plate_Number='$pn',Car_Image='$image',Car_Model='$m',Car_Variant='$cv',Car_Description='$cd',Fuel_Type='$f',Car_Colour='$cc', Car_Ownership='$os',Owners_Name='$on',AmountperDay='$a',Car_Remark='$r',Car_Status='$s' where Car_ID='$i'";
            $obj->executequery($sql1);
            echo "<script>alert('Data Updated Successfully....');window.location='CarView.php';</script>";
    }
}else{
    echo "<script>alert('Button Error....');window.location='CarView.php';</script>";
}
?>