<?php
include ('../Dboperation.php');
include ('Header.php');
$obj = new dboperation();
?>

<!-- Breadcrumb End -->
<div class="breadcrumb-option set-bg" data-setbg="img/breadcrumb-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Car Listing</h2>
                    <div class="breadcrumb__links">
                        <a href="Index.php"><i class="fa fa-home"></i> Home</a>
                        <span>Car Listing</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Begin -->

<!-- Car Section Begin -->
<section class="car spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="car__sidebar">
                    <!-- Car Search -->
                    <div class="car__search">
                        <h5>Car Search</h5>
                        <form action="Model.php" method="GET">
                            <input type="text" name="search" placeholder="Search..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>

                    <!-- Car Filter -->
                    <div class="car__filter">
                        <h5>Car Filter</h5>
                        <form action="Model.php" method="GET">
                            <select name="id">
                                <option data-display="Brand">SELECT AUTOMAKER</option>
                                <?php
                                $automakersSql = "SELECT * FROM tbl_automakers";
                                $automakersRes = $obj->executequery($automakersSql);
                                while ($display = mysqli_fetch_array($automakersRes)) {
                                    $selected = (isset($_GET['id']) && $_GET['id'] == $display['Automakers_ID']) ? 'selected' : '';
                                    echo '<option value="' . $display['Automakers_ID'] . '" ' . $selected . '>' . $display['Automakers_Name'] . '</option>';
                                }
                                ?>
                            </select>
                            <div class="car__filter__btn">
                                <button type="submit" class="site-btn">Filter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <?php
                    // Initialize the SQL query
                    $sql = "SELECT * FROM tbl_model tm INNER JOIN tbl_automakers ta ON tm.Automakers_ID = ta.Automakers_ID";
                    $conditions = [];

                    // Check for search term
                    if (isset($_GET['search']) && !empty($_GET['search'])) {
                        $searchTerm = $_GET['search'];
                        $conditions[] = "tm.Model_Name LIKE '%$searchTerm%' OR ta.Automakers_Name LIKE '%$searchTerm%'";
                    }

                    // Check for selected automaker
                    if (isset($_GET['id']) && !empty($_GET['id'])) {
                        $id = intval($_GET['id']); // Ensure it's an integer
                        $conditions[] = "tm.Automakers_ID = $id";
                    }

                    // If there are any conditions, append them to the SQL query
                    if (count($conditions) > 0) {
                        $sql .= " WHERE " . implode(' AND ', $conditions);
                    }

                    $res = $obj->executequery($sql);
                    
                    // Check if there are results
                    if (mysqli_num_rows($res) > 0) {
                        while ($display = mysqli_fetch_array($res)) {
                    ?>
                            <div class="col-lg-4">
                                <div class="car__item">
                                    <div class="car__item__pic__slider owl-carousel">
                                        <img src="../Uploads/<?php echo $display['Model_FImage']; ?>" style="width:500px; height: 150px;" alt="">
                                        <img src="../Uploads/<?php echo $display['Model_LImage']; ?>" style="width:400px; height: 150px;" alt="">
                                        <img src="../Uploads/<?php echo $display['Model_RImage']; ?>" style="width:400px; height: 150px;" alt="">
                                        <img src="../Uploads/<?php echo $display['Model_BImage']; ?>" style="width:400px; height: 150px;" alt="">
                                    </div>
                                    <div class="car__item__text">
                                        <div class="car__item__text__inner">
                                            <div class="label-date"><?php echo $display['Automakers_Name']; ?></div>
                                            <h5><a href="#"><?php echo $display['Model_Name']; ?></a></h5>
                                        </div>
                                        <div class="car__item__price">
                                            <a href="ModelSingle.php?id=<?php echo $display['Model_ID']; ?>">
                                                <input type="button" class="btn btn-primary" value="Details">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        } // End of while
                    } else {
                        echo '<div class="col-lg-12"><p>No models found matching your search.</p></div>';
                    }
                    ?>
                </div>
                <!-- <div class="pagination__option">
                    <a href="#" class="active">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#"><span class="arrow_carrot-2right"></span></a>
                </div> -->
            </div>
        </div>
    </div>
</section>
<script src="js/jquery.nice-select.min.js"></script>
<!-- Car Section End -->
<?php
include ('Footer.php');
?>
