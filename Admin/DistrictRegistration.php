<?php
include_once ('Header.php');
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
                <button type="submit" class="btn btn-primary mr-1 mb-3"
                    onclick='window.location.href="DistrictView.php"'>View
                    Data </button>
            </div>
            <div class="col-md-10 grid-margin stretch-card  ">

                <div class="card">

                    <div class="card-body">

                        <h4 class="card-title">District Registration</h4>
                        <p class="card-description">
                            Adding of District
                        </p>
                        <form class="forms-sample" action="DistrictRegAction.php" method="POST">
                            <div class="form-group">
                                <label for="exampleInputDistrict">Enter the New District</label>
                                <input type="text" class="form-control" name="txt_DistrictName"
                                    id="exampleInputUsername1" placeholder="District Name"  pattern="^([A-Z][a-zA-Z]*(?: [A-Z][a-zA-Z]*)*)?$"  
                                    oninput="this.value = this.value.toUpperCase()" required title="Must enter the district name">
                            </div>
                            <button type="submit" name="btn_District" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include_once ('Footer.php');
    ?>