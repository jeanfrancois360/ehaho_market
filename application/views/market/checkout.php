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
                            <li class="active">Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<!--=====  End of breadcrumb area  ======-->

	<!--=============================================
	=            Checkout page content         =
	=============================================-->

	<div class="page-section section mb-50">
		<div class="container">
			<div class="row">
				<div class="col-12">

					<!-- Checkout Form s-->
					<form action="#" class="checkout-form">
						<div class="row row-40">

							<div class="col-lg-7 mb-20">

								<!-- Billing Address -->
								<div id="billing-form" class="mb-40">
									<h4 class="checkout-title">Billing Address</h4>

									<div class="row">

										<div class="col-md-6 col-12 mb-20">
											<label>First Name*</label>
											<input type="text" placeholder="First Name">
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>Last Name*</label>
											<input type="text" placeholder="Last Name">
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>Email Address*</label>
											<input type="email" placeholder="Email Address">
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>Phone no*</label>
											<input type="text" placeholder="Phone number">
										</div>

										<div class="col-12 mb-20">
											<label>National Id / Passport Id*</label>
											<input type="text" placeholder="National Id / Passport Id">
										</div>

										<!-- <div class="col-12 mb-20">
											<label>Address*</label>
											<input type="text" placeholder="Address line 1">
											<input type="text" placeholder="Address line 2">
										</div> -->

                    <div class="col-md-6 col-12 mb-20">
											<label>Country*</label>
											<select class="nice-select">
												<option selected>Rwanda</option>
											</select>
										</div>
                    <div class="col-md-6 col-12 mb-20">
											<label>Province*</label>
											<select class="nice-select" name="province" id="province">
												<option selected>Select Province</option>
                        <?php
                        foreach ($provinces as $province) {
                            ?>
						<option value="<?php echo $province->id; ?>"><?php echo $province->name; ?></option>
						<?php
                        }
                        ?>
											</select>
										</div>
                    <div class="col-md-6 col-12 mb-20">
											<label>District*</label>
											<select class="nice-select" name="district" id="district">
												<option selected>Select District</option>
											</select>
										</div>
                    <div class="col-md-6 col-12 mb-20">
											<label>Sector*</label>
											<select class="nice-select" name="sector" id="sector">
												<option selected>Select Sector</option>
											</select>
										</div>
                    <div class="col-md-6 col-12 mb-20">
											<label>Cell*</label>
											<select class="nice-select" name="cell" id="cell">
												<option selected>Select Cell</option>
											</select>
										</div>
                    <div class="col-md-6 col-12 mb-20">
											<label>Village*</label>
											<select class="nice-select" name="village" id="village">
												<option selected>Select Village</option>
											</select>
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>Password*</label>
											<input type="password" placeholder="Password">
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>Confirm Password*</label>
											<input type="password" placeholder="Confirm Password">
										</div>

										<div class="col-12 mb-20">
											<div class="check-box">
												<input type="checkbox" id="create_account" checked disabled>
												<label for="create_account">Create an Acount?</label>
											</div>
											<div class="check-box">
												<input type="checkbox" id="shiping_address" data-shipping>
												<label for="shiping_address">Ship to Different Address</label>
											</div>
										</div>

									</div>

								</div>

								<!-- Shipping Address -->
								<div id="shipping-form" class="mb-40">
                  <h4 class="checkout-title">Shipping Address</h4>

									<div class="row">

										<div class="col-md-6 col-12 mb-20">
											<label>First Name*</label>
											<input type="text" placeholder="First Name">
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>Last Name*</label>
											<input type="text" placeholder="Last Name">
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>Email Address*</label>
											<input type="email" placeholder="Email Address">
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>Phone no*</label>
											<input type="text" placeholder="Phone number">
										</div>

										<div class="col-12 mb-20">
											<label>National Id / Passport Id*</label>
											<input type="text" placeholder="National Id / Passport Id">
										</div>

										<!-- <div class="col-12 mb-20">
											<label>Address*</label>
											<input type="text" placeholder="Address line 1">
											<input type="text" placeholder="Address line 2">
										</div> -->

                    <div class="col-md-6 col-12 mb-20">
											<label>Country*</label>
											<select class="nice-select">
												<option selected>Rwanda</option>
											</select>
										</div>
                    <div class="col-md-6 col-12 mb-20">
											<label>Province*</label>
											<select class="nice-select" name="province2" id="province2">
												<option selected>Select Province</option>
                        <?php
                        foreach ($provinces as $province) {
                            ?>
						<option value="<?php echo $province->id; ?>"><?php echo $province->name; ?></option>
						<?php
                        }
                        ?>
											</select>
										</div>
                    <div class="col-md-6 col-12 mb-20">
											<label>District*</label>
											<select class="nice-select" name="district2" id="district2">
												<option selected>Select District</option>
											</select>
										</div>
                    <div class="col-md-6 col-12 mb-20">
											<label>Sector*</label>
											<select class="nice-select" name="sector2" id="sector2">
												<option selected>Select Sector</option>
											</select>
										</div>
                    <div class="col-md-6 col-12 mb-20">
											<label>Cell*</label>
											<select class="nice-select" name="cell2" id="cell2">
												<option selected>Select Cell</option>
											</select>
										</div>
                    <div class="col-md-6 col-12 mb-20">
											<label>Village*</label>
											<select class="nice-select" name="village2" id="village2">
												<option selected>Select Village</option>
											</select>
										</div>
									</div>

								</div>

							</div>

							<div class="col-lg-5">
								<div class="row">

									<!-- Cart Total -->
									<div class="col-12 mb-60">

										<h4 class="checkout-title">Cart Total</h4>

										<div class="checkout-cart-total">

											<h4>Product <span>Total</span></h4>

											<ul id="checkout_products">

											</ul>

											<p>Sub Total <span id="checkout_subtotal">00.00 RWF</span></p>
											<p>Shipping Fee <span id="checkout_shipping">00.00 RWF</span></p>

											<h4>Grand Total <span id="checkout_total">00.00 RWF</span></h4>

										</div>

									</div>

									<!-- Payment Method -->
									<div class="col-12">

										<h4 class="checkout-title">Payment Method</h4>

										<div class="checkout-payment-method">

											<!-- <div class="single-method">
												<input type="radio" id="payment_check" name="payment-method" value="check">
												<label for="payment_check">Check Payment</label>
												<p data-method="check">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
											</div> -->

											<!-- <div class="single-method">
												<input type="radio" id="payment_bank" name="payment-method" value="bank">
												<label for="payment_bank">Direct Bank Transfer</label>
												<p data-method="bank">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
											</div> -->

											<div class="single-method">
												<input type="radio" id="payment_cash" name="payment-method" value="cash">
												<label for="payment_cash">Cash on Delivery</label>
												<p data-method="cash">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
											</div>

											<div class="single-method">
												<input type="radio" id="payment_paypal" name="payment-method" value="paypal">
												<label for="payment_paypal">Pay with VisaCard or CreditCard</label>
												<p data-method="paypal">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
											</div>

											<div class="single-method">
												<input type="radio" id="payment_payoneer" name="payment-method" value="payoneer">
												<label for="payment_payoneer">Pay with Mobile Money(Airtel Tigo, MTN)</label>
												<p data-method="payoneer">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
											</div>

											<div class="single-method">
												<input type="checkbox" id="accept_terms">
												<label for="accept_terms">I’ve read and accept the terms & conditions</label>
											</div>

										</div>

										<button class="place-order">Place order</button>

									</div>

								</div>
							</div>

						</div>
					</form>

				</div>
			</div>
		</div>
	</div>

	<!--=====  End of Checkout page content  ======-->
