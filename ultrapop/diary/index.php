<!DOCTYPE html>
<html>
<head>
<title>ウルトラポップ宣言</title>

<link rel="icon" type="image/x-icon" href="https://kisimoto.sakura.ne.jp/ultrapop/cmn/cmnImg/upfav.ico">
<link rel="shortcut icon" type="image/x-icon" href="https://kisimoto.sakura.ne.jp/ultrapop/cmn/cmnImg/upfav.ico">

<meta property="og:type"   content="website" />
<meta property="og:url"    content="https://kisimoto.sakura.ne.jp/ultrapop" />
<meta property="og:title"  content="ウルトラポップ宣言" />
<meta property="og:site_name"  content="キシモトシンジのウルトラポップ宣言" />

<meta property="og:image"  content="https://kisimoto.sakura.ne.jp/ultrapop/cmn/cmnImg/og_img.jpeg" />
<meta property="og:description"  content="私という世界の存在を表現する意志にウルトラポップという名をあてて検討し、実践して生きていくことについてのサイトです。おもしろいことをドッカンドッカンやりまくってゲラゲラ笑いながら死ぬだけです" />

<meta property="fb:app_id" content="413049892431122" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta name="viewport" content="width=device-width,initial-scale=1">

<?php
include '../common.php';

echoUA_lyr2();//ユーザーエージェント別にCSSをechoする
	$ua = $_SERVER['HTTP_USER_AGENT'];

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

	<div id="headblock">
		<div id="headblkbox">
			<div id="headblkbox_left">
				<img id="kao" src="../cmn/cmnImg/kao.png" alt="キシモトシンジの顔がぷるるんしている">
			</div>
			<div id="headblkbox_right">
				<img id="pyuu"  src="../cmn/cmnImg/pyuu.png" alt="ピュー"><br>


<?php

require_once '../../../website_etc/dbpass.php';

$host=gethostname();

if (strpos($host, 'local')){
	$pdo = new PDO("mysql:dbname=test;host=localhost;unix_socket=/tmp/mysql.sock", $usr, $pass);
}else{
	$pdo = new PDO($dbname , $usr, $pass);
}

//  上部のコメントをランダム表示する
echoTopCmt($pdo);
?>

			</div>
		</div>
	</div>
	<div id="headbar"><a  class="headtitlelink1" href=".."><p id="headtitle1">キシモトシンジの</p><p id="headtitle2">ウルトラポップ宣言</p></a></div>
	<br>
	<div class="manifest">
		<p class="manifest_text"><br>世界が存在するわけの分からなさを受けいれて、<br>それでも世界として湧き上がっていることを真摯に驚愕し、<br>命のきらめきを楽しんで味わうんだよ！<br><br>それは生の意味の闘いだよ。<br><br>生まれつき備わったわくわくする力を全部使って<br>見るんだよ！動くんだよ！愛すんだよ！聴くんだよ！考えるんだよ！
<!--			優越感、自己憐憫に浸るよりも命がけで生きろ、圧倒的に美しく貴重な生をぼんやり過ごすな、感情は愛し耳を澄ませるものだ、それに打ち倒されるな、怠惰な自分を揺さぶり何かやれ。他者や社会に貢献するのは本能だ、目覚めさせて誰かを助けろ、楽しませろ、足を踏み出させろ！（胸踊る先人の成果物に触れるたび、僕ら止めかけた足を踏み出してきたじゃないか）。うんこー！<br><br>
			たかるな、まやかしには溺れるな。楽しいことはどんどんやっていいんだけどさ、でもただ繰り返しぼんやり口を開けて流し込もうとするな、頼るな。足りないものは外から埋めることはできない、結局は自分の中から湧き上がらせ、それを”やる”しかないんだ。自分の中を旅しろ、孤独のまま、その楽園のような地獄を歩き通すんだよ。頭を使って考えて、論理が崩壊するまで追い回すんだよ。その果てで破綻した記号の残骸、戻ってきちゃったスタート地点に腹抱えて笑えばいい（だから僕はひねくれ倒した笑いが大好き！！）、結果、自分の中の迷宮を打ち壊すことになろうとも、スタート地点で立つ手の中に今までもっていなかったナニガシかが握られているのだから。正しさなんて間違いの残りカスでしかない、それを「みんながそういうから」にまかせずにさ、自分でやろうよ。うんこー！ -->
		</p>

	</div>
	<div class="contentstop2">
		<a class="contentstoplnk" href="..">宣言</a>　
		<a class="contentstoplnk" href="../about">ウルトラポップとは</a>　
		<a class="contentstoplnk" href=".">キシログ</a>
	</div>
	<div id="hetriestop">キシログ
	</div>
	<div id="entries">
<?php
// ・id初期値を取得する
// ・表示数を取得する
// いずれもurlから取得できなければ、最新５件を表示

$entnum=5;	//  幅付きid初期値（デフォルト有効）
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
$st = $pdo->query("SELECT entryid FROM diaryentry");

//抜けのありうるidを抜けのない配列に並べる
$entryIdArray = array(); // 配列の初期化
while ($row = $st->fetch()) { // オブジェクトとして取得したレコードが残っている限りループ
	$entryIdArray[] = $row['entryid'];
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


echo "<div id=\"btmlnk\">";

// -- これより古い記事があればリンクを生成
$DEFAULT_ENTRY_NUM = 5;// !!定数定義で良いので、気が向いたら直す
$SINGLE_ENTRY_NUM = 1;

// デフォルトでは５件を表示
if( $i - $loopCnt > 0){ // エントリ出力ループで、 一番古い記事を表示していないか？＝つまりもう過去記事はない
	$startEntryId = $entryIdArray[ $i - $loopCnt - 1];
	echo "<a class=\"nextprev\"  href=\"./?sid=$startEntryId&entnum=$DEFAULT_ENTRY_NUM\">";
	echo "歴史に深みある記事へ←";
	echo "</a>";

	if ($entnum == 1) {// 一度に表示するエントリが１つだけの時は、特定の記事を移行できるようにしておく
		$startEntryId = $entryIdArray[ $i - $loopCnt - 1];
		echo "<a class=\"nextprev\"  href=\"./?sid=$startEntryId&entnum=$SINGLE_ENTRY_NUM\">";
		echo "深←";
		echo "</a>";
	}
}

// -- TOPへ
echo "<a class=\"nextprev\"  href=\"./?entnum=5\">";
echo "TOP↑";
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
		echo "→新";
		echo "</a>";
	}

	// デフォルト件数分の表示へのリンク
	$i = $i + $DEFAULT_ENTRY_NUM;
	if( $i > count( $entryIdArray ) - 1){
		$i = count( $entryIdArray ) - 1;
	}
	$startEntryId = $entryIdArray[ $i ];

	echo "<a class=\"nextprev\" href=\"./?sid=$startEntryId&entnum=$DEFAULT_ENTRY_NUM\">";
	echo "→ナウい記事へ";
	echo "</a>";
}

//<!-- fbコメント欄 appId=413049892431122 -->
echo "<br><div class=\"whitebox\"><div class=\"fb-comments\" data-href=\"https://kisimoto.sakura.ne.jp/ultrapop/\" data-width=\"800\" data-numposts=\"5\"></div></div>";

echo "</div>";

?>

<div id="bottompict">

</div>
</body>
</html>
