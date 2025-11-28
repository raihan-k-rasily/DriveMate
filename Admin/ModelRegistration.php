<?php
include_once ('Header.php');
include_once ('../Dboperation.php');
$obj=new dboperation();
?>
<html>
    <head>
    <script>
       function capitalizeFirstLetter(input) {
    const words = input.value.split(' ');
    for (let i = 0; i < words.length; i++) {
        if (words[i]) {
            words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1).toLowerCase();
        }
    }
    input.value = words.join(' ');
}

    </script>
    </head>
</html>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-10 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mr-1 mb-3" onclick='window.location.href="ModelView.php"'>View
                    Data </button>
            </div>

            <div class="col-md-10 grid-margin stretch-card  ">

                <div class="card">

                    <div class="card-body">

                        <h4 class="card-title">Model Registration</h4>
                        <p class="card-description">
                            Add a Model
                        </p>
                        <form class="forms-sample" action="ModelRegAction.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                                <label for="exampleInputUsername1">Automakers Name</label>
                                <select class="form-control"  name="txt_AutomakersID" required>
                                    <option value="" selected disabled>---CHOOSE A AUTOMAKER---</option>
                                    <?php
                                    $sql="select * from tbl_Automakers";
                                    $res=$obj->executequery($sql);
                                    while($display=mysqli_fetch_array($res)){
                                    ?>  
                                    <option value="<?php echo $display['Automakers_ID'];?>"><?php echo $display['Automakers_Name'];?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Enter a Model</label>
                                <input type="text" class="form-control" name="txt_ModelName" id="exampleInpuyModelname1"
                                    placeholder="Modelname" pattern="^[a-zA-Z0-9\s]*$"  
                                    oninput="this.value = this.value.toUpperCase()" required title="Must enter the Model name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Front Image</label>
                                <div class="col-sm-9">
                                    <input type="file" name="fimage" class="form-control" id="exampleInputUsername1" placeholder="Add a Image" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Right Side Image</label>
                                <div class="col-sm-9">
                                    <input type="file" name="rimage" class="form-control" id="exampleInputUsername1" placeholder="Add a Image" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Left Side Image</label>
                                <div class="col-sm-9">
                                    <input type="file" name="limage" class="form-control" id="exampleInputUsername1" placeholder="Add a Image" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Back Image</label>
                                <div class="col-sm-9">
                                    <input type="file" name="bimage" class="form-control" id="exampleInputUsername1" placeholder="Add a Image" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Enter the Model Description</label><br>
                                <textarea rows="10" cols="100" placeholder="Model Description" name="txt_ModelDescription" required></textarea>
                            </div>
                            <button type="submit" name="btn_submit" class="btn btn-primary mr-2">Submit</button>
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