<?php
include_once ('header.php');
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

                        <h4 class="card-title">Automakers Registration</h4>
                        <p class="card-description">
                            Add a Automakers
                        </p>
                        <form class="forms-sample" action="AutomakersRegAction.php" method="post"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Enter an Automaker's Name</label>
                                <input type="text" class="form-control" name="AutomakersName" id="exampleInputUsername1"
                                placeholder="Name" required oninput="this.value = this.value.toUpperCase()" pattern="[A-Za-z\s]+" title="Only letters and spaces are allowed">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Add LOGO</label>
                                <div class="col-sm-9">
                                    <input type="file" name="image" class="form-control" placeholder="Description" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Automaker's Established on</label>
                                <input type="text" class="form-control" name="Automakersestablished" id="exampleInputUsername1"
                                    placeholder="Established Year"maxlength="4" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Enter a Automaker's Country</label>
                                <input type="text" class="form-control" name="AutomakersCountry" id="exampleInputUsername1"
                                    placeholder="Country" required oninput="this.value = this.value.toUpperCase()" pattern="[A-Z\s]+">
                            </div>
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
include_once ('footer.php');
?>