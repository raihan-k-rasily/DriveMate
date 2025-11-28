<?php
// session_start();
include ('../Dboperation.php');
include ('Header.php');
$obj = new dboperation();
$id = $_SESSION["Customer_ID"];
$sql = "SELECT * FROM tbl_customer tc 
INNER JOIN tbl_location tl ON tc.Customer_Location = tl.Location_ID 
INNER JOIN tbl_district tdi ON tl.District_ID = tdi.District_ID 
where tc.Customer_ID='$id'";
$res = $obj->executequery($sql);
$display = mysqli_fetch_array($res);
?>
<!-- Breadcrumb End -->
<div class="breadcrumb-option set-bg" data-setbg="img/breadcrumb-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Customer Registration</h2>
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Sign Up</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Begin -->

<!-- Contact Section Begin -->
<section class="contact spad" data-setbg="img/breadcrumb-bg.jpg" style="background-image=url(img/about/call-bg.jpg);">
    <div class="container">
        <div class="row" style="padding-left:200px">
            <div class="col-lg-10 col-md-12">
                <div class="contact__form">
                    <form action="CustomerProfileEditAction.php" method="POST">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Name</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" value = "<?php echo $display['Customer_Name'];?>" name="txt_CustName" placeholder="Your Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label>District Name</label>
                            </div>
                            <div class="col-md-9">
                            <select class="form-control" id="txt_DistrictID" name="txt_DistrictID">
                                    <option value="<?php echo $display['District_ID']; ?>" selected disabled>---CHOOSE A DISTRICT---</option>
                                    <?php
                                    $sql = "select * from tbl_district";
                                    $res = $obj->executequery($sql);
                                    while ($display1 = mysqli_fetch_array($res)) {
                                        ?>
                                        <option value="<?php echo $display1['District_ID']; ?>" <?php echo ($display['District_ID'] == $display1['District_ID']) ? "selected=selected" : "" ?>>
                                            <?php echo $display1['District_Name']; ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Location Name</label>
                            </div>
                            <div class="col-md-9">
                            <select class="form-control" id="txt_LocationID" name="txt_LocationID">
                                    <option value="<?php $display['Customer_Location']?>" selected disabled>---CHOOSE A LOCATION---</option>
                                    <?php
                                    $sql1 = "select * from tbl_location";
                                    $res1 = $obj->executequery($sql1);
                                    while ($display1 = mysqli_fetch_array($res1)) {
                                        ?>
                                        <option value="<?php echo $display1['Location_ID']; ?>" <?php echo ($display1['Location_ID'] == $display['Customer_Location']) ? "selected=selected" : "" ?>>
                                            <?php echo $display1['Location_Name']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Email ID</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="txt_EmailID" value = "<?php echo $display['Customer_EmailID'];?>" id="txt_EmailID" placeholder="Your Email ID">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Contact</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="txt_Contact" id="txt_Contact" value = "<?php echo $display['Customer_Contact'];?>" placeholder="Contact">
                            </div>
                        </div>
                        <div class="row">
                            <input type="hidden" name="txt_CustID" id="txt_CustID" value = "<?php echo $display['Customer_ID'];?>">
                        </div>
                        <button name="btn_submit" class="site-btn">Submit Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

<!-- Contact Address Begin -->
<div class="contact-address">
    <div class="container">
        <div class="contact__address__text">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="contact__address__item">
                        <h4>California Showroom</h4>
                        <p>625 Gloria Union, California, United Stated Colorlib.california@gmail.com</p>
                        <span>(+12) 456 678 9100</span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="contact__address__item">
                        <h4>New York Showroom</h4>
                        <p>8235 South Ave. Jamestown, NewYork Colorlib.Newyork@gmail.com</p>
                        <span>(+12) 456 678 9100</span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="contact__address__item">
                        <h4>Florida Showroom</h4>
                        <p>497 Beaver Ridge St. Daytona Beach, Florida Colorlib.california@gmail.com</p>
                        <span>(+12) 456 678 9100</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact Address End -->
<?php
include ('Footer.php');
?>
<script src="../jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // alert('hi');
        $("#txt_DistrictID").change(function () {
            var dist_id = $(this).val();
            // alert(dist_id);
            $.ajax({
                url: "GetCustomerProfileLocation.php",
                method: "POST",
                data: {
                    id: dist_id
                },
                success: function (response) {
                    $("#txt_LocationID").html(response);
                },
                error: function () {
                    $("#txt_LocationID").html("Errror occured while getting location!");
                }
            });
        });
    });
</script>