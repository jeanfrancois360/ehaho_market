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
                            <li class="active">Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--=====  End of breadcrumb area  ======-->


    <!--=============================================
    =            Cart page content         =
    =============================================-->


    <div class="page-section section mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="#">
                        <!--=======  cart table  =======-->

                        <div class="cart-table table-responsive mb-40">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="pro-thumbnail">Image</th>
                                        <th class="pro-title">Product</th>
                                        <th class="pro-price">Price</th>
                                        <th class="pro-quantity">Quantity</th>
                                        <th class="pro-subtotal">Total</th>
                                        <th class="pro-remove">Remove</th>
																				<th class ="pro-remove"></th>
                                    </tr>
                                </thead>
                                <tbody id="viewCart">
                                </tbody>
																<input type="hidden" id="total" value="0" />
																<input type="hidden" id="overall_total" value="0" />
                            </table>
                        </div>

                        <!--=======  End of cart table  =======-->


                    </form>

                    <div class="row">

                        <div class="col-lg-6 col-12">
                            <!--=======  Calculate Shipping  =======-->

                            <div class="calculate-shipping">
                                <h4>Calculate Shipping</h4>
                                <form action="#">
                                    <div class="row">
                                        <div class="col-md-6 col-12 mb-25">
                                            <select class="nice-select">
                                                <option>Bangladesh</option>
                                                <option>China</option>
                                                <option>country</option>
                                                <option>India</option>
                                                <option>Japan</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-12 mb-25">
                                            <select class="nice-select">
                                                <option>Dhaka</option>
                                                <option>Barisal</option>
                                                <option>Khulna</option>
                                                <option>Comilla</option>
                                                <option>Chittagong</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-12 mb-25">
                                            <input type="text" placeholder="Postcode / Zip">
                                        </div>
                                        <div class="col-md-6 col-12 mb-25">
                                            <input type="submit" value="Estimate">
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!--=======  End of Calculate Shipping  =======-->

                            <!--=======  Discount Coupon  =======-->

                            <div class="discount-coupon">
                                <h4>Discount Coupon Code</h4>
                                <form action="#">
                                    <div class="row">
                                        <div class="col-md-6 col-12 mb-25">
                                            <input type="text" placeholder="Coupon Code">
                                        </div>
                                        <div class="col-md-6 col-12 mb-25">
                                            <input type="submit" value="Apply Code">
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!--=======  End of Discount Coupon  =======-->

                        </div>


                        <div class="col-lg-6 col-12 d-flex">
                            <!--=======  Cart summery  =======-->

                            <div class="cart-summary">
                                <div class="cart-summary-wrap">
                                    <h4>Cart Summary</h4>
                                    <p>Sub Total <span id="overall_subtotal">00.00 RWF</span></p>
                                    <p>Shipping Cost <span id="shipping_cost">00.00 RWF</span></p>
                                    <h2>Grand Total <span id="grand_total">00.00 RWF</span></h2>
                                </div>
                                <div class="cart-summary-button">
                                    <button class="checkout-btn" onclick="redirectToCheckout()">Checkout</button>
                                    <button class="update-btn">Update Cart</button>
                                </div>
                            </div>

                            <!--=======  End of Cart summery  =======-->

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--=====  End of Cart page content  ======-->
