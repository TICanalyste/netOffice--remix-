<?php // $Revision: 1.14 $
/* vim: set expandtab ts=4 sw=4 sts=4: */

/**
 * $Id: header.php,v 1.14 2005/05/21 01:56:06 madbear Exp $
 *
 * Copyright (c) 2003 by the NetOffice developers
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 */
/*
 todo (pixtur 2004-11-11)
 - highlight the current $pageSection if defined

*/

// Banlieues Addon
require_once('../_addon/addon_variables.inc.php');

//--- page header ---
echo "$setDoctype
$setCopyright
<html>
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=$setCharset\">
<title>$setTitle</title>
<meta name=\"robots\" content=\"none\">
<meta name=\"description\" content=\"$setDescription\">
<meta name=\"keywords\" content=\"$setKeywords\">
<script type=\"text/Javascript\">
<!--
var gBrowserOK = true;
var gOSOK = true;
var gCookiesOK = true;
var gFlashOK = true;
// -->
</script>
<script type=\"text/JavaScript\" src=\"../javascript/jquery.js\"></script>
<script type=\"text/javascript\" src=\"../javascript/general.js\"></script>
<script type=\"text/javascript\" src=\"../_addon/addon_scripts.js\"></script>
<script type=\"text/JavaScript\" src=\"../javascript/overlib/overlib.js\"></script>
<script type=\"text/JavaScript\" src=\"../javascript/jscalendar/calendar.js\"></script>
<script type=\"text/JavaScript\" src=\"../javascript/jscalendar/lang/calendar-{$lang}.js\"></script>
<script type=\"text/JavaScript\" src=\"../javascript/jscalendar/calendar-setup.js\"></script>
<link rel=\"stylesheet\" href=\"../_addon/addon_styles.css\" type=\"text/css\">
";
?>
<script type="text/JavaScript"><!--

/*
$(document).ready(function(){
   $("a").click(function(event){
     alert("Thanks for visiting!");
   });
 });
 */

//Shortcut keys handler
//$(window).keydown(function(event){
//	//alert(event.keyCode);
//  switch (event.keyCode) {
//  	case 109: 
//  	  	//alert("Certain ?");
//		var b = MM_getButtonWithName(document.saPForm,'saP1'); if (b) b.click();
//		break;
//  	
//    // ...
//    // different keys do different things
//    // Different browsers provide different codes
//    // see here for details: http://unixpapa.com/js/key.html    
//    // ...
//  }
//});

--></script>
