var items = "";

function addToCart(market_id, e) {
	e.preventDefault();
	if (market_id != "") {
		jQuery.ajax({
			url: 'food_market/add_to_cart',
			data: {
				market_id: market_id
			},
			type: 'POST',
			success: function(data) {
				$('#add_to_cart' + market_id).css("background", "red");
				$("#add_to_cart" + market_id).attr("data-tooltip", "Added to cart");
				$("#add_to_cart" + market_id).attr("onclick", "remove_from_cart(" + market_id + ",event)");
				$('#add_to_cart_list' + market_id).css("background", "red");
				$("#add_to_cart_list" + market_id).attr("data-tooltip", "Added to cart");
				$("#add_to_cart_list" + market_id).attr("onclick", "remove_from_cart(" + market_id + ",event)");
				showCart();
			}
		});
	}
}

function remove_from_cart(id, e) {
	e.preventDefault();
	if (id != "") {
		jQuery.ajax({
			url: 'food_market/removeItem',
			data: {
				id: id
			},
			type: 'POST',
			success: function(data) {
				$("#add_to_cart" + id).css("background", "#3a8245");
				$("#add_to_cart" + id).attr("onclick", "addToCart(" + id + ",event)");
				$("#add_to_cart" + id).attr("data-tooltip", "Add to cart");
				$('#add_to_cart_list' + id).css("background", "#3a8245");
				$("#add_to_cart_list" + id).attr("data-tooltip", "Add to cart");
				$("#add_to_cart_list" + id).attr("onclick", "addToCart(" + id + ",event)");
				showCart();
				viewCart();
			}
		});
	}
}

function showCart() {
	jQuery.ajax({
		url: 'food_market/show_cart',
		data: '',
		type: 'POST',
		success: function(html, textStatus) {
			var response = JSON.parse(html);
			var subtotal = 0;
			$('#subtotal').html("");
			$('#cart-items').html("");
			var i = 0;
			$.each(response, function(item, value) {
				i++;
				cart_data = '<div class="cart-float-single-item d-flex">';
				cart_data += '<span class="remove-item"><a href="#" onclick="remove_from_cart(' + this.m_id + ', event)"><i class="fa fa-times" style="color:red;"></i></a></span>';
				cart_data += '<div class="cart-float-single-item-image">';
				cart_data += '<a href="single-product.html"><img src="assets/images/products/product01.jpg" class="img-fluid" alt=""></a>';
				cart_data += '</div>';
				cart_data += '<div class="cart-float-single-item-desc">';
				cart_data += '<p class="product-title"> <a href="single-product.html">' + this.product_name + '</a></p>';
				cart_data += '<p class="price" id="price"><span class="count" id="count' + i + '">1x</span>' + this.price_unit + ' /' + this.unit + '</p>';
				cart_data += '</div>';
				cart_data += '</div>';
				subtotal += parseInt(this.price_unit);
				$('#cart-items').append(cart_data);
			});
			subtotal = subtotal + " RWF";
			$('#cart-title').html("");
			$('#cart-title').append(i + " items" + " - " + subtotal);
			$('#subtotal').append(subtotal);
		}
	});
}

function viewCart() {
	jQuery.ajax({
		url: 'food_market/show_cart',
		data: '',
		type: 'POST',
		success: function(html, textStatus) {
			var response = JSON.parse(html);
			var subtotal = 0;
			$('#subtotal').html("");
			$('#cart-items').html("");
			$('#viewCart').html('');
			var i = 0;
			if (response.length === 0) {
				cart_datae = '<tr><td colspan="7"><h4>Cart is empty</h4></td></tr>';
				$('#viewCart').append(cart_datae);
			} else {
				$.each(response, function(item, value) {
					i++;
					cart_data = '<tr>';
					cart_data += '<td class="pro-thumbnail"><a href="#"><img src="assets/images/products/product01.jpg" class="img-fluid" alt="Product"></a></td>';
					cart_data += '<td class="pro-title"><a href="#">' + this.product_name + '</a></td>';
					cart_data += '<td class="pro-price"><span>' + this.price_unit + '&nbsp;RWF</span><input type="hidden" value="' + this.price_unit + '" id="unit_price' + i + '"></td>';
					cart_data += '<td class="pro-quantity"><div class="pro-qty" id="pro-qty' + i + '"><input type="text" value="1" onkeyup="calc(' + i + ')" id="qty' + i + '"></div></td>';
					cart_data += '<td class="pro-subtotal"><span id="pro-subtotal' + i + '">' + this.price_unit + '&nbsp;RWF</span><input type="hidden" value="' + this.price_unit + '" id="total_price' + i + '"></td>';
					cart_data += '<td class="pro-remove"><a href="#" onclick="remove_from_cart(' + this.m_id + ', event)"><i class="fa fa-trash-o"></i></a><td>';
					cart_data += '<tr>';
					$('#viewCart').append(cart_data);
					subtotal += parseInt(this.price_unit);
				});
			}
			total = subtotal;
			subtotal = subtotal + " RWF";
			$('#cart-title').html("");
			$('#cart-title').append(i + " items" + " - " + subtotal);
			items = i;
			$('tbody').data("subtotal", subtotal);
			$('#subtotal').append(subtotal);
			$('#total').val(total);
			$('#overall_subtotal').html('');
			$('#overall_subtotal').append(subtotal + '&nbsp;RWF');
			$('#grand_total').html('');
			$('#grand_total').append(subtotal + '&nbsp;RWF');
		}
	});
}

function calc(t) {
	var subtotal, price_unit, total_price, old_price, quantity;
	old_price = $('#total_price' + t).val();
	price_unit = $('#unit_price' + t).val();
	quantity = $('#qty' + t).val();
	subtotal = $('#total').val();
	total_price = parseInt(price_unit) * parseInt(quantity);
	isNaN(total_price) ? total_price = 0 : total_price = total_price;
	isNaN(old_price) ? old_price = 0 : old_price = old_price;
	subtotal = parseInt(subtotal) + (parseInt(total_price) - parseInt(old_price));
	$('#total_price' + t).val(total_price);
	$('#count' + t).html('');
	$('#count' + t).append(quantity + 'x');
	$('#pro-subtotal' + t).html('');
	$('#pro-subtotal' + t).append(total_price + '&nbsp;RWF');
	$('#cart-title').html('');
	$('#cart-title').append(items + " items" + " - " + subtotal + '&nbsp;RWF');
	$('#subtotal').html('');
	$('#subtotal').append(subtotal + '&nbsp;RWF');
	$('#total').val(subtotal);
	$('#overall_subtotal').html('');
	$('#overall_subtotal').append(subtotal + '&nbsp;RWF');
	$('#grand_total').html('');
	$('#grand_total').append(subtotal + '&nbsp;RWF');
}

function checkout() {

}