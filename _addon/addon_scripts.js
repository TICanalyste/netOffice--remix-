<!--

/**
 * @author emmanuel
 */

function comaToDot(input){
	value=input.value;
	//alert(value);
	find=new RegExp(',','g');
	value=value.replace(find,'.');
	input.value=value;
}

function hoursToDecimal(input){
	value=input.value;
	hours=0;
	minutes=0;
	//alert(value.indexOf(":"));
	if(value.indexOf(":")>0){
		//Store time in Array
		aTime=value.split(":");
		//Get Hours
		hours=aTime[0];
		//Get Minutes
		minutes=new Number(aTime[1]);
		minutes=minutes/60*100;
		minutes=minutes.toFixed(0);
		input.value=hours+"."+minutes;
	}
	//value=value.replace(find,'.');
}

function timeCheck(input){
	comaToDot(input);
	hoursToDecimal(input);
}

function checkDateFormat(inputField) {
	input=new String(inputField.value);
	if(input.length!=10) {
		aInput=input.split("-");
		year=aInput[0];
		month=aInput[1];
		day=aInput[2];
		if(year.length!=4) {
			year="2008";
		}
		if(month.length==1) {
			month="0"+month;
		} else if(month.length!=2) {
			month="01";
		}
		if(day.length==1) {
			day="0"+day;
		} else if(day.length!=2) {
			day="01";
		}
		output=year+"-"+month+"-"+day;
	} else {
		output=input;
	}
	inputField.value=output;
}

//************** Task Timer Functions ****************
document.runningTaskTimer=0;
function toggleTimer(task) {
	/**
	 * Toggles ONE (and only one at a time) task timer.
	 * Defines a 'runningTaskTimer' document variable containing task ID.
	 * If another timer is running (defined runningTaskTimer), stops it before running a new one.
	 */
	
	var runningTaskTimer=document.runningTaskTimer;
	
	//Check if another timer is running
	//Ask if user wants to stop previously running timer to start this one
	if(document.runningTaskTimer!=0) {
		//var sure=confirm("Are you sure you want to stop the currently running timer?");
		var sure=true;
		var message=prompt("Enter a description for your work:", "auto-timer");
		if(sure) {
			toggleTimerPHP(runningTaskTimer,0,message);
			toggleTimerIcon(runningTaskTimer,0);
		} else {
			exit;
		}
	}
	
	if(runningTaskTimer!=task) {
		//Start the new timer, only if different from previous one
		toggleTimerPHP(task,1);
		//document.runningTaskTimer=task;
		toggleTimerIcon(task,1);
	}
}

function toggleTimerPHP(task,value,textMessage) {
	jQuery.post("../_addon/toggle_timer.php",{ id: task , status: value, comment: textMessage},
			function(data){
			    //alert(data);
				if(value) {
					toggleTimerText(task,data);
				} else {
					toggleTimerText(task,"");
				}
			},"text");
}

function toggleTimerText(task,datetime) {
	var timer_text_id = "timer_"+task+"_text";
	var timer_text = document.getElementById(timer_text_id);
	timer_text.innerHTML=datetime;
}

function toggleTimerIcon(task,value) {
	//Variables
	var timer_icon_folder = "../interface/icones/";
	var timer_icon_on = timer_icon_folder+"time_running.gif";
	var timer_icon_off = timer_icon_folder+"time_go.gif";
	var timer_icon_id = "timer_"+task+"_icon"; 
	var timer_icon = document.getElementById(timer_icon_id);
	//Change TR color background
	var timer_row_background = timer_icon.parentNode.parentNode.parentNode.style.backgroundColor;
//	alert(timer_row_background);
	
	//Define future icon from present state
	if(value) {
		timer_icon.src=timer_icon_on;
		document.runningTaskTimer=task;
		timer_icon.parentNode.parentNode.parentNode.style.backgroundColor = "#FF5555";
		timer_icon.parentNode.parentNode.parentNode.setAttribute("onmouseout", "this.style.backgroundColor='#FF5555';");
		//timer_row_background = "#FF0000";
	} else {
		timer_icon.src=timer_icon_off;
		document.runningTaskTimer=0;
		timer_icon.parentNode.parentNode.parentNode.style.backgroundColor = timer_row_background;
		timer_icon.parentNode.parentNode.parentNode.setAttribute("onmouseout", "this.style.backgroundColor='#"+timer_row_background+"';");
	}
}

function toggleTimerBegin(task,datetime) {
	//alert(task+"/"+datetime);
	/**
	 * TODO Affichage de l'heure de début de tâche lors de l'allumage
	 */
}

//-->