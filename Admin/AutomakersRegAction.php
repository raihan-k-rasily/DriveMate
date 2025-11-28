<?php
include_once ("../DbOperation.php");
$obj = new dboperation();
if (isset($_POST["btn_submit"])) {
    $a = $_POST["AutomakersName"];
    $e = $_POST["Automakersestablished"];
    $c = $_POST["AutomakersCountry"];
    $image = $_FILES["image"]["name"];
    $sql = "SELECT * FROM tbl_automakers WHERE Automakers_Name='$a'";
    echo "$sql";
    $res = $obj->executequery($sql);
    if (mysqli_num_rows($res) > 0) {
        echo "<script>alert('Product already exist');window.location='AutomakersRegistration.php';</script>";
    }else {
        move_uploaded_file($_FILES["image"]["tmp_name"], "../Uploads/" . $image);
        echo $s = "INSERT INTO tbl_automakers(Automakers_Name,Automakers_Established,Automakers_Country,Automakers_Image) VALUES('$a','$e','$c','$image')";
        $r = $obj->executequery($s);
        echo "<script>alert('Automaker Data Inserted......');window.location='AutomakersRegistration.php';</script>";
    }
}
?>