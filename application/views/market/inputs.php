<!DOCTYPE html>
<html class="no-js" lang="zxx">


<!-- Mirrored from demo.devitems.com/greenfarm-v1/greenfarm/shop-list-right-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Dec 2019 10:51:15 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title; ?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicon -->
	<link rel="icon" href="assets/images/logo-login.ico">

	<!-- CSS
	============================================ -->
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">

	<!-- FontAwesome CSS -->
	<link href="assets/css/font-awesome.min.css" rel="stylesheet">

	<!-- Elegent CSS -->
	<link href="assets/css/elegent.min.css" rel="stylesheet">

	<!-- Plugins CSS -->
	<link href="assets/css/plugins.css" rel="stylesheet">

	<!-- Helper CSS -->
	<link href="assets/css/helper.css" rel="stylesheet">

	<!-- Main CSS -->
	<link href="assets/css/main.css" rel="stylesheet">

	<!-- Modernizer JS -->
	<script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>

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
								<li><a href="checkout.html">Checkout</a></li>
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
								<img src="assets/images/logo-login.png" class="img-fluid" style="max-height:110px !important;" alt="">
							</a>
						</div>
						<!-- end of logo -->
					</div>
					<div class="col-md-9 col-sm-12 col-xs-12">
						<div class="menubar-top d-flex justify-content-between align-items-center flex-sm-wrap flex-md-wrap flex-lg-nowrap mt-sm-15">
							<!-- header phone number -->
							<div class="header-contact d-flex">
								<div class="phone-icon">
									<img src="assets/images/icon-phone.png" class="img-fluid" alt="">
								</div>
								<div class="phone-number">
									Phone: <span class="number">1-888-123-456-89</span>
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
								<a href="cart">
									<div class="cart-icon d-inline-block">
										<span class="icon_bag_alt"></span>
									</div>
									<div class="cart-info d-inline-block">
										<p>Shopping Cart 
											<span>
												0 items - $0.00 
											</span>
										</p>
									</div>
								</a>
							<!-- end of shopping cart -->

							<!-- cart floating box -->
							<div class="cart-floating-box" id="cart-floating-box">
								<div class="cart-items">
									<div class="cart-float-single-item d-flex">
										<span class="remove-item"><a href="#"><i class="fa fa-times"></i></a></span>
										<div class="cart-float-single-item-image">
											<a href="single-product.html"><img src="assets/images/products/product01.jpg" class="img-fluid" alt=""></a>
										</div>
										<div class="cart-float-single-item-desc">
											<p class="product-title"> <a href="single-product.html">Duis pulvinar obortis eleifend </a></p>
											<p class="price"><span class="count">1x</span> $20.50</p>
										</div>
									</div>
									<div class="cart-float-single-item d-flex">
										<span class="remove-item"><a href="#"><i class="fa fa-times"></i></a></span>
										<div class="cart-float-single-item-image">
											<a href="single-product.html"><img src="assets/images/products/product02.jpg" class="img-fluid" alt=""></a>
										</div>
										<div class="cart-float-single-item-desc">
											<p class="product-title"> <a href="single-product.html">Fusce ultricies dolor vitae</a></p>
											<p class="price"><span class="count">1x</span> $20.50</p>
										</div>
									</div>
								</div>
								<div class="cart-calculation">
									<div class="calculation-details">
										<p class="total">Subtotal <span>$22</span></p>
									</div>
									<div class="floating-cart-btn text-center">
										<a href="checkout.html">Checkout</a>
										<a href="cart">View Cart</a>
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
													<li><a href="checkout.html">Checkout</a></li>
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

	<!--=============================================
    =            breadcrumb area         =
    =============================================-->
    
    <div class="breadcrumb-area mb-50">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="breadcrumb-container">
						<ul>
							<li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
							<li class="active">Shop</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!--=====  End of breadcrumb area  ======-->

  
	<!--=============================================
	=            Shop page container         =
	=============================================-->
	
	<div class="shop-page-container mb-50">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 order-2">
					<!--=======  sidebar area  =======-->
					
					<div class="sidebar-area">
						<!--=======  single sidebar  =======-->
						
						<div class="sidebar mb-35">
							<h3 class="sidebar-title">PRODUCT CATEGORIES</h3>
							<ul class="product-categories">
								<li><a class="active" href="shop-left-sidebar.html">Beans</a></li>
								<li><a href="shop-left-sidebar.html">Bread</a></li>
								<li><a href="shop-left-sidebar.html">Eggs</a></li>
								<li><a href="shop-left-sidebar.html">Fruits</a></li>
								<li><a href="shop-left-sidebar.html">Salads</a></li>
								<li><a href="shop-left-sidebar.html">Fast Foods</a></li>
								<li><a href="shop-left-sidebar.html">Fish & Meats</a></li>
								<li><a href="shop-left-sidebar.html">Uncategorized</a></li>
							</ul>
						</div>
						
						<!--=======  End of single sidebar  =======-->

						<!--=======  single sidebar  =======-->
						
						<div class="sidebar mb-35">
							<h3 class="sidebar-title">Filter By</h3>
							<ul class="product-categories">
								<li><a class="active" href="shop-left-sidebar.html">Gold</a></li>
								<li><a href="shop-left-sidebar.html">Green</a></li>
								<li><a href="shop-left-sidebar.html">White</a></li>
							</ul>
						</div>
						
						<!--=======  End of single sidebar  =======-->

						<!--=======  single sidebar  =======-->
						
						<div class="sidebar mb-35">
							<h3 class="sidebar-title">Filter By Price</h3>
							<div class="sidebar-price">
								<div id="price-range"></div>
								<input type="text" id="price-amount" readonly>
							</div>
						</div>
						
						<!--=======  End of single sidebar  =======-->

						<!--=======  single sidebar  =======-->
						
						<div class="sidebar mb-35">
							<h3 class="sidebar-title">Compare</h3>

							<!--=======  compare product container  =======-->
							
							<ul class="product-list">
								<li>
									<a href="single-product.html" class="remove" title="Remove">x</a>
									<a class="title" href="single-product.html">Cillum dolore tortor nisl fermentum</a>
								</li>
								<li>
									<a href="single-product.html" class="remove" title="Remove">x</a>
									<a class="title" href="single-product.html">Condimentum posuere consectetur</a>
								</li>
							</ul>
							<div class="compare-btns">
								<a href="#" class="clear-all">Clear all</a>
								<a href="#" class="compare">Compare</a>
							</div>

							<!--=======  End of compare product container  =======-->
							
						</div>
						
						<!--=======  End of single sidebar  =======-->

						<!--=======  single sidebar  =======-->
						
						<div class="sidebar mb-35">
							<h3 class="sidebar-title">Top rated products</h3>
							
							<!--=======  top rated product container  =======-->
							
							<div class="top-rated-product-container">
								<!--=======  single top rated product  =======-->
								
								<div class="single-top-rated-product d-flex align-content-center">
									<div class="image">
										<a href="single-product.html">
											<img src="assets/images/products/product01.jpg" class="img-fluid" alt="">
										</a>
									</div>
									<div class="content">
										<p><a href="single-product.html">Eodem modo vel mattis</a></p>
										<p class="product-rating">
											<i class="fa fa-star active"></i>
											<i class="fa fa-star active"></i>
											<i class="fa fa-star active"></i>
											<i class="fa fa-star active"></i>
											<i class="fa fa-star active"></i>
										</p>

										<p class="product-price"> 
											<span class="discounted-price"> $10.00</span>
											<span class="main-price">$12.90</span> 
											
										</p>
									</div>
								</div>
								
								<!--=======  End of single top rated product  =======-->
								<!--=======  single top rated product  =======-->
								
								<div class="single-top-rated-product d-flex align-content-center">
									<div class="image">
										<a href="single-product.html">
											<img src="assets/images/products/product02.jpg" class="img-fluid" alt="">
										</a>
									</div>
									<div class="content">
										<p><a href="single-product.html">Mirum est notare tellus</a></p>
										<p class="product-rating">
											<i class="fa fa-star active"></i>
											<i class="fa fa-star active"></i>
											<i class="fa fa-star active"></i>
											<i class="fa fa-star active"></i>
											<i class="fa fa-star active"></i>
										</p>

										<p class="product-price"> 
											<span class="discounted-price"> $10.00</span>
											<span class="main-price">$12.90</span> 
											
										</p>
									</div>
								</div>
								
								<!--=======  End of single top rated product  =======-->
								<!--=======  single top rated product  =======-->
								
								<div class="single-top-rated-product d-flex align-content-center">
									<div class="image">
										<a href="single-product.html">
											<img src="assets/images/products/product03.jpg" class="img-fluid" alt="">
										</a>
									</div>
									<div class="content">
										<p><a href="single-product.html">Aliquam lobortis est turpis</a></p>
										<p class="product-rating">
											<i class="fa fa-star active"></i>
											<i class="fa fa-star active"></i>
											<i class="fa fa-star active"></i>
											<i class="fa fa-star active"></i>
											<i class="fa fa-star active"></i>
										</p>

										<p class="product-price"> 
											<span class="discounted-price"> $10.00</span>
											<span class="main-price">$12.90</span> 
											
										</p>
									</div>
								</div>
								
								<!--=======  End of single top rated product  =======-->
								
							</div>
							
							<!--=======  End of top rated product container  =======-->
						</div>
						
						<!--=======  End of single sidebar  =======-->

						<!--=======  single sidebar  =======-->
						
						<div class="sidebar">
							<h3 class="sidebar-title">Product Tags</h3>
							<!--=======  tag container  =======-->
							
							<ul class="tag-container">
								<li><a href="shop-left-sidebar.html">new</a> </li>
								<li><a href="shop-left-sidebar.html">bags</a> </li>
								<li><a href="shop-left-sidebar.html">new</a> </li>
								<li><a href="shop-left-sidebar.html">kids</a> </li>
								<li><a href="shop-left-sidebar.html">fashion</a> </li>
								<li><a href="shop-left-sidebar.html">Accessories</a> </li>
							</ul>
							
							<!--=======  End of tag container  =======-->
						</div>
						
						<!--=======  End of single sidebar  =======-->
					</div>
					
					<!--=======  End of sidebar area  =======-->
				</div>
				<div class="col-lg-9 order-1 mb-sm-35 mb-xs-35">

					<!--=======  shop page banner  =======-->
					
					<div class="shop-page-banner mb-35">
						<a href="shop-left-sidebar.html">
							<img src="assets/images/banners/shop-banner.jpg" class="img-fluid" alt="">
						</a>
					</div>
					
					<!--=======  End of shop page banner  =======-->

					<!--=======  Shop header  =======-->
					
					<div class="shop-header mb-35">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-12 d-flex align-items-center">
								<!--=======  view mode  =======-->
								
								<div class="view-mode-icons mb-xs-10">
									<a href="#" data-target="grid"><i class="fa fa-th"></i></a>
									<a class="active" href="#" data-target="list"><i class="fa fa-list"></i></a>
								</div>
								
								<!--=======  End of view mode  =======-->
								
							</div>
							<div class="col-lg-8 col-md-8 col-sm-12 d-flex flex-column flex-sm-row justify-content-between align-items-left align-items-sm-center">
								<!--=======  Sort by dropdown  =======-->
								
								<div class="sort-by-dropdown d-flex align-items-center mb-xs-10">
									<p class="mr-10">Sort By: </p>
									<select name="sort-by" id="sort-by" class="nice-select">
										<option value="0">Sort By Popularity</option>
										<option value="0">Sort By Average Rating</option>
										<option value="0">Sort By Newness</option>
										<option value="0">Sort By Price: Low to High</option>
										<option value="0">Sort By Price: High to Low</option>
									</select>
								</div>
								
								<!--=======  End of Sort by dropdown  =======-->

								<p class="result-show-message">Showing 1–12 of 41 results</p>
							</div>
						</div>
					</div>
					
					<!--=======  End of Shop header  =======-->

					<!--=======  Grid list view  =======-->
					
					<div class="shop-product-wrap list row no-gutters mb-35">
						
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
								<!--=======  Grid view product  =======-->
								
								<div class="gf-product shop-grid-view-product">
									<div class="image">
										<a href="single-product.html">
											<span class="onsale">Sale!</span>
											<img src="assets/images/products/product03.jpg" class="img-fluid" alt="">
										</a>
										<div class="product-hover-icons">
											<a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
											<a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
											<a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
											<a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
										</div>
									</div>
									<div class="product-content">
										<div class="product-categories">
											<a href="shop-left-sidebar.html">Fast Foods</a>,
											<a href="shop-left-sidebar.html">Vegetables</a>
										</div>
										<h3 class="product-title"><a href="single-product.html">Ornare sed consequat nisl eget</a></h3>
										<div class="price-box">
											<span class="main-price">$89.00</span>
											<span class="discounted-price">$80.00</span>
										</div>
									</div>
									
								</div>
								
								<!--=======  End of Grid view product  =======-->
	
								<!--=======  Shop list view product  =======-->
								
								<div class="gf-product shop-list-view-product">
									<div class="image">
										<a href="single-product.html">
											<span class="onsale">Sale!</span>
											<img src="assets/images/products/product03.jpg" class="img-fluid" alt="">
										</a>
										<div class="product-hover-icons">
											<a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
										</div>
									</div>
									<div class="product-content">
										<div class="product-categories">
											<a href="shop-left-sidebar.html">Fast Foods</a>,
											<a href="shop-left-sidebar.html">Vegetables</a>
										</div>
										<h3 class="product-title"><a href="single-product.html">Ornare sed consequat nisl eget</a></h3>
										<div class="price-box mb-20">
											<span class="main-price">$89.00</span>
											<span class="discounted-price">$80.00</span>
										</div>
										<p class="product-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere esse tempora magnam dolorem tenetur eos eligendi non temporibus qui enim. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, magni.</p>
										<div class="list-product-icons">
											<a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
											<a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
											<a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
										</div>
									</div>
									
								</div>
							
							<!--=======  End of Shop list view product  =======-->
							</div>
	
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
								<!--=======  Grid view product  =======-->
								
								<div class="gf-product shop-grid-view-product">
									<div class="image">
										<a href="single-product.html">
											<span class="onsale">Sale!</span>
											<img src="assets/images/products/product04.jpg" class="img-fluid" alt="">
										</a>
										<div class="product-hover-icons">
											<a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
											<a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
											<a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
											<a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
										</div>
									</div>
									<div class="product-content">
										<div class="product-categories">
											<a href="shop-left-sidebar.html">Fast Foods</a>,
											<a href="shop-left-sidebar.html">Vegetables</a>
										</div>
										<h3 class="product-title"><a href="single-product.html">Ornare sed consequat nisl eget</a></h3>
										<div class="price-box">
											<span class="main-price">$89.00</span>
											<span class="discounted-price">$80.00</span>
										</div>
									</div>
									
								</div>
								
								<!--=======  End of Grid view product  =======-->
	
								<!--=======  Shop list view product  =======-->
								
								<div class="gf-product shop-list-view-product">
									<div class="image">
										<a href="single-product.html">
											<span class="onsale">Sale!</span>
											<img src="assets/images/products/product04.jpg" class="img-fluid" alt="">
										</a>
										<div class="product-hover-icons">
											<a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
										</div>
									</div>
									<div class="product-content">
										<div class="product-categories">
											<a href="shop-left-sidebar.html">Fast Foods</a>,
											<a href="shop-left-sidebar.html">Vegetables</a>
										</div>
										<h3 class="product-title"><a href="single-product.html">Ornare sed consequat nisl eget</a></h3>
										<div class="price-box mb-20">
											<span class="main-price">$89.00</span>
											<span class="discounted-price">$80.00</span>
										</div>
										<p class="product-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere esse tempora magnam dolorem tenetur eos eligendi non temporibus qui enim. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, magni.</p>
										<div class="list-product-icons">
											<a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
											<a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
											<a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
										</div>
									</div>
									
								</div>
							
							<!--=======  End of Shop list view product  =======-->
							</div>
	
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
								<!--=======  Grid view product  =======-->
								
								<div class="gf-product shop-grid-view-product">
									<div class="image">
										<a href="single-product.html">
											<span class="onsale">Sale!</span>
											<img src="assets/images/products/product05.jpg" class="img-fluid" alt="">
										</a>
										<div class="product-hover-icons">
											<a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
											<a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
											<a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
											<a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
										</div>
									</div>
									<div class="product-content">
										<div class="product-categories">
											<a href="shop-left-sidebar.html">Fast Foods</a>,
											<a href="shop-left-sidebar.html">Vegetables</a>
										</div>
										<h3 class="product-title"><a href="single-product.html">Ornare sed consequat nisl eget</a></h3>
										<div class="price-box">
											<span class="main-price">$89.00</span>
											<span class="discounted-price">$80.00</span>
										</div>
									</div>
									
								</div>
								
								<!--=======  End of Grid view product  =======-->
	
								<!--=======  Shop list view product  =======-->
								
								<div class="gf-product shop-list-view-product">
									<div class="image">
										<a href="single-product.html">
											<span class="onsale">Sale!</span>
											<img src="assets/images/products/product05.jpg" class="img-fluid" alt="">
										</a>
										<div class="product-hover-icons">
											<a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
										</div>
									</div>
									<div class="product-content">
										<div class="product-categories">
											<a href="shop-left-sidebar.html">Fast Foods</a>,
											<a href="shop-left-sidebar.html">Vegetables</a>
										</div>
										<h3 class="product-title"><a href="single-product.html">Ornare sed consequat nisl eget</a></h3>
										<div class="price-box mb-20">
											<span class="main-price">$89.00</span>
											<span class="discounted-price">$80.00</span>
										</div>
										<p class="product-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere esse tempora magnam dolorem tenetur eos eligendi non temporibus qui enim. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, magni.</p>
										<div class="list-product-icons">
											<a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
											<a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
											<a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
										</div>
									</div>
									
								</div>
							
							<!--=======  End of Shop list view product  =======-->
							</div>
	
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
								<!--=======  Grid view product  =======-->
								
								<div class="gf-product shop-grid-view-product">
									<div class="image">
										<a href="single-product.html">
											<span class="onsale">Sale!</span>
											<img src="assets/images/products/product06.jpg" class="img-fluid" alt="">
										</a>
										<div class="product-hover-icons">
											<a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
											<a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
											<a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
											<a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
										</div>
									</div>
									<div class="product-content">
										<div class="product-categories">
											<a href="shop-left-sidebar.html">Fast Foods</a>,
											<a href="shop-left-sidebar.html">Vegetables</a>
										</div>
										<h3 class="product-title"><a href="single-product.html">Ornare sed consequat nisl eget</a></h3>
										<div class="price-box">
											<span class="main-price">$89.00</span>
											<span class="discounted-price">$80.00</span>
										</div>
									</div>
									
								</div>
								
								<!--=======  End of Grid view product  =======-->
	
								<!--=======  Shop list view product  =======-->
								
								<div class="gf-product shop-list-view-product">
									<div class="image">
										<a href="single-product.html">
											<span class="onsale">Sale!</span>
											<img src="assets/images/products/product06.jpg" class="img-fluid" alt="">
										</a>
										<div class="product-hover-icons">
											<a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
										</div>
									</div>
									<div class="product-content">
										<div class="product-categories">
											<a href="shop-left-sidebar.html">Fast Foods</a>,
											<a href="shop-left-sidebar.html">Vegetables</a>
										</div>
										<h3 class="product-title"><a href="single-product.html">Ornare sed consequat nisl eget</a></h3>
										<div class="price-box mb-20">
											<span class="main-price">$89.00</span>
											<span class="discounted-price">$80.00</span>
										</div>
										<p class="product-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere esse tempora magnam dolorem tenetur eos eligendi non temporibus qui enim. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, magni.</p>
										<div class="list-product-icons">
											<a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
											<a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
											<a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
										</div>
									</div>
									
								</div>
							
							<!--=======  End of Shop list view product  =======-->
							</div>
	
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
								<!--=======  Grid view product  =======-->
								
								<div class="gf-product shop-grid-view-product">
									<div class="image">
										<a href="single-product.html">
											<span class="onsale">Sale!</span>
											<img src="assets/images/products/product07.jpg" class="img-fluid" alt="">
										</a>
										<div class="product-hover-icons">
											<a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
											<a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
											<a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
											<a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
										</div>
									</div>
									<div class="product-content">
										<div class="product-categories">
											<a href="shop-left-sidebar.html">Fast Foods</a>,
											<a href="shop-left-sidebar.html">Vegetables</a>
										</div>
										<h3 class="product-title"><a href="single-product.html">Ornare sed consequat nisl eget</a></h3>
										<div class="price-box">
											<span class="main-price">$89.00</span>
											<span class="discounted-price">$80.00</span>
										</div>
									</div>
									
								</div>
								
								<!--=======  End of Grid view product  =======-->
	
								<!--=======  Shop list view product  =======-->
								
								<div class="gf-product shop-list-view-product">
									<div class="image">
										<a href="single-product.html">
											<span class="onsale">Sale!</span>
											<img src="assets/images/products/product07.jpg" class="img-fluid" alt="">
										</a>
										<div class="product-hover-icons">
											<a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
										</div>
									</div>
									<div class="product-content">
										<div class="product-categories">
											<a href="shop-left-sidebar.html">Fast Foods</a>,
											<a href="shop-left-sidebar.html">Vegetables</a>
										</div>
										<h3 class="product-title"><a href="single-product.html">Ornare sed consequat nisl eget</a></h3>
										<div class="price-box mb-20">
											<span class="main-price">$89.00</span>
											<span class="discounted-price">$80.00</span>
										</div>
										<p class="product-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere esse tempora magnam dolorem tenetur eos eligendi non temporibus qui enim. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, magni.</p>
										<div class="list-product-icons">
											<a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
											<a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
											<a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
										</div>
									</div>
									
								</div>
							
							<!--=======  End of Shop list view product  =======-->
							</div>
	
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
								<!--=======  Grid view product  =======-->
								
								<div class="gf-product shop-grid-view-product">
									<div class="image">
										<a href="single-product.html">
											<span class="onsale">Sale!</span>
											<img src="assets/images/products/product08.jpg" class="img-fluid" alt="">
										</a>
										<div class="product-hover-icons">
											<a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
											<a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
											<a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
											<a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
										</div>
									</div>
									<div class="product-content">
										<div class="product-categories">
											<a href="shop-left-sidebar.html">Fast Foods</a>,
											<a href="shop-left-sidebar.html">Vegetables</a>
										</div>
										<h3 class="product-title"><a href="single-product.html">Ornare sed consequat nisl eget</a></h3>
										<div class="price-box">
											<span class="main-price">$89.00</span>
											<span class="discounted-price">$80.00</span>
										</div>
									</div>
									
								</div>
								
								<!--=======  End of Grid view product  =======-->
	
								<!--=======  Shop list view product  =======-->
								
								<div class="gf-product shop-list-view-product">
									<div class="image">
										<a href="single-product.html">
											<span class="onsale">Sale!</span>
											<img src="assets/images/products/product08.jpg" class="img-fluid" alt="">
										</a>
										<div class="product-hover-icons">
											<a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
										</div>
									</div>
									<div class="product-content">
										<div class="product-categories">
											<a href="shop-left-sidebar.html">Fast Foods</a>,
											<a href="shop-left-sidebar.html">Vegetables</a>
										</div>
										<h3 class="product-title"><a href="single-product.html">Ornare sed consequat nisl eget</a></h3>
										<div class="price-box mb-20">
											<span class="main-price">$89.00</span>
											<span class="discounted-price">$80.00</span>
										</div>
										<p class="product-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere esse tempora magnam dolorem tenetur eos eligendi non temporibus qui enim. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, magni.</p>
										<div class="list-product-icons">
											<a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
											<a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
											<a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
										</div>
									</div>
									
								</div>
							
							<!--=======  End of Shop list view product  =======-->
							</div>
	
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
								<!--=======  Grid view product  =======-->
								
								<div class="gf-product shop-grid-view-product">
									<div class="image">
										<a href="single-product.html">
											<span class="onsale">Sale!</span>
											<img src="assets/images/products/product10.jpg" class="img-fluid" alt="">
										</a>
										<div class="product-hover-icons">
											<a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
											<a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
											<a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
											<a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
										</div>
									</div>
									<div class="product-content">
										<div class="product-categories">
											<a href="shop-left-sidebar.html">Fast Foods</a>,
											<a href="shop-left-sidebar.html">Vegetables</a>
										</div>
										<h3 class="product-title"><a href="single-product.html">Ornare sed consequat nisl eget</a></h3>
										<div class="price-box">
											<span class="main-price">$89.00</span>
											<span class="discounted-price">$80.00</span>
										</div>
									</div>
									
								</div>
								
								<!--=======  End of Grid view product  =======-->
	
								<!--=======  Shop list view product  =======-->
								
								<div class="gf-product shop-list-view-product">
									<div class="image">
										<a href="single-product.html">
											<span class="onsale">Sale!</span>
											<img src="assets/images/products/product10.jpg" class="img-fluid" alt="">
										</a>
										<div class="product-hover-icons">
											<a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
										</div>
									</div>
									<div class="product-content">
										<div class="product-categories">
											<a href="shop-left-sidebar.html">Fast Foods</a>,
											<a href="shop-left-sidebar.html">Vegetables</a>
										</div>
										<h3 class="product-title"><a href="single-product.html">Ornare sed consequat nisl eget</a></h3>
										<div class="price-box mb-20">
											<span class="main-price">$89.00</span>
											<span class="discounted-price">$80.00</span>
										</div>
										<p class="product-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere esse tempora magnam dolorem tenetur eos eligendi non temporibus qui enim. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, magni.</p>
										<div class="list-product-icons">
											<a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
											<a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
											<a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
										</div>
									</div>
									
								</div>
							
							<!--=======  End of Shop list view product  =======-->
							</div>
	
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
								<!--=======  Grid view product  =======-->
								
								<div class="gf-product shop-grid-view-product">
									<div class="image">
										<a href="single-product.html">
											<span class="onsale">Sale!</span>
											<img src="assets/images/products/product11.jpg" class="img-fluid" alt="">
										</a>
										<div class="product-hover-icons">
											<a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
											<a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
											<a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
											<a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
										</div>
									</div>
									<div class="product-content">
										<div class="product-categories">
											<a href="shop-left-sidebar.html">Fast Foods</a>,
											<a href="shop-left-sidebar.html">Vegetables</a>
										</div>
										<h3 class="product-title"><a href="single-product.html">Ornare sed consequat nisl eget</a></h3>
										<div class="price-box">
											<span class="main-price">$89.00</span>
											<span class="discounted-price">$80.00</span>
										</div>
									</div>
									
								</div>
								
								<!--=======  End of Grid view product  =======-->
	
								<!--=======  Shop list view product  =======-->
								
								<div class="gf-product shop-list-view-product">
									<div class="image">
										<a href="single-product.html">
											<span class="onsale">Sale!</span>
											<img src="assets/images/products/product11.jpg" class="img-fluid" alt="">
										</a>
										<div class="product-hover-icons">
											<a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
										</div>
									</div>
									<div class="product-content">
										<div class="product-categories">
											<a href="shop-left-sidebar.html">Fast Foods</a>,
											<a href="shop-left-sidebar.html">Vegetables</a>
										</div>
										<h3 class="product-title"><a href="single-product.html">Ornare sed consequat nisl eget</a></h3>
										<div class="price-box mb-20">
											<span class="main-price">$89.00</span>
											<span class="discounted-price">$80.00</span>
										</div>
										<p class="product-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere esse tempora magnam dolorem tenetur eos eligendi non temporibus qui enim. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, magni.</p>
										<div class="list-product-icons">
											<a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
											<a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
											<a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
										</div>
									</div>
									
								</div>
							
							<!--=======  End of Shop list view product  =======-->
							</div>
	
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
								<!--=======  Grid view product  =======-->
								
								<div class="gf-product shop-grid-view-product">
									<div class="image">
										<a href="single-product.html">
											<span class="onsale">Sale!</span>
											<img src="assets/images/products/product12.jpg" class="img-fluid" alt="">
										</a>
										<div class="product-hover-icons">
											<a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
											<a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
											<a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
											<a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
										</div>
									</div>
									<div class="product-content">
										<div class="product-categories">
											<a href="shop-left-sidebar.html">Fast Foods</a>,
											<a href="shop-left-sidebar.html">Vegetables</a>
										</div>
										<h3 class="product-title"><a href="single-product.html">Ornare sed consequat nisl eget</a></h3>
										<div class="price-box">
											<span class="main-price">$89.00</span>
											<span class="discounted-price">$80.00</span>
										</div>
									</div>
									
								</div>
								
								<!--=======  End of Grid view product  =======-->
	
								<!--=======  Shop list view product  =======-->
								
								<div class="gf-product shop-list-view-product">
									<div class="image">
										<a href="single-product.html">
											<span class="onsale">Sale!</span>
											<img src="assets/images/products/product12.jpg" class="img-fluid" alt="">
										</a>
										<div class="product-hover-icons">
											<a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
										</div>
									</div>
									<div class="product-content">
										<div class="product-categories">
											<a href="shop-left-sidebar.html">Fast Foods</a>,
											<a href="shop-left-sidebar.html">Vegetables</a>
										</div>
										<h3 class="product-title"><a href="single-product.html">Ornare sed consequat nisl eget</a></h3>
										<div class="price-box mb-20">
											<span class="main-price">$89.00</span>
											<span class="discounted-price">$80.00</span>
										</div>
										<p class="product-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere esse tempora magnam dolorem tenetur eos eligendi non temporibus qui enim. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, magni.</p>
										<div class="list-product-icons">
											<a href="#" data-tooltip="Add to cart"> <span class="icon_cart_alt"></span></a>
											<a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
											<a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
										</div>
									</div>
									
								</div>
							
							<!--=======  End of Shop list view product  =======-->
							</div>
						
					</div>
					
					<!--=======  End of Grid list view  =======-->

					<!--=======  Pagination container  =======-->
					
					<div class="pagination-container">
						<div class="container">
							<div class="row">
								<div class="col-lg-12">
									<!--=======  pagination-content  =======-->
									
									<div class="pagination-content text-center">
										<ul>
											<li><a class="active" href="#">1</a></li>
											<li><a href="#">2</a></li>
											<li><a href="#">3</a></li>
											<li><a href="#">4</a></li>
											<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
										</ul>
									</div>
									
									<!--=======  End of pagination-content  =======-->
								</div>
							</div>
						</div>
					</div>
					
					<!--=======  End of Pagination container  =======-->

				</div>
			</div>
		</div>
	</div>
	
	<!--=====  End of Shop page container  ======-->



	<!--=============================================
	=            Footer         =
	=============================================-->
	
	<footer>
		<!--=======  newsletter section  =======-->
		
		<div class="newsletter-section pt-50 pb-50">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-12 col-sm-12 mb-sm-20 mb-xs-20">
						<!--=======  newsletter title =======-->
						
						<div class="newsletter-title">
							<h1>
								<img src="assets/images/icon-newsletter.png" alt="">
								Send Newsletter
							</h1>
						</div>
						
						<!--=======  End of newsletter title  =======-->
					</div>

					<div class="col-lg-8 col-md-12 col-sm-12">
						<!--=======  subscription-form wrapper  =======-->
						
						<div class="subscription-form-wrapper d-flex flex-wrap flex-sm-nowrap">
							<p class="mb-xs-20">Sign up for our newsletter to get up-to-date from us</p>
							<div class="subscription-form">
								<form  id="mc-form" class="mc-form subscribe-form">
									<input type="email" id="mc-email" autocomplete="off" placeholder="Your email address">
									<button id="mc-submit" type="submit"> subscribe!</button>
								</form>

								<!-- mailchimp-alerts Start -->
								<div class="mailchimp-alerts">
									<div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
									<div class="mailchimp-success"></div><!-- mailchimp-success end -->
									<div class="mailchimp-error"></div><!-- mailchimp-error end -->
								</div><!-- mailchimp-alerts end -->
							</div>
						</div>
						
						<!--=======  End of subscription-form wrapper  =======-->
					</div>
				</div>
			</div>
		</div>
		
		<!--=======  End of newsletter section  =======-->

		<!--=======  social contact section  =======-->
		
		<div class="social-contact-section pt-50 pb-50">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-12 order-2 order-md-2 order-sm-2 order-lg-1">
						<!--=======  social media links  =======-->
						
						<div class="social-media-section">
							<h2>Follow us</h2>
							<div class="social-links">
								<a class="facebook" href="http://www.facebook.com/" data-tooltip="Facebook"><i class="fa fa-facebook"></i></a>
								<a class="twitter" href="http://www.twitter.com/" data-tooltip="Twitter"><i class="fa fa-twitter"></i></a>
								<a class="instagram" href="http://www.instagram.com/" data-tooltip="Instagram"><i class="fa fa-instagram"></i></a>
								<a class="linkedin" href="http://www.linkedin.com/" data-tooltip="Linkedin"><i class="fa fa-linkedin"></i></a>
								<a class="rss" href="http://www.rss.com/" data-tooltip="RSS"><i class="fa fa-rss"></i></a>
							</div>
						</div>
						
						<!--=======  End of social media links  =======-->
						
					</div>
					<div class="col-lg-8 col-md-12 order-1 order-md-1 order-sm-1 order-lg-2  mb-sm-50 mb-xs-50">
						<!--=======  contact summery  =======-->
						
						<div class="contact-summery">
							<h2>Contact us</h2>

							<!--=======  contact segments  =======-->
							
							<div class="contact-segments d-flex justify-content-between flex-wrap flex-lg-nowrap"> 
								<!--=======  single contact  =======-->
							
								<div class="single-contact d-flex mb-xs-20">
									<div class="icon">
										<span class="icon_pin_alt"></span>
									</div>
									<div class="contact-info">
										<p>Address: <span>123 New Design Str, Melbourne, Australia</span></p>
									</div>
								</div>
								
								<!--=======  End of single contact  =======-->
								<!--=======  single contact  =======-->
							
								<div class="single-contact d-flex mb-xs-20">
									<div class="icon">
										<span class="icon_mobile"></span>
									</div>
									<div class="contact-info">
										<p>Phone: <span>1-888-123-456-89</span></p>
									</div>
								</div>
								
								<!--=======  End of single contact  =======-->
								<!--=======  single contact  =======-->
							
								<div class="single-contact d-flex">
									<div class="icon">
										<span class="icon_mail_alt"></span>
									</div>
									<div class="contact-info">
										<p>Email: <span>support@hastech.company</span></p>
									</div>
								</div>
								
								<!--=======  End of single contact  =======-->
							</div>
							
							<!--=======  End of contact segments  =======-->

							
							
						</div>
						
						<!--=======  End of contact summery  =======-->
						
					</div>
				</div>
			</div>
		</div>
		
		<!--=======  End of social contact section  =======-->

		<!--=======  footer navigation  =======-->
		
		<div class="footer-navigation-section pt-40 pb-40">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mb-xs-30">
						<!--=======  single navigation section  =======-->
						
						<div class="single-navigation-section">
							<h3 class="nav-section-title">INFORMATION</h3>
							<ul>
								<li> <a href="about-us.html">About Us</a></li>
								<li> <a href="#">Delivery Information</a></li>
								<li> <a href="#">Privacy Policy</a></li>
								<li> <a href="#">Terms & Condition</a></li>
							</ul>
						</div>
						
						<!--=======  End of single navigation section  =======-->
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mb-xs-30">
						<!--=======  single navigation section  =======-->
						
						<div class="single-navigation-section">
							<h3 class="nav-section-title">MY ACCOUNT</h3>
							<ul>
								<li> <a href="my-account.html">My Account</a></li>
								<li> <a href="wishlist.html">Wishlist</a></li>
								<li> <a href="cart">Shopping Cart</a></li>
								<li> <a href="#">Newsletter</a></li>
							</ul>
						</div>
						
						<!--=======  End of single navigation section  =======-->
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 mb-xs-30">
						<!--=======  single navigation section  =======-->
						
						<div class="single-navigation-section">
							<h3 class="nav-section-title">CUSTOMER SERVICE</h3>
							<ul>
								<li> <a href="contact.html">Contact</a></li>
								<li> <a href="#">OUR SERVICE</a></li>
								<li> <a href="#">RETURNS</a></li>
								<li> <a href="#">SITE MAP</a></li>
							</ul>
						</div>
						
						<!--=======  End of single navigation section  =======-->
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<!--=======  single navigation section  =======-->
						
						<div class="single-navigation-section">
							<h3 class="nav-section-title">Extras</h3>
							<ul>
								<li> <a href="contact.html">BRANDS</a></li>
								<li> <a href="#">GIFT VOUCHERS</a></li>
								<li> <a href="#">AFFILIATES</a></li>
								<li> <a href="#">SPECIALS</a></li>
							</ul>
						</div>
						
						<!--=======  End of single navigation section  =======-->
					</div>
				</div>
			</div>
		</div>
		
		<!--=======  End of footer navigation  =======-->


		<!--=======  copyright section  =======-->
		
		<div class="copyright-section pt-35 pb-35">
			<div class="container">
				<div class="row align-items-md-center align-items-sm-center">
					<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 text-center text-md-left">
						<!--=======  copyright text	  =======-->
						
						<div class="copyright-segment">
							<p>
								<a href="#">Privacy Policy</a>
								<span class="separator">|</span>
								<a href="#">Term and conditions</a>
							</p>
							<p class="copyright-text">&copy; 2018 <a href="http://demo.devitems.com/">Greenfarm</a>. All Rights Reserved</p>
						</div>
						
						<!--=======  End of copyright text	  =======-->
						
					</div>
					<div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
						<!--=======  payment info  =======-->
						
						<div class="payment-info text-center text-md-right">
							<p>Allow payment base on <img src="assets/images/payment-icon.png" class="img-fluid" alt=""></p>
						</div>
						
						<!--=======  End of payment info  =======-->
						
					</div>
				</div>
			</div>
		</div>
		
		<!--=======  End of copyright section  =======-->
	</footer>
	
	<!--=====  End of Footer  ======-->

	<!--=============================================
	=            Quick view modal         =
	=============================================-->
	
	<div class="modal fade quick-view-modal-container" id="quick-view-modal-container" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-5 col-md-6 col-xs-12">
							<!-- product quickview image gallery -->
							<div class="product-image-slider">
								<!--Modal Tab Content Start-->
								<div class="tab-content product-large-image-list" id="myTabContent">
									<div class="tab-pane fade show active" id="single-slide1" role="tabpanel" aria-labelledby="single-slide-tab-1">
										<!--Single Product Image Start-->
										<div class="single-product-img img-full">
											<img src="assets/images/products/product01.jpg" class="img-fluid" alt="">
										</div>
										<!--Single Product Image End-->
									</div>
									<div class="tab-pane fade" id="single-slide2" role="tabpanel" aria-labelledby="single-slide-tab-2">
										<!--Single Product Image Start-->
										<div class="single-product-img img-full">
											<img src="assets/images/products/product02.jpg" class="img-fluid" alt="">
										</div>
										<!--Single Product Image End-->
									</div>
									<div class="tab-pane fade" id="single-slide3" role="tabpanel" aria-labelledby="single-slide-tab-3">
										<!--Single Product Image Start-->
										<div class="single-product-img img-full">
											<img src="assets/images/products/product03.jpg" class="img-fluid" alt="">
										</div>
										<!--Single Product Image End-->
									</div>
									<div class="tab-pane fade" id="single-slide4" role="tabpanel" aria-labelledby="single-slide-tab-4">
										<!--Single Product Image Start-->
										<div class="single-product-img img-full">
											<img src="assets/images/products/product04.jpg" class="img-fluid" alt="">
										</div>
										<!--Single Product Image End-->
									</div>
								</div>
								<!--Modal Content End-->
								<!--Modal Tab Menu Start-->
								<div class="product-small-image-list"> 
									<div class="nav small-image-slider" role="tablist">
										<div class="single-small-image img-full">
											<a data-toggle="tab" id="single-slide-tab-1" href="#single-slide1"><img src="assets/images/products/product01.jpg"
												class="img-fluid" alt=""></a>
										</div>
										<div class="single-small-image img-full">
											<a data-toggle="tab" id="single-slide-tab-2" href="#single-slide2"><img src="assets/images/products/product02.jpg"
												class="img-fluid" alt=""></a>
										</div>
										<div class="single-small-image img-full">
											<a data-toggle="tab" id="single-slide-tab-3" href="#single-slide3"><img src="assets/images/products/product03.jpg"
												class="img-fluid" alt=""></a>
										</div>
										<div class="single-small-image img-full">
											<a data-toggle="tab" id="single-slide-tab-4" href="#single-slide4"><img src="assets/images/products/product04.jpg"
												alt=""></a>
										</div>
									</div>
								</div>
								<!--Modal Tab Menu End-->
							</div>
							<!-- end of product quickview image gallery -->
						</div>
						<div class="col-lg-7 col-md-6 col-xs-12">
							<!-- product quick view description -->
							<div class="product-feature-details">
								<h2 class="product-title mb-15">Kaoreet lobortis sagittis laoreet</h2>

								<h2 class="product-price mb-15"> 
									<span class="main-price">$12.90</span> 
									<span class="discounted-price"> $10.00</span>
								</h2>

								<p class="product-description mb-20">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco,Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus</p>
								

								<div class="cart-buttons mb-20">
									<div class="pro-qty mr-10">
										<input type="text" value="1">
									</div>
									<div class="add-to-cart-btn">
										<a href="#"><i class="fa fa-shopping-cart"></i> Add to Cart</a>
									</div>
								</div>

						
								<div class="social-share-buttons">
									<h3>share this product</h3>
									<ul>
										<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
										<li><a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a></li>
									</ul>
								</div>
							</div>
							<!-- end of product quick view description -->
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!--=====  End of Quick view modal  ======-->

	<!-- scroll to top  -->
	<a href="#" class="scroll-top"></a>
	<!-- end of scroll to top -->
	
	<!-- JS
	============================================ -->
	<!-- jQuery JS -->
	<script src="assets/js/vendor/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="assets/js/popper.min.js"></script>

	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.min.js"></script>

	<!-- Plugins JS -->
	<script src="assets/js/plugins.js"></script>

	<!-- Main JS -->
	<script src="assets/js/main.js"></script>

</body>


<!-- Mirrored from demo.devitems.com/greenfarm-v1/greenfarm/shop-list-right-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Dec 2019 10:51:15 GMT -->
</html>