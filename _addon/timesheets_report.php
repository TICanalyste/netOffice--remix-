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


$pageTitle="Relevé des Timesheets";

$displayStyle=TASKTIME_MONTH_SUMMARY;
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

//Define employer filter and navigation if necessary
if($employer!="") {
    $employer_filter="&employer=".$employer;
}


//*** Time Navigation ***
echo "<form action='timesheets_report.php?dateCalend=".$dateCalend."' method='post'>".
		"<span width='70%' style='margin-left:20px'><strong>".
	buildLink("../_addon/timesheets_report.php?dateCalend={$datePast}{$employer_filter}", $strings["previous"], LINK_INSIDE).
	" | " .
	buildLink("../_addon/timesheets_report.php?dummy=0{$employer_filter}", $strings["today"], LINK_INSIDE) .
	" | " .
	buildLink("../_addon/timesheets_report.php?dateCalend={$dateNext}{$employer_filter}", $strings["next"], LINK_INSIDE) .
	"</strong></span>";

//*** Add User Selection for Administrator ***
if (loggedUserIsAdmin()) {
	
	//*** Travailleur ***
	$tmpquery = " WHERE mem.profil != 3 AND mem.profil!= 0";
	$tmpquery.= " ORDER BY mem.name";

	$projmem = new request();
	$projmem->openMembers($tmpquery);
	$comptProjmem = count($projmem->mem_id);

	echo "&nbsp;&nbsp;<select name='worker_id' onChange=\"this.form.submit();\">";
	// get project team listing for owner select lists, default to logged user
	echo "<option value='" . ALL_WORKERS . "'>-- " . $strings["all_workers"] . " --</option>";
	for ($i = 0;$i < $comptProjmem;$i++) {
		$selected="";
		//||(($worker_id==0)&&($_SESSION['idSession']==$projmem->mem_id[$i]))
		if(($worker_id==$projmem->mem_id[$i])) {
			$selected=" selected";
		}
		echo "<option value='" . $projmem->mem_id[$i] . "'".$selected.">" . $projmem->mem_name[$i] . "$clientUser</option>";
	}
	echo "</select>";
		//"&nbsp;&nbsp;&nbsp;" .
		//buildLink("../_addon/timesheets_report.php?dateCalend=$dateCalend&worker_id=".ALL_WORKERS, $strings["all_workers"], LINK_INSIDE);
}


//Define employer filter and navigation if necessary
if($employer!="") {

    //Add an employer menu, based on arbitrary list of recurring employers (defined in addon_variables)
    echo "&nbsp;&nbsp;<select name='employer' onChange=\"this.form.submit();\">";
    echo "<option value='all'>-- " . $strings['select_all'] . " --</option>";
    foreach ($frequent_employers as $key=>$value) {
        $selected="";
        if(($employer==$key)) {
                $selected=" selected";
        }
        echo "<option value='" . $key . "'".$selected.">" . $value . "$clientUser</option>";
    }
    echo "</select>";
}

echo "</form>";

//---- content ----
$block1 = new block();
$block1->form = "xwbT";
$block1->openForm("../reports/timesheets_report.php#" . $block1->form . "Anchor");
//$block1->headingForm("$pageTitle");
$block1->openContent();



echo "<div id='timesheet_summary' style='width:99%;height:680px;padding:0px;'><iframe frameborder='0' src='$applicationFolder/_addon/addon_hours_summary.php?dateCalend=$dateCalend&worker_id=$worker_id&display=".TASKTIME_MONTH_SUMMARY.$employer_filter."' type='text/html' width='100%' height='100%'></iframe></div>";

// close block1
$block1->closeFormResults();
$block1->block_close();

require_once("../themes/" . THEME . "/footer.php");

?>
