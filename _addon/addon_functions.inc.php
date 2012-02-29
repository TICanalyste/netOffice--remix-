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

//From PHP.Net http://be2.php.net/manual/en/function.date-diff.php#96808 > eugene at ultimatecms dot co dot za
//Modified by EDO on 100412
function date_diff_outdated($start, $end="NOW", $returnType="")
{
        $sdate = strtotime($start);
        $edate = strtotime($end);
		
		$timeshift="";
		
		if($returnType=="d") {
			// Days + Hours + Minutes
            $pday = ($edate - $sdate) / 86400;
            //$preday = explode('.',$pday);
			$timeshift=round($pday,2);
		} elseif($returnType=="w") {
			// Days + Hours + Minutes
            $pday = ($edate - $sdate) / 86400;
			$pweek = $pday/7;
            //$preday = explode('.',$pday);
			$timeshift=round($pweek,2);
		}
		else {
			
		
		
			$time = $edate - $sdate;
			if($time>=0 && $time<=59) {
	
				// Seconds
				$timeshift = $time.' seconds ';
	
			} elseif($time>=60 && $time<=3599) {
					// Minutes + Seconds
					$pmin = ($edate - $sdate) / 60;
					$premin = explode('.', $pmin);
				   
					$presec = $pmin-$premin[0];
					$sec = $presec*60;
				   
					$timeshift = $premin[0].' min '.round($sec,0).' sec ';
	
			} elseif($time>=3600 && $time<=86399) {
					// Hours + Minutes
					$phour = ($edate - $sdate) / 3600;
					$prehour = explode('.',$phour);
				   
					$premin = $phour-$prehour[0];
					$min = explode('.',$premin*60);
				   
					$presec = '0.'.$min[1];
					$sec = $presec*60;
	
					$timeshift = $prehour[0].' hrs '.$min[0].' min '.round($sec,0).' sec ';
	
			} elseif($time>=86400) {
					// Days + Hours + Minutes
					$pday = ($edate - $sdate) / 86400;
					$preday = explode('.',$pday);
	
					$phour = $pday-$preday[0];
					$prehour = explode('.',$phour*24);
	
					$premin = ($phour*24)-$prehour[0];
					$min = explode('.',$premin*60);
				   
					$presec = '0.'.$min[1];
					$sec = $presec*60;
				   
					$timeshift = $preday[0].' days '.$prehour[0].' hrs '.$min[0].' min '.round($sec,0).' sec ';
	
			}
		}
        return $timeshift;
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

function red_negative($value,$treshold=2) {
    $ret=$value;
    if($ret<0) {
        $ret="<span style='color:red;'>".$ret."</span>";
    }
    elseif($ret<$treshold) {
        $ret="<span style='color:orange;'>".$ret."</span>";
    }
    return($ret);
}

//****************** HTML Content Manipulation ***************
function changeDivValue($divName,$content) {
	$html="<script language='javascript'>document.getElementById('$divName').innerHTML=\"$content\"</script>";
	echo($html);
}

?>
