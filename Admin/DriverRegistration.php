Shalbin BCA B, [07-01-2025 10:33]
<?php
include_once('Header.php');
include("../Dboperation.php");
$obj = new dboperation();
?>
<html>

<head>
    <script>
        function validateLicenseInput(input) {
            // Remove any invalid characters
            const validPattern = /^[A-Z]{0,2}[0-9]{0,2}(?: ?[0-9]{0,15})?$/; // Pattern to enforce structure
            const value = input.value.toUpperCase(); // Ensure uppercase letters for the first part

            // If input doesn't match valid structure, remove last entered character
            if (!validPattern.test(value)) {
                input.value = input.value.slice(0, -1);
                return;
            }

            // Add a space after the first 4 characters if not already present
            if (value.length === 4 && value[3] !== " ") {
                input.value = value.slice(0, 4) + " " + value.slice(4);
            }
        }
        function capitalizeFirstLetter(input) {
            const words = input.value.split(' ');
            for (let i = 0; i < words.length; i++) {
                if (words[i]) {
                    words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1).toLowerCase();
                }
            }
            input.value = words.join(' ');
        }

        document.addEventListener("DOMContentLoaded", function () {
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
            var yyyy = today.getFullYear();

            // Set maximum date to today
            today = yyyy + '-' + mm + '-' + dd;
            document.getElementById("txtdriverdob").setAttribute("max", today);

            // Set minimum date for 18 years ago
            // var minDate = new Date();
            // minDate.setFullYear(minDate.getFullYear() - 18);
            // var minDd = String(minDate.getDate()).padStart(2, '0');
            // var minMm = String(minDate.getMonth() + 1).padStart(2, '0');
            // var minYyyy = minDate.getFullYear();

            // var minDateStr = minYyyy + '-' + minMm + '-' + minDd;
            // document.getElementById("txtdriverdob").setAttribute("min", minDateStr);
        });



        function formatExpiry(input) {
            // Remove non-digit characters
            input.value = input.value.replace(/[^0-9]/g, '');
        }
    </script>

</head>

</html>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-10 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mr-1 mb-3"
                    onclick='window.location.href="DriverView.php"'>View
                    Data </button>
            </div>

            <div class="col-md-10 grid-margin stretch-card  ">

                <div class="card">

                    <div class="card-body">
                        <h4 class="card-title">Driver Registration</h4>
                        <p class="card-description">
                            Add a Driver
                        </p>
                        <form class="forms-sample" action="DriverRegAction.php" method="post"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Driver's Name</label>
                                <input type="text" class="form-control" name="txt_DriverName" id="exampleInputUsername1"
                                    placeholder="name" required oninput="capitalizeFirstLetter(this)"
                                    pattern="^[A-Za-z]+(?: [A-Za-z]+)*$"
                                    title="Must enter a valid name (e.g., John Doe)">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Driver photo</label>
                                <div class="col-sm-9">
                                    <input type="file" name="file_DriverPhoto" class="form-control"
                                        placeholder="Description" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Date of Birth</label>
                                <input type="date" class="form-control" name="txt_DriverDOB" id="exampleInputUsername1"
                                    placeholder="DOB" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Driver's License No.</label>
                                <input type="text" class="form-control" name="txt_DriverLicenseNo"
                                    id="exampleInputUsername1" placeholder="License Number" maxlength="18"
                                    oninput="validateLicenseInput(this)" required
                                    title="License number must be in the format: Two capital letters, two numbers, a space, and 15 numbers">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Add License Image</label>
                                <div class="col-sm-9">
                                    <input type="file" name="file_DriverLicense" class="form-control"
                                        placeholder="Description" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">District Name</label>
                                <select class="form-control" id="txt_DistrictID" name="txt_DistrictID" required>
                                    <option value="" selected disabled>---CHOOSE A DISTRICT---</option>
                                    <?php
                                    $sql = "select * from tbl_district";
                                    $res = $obj->executequery($sql);
                                    while ($display = mysqli_fetch_array($res)) {
                                        ?>
                                        <option value="<?php echo $display['District_ID']; ?>">
                                            <?php echo $display['District_Name']; ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Location Name</label>
                                <select class="form-control" id="txt_LocationID" name="txt_LocationID" required>
                                    <option value="" selected disabled>---CHOOSE A LOCATION---</option>
                                </select>
                            </div>
                            1<div class="form-group">
                                <label for="exampleInputUsername1">Pincode</label>
                                <input type="text" class="form-control" name="txt_Pincode" id="exampleInputUsername1"
                                    placeholder="Pincode" pattern="^[0-9]{6}$" minlength="6" maxlength="6"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '');" value="" required
                                    title="Must contain 6 digits ">
                            </div>
                            <div>Email ID
                            <input type="text"class="form-control" name="txt_EmailID" id="txt_EmailID" placeholder="Your Email ID"
                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                            title="Must enter a valid email address ending with .com or similar domain" required>
                        </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Contact</label>
                                <input type="text" class="form-control" name="txt_Contact" id="exampleInputUsername1"
                                    placeholder="Contact Info" pattern="^[0-9]{10}$" minlength="10" maxlength="10"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '');" value="" required
                                    title="Must contain 10 digits ">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Amount/Day</label>
                                <input type="text" class="form-control" name="txt_Amount/Day" id="exampleInputUsername1"
                                    placeholder="Amount/Day" pattern="^[0-9]+$"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '');" value="" required
                                    title="Must enter the amount per day">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Remark</label>
                                <input type="text" class="form-control" name="txt_Remark" id="exampleInputUsername1"
                                    placeholder="Remark" required>
                            </div>
                            <!-- <div class="form-group">
                                <label for="exampleInputUsername1">Status :</label><br>
                                <input type="radio" class="form-check-input" name="txt_Status" value="ACTIVE" id="exampleInputUsername1"
                                    placeholder="Status" required>ACTIVE<br>
                                <input type="radio" class="form-check-input" name="txt_Status" value="INACTIVE" id="exampleInputUsername1"
                                    placeholder="Status" required>INACTIVE<br>
                                <input type="radio" class="form-check-input" name="txt_Status" value="ON DRIVE" id="exampleInputUsername1"
                                    placeholder="Status" required>ON DRIVE<br>
                            </div> -->
                            <button type="submit" name="btn_submit" id="exampleInputUsername1"
                                class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include_once('footer.php');
    ?>
    <script src="../jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // alert('hi');
            $("#txt_DistrictID").change(function () {
                var dist_id = $(this).val();
                // alert(dist_id);
                $.ajax({
                    url: "GetDriverLocation.php",
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

        function validateLicenseInput(input) {
        const validPattern = /^[A-Z]{0,2}[0-9]{0,2}(?: ?[0-9]{0,15})?$/;
        const value = input.value.toUpperCase();

        if (!validPattern.test(value)) {
            input.value = input.value.slice(0, -1);
            return;
        }


        if (value.length === 4 && value[3] !== " ") {
            input.value = value.slice(0, 4) + " " + value.slice(4);
        }
        
    document.querySelector('form').addEventListener('submit', function (e) {
        const emailInput = document.getElementById('txt_EmailID').value;
        // Regex for validating email with .com or any valid TLD
        const emailPattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;

        // Check if the email matches the regex and ends with .com
        if (!emailPattern.test(emailInput) || !emailInput.endsWith('.com')) {
            alert('Please enter a valid email address ending with .com');
            e.preventDefault(); // Prevent form submission
        }
    });
    }
    </script>