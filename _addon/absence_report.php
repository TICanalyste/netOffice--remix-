<?php

/**
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * 
 * TODO: ?
 */

$checkSession = true;
require_once("../includes/library.php");
include_once "addon_functions.inc.php";
require_once("addon_variables.inc.php");


$pageTitle=$strings["absence_report_title"];

if($displayStyle=="") $displayStyle=TASKTIME_ABSENCE_YEAR;
if($offType=="") $offType=TASKTYPE_LEGAL_OFF;

if($worker_id=="") {
	if($_SESSION['selecter_worker']!="") {
		$worker_id=$_SESSION['selecter_worker'];
	} else {
		$worker_id=ALL_WORKERS;
	}
} else if($worker_id==ALL_WORKERS) {
	$_SESSION['selecter_worker']="";
}

//Date Calculations
include_once("../_addon/addon_date_calculation.php");

//--- header ---
$breadcrumbs[]=$strings['reports'];
$breadcrumbs[]=buildLink('../reports/createreport.php?typeReports=create', $strings["create_report"], in) . ' | ' . buildLink('../reports/createreport.php?typeReports=custom', $strings['custom_reports'], LINK_INSIDE);
$breadcrumbs[]=$pageTitle;

$pageSection = 'reports';
require_once("../themes/" . THEME . "/header.php");

//*** Time Navigation ***
$URLaddons="offType=$offType&displayStyle=$displayStyle";
echo "<form action='absence_report.php?dateCalend=".$dateCalend."' method='post'>".
		"<span width='70%' style='margin-left:20px'><strong>".
	buildLink("../_addon/absence_report.php?dateCalend={$datePast}&{$URLaddons}", $strings["previous"], LINK_INSIDE).
	" | " .
	buildLink("../_addon/absence_report.php?{$URLaddons}", $strings["today"], LINK_INSIDE) . 
	" | " .
	buildLink("../_addon/absence_report.php?dateCalend=$dateNext&{$URLaddons}", $strings["next"], LINK_INSIDE) .
	"</strong></span>";

//*** Time Period selection ***
echo "&nbsp;&nbsp;<select name='displayStyle' onChange=\"this.form.submit();\">";
for ($i = 0;$i < count($aAbsenceSummaryTypes);$i++) {
	$selected="";
	if($displayStyle==$aAbsenceSummaryTypes[$i]) {
		$selected=" selected";
	}
	echo "<option value='" . $aAbsenceSummaryTypes[$i] . "'".$selected.">" . $strings[$aAbsenceSummaryTypes[$i]] . "</option>";
}
echo "</select>";

//*** Add User and Off Type Selection for Administrator ***
if (loggedUserIsAdmin()) {
	
	//*** Travailleur ***
	$tmpquery = " WHERE mem.profil != 3 AND mem.profil!= 0";
	$tmpquery.= " ORDER BY mem.name";

	$projmem = new request();
	$projmem->openMembers($tmpquery);
	$comptProjmem = count($projmem->mem_id);

	echo "&nbsp;&nbsp;<select name='worker_id' onChange=\"this.form.submit();\">";
	// get project team listing for owner select lists, default to logged user
	echo "<option value='" . ALL_WORKERS . "' selected>-- " . $strings["all_workers"] . " --</option>";
	for ($i = 0;$i < $comptProjmem;$i++) {
		$selected="";
		if((($worker_id==$projmem->mem_id[$i])||(($worker_id==0)&&($_SESSION['idSession']==$projmem->mem_id[$i]))) && ($worker_id!=ALL_WORKERS)) {
			$selected=" selected";
		}
		echo "<option value='" . $projmem->mem_id[$i] . "'".$selected.">" . $projmem->mem_name[$i] . "$clientUser</option>";
	}
	echo "</select>";
		//"&nbsp;&nbsp;&nbsp;" .
		//buildLink("../_addon/timesheets_report.php?dateCalend=$dateCalend&worker_id=".ALL_WORKERS, $strings["all_workers"], LINK_INSIDE);
		
	//*** Off Type ***
	$tmpquery = " WHERE tas.id IN (".implode(",",$aOffDayTypes).")";
	$tmpquery.= " ORDER BY tas.name ASC";

	$taskTypes = new request();
	$taskTypes->openTasks($tmpquery);
	$comptTaskTypes = count($taskTypes->tas_id);

	echo "&nbsp;&nbsp;<select name='offType' onChange=\"this.form.submit();\">";
	echo "<option value='" . ALL_OFF_TYPES . "' selected>-- " . $strings["all_off_types"] . " --</option>";
	for ($i = 0;$i < $comptTaskTypes;$i++) {
		$selected="";
		if(($offType==$taskTypes->tas_id[$i]) && ($offType!=ALL_OFF_TYPES)) {
			$selected=" selected";
		}
		echo "<option value='" . $taskTypes->tas_id[$i] . "'".$selected.">" . $taskTypes->tas_name[$i] . "</option>";
	}
	echo "</select>";
		//"&nbsp;&nbsp;&nbsp;" .
		//buildLink("../_addon/timesheets_report.php?dateCalend=$dateCalend&worker_id=".ALL_WORKERS, $strings["all_workers"], LINK_INSIDE);
}
echo "</form>";

//---- content ----
$block1 = new block();
$block1->form = "xwbT";
$block1->openForm("../reports/absence_report.php#" . $block1->form . "Anchor");
//$block1->headingForm("$pageTitle");
$block1->openContent();



echo "<div id='timesheet_summary' style='width:99%;height:680px;padding:0px;'><iframe frameborder='0' src='$applicationFolder/_addon/addon_hours_summary.php?dateCalend=$dateCalend&worker_id=$worker_id&offType=$offType&display=$displayStyle' type='text/html' width='100%' height='100%'></iframe></div>";

// close block1
$block1->closeFormResults();
$block1->block_close();

require_once("../themes/" . THEME . "/footer.php");

?>
