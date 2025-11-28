<?php
session_start();
include 'excel_controller.php';
$db_handle = new DBController();
$fromdate=$_SESSION['fromdate'];
$todate=$_SESSION['todate'];
$productResult = $db_handle->runQuery("SELECT Customer_Name,Model_Name,Driver_Required,From_Date,To_Date FROM tbl_booking b inner join tbl_customer c on b.Customer_ID=c.Customer_ID inner join tbl_model m on b.Model_ID=m.Model_ID where
b.Booking_Date >='$fromdate' and b.Booking_Date <='$todate' group by m.Model_Name ");
  
    $filename = "Booking_excel.xls";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");
    $isPrintHeader = false;
    if (! empty($productResult)) {
        foreach ($productResult as $row) {
            if (! $isPrintHeader) {
                echo implode("\t", array_keys($row)) . "\n";
                $isPrintHeader = true;
            }
            echo implode("\t", array_values($row)) . "\n";
        }
    }
    exit();

?>
