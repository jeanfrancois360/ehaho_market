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
                        <li class="active">Register</li>
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
              <div id="billing-form" class="mb-40 checkout-cart-total">
              <h4 class="checkout-title">Billing Address</h4>

              <div class="row">

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
                  <button type="button" class="place-order" id="register">Register</button>
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
