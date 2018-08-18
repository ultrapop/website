<?php
// localが含まれる時以外は、とにかくエラー表示しない
$host=gethostname();
if(!strpos($host, 'local')){
	error_reporting(0);
}

include 'common.php';

//セッションを開始し、持ち主だけに見えるエントリを表示するか否かを判断する
session_start([
	'cookie_lifetime' => 864000,
]);

?>

<!DOCTYPE html>
<html>
<head>

<link rel="icon" type="image/x-icon" href="https://kisimoto.sakura.ne.jp/cmn/cmnImg/upfav.ico">
<link rel="shortcut icon" type="image/x-icon" href="https://kisimoto.sakura.ne.jp/cmn/cmnImg/upfav.ico">

<meta property="og:image" content="https://kisimoto.sakura.ne.jp/cmn/cmnImg/kao2.png" />
<meta property="og:type"   content="website" />
<meta property="og:site_name"  content="アレオレ" />
<!-- meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@ultrapop5" -->

<?php
//og:url の設定
echo "<meta property=\"og:url\"  content=\"";
echo (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
echo "\" />\n";
?>

<?php

//var_dump();
//og:title og:description の設定
require_once '../../website_etc/areore_dbpass.php';

if(strpos($host, 'sakura.ne.jp')){
	$pdo = new PDO($dbname , $usr, $pass);
}elseif(strpos($host, 'local')){
	$pdo = new PDO($dbname_local, $usr, $pass);
}else{
	exit(0);
}

?>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">


<?php
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
?>

<title>アレオレ！</title>
</head>
<body>
<div id="topTitle">アレオレ！</div>
<div id="topSubTitle">フラットな評価がフィードバックされる書込みサイト</div>

<?php
$text="フラットな評価がフィードバックされる書込みサイト";
echo "<p hidden>";//なんかのSNSでdescriptionだかなんだかを設定するのに必要だったはず
echo $text;
echo "</p>\n";
echo "<div id=\"welcome\">";
if (isset($_SESSION["NAME"])) {
	echo "ようこそ";
	echo $_SESSION["NAME"];
	echo "さん　";
	echo "　<a href=\"./logout.php\">ログアウト</a>";
	echo "　<a href=\"./mypage.php\">マイページ</a></p>";
}else{
	echo "書き込むには　<a href=\"./login.php\">ログインまたは新規登録</a></p>";
}
echo "</div>";


?>

<div id="entries">
<?php

// ・id初期値を取得する
// ・表示数を取得する
// いずれもurlから取得できなければ、最新５件を表示

$DEFAULT_ENTRY_NUM = 3;// !!定数定義で良いので、気が向いたら直す
$SINGLE_ENTRY_NUM = 1;

$entnum=$DEFAULT_ENTRY_NUM;	//  幅付きid初期値（デフォルト有効）
$sid=-1;		//  単独id初期値

// URLからパラメータを取得
// urlから取得できるなら、単独idを取得する
if(isset($_GET['sid'])) {
	$sid = $_GET['sid'];
}
if(isset($_GET['entnum'])) {	// urlから取得できるなら、一度に表示する記事数を取得する
	$entnum = $_GET['entnum'];
	if($entnum < 1){ // 下限値制御
		$entnum = 1;
	}
	if($entnum > 20){ // 上限値制御
		$entnum =　20;
	}
}

$st = $pdo->query("select * from entries");

while (1) { // エントリ出力ループ
	if($row = $st->fetch()){
		$entryid = htmlspecialchars($row['id']);

		// エントリ本文
		// 日本語データをUTF-8に変換して取得(サーバからはeuc-jpで返ってくる。!!変更方法が分からない)
		$text = $row['entrytext'];
		$text = mb_convert_encoding($text, "UTF-8","ASCII,JIS,UTF-8,EUC-JP,SJIS-win");
	
		// エントリタイトル
		// 日本語データをUTF-8に変換して取得(サーバからはeuc-jpで返ってくる。!!変更方法が分からない)
		$title = $row['entrytitle'];
		$title = mb_convert_encoding($title, "UTF-8","ASCII,JIS,UTF-8,EUC-JP,SJIS-win");
		$title = htmlspecialchars($title);

		$dtt = htmlspecialchars($row['date']);

		$wUserId =  htmlspecialchars($row['wUserId']);
	
		echo "<p class=\"entryId\">";
		echo $entryid;
		echo "</p><p class=\"entryTitle\">";
		echo $title;
		echo "</p>";

		if($wUserId === $_SESSION["NAME"]){
			//自分の書込なら
			if($row['areore'] == 1){
				//アレオレ済み
				echo "<p class=\"ｗUser\">";
				echo $wUserId;
				echo " さん（アレオレ！済み）";
				echo "</p>";
			}else{
				//アレオレしてない
				echo "<p class=\"ｗUser\">";
				echo $wUserId;
				echo "(非公表)</p>";
				if($row['wUserId'] == 0){
					echo "<form class=\"areore\" method=\"post\" action=\"./areore.php\">";
					echo "<div class=\"post\">";
					echo "<input class=\"button_areore\" name=\"areore\" type=\"submit\" value=\"アレオレする！\" >";
					echo "<input name=\"wid\" type=\"hidden\" value=\"$entryid\" >";
					echo "<input name=\"userid\" type=\"hidden\" value=\"$wUserId\" >";
					echo "<input name=\"title\" type=\"hidden\" value=\"$title\" >";
					echo "<input name=\"date\" type=\"hidden\" value=\"$dtt\" >";
					echo "<input name=\"text\" type=\"hidden\" value=\"$text\" >";
					echo "</div>";
					echo "</form>";
				}
			}
		}else{
			//他人の書込、ログアウト中なら
			if($row['areore'] == 1){
				echo "<p class=\"ｗUser\">";
				echo $wUserId;
				echo " さん";
				echo "</p>";
			}
		}

		echo "<p class=\"entryDateTime\">";
		echo $dtt;
		echo "</p><p class=\"entryText\">";
		echo $text;
		echo "</p>";
		// 終了条件
	}else{
		break;
	}
}

echo "</div>";//  id="entries"の終わり

if (isset($_SESSION["NAME"])) {

	echo "<form method=\"post\" action=\"./post.php\">";
	echo "<div class=\"post\">";
	echo "<p class=\"inputTitle\">題名<input class=\"inputTitle\" type=\"text\" name=\"title\" size=\"70\" value=\"\"></p>";
	echo "<p class=\"inputTitle\">本文<br></p><textarea class=\"inputText\" name=\"text\" rows=\"25\">";
	echo "</textarea>";
	echo "<input class=\"button\" name=\"submit\" type=\"submit\" value=\"投稿\" >";
	echo "</div>";
	echo "</form>";

}

?>
<div id="bottompict">
</div>
</body>
</html>
