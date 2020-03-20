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
                            <li class="active">My Orders</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<!--=====  End of breadcrumb area  ======-->

    <!--=============================================
    =            MyOrders page content         =
    =============================================-->


    <div class="page-section section mb-50">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<form action="#">
							<!--=======  cart table  =======-->

							<div class="cart-table table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th class="pro-thumbnail">Order Id</th>
											<th class="pro-title">Payment Method</th>
											<th class="pro-price">Total</th>
											<th class="pro-quantity">Status</th>
											<th class="pro-subtotal">Date</th>
											<th class="pro-remove">Action</th>
											<th class="pro-remove"></th>
										</tr>
									</thead>
									<tbody id="viewMyOrders">
									</tbody>
								</table>
							</div>

							<!--=======  End of cart table  =======-->

						</form>
					</div>
				</div>
			</div>
		</div>

		<!--=====  End of Cart page content  ======-->

    <!-- ===============================
              =   orders modals =
    ======================================-->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">ORDER DETAILS</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th class="pro-thumbnail">Image</th>
                  <th class="pro-title">Product</th>
                  <th class="pro-title">Variety</th>
                  <th class="pro-quantity">Quantity</th>
                  <th class="pro-price">Unit Price</th>
                  <th class="pro-subtotal">Total</th>
                  <th class="pro-remove">Action</th>
                  <th class="pro-remove"></th>
                </tr>
              </thead>
              <tbody id="order_info">
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="5">
                    <strong>SUBTOTAL</strong>
                  </td>
                  <td colspan="2" id="order_total">
                  </td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade bd-example-modal-lgg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">SUPPLIER OFFER</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th class="pro-title">Names</th>
                <th class="pro-title">Phone</th>
                <th class="pro-title">Email</th>
                <th class="pro-title">Product</th>
                <th class="pro-title">Variety</th>
                <th class="pro-quantity">Quantity</th>
                <th class="pro-price">Unit Price</th>
                <th class="pro-subtotal">Total</th>
                <th class="pro-title">country</th>
                <th class="pro-title">province</th>
                <th class="pro-title">district</th>
                <th class="pro-title">sector</th>
                <th class="pro-title">cell</th>
                <th class="pro-title">village</th>
                <th class="pro-title">Delivery Date</th>
                <th class="pro-title">Comment</th>
                <th class="pro-title">Status</th>
                <th class="pro-remove">Action</th>
              </tr>
            </thead>
            <tbody id="order_offer">
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    <!--========== end of orders modals ============-->

    <!-- ===============================
              =   edit supplier quantity modal =
    ======================================-->
<div class="modal fade" id="updateForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Update Supplied Quantity</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="msg">
        </div>
        <form class="form-inline checkout-form">
          <div class="row">
            <div class="col-md-5 mb-2">
              <label for="recipient-name" class="col-form-label">Ordered Quantity:</label>
              <input type="hidden" id="tid">
              <input type="hidden" id="order_id">
              <input type="text" class="form-control" id="ordered" placeholder="Ordered Quantity" readonly>
            </div>
            <div class="col-md-5 mx-sm-3 mb-2">
              <label for="recipient-name" class="col-form-label">Supplied Quantity:</label>
              <input type="text" class="form-control" id="supplied" placeholder="Supplied Quantity">
            </div>
          </div>
            <button type="button" class="btn btn-success mb-2" id="updateSupplied">Update</button>
          </form>
      </div>
    </div>
  </div>
</div>
