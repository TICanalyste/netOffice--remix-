<?php
 
$checkSession = true;
require_once("../includes/library.php");
require_once("addon_variables.inc.php");

include_once("addon_date_calculation.php");

//*** URL Parameters
//$displayStyle
//$offType, for absence
//$worker_id (if = all > All workers, if no value > session ID used)

//*** Find data
$query .= "WHERE (tim.date >= '$firstDayDate' AND tim.date <= '$lastDayDate')";
	
//*** a member selection was made
//$query .= " AND tim.owner = 4";
if($worker_id!="" && $worker_id!=ALL_WORKERS) {
	$team_id=$worker_id;
	$_SESSION['selecter_worker']=$team_id;
} else {
	$team_id=$_SESSION['idSession'];
}
//echo "$worker_id / $team_id / {$_SESSION['selecter_worker']} / {$_SESSION['idSession']}";

//*** Select according to user (when specified or user has no right to see other timesheets)
if($worker_id!=ALL_WORKERS || !loggedUserIsAdmin()){
	$query .= " AND tim.owner = $team_id";
	//	echo $_SESSION['idSession']."<br/>";
}

//*** Filter on Task ID if in Absence Report
if(($displayStyle==TASKTIME_ABSENCE_YEAR) OR ($displayStyle==TASKTIME_ABSENCE_MONTH)) {
	if(($offType=="")||($offType==ALL_OFF_TYPES)) {
		$query .= " AND tim.task IN (".implode(",",$aOffDayTypes).")";
	} else {
		$query .= " AND tim.task = $offType";
	}
}

//*** Order by worker if necessary
$worker_order_addon="";
if($worker_id==ALL_WORKERS) {
	$worker_order_addon="tim.owner ASC,";
}
$tmpquery = "$query ORDER BY ${worker_order_addon}tim.date ASC,org.name,pro.name";
// echo $tmpquery."<br/>";

$listHours = new request();
$listHours->openTaskTime($tmpquery);
$comptListHours = count($listHours->tim_id);
//echo $comptListHours;

//*** Page Header
require_once("addon_header_light.php");

//Form Heading
$form_heading="{$strings[$displayStyle]} $firstDayDate > $lastDayDate";
$form_heading.=" - ";
if($worker_id==ALL_WORKERS) {
	if(loggedUserIsAdmin()) {
		$form_heading.=$strings["all_workers"];
	} else {
		$form_heading.=$_SESSION["nameSession"];
	}
} else {
	$form_heading.=$listHours->tim_mem_name[0];
}
$form_heading.="&nbsp;&nbsp;".popupLink("../_addon/encode_timesheet.php?dateURL=$firstDayDate&worker_id=$team_id", "<img align='top' border='0' src='$applicationFolder/themes/deepblue/btn_add_small_norm.gif'>");
//Add a div for summary
$form_heading.="<div id='week_summary'></div>";

$block2 = new block();
$block2->form = "wbP";
$block2->openForm('../_addon/addon_hours_summary.php#' . $block2->form . 'Anchor');
$block2->heading($form_heading);
$block2->openPaletteIcon();
//$block2->headingForm($form_heading);

$totalMemHours = 0;

//*** Export Button ***
if(loggedUserIsAdmin()) {	
	//$block2->paletteIcon(0, "export", $strings["export"]);
	echo popupLink("timesheets_report_export.php?worker_id=$worker_id&display=$displayStyle&dateCalend=$dateCalend",
		"<img border='none' src='../themes/".THEME."/btn_export_norm.gif'>");
	
}
$block2->closePaletteIcon();

//*** Content ***
$block2->openContent();

$block2->openResults($checkbox = "false");
//Add a "Worker" column if seeing the whole team
$block2->labels($labels = array(0 => $strings["project"], 1 => $strings["hours"]), "false");

$presentDate="";
$presentWorker="";
$dayTotal=0;
$weekTotal=0;
$monthTotal=0;
$displayDate="";
$delta=0;
$totalDelta=0;

//*** New functioning - browse through open days and compare to DB records ***
if(!(($displayStyle==TASKTIME_ABSENCE_MONTH) || ($displayStyle==TASKTIME_ABSENCE_YEAR))) {
	$db_date_index=0;
	
	//Define begin and end date according to display type
	if($displayStyle==TASKTIME_WEEK) {
		$interval_begin=0;
		$interval_end=6;
	} else {
		$interval_begin=_dayFromDate($firstDayDate);
		$interval_end=_dayFromDate($lastDayDate);
	}
	
	//$reference_date=$firstDayDate;
	//echo $comptListHours."<br>";
	//echo "$month_days"."<br>";
	
	//Define local worker ID (for div names)
	if($comptListHours>0) $worker_id_local=$listHours->tim_owner[$db_date_index];
	else $worker_id_local="";
	
	for($reference_day=$interval_begin;$reference_day<=$interval_end;$reference_day++) {
		//Variables
		if($displayStyle==TASKTIME_WEEK) {
			$reference_date=_moveDate($firstDayDate,$reference_day,1);
		} else {
			$reference_date="$year-"._dayDateTrim($month)."-"._dayDateTrim($reference_day);
		}
		$date=$listHours->tim_date[$db_date_index];
		$worker=$listHours->tim_mem_name[$db_date_index];
		$date_display="<strong><em>$reference_date</em></strong>";
		
		//Exit if no Worker
// 		echo "worker: $worker";
// 		echo "presentWorker: $presentWorker";
// 		echo $worker_id;
		if(($worker=="") && ($reference_day<$interval_end-1) && ($comptListHours>0) && ($db_date_index<$comptListHours)) {
			//Go to the next value
			echo "Missing Worker Value";
		} else {
			//Add Worker Name when listing all workers
			if(($worker_id==ALL_WORKERS) && ($presentWorker=="")) {
				$block2->openRow($db_date_index);
				$block2->cellRow("");
				//$block2->cellRow("<div class='worker_name'>".buildLink("../_addon/addon_hours_summary.php?dateCalend=$dateCalend&worker_id=".$listHours->tim_owner[$db_date_index]."&display=$display",$worker,LINK_INSIDE)."</div>");
				$block2->cellRow("<div class='worker_name'>$worker</div>");
				$block2->cellRow("");
				$block2->closeRow();
				$presentWorker=$worker;
			} else if($worker_id!=ALL_WORKERS) {
				$presentWorker=$worker;
			}
			
	// 		echo "$reference_date"."<br>";
	// 		echo $listHours->tim_date[$db_date_index]." % $reference_date = ".($listHours->tim_date[$db_date_index]==$reference_date)."<br>";	
			
			//***** Working Date Display ******
			$cell_content=$date_display;
			if(isWorkingDay($reference_date)) {
				$cell_content.="&nbsp;&nbsp;";
			} else {
				$cell_content.=" ({$strings['non_working_day']})&nbsp;&nbsp;";
			}
			$cell_content.=popupLink("../_addon/encode_timesheet.php?dateURL=$reference_date&worker_id=$team_id", "<img align='top' border='0' src='$applicationFolder/themes/deepblue/btn_add_small_norm.gif'>");
			$block2->openRow($db_date_index);
			$block2->cellRow("");
			$block2->cellRow($cell_content);
			$block2->cellRow("<div id='{$reference_date}_{$worker_id_local}_total' class='week_summary'></div>");
			$block2->closeRow();
			
			//***** Fetch TaskTime Data for present Date for the same worker *****
// 			echo "$db_date_index - $comptListHours - {$listHours->tim_date[$db_date_index]} - $reference_day - {$listHours->tim_mem_name[$db_date_index]}<br/>";
			while(($db_date_index<$comptListHours) && (_checkDateDigits($listHours->tim_date[$db_date_index])==$reference_date) && ($presentWorker==$listHours->tim_mem_name[$db_date_index])) {
	// 			echo $presentWorker." ".$listHours->tim_date[$db_date_index]." ".$listHours->tim_hours[$db_date_index]." | "; 
				$dayTotal+=$listHours->tim_hours[$db_date_index];
				$weekTotal+=$listHours->tim_hours[$db_date_index];
				$monthTotal+=$listHours->tim_hours[$db_date_index];
				
				//Display Project Name, Task name and Time Details for Worker Specific report
				if(($worker_id!=ALL_WORKERS)) {
		//		if(true) {
					$block2->openRow($reference_day.$db_date_index);
					$block2->cellRow("");
		//		   	$block2->cellRow($listHours->tim_owner[$db_date_index]);
					$block2->cellRow($listHours->tim_pro_name[$db_date_index]."<br/>".$listHours->tim_tas_name[$db_date_index]);
					//Edit Button
					$editButton="&nbsp;".popupLink("../tasks/edittasktime.php?task=".$listHours->tim_task[$db_date_index]."&id=".$listHours->tim_id[$db_date_index]."", "<img align='top' border='0' src='$applicationFolder/themes/deepblue/btn_edit_small_norm.gif'>");
					//Copy Button
					$copyButton="&nbsp;".popupLink("../tasks/addtasktime.php?task=".$listHours->tim_task[$db_date_index]."&ttid=".$listHours->tim_id[$db_date_index]."&worker_id=".$listHours->tim_owner[$db_date_index], "<img align='top' border='0' src='$applicationFolder/themes/deepblue/btn_copy_small_norm.gif' alt='Copy'>");
					//Add a - link for deletion if admin
				//   	$deleteButton="";
				//   	if (loggedUserIsAdmin()) {
						$deleteButton="&nbsp;".deletePopupLink("../tasks/deletetasktime.php?task=".$listHours->tim_task[$db_date_index]."&id=".$listHours->tim_id[$db_date_index]."&action=delete", "<img align='top' border='0' src='$applicationFolder/themes/deepblue/btn_remove_small_norm.gif'>","");
				//   	}
					//Display
					$block2->cellRow($listHours->tim_hours[$db_date_index].$editButton.$copyButton.$deleteButton);
				$block2->closeRow();
				}
				
				//Increment
				$db_date_index++;
			}
			//echo "end while";
			
			//***** Daily Total *****
			//Compter delta avec heures théoriques sur le jour
			if(isWorkingDay($reference_date)){
				$delta=$dayTotal-$dayHours;
			} else {
				$delta=$dayTotal-$nonWorkingDayHours;
			}
			$totalDelta+=$delta;
			
			//Display Delta only for Administration
			if(loggedUserIsAdmin()) {
				if($delta>0) {
					$deltaText="(<span class='positive_delta'>+$delta</span>)";
				} else if($delta<0) {
					$deltaText="(<span class='negative_delta'>$delta</span>)";
				} else {
					$deltaText="";
				}
			}
			//Affichage
			//echo "Total : $weekTotal $deltaText<br/><br/>";
			
			//*** Affichage du total quotidien ***
			if($displayStyle==TASKTIME_MONTH_SUMMARY) {
				changeDivValue("{$reference_date}_{$worker_id_local}_total","$dayTotal $deltaText");
			} else {
				$block2->openRow($reference_day.$db_date_index);
				$block2->cellRow("");
				$block2->cellRow("<div align='right'><strong>Total&nbsp;&nbsp;&nbsp;&nbsp;</strong></div>");
				$block2->cellRow("$dayTotal $deltaText");
				$block2->closeRow();
			}
			$dayTotal=0;
			
			//** End of the Interval Loop **
			if(($reference_day==$interval_end)) {
				//echo "[end]";
				
				//Redefine local worker ID
				if($db_date_index<=$comptListHours) $worker_id_local=$listHours->tim_owner[$db_date_index];
				else $worker_id_local="";
	
				//** Display Total Delta **
				//$totalDelta=$totalMemHours-$dayHours*$weekDays;
				//Display Delta only for Administration
				if(loggedUserIsAdmin()) {
					if($totalDelta>0) {
					$deltaAmount="<span class='positive_delta'>+$totalDelta</span>";
					$deltaText="($deltaAmount)";
					} else if($totalDelta<0) {
						$deltaAmount="<span class='negative_delta'>$totalDelta</span>";
						$deltaText="($deltaAmount)";
					} else {
						$deltaText="";
					}
				}
				//Display
				$block2->openRow($reference_day.$db_date_index);
				$block2->cellRow("");
				$block2->cellRow("<span class='general_tt_total_title'>Total g&eacute;n&eacute;ral:&nbsp;&nbsp;</span>");
				$block2->cellRow("<span class='general_tt_total'>$monthTotal $deltaText</span>");
				$block2->closeRow();
				$monthTotal=0;
				$totalDelta=0;
				
				//Check if gone over last day of the month and data remaining
				
				//Add all remaining - invalid - dates for this worker
		//		echo $presentWorker." / ".$listHours->tim_mem_name[$db_date_index]." / ".$db_date_index." / $comptListHours";
				if(($presentWorker==$listHours->tim_mem_name[$db_date_index]) && ($db_date_index<$comptListHours)) {
					$block2->openRow($reference_day.$db_date_index);
					$block2->cellRow("");
					$block2->cellRow($strings["invalid_date_format"]);
					$block2->cellRow("");
					$block2->closeRow();
				}
				while(($presentWorker==$listHours->tim_mem_name[$db_date_index]) && ($db_date_index<$comptListHours)) {
					//echo "strange";
					$block2->openRow($reference_day.$db_date_index);
					$block2->cellRow("");
					$block2->cellRow($listHours->tim_date[$db_date_index]);
					$block2->cellRow($listHours->tim_hours[$db_date_index]."&nbsp;".popupLink("../tasks/edittasktime.php?task=".$listHours->tim_task[$db_date_index]."&id=".$listHours->tim_id[$db_date_index]."", "<img align='top' border='0' src='$applicationFolder/themes/deepblue/btn_edit_small_norm.gif'>"));
					$block2->closeRow();
					$db_date_index++;
				}
				//New Cycle if stil data
				if(($presentWorker!=$listHours->tim_mem_name[$db_date_index]) && ($db_date_index<$comptListHours) && ($listHours->tim_mem_name[$db_date_index]!="")) {
					$presentWorker="";
					//Start Again
					$reference_day=$interval_begin-1;
				}
					
				//echo $db_date_index;
		//	 	echo ($db_date_index." / $comptListHours");
				//echo 
				//if($db_date_index<$comptListHours) $reference_day=1;
			}
		}
		//Reinitialize day count if another user present
		//echo $worker."/".$listHours->tim_mem_name[$db_date_index+1]." | ";
		//if(($db_date_index<$comptListHours)&&($worker!=$listHours->tim_mem_name[$db_date_index+1])&&($listHours->tim_mem_name[$db_date_index+1])) $reference_day=$interval_begin-1;

	}
} else if(($displayStyle==TASKTIME_ABSENCE_MONTH) || ($displayStyle==TASKTIME_ABSENCE_YEAR)) {

	//Get theoretical amount of days off for each worker
	function getInitalOff($worker_id,$off_id=TASKTYPE_LEGAL_OFF) {
		global $default_days_off,$default_days_off_other,$dayHours,$strings,$year,$aOffDayTypes;
		global $remaining_off_hours,$off_hours_message;
		if($worker_id) $task_owner=$worker_id ;	else $task_owner=$_SESSION["idSession"];
		if($off_id==ALL_OFF_TYPES) {
			$off_id_list="(";
			for($local_off_type=0;$local_off_type<=count($aOffDayTypes);$local_off_type++) {
				$off_id_list.="(tas.name LIKE '%- ".$aOffDayTypes[$local_off_type]." -%')";
				if($local_off_type<count($aOffDayTypes)) $off_id_list.=" OR ";
			}
			$off_id_list.=")";
		} else {
			$off_id_list="tas.name LIKE '%- ".$off_id." -%'";
		}
		$query="WHERE (tas.name LIKE '%- {$task_owner} -%' AND $off_id_list AND tas.name LIKE '%- {$year} -%' AND pro.id = ".DAYSOFF_PROJECT.")";
// 		echo $query."<br/>";
		$off_hours = new request();
		$off_hours->openTasks($query,"",1);
		$comptOffHours = count($off_hours->tas_id);
		if($comptOffHours>0) {
			//Add all off day types
			$off_type_index=0;
			$remaining_off_hours=0;
			while($off_type_index<count($off_hours->tas_estimated_time)) {
				$remaining_off_hours+=$off_hours->tas_estimated_time[$off_type_index];
				$off_type_index++;
			}
			$off_hours_message=$strings["specific"];
		} else {
			if($off_id==TASKTYPE_LEGAL_OFF) {
				$remaining_off_hours=$default_days_off*$dayHours;
			} else if($off_id==ALL_OFF_TYPES) {
				$remaining_off_hours=($default_days_off+$default_days_off_other)*$dayHours;
			} else {
				$remaining_off_hours=$default_days_off_other*$dayHours;
			}
			$off_hours_message=$strings["default"];
		}
	}
	
	function displayTotal() {
		global $block2,$i,$totalMemHours,$dayHours,$remaining_off_hours,$strings,$off_hours_message;
		
		//Spacer
		$block2->openRow($i);
		$block2->cellRow("");
		$block2->cellRow("");
		$block2->cellRow("&nbsp;");
		$block2->closeRow();
		
		//Calculate total days taken and remaining
		$totalDays=round($totalMemHours/$dayHours,2);
		$remaining_days=round($remaining_off_hours/$dayHours,2);
		
		//Display
		$block2->openRow($i);
		$block2->cellRow("");
		$block2->cellRow("<span class='general_tt_total_title'>Total g&eacute;n&eacute;ral:&nbsp;&nbsp;</span>");
		$block2->cellRow("<span class='general_tt_total'>{$strings["taken"]}&nbsp;: $totalDays {$strings["days"]}<br/>" .
				"{$strings["remaining"]}&nbsp;:$remaining_days {$strings["days"]} ($off_hours_message)</span>");
		$block2->closeRow();
		
		$totalMemHours=0;
		
		//Spacer
		$block2->openRow($i);
		$block2->cellRow("");
		$block2->cellRow("");
		$block2->cellRow("&nbsp;");
		$block2->closeRow();
		
	}
	if($worker_id!=ALL_WORKERS) getInitalOff($worker_id,$offType);

	//*** Old functioning - browse to all DB records ***
//	echo "old";
	for ($i = 0;$i < $comptListHours;$i++) {
		$date=$listHours->tim_date[$i];
		$worker=$listHours->tim_mem_name[$i];
		
		//Remaining Off hours
		$remaining_off_hours-=$listHours->tim_hours[$i];
		
		//Add Worker Name when listing all workers
		if(($worker_id==ALL_WORKERS) && ($presentWorker!=$worker)) {
			//Display Total for Pprevious worker
			if($presentWorker!="") displayTotal();
			
			//Get theoretical amount of days off for each worker
			getInitalOff($listHours->tim_owner[$i],$offType);
					
			$block2->openRow($i);
	    	$block2->cellRow("");
	    	//$block2->cellRow("<div style='font-weight:bold;font-size:150%;color:#555555;text-align:center;'>".buildLink("../_addon/addon_hours_summary.php?dateCalend=$dateCalend&worker_id=".$listHours->tim_owner[$i]."&display=$display",$worker,LINK_INSIDE)."</div>");
	    		    	$block2->cellRow("<div class='worker_name'>$worker</div>");
	    	$block2->cellRow("");
	    	$block2->closeRow();
		}
		$presentWorker=$worker;
		//Displaying Date in front of Total, when listing all Workers
		$displayDate=$listHours->tim_date[$i];
		$date_display="<strong><em>$displayDate</em></strong>";
		if($worker_id==ALL_WORKERS) {
			$allUsers_date=$presentDate;
		} else {
			$allUsers_date="";
		}
		
		//if($presentDate!=$date) {
			if($presentDate!="") {
				
				//Compter delta avec heures théoriques sur le jour
	    		$delta=$weekTotal-$dayHours;
	    		//Display Delta only for Administration
	    		if(loggedUserIsAdmin()) {
		    		if($delta>0) {
		    			$deltaText="(<span style='font-weight:bold;color:#00FF00;'>+$delta</span>)";
		    		} else if($delta<0) {
		    			$deltaText="(<span style='font-weight:bold;color:#FF0000;'>$delta</span>)";
		    		} else {
		    			$deltaText="";
		    		}
	    		}
	    		//Affichage du total quotidien
	    		//echo "Total : $weekTotal $deltaText<br/><br/>";
//	    		$block2->openRow($i);
//	    		$block2->cellRow("");
//	    		$block2->cellRow("<div align='right'><strong>$allUsers_date&nbsp;&nbsp;&nbsp;&nbsp;</strong></div>");
//	    		$block2->cellRow("$weekTotal $deltaText");
//	    		$block2->closeRow();
				$weekTotal=0;
			}
			//echo "".$listHours->tim_date[$i]."<br/>";
			
			//$displayDate=$listHours->tim_date[$i];
			
			//Date Display (only for specific user)
		//Edit Button
		$editButton="&nbsp;".popupLink("../tasks/edittasktime.php?task=".$listHours->tim_task[$i]."&id=".$listHours->tim_id[$i]."", "<img align='top' border='0' src='$applicationFolder/themes/deepblue/btn_edit_small_norm.gif'>");
		//Copy Button
		$copyButton="&nbsp;".popupLink("../tasks/addtasktime.php?task=".$listHours->tim_task[$i]."&ttid=".$listHours->tim_id[$i]."&worker_id=".$listHours->tim_owner[$i], "<img align='top' border='0' src='$applicationFolder/themes/deepblue/btn_copy_small_norm.gif' alt='Copy'>");
	   	//Add a - link for deletion if admin
	//   	$deleteButton="";
	//   	if (loggedUserIsAdmin()) {
	   		$deleteButton="&nbsp;".deletePopupLink("../tasks/deletetasktime.php?task=".$listHours->tim_task[$i]."&id=".$listHours->tim_id[$i]."&action=delete", "<img align='top' border='0' src='$applicationFolder/themes/deepblue/btn_remove_small_norm.gif'>","");
	//   	}

			$block2->openRow($i);
	    	$block2->cellRow("");
	    	$block2->cellRow("$date_display&nbsp;&nbsp;".popupLink("../_addon/encode_timesheet.php?dateURL=$displayDate&worker_id=$team_id", "<img align='top' border='0' src='$applicationFolder/themes/deepblue/btn_add_small_norm.gif'>")." - ".$listHours->tim_tas_name[$i]." : ".$listHours->tim_hours[$i].$editButton.$copyButton.$deleteButton);
	    	$block2->cellRow("");
	    	$block2->closeRow();
	    	//"".$listHours->tim_date[$i]."<br/>";
		//}
		
		$weekTotal+= $listHours->tim_hours[$i];
		$presentDate=$date;
		
		//Display Project Name, Task name and Time Details for Worker Specific report
//		$block2->openRow($i);
//	   	$block2->cellRow("");
//	   	$block2->cellRow("&nbsp;&nbsp;&nbsp;".$listHours->tim_tas_name[$i]);

	   	//Display
	   	//$block2->cellRow($listHours->tim_hours[$i].$editButton.$copyButton.$deleteButton);
//	    $block2->closeRow();
	    $displayDate="";
	
	    $totalMemHours += $listHours->tim_hours[$i];
	    
	}
	
	displayTotal();

}


//Update Summary DIV text
//echo("<script language=\"javascript\">document.getElementById('week_summary').innerHTML=\"".$strings['missing_duration']."$deltaAmount\";</script>");

//echo "</div>";

$block2->closeResults();

?>
