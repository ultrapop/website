<?php
//act に合わせて処理を行う。無ければ、他の制御

$sid = -1;
$act = "";

require_once '../../../website_etc/dbpass.php';

if(strpos($host, 'sakura.ne.jp')){
	$pdo = new PDO($dbname , $usr, $pass);
}elseif(strpos($host, 'local')){
	$pdo = new PDO($dbname_local, $usr, $pass);
}else{
	exit(0);
}

// URLからパラメータを取得
// urlから取得できるなら、単独idを取得する
if(isset($_GET['sid'])) {
	$sid = $_GET['sid'];
}

$deltitle=$deltext="";

if(isset($_GET['act'])) {	// urlから取得できるなら、一度に表示する記事数を取得する
	$act = $_GET['act'];
	$st = $pdo->query("SELECT * FROM diaryentry WHERE entryid = $sid");// !!取得に失敗するケースを無視している

	$row = $st->fetch(); // エントリ出力ループ
	//エントリid 単独id記事へのリンクに使用する

	if ($act == "del") {
		$delentryid = htmlspecialchars($row['entryid']);

		// エントリ本文
		// 日本語データをUTF-8に変換して取得(サーバからはeuc-jpで返ってくる。!!変更方法が分からない)
		$deltext = $row['entrytext'];
		$deltext = mb_convert_encoding($deltext, "UTF-8","ASCII,JIS,UTF-8,EUC-JP,SJIS-win");

		// エントリタイトル
		// 日本語データをUTF-8に変換して取得(サーバからはeuc-jpで返ってくる。!!変更方法が分からない)
		$deltitle = $row['entrytitle'];
		$deltitle = mb_convert_encoding($deltitle, "UTF-8","ASCII,JIS,UTF-8,EUC-JP,SJIS-win");
	}elseif ($act == "edit") {
		$editentryid = htmlspecialchars($row['entryid']);

		// エントリ本文
		// 日本語データをUTF-8に変換して取得(サーバからはeuc-jpで返ってくる。!!変更方法が分からない)
		$edittext = $row['entrytext'];
		$edittext = mb_convert_encoding($edittext, "UTF-8","ASCII,JIS,UTF-8,EUC-JP,SJIS-win");

		// エントリタイトル
		// 日本語データをUTF-8に変換して取得(サーバからはeuc-jpで返ってくる。!!変更方法が分からない)
		$edittitle = $row['entrytitle'];
		$edittitle = mb_convert_encoding($edittitle, "UTF-8","ASCII,JIS,UTF-8,EUC-JP,SJIS-win");
	}
}

$PASS_WORD = "super123sex";

$error = $title = $content = '';
if (@$_POST['submit']) {
	$title = $_POST['title'];
	$content = $_POST['content'];
	$password = $_POST['passwd'];
	if($password == $PASS_WORD){
		if (!$title) $error .= 'タイトルがありません。<br>';
		if (mb_strlen($title) > 80) $error .= 'タイトルが長すぎます。<br>';
		if (!$content) $error .= '本文がありません。<br>';
		if (!$error) {
			$title = mb_convert_encoding($title, "EUC-JP","ASCII,JIS,UTF-8,EUC-JP,SJIS-win");//日本語データをUTF-8に変換(どういう形式でDBから吐き出されているか？確認すること)←とりあえずギブアップ
			$content = mb_convert_encoding($content, "EUC-JP","ASCII,JIS,UTF-8,EUC-JP,SJIS-win");

			date_default_timezone_set('Asia/Tokyo');
			$today = date("Y-m-d");

			$st = $pdo->query("INSERT INTO diaryentry(entrytitle,entrytext,entrydate) VALUES('$title','$content','$today')");
		}
		header('Location: index.php');
		exit();
	}
}


if (@$_POST['delete']) {
	$password = $_POST['passwd'];
	if($password == $PASS_WORD){
		$delid = $_POST['delid'];
		//SQLの準備
		$st = $pdo->prepare("DELETE FROM diaryentry WHERE entryid=? ");
		//SQLの発行
		$st->execute(array($delid));
	}
	header('Location: index.php');
	exit();
}

if (@$_POST['edit']) {
	$editid = $_POST['editid'];
	$edittitle = $_POST['edittitle'];
	$edittitle = mb_convert_encoding($edittitle, "EUC-JP","ASCII,JIS,UTF-8,EUC-JP,SJIS-win");
	$edittext = $_POST['edittext'];
	$edittext = mb_convert_encoding($edittext, "EUC-JP","ASCII,JIS,UTF-8,EUC-JP,SJIS-win");

	$password = $_POST['passwd'];
	if($password == $PASS_WORD){
		// UPDATE文を変数に格納
		$sql = "UPDATE diaryentry SET entrytitle = :entrytitle , entrytext = :entrytext WHERE entryid = :entryid";

		// 更新する値と該当のIDは空のまま、SQL実行の準備をする
		$st = $pdo->prepare($sql);

		// 更新する値と該当のIDを配列に格納する
		$params = array(':entrytitle' => $edittitle, ':entrytext' => $edittext,':entryid' => $editid);

		// 更新する値と該当のIDが入った変数をexecuteにセットしてSQLを実行
		$st->execute($params);
	}
	header('Location: index.php');
	exit();
}

require 'view.php';
?>
