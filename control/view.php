<?php

error_reporting(0);
//include '../common.php';
require_once '../../website_etc/dbpass.php';
session_start();

// ログイン状態チェック
// $loginUsrを読みにいかずにnullが通らないように issetも見る
if ($_SESSION["NAME"] != $loginUsr || !isset($loginUsr)) {
    header("Location: logout.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<a href="./">ウルトラポップエントリ編集ツール</a><br>
<a href="./logout.php">ログアウト</a><br>
<meta charset="utf-8">
<title>記事投稿</title>

<?php
	$ua = $_SERVER['HTTP_USER_AGENT'];
	$mainClms = 1; // メインの段組み１カラム（デフォルト）

	if ((strpos($ua, 'Android') !== false) && (strpos($ua, 'Mobile') !== false) || (strpos($ua, 'iPhone') !== false) || (strpos($ua, 'Windows Phone') !== false)) {
    	// スマートフォンからアクセスされた場合
		echo "<link rel=\"stylesheet\" href=\"smph_postview.css\">";

	} elseif ((strpos($ua, 'Android') !== false) || (strpos($ua, 'iPad') !== false)) {
    	// タブレットからアクセスされた場合
		echo "<link rel=\"stylesheet\" href=\"smph_postview.css\">";

	} elseif ((strpos($ua, 'DoCoMo') !== false) || (strpos($ua, 'KDDI') !== false) || (strpos($ua, 'SoftBank') !== false) || (strpos($ua, 'Vodafone') !== false) || (strpos($ua, 'J-PHONE') !== false)) {
    	// 携帯からアクセスされた場合
		echo "<link rel=\"stylesheet\" href=\"smph_postview.css\">";
	} else {
    	// その他（PC）からアクセスされた場合
		echo "<link rel=\"stylesheet\" href=\"postview.css\">";
	}
?>


</head>
<body>
<form method="post" action="post.php">
	<div class="post">
		<p class="inputTitle">編集ID<input class="inputID" type="text" name="entryid" size="5" readonly="readonly" value="<?php echo $entryid ?>"></p>
		<p class="inputTitle">題名<input class="inputTitle" type="text" name="title" size="40" value="<?php echo $title ?>"></p>
		<p class="inputTitle">本文<br><textarea class="inputText" name="text" rows="15"><?php echo $text ?></textarea></p>
		<input class="button" name="submit" type="submit" value="投稿" >　<input class="button" name="edit" type="submit" value="編集">　<input class="button" name="delete" type="submit" value="削除">　<input class="button" name="invisible" type="submit" value="非表示"></p>
	</div>
</form>
<?php
// １．DBにアクセスして、一覧を取得する
// ２．一覧を表示し、編集する場合のリンクを作成する
// ３．リンク先で、削除とか出来るようにする
// ４．超危険なので、パスワードを掛ける

require_once '../../website_etc/dbpass.php';

$host=gethostname();

if (!strpos($host, 'sakura')){
	$pdo = new PDO("mysql:dbname=test;host=localhost;unix_socket=/tmp/mysql.sock", $usr, $pass);
}else{
	$pdo = new PDO($dbname , $usr, $pass);
}

$st = $pdo->query("SELECT * FROM diaryentry ORDER BY entryid DESC");

while ($row = $st->fetch()) { // エントリ出力ループ
	//エントリid 単独id記事へのリンクに使用する
	$entryid = htmlspecialchars($row['entryid']);

	// エントリ本文
	// 日本語データをUTF-8に変換して取得(サーバからはeuc-jpで返ってくる。!!変更方法が分からない)
	$text = $row['entrytext'];
	$text = mb_convert_encoding($text, "UTF-8","ASCII,JIS,UTF-8,EUC-JP,SJIS-win");

	// エントリタイトル
	// 日本語データをUTF-8に変換して取得(サーバからはeuc-jpで返ってくる。!!変更方法が分からない)
	$title = $row['entrytitle'];
	$title = mb_convert_encoding($title, "UTF-8","ASCII,JIS,UTF-8,EUC-JP,SJIS-win");

	// エントリ日付
	$dtt = htmlspecialchars($row['entrydate']);

	echo "$entryid ：";
	echo "$title ：";
	echo "$dtt ：";
	$text=strip_tags($text );
	$text=mb_substr($text ,0,20);
	echo "$text ：";

	echo "<a href=\"./?sid=$entryid&act=del\">削除</a> ：";
	echo "<a href=\"./?sid=$entryid&act=edit\">編集</a><br>";
}

?>

</body>
</html>
