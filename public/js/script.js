jQuery(document).ready(function($){
	$('.toggler').click(function(e){
		e.preventDefault();

		console.log($('.main-content').width());

		if ($('.main-content').hasClass('open')) {
			$('.main-content').removeClass('open');
			$('#sidebar').removeClass('active');
		} else {
			$('.main-content').addClass('open');
			$('#sidebar').addClass('active');
		}
	});
});