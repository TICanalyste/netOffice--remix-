<?php
/**
 * Created on 7 juil. 08
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

//********** Date Functions ***************
function _dayOfWeek($timestamp)
{
    return intval(strftime("%w", $timestamp) + 1);
}

function _dayFromDate($date){
	$day = substr("$date", 8, 2);
// 	echo $day;
// 	echo substr($day,0,1);
// 	echo substr($day,1,1);
	if(substr($day,0,1)=="0") $day=substr($day,1,1);
	return($day);
}

function _dayDateTrim($inputDate) {
	if(strlen($inputDate)==1) $outputDate="0".$inputDate; else $outputDate=$inputDate;
	return $outputDate;
}

function _moveDate($inputDate,$daysInterval,$direction) {
	$date=strtotime($inputDate);
	$outputDate=$date+($daysInterval*24*60*60)*$direction;
	$outputDate=date("Y-m-d",$outputDate);
	return $outputDate;
}
function isWorkingDay($inputDate){
	$date_day=date("w",strtotime($inputDate));
	$isWorkingDay=($date_day==1 || $date_day==2 || $date_day==3 || $date_day==4 || $date_day==5);
	return $isWorkingDay;
}

function _checkDateDigits($inputDate) {
	if(strlen!=10) {
		$outputDate=$inputDate;
	} else {
		$outputDate=$inputDate;
	}
	return($outputDate);
}

function netOfficeDateFromDate($inputDate) {
	//Not finished!!
	$day = substr($date, 8, 2);
	$month = substr($inputDate, 6, 2);
	$year = substr($inputDate, 1, 4);
	$outputDate = $year."-".$month."-".$day;
	return($outputDate);
}

//************ Security Functions ************************
function loggedUserIsAdmin() {
//	global $admin_name;
//	return(($_SESSION['nameSession'] == $admin_name));
	
//	echo "session ID : ".$_SESSION['idSession']."<br>";
	global $aAdmin_ids;
	//echo $aAdmin_ids;
	$isAdmin=false;
	//$aAdmins=explode(",",$admin_ids);
	//echo count($aAdmin_ids);
	for($i=0;$i<count($aAdmin_ids);$i++) {
		//echo $aAdmin_ids[$i]."|".$_SESSION['idSession']."<br/>";
		if($aAdmin_ids[$i]==$_SESSION['idSession']) {
			$isAdmin=true; break;
		}
	}
	//echo "end function<br><br>";
	return($isAdmin);
}

function loggedUserIsAssistant() {
	//global $assistant_name;
	//return(($_SESSION['nameSession'] == $assistant_name));
	
	global $aAssistant_ids;
	$isAssistant=false;
	for($i=0;$i<count($aAssistant_ids);$i++) {
		if($aAssistant_ids[$i]==$_SESSION['idSession']) {
			$isAssistant=true; break;
		}
	}
	return($isAssistant);
}

function isRHLoggedUser() {
	
}

function userIsRole($user,$role) {
	exit;
}

//****************** Query Handling Functions *****************
function securePost($variable,$type) {
	/**
	 * TODO Add security checks
	 */
	return($_POST[$variable]);
}

//****************** Navigation ***************
function popupLink($url,$text) {
	$link=popupLink_generic($url,$text,"");
	return($link);
}

function deletePopupLink($url,$text,$message) {
	global $standard_hidden_popup_code,$strings;
	
	if($message=="") $message=$strings["confirm_deletion"];
	
	$popupcode="if(confirm('$message')) {".str_replace("*URL*",$url,$standard_hidden_popup_code)."};";	
	
	$link=popupLink_generic($url,$text,$popupcode);
	return($link);
}

function popupLink_generic($url,$text,$popupcode) {
	global $standard_popup_code;
	if($popupcode=="") $popupcode=str_replace("*URL*",$url,$standard_popup_code);
	$link="<a href=\"#\" onClick=\"$popupcode\">$text</a>";
	return($link);
}

function popupClose() {
	$html="<script language='javascript'>this.opener.location.reload();this.opener.focus();this.close();</script>";
	echo ($html);
}

//****************** HTML Content Manipulation ***************
function changeDivValue($divName,$content) {
	$html="<script language='javascript'>document.getElementById('$divName').innerHTML=\"$content\"</script>";
	echo($html);
}

?>
