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

</head>
<body>
<p id="topTitle">アレオレ！</p>

<?php
$text="「何を書いたか？」が、「誰が書いたか？」よりも書き手の評価になるライティングサイト";
echo "<p hidden>";//なんかのSNSでdescriptionだかなんだかを設定するのに必要だったはず
echo $text;
echo "</p>\n";

if (isset($_SESSION["NAME"])) {
	echo "ようこそ";
	echo $_SESSION["NAME"];
	echo "さん　";
	echo "　<a href=\"./logout.php\">ログアウト</a></p>";
}else{
	echo "　<a href=\"./login.php\">ログイン</a></p>";

}


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
	
		echo "<br>";
		echo $entryid;
		echo $title;
		echo "<br>";
		echo $text;
		echo "<br>";
		echo "<br>";
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
	echo "<a href=\"./control\">control</a>";
	echo "</div>";
	echo "</form>";

}

?>
<div id="bottompict">
</div>
</body>
</html>
