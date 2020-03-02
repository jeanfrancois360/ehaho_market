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
				<div class="col-lg-3 order-2 order-lg-1">
					<!--=======  sidebar area  =======-->

					<div class="sidebar-area">

						<!--=======  single sidebar  =======-->

						<div class="sidebar mb-35">
							<h3 class="sidebar-title">PRODUCT CATEGORIES</h3>
							<ul class="product-categories">
								<li><a class="active" href="<?php echo base_url();?>shop">Food</a></li>
								<li><a href="<?php echo base_url();?>inputs">Inputs</a></li>
							</ul>
						</div>

						<!--=======  End of single sidebar  =======-->

            <!--=======  single sidebar  =======-->

            <div class="sidebar mb-35">
              <h3 class="sidebar-title">FILTER BY</h3>
              <ul class="product-categories">
                <li>
                  <div class="single-method check">
                    <input type="radio" id="payment_paypal" name="payment-method" value="paypal">
                    <label for="payment_paypal">Vegetables and legumes</label>
                  </div>
                </li>
                <li>
                  <div class="single-method check">
                    <input type="radio" id="payment_paypal2" name="payment-method" value="paypal">
                    <label for="payment_paypal2">Fruits</label>
                  </div>
                </li>
                <li>
                  <div class="single-method check">
                    <input type="radio" id="payment_paypal3" name="payment-method" value="paypal" checked>
                    <label for="payment_paypal3">Grain(cereal) foods</label>
                  </div>
                </li>
                <li>
                  <div class="single-method check">
                    <input type="radio" id="payment_paypal4" name="payment-method" value="paypal">
                    <label for="payment_paypal4">nuts, seeds and beans</label>
                  </div>
                </li>
                <!-- <li>
                <div class="single-method check">
                <input type="checkbox" id="payment_paypal5" name="payment-method" value="paypal">
                <label for="payment_paypal5">Pay with VisaCard or CreditCard</label>
              </div>
            </li> -->
          </ul>
        </div>

        <!--=======  End of single sidebar  =======-->

						<!--=======  single sidebar  =======-->

						<div class="sidebar mb-35" style="display:none;">
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

						<div class="sidebar mb-35" style="display:none;">
							<h3 class="sidebar-title">Top rated products</h3>

							<!--=======  top rated product container  =======-->

							<div class="top-rated-product-container">
								<!--=======  single top rated product  =======-->

								<div class="single-top-rated-product d-flex align-content-center">
									<div class="image">
										<a href="single-product.html">
											<img src="<?php echo base_url();?>assets/images/products/product01.jpg" class="img-fluid" alt="">
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
											<img src="<?php echo base_url();?>assets/images/products/product02.jpg" class="img-fluid" alt="">
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
											<img src="<?php echo base_url();?>assets/images/products/product03.jpg" class="img-fluid" alt="">
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
				<div class="col-lg-9 order-1 order-lg-2 mb-sm-35 mb-xs-35">


					<!--=======  shop page banner  =======-->

					<div class="shop-page-banner mb-35">
						<a href="shop-left-sidebar.html">
							<img src="<?php echo base_url();?>assets/images/banners/shop-banner.jpg" class="img-fluid" alt="">
						</a>
					</div>

					<!--=======  End of shop page banner  =======-->

					<!--=======  Shop header  =======-->

					<div class="shop-header mb-35">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-12 d-flex align-items-center">
								<!--=======  view mode  =======-->

								<div class="view-mode-icons mb-xs-10">
									<a class="active" href="#" data-target="grid"><i class="fa fa-th"></i></a>
									<a href="#" data-target="list"><i class="fa fa-list"></i></a>
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
                <?php $from = 1; $to = 12;?>
								<p class="result-show-message">Showing <?php echo intval($from) + intval($uri_segment);?> – <?php echo intval($to) + intval($uri_segment);?> of <?php echo $total_rows;?> results</p>
							</div>
						</div>
					</div>

					<!--=======  End of Shop header  =======-->

					<!--=======  Grid list view  =======-->

					<div class="shop-product-wrap grid row no-gutters mb-35">
					<?php
                        $i = 1;
                        foreach ($content as $food) {
                            $id = $food['m_id'];
                            $prod1 = "product".$i;
                            $prod2 = "product0".$i; ?>
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
								<!--=======  Grid view product  =======-->

								<div class="gf-product shop-grid-view-product">
									<div class="image">
										<a href="single-product.html">
											<span class="onsale">Sale!</span>
											<!-- <img src="assets/images/products/<?php //echo $i > 9 ? $prod1 : $prod2;?>.jpg" class="img-fluid" alt=""> -->
											<img src="<?php if ($food['photo'] == $food['variety_photo']) {
                                echo base_url().'../app/assets/img/products/'.$food['photo'];
                            } else {
                                echo base_url().'../app/assets/img/market_place/'.$food['photo'];
                            } ?>" class="img-fluid" alt="" style="height: 200px;">
										</a>
										<div class="product-hover-icons">
											<a href="#" data-tooltip="<?php echo in_array($food['m_id'], $_SESSION['cart_items'])? "Added to cart": "Add to cart"; ?>" id="add_to_cart<?php echo $food['m_id']; ?>"
												onclick="<?php echo in_array($id, $_SESSION['cart_items']) ? "remove_from_cart($id, event)" : "addToCart($id, event)"; ?>"  style="<?php echo in_array($food['m_id'], $_SESSION['cart_items']) ? "background:red;": ""; ?>"> <span class="icon_cart_alt"></span></a>
											<a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
											<a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
											<a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
										</div>
									</div>
									<div class="product-content">
										<div class="product-categories">
											<a href="shop-left-sidebar.html"><?php echo $food['variety']; ?></a>
										</div>
										<h3 class="product-title"><a href="single-product.html"><?php echo $food['product_name']; ?></a></h3>
										<div class="price-box">
											<span class="discounted-price"><?php echo $food['price_unit']." RWF /". $food['unit']; ?></span>
											<!-- <span class="discounted-price">$80.00</span> -->
										</div>
									</div>

								</div>

								<!--=======  End of Grid view product  =======-->

								<!--=======  Shop list view product  =======-->

								<div class="gf-product shop-list-view-product">
									<div class="image">
										<a href="single-product.html">
											<span class="onsale">Sale!</span>
											<!-- <img src="assets/images/products/<?php //echo $i > 9 ? $prod1 : $prod2;?>.jpg" class="img-fluid" alt=""> -->
											<img src="<?php if ($food['photo'] == $food['variety_photo']) {
                                echo base_url().'../app/assets/img/products/'.$food['photo'];
                            } else {
                                echo base_url().'../app/assets/img/market_place/'.$food['photo'];
                            } ?>" class="img-fluid" alt="" style="height: 200px;">
										</a>
										<div class="product-hover-icons">
											<a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
										</div>
									</div>
									<div class="product-content">
										<div class="product-categories">
											<a href="shop-left-sidebar.html"><?php echo $food['variety']; ?></a>
										</div>
										<h3 class="product-title"><a href="single-product.html"><?php echo $food['product_name']; ?></a></h3>
										<div class="price-box mb-20">
											<span class="discounted-price"><?php echo $food['price_unit']." RWF /". $food['unit']; ?></span>
											<!-- <span class="discounted-price">$80.00</span> -->
										</div>
										<p class="product-description">Name:&nbsp;<?php echo $food['name']; ?></p>
										<p class="product-description">Phone:&nbsp;<?php echo $food['phone']; ?></p>
										<div class="list-product-icons">
											<a href="#" id="add_to_cart_list<?php echo $food['m_id']; ?>" data-tooltip="<?php echo in_array($food['m_id'], $_SESSION['cart_items'])? "Added to cart": "Add to cart"; ?>"
												onclick="<?php echo in_array($id, $_SESSION['cart_items']) ? "remove_from_cart($id, event)" : "addToCart($id, event)"; ?>"  style="<?php echo in_array($food['m_id'], $_SESSION['cart_items']) ? "background:red;": ""; ?>"> <span class="icon_cart_alt"></span></a>
											<a href="#" data-tooltip="Add to wishlist"> <span class="icon_heart_alt"></span> </a>
											<a href="#" data-tooltip="Compare"> <span class="arrow_left-right_alt"></span> </a>
										</div>
									</div>

								</div>

							<!--=======  End of Shop list view product  =======-->
							</div>
						<?php
                        $i++;
                            if ($i == 16) {
                                $i == 1;
                            }
                        } ?>
					<!--=======  Pagination container  =======-->

					<div class="pagination-container col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="container">
							<div class="row">
								<div class="col-lg-12">
									<!--=======  pagination-content  =======-->

                  <?php echo $this->pagination->create_links(); ?>

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
