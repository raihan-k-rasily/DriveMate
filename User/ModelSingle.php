<?php
    include ('../Dboperation.php');
    include ('Header.php');
    $id = $_GET['id'];
    $obj = new dboperation();
    $sql = "SELECT * FROM tbl_model tm INNER JOIN tbl_automakers ta ON tm.Automakers_ID=ta.Automakers_ID WHERE tm.Model_ID='$id'";
            $res = $obj->executequery($sql);
            $display = mysqli_fetch_array($res);
            $f = $display['Model_Description'];
            $items = explode(';', $f); // Split text into an array at each period

            // Remove any empty elements and trim whitespace
            $items = array_filter(array_map('trim', $items));
            
            // Calculate the midpoint
            $midpoint = ceil(count($items) / 2);
            
            // Split items into two halves
            $firstHalf = array_slice($items, 0, $midpoint);
            $secondHalf = array_slice($items, $midpoint);
            
            // Format each half into HTML lists
            $firstHalfList = '';
            foreach ($firstHalf as $item) {
                if (!empty($item)) {
                    $firstHalfList .= '<li><i class="fa fa-check"></i> ' . $item . '</li>';
                }
            }
            
            $secondHalfList = '';
            foreach ($secondHalf as $item) {
                if (!empty($item)) {
                    $secondHalfList .= '<li><i class="fa fa-check"></i> ' . $item . '</li>';
                }
            }
?>
    <!-- Breadcrumb End -->
    <div class="hero spad set-bg" data-setbg="../Uploads/<?php echo $display['Model_FImage'];?>" style=" background-image: url('../Uploads/<?php echo $display['Model_FImage'];?>'); background-position: center center; background-size: cover;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb__text">
                            <h2><?php echo $display['Automakers_Name']; echo" "; echo $display['Model_Name'];?></h2>
                            <div class="breadcrumb__links">
                                <a href="Index.php"><i class="fa fa-home"></i> Home</a>
                                <a href="Model.php">Model Listing</a>
                                <span><?php echo $display['Automakers_Name']; echo" "; echo $display['Model_Name'];?></span>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- Breadcrumb Begin -->
        <!-- Car Details Section Begin -->
        <section class="car-details spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="car__details__pic">
                            <div class="car__details__pic__large">
                                <img class="car-big-img" src="../Uploads/<?php echo $display['Model_FImage'];?>" alt="">
                            </div>
                            <div class="car-thumbs">
                                <div class="car-thumbs-track car__thumb__slider owl-carousel">
                                    <div class="ct" data-imgbigurl="../Uploads/<?php echo $display['Model_FImage'];?>"><img
                                        src="../Uploads/<?php echo $display['Model_FImage'];?>" alt=""></div>
                                    <div class="ct" data-imgbigurl="../Uploads/<?php echo $display['Model_RImage'];?>"><img
                                            src="../Uploads/<?php echo $display['Model_RImage'];?>" alt=""></div>
                                    <div class="ct" data-imgbigurl="../Uploads/<?php echo $display['Model_LImage'];?>"><img
                                            src="../Uploads/<?php echo $display['Model_LImage'];?>" alt=""></div>
                                    <div class="ct" data-imgbigurl="../Uploads/<?php echo $display['Model_BImage'];?>"><img
                                            src="../Uploads/<?php echo $display['Model_BImage'];?>" alt=""></div>
                                </div>
                            </div>
                        </div>
                        <div class="car__details__tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Vehicle
                                        Overview</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                    <div class="car__details__tab__info">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="car__details__tab__info__item">
                                                    <h5>General Information</h5>
                                                    <ul>
                                                        <?php echo $firstHalfList ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="car__details__tab__info__item">
                                                <h5>General Information</h5>
                                                <ul>
                                                        <?php echo $secondHalfList ?>
                                                    </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="car__details__sidebar">
                        <div class="car__details__sidebar__payment">
                            <ul>
                                <li>Automaker <span><?php echo $display['Automakers_Name']?></span></li>
                                <li>Model <span><?php echo $display['Model_Name']?></span></li>
                            </ul>
                            <a href="BookingRegistration.php?id=<?php echo $display['Model_ID']; ?>" class="primary-btn"><i class="fa fa-credit-card"></i> Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12-md-12">
                    <div class="car__details__sidebar">
                        <div class="car__details__sidebar__payment">
                            <a href="BookingRegistration.php?id=<?php echo $display['Model_ID']; ?>" class="primary-btn"><i class="fa fa-credit-card"></i> Book Now</a>
                        </div>
                    </div>
                </div>
        </div>
    </section>
    <!-- Car Details Section End -->
    <script src="js/jquery.nice-select.min.js"></script>
<?php
include ('Footer.php');
?>