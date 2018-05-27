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
<meta property="og:url"    content="https://kisimoto.sakura.ne.jp/ultrapop" />
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
		<h1 class="about">超ハジけ！！ウルトラポップとは何か？</h1>
		<p class="centerinline"><img class="about" src="./img/jump.png" alt="はっちゃけてヤル"></p>
		<p class="abouttxt">超ハジけて生きるためのステキなアイデアを考えだしたので、世界中にお伝えしたくてたまらないんですよ（僕はこのアイデアを”ウルトラポップ”って呼んでる）。以下の流れで説明するから、あなたにもぜひ読んでほしいんだ。よろしくす！</p>
		<ul class="aboutul">
		<li class="aboutli">このページでは、存在する理由を理解することで、超ハジけた生きかたを手に入れよう！って話をするよ。</li>
		<li class="aboutli"><a class="about" href="./about2.php">次のページ</a>では、キシモトシンジが存在について考えたことを説明するよ。</li>
		<li class="aboutli"><a class="about" href="./about3.php">最後のページ</a>では、ウルトラポップについて、ガ～って一気に説明するよ。</li>
		</ul>

		<p class="abouttxt">私が生きている理由そのままに、私が爆発するように生きるんだよ。それって、すっげー楽しいぞ！……そんな話をするよ。</p>


		<h1 class="about">超ハジけて生きるには、生きている理由を知らなきゃならないよ！</h1>
		<p class="abouttxt">超ハジけて生きてくために、まず１つ質問から！<br><br>たとえば、まったく同じ絵の才能を持った二人の画家がいたとして、以下のどちらが良い作品を創りあげるだろうか？</p>
		<ul class="aboutul">
			<li class="aboutli">Ａさんは目指すべき絵を理解して描いている</li>
			<li class="aboutli">Ｂさんは何だか分からないままに絵を描いている</li>
		</ul>
		<p class="centerinline"><img class="about" src="./img/girl.jpg" alt="画家の少女"></p>
		<p class="abouttxt">そりゃもちろん、Ａさんのほうが良い絵を描くだろうね。はっきりした目的に向かって、まっすぐ突き進んだほうが良い作品ができるでしょ？</p>

		<p class="abouttxt">じゃあ次はあなたの問題だ。あなたの人生が超ハジけるのは、以下のどちらの場合だろうか？</p>
		<ul class="aboutul">
			<li class="aboutli">目指すべき生の意義を理解して生きる</li>
			<li class="aboutli">生きる理由の分からないまま日々を過ごす</li>
		</ul>

		<p class="abouttxt">これも同じことだよね。生きる意義を「あなた」が分かっていなければ、超ハジけて生きることもできないよ。その理由には以下の２つがある。</p>
		<ul class="aboutul">
			<li class="aboutli">あなたは「あなたのやるべきこと」を全力でやることによってのみ、超ハジけて生きていけるよ</li>
			<li class="aboutli">あなたのやるべきことは、あなたが生きている意義を理解していなければ分からないよ</li>
		</ul>

		<p class="abouttxt">……つまり超ハジけて生きていくのなら、あなたは「なぜ生きるのか？」といった意義を理解し、そこから「やるべきこと」を見つけだし、やっちゃうしかないんだよ。</p>


		<p class="abouttxt">とはいっても、簡単なもんじゃないよね。「生きる意義」ってなんでしたっけ？そんなの誰も教えてくれないし、自分の頭で考えたって簡単には分からない。<br>
		これまでも、かしこさの超ヤバい人たちがさんざん考えてきたけれど、みんなが納得するような答えは見つかってないんだ。……つまり、この問いはすごく難しい、”私が私自身の意義を考えるだけ”だっていうのに。</p>

		<h1 class="about">私という難問にチャレンジしてやろう！</h1>
		<p class="centerinline"><img class="about" src="./img/wisemen.jpg" alt="哲学者"></p>

		<p class="abouttxt">私の意義の問いがすごく難しいのはなぜか？<br><br>それはそもそも「私」が「私自身」についてさっぱり理解してないからだよ。つまり「私」というものが分かってないんだから「私の意義」なんか分かるはずもないってこと。「私が私のことを分からないだって？そんなことあるもんか！」って言いたくなるかもしれないけど、冷静に立ち止まって考えてほしいんだ。たとえば……</p>
		<ul class="aboutul">
			<li class="aboutli">あなたが死ぬと失われるあなたの「私」とはなにか？</li>
			<li class="aboutli">あなたが「私」として経験している空の青さを他者に伝えることは可能か？</li>
			<li class="aboutli">あなたの肉体に紐づいているあなたの「私」が成立する条件はなにか？</li>
		</ul>
		<p class="abouttxt">ね？ねっ？ぜんぜん分からないでしょ？（もしくは問いそのものがうまく伝わってないのかもしれないですけども）</p>
		<p class="abouttxt">でもでもでも、コレって逆にいうと「私」というものを正しく理解すれば、「私のやるべきこと」もはっきりするってことだよね。だから私は「私」についていろいろ考えてみた。それで「私にとって」の答えは見つかったので、その結論をここからいろいろ語っていきたいんだな。</p>
		<p class="abouttxt">つまりは私の結論を補助線にして、充実した日々を送るにはどうしたら良いのかあなたに考えていただき、そして、ぶっ跳んだ実践をしていただきたいのだ。</p>
		<br>

		<p class="abouttxt">……ということで、私の存在理由を理解して、超ハジけて生きていこう！って話はここまで。</p>
		<p class="abouttxt">続いて、<a class="about" href="./about2.php">キシモトシンジが存在について考えた</a>を語るよ。</li>

	</div>
	<div class="contentstop2"><a class="contentstoplnk" href="..">宣言</a>　<a class="contentstoplnk" href=".">ウルトラポップとは</a></div>
	<!-- fbコメント欄 appId=413049892431122 -->
	<div class="whitebox"><div class="fb-comments" data-href="https://kisimoto.sakura.ne.jp/ultrapop/" data-width="800" data-numposts="5"></div></div>
	<div id="bottompict">

</div>
</body>
</html>
