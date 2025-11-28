<?php
include ("../DbOperation.php");
$obj = new dboperation();
if (isset($_POST['btn_Update'])) 
{
    $n = $_POST['txt_AutomakersName'];
    $e = $_POST['txt_AutomakersEstablished'];
    $c = $_POST['txt_AutomakersCountry'];
    $i = $_POST['txt_AutomakersID'];
    $img = $_FILES["File_AutomakersImage"]["name"];
    if($img=="")
    {
        $img=$_POST['imgold'];
    }
    else{
        move_uploaded_file($_FILES["File_AutomakersImage"]["tmp_name"], "../Uploads/" . $img);
    }
    echo $sql = "SELECT * FROM tbl_automakers WHERE Automakers_Name='$n' and Automakers_ID not in($i) ";
    $res = $obj->executequery($sql);
    if (mysqli_num_rows($res) > 0) {
         echo "<script>alert('Data Duplication....SO it CANNOT UPDATE');window.location='AutomakersView.php';</script>";
    }
    else
    {
        $sql = "SELECT * FROM tbl_automakers WHERE  Automakers_Image='$img' and Automakers_ID not in($i) " ;
         $res = $obj->executequery($sql);
        if (mysqli_num_rows($res) > 0) {
         echo "<script>alert('Data Duplication....SO it CANNOT UPDATE');window.location='AutomakersView.php';</script>";
        }
        else 
        {
            $sql = "SELECT * FROM tbl_automakers WHERE   Automakers_Name='$n' AND Automakers_Image='$img' and Automakers_ID not in($i) " ;
            $res = $obj->executequery($sql);
           if (mysqli_num_rows($res) > 0) {
            echo "<script>alert('Data Duplication....SO it CANNOT UPDATE');window.location='AutomakersView.php';</script>";
           }
           else{  
            echo $sql3 = "SELECT * FROM tbl_automakers WHERE Automakers_Name='$n' AND Automakers_Image='$img' AND Automakers_Established='$e' AND Automakers_Country='$c' AND Automakers_ID='$i'";
            $res3 = $obj->executequery($sql3);
            if (mysqli_num_rows($res3) > 0) {
                    echo "<script>alert('Data Not Changed');window.location='AutomakersView.php';</script>";
                }else{
                echo $sql1 = "UPDATE tbl_automakers SET Automakers_Name='$n',Automakers_Image='$img',Automakers_Established='$e',Automakers_Country='$c' where Automakers_ID='$i'";
                $obj->executequery($sql1);
                echo "<script>alert('Data Updated Successfully....');window.location='AutomakersView.php';</script>";
                }    

            }
        }
    }
}else {
    echo "<script>alert('Button Error....');window.location='AutomakersView.php';</script>";
}
?>
<?php
//     if (mysqli_num_rows($res) > 0) {
//         echo $sql2 = "SELECT * FROM tbl_automakers WHERE Automakers_Name='$n' AND Automakers_ID='$i'";
//         $res2 = $obj->executequery($sql2);
//         if (mysqli_num_rows($res2) > 0) {
//             echo "<script>alert('Data Not Changed');window.location='AutomakersView.php';</script>";
//         }
//         echo "<script>alert('Data Duplication....');window.location='AutomakersView.php';</script>";
//     } else if ($img == '') {
//         echo $sql3 = "SELECT * FROM tbl_automakers WHERE Automakers_Name='$n' AND Automakers_Established='$e' AND Automakers_Country='$c'";
//         $res3 = $obj->executequery($sql3);
//         if (mysqli_num_rows($res3) > 0) {
//             echo $sql2 = "SELECT * FROM tbl_automakers WHERE Automakers_Name='$n' AND Automakers_ID='$i'";
//             $res2 = $obj->executequery($sql2);
//             if (mysqli_num_rows($res2) > 0 && $img == '') {
//                 echo "<script>alert('Data Not Changed');window.location='AutomakersView.php';</script>";
//             }
//             echo "<script>alert('Data Duplication....');window.location='AutomakersView.php';</script>";
//         }else{
//                 echo $sql1 = "UPDATE tbl_automakers SET Automakers_Name='$n',Automakers_Established='$e',Automakers_Country='$c' where Automakers_ID='$i'";
//                 $obj->executequery($sql1);
//                 echo "<script>alert('Data Updated Successfully....');window.location='AutomakersView.php';</script>";
//             }
//  } else {
//         move_uploaded_file($_FILES["File_AutomakersImage"]["tmp_name"], "../Uploads/" . $img);
//         echo $sql1 = "UPDATE tbl_automakers SET Automakers_Name='$n',Automakers_Image='$img',,Automakers_Established='$e',Automakers_Country='$c' where Automakers_ID='$i'";
//         $obj->executequery($sql1);
//         echo "<script>alert('Data Updated Successfully....');window.location='AutomakersView.php';</script>";
//     }
// }
?>