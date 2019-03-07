$(document).ready(function () {
	//SIDE MENU SCRIPTS
	console.log(sitedirectory);

	$('#pagination-form').submit(function(e) {
		e.preventDefault();
		window.location = $('#pagination-page').val() + $('#symbol').val() + 'results-per-page=' + $('#results-per-page').val();
	});

	$('#results-per-page').change(function() {
		$(this).parent().parent().submit();
	});

	$('[data-toggle="popover"]').popover({html : true, });
	$('button[rel=popover]').popover({
		html: 'true',
		placement: 'top'
	});

	//
	$('#navbar').on('show.bs.collapse', function () {
  		$('#navbar-bkgd').toggle(true);
	});

	$('#navbar').on('hide.bs.collapse', function () {
  		$('#navbar-bkgd').toggle(false);
	});

	$('#login-modal').on('shown.bs.modal', function () {
		$('input[name="email"]').focus();
	});


	$('#search-modal').on('shown.bs.modal', function () {
		$('input[name="query"]').focus();
	});


	$(window).scroll(function () {
		if ($(this).scrollTop() > 50) { $('#back-to-top').fadeIn(); } else { $('#back-to-top').fadeOut(); }
		//if ($(this).scrollTop() > 150) { $('#site-nav').fadeIn().addClass('navbar-fixed-top').removeClass('navbar-static-top'); } 
		//else { $('#site-nav').removeClass('navbar-fixed-top').addClass('navbar-static-top');}
		
		
	});
	// scroll body to 0px on click
	$('#back-to-top').click(function () {
		$('#back-to-top').tooltip('hide');
		$('body,html').animate({
			scrollTop: 0
		}, 800);
		return false;
	});


});

	$(window).load(function() {
		equaltabheights();
	});


	function wait(time, callback) {
		var timeoutID = window.setTimeout(callback, time);
	}

	// Encode/decode htmlentities
	function htmlencode(s){
		return $("<div/>").text(s).html();
	}
	function htmldecode(s){
		return $("<div/>").html(s).text();
	}


/* =============================================================
   FORM FUNCTIONS
 ============================================================ */
function check_for_missing_inputs(form) {
	var incompletes = 0;
	$('.required').each(function() {
        if ($(this).val() == '') {
			incompletes++;
			$(this).parent().addClass('has-error');
		}
    });
	if (incompletes < 1) {
		return false;
	} else {
		return true;
	}
}

function has_incomplete_fields(form) {
	var msg = 'The following fields are missing: <br>';
	var incompletes = 0;
	$(form + ' .required').each(function() {
		if ($(this).val() == '') {
			incompletes += 1;
			$(this).parent().addClass('has-error');
			var label = $(this).parent().children('label').text();
			msg += label + '<br>';
		}
	});

	if (incompletes < 1) {
		return false;
	} else {
		make_an_alert('#response', msg , 'Warning!', 'danger');
		return true;
	}
}

function postform(form, callback) {
	console.log('posting ' + form + ' form');
	var action = $(form).attr('action');
	$.post(action, $(form).serialize() ).done(callback());
}

function showhidestates(country, addresstype) {
	if (country === 'USA') {
		$('.'+addresstype+"-USA").removeClass('hidden');
		$('.'+addresstype+"-CAN").addClass('hidden');
	} else if (country === 'CAN') {
		$('.'+addresstype+"-USA").addClass('hidden');
		$('.'+addresstype+"-CAN").removeClass('hidden');
	} else {
		$('.'+addresstype+"-USA").removeClass('hidden');
		$('.'+addresstype+"-CAN").removeClass('hidden');
	}
}

/* =============================================================
   ALERT FUNCTIONS
 ============================================================ */

function make_an_alert(location, alert_message, exclamation, alert_type) {
	var alert_header = '<div class="alert alert-'+alert_type+' alert-dismissible" role="alert">';
	var close_button = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>';
	var message = '<strong>'+exclamation+'</strong> ' + '<span class="message">'+alert_message+'</span>';
	var close_header = '</div>';
	var the_alert = alert_header + close_button + message + close_header;
	$(location).html(the_alert);
}



/* =============================================================
   ITEM ENTRY FUNCTIONS
 ============================================================ */

$('#item-entry-form').on('shown.bs.collapse', function () {
	$('#item-entry-form .itemid').focus();
	$('.item-entry-descriptor').text('Hide');
});

$('#item-entry-form').on('hidden.bs.collapse', function () {
	$('.item-entry-descriptor').text('Show');
});

/* =============================================================
   LAYOUT FUNCTIONS
 ============================================================ */


function setequalheight(container) {
	var height = 0;
	var forimage = false;
	if (container.includes(' img')) {
		height = 1000; forimage = true;
	}
	$(container).each(function() {
		if (forimage) {
			if ($(this).actual( 'height' ) < height) {
				height = $(this).actual( 'height' );
			}
		} else {
			if ($(this).actual( 'height' ) > height) {
				height = $(this).actual( 'height' );
			}
		}
		
	});
	
	
	$(container).height(height);
}

function equaltabheights() {

	if ($(".tab-content .tab-pane.resize").length) {
		var height = 0;
		$(".tab-content .tab-pane.resize").each(function(){
			$(this).addClass("active");
			if ($(this).height() > height) {
				height = $(this).actual('height');
			}
			$(this).removeClass("active");


		});
		console.log('height = ' + height);
		$(".tab-content .tab-pane.resize").height(height);
		$(".tab-content .tab-pane.resize").parent().height(height);
		$(".tab-content .tab-pane.resize:first").addClass("active");
	}


}
