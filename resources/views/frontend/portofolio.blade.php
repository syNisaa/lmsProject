@extends('frontend.templatelanding')

@section('contentlanding')
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="page-banner ovbl-dark" style="background-image:url(assets/images/banner/banner1.jpg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">Portfolio</h1>
				 </div>
            </div>
        </div>
		<!-- Breadcrumb row -->
		<div class="breadcrumb-row">
			<div class="container">
				<ul class="list-inline">
					<li><a href="#">Home</a></li>
					<li>Portfolio</li>
				</ul>
			</div>
		</div>
		<!-- Breadcrumb row END -->
        <!-- contact area -->
        <div class="content-block">
			<!-- Portfolio  -->
			<div class="section-area section-sp1 gallery-bx">
				<div class="container">
					<div class="feature-filters clearfix center m-b40">
						<ul class="filters" data-toggle="buttons">
							<li data-filter="" class="btn active">
								<input type="radio">
								<a href="#"><span>All</span></a> 
							</li>
							<li data-filter="book" class="btn">
								<input type="radio">
								<a href="#"><span>Book</span></a> 
							</li>
							<li data-filter="courses" class="btn">
								<input type="radio">
								<a href="#"><span>Courses</span></a> 
							</li>
							<li data-filter="education" class="btn">
								<input type="radio">
								<a href="#"><span>Education</span></a> 
							</li>
						</ul>
					</div>
					<div class="clearfix">
						<ul id="masonry" class="ttr-gallery-listing magnific-image row">
							<li class="action-card col-lg-3 col-md-4 col-sm-6 book">
								<div class="ttr-box portfolio-bx">
									<div class="ttr-media media-ov2 media-effect">
										<a href="javascript:void(0);">
											<img src="assets/images/portfolio/image_1.jpg" alt=""> 
										</a>
										<div class="ov-box">
											<div class="overlay-icon align-m"> 
												<a href="assets/images/portfolio/image_1.jpg" class="magnific-anchor" title="Title Come Here">
													<i class="ti-search"></i>
												</a>
											</div>
											<div class="portfolio-info-bx bg-primary">
												<h4><a href="#">Soft skills</a></h4>
												
											</div>
										</div>
									</div>
								</div>
							</li>
							<li class="action-card col-lg-3 col-md-4 col-sm-6 education book">
								<div class="ttr-box portfolio-bx">
									<div class="ttr-media media-ov2 media-effect">
										<a href="javascript:void(0);">
											<img src="assets/images/portfolio/image_2.jpg" alt=""> 
										</a>
										<div class="ov-box">
											<div class="overlay-icon align-m"> 
												<a href="assets/images/portfolio/image_2.jpg" class="magnific-anchor" title="Title Come Here">
													<i class="ti-search"></i>
												</a>
											</div>
											<div class="portfolio-info-bx bg-primary">
												<h4><a href="#">Soft skills</a></h4>
												
											</div>
										</div>
									</div>
								</div>
							</li>
							<li class="action-card col-lg-3 col-md-4 col-sm-6 courses">
								<div class="ttr-box portfolio-bx">
									<div class="ttr-media media-ov2 media-effect">
										<a href="javascript:void(0);">
											<img src="assets/images/portfolio/image_3.jpg" alt=""> 
										</a>
										<div class="ov-box">
											<div class="overlay-icon align-m"> 
												<a href="assets/images/portfolio/image_3.jpg" class="magnific-anchor" title="Title Come Here">
													<i class="ti-search"></i>
												</a>
											</div>
											<div class="portfolio-info-bx bg-primary">
												<h4><a href="#">Soft skills</a></h4>
												
											</div>
										</div>
									</div>
								</div>
							</li>
							<li class="action-card col-lg-3 col-md-4 col-sm-6 book education">
								<div class="ttr-box portfolio-bx">
									<div class="ttr-media media-ov2 media-effect">
										<a href="javascript:void(0);">
											<img src="assets/images/portfolio/image_4.jpg" alt=""> 
										</a>
										<div class="ov-box">
											<div class="overlay-icon align-m"> 
												<a href="assets/images/portfolio/image_4.jpg" class="magnific-anchor" title="Title Come Here">
													<i class="ti-search"></i>
												</a>
											</div>
											<div class="portfolio-info-bx bg-primary">
												<h4><a href="#">Soft skills</a></h4>
												
											</div>
										</div>
									</div>
								</div>
							</li>
							<li class="action-card col-lg-3 col-md-4 col-sm-6 courses">
								<div class="ttr-box portfolio-bx">
									<div class="ttr-media media-ov2 media-effect">
										<a href="javascript:void(0);">
											<img src="assets/images/portfolio/image_5.jpg" alt=""> 
										</a>
										<div class="ov-box">
											<div class="overlay-icon align-m"> 
												<a href="assets/images/portfolio/image_5.jpg" class="magnific-anchor" title="Title Come Here">
													<i class="ti-search"></i>
												</a>
											</div>
											<div class="portfolio-info-bx bg-primary">
												<h4><a href="#">Soft skills</a></h4>
												
											</div>
										</div>
									</div>
								</div>
							</li>
							<li class="action-card col-lg-3 col-md-4 col-sm-6 education">
								<div class="ttr-box portfolio-bx">
									<div class="ttr-media media-ov2 media-effect">
										<a href="javascript:void(0);">
											<img src="assets/images/portfolio/image_6.jpg" alt=""> 
										</a>
										<div class="ov-box">
											<div class="overlay-icon align-m"> 
												<a href="assets/images/portfolio/image_6.jpg" class="magnific-anchor" title="Title Come Here">
													<i class="ti-search"></i>
												</a>
											</div>
											<div class="portfolio-info-bx bg-primary">
												<h4><a href="#">Soft skills</a></h4>
												
											</div>
										</div>
									</div>
								</div>
							</li>
							<li class="action-card col-lg-3 col-md-4 col-sm-6 book">
								<div class="ttr-box portfolio-bx">
									<div class="ttr-media media-ov2 media-effect">
										<a href="javascript:void(0);">
											<img src="assets/images/portfolio/image_7.jpg" alt=""> 
										</a>
										<div class="ov-box">
											<div class="overlay-icon align-m"> 
												<a href="assets/images/portfolio/image_7.jpg" class="magnific-anchor" title="Title Come Here">
													<i class="ti-search"></i>
												</a>
											</div>
											<div class="portfolio-info-bx bg-primary">
												<h4><a href="#">Soft skills</a></h4>
												
											</div>
										</div>
									</div>
								</div>
							</li>
							<li class="action-card col-lg-3 col-md-4 col-sm-6 courses">
								<div class="ttr-box portfolio-bx">
									<div class="ttr-media media-ov2 media-effect">
										<a href="javascript:void(0);">
											<img src="assets/images/portfolio/image_8.jpg" alt=""> 
										</a>
										<div class="ov-box">
											<div class="overlay-icon align-m"> 
												<a href="assets/images/portfolio/image_8.jpg" class="magnific-anchor" title="Title Come Here">
													<i class="ti-search"></i>
												</a>
											</div>
											<div class="portfolio-info-bx bg-primary">
												<h4><a href="#">Soft skills</a></h4>
												
											</div>
										</div>
									</div>
								</div>
							</li>
							<li class="action-card col-lg-3 col-md-4 col-sm-6 education courses">
								<div class="ttr-box portfolio-bx">
									<div class="ttr-media media-ov2 media-effect">
										<a href="javascript:void(0);">
											<img src="assets/images/portfolio/image_9.jpg" alt=""> 
										</a>
										<div class="ov-box">
											<div class="overlay-icon align-m"> 
												<a href="assets/images/portfolio/image_9.jpg" class="magnific-anchor" title="Title Come Here">
													<i class="ti-search"></i>
												</a>
											</div>
											<div class="portfolio-info-bx bg-primary">
												<h4><a href="#">Soft skills</a></h4>
												
											</div>
										</div>
									</div>
								</div>
							</li>
							<li class="action-card col-lg-3 col-md-4 col-sm-6 book">
								<div class="ttr-box portfolio-bx">
									<div class="ttr-media media-ov2 media-effect">
										<a href="javascript:void(0);">
											<img src="assets/images/portfolio/image_10.jpg" alt=""> 
										</a>
										<div class="ov-box">
											<div class="overlay-icon align-m"> 
												<a href="assets/images/portfolio/image_10.jpg" class="magnific-anchor" title="Title Come Here">
													<i class="ti-search"></i>
												</a>
											</div>
											<div class="portfolio-info-bx bg-primary">
												<h4><a href="#">Soft skills</a></h4>
												
											</div>
										</div>
									</div>
								</div>
							</li>
							<li class="action-card col-lg-3 col-md-4 col-sm-6 courses">
								<div class="ttr-box portfolio-bx">
									<div class="ttr-media media-ov2 media-effect">
										<a href="javascript:void(0);">
											<img src="assets/images/portfolio/image_11.jpg" alt=""> 
										</a>
										<div class="ov-box">
											<div class="overlay-icon align-m"> 
												<a href="assets/images/portfolio/image_11.jpg" class="magnific-anchor" title="Title Come Here">
													<i class="ti-search"></i>
												</a>
											</div>
											<div class="portfolio-info-bx bg-primary">
												<h4><a href="#">Soft skills</a></h4>
												
											</div>
										</div>
									</div>
								</div>
							</li>
							<li class="action-card col-lg-3 col-md-4 col-sm-6 education book">
								<div class="ttr-box portfolio-bx">
									<div class="ttr-media media-ov2 media-effect">
										<a href="javascript:void(0);">
											<img src="assets/images/portfolio/image_12.jpg" alt=""> 
										</a>
										<div class="ov-box">
											<div class="overlay-icon align-m"> 
												<a href="assets/images/portfolio/image_12.jpg" class="magnific-anchor" title="Title Come Here">
													<i class="ti-search"></i>
												</a>
											</div>
											<div class="portfolio-info-bx bg-primary">
												<h4><a href="#">Soft skills</a></h4>
												
											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
        </div>
		<!-- contact area END -->
    </div>
    <!-- Content END-->
	<!-- Footer ==== -->
    <footer>
        <div class="footer-top">
			<div class="pt-exebar">
				<div class="container">
					<div class="d-flex align-items-stretch">
						<div class="pt-logo mr-auto">
							<a href="index.html"><img src="assets/images/logo-white.png" alt=""/></a>
						</div>
						<div class="pt-social-link">
							<ul class="list-inline m-a0">
								<li><a href="#" class="btn-link"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" class="btn-link"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#" class="btn-link"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#" class="btn-link"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
						<div class="pt-btn-join">
							<a href="#" class="btn ">Join Now</a>
						</div>
					</div>
				</div>
			</div>
            <div class="container">
                <div class="row">
					<div class="col-lg-4 col-md-12 col-sm-12 footer-col-4">
                        <div class="widget">
                            <h5 class="footer-title">Sign Up For A Newsletter</h5>
							<p class="text-capitalize m-b20">Weekly Breaking news analysis and cutting edge advices on job searching.</p>
                            <div class="subscribe-form m-b20">
								<form class="subscription-form" action="http://educhamp.themetrades.com/demo/assets/script/mailchamp.php" method="post">
									<div class="ajax-message"></div>
									<div class="input-group">
										<input name="email" required="required"  class="form-control" placeholder="Your Email Address" type="email">
										<span class="input-group-btn">
											<button name="submit" value="Submit" type="submit" class="btn"><i class="fa fa-arrow-right"></i></button>
										</span> 
									</div>
								</form>
							</div>
                        </div>
                    </div>
					<div class="col-12 col-lg-5 col-md-7 col-sm-12">
						<div class="row">
							<div class="col-4 col-lg-4 col-md-4 col-sm-4">
								<div class="widget footer_widget">
									<h5 class="footer-title">Company</h5>
									<ul>
										<li><a href="index.html">Home</a></li>
										<li><a href="about-1.html">About</a></li>
										<li><a href="faq-1.html">FAQs</a></li>
										<li><a href="contact-1.html">Contact</a></li>
									</ul>
								</div>
							</div>
							<div class="col-4 col-lg-4 col-md-4 col-sm-4">
								<div class="widget footer_widget">
									<h5 class="footer-title">Get In Touch</h5>
									<ul>
										<li><a href="http://educhamp.themetrades.com/admin/index.html">Dashboard</a></li>
										<li><a href="blog-classic-grid.html">Blog</a></li>
										<li><a href="portfolio.html">Portfolio</a></li>
										<li><a href="event.html">Event</a></li>
									</ul>
								</div>
							</div>
							<div class="col-4 col-lg-4 col-md-4 col-sm-4">
								<div class="widget footer_widget">
									<h5 class="footer-title">Courses</h5>
									<ul>
										<li><a href="courses.html">Courses</a></li>
										<li><a href="courses-details.html">Details</a></li>
										<li><a href="membership.html">Membership</a></li>
										<li><a href="profile.html">Profile</a></li>
									</ul>
								</div>
							</div>
						</div>
                    </div>
					<div class="col-12 col-lg-3 col-md-5 col-sm-12 footer-col-4">
                        <div class="widget widget_gallery gallery-grid-4">
                            <h5 class="footer-title">Our Gallery</h5>
                            <ul class="magnific-image">
								<li><a href="assets/images/gallery/pic1.jpg" class="magnific-anchor"><img src="assets/images/gallery/pic1.jpg" alt=""></a></li>
								<li><a href="assets/images/gallery/pic2.jpg" class="magnific-anchor"><img src="assets/images/gallery/pic2.jpg" alt=""></a></li>
								<li><a href="assets/images/gallery/pic3.jpg" class="magnific-anchor"><img src="assets/images/gallery/pic3.jpg" alt=""></a></li>
								<li><a href="assets/images/gallery/pic4.jpg" class="magnific-anchor"><img src="assets/images/gallery/pic4.jpg" alt=""></a></li>
								<li><a href="assets/images/gallery/pic5.jpg" class="magnific-anchor"><img src="assets/images/gallery/pic5.jpg" alt=""></a></li>
								<li><a href="assets/images/gallery/pic6.jpg" class="magnific-anchor"><img src="assets/images/gallery/pic6.jpg" alt=""></a></li>
								<li><a href="assets/images/gallery/pic7.jpg" class="magnific-anchor"><img src="assets/images/gallery/pic7.jpg" alt=""></a></li>
								<li><a href="assets/images/gallery/pic8.jpg" class="magnific-anchor"><img src="assets/images/gallery/pic8.jpg" alt=""></a></li>
							</ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center"> <a target="_blank" href="https://www.templateshub.net">Templates Hub</a></div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer END ==== -->
    <button class="back-to-top fa fa-chevron-up" ></button>
@endsection