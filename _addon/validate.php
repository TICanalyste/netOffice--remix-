<?php // $Revision: 1.19 $
/* vim: set expandtab ts=4 sw=4 sts=4: */

/**
 * $Id: home.php,v 1.19 2005/06/11 05:23:55 vjack Exp $
 *
 * Copyright (c) 2003 by the NetOffice developers
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 */

$checkSession = true;
require_once('../includes/library.php');
require_once('addon_variables.inc.php');
$pageSection='validate';

// Check field values
/*
$client_id=0;
if ($_POST['client_id']) {
	$client_id=$_POST['client_id'];
}
$project_id=0;
if ($_POST['project_id']) {
	$project_id=$_POST['project_id'];
}
$task_id=0;
if ($_POST['task_id']) {
	$task_id=$_POST['task_id'];
}
$worker_id=0;
if ($_POST['worker_id']) {
	$worker_id=$_POST['worker_id'];
}
*/
//echo($actionField);

if ($_POST['actionField'] == 'add') {
    $msgLabel .= ''; // init
     
    // make sure we have the required information
    if (!empty($hr)) {
        if (!is_numeric($hr)) {
            // we need this to be numeric
            $msgLabel = '<b>' . $strings['attention'] . '</b> : ' . $strings['worked_hours'] . ' ' . $strings['error_numerical'];
        } 
    } else {
        // we need this to be numeric
        $msgLabel = '<b>' . $strings['attention'] . '</b> : ' . $strings['worked_hours'] . ' ' . $strings['error_required'];
    } 

    // insert task time in database
    if (empty($msgLabel)) {
	//Valid only if encoded by admin
	$validated=($_SESSION['nameSession'] == $admin_name)?1:0;
	
        $comm = addSlashes($comm); // resolves bug #768688
        $tmpquery1 = 'INSERT INTO ' . $tableCollab['tasks_time'] . " (project,task,owner,date,hours,comments,created,modified,validated) VALUES ('" . $project_id . "', '$task_id','$worker_id','$ld','$hr','$comm',NOW(),NOW(),$validated)";
        connectSql($tmpquery1);
		$client_id = 0;
		$project_id = 0;
		$task_id = 0;
		$worker_id = 0;
        $ld = null;
        $hr = null;
        $comm = null; 
        // successful insert
        $msgLabel = '<b>' . $strings['success'] . '</b> : ' . $strings['hours_updated'];
    }
	$msg= $msgLabel;
}

//Redirect to Home if no right to be here
if ($_SESSION['nameSession'] != $admin_name) {
	header( 'Location: /general/home.php' );
}

//Breadcrumb
$breadcrumbs[]="Encodage > <strong>Fiches d'intervention</strong> | <a href='encode_timesheet.php'>Timesheets</a>";

//$pageTitle= "<span class=type>".$strings['home_of'] ."<br></span><span class=name>".$_SESSION['nameSession']."</span>";
$pageTitle= "<span>Bonjour ".$_SESSION['nameSession'].",<br/>Bienvenue dans le formulaire de validation des <strong>Timesheets et Fiches d'intervention</strong>. TODO TODO</span>";

require_once('../themes/' . THEME . '/header.php');

$blockPage= new block();
$blockPage->bornesNumber = "1";

//-- Contenu propre --
{
	$block1 = new block();
	
	//Form
	$block1->form = "FicheInt";
	$block1->openForm("encode.php");

    //--- title ------
	$block1->heading("Fiche d'Intervention");
	$block1->heading_close();
	
	$block1->openContent();
	$block1->contentTitle("Donn&eacute;es");
	//$block1->contentRow("Test", "tmp");
	
	//*** Client ***
	//$tmpquery = "WHERE tea.project = '" . $projectDetail->pro_id[0] . "' ORDER BY org.name";
	$tmpquery = " ORDER BY org.name";

	$clients = new request();
	$clients->openOrganizations($tmpquery);
	$comptClients = count($clients->org_id);

	echo "
	<tr class='even'>
	  <td valign='top' class='leftvalue'>" . $strings['clients'] . " :</td>
	  <td><select name='client_id' onChange='this.form.submit()'>";
	// get Clients listing
	for ($i = 0;$i < $comptClients;$i++) {
		$selected="";
		if($client_id==$clients->org_id[$i]) {
			$selected=" selected";
		} 
        echo "<option value='" . $clients->org_id[$i] . "'".$selected.">" . $clients->org_name[$i] . "$clientUser</option>";
	}
	
	//*** Projet ***
	$tmpquery = " WHERE org.id = ".$client_id;
	$tmpquery.= " AND pro.status != 1";	//No finished projets
	$tmpquery.= " ORDER BY pro.name";

	$projets = new request();
	$projets->openProjects($tmpquery);
	$comptProjects = count($projets->pro_id);

	echo "
	<tr class='even'>
	  <td valign='top' class='leftvalue'>" . $strings['projects'] . " :</td>
	  <td><select name='project_id' ";
    if($comptProjects<=1) {
        $event="Blur";
    } else {
        $event="Change";
    }
    echo "on".$event."='this.form.submit();'>";
	// get Clients listing
	for ($i = 0;$i < $comptProjects;$i++) {
	    $selected="";
		if($project_id==$projets->pro_id[$i]) {
			$selected=" selected";
		}
        echo "<option value='" . $projets->pro_id[$i] . "'".$selected.">" . $projets->pro_name[$i] . "$clientUser</option>";
	}
	
	//*** Tâche ***
	$tmpquery = " WHERE tas.project = ".$project_id;
	$tmpquery.= " AND tas.status != 1";	//No finished tasks
	$tmpquery.= " ORDER BY tas.name";

	$tasks = new request();
	$tasks->openTasks($tmpquery);
	$comptTasks = count($tasks->tas_id);

	echo "
	<tr class='even'>
	  <td valign='top' class='leftvalue'>" . $strings['tasks'] . " :</td>
	  <td><select name='task_id'>";
	// get Clients listing
	for ($i = 0;$i < $comptTasks;$i++) {
	    $selected="";
		if($task_id==$tasks->tas_id[$i]) {
			$selected=" selected";
		}
        echo "<option value='" . $tasks->tas_id[$i] . "'".$selected.">" . $tasks->tas_name[$i] . "</option>";
	}
	

	//*** Travailleur ***
	$tmpquery = " WHERE mem.profil != 3 AND mem.profil!= 0";
	$tmpquery.= " ORDER BY mem.name";

	$projmem = new request();
	$projmem->openMembers($tmpquery);
	$comptProjmem = count($projmem->mem_id);

	echo "
	<tr class='odd'>
	  <td valign='top' class='leftvalue'>" . $strings['assigned'] . " :</td>
	  <td><select name='worker_id'>";
	// get project team listing for owner select lists, default to logged user
	for ($i = 0;$i < $comptProjmem;$i++) {
		$selected="";
		if($worker_id==$projmem->mem_id[$i]) {
			$selected=" selected";
		}
		echo "<option value='" . $projmem->mem_id[$i] . "'".$selected.">" . $projmem->mem_name[$i] . "$clientUser</option>";
	}

	//*** Data Input ***
	if ($ld == '') {
	    $ld = $date;
	}
	$block1->contentRow($strings['date'], "<input type=\"text\" style=\"width: 150px;\" name=\"ld\" id=\"sel1\"
	size=\"20\" value=\"$ld\"><button type=\"reset\" id=\"trigger_a\">...</button>
	<script type=\"text/javascript\">Calendar.setup({ inputField:\"sel1\", button:\"trigger_a\" });</script>");

	echo "
	<tr class='odd'>
	  <td valign='top' class='leftvalue'>" . $strings["worked_hours"] . " :</td>
	  <td><input size='20' value='$hr' style='width: 150px;' name='hr' maxlength='6' type='text'></td>
	</tr>
	<tr class='odd'>
	  <td valign='top' class='leftvalue'>" . $strings["comments"] . " :</td>
	  <td><textarea rows='10' style='width: 400px; height: 150px;' name='comm' cols='47'>$comm</textarea></td>
	</tr>
	<tr class='odd'>
	  <td valign='top' class='leftvalue'>&nbsp;</td>
	  <td><input type='hidden' name='actionField' value='wait'><input type='SUBMIT' value='" . $strings["save"] . "' onClick='this.form.actionField.value=\"add\"'></td>
	</tr>";

	$block1->closeContent();
	$block1->block_close();
	$block1->closeForm();
	
}

require_once("../themes/" . THEME . "/footer.php");

?>
