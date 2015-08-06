jQuery(document).ready(function($){

	$.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        }
    });

	$('.toggler').click(function(e){
		e.preventDefault();
		if ($('.main-content').hasClass('open')) {
			$('.main-content').removeClass('open');
			$('#sidebar').removeClass('active');
		} else {
			$('.main-content').addClass('open');
			$('#sidebar').addClass('active');
		}
	});

	$('.calendar-day').click(function(e){
		window.location = $(this).attr('data-href');
	});

	$('.delete').click(function(e){
		e.preventDefault();

		var that_ = $(this);
		bootbox.confirm("Are you sure?", function(result) {
		  	if (result) {
		  		that_.closest('form').submit();
		  	} 
		}); 
	});

	$('.open-modal').click(function(e){
		e.preventDefault();

		var that_ = $(this),
			href  = that_.attr('href'),
			title = that_.attr('data-title');

		var data = getFormData(that_);

		$.ajax({
			url : href,
			type: "GET",
			data: data,
			success : function(response) {
				$('.modal-body').html(response);

				setTimeout(function(){ 
					$('.modal-body').find('.form-control').first().focus(); 
				}, 500);

				$('.datepicker').datepicker({
					autoclose: true
				});
				$('#myModal').modal('show');
				$('#myModal').find('.modal-title').html(title);
			}
		});
	});

	function getFormData(element) {
		return element.data();
	}

	$('.load-content').click(function(e){
		var that_ = $(this);
		$.ajax({
			url : that_.attr('data-href'),
			type: "GET",
			success : function(response) {
				$('.dynamic-content').html(response);
			}
		});
	});
});