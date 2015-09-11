<?php

/* draws a calendar */
function draw_calendar($month, $year, $flag){

	/* draw table */
	$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

	/* table headings */
	$headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
	$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';

	/* days and weeks vars now ... */
	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();

	/* row for week one */
	$calendar.= '<tr class="calendar-row">';

	/* print "blank" days until the first of the current week */
	for($x = 0; $x < $running_day; $x++):
		$calendar.= '<td class="calendar-day-np"> </td>';
		$days_in_this_week++;
	endfor;

	if ($flag) {
		$projects = App\Task::whereBetween('due_date', [
		    \Carbon\Carbon::createFromDate($year, $month)->startOfMonth(),
		    \Carbon\Carbon::createFromDate($year, $month)->endOfMonth()
		])->where('creator_id', \Auth::user()->id)->where('status', 0)->get();

		$bookedDates = [];
		foreach($projects as $project) {
			$bookedDates[] = \Carbon\Carbon::createFromFormat(\Config::get('jarvis.date_format'), $project->due_date)->format('d');
		}
	}

	/* keep going with days.... */
	for($list_day = 1; $list_day <= $days_in_month; $list_day++):

		$class = "";
		if (in_array($list_day, $bookedDates)) {
			if ($list_day < date('d')) {
				$class = "delayed";
			} else {
				$class = "on-process";
			}
		}

		$calendar.= '<td class="calendar-day '.$class.'" data-href="'.route('tasks.index').'?date='.$list_day.'-'.$month.'-'.$year.'">';
			if ($list_day == date('d') && $month == date('m') && $year == date('Y')) {
				$calendar .= "<i class='fa fa-calendar'></i>";
			}
			/* add in the day number */
			$calendar.= '<div class="day-number">'.$list_day.'</div>';

			/** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! **/
			$calendar.= str_repeat('<p> </p>',2);
			
		$calendar.= '</td>';
		if($running_day == 6):
			$calendar.= '</tr>';
			if(($day_counter+1) != $days_in_month):
				$calendar.= '<tr class="calendar-row">';
			endif;
			$running_day = -1;
			$days_in_this_week = 0;
		endif;
		$days_in_this_week++; $running_day++; $day_counter++;
	endfor;

	/* finish the rest of the days in the week */
	if($days_in_this_week < 8):
		for($x = 1; $x <= (8 - $days_in_this_week); $x++):
			$calendar.= '<td class="calendar-day-np"> </td>';
		endfor;
	endif;

	/* final row */
	$calendar.= '</tr>';

	/* end the table */
	$calendar.= '</table>';
	
	/* all done, return result */
	return $calendar;
}

function statusOptions() {
	return ['0' => 'Pending', '1' => 'Completed'];
}

function getProjects() {
	return App\Project::latest()->where('creator_id', \Auth::user()->id)->get();
}

function getProjectsOptions() {
	return App\Project::where('creator_id', \Auth::user()->id)->lists('name', 'id');
}

function getCategoryOptions() {
	return App\Category::lists('name', 'id');
}