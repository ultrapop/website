<?php
// localが含まれる時以外は、とにかくエラー表示しない
$host=gethostname();
if(!strpos($host, 'local')){
	error_reporting(0);
}

//act に合わせて処理を行う。無ければ、他の制御

require_once '../website_etc/dbpass.php';

$error = $title = $text = '';

if(strpos($host, 'sakura.ne.jp')){
	$pdo = new PDO($dbname , $usr, $pass);
}elseif(strpos($host, 'local')){
	$pdo = new PDO("mysql:dbname=test;host=localhost;unix_socket=/tmp/mysql.sock", $usr, $pass);
}else{
	exit(0);
}

if (@$_POST['visible']) {
	// UPDATE文を変数に格納
	$sql = "UPDATE diaryentry SET entryinvisible = :entryinvisible WHERE entryid = :entryid";

	// 更新する値と該当のIDは空のまま、SQL実行の準備をする
	$st = $pdo->prepare($sql);
	// 更新する値と該当のIDを配列に格納する
	$params = array(':entryinvisible' => 0, ':entryid' => $_POST['visid']);

	// 更新する値と該当のIDが入った変数をexecuteにセットしてSQLを実行
	$st->execute($params);

	header('Location: index.php');
	exit();
}

?>
