$(function() {
	//  #item-lookup-results
	$('#item-lookup').on('shown.bs.modal', function () {
		$('#query').focus();
		var height = $(window).height();
		//console.log(height);
		$('#item-lookup').height(height);
	});
	
	$("body").on("click", ".paginate-link", function(e) { 
		e.preventDefault();
		var href = $(this).attr('href');
		var loadinto = $(this).data('loadinto');
		loadpage(loadinto, href);
	});
});

$('#searching').submit(function(e) {
	e.preventDefault();
	var form = '#' + $(this).attr('id');
	postform(form, function() {
		wait(1500, function() {
			showitemresults(1);
		});
		
	}); 
});



function showitemresults(page) {
	var returnpage = $('#searching').find('#add-item-return-page').val();
	var href = config.urls.load.itemsearchresults+"?return="+returnpage;
	$('#products').remove();
	var progressbar = '<div class="progress" id="item-lookup-progress"><div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%"> <span class="sr-only">45% Complete</span> </div></div>';
	$('#item-lookup-results').html(progressbar);
	wait(1000, function() {
		$('#item-lookup-progress').remove();
		loadpage('#item-results-container', href);
		console.log('nwgraphic.com'+href);
	});
}

function loadpage(namespace, href) {
	jQuery(namespace).load(href);
}