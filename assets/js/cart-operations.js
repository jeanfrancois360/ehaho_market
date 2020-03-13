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

function addToWishlist(market_id, e) {
	e.preventDefault();
	if (market_id != "") {
		jQuery.ajax({
			url: base_url + 'food_market/add_to_wishlist',
			data: {
				market_id: market_id
			},
			type: 'POST',
			success: function(data) {
				$('#add_to_wishlist' + market_id).css("background", "red");
				$("#add_to_wishlist" + market_id).attr("data-tooltip", "Added to Wishlist");
				$("#add_to_wishlist" + market_id).attr("onclick", "remove_from_wishlist(" + market_id + ",event)");
				$('#add_to_wishlist_list' + market_id).css("background", "red");
				$("#add_to_wishlist_list" + market_id).attr("data-tooltip", "Added to Wishlist");
				$("#add_to_wishlist_list" + market_id).attr("onclick", "remove_from_wishlist(" + market_id + ",event)");
				addToWishlistStorage(market_id);
				viewWishlist();
			}
		});
	}
}

function addToCompare(market_id, e) {
	e.preventDefault();
	if (market_id != "") {
		jQuery.ajax({
			url: base_url + 'food_market/add_to_compare',
			data: {
				market_id: market_id
			},
			type: 'POST',
			success: function(data) {
				console.log(JSON.parse(data));
				$('#add_to_compare' + market_id).css("background", "red");
				$("#add_to_compare" + market_id).attr("data-tooltip", "Added to Compare");
				$("#add_to_compare" + market_id).attr("onclick", "remove_from_compare(" + market_id + ",event)");
				$('#add_to_compare_list' + market_id).css("background", "red");
				$("#add_to_compare_list" + market_id).attr("data-tooltip", "Added to Compare");
				$("#add_to_compare_list" + market_id).attr("onclick", "remove_from_compare(" + market_id + ",event)");
				addToCompareStorage(market_id);
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

function remove_from_wishlist(id, e) {
	e.preventDefault();
	if (id != "") {
		jQuery.ajax({
			url: base_url + 'food_market/removeWishlistItem',
			data: {
				id: id
			},
			type: 'POST',
			success: function(data) {
				$("#add_to_wishlist" + id).css("background", "#3a8245");
				$("#add_to_wishlist" + id).attr("onclick", "addToWishlist(" + id + ",event)");
				$("#add_to_wishlist" + id).attr("data-tooltip", "Add to Wishlist");
				$('#add_to_wishlist_list' + id).css("background", "#3a8245");
				$("#add_to_wishlist_list" + id).attr("data-tooltip", "Add to Wishlist");
				$("#add_to_wishlist_list" + id).attr("onclick", "addToWishlist(" + id + ",event)");
				var wishlist = JSON.parse(localStorage.getItem('wishlist'));
				var toRemove = findIndex(wishlist, id);
				// console.log(wishlist[1]);
				console.log("WishlistoRemove: " + toRemove);
				// wishlist.splice(0, 1);
				wishlist.splice(toRemove, 1);
				localStorage.removeItem('wishlist');
				var total = getTotal(wishlist);
				updateTotal(wishlist, total);
				localStorage.setItem("wishlist", JSON.stringify(wishlist));
				// showCart();
				viewWishlist();
			}
		});
	}
}

function remove_from_compare(id, e) {
	e.preventDefault();
	if (id != "") {
		jQuery.ajax({
			url: base_url + 'food_market/removeCompareItem',
			data: {
				id: id
			},
			type: 'POST',
			success: function(data) {
				$("#add_to_compare" + id).css("background", "#3a8245");
				$("#add_to_compare" + id).attr("onclick", "addToCompare(" + id + ",event)");
				$("#add_to_compare" + id).attr("data-tooltip", "Add to Compare");
				$('#add_to_compare_list' + id).css("background", "#3a8245");
				$("#add_to_compare_list" + id).attr("data-tooltip", "Add to Compare");
				$("#add_to_compare_list" + id).attr("onclick", "addToCompare(" + id + ",event)");
				var compare = JSON.parse(localStorage.getItem('compare'));
				var toRemove = findIndex(compare, id);
				// console.log(compare[1]);
				console.log("ComparetoRemove: " + toRemove);
				// compare.splice(0, 1);
				compare.splice(toRemove, 1);
				localStorage.removeItem('compare');
				var total = getTotal(compare);
				updateTotal(compare, total);
				localStorage.setItem("compare", JSON.stringify(compare));
				showCompare();
				viewCompare();
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
					var img_url = "../app/assets/img/market_place/";
					if (this.photo == this.variety_photo) {
						img_url = "../app/assets/img/products/";
					}
					cart_data = '<div class="cart-float-single-item d-flex">';
					cart_data += '<span class="remove-item"><a href="#" onclick="remove_from_cart(' + this.market_id + ', event)"><i class="fa fa-times" style="color:red;"></i></a></span>';
					cart_data += '<div class="cart-float-single-item-image">';
					cart_data += '<a href="single-product.html"><img src="' + base_url + img_url + this.photo + '" class="img-fluid" alt=""></a>';
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
					var img_url = "../app/assets/img/market_place/";
					if (this.photo == this.variety_photo) {
						img_url = "../app/assets/img/products/";
					}
					cart_data = '<div class="cart-float-single-item d-flex">';
					cart_data += '<span class="remove-item"><a href="#" onclick="remove_from_cart(' + this.market_id + ', event)"><i class="fa fa-times" style="color:red;"></i></a></span>';
					cart_data += '<div class="cart-float-single-item-image">';
					cart_data += '<a href="single-product.html"><img src="' + base_url + img_url + this.photo + '" class="img-fluid" alt=""></a>';
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

function showCompare() {
	$('#compare_items').html("");
	var i = 0;
	if (localStorage.getItem('compare') !== null) {
		var compare = JSON.parse(localStorage.getItem('compare'));
		$.each(compare, function(item, value) {
			i++;
			var img_url = "../app/assets/img/market_place/";
			if (this.photo == this.variety_photo) {
				img_url = "../app/assets/img/products/";
			}
			compare_data = '<ul class="product-list">';
			compare_data += '<li>';
			compare_data += '<a href="#" class="remove" title="Remove" onclick="remove_from_compare(' + this.market_id + ',event)">x</a>';
			compare_data += '<a class="title" href="#">' + this.product_name + '</a>';
			compare_data += '(<a href="#">' + this.variety_name + '</a>)';
			compare_data += '</li>';
			compare_data += '</ul>';
			$('#compare_items').append(compare_data);
		});
	}
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
						var img_url = "../app/assets/img/market_place/";
						if (this.photo == this.variety_photo) {
							img_url = "../app/assets/img/products/";
						}
						cart_data = '<tr>';
						cart_data += '<td class="pro-thumbnail"><a href="#"><img src="' + base_url + img_url + this.photo + '" class="img-fluid" alt="Product"></a>';
						cart_data += '<input type="hidden" value="' + this.m_id + '" id="market_id' + i + '">';
						cart_data += '<input type="hidden" value="' + this.photo + '" id="photo' + i + '">';
						cart_data += '<input type="hidden" value="' + this.variety_photo + '" id="variety_photo' + i + '">';
						cart_data += '<input type="hidden" value="' + this.variety + '" id="variety' + i + '">';
						cart_data += '<input type="hidden" value="' + this.variety_name + '" id="variety_name' + i + '">';
						cart_data += '<input type="hidden" value="' + this.buyer_seller_id + '" id="buyer_seller_id' + i + '"></td>';
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
						var img_url = "../app/assets/img/market_place/";
						if (this.photo == this.variety_photo) {
							img_url = "../app/assets/img/products/";
						}
						cart_data = '<tr>';
						cart_data += '<td class="pro-thumbnail"><a href="#"><img src="' + base_url + img_url + this.photo + '" class="img-fluid" alt="Product"></a>';
						cart_data += '<input type="hidden" value="' + this.market_id + '" id="market_id' + i + '">';
						cart_data += '<input type="hidden" value="' + this.photo + '" id="photo' + i + '">';
						cart_data += '<input type="hidden" value="' + this.variety_photo + '" id="variety_photo' + i + '">';
						cart_data += '<input type="hidden" value="' + this.variety + '" id="variety' + i + '">';
						cart_data += '<input type="hidden" value="' + this.variety_name + '" id="variety_name' + i + '">';
						cart_data += '<input type="hidden" value="' + this.buyer_seller_id + '" id="buyer_seller_id' + i + '"></td>';
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

function viewWishlist() {
	var i = 0;
	$('#viewWishlist').html("");
	if (localStorage.getItem('wishlist') === null) {
		wishlist_datae = '<tr><td colspan="7"><h4>Wishlist is empty</h4></td></tr>';
		$('#viewWishlist').append(wishlist_datae);
	} else {
		var wishlist = JSON.parse(localStorage.getItem('wishlist'));
		if (wishlist.length === 0) {
			wishlist_datae = '<tr><td colspan="7"><h4>Wishlist is empty</h4></td></tr>';
			$('#viewWishlist').append(wishlist_datae);
			return;
		}
		$.each(wishlist, function(item, value) {
			i++;
			var img_url = "../app/assets/img/market_place/";
			if (this.photo == this.variety_photo) {
				img_url = "../app/assets/img/products/";
			}
			wishlist_data = '<tr>';
			wishlist_data += '<td class="pro-thumbnail"><a href="#"><img src="' + base_url + img_url + this.photo + '" class="img-fluid" alt="Product"></a>';
			wishlist_data += '<input type="hidden" value="' + this.market_id + '" id="market_id' + i + '">';
			wishlist_data += '<input type="hidden" value="' + this.photo + '" id="photo' + i + '">';
			wishlist_data += '<input type="hidden" value="' + this.variety_photo + '" id="variety_photo' + i + '">';
			wishlist_data += '<input type="hidden" value="' + this.variety + '" id="variety' + i + '">';
			wishlist_data += '<input type="hidden" value="' + this.variety_name + '" id="variety_name' + i + '">';
			wishlist_data += '<input type="hidden" value="' + this.buyer_seller_id + '" id="buyer_seller_id' + i + '"></td>';
			wishlist_data += '<td class="pro-title"><a href="#">' + this.product_name + '</a><input type="hidden" value="' + this.product_id + '" id="product_id' + i + '"><input type="hidden" value="' + this.product_name + '" id="product_name' + i + '"></td>';
			wishlist_data += '<td class="pro-price"><span>' + this.unit_price + '&nbsp;RWF</span><input type="hidden" value="' + this.unit_price + '" id="unit_price' + i + '"><input type="hidden" value="' + this.unit + '" id="unit' + i + '"></td>';
			wishlist_data += '<td class="pro-quantity"><div class="pro-qty" id="pro-qty' + i + '"><input type="text" value="' + this.qty + '" onkeyup="calc(' + i + ')" id="qty' + i + '"></div></td>';
			wishlist_data += '<td class="pro-subtotal"><span id="pro-subtotal' + i + '">' + this.total_price + '&nbsp;RWF</span><input type="hidden" value="' + this.total_price + '" id="total_price' + i + '"></td>';
			wishlist_data += '<td class="pro-remove"><a href="#" onclick="remove_from_wishlist(' + this.market_id + ', event)"><i class="fa fa-trash-o"></i></a><td>';
			wishlist_data += '<tr>';
			$('#viewWishlist').append(wishlist_data);
			subtotal += parseInt(this.total_price);
		});
	}
	// total = subtotal;
	// subtotal = subtotal + " RWF";
	// $('#cart-title').html("");
	// $('#cart-title').append(i + " items" + " - " + subtotal);
	// items = i;
	// $('tbody').data("subtotal", subtotal);
	// $('#subtotal').append(subtotal);
	// $('#total').val(total);
	// $('#overall_subtotal').html('');
	// $('#overall_subtotal').append(subtotal + '&nbsp;RWF');
	// $('#grand_total').html('');
	// $('#grand_total').append(subtotal + '&nbsp;RWF');
	// $('#overall_total').val(total);
}

function viewCompare() {
	var i = 0;
	$('#viewCompare').html("");
	if (localStorage.getItem('compare') === null) {
		compare_datae = '<tr><td colspan="7"><h4>Compare is empty</h4></td></tr>';
		$('#viewCompare').append(compare_datae);
	} else {
		var compare = JSON.parse(localStorage.getItem('compare'));
		if (compare.length === 0) {
			compare_datae = '<tr><td colspan="7"><h4>Compare is empty</h4></td></tr>';
			$('#viewCompare').append(compare_datae);
			return;
		}
		var img_url = "../app/assets/img/market_place/";
		if (this.photo == this.variety_photo) {
			img_url = "../app/assets/img/products/";
		}
		tbody = '';
		compare_data = '<tr>';
		compare_data += '<td class="first-column">Product</td>';
		$.each(compare, function(item, value) {
			i++;
			compare_data += '<td class="product-image-title">';
			compare_data += '<a href="#" class="image"><img src="' + base_url + img_url + this.photo + '" class="img-fluid" alt="Compare Product"></a>';
			compare_data += '<a href="#" class="category">' + this.variety_name + '</a>';
			compare_data += '<a href="#" class="title">' + this.product_name + '</a>';
			compare_data += '</td>';
		});
		compare_data += '</tr>';
		tbody = compare_data;
		compare_data = '<tr>';
		compare_data += '<td class="first-column">Description</td>';
		$.each(compare, function(item, value) {
			compare_data += '<td class="pro-desc"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis veritatis culpa asperiores fugit omnis ducimus ullam facilis magnam quo vitae.</p></td>';
		});
		compare_data += '</tr>';
		tbody += compare_data;
		compare_data = '<tr>';
		compare_data += '<td class="first-column">Price</td>';
		$.each(compare, function(item, value) {
			compare_data += '<td class="pro-price">' + this.unit_price + '&nbspRWF/' + this.unit + '</td>';
		});
		compare_data += '</tr>';
		tbody += compare_data;
		compare_data = '<tr>';
		compare_data += '<td class="first-column">Variety</td>';
		$.each(compare, function(item, value) {
			compare_data += '<td class="pro-stock">' + this.variety + '</td>';
		});
		compare_data += '</tr>';
		tbody += compare_data;
		compare_data = '<tr>';
		compare_data += '<td class="first-column">Add to cart</td>';
		$.each(compare, function(item, value) {
			compare_data += '<td class="pro-addtocart"><a href="#" class="add-to-cart" tabindex="0" onclick="addToCart(' + this.market_id + ',event)"><span><i class="fa fa-shopping-cart"></i> ADD TO CART</span></a></td>';
		});
		compare_data += '</tr>';
		tbody += compare_data;
		compare_data = '<tr>';
		compare_data += '<td class="first-column">Delete</td>';
		$.each(compare, function(item, value) {
			compare_data += '<td class="pro-remove"><button onclick="remove_from_compare(' + this.market_id + ', event)"><i class="fa fa-trash-o"></i></button></td>';
		});
		compare_data += '</tr>';
		tbody += compare_data;
		compare_data = '<tr>';
		compare_data += '<td class="first-column">Rating</td>';
		$.each(compare, function(item, value) {
			compare_data += '<td class="pro-ratting"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></td>';
		});
		compare_data += '</tr>';
		tbody += compare_data;
		$('#viewCompare').append(tbody);
		// subtotal += parseInt(this.total_price);
	}
	// total = subtotal;
	// subtotal = subtotal + " RWF";
	// $('#cart-title').html("");
	// $('#cart-title').append(i + " items" + " - " + subtotal);
	// items = i;
	// $('tbody').data("subtotal", subtotal);
	// $('#subtotal').append(subtotal);
	// $('#total').val(total);
	// $('#overall_subtotal').html('');
	// $('#overall_subtotal').append(subtotal + '&nbsp;RWF');
	// $('#grand_total').html('');
	// $('#grand_total').append(subtotal + '&nbsp;RWF');
	// $('#overall_total').val(total);
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
		photo = $('#photo' + i).val();
		variety_photo = $('#variety_photo' + i).val();
		variety = $('#variety' + i).val();
		variety_name = $('#variety_name' + i).val();
		buyer_seller_id = $('#buyer_seller_id' + i).val();
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
				photo: photo,
				variety_photo: variety_photo,
				variety: variety,
				variety_name: variety_name,
				buyer_seller_id: buyer_seller_id,
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

//default shipping address localization

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

// New shipping address localization

$('#province2').change(function() {

	var form_data = {
		name: $('#province2').val()
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
			$("#district2 option").remove();
			$("#district2").append('<option value="">-- Select a District --</option>');
			$("#sector2 option").remove();
			$("#sector2").append('<option value="">-- Select a Sector --</option>');
			$("#cell2 option").remove();
			$("#cell2").append('<option value="">-- Select a Cell --</option>');
			$("#village2 option").remove();
			$("#village2").append('<option value="">-- Select a Village --</option>');
			$("#district2").append(sc);
			$("select").niceSelect('update');
		}
	});
});
$('#district2').change(function() {

	var form_data = {
		name: $('#district2').val()
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
			$("#sector2 option").remove();
			$("#sector2").append('<option disabled selected>-- Select a Sector --</option>');
			$("#cell2 option").remove();
			$("#cell2").append('<option disabled selected>-- Select a Cell --</option>');
			$("#village2 option").remove();
			$("#village2").append('<option disabled selected>-- Select a Village --</option>');
			$("#sector2").append(sc);
			$("select").niceSelect('update');
		}
	});
});
$('#sector2').change(function() {

	var form_data = {
		name: $('#sector2').val()
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
			$("#cell2 option").remove();
			$("#cell2").append('<option value="">-- Select a Cell --</option>');
			$("#village2 option").remove();
			$("#village2").append('<option value="">-- Select a Village --</option>');
			$("#cell2").append(sc);
			$("select").niceSelect('update');
		}
	});
});
$('#cell2').change(function() {

	var form_data = {
		name: $('#cell2').val()
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
			$("#village2 option").remove();
			$("#village2").append('<option value="">-- Select a Village --</option>');
			$("#village2").append(sc);
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
						market_id: market_id,
						product_id: this.product_id,
						product_name: this.product_name,
						unit_price: this.price_unit,
						qty: 1,
						photo: this.photo,
						variety_photo: this.variety_photo,
						buyer_seller_id: this.buyer_seller_id,
						variety: this.variety,
						variety_name: this.variety_name,
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
						market_id: market_id,
						product_id: this.product_id,
						product_name: this.product_name,
						unit_price: this.price_unit,
						qty: 1,
						photo: this.photo,
						variety_photo: this.variety_photo,
						buyer_seller_id: this.buyer_seller_id,
						variety: this.variety,
						variety_name: this.variety_name,
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

function addToWishlistStorage(market_id) {
	$.ajax({
		url: base_url + 'food_market/show_single_cart',
		type: 'POST',
		data: {
			market_id: market_id
		},
		success: function(html, textStatus) {
			var response = JSON.parse(html);
			var wishlist = [];
			if (localStorage.getItem('wishlist') === null) {
				i = 0;
				$.each(response, function(item, value) {
					i++;
					wishlist.push({
						num: i,
						market_id: market_id,
						product_id: this.product_id,
						product_name: this.product_name,
						unit_price: this.price_unit,
						qty: 1,
						photo: this.photo,
						variety_photo: this.variety_photo,
						buyer_seller_id: this.buyer_seller_id,
						variety: this.variety,
						variety_name: this.variety_name,
						unit: this.unit,
						shipping: "0",
						total_price: this.price_unit,
						subtotal: this.price_unit,
						grand_total: this.price_unit
					});
				});
				localStorage.setItem("wishlist", JSON.stringify(wishlist));
			} else {
				current_wishlist = JSON.parse(localStorage.getItem('wishlist'));
				i = current_wishlist.length;
				var total = getTotal(current_wishlist);
				$.each(response, function(item, value) {
					i++;
					total += parseInt(this.price_unit);
					current_wishlist.push({
						num: i,
						market_id: market_id,
						product_id: this.product_id,
						product_name: this.product_name,
						unit_price: this.price_unit,
						qty: 1,
						photo: this.photo,
						variety_photo: this.variety_photo,
						buyer_seller_id: this.buyer_seller_id,
						variety: this.variety,
						variety_name: this.variety_name,
						unit: this.unit,
						shipping: "0",
						total_price: this.price_unit,
						subtotal: this.price_unit,
						grand_total: this.price_unit
					});
				});
				updateTotal(current_wishlist, total);
				localStorage.removeItem('wishlist');
				localStorage.setItem('wishlist', JSON.stringify(current_wishlist));
			}
		}
	});
}

function addToCompareStorage(market_id) {
	$.ajax({
		url: base_url + 'food_market/show_single_cart',
		type: 'POST',
		data: {
			market_id: market_id
		},
		success: function(html, textStatus) {
			var response = JSON.parse(html);
			var compare = [];
			if (localStorage.getItem('compare') === null) {
				i = 0;
				$.each(response, function(item, value) {
					i++;
					compare.push({
						num: i,
						market_id: market_id,
						product_id: this.product_id,
						product_name: this.product_name,
						unit_price: this.price_unit,
						qty: 1,
						photo: this.photo,
						variety_photo: this.variety_photo,
						buyer_seller_id: this.buyer_seller_id,
						variety: this.variety,
						variety_name: this.variety_name,
						unit: this.unit,
						shipping: "0",
						total_price: this.price_unit,
						subtotal: this.price_unit,
						grand_total: this.price_unit
					});
				});
				localStorage.setItem("compare", JSON.stringify(compare));
			} else {
				var current_compare = JSON.parse(localStorage.getItem('compare'));
				i = current_compare.length;
				var total = getTotal(current_compare);
				$.each(response, function(item, value) {
					i++;
					total += parseInt(this.price_unit);
					current_compare.push({
						num: i,
						market_id: market_id,
						product_id: this.product_id,
						product_name: this.product_name,
						unit_price: this.price_unit,
						qty: 1,
						photo: this.photo,
						variety_photo: this.variety_photo,
						buyer_seller_id: this.buyer_seller_id,
						variety: this.variety,
						variety_name: this.variety_name,
						unit: this.unit,
						shipping: "0",
						total_price: this.price_unit,
						subtotal: this.price_unit,
						grand_total: this.price_unit
					});
				});
				updateTotal(current_compare, total);
				localStorage.removeItem('compare');
				localStorage.setItem('compare', JSON.stringify(current_compare));
				showCompare();
				viewCompare();
			}
		}
	});
}
$('#clear_compare').click(function(e) {
	e.preventDefault();
	$.ajax({
		url: "food_market/clear_compare",
		data: {},
		success: function(html) {
			localStorage.removeItem('compare');
			showCompare();
			viewCompare();
		}
	})
});
$('#checkout').click(function(e) {
	e.preventDefault();
	fname = $('#fname').val();
	lname = $('#lname').val();
	names = fname + " " + lname;
	if (fname == undefined && lname == undefined) {
		names = $('#names').val();
	}
	email = $('#email').val();
	phone = $('#phone').val();
	identity = $('#identity').val();
	country = $('#country').val();
	province = $('#province').val();
	district = $('#district').val();
	sector = $('#sector').val();
	cell = $('#cell').val();
	village = $('#village').val();
	password = $('#password').val();
	confirm = $('#confirm').val();
	fname2 = $('#fname2').val();
	lname2 = $('#lname2').val();
	names2 = fname2 + " " + lname2;
	email2 = $('#email2').val();
	phone2 = $('#phone2').val();
	identity2 = $('#identity2').val();
	country2 = $('#country2').val();
	province2 = $('#province2').val();
	district2 = $('#district2').val();
	sector2 = $('#sector2').val();
	cell2 = $('#cell2').val();
	village2 = $('#village2').val();
	payment_cash = $('#payment_cash').is(':checked') ? 1 : 0;
	payment_paypal = $('#payment_paypal').is(':checked') ? 1 : 0;
	payment_mobile = $('#payment_mobile').is(':checked') ? 1 : 0;
	terms = $('#accept_terms').is(':checked') ? 1 : 0;
	new_address = $('#shiping_address').is(':checked') ? 1 : 0;
	// alert('Hello This is Checkout ' + province + ", ship 2 " + province2 + " cash=" + payment_cash + " paypal=" + payment_paypal + " mobile=" + payment_mobile + " terms=" + terms + " new address? " + new_address);
	order = JSON.stringify(JSON.parse(localStorage.getItem('order')));
	console.log("order: " + order);
	$.ajax({
		url: base_url + 'food_market/checkout_process',
		type: 'POST',
		data: {
			names,
			email,
			phone,
			identity,
			country,
			province,
			district,
			sector,
			cell,
			village,
			password,
			confirm,
			names2,
			email2,
			phone2,
			identity2,
			country2,
			province2,
			district2,
			sector2,
			cell2,
			village2,
			payment_cash,
			payment_paypal,
			payment_mobile,
			new_address,
			order,
			terms
		},
		success: function(html, textStatus) {
			var response = JSON.parse(html);
			console.log(response);
			// console.log(html);
			// return;
			var classT = (response.errors !== null ? "alert alert-danger alert-dismissible fade show" : "alert alert-success alert-dismissible fade show");
			if (response.successes === "Order has been Successfully Made") {
				if (response.is_user_new === 1) {
					response.successes = "<p>Order has been Successfully Made And You're now registered.</p><p><b>Welcome To Ehaho! </b></p>'";
				}
				localStorage.removeItem('order');
				subtotal = 0;
				subtotal = subtotal + " RWF";
				$('#cart-title').html("");
				$('#subtotal').html("");
				$('#cart-title').append(0 + " items" + " - " + subtotal);
				$('#subtotal').append(subtotal);
				$('#checkout_subtotal').html('');
				$('#checkout_shipping').html('');
				$('#checkout_total').html('');
				$('#checkout_products').html('');
				$('#checkout_subtotal').append("0" + '&nbsp;RWF');
				$('#checkout_shipping').append("0" + '&nbsp;RWF');
				$('#checkout_total').append("0" + '&nbsp;RWF');
			}
			var msg = (response.errors === null ? response.successes : response.errors);
			$('#errors').html('');
			$('#errors').append("<div class='" + classT + "' role='alert'>" + msg + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			$("html, body").animate({
				scrollTop: "0"
			}, 500);
			// if (response.errors === null ) {
			// 	$('#errors').html('');
			// 	$('#errors').append('<p class="text-danger">Logging In....</p>');
			// 	var delay = 2000;
			// 	var url = base_url + 'shop';
			// 	setTimeout(function() {
			// 		window.location = url;
			// 	}, delay);
			// }
		}
	});
});
$('#login').click(function(e) {
	e.preventDefault();
	var user = $('#user').val();
	var password = $('#password').val();
	$.ajax({
		url: base_url + "food_market/login_process",
		type: 'POST',
		cache: false,
		data: {
			user,
			password
		},
		success: function(html) {
			var response = JSON.parse(html);
			var classT = (response.errors !== null ? "alert alert-danger alert-dismissible fade show" : "alert alert-success alert-dismissible fade show");
			var msg = (response.errors === null ? response.successes : response.errors);
			if (response.loggedIn === true) {
				var delay = 2000;
				var url = '';
				var redirect_url = redirect_to.split('/');
				console.log(redirect_url);
				if (redirect_url[2] !== 'login' && redirect_url[2] !== 'register') {
					url = base_url + redirect_url[2];
				} else {
					url = base_url + 'shop';
				}
				$('#errors').html('');
				$('#errors').append("<div class='" + classT + "' role='alert'>" + msg + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				$("html, body").animate({
					scrollTop: "0"
				}, 500);
				setTimeout(function() {
					window.location = url;
				}, delay);
			}
			if (response.errors !== null) {
				$('#errors').html('');
				$('#errors').append("<div class='" + classT + "' role='alert'>" + msg + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				$("html, body").animate({
					scrollTop: "0"
				}, 500);
			}
		}
	});
});
$('#register').click(function() {
	fname = $('#fname').val();
	lname = $('#lname').val();
	names = fname + " " + lname;
	email = $('#email').val();
	phone = $('#phone').val();
	identity = $('#identity').val();
	country = $('#country').val();
	province = $('#province').val();
	district = $('#district').val();
	sector = $('#sector').val();
	cell = $('#cell').val();
	village = $('#village').val();
	password = $('#password').val();
	confirm = $('#confirm').val();
	$.ajax({
		url: base_url + "food_market/register_process",
		cache: false,
		type: "POST",
		data: {
			names,
			email,
			phone,
			identity,
			country,
			province,
			district,
			sector,
			cell,
			village,
			password,
			confirm,
		},
		success: function(html) {
			var response = JSON.parse(html);
			var classT = (response.errors !== null ? "alert alert-danger alert-dismissible fade show" : "alert alert-success alert-dismissible fade show");
			var msg = (response.errors === null ? response.successes : response.errors);
			if (response.loggedIn === true) {
				var delay = 2000;
				var url = '';
				var redirect_url = redirect_to.split('/');
				console.log(redirect_url);
				if (redirect_url[2] !== 'login' && redirect_url[2] !== 'register') {
					url = base_url + redirect_url[2];
				} else {
					url = base_url + 'shop';
				}
				$('#errors').html('');
				$('#errors').append("<div class='" + classT + "' role='alert'>" + msg + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				$("html, body").animate({
					scrollTop: "0"
				}, 500);
				setTimeout(function() {
					window.location = url;
				}, delay);
			}
			if (response.errors !== null) {
				$('#errors').html('');
				$('#errors').append("<div class='" + classT + "' role='alert'>" + msg + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				$("html, body").animate({
					scrollTop: "0"
				}, 500);
			}
		}
	});
});