<?php 

$checkSession = true;
require_once('../includes/library.php');
require_once("addon_functions.inc.php");
require_once('addon_variables.inc.php');
$pageSection='encode';

//Variables (Title, Breadcrumb, ...) depending on $tasktime_type
if($window=="popup") {
	$popup_addon="?window=popup";
} else {
	$popup_addon="";
}
if($tasktime_type!=TASKTIME_TYPE_TS) {
	$tasktime_type=TASKTIME_TYPE_SUPPORT;
	$title_type="Fiches d'Intervention";
	$breadcrumbs_type="<strong>Fiches d'intervention</strong> | <a href='encode_timesheet.php$popup_addon'>Timesheets</a>";
	$form_type="encode";
	$project_query_type=" AND pro.status != 1";	//No finished projets
	$task_query_type=" AND tas.status != 1";	//No finished tasks
} else {
	$tasktime_type=TASKTIME_TYPE_TS;
	$title_type="Timesheets";
	$breadcrumbs_type="<a href='encode.php$popup_addon'>Fiches d'intervention</a> | <strong>Timesheets</strong>";
	$form_type="encode_timesheet";
	$project_query_type="";
	$task_query_type="";
}

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
//    echo ($project_id);
    if ($project_id==0) {
		// We need a project ID
        $msgLabel = '<b>' . $strings['attention'] . '</b> : ' . $strings['project_id'] . ' ' . $strings['error_required'];
    }
    if ($task_id==0) {
		// We need a Task ID
        $msgLabel = '<b>' . $strings['attention'] . '</b> : ' . $strings['task_id'] . ' ' . $strings['error_required'];
    } 
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
		$validated=(loggedUserIsAdmin())?1:0;
	
        $comm = addSlashes($comm); // resolves bug #768688
        
        $tmpquery1 = 'INSERT INTO ' . $tableCollab['tasks_time'] . " (project,task,owner,date,hours,comments,created,modified,validated,type,encoder) VALUES ('$project_id', '$task_id','$worker_id','$ld','$hr','$comm',NOW(),NOW(),$validated,$tasktime_type,".$_SESSION['idSession'].")";
//      echo $tmpquery1;
//      exit;
        connectSql($tmpquery1);
		$client_id = 0;
		$project_id = 0;
		$task_id = 0;
		$worker_id = 0;
        $ld = null;
        $hr = null;
        $comm = null; 
        // successful insert
        if($window=="popup") {
        	popupClose();
        } else {
        	$msgLabel = '<b>' . $strings['success'] . '</b> : ' . $strings['hours_updated'];
        }
    }
	$msg= $msgLabel;
}

//Redirect to Home if no right to be here > replaced by a "encoder" id in the DB
/*
if (($_SESSION['nameSession'] == $admin_name) OR ($_SESSION['nameSession'] == $assistant_name)) {
	//Do nothing
} else {
	header( 'Location: /general/home.php' ) ;
}
*/

//Breadcrumb
$breadcrumbs[]="Encodage";
$breadcrumbs[]="$breadcrumbs_type";
$pageTitle= "<span>Formulaire d'encodage des <strong style='color:red;'>$title_type</strong>.<br/>".$strings["encode_type_change_message"]."</span>";

if($window=="popup") {
	require_once("../_addon/addon_header_light.php");
} else {
	require_once("../themes/" . THEME . "/header.php");
}

$blockPage= new block();
$blockPage->bornesNumber = "1";

//-- Contenu propre --
{
	$block1 = new block();
	
	//Form
	$block1->form = "TaskTime_$form_type";
	$popup_addon="";
	if($window=="popup") $popup_addon="?window=popup";
	$block1->openForm("$form_type.php$popup_addon");

    //--- title ------
	$block1->heading($title_type);
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
	<tr class='odd'>
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
	echo "</select><input type='SUBMIT' value='update'>" .
			"</td></tr>";
	
	//*** Projet ***
	if(($client_id==0)||($client_id=="")) $client_id=0;
	$tmpquery = " WHERE org.id = ".$client_id;
	$tmpquery.= $project_query_type;
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
	echo "</select><input type='SUBMIT' value='update'>" .
			"</td></tr>";
	
	//*** Tache ***
	if(($project_id==0)||($project_id=="")) $project_id=0;
	$tmpquery = " WHERE tas.project = ".$project_id;
	$tmpquery.= $task_query_type;
	$tmpquery.= " ORDER BY tas.name";

	$tasks = new request();
	$tasks->openTasks($tmpquery);
	$comptTasks = count($tasks->tas_id);

	echo "
	<tr class='odd'>
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
	  <td>";
	//Seulement pour Admin et Assistant
//	if(false) {
	if(loggedUserIsAdmin() || loggedUserIsAssistant()) {
		echo "<select name='worker_id'>";
		//get project team listing for owner select lists, default to logged user
		for ($i = 0;$i < $comptProjmem;$i++) {
			$selected="";
			if(($worker_id==$projmem->mem_id[$i])||(($worker_id==0)&&($_SESSION['idSession']==$projmem->mem_id[$i]))) {
				$selected=" selected";
			}
			echo "<option value='" . $projmem->mem_id[$i] . "'".$selected.">" . $projmem->mem_name[$i] . "$clientUser</option>";
		}
		echo "</select>" .
			"</td></tr>";
	} else {
		echo "<input type='hidden' name='worker_id' value='".$_SESSION['idSession']."'>".$_SESSION['nameSession'];
	}
	//*** Data Input ***
	if ($ld == '') {
	    if($dateURL=='') {
	    	$ld = $date;
	    } else {
	    	$ld = $dateURL;
	    }
	}
	$block1->contentRow($strings['date'], "<input type=\"text\" style=\"width: 150px;\" name=\"ld\" id=\"sel1\"
	size=\"20\" value=\"$ld\" onChange='checkDateFormat(this);'><button type=\"reset\" id=\"trigger_a\">...</button>
	<script type=\"text/javascript\">Calendar.setup({ inputField:\"sel1\", button:\"trigger_a\" });</script>");

	//Define action of the Cancel button depending of window type
	if($window=="popup") {
		$cancel_action="window.close();";
	} else {
		$cancel_action="history.back();";
	}

	echo "
	<tr class='odd'>
	  <td valign='top' class='leftvalue'>" . $strings["worked_hours"] . " :</td>
	  <td>
	  		<input size='20' value='$hr' style='width: 150px;' name='hr' maxlength='6' type='text' onChange='timeCheck(this);'></td>
	</tr>
	<tr class='odd'>
	  <td valign='top' class='leftvalue'>" . $strings["comments"] . " :</td>
	  <td><textarea rows='10' style='width: 400px; height: 150px;' name='comm' cols='47'>$comm</textarea></td>
	</tr>
	<tr class='odd'>
	  <td valign='top' class='leftvalue'>&nbsp;</td>
	  <td><input type='hidden' name='actionField' value='wait'><input type='SUBMIT' value='" . $strings["save"] . "' onClick='this.form.actionField.value=\"add\"'><input type='button' name='cancel' value='" . $strings['cancel'] . "' onClick='$cancel_action'></td></td>
	</tr>";

	$block1->closeContent();
	$block1->block_close();
	$block1->closeForm();
	
}

require_once("../themes/" . THEME . "/footer.php");

?>
