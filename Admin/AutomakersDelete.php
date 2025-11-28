<?php
include ("../Dboperation.php");
$obj = new dboperation();
$id = $_GET['id'];
$sql = "DELETE FROM tbl_automakers WHERE Automakers_ID='$id'";
echo $sql;
$res = $obj->executequery($sql);
if ($res == 1) {
    echo "<script>alert('DELETED SUCESSFULLY....');window.location='AutomakersView.php';</script>";
} else {
    echo "<script>alert('DELETION NOT POSSIBLE....');</script>";
}
?>