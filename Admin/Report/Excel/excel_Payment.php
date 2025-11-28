<?php
include 'excel_controller.php';
$clinic = new DBController();
$productResult = $clinic->runQuery("SELECT Customer_Name,Model_Name,From_Date,To_Date,Driver_Required,Description,Remark,Advance_Amount FROM tbl_booking tb INNER JOIN tbl_model tm ON tb.Model_ID=tm.Model_ID 
                                    INNER JOIN tbl_automakers ta ON tm.Automakers_ID=ta.Automakers_ID 
                                    INNER JOIN tbl_customer tc ON tb.Customer_ID=tc.Customer_ID WHERE Status='COMPLETED'");

  
    $filename = "Export_doctorexcel.xls";
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
