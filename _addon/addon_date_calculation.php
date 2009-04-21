<?php

include_once "addon_functions.inc.php";
require_once("addon_variables.inc.php");

//Fetched from URL : $dateCalend and $displayStyle

//Today's date calculations
$year = date("Y");
$month = date("n");
$day = date("j");
if (strlen($month) == 1) {
    $month = "0$month";
}
if (strlen($day) == 1) {
    $day = "0$day";
} 
$dateToday = "$year-$month-$day";
$firstDayDate="$year-$month-01";

//Fetch URL data parameters
if($dateCalend!="") {
	$year = substr("$dateCalend", 0, 4);
	$month = substr("$dateCalend", 5, 2);
	$day = substr("$dateCalend", 8, 2);
} else {
	$dateCalend=$dateToday;
}

//Default display by week. Only week and month possible
if($displayStyle=="") {
	$displayStyle=TASKTIME_WEEK;
} 
if ($display!="") {
	$displayStyle=$display;
}
//if($display==TASKTIME_MONTH) $displayStyle=TASKTIME_MONTH;
//if($display==TASKTIME_MONTH_SUMMARY) $displayStyle=TASKTIME_MONTH_SUMMARY;
//echo $displayStyle;

$dateCalendWC=$year.$month.$day;
$yearCalend=$year;
$monthCalend=$month;
$dayCalend=$day;
//echo $dateCalendWC."<br/>";

$unixDate=strtotime($dateCalend);
$lastDayOfMonth=date('t',$unixDate);

//Calculate dates (moved from the end of the file, to get date for WebCalendar)
if ($month == 1) {
    $pyear = $year - 1;
    $pmonth = 12;
} else {
    $pyear = $year;
    $pmonth = $month - 1;
} 

if ($month == 12) {
	$nyear = $year + 1;
	$nmonth = 1;
} else {
	$nyear = $year;
	$nmonth = $month + 1;
}

$month=_dayDateTrim($month);
$pmonth=_dayDateTrim($pmonth);
$nmonth=_dayDateTrim($nmonth);
$day=_dayDateTrim($day);

//$dateToday = "$year-$month-$day";
//$dateTodayWC = "$year$month$day";


if($displayStyle==TASKTIME_WEEK) {
	//*** Week Calculation (if necessary) ***
	
	$dayOfWeek=date('D',$unixDate);
//	echo $dateCalend."=".$dayOfWeek;
	
	//Find first and last day of the week
	switch($dayOfWeek){
		case "Mon": $dayOffset=0; break;
		case "Tue": $dayOffset=-1; break;
		case "Wed": $dayOffset=-2; break;
		case "Thu": $dayOffset=-3; break;
		case "Fri": $dayOffset=-4; break;
		case "Sat": $dayOffset=-5; break;
		case "Sun": $dayOffset=-6; break;
	}
	$firstDay=$day+$dayOffset;
	$lastDay=$firstDay+6;

	$fdYear=$yearCalend;
	$fdMonth=$monthCalend;
	$fdDay=$firstDay;
	
	$ldYear=$yearCalend;
	$ldMonth=$monthCalend;
	$ldDay=$lastDay;

	//Exceptions when date at beginning or end of month
	if($firstDay<1) {
//		echo "firstDay <1<br/>";
//		echo "$pyear-$pmonth-01<br/>";
		$prevLastDay=date('t',strtotime("$pyear-$pmonth-01"));
//		echo "$prevLastDay<br/>";
		$fdDay=$prevLastDay+$firstDay;
		$fdMonth=$pmonth;
		$fdYear=$pyear;
	}
	
	if($lastDay>$lastDayOfMonth) {
		$lastDay=$lastDay-$lastDayOfMonth;
		
		$ldYear=$nyear;
		$ldMonth=$nmonth;
		$ldDay=$lastDay+1;
	}

	//Trimming dates
	$fdDay=_dayDateTrim($fdDay);
	$ldDay=_dayDateTrim($ldDay);

	$firstDayDate="$fdYear-$fdMonth-$fdDay";
	$lastDayDate="$ldYear-$ldMonth-$ldDay";
	
	$datePast=_moveDate($dateCalend,7,-1);
	$dateNext=_moveDate($dateCalend,7,1);

	//echo $firstDayDate.",".$lastDayDate;
	
} else if($displayStyle==TASKTIME_ABSENCE_YEAR) {
	$datePast = ($year-1)."-$month-01";
    $dateNext = ($year+1)."-$month-01";
    $firstDayDate="$year-01-01";
    $lastDayDate="$year-12-31";
    
} else {
	//*** Month Calculations ***
	
	//EDO 080428
    //Calculate dates (moved from the end of the file, to get date for WebCalendar)
    $datePast = "$pyear-$pmonth-01";
    $dateNext = "$nyear-$nmonth-01";
    $firstDayDate="$year-$month-01";
    $lastDayDate="$year-$month-$lastDayOfMonth";
}
?>
