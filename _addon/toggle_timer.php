<?php

$checkSession = true;
require_once('../includes/library.php');

include_once 'addon_functions.inc.php';
include_once 'addon_variables.inc.php';

//echo("ok");
echo $_POST["id"];
echo "status : ".$_POST["status"];

$status=securePost("status",VARTYPE_BOOL);
$id=securePost("id",VARTYPE_INT);


if($status) {
	//When turning on
	$query="INSERT INTO no_tasks_timer (task, owner, start) VALUES ($id, {$_SESSION['idSession']}, NOW())";
} else {
	//When turning off
	//Generate netOffice date from actual date
//	$date=date("Y-m-d");
	$duration=1;
	//Generate duration from start time and present time
	
	//Update task time
	$query="INSERT INTO no_tasks_time (project, task, owner, date, hours, comments, created, modified, encoder) 
		VALUES ((SELECT project FROM no_tasks WHERE task = $id), $id, {$_SESSION['idSession']}, NOW(), $duration, 'auto-timer', NOW(), NOW(), {$_SESSION['idSession']});";
	
	//Delete timer
	$query.="DELETE FROM no_tasks_timer WHERE owner = {$_SESSION['idSession']};";
}
$updateDB=new request();
$updateDB->connectClass();
$updateDB->query($query);

echo "\n";
echo $query;


?>