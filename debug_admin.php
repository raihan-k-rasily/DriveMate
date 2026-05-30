<?php
require_once "Dboperation.php";
$username = "admin";
$db = new dboperation();
$res = $db->executequery("SELECT * FROM tbl_login WHERE Username='$username'");
if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
    echo "Admin record:\n";
    foreach ($row as $col => $val) {
        echo "$col => $val\n";
    }
} else {
    echo "No admin record found for username $username.\n";
}
?>
