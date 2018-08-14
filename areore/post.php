<?php
require_once '../../website_etc/areore_dbpass.php';
error_reporting(0);

//act に合わせて処理を行う。無ければ、他の制御

$sid = -1;

$host=gethostname();

$error = $title = $text = '';
if(!empty($_POST['entryid'])){
	$entryid = $_POST['entryid'];
}

	$title = $_POST['title'];
$text = $_POST['text'];

if (!strpos($host, 'sakura')){
	$pdo = new PDO("mysql:dbname=areore;host=localhost;unix_socket=/tmp/mysql.sock", $usr, $pass);
}else{
	$pdo = new PDO($dbname , $usr, $pass);
	//よろしくないが、DBのエンコードに対応（さくらインターネットがEUCで、DBを持ってくると意味不明になる
	$title = mb_convert_encoding($title, "EUC-JP","ASCII,JIS,UTF-8,EUC-JP,SJIS-win");//日本語データをUTF-8に変換(どういう形式でDBから吐き出されているか？確認すること)←とりあえずギブアップ
	$text = mb_convert_encoding($text, "EUC-JP","ASCII,JIS,UTF-8,EUC-JP,SJIS-win");
}

if (@$_POST['submit']) {
	if (!$title) $error .= 'タイトルがありません。<br>';
	if (mb_strlen($title) > 80) $error .= 'タイトルが長すぎます。<br>';
	if (!$text) $error .= '本文がありません。<br>';
	if (!$error) {
		date_default_timezone_set('Asia/Tokyo');
		$today = date("Y-m-d H:i:s");

		$st = $pdo->query("INSERT INTO entries(entrytitle,entrytext,date) VALUES('$title','$text','$today')");
		header('Location: index.php');
		exit();
	}
}


if (@$_POST['delete']) {
	//SQLの準備
	$st = $pdo->prepare("DELETE FROM diaryentry WHERE entryid=? ");
	//SQLの発行
	$st->execute(array($entryid));
	header('Location: index.php');
	exit();
}

if (@$_POST['edit']) {

	// UPDATE文を変数に格納
	$sql = "UPDATE diaryentry SET entrytitle = :entrytitle , entrytext = :entrytext WHERE entryid = :entryid";

	// 更新する値と該当のIDは空のまま、SQL実行の準備をする
	$st = $pdo->prepare($sql);
	// 更新する値と該当のIDを配列に格納する
	$params = array(':entrytitle' => $title, ':entrytext' => $text,':entryid' => $entryid);

	// 更新する値と該当のIDが入った変数をexecuteにセットしてSQLを実行
	$st->execute($params);

	header('Location: index.php');
	exit();
}

if (@$_POST['invisible']) {
	// UPDATE文を変数に格納
	$sql = "UPDATE diaryentry SET entryinvisible = :entryinvisible WHERE entryid = :entryid";

	// 更新する値と該当のIDは空のまま、SQL実行の準備をする
	$st = $pdo->prepare($sql);
	// 更新する値と該当のIDを配列に格納する
	$params = array(':entryinvisible' => 1, ':entryid' => $entryid);

	// 更新する値と該当のIDが入った変数をexecuteにセットしてSQLを実行
	$st->execute($params);

	header('Location: index.php');
	exit();
}

echo "問題が起こりました";
echo "<a href=\"./\">編集画面に戻る</a>";
exit();

?>
