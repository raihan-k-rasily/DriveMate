<?php
include_once ('Header.php');
include_once ('../Dboperation.php');
$obj = new dboperation();
$id = $_GET['id'];
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-10 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mr-1 mb-3"
                    onclick='window.location.href="ModelView.php"'>View
                    Data </button>
            </div>

            <div class="col-md-10 grid-margin stretch-card  ">

                <div class="card">

                    <div class="card-body">

                        <h4 class="card-title">Model Registration</h4>
                        <p class="card-description">
                            Add a Model
                        </p>
                        <form class="forms-sample" action="ModelEditAction.php" method="post"
                            enctype="multipart/form-data">
                            <?php
                            $sql = "SELECT * FROM tbl_model tm INNER JOIN tbl_Automakers ta on tm.Automakers_ID=ta.Automakers_ID WHERE Model_ID='$id'";
                            $res = $obj->executequery($sql);
                            $display1 = mysqli_fetch_array($res);
                            ?>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Automakers Name</label>
                                <select class="form-control" name="txt_AutomakersID">
                                    <option value="<?php echo $display1['Automakers_ID']; ?>" selected disabled>
                                        ---CHOOSE A AUTOMAKER---</option>
                                    <?php
                                    $sql = "select * from tbl_Automakers";
                                    $res = $obj->executequery($sql);
                                    while ($display = mysqli_fetch_array($res)) {
                                        ?>
                                        <option value="<?php echo $display['Automakers_ID']; ?>" <?php echo ($display['Automakers_ID'] == $display1['Automakers_ID']) ? "selected=selected" : "" ?>>
                                            <?php echo $display['Automakers_Name']; ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Enter a Model</label>
                                <input type="text" class="form-control" name="txt_ModelName"
                                    value="<?php echo $display1['Model_Name']; ?>" id="exampleInpuyModelname1"
                                    placeholder="Modelname">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Front Image</label>
                                <div class="col-sm-9">
                                    <img src="../Uploads/<?php echo $display1['Model_FImage']; ?>" width="400"
                                        height="200"><br>
                                    <input type="file" name="File_ModelFImage" class="form-control"
                                        id="exampleInputUsername1" placeholder="Add a Image">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Right Side Image</label>
                                <div class="col-sm-9">
                                    <img src="../Uploads/<?php echo $display1['Model_RImage']; ?>" width="400"
                                        height="200"><br>
                                    <input type="file" name="File_ModelRImage" class="form-control"
                                        id="exampleInputUsername1" placeholder="Add a Image">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Left Side Image</label>
                                <div class="col-sm-9">
                                    <img src="../Uploads/<?php echo $display1['Model_LImage']; ?>" width="400"
                                        height="200"><br>
                                    <input type="file" name="File_ModelLImage" class="form-control"
                                        id="exampleInputUsername1" placeholder="Add a Image">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Back Image</label>
                                <div class="col-sm-9">
                                    <img src="../Uploads/<?php echo $display1['Model_BImage']; ?>" width="400"
                                        height="200"><br>
                                    <input type="file" name="File_ModelBImage" class="form-control"
                                        id="exampleInputUsername1" placeholder="Add a Image">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Enter the Model Description</label><br>
                                <textarea rows="10" cols="100" placeholder="Add a Image" name="txt_ModelDescription"><?php echo $display1['Model_Description']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="txt_ModelID"
                                    value="<?php echo $display1['Model_ID']; ?>" id="exampleInputUsername1">
                            </div>
                            <button type="submit" name="btn_Update" class="btn btn-primary mr-2">Update</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
include_once ('footer.php');
?>