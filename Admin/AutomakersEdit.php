<?php
include_once ('header.php');
include ("../DbOperation.php");
$obj = new dboperation();
$id = $_GET['id'];
$sql = "SELECT * FROM tbl_automakers where Automakers_ID='$id'";
$res = $obj->executequery($sql);
$display = mysqli_fetch_array($res);
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-10 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mr-1 mb-3"
                    onclick='window.location.href="AutomakersView.php"'>View
                    Data </button>
            </div>

            <div class="col-md-10 grid-margin stretch-card  ">

                <div class="card">

                    <div class="card-body">

                        <h4 class="card-title">Automakers Editting</h4>
                        <p class="card-description">
                            Add a Automakers
                        </p>
                        <form class="forms-sample" action="AutomakersEditAction.php" method="post"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Enter a Automakers Name</label>
                                <input type="text" class="form-control" name="txt_AutomakersName"
                                    id="exampleInputUsername1" value="<?php echo $display['Automakers_Name']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Add LOGO</label>
                                <div class="col-sm-9">
                                    <img src="../Uploads/<?php echo $display['Automakers_Image']; ?>" width="100"
                                        height="50"><br>
                                    <input type="file" name="File_AutomakersImage" id="File_AutomakersImage"
                                        class="form-control" >
                                        <input type="hidden" name="imgold" value="<?php echo $display['Automakers_Image'];?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Established On</label>
                                <input type="text" class="form-control" name="txt_AutomakersEstablished"
                                    id="exampleInputUsername1" value="<?php echo $display['Automakers_Established']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Automaker's Country</label>
                                <input type="text" class="form-control" name="txt_AutomakersCountry"
                                    id="exampleInputUsername1" value="<?php echo $display['Automakers_Country']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="txt_AutomakersID"
                                    value="<?php echo $display['Automakers_ID']; ?>" id="exampleInputUsername1">
                            </div>
                            <button type="submit" name="btn_Update" class="btn btn-primary mr-2">Update</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
    <?php
    include_once ('Footer.php');
    ?>