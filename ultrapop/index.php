<?php
// localが含まれる時以外は、とにかくエラー表示しない
$host=gethostname();
if(!strpos($host, 'local')){
	error_reporting(0);
}
include '../common.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>ウルトラポップ宣言</title>

<link rel="icon" type="image/x-icon" href="https://kisimoto.sakura.ne.jp/cmn/cmnImg/upfav.ico">
<link rel="shortcut icon" type="image/x-icon" href="https://kisimoto.sakura.ne.jp/cmn/cmnImg/upfav.ico">

<meta property="og:type"   content="website" />
<meta property="og:url"    content="https://kisimoto.sakura.ne.jp/ultrapop" />
<meta property="og:title"  content="ウルトラポップ宣言" />
<meta property="og:site_name"  content="キシモトシンジのウルトラポップ宣言" />

<meta property="og:image"  content="https://kisimoto.sakura.ne.jp/cmn/cmnImg/kao2.png" />
<meta property="og:description"  content="私という世界の存在を表現する意志にウルトラポップという名をあてて検討し、実践して生きていくことについてのサイトです。おもしろいことをドッカンドッカンやりまくってゲラゲラ笑いながら死ぬだけです" />

<meta property="fb:app_id" content="413049892431122" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta name="viewport" content="width=device-width,initial-scale=1">


<?php
echoUA_lyr1();//ユーザーエージェント別にCSSをechoする

	$ua = $_SERVER['HTTP_USER_AGENT'];

	if ((strpos($ua, 'Android') !== false) && (strpos($ua, 'Mobile') !== false) || (strpos($ua, 'iPhone') !== false) || (strpos($ua, 'Windows Phone') !== false)) {
    	// スマートフォンからアクセスされた場合
		echo "<link rel=\"stylesheet\" href=\"./smph_main.css\" type=\"text/css\">";

	} elseif ((strpos($ua, 'Android') !== false) || (strpos($ua, 'iPad') !== false)) {
    	// タブレットからアクセスされた場合
		echo "<link rel=\"stylesheet\" href=\"./main.css\" type=\"text/css\">";

	} elseif ((strpos($ua, 'DoCoMo') !== false) || (strpos($ua, 'KDDI') !== false) || (strpos($ua, 'SoftBank') !== false) || (strpos($ua, 'Vodafone') !== false) || (strpos($ua, 'J-PHONE') !== false)) {
    	// 携帯からアクセスされた場合
		echo "<link rel=\"stylesheet\" href=\"./main.css\" type=\"text/css\">";
	} else {
    	// その他（PC）からアクセスされた場合
		echo "<link rel=\"stylesheet\" href=\"./main.css\" type=\"text/css\">";
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

	<div class="pop">
	<p class="manifest_text_LL_B2"><br><br><br><br>
			超ハジけた<br>
			創造を生きよう！
		</p>
	</div>

	<div id="headblock">
		<div id="headblkbox">
			<div id="headblkbox_left">
			<img id="kao" src="../cmn/cmnImg/kao.png" alt="キシモトシンジの顔がぷるるんしている">
		</div>
			<div id="headblkbox_right">
				<img id="pyuu"  src="../cmn/cmnImg/pyuu.png" alt="ピュー"><br>


<?php
require_once '../../website_etc/dbpass.php';

if(strpos($host, 'sakura.ne.jp')){
	$pdo = new PDO($dbname , $usr, $pass);
}elseif(strpos($host, 'local')){
	$pdo = new PDO($dbname_local, $usr, $pass);
}else{
	exit(0);
}

//  上部のコメントをランダム表示する
echoTopCmt($pdo);
?>

			</div>
		</div>
	</div>
	<div id="headbar"><a  class="headtitlelink1" href="."><p id="headtitle1">キシモトシンジの</p><p id="headtitle2">ウルトラポップ宣言</p></a></div>
	<br>
	<div class="manifest">
		<p class="manifest_text"><br>世界が存在するわけの分からなさを受けいれて、<br>それでも世界として湧き上がっていることを真摯に驚愕し、<br>命のきらめきを楽しんで味わうんだよ！<br><br>それは生の意味の闘いだよ。<br><br>生まれつき備わったわくわくする力を全部使って<br>見るんだよ！動くんだよ！愛すんだよ！聴くんだよ！考えるんだよ！
<!--			優越感、自己憐憫に浸るよりも命がけで生きろ、圧倒的に美しく貴重な生をぼんやり過ごすな、感情は愛し耳を澄ませるものだ、それに打ち倒されるな、怠惰な自分を揺さぶり何かやれ。他者や社会に貢献するのは本能だ、目覚めさせて誰かを助けろ、楽しませろ、足を踏み出させろ！（胸踊る先人の成果物に触れるたび、僕ら止めかけた足を踏み出してきたじゃないか）。うんこー！<br><br>
			たかるな、まやかしには溺れるな。楽しいことはどんどんやっていいんだけどさ、でもただ繰り返しぼんやり口を開けて流し込もうとするな、頼るな。足りないものは外から埋めることはできない、結局は自分の中から湧き上がらせ、それを”やる”しかないんだ。自分の中を旅しろ、孤独のまま、その楽園のような地獄を歩き通すんだよ。頭を使って考えて、論理が崩壊するまで追い回すんだよ。その果てで破綻した記号の残骸、戻ってきちゃったスタート地点に腹抱えて笑えばいい（だから僕はひねくれ倒した笑いが大好き！！）、結果、自分の中の迷宮を打ち壊すことになろうとも、スタート地点で立つ手の中に今までもっていなかったナニガシかが握られているのだから。正しさなんて間違いの残りカスでしかない、それを「みんながそういうから」にまかせずにさ、自分でやろうよ。うんこー！ -->
		</p>

	</div>
	<div class="contentstop2"><a class="contentstoplnk" href=".">宣言</a>　<a class="contentstoplnk" href="./about">ウルトラポップとは</a></div>
	<br><br>
	<div class="question">
		<p class="questiontext_L">
		なぜ生きる？<br>
		なにを生きる？</p>
		<br>
		<br>
		<p class="questiontext">
		あなたの世界を、私が理解することはありえない。<br>
		<br>
		……しかし、それでも問う。</p>

		<p class="questiontext_L">
		生きるってなんだ？<br>
	</div>
	<div class="dead">
		<p class="manifest_text_L_B"><br><br><br>生きることは死なないことじゃない。<br><br>
			快楽の追求でもないよ、<br>
			力の追求でもないよ、<br>
			愛とかでもないよ。<br><br>
			私は動物や機械じゃない。<br>
			生きることは、なりゆきを漂うことじゃない。<br><br>
		</p>
	</div>
	<div class="question">
		<p class="questiontext_L">
			この世界に生きることを<br>理解する</p>
			<p class="questiontext_M">
				……そのために認める必要のあること、<br><br><br><br>
			</p>
</div>
	<div class="lightning">
		<p class="manifest_text_LL_B"><br><br>
			生きる場である私の世界と、<br><br><br><br>生きている私は一致する<br></p>
		</div>
		<div class="question">
			<p class="questiontext_M"><br><br>
				……だけど、<br><br><br><br>
			</p>
			<p class="questiontext_L">
				私の世界は<br>存在するのでも<br>存在しないのでも<br>ないよ。</p>
		<p class="questiontext_M"><br><br>
			……だから、<br><br><br><br>
		</p>
	</div>

	<div class="living">
		<p class="manifest_text_LL_B2"><br><br><br>
			生きるとは、<br>私の世界の存在を<br>表現すること<br><br><br>
	</div>

	<div class="question">
		<p class="questiontext_L">
			そのために<br><br>
		</p>
	</div>

	<div class="paint">
		<p class="manifest_text_LL_B2">
			<br><br><br>世界を描写する！
		</p>
	</div>

	<div class="question">
		<p class="questiontext_L">
			どうやって？<br><br>
		</p>
	</div>

	<div class="bend">
		<p class="manifest_text_LL_B">
			<br><br><br>……世界のなりゆきを<br>
			私の意志で<br>掴み取ることによって<br><br><br>
		</p>
	</div>

	<div class="question">
		<p class="questiontext">
			そのような私の衝動を<br><br><br>
		</p>
		<div class="adventure">
			<p class="manifest_text_LL_B"><br><br><br><br>
				ウルトラポップ<br>
			</p>
		</div>

		<p class="questiontext">
			<br><br>……そう呼ぶことにする。<br><br><br><br>それは、<br><br><br>
		</p>

		<div class="creation">
			<p class="manifest_text_LL_B2">
			<br><br><br>超ハジけた創造を<br><br><br>爆発させて生きることだ<br><br><br>
			</p>
		</div>

		<p class="questiontext">
			<br><br>↓↓さらに↓↓
		</p>
	</div>

	<div class="contentstop2"><a class="contentstoplnk" href="./about">ウルトラポップとは</a></div>

	<div class="contentstop2"><a class="contentstoplnk" href=".">宣言</a>　<a class="contentstoplnk" href="./about">ウルトラポップとは</a></div>
	<!-- fbコメント欄 appId=413049892431122 -->
	<div class="whitebox"><div class="fb-comments" data-href="https://kisimoto.sakura.ne.jp/ultrapop/" data-width="800" data-numposts="5"></div></div>
	<div id="bottompict">

</div>
</body>
</html>
