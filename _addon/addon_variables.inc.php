<?php
$admin_name="Emmanuel Donnet";
$aAdmin_ids=array(4,25,33);
$assistant_name="Saïd El Yettefti";
$aAssistant_ids=array(29,33);

$dayHours=7.6;
$nonWorkingDayHours=0;
$weekDays=5;
$default_days_off=20;
$default_days_off_other=0;

//Production or Development
$isInProduction=true;
$httpHost = strtolower($_SERVER["HTTP_HOST"]);
//echo $httpHost;
if($httpHost=="127.0.0.1") $isInProduction=false;

//Paths
if($isInProduction) {
	$applicationFolder="";
} else {
	$applicationFolder="/netoffice";
}

//Task Time Types
//Default = 1
define('TASKTIME_TYPE_TS',1);
define('TASKTIME_TYPE_SUPPORT',2);

//Specific OFF Project and Task IDs
define('ALL_OFF_TYPES','all');
define('TASKTYPE_LEGAL_OFF',957);
define('TASKTYPE_LEGAL_OFF_PREVIOUS',1239);
define('TASKTYPE_EDUC_OFF',1265);
define('TASKTYPE_UNDEF_OFF',84);
define('TASKTYPE_CIRC_OFF',961);
define('TASKTYPE_PARENT_OFF',959);
define('TASKTYPE_UNPAID_OFF',960);
define('TASKTYPE_ILLNESS',958);
define('TASKTYPE_OFFIC_OFF',848);
define('TASKTYPE_RECUP',1007);
$aOffDayTypes=array(TASKTYPE_LEGAL_OFF,TASKTYPE_UNDEF_OFF,TASKTYPE_CIRC_OFF,TASKTYPE_UNPAID_OFF,TASKTYPE_PARENT_OFF,TASKTYPE_ILLNESS,TASKTYPE_OFFIC_OFF,TASKTYPE_RECUP,TASKTYPE_LEGAL_OFF_PREVIOUS,TASKTYPE_EDUC_OFF);
$aLegalOffTypes=array(TASKTYPE_LEGAL_OFF,TASKTYPE_LEGAL_OFF_PREVIOUS);
$aCostingDayTypes=array(TASKTYPE_LEGAL_OFF,TASKTYPE_UNDEF_OFF,TASKTYPE_CIRC_OFF,TASKTYPE_ILLNESS,TASKTYPE_OFFIC_OFF,TASKTYPE_LEGAL_OFF_PREVIOUS,TASKTYPE_EDUC_OFF);

//Created a Project containing tasks for the duration of days off of everyone each year
define('DAYSOFF_PROJECT',118);

//Task Time Report Types
define('TASKTIME_WEEK','week');
define('TASKTIME_MONTH','month');
define('TASKTIME_MONTH_SUMMARY','monthsum');
define('TASKTIME_ABSENCE_MONTH','monthabs');
define('TASKTIME_ABSENCE_YEAR','yearabs');
$aAbsenceSummaryTypes=array(TASKTIME_ABSENCE_MONTH,TASKTIME_ABSENCE_YEAR);

define('ALL_WORKERS','all');

define('VARTYPE_BOOL',0);
define('VARTYPE_INT',1);

//Translate netOffice user ID into WebCalendar user names
$banUsers=array();
$banUsers[4]="emmanuel";
$banUsers[30]="samer";
$banUsers[31]="firuz";
$banUsers[25]="rcassart";
$banUsers[29]="Said";
$banUsers[33]="nicolas";
$banUsers[26]="genevieve";
$banUsers[22]="noel";
$banUsers[9]="pascal";
$banUsers[8]="Truong";
$banUsers[41]="Idrissa";
$banUsers[40]="Mailis";
$banUsers[39]="Sabri";
$banUsers[38]="Tsang";
//$banUsers[4]="farid";
$banUsers[12]="robert"; 

//Navigation
$standard_popup_code="newWindow=window.open('*URL*&window=popup','actions_popup','width=800,height=600,menubar=0,status=0,scrollbars=1');newWindow.focus();";
$standard_hidden_popup_code="newWindow=window.open('*URL*&window=popup','actions_popup','width=5,top=2000,left=2000,menubar=0,status=0,scrollbars=1,height=5');newWindow.opener.focus();";

//Export
//$export_extension="xls";
//$export_mime_type="application/vnd.ms-excel";

$export_extension="csv";
$export_mime_type="text/x-csv";
?>
