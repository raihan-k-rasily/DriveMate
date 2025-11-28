<?php
session_start();
$username = $_POST["txtusername"];
$password = $_POST["txtpassword"];
require_once ("../Dboperation.php");
$obj = new dboperation();
$sqlquery = "select * from tbl_login where Username='$username' and Password='$password'";
$result = $obj->executequery($sqlquery);
if (mysqli_num_rows($result) == 1) {
   $row = mysqli_fetch_array($result);
   $_SESSION["Customer_Username"] = $username;
   $_SESSION["Admin_ID"] = $row["Login_ID"];
   header("location:..\Admin\index.php");
} else if (mysqli_num_rows($result) == 0) {
   $sqlquery = "select * from tbl_customer where Customer_Username='$username' and Customer_Password='$password'";
   $result = $obj->executequery($sqlquery);
   if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $_SESSION["Customer_Username"] = $username;
      $_SESSION["Customer_ID"] = $row["Customer_ID"];
      header("location:..\User\Index.php");
   } else {
      echo "<script>alert('Invalid Username/Password!!'); window.location='Login.php'</script>";
   }
}
?>