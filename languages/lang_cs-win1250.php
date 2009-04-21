<?php // $Revision: 1.1.1.1 $
/* vim: set expandtab ts=4 sw=4 sts=4: */

/**
 * $Id: lang_cs-win1250.php,v 1.1.1.1 2004/11/02 03:30:23 madbear Exp $
 * 
 * Copyright (c) 2003 by the NetOffice developers
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 */
// translator(s): Pavel Dostal <pavel.dostal@xone.cz>
$setCharset = "windows-1250";

$byteUnits = array('Bytes', 'KB', 'MB', 'GB');

$dayNameArray = array(1 => "Pond�l�", 2 => "�ter�", 3 => "St�eda", 4 => "�tvrtek", 5 => "P�tek", 6 => "Sobota", 7 => "Ned�le");

$monthNameArray = array(1 => "Leden", "�nor", "B�ezen", "Duben", "Kv�ten", "�erven", "�ervenec", "Srpen", "Z���", "��jen", "Listopad", "Prosinec");

$status = array(0 => "Zak�zka kompletn�", 1 => "Kompletn�", 2 => "Nenastartovan�", 3 => "Otev�en�", 4 => "Pozastaven�");

$profil = array(0 => "Administr�tor", 1 => "Project Manager", 2 => "User", 3 => "Z�kazn�k", 4 => "Neaktivn�", 5 => "Project Manager Administrator");

$priority = array(0 => "��dn�", 1 => "Velmi n�zk�", 2 => "N�zk�", 3 => "St�edn�", 4 => "Vysok�", 5 => "Velmi vysok�");

$statusTopic = array(0 => "Uzav�en", 1 => "Otev�en");
$statusTopicBis = array(0 => "Ano", 1 => "Ne");

$statusPublish = array(0 => "Ano", 1 => "Ne");

$statusFile = array(0 => "Schv�leno", 1 => "Schv�leno se zm�nami", 2 => "Pot�ebuje schv�lit", 3 => "Schv�len� nen� pot�eba", 4 => "Neschv�leno");

$phaseStatus = array(0 => "Nenastartovan�", 1 => "Otev�en�", 2 => "Kompletn�", 3 => "Pozastaven�");

$requestStatus = array(0 => "Nov�", 1 => "Otev�en�", 2 => "Kompletn�");

$strings["please_login"] = "P�ihla�te se pros�m";
$strings["requirements"] = "Po�adavky na syst�m";
$strings["login"] = "P�ihl�sit";
$strings["no_items"] = "Neobsahuje ��dn� z�znam";
$strings["logout"] = "Odhl�sit";
$strings["preferences"] = "Nastaven�";
$strings["my_tasks"] = "Moje �koly";
$strings["edit_task"] = "Uprav �kol";
$strings["copy_task"] = "Kop�ruj �kol";
$strings["add_task"] = "P�idej �kol";
$strings["delete_tasks"] = "Sma� �kol";
$strings["assignment_history"] = "Historie p�id�lov�n�";
$strings["assigned_on"] = "P�id�len kdy";
$strings["assigned_by"] = "P�id�len od";
$strings["to"] = "Pro";
$strings["comment"] = "Koment��";
$strings["task_assigned"] = "�kol p�id�len pro ";
$strings["task_unassigned"] = "�kol p�id�len pro : nep�id�len (nep�id�len)";
$strings["edit_multiple_tasks"] = "Uprav v�ce �kol�";
$strings["tasks_selected"] = "�kol vybr�n. Zvol nov� hodnoty pro tyto �koly, nebo vyber [��dn� zm�na] pro ponech�n� sou�asn�ch hodnot.";
$strings["assignment_comment"] = "Pozn�mka k pov��en�";
$strings["no_change"] = "[��dn� zm�na]";
$strings["my_discussions"] = "Moje diskuze";
$strings["discussions"] = "Diskuze";
$strings["delete_discussions"] = "Sma� diskuze";
$strings["delete_discussions_note"] = "Pozn�mka: Diskuze nem��e b�t znovu otev�ena proto�e byla smaz�na.";
$strings["topic"] = "T�ma";
$strings["posts"] = "Zpr�v";
$strings["latest_post"] = "Posledn� zpr�va";
$strings["my_reports"] = "Moje p�ehledy";
$strings["reports"] = "P�ehledy";
$strings["create_report"] = "Vytvo�it p�ehled";
$strings["report_intro"] = "Vyberte parametry dotazu na p�ehled a po dokon�en� dotazu v�sledek ulo�te.";
$strings["admin_intro"] = "Nastaven� a konfigurace projektu.";
$strings["copy_of"] = "Kop�ruj z ";
$strings["add"] = "P�idat nov� z�znam";
$strings["delete"] = "Sma�";
$strings["remove"] = "Odebrat";
$strings["copy"] = "Kop�ruj";
$strings["view"] = "Zobraz";
$strings["edit"] = "Edituj";
$strings["update"] = "Aktualizovat";
$strings["details"] = "Detaily";
$strings["none"] = "��dn�";
$strings["close"] = "Uzav��t";
$strings["new"] = "Nov�";
$strings["select_all"] = "Vyber v�e";
$strings["unassigned"] = "Nep�id�len�";
$strings["administrator"] = "Administr�tor";
$strings["my_projects"] = "Moje Projekty";
$strings["project"] = "Projekt";
$strings["active"] = "Aktivn�";
$strings["inactive"] = "Neaktivn�";
$strings["project_id"] = "ID projektu";
$strings["edit_project"] = "Uprav projekt";
$strings["copy_project"] = "Kop�ruj projekt";
$strings["add_project"] = "P�idej projekt";
$strings["clients"] = "Z�kazn�ci";
$strings["organization"] = "Z�kazn�k";
$strings["client_projects"] = "Projekty spole�nosti";
$strings["client_users"] = "U�ivatel� spole�nosti";
$strings["edit_organization"] = "Edituj spole�nost";
$strings["add_organization"] = "P�idej spole�nost";
$strings["organizations"] = "Spole�nosti";
$strings["info"] = "Info";
$strings["status"] = "Stav";
$strings["owner"] = "Zadavatel";
$strings["home"] = "Home";
$strings["projects"] = "Projekty";
$strings["files"] = "Soubory";
$strings["search"] = "Hledat";
$strings["admin"] = "Admin";
$strings["user"] = "U�ivatel";
$strings["project_manager"] = "Project Manager";
$strings["due"] = "O�ek�van�";
$strings["task"] = "�kol";
$strings["tasks"] = "�koly";
$strings["team"] = "T�m";
$strings["add_team"] = "P�idej �lena t�mu";
$strings["team_members"] = "�lenov� t�mu";
$strings["full_name"] = "Jm�no a p��jmen�";
$strings["title"] = "Titul";
$strings["user_name"] = "U�ivatelsk� jm�no";
$strings["work_phone"] = "Telefon do pr�ce";
$strings["priority"] = "Priorita";
$strings["name"] = "N�zev";
$strings["id"] = "ID";
$strings["description"] = "Popis";
$strings["phone"] = "Telefon";
$strings["url"] = "URL";
$strings["address"] = "Adresa";
$strings["comments"] = "Pozn�mky";
$strings["created"] = "Vytvo�eno";
$strings["assigned"] = "P�id�leno";
$strings["modified"] = "Upraveno";
$strings["assigned_to"] = "P�id�leno";
$strings["due_date"] = "Term�n dokon�en�";
$strings["estimated_time"] = "Odhad doby (celkem)";
$strings["actual_time"] = "Odpracovan� doba";
$strings["delete_following"] = "Vymazat n�sleduj�c�?";
$strings["cancel"] = "Zru�it";
$strings["and"] = "a";
$strings["administration"] = "Administrace";
$strings["user_management"] = "Spr�va u�ivatel�";
$strings["system_information"] = "Informace o syst�mu";
$strings["product_information"] = "Informace o produktu";
$strings["system_properties"] = "Syst�mov� nastaven�";
$strings["create"] = "Vytvo�it";
$strings["report_save"] = "Ulo�te tento dotaz na p�ehled pro jeho op�tovn� spu�t�n�.";
$strings["report_name"] = "N�zev p�ehledu";
$strings["save"] = "Ulo�it";
$strings["matches"] = "odpov�daj�";
$strings["match"] = "odpov�d�";
$strings["report_results"] = "V�sledn� p�ehled";
$strings["success"] = "V�e ok";
$strings["addition_succeeded"] = "P�id�n� prob�hlo v po��dku";
$strings["deletion_succeeded"] = "Vymaz�n� prob�hlo v po��dku";
$strings["report_created"] = "P�ehled vytvo�en";
$strings["deleted_reports"] = "P�ehledy smaz�ny";
$strings["modification_succeeded"] = "�prava prob�hla v po��dku";
$strings["errors"] = "Nalezena chyba!";
$strings["blank_user"] = "U�ivatel neexistuje.";
$strings["blank_organization"] = "Z�kazn�k nebyl nalezen.";
$strings["blank_project"] = "Projekt nebyl nalezen.";
$strings["user_profile"] = "U�ivatelsk� profil";
$strings["change_password"] = "Zm�nit heslo";
$strings["change_password_user"] = "Zm�nit heslo u�ivatele.";
$strings["old_password_error"] = "Star� heslo nebylo zad�no spr�vn�. Zadej jej pros�m znovu.";
$strings["new_password_error"] = "Ov��en� hesel nesed�. Zadej pros�m znovu nov� heslo (2x).";
$strings["notifications"] = "Ozn�men� e-mailem";
$strings["change_password_intro"] = "Zadej tvoje star� heslo pak vstup a potvr� tvoje nov� heslo.";
$strings["old_password"] = "Star� heslo";
$strings["password"] = "Heslo";
$strings["new_password"] = "Nov� heslo";
$strings["confirm_password"] = "Heslo znovu";
$strings["email"] = "E-Mail";
$strings["home_phone"] = "Telefon dom�";
$strings["mobile_phone"] = "Mobil";
$strings["fax"] = "Fax";
$strings["permissions"] = "Pr�va";
$strings["administrator_permissions"] = "Administr�torsk� pr�va";
$strings["project_manager_permissions"] = "Pr�va - project manager";
$strings["user_permissions"] = "Pr�va - U�ivatel";
$strings["account_created"] = "U�ivatel vytvo�en";
$strings["edit_user"] = "Uprav u�ivatele";
$strings["edit_user_details"] = "Upravit detaily u�ivatelsk�ho ��tu.";
$strings["change_user_password"] = "Zm�nit heslo u�ivatele.";
$strings["select_permissions"] = "Vyber pr�va tohoto u�ivatele.";
$strings["add_user"] = "P�idej u�ivatele";
$strings["enter_user_details"] = "Zadej detaily pro nov� u�ivatelsk� ��et.";
$strings["enter_password"] = "Zadej heslo u�ivatele.";
$strings["success_logout"] = "Odhl�en� bylo �sp�n�. Pro op�tovn� p�ihl�en� zadej u�ivatelsk� jm�no a heslo n�e.";
$strings["invalid_login"] = "U�ivatelsk� jm�no a/nebo heslo nebylo zad�no �patn�. Zadej pros�m znovu p�ihla�ovac� �daje.";
$strings["profile"] = "Profil";
$strings["user_details"] = "Detaily u�ivatelsk�ho ��tu.";
$strings["edit_user_account"] = "Upravit informace o m�m ��tu.";
$strings["no_permissions"] = "Nem�te dostate�n� pr�va pro tuto akci.";
$strings["discussion"] = "Diskuze";
$strings["retired"] = "Retired";
$strings["last_post"] = "Posledn� zpr�va";
$strings["post_reply"] = "Odpov�d�t";
$strings["posted_by"] = "Odeslal";
$strings["when"] = "Kdy";
$strings["post_to_discussion"] = "Odeslat do diskuze";
$strings["message"] = "Zpr�va - text";
$strings["delete_reports"] = "Sma� p�ehled";
$strings["delete_projects"] = "Sma� projekt";
$strings["delete_organizations"] = "Smazat spole�nost?";
$strings["delete_organizations_note"] = "Pozn�mka: T�mto vyma�e� v�echny u�ivatele spole�nosti pro tuto spole�nost a odlou�� v�echny otev�en� projekty t�to spole�nosti.";
$strings["delete_messages"] = "Sma� zpr�vu";
$strings["attention"] = "Upozorn�n�";
$strings["delete_teamownermix"] = "Odstran�n� v po��dku, ale zadavatel nem��e b�t odebr�n z projektov�ho t�mu.";
$strings["delete_teamowner"] = "Nem��e� odebrat zadavatele projektu z projektov�ho t�mu.";
$strings["enter_keywords"] = "Zadej kl��ov� slovo";
$strings["search_options"] = "Kl��ov� slovo a volby hled�n�";
$strings["search_note"] = "Mus� zadat informace v poli pro hled�n�.";
$strings["search_results"] = "V�sledek hled�n�";
$strings["users"] = "U�ivatel�";
$strings["search_for"] = "Hledej";
$strings["results_for_keywords"] = "V�sledek hled�n� kl��ov�ho slova";
$strings["add_discussion"] = "P�idej diskuzi";
$strings["delete_users"] = "Smazat u�ivatele?";
$strings["reassignment_user"] = "P�eveden� projekt� a �kol�";
$strings["there"] = "Jsou zde";
$strings["owned_by"] = "pat��c� u�ivateli naho�e.";
$strings["reassign_to"] = "P�ed smaz�n�m u�ivatele znovu p�i�a�";
$strings["no_files"] = "��dn� p�ipojen� soubory";
$strings["published"] = "Publikovan�";
$strings["project_site"] = "Project Site";
$strings["approval_tracking"] = "Sledov�n� souhlasu";
$strings["size"] = "Velikost";
$strings["add_project_site"] = "P�idej do Project Site";
$strings["remove_project_site"] = "Odeber z Project Site";
$strings["more_search"] = "V�ce mo�nost� hled�n�";
$strings["results_with"] = "V�sledky nalezeny s";
$strings["search_topics"] = "T�ma hled�n�";
$strings["search_properties"] = "Vlastnosti hled�n�";
$strings["date_restrictions"] = "�asov� omezen�";
$strings["case_sensitive"] = "Case Sensitive";
$strings["yes"] = "Ano";
$strings["no"] = "Ne";
$strings["sort_by"] = "Se�adit podle";
$strings["type"] = "Typ";
$strings["date"] = "Datum";
$strings["all_words"] = "v�echny tato slova";
$strings["any_words"] = "��dn� z t�chto slov";
$strings["exact_match"] = "exact match";
$strings["all_dates"] = "V�echny data";
$strings["between_dates"] = "Mezi daty";
$strings["all_content"] = "V�echno";
$strings["all_properties"] = "V�echny vlastnosti";
$strings["no_results_search"] = "Hledan� slovo nebylo nalezeno.";
$strings["no_results_report"] = "P�ehled vr�til pr�zdn� v�sledek.";
$strings["schema_date"] = "YYYY/MM/DD";
$strings["hours"] = "hodin";
$strings["choice"] = "Zvolte";
$strings["missing_file"] = "Chyb�j�c� soubor !";
$strings["project_site_deleted"] = "Project site byl v po��dku vymaz�n.";
$strings["add_user_project_site"] = "U�ivateli bylo �sp�n� ud�leno povolen� k p��stupu do Project Site.";
$strings["remove_user_project_site"] = "U�ivatelsk� pr�va byly v po��dku odebr�ny.";
$strings["add_project_site_success"] = "P�id�n� do project site prob�hlo v po��dku.";
$strings["remove_project_site_success"] = "Odstran�n� z project site prob�hlo v po��dku.";
$strings["add_file_success"] = "P�id�na 1 polo�ka.";
$strings["delete_file_success"] = "Odpojen� vpo��dku.";
$strings["update_comment_file"] = "Koment�� k souboru byl dopln�n v po��dku.";
$strings["session_false"] = "Chyba session";
$strings["logs"] = "Logov�n�";
$strings["logout_time"] = "Odhl�sit po";
$strings["noti_foot1"] = "Toto upozorn�n� bylo vygenerov�no z PhpCollab.";
$strings["noti_foot2"] = "Pro shl�dnut� Xone PhpCollab Home Page, nav�tivte:";
$strings["noti_taskassignment1"] = "Nov� �kol:";
$strings["noti_taskassignment2"] = "Byl ti p�id�len �kol:";
$strings["noti_moreinfo"] = "Pro v�ce informac�, pros�m nav�tivte:";
$strings["noti_prioritytaskchange1"] = "Zm�n�na priorita �kolu:";
$strings["noti_prioritytaskchange2"] = "Priorita n�sleduj�c�ho �kolu byla zm�n�na:";
$strings["noti_statustaskchange1"] = "Zm�n�n stav �kolu:";
$strings["noti_statustaskchange2"] = "Stav n�sleduj�c�ho �kolu byl zm�n�n:";
$strings["login_username"] = "Mus�te zadat u�ivatelsk� jm�no.";
$strings["login_password"] = "pros�m, zadejte heslo.";
$strings["login_clientuser"] = "M�te z�kaznick� ��et. Nem�te p��stup do Xone PhpCollab s t�mto ��tem.";
$strings["user_already_exists"] = "Ji� existuje u�ivatel s t�mto jm�nem. Pros�m, zvolte jinou variantu u�ivatelsk�ho jm�na.";
$strings["noti_duedatetaskchange1"] = "Datum dokon�en� �kolu bylo zm�n�no:";
$strings["noti_duedatetaskchange2"] = "Datum dokon�en� n�sleduj�c�ho �kolu bylo zm�n�no:";
$strings["company"] = "Spole�nost";
$strings["show_all"] = "Zobraz v�e";
$strings["information"] = "Informace";
$strings["delete_message"] = "Smazat tuto zpr�vu";
$strings["project_team"] = "Projektov� t�m";
$strings["document_list"] = "Seznam dokument�";
$strings["bulletin_board"] = "N�st�nka";
$strings["bulletin_board_topic"] = "T�ma n�st�nky";
$strings["create_topic"] = "Vytvo�it nov� t�ma";
$strings["topic_form"] = "Nov� t�ma - formul��";
$strings["enter_message"] = "Zadej tvou zpr�vu";
$strings["upload_file"] = "Nahr�t nov� soubor";
$strings["upload_form"] = "Formul�� pro p�id�n� souboru";
$strings["upload"] = "Nahrej";
$strings["document"] = "Dokument";
$strings["approval_comments"] = "Schv�len� koment��";
$strings["client_tasks"] = "�koly z�kazn�ka";
$strings["team_tasks"] = "�koly t�mu";
$strings["team_member_details"] = "Detail �lena projektov�ho t�mu";
$strings["client_task_details"] = "Detaily �kolu z�kazn�ka";
$strings["team_task_details"] = "Detaily t�mov�ho �kolu";
$strings["language"] = "Jazyk";
$strings["welcome"] = "V�tejte";
$strings["your_projectsite"] = "do Project Site";
$strings["contact_projectsite"] = "Jestli�e m�te jak�koliv ot�zky kolem extranetu nebo informac� nalezen�ch zde, pros�m kontaktujte zadavatele";
$strings["company_details"] = "Detaily spole�nosti";
$strings["database"] = "Z�loha a obnoven� datab�ze";
$strings["company_info"] = "Uprav informace o spole�nosti";
$strings["create_projectsite"] = "Vytvo�it Project Site";
$strings["projectsite_url"] = "Project Site URL";
$strings["design_template"] = "Design �ablona";
$strings["preview_design_template"] = "n�hled design �ablony";
$strings["delete_projectsite"] = "Smazat Project Site";
$strings["add_file"] = "P�idej soubor";
$strings["linked_content"] = "P�ipojen� dokumenty";
$strings["edit_file"] = "Upravit detaily souboru";
$strings["permitted_client"] = "P��pustn� u�ivatel� spole�nosti";
$strings["grant_client"] = "ud�lit povolen� k prohl�en� Project Site";
$strings["add_client_user"] = "P�idat u�ivatele spole�nosti";
$strings["edit_client_user"] = "Upravit u�ivatele spole�nosti";
$strings["client_user"] = "U�ivatel spole�nosti";
$strings["client_change_status"] = "Zm�� tv�j stav n�e jakmile dokon�� tento �kol";
$strings["project_status"] = "Stav projektu";
$strings["view_projectsite"] = "Zobrazit Project Site";
$strings["enter_login"] = "Zadej u�ivatelsk� jm�no pro zasl�n� nov�ho hesla / Zm�na hesla";
$strings["send"] = "Poslat";
$strings["no_login"] = "U�ivatelsk� jm�no nebylo nalezeno v datab�zi";
$strings["email_pwd"] = "Heslo bylo posl�no";
$strings["no_email"] = "U�ivatel nem� email";
$strings["forgot_pwd"] = "Po�li mi zapomenut� heslo!";
$strings["project_owner"] = "Zm�ny m��ete prov�d�t pouze ve vlastn�ch projektech.";
$strings["connected"] = "P�ipojen�";
$strings["session"] = "Session";
$strings["last_visit"] = "Posledn� p�ihl�en�";
$strings["compteur"] = "Po�et";
$strings["ip"] = "Ip";
$strings["task_owner"] = "Nejsi �len t�mu v tomto projektu";
$strings["export"] = "Export";
$strings["browse_cvs"] = "Proch�zet CVS";
$strings["repository"] = "CVS schr�nka";
$strings["reassignment_clientuser"] = "�kol p�ev�st zp�t";
$strings["organization_already_exists"] = "Toto jm�no je ji� pou��v�no v tomt syst�mu. Pros�m, zvolte jin�.";
$strings["blank_organization_field"] = "Mus� zadat n�zev spole�nosti (z�kazn�ka).";
$strings["blank_fields"] = "povinn� pole";
$strings["projectsite_login_fails"] = "Nem��eme potvrdit tuto kombinaci u�ivatelsk�ho jm�na a hesla.";
$strings["start_date"] = "Datum zah�jen�";
$strings["completion"] = "Hotovo";
$strings["update_available"] = "Je dostupn� aktualizace!";
$strings["version_current"] = "Pr�v� pu��v�te verzi";
$strings["version_latest"] = "Posledn� verze je";
$strings["sourceforge_link"] = "str�nku projektu naleznete na Sourceforge";
$strings["demo_mode"] = "Demo m�d. Tato akce nen� povolena.";
$strings["setup_erase"] = "Sma�te soubor setup.php!!";
$strings["no_file"] = "Nebyl vybr�n ��dn� soubor";
$strings["exceed_size"] = "P�ekro�ena maxim�ln� velikost souboru";
$strings["no_php"] = "Soubory *.php nejsou povoleny.";
$strings["approval_date"] = "Datum schv�len�";
$strings["approver"] = "Schv�lil";
$strings["error_database"] = "Nepoda�ilo se p�ipojit k datab�zi";
$strings["error_server"] = "Nepoda�ilo se p�ipojit k serveru";
$strings["version_control"] = "Kontrola verze";
$strings["vc_status"] = "Stav";
$strings["vc_last_in"] = "Datum posledn� zm�ny";
$strings["ifa_comments"] = "Schv�len� - koment��e";
$strings["ifa_command"] = "Zm�nit stav schv�len�";
$strings["vc_version"] = "Verze";
$strings["ifc_revisions"] = "Revize - p�ehled";
$strings["ifc_revision_of"] = "Revize verze";
$strings["ifc_add_revision"] = "P�idej revizi";
$strings["ifc_update_file"] = "Aktualizovat soubor";
$strings["ifc_last_date"] = "Datum posledn� zm�ny";
$strings["ifc_version_history"] = "Verze - historie";
$strings["ifc_delete_file"] = "Smazat soubor v�etn� v�ech verz� a reviz�";
$strings["ifc_delete_version"] = "Sma� vybranou verzi";
$strings["ifc_delete_review"] = "Sma� vybranou revizi";
$strings["ifc_no_revisions"] = "V sou�asn� dob� zde nejsou ��dn� revize tohoto dokumentu.";
$strings["unlink_files"] = "Odpojen� soubory";
$strings["remove_team"] = "Odstran�n� �lena t�mu";
$strings["remove_team_info"] = "Odstranit tyto u�ivatele z projektov�ho t�mu?";
$strings["remove_team_client"] = "Odstran�n� pr�v pro zobrazen� Project Site";
$strings["note"] = "Pozn�mka";
$strings["notes"] = "Pozn�mky";
$strings["subject"] = "P�edm�t";
$strings["delete_note"] = "Smazat z�znam pozn�mky";
$strings["add_note"] = "P�idej novou pozn�mku";
$strings["edit_note"] = "Upravit z�znam pozn�mky";
$strings["version_increm"] = "Vyber verzi pro ulo�en�:";
$strings["url_dev"] = "V�vojov� url";
$strings["url_prod"] = "Kone�n� url";
$strings["note_owner"] = "M��e� prov�d�t zm�ny pouze ve vlastn�ch pozn�mk�ch.";
$strings["alpha_only"] = "V u�ivatelsk�m jm�nu jsou povoleny pouze p�smena a ��slice.";
$strings["edit_notifications"] = "Uprav nastaven� ozn�men� e-mailem";
$strings["edit_notifications_info"] = "Vyber ud�losti p�i kter�ch chce� poslat e-mailov� ozn�meni.";
$strings["select_deselect"] = "Vyber/zru� v�e";
$strings["noti_addprojectteam1"] = "P�idan� do projektov�ho t�mu :";
$strings["noti_addprojectteam2"] = "Byli jste p�id�ni do projektov�ho t�mu pro :";
$strings["noti_removeprojectteam1"] = "Odstran�n� z projektov�ho t�mu :";
$strings["noti_removeprojectteam2"] = "Byli jste odstran�ni z projektov�ho t�mu pro :";
$strings["noti_newpost1"] = "Nov� zpr�va :";
$strings["noti_newpost2"] = "Zpr�va byla p�idan� k n�sleduj�c� diskuzi :";
$strings["edit_noti_taskassignment"] = "M�m p�id�len nov� �kol.";
$strings["edit_noti_statustaskchange"] = "Zm�na stavu m�ho �kolu.";
$strings["edit_noti_prioritytaskchange"] = "Zm�na priority m�ho �kolu.";
$strings["edit_noti_duedatetaskchange"] = "Zm�na term�nu dokon�en� m�ho �kolu.";
$strings["edit_noti_addprojectteam"] = "Jsem p�id�n do projektov�ho t�mu.";
$strings["edit_noti_removeprojectteam"] = "Jsem odebr�n z projektov�ho t�mu.";
$strings["edit_noti_newpost"] = "V diskuzi je nov� p��sp�vek.";
$strings["add_optional"] = "Add an optional /P�idat mo�nost volby/";
$strings["assignment_comment_info"] = "P�idat koment��e o p�id�lov�n� tohoto �kolu";
$strings["my_notes"] = "Moje pozn�mky";
$strings["edit_settings"] = "Upravit nastaven�";
$strings["max_upload"] = "Maxim�ln� velikost souboru";
$strings["project_folder_size"] = "Velikost slo�ky projektu";
$strings["calendar"] = "Kalend��";
$strings["date_start"] = "Datum - start";
$strings["date_end"] = "Datum - konec";
$strings["time_start"] = "�as - start";
$strings["time_end"] = "�as - konec";
$strings["calendar_reminder"] = "P�ipomenout";
$strings["shortname"] = "Zkratka";
$strings["calendar_recurring"] = "Ud�lost se opakuje ka�d� t�den v tento den";
$strings["edit_database"] = "Upravit datab�zi";
$strings["noti_newtopic1"] = "Nov� diskuze:";
$strings["noti_newtopic2"] = "Nov� diskuze byla p�id�na k n�sleduj�c�mu projektu:";
$strings["edit_noti_newtopic"] = "Bylo vytvo�eno nov� diskuzn� t�ma.";
$strings["today"] = "Dnes";
$strings["previous"] = "P�edchoz�";
$strings["next"] = "N�sleduj�c�";
$strings["help"] = "N�pov�da";
$strings["complete_date"] = "Datum dokon�en�";
$strings["scope_creep"] = "Mo�nost zpo�d�n�";
$strings["days"] = "Dn�";
$strings["logo"] = "Logo";
$strings["remember_password"] = "Zapamatovat heslo";
$strings["client_add_task_note"] = "Pozn�mka: Vkl�dan� �kol je registrov�n v datab�zi, objev� se zde nicm�n� jen jestli ho n�kdo p�id�lil �lenu t�mu!";
$strings["noti_clientaddtask1"] = "�kol p�id�n od klienta:";
$strings["noti_clientaddtask2"] = "Nov� �kol byl p�id�n od klienta p�es project site do n�sleduj�c�ho projektu:";
$strings["phase"] = "Etapa";
$strings["phases"] = "Etapy";
$strings["phase_id"] = "ID etapy";
$strings["current_phase"] = "Aktivn� etapa(y)";
$strings["total_tasks"] = "Celkem �kol�";
$strings["uncomplete_tasks"] = "Nekompletn� �koly";
$strings["no_current_phase"] = "��dn� etapa nen� v tuto chv�li aktivn�";
$strings["true"] = "Spr�vn�";
$strings["false"] = "Chybn�";
$strings["enable_phases"] = "Povolit etapy";
$strings["phase_enabled"] = "Povolen� etapy";
$strings["order"] = "Po�ad�";
$strings["options"] = "Volby";
$strings["support"] = "Support";
$strings["support_request"] = "Po�adavek supportu";
$strings["support_requests"] = "Po�adavky supportu";
$strings["support_id"] = "ID po�adavku";
$strings["my_support_request"] = "Moje po�adavky supportu";
$strings["introduction"] = "�vod";
$strings["submit"] = "Submit";
$strings["support_management"] = "Support Management";
$strings["date_open"] = "Datum zah�jen�";
$strings["date_close"] = "Datum ukon�en�";
$strings["add_support_request"] = "P�idat po�adavek na support";
$strings["add_support_response"] = "P�idat odezvu supportu";
$strings["respond"] = "Odezva";
$strings["delete_support_request"] = "Po�adavek Supportu byl smaz�n";
$strings["delete_request"] = "Smazat po�adavek supportu";
$strings["delete_support_post"] = "Smazat po�tu supportu";
$strings["new_requests"] = "Nov� po�adavky";
$strings["open_requests"] = "Otev�en� po�adavky";
$strings["closed_requests"] = "Kompletn� po�adavky";
$strings["manage_new_requests"] = "Upravit nov� po�adavky";
$strings["manage_open_requests"] = "Upravit otev�en� po�adavky";
$strings["manage_closed_requests"] = "Upravit dokon�en� po�adavky";
$strings["responses"] = "Odezvy";
$strings["edit_status"] = "Uprav stav";
$strings["noti_support_request_new2"] = "You have submited a support request regarding: /Mus�te uznat ��dost supportu t�kaj�c� se:/ ";
$strings["noti_support_post2"] = "Byla p�id�na nov� odezva do Va�eho po�adavku na support. Pros�m, pod�vejte se na detaily n�e.";
$strings["noti_support_status2"] = "V� po�adavek na support byl upraven. Pros�m, pod�vejte se na detaily n�e.";
$strings["noti_support_team_new2"] = "Nov� po�adavek podpory byl p�id�n do projektu: ";
// 2.0
$strings["delete_subtasks"] = "Smazat pod�lohy";
$strings["add_subtask"] = "P�idat pod�lohu";
$strings["edit_subtask"] = "Upravit pod�lohu";
$strings["subtask"] = "Pod�loha";
$strings["subtasks"] = "Pod�lohy";
$strings["show_details"] = "Uka� podrobnosti";
$strings["updates_task"] = "Aktualizovat historii �kolu / Task update history /";
$strings["updates_subtask"] = "Aktualizovat historii pod�loh / Subtask update history /";
// 2.1
$strings["go_projects_site"] = "Jdi do projects site";
$strings["bookmark"] = "Z�lo�ka";
$strings["bookmarks"] = "Z�lo�ky";
$strings["bookmark_category"] = "Kategorie";
$strings["bookmark_category_new"] = "Nov� kategorie";
$strings["bookmarks_all"] = "V�echny";
$strings["bookmarks_my"] = "Moje z�lo�ky";
$strings["my"] = "Moje";
$strings["bookmarks_private"] = "Soukrom�";
$strings["shared"] = "Sd�len�";
$strings["private"] = "Soukrom�";
$strings["add_bookmark"] = "P�idej z�lo�ku";
$strings["edit_bookmark"] = "Uprav z�lo�ku";
$strings["delete_bookmarks"] = "Sma� z�lo�ku";
$strings["team_subtask_details"] = "Detaily t�mov� pod�lohy";
$strings["client_subtask_details"] = "Detaily z�kazn�kovi pod�lohy";
$strings["client_change_status_subtask"] = "Zm��te v� stav dole, pokud jste dokon�ili tuto pod�lohu.";
$strings["disabled_permissions"] = "Vy�azen� ��et";
$strings["user_timezone"] = "�asov� z�na (GMT)";
// 2.2
$strings["project_manager_administrator_permissions"] = "Project Manager Administrator";
$strings["bug"] = "Bug Tracking";
// 2.3
$strings["report"] = "Report";
$strings["license"] = "License";
// 2.4
$strings["settings_notwritable"] = "Settings.php file is not writable";

?>
