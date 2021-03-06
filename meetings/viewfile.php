<?php // $Revision: 1.4 $
/* vim: set expandtab ts=4 sw=4 sts=4: */

/**
 * $Id: viewfile.php,v 1.4 2004/12/20 23:45:01 pixtur Exp $
 * 
 * Copyright (c) 2004 by the NetOffice developers
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 */

$checkSession = true;
require_once("../includes/library.php");

require_once("../includes/files_types.php");

if ($action == "publish") {
    if ($addToSiteFile == "true") {
        $tmpquery1 = "UPDATE " . $tableCollab["meetings_attachment"] . " SET published='0' WHERE id = '$file' OR vc_parent = '$file'";
        connectSql("$tmpquery1");
        $msg = "addToSite";
        $id = $file;
    } 

    if ($removeToSiteFile == "true") {
        $tmpquery1 = "UPDATE " . $tableCollab["meetings_attachment"] . " SET published='1' WHERE id = '$file' OR vc_parent = '$file'";
        connectSql("$tmpquery1");
        $msg = "removeToSite";
        $id = $file;
    } 
} 

$tmpquery = "WHERE mat.id = '$id'";
$fileDetail = new request();
$fileDetail->openMeetingsAttachment($tmpquery);
$comptFileDetail = count($fileDetail->mat_id);

$teamMember = "false";
$tmpquery = "WHERE tea.project = '" . $fileDetail->mat_project[0] . "' AND tea.member = '" . $_SESSION['idSession'] . "'";
$memberTest = new request();
$memberTest->openTeams($tmpquery);
$comptMemberTest = count($memberTest->tea_id);
if ($comptMemberTest == "0") {
    $teamMember = "false";
} else {
    $teamMember = "true";
} 

if ($teamMember == "false" && $projectsFilter == "true") {
    header("Location:../general/permissiondenied.php");
    exit;
} 

$tmpquery = "WHERE pro.id = '" . $fileDetail->mat_project[0] . "'";
$projectDetail = new request();
$projectDetail->openProjects($tmpquery);
$tmpquery = "WHERE mee.id = '" . $fileDetail->mat_meeting[0] . "'";
$meetingDetail = new request();
$meetingDetail->openMeetings($tmpquery);

$type = file_info_type($fileDetail->mat_extension[0]);
$displayname = $fileDetail->mat_name[0];
// ---------------------------------------------------------------------------------------------------
// Update file code
if ($action == "update") {
    if ($maxCustom != "") {
        $maxFileSize = $maxCustom;
    } 
    if ($_FILES['upload']['size'] != 0) {
        $taille_ko = $_FILES['upload']['size'] / 1024;
    } else {
        $taille_ko = 0;
    } 
    if ($_FILES['upload']['name'] == "") {
        $error4 .= $strings["no_file"] . "<br>";
    } 
    if ($_FILES['upload']['size'] > $maxFileSize) {
        if ($maxFileSize != 0) {
            $taille_max_ko = $maxFileSize / 1024;
        } 
        $error4 .= $strings["exceed_size"] . " ($taille_max_ko $byteUnits[1])<br>";
    } 

    $upload_name = $fileDetail->mat_name[0];
    $extension = strtolower(substr(strrchr($upload_name, ".") , 1)); 
    // Add version number to the old copy's file name.
    $changename = str_replace(".", " v" . $fileDetail->mat_vc_version[0] . ".", $fileDetail->mat_name[0]); 
    // Generate paths for use further down.
    $path = "files/" . $fileDetail->mat_project[0] . "/meetings/" . $fileDetail->mat_meeting[0] . "/$upload_name";
    $path_source = "files/" . $fileDetail->mat_project[0] . "/meetings/" . $fileDetail->mat_meeting[0] . "/" . $fileDetail->mat_name[0];
    $path_destination = "files/" . $fileDetail->mat_project[0] . "/meetings/" . $fileDetail->mat_meeting[0] . "/$changename";

    if ($allowPhp == "false") {
        $send = "";
        if ($_FILES['upload']['name'] != "" && ($extension == "php" || $extension == "php3" || $extension == "phtml")) {
            $error4 .= $strings["no_php"] . "<br>";
            $send = "false";
        } 
    } 

    if ($_FILES['upload']['name'] != "" && $_FILES['upload']['size'] < $maxFileSize && $_FILES['upload']['size'] != 0 && $send != "false") {
        $cpy = "true";
    } 

    if ($cpy == "true") {
        // Copy old file with a new file name
        moveFile($path_source, $path_destination); 
        // Set variables from original files details.
        $cpy_project = $fileDetail->mat_project[0];
        $cpy_meeting = $fileDetail->mat_meeting[0];
        $cpy_date = $fileDetail->mat_date[0];
        $cpy_size = $fileDetail->mat_size[0];
        $cpy_extension = $fileDetail->mat_extension[0];
        $cpy_comments = $fileDetail->mat_comments[0];
        $cpy_comments_approval = $fileDetail->mat_comments_approval[0];
        $cpy_approver = $fileDetail->mat_approver[0];
        $cpy_date_approval = $fileDetail->mat_date_approval[0];
        $cpy_upload = $fileDetail->mat_upload[0];
        $cpy_pusblished = $fileDetail->mat_published[0];
        $cpy_vc_parent = $fileDetail->mat_vc_parent[0];
        $cpy_id = $fileDetail->mat_id[0];
        $cpy_vc_version = $fileDetail->mat_vc_version[0]; 
        // Insert a new row for the copied file
        $cpy_comments = convertData($cpy_comments);
        $tmpquery = "INSERT INTO " . $tableCollab["meetings_attachment"] . "(owner,project,meeting,name,date,size,extension,comments,comments_approval,approver,date_approval,upload,published,status,vc_status,vc_version,vc_parent) VALUES('" . $_SESSION['idSession'] . "','$cpy_project','$cpy_meeting','$changename','$cpy_date','$cpy_size','$cpy_extension','$cpy_comments','$cpy_comments_approval','$cpy_approver','$cpy_date_approval','$cpy_upload','$cpy_pusblished','2','3','$cpy_vc_version','$cpy_id')";
        connectSql("$tmpquery");
        $tmpquery = $tableCollab["meetings_attachment"];
        last_id($tmpquery);
        $num = $lastId[0];
        unset($lastId);
    } 
    // Insert details into Database
    if ($cpy == "true") {
        uploadFile(".", $_FILES['upload']['tmp_name'], $path); 
        // $size = file_info_size($path);
        // $dateFile = file_info_date($path);
        $chaine = strrev("$path");
        $tab = explode(".", $chaine);
        $extension = strtolower(strrev($tab[0]));
    } 

    $newversion = $fileDetail->mat_vc_version[0] + $change_file_version;
    if ($cpy == "true") {
        $name = $upload_name;
        $tmpquery = "UPDATE " . $tableCollab["meetings_attachment"] . " SET date='$dateheure',size='$size',comments='$c',comments_approval='',approver='',date_approval='',status='$statusField',vc_version='$newversion' WHERE id = '$id'";
        connectSql($tmpquery);
        header('Location: ../meetings/viewfile.php?id=' . $fileDetail->mat_id[0] . '&msg=addFile');
        exit;
    } 
} 
// ---------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------
// Add new revision code
if ($action == "add") {
    if ($maxCustom != "") {
        $maxFileSize = $maxCustom;
    } 
    if ($_FILES['upload']['size'] != 0) {
        $taille_ko = $_FILES['upload']['size'] / 1024;
    } else {
        $taille_ko = 0;
    } 
    if ($_FILES['upload']['name'] == "") {
        $error3 .= $strings["no_file"] . "<br>";
    } 
    if ($_FILES['upload']['size'] > $maxFileSize) {
        if ($maxFileSize != 0) {
            $taille_max_ko = $maxFileSize / 1024;
        } 
        $error3 .= $strings["exceed_size"] . " ($taille_max_ko $byteUnits[1])<br>";
    } 

    $upload_name = $filename; 
    // Add version and revision at the end of a file name but before the extension.
    $upload_name = str_replace(".", " v$oldversion r$revision.", $upload_name);

    $extension = strtolower(substr(strrchr($upload_name, ".") , 1));

    if ($allowPhp == "false") {
        $send = "";
        if ($_FILES['upload']['name'] != "" && ($extension == "php" || $extension == "php3" || $extension == "phtml")) {
            $error3 .= $strings["no_php"] . "<br>";
            $send = "false";
        } 
    } 

    if ($_FILES['upload']['name'] != "" && $_FILES['upload']['size'] < $maxFileSize && $_FILES['upload']['size'] != 0 && $send != "false") {
        $cpy = "true";
    } 
    // Insert details into Database
    if ($cpy == "true") {
        $c = convertData($c);
        $tmpquery = "INSERT INTO " . $tableCollab["meetings_attachment"] . "(owner,project,meeting,comments,upload,published,status,vc_status,vc_parent) VALUES('" . $_SESSION['idSession'] . "','$project','$meeting','$c','$dateheure','$published','2','0','$parent')";
        connectSql("$tmpquery");
        $tmpquery = $tableCollab["meetings_attachment"];
        last_id($tmpquery);
        $num = $lastId[0];
        unset($lastId);
    } 

    if ($cpy == "true") {
        uploadFile("files/$project/meetings/$meeting", $_FILES['upload']['tmp_name'], $upload_name);
        $size = file_info_size("../files/$project/meetings/$meeting/$upload_name"); 
        // $dateFile = file_info_date("../files/$project/meetings/$meeting/$upload_name");
        $chaine = strrev("../files/$project/meetings/$meeting/$upload_name");
        $tab = explode(".", $chaine);
        $extension = strtolower(strrev($tab[0]));
    } 

    if ($cpy == "true") {
        $name = $upload_name;
        $tmpquery = "UPDATE " . $tableCollab["meetings_attachment"] . " SET name='$name',date='$dateheure',size='$size',extension='$extension',vc_version='$oldversion' WHERE id = '$num'";
        connectSql("$tmpquery");
        header("Location: ../meetings/viewfile.php?id=$sendto&msg=addFile");
        exit;
    } 
} 

//---- header ---------------------------------------------------------------------------------
$breadcrumbs[]=buildLink("../projects/listprojects.php?", $strings["projects"], LINK_INSIDE);
$breadcrumbs[]=buildLink("../projects/viewproject.php?id=" . $fileDetail->mat_project[0], $projectDetail->pro_name[0], LINK_INSIDE);
$breadcrumbs[]=buildLink("../meetings/listmeetings.php?project=" . $fileDetail->mat_project[0], $strings["meetings"], LINK_INSIDE);
$breadcrumbs[]=buildLink("../meetings/viewmeeting.php?id=" . $meetingDetail->mee_id[0], $meetingDetail->mee_name[0], LINK_INSIDE);
$breadcrumbs[]=$fileDetail->mat_name[0];

require_once("../themes/" . THEME . "/header.php");

// ---- content -------------------------------------------------------------------------------
// Begining of Display code
// File details block
$block1 = new block();
$block1->form = "vdC";
$block1->openForm("../meetings/viewfile.php?id=$id#" . $block1->form . "Anchor");

$block1->heading($strings["document"]);

if ($fileDetail->mat_owner[0] == $_SESSION['idSession']) {
    $block1->openPaletteIcon();
    $block1->paletteIcon(0, "remove", $strings["ifc_delete_version"]);
    $block1->paletteIcon(1, "add_projectsite", $strings["add_project_site"]);
    $block1->paletteIcon(2, "remove_projectsite", $strings["remove_project_site"]);
    $block1->closePaletteIcon();
} 
else {
	$block1->heading_close();
}
if ($error1 != "") {
    $block1->headingError($strings["errors"]);
    $block1->contentError($error1);
} 

$block1->openContent();
$block1->contentTitle($strings["details"]);

echo "<tr class=\"odd\"><td valign=\"top\" class=\"leftvalue\">" . $strings["type"] . " :</td><td><img src=\"../interface/icones/$type\" border=\"0\" alt=\"\"></td></tr>
<tr class=\"odd\"><td valign=\"top\" class=\"leftvalue\">" . $strings["name"] . " :</td><td>" . $fileDetail->mat_name[0] . "</td></tr>
<tr class=\"odd\"><td valign=\"top\" class=\"leftvalue\">" . $strings["vc_version"] . " :</td><td>" . $fileDetail->mat_vc_version[0] . "</td></tr>
<tr class=\"odd\"><td valign=\"top\" class=\"leftvalue\">" . $strings["ifc_last_date"] . " :</td><td>" . $fileDetail->mat_date[0] . "</td></tr>
<tr class=\"odd\"><td valign=\"top\" class=\"leftvalue\">" . $strings["size"] . ":</td><td>" . convertSize($fileDetail->mat_size[0]) . "</td></tr>
<tr class=\"odd\"><td valign=\"top\" class=\"leftvalue\">" . $strings["owner"] . " :</td><td>" . buildLink("../users/viewuser.php?id=" . $fileDetail->mat_mem_id[0], $fileDetail->mat_mem_name[0], LINK_INSIDE) . " (" . buildLink($fileDetail->mat_mem_email_work[0], $fileDetail->mat_mem_login[0], LINK_MAIL) . ")</td></tr>";

if ($fileDetail->mat_comments[0] != "") {
    echo "<tr class=\"odd\"><td valign=\"top\" class=\"leftvalue\">" . $strings["comments"] . " :</td><td>" . nl2br($fileDetail->mat_comments[0]) . "&nbsp;</td></tr>";
} 

$idPublish = $fileDetail->mat_published[0];
echo "<tr class=\"odd\"><td valign=\"top\" class=\"leftvalue\">" . $strings["published"] . " :</td><td>$statusPublish[$idPublish]</td></tr>";

$idStatus = $fileDetail->mat_status[0];
echo "<tr class=\"odd\"><td valign=\"top\" class=\"leftvalue\">" . $strings["approval_tracking"] . " :</td><td>$statusFile[$idStatus]</td></tr>";

if ($fileDetail->mat_mem2_id[0] != "") {
    echo "<tr class=\"odd\"><td valign=\"top\" class=\"leftvalue\">" . $strings["approver"] . " :</td><td>" . buildLink("../users/viewuser.php?id=" . $fileDetail->mat_mem2_id[0], $fileDetail->mat_mem2_name[0], LINK_INSIDE) . " (" . buildLink($fileDetail->mat_mem2_email_work[0], $fileDetail->mat_mem2_login[0], LINK_MAIL) . ")&nbsp;</td></tr>";
    echo "<tr class=\"odd\"><td valign=\"top\" class=\"leftvalue\">" . $strings["approval_date"] . " :</td><td>" . $fileDetail->mat_date_approval[0] . "&nbsp;</td></tr>";
} 

if ($fileDetail->mat_comments_approval[0] != "") {
    echo "<tr class=\"odd\"><td valign=\"top\" class=\"leftvalue\">" . $strings["approval_comments"] . " :</td><td>" . nl2br($fileDetail->mat_comments_approval[0]) . "&nbsp;</td></tr>";
} 
// ------------------------------------------------------------------
$tmpquery = "WHERE mat.id = '$id' OR mat.vc_parent = '$id' AND mat.vc_status = '3' ORDER BY mat.date DESC";
$listVersions = new request();
$listVersions->openMeetingsAttachment($tmpquery);
$comptListVersions = count($listVersions->mat_vc_parent);

echo"<tr class=\"odd\"><td valign=\"top\" class=\"leftvalue\">" . $strings["ifc_version_history"] . " :</td><td>

<table width=\"600\" cellpadding=\"0\" cellspacing=\"0\" class=\"tableRevision\">";

for ($i = 0;$i < $comptListVersions;$i++) {
    // Sort odds and evens for bg color
    if ($i == "0") {
        $class = "new";
    } else {
        $class = "old";
    } 
    echo "<tr class=\"$class\"><td>";
    if ($fileDetail->mat_owner[0] == $_SESSION['idSession'] && $listVersions->mat_id[$i] != $fileDetail->mat_id[0]) {
        echo "<a href=\"javascript:MM_toggleItem(document." . $block1->form . "Form, '" . $listVersions->mat_id[$i] . "', '" . $block1->form . "cb" . $listVersions->mat_id[$i] . "','" . THEME . "')\"><img name=\"" . $block1->form . "cb" . $listVersions->mat_id[$i] . "\" border=\"0\" src=\"../themes/" . THEME . "/checkbox_off_16.gif\" alt=\"\" vspace=\"0\"></a>";
    } 
    echo"&nbsp;</td>

	<td>" . $strings["vc_version"] . " : " . $listVersions->mat_vc_version[$i] . "</td>
	<td colspan=\"3\">$displayname&nbsp;&nbsp;";

    if (file_exists("../files/" . $listVersions->mat_project[$i] . "/meetings/" . $listVersions->mat_meeting[$i] . "/" . $listVersions->mat_name[$i])) {
        echo buildLink("../meetings/accessfile.php?mode=view&amp;id=" . $listVersions->mat_id[$i], $strings["view"], LINK_INSIDE);
        $folder = $listVersions->mat_project[$i] . "/meetings/" . $listVersions->mat_meeting[$i];
        $existFile = "true";
    } 
    if ($existFile == "true") {
        echo " " . buildLink("../meetings/accessfile.php?mode=download&amp;id=" . $listVersions->mat_id[$i], $strings["save"], LINK_INSIDE);
    } else {
        echo $strings["missing_file"];
    } 

    echo"</td><td>" . $strings["date"] . " : " . $listVersions->mat_date[$i] . "</td></tr>";
    if ($listVersions->mat_mem2_id[$i] != "" || $listVersions->mat_comments_approval[$i] != "") {
        $idStatus = $listVersions->mat_status[$i];
        echo "<tr class=\"$class\"><td>&nbsp;</td><td colspan=5>";
        if ($listVersions->mat_mem2_id[$i] != "") {
            echo $strings["approver"] . " : " . buildLink("../users/viewuser.php?id=" . $listVersions->mat_mem2_id[$i], $listVersions->mat_mem2_name[$i], LINK_INSIDE) . " (" . buildLink($listVersions->mat_mem2_email_work[$i], $listVersions->mat_mem2_login[$i], LINK_MAIL) . ")<br>
" . $strings["approval_tracking"] . " :$statusFile[$idStatus]<br>";
            echo $strings["approval_date"] . " : " . $listVersions->mat_date_approval[$i] . "&nbsp;";
        } 
        if ($listVersions->mat_comments_approval[$i] != "") {
            echo "<br>" . $strings["approval_comments"] . " : " . nl2br($listVersions->mat_comments_approval[$i]) . "&nbsp;";
        } 
        echo "</td></tr>";
    } 
} 
echo"</table></td></tr>";
// ------------------------------------------------------------------
$block1->closeContent();
$block1->headingForm_close();
$block1->closeFormResults();

if ($fileDetail->mat_owner[0] == $_SESSION['idSession']) {
    $block1->openPaletteScript();
    $block1->paletteScript(0, "remove", "../meetings/deletefiles.php?project=" . $fileDetail->mat_project[0] . "&meeting=" . $fileDetail->mat_meeting[0] . "&sendto=filedetails", "false,true,true", $strings["ifc_delete_version"]);
    $block1->paletteScript(1, "add_projectsite", "../meetings/viewfile.php?addToSiteFile=true&file=" . $fileDetail->mat_id[0] . "&action=publish", "true,true,true", $strings["add_project_site"]);
    $block1->paletteScript(2, "remove_projectsite", "../meetings/viewfile.php?removeToSiteFile=true&file=" . $fileDetail->mat_id[0] . "&action=publish", "true,true,true", $strings["remove_project_site"]);
    $block1->closePaletteScript($comptFileDetail, $fileDetail->mat_id);
} 

if ($peerReview == "true") {
    // Revision list block
    $block2 = new block();

    $block2->form = "tdC";
    $block2->openForm("../meetings/viewfile.php?id=$id#" . $block2->form . "Anchor");
    $block2->heading($strings["ifc_revisions"]);

    if ($fileDetail->mat_owner[0] == $_SESSION['idSession']) {
        $block2->openPaletteIcon();
        $block2->paletteIcon(0, "remove", $strings["ifc_delete_review"]);
        $block2->closePaletteIcon();
    } 

    if ($error2 != "") {
        $block2->headingError($strings["errors"]);
        $block2->contentError($error2);
    } 
    $block2->openContent();
    $block2->contentTitle($strings["details"]);
    echo"<tr class=\"odd\"><td valign=\"top\" class=\"leftvalue\"></td><td><br>";

    $tmpquery = "WHERE mat.vc_parent = '$id' AND mat.vc_status != '3' ORDER BY mat.date";
    $listReviews = new request();
    $listReviews->openMeetingsAttachment($tmpquery);
    $comptListReviews = count($listReviews->mat_vc_parent);
    for ($i = 0;$i < $comptListReviews;$i++) {
        // Sort odds and evens for bg color
        if (!($i % 2)) {
            $class = "odd";
            $highlightOff = $oddColor;
        } else {
            $class = "even";
            $highlightOff = $evenColor;
        } 
        // Calculate a revision number for display for each listing
        $displayrev = $i + 1;

        echo "<table width=\"600\" cellpadding=\"0\" cellspacing=\"0\" class=\"tableRevision\" onmouseover=\"this.style.backgroundColor='" . $block2->highlightOn . "'\" onmouseout=\"this.style.backgroundColor='" . $block2->highlightOff . "'\">
	<tr bgcolor=\"" . $block2->fgColor . "\"><td>";
        if ($fileDetail->mat_owner[0] == $_SESSION['idSession']) {
            echo"<a href=\"javascript:MM_toggleItem(document." . $block2->form . "Form, '" . $listReviews->mat_id[$i] . "', '" . $block2->form . "cb" . $listReviews->mat_id[$i] . "','" . THEME . "')\"><img name=\"" . $block2->form . "cb" . $listReviews->mat_id[$i] . "\" border=\"0\" src=\"../themes/" . THEME . "/checkbox_off_16.gif\" alt=\"\" vspace=\"0\"></a>";
        } 
        echo"&nbsp;</td>
	<td colspan=\"3\">$displayname&nbsp;&nbsp;";
        if (file_exists("../files/" . $listReviews->mat_project[$i] . "/meetings/" . $listReviews->mat_meeting[$i] . "/" . $listReviews->mat_name[$i])) {
            echo buildLink("../meetings/accessfile.php?mode=view&amp;id=" . $listReviews->mat_id[$i], $strings["view"], LINK_INSIDE);
            $folder = $listReviews->mat_project[$i] . "/meetings/" . $listReviews->mat_meeting[$i];
            $existFile = "true";
        } 
        if ($existFile == "true") {
            echo " " . buildLink("../meetings/accessfile.php?mode=download&amp;id=" . $listReviews->mat_id[$i], $strings["save"], LINK_INSIDE);
        } else {
            echo $strings["missing_file"];
        } 
        echo"</td><td align=\"right\">Revision: $displayrev&nbsp;&nbsp;</td></tr>
	<tr><td>&nbsp;</td><td width=\"30%\">" . $strings["ifc_revision_of"] . " : " . $listReviews->mat_vc_version[$i] . "</td><td width=\"40%\">" . $strings["owner"] . " : " . $listReviews->mat_mem_name[$i] . "</td><td colspan=\"2\" align=\"left\" width=\"30%\">" . $strings["date"] . " : " . $listReviews->mat_date[$i] . "</td></tr>
	<tr><td>&nbsp;</td><td colspan=\"4\">" . $strings["comments"] . " : " . $listReviews->mat_comments[$i] . "</td></tr>
	</table><br>";
    } 
    if ($i == 0) {
        echo"<tr class=\"odd\"><td></td><td>" . $strings["ifc_no_revisions"] . "</td></tr>";
    } 
    echo"</table></td></tr>";

    $block2->closeContent();
    $block2->headingForm_close();
    $block2->closeFormResults();
    if ($fileDetail->mat_owner[0] == $_SESSION['idSession']) {
        $block2->openPaletteScript();
        $block2->paletteScript(0, "remove", "../meetings/deletefiles.php?project=" . $fileDetail->mat_project[0] . "&meeting=" . $fileDetail->mat_meeting[0] . "&sendto=filedetails", "false,true,true", $strings["ifc_delete_review"]);
        $block2->closePaletteScript($comptListReviews, $listReviews->mat_id);
    } 

    if ($teamMember == "true" || $_SESSION['profilSession'] == "5") {
        // Add new revision Block
        $block3 = new block();
        $block3->form = "filedetails";
        echo "<a name=\"filedetailsAnchor\"></a>";
        echo "<form accept-charset=\"UNKNOWN\" method=\"POST\" action=\"../meetings/viewfile.php?action=add&amp;id=" . $fileDetail->mat_id[0] . "#filedetailsAnchor\" name=\"filedetailsForm\" enctype=\"multipart/form-data\"><input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"100000000\"><input type=\"hidden\" name=\"maxCustom\" value=\"" . $projectDetail->pro_upload_max[0] . "\">";
        if ($error3 != "") {
            $block3->headingError($strings["errors"]);
            $block3->contentError($error3);
        } 
        $block3->headingForm($strings["ifc_add_revision"]);
        $block3->openContent();
        $block3->contentTitle($strings["details"]);
        // Add one to the number of current revisions
        $revision = $displayrev + 1;

        echo "
<input value=\"" . $fileDetail->mat_id[0] . "\" name=\"sendto\" type=\"hidden\">
<input value=\"" . $fileDetail->mat_id[0] . "\" name=\"parent\" type=\"hidden\">
<input value=\"$revision\" name=\"revision\" type=\"hidden\">
<input value=\"" . $fileDetail->mat_vc_version[0] . "\" name=\"oldversion\" type=\"hidden\">
<input value=\"" . $fileDetail->mat_project[0] . "\" name=\"project\" type=\"hidden\">
<input value=\"" . $fileDetail->mat_meeting[0] . "\" name=\"meeting\" type=\"hidden\">
<input value=\"" . $fileDetail->mat_published[0] . "\" name=\"published\" type=\"hidden\">
<input value=\"" . $fileDetail->mat_name[0] . "\" name=\"filename\" type=\"hidden\">

<tr class=\"odd\"><td valign=\"top\" class=\"leftvalue\">* " . $strings["upload"] . " :</td><td><input size=\"44\" style=\"width: 400px\" name=\"upload\" type=\"FILE\"></td></tr>
<tr class=\"odd\"><td valign=\"top\" class=\"leftvalue\">" . $strings["comments"] . " :</td><td><textarea rows=\"3\" style=\"width: 400px; height: 50px;\" name=\"c\" cols=\"43\">$c</textarea></td></tr>
<tr class=\"odd\"><td valign=\"top\" class=\"leftvalue\">&nbsp;</td><td><input type=\"SUBMIT\" value=\"" . $strings["save"] . "\"></td></tr>";

        $block3->closeContent();
        $block3->headingForm_close();
        $block3->closeFormResults();
    } 
} 
// Update file Block
if ($fileDetail->mat_owner[0] == $_SESSION['idSession']) {
    $block4 = new block();

    $block4->form = "filedetails";
    echo "<a name=\"filedetailsAnchor\"></a>";
    echo "<form accept-charset=\"UNKNOWN\" method=\"POST\" action=\"../meetings/viewfile.php?action=update&amp;id=" . $fileDetail->mat_id[0] . "#filedetailsAnchor\" name=\"filedetailsForm\" enctype=\"multipart/form-data\"><input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"100000000\"><input type=\"hidden\" name=\"maxCustom\" value=\"" . $projectDetail->pro_upload_max[0] . "\">";

    if ($error4 != "") {
        $block4->headingError($strings["errors"]);
        $block4->contentError($error4);
    } 

    $block4->headingForm($strings["ifc_update_file"]);

    $block4->openContent();
    $block4->contentTitle($strings["details"]);

    echo"
	<tr class=\"odd\"><td valign=\"top\" class=\"leftvalue\"></td><td class=\"odd\">" . $strings["version_increm"] . "<br>
	<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
	<tr><td align=\"right\">0.01</td><td width=\"30\" align=\"right\"><input name=\"change_file_version\" type=\"radio\" value=\"0.01\"></td></tr>
	<tr><td align=\"right\">0.1</td><td width=\"30\" align=\"right\"><input name=\"change_file_version\" type=\"radio\" value=\"0.1\" checked></td></tr>
	<tr><td align=\"right\">1.0</td><td width=\"30\" align=\"right\"><input name=\"change_file_version\" type=\"radio\" value=\"1.0\"></td></tr>
	</table>
	</td></tr>";

    echo "<tr class=\"odd\"><td valign=\"top\" class=\"leftvalue\">" . $strings["status"] . " :</td><td><select name=\"statusField\">";
    $comptSta = count($statusFile);

    for ($i = 0;$i < $comptSta;$i++) {
        if ($i == "2") {
            echo "<option value=\"$i\" selected>$statusFile[$i]</option>";
        } else {
            echo "<option value=\"$i\">$statusFile[$i]</option>";
        } 
    } 
    echo"</select></td></tr>";
    echo"<tr class=\"odd\"><td valign=\"top\" class=\"leftvalue\">* " . $strings["upload"] . " :</td><td><input size=\"44\" style=\"width: 400px\" name=\"upload\" type=\"FILE\"></td></tr>
	<tr class=\"odd\"><td valign=\"top\" class=\"leftvalue\">" . $strings["comments"] . " :</td><td><textarea rows=\"3\" style=\"width: 400px; height: 50px;\" name=\"c\" cols=\"43\">$c</textarea></td></tr>
	<tr class=\"odd\"><td valign=\"top\" class=\"leftvalue\">&nbsp;</td><td><input type=\"SUBMIT\" value=\"" . $strings["ifc_update_file"] . "\"></td></tr>";

    $block4->closeContent();
    $block4->headingForm_close();
    $block4->closeFormResults();
} 
require_once("../themes/" . THEME . "/footer.php");

?>
