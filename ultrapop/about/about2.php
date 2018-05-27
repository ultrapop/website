<?php
// localが含まれる時以外は、とにかくエラー表示しない
$host=gethostname();
if(!strpos($host, 'local')){
	error_reporting(0);
}
include '../../common.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>ウルトラポップ宣言</title>

<link rel="icon" type="image/x-icon" href="https://kisimoto.sakura.ne.jp/cmn/cmnImg/upfav.ico">
<link rel="shortcut icon" type="image/x-icon" href="https://kisimoto.sakura.ne.jp/cmn/cmnImg/upfav.ico">

<meta property="og:type"   content="website" />
<meta property="og:url"    content="https://kisimoto.sakura.ne.jp/ultrapop/about" />
<meta property="og:title"  content="ウルトラポップ宣言" />
<meta property="og:site_name"  content="キシモトシンジのウルトラポップ宣言" />

<meta property="og:image"  content="https://kisimoto.sakura.ne.jp/cmn/cmnImg/kao2.png" />
<meta property="og:description"  content="私という世界の存在を表現する意志にウルトラポップという名をあてて検討し、実践して生きていくことについてのサイトです。おもしろいことをドッカンドッカンやりまくってゲラゲラ笑いながら死ぬだけです" />

<meta property="fb:app_id" content="413049892431122" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta name="viewport" content="width=device-width,initial-scale=1">

<?php
echoUA_lyr2();//ユーザーエージェント別にCSSをechoする

	$ua = $_SERVER['HTTP_USER_AGENT'];

	if ((strpos($ua, 'Android') !== false) && (strpos($ua, 'Mobile') !== false) || (strpos($ua, 'iPhone') !== false) || (strpos($ua, 'Windows Phone') !== false)) {
    	// スマートフォンからアクセスされた場合
		echo "<link rel=\"stylesheet\" href=\"./smph_about.css\" type=\"text/css\">";

	} elseif ((strpos($ua, 'Android') !== false) || (strpos($ua, 'iPad') !== false)) {
    	// タブレットからアクセスされた場合
		echo "<link rel=\"stylesheet\" href=\"./about.css\" type=\"text/css\">";

	} elseif ((strpos($ua, 'DoCoMo') !== false) || (strpos($ua, 'KDDI') !== false) || (strpos($ua, 'SoftBank') !== false) || (strpos($ua, 'Vodafone') !== false) || (strpos($ua, 'J-PHONE') !== false)) {
    	// 携帯からアクセスされた場合
		echo "<link rel=\"stylesheet\" href=\"./about.css\" type=\"text/css\">";
	} else {
    	// その他（PC）からアクセスされた場合
		echo "<link rel=\"stylesheet\" href=\"./about.css\" type=\"text/css\">";
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
				<img id="kao" src="../../cmn/cmnImg/kao.png" alt="キシモトシンジの顔がぷるるんしている">
			</div>
			<div id="headblkbox_right">
				<img id="pyuu"  src="../../cmn/cmnImg/pyuu.png" alt="ピュー"><br>


<?php

require_once '../../../website_etc/dbpass.php';

if(strpos($host, 'sakura.ne.jp')){
	$pdo = new PDO($dbname , $usr, $pass);
}elseif(strpos($host, 'local')){
	$pdo = new PDO("mysql:dbname=test;host=localhost;unix_socket=/tmp/mysql.sock", $usr, $pass);
}else{
	exit(0);
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
	</div>

	<div class="contentstop2"><a class="contentstoplnk" href="..">宣言</a>　<a class="contentstoplnk" href=".">ウルトラポップとは</a></div>
	<div id="aboutmain">
		<p class="abouttxt">ウルトラポップとは何か？<a class="about" href="./index.php">私の存在理由を理解して、超ハジけて生きていこう！</a>の続き。</li>
		<h1 class="about">キシモトシンジが存在について考えた</h1>

		<p class="centerinline"><img class="about" src="./img/man.jpg" alt="存在の問い"></p>
		<p class="abouttxt">……というわけでだ、「私」は「私について」いろんなコトを考えたんだよ、</p>

		<ul class="aboutul">
			<li class="aboutli">私というものは、何なのか？面白いと感じたり、悲しくなったり、痛かったりするのはなぜか？</li>
			<li class="aboutli">私の本質やコアのようなものを、”コレだ！”と指し示すことができるんだろうか？</li>
			<li class="aboutli">そもそも世界に在るいろいろな物や出来事を、私が感じたり理解できたりするのはどういうわけか？</li>
		</ul>
		<p class="centerinline"><img class="about" src="./img/check.png" alt="茶店で悩む人"></p>
		<p class="abouttxt">そういった問いって、存在とか無の問題につながっていくんだよね、</p>
		<ul class="aboutul">
			<li class="aboutli">なぜ、私というものが世界に”在る”のだろう？</li>
			<li class="aboutli">なぜ何もないのではなくて、私を含む世界が在るのだろう？</li>
			<li class="aboutli">そして、そのような存在の問いへと私を駆りたてるものは何か？</li>
		</ul>

		<p class="abouttxt">
		こういった問いがいつも背後から忍び寄ってくるようで、追われるままにずーっと考えつづけてきたんだ。コーヒーショップで、新幹線の座席で、ジョギングの途中で、寝起きに、眠る前に、食事の途中で、山行の途中で、、、</p>
		<p class="centerinline"><img class="about" src="./img/hiker.jpg" alt="旅"></p>
		<p class="abouttxt">そんな疑問を頭の中で旅して２０年、こないだようやくたどり着いたぞ。つまり「世界とは何か？」「私とは何か？」そして「どこから来て、どこへ行くのか？」を理解したんだ、ずばり私の存在理由は「創造」だっだ。<br><br>
		（……といっても、この話は読み手と共有することはできなかったりする。後で触れるけど、ウルトラポップの存在表現は他者の「私」の存在を確かめられないんだ、そして存在を確かめられない相手に何かを伝えることはできないよね。とはいえ便宜上、あなたという他者に向けて書いている体裁で進めるよ。）</p>
		<p class="centerinline"><img class="about" src="./img/color.jpg" alt="創造"></p>
		<p class="abouttxt">話を先取りすると、私の存在理由が創造であるのは、私という世界が存在するのでもしないのでもないからだよ。</p>
		<p class="abouttxt">つまり私の世界が存在するともしないとも定まらないので、私の世界の存在を私が描写しなければならないんだ。どうしたって、その過程は創造だというほかないものになる。
		</p>

		<h1 class="about">生きること＝超ハジけることだ、と理解してから</h1>
		<p class="centerinline"><img class="about" src="./img/strategy.jpg" alt="チャレンジ"></p>
		<p class="abouttxt">「私と私の世界」や「私の存在理由」について理解できてからというもの、以前よりさらに充実した時間が過ごせるようになったと思うよ。
		何かに迷ったら「これを創造へとつなげるには、どうすればいいか？」と自分自身に問いかけて、世界の成り行きを選びとるように判断すればいいんだからね。</p>
		<p class="abouttxt">生きる目的や成すべきことに正しく向きあうことができるようになったおかげで、いつもやるべきことがはっきりしているように感じるんだ。</p>
		</p>
		<h1 class="about">「ウルトラポップ！」……生きることを創造的なチャレンジにするんだぞ！</h1>
		<p class="abouttxt">そして創造の営みは死ぬまで続くよ。私は死ぬまで創造のチャレンジを続けることになるんだ。
		コレって逆に死からたどっていくなら、今この瞬間から死ぬまでを見通して、創造が最大になるように計画を創造しつづける！ってことになる。</p>
		<p class="abouttxt">そして私はあなたの地図を示すことができないけれど、少なくとも「私がいかに理解しているかを語ることはできるんじゃないだろうか？」と考えているよ。
		（人によってはそれを哲学と呼ぶのかもしれないし、信仰と呼ぶのかもしれない。他者の呼称は私に関係なく、すべてが完全な無こそが私の世界を溢れ出させていること、私が私の世界の描写へと駆動されること、超ハジケて生きること、それらをひっくるめてウルトラポップと呼ぶぞ。もちろんそれらは根本的に１つなんだけども）</p>

		<p class="abouttxt">……といった感じで私はいろいろ考えたんですよ。</p>
		<p class="abouttxt">次のページでは考えたことの結論までのまとめ、つまり <a class="about" href="./about3.php">ウルトラポップの存在表現について</a>説明するよ。</li>
	</div>
	<div class="contentstop2"><a class="contentstoplnk" href="..">宣言</a>　<a class="contentstoplnk" href=".">ウルトラポップとは</a></div>
	<!-- fbコメント欄 appId=413049892431122 -->
	<div class="whitebox"><div class="fb-comments" data-href="https://kisimoto.sakura.ne.jp/ultrapop/" data-width="800" data-numposts="5"></div></div>
	<div id="bottompict">

</div>
</body>
</html>
