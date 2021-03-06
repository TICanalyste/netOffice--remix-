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

//From begin of project to selected end date
if(($displayStyle==TASKTIME_EMPLOYER)) {
	$query .= "WHERE (tim.date <= '$lastDayDate')";
}
//Limit to selected dated for all other cases
else {
	$query .= "WHERE (tim.date >= '$firstDayDate' AND tim.date <= '$lastDayDate')";
}
//echo $query;
	
//*** a member selection was made
//$query .= " AND tim.owner = 4";
if($worker_id!="" && $worker_id!=ALL_WORKERS) {
	$team_id=$worker_id;
	$_SESSION['selecter_worker']=$team_id;
} else {
	$team_id=$_SESSION['idSession'];
}
//echo "$worker_id / $team_id / {$_SESSION['selecter_worker']} / {$_SESSION['idSession']}";

//Employer filter, if set

if($employer!="") {
    if($employer!="all") {
        $query .= " AND org.id IN (".$employer.")";
    }
}
//echo $employer;

//*** Select according to user (when specified or user has no right to see other timesheets)
if($worker_id!=ALL_WORKERS || !loggedUserIsAdmin()){
	$query .= " AND tim.owner = $team_id";
	//echo $_SESSION['idSession']."<br/>";
}

//*** Filter on Task ID if in Absence Report
if(($displayStyle==TASKTIME_ABSENCE_YEAR) OR ($displayStyle==TASKTIME_ABSENCE_MONTH)) {
    if(($offType=="")||($offType==ALL_OFF_TYPES)) {
            $query .= " AND tim.task IN (".implode(",",$aOffDayTypes).")";
    } else {
            $query .= " AND tim.task = $offType";
    }
}
//echo $query;

//For Employers Timesheets listing
//elseif($displayStyle==TASKTIME_EMPLOYER) {
	
	//Fetch Task IDs from correspondance table
	//$query .= " AND tim.project IN (".implode(",",$aEmployedProjectIDs).")";
	
	//Select min begin date and max end date for tasks from the necessary employers
	
	//Sum the planned task times for each employer
	
	//Calculate the period of planned word
	
	//Ventilate work time on total period
//}

//*** Order by worker if necessary
$worker_order_addon="";
$project_group_addon="";
$org_group_addon="org.name, ";
if($worker_id==ALL_WORKERS) {
	$worker_order_addon="tim.owner ASC, ";
}

$listHours = new request();
//*** Group by Projet if in Employer summary, else do normal Query
if(($displayStyle!=TASKTIME_EMPLOYER) || ($displayStyle==TASKTIME_EMPLOYER_DETAIL)) {
	$tmpquery = "$query ORDER BY {$worker_order_addon}{$project_group_addon}tim.date ASC,{$org_group_addon}pro.name";
	$listHours->openTaskTime($tmpquery);
	$comptListHours = count($listHours->tim_id);
}
//echo $tmpquery."<br/>";

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
$employerTotal=0;
//$employer="";
$dateEmployerBegin="";
$dateEmployerEnd="";
$displayDate="";
$delta=0;
$totalDelta=0;

//*** New functioning - browse through open days and compare to DB records ***
//Special case for Employer listing
if(($displayStyle==TASKTIME_EMPLOYER)) {
	
	//echo "TASKTIME_EMPLOYER";

	//$project_group_addon="org.name ASC, ";
	//$org_group_addon="tim.project ASC, ";
	$projectsList="";
	foreach($aEmployedProjectIDs as $work_package) {
		$wpProjectID=(is_array($work_package[PROJECT_ID]))?implode(",",$work_package[PROJECT_ID]):$work_package[PROJECT_ID];
		$projectsList=$wpProjectID;
	
		$tmpquery="SELECT O.name, P.name, SUM(TT.hours) AS work
			FROM {$tableCollab["tasks_time"]} TT
			INNER JOIN {$tableCollab["projects"]} P ON TT.project = P.id
			INNER JOIN {$tableCollab["organizations"]} O ON P.organization = O.id
			WHERE TT.project IN ($projectsList)
			GROUP BY P.name";
		//echo $tmpquery;
		$listHours->connectClass();
		$listHours->query($tmpquery);
		$totalHours=0;
		$theor_weekly_hours=$work_package[PROJECT_WEEKLY_HOURS];
		//$project_begin=new DateTime($work_package[PROJECT_BEGIN]);
		$project_begin=$work_package[PROJECT_BEGIN];
		//echo $work_package[PROJECT_BEGIN];
		//$project_now=new DateTime();
		$project_now="NOW";
		
		//$project_duration_interval=date_diff($project_begin,$project_now);
		//$project_duration=($project_duration_interval->format("%d"));
		$project_duration_interval=date_diff_outdated($project_begin,$project_now,"w");
		//echo $project_duration;
		//echo $project_duration_interval;
		
		while ($row=$listHours->fetch()) {
			
			$block2->openRow($db_date_index);
			$block2->cellRow("");
			$block2->cellRow("{$row[0]} > {$row[1]}");
			$block2->cellRow("{$row[2]}");
			$block2->closeRow();
			
			$totalHours+=intval($row[2]);
		}
		
		$pract_weekly_hours=round($totalHours/$project_duration_interval,2);
		$theor_total_hours=round($theor_weekly_hours*$project_duration_interval,2);
		$block2->openRow($db_date_index);
		$block2->cellRow("");
		$block2->cellRow("Total");
		$block2->cellRow("{$totalHours} (theor: $theor_total_hours) > $pract_weekly_hours hours weekly (theor: {$theor_weekly_hours})");
		$block2->closeRow();
	}
	$projectsList=rtrim($projectsList,",");
	

	$comptListHours=0;
	
}
elseif($displayStyle==TASKTIME_EMPLOYER_DETAIL) {

	//echo "TASKTIME_EMPLOYER";

	//$project_group_addon="org.name ASC, ";
	//$org_group_addon="tim.project ASC, ";
	$tasksList="";
        $tasks_hours_total=0;

        //Select Employer Tasks
//        print_r($aEmployerTasks);
//        echo $employer;
        if(isset($aEmployerTasks[$employer])) {
            if(is_array($aEmployerTasks[$employer])) {
                foreach($aEmployerTasks[$employer] as $key => $employer_task) {
                    $tasksList.=$key.",";
                    $tasks_hours_total+=round($employer_task[TASK_MONTHLY_HOURS]);
                }
                $tasksList=rtrim($tasksList,",");

                $tmpquery="SELECT O.name, P.name, SUM(TT.hours) AS work, T.id, T.name
			FROM {$tableCollab["tasks_time"]} TT
                        INNER JOIN {$tableCollab["tasks"]} T ON TT.task = T.id
			INNER JOIN {$tableCollab["projects"]} P ON TT.project = P.id
			INNER JOIN {$tableCollab["organizations"]} O ON P.organization = O.id
			WHERE TT.task IN ($tasksList)
                        AND (TT.date <= '$lastDayDate' AND TT.date >= '$firstDayDate')
                        GROUP BY T.name
                        ORDER BY P.name, T.name
                        ";

//                echo $tmpquery;
                
		$listHours->connectClass();
		$listHours->query($tmpquery);
		$totalHours=0;
                $totalHours2=0;
		$project_now="NOW";

		while ($row=$listHours->fetch()) {


                    //Find theoretical hours
                    if(isset($aEmployerTasks[$employer][$row[3]])) {
                        $local_max=$aEmployerTasks[$employer][$row[3]][TASK_MONTHLY_HOURS];
                        $local_diff=red_negative($local_max-$row[2]);
                    } else {
                        $local_max="n/a";
                        $local_diff="0";
                    }


                    $block2->openRow($db_date_index);
			$block2->cellRow("&nbsp;<a href='../tasks/viewtask.php?id={$row[3]}' target='_top'>#{$row[3]}</a>&nbsp;");
			$block2->cellRow("{$row[0]} > {$row[1]} > {$row[4]}");
			$block2->cellRow("{$row[2]} (max&nbsp;: {$local_max}, diff&nbsp;: {$local_diff})");
			$block2->closeRow();

			$totalHours+=round($row[2],2);
		}
		$block2->openRow($db_date_index);
		$block2->cellRow("");
		$block2->cellRow("<h3>Total</h3>");
                $block2->cellRow("<strong>{$totalHours} (theor: $tasks_hours_total)</strong>");
		$block2->closeRow();

                //Do the same for non planned hours
                $tmpquery="SELECT O.name, P.name, SUM(TT.hours) AS work, T.id, T.name
			FROM {$tableCollab["tasks_time"]} TT
                        INNER JOIN {$tableCollab["tasks"]} T ON TT.task = T.id
			INNER JOIN {$tableCollab["projects"]} P ON TT.project = P.id
			INNER JOIN {$tableCollab["organizations"]} O ON P.organization = O.id
			WHERE TT.task NOT IN ($tasksList)
                        AND O.id = $employer
                        AND (TT.date <= '$lastDayDate' AND TT.date >= '$firstDayDate')
			GROUP BY T.name
                        ORDER BY P.name, T.name
                        ";
               $listHours->query($tmpquery);
               while ($row=$listHours->fetch()) {

			$block2->openRow($db_date_index);
			$block2->cellRow("&nbsp;<a href='../tasks/viewtask.php?id={$row[3]}' target='_top'>#{$row[3]}</a>&nbsp;");
			$block2->cellRow("{$row[0]} > {$row[1]} > {$row[4]}");
			$block2->cellRow("{$row[2]}");
			$block2->closeRow();

			$totalHours2+=round($row[2],2);
		}

		$theor_total_hours=round($theor_weekly_hours*$project_duration_interval,2);
		$block2->openRow($db_date_index);
		$block2->cellRow("");
		$block2->cellRow("<h3>Total</h3>");
                $block2->cellRow("<strong>{$totalHours2}</strong>");
		$block2->closeRow();

                $general_total=$totalHours+$totalHours2;
                $general_diff=$tasks_hours_total-$general_total;
                $general_diff=red_negative($general_diff);
                $block2->openRow($db_date_index);
                $block2->cellRow("");
		$block2->cellRow("<h2>Total général</h2>");
                $block2->cellRow("<strong>".($general_total)." (diff.&nbsp;: ".$general_diff.")</strong>");
		$block2->closeRow();

            } else {
                echo "Employer data missing (not an array)";
            }
        } else {
            echo "Employer data missing (not set)";
        }


}
elseif(!(($displayStyle==TASKTIME_ABSENCE_MONTH) || ($displayStyle==TASKTIME_ABSENCE_YEAR))) {
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
	
	//Specifiv begin and end interval dates for Employers topo
	if($displayStyle==TASKTIME_EMPLOYER) {
		$interval_begin=0;
		$interval_end=$comptListHours;
	}
	
	//Display and calculation based on days, for most cases
	for($reference_day=$interval_begin;$reference_day<=$interval_end;$reference_day++) {
		//Variables
		if($displayStyle==TASKTIME_EMPLOYER) {
			$reference_date=$listHours->tim_date[$db_date_index];
		} elseif($displayStyle==TASKTIME_WEEK) {
			$reference_date=_moveDate($firstDayDate,$reference_day,1);
		} else {
			$reference_date="$year-"._dayDateTrim($month)."-"._dayDateTrim($reference_day);
		}
		$date=$listHours->tim_date[$db_date_index];
		$worker=$listHours->tim_mem_name[$db_date_index];
		$date_display="<strong><em>$reference_date</em></strong>";
		
		//Display employer if needed
		/*
		if($employer!=$listHours->tim_org_name[$db_date_index]) {
			$employer=$listHours->tim_org_name[$db_date_index];
			
			$block2->openRow($db_date_index);
			$block2->cellRow("");
			$block2->cellRow("<div class='worker_name'>$employer</div>");
			$block2->cellRow("");
			$block2->closeRow();
			
			$dateEmployerBegin=$date;
		}
		*/
		
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
			if($displayStyle!=TASKTIME_EMPLOYER) {
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
			}
			
			//***** Fetch TaskTime Data for present Date for the same worker *****
// 			echo "$db_date_index - $comptListHours - {$listHours->tim_date[$db_date_index]} - $reference_day - {$listHours->tim_mem_name[$db_date_index]}<br/>";
			while(($db_date_index<$comptListHours) && (_checkDateDigits($listHours->tim_date[$db_date_index])==$reference_date) && ($presentWorker==$listHours->tim_mem_name[$db_date_index])) {
	// 			echo $presentWorker." ".$listHours->tim_date[$db_date_index]." ".$listHours->tim_hours[$db_date_index]." | "; 
				$dayTotal+=$listHours->tim_hours[$db_date_index];
				$weekTotal+=$listHours->tim_hours[$db_date_index];
				$monthTotal+=$listHours->tim_hours[$db_date_index];
				$employerTotal+=$listHours->tim_hours[$db_date_index];
				
				//Display Project Name, Task name and Time Details for Worker Specific report
				if($displayStyle!=TASKTIME_EMPLOYER) {
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
			if($displayStyle!=TASKTIME_EMPLOYER) {
				if($displayStyle==TASKTIME_MONTH_SUMMARY) {
					changeDivValue("{$reference_date}_{$worker_id_local}_total","$dayTotal $deltaText");
				} else {
					$block2->openRow($reference_day.$db_date_index);
					$block2->cellRow("");
					$block2->cellRow("<div align='right'><strong>Total&nbsp;&nbsp;&nbsp;&nbsp;</strong></div>");
					$block2->cellRow("$dayTotal $deltaText");
					$block2->closeRow();
				}
			}
			$dayTotal=0;
			
			//** End of an Employer loop **
			if($displayStyle==TASKTIME_EMPLOYER)  {
				if($listHours->tim_org_name[$db_date_index+1]!=$listHours->tim_org_name[$db_date_index]) {
					$block2->openRow($reference_day.$db_date_index);
					$block2->cellRow("");
					$block2->cellRow("<div align='right'><strong>Total&nbsp;&nbsp;&nbsp;&nbsp;</strong></div>");
					$block2->cellRow("$employerTotal");
					$block2->closeRow();
					
					$dateEmployerEnd=$listHours->tim_date[$db_date_index];
					
					$diff_days=date_diff($dateEmployerBegin,$dateEmployerEnd,"d");
					$diff_weeks=round($diff_days/7,2);
					
					$work_per_week=round(($employerTotal/$diff_weeks),2);
					
					$block2->openRow($reference_day.$db_date_index);
					$block2->cellRow("");
					$block2->cellRow("<div align='right'><strong>Period&nbsp;&nbsp;&nbsp;&nbsp;</strong></div>");
					$block2->cellRow($dateEmployerBegin." ".$dateEmployerEnd." : $diff_days => $work_per_week hours per week");
					$block2->closeRow();
					//echo "suivant: ".$listHours->tim_org_name[$db_date_index+1];
					$employerTotal=0;
					
					
				}
			}
			
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
