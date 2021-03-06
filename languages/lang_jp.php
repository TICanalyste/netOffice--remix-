﻿<?php // $Revision: 1.2 $
/* vim: set expandtab ts=4 sw=4 sts=4: */

/**
 * $Id: lang_jp.php,v 1.2 2005/03/22 11:06:20 dylan_cuthbert Exp $
 * 
 * Copyright (c) 2003 by the NetOffice developers
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 */
// translator(s): Dylan Cuthbert <contact@q-games.com>
$topicNote = array(1 => '電話会話',
    2 => 'コンファレンスのノート',
    3 => '一般のノート'
    );

$phaseArraySets = array(
    // Define the names of your phase sets
    'sets' => array(1 => 'Website', 2 => 'Application'), 
    // List the individual items within each phase set.
    // Website Set
    1 => array(0 => 'Concept', 1 => 'Planning', 2 => 'Development',
        3 => 'Testing', 4 => 'Rollout', 5 => 'Maintenance'), 
    // Application Set
    2 => array(0 => 'Concept', 1 => 'Planning', 2 => 'Development',
        3 => 'Testing', 4 => 'Rollout', 5 => 'Maintenance')
    );

$autoLogoutOptions = array(
    0 => 'Disabled',
    300 => '５分',
    600 => '１０分',
    900 => '１５分',
    1800 => '３０分',
    2700 => '４５分',
    3600 => '６０分'
    );

$startPageOptions = array(
    'general/home.php' => 'ホーム',
    'calendar/viewcalendar.php' => 'カレンダ',
    'bookmarks/listbookmarks.php?view=my' => 'お気に入り',
    'reports/createreport.php?typeReports=custom' => 'レポート',
    );

$setCharset = 'UTF-8';

$byteUnits = array('Bytes', 'KB', 'MB', 'GB');

$dayNameArray = array(1 => '月曜日', 2 => '火曜日', 3 => '水曜日', 4 => '木曜日', 5 => '金曜日', 6 => '土曜日', 7 => '日曜日');

$monthNameArray = array(1 => '１月', '２月', '３月', '４月', '５月', '６月', '７月', '８月', '９月', '１０月', '１１月', '１２月');

$status = array(0 => 'クライアント完了', 1 => '完了', 2 => '開始前', 3 => 'オープン', 4 => '待機状態');

$profil = array(0 => 'アドミン', 1 => 'プロジェクト管理者', 2 => 'ユーザ', 3 => 'クライアントユーザ', 4 => '禁止', 5 => 'プロジェクト管理者マネージャ');

$priority = array(0 => '無し', 1 => '非常に低い', 2 => '低い', 3 => '普通', 4 => '高い', 5 => '非常に高い');

$statusTopic = array(0 => '終了', 1 => 'オープン');
$statusTopicBis = array(0 => 'はい', 1 => 'だめ！');

$statusPublish = array(0 => 'はい', 1 => 'しない！');

$statusFile = array(0 => '承諾された', 1 => '変更により承諾された', 2 => '承諾が必要', 3 => '承諾の必要がない', 4 => '承諾不許可');

$phaseStatus = array(0 => '開始前', 1 => 'オープン', 2 => '完了', 3 => '待機状態');

$requestStatus = array(0 => '新', 1 => 'オープン', 2 => '完了');

$projectType = array(0 => '内部プロジェクト', 1 => '外部プロジェクト', 2 => 'リサーチ', 3 => 'アドミン', 4 => 'トレーニング');

$strings['please_login'] = 'ログインして下さい';
$strings['requirements'] = 'システムの最低制限';
$strings['login'] = 'ログイン';
$strings['no_items'] = '表示するアイテムがありません';
$strings['logout'] = 'ログアウト';
$strings['preferences'] = '個人設定';
$strings['my_tasks'] = 'マイタスク';
$strings['edit_task'] = 'タスク編集';
$strings['copy_task'] = 'タスクコピー';
$strings['add_task'] = 'タスク追加';
$strings['delete_tasks'] = 'タスク削除';
$strings['assignment_history'] = '担当者の歴史';
$strings['assigned_on'] = '担当変更日付：';
$strings['assigned_by'] = '担当変更した人：';
$strings['to'] = '先';
$strings['comment'] = 'コメント';
$strings['task_assigned'] = 'タスクの担当者：';
$strings['task_unassigned'] = 'タスクの担当者はいません (担当されていない)';
$strings['edit_multiple_tasks'] = '複数のタスクを編集する';
$strings['tasks_selected'] = 'タスクが選択されていますので、新しいデータを入力する、あるいは「変更無し」を選択して下さい。';
$strings['assignment_comment'] = '担当変更のコメント';
$strings['no_change'] = '[変更無し]';
$strings['my_discussions'] = 'マイディスカッション';
$strings['discussions'] = 'ディスカッション';
$strings['delete_discussions'] = 'ディスカッション削除';
$strings['delete_discussions_note'] = '注意：　ディスカッションが削除されると再開できません。';
$strings['topic'] = 'トピック';
$strings['posts'] = 'ポスト';
$strings['latest_post'] = '最新ポスト';
$strings['my_reports'] = 'マイレポート';
$strings['reports'] = 'レポート';
$strings['create_report'] = 'レポート作成';
$strings['report_intro'] = 'タスクレポートの条件を検索結果ページで保存すると、同じ条件で簡単に再検索する事ができます';
$strings['admin_intro'] = 'プロジェクト設定';
$strings['copy_of'] = 'コピー ～ ';
$strings['add'] = '追加';
$strings['delete'] = '削除';
$strings['remove'] = '外す';
$strings['copy'] = 'コピー';
$strings['view'] = '表示';
$strings['edit'] = '編集';
$strings['update'] = '更新';
$strings['details'] = '詳細';
$strings['none'] = '無し';
$strings['close'] = '閉じる';
$strings['new'] = '追加';
$strings['select_all'] = '全選択';
$strings['unassigned'] = '設定がありません';
$strings['administrator'] = '管理者';
$strings['my_projects'] = 'マイプロジェクト';
$strings['project'] = 'プロジェクト';
$strings['active'] = 'アクティブ';
$strings['inactive'] = '非アクティブ';
$strings['project_id'] = 'プロジェクトID';
$strings['edit_project'] = 'プロジェクト編集';
$strings['copy_project'] = 'プロジェクトをコピー';
$strings['add_project'] = 'プロジェクト追加';
$strings['clients'] = 'クライアント';
$strings['organization'] = 'クライアント社';
$strings['client_projects'] = 'クライアントのプロジェクト';
$strings['client_users'] = 'クライアントのユーザ';
$strings['edit_organization'] = 'クライアント社編集';
$strings['add_organization'] = 'クライアント社追加';
$strings['organizations'] = 'クライアント社';
$strings['info'] = '情報';
$strings['status'] = 'ステータス';
$strings['owner'] = '所有者';
$strings['home'] = 'ホーム';
$strings['projects'] = 'プロジェクト';
$strings['files'] = 'ファイル';
$strings['search'] = '検索';
$strings['admin'] = 'アドミン';
$strings['user'] = 'ユーザ';
$strings['project_manager'] = 'プロジェクト管理者';
$strings['due'] = '期日';
$strings['task'] = 'タスク';
$strings['tasks'] = 'タスク';
$strings['team'] = 'チーム';
$strings['add_team'] = 'チーム追加';
$strings['team_members'] = 'チームメンバー';
$strings['full_name'] = 'フル名';
$strings['title'] = 'タイトル';
$strings['user_name'] = 'ユーザ名';
$strings['work_phone'] = '勤務先電話';
$strings['priority'] = '優先';
$strings['name'] = '名前';
$strings['id'] = 'ID';
$strings['description'] = '詳細';
$strings['phone'] = '自宅電話';
$strings['url'] = 'URL';
$strings['address'] = '住所';
$strings['comments'] = 'コメント';
$strings['created'] = '作成日';
$strings['assigned'] = '割り当てた日付';
$strings['modified'] = '更新日付';
$strings['assigned_to'] = '割り当てた先';
$strings['due_date'] = '期日';
$strings['estimated_time'] = '予想期間';
$strings['actual_time'] = '実際期間';
$strings['delete_following'] = '以下を削除しますか？';
$strings['cancel'] = 'キャンセル';
$strings['and'] = 'と';
$strings['administration'] = 'アドミン';
$strings['user_management'] = 'ユーザ管理';
$strings['system_information'] = 'システム情報';
$strings['product_information'] = 'プロダクト情報';
$strings['system_properties'] = 'システム設定';
$strings['create'] = '作成';
$strings['report_save'] = '再建策できるようにこのレポートの条件を保存して下さい。';
$strings['report_name'] = 'レポート名';
$strings['save'] = '保存';
$strings['matches'] = 'Matches';
$strings['match'] = 'Match';
$strings['report_results'] = 'レポート結果';
$strings['success'] = '成功';
$strings['addition_succeeded'] = '追加が成功されました';
$strings['deletion_succeeded'] = '削除が成功されました';
$strings['report_created'] = 'レポートが作成されました';
$strings['deleted_reports'] = '削除消レポート';
$strings['modification_succeeded'] = '編集が成功しました';
$strings['errors'] = 'エラーがありました！';
$strings['blank_user'] = 'ユーザが見つかりません。';
$strings['blank_organization'] = 'クライアント社が見つかりません。';
$strings['blank_project'] = 'プロジェクトが見つかりません。';
$strings['user_profile'] = 'ユーザ設定';
$strings['change_password'] = 'パスワード変更';
$strings['change_password_user'] = 'ユーザのパスワードを変更する。';
$strings['old_password_error'] = '古いパスワードが合っていない為、再入力して下さい。';
$strings['new_password_error'] = '２回入力されたパスワードが合っていない為、再入力して下さい。';
$strings['notifications'] = 'お知らせ';
$strings['change_password_intro'] = '古いパスワードを入力してから新しいパスワードを２回入力して下さい。';
$strings['old_password'] = '古いパスワード';
$strings['password'] = 'パスワード';
$strings['new_password'] = '新しいパスワード';
$strings['confirm_password'] = 'パスワードの確認';
$strings['email'] = 'Eメール';
$strings['home_phone'] = '自宅電話';
$strings['mobile_phone'] = '携帯電話';
$strings['fax'] = 'ファックス';
$strings['permissions'] = 'アクセス制限';
$strings['administrator_permissions'] = 'アドミン制限';
$strings['project_manager_permissions'] = 'プロジェクト管理者制限';
$strings['user_permissions'] = 'ユーザ制限';
$strings['account_created'] = 'アカウント作成されました';
$strings['edit_user'] = 'ユーザ編集';
$strings['edit_user_details'] = 'ユーザの設定を編集する。';
$strings['change_user_password'] = 'ユーザのパスワードを変更する。';
$strings['select_permissions'] = 'ユーザのアクセス制限を選択する。';
$strings['add_user'] = 'ユーザ追加';
$strings['enter_user_details'] = '今編集されているユーザの詳細設定して下さい。';
$strings['enter_password'] = 'ユーザのパスワードを入力して下さい';
$strings['success_logout'] = 'ログアウトが成功されました。ユーザ命とパスワードを入力したらまたログインする事ができます。';
$strings['invalid_login'] = 'ユーザ名かパスワードが合っていない為、もう一回入力して見て下さい。';
$strings['profile'] = '個人設定';
$strings['user_details'] = 'ユーザの詳細設定';
$strings['edit_user_account'] = '個人情報設定';
$strings['no_permissions'] = 'アクセス制限が足りません。';
$strings['discussion'] = 'ディスカッション';
$strings['retired'] = 'Retired';
$strings['last_post'] = '最終ポスト';
$strings['post_reply'] = '返信する';
$strings['posted_by'] = '作成者';
$strings['when'] = '日付';
$strings['post_to_discussion'] = 'ディスカッション追加';
$strings['message'] = 'コメント';
$strings['delete_reports'] = 'レポート削除';
$strings['delete_projects'] = 'プロジェクト削除';
$strings['delete_organizations'] = 'クライアント社削除';
$strings['delete_organizations_note'] = '注意：クライアントの全てのユーザも削除されるので、プロジェクトからも外されます。';
$strings['delete_messages'] = 'コメント削除';
$strings['attention'] = 'ご注意';
$strings['delete_teamownermix'] = '削除が成功でしたが、プロジェクト所有者をプロジェクトチームから削除する事が無理です。';
$strings['delete_teamowner'] = 'プロジェクトチームからプロジェクト所有者を削除する事は無理です。';
$strings['enter_keywords'] = 'キーワードを入力して下さい';
$strings['search_options'] = 'キーワード入力と検索オプション';
$strings['search_note'] = '検索条件が必要です。';
$strings['search_results'] = '検索結果';
$strings['users'] = 'ユーザ';
$strings['search_for'] = '検索';
$strings['results_for_keywords'] = '結果をキーワードで検索する';
$strings['add_discussion'] = 'ディスカッション追加';
$strings['delete_users'] = 'ユーザ削除';
$strings['reassignment_user'] = 'プロジェクトとタスクの再割り当て';
$strings['there'] = '以下のが';
$strings['owned_by'] = '以上のユーザに所有されています。';
$strings['reassign_to'] = '削除する前に、割り当て直して下さい';
$strings['no_files'] = '何もリンクされていません';
$strings['published'] = '公開されています';
$strings['project_site'] = 'プロジェクトホームページ';
$strings['approval_tracking'] = 'Approval Tracking';
$strings['size'] = 'サイズ';
$strings['add_project_site'] = 'プロジェクトホームページに追加';
$strings['remove_project_site'] = 'プロジェクトホームページから外す';
$strings['more_search'] = '検索詳細設定';
$strings['results_with'] = 'Find Results With';
$strings['search_topics'] = '検索トピック';
$strings['search_properties'] = '検索条件';
$strings['date_restrictions'] = '日付制限';
$strings['case_sensitive'] = 'Case Sensitive';
$strings['yes'] = 'はい';
$strings['no'] = 'だめ！';
$strings['sort_by'] = 'ソート条件';
$strings['type'] = 'タイプ';
$strings['date'] = '日付';
$strings['all_words'] = '全ての単語';
$strings['any_words'] = 'どの単語でも';
$strings['exact_match'] = 'ぴったりマッチング';
$strings['all_dates'] = '全ての日';
$strings['between_dates'] = '期間';
$strings['all_content'] = '全てのコンテンツ';
$strings['all_properties'] = '全ての条件';
$strings['no_results_search'] = '何も見つかりませんでした。';
$strings['no_results_report'] = 'レポートで何も見つかりませんでした。';
$strings['schema_date'] = 'YYYY/MM/DD';
$strings['hours'] = '時間';
$strings['choice'] = '選択';
$strings['missing_file'] = 'ファイルがありませんでした！';
$strings['project_site_deleted'] = 'プロジェクトホームページは成功に削除されました。';
$strings['add_user_project_site'] = 'The user was successfully granted permission to access the Project Site.';
$strings['remove_user_project_site'] = 'ユーザ制限が成功に削除されました。';
$strings['add_project_site_success'] = 'プロジェクトホームページの追加が成功しました。';
$strings['remove_project_site_success'] = 'プロジェクトホームページからの削除が成功しました。';
$strings['add_file_success'] = '１つのアイテムがリンクされました';
$strings['delete_file_success'] = 'リンクを外しました。';
$strings['update_comment_file'] = 'ファイルのコメントが成功に更新されました。';
$strings['session_false'] = 'セッションエラー';
$strings['logs'] = 'ログ';
$strings['logout_time'] = '自動ログアウト';
$strings['noti_foot1'] = 'このお知らせはNetOfficeが作成しました。';
$strings['noti_foot2'] = 'NetOfficeのホームページを見たかったら、以下のリンクをクリックして下さい';
$strings['noti_taskassignment1'] = 'タスク追加：';
$strings['noti_taskassignment2'] = 'あなたに割り当ててあるタスク：';
$strings['noti_moreinfo'] = 'もっと詳しい情報は：';
$strings['noti_prioritytaskchange1'] = 'タスクの優先が変更されました：';
$strings['noti_prioritytaskchange2'] = '以下のタスクの優先が変更されました：';
$strings['noti_statustaskchange1'] = 'タスクステータスが変更されました：';
$strings['noti_statustaskchange2'] = 'タスクステータスが変更されました：';
$strings['login_username'] = 'ユーザ名を入力する必要があります';
$strings['login_password'] = 'パスワードを入力して下さい';
$strings['login_clientuser'] = 'クライアントユーザですのでNetOfficeにはアクセスができません。';
$strings['user_already_exists'] = 'すでにユーザ名が使用されていますので、別の名前を考えてください。';
$strings['noti_duedatetaskchange1'] = 'タスクの期日が変更されました：';
$strings['noti_duedatetaskchange2'] = 'タスクの期日が変更されました：';
$strings['company'] = '会社';
$strings['show_all'] = '全て表示';
$strings['information'] = '情報';
$strings['delete_message'] = 'コメント削除';
$strings['project_team'] = 'プロジェクトチーム';
$strings['document_list'] = 'ドキュメントリスト';
$strings['bulletin_board'] = '掲示板';
$strings['bulletin_board_topic'] = '掲示板トピック';
$strings['create_topic'] = 'トピック追加';
$strings['topic_form'] = 'トピック フォーム';
$strings['enter_message'] = 'メッセージを入力して下さい';
$strings['upload_file'] = 'ファイルをアップロードする';
$strings['upload_form'] = 'フォームをアップロードする';
$strings['upload'] = 'アップロード';
$strings['document'] = 'ドキュメント';
$strings['approval_comments'] = 'Approval Comments';
$strings['client_tasks'] = 'クライアントのタスク';
$strings['team_tasks'] = 'チームのタスク';
$strings['team_member_details'] = 'プロジェクトのチームメンバー詳細';
$strings['client_task_details'] = 'クライアントのタスク詳細';
$strings['team_task_details'] = 'チームのタスク詳細';
$strings['language'] = '言語';
$strings['welcome'] = 'ようこそ';
$strings['your_projectsite'] = 'プロジェクトホームページへ';
$strings['contact_projectsite'] = '質問があれば、プロジェクト管理者にお聞きして下さい。';
$strings['company_details'] = '会社詳細';
$strings['database'] = 'データベースのバックアップ／リストア';
$strings['company_info'] = '会社情報編集';
$strings['create_projectsite'] = 'プロジェクトホームページ作成';
$strings['projectsite_url'] = 'プロジェクトホームページのURL';
$strings['design_template'] = 'デザインテンプレート';
$strings['preview_design_template'] = 'デザインテンプレートのプリビュー';
$strings['delete_projectsite'] = 'プロジェクトホームページ削除';
$strings['add_file'] = 'ファイル追加';
$strings['linked_content'] = 'リンクされたアイテム';
$strings['edit_file'] = 'ファイル情報編集';
$strings['permitted_client'] = '許可されているクライアントユーザ';
$strings['grant_client'] = 'プロジェクトホームページにアクセスできるように許可する';
$strings['add_client_user'] = 'クライアントユーザ追加';
$strings['edit_client_user'] = 'クライアントユーザ編集';
$strings['client_user'] = 'クライアントユーザ';
$strings['client_change_status'] = 'タスクを完了したら、以下にある自分のステータスを変更して下さい';
$strings['project_status'] = 'プロジェクト状態';
$strings['view_projectsite'] = 'プロジェクトホームページ表示';
$strings['enter_login'] = '新パスワードを貰う為に、ログイン名を入力して下さい';
$strings['send'] = '送信';
$strings['no_login'] = 'データベースではログイン名が存在していませんでした';
$strings['email_pwd'] = 'パスワードが送信されました';
$strings['no_email'] = 'Eメールがないユーザでした';
$strings['forgot_pwd'] = 'パスワードを忘れました？';
$strings['project_owner'] = '自分のプロジェクトしか変更する事ができません。';
$strings['connected'] = '接続しました';
$strings['session'] = 'セッション';
$strings['last_visit'] = '最終ログイン';
$strings['compteur'] = 'カウント';
$strings['ip'] = 'Ip';
$strings['task_owner'] = 'このプロジェクトのチームメンバーではありません';
$strings['export'] = '出力';
$strings['browse_cvs'] = 'Browse CVS';
$strings['repository'] = 'CVS Repository';
$strings['reassignment_clientuser'] = 'タスク再割り当て';
$strings['organization_already_exists'] = 'すでに名前が使用されていますので、別の名前を考えて下さい。';
$strings['blank_organization_field'] = 'クライアント社を入力する必要があります。';
$strings['blank_fields'] = '必須';
$strings['projectsite_login_fails'] = 'ユーザとパスワードを合わせて確認できませんでした。';
$strings['start_date'] = '開始日';
$strings['completion'] = '終了日';
$strings['update_available'] = '新しいバージョンがあります！';
$strings['version_current'] = '現在、';
$strings['version_latest'] = 'は使用されていますが、一番最新版は';
$strings['sourceforge_link'] = 'ソースフォージのプロジェクトページをご覧下さい。';
$strings['demo_mode'] = 'Demo mode. Action not allowed.';
$strings['setup_erase'] = 'Erase the file setup.php!!';
$strings['no_file'] = 'ファイルが選択されていません';
$strings['exceed_size'] = 'Exceed max file size';
$strings['no_php'] = 'Php file not allowed';
$strings['approval_date'] = 'Approval date';
$strings['approver'] = 'Approver';
$strings['error_database'] = 'Can\'t connect to database';
$strings['error_server'] = 'Can\'t connect to server';
$strings['version_control'] = 'Version Control';
$strings['vc_status'] = 'ステータス';
$strings['vc_last_in'] = 'Date last modified';
$strings['ifa_comments'] = 'Approval comments';
$strings['ifa_command'] = 'Change approval status';
$strings['vc_version'] = 'Version';
$strings['ifc_revisions'] = 'Peer Reviews';
$strings['ifc_revision_of'] = 'Review of version';
$strings['ifc_add_revision'] = 'Add Peer Review';
$strings['ifc_update_file'] = 'Update file';
$strings['ifc_last_date'] = 'Date last modified';
$strings['ifc_version_history'] = 'Version History';
$strings['ifc_delete_file'] = 'Delete file and all child versions & reviews';
$strings['ifc_delete_version'] = 'Delete Selected Version';
$strings['ifc_delete_review'] = 'Delete Selected Review';
$strings['ifc_no_revisions'] = 'There are currently no revisions of this document';
$strings['unlink_files'] = 'Unlink Files';
$strings['remove_team'] = 'Remove Team Members';
$strings['remove_team_info'] = 'Remove these users from the project team?';
$strings['remove_team_client'] = 'Remove Permission to View Project Site';
$strings['note'] = 'ノート';
$strings['notes'] = 'ノート';
$strings['subject'] = '件名';
$strings['delete_note'] = 'ノート削除';
$strings['add_note'] = 'ノート追加';
$strings['edit_note'] = 'ノート編集';
$strings['version_increm'] = 'Select the version change to apply:';
$strings['url_dev'] = 'Development site url';
$strings['url_prod'] = 'Final site url';
$strings['note_owner'] = '自分が制作したノートしか変更できません。';
$strings['alpha_only'] = 'Alpha-numeric only in login';
$strings['edit_notifications'] = 'Eメールお知らせ設定';
$strings['edit_notifications_info'] = 'Eメールでお知らせするイベントを選択して下さい';
$strings['select_deselect'] = '全て選択／非選択';
$strings['noti_addprojectteam1'] = 'プロジェクトチームに参加されています:';
$strings['noti_addprojectteam2'] = 'プロジェクトチームに参加されています、プロジェクトは：';
$strings['noti_removeprojectteam1'] = 'プロジェクトチームから外されました';
$strings['noti_removeprojectteam2'] = 'プロジェクトチームから外されました、プロジェクトは：';
$strings['noti_newpost1'] = '新ポスト：';
$strings['noti_newpost2'] = '以下のディスカッションにポストが追加されました：';
$strings['edit_noti_taskassignment'] = '新しいタスクに割り当てた場合';
$strings['edit_noti_statustaskchange'] = 'マイタスクのステータスが変更された場合';
$strings['edit_noti_prioritytaskchange'] = 'マイタスクの優先が変更された場合';
$strings['edit_noti_duedatetaskchange'] = 'マイタスクの期日が変更された場合';
$strings['edit_noti_addprojectteam'] = 'プロジェクトチームに追加された場合';
$strings['edit_noti_removeprojectteam'] = 'プロジェクトチームから外された場合';
$strings['edit_noti_newpost'] = 'ディスカッションに新しいポストがある場合';
$strings['add_optional'] = '条件追加';
$strings['assignment_comment_info'] = 'Add comments about the assignment of this task';
$strings['my_notes'] = 'マイノート';
$strings['edit_settings'] = '設定';
$strings['max_upload'] = 'Max file size';
$strings['project_folder_size'] = 'Project folder size';
$strings['calendar'] = 'カレンダー';
$strings['date_start'] = '開始日';
$strings['date_end'] = '終了日';
$strings['time_start'] = '開始時間';
$strings['time_end'] = '終了時間';
$strings['calendar_reminder'] = 'Reminder';
$strings['shortname'] = 'あだ名';
$strings['calendar_recurring'] = '毎週この日に行われています';
$strings['edit_database'] = 'データベース編集';
$strings['noti_newtopic1'] = 'ディスカッション追加';
$strings['noti_newtopic2'] = '以下のプロジェクトに新しいディスカッションが追加されました。';
$strings['edit_noti_newtopic'] = '新しいディスカッショントピックが作成されました。';
$strings['today'] = '本日';
$strings['previous'] = '前';
$strings['next'] = '次';
$strings['help'] = 'ヘルプ';
$strings['complete_date'] = '完了日';
$strings['scope_creep'] = 'Scope連れ';
$strings['days'] = '日数';
$strings['logo'] = 'ロゴ';
$strings['remember_password'] = 'パスワードを覚える';
$strings['client_add_task_note'] = 'Note: The entered task is registered into the data base, appears here however only if it one assigned to a team member!';
$strings['noti_clientaddtask1'] = 'クライアントが追加したタスク：';
$strings['noti_clientaddtask2'] = 'A new task was added by client from project site to the following project :';
$strings['phase'] = 'フェーズ';
$strings['phases'] = 'フェーズ';
$strings['phase_id'] = 'フェーズ ID';
$strings['current_phase'] = 'アクティブフェーズ';
$strings['total_tasks'] = 'トータルタスク';
$strings['uncomplete_tasks'] = '未完成タスク';
$strings['no_current_phase'] = '現在アクティブフェーズはありません';
$strings['true'] = '真';
$strings['false'] = '偽';
$strings['enable_phases'] = 'フェーズをイネーブル';
$strings['phase_enabled'] = 'フェーズがイネーブルされた';
$strings['order'] = '順番';
$strings['options'] = 'オプション';
$strings['support'] = 'サポート';
$strings['support_request'] = 'サポートリクエスト';
$strings['support_requests'] = 'サポートリクエスト';
$strings['support_id'] = 'リクエスト ID';
$strings['my_support_request'] = 'マイサポートリクエスト';
$strings['introduction'] = '紹介';
$strings['submit'] = '決定';
$strings['support_management'] = 'サポートマネージメント';
$strings['date_open'] = 'Date Opened';
$strings['date_close'] = 'Date Closed';
$strings['add_support_request'] = 'サポートリクエスト追加';
$strings['add_support_response'] = 'サポートレスポンス追加';
$strings['respond'] = '返信';
$strings['delete_support_request'] = 'サポートリクエスト削除上されました';
$strings['delete_request'] = 'サポートリクエスト削除';
$strings['delete_support_post'] = 'サポートポスト削除';
$strings['new_requests'] = '新しいリクエスト';
$strings['open_requests'] = 'オーペンリクエスト';
$strings['closed_requests'] = '終了リクエスト';
$strings['manage_new_requests'] = '新リクエスト管理';
$strings['manage_open_requests'] = 'オーペンリクエスト管理';
$strings['manage_closed_requests'] = '終了リクエスト管理';
$strings['responses'] = 'レスポンス';
$strings['edit_status'] = 'ステータス編集';
$strings['noti_support_request_new2'] = 'You have submited a support request regarding: ';
$strings['noti_support_post2'] = 'A new response has been added to your support request. Please review the details below.';
$strings['noti_support_status2'] = 'Your support request has been updated. Please review the details below.';
$strings['noti_support_team_new2'] = 'A new support request has been added to project: ';
// 2.0
$strings['delete_subtasks'] = 'サブタスク削除';
$strings['add_subtask'] = '子タスク追加';
$strings['edit_subtask'] = '子タスク編集';
$strings['subtask'] = '子タスク';
$strings['subtasks'] = '子タスク';
$strings['show_details'] = '詳細表示';
$strings['updates_task'] = 'タスク変更歴史';
$strings['updates_subtask'] = '子タスク変更歴史';
// 2.1
$strings['go_projects_site'] = 'Go to projects site';
$strings['bookmark'] = 'お気に入り';
$strings['bookmarks'] = 'お気に入り';
$strings['bookmark_category'] = 'カテゴリー';
$strings['bookmark_category_new'] = 'カテゴリー追加';
$strings['bookmarks_all'] = '全部';
$strings['bookmarks_my'] = 'マイお気に入り';
$strings['my'] = 'マイ';
$strings['bookmarks_private'] = 'プライベート';
$strings['shared'] = 'シェア';
$strings['private'] = 'プライベート';
$strings['add_bookmark'] = 'お気に入り追加';
$strings['edit_bookmark'] = 'お気に入り編集';
$strings['delete_bookmarks'] = 'お気に入り削除';
$strings['team_subtask_details'] = 'チーム子タスク詳細';
$strings['client_subtask_details'] = 'クライアント子タスク詳細';
$strings['client_change_status_subtask'] = '子タスクを終了する場合、自分のステータスを変更して下さい';
$strings['disabled_permissions'] = 'Disabled account';
$strings['user_timezone'] = 'Timezone (GMT)';
// 2.2
$strings['project_manager_administrator_permissions'] = 'プロジェクト管理者マネージャ';
$strings['bug'] = 'バグトラック';
// 2.3
$strings['report'] = 'レポート';
$strings['license'] = 'ライセンス';
// 2.4
$strings['settings_notwritable'] = 'Settings.php file is not writable';
// 2.5
$strings['name_print'] = 'Name printed';
$strings['calculation'] = '計算';
$strings['items'] = 'アイテム';
$strings['position'] = 'Position';
$strings['completed'] = 'Completed';
$strings['service'] = 'サービス';
$strings['service_management'] = 'Service management';
$strings['hourly_rate'] = 'Hourly rate';
$strings['add_service'] = 'サービス追加';
$strings['edit_service'] = 'サービス編集';
$strings['delete_services'] = 'サービス削除';
$strings['worked_hours'] = '働いた時間';
$strings["loghours"] = '作業時間のログ';
$strings["logtime"] = 'ログ時間';
$strings["loggedby"] = 'ログ作成者';
$strings["error_required"] = 'が必要';
$strings["error_numerical"] = 'は数字しか対応されていない';
$strings["hours_updated"] = 'タスク時間が更新されました';
$strings['add_task_time'] = 'タスク時間追加';
$strings['edit_task_time'] = 'タスク時間編集';
$strings['delete_task_time'] = 'タスク時間削除';
$strings['task_time'] = 'タスク時間';
// 2.5.1
$strings["email_users"] = "ユーザへ送信";
$strings["email_following"] = "以下へ送信";
$strings["email_sent"] = "Eメールが成功に送信されました。";
$strings['all'] = '全部';
$strings['custom_reports'] = 'カスタムレポート';
$strings['custom_report_intro'] = 'Choose the custom report below based on its description that best fits your reporting needs.';
$strings['completed_task_report'] = '終了されているタスク';
$strings['completed_task_report_desc'] = 'This report provides a listing of the
tasks completed during the previous month.';
$strings['time_report'] = 'Time Report';
$strings['time_report_desc'] = 'This report provides a listing of the hours logged by employee for each project for the previous month and allows you the opportunity to export that information.';
$strings['overdue_tasks'] = 'Overdue Tasks';
$strings['overdue_tasks_desc'] = 'This report displays a listing of the overview tasks within all the projects.';
$strings['project_snapshot'] = 'Project Snapshot';
$strings['project_snapshot_desc'] = 'This report provides for the user signed on a overview look at the projects where they are deemed as the owner and the tasks associated with the project.';
$strings['pending_tasks'] = 'Pending Tasks';
$strings['pending_tasks_desc'] = 'This report provides an enterprise view of the projects tasks that have been entered for the projects.';
$strings['pm_report'] = 'PM Report';
$strings['pm_report_desc'] = 'This report displays the projects assigned by resource and those projects not yet assigned.';
$strings['project_phasestatus'] = 'Project Phase Status';
$strings['project_phasestatus_desc'] = 'Shows a basic overview of all active projects and their phases';
$strings['resource_usage'] = 'Resource Usage';
$strings['resource_usage_desc'] = 'This report summarizes total time logged for projects and organizations.';
// 2.5.2
$strings['install_erase'] = 'Remove the installation directory and its contents!!';
$strings['error_phpversion'] = 'Your PHP version must be greater than or equal to 4.1.0 to run NetOffice!';
$strings['display_options'] = 'Display Options';
$strings['member_items'] = "Member Items";
$strings['project_totals'] = "Project Totals";
$strings['organization_totals'] = "Organization Totals";
$strings['member_totals'] = "Member Totals";
$strings['member_period_totals'] = "Member Period Totals";
// 2.5.3
$strings['project_breakdown'] = "Project Breakdown";
$strings['project_breakdown_desc'] = "Project list itemizing owner, status, and partner";
$strings['start_page'] = 'Start on';
$strings['task_id'] = 'Task ID';

// dwins custom

$dayHourArray = array(
    0 => "0",
    1 => "8",
    2 => "8",
    3 => "8",
    4 => "8",
    5 => "8",
    6 => "0",
    7 => "0"
    );
$taskPredecessorTypes = array(
    "FF" => "Finish to Finish",
    "FS" => "Finish to Start",
    "SF" => "Start to Finish",
    "SS" => "Start to Start"
    );
$timestampArray = array(
    "06:00" => "AM 06:00",
    "06:30" => "AM 06:30",
    "07:00" => "AM 07:00",
    "07:30" => "AM 07:30",
    "08:00" => "AM 08:00",
    "08:30" => "AM 08:30",
    "09:00" => "AM 09:00",
    "09:30" => "AM 09:30",
    "10:00" => "AM 10:00",
    "10:30" => "AM 10:30",
    "11:00" => "AM 11:00",
    "11:30" => "AM 11:30",
    "12:00" => "PM 12:00",
    "12:30" => "PM 12:30",
    "13:00" => "PM 01:00",
    "13:30" => "PM 01:30",
    "14:00" => "PM 02:00",
    "14:30" => "PM 02:30",
    "15:00" => "PM 03:00",
    "15:30" => "PM 03:30",
    "16:00" => "PM 04:00",
    "16:30" => "PM 04:30",
    "17:00" => "PM 05:00",
    "17:30" => "PM 05:30",
    "18:00" => "PM 06:00",
    "18:30" => "PM 06:30",
    "19:00" => "PM 07:00",
    "19:30" => "PM 07:30",
    "20:00" => "PM 08:00",
    "20:30" => "PM 08:30",
    "21:00" => "PM 09:00"
    );
$reminderTimeArray = array(
    "0"     => "--",
    "5"     => "5 minutes",
    "15"    => "15 minutes",
    "30"    => "30 minutes",
    "60"    => "1 hour",
    "120"   => "2 hours",
    "180"   => "3 hours",
    "360"   => "6 hours",
    "720"   => "12 hours",
    "1440"  => "1 day",
    "2880"  => "2 days",
    "4320"  => "3 days",
    "5760"  => "4 days",
    "7200"  => "5 days",
    "8640"  => "6 days",
    "10080" => "1 week",
    "11520" => "8 days",
    "12960" => "9 days",
    "14400" => "10 days",
    "15840" => "11 days",
    "17280" => "12 days",
    "18720" => "13 days",
    "20160" => "2 weeks"
    );
$resourceTypeArray = array(
    "members"    => "Human"
    );
$milestoneis = array(0 => 'はい', 1 => 'いいえ');
$strings['hours_logged'] = 'ログされた時間';
$strings['hours_logged_from'] = 'from';
$strings['hours_logged_to'] = 'to';
$strings['hours_total'] = '合計';
$strings['ru_detail'] = 'リソース扱い詳細';
$strings['ru_detail_from'] = 'from';
$strings['ru_detail_to'] = 'to';
$strings['ru_total_project'] = 'プロジェクト時間合計';
$strings['ru_total_org'] = 'Total for organization';
$strings['ru_total_mem'] = 'Total for members';
$strings['ru_subtotal'] = '小計';
$strings['meetings'] = '会議';
$strings['meeting'] = '会議';
$strings['edit_meeting'] = '会議編集';
$strings['copy_meeting'] = '会議コピー';
$strings['add_meeting'] = '会議追加';
$strings['delete_meetings'] = '会議削除';
$strings['me_agenda'] = 'アジェンダ';
$strings['me_location'] = '場所';
$strings['me_minutes'] = '記録';
$strings['me_chairman'] = '担当者';
$strings['me_recorder'] = '記録者';
$strings['attendants'] = '参加者';
$strings['select_all_but_clients'] = 'クライアント以外全て';
$strings['start_time'] = '開始時間';
$strings['end_time'] = '終了時間';
$strings['meeting_id'] = '会議 ID';
$strings['updates_meeting'] = '会議変更歴史';
$strings['add_meeting_time'] = '会議時間追加';
$strings['edit_meeting_time'] = '会議時間編集';
$strings['delete_meeting_time'] = '会議時間削除';
$strings['meeting_time'] = '会議時間';
$strings['edit_noti_meetingassignment'] = '会議に割り当てられる場合';
$strings['edit_noti_statusmeetingchange'] = '会議の状態が変更される場合';
$strings['edit_noti_prioritymeetingchange'] = '会議の優先が変更される場合';
$strings['edit_noti_locationmeetingchange'] = '会議の場所が変更される場合';
$strings['edit_noti_timemeetingchange'] = '会議の日付が変更される場合';
$strings['edit_noti_checklogtime'] = 'まめに時間をログするように知らせて下さい';
$strings['edit_noti_todolist'] = '今日のゆる事リスト';
$strings['noti_meetingassignment1'] = '新しい会議：';
$strings['noti_meetingassignment2'] = '会議に割り当てられました：';
$strings['noti_prioritymeetingchange1'] = '会議の優先が変更されました：';
$strings['noti_prioritymeetingchange2'] = '会議の優先が変更されました：';
$strings['noti_statusmeetingchange1'] = '会議のステータスが変更されました：';
$strings['noti_statusmeetingchange2'] = '会議のステータスが変更されました：';
$strings['noti_locationmeetingchange1'] = '会議の場所が変更されました：';
$strings['noti_locationmeetingchange2'] = '会議の場所が変更されました：';
$strings['noti_timemeetingchange1'] = '会議時間が変更されました：';
$strings['noti_timemeetingchange2'] = '会議時間が変更されました：';
$strings['noti_checklogtime1'] = '時間ログがない：';
$strings['noti_checklogtime2'] = '以下の日のログが足りませんでした：';
$strings['noti_todolist1'] = 'やる事リスト：';
$strings['noti_todolist2'] = '以下は本日のやる事リスト';
$strings['noti_todolist3'] = '時間過ぎたやる事リスト';
$strings['noti_todolist4'] = 'タスクリスト：';
$strings['noti_todolist5'] = '会議リスト：';
$strings['noti_todolist6'] = '覚書リスト：';
$strings['noti_todolist7'] = 'The followings are today\'s reminder List:';
$strings['noti_todolist8'] = '覚書リスト：';
$strings['noti_orphan1'] = '親無しタスクリスト：';
$strings['noti_orphan2'] = '以下のタスクが無効ユーザに割り当たられているので、割り当てなおしてください：';
$strings['attendants_modification_succeeded'] = 'Attendants modification succeeded';
$strings['cal_personal'] = '個人';
$strings['holidays'] = '休日';
$strings['edit_holidays'] = '休日編集';
$strings['delete_holidays'] = '休日削除';
$strings['new_holiday'] = '休日追加';
$strings['fixed_duration'] = '固定期間';
$strings['milestone'] = 'マイルストーン';
$strings['interdependency_failed'] = 'Task interdependency conflict, update failed';
$strings['hour'] = '時';
$strings['duration'] = '期間';
$strings['task_dependencies'] = 'タスクデペンデンシ';
$strings['lag'] = 'ラグ';
$strings['predecessor'] = 'Predecessor';
$strings['add_predecessor'] = 'Add Task Predecessor';
$strings['edit_predecessor'] = 'Edit Task Predecessor';
$strings['delete_predecessors'] = 'Delete Task Predecessors';
$strings['add_predecessor_success'] = 'The addition to the task succeeded.';
$strings['delete_predecessor_success'] = 'The predecessor was successfully deleted.';
$strings['no_possible_tasks'] = 'There are no possible tasks.';
$strings['lack_of_dates'] = 'Start date and due date needed.';
$strings['ftok_error'] = 'Mutex lock failed, contact system administrator immediately!!';
$strings['sem_get_error'] = 'Mutex lock failed, contact system administrator immediately!!';
$strings['sem_acquire_error'] = 'Transaction failed, try again later';
$strings['calendar_reminder_time1'] = '覚書送信';
$strings['calendar_reminder_time2'] = '前と';
$strings['calendar_reminder_time3'] = 'イベントの前';
$strings["send_reminder1"] = "個人覚書リスト：";
$strings["send_reminder2"] = "以下は個人の覚書リスト：";
$strings["send_reminder3"] = "プロジェクトの覚書リスト：";
$strings["send_reminder4"] = "以下は ";
$strings["send_reminder5"] = " プロジェクトの覚書リスト：";
$strings["send_reminder6"] = "会議の覚書：";
$strings['meeting_reminder'] = '覚書';
$strings['meeting_reminder_time1'] = '覚書送信';
$strings['meeting_reminder_time2'] = '前と';
$strings['meeting_reminder_time3'] = '会議の前';
$strings['add_resource'] = 'タスクリソース追加';
$strings['edit_resource'] = 'タスクリソース編集';
$strings['delete_resources'] = 'タスクリソース削除';
$strings['no_available_resources'] = 'そのタイプのリソースはありません';
$strings['delete_resource_success'] = 'リソースは成功に削除されました。';


?>
