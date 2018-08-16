<?php
include 'common.php';
require_once '../../website_etc/areore_dbpass.php';
error_reporting(0);

session_start([
	'cookie_lifetime' => 864000,
]);

//act に合わせて処理を行う。無ければ、他の制御

$sid = -1;

$host=gethostname();


$error = $title = $text = '';
if(!empty($_POST['entryid'])){
	$entryid = $_POST['entryid'];
}

if(strpos($host, 'sakura.ne.jp')){
	$pdo = new PDO($dbname , $usr, $pass);
	//よろしくないが、DBのエンコードに対応（さくらインターネットがEUCで、DBを持ってくると意味不明になる
	$title = mb_convert_encoding($title, "UTF-8","ASCII,JIS,UTF-8,EUC-JP,SJIS-win");//日本語データをUTF-8に変換(どういう形式でDBから吐き出されているか？確認すること)←とりあえずギブアップ
	$text = mb_convert_encoding($text, "UTF-8","ASCII,JIS,UTF-8,EUC-JP,SJIS-win");
}elseif(strpos($host, 'local')){
	$pdo = new PDO($dbname_local, $usr, $pass);
}else{
	exit(0);
}


if (isset($_POST['areore'])) {
	echoUA_lyr0();//ユーザーエージェント別にCSSをechoする
	$ua = $_SERVER['HTTP_USER_AGENT'];
	$mainClms = 1; // メインの段組み１カラム（デフォルト）
	
	if ((strpos($ua, 'Android') !== false) && (strpos($ua, 'Mobile') !== false) || (strpos($ua, 'iPhone') !== false) || (strpos($ua, 'Windows Phone') !== false)) {
		// スマートフォンからアクセスされた場合
		echo "<link rel=\"stylesheet\" href=\"./smph_areore.css\" type=\"text/css\">";
	
	} elseif ((strpos($ua, 'Android') !== false) || (strpos($ua, 'iPad') !== false)) {
		// タブレットからアクセスされた場合
		echo "<link rel=\"stylesheet\" href=\"./areore.css\" type=\"text/css\">";
	
	} elseif ((strpos($ua, 'DoCoMo') !== false) || (strpos($ua, 'KDDI') !== false) || (strpos($ua, 'SoftBank') !== false) || (strpos($ua, 'Vodafone') !== false) || (strpos($ua, 'J-PHONE') !== false)) {
		// 携帯からアクセスされた場合
		echo "<link rel=\"stylesheet\" href=\"./areore.css\" type=\"text/css\">";
	} else {
		// その他（PC）からアクセスされた場合
		echo "<link rel=\"stylesheet\" href=\"./areore.css\" type=\"text/css\">";
		$mainClms = 2; // メインの段組み１カラム
	}
	
	if(!isset($_POST['wid']) || !isset($_POST['title']) || !isset($_POST['text']) || $_POST['userid'] != $_SESSION["NAME"]){
		header('Location: index.php');
		exit();
	}
	$title = $_POST['title'];
	$text = $_POST['text'];

	echo "<fieldset class=\"post\">";
	echo "<legend>アレオレ！して、あなたの書込であることを表明しますか？</legend>";
	echo "<form method=\"post\" action=\"./areore.php\">";
	echo "<input class=\"areore_button\" name=\"submit\" type=\"submit\" value=\"アレオレ！\" >";
	$wid = $_POST['wid'];
	echo "<input name=\"wid\" type=\"hidden\" value=\"$wid\" >";
	echo "</form>";
	echo "</div>";
	echo "<table><tr><td class=\"col1\">id : </td><td>";
	echo $_POST['wid'];
	echo "</td></tr><tr><td class=\"col1\">";
	echo "title :</td><td>";
	echo $_POST['title'];
	echo "</td></tr><tr><td class=\"col1\">";
	echo "datetime :</td><td>";
	echo $_POST['date'];
	echo "</td></tr><tr><td class=\"col1\">";
	echo "text : </td><td>";
	echo $_POST['text'];
	echo "</td></tr></table>";
	echo "</fieldset>";
	exit();
}


if (@$_POST['submit']) {

	$id=$_POST['wid'];
	// UPDATE文を変数に格納
	$sql = "UPDATE entries SET areore = :areore WHERE id = :id";

	// 更新する値と該当のIDは空のまま、SQL実行の準備をする
	$st = $pdo->prepare($sql);
	// 更新する値と該当のIDを配列に格納する
	$params = array(':areore' => 1,':id' => $id);

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
echo $error;
echo "問題が起こりました";
echo "<a href=\"./\">編集画面に戻る</a>";
exit();

?>
