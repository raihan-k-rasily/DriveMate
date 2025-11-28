<?php
include('../Dboperation.php');
include('Header.php');
$obj = new dboperation();
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
<!-- Breadcrumb End -->
<div class="breadcrumb-option set-bg" data-setbg="img/bg6bc" style="background-image: url('img/bgr23')" ;>
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
<section class="contact spad"
    style="background-image: url('img/bg6b1'); background-position: center center; background-size: cover; padding: 20px;">
    <div class="container">
        <div class="row" style="padding-left:400px;">
            <div class="col-lg-8 col-md-12" style="background-color: white; padding: 20px; border-radius: 8px;">
                <div class="contact__form">
                    <form action="CustomerRegAction.php" method="POST">
                        <div>
                            <label>Name</label>
                            <input type="text" name="txt_CustName" placeholder="Your Name"
                                pattern="^([A-Z][a-zA-Z]*(?: [A-Z][a-zA-Z]*)*)?$"
                                title="Must start with a capital letter followed by upper or lowercase letters"
                                oninput="capitalizeFirstLetter(this)" required>
                        </div>
                        <div>
                            <label>District Name</label>
                        </div>
                        <div>
                            <select id="txt_DistrictID" name="txt_DistrictID" required>
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
                        <div>
                            <label>Location Name</label>
                        </div>
                        <div>
                            <select id="txt_LocationID" name="txt_LocationID" required>
                                <option value="" selected disabled>---CHOOSE A LOCATION---</option>
                            </select>
                        </div>
                        <div>Email ID
                            <input type="text" name="txt_EmailID" id="txt_EmailID" placeholder="Your Email ID"
                                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                title="Must enter a valid email address ending with .com or similar domain" required>
                        </div>
                        <div>Contact
                            <input type="text" name="txt_Contact" id="txt_Contact" placeholder="Contact"
                                pattern="^[0-9]{10}$" minlength="10" maxlength="10"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '');" value="" required
                                title="Must contain 10 digits or characters">
                        </div>
                        <div>Username
                            <input type="text" name="txt_Username" id="txt_Username" placeholder="Username"
                                pattern="^[a-zA-Z0-9]{5,15}$" required
                                title="Must contain 5 to 15 alphanumeric characters (letters and numbers only)"
                                oninput="this.setCustomValidity(this.validity.patternMismatch ? this.title : '')">
                        </div>
                        <div>Password
                            <input type="password" name="txt_Password" id="txt_Password" placeholder="Password"
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                                required>
                        </div>
                        <button name="btn_submit" class="site-btn">Submit Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->
<?php
include('Footer.php');
?>
<script src="../jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // alert('hi');
        $("#txt_DistrictID").change(function () {
            var dist_id = $(this).val();
            // alert(dist_id);
            $.ajax({
                url: "GetCustomerLocation.php",
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
</script>