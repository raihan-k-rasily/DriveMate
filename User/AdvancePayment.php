<?php
include ("../Dboperation.php");
$obj = new dboperation();
$i = $_POST['hdn_BookingID'];
$sql="SELECT * FROM tbl_booking tb INNER JOIN tbl_model tm ON tb.Model_ID=tm.Model_ID WHERE tb.Booking_ID=$i";
$res = $obj->executequery($sql);
$display = mysqli_fetch_array($res)
?>
<html>
    <head>
    <script>
        function capitalizeFirstLetter(input) {
            let value = input.value;
            input.value = value.charAt(0).toUpperCase() + value.slice(1);
        }
        function formatExpiry(input) {
    // Remove non-digit characters
    input.value = input.value.replace(/[^0-9]/g, '');
    
    // Insert slash after the month
    if (input.value.length >= 2) {
        input.value = input.value.slice(0, 2) + '/' + input.value.slice(2);
    }
    
    // Limit to 7 characters (MM/YYYY)
    if (input.value.length > 7) {
        input.value = input.value.slice(0, 7);
    }
}

    </script>
    </head>
    </html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<div class="container">
        <div class="row m-0">
            <div class="col-lg-7 pb-5 pe-lg-5">
                <div class="row">
                    <div class="col-12 p-5">
                        <img src="../Uploads/<?php echo $display['Model_FImage'];?>" style=" background-image: url('../Uploads/<?php echo $display['Model_FImage'];?>'); background-position: center center; background-size: cover;"
                            alt="">
                    </div>
                    <div class="row m-0 bg-light">
                     
                    </div>
                </div>
            </div>
            <div class="col-lg-5 p-0 ps-lg-4">
                <div class="row m-0">
                    <div class="col-12 px-4">
                        <div class="d-flex align-items-end mt-4 mb-2">
                            <p class="h4 m-0"><span class="pe-1"><?php echo$display['Model_Name'];?></span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <p class="textmuted">From Date</p>
                            <p class="fs-14 fw-bold" id="fdate"><?php echo$display['From_Date'];?></p>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <p class="textmuted">To date</p>
                            <p class="fs-14 fw-bold" id="tdate"><?php echo $display['To_Date'];?></p>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <p class="textmuted">Driver</p>
                            <p class="fs-14 fw-bold"><?php echo$display['Driver_Required'];?></p>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <p class="textmuted">Total Days</p>
                            <p class="fs-14 fw-bold" id="tdays"></p>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <p class="textmuted fw-bold">Advanace Amount</p>
                            <div class="d-flex align-text-top ">
                                <span class="fas fa-rupee-sign mt-1 pe-1 fs-14 "></span><span class="h4"><?php echo $display['Advance_Amount'];?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0">
                        <FORM action="AdvancePaymentAction.php" method="POST">
                        <div class="row bg-light m-0">
                            <div class="col-12 px-4 my-4">
                                <p class="fw-bold">Payment detail</p>
                            </div>
                            <div class="col-12 px-4">
                                <div class="d-flex  mb-4">
                                    <span class="">
                                        <p class="text-muted">Card number</p>
                                        <input class="form-control" type="text"
                                            placeholder="1234 5678 9012 3456" pattern="^[0-9]{12}$"  minlength="12" maxlength="12"  
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '');" value="" required title="Must contain 12 digits or characters">
                                    </span>
                                    <div class=" w-100 d-flex flex-column align-items-end">
                                        <p class="text-muted">Expires</p>
                                        <input class="form-control2" type="text" placeholder="MM/YYYY" maxlength="7" required oninput="formatExpiry(this)" title="Must Fill The Card Expiry Date">
                                    </div>
                                </div>
                                <div class="d-flex mb-5">
                                    <span class="me-5">
                                        <p class="text-muted">Cardholder name</p>
                                        <input class="form-control" type="text"
                                            placeholder="Name" pattern="[A-Za-z\s]+"
                                            placeholder="Name" required title="Must contain the card holder name">
                                    </span>
                                    <div class="w-100 d-flex flex-column align-items-end">
                                        <p class="text-muted">CVC</p>
                                        <input class="form-control3" type="text"
                                        placeholder="XXX"  pattern="^[0-9]{3}$"  minlength="3" maxlength="3"  
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '');" value="" required title="Must contain 3 digits or characters">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-0">
                            <div class="col-12  mb-4 p-0">
                            <input type="hidden" name="hdn_BookingID" value="<?php echo $display['Booking_ID']; ?>">
                            <input type="hidden" name="hdn_AdvanceAmount" value="<?php echo $display['Advance_Amount']; ?>">
                                <button class="btn btn-primary" name="btn_Pay" >Pay<span class="fas fa-arrow-right ps-2"></span>
                                </button>
                            </div>
                        </div>
                        </FORM>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // const tdate=document.getElementById("tdate").innerHTML;
    // const fdate=document.getElementById("fdate").innerHTML;
    const tdate = new Date(document.getElementById("tdate").innerHTML);
const fdate = new Date(document.getElementById("fdate").innerHTML);
    const diff=tdate - fdate;
    const tdays= diff / (1000*3600*24);

    document.getElementById("tdays").innerHTML=tdays;
</script>
<?php
// include_once ('footer.php');
?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Work+Sans:wght@800&display=swap');


/* * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;

} */

/* body {
    padding: 15px;
    background-color: #ddc3c3;
} */

.container {
    margin: 20px auto;
    max-width: 1000px;
    background-color: white;
    padding: 0;
}


.form-control {
    height: 25px;
    width: 150px;
    border: none;
    border-radius: 0;
    font-weight: 800;
    padding: 0 0 5px 0;
    background-color: transparent;
    box-shadow: none;
    outline: none;
    border-bottom: 2px solid #ccc;
    margin: 0;
    font-size: 14px;
}

.form-control:focus {
    box-shadow: none;
    border-bottom: 2px solid #ccc;
    background-color: transparent;
}

.form-control2 {
    font-size: 14px;
    height: 20px;
    width: 55px;
    border: none;
    border-radius: 0;
    font-weight: 800;
    padding: 0 0 5px 0;
    background-color: transparent;
    box-shadow: none;
    outline: none;
    border-bottom: 2px solid #ccc;
    margin: 0;
}

.form-control2:focus {
    box-shadow: none;
    border-bottom: 2px solid #ccc;
    background-color: transparent;
}

.form-control3 {
    font-size: 14px;
    height: 20px;
    width: 30px;
    border: none;
    border-radius: 0;
    font-weight: 800;
    padding: 0 0 5px 0;
    background-color: transparent;
    box-shadow: none;
    outline: none;
    border-bottom: 2px solid #ccc;
    margin: 0;
}

.form-control3:focus {
    box-shadow: none;
    border-bottom: 2px solid #ccc;
    background-color: transparent;
}

p {
    margin: 0;
}

img {
    width: 100%;
    height: 100%;
    object-fit: fill;
}

.text-muted {
    font-size: 10px;
}

.textmuted {
    color: #6c757d;
    font-size: 13px;
}

.fs-14 {
    font-size: 14px;
}

.btn.btn-primary {
    width: 100%;
    height: 55px;
    border-radius: 0;
    padding: 13px 0;
    background-color: black;
    border: none;
    font-weight: 600;
}

.btn.btn-primary:hover .fas {
    transform: translateX(10px);
    transition: transform 0.5s ease
}


.fw-900 {
    font-weight: 900;
}

::placeholder {
    font-size: 12px;
}

.ps-30 {
    padding-left: 30px;
}

.h4 {
    font-family: 'Work Sans', sans-serif !important;
    font-weight: 800 !important;
}

.textmuted,
h5,
.text-muted {
    font-family: 'Poppins', sans-serif;
}
</style>
