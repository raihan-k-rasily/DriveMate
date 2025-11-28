<?php
session_start();
include ('../Dboperation.php');
include ('Header.php');
$obj = new dboperation(); ?>
<!-- Hero Section Begin -->
<section class="hero spad set-bg" data-setbg="img/hero-bg.jpg" >
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hero__text">
                    <div class="hero__text__title">
                        <span>WELCOME TO</span>
                        <h2>DRIVEMATE</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->
 <!-- Car Section Begin -->
<section class="car spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Our Cars</span>
                    <h2>Available Automakers</h2>
                </div>
                <ul class="filter__controls">
                    <li class="active" data-filter="*">Most Researched</li>
                    <li data-filter=".sale">Latest on sale</li>
                </ul>
            </div>
        </div>
        <div class="row car-filter">
            <?php
            $sql = "SELECT * FROM tbl_automakers";
            $res = $obj->executequery($sql);
            while ($display = mysqli_fetch_array($res)) {
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix">
                    <div class="car__item">
                        <div>
                            <img src="../Uploads/<?php echo $display['Automakers_Image']; ?>"style="width:500px; height: 200px;" alt="">
                        </div>
                        <div class="car__item__text">
                            <div class="car__item__text__inner">
                                <div class="label-date"><?php echo $display['Automakers_Country']; ?></div>
                                <h5><a href="#"><?php echo $display['Automakers_Name']; ?></a></h5>
                                <ul>
                                    <li><span>Established On</li>
                                    <li><?php echo $display['Automakers_Established']; ?></li>
                                </ul>
                            </div>
                            <div class="car__item__price">
                                <button onclick="Register()" class="car-option">Details</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>
<!-- Car Section End -->
<!-- Services Section Begin -->
<section class="services spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Our Services</span>
                    <h2>What We Offers</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="services__item">
                    <img src="img/services/services-1.png" alt="">
                    <h5>Rental A Cars</h5>
                    <p>Consectetur adipiscing elit incididunt ut labore et dolore magna aliqua. Risus commodo
                        viverra maecenas.</p>
                    <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="services__item">
                    <img src="img/services/services-2.png" alt="">
                    <h5>Our Partnership Automakers</h5>
                    <p>Consectetur adipiscing elit incididunt ut labore et dolore magna aliqua. Risus commodo
                        viverra maecenas.</p>
                    <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="services__item">
                    <img src="img/services/services-3.png" alt="">
                    <h5>Car Maintenance</h5>
                    <p>Consectetur adipiscing elit incididunt ut labore et dolore magna aliqua. Risus commodo
                        viverra maecenas.</p>
                    <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="services__item">
                    <img src="img/services/services-4.png" alt="">
                    <h5>Support 24/7</h5>
                    <p>Consectetur adipiscing elit incididunt ut labore et dolore magna aliqua. Risus commodo
                        viverra maecenas.</p>
                    <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services Section End -->

<!-- Feature Section Begin -->
<section class="feature spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="feature__text">
                    <div class="section-title">
                        <span>Our Feature</span>
                        <h2>We Are a Trusted Name In Auto</h2>
                    </div>
                    <div class="feature__text__desc">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore et</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo
                            viverra maecenas accumsan lacus vel facilisis.</p>
                    </div>
                    <div class="feature__text__btn">
                        <a href="#" class="primary-btn">About Us</a>
                        <a href="#" class="primary-btn partner-btn">Our Partners</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-4">
                <div class="row">
                    <div class="col-lg-6 col-md-4 col-6">
                        <div class="feature__item">
                            <div class="feature__item__icon">
                                <img src="img/feature/feature-1.png" alt="">
                            </div>
                            <h6>Engine</h6>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4 col-6">
                        <div class="feature__item">
                            <div class="feature__item__icon">
                                <img src="img/feature/feature-2.png" alt="">
                            </div>
                            <h6>Turbo</h6>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4 col-6">
                        <div class="feature__item">
                            <div class="feature__item__icon">
                                <img src="img/feature/feature-3.png" alt="">
                            </div>
                            <h6>Colling</h6>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4 col-6">
                        <div class="feature__item">
                            <div class="feature__item__icon">
                                <img src="img/feature/feature-4.png" alt="">
                            </div>
                            <h6>Suspension</h6>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4 col-6">
                        <div class="feature__item">
                            <div class="feature__item__icon">
                                <img src="img/feature/feature-5.png" alt="">
                            </div>
                            <h6>Electrical</h6>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4 col-6">
                        <div class="feature__item">
                            <div class="feature__item__icon">
                                <img src="img/feature/feature-6.png" alt="">
                            </div>
                            <h6>Brakes</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Feature Section End -->



<!-- Chooseus Section Begin -->
<section class="chooseus spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="chooseus__text">
                    <div class="section-title">
                        <h2>Why People Choose Us</h2>
                        <p>Duis aute irure dolorin reprehenderits volupta velit dolore fugiat nulla pariatur
                            excepteur sint occaecat cupidatat.</p>
                    </div>
                    <ul>
                        <li><i class="fa fa-check-circle"></i> Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit.</li>
                        <li><i class="fa fa-check-circle"></i> Integer et nisl et massa tempor ornare vel id orci.
                        </li>
                        <li><i class="fa fa-check-circle"></i> Nunc consectetur ligula vitae nisl placerat tempus.
                        </li>
                        <li><i class="fa fa-check-circle"></i> Curabitur quis ante vitae lacus varius pretium.</li>
                    </ul>
                    <a href="#" class="primary-btn">About Us</a>
                </div>
            </div>
        </div>
    </div>
    <div class="chooseus__video set-bg">
        <img src="img/chooseus-video.png" alt="">
        <a href="https://www.youtube.com/watch?v=Xd0Ok-MkqoE" class="play-btn video-popup"><i
                class="fa fa-play"></i></a>
    </div>
</section>
<!-- Chooseus Section End -->

<!-- Latest Blog Section Begin -->
<section class="latest spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Our Blog</span>
                    <h2>Latest News Updates</h2>
                    <p>Sign up for the latest Automobile Industry information and more. Duis aute<br /> irure
                        dolorin reprehenderits volupta velit dolore fugiat.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="latest__blog__item">
                    <div class="latest__blog__item__pic set-bg" data-setbg="img/latest-blog/lb-1.jpg">
                        <ul>
                            <li>By Polly Williams</li>
                            <li>Dec 19, 2018</li>
                            <li>Comment</li>
                        </ul>
                    </div>
                    <div class="latest__blog__item__text">
                        <h5>Benjamin Franklin S Method Of Habit Formation</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua. Risus commodo viverra maecenas accumsan lacus vel
                            facilisis.</p>
                        <a href="#">View More <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest__blog__item">
                    <div class="latest__blog__item__pic set-bg" data-setbg="img/latest-blog/lb-2.jpg">
                        <ul>
                            <li>By Mattie Ramirez</li>
                            <li>Dec 19, 2018</li>
                            <li>Comment</li>
                        </ul>
                    </div>
                    <div class="latest__blog__item__text">
                        <h5>How To Set Intentions That Energize You</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua. Risus commodo viverra maecenas accumsan lacus vel
                            facilisis.</p>
                        <a href="#">View More <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest__blog__item">
                    <div class="latest__blog__item__pic set-bg" data-setbg="img/latest-blog/lb-3.jpg">
                        <ul>
                            <li>By Nicholas Brewer</li>
                            <li>Dec 19, 2018</li>
                            <li>Comment</li>
                        </ul>
                    </div>
                    <div class="latest__blog__item__text">
                        <h5>Burning Desire Golden Key Or Red Herring</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua. Risus commodo viverra maecenas accumsan lacus vel
                            facilisis.</p>
                        <a href="#">View More <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Latest Blog Section End -->

<!-- Cta Begin -->
<div class="cta">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="cta__item set-bg" data-setbg="img/cta/cta-1.jpg">
                    <h4>Do You Want To Buy A Car</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="cta__item set-bg" data-setbg="img/cta/cta-2.jpg">
                    <h4>Do You Want To Rent A Car</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cta End -->
<?php
include_once ('Footer.php');
?>
<script>
    function Register() {
        var c = confirm("Login to Rent a Car");
        if(c==TRUE){
            window.location='Login.php';
            return TRUE;
        }
        else{
            window.location='#';
            return FALSE;
        }
    }

</script>