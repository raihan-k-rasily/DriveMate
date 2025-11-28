<?php
include ('../Dboperation.php');
include ('Header.php');
$id = $_GET['id'];
$obj = new dboperation();
$sql = "SELECT * FROM tbl_model tm INNER JOIN tbl_automakers ta ON tm.Automakers_ID=ta.Automakers_ID 
WHERE tm.Model_ID='$id'";
$res = $obj->executequery($sql);
$display = mysqli_fetch_array($res)
    ?>
    <script>
document.addEventListener("DOMContentLoaded", function() {
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("txt_FromDate").setAttribute("min", today);
    document.getElementById("txt_ToDate").setAttribute("min", today);

    // Add event listener to update "to date" based on "from date"
    document.getElementById("txt_FromDate").addEventListener("change", function() {
        var fromDate = this.value;
        document.getElementById("txt_ToDate").setAttribute("min", fromDate);
        document.getElementById("txt_ToDate").value = ""; // Clear the "to date" if it's invalid
    });

    // Add event listener to validate "to date" against "from date"
    document.getElementById("txt_ToDate").addEventListener("change", function() {
        var fromDate = document.getElementById("txt_FromDate").value;
        var toDate = this.value;

        // Compare dates in YYYY-MM-DD format
        if (toDate < fromDate) {
            alert("The 'to date' must be after the 'from date'.");
            this.value = ""; // Clear the invalid date
        }
    });
});
</script>

<!-- Hero Section Begin -->
<section class="hero spad set-bg" data-setbg="../Uploads/<?php echo $display['Model_FImage'];?>" style=" background-image: url('../Uploads/<?php echo $display['Model_FImage'];?>'); background-position: center center; background-size: cover;">
    <div class="container">
        <div class="col-lg-8">
            <div class="hero__tab">
                <div class="tab-content">
                    <div class="tab-pane active" id="tabs-1" role="tabpanel" style="padding-left: 280px;">
                        <div class="hero__tab__form">
                            <h2>Find Your Dream Car</h2>
                            <form action="BookingRegAction.php" method="POST">          
                                <div class="select-list">
                                    <div class="col-md-6">
                                        <p>From Date</p>
                                            <input type="date" id="txt_FromDate" name="txt_FromDate" required>
                                    </div>
                                    <div class="col-md-6">
                                        <p>To Date</p>
                                        <input type="date" id="txt_ToDate" name="txt_ToDate" required><br>
                                    </div>
                                </div>
                                <div class="row">
                                    <p>Driver :</p>
                                    <div class="col-md-1"> </div>
                                    <div class="col-md-3"> <input type="radio" class="form-check-input"
                                            name="rdo_Driver" value="Required" required>Required</div>
                                    <div class="col-md-6"> <input type="radio" class="form-check-input"
                                            name="rdo_Driver" value="Not Required" required>Not Required<br></div>
                                </div>
                                <div>
                                    <p>Description</p>
                                    <textarea rows="3" cols="45" name="txt_Description" required></textarea>
                                </div>
                                <div>
                                <input type="hidden" value="<?php echo $display['Model_ID']; ?>" name="txt_Model_ID">
                                </div>
                                <button type="submit" name="btn_submit" class="site-btn">Book</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->
<?php
include ('Footer.php');
?>