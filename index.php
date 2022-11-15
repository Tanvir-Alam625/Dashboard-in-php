<!doctype html>
<html class="no-js" lang="en">
<!-- Mirrored from themebeyond.com/html/kufa/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Feb 2020 06:27:43 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> Personal Portfolio</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
        <!-- Place favicon.ico in the root directory -->
        
		<!-- CSS here -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/fontawesome-all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="css/flaticon.css">
        <link rel="stylesheet" href="css/slick.css">
        <link rel="stylesheet" href="css/aos.css">
        <link rel="stylesheet" href="css/default.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
    </head>
    <body class="theme-bg">
    <?php

    require_once("./dashboard/db_connect/db_connect.php");
    session_start();
    $user_id = $_SESSION["auth_id"];
    if(!$user_id){
        header("location: ./dashboard/auth/signin.php");
    }

    // service select query testimonials
    $service_query = "SELECT * FROM services WHERE service_status='active' LIMIT 6";
    $services = mysqli_query($db_connect, $service_query);
    // work select query 
    $work_query = "SELECT * FROM works WHERE work_status='active' LIMIT 6";
    $works = mysqli_query($db_connect, $work_query);
    
    // portfolio select query 
    $portfolio_query = "SELECT * FROM portfolios WHERE portfolio_status='active' LIMIT 4";
    $portfolios = mysqli_query($db_connect, $portfolio_query);
    // testimonial select query 
    $testimonial_query = "SELECT * FROM testimonials WHERE Status='active' LIMIT 4";
    $testimonials = mysqli_query($db_connect, $testimonial_query);
    // brand select query 
    $brand_query = "SELECT * FROM brands WHERE Status='active'";
    $brands = mysqli_query($db_connect, $brand_query);
    // brand select query 
    $education_query = "SELECT * FROM educations WHERE Status='active'";
    $educations = mysqli_query($db_connect, $education_query);
    // user info query 
    $db_user_query = "SELECT Email, Name,Image, ID, Phone, Address, Bio, Facebook, Linkedin, Instagram, Twitter FROM users WHERE ID='$user_id';";
    $db_user = mysqli_query($db_connect, $db_user_query);
    $db_user_result = mysqli_fetch_assoc($db_user);
    
    ?>

        <!-- preloader -->
        <div id="preloader">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                </div>
            </div>
        </div>
        <!-- preloader-end -->

        <!-- header-start -->
        <header>
            <div id="header-sticky" class="transparent-header">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-menu">
                                <nav class="navbar navbar-expand-lg">
                                    <a href="./index.php" class="navbar-brand logo-sticky-none"><img src="img/logo/logo.png" alt="Logo"></a>
                                    <a href="./index.php" class="navbar-brand s-logo-none"><img src="img/logo/s_logo.png" alt="Logo"></a>
                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarNav">
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarNav">
                                        <ul class="navbar-nav ml-auto">
                                            <li class="nav-item active"><a class="nav-link" href="#home">Home</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#about">about</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#service">service</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#portfolio">portfolio</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                                        </ul>
                                    </div>
                                    <div class="header-btn">
                                        <a href="#" class="off-canvas-menu menu-tigger"><i class="flaticon-menu"></i></a>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- offcanvas-start -->
            <div class="extra-info">
                <div class="close-icon menu-close">
                    <button>
                        <i class="far fa-window-close"></i>
                    </button>
                </div>
                <div class="logo-side mb-30">
                    <a href="index-2.html">
                        <img src="img/logo/logo.png" alt="" />
                    </a>
                </div>
                <div class="side-info mb-30">
                    <div class="contact-list mb-30">
                        <h4>Office Address</h4>
                        <p><?= $db_user_result["Address"]?></p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Phone Number</h4>
                        <p>+<?=$db_user_result["Phone"]?></p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Email Address</h4>
                        <p><?=$db_user_result["Email"]?></p>
                    </div>
                </div>
                <div class="banner-social wow fadeInUp" data-wow-delay="0.8s">
                    <ul>
                        <li><a href="<?= $db_user_result["Facebook"]?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="<?= $db_user_result["Twitter"]?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="<?= $db_user_result["Instagram"]?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="<?= $db_user_result["Linkedin"]?>" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="offcanvas-overly"></div>
            <!-- offcanvas-end -->
        </header>
        <!-- header-end -->

        <!-- main-area -->
        <main>

            <!-- banner-area -->
            <section id="home" class="banner-area banner-bg fix">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-7 col-lg-6">
                            <div class="banner-content">
                                <h6 class="wow fadeInUp" data-wow-delay="0.2s">HELLO!</h6>
                                <h2 class="wow fadeInUp" data-wow-delay="0.4s">I am <?= $db_user_result["Name"]?></h2>
                                <p class="wow fadeInUp" title="<?=$db_user_result["Bio"]?>" data-wow-delay="0.6s"><?= substr($db_user_result["Bio"],0,150)."..."?></p>
                                <div class="banner-social wow fadeInUp" data-wow-delay="0.8s">
                                    <ul>
                                    <li><a href="<?= $db_user_result["Facebook"]?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="<?= $db_user_result["Twitter"]?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="<?= $db_user_result["Instagram"]?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="<?= $db_user_result["Linkedin"]?>" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                                <a href="#" class="btn wow fadeInUp" data-wow-delay="1s">SEE PORTFOLIOS</a>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6 d-none d-lg-block">
                            <div class="banner-img text-right">
                                <img src="./dashboard/img/profile-img/<?= $db_user_result['Image']?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-shape">
                    <img src="img/shape/dot_circle.png" class="rotateme" alt="img">
                </div>
            </section>
            <!-- banner-area-end -->

            <!-- about-area-->
            <section id="about" class="about-area primary-bg pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="about-img">
                                <img src="img/banner/banner_img2.png" title="me-01" alt="me-01">
                            </div>
                        </div>
                        <div class="col-lg-6 pr-90">
                            <div class="section-title mb-25">
                                <span>Introduction</span>
                                <h2>About Me</h2>
                            </div>
                            <div class="about-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, sed repudiandae odit deserunt, quas
                                    quibusdam necessitatibus nesciunt eligendi esse sit non reprehenderit quisquam asperiores maxime
                                    blanditiis culpa vitae velit. Numquam!</p>
                                <h3>Education:</h3>
                            </div>
                            <!-- Education Item -->
                            <?php
                            foreach ($educations as  $education):?>
                            <div class="education">
                                <div class="year"><?= $education["Year"]?></div>
                                <div class="line"></div>
                                <div class="location">
                                    <span><?=$education["Name"]?> &amp; Animation</span>
                                    <div class="progressWrapper">
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLefts" data-wow-delay="0.2s" data-wow-duration="2s" role="progressbar" style="width: <?=$education["Credit"]?>%;" aria-valuenow="<?=$education["Credit"]?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            endforeach
                            ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- about-area-end -->

            <!-- Services-area -->
            <section id="service" class="services-area pt-120 pb-50">
				<div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>WHAT WE DO</span>
                                <h2>Services and Solutions</h2>
                            </div>
                        </div>
                    </div>
					<div class="row">
						<?php
                        foreach ($services as  $service):
                            ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="icon_box_01 wow fadeInLeft" data-wow-delay="0.2s">
                                    <i class="<?= $service['service_icon']?>"></i>
                                    <h3><?= $service["service_title"]?></h3>
                                    <p>
                                        <?= $service["service_description"]?>
                                    </p>
                                </div>
                            </div>
                            <?php
                        endforeach
                        ?>
					</div>
				</div>
			</section>
            <!-- Services-area-end -->

            <!-- Portfolios-area -->
            <section id="portfolio" class="portfolio-area primary-bg pt-120 pb-90">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>Portfolio Showcase</span>
                                <h2>My Recent Best Works</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        foreach ($works as  $work):?>
                        <div class="col-lg-4 col-md-6 pitem">
                            <div class="speaker-box">
								<div class="speaker-thumb">
									<img src="./dashboard/img/work-imges/<?= $work["work_image"]?>" alt="img">
								</div>
								<div class="speaker-overlay">
									<span><?= $work["work_rol"]?></span>
									<h4><a href="portfolio-single.html"><?= substr($work["work_title"],0,10)?></a></h4>
									<a href="./portfolio-details.php?id=<?=$work["ID"]?>" class="arrow-btn">More information <span></span></a>
								</div>
							</div>
                        </div>
                        <?php
                            
                        endforeach
                        ?>

                    </div>
                </div>
            </section>
            <!-- services-area-end -->


            <!-- fact-area -->
            <section class="fact-area">
                <div class="container">
                    <div class="fact-wrap">
                        <div class="row justify-content-between">
                            <?php
                            foreach ($portfolios as $portfolio):
                                ?>
                                <div class="col-xl-2 col-lg-3 col-sm-6">
                                    <div class="fact-box text-center mb-50">
                                        <div class="fact-icon">
                                            <i class="<?= $portfolio['portfolio_icon'] ?>"></i>
                                        </div>
                                        <div class="fact-content">
                                            <h2><span class="count"><?= $portfolio['portfolio_count']?></span></h2>
                                            <span><?= $portfolio["portfolio_title"]?></span>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endforeach
                            ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- fact-area-end -->

            <!-- testimonial-area -->
            <section class="testimonial-area primary-bg pt-115 pb-115">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>testimonial</span>
                                <h2>happy customer quotes</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10">
                            <div class="testimonial-active">
                                <?php
                                foreach ($testimonials as $testimonial) :?>
                                 <div class="single-testimonial text-center">
                                    <div class="testi-avatar">
                                        <img style="width:100px; height:100px; object-fit: padding:3px; border:3px solid #fff; cover;  border-radius:50%;" src="./dashboard/img/testimonial-img/<?= $testimonial["Image"]?>" alt="img">
                                    </div>
                                    <div class="testi-content">
                                        <h4><span>“</span><?= $testimonial["Message"]?> <span>”</span></h4>
                                        <div class="testi-avatar-info">
                                            <h5><?= $testimonial["Name"]?></h5>
                                            <span><?= $testimonial["Position"]?></span>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    endforeach
                                ?>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- testimonial-area-end -->

            <!-- brand-area -->
            <div class="barnd-area pt-100 pb-100">
                <div class="container">
                    <div class="row brand-active">
                        <?php
                        foreach ($brands as  $brand):?>
                            <div class="col-xl-2">
                                <div class="single-brand">
                                    <img src="./dashboard/img/brand-img/<?= $brand["Image"]?>" alt="imgimaisfjskfjsdf">
                                </div>
                            </div>
                            <?php
                        endforeach
                        ?>
                    </div>
                </div>
            </div>
            <!-- brand-area-end -->

            <!-- contact-area -->
            <section id="contact" class="contact-area primary-bg pt-120 pb-120">
                <div class="container">
                    <!-- succes message  -->
                    <?php
                        if(isset($_SESSION['mail_sent_message'])){?>
                        <div class="d-flex justify-content-center">
                            <div class="w-40 p-2 mb-2 d-flex justify-content-center align-items-center mx-auto rounded " style="background:green;" role="">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="text-white " height="20px" width="20px" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <p class="text-white text-center ml-10 my-0 p-10">
                                    <?= $_SESSION['mail_sent_message']?>
                                </p>
                            </div>
                        </div>
                        <?php
                        }
                    unset($_SESSION['mail_sent_message']);
                    ?>
                     <!-- error message  -->
                    <?php
                        if(isset($_SESSION['message_error']) ){?>
                        <div class="d-flex justify-content-center">
                            <div class="w-70 p-2 mb-2 d-flex justify-content-center align-items-center mx-auto rounded " style="background:red;" role="">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" height="20px" width="20px" class="text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                <p class="text-white text-center ml-10 my-0 p-10">
                                    <?= isset($_SESSION['message_error'])? $_SESSION['message_error']: ""?>
                                   
                                </p>
                            </div>
                        </div>
                        <?php
                        }
                    unset($_SESSION['message_error']);

                    ?>
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="section-title mb-20">
                                <span>information</span>
                                <h2>Contact Information</h2>
                            </div>
                            <div class="contact-content">
                                <p>Event definition is - somthing that happens occurre How evesnt sentence. Synonym when an unknown printer took a galley.</p>
                                <h5>OFFICE IN <span>NEW YORK</span></h5>
                                <div class="contact-list">
                                    <ul>
                                        <li><i class="fas fa-map-marker"></i><span>Address :</span><?= $db_user_result["Address"]?></li>
                                        <li><i class="fas fa-headphones"></i><span>Phone :</span><?=$db_user_result["Phone"]?></li>
                                        <li><i class="fas fa-globe-asia"></i><span>e-mail :</span><?= $db_user_result["Email"]?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="contact-form">
                                <form action="./dashboard/auth/email-data.php" method="post">
                                    <input type="text" name="name" placeholder="your name *" >
                                    <input type="email" name="email" placeholder="your email *" >
                                    <textarea name="message" name="message" id="message" placeholder="your message *"></textarea>
                                    <button class="btn" type="submit">SEND</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact-area-end -->

        </main>
        <!-- main-area-end -->

        <!-- footer -->
        <footer>
            <div class="copyright-wrap">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="copyright-text text-center">
                                <p>Copyright© <span>Kufa</span> | All Rights Reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer-end -->
		<!-- JS here -->
        <script src="js/vendor/jquery-1.12.4.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/isotope.pkgd.min.js"></script>
        <script src="js/one-page-nav-min.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/ajax-form.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/aos.js"></script>
        <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/imagesloaded.pkgd.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
    </body>

<!-- Mirrored from themebeyond.com/html/kufa/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Feb 2020 06:28:17 GMT -->
</html>