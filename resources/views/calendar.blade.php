<div class="calendar-left">
	<div class="header">
		<h2 class="month">
			<span>{!! date('F Y') !!}</span>
			<input type="text" name="datepicker" id="monthpicker" readonly="readonly">
		</h2>
	</div>
	<div class="table-responsive">
		{!! draw_calendar(date('m'), date('Y'), true) !!}
	</div>
</div>
<div class="calendar-right">
	
</div>