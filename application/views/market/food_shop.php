	<!--=============================================
    =            breadcrumb area         =
    =============================================-->

    <div class="breadcrumb-area mb-50">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="breadcrumb-container">
						<ul>
							<li><a href="index.html"><i class="fa fa-home"></i>Home</a></li>
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
											<a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container<?php echo $food['m_id']; ?>"> <span class="icon_search"></span> </a>
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
											<a href="#" data-tooltip="Quick view" data-toggle = "modal" data-target="#quick-view-modal-container<?php echo $food['m_id']; ?>"> <span class="icon_search"></span> </a>
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
						<h3>buyers purchase requests</h3>
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
                        <button class="badge badge-success" data-toggle="modal" data-target=".supplier-offer">Suppy Offer</button>
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
                NO BUYERS PURCHASE REQUESTS AVAILABLE
              </p>
            </div>
            <div class="best-seller-sub-product">
            </div>
          </div>
        </div>
          <?php }?>
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
                    <h4 style="color: #3a8245;">Quantity predicted: <?php echo $row['quantity_before'];?></h4><br />
                    <a href="" class="btn btn-outline-success" data-toggle="modal" data-target=".pre-order" onclick="load_prediction(<?php echo $row['id'];?>)">Pre-order <i class="fa fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            <?php } ?>

              <!--=======  End of single blog post  =======-->
          </div>
          <!--=======  End of blog slide container  =======-->
        </div>
      </div>
    </div>
  </div>

  <!--=====  End of Blog post slider  ======-->

  <!--=============================================
  =            Supplier Offer modal         =
  =============================================-->
  <?php foreach ($buyer_orders as $order) {?>
  <div class="modal fade supplier-offer" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Supplier Offer Form</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="checkout-form" name="supplierOfferForm">
          <div class="row">
          <div class="col-md-6 mb-5">
            <label for="recipient-name" class="col-form-label">Names:</label>
            <input type="text" class="form-control" id="supplier_name">
            <input type="hidden" id="order_id<?php echo $order['o_id']; ?>" value="">
            <input type="hidden" id="product_id<?php echo $order['o_id']; ?>" value="<?php echo $order['product_id'];?>">
            <input type="hidden" id="variety_id<?php echo $order['o_id']; ?>" value="<?php echo $order['variety_id'];?>">
            <input type="hidden" id="unit<?php echo $order['o_id']; ?>" value="<?php echo $order['unit_id'];?>">
          </div>
          <div class="col-md-6 mb-5">
            <label for="message-text" class="col-form-label">Phone Number:</label>
            <input type="text" class="form-control" id="supplier_phone">
          </div>
          <div class="col-md-12 mb-5">
            <label for="message-text" class="col-form-label">National Id / Passport:</label>
            <input type="text" class="form-control" id="supplier_identity">
          </div>
          <div class="col-md-6 mb-5">
            <label for="message-text" class="col-form-label">Email Address:</label>
            <input type="text" class="form-control" id="supplier_email">
          </div>
          <div class="col-md-3 mb-5">
            <label for="message-text" class="col-form-label">Quantity To Offer:</label>
            <input type="text" class="form-control" id="supplier_qty">
          </div>
          <div class="col-md-3 mb-5">
            <label for="message-text" class="col-form-label">Unit Price(RWF):</label>
            <input type="text" class="form-control" id="supplier_price">
          </div>
          <div class="col-md-6 col-12 mb-5">
            <label>Country*</label>
            <select class="nice-select" id="country" name="country">
              <option selected>Rwanda</option>
            </select>
          </div>
          <div class="col-md-6 col-12 mb-5">
            <label>Province*</label>
            <select class="nice-select" id="province" name="province" onchange="province_change()">
              <option selected disabled>Select Province</option>
              <?php
              foreach ($provinces as $province) {
                  ?>
  <option value="<?php echo $province->id; ?>"><?php echo $province->name; ?></option>
  <?php
              }
              ?>
            </select>
          </div>
          <div class="col-md-6 col-12 mb-5">
            <label>District*</label>
            <select class="nice-select" name="district" id="district" onchange="district_change()">
              <option selected disabled>Select District</option>
            </select>
          </div>
          <div class="col-md-6 col-12 mb-5">
            <label>Sector*</label>
            <select class="nice-select" name="sector" id="sector" onchange="sector_change()">
              <option selected disabled>Select Sector</option>
            </select>
          </div>
          <div class="col-md-6 col-12 mb-5">
            <label>Cell*</label>
            <select class="nice-select" name="cell" id="cell" onchange="cell_change()">
              <option selected disabled>Select Cell</option>
            </select>
          </div>
          <div class="col-md-6 col-12 mb-5">
            <label>Village*</label>
            <select class="nice-select" name="village" id="village">
              <option selected disabled>Select Village</option>
            </select>
          </div>
          <div class="col-md-4 mb-5">
            <label for="message-text" class="col-form-label">Delivery Date:</label>
            <input type="date" class="form-control" id="delivery_date">
          </div>
          <div class="col-md-8 mb-5">
            <label for="message-text" class="col-form-label">Comment:</label>
            <textarea class="form-control" id="comment"></textarea>
          </div>
          <div class="col-md-12 col-12 mb-5" id="status<?php echo $order['o_id']; ?>">
          </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="supplier_offer(<?php echo $order['o_id']; ?>)">Send Offer</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>
  <!--=====  Supplier offer modal  ======-->
  <!--=============================================
  =            Supplier Offer modal         =
  =============================================-->
  <?php foreach ($buyer_orders as $order) {?>
  <div class="modal fade supplier-offer" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Supplier Offer Form</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="checkout-form" name="supplierOfferForm">
          <div class="row">
          <div class="col-md-6 mb-5">
            <label for="recipient-name" class="col-form-label">Names:</label>
            <input type="text" class="form-control" id="supplier_name">
            <input type="hidden" id="order_id<?php echo $order['o_id']; ?>" value="">
            <input type="hidden" id="product_id<?php echo $order['o_id']; ?>" value="<?php echo $order['product_id'];?>">
            <input type="hidden" id="variety_id<?php echo $order['o_id']; ?>" value="<?php echo $order['variety_id'];?>">
            <input type="hidden" id="unit<?php echo $order['o_id']; ?>" value="<?php echo $order['unit_id'];?>">
          </div>
          <div class="col-md-6 mb-5">
            <label for="message-text" class="col-form-label">Phone Number:</label>
            <input type="text" class="form-control" id="supplier_phone">
          </div>
          <div class="col-md-12 mb-5">
            <label for="message-text" class="col-form-label">National Id / Passport:</label>
            <input type="text" class="form-control" id="supplier_identity">
          </div>
          <div class="col-md-6 mb-5">
            <label for="message-text" class="col-form-label">Email Address:</label>
            <input type="text" class="form-control" id="supplier_email">
          </div>
          <div class="col-md-3 mb-5">
            <label for="message-text" class="col-form-label">Quantity To Offer:</label>
            <input type="text" class="form-control" id="supplier_qty">
          </div>
          <div class="col-md-3 mb-5">
            <label for="message-text" class="col-form-label">Unit Price(RWF):</label>
            <input type="text" class="form-control" id="supplier_price">
          </div>
          <div class="col-md-6 col-12 mb-5">
            <label>Country*</label>
            <select class="nice-select" id="country" name="country">
              <option selected>Rwanda</option>
            </select>
          </div>
          <div class="col-md-6 col-12 mb-5">
            <label>Province*</label>
            <select class="nice-select" id="province" name="province" onchange="province_change()">
              <option selected disabled>Select Province</option>
              <?php
              foreach ($provinces as $province) {
                  ?>
  <option value="<?php echo $province->id; ?>"><?php echo $province->name; ?></option>
  <?php
              }
              ?>
            </select>
          </div>
          <div class="col-md-6 col-12 mb-5">
            <label>District*</label>
            <select class="nice-select" name="district" id="district" onchange="district_change()">
              <option selected disabled>Select District</option>
            </select>
          </div>
          <div class="col-md-6 col-12 mb-5">
            <label>Sector*</label>
            <select class="nice-select" name="sector" id="sector" onchange="sector_change()">
              <option selected disabled>Select Sector</option>
            </select>
          </div>
          <div class="col-md-6 col-12 mb-5">
            <label>Cell*</label>
            <select class="nice-select" name="cell" id="cell" onchange="cell_change()">
              <option selected disabled>Select Cell</option>
            </select>
          </div>
          <div class="col-md-6 col-12 mb-5">
            <label>Village*</label>
            <select class="nice-select" name="village" id="village">
              <option selected disabled>Select Village</option>
            </select>
          </div>
          <div class="col-md-4 mb-5">
            <label for="message-text" class="col-form-label">Delivery Date:</label>
            <input type="date" class="form-control" id="delivery_date">
          </div>
          <div class="col-md-8 mb-5">
            <label for="message-text" class="col-form-label">Comment:</label>
            <textarea class="form-control" id="comment"></textarea>
          </div>
          <div class="col-md-12 col-12 mb-5" id="status<?php echo $order['o_id']; ?>">
          </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" onclick="supplier_offer(<?php echo $order['o_id']; ?>)">Send Offer</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>
  <!--=====  Supplier offer modal  ======-->

  <!--=============================================
  =            Pre Order modal         =
  =============================================-->
  <div class="modal fade pre-order" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Pre Order Form</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="checkout-form" name="preOrderForm">
          <div class="row">
          <div class="col-md-6 mb-5">
            <label for="recipient-name" class="col-form-label">Names:</label>
            <input type="text" class="form-control" id="names">
            <input type="hidden" id="prediction_id" value="">
          </div>
          <div class="col-md-6 mb-5">
            <label for="message-text" class="col-form-label">Phone Number:</label>
            <input type="text" class="form-control" id="phone">
          </div>
          <div class="col-md-12 mb-5">
            <label for="message-text" class="col-form-label">National Id / Passport:</label>
            <input type="text" class="form-control" id="identity">
          </div>
          <div class="col-md-6 mb-5">
            <label for="message-text" class="col-form-label">Email Address:</label>
            <input type="text" class="form-control" id="email">
          </div>
          <div class="col-md-6 mb-5">
            <label for="message-text" class="col-form-label">Quantity To Order:</label>
            <input type="text" class="form-control" id="qty">
          </div>
          <div class="col-md-6 col-12 mb-5">
            <label>Country*</label>
            <select class="nice-select" id="country_" name="country">
              <option selected>Rwanda</option>
            </select>
          </div>
          <div class="col-md-6 col-12 mb-5">
            <label>Province*</label>
            <select class="nice-select" id="province_" name="province">
              <option selected disabled>Select Province</option>
              <?php
              foreach ($provinces as $province) {
                  ?>
  <option value="<?php echo $province->id; ?>"><?php echo $province->name; ?></option>
  <?php
              }
              ?>
            </select>
          </div>
          <div class="col-md-6 col-12 mb-5">
            <label>District*</label>
            <select class="nice-select" name="district" id="district_">
              <option selected disabled>Select District</option>
            </select>
          </div>
          <div class="col-md-6 col-12 mb-5">
            <label>Sector*</label>
            <select class="nice-select" name="sector" id="sector_">
              <option selected disabled>Select Sector</option>
            </select>
          </div>
          <div class="col-md-6 col-12 mb-5">
            <label>Cell*</label>
            <select class="nice-select" name="cell" id="cell_">
              <option selected disabled>Select Cell</option>
            </select>
          </div>
          <div class="col-md-6 col-12 mb-5">
            <label>Village*</label>
            <select class="nice-select" name="village" id="village_">
              <option selected disabled>Select Village</option>
            </select>
          </div>
          <div class="col-md-4 mb-5">
            <label for="message-text" class="col-form-label">Delivery Date:</label>
            <input type="date" class="form-control" id="delivery_date_">
          </div>
          <div class="col-md-8 mb-5">
            <label for="message-text" class="col-form-label">Comment:</label>
            <textarea class="form-control" id="comment_"></textarea>
          </div>
          <div class="col-md-12 col-12 mb-5" id="status">
          </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="pre_order">Pre Order</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
  <!--=====  Pre Order modal  ======-->

  <!--=============================================
  =            Quick view modal         =
  =============================================-->

  <?php foreach ($content as $food) {?>
  <div class="modal fade quick-view-modal-container" id="quick-view-modal-container<?php echo $food['m_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <!-- product quickview image gallery -->
              <div class="product-image-slider">
                <!--Modal Tab Content Start-->
                <div class="tab-content product-large-image-list" id="myTabContent">
                  <div class="tab-pane fade show active" id="single-slide1" role="tabpanel" aria-labelledby="single-slide-tab-1">
                    <!--Single Product Image Start-->
                    <div class="single-product-img img-full">
                      <img src="<?php if ($food['photo'] == $food['variety_photo']) {
                  echo base_url().'../app/assets/img/products/'.$food['photo'];
              } else {
                  echo base_url().'../app/assets/img/market_place/'.$food['photo'];
              } ?>" class="img-fluid" alt="">
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
                      <a data-toggle="tab" id="single-slide-tab-1" href="#single-slide1"><img src="<?php if ($food['photo'] == $food['variety_photo']) {
                  echo base_url().'../app/assets/img/products/'.$food['photo'];
              } else {
                  echo base_url().'../app/assets/img/market_place/'.$food['photo'];
              } ?>"
                        class="img-fluid" alt=""></a>
                    </div>
                    <!-- <div class="single-small-image img-full">
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
                    </div> -->
                  </div>
                </div>
                <!--Modal Tab Menu End-->
              </div>
              <!-- end of product quickview image gallery -->
            </div>
            <div class="col-md-6">
              <!-- product quick view description -->
              <div class="product-feature-details">
                <h2 class="product-title mb-15"><?php echo $food['product_name']; ?></h2>

                <h2 class="product-price mb-15">
                  <!-- <span class="main-price">$12.90</span> -->
                  <span class="discounted-price"> <?php echo $food['price_unit']." RWF /". $food['unit']; ?></span>
                </h2>

                <p class="product-description mb-20"><?php echo empty($food['description']) ? "No Description" : $food['description']; ?></p>


                <div class="cart-buttons mb-20">
                  <div class="pro-qty mr-10">
                    <input type="text" value="1" disabled>
                  </div>
                  <div class="add-to-cart-btn">
                    <a href="#"  data-tooltip="<?php echo in_array($food['m_id'], $_SESSION['wishlist_items'])? 'Remove from Wishlist': 'Add to Wishlist'; ?>" id="add_to_wishlist<?php echo $food['m_id']; ?>"
                      onclick="<?php echo in_array($id, $_SESSION['wishlist_items']) ? 'remove_from_wishlist('.$id.', event)' : 'addToWishlist('.$id.', event)'; ?>"  style="<?php echo in_array($food['m_id'], $_SESSION['wishlist_items']) ? 'background:red;': ''; ?>">
                      <i class="fa fa-shopping-cart"></i> Add to Cart</a>
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
  <?php } ?>
