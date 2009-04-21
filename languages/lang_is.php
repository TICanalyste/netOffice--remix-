<?php // $Revision: 1.1.1.1 $
/* vim: set expandtab ts=4 sw=4 sts=4: */

/**
 * $Id: lang_is.php,v 1.1.1.1 2004/11/02 03:30:24 madbear Exp $
 * 
 * Copyright (c) 2003 by the NetOffice developers
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 */
// translator(s): Jonas Sig (jonas@nasaweb.net)
$setCharset = "ISO-8859-1";

$byteUnits = array('B�ti', 'KB', 'MB', 'GB');

$dayNameArray = array(1 => "M�nudagur", 2 => "�ri�judagur", 3 => "Mi�vikudagur", 4 => "Fimmtudagur", 5 => "F�studagur", 6 => "Laugardagur", 7 => "Sunnudagur");

$monthNameArray = array(1 => "Jan�ar", "Febr�ar", "Mars", "Apr�l", "Ma�", "J�n�", "J�l�", "�g�st", "September", "Okt�ber", "N�vember", "Desember");

$status = array(0 => "Vi�skiptaa�ila loka�", 1 => "Loki�", 2 => "Ekki byrja�", 3 => "Opi�", 4 => "Afl�st");

$profil = array(0 => "Umsj�narma�ur", 1 => "Verkefnisstj�ri", 2 => "Notandi", 3 => "Vi�skiptama�ur");

$priority = array(0 => "Engin forgangur", 1 => "Mj�g l�till forgangur", 2 => "L�till forgangur", 3 => "Mi�lungs", 4 => "Mikilv�gt", 5 => "Mj�g mikilv�gt");

$statusTopic = array(0 => "Loka�", 1 => "Opi�");
$statusTopicBis = array(0 => "J�", 1 => "Nei");

$statusPublish = array(0 => "J�", 1 => "Nei");

$statusFile = array(0 => "Sam�ykkt", 1 => "Sam�ykkt me� breytingum", 2 => "�arfnast sam�ykktar", 3 => "�arf ekki sam�ykki", 4 => "Ekki sam�ykkt");

$phaseStatus = array(0 => "Ekki hafi�", 1 => "Opi�", 2 => "Loki�", 3 => "Afl�st");

$requestStatus = array(0 => "N�", 1 => "Opin", 2 => "Loka�");

$strings["please_login"] = "Skr��u �ig inn";
$strings["requirements"] = "Kr�fur kerfisins";
$strings["login"] = "Innskr�ning";
$strings["no_items"] = "Engin g�gn til a� birta";
$strings["logout"] = "�tskr�ning";
$strings["preferences"] = "Stillingar";
$strings["my_tasks"] = "Verkin m�n";
$strings["edit_task"] = "Breyta verki";
$strings["copy_task"] = "Afrita verk";
$strings["add_task"] = "Skr� n�tt verk";
$strings["delete_tasks"] = "Ey�a verki";
$strings["assignment_history"] = "Saga �thlutuna";
$strings["assigned_on"] = "�thluta�";
$strings["assigned_by"] = "�thluta� af";
$strings["to"] = "Til";
$strings["comment"] = "Athugasemd";
$strings["task_assigned"] = "Verki �thluta� �";
$strings["task_unassigned"] = "Verki ekki �thluta�";
$strings["edit_multiple_tasks"] = "Breyta m�rgum verkum";
$strings["tasks_selected"] = "Verk vali�. Veldu n� gildi fyrir �essi verk e�a veldu [Breyta engu] til a� halda fyrri gildum.";
$strings["assignment_comment"] = "�thluta athugasemd";
$strings["no_change"] = "[Breyta engu]";
$strings["my_discussions"] = "Umr��urnar m�nar";
$strings["discussions"] = "Umr��ur";
$strings["delete_discussions"] = "Ey�a umr��um";
$strings["delete_discussions_note"] = "ATH: Umr��a getur ekki veri� opnu� aftur eftir a� henni hefur veri� eytt.";
$strings["topic"] = "Umr��a";
$strings["posts"] = "Skilabo�";
$strings["latest_post"] = "N�justu skilabo�";
$strings["my_reports"] = "Sk�rslurnar m�nar";
$strings["reports"] = "Sk�rslur";
$strings["create_report"] = "B�a til sk�rslu";
$strings["report_intro"] = "Settu saman sk�rsluna me� �v� a� velja forsendur h�r og vista�u s��an sk�rsluna eftir a� hafa sko�a� ni�urst��ur keyrslunnar.";
$strings["admin_intro"] = "Stillingar verkefna og eiginleikar.";
$strings["copy_of"] = "Afrit af ";
$strings["add"] = "Skr�";
$strings["delete"] = "Ey�a";
$strings["remove"] = "Fjarl�gja";
$strings["copy"] = "Afrita";
$strings["view"] = "Sko�a";
$strings["edit"] = "Breyta";
$strings["update"] = "Uppf�ra";
$strings["details"] = "N�nar";
$strings["none"] = "�skilgreint";
$strings["close"] = "Loka";
$strings["new"] = "N�tt";
$strings["select_all"] = "Velja allt";
$strings["unassigned"] = "Ekki �thluta�";
$strings["administrator"] = "Umsj�narma�ur";
$strings["my_projects"] = "Verkefnin m�n";
$strings["project"] = "Verkefni";
$strings["active"] = "Virk";
$strings["inactive"] = "�virk";
$strings["project_id"] = "Einkennisn�mer";
$strings["edit_project"] = "Breyta verkefni";
$strings["copy_project"] = "Afrita verkefni";
$strings["add_project"] = "Skr� verkefni";
$strings["clients"] = "Vi�skiptaa�ilar";
$strings["organization"] = "Vi�skiptaa�ili";
$strings["client_projects"] = "Verkefni vi�skiptaa�ila";
$strings["client_users"] = "Tengili�ir vi�skiptaa�ila";
$strings["edit_organization"] = "Breyta vi�skiptaa�ila";
$strings["add_organization"] = "Skr� vi�skiptaa�ila";
$strings["organizations"] = "Vi�skiptaa�ilar";
$strings["info"] = "Uppl�singar";
$strings["status"] = "Sta�a";
$strings["owner"] = "Eigandi";
$strings["home"] = "Heim";
$strings["projects"] = "Verkefni";
$strings["files"] = "Skr�r";
$strings["search"] = "Leit";
$strings["admin"] = "Ums�sla";
$strings["user"] = "Notandi";
$strings["project_manager"] = "Verkefnisstj�ri";
$strings["due"] = "Eindagi";
$strings["task"] = "Verk";
$strings["tasks"] = "Verk";
$strings["team"] = "Vinnuh�pur";
$strings["add_team"] = "B�ta notanda � vinnuh�p";
$strings["team_members"] = "Me�limir vinnuh�ps";
$strings["full_name"] = "Fullt nafn";
$strings["title"] = "Titill";
$strings["user_name"] = "Notendanafn";
$strings["work_phone"] = "Vinnus�mi";
$strings["priority"] = "Forgangur";
$strings["name"] = "Nafn";
$strings["id"] = "Einkenni";
$strings["description"] = "L�sing";
$strings["phone"] = "S�mi";
$strings["url"] = "Vefsl��";
$strings["address"] = "Heimilisfang";
$strings["comments"] = "Athugasemdir";
$strings["created"] = "Skr�� �ann";
$strings["assigned"] = "�thluta�";
$strings["modified"] = "Uppf�rt";
$strings["assigned_to"] = "�thluta� �";
$strings["due_date"] = "Lokadagsetning";
$strings["estimated_time"] = "��tla�ur t�mafj�ldi";
$strings["actual_time"] = "Endanlegur t�mafj�ldi";
$strings["delete_following"] = "Ey�a eftirfarandi?";
$strings["cancel"] = "Afl�sa";
$strings["and"] = "og";
$strings["administration"] = "Ums�sla";
$strings["user_management"] = "Ums�sla notenda";
$strings["system_information"] = "Uppl�singar kerfis";
$strings["product_information"] = "Uppl�singar um kerfi�";
$strings["system_properties"] = "Uppl�singar um umhverfi kerfis";
$strings["create"] = "Skr�";
$strings["report_save"] = "Vista �essa sk�rslu � heimas��u ��na svo �� getir keyrt hafa aftur s��ar.";
$strings["report_name"] = "Nafn sk�rslu";

$strings["save"] = "Vista";
$strings["matches"] = "Ni�urst��ur";
$strings["match"] = "Ni�ursta�a";
$strings["report_results"] = "Ni�urst��ur sk�rslu";
$strings["success"] = "A�ger� t�kst";
$strings["addition_succeeded"] = "Skr�ning t�kst";
$strings["deletion_succeeded"] = "Ey�ing t�kst";
$strings["report_created"] = "Sk�rsla skr��";
$strings["deleted_reports"] = "Sk�rslu eytt";
$strings["modification_succeeded"] = "Breytingar skr��ar";
$strings["errors"] = "Villa kom upp!";
$strings["blank_user"] = "Notandi fannst ekki.";
$strings["blank_organization"] = "Fyrirt�ki vi�skiptaa�ila fannst ekki.";
$strings["blank_project"] = "Verkefni� fannst ekki.";
$strings["user_profile"] = "Uppl�singar notanda";
$strings["change_password"] = "Breyta a�gangsor�i";
$strings["change_password_user"] = "Breyta a�gangsor�i notanda.";
$strings["old_password_error"] = "Upprunalega a�gangsor�i� sem �� sl�st inn er ekki r�tt. Vinsamlega sl�i� aftur inn upprunalegt a�gangsor�.";
$strings["new_password_error"] = "A�gangsor�i� tv� sem �� sl�st inn eru ekki eins, vinsamlega sl�i� aftur inn �tt a�gangsor�.";
$strings["notifications"] = "Tilkynningar";
$strings["change_password_intro"] = "Sl��u inn upprunalegt a�gangsor�i� og s��an inn n�tt a�gangsor�.";
$strings["old_password"] = "Upprunalegt a�gangsor�";
$strings["password"] = "A�gangsor�";
$strings["new_password"] = "N�tt a�gangsor�";
$strings["confirm_password"] = "Sta�festa a�gangsor�";
$strings["email"] = "P�stfang (e-mail)";
$strings["home_phone"] = "Heimas�mi";
$strings["mobile_phone"] = "Fars�mi";
$strings["fax"] = "Fax";
$strings["permissions"] = "Heimildir";
$strings["administrator_permissions"] = "Heimildir umsj�narmanns";
$strings["project_manager_permissions"] = "Heimildir verkefnisstj�ra";
$strings["user_permissions"] = "Heimildir notanda";
$strings["account_created"] = "Notandi skr��ur";
$strings["edit_user"] = "Breyta notanda";
$strings["edit_user_details"] = "Breyta skr�ningu notanda.";
$strings["change_user_password"] = "Breyta a�gangsor�i notanda.";
$strings["select_permissions"] = "Skr� heimildir notanda";
$strings["add_user"] = "Skr� notanda";
$strings["enter_user_details"] = "Skr��u n�nari uppl�singar notanda.";
$strings["enter_password"] = "Sl��u inn a�gangsor� notanda.";
$strings["success_logout"] = "�� hefur aftengst kerfinu. �� getur tengst aftur me� �v� a� sl� inn notendanafn og a�gangsor� h�r a� ne�an";
$strings["invalid_login"] = "Notendanafn og/e�a a�gangsor� stenst ekki. Vinsamlega reyni� aftur.";
$strings["profile"] = "Uppl�singar notanda";
$strings["user_details"] = "Skr��u n�nari uppl�singar notanda.";
$strings["edit_user_account"] = "Breyta uppl�singum ��num.";
$strings["no_permissions"] = "�� hefur ekki n�gar heimildir til a� framkv�ma �essa a�ger�.";
$strings["discussion"] = "Umr��a";
$strings["retired"] = "Loki�";
$strings["last_post"] = "S��ustu skilabo�";
$strings["post_reply"] = "Svara skilabo�um";
$strings["posted_by"] = "Sent af";
$strings["when"] = "Hven�r";
$strings["post_to_discussion"] = "Taka ��tt � umr��u";
$strings["message"] = "Skilabo�";
$strings["delete_reports"] = "Ey�a sk�rslum";
$strings["delete_projects"] = "Ey�a verkefnum";
$strings["delete_organizations"] = "Ey�a fyrirt�kjum vi�skiptaa�ila";
$strings["delete_organizations_note"] = "ATH: �essi a�ger� mun ey�a �llum tengili�um vi�skiptaa�ila og aftengja �ll opin verkefni hans.";
$strings["delete_messages"] = "Ey�a skeytum";
$strings["attention"] = "ATH";
$strings["delete_teamownermix"] = "A�ger� t�kst en eigandi verkefnis getur ekki veri� skr��ur �r vinnuh�p verkefnisins.";
$strings["delete_teamowner"] = "Ekki er h�gt a� fjarl�gja eiganda verkefnir �r vinnuh�p verkefnis.";
$strings["enter_keywords"] = "Sl��u inn leitaror�";
$strings["search_options"] = "Upphaf leitar";
$strings["search_note"] = "�� ver�ur a� sl� inn leitaror�.";
$strings["search_results"] = "Ni�urst��ur leitar";
$strings["users"] = "Notendur";
$strings["search_for"] = "Leitaror�";
$strings["results_for_keywords"] = "Ni�urst��ur leitar eftir leitaror�um";

$strings["add_discussion"] = "Skr� umr��u";
$strings["delete_users"] = "Ey�a notendum";
$strings["reassignment_user"] = "Endur�thluta verkefnum og verkum";
$strings["there"] = "�a� eru";
$strings["owned_by"] = "sem ofangreindir notendur eiga.";
$strings["reassign_to"] = "��ur en notendum er eytt skal endur�thluta �";
$strings["no_files"] = "Engar tengdar skr�r";
$strings["published"] = "Birt";
$strings["project_site"] = "S��a verkefnis";
$strings["approval_tracking"] = "Sam�ykktir";
$strings["size"] = "St�r�";
$strings["add_project_site"] = "B�ta vi� s��u verkefnis";
$strings["remove_project_site"] = "Fjarl�gja af s��u verkefnis";
$strings["more_search"] = "Fleiri leitarm�guleikar";
$strings["results_with"] = "Leitarni�ust��ur me�";
$strings["search_topics"] = "Leit eftir efnisflokkum";
$strings["search_properties"] = "Leit eftir eiginleikum";
$strings["date_restrictions"] = "Leit eftir dagsetningum";
$strings["case_sensitive"] = "Fylgja h�st�fum/l�gst�fum";
$strings["yes"] = "J�";
$strings["no"] = "Nei";
$strings["sort_by"] = "Ra�a eftir";
$strings["type"] = "Tegund";
$strings["date"] = "Dagsetning";
$strings["all_words"] = "�ll �essi or�";
$strings["any_words"] = "Eitt e�a fleiri or�";
$strings["exact_match"] = "N�kv�m samsv�run";
$strings["all_dates"] = "Allar dagsetningar";
$strings["between_dates"] = "Milli dagsetninga";
$strings["all_content"] = "Allt efni";
$strings["all_properties"] = "Allir eiginleikar";
$strings["no_results_search"] = "Leit skila�i engum ni�urst��um.";
$strings["no_results_report"] = "Leit skila�i engum ni�urst��um.";
$strings["schema_date"] = "YYYY/MM/DD";
$strings["hours"] = "klst";
$strings["choice"] = "Velja";
$strings["missing_file"] = "Skr� vantar !";
$strings["project_site_deleted"] = "S��u verkefnis hefur veri� eytt.";
$strings["add_user_project_site"] = "Notandi hefur fengi� heimildir til a� n�lgast s��u verkefnis.";
$strings["remove_user_project_site"] = "Heimildir notanda fjarl�g�ar.";
$strings["add_project_site_success"] = "Skr�ning efnist � s��u verkefnis t�kst.";
$strings["remove_project_site_success"] = "Efni hefur veri� teki� af s��u verkefnis.";
$strings["add_file_success"] = "1 skr� tengd.";
$strings["delete_file_success"] = "Aftenging t�kst.";
$strings["update_comment_file"] = "Athugasemd skr�ar var uppf�r�.";
$strings["session_false"] = "Villa � tengingu (Session)";
$strings["logs"] = "Notkunarskr�ning";
$strings["logout_time"] = "�tskr� sj�lfkrafa";
$strings["noti_foot1"] = "�essi tilkynning er send af PhpCollab.";
$strings["noti_foot2"] = "Til a� tengjast ��num a�gangi a� kerfinu smelltu �:";
$strings["noti_taskassignment1"] = "N�tt verk:";
$strings["noti_taskassignment2"] = "��r hefur veri� �thluta� n�ju verki:";
$strings["noti_moreinfo"] = "Frekari uppl�singar:";
$strings["noti_prioritytaskchange1"] = "Breytingar � forgangi verks:";
$strings["noti_prioritytaskchange2"] = "Forgangur eftirfarandi verka hefur veri� breytt:";
$strings["noti_statustaskchange1"] = "Breyting � st��u verka:";
$strings["noti_statustaskchange2"] = "Sta�a eftirfarandi verka hefur breyst:";
$strings["login_username"] = "�� ver�ur a� sl� inn notendanafn.";
$strings["login_password"] = "Sl��u inn lykilor�.";
$strings["login_clientuser"] = "�etta er a�gangur vi�skiptamanna, �� getur ekki tengst h�pvinnukerfi me� a�gangi vi�skiptamanna.";
$strings["user_already_exists"] = "�a� er �egar skr��ur notandi me� �etta nafn, vinsamlega skr��u notanda me� breyttu notendanafni.";
$strings["noti_duedatetaskchange1"] = "Eindagi verks hefur breyst:";
$strings["noti_duedatetaskchange2"] = "Eindagi eftirfarandi verka hefur breyst:";
$strings["company"] = "Fyrit�ki";
$strings["show_all"] = "S�na allt";
$strings["information"] = "Uppl�singar";
$strings["delete_message"] = "Ey�a �essum skilabo�um";
$strings["project_team"] = "Vinnuh�pur verkefnis";
$strings["document_list"] = "Skr�r";
$strings["bulletin_board"] = "Umr��ur";
$strings["bulletin_board_topic"] = "Efni umr��u";
$strings["create_topic"] = "Skr� n�ja umr��u";
$strings["topic_form"] = "Skr�ning umr��u";
$strings["enter_message"] = "Skr��u skilabo� ��n";
$strings["upload_file"] = "Vista skr�";
$strings["upload_form"] = "Skr�ning efnis";
$strings["upload"] = "Skr� til uppf�rslu";
$strings["document"] = "Skj�l";
$strings["approval_comments"] = "Athugasemdir sam�ykktar";
$strings["client_tasks"] = "Verk vi�skiptaa�ila";
$strings["team_tasks"] = "Verk vinnuh�ps";
$strings["team_member_details"] = "N�nar um me�limi vinnuh�ps verkefnis";
$strings["client_task_details"] = "N�nar um verk vi�skiptaa�ila";
$strings["team_task_details"] = "N�nar um verk vinnuh�ps";
$strings["language"] = "Tungum�l";
$strings["welcome"] = "Velkomin(n)";
$strings["your_projectsite"] = "� verkefniss��u ��na";
$strings["contact_projectsite"] = "Ef �� hefur einhverjar spurningar var�andi kerfi� e�a uppl�singar �essarar s��u, haf�u samband vi� verkefnisstj�ra";
$strings["company_details"] = "N�nar um fyrirt�ki";
$strings["database"] = "�ryggisafritun gagnagrunns";
$strings["company_info"] = "Uppf�ra skr�ningu fyrirt�kis ��ns";
$strings["create_projectsite"] = "B�a til s��u verkefnis";
$strings["projectsite_url"] = "Veffang s��u verkefnis";
$strings["design_template"] = "�tlit";
$strings["preview_design_template"] = "Sko�a m�gulegt �tlit s��u";
$strings["delete_projectsite"] = "Ey�a s��u verkefnis";
$strings["add_file"] = "N� skr�";
$strings["linked_content"] = "Tengt efni";
$strings["edit_file"] = "breyta uppl�singum skr�ar";
$strings["permitted_client"] = "Leyf�ir notendur vi�skiptaa�ila";
$strings["grant_client"] = "Gefa a�gang a� s��u verkefnis";
$strings["add_client_user"] = "Skr� notanda vi�skiptaa�ila";
$strings["edit_client_user"] = "Breyta notanda vi�skiptaa�ila";
$strings["client_user"] = "Notandi vi�skiptaa�ila";
$strings["client_change_status"] = "Breytu st��u �inni a� ne�an eftir a� hafa loki� �essu verki";
$strings["project_status"] = "Sta�a verkefnis";
$strings["view_projectsite"] = "Sko�a s��u verkefnis";
$strings["enter_login"] = "Skr��u inn notendanafn �itt til a� f� n�tt a�gansor�";
$strings["send"] = "Sent";
$strings["no_login"] = "Notendanafn fannst ekki � kerfi";
$strings["email_pwd"] = "A�gangsor� sent";
$strings["no_email"] = "Notandi hefur ekki skr�� p�stfang";
$strings["forgot_pwd"] = "Gleymt a�gangsor� ?";
$strings["project_owner"] = "�� getur a�eins breytt ��num eigin verkefnum.";
$strings["connected"] = "Tengdur";
$strings["session"] = "Tenging (Session)";
$strings["last_visit"] = "S��asta heims�kn";
$strings["compteur"] = "Fj�ldi";
$strings["ip"] = "IP tala";
$strings["task_owner"] = "�� ert me�limur vinnuh�ps �essa verkefnis";
$strings["export"] = "�tskr�ning gagna";
$strings["browse_cvs"] = "Sko�a CVS";
$strings["repository"] = "CVS Gagnageymsla";
$strings["reassignment_clientuser"] = "Endur�thlutun verka";
$strings["organization_already_exists"] = "�etta nafn er �egar � noktun innan kerfisins, vinsamlega veldu anna� nafn � vi�skiptaa�ila.";
$strings["blank_organization_field"] = "�� ver�ur a� sl� inn nafn vi�skiptaa�ila.";
$strings["blank_fields"] = "Nau�synleg sv��i";
$strings["projectsite_login_fails"] = "Ekki t�kst a� sannreyna notendanafn/a�gangsor�.";
$strings["start_date"] = "Upphafsdagsetning";
$strings["completion"] = "Loki�";
$strings["update_available"] = "N�rri �tg�fa er til!";
$strings["version_current"] = "�� ert a� nota �tg�fu";
$strings["version_latest"] = "N�jasta �tg�fa er";
$strings["sourceforge_link"] = "Sko�a�u s��u kerfisins � sourceforge";
$strings["demo_mode"] = "Kerfi� er � s�ningarham, a�ger� ekki leyf�.";
$strings["setup_erase"] = "Eyddu skr�nni setup.php!!";
$strings["no_file"] = "Skr� �arf a� fylgja";
$strings["exceed_size"] = "St�r� yfir h�marksm�rkum skr�arst�r�ar";
$strings["no_php"] = "Php skr�r eru ekki leyf�ar";
$strings["approval_date"] = "Dagsetning sam�ykktar";
$strings["approver"] = "Sam�ykkt af";
$strings["error_database"] = "Get ekki tengst gagnagrunni";
$strings["error_server"] = "Get ekki tengst bakenda";
$strings["version_control"] = "�tg�fust�ring";
$strings["vc_status"] = "Sta�a";
$strings["vc_last_in"] = "S��ast breytt";
$strings["ifa_comments"] = "Athugasemdir sam�ykktar";
$strings["ifa_command"] = "Breyta st��u sam�ykktar";
$strings["vc_version"] = "�tg�fa";
$strings["ifc_revisions"] = "Umfjallanir";
$strings["ifc_revision_of"] = "Umfj�llun um �tg�fu";
$strings["ifc_add_revision"] = "Skr� umfj�llun";
$strings["ifc_update_file"] = "Uppf�ra skr�";
$strings["ifc_last_date"] = "S��ast breytt";
$strings["ifc_version_history"] = "�tg�fusaga";
$strings["ifc_delete_file"] = "Ey�a skr� �samt �llum �tg�fum og umfj�llunum";
$strings["ifc_delete_version"] = "Ey�a �tg�fum";
$strings["ifc_delete_review"] = "Ey�a umfj�llunum";
$strings["ifc_no_revisions"] = "�a� eru engar skr��ar �tg�fur af �essari skr�";
$strings["unlink_files"] = "�tengdar skr�r";
$strings["remove_team"] = "Fjarl�gja notendur �r vinnuh�pi";
$strings["remove_team_info"] = "Fjarl�gja �essa notendur �r vinnuh�pi?";
$strings["remove_team_client"] = "Fjarl�gja a�gangsheimildir a� verkefniss��u";
$strings["note"] = "Minnispunktur";
$strings["notes"] = "Minnispunktar";
$strings["subject"] = "Efni";
$strings["delete_note"] = "Ey�a minnispunkt";
$strings["add_note"] = "Skr� minnistpunkt";
$strings["edit_note"] = "breyta minnistpunkt";
$strings["version_increm"] = "Veldu �tg�fubreytingu:";
$strings["url_dev"] = "Vefsl�� � �r�un";
$strings["url_prod"] = "Vefsl�� verklok";
$strings["note_owner"] = "�� getur a�eins breytt eigin minnispunktum.";
$strings["alpha_only"] = "A�eins t�lu -og e�a b�kstafi � innskr�ningu";
$strings["edit_notifications"] = "Breyta tilkynningum";
$strings["edit_notifications_info"] = "Veldu �� atbur�i sem �� vilt f� senda tilkynningu um.";
$strings["select_deselect"] = "Velja/Afvelja allt";
$strings["noti_addprojectteam1"] = "Skr�� � vinnuh�p verkefnis :";
$strings["noti_addprojectteam2"] = "��r hefur veri� b�tt � vinnuh�p verkefnis :";
$strings["noti_removeprojectteam1"] = "�� hefur veri� skr��ur �r vinnuh�p verkefnis :";
$strings["noti_removeprojectteam2"] = "�� hefur veri� skr��ur �r vinnuh�p verkefnis :";
$strings["noti_newpost1"] = "N� skilabo� :";
$strings["noti_newpost2"] = "N� skilabo� hefa veri� skr�� � eftirfarandi umr��u :";
$strings["edit_noti_taskassignment"] = "�egar m�r hefur veri� �thluta� n�ju verki.";
$strings["edit_noti_statustaskchange"] = "�egar sta�a verka sem �g � breytist.";
$strings["edit_noti_prioritytaskchange"] = "�egar forgangur verka minna breytist.";
$strings["edit_noti_duedatetaskchange"] = "�egar lokadagsetning verka minna breytist.";
$strings["edit_noti_addprojectteam"] = "�egar m�r er b�tt � vinnuh�p verkefnis.";
$strings["edit_noti_removeprojectteam"] = "�egar �g er skr��ur �r vinnuh�pi verkefnis.";
$strings["edit_noti_newpost"] = "�egar n� skilabo� eru skr�� � umr��u.";
$strings["add_optional"] = "Frj�lst skr�ning";
$strings["assignment_comment_info"] = "Skr� athugasemd var�andi �thlutun �essa verks";
$strings["my_notes"] = "Minnispunktar m�nir";
$strings["edit_settings"] = "Breyta stillingum";
$strings["max_upload"] = "H�marksst�r� skr�a";
$strings["project_folder_size"] = "H�marksst�r� m�ppu verkefnis";
$strings["calendar"] = "Dagatal";
$strings["date_start"] = "Upphafsdagsetning";
$strings["date_end"] = "Lokadagsetning";
$strings["time_start"] = "Upphafst�mi";
$strings["time_end"] = "Lokat�mi";
$strings["calendar_reminder"] = "�minning";
$strings["shortname"] = "Stutt nafn";
$strings["calendar_recurring"] = "Endurtekur sig vikulega";
$strings["edit_database"] = "Breyta gagnagrunni";
$strings["noti_newtopic1"] = "N� umr��u :";
$strings["noti_newtopic2"] = "N� umr��a var skr� � eftirfarandi verkefni :";
$strings["edit_noti_newtopic"] = "N�r efnisflokkur umr��u var skr��ur.";
$strings["today"] = "N�verandi";
$strings["previous"] = "Fyrri";
$strings["next"] = "N�sti";
$strings["help"] = "Hj�lp";

$strings["complete_date"] = "Dags. loki�";
$strings["scope_creep"] = "Mism. ��tlunar";
$strings["days"] = "Dagar";
$strings["logo"] = "Logo";
$strings["remember_password"] = "Muna lykilor�";
$strings["client_add_task_note"] = "Note: The entered task is registered into the data base, appears here however only if it one assigned to a team member!";
$strings["client_add_task_note"] = "ATH: Verki� er skr�� � gagnagrunn en birtist a�eins ef �v� �thluta� � vinnuh�psme�lim!";
$strings["noti_clientaddtask1"] = "Verk skr�� af vi�skiptamanni :";
$strings["noti_clientaddtask2"] = "N�tt verk var skr�� af vi�skiptamanni � verkefniss��u � eftirfarandi verkefni :";
$strings["phase"] = "Verkstig";
$strings["phases"] = "Verkstig";
$strings["phase_id"] = "Einkenni Verkstigs";
$strings["current_phase"] = "Virkt verkstig";
$strings["total_tasks"] = "Fj�ldi verka";
$strings["uncomplete_tasks"] = "�lokin verk";
$strings["no_current_phase"] = "Ekkert verkstig er virkt";
$strings["true"] = "J�";
$strings["false"] = "Nei";
$strings["enable_phases"] = "Virkja verkstig";
$strings["phase_enabled"] = "Verkstig virk";
$strings["order"] = "R��";
$strings["options"] = "Stillingar";
$strings["support"] = "�j�nusta";
$strings["support_request"] = "�j�nustubei�ni";
$strings["support_requests"] = "�j�nustubei�nir";
$strings["support_id"] = "Einkenni �j�nustubei�ni";
$strings["my_support_request"] = "�j�nustubei�nir m�nar";
$strings["introduction"] = "Kynning";
$strings["submit"] = "Skr�";
$strings["support_management"] = "Vinna me� �j�nustubei�nir";
$strings["date_open"] = "Dags. opnu�";
$strings["date_close"] = "Dags. loka�";
$strings["add_support_request"] = "Skr� �j�nustubei�ni";
$strings["add_support_response"] = "Skr� svar vi� �j�nustubei�ni";
$strings["respond"] = "Svara";
$strings["delete_support_request"] = "�j�nustubei�ni eytt";
$strings["delete_request"] = "Ey�a �j�nustubei�ni";
$strings["delete_support_post"] = "Ey�a �j�nustuskilabo�um";
$strings["new_requests"] = "N� bei�ni";
$strings["open_requests"] = "Opna bei�nir";
$strings["closed_requests"] = "Lj�ka bei�ni";
$strings["manage_new_requests"] = "Vinna me� n�jar bei�nir";
$strings["manage_open_requests"] = "Vinna me� opnar bei�nir";
$strings["manage_closed_requests"] = "Vinna me� loka�ar bei�nir";
$strings["responses"] = "Sv�r";
$strings["edit_status"] = "Breyta st��u";
$strings["noti_support_request_new2"] = "�� hefur skr�� �j�nustubei�ni var�andi: ";
$strings["noti_support_post2"] = "N�tt svar hefur veri� skr�� � �j�nustubei�ni ��na. Sj� eftirfarandi uppl�singar.";
$strings["noti_support_status2"] = "�j�nustubei�ni ��n hefur veri� uppf�r�. Sj� eftirfarandi uppl�singar.";
$strings["noti_support_team_new2"] = "N� �j�nustubei�ni hefur veri� skr�� � verkefni: ";
// 2.0
$strings["delete_subtasks"] = "Ey�a undirverki";
$strings["add_subtask"] = "Skr� undirverk";
$strings["edit_subtask"] = "Breyta undirverki";
$strings["subtask"] = "Undirverk";
$strings["subtasks"] = "Undirverk";
$strings["show_details"] = "Sj� n�nar";
$strings["updates_task"] = "Saga verks";
$strings["updates_subtask"] = "Saga undirverks";
// 2.1
$strings["go_projects_site"] = "Sj� verkefniss��u";
$strings["bookmark"] = "Vefsl��";
$strings["bookmarks"] = "Vefsl��ir";
$strings["bookmark_category"] = "Flokkur";
$strings["bookmark_category_new"] = "N�r flokkur";
$strings["bookmarks_all"] = "Allar";
$strings["bookmarks_my"] = "Vefsl��irnar m�nar";
$strings["my"] = "M�nar";
$strings["bookmarks_private"] = "Fali� ��rum";
$strings["shared"] = "S�nilegt ��rum";
$strings["private"] = "Fali� ��rum";
$strings["add_bookmark"] = "Skr� vefsl��";
$strings["edit_bookmark"] = "Breyta vefsl��";
$strings["delete_bookmarks"] = "Ey�a vefsl��";
$strings["team_subtask_details"] = "N�nar um undirverk vinnuh�ps";
$strings["client_subtask_details"] = "N�nar um undirverk vi�skiptamanns";
$strings["client_change_status_subtask"] = "Breyttu st��unni a� ne�an �egar �� hefur loki� �essu undirverki";
$strings["disabled_permissions"] = "�virkja a�gang";
$strings["user_timezone"] = "T�masv��i (GMT)";
// 2.2
$strings["project_manager_administrator_permissions"] = "Project Manager Administrator";
$strings["bug"] = "Bug Tracking";
// 2.3
$strings["report"] = "Report";
$strings["license"] = "License";
// 2.4
$strings["settings_notwritable"] = "Settings.php file is not writable";

?>
