<div class="header">
	<h2 class="month">
		{!! date('F Y') !!}
	</h2>
</div>
<div class="table-responsive">
	{!! draw_calendar(date('m'), date('Y'), true) !!}
</div>