<?php // $Revision: 1.3 $
/* vim: set expandtab ts=4 sw=4 sts=4: */

/**
 * $Id: exporthours.php,v 1.3 2004/12/12 20:31:58 madbear Exp $
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
include_once "addon_functions.inc.php";
require_once("addon_variables.inc.php");

include_once("addon_date_calculation.php");

require_once("../includes/phpmyadmin/defines.lib.php");
function which_crlf()
{
    $the_crlf = "\n"; 
    // The 'USR_OS' constant is defined in "./libraries/defines.lib.php"
    // Win case
    if (USR_OS == 'Win') {
        $the_crlf = "\r\n";
    } 
    // Mac case
    else if (USR_OS == 'Mac') {
        $the_crlf = "\r";
    } 
    // Others
    else {
        $the_crlf = "\n";
    } 

    return $the_crlf;
} 

@set_time_limit(600);
$crlf = which_crlf();


//URL Parameters
//$displayStyle
//$worker_id (if = * > All workers, if no value > session ID used)

//Find data
$query .= "WHERE (tim.date >= '$firstDayDate' AND tim.date <= '$lastDayDate')";
	
// a member selection was made
//$query .= " AND tim.owner = 4";
if($worker_id!="" && $worker_id!=ALL_WORKERS) {
    $team_id=$worker_id;
} else {
	$team_id=$_SESSION['idSession'];
}
//echo "$worker_id / $team_id / {$_SESSION['selecter_worker']} / {$_SESSION['idSession']}";

//Select according to user (when specified or user has no right ti see other timesheets)
if($worker_id!=ALL_WORKERS || !loggedUserIsAdmin()){
	$query .= " AND tim.owner = $team_id";
	//	echo $_SESSION['idSession']."<br/>";
}

//Order by worker if necessary
$worker_order_addon="";
if($worker_id==ALL_WORKERS) {
	$worker_order_addon="tim.owner ASC,";
}
$tmpquery = "$query ORDER BY ${worker_order_addon}tim.date ASC,org.name,pro.name";
//echo $tmpquery."<br/>";

$listHours = new request();
$listHours->openTaskTime($tmpquery);
$comptListHours = count($listHours->tim_id);

////File Name
$filename="timesheets_{$displayStyle}_{$worker_id}_{$dateCalend}";

if($format_pear) {
	//Use PEAR Library
	require_once '../_addon/spreadsheet_excel_writer/Writer.php';
	
	// Creating a workbook
	$workbook = new Spreadsheet_Excel_Writer();
	
	// sending HTTP headers
	$workbook->send($filename.".".$export_extension);
	
	// Creating a worksheet
	$worksheet =& $workbook->addWorksheet('Timesheets');
	
	$row_index=0;
	$column_index=0;
	
	//Column Headers
	$worksheet->write($row_index, $column_index, 'Client');
	$column_index++;
	$worksheet->write($row_index, $column_index, 'Projet');
	$column_index++;
	$worksheet->write($row_index, $column_index, 'Tâche');
	$column_index++;
	$worksheet->write($row_index, $column_index, 'Travailleur');
	$column_index++;
	$worksheet->write($row_index, $column_index, 'Date');
	$column_index++;
	$worksheet->write($row_index, $column_index, 'Heures');
	$column_index++;
	$worksheet->write($row_index, $column_index, 'Commentaires');
	$column_index++;
	
	// The actual data
	$column_index=0;
	for ($row_index;$row_index < $comptListHours;$row_index++) {
		$worksheet->write($row_index, $column_index, $listHours->tim_org_name[$i]);
		$column_index++;
		$worksheet->write($row_index, $column_index, $listHours->tim_pro_name[$i]);
		$column_index++;
		$worksheet->write($row_index, $column_index, $listHours->tim_tas_name[$i]);
		$column_index++;
		$worksheet->write($row_index, $column_index, $listHours->tim_mem_name[$i]);
		$column_index++;
		$worksheet->write($row_index, $column_index, $listHours->tim_date[$i]);
		$column_index++;
		$worksheet->write($row_index, $column_index, $listHours->tim_hours[$i]);
		$column_index++;
		$worksheet->write($row_index, $column_index, $listHours->tim_comments[$i]);
		$column_index++;
	//	$csv_output .="{$listHours->tim_org_name[$i]}" .
	//			"	{$listHours->tim_pro_name[$i]}" .
	//			"	{$listHours->tim_tas_name[$i]}" .
	//			"	{$listHours->tim_mem_name[$i]}" .
	//			"	{$listHours->tim_date[$i]}" .
	//			"	{$listHours->tim_hours[$i]}" .
	//			"	{$listHours->tim_comments[$i]}" .
	//			"	{$listHours->tim_pro_name[$i]}" .
	//			"	{$listHours->tim_pro_name[$i]}" .
	//			"\n";
	}
	// Let's send the file
	$workbook->close();
	
	//
} else if($format_pear_test) {
	
	require_once '../_addon/spreadsheet_excel_writer/Writer.php';
	
	// Creating a workbook
	$workbook = new Spreadsheet_Excel_Writer();
	
	// sending HTTP headers
	$workbook->send('test.xls');
	
	// Creating a worksheet
	$worksheet =& $workbook->addWorksheet('My first worksheet');
	
	// The actual data
	$worksheet->write(0, 0, 'Name');
	$worksheet->write(0, 1, 'Age');
	$worksheet->write(1, 0, 'John Smith');
	$worksheet->write(1, 1, 30);
	$worksheet->write(2, 0, 'Johann Schmidt');
	$worksheet->write(2, 1, 31);
	$worksheet->write(3, 0, 'Juan Herrera');
	$worksheet->write(3, 1, 32);
	
	// Let's send the file
	$workbook->close();

} else {
	
	//Premiere ligne = nom des champs (si on en a besoin)
	$csv_output = "\"Client\"" .
			";\"Projet\"" .
			";\"Tâche\"" .
			";\"Travailleur\"" .
			";\"Date\"" .
			";\"Heures\"" .
			";\"Commentaires\"" .
			";\"rien\"" .
			";\"rien2\"" .
			"\n";
	
	for ($row_index=0;$row_index < $comptListHours;$row_index++) {
		$csv_output .="\"{$listHours->tim_org_name[$row_index]}\"" .
				";\"{$listHours->tim_pro_name[$row_index]}\"" .
				";\"{$listHours->tim_tas_name[$row_index]}\"" .
				";\"{$listHours->tim_mem_name[$row_index]}\"" .
				";\"{$listHours->tim_date[$row_index]}\"" .
				";\"{$listHours->tim_hours[$row_index]}\"" .
				";\"{$listHours->tim_comments[$row_index]}\"" .
				";\"{$listHours->tim_pro_name[$row_index]}\"" .
				";\"{$listHours->tim_pro_name[$row_index]}\"" .
				"\n";
	}
	
//	echo $comptListHours;
	
	// Send headers
	header('Content-Type: ' . $export_mime_type);
	// lem9: we need "inline" instead of "attachment" for IE 5.5
	$content_disp = (USR_BROWSER_AGENT == 'IE') ? 'inline' : 'attachment';
	header('Content-Disposition:  ' . $content_disp . '; filename="' . $filename . '.' . $export_extension . '"');
	header('Pragma: no-cache');
	header('Expires: 0');
	print $csv_output;
	exit;
}

?>
