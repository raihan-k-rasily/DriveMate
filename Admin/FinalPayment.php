<?php
include ("../Dboperation.php");
$obj = new dboperation();
$i = $_GET['bid'];
$sql1="SELECT * FROM tbl_booking  WHERE Booking_ID=$i";
$res1 = $obj->executequery($sql1);
$display1 = mysqli_fetch_array($res1);
if($display1['Driver_Required'] == 'Required'){                        
    $sql="SELECT * FROM tbl_booking tb INNER JOIN tbl_model tm ON tb.Model_ID=tm.Model_ID 
    INNER JOIN tbl_rental tr ON tb.Booking_ID=tr.Booking_ID 
    INNER JOIN tbl_car tc ON tr.Car_ID=tc.Car_ID  
    INNER JOIN tbl_driver td ON tr.Driver_ID=td.Driver_ID WHERE tb.Booking_ID=$i";
}else{
    $sql="SELECT * FROM tbl_booking tb INNER JOIN tbl_model tm ON tb.Model_ID=tm.Model_ID 
    INNER JOIN tbl_rental tr ON tb.Booking_ID=tr.Booking_ID 
    INNER JOIN tbl_car tc ON tr.Car_ID=tc.Car_ID WHERE tb.Booking_ID=$i";
}
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
                        <img src="../Uploads/<?php echo $display['Car_Image'];?>" style=" background-image: url('../Uploads/<?php echo $display['Model_FImage'];?>'); background-position: center center; background-size: cover;"
                            alt="">
                    </div>
                    <div class="row m-0 bg-light">
                    <div class="col-md-4 col-6 ps-30 pe-0 my-4">
                            <p class="text-muted">Car Plate</p>
                            <p class="h5"><?php echo $display['Plate_Number'];?></p>
                        </div>
                        <div class="col-md-4 col-6  ps-30 my-4">
                            <p class="text-muted">Variant</p>
                            <p class="h5 m-0"><?php echo $display['Car_Variant'];?></p>
                        </div>
                        <div class="col-md-4 col-6 ps-30 my-4">
                            <p class="text-muted">Colour</p>
                            <p class="h5 m-0"><input type="text" style ="background-color :<?php echo $display['Car_Colour']; ?>;width:40px;height:40px" 
                            readonly></p>
                        </div>
                        <div class="col-md-4 col-6 ps-30 my-4">
                            <p class="text-muted">Fuel Type</p>
                            <p class="h5 m-0"><?php echo $display['Fuel_Type'];?></p>
                        </div>
                        <div class="col-md-4 col-6 ps-30 my-4">
                            <p class="text-muted">Remark</p>
                            <p class="h5 m-0"><?php echo $display['Car_Remark'];?></p>
                        </div>
                        <div class="col-md-4 col-6 ps-30 my-4">
                            <p class="text-muted">Amount per Day</p>
                            <p class="h5 m-0"><span class="fas fa-rupee-sign mt-1 pe-1 fs-14 "></span>
                            <?php echo $display['AmountperDay'];?></p>
                        </div>
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
                        <?php 
                            if($display['Driver_Required'] == 'Required'){
                        ?>
                        <div class="d-flex justify-content-between mb-2">
                            <p class="textmuted">Driver Name</p>
                            <p class="fs-14 fw-bold"><?php echo$display['Driver_Name'];?></p>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <p class="textmuted">Driver Amount/Day</p>
                            <p class="fs-14 fw-bold" id="damount"><?php echo$display['DAmountperDay'];?></p>
                        </div>
                        <?php 
                            }
                        ?>
                        <div class="d-flex justify-content-between mb-2">
                            <p class="textmuted">Car Amount/Day</p>
                            <p class="fs-14 fw-bold" id="camount"><?php echo$display['AmountperDay'];?></p>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <p class="textmuted">Total Days</p>
                            <p class="fs-14 fw-bold" id="tdays"></p>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <p class="textmuted">Extra Days</p>
                            <p class="fs-14 fw-bold" id="etdays"></p>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <p class="textmuted">Total Amount</p>
                            <p class="fs-14 fw-bold" id="tamount"><?php echo$display['Advance_Amount'];?></p>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <p class="textmuted">Advance Amount Paid</p>
                            <p class="fs-14 fw-bold" id="aamount"><?php echo$display['Advance_Amount'];?></p>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <p class="textmuted fw-bold">Remaining Amount</p>
                            <div class="d-flex align-text-top ">
                                <span class="fas fa-rupee-sign mt-1 pe-1 fs-14 "></span><span class="h4" id="ramount"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0">
                        <FORM action="FinalPaymentAction.php" method="POST">
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
                                            placeholder="Name" required oninput="this.value = this.value.toUpperCase()"  pattern="[A-Za-z\s]+"
                                            placeholder="Name" required title="Must contain the card holder name">
                                    </span>
                                    <div class="w-100 d-flex flex-column align-items-end">
                                        <p class="text-muted">CVC</p>
                                        <input class="form-control3" type="text"
                                        placeholder="XXX" pattern="^[0-9]{3}$"  minlength="3" maxlength="3"  
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '');" value="" required title="Must contain 3 digits or characters">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-0">
                            <div class="col-12  mb-4 p-0">
                            <input type="hidden" name="hdn_FinalAmount" id="hdn_FinalAmount">
                            <input type="hidden" name="hdn_DriverID" value="<?php echo $display['Driver_ID']; ?>">
                            <input type="hidden" name="hdn_CarID" value="<?php echo $display['Car_ID']; ?>">
                            <input type="hidden" name="hdn_BookingID" value="<?php echo $display['Booking_ID']; ?>">
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
<?php
if($display['Driver_Required'] == 'Required'){
?>
<script>
    const date = new Date();
    const tdate = new Date(document.getElementById("tdate").innerHTML);
    const fdate = new Date(document.getElementById("fdate").innerHTML);
    const damount=parseFloat(document.getElementById("damount").innerHTML);
    const aamount=parseFloat(document.getElementById("aamount").innerHTML);
    const camount=parseFloat(document.getElementById("camount").innerHTML);
    const diff=tdate - fdate;
    const tdays= diff / (1000*3600*24);
    // alert(tdays)

    if(tdate<date){
    const ediff=date - tdate;
    var etdays= parseInt(ediff / (1000*3600*24));
    }else{
    var etdays=0;
    }
    var tamount = parseInt((damount+camount)*(etdays+tdays));
    // alert(etdays)
    var ramount = tamount-aamount;
    // alert(etdays);
    document.getElementById("etdays").innerHTML=etdays;
    document.getElementById("tdays").innerHTML=tdays;
    document.getElementById("tamount").innerHTML=tamount;
    document.getElementById("ramount").innerHTML=ramount;
    document.getElementById("hdn_FinalAmount").value=ramount;
</script>
<?php
}else{
?>
<script>
    // alert("hi");
    const date = new Date();
    const tdate = new Date(document.getElementById("tdate").innerHTML);
    const fdate = new Date(document.getElementById("fdate").innerHTML);
    const aamount = parseFloat(document.getElementById("aamount").innerHTML);
    const camount = parseFloat(document.getElementById("camount").innerHTML);
    alert(date);
    const diff = tdate - fdate;
    const tdays = diff / (1000 * 3600 * 24);

    let etdays;
    let tamount;

    if (tdate < date) {
        const ediff = date - tdate;
        etdays = parseInt(ediff / (1000 * 3600 * 24));
    } else {
        etdays = 0;
    }
    
    tamount = parseInt(camount) * (etdays+tdays);

    var ramount = tamount - aamount;
    alert(etdays);
    document.getElementById("etdays").innerHTML = etdays;
    document.getElementById("tdays").innerHTML = tdays;
    document.getElementById("tamount").innerHTML = tamount;
    document.getElementById("ramount").innerHTML = ramount;
    document.getElementById("hdn_FinalAmount").value = ramount;
</script>
<?php
}
?>
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
