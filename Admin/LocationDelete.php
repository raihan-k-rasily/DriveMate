<?php
include ("../Dboperation.php");
$obj = new dboperation();
$id = $_GET['id'];
$sql = "DELETE FROM tbl_Location WHERE Location_ID='$id'";
echo $sql;
$res = $obj->executequery($sql);
if ($res == 1) {
    echo "<script>alert('DELETED SUCESSFULLY....');window.location='LocationView.php';</script>";
} else {
    echo "<script>alert('DELETION NOT POSSIBLE....');</script>";
}
?>