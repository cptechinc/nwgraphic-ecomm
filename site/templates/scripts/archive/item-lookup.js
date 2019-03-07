$(function() {
	//  #item-lookup-results
	$('#item-lookup').on('shown.bs.modal', function () {
		$('#query').focus();
		var height = $(window).height();
		//console.log(height);
		$('#item-lookup').height(height);
	});
});

$('#searching').submit(function(e) {
	e.preventDefault();
	var form = '#' + $(this).attr('id');
	postform(form, function() {
		wait(500, function() {
			showitemresults(1);
		});
		
	}); 
});

function showitemresults(itempage) {
	console.log("/store/ajax/json/item-search/?page="+itempage);
	$('.search-result').remove();
	$('#item-lookup-pagination li').remove();
	//$('<div class="list-group" id="item-lookup-results"></div>').appendTo('#item-look-up-content');
	$.ajax({
		type: "GET",
		url: "/store/ajax/json/item-search/?page="+itempage,
		dataType: "json",
		beforeSend: function() { },
		complete: function() {
			//$('#progress').remove(); 
		},
		success: function(json) {
			var page = $("#add-item-return-page").val();
			var redir = $('#add-item-redir').val();
			var action = $('#add-item-action').val();
			var num_of_results = json.number_of_results;
			var this_page = json.page;
			var display = json.display;
			if (num_of_results > 0 ) {
				$.each(json.items, function(index, product) {
					if (typeof index !== 'undefined') {
						var itemid = product.itemid;
						var price = product.price;
						var prices = product.prices;
						var priceqtys = product.priceqtys;
						var unitofm = product.uomdesc;
						var listprice = product.listprice;
						var name1 = product.name1;
						var name2 = product.name2;
						var shortdesc = htmldecode(product.shortdesc); // Encode/decode htmlentities, found in scripts.js
						var image = product.image;
						var pricingtable = make_pricing_table(prices, priceqtys);
						var imagediv = make_image_div(image, name1);
						var descriptiondiv = make_description_div(name1, name2, itemid, shortdesc);
						var form = make_form(itemid, page, price, listprice, redir, action, unitofm);
						$("<article class='search-result row'></article>").html(imagediv + descriptiondiv + pricingtable + form).appendTo($("#item-lookup-results"));
					}
				});
				make_pagination_links(this_page, json.number_of_results, display);
			} else {
				var msg = "<h2 class='text-center'>No results found</h2>"; 
				$("<article class='search-result row'></article>").html(msg).appendTo($("#item-lookup-results"));
			}
		},
		error: function() {
			alert("The JSON File could not be processed correctly.");
		}
	});
}

// listed item components

function make_pricing_table(pricing, priceqtysing) {
	var prices = pricing.split(',');
	var priceqtys = priceqtysing.split(',');
	var table = '<div class="col-xs-8 col-xs-offset-2 col-sm-offset-0 col-md-2">';
	if (priceqtys[1] != '') {
		table += "<table class='table table-condensed table-striped'>";
		table += "<tr> <th>Qty</th> <th>Price</th> </tr>";
		for (i = 0; i < prices.length; i++) {
			var row = "<tr> <td>" + priceqtys[i] + "</td> <td>" + prices[i] + "</td></tr>";
			table += row; 
		}
		table += "</table>";
	}
	table += "</div>";
	return table;
	
}

function make_image_div(image, name1) {
	var picture = '';
	var imagediv = "<div class='col-md-2 form-group'>";
	var media = '';
	if (image != '') {
		media = "<figure class='pull-left'>";
		media += "<img style='width: 100%;' class='thumbnail' src='"+image+"' alt='image of " + name1 + "'>";
		media += "</figure>";
		
	}
	imagediv += media;
	imagediv += "</div>";
	return imagediv;
}

function make_description_div(name1, name2, itemid, shortdesc) {
	var div = "<div class=' col-md-5'>";
	div += "<h3>" + "<a href='product.php?pid="+itemid+"'>"+itemid+"</a>" + "</h3>";
	div +=	"<h5>" + name1 + ' ' + name2 + "</h5>";
	var content = '<section class="product-info"><p>' + shortdesc + '</p></section></div>';
	div += "</div>";
	return div;
}



// WHSE, qty, ordernumber,
function make_form(itemid, page, price, listprice, redir, action, unitofm) {
	var form = "<div class='col-xs-12 col-md-3'> <form action='"+redir+"' method='post'>";
	form += "<input type='hidden' name='itemid' value='"+itemid+"'>";
	form += "<p class='product-info text-right'>List Price: $ "+listprice+ ' / ' +unitofm+"</p>";
	form += "<p class='product-info text-right'>Price: <b>$ "+price+ ' / ' +unitofm+"</b></p> ";
	form += "<div class='form-group row'> <div class='col-xs-6'><label for='quantity'>Qty:</label></div>";
	form += "<div class='col-xs-6'><input type='text' class='form-control text-right' name='qty' placeholder='1'></div>";
	form += "</div><button type='submit' class='btn btn-primary btn-lg btn-block'> Add to cart </button>";
	form += "<input type='hidden' name='action' value='"+action+"'> <input type='hidden' name='page' value='"+page+"'></form>";
	form += "</div>"
	
	return form;
}

function make_pagination_links(this_page, resultsnum, display) {
	var total_pages = Math.ceil(resultsnum / display);
	if (this_page === 1) {
		$('<li class="disabled"></li>').html('<a href="#" aria-label="previous"><span aria-hidden="true">&laquo;</span></a>').appendTo('#item-lookup-pagination');
	} else {
		$('<li></li>').html('<a href="#" onClick="showitemresults('+(i-1)+') aria-label="previous"><span aria-hidden="true">&laquo;</span></a>').appendTo('#item-lookup-pagination');
	}
	
	for (var i = this_page - 2; i <= this_page + 2; i++) {
		if (i < 1 ) {
			
		} else {
			if (i === this_page) {
				$('<li class="disabled"></li>').html('<a href="#">'+i+'</a>').appendTo('#item-lookup-pagination');
			} else if (i > total_pages) {
				
			} else {
				$('<li></li>').html('<a href="#" onClick="showitemresults('+i+')">'+i+'</a>').appendTo('#item-lookup-pagination');
			}
		}
	}
	
	if (this_page === total_pages) {
		$('<li class="disabled"></li>').html('<a href="#" aria-label="Next"> <span aria-hidden="true">&raquo;</span> </a> ').appendTo('#item-lookup-pagination');
	} else {
		$('<li></li>').html('<a href="#" onClick="showitemresults('+(i+1)+') aria-label="Next"> <span aria-hidden="true">&raquo;</span> </a> ').appendTo('#item-lookup-pagination');
	}
}
