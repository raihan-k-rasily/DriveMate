<?php
include("../DbOperation.php");
$obj= new dboperation();
if(isset($_POST['btn_Update'])){
    $ia=$_POST['txt_AutomakersID'];
    $n=$_POST['txt_ModelName'];
    $i=$_POST['txt_ModelID'];
    $md = $_POST["txt_ModelDescription"];
    $fimg=$_FILES["File_ModelFImage"]["name"];
    $rimg=$_FILES["File_ModelRImage"]["name"];
    $limg=$_FILES["File_ModelLImage"]["name"];
    $bimg=$_FILES["File_ModelBImage"]["name"];
    $sql="SELECT * FROM tbl_Model WHERE Model_Name='$n' AND Automakers_ID='$ia' AND Model_FImage='$fimg' AND Model_RImage='$rimg' AND Model_LImage='$limg' AND Model_BImage='$bimg' AND Model_Description='$md'";
    $res=$obj->executequery($sql);
    if(mysqli_num_rows($res) >0){
        $sql="SELECT * FROM tbl_Model WHERE Model_Name='$n' and Model_ID='$i'";
        $res=$obj->executequery($sql);
        if(mysqli_num_rows($res)>0){
            echo"<script>alert('Data Not Changed');window.location='ModelView.php';</script>";
        }
        echo"<script>alert('Data Duplication....');window.location='AutomakersView.php';</script>";
    }
    else if($fimg==''){
        if($rimg==''){
            if($limg==''){
                if($bimg==''){
                    $sql="SELECT * FROM tbl_Model WHERE Model_Name='$n' AND Model_Description='$md' AND Automakers_ID='$ia'";
                    $res=$obj->executequery($sql);
                    if(mysqli_num_rows($res) >0){
                        $sql="SELECT * FROM tbl_Model WHERE Model_Name='$n' AND Model_ID='$i'";
                        $res=$obj->executequery($sql);
                        if(mysqli_num_rows($res)>0){
                            echo"<script>alert('Data Not Changed');window.location='ModelView.php';</script>";                        
                        }
                    }else{     
                            $sql1="UPDATE tbl_Model SET Model_Name='$n',Model_Description='$md',Automakers_ID='$ia' where Model_ID='$i'";
                            $obj->executequery($sql1);
                            echo"<script>alert('Data Updated Successfully....');window.location='ModelView.php';</script>";
                    }
                    
            }else{
                    move_uploaded_file($_FILES["File_ModelBImage"]["tmp_name"], "../Uploads/" .$bimg);
                    $sql1="UPDATE tbl_Model SET Model_Name='$n',Model_Description='$md',Automakers_ID='$ia',Model_BImage='$bimg' where Model_ID='$i'";
                    $obj->executequery($sql1);
                    echo"<script>alert('Data Updated Successfully....');window.location='ModelView.php';</script>";
                }
            }else{
                if($bimg==''){
                    move_uploaded_file($_FILES["File_ModelLImage"]["tmp_name"], "../Uploads/" .$limg);
                    $sql1="UPDATE tbl_Model SET Model_Name='$n',Model_Description='$md',Automakers_ID='$ia',Model_LImage='$limg' where Model_ID='$i'";
                    $obj->executequery($sql1);
                    echo"<script>alert('Data Updated Successfully....');window.location='ModelView.php';</script>";
                }
                else{
                    move_uploaded_file($_FILES["File_ModelLImage"]["tmp_name"], "../Uploads/" .$limg);
                    move_uploaded_file($_FILES["File_ModelBImage"]["tmp_name"], "../Uploads/" .$bimg);
                    $sql1="UPDATE tbl_Model SET Model_Name='$n',Model_Description='$md',Automakers_ID='$ia',,Model_LImage='$limg',Model_BImage='$bimg' where Model_ID='$i'";
                    $obj->executequery($sql1);
                    echo"<script>alert('Data Updated Successfully....');window.location='ModelView.php';</script>";
                }   
            }
        }else{
            if($limg==''){
                if($bimg==''){
                    move_uploaded_file($_FILES["File_ModelRImage"]["tmp_name"], "../Uploads/" .$rimg);
                    $sql1="UPDATE tbl_Model SET Model_Name='$n',Model_Description='$md',Automakers_ID='$ia',Model_RImage='$rimg' where Model_ID='$i'";
                    $obj->executequery($sql1);
                    echo"<script>alert('Data Updated Successfully....');window.location='ModelView.php';</script>";
                }
                else{
                    move_uploaded_file($_FILES["File_ModelRImage"]["tmp_name"], "../Uploads/" .$rimg);
                    move_uploaded_file($_FILES["File_ModelBImage"]["tmp_name"], "../Uploads/" .$bimg);
                    $sql1="UPDATE tbl_Model SET Model_Name='$n',Model_Description='$md',Automakers_ID='$ia',Model_RImage='$rimg',Model_BImage='$bimg' where Model_ID='$i'";
                    $obj->executequery($sql1);
                    echo"<script>alert('Data Updated Successfully....');window.location='ModelView.php';</script>";
                }
            }else{
                if($bimg==''){
                    move_uploaded_file($_FILES["File_ModelRImage"]["tmp_name"], "../Uploads/" .$rimg);
                    move_uploaded_file($_FILES["File_ModelLImage"]["tmp_name"], "../Uploads/" .$limg);
                    $sql1="UPDATE tbl_Model SET Model_Name='$n',Model_Description='$md',Automakers_ID='$ia',Model_RImage='$rimg',Model_LImage='$limg' where Model_ID='$i'";
                    $obj->executequery($sql1);
                    echo"<script>alert('Data Updated Successfully....');window.location='ModelView.php';</script>";
                }
                else{
                    move_uploaded_file($_FILES["File_ModelRImage"]["tmp_name"], "../Uploads/" .$rimg);
                    move_uploaded_file($_FILES["File_ModelLImage"]["tmp_name"], "../Uploads/" .$limg);
                    move_uploaded_file($_FILES["File_ModelBImage"]["tmp_name"], "../Uploads/" .$bimg);
                    $sql1="UPDATE tbl_Model SET Model_Name='$n',Model_Description='$md',Automakers_ID='$ia',Model_RImage='$rimg',Model_LImage='$limg',Model_BImage='$bimg' where Model_ID='$i'";
                    $obj->executequery($sql1);
                    echo"<script>alert('Data Updated Successfully....');window.location='ModelView.php';</script>";
                }   
            }
        }
    }
    else if($fimg!=''){
        if($rimg==''){
            if($limg==''){
                if($bimg==''){
                    move_uploaded_file($_FILES["File_ModelFImage"]["tmp_name"], "../Uploads/" .$fimg);
                    $sql1="UPDATE tbl_Model SET Model_Name='$n',Model_Description='$md',Automakers_ID='$ia',Model_FImage='$fimg' where Model_ID='$i'";
                    $obj->executequery($sql1);
                    echo"<script>alert('Data Updated Successfully....');window.location='ModelView.php';</script>";
                }
                else{
                    move_uploaded_file($_FILES["File_ModelFImage"]["tmp_name"], "../Uploads/" .$fimg);
                    move_uploaded_file($_FILES["File_ModelBImage"]["tmp_name"], "../Uploads/" .$bimg);
                    $sql1="UPDATE tbl_Model SET Model_Name='$n',Model_Description='$md',Automakers_ID='$ia',Model_FImage='$fimg',Model_BImage='$bimg' where Model_ID='$i'";
                    $obj->executequery($sql1);
                    echo"<script>alert('Data Updated Successfully....');window.location='ModelView.php';</script>";
                }
            }else{
                if($bimg==''){
                    move_uploaded_file($_FILES["File_ModelFImage"]["tmp_name"], "../Uploads/" .$fimg);
                    move_uploaded_file($_FILES["File_ModelLImage"]["tmp_name"], "../Uploads/" .$limg);
                    $sql1="UPDATE tbl_Model SET Model_Name='$n',Model_Description='$md',Automakers_ID='$ia',Model_FImage='$fimg',Model_LImage='$limg' where Model_ID='$i'";
                    $obj->executequery($sql1);
                    echo"<script>alert('Data Updated Successfully....');window.location='ModelView.php';</script>";
                }
                else{
                    move_uploaded_file($_FILES["File_ModelFImage"]["tmp_name"], "../Uploads/" .$fmg);
                    move_uploaded_file($_FILES["File_ModelLImage"]["tmp_name"], "../Uploads/" .$limg);
                    move_uploaded_file($_FILES["File_ModelBImage"]["tmp_name"], "../Uploads/" .$bimg);
                    $sql1="UPDATE tbl_Model SET Model_Name='$n',Model_Description='$md',Automakers_ID='$ia',Model_FImage='$fimg',,Model_LImage='$limg',Model_BImage='$bimg' where Model_ID='$i'";
                    $obj->executequery($sql1);
                    echo"<script>alert('Data Updated Successfully....');window.location='ModelView.php';</script>";
                }   
            }
        }else{
            if($limg==''){
                if($bimg==''){
                    move_uploaded_file($_FILES["File_ModelFImage"]["tmp_name"], "../Uploads/" .$fimg);
                    move_uploaded_file($_FILES["File_ModelRImage"]["tmp_name"], "../Uploads/" .$rimg);
                    $sql1="UPDATE tbl_Model SET Model_Name='$n',Model_Description='$md',Automakers_ID='$ia',Model_FImage='$fimg',Model_RImage='$rimg' where Model_ID='$i'";
                    $obj->executequery($sql1);
                    echo"<script>alert('Data Updated Successfully....');window.location='ModelView.php';</script>";
                }
                else{
                    move_uploaded_file($_FILES["File_ModelFImage"]["tmp_name"], "../Uploads/" .$fimg);
                    move_uploaded_file($_FILES["File_ModelRImage"]["tmp_name"], "../Uploads/" .$rimg);
                    move_uploaded_file($_FILES["File_ModelBImage"]["tmp_name"], "../Uploads/" .$bimg);
                    $sql1="UPDATE tbl_Model SET Model_Name='$n',Model_Description='$md',Automakers_ID='$ia',Model_FImage='$fimg',Model_RImage='$rimg',Model_BImage='$bimg' where Model_ID='$i'";
                    $obj->executequery($sql1);
                    echo"<script>alert('Data Updated Successfully....');window.location='ModelView.php';</script>";
                }
            }else{
                if($bimg==''){
                    move_uploaded_file($_FILES["File_ModelFImage"]["tmp_name"], "../Uploads/" .$fimg);
                    move_uploaded_file($_FILES["File_ModelRImage"]["tmp_name"], "../Uploads/" .$rimg);
                    move_uploaded_file($_FILES["File_ModelLImage"]["tmp_name"], "../Uploads/" .$limg);
                    $sql1="UPDATE tbl_Model SET Model_Name='$n',Model_Description='$md',Automakers_ID='$ia',Model_FImage='$fimg',Model_RImage='$rimg',Model_LImage='$limg' where Model_ID='$i'";
                    $obj->executequery($sql1);
                    echo"<script>alert('Data Updated Successfully....');window.location='ModelView.php';</script>";
                }
                else{
                    move_uploaded_file($_FILES["File_ModelFImage"]["tmp_name"], "../Uploads/" .$fimg);
                    move_uploaded_file($_FILES["File_ModelRImage"]["tmp_name"], "../Uploads/" .$rimg);
                    move_uploaded_file($_FILES["File_ModelLImage"]["tmp_name"], "../Uploads/" .$limg);
                    move_uploaded_file($_FILES["File_ModelBImage"]["tmp_name"], "../Uploads/" .$bimg);
                    $sql1="UPDATE tbl_Model SET Model_Name='$n',Model_Description='$md',Automakers_ID='$ia',Model_FImage='$fimg',Model_RImage='$rimg',Model_LImage='$limg',Model_BImage='$bimg' where Model_ID='$i'";
                    $obj->executequery($sql1);
                    echo"<script>alert('Data Updated Successfully....');window.location='ModelView.php';</script>";
                }   
            }
        }
    }else{
        move_uploaded_file($_FILES["File_ModelImage"]["tmp_name"], "../Uploads/" .$img);        
        $sql1="UPDATE tbl_Model SET Model_Name='$n',Model_Description='$md',Automakers_ID='$ia',Model_Image='$img' where Model_ID='$i'";
        $obj->executequery($sql1);
        echo"<script>alert('Data Updated Successfully....');window.location='ModelView.php';</script>";   
    }
}
else{
    echo"<script>alert('Data Not Changed....');window.location='ModelView.php';</script>";   

}
?>