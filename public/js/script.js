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

	$('body').on('click', '.calendar-day',  function(e){
		window.location = $(this).attr('data-href');
	});

	$("#monthpicker").datepicker( {
	    format: "mm-yyyy",
	    startView: "months", 
	    minViewMode: "months",
	    orientation: 'top right',
	    autoclose : true,
	    
	}).on('changeDate', function(){
		$.ajax({
			url : baseurl + "get-calendar",
			data : { month : $(this).val() },
			success : function(response) {
				$('h2.month').find('span').html(response.month);
				$('.calendar-left').find('.table-responsive').html(response.html);
			}
		});
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

	$('body').on('click', '.open-modal', function(e){
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

				var date = new Date();
				date.setDate(date.getDate()-1);

				$('.datepicker').datepicker({
					autoclose: true,
					startDate: date
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