function addToCart(market_id) {
	if (market_id != "") {
		jQuery.ajax({
			url: 'food_market/add_to_cart',
			data: {
				market_id: market_id
			},
			type: 'POST',
			success: function(data) {
				showCart();
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
				cart_data += '<span class="remove-item"><a onclick="remove_from_cart(' + this.m_id + ')"><i class="fa fa-times" style="color:red;"></i></a></span>';
				cart_data += '<div class="cart-float-single-item-image">';
				cart_data += '<a href="single-product.html"><img src="assets/images/products/product01.jpg" class="img-fluid" alt=""></a>';
				cart_data += '</div>';
				cart_data += '<div class="cart-float-single-item-desc">';
				cart_data += '<p class="product-title"> <a href="single-product.html">' + this.product_name + '</a></p>';
				cart_data += '<p class="price"><span class="count">1x</span>' + this.price_unit + ' /' + this.unit + '</p>';
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

function remove_from_cart(id) {
	if (id != "") {
		jQuery.ajax({
			url: 'food_market/removeItem',
			data: {
				id: id
			},
			type: 'POST',
			success: function(data) {
				showCart();
			}
		});
	}
}