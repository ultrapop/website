<?php
error_reporting(0);
require_once '../../website_etc/dbpass.php';
session_start([
    'cookie_lifetime' => 864000,
]);

// ログイン状態チェック
// $loginUsrを読みにいかずにnullが通らないように issetも見る
if ($_SESSION["NAME"] != $loginUsr || !isset($loginUsr)) {
    header("Location: logout.php");
    exit;
}
//act に合わせて処理を行う。無ければ、他の制御

$sid = -1;
$act = "";


$host=gethostname();

if (!strpos($host, 'sakura')){
	$pdo = new PDO("mysql:dbname=test;host=localhost;unix_socket=/tmp/mysql.sock", $usr, $pass);
}else{
	$pdo = new PDO($dbname , $usr, $pass);
}


// URLからパラメータを取得
// urlから取得できるなら、単独idを取得する
if(isset($_GET['sid'])) {
	$sid = $_GET['sid'];
}

$error = $title = $text = '';

if(isset($_GET['act'])) {	// urlから取得できるなら、一度に表示する記事数を取得する
	$act = $_GET['act'];
	$st = $pdo->query("SELECT * FROM diaryentry WHERE entryid = $sid");// !!取得に失敗するケースを無視している

	$row = $st->fetch(); // エントリ出力ループ
	//エントリid 単独id記事へのリンクに使用する

	if ($act == "del") {
		$entryid = htmlspecialchars($row['entryid']);

		// エントリ本文
		// 日本語データをUTF-8に変換して取得(サーバからはeuc-jpで返ってくる。!!変更方法が分からない)
		$text = $row['entrytext'];
		$text = mb_convert_encoding($text, "UTF-8","ASCII,JIS,UTF-8,EUC-JP,SJIS-win");

		// エントリタイトル
		// 日本語データをUTF-8に変換して取得(サーバからはeuc-jpで返ってくる。!!変更方法が分からない)
		$title = $row['entrytitle'];
		$title = mb_convert_encoding($title, "UTF-8","ASCII,JIS,UTF-8,EUC-JP,SJIS-win");
	}elseif ($act == "edit") {
		$entryid = htmlspecialchars($row['entryid']);

		// エントリ本文
		// 日本語データをUTF-8に変換して取得(サーバからはeuc-jpで返ってくる。!!変更方法が分からない)
		$text = $row['entrytext'];
		$text = mb_convert_encoding($text, "UTF-8","ASCII,JIS,UTF-8,EUC-JP,SJIS-win");

		// エントリタイトル
		// 日本語データをUTF-8に変換して取得(サーバからはeuc-jpで返ってくる。!!変更方法が分からない)
		$title = $row['entrytitle'];
		$title = mb_convert_encoding($title, "UTF-8","ASCII,JIS,UTF-8,EUC-JP,SJIS-win");
	}
}

require 'view.php';
?>
