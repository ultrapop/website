<?php
// localが含まれる時以外は、とにかくエラー表示しない
$host=gethostname();
if(!strpos($host, 'local')){
	error_reporting(0);
}

include '../common.php';

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
<meta property="og:site_name"  content="キシモトシンジのスクラップブッキング" />
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@ultrapop5">
<?php
//og:url の設定
echo "<meta property=\"og:url\"  content=\"";
echo (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
echo "\" />\n";
?>

<?php

//var_dump();
//og:title og:description の設定
require_once '../../website_etc/dbpass.php';

if(strpos($host, 'sakura.ne.jp')){
	$pdo = new PDO($dbname , $usr, $pass);
}elseif(strpos($host, 'local')){
	$pdo = new PDO($dbname_local, $usr, $pass);
}else{
	exit(0);
}

$entnum=-1;		//  記事数初期値

if(isset($_GET['entnum'])) {	// urlから取得できるなら、一度に表示する記事数を取得する
	$entnum = $_GET['entnum'];
}
// URLからパラメータを取得
// urlから取得できるなら、単独idを取得する
$text="オバケはいないと思います、だって怖いんだもん。怖いオバケをスクラップブッキングして、少しだけ日常を豊かにする。きっと心霊トンネルもほっこりする、生活応援サイトです";
$title = "キシモトシンジのスクラップブッキング";

if(isset($_GET['sid'])) {
	$sid = $_GET['sid'];
	if($entnum == 1){
		$st = $pdo->query("select * from diaryentry where entryid = $sid");
		$row = $st->fetch();
		if($row != FALSE){
			$title = $row['entrytitle'];
			$title = mb_convert_encoding($title, "UTF-8","ASCII,JIS,UTF-8,EUC-JP,SJIS-win");
			$title = htmlspecialchars($title)." ｜キシモトシンジのスクラップブッキング";
			$text = $row['entrytext'];
			$text = mb_convert_encoding($text, "UTF-8","ASCII,JIS,UTF-8,EUC-JP,SJIS-win");
			$text = strip_tags($text);
			$text = str_replace(array("\r\n", "\r", "\n"), '', $text);
			$text = htmlspecialchars($text);
		}
	}
}

echo "<meta property=\"og:description\"  content=\"";
echo $text;
echo "\" />\n";


echo "<meta property=\"og:title\"  content=\"";
echo $title;
echo "\" />\n";

echo "<title>";
echo $title;
echo "</title>\n";


echo "<meta name=\"description\" content=\"";
echo $text;
echo "\" />\n";

//echo "<meta name=\"description\" content=\"";
echo "<meta content=\"";
echo $text;
echo "\" />\n";
?>

<meta property="fb:app_id" content="413049892431122" />
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

<!-- fbコメントプラグインのjsらしきもの（ここで表示しているのではない）-->
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = 'https://connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.10&appId=413049892431122';
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

<!-- fbいいねボタンのjsらしきもの（ここで表示しているのではない）-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.12&appId=1571362842978302&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- twitterボタンのjsらしきもの（ここで表示しているのではない）-->
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

<script type="text/javascript" src="https://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>


<?php
echo "<p hidden>";
echo $text;
echo "</p>\n";
?>

	<div id="headblock">
		<div id="headblkbox">
			<div id="headblkbox_left">
				<img id="kao" src="./cmn/cmnImg/kao.png" alt="キシモトシンジの顔がぷるるんしている">
			</div>
			<div id="headblkbox_right">
				<img id="pyuu"  src="./cmn/cmnImg/pyuu.png" alt="ピュー"><br>


<form>
<input type="button" name="link" value="TOPへ" onclick="jump()">
</form>

<?php

//  上部のコメントをランダム表示する
echoTopCmt2($pdo);
?>

			</div>
		</div>
	</div>
	<div id="headbar"><a  class="headtitlelink1" href=".."><p id="headtitle1">キシモトシンジの</p><p id="headtitle2">ScrapBooking</p></a></div>
	<br>
	<div class="manifest">
		<p class="manifest_text"><br>オバケはいないと思います<br>だって怖いんだもん<br><br>怖いオバケをスクラップブッキングして<br>少しだけ日常を豊かにする<br><br>きっと心霊トンネルもほっこりする<br>生活応援サイトです
		</p>

	</div>
	<div class="contentstop2">
		<a class="contentstoplnk" href=".">キシログ</a>　
		<a class="contentstoplnk" href="https://www.youtube.com/results?search_query=%E3%81%AD%E3%81%93">ネコ動画</a>　
		<a class="contentstoplnk" href="http://www.tdb.co.jp/tosan/index.html">倒産情報</a>
	</div>
	<div id="colums2">
		<div id="entries">

<form name="navi">
<select name="contents" onchange="selectNavi()">
<option>下から選んでね</option>
  <option>https://yahoo.co.jp</option>
  <option>https://google.com</option>
  <option>http://hatena.ne.jp</option>
</select>
</form>

<form>
<input type="button"  value="戻る" onclick="modoru()">
<input type="button"  value="進む" onclick="susumu()">
<input type="button"  value="更新" onclick="koshin()">
</form>

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

// ID取得用のDBアクセス
$st = $pdo->query("SELECT entryid,entryinvisible FROM diaryentry");

//抜けのありうるidを抜けのない配列に並べる
$entryIdArray = array(); // 配列の初期化

while ($row = $st->fetch()) { // オブジェクトとして取得したレコードが残っている限りループ
	//本人のみに表示するか、誰にでも表示するか？
	if ($_SESSION["NAME"] != $loginUsr || !isset($loginUsr)) {
		// 誰にでも見える
		if ($row['entryinvisible'] != 1) {
			$entryIdArray[] = $row['entryid'];
		}
	}else{
		// 持ち主だけに見える
		$entryIdArray[] = $row['entryid'];
	}
}

// 単独ID指定の有無を判断
if ($sid == -1) {
	// 単独IDの指定が無ければ、最新の記事を単独IDをとし、ポインタを取得
	$i = count( $entryIdArray ) - 1; // count(***)は、（配列の大きさ）＝（配列のポインタ最大値＋１）を返してくることに留意
}else{
	// 単独IDが指定されていれば、一致するentryidを配列から探し、ポインタを取得
	for( $i = 0 ; $i < count( $entryIdArray ) - 1 ; $i++ ){
		if ($entryIdArray[ $i ] >= $sid) {
			break;
		}
	}
}

$loopCnt=0; // エントリ出力ループの繰り返し回数

while (1) { // エントリ出力ループ
	$startEntryId = $entryIdArray[ $i - $loopCnt ];
	$st = $pdo->query("select * from diaryentry where entryid = $startEntryId");
	$row = $st->fetch();
	echoEntryRow( $row , ($loopCnt & 1) ^ 1 , $entnum ); // エントリーを１つ出力、左右の振り分けは$loopCntの最下位ビットで判断

	// 終了条件
	if ( $i - $loopCnt <= 0 ) { // 最古の記事を出力したなら終了
		break;
	}
	if ( $loopCnt >= $entnum - 1 ) { // entnum分の記事を出力したなら終了
		break;
	}
	$loopCnt = $loopCnt + 1;
}

echo "</div>";//  id="entries"の終わり

if($mainClms == 2){
	echo "<div id=\"sns\">";
	echo "<div id=\"righttop\">SNS hub</div>";
	echo "<a class=\"twitter-timeline\" data-width=\"400\" data-height=\"800\" data-theme=\"light\" href=\"https://twitter.com/ultrapop5?ref_src=twsrc%5Etfw\">Tweets by ultrapop5</a> <script async src=\"https://platform.twitter.com/widgets.js\" charset=\"utf-8\"></script>";
	//InstaWidget
	echo "<a href=\"https://instawidget.net/v/user/kishimotoshinji\" id=\"link-54e107b36d9bae3da99148f8d6c40497fe7e7a4017faeb2d04ceb7fa1298b14f\">@kishimotoshinji</a>";
	echo "<script src=\"https://instawidget.net/js/instawidget.js?u=54e107b36d9bae3da99148f8d6c40497fe7e7a4017faeb2d04ceb7fa1298b14f&width=300px\"></script>";
	
	echo "<iframe src=\"https://tools.applemusic.com/embed/v1/playlist/pl.u-11zBvR3TBNEep?country=jp\" height=\"700px\" width=\"100%\" frameborder=\"0\"></iframe>";
	echo "</div>";//  id="sns"の終わり
}

echo "</div>";//  id="colums2"の終わり

echo "<div id=\"btmlnk\">";

// -- これより古い記事があればリンクを生成

// デフォルトでは５件を表示
if( $i - $loopCnt > 0){ // エントリ出力ループで、 一番古い記事を表示していないか？＝つまりもう過去記事はない
	$startEntryId = $entryIdArray[ $i - $loopCnt - 1];
	echo "<a class=\"nextprev\"  href=\"./?sid=$startEntryId&entnum=$DEFAULT_ENTRY_NUM\">";
	echo "<img src=\"./cmn/cmnImg/left.png\" alt=\"歴史深い\">";
	echo "</a>";

	if ($entnum == 1) {// 一度に表示するエントリが１つだけの時は、特定の記事を移行できるようにしておく
		$startEntryId = $entryIdArray[ $i - $loopCnt - 1];
		echo "<a class=\"nextprev\"  href=\"./?sid=$startEntryId&entnum=$SINGLE_ENTRY_NUM\">";
		echo "<img src=\"./cmn/cmnImg/left_l.png\" alt=\"１つ古い\">";
		echo "</a>";
	}
}

// -- TOPへ
echo "<a class=\"nextprev\"  href=\"./?entnum=$DEFAULT_ENTRY_NUM\">";
echo "<img src=\"./cmn/cmnImg/up.png\" alt=\"TOP\">";
echo "</a>";

// これより新しい記事があればリンクを生成
if( $i < count( $entryIdArray ) - 1){
	// 一度に表示するエントリが１つだけの時は、特定の記事を移行できるようにしておくリンク
	if ($entnum == 1) {
		$j = $i + $SINGLE_ENTRY_NUM;
		if( $j > count( $entryIdArray ) - 1){
			$j = count( $entryIdArray ) - 1;
		}
		$startEntryId = $entryIdArray[ $j ];

		echo "<a class=\"nextprev\" href=\"./?sid=$startEntryId&entnum=$SINGLE_ENTRY_NUM\">";
		echo "<img src=\"./cmn/cmnImg/right_l.png\" alt=\"１つ新しい\">";
		echo "</a>";
	}

	// デフォルト件数分の表示へのリンク
	$i = $i + $DEFAULT_ENTRY_NUM;
	if( $i > count( $entryIdArray ) - 1){
		$i = count( $entryIdArray ) - 1;
	}
	$startEntryId = $entryIdArray[ $i ];

	echo "<a class=\"nextprev\" href=\"./?sid=$startEntryId&entnum=$DEFAULT_ENTRY_NUM\">";
	echo "<img src=\"./cmn/cmnImg/right.png\" alt=\"ナウい\">";
	echo "</a>";
}

echo "</div>";
//<!-- fbコメント欄 appId=413049892431122 -->
echo "<div class=\"whitebox\"><div class=\"fb-comments\" data-href=\"https://kisimoto.sakura.ne.jp/\" data-width=\"800\" data-numposts=\"5\"></div></div>";


?>
<script type="text/javascript" src="test.js"></script>
<div id="bottompict">


</div>
</body>
</html>
