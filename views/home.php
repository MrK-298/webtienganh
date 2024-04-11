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
		<!-- Favicon -->
        <link rel="icon" href="../images/favicon.png">
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<!-- Nice Select CSS -->
		<link rel="stylesheet" href="../css/nice-select.css">
		<!-- Font Awesome CSS -->
        <link rel="stylesheet" href="../css/font-awesome.min.css">
		<!-- icofont CSS -->
        <link rel="stylesheet" href="../css/icofont.css">
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
									<a href="../views/home.php"><img src="../images/logo1.png" alt="#"></a>
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
													<li><a href="chooseExam.php">Test</a></li>
												</ul>
											</li>
											<li><a href="#">Blogs <i class="fas fa-chevron-down"></i></a>
												<ul class="dropdown">
													<li><a href="blog-single.html">Blog Details</a></li>
												</ul>
											</li>
											<li><a href="contact.html">Contact Us</a></li>
											<?php
												if(isset($_SESSION['login']['username'])) {
													echo '<li><a href="../views/profile.php?username=' . $_SESSION['login']['username'] . '">Profile</a></li>';
													echo '<li><a href="../views/listexamdone.php?username=' . $_SESSION['login']['username'] . '">DoneExam</a></li>';
												}                                 
                                    		?>          
										</ul>
									</nav>
								</div>
								<!--/ End Main Menu -->
							</div>
							<div class="col-lg-2 col-12">
								<div class="get-quote">
                                    <?php
                                      if(isset($_SESSION['login']['username'])) {
										echo "Xin chào <b>{$_SESSION['login']['username']}</b>";
										echo '<a href="../function/logout.php" class="btn">Logout</a>';
                                       }else {
                                        echo '<a href="loginview.php" class="btn">Login</a>';
                                       }                                   
                                    ?>                                   									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Header Inner -->
		</header>
		<!-- End Header Area -->
		
		<!-- Slider Area -->
		<section class="slider">
			<div class="hero-slider">
				<!-- Start Single Slider -->
				<div class="single-slider" style="background-image:url('../images/nen.jpg')">
					<div class="container">
						<div class="row">
							<div class="col-lg-7">
								<div class="text">
									<h1>We provide <span>Test Preparation</span> you can <span>trust!</span></h1>
									<p>Welcome to 8bit, a free 8bit website that provides learners with numerous practice tests divided into parts, mock tests as well as vocabulary and grammar exercises. Start off your journey of conquering the 8bit certificate with practice tests on our website now! </p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End Single Slider -->
				<!-- Start Single Slider -->
				<div class="single-slider" style="background-image:url('../images/nen.jpg')">
					<div class="container">
						<div class="row">
							<div class="col-lg-7">
								<div class="text">
									<h1>We provide <span>Test Preparation</span> you can <span>trust!</span></h1>
									<p>Welcome to 8bit, a free 8bit website that provides learners with numerous practice tests divided into parts, mock tests as well as vocabulary and grammar exercises. Start off your journey of conquering the 8bit certificate with practice tests on our website now! </p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Start End Slider -->
				<!-- Start Single Slider -->
				<div class="single-slider" style="background-image:url('../images/nen.jpg')">
					<div class="container">
						<div class="row">
							<div class="col-lg-7">
								<div class="text">
									<h1>We provide <span>Test Preparation</span> you can <span>trust!</span></h1>
									<p>Welcome to 8bit, a free 8bit website that provides learners with numerous practice tests divided into parts, mock tests as well as vocabulary and grammar exercises. Start off your journey of conquering the 8bit certificate with practice tests on our website now! </p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End Single Slider -->
			</div>
		</section>
		<!--/ End Slider Area -->
		
		<!-- Start Schedule Area -->
		<section class="schedule">
			<div class="container">
				<div class="schedule-inner">
					<div class="row">
						<div class="col-lg-4 col-md-6 col-12 "> 
							<!-- single-schedule -->
							<div class="single-schedule first">
								<div class="inner">								
									<div class="single-content">
										<span>English certificate</span>
										<h4>TOEIC</h4>
										<p>TOEIC – The Test of English for International Communication là một bài kiểm tra tiếng Anh tiêu chuẩn dành cho những người đi làm.</p>
										<a href="#">LEARN MORE<i class="fas fa-long-arrow-alt-right"></i></a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-12">
							<!-- single-schedule -->
							<div class="single-schedule middle">
								<div class="inner">
									<div class="single-content">
										<span>English certificate</span>
										<h4>IELTS</h4>
										<p>The International English Language Testing System (IELTS).IELTS do Hội đồng Anh, IDP: IELTS Australia và Cambridge English đồng sở hữu.</p>
										<a href="#">LEARN MORE<i class="fas fa-long-arrow-alt-right"></i></i></a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-12 col-12">
							<!-- single-schedule -->
							<div class="single-schedule last">
								<div class="inner">									
									<div class="single-content">
										<span>English certificate</span>
										<h4>TOEFL</h4>
										<p>TOEFL (Test of English as a Foreign Language) là một bài kiểm tra tiêu chuẩn để đánh giá mức độ thông thạo ngôn ngữ tiếng Anh.</p>
										<a href="#">LEARN MORE<i class="fas fa-long-arrow-alt-right"></i></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/End Start schedule Area -->
		
		<!-- Start service -->
		<section class="services section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title">
							<h2>Start your 8Bit Online Full Test Now!</h2>
							<img src="../images/section-img.png" alt="#">
							<p>Welcome to 8bit, a free 8bit website that provides learners with numerous practice tests divided into parts, mock tests as well as vocabulary and grammar exercises. Start off your journey of conquering the 8bit certificate with practice tests on our website now!</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
                        <i class="fas fa-tasks"></i>
							<h4><a href="service-details.html">Exam</a></h4>
							<p> Online Toeic test preparation is one of the best ways to get familiar with the test format as well as know your current progress, from there, make a suitable test preparation plan to achieve a high score. </p>	
						</div>
						<!-- End Single Service -->
					</div>
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
                        <i class="fas fa-headphones-alt"></i>
							<h4><a href="service-details.html">Listening</a></h4>
							<p>On this page you can find all the essential information about Listening test, learn how Listening test is scored and see useful practice tests, tips and strategies to improve your listening skills. </p>	
						</div>
						<!-- End Single Service -->
					</div>
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
                        <i class="fas fa-book-open"></i>
							<h4><a href="service-details.html">Reading</a></h4>
							<p>Here you can find full Reading Test Samples for reading practice. All tests are constantly being renewed and correspond to the real exam sections. </p>	
						</div>
						<!-- End Single Service -->
					</div>
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
							<i class="fas fa-tasks"></i>
							<h4><a href="service-details.html">Full Test</a></h4>
							<p>8 Bit will make your test preparation process easier through extremely reputable Toeic 4 skills test preparation articles with answers - detailed explanations right below. </p>	
						</div>
						<!-- End Single Service -->
					</div>
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
                        <i class="fas fa-volume-up"></i>
							<h4><a href="service-details.html">Speaking</a></h4>
							<p>In this section you will find all information you need about Speaking test. You will also see full Speaking sample with explanations, find useful links for Speaking practice, advanced vocabulary. </p>	
						</div>
						<!-- End Single Service -->
					</div>
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
                        <i class="fas fa-pen"></i>
							<h4><a href="service-details.html">writing</a></h4>
							<p>On this page you can find all the information about Writing, see Writing topics, try useful Writing lessons and tips and see Writing samples. </p>	
						</div>
						<!-- End Single Service -->
					</div>
				</div>
			</div>
		</section>
		<!--/ End service -->

		<!-- Footer Area -->
		<footer id="footer" class="footer ">
			<!-- Footer Top -->
			<div class="footer-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-6 col-6">
							<div class="single-footer">
								<h2>About Us</h2>
								<p>Welcome to 8bit, a free 8bit website that provides learners with numerous practice tests divided into parts, mock tests as well as vocabulary and grammar exercises. Start off your journey of conquering the 8bit certificate with practice tests on our website now!</p>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Footer Top -->
			
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
        <script src="../homes/jquery.nav.js"></script>
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
		<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="../homejs/bootstrap.min.js"></script>
		<!-- Main JS -->
		<script src="../homejs/main.js"></script>
    </body>
</html>