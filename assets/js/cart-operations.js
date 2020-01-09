var items = "";

function addToCart(market_id, e) {
	e.preventDefault();
	if (market_id != "") {
		jQuery.ajax({
			url: base_url + 'food_market/add_to_cart',
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
				addToStorage(market_id);
				showCart();
			}
		});
	}
}

function remove_from_cart(id, e) {
	e.preventDefault();
	if (id != "") {
		jQuery.ajax({
			url: base_url + 'food_market/removeItem',
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
				var order = JSON.parse(localStorage.getItem('order'));
				var toRemove = findIndex(order, id);
				// console.log(order[1]);
				console.log("toRemove: " + toRemove);
				// order.splice(0, 1);
				order.splice(toRemove, 1);
				localStorage.removeItem('order');
				var total = getTotal(order);
				updateTotal(order, total);
				localStorage.setItem("order", JSON.stringify(order));
				showCart();
				viewCart();
				checkout_processing();
			}
		});
	}
}

function showCart() {
	jQuery.ajax({
		url: base_url + 'food_market/show_cart',
		data: '',
		type: 'POST',
		success: function(html, textStatus) {
			var response = JSON.parse(html);
			var subtotal = 0;
			$('#subtotal').html("");
			$('#cart-items').html("");
			var i = 0;
			if (localStorage.getItem('order') !== null) {
				var order = JSON.parse(localStorage.getItem('order'));
				$.each(order, function(item, value) {
					i++;
					cart_data = '<div class="cart-float-single-item d-flex">';
					cart_data += '<span class="remove-item"><a href="#" onclick="remove_from_cart(' + this.market_id + ', event)"><i class="fa fa-times" style="color:red;"></i></a></span>';
					cart_data += '<div class="cart-float-single-item-image">';
					cart_data += '<a href="single-product.html"><img src="' + base_url + 'assets/images/products/product01.jpg" class="img-fluid" alt=""></a>';
					cart_data += '</div>';
					cart_data += '<div class="cart-float-single-item-desc">';
					cart_data += '<p class="product-title" id="product-title"> <a href="single-product.html">' + this.product_name + '</a></p>';
					cart_data += '<p class="price" id="price"><span class="count" id="count' + i + '">' + this.qty + 'x</span>' + this.unit_price + ' /' + this.unit + '</p>';
					cart_data += '</div>';
					cart_data += '</div>';
					subtotal += parseInt(this.unit_price);
					$('#cart-items').append(cart_data);
				});
			} else {
				$.each(response, function(item, value) {
					i++;
					cart_data = '<div class="cart-float-single-item d-flex">';
					cart_data += '<span class="remove-item"><a href="#" onclick="remove_from_cart(' + this.m_id + ', event)"><i class="fa fa-times" style="color:red;"></i></a></span>';
					cart_data += '<div class="cart-float-single-item-image">';
					cart_data += '<a href="single-product.html"><img src="' + base_url + 'assets/images/products/product01.jpg" class="img-fluid" alt=""></a>';
					cart_data += '</div>';
					cart_data += '<div class="cart-float-single-item-desc">';
					cart_data += '<p class="product-title" id="product-title"> <a href="single-product.html">' + this.product_name + '</a></p>';
					cart_data += '<p class="price" id="price"><span class="count" id="count' + i + '">1x</span>' + this.price_unit + ' /' + this.unit + '</p>';
					cart_data += '</div>';
					cart_data += '</div>';
					subtotal += parseInt(this.price_unit);
					$('#cart-items').append(cart_data);
				});
			}
			subtotal = subtotal + " RWF";
			$('#cart-title').html("");
			$('#cart-title').append(i + " items" + " - " + subtotal);
			$('#subtotal').append(subtotal);
		}
	});
}

function viewCart() {
	jQuery.ajax({
		url: base_url + 'food_market/show_cart',
		data: '',
		type: 'POST',
		success: function(html, textStatus) {
			var response = JSON.parse(html);
			var subtotal = 0;
			$('#subtotal').html("");
			$('#viewCart').html('');
			var i = 0;
			if (response.length === 0) {
				cart_datae = '<tr><td colspan="7"><h4>Cart is empty</h4></td></tr>';
				$('#viewCart').append(cart_datae);
			} else {
				if (localStorage.getItem('order') === null) {
					$.each(response, function(item, value) {
						i++;
						cart_data = '<tr>';
						cart_data += '<td class="pro-thumbnail"><a href="#"><img src="' + base_url + 'assets/images/products/product01.jpg" class="img-fluid" alt="Product"></a><input type="hidden" value="' + this.m_id + '" id="market_id' + i + '"></td>';
						cart_data += '<td class="pro-title"><a href="#">' + this.product_name + '</a><input type="hidden" value="' + this.product_id + '" id="product_id' + i + '"><input type="hidden" value="' + this.product_name + '" id="product_name' + i + '"></td>';
						cart_data += '<td class="pro-price"><span>' + this.price_unit + '&nbsp;RWF</span><input type="hidden" value="' + this.price_unit + '" id="unit_price' + i + '"><input type="hidden" value="' + this.unit + '" id="unit' + i + '"></td>';
						cart_data += '<td class="pro-quantity"><div class="pro-qty" id="pro-qty' + i + '"><input type="text" value="1" onkeyup="calc(' + i + ')" id="qty' + i + '"></div></td>';
						cart_data += '<td class="pro-subtotal"><span id="pro-subtotal' + i + '">' + this.price_unit + '&nbsp;RWF</span><input type="hidden" value="' + this.price_unit + '" id="total_price' + i + '"></td>';
						cart_data += '<td class="pro-remove"><a href="#" onclick="remove_from_cart(' + this.m_id + ', event)"><i class="fa fa-trash-o"></i></a><td>';
						cart_data += '<tr>';
						$('#viewCart').append(cart_data);
						subtotal += parseInt(this.price_unit);
					});
				} else {
					var order = JSON.parse(localStorage.getItem('order'));
					$.each(order, function(item, value) {
						i++;
						cart_data = '<tr>';
						cart_data += '<td class="pro-thumbnail"><a href="#"><img src="' + base_url + 'assets/images/products/product01.jpg" class="img-fluid" alt="Product"></a><input type="hidden" value="' + this.market_id + '" id="market_id' + i + '"></td>';
						cart_data += '<td class="pro-title"><a href="#">' + this.product_name + '</a><input type="hidden" value="' + this.product_id + '" id="product_id' + i + '"><input type="hidden" value="' + this.product_name + '" id="product_name' + i + '"></td>';
						cart_data += '<td class="pro-price"><span>' + this.unit_price + '&nbsp;RWF</span><input type="hidden" value="' + this.unit_price + '" id="unit_price' + i + '"><input type="hidden" value="' + this.unit + '" id="unit' + i + '"></td>';
						cart_data += '<td class="pro-quantity"><div class="pro-qty" id="pro-qty' + i + '"><input type="text" value="' + this.qty + '" onkeyup="calc(' + i + ')" id="qty' + i + '"></div></td>';
						cart_data += '<td class="pro-subtotal"><span id="pro-subtotal' + i + '">' + this.total_price + '&nbsp;RWF</span><input type="hidden" value="' + this.total_price + '" id="total_price' + i + '"></td>';
						cart_data += '<td class="pro-remove"><a href="#" onclick="remove_from_cart(' + this.market_id + ', event)"><i class="fa fa-trash-o"></i></a><td>';
						cart_data += '<tr>';
						$('#viewCart').append(cart_data);
						subtotal += parseInt(this.total_price);
					});
				}
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
			$('#overall_total').val(total);
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
	$('#overall_total').val(subtotal);
	$('#overall_subtotal').html('');
	$('#overall_subtotal').append(subtotal + '&nbsp;RWF');
	$('#grand_total').html('');
	$('#grand_total').append(subtotal + '&nbsp;RWF');
}

function checkout() {
	localStorage.removeItem('order');
	var order = [];
	var market_id, product_id, unit_price, qty, total_price, total, grand_total;
	for (var i = 1; i <= items; i++) {
		market_id = $('#market_id' + i).val();
		product_id = $('#product_id' + i).val();
		product_name = $('#product_name' + i).val();
		unit_price = $('#unit_price' + i).val();
		qty = $('#qty' + i).val();
		unit = $('#unit' + i).val();
		total_price = $('#total_price' + i).val();
		total = $('#total').val();
		grand_total = $('#overall_total').val();
		if (market_id !== undefined) {
			order.push({
				num: i,
				market_id: market_id,
				product_id: product_id,
				product_name: product_name,
				unit_price: unit_price,
				qty: qty,
				unit: unit,
				shipping: "0",
				total_price: total_price,
				subtotal: total,
				grand_total: grand_total
			});
			localStorage.setItem("order", JSON.stringify(order));
		}
	}
	// console.log(market_id);
	console.log(JSON.parse(localStorage.getItem('order')));
}

function redirectToCheckout() {
	checkout();
	window.location.href = "https://ehaho.rw/marketPlaces/checkout";
}

function redirectToShop() {
	window.location.href = "https://ehaho.rw/marketPlaces/shop";
}

function checkout_processing() {
	$('#checkout_products').html('');
	console.log(localStorage.getItem('order'));
	if (localStorage.getItem('order') !== null) {
		var order = JSON.parse(localStorage.getItem('order'));
		if (order.length === 0) {
			localStorage.removeItem('order');
		}
		var checkout_subtotal = 0,
			checkout_shipping = 0,
			checkout_grand_total = 0,
			i = 0;
		$.each(order, function(item, value) {
			i++;
			if (this.market_id === undefined) {
				localStorage.removeItem('order');
				$('#checkout_subtotal').html('');
				$('#checkout_shipping').html('');
				$('#checkout_total').html('');
				$('#checkout_subtotal').append("0" + '&nbsp;RWF');
				$('#checkout_shipping').append("0" + '&nbsp;RWF');
				$('#checkout_total').append("0" + '&nbsp;RWF');
				return;
			} else {

				$('#count' + i).html('');
				$('#count' + i).append(this.qty + 'x');
				checkout_data = '<li>' + this.product_name + '&nbsp;X&nbsp;' + this.qty + '<span>' + this.total_price + '&nbsp;RWF</span></li>';
				$('#checkout_products').append(checkout_data);
				checkout_subtotal = this.subtotal;
				checkout_shipping = this.shipping;
				checkout_grand_total = this.grand_total;
			}
		});
		$('#checkout_subtotal').html('');
		$('#checkout_shipping').html('');
		$('#checkout_total').html('');
		$('#subtotal').html('');
		$('#subtotal').append(subtotal + '&nbsp;RWF');
		$('#checkout_subtotal').append(checkout_subtotal + '&nbsp;RWF');
		$('#checkout_shipping').append(checkout_shipping + '&nbsp;RWF');
		$('#checkout_total').append(checkout_grand_total + '&nbsp;RWF');
		// var toRemove = findIndex(order, 371);
		// order.splice(toRemove, 1);
		// localStorage.removeItem('order');
		console.log(order);
		console.log(localStorage.getItem('order'));

		// console.log(toRemove);

	}
}

function findIndex(array, value) {
	// return array.length;
	var val;
	for (var idi = 0; idi < array.length; idi++) {
		new_val = parseInt(array[idi]['market_id']);
		if (new_val === parseInt(value)) {
			val = idi;
		}
		// val.push({
		// 	new_val: new_val,
		// 	idi: idi,
		// 	value: value
		// });
	}
	return val;
}

function getTotal(array) {
	var subtotal = 0;
	$.each(array, function(item, value) {
		subtotal += parseInt(this.total_price);
	});
	return subtotal;
}

function updateTotal(array, total) {
	for (var i = 0; i < array.length; i++) {
		array[i].subtotal = total;
		array[i].grand_total = total;
	}
}
$('#province').change(function() {

	var form_data = {
		name: $('#province').val()
	};

	$.ajax({
		url: "food_market/get_districts",
		type: 'POST',
		dataType: 'json',
		data: form_data,
		success: function(msg) {
			var sc = '';
			$.each(msg, function(key, val) {
				sc += '<option value="' + this.id + '">' + this.name + '</option>';
			});
			$("#district option").remove();
			$("#district").append('<option value="">-- Select a District --</option>');
			$("#sector option").remove();
			$("#sector").append('<option value="">-- Select a Sector --</option>');
			$("#cell option").remove();
			$("#cell").append('<option value="">-- Select a Cell --</option>');
			$("#village option").remove();
			$("#village").append('<option value="">-- Select a Village --</option>');
			$("#district").append(sc);
			$("select").niceSelect('update');
		}
	});
});
$('#district').change(function() {

	var form_data = {
		name: $('#district').val()
	};

	$.ajax({
		url: "Food_market/get_sectors",
		type: 'POST',
		dataType: 'json',
		data: form_data,
		success: function(msg) {
			var sc = '';
			$.each(msg, function(key, val) {
				sc += '<option value="' + val.id + '">' + val.name + '</option>';
			});
			$("#sector option").remove();
			$("#sector").append('<option value="">-- Select a Sector --</option>');
			$("#cell option").remove();
			$("#cell").append('<option value="">-- Select a Cell --</option>');
			$("#village option").remove();
			$("#village").append('<option value="">-- Select a Village --</option>');
			$("#sector").append(sc);
			$("select").niceSelect('update');
		}
	});
});
$('#sector').change(function() {

	var form_data = {
		name: $('#sector').val()
	};

	$.ajax({
		url: "Food_market/get_cells",
		type: 'POST',
		dataType: 'json',
		data: form_data,
		success: function(msg) {
			var sc = '';
			$.each(msg, function(key, val) {
				sc += '<option value="' + val.id + '">' + val.name + '</option>';
			});
			$("#cell option").remove();
			$("#cell").append('<option value="">-- Select a Cell --</option>');
			$("#village option").remove();
			$("#village").append('<option value="">-- Select a Village --</option>');
			$("#cell").append(sc);
			$("select").niceSelect('update');
		}
	});
});
$('#cell').change(function() {

	var form_data = {
		name: $('#cell').val()
	};

	$.ajax({
		url: "Food_market/get_villages",
		type: 'POST',
		dataType: 'json',
		data: form_data,
		success: function(msg) {
			var sc = '';
			$.each(msg, function(key, val) {
				sc += '<option value="' + val.id + '">' + val.name + '</option>';
			});
			$("#village option").remove();
			$("#village").append('<option value="">-- Select a Village --</option>');
			$("#village").append(sc);
			$("select").niceSelect('update');
		}
	});
});

function addToStorage(market_id) {
	$.ajax({
		url: base_url + 'food_market/show_single_cart',
		type: 'POST',
		data: {
			market_id: market_id
		},
		success: function(html, textStatus) {
			var response = JSON.parse(html);
			var order = [];
			if (localStorage.getItem('order') === null) {
				i = 0;
				$.each(response, function(item, value) {
					i++;
					order.push({
						num: i,
						market_id: this.m_id,
						product_id: this.product_id,
						product_name: this.product_name,
						unit_price: this.price_unit,
						qty: 1,
						unit: this.unit,
						shipping: "0",
						total_price: this.price_unit,
						subtotal: this.price_unit,
						grand_total: this.price_unit
					});
				});
				localStorage.setItem("order", JSON.stringify(order));
			} else {
				current_order = JSON.parse(localStorage.getItem('order'));
				i = current_order.length;
				var total = getTotal(current_order);
				$.each(response, function(item, value) {
					i++;
					total += parseInt(this.price_unit);
					current_order.push({
						num: i,
						market_id: this.m_id,
						product_id: this.product_id,
						product_name: this.product_name,
						unit_price: this.price_unit,
						qty: 1,
						unit: this.unit,
						shipping: "0",
						total_price: this.price_unit,
						subtotal: this.price_unit,
						grand_total: this.price_unit
					});
				});
				updateTotal(current_order, total);
				localStorage.removeItem('order');
				localStorage.setItem('order', JSON.stringify(current_order));
			}
		}
	});
}