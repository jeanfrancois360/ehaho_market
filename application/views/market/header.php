<!DOCTYPE html>
<html class="no-js" lang="zxx">


<!-- Mirrored from demo.devitems.com/greenfarm-v1/greenfarm/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Dec 2019 10:49:58 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title; ?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicon -->
	<link rel="icon" href="<?php echo base_url();?>assets/images/logo-login.ico">

	<!-- CSS
	============================================ -->
	<!-- Bootstrap CSS -->
	<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

	<!-- FontAwesome CSS -->
	<link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">

	<!-- Elegent CSS -->
	<link href="<?php echo base_url();?>assets/css/elegent.min.css" rel="stylesheet">

	<!-- Plugins CSS -->
	<link href="<?php echo base_url();?>assets/css/plugins.css" rel="stylesheet">

	<!-- Helper CSS -->
	<link href="<?php echo base_url();?>assets/css/helper.css" rel="stylesheet">

	<!-- Main CSS -->
	<link href="<?php echo base_url();?>assets/css/main.css" rel="stylesheet">

	<!-- Modernizer JS -->
	<script src="<?php echo base_url();?>assets/js/vendor/modernizr-2.8.3.min.js"></script>

	<style>
		/* scrollbar customization */
		::-webkit-scrollbar {
		  width:5px;
		}
		/* Track */
		::-webkit-scrollbar-track {
		  background: #fff;
		}
		/* Handle */
		::-webkit-scrollbar-thumb {
		  background: #3a8245;
		}
		/* Handle on hover */
		::-webkit-scrollbar-thumb:hover {
		  background: #3a8278;
		}
		.cart-floating-box{
			height: auto !important;
		}
		</style>
</head>

<body>

	<!--=============================================
	=            Header         =
	=============================================-->

	<header>
		<!--=======  header top  =======-->

		<div class="header-top pt-10 pb-10 pt-lg-10 pb-lg-10 pt-md-10 pb-md-10">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center text-sm-left">
						<!-- currncy language dropdown -->
						<div class="lang-currency-dropdown">
							<ul>
								<li> <a href="#">English <i class="fa fa-chevron-down"></i></a>
									<ul>
										<li><a href="#">French</a></li>
										<li><a href="#">Japanease</a></li>
									</ul>
								</li>
								<li><a href="#">Dollar <i class="fa fa-chevron-down"></i></a>
									<ul>
										<li><a href="#">Euro</a></li>
									</ul>
								</li>
							</ul>
						</div>
						<!-- end of currncy language dropdown -->
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12  text-center text-sm-right">
						<!-- header top menu -->
						<div class="header-top-menu">
							<ul>
								<li><a href="my-account.html">My account</a></li>
								<li><a href="wishlist.html">Wishlist</a></li>
								<li><a href="checkout">Checkout</a></li>
							</ul>
						</div>
						<!-- end of header top menu -->
					</div>
				</div>
			</div>
		</div>

		<!--=======  End of header top  =======-->

		<!--=======  header bottom  =======-->

		<div class="header-bottom header-bottom-one header-sticky">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-12 col-xs-12 text-lg-left text-md-center text-sm-center">
						<!-- logo -->
						<div class="logo mt-15 mb-15">
							<a href="index.html">
								<img src="<?php echo base_url();?>assets/images/logo-login.png" class="img-fluid" style="max-height:110px !important;" alt="">
							</a>
						</div>
						<!-- end of logo -->
					</div>
					<div class="col-md-9 col-sm-12 col-xs-12">
						<div class="menubar-top d-flex justify-content-between align-items-center flex-sm-wrap flex-md-wrap flex-lg-nowrap mt-sm-15">
							<!-- header phone number -->
							<div class="header-contact d-flex">
								<div class="phone-icon">
									<img src="<?php echo base_url();?>assets/images/icon-phone.png" class="img-fluid" alt="">
								</div>
								<div class="phone-number">
									Phone: <span class="number">+250-788-647-117</span>
								</div>
							</div>
							<!-- end of header phone number -->
							<!-- search bar -->
							<div class="header-advance-search">
								<form action="#">
									<input type="text" placeholder="Search your product">
									<button><span class="icon_search"></span></button>
								</form>
							</div>
							<!-- end of search bar -->
							<!-- shopping cart -->
							<div class="shopping-cart" id="shopping-cart">
								<a href="<?php echo base_url();?>cart">
									<div class="cart-icon d-inline-block">
										<span class="icon_bag_alt"></span>
									</div>
									<div class="cart-info d-inline-block">
										<p>Shopping Cart
											<span id="cart-title">
												0 items - 0.00 RWF
											</span>
										</p>
									</div>
								</a>
							<!-- end of shopping cart -->

							<!-- cart floating box -->
							<div class="cart-floating-box" id="cart-floating-box" style="height: auto !important;">
								<div class="cart-items" id="cart-items" style="padding-right: 20px !important; max-height: 180px !important; overflow-y: scroll !important;">
								</div>
								<div class="cart-calculation">
									<div class="calculation-details">
										<p class="total">Subtotal <span id="subtotal">0 RWF</span></p>
									</div>
									<div class="floating-cart-btn text-center">
										<a href="<?php echo base_url();?>checkout">Checkout</a>
										<a href="<?php echo base_url();?>cart">View Cart</a>
									</div>
								</div>
							</div>
							<!-- end of cart floating box -->
							</div>
						</div>

						<!-- navigation section -->
						<div class="main-menu">
							<nav>
								<ul>
									<li class="active menu-item-has-children"><a href="#">HOME</a>
										<ul class="sub-menu">
											<li><a href="index.html">Home Shop 1</a></li>
											<li><a href="index-2.html">Home Shop 2</a></li>
											<li><a href="index-3.html">Home Shop 3</a></li>
											<li><a href="index-4.html">Home Shop 4</a></li>
										</ul>
									</li>
									<li class="menu-item-has-children"><a href="shop-left-sidebar.html">Shop</a>
										<ul class="sub-menu">
											<li class="menu-item-has-children"><a href="shop-4-column.html">shop grid</a>
												<ul class="sub-menu">
													<li><a href="shop-3-column.html">shop 3 column</a></li>
													<li><a href="shop-4-column.html">shop 4 column</a></li>
													<li><a href="shop-left-sidebar.html">shop left sidebar</a></li>
													<li><a href="shop-right-sidebar.html">shop right sidebar</a></li>
												</ul>
											</li>
											<li class="menu-item-has-children"><a href="shop-list.html">shop List</a>
												<ul class="sub-menu">
													<li><a href="shop-list.html">shop List</a></li>
													<li><a href="shop-list-left-sidebar.html">shop List Left Sidebar</a></li>
													<li><a href="shop-list-right-sidebar.html">shop List Right Sidebar</a></li>
												</ul>
											</li>
											<li class="menu-item-has-children"><a href="single-product.html">Single Product</a>
												<ul class="sub-menu">
													<li><a href="single-product.html">Single Product</a></li>
													<li><a href="single-product-variable.html">Single Product variable</a></li>
													<li><a href="single-product-affiliate.html">Single Product affiliate</a></li>
													<li><a href="single-product-group.html">Single Product group</a></li>
													<li><a href="single-product-tabstyle-2.html">Tab Style 2</a></li>
													<li><a href="single-product-tabstyle-3.html">Tab Style 3</a></li>
													<li><a href="single-product-gallery-left.html">Gallery Left</a></li>
													<li><a href="single-product-gallery-right.html">Gallery Right</a></li>
													<li><a href="single-product-sticky-left.html">Sticky Left</a></li>
													<li><a href="single-product-sticky-right.html">Sticky Right</a></li>
													<li><a href="single-product-slider-box.html">Slider Box</a></li>

												</ul>
											</li>
										</ul>
									</li>
									<li class="menu-item-has-children"><a href="#">PAGES</a>
										<ul class="mega-menu three-column">
											<li><a href="#">Column One</a>
												<ul>
													<li><a href="cart">Cart</a></li>
													<li><a href="checkout">Checkout</a></li>
													<li><a href="wishlist.html">Wishlist</a></li>

												</ul>
											</li>
											<li><a href="#">Column Two</a>
												<ul>
													<li><a href="my-account.html">My Account</a></li>
													<li><a href="login-register.html">Login Register</a></li>
													<li><a href="faq.html">FAQ</a></li>
												</ul>
											</li>
											<li><a href="#">Column Three</a>
												<ul>
													<li><a href="compare.html">Compare</a></li>
													<li><a href="contact.html">Contact</a></li>
												</ul>
											</li>
										</ul>
									</li>
									<li class="menu-item-has-children"><a href="#">BLOG</a>
										<ul class="sub-menu">
											<li><a href="blog-3-column.html">Blog 3 column</a></li>
											<li><a href="blog-grid-left-sidebar.html">Blog Grid Left Sidebar</a></li>
											<li><a href="blog-grid-right-sidebar.html">Blog Grid Right Sidebar</a></li>
											<li><a href="blog-list-left-sidebar.html">Blog List Left Sidebar</a></li>
											<li><a href="blog-list-right-sidebar.html">Blog List Right Sidebar</a></li>
											<li><a href="blog-post-left-sidebar.html">Blog Post Left Sidebar</a></li>
											<li><a href="blog-post-right-sidebar.html">Blog Post Right Sidebar</a></li>
											<li><a href="blog-post-image-format.html">Blog Post Image Format</a></li>
											<li><a href="blog-post-image-gallery.html">Blog Post Image Gallery Format</a></li>
											<li><a href="blog-post-audio-format.html">Blog Post Audio Format</a></li>
											<li><a href="blog-post-video-format.html">Blog Post Video Format</a></li>
										</ul>
									</li>
									<li><a href="contact.html">CONTACT</a></li>
								</ul>
							</nav>
						</div>
						<!-- end of navigation section -->
					</div>
					<div class="col-12">
						<!-- Mobile Menu -->
						<div class="mobile-menu d-block d-lg-none"></div>
					</div>
				</div>
			</div>
		</div>

		<!--=======  End of header bottom  =======-->
	</header>

	<!--=====  End of Header  ======-->
