    <!--=============================================
    =            breadcrumb area         =
    =============================================-->

    <div class="breadcrumb-area mb-50">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-container">
                        <ul>
                            <li><a href="index"><i class="fa fa-home"></i> Home</a></li>
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
					<form class="checkout-form" name="checkoutForm">
						<div class="row row-40">

							<div class="col-lg-7 mb-20">

                  <div id="errors">
                  </div>
                  <!-- Billing Address -->
                  <div id="billing-form" class="mb-40">
                  <h4 class="checkout-title">Billing Address</h4>

									<div class="row">

                    <?php if ($this->session->loggedIn == true) {?>

                      <div class="col-md-12 col-12 mb-20">
  											<label for="names">Names*</label>
  											<input type="text" placeholder="Names" id="names" name="names" value="<?php echo $this->session->names; ?>" disabled>
  										</div>

  										<div class="col-md-6 col-12 mb-20">
  											<label>Email Address*</label>
  											<input type="email" placeholder="Email Address" id="email" name="email" value="<?php echo $this->session->email; ?>" disabled>
  										</div>

  										<div class="col-md-6 col-12 mb-20">
  											<label>Phone no*</label>
  											<input type="tel" placeholder="Phone number" id="phone" name="phone" min="10" max="10" value="<?php echo $this->session->phone; ?>" disabled>
  										</div>

  										<div class="col-12 mb-20">
  											<label>National Id / Passport Id*</label>
  											<input type="text" placeholder="National Id / Passport Id" id="identity" name="identity" min="16" max="16" value="<?php echo $this->session->national_id; ?>" disabled>
  										</div>

  										<!-- <div class="col-12 mb-20">
  											<label>Address*</label>
  											<input type="text" placeholder="Address line 1">
  											<input type="text" placeholder="Address line 2">
  										</div> -->

                      <div class="col-md-6 col-12 mb-20">
  											<label>Country*</label>
  											<select class="nice-select" id="country" name="country" required>
  												<option selected>Rwanda</option>
  											</select>
  										</div>
                      <div class="col-md-6 col-12 mb-20">
  											<label>Province*</label>
  											<select class="nice-select" name="province" id="province">
  												<option selected><?php echo $this->session->province; ?></option>
  											</select>
  										</div>
                      <div class="col-md-6 col-12 mb-20">
  											<label>District*</label>
  											<select class="nice-select" name="district" id="district">
  												<option selected><?php echo $this->session->district; ?></option>
  											</select>
  										</div>
                      <div class="col-md-6 col-12 mb-20">
  											<label>Sector*</label>
  											<select class="nice-select" name="sector" id="sector">
  												<option selected><?php echo $this->session->sector; ?></option>
  											</select>
  										</div>
                      <div class="col-md-6 col-12 mb-20">
  											<label>Cell*</label>
  											<select class="nice-select" name="cell" id="cell">
  												<option selected><?php echo $this->session->cell; ?></option>
  											</select>
  										</div>
                      <div class="col-md-6 col-12 mb-20">
  											<label>Village*</label>
  											<select class="nice-select" name="village" id="village">
  												<option selected><?php echo $this->session->village; ?></option>
  											</select>
  										</div>
                      <input type="hidden" id="password" value="0"/>
                      <input type="hidden" id="confirm" value="0"/>
                    <?php } else { ?>

                    <div class="col-md-6 col-12 mb-20">
											<label for="fname">First Name*</label>
											<input type="text" placeholder="First Name" id="fname" name="fname" required>
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label for="lname">Last Name*</label>
											<input type="text" placeholder="Last Name" id="lname" name="lname">
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>Email Address*</label>
											<input type="email" placeholder="Email Address" id="email" name="email" required>
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>Phone no*</label>
											<input type="tel" placeholder="Phone number" id="phone" name="phone" min="10" max="10" required>
										</div>

										<div class="col-12 mb-20">
											<label>National Id / Passport Id*</label>
											<input type="text" placeholder="National Id / Passport Id" id="identity" name="identity" min="16" max="16" required>
										</div>

										<!-- <div class="col-12 mb-20">
											<label>Address*</label>
											<input type="text" placeholder="Address line 1">
											<input type="text" placeholder="Address line 2">
										</div> -->

                    <div class="col-md-6 col-12 mb-20">
											<label>Country*</label>
											<select class="nice-select" id="country" name="country" required>
												<option selected>Rwanda</option>
											</select>
										</div>
                    <div class="col-md-6 col-12 mb-20">
											<label>Province*</label>
											<select class="nice-select" name="province" id="province" required>
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
                    <div class="col-md-6 col-12 mb-20">
											<label>District*</label>
											<select class="nice-select" name="district" id="district" required>
												<option selected disabled>Select District</option>
											</select>
										</div>
                    <div class="col-md-6 col-12 mb-20">
											<label>Sector*</label>
											<select class="nice-select" name="sector" id="sector" required>
												<option selected disabled>Select Sector</option>
											</select>
										</div>
                    <div class="col-md-6 col-12 mb-20">
											<label>Cell*</label>
											<select class="nice-select" name="cell" id="cell" required>
												<option selected disabled>Select Cell</option>
											</select>
										</div>
                    <div class="col-md-6 col-12 mb-20">
											<label>Village*</label>
											<select class="nice-select" name="village" id="village" required>
												<option selected disabled>Select Village</option>
											</select>
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>Password*</label>
											<input type="password" placeholder="Password" id="password" name="password" required>
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>Confirm Password*</label>
											<input type="password" placeholder="Confirm Password" id="confirm" name="confirm" required>
										</div>
                  <?php } ?>
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
                  <h4 class="checkout-title">New Shipping Address</h4>

									<div class="row">

										<div class="col-md-6 col-12 mb-20">
											<label>First Name*</label>
											<input type="text" placeholder="First Name" id="fname2" name="fname2">
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>Last Name*</label>
											<input type="text" placeholder="Last Name" id="lname2" name="lname2">
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>Email Address*</label>
											<input type="email" placeholder="Email Address" id="email2" name="email2">
										</div>

										<div class="col-md-6 col-12 mb-20">
											<label>Phone no*</label>
											<input type="text" placeholder="Phone number" id="phone2" name="phone2">
										</div>

										<div class="col-12 mb-20">
											<label>National Id / Passport Id*</label>
											<input type="text" placeholder="National Id / Passport Id" id="identity2" name="identity2">
										</div>

										<!-- <div class="col-12 mb-20">
											<label>Address*</label>
											<input type="text" placeholder="Address line 1">
											<input type="text" placeholder="Address line 2">
										</div> -->

                    <div class="col-md-6 col-12 mb-20">
											<label>Country*</label>
											<select class="nice-select" id="country2" name="country2">
												<option selected>Rwanda</option>
											</select>
										</div>
                    <div class="col-md-6 col-12 mb-20">
											<label>Province*</label>
											<select class="nice-select" name="province2" id="province2" name="province2">
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
                    <div class="col-md-6 col-12 mb-20">
											<label>District*</label>
											<select class="nice-select" name="district2" id="district2">
												<option selected disabled>Select District</option>
											</select>
										</div>
                    <div class="col-md-6 col-12 mb-20">
											<label>Sector*</label>
											<select class="nice-select" name="sector2" id="sector2">
												<option selected disabled>Select Sector</option>
											</select>
										</div>
                    <div class="col-md-6 col-12 mb-20">
											<label>Cell*</label>
											<select class="nice-select" name="cell2" id="cell2">
												<option selected disabled>Select Cell</option>
											</select>
										</div>
                    <div class="col-md-6 col-12 mb-20">
											<label>Village*</label>
											<select class="nice-select" name="village2" id="village2">
												<option selected disabled>Select Village</option>
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
												<input type="radio" id="payment_mobile" name="payment-method" value="mobile">
												<label for="payment_mobile">Pay with Mobile Money(Airtel Tigo, MTN)</label>
												<p data-method="mobile">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
											</div>

											<div class="single-method">
												<input type="checkbox" id="accept_terms">
												<label for="accept_terms">I’ve read and accept the terms & conditions</label>
											</div>

										</div>

										<button type="button" class="place-order" id="checkout">Place order</button>

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
