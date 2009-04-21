<?php // $Revision: 1.11 $
/* vim: set expandtab ts=4 sw=4 sts=4: */

/**
 * $Id: viewcalendar.php,v 1.11 2005/05/18 03:47:13 vjack Exp $
 * 
 * Copyright (c) 2003 by the NetOffice developers
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 */

$checkSession = true;
require_once("../includes/library.php");
require_once("../_addon/addon_variables.inc.php");

//Put and get worker ID in session
if(($worker_id!="") && ($worker_id)) {
	$_SESSION['$worker_id']=$worker_id;
} else if($_SESSION['$worker_id']!="" && $_SESSION['$worker_id']) {
	$worker_id=$_SESSION['$worker_id'];
} else {
	$worker_id=$_SESSION['idSession'];
}

//Date Calculations
include_once("../_addon/addon_date_calculation.php");

$yearDay = date("Y");
$monthDay = date("n");
$dayDay = date("d");

$dayName = date("w", mktime(0, 0, 0, $month, $day, $year));
$monthName = date("n", mktime(0, 0, 0, $month, $day, $year));
$dayName = $dayNameArray[$dayName];
$monthName = $monthNameArray[$monthName];

$daysmonth = date("t", mktime(0, 0, 0, $month, $day, $year));
$firstday = date("w", mktime(0, 0, 0, $month, 1, $year));
$padmonth = date("m", mktime(0, 0, 0, $month, $day, $year));
$padday = date("d", mktime(0, 0, 0, $month, $day, $year));

if ($firstday == 0) {
    $firstday = 7;
} 


    //--- header ----
	$breadcrumbs[]=buildLink("../calendar/viewcalendar.php?", $strings["calendar"], LINK_INSIDE);
    $breadcrumbs[]=$dateCalend;
	$pageSection='calendar';
	require_once("../themes/" . THEME . "/header.php");
    
    //*** Navigation ***
	//Week
//	?dateCalend=$dateToday
	echo "<form action='viewcalendar.php?dateCalend=".$dateCalend."' method='post'>" .
			"<span width='70%' style='margin-left:20px'><strong>".
		buildLink("../calendar/viewcalendar.php?dateCalend=$datePast", $strings["previous"], LINK_INSIDE).
		" | " .
		buildLink("../calendar/viewcalendar.php", $strings["today"], LINK_INSIDE) . 
		" | " .
		buildLink("../calendar/viewcalendar.php?dateCalend=$dateNext", $strings["next"], LINK_INSIDE) .
		"</strong></span>";
	//Month
	//echo "<table cellspacing=\"0\" width=\"100%\" border=\"0\" cellpadding=\"0\"><tr><td nowrap align=\"right\" class=\"footerCell\">" . buildLink("../calendar/viewcalendar.php?viewCalend=$viewCalend&amp;dateCalend=$datePast", $strings["previous"], LINK_INSIDE) . " | " . buildLink("../calendar/viewcalendar.php?viewCalend=$viewCalend&amp;dateCalend=$dateToday", $strings["today"], LINK_INSIDE) . " | " . buildLink("../calendar/viewcalendar.php?viewCalend=$viewCalend&amp;dateCalend=$dateNext", $strings["next"], LINK_INSIDE) . "</td></tr><tr><td height=\"5\" colspan=\"2\"><img width=\"1\" height=\"5\" border=\"0\" src=\"../themes/" . THEME . "/spacer.gif\" alt=\"\"></td></tr></table>";
    
    //*** Add User Selection for Administrator ***
    if (loggedUserIsAdmin()) {
		// OR ($_SESSION['nameSession'] == $assistant_name)

		//*** Travailleur ***
		$tmpquery = " WHERE mem.profil != 3 AND mem.profil!= 0";
		$tmpquery.= " ORDER BY mem.name";
	
		$projmem = new request();
		$projmem->openMembers($tmpquery);
		$comptProjmem = count($projmem->mem_id);
	
		echo "&nbsp;&nbsp;<select name='worker_id' onChange=\"this.form.submit();\">";
		// get project team listing for owner select lists, default to logged user
		for ($i = 0;$i < $comptProjmem;$i++) {
			$selected="";
			if(($worker_id==$projmem->mem_id[$i])||(($worker_id==0)&&($_SESSION['idSession']==$projmem->mem_id[$i]))) {
				$selected=" selected";
			}
			echo "<option value='" . $projmem->mem_id[$i] . "'".$selected.">" . $projmem->mem_name[$i] . "$clientUser</option>";
		}
		echo "</select></form>";
	}
    
	//--- content -----
    $block2 = new block();
    
    
    $block2->form = 'Calendar';
    //$block2->openForm('../clients/listclients.php#' . $block1->form . 'Anchor');
    $block2->heading($dateCalend);
    $block2->openPaletteIcon();
    if ($_SESSION['profilSession'] == '0' || $_SESSION['profilSession'] == '1' || $_SESSION['profilSession'] == '5') {
        //$block2->paletteIcon(0, 'add', $strings['add']);
        //$block2->paletteIcon(1, 'remove', $strings['delete']);
    }
    $block2->paletteIcon(2, 'info', $strings['view']);
    $block2->closePaletteIcon();

    //$block2->headingForm($dateCalend);

    $block2->openContent();
    echo "<tr><td>";
    
    //Default week Calendar
    if($displayStyle!="month") {
    	echo "<div id='webcalendar' style='width:70%;height:680px;float:left;'><iframe frameborder='0' src='http://webcalendar.banlieues.be/week.php?date=$dateCalendWC&user=".$banUsers[$worker_id]."' type='text/html' width='100%' height='100%'>Pas d'iFrame, pas de contenu.</iframe></div>";
    	echo "<div id='timesheet_encode' style='float:left;width:30%;height:680px;padding:0px;'><iframe frameborder='0' src='$applicationFolder/_addon/addon_hours_summary.php?dateCalend=$dateCalend&display=week&worker_id=$worker_id' type='text/html' width='100%' height='100%'></iframe></div>";
    } else {
	    //Month Calendar
    	echo "<div id='webcalendar' style='width:70%;height:1000px;float:left;'><iframe frameborder='0' src='http://webcalendar.banlieues.be/month.php?year=".$yearCalend."&month=".$monthCalend."' type='text/html' width='100%' height='100%'></iframe></div>";
    	echo "<div id='timesheet_encode' style='float:left;width:30%;height:1000px;padding:0px;'><iframe frameborder='0' src='$applicationFolder/_addon/addon_hours_summary.php?dateCalend=$dateCalend&display=month&worker_id=$worker_id'' type='text/html' width='100%' height='100%'></iframe></div>";
    }
    
    echo "</td></tr>";
    $block2->closeContent();
    $block2->headingForm_close();

    echo "<table><tr><td class=calend> </td></tr></table>";

    if ($activeJpgraph == "true" && $gantt == "true") {
        // show the expanded or compact Gantt Chart
        if ($_GET['base'] == 1) {
            echo "<a href='viewcalendar.php?viewCalend=$viewCalend&amp;dateCalend=$dateCalend&amp;base=0'>expand</a><br>";
        } else {
            echo "<a href='viewcalendar.php?viewCalend=$viewCalend&amp;dateCalend=$dateCalend&amp;base=1'>compact</a><br>";
        }

        echo "<img src=\"graphtasks.php?viewCalend=$viewCalend&amp;dateCalend=$dateCalend&amp;base=" . $_GET['base'] . "\" alt=\"\"><br>
<span class=\"listEvenBold\">" . buildLink("http://www.aditus.nu/jpgraph/", "JpGraph", LINK_POWERED) . "</span>";
    } 
 

require_once("../themes/" . THEME . "/footer.php");

?>
