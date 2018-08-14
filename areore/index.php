<?php
// localが含まれる時以外は、とにかくエラー表示しない
$host=gethostname();
if(!strpos($host, 'local')){
	error_reporting(0);
}

include 'common.php';

//セッションを開始し、持ち主だけに見えるエントリを表示するか否かを判断する
if( !isset( $_SESSION ) ) {
	session_start([
		'cookie_lifetime' => 864000,
	]);
}
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
	$pdo = new PDO("mysql:dbname=areore;host=localhost;unix_socket=/tmp/mysql.sock", $usr, $pass);
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
		echo "<link rel=\"stylesheet\" href=\"./smph_diary.css\" type=\"text/css\">";

	} elseif ((strpos($ua, 'Android') !== false) || (strpos($ua, 'iPad') !== false)) {
    	// タブレットからアクセスされた場合
		echo "<link rel=\"stylesheet\" href=\"./diary.css\" type=\"text/css\">";

	} elseif ((strpos($ua, 'DoCoMo') !== false) || (strpos($ua, 'KDDI') !== false) || (strpos($ua, 'SoftBank') !== false) || (strpos($ua, 'Vodafone') !== false) || (strpos($ua, 'J-PHONE') !== false)) {
    	// 携帯からアクセスされた場合
		echo "<link rel=\"stylesheet\" href=\"./diary.css\" type=\"text/css\">";
	} else {
    	// その他（PC）からアクセスされた場合
		echo "<link rel=\"stylesheet\" href=\"./diary.css\" type=\"text/css\">";
		$mainClms = 2; // メインの段組み１カラム
	}
?>

</head>
<body>


<?php
$text="オバケはいないと思います、だって怖いんだもん。怖いオバケをスクラップブッキングして、少しだけ日常を豊かにする。きっと心霊トンネルもほっこりする、生活応援サイトです";
echo "<p hidden>";//なんかのSNSでdescriptionだかなんだかを設定するのに必要だったはず
echo $text;
echo "</p>\n";

?>
	<div id="colums2">
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

// どうせたくさん最新に戻りたいときもあるのだから、まずはentryidですべて管理する
//  １．とりあえずentryidのみの配列をdbから取得する（降順で）
//  ２．ループを走らせて、$sidと一致する場所を探す（無ければ、踏み越えた位置で？）
//  ３．一致した場所のiを探す
//  ４．一致した場所のiからentnumを引いた値にある内容が前に行くときのsid
//  ５．一致した場所のiにentnumを足した値にある内容が過去に行くときのsid

// エントリを管理するためIDをあらかじめ取得するが、問題点もある!!
//・問題点１．少なくとも２回はアクセスするので、その間に削除が入った場合につじつまが合わなくなる
//					→削除そのものがレアなので、いらないのでは？
//					→ＤＢをロックする方法を調べる
//・問題点２．エントリ数が増えた場合に処理時間がそれなりに掛かりそう
//					→計算量が大きくなるものは、なるべくMySqlで処理したいが、、、

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
//		if ( $i - $loopCnt <= 0 ) { // 最古の記事を出力したなら終了
//			break;
//		}
//		if ( $loopCnt >= $entnum - 1 ) { // entnum分の記事を出力したなら終了
//			break;
//		}
//		$loopCnt = $loopCnt + 1;
	}else{
		break;
	}
}

echo "</div>";//  id="entries"の終わり

echo "</div>";//  id="colums2"の終わり

//<!-- fbコメント欄 appId=413049892431122 -->fbコメント機能廃止のためコメントアウト
//echo "<div class=\"whitebox\"><div class=\"fb-comments\" data-href=\"https://kisimoto.sakura.ne.jp/\" data-width=\"800\" data-numposts=\"5\"></div></div>";

if ($_SESSION["NAME"] == $loginUsr && isset($loginUsr)) {

	echo "<form method=\"post\" action=\"./post.php\">";
	echo "<div class=\"post\">";
	echo "<p class=\"inputTitle\">題名<input class=\"inputTitle\" type=\"text\" name=\"title\" size=\"70\" value=";
	echo "></p>";
	echo "<p class=\"inputTitle\">本文<br><textarea class=\"inputText\" name=\"text\" rows=\"25\">";
	echo "</textarea></p>";
	echo "<input class=\"button\" name=\"submit\" type=\"submit\" value=\"投稿\" >";
	echo "　<a href=\"./control\">control</a></p>";
	echo "</div>";
	echo "</form>";

}

?>
<div id="bottompict">


</div>
</body>
</html>
