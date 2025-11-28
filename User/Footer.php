<!-- Footer Section Begin -->
<footer class="footer set-bg" data-setbg="img/footer-bg.jpg">
    <div class="container">
        <div class="footer__contact">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="footer__contact__title">
                        <h2>Contact Us Now!</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="footer__contact__option">
                        <div class="option__item"><i class="fa fa-phone"></i>6238822011</div>
                        <div class="option__item email"><i class="fa fa-envelope-o"></i> drivemate@gmail.com</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="footer__about">
                    <div class="footer__logo">
                        <a href="#"><img src="img/DriveMateLogo10.png" alt=""></a>
                    </div>
                    <p>Any questions? Let us know in store at 625 Gloria Union, California, United Stated or call us
                        on 6238822011</p>
                    <!-- <div class="footer__social">
                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="google"><i class="fa fa-google"></i></a>
                        <a href="#" class="skype"><i class="fa fa-skype"></i></a>
                    </div> -->
                </div>
            </div>
            <div class="col-lg-2 offset-lg-1 col-md-3">
                <div class="footer__widget">
                    <h5>Information</h5>
                    <ul>
                        <li><a href="Model.php"><i class="fa fa-angle-right"></i> Model</a></li>
                        <li><a href="RequestView.php"><i class="fa fa-angle-right"></i> Request Details</a></li>
                        <li><a href="PaymentView.php"><i class="fa fa-angle-right"></i> Payment Details</a></li>
                        <li><a href="CustomerProfileEdit.php"><i class="fa fa-angle-right"></i> Profile</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-3">
                <div class="footer__widget">
                    <?php
                        $obj = new dboperation();
                        ?>
                        <h5>Top Brand</h5>
                        <ul>
                            <?php
                            $sql = "SELECT * FROM tbl_automakers ORDER BY Automakers_Established ASC LIMIT 4";
                            $res = $obj->executequery($sql);
                            while ($display = mysqli_fetch_array($res)) {
                            ?>
                            <li><a href="Model.php?id=<?php echo $display['Automakers_ID']; ?>"><i class="fa fa-angle-right"></i> <?php echo $display['Automakers_Name']; ?></a></li>
                        <?php
                        }
                        ?>
                        </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer__brand">
                        <h5>Top Brand</h5>
                        <ul>
                            <?php
                            $sql = "SELECT * FROM tbl_automakers ORDER BY Automakers_Established ASC LIMIT 4 OFFSET 4";
                            $res = $obj->executequery($sql);
                            while ($display = mysqli_fetch_array($res)) {
                            ?>
                            <li><a href="Model.php?id=<?php echo $display['Automakers_ID']; ?>"><i class="fa fa-angle-right"></i> <?php echo $display['Automakers_Name']; ?></a></li>
                        <?php
                        }
                        ?>
                        </ul>
                        <ul>
                            <?php
                            $sql = "SELECT * FROM tbl_automakers ORDER BY Automakers_Established ASC LIMIT 4 OFFSET 8";;
                            $res = $obj->executequery($sql);
                            while ($display = mysqli_fetch_array($res)) {
                            ?>
                            <li><a href="Model.php?id=<?php echo $display['Automakers_ID']; ?>"><i class="fa fa-angle-right"></i> <?php echo $display['Automakers_Name']; ?></a></li>
                        <?php   
                        }
                        ?>
                        </ul>
                </div>
            </div>
        </div>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        <!-- <div class="footer__copyright__text">
                <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
            </div> -->
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    </div>
</footer>
<!-- Footer Section End -->

<!-- Search Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search End -->

<!-- Js Plugins -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/mixitup.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>
</body>

</html>