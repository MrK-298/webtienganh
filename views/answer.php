<?php
session_start();
?>
<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <!-- Meta Tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="keywords" content="Site keywords here">
		<meta name="description" content="">
		<meta name='copyright' content=''>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
		<link rel="icon" href="../homejs/jquery.nav.js">
		<!-- Favicon -->
        <link rel="icon" href="../img/img/favicon.png">
		<!-- Google Fonts -->
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<!-- Nice Select CSS -->
		<link rel="stylesheet" href="../css/nice-select.css">
		<!-- Font Awesome CSS -->
        <link rel="stylesheet" href="../css/font-awesome.min.css">
		<!-- icofont CSS 
		<link rel="stylesheet" href="../css/icofont.css">-->
		<!-- Slicknav -->
		<link rel="stylesheet" href="../css/slicknav.min.css">
		<!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="../css/owl-carousel.css">
		<!-- Datepicker CSS -->
		<link rel="stylesheet" href="../css/datepicker.css">
		<!-- Animate CSS -->
        <link rel="stylesheet" href="../css/animate.min.css">
		<!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="../css/magnific-popup.css">
		<!-- Medipro CSS -->
        <link rel="stylesheet" href="../css/normalize.css">
        <link rel="stylesheet" href="../css/stylehome.css">
        <link rel="stylesheet" href="../css/responsive.css">
		
    </head>
    <body>

		<!-- Preloader -->
        <div class="preloader">
            <div class="loader">
                <div class="loader-outter"></div>
                <div class="loader-inner"></div>

                <div class="indicator"> 
                    <svg width="16px" height="12px">
                        <polyline id="back" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                        <polyline id="front" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                    </svg>
                </div>
            </div>
        </div>
        <!-- End Preloader -->
		<?php
			if(isset($_SESSION['login']['email'])) {
				echo '<div value="' . $_SESSION['login']['email'] . '" style="display:none" id="email"></div>';
			}                     
		?>
		<!-- Header Area -->
		<header class="header" >
			<!-- Header Inner -->
			<div class="header-inner">
				<div class="container">
					<div class="inner">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-12">
								<!-- Start Logo -->
								<div class="logo">
									<a href="index.html"><img src="../images/logo1.png" alt="#"></a>
								</div>
								<!-- End Logo -->
								<!-- Mobile Nav -->
								<div class="mobile-nav"></div>
								<!-- End Mobile Nav -->
							</div>
							<div class="col-lg-7 col-md-9 col-12">
								<!-- Main Menu -->
								<div class="main-menu">
									<nav class="navigation">
										<ul class="nav menu">
											<li class="active"><a href="#">Home <i class="fas fa-chevron-down"></i></a>
												<ul class="dropdown">
													<li><a href="index.html">Home Page 1</a></li>
												</ul>
											</li>
											<li><a href="#">Grammar </a></li>
											<li><a href="#">Vocabulary </a></li>
											<li><a href="#">Test <i class="fas fa-chevron-down"></i></a>
												<ul class="dropdown">
													<li><a href="viewexam/chooseExam.html">Test</a></li>
												</ul>
											</li>
											<li><a href="#">Blogs <i class="fas fa-chevron-down"></i></a>
												<ul class="dropdown">
													<li><a href="blog-single.html">Blog Details</a></li>
												</ul>
											</li>
											<li><a href="contact.html">Contact Us</a></li>
										</ul>
									</nav>
								</div>
								<!--/ End Main Menu -->
							</div>							
						</div>
					</div>
				</div>
			</div>
			<!--/ End Header Inner -->
		</header>
		<!-- End Header Area -->
		<div class="breadcrumbs overlay">
			<div class="bread-inner">	
					<div class="col-12">
						<h2> Kết quả </h2>
					</div>
			</div>
			</div>

			<div style="margin-bottom: 40px;"></div>
		<!-- test -->
		<div class="container">
			<div class="table-container">
				<table id="sole">							
				</table>
			</div>
			<div class="table-container">
				<table id="sochan">					
				</table>
			</div>
		</div>
		
		<!--/test -->
		<style>
			.container {
   			 display: flex;
   			 justify-content: space-between;
			}

			.table-container {
   			 width: 45%; 
			}

			table {
   			width: 100%;
    		border-collapse: collapse;
			}

			td {
    		height: 50px;
    		border: 2px solid black; 
    		text-align: center;
    		vertical-align: middle;
			}
		</style>

		<!-- Footer Area -->
		<footer id="footer" class="footer ">
			<!-- Footer Top -->
			<div class="footer-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-6 col-12">
							<div class="single-footer">
								<h2>About Us</h2>
								<p>Lorem ipsum dolor sit am consectetur adipisicing elit do eiusmod tempor incididunt ut labore dolore magna.</p>
								<!-- Social -->
								<ul class="social">
									<li><a href="#"><i class="icofont-facebook"></i></a></li>
									<li><a href="#"><i class="icofont-google-plus"></i></a></li>
									<li><a href="#"><i class="icofont-twitter"></i></a></li>
									<li><a href="#"><i class="icofont-vimeo"></i></a></li>
									<li><a href="#"><i class="icofont-pinterest"></i></a></li>
								</ul>
								<!-- End Social -->
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<div class="single-footer f-link">
								<h2>Quick Links</h2>
								<div class="row">
									<div class="col-lg-6 col-md-6 col-12">
										<ul>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Home</a></li>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>About Us</a></li>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Services</a></li>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Our Cases</a></li>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Other Links</a></li>	
										</ul>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<ul>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Consuling</a></li>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Finance</a></li>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Testimonials</a></li>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>FAQ</a></li>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Contact Us</a></li>	
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<div class="single-footer">
								<h2>Open Hours</h2>
								<p>Lorem ipsum dolor sit ame consectetur adipisicing elit do eiusmod tempor incididunt.</p>
								<ul class="time-sidual">
									<li class="day">Monday - Fridayp <span>8.00-20.00</span></li>
									<li class="day">Saturday <span>9.00-18.30</span></li>
									<li class="day">Monday - Thusday <span>9.00-15.00</span></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<div class="single-footer">
								<h2>Newsletter</h2>
								<p>subscribe to our newsletter to get allour news in your inbox.. Lorem ipsum dolor sit amet, consectetur adipisicing elit,</p>
								<form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
									<input name="email" placeholder="Email Address" class="common-input" onfocus="this.placeholder = ''"
										onblur="this.placeholder = 'Your email address'" required="" type="email">
									<button class="button"><i class="icofont icofont-paper-plane"></i></button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Footer Top -->
			<!-- Copyright -->
			<div class="copyright">
				<div class="container">
					<div class="roSw">
						<div class="col-lg-12 col-md-12 col-12">
						
						</div>
					</div>
				</div>
			</div>
			<!--/ End Copyright -->
		</footer>
		<!--/ End Footer Area -->
	

		<!-- jquery Min JS -->
        <script src="../homejs/jquery.min.js"></script>
		<!-- jquery Migrate JS -->
		<script src="../homejs/jquery-migrate-3.0.0.js"></script>
		<!-- jquery Ui JS -->
		<script src="../homejs/jquery-ui.min.js"></script>
		<!-- Easing JS -->
        <script src="../homejs/easing.js"></script>
		<!-- Color JS -->
		<script src="../homejs/colors.js"></script>
		<!-- Popper JS -->
		<script src="../homejs/popper.min.js"></script>
		<!-- Bootstrap Datepicker JS -->
		<script src="../homejs/bootstrap-datepicker.js"></script>
		<!-- Jquery Nav JS -->
        <script src="../homejs/jquery.nav.js"></script>
		<!-- Slicknav JS -->
		<script src="../homejs/slicknav.min.js"></script>
		<!-- ScrollUp JS -->
        <script src="../homejs/jquery.scrollUp.min.js"></script>
		<!-- Niceselect JS -->
		<script src="../homejs/niceselect.js"></script>
		<!-- Tilt Jquery JS -->
		<script src="../homejs/tilt.jquery.min.js"></script>
		<!-- Owl Carousel JS -->
        <script src="../homejs/owl-carousel.js"></script>
		<!-- counterup JS -->
		<script src="../homejs/jquery.counterup.min.js"></script>
		<!-- Steller JS -->
		<script src="../homejs/steller.js"></script>
		<!-- Wow JS -->
		<script src="../homejs/wow.min.js"></script>
		<!-- Magnific Popup JS -->
		<script src="../homejs/jquery.magnific-popup.min.js"></script>
		<!-- Counter Up CDN JS -->
		
		<!-- Bootstrap JS -->
		<script src="../homejs/bootstrap.min.js"></script>
		<!-- Main JS -->
		<script src="../homejs/main.js"></script>
        <script src="../js/getDetail.js"></script>
    </body>
</html>