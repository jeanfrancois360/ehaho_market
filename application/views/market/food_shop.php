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
              <h3 class="sidebar-title">FILTER BY CATEGORY</h3>
              <ul class="product-categories">
                <?php if (!empty($categories)) {?>
                <?php foreach ($categories as $category) {?>
                <li>
                    <a class="<?php if ($this->uri->segment(2) == "category" && $this->uri->segment(3) == $category['id']) {
    echo "active";
} ?>" href="<?php echo base_url()."shop/category/".$category['id']; ?>"><?php echo $category['name']; ?></a>
                </li>
              <?php
            }} else {?>
                <h5>NO PRODUCT TAGS</h5>
                <?php } ?>
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
              <div id="compare_items">

              </div>
              <div class="compare-btns">
        			  <a href="#" class="clear-all" id="clear_compare">Clear all</a>
        			  <a href="compare" class="compare">Compare</a>
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
                <?php if (!empty($tags)) {?>
                <?php foreach ($tags as $tag) {?>
								<li><a class="<?php if ($this->uri->segment(2) == "tag" && $this->uri->segment(3) == $tag['id']) {
                echo "active";
            } ?>" href="<?php echo base_url()."shop/tag/".$tag['id']; ?>"><?php echo "#".$tag['name']?></a> </li>
<?php }
} else { ?>
              <h5>NO PRODUCT TAGS</h5>
            <?php } ?>
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
          <?php //echo var_dump($content);?>
					<!--=======  Grid list view  =======-->
					<div class="shop-product-wrap grid row no-gutters mb-35">
					<?php
            if (!empty($content)) {
                $i = 1;
                foreach ($content as $food) {
                    $id = $food['m_id'];
                    $prod1 = "product".$i;
                    $prod2 = "product0".$i; ?>
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
								<!--=======  Grid view product  =======-->

								<div class="gf-product shop-grid-view-product">
									<div class="image">
										<a href="">
											<span class="onsale">Sale!</span>
											<!-- <img src="assets/images/products/<?php //echo $i > 9 ? $prod1 : $prod2;?>.jpg" class="img-fluid" alt=""> -->
											<img src="<?php if ($food['photo'] == $food['variety_photo']) {
                        echo base_url().'../app/assets/img/products/'.$food['photo'];
                    } else {
                        echo base_url().'../app/assets/img/market_place/'.$food['photo'];
                    } ?>" class="img-fluid" alt="" style="height: 200px;">
										</a>
										<div class="product-hover-icons">
											<a href="#" data-tooltip="<?php echo in_array($food['m_id'], $_SESSION['cart_items'])? 'Remove from cart': 'Add to cart'; ?>" id="add_to_cart<?php echo $food['m_id']; ?>"
                        onclick="<?php echo in_array($id, $_SESSION['cart_items']) ? 'remove_from_cart('.$id.', event)' : 'addToCart('.$id.', event)'; ?>"  style="<?php echo in_array($food['m_id'], $_SESSION['cart_items']) ? 'background:red;': ''; ?>">
                        <span class="icon_cart_alt"></span></a>
											<a href="#" data-tooltip="<?php echo in_array($food['m_id'], $_SESSION['wishlist_items'])? 'Remove from Wishlist': 'Add to Wishlist'; ?>" id="add_to_wishlist<?php echo $food['m_id']; ?>"
                        onclick="<?php echo in_array($id, $_SESSION['wishlist_items']) ? 'remove_from_wishlist('.$id.', event)' : 'addToWishlist('.$id.', event)'; ?>"  style="<?php echo in_array($food['m_id'], $_SESSION['wishlist_items']) ? 'background:red;': ''; ?>">
                        <span class="icon_heart_alt"></span></a>
											<a href="#" data-tooltip="<?php echo in_array($food['m_id'], $_SESSION['compare_items'])? "Remove from compare": "Add to compare"; ?>" id="add_to_compare<?php echo $food['m_id']; ?>"
                        onclick="<?php echo in_array($id, $_SESSION['compare_items']) ? 'remove_from_compare('.$id.', event)' : 'addToCompare('.$id.', event)'; ?>"  style="<?php echo in_array($food['m_id'], $_SESSION['compare_items']) ? 'background:red;': ''; ?>">
                        <span class="arrow_left-right_alt"></span></a>
											<a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container"> <span class="icon_search"></span> </a>
										</div>
									</div>
									<div class="product-content">
										<div class="product-categories">
											<a href=""><?php echo $food['variety']; ?></a>
										</div>
										<h3 class="product-title"><a href=""><?php echo $food['product_name']; ?></a></h3>
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
											<a href=""><?php echo $food['variety']; ?></a>
										</div>
										<h3 class="product-title"><a href=""><?php echo $food['product_name']; ?></a></h3>
										<div class="price-box mb-20">
											<span class="discounted-price"><?php echo $food['price_unit']." RWF /". $food['unit']; ?></span>
											<!-- <span class="discounted-price">$80.00</span> -->
										</div>
										<p class="product-description">Name:&nbsp;<?php echo $food['name']; ?></p>
										<p class="product-description">Phone:&nbsp;<?php echo $food['phone']; ?></p>
										<div class="list-product-icons">
											<a href="#" id="add_to_cart_list<?php echo $food['m_id']; ?>" data-tooltip="<?php echo in_array($food['m_id'], $_SESSION['cart_items'])? "Added to cart": "Add to cart"; ?>"
												onclick="<?php echo in_array($id, $_SESSION['cart_items']) ? 'remove_from_cart($id, event)' : 'addToCart($id, event)'; ?>"  style="<?php echo in_array($food['m_id'], $_SESSION['cart_items']) ? "background:red;": ""; ?>"> <span class="icon_cart_alt"></span></a>
                      <a href="#" data-tooltip="<?php echo in_array($food['m_id'], $_SESSION['wishlist_items'])? 'Remove from Wishlist': 'Add to Wishlist'; ?>" id="add_to_wishlist_list<?php echo $food['m_id']; ?>"
                        onclick="<?php echo in_array($id, $_SESSION['wishlist_items']) ? 'remove_from_wishlist($id, event)' : 'addToWishlist($id, event)'; ?>"  style="<?php echo in_array($food['m_id'], $_SESSION['wishlist_items']) ? 'background:red;': ''; ?>"> <span class="icon_heart_alt"></span> </a>
  										<a href="#" data-tooltip="<?php echo in_array($food['m_id'], $_SESSION['compare_items'])? "Remove from compare": "Add to compare"; ?>" id="add_to_compare_list<?php echo $food['m_id']; ?>"
                        onclick="<?php echo in_array($id, $_SESSION['compare_items']) ? 'remove_from_compare($id, event)' : 'addToCompare($id, event)'; ?>"  style="<?php echo in_array($food['m_id'], $_SESSION['compare_items']) ? 'background:red;': ''; ?>"> <span class="arrow_left-right_alt"></span></a>
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
                }
            } else {?>
                <p class="text-center">
                  NO RESULTS
                </p>
              <?php } ?>
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
  <!--=============================================
	=            Best seller slider         =
	=============================================-->
	<div class="slider best-seller-slider mb-35 mt-25">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!--=======  category slider section title  =======-->

					<div class="section-title">
						<h3>buyers orders</h3>
					</div>

					<!--=======  End of category slider section title  =======-->
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<!--=======  best seller slider container  =======-->

					<div class="best-seller-slider-container pt-15 pb-15">
            <?php if (!empty($buyer_orders)) {?>
						<!--=======  single best seller product  =======-->
            <?php foreach ($buyer_orders as $order) {?>
						<div class="col">
							<div class="single-best-seller-item">
								<div class="best-seller-sub-product">
									<div class="row">
										<div class="col-lg-4 pl-0 pr-0">
											<div class="image">
												<a href="">
													<img src="<?php echo base_url().'../app/assets/img/products/'.$order['photo'];?>" class="img-fluid" alt="" style="width:117px !important; height:117px !important;">
												</a>
											</div>
										</div>
										<div class="col-lg-8 pl-0 pr-0">
											<div class="product-content">
												<div class="product-categories">
													<a href="#"><?php echo $order['variety_name'];?></a>
												</div>
												<h3 class="product-title"><a href="#"><?php echo $order['product_name'];?></a></h3>
												<div class="price-box">
													<!-- <span class="main-price">$89.00</span> -->
													<span class="discounted-price"><?php echo $order['unit_price']."&nbsp;RWF";?></span>
												</div>
                        <h5 class="product-title"><a href="#"><?php echo $order['quantity']." ".$order['unit'];?></a></h5>
											</div>
										</div>
									</div>
								</div>
								<div class="best-seller-sub-product">
								</div>
							</div>
						</div>
          <?php
        }
      } else {?>
        <div class="col">
          <div class="single-best-seller-item">
            <div class="best-seller-sub-product">
              <p>
                NO BUYERS ORDERS
              </p>
            </div>
            <div class="best-seller-sub-product">
            </div>
          </div>
        </div>
          <?php }?>
						<!--=======  End of single best seller product  =======-->

						<!--=======  single best seller product  =======-->
						<!-- <div class="col">
							<div class="single-best-seller-item">
								<div class="best-seller-sub-product">
									<div class="row">
										<div class="col-lg-4 pl-0 pr-0">
											<div class="image">
												<a href="single-product.html">
													<img src="assets/images/products/product03.jpg" class="img-fluid" alt="">
												</a>
											</div>
										</div>
										<div class="col-lg-8 pl-0 pr-0">
											<div class="product-content">
												<div class="product-categories">
													<a href="shop-left-sidebar.html">Fast Foods</a>,
													<a href="shop-left-sidebar.html">Vegetables</a>
												</div>
												<h3 class="product-title"><a href="single-product.html">Phasellus vel hendrerit eget</a></h3>
												<div class="price-box">
													<span class="main-price">$89.00</span>
													<span class="discounted-price">$80.00</span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="best-seller-sub-product">
									</div>
							</div>
						</div> -->
						<!--=======  End of single best seller product  =======-->

						<!--=======  single best seller product  =======-->
						<!-- <div class="col">
							<div class="single-best-seller-item">
								<div class="best-seller-sub-product">
									<div class="row">
										<div class="col-lg-4 pl-0 pr-0">
											<div class="image">
												<a href="single-product.html">
													<img src="assets/images/products/product05.jpg" class="img-fluid" alt="">
												</a>
											</div>
										</div>
										<div class="col-lg-8 pl-0 pr-0">
											<div class="product-content">
												<div class="product-categories">
													<a href="shop-left-sidebar.html">Fast Foods</a>,
													<a href="shop-left-sidebar.html">Vegetables</a>
												</div>
												<h3 class="product-title"><a href="single-product.html">Sed tempor ehicula non commodo</a></h3>
												<div class="price-box">
													<span class="main-price">$89.00</span>
													<span class="discounted-price">$80.00</span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="best-seller-sub-product">
								</div>
							</div>
						</div> -->
						<!--=======  End of single best seller product  =======-->

						<!--=======  single best seller product  =======-->
						<!-- <div class="col">
							<div class="single-best-seller-item">
								<div class="best-seller-sub-product">
									<div class="row">
										<div class="col-lg-4 pl-0 pr-0">
											<div class="image">
												<a href="single-product.html">
													<img src="assets/images/products/product07.jpg" class="img-fluid" alt="">
												</a>
											</div>
										</div>
										<div class="col-lg-8 pl-0 pr-0">
											<div class="product-content">
												<div class="product-categories">
													<a href="shop-left-sidebar.html">Fast Foods</a>,
													<a href="shop-left-sidebar.html">Vegetables</a>
												</div>
												<h3 class="product-title"><a href="single-product.html">Sed tempor ehicula non commodo</a></h3>
												<div class="price-box">
													<span class="main-price">$89.00</span>
													<span class="discounted-price">$80.00</span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="best-seller-sub-product">
								</div>
							</div>
						</div> -->
						<!--=======  End of single best seller product  =======-->

						<!--=======  single best seller product  =======-->
						<!-- <div class="col">
							<div class="single-best-seller-item">
								<div class="best-seller-sub-product">
									<div class="row">
										<div class="col-lg-4 pl-0 pr-0">
											<div class="image">
												<a href="single-product.html">
													<img src="assets/images/products/product09.jpg" class="img-fluid" alt="">
												</a>
											</div>
										</div>
										<div class="col-lg-8 pl-0 pr-0">
											<div class="product-content">
												<div class="product-categories">
													<a href="shop-left-sidebar.html">Fast Foods</a>,
													<a href="shop-left-sidebar.html">Vegetables</a>
												</div>
												<h3 class="product-title"><a href="single-product.html">Sed tempor ehicula non commodo</a></h3>
												<div class="price-box">
													<span class="main-price">$89.00</span>
													<span class="discounted-price">$80.00</span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="best-seller-sub-product">
								</div>
							</div>
						</div> -->
						<!--=======  End of single best seller product  =======-->

						<!--=======  single best seller product  =======-->
						<!-- <div class="col">
							<div class="single-best-seller-item">
								<div class="best-seller-sub-product">
									<div class="row">
										<div class="col-lg-4 pl-0 pr-0">
											<div class="image">
												<a href="single-product.html">
													<img src="assets/images/products/product11.jpg" class="img-fluid" alt="">
												</a>
											</div>
										</div>
										<div class="col-lg-8 pl-0 pr-0">
											<div class="product-content">
												<div class="product-categories">
													<a href="shop-left-sidebar.html">Fast Foods</a>,
													<a href="shop-left-sidebar.html">Vegetables</a>
												</div>
												<h3 class="product-title"><a href="single-product.html">Sed tempor ehicula non commodo</a></h3>
												<div class="price-box">
													<span class="main-price">$89.00</span>
													<span class="discounted-price">$80.00</span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="best-seller-sub-product">
								</div>
							</div>
						</div> -->
						<!--=======  End of single best seller product  =======-->

					</div>

					<!--=======  End of best seller slider container  =======-->
				</div>
			</div>
		</div>
	</div>

	<!--=====  End of Best seller slider  ======-->

  <!--=============================================
  =            Blog post slider container         =
  =============================================-->

  <div class="slider blog-slider mb-35">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!--=======  blog slider section title  =======-->

          <div class="section-title">
            <h3>PRE-HARVEST</h3>
          </div>

          <!--=======  End of blog slider section title  =======-->
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <!--=======  blog slide container  =======-->

          <div class="blog-slider-container pt-30 pb-30 pr-30 pl-30">

              <!--=======  single blog post  =======-->
              <?php foreach ($pre_harvest as $row) {?>
              <div class="col">
                <div class="single-post-wrapper">
                  <div class="post-thumb">
                    <a href="">
                      <img src="<?php echo base_url().'../app/assets/img/products/'.$row['photo'];?>" class="img-fluid" alt="" style="width:330px !important; height:232px !important;">
                    </a>
                  </div>
                  <div class="post-info">
                    <div class="post-meta">
                      <div class="post-date"><strong>Date:</strong>&nbsp;<?php echo $row['date'];?></div>
                    </div>
                    <div class="product-categories">
                      <a href="#"><?php echo $row['variety'];?></a>
                    </div>
                    <h3 class="post-title"><a href=""><?php echo $row['product'];?></a></h3>
                    <h5 class="post-title"><a href="">Farmer:&nbsp;<?php echo $row['farmer_name'];?></a></h5>
                    <a href="" class="readmore-btn">Quantity predicted: <?php echo $row['quantity_before'];?></a><br />
                    <!-- <a href="" class="readmore-btn">continue <i class="fa fa-arrow-right"></i></a> -->
                  </div>
                </div>
              </div>
            <?php } ?>

              <!--=======  End of single blog post  =======-->

              <!--=======  single blog post  =======-->
              <!-- <div class="col">
                <div class="single-post-wrapper">
                  <div class="post-thumb">
                    <a href="blog-post-image-gallery.html">
                      <img src="assets/images/blog-image/blog02.jpg" class="img-fluid" alt="">
                    </a>
                  </div>
                  <div class="post-info">
                    <div class="post-meta">
                      <div class="post-date">29.09.2018</div>
                    </div>
                    <h3 class="post-title"><a href="blog-post-image-gallery.html">Post with gallery</a></h3>
                    <a href="blog-post-image-gallery.html" class="readmore-btn">continue <i class="fa fa-arrow-right"></i></a>
                  </div>
                </div>
              </div> -->

              <!--=======  End of single blog post  =======-->

              <!--=======  single blog post  =======-->
              <!-- <div class="col">
                <div class="single-post-wrapper">
                  <div class="post-thumb">
                    <a href="blog-post-audio-format.html">
                      <img src="assets/images/blog-image/blog03.jpg" class="img-fluid" alt="">
                    </a>
                  </div>
                  <div class="post-info">
                    <div class="post-meta">
                      <div class="post-date">29.09.2018</div>
                    </div>
                    <h3 class="post-title"><a href="blog-post-audio-format.html">Blog with audio</a></h3>
                    <a href="blog-post-audio-format.html" class="readmore-btn">continue <i class="fa fa-arrow-right"></i></a>
                  </div>
                </div>
              </div> -->

              <!--=======  End of single blog post  =======-->

              <!--=======  single blog post  =======-->
              <!-- <div class="col">
                <div class="single-post-wrapper">
                  <div class="post-thumb">
                    <a href="blog-post-video-format.html">
                      <img src="assets/images/blog-image/blog04.jpg" class="img-fluid" alt="">
                    </a>
                  </div>
                  <div class="post-info">
                    <div class="post-meta">
                      <div class="post-date">29.09.2018</div>
                    </div>
                    <h3 class="post-title"><a href="blog-post-video-format.html">Blog with video</a></h3>
                    <a href="blog-post-video-format.html" class="readmore-btn">continue <i class="fa fa-arrow-right"></i></a>
                  </div>
                </div>
              </div> -->

              <!--=======  End of single blog post  =======-->

          </div>

          <!--=======  End of blog slide container  =======-->
        </div>
      </div>
    </div>
  </div>

  <!--=====  End of Blog post slider  ======-->
