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
	<p class="abouttxt">ウルトラポップとは何か？<a class="about" href="./about2.php">キシモトシンジの考えたこと</a> の続き。</li>
	<p class="abouttxt">キシモトシンジの考えた存在の問題、つまりウルトラポップの存在表現について、ギリギリ最後まで読んでもらえるくらいにザックリした話をこのページで書いていくぞ。目次はこんな感じ。</p>
		<h1 class="about">ウルトラポップの存在表現の目次</h1>
		<ul class="aboutul">
			<li class="aboutli">因果律は世界の基本ルールじゃないよ</li>
			<li class="aboutli">でも「私の経験は規則正しく、矛盾しない」ということは言えるよ</li>
			<li class="aboutli">存在とはそうでなければ世界が成り立たないことの全てだよ</li>
			<li class="aboutli">あらゆる事実が私の経験からのみ導かれるよ</li>
			<li class="aboutli">事実そのものの総体と経験は同じだよ</li>
			<li class="aboutli">だから世界は私の世界だよ</li>
			<li class="aboutli">どこまで私の世界をさかのぼっても、すべてが完全な無には至らずに、存在と無の均衡点で行き止まるよ</li>
			<li class="aboutli">無の均衡点に位置する私は存在の仮定だよ</li>
			<li class="aboutli">私は規則によって仮定された存在を表現するよ</li>
			<li class="aboutli">当たり前のことが起こっても規則は表現されないよ</li>
			<li class="aboutli">規則を表現するためには私の世界が動的に変化するのでなければならないよ</li>
			<li class="aboutli">世界を動的にするのは、私の意志だよ</li>
			<li class="aboutli">私の意志によって世界を動的にすること、それは創造だよ</li>
			<li class="aboutli">存在を表現するという存在理由そのままに、創造を生きろ（ウルトラポップ）</li>
		</ul>
		<p class="abouttxt">……じゃあ、ようやくここからが本題だ！</p>

		<h1 class="about">因果律は世界の基本ルールじゃないよ</h1>
		<p class="centerinline"><img class="about" src="./img/rule.jpg" alt="ルールを知れ"></p>
		<p class="abouttxt">世界で起きている事実は、”原因と結果の関係”つまり因果律に従っているように見えるよね。でも「因果律はどんな因果律によって成立したの？」って問いに答えられないから、因果律は世界の基本ルールじゃないんだよ。
		</p>

		<h1 class="about">でも「私の経験は規則正しく、矛盾しない」ということは言えるよ</h1>
		<p class="abouttxt">因果律が世界の基本ルールじゃないなら、確かなのは私の経験の一つ一つが互いに矛盾しないっていうだけだよ。そして経験が互いに矛盾しないおかげで世界は成り立っているよ。もしいろんなことが矛盾していたら、世界は成り立たず、世界に配置されている対象はメチャクチャになり、経験そのものも意味を失うよ。</p>

		<h1 class="about">存在とはそうでなければ世界が成り立たないことの全てだよ</h1>
		<p class="abouttxt">私の経験が互いに矛盾しないのであれば、或る対象が存在するっていうのは他の全てと矛盾せずに配置できるってことだよ。或る対象の存在が他の対象によって保証されるのではなく、他の対象から存在を否定されていないことによって存在が可能なんだよ。</p>

		<h1 class="about">あらゆる事実が私の経験からのみ導かれるよ</h1>
		<p class="centerinline"><img class="about" src="./img/paris.jpg" alt="パリの夜"></p>
		<p class="abouttxt">客観的な事実が経験されるんじゃなくて、経験が矛盾しないことによって事実が形作られるんだよ。たとえばパリにテロが起きた事実があるから、ニュース映像を見る経験をするんじゃないんだ。テロのニュース映像を見たから、パリでテロが起こったのでなければならないんだよ。</p>

		<h1 class="about">事実そのものの総体と経験は同じだよ</h1>
		<p class="centerinline"><img class="about" src="./img/apple.jpg" alt="地面に落ちた真っ赤な林檎"></p>
		<p class="abouttxt">脳の反応した事実を経験するのだといっても、脳だって界に置かれた物体にすぎないよね。すると赤いリンゴを見る経験をしたときの「赤いリンゴ」と「赤いリンゴに反応した脳」は、どちらも世界に置かれた物体でしかないって言えるはず。だから赤いリンゴを見た経験というのは、「赤いリンゴそのもの」「赤いリンゴに反応した脳」あるいは「赤の刺激を受けた視神経」や「赤い波長の光（電磁波）」と区別できないんだよ。だから事実そのものと経験は同じなんだよ。</p>

		<h1 class="about">だから世界は私の世界だよ</h1>
		<p class="centerinline"><img class="about" src="./img/canon.jpg" alt="ワタシと世界としての私"></p>
		<p class="abouttxt">「あらゆる事実が私の経験からのみ導かれる」ことと「事実そのものと経験が同じ」ことから、世界は私の世界であることが分かるよ。その実感がないのは、世界で起こることのほとんどを知ることができず、思い通りにならないからだよ。</p>

		<h1 class="about">どこまで私の世界をさかのぼっても、すべてが完全な無には至らずに、存在と無の均衡点で行き止まるよ</h1>
		<p class="centerinline"><img class="about" src="./img/robot.png" alt="自らを分解"></p>
		<p class="abouttxt">私の世界に配置されている事物をその元となったものへと還元して、世界の内側に在るものをどんどん減らしていく作業をイメージしてみるよ（それは私の世界の始まりへとさかのぼることだ）。
		しかしどれだけ還元を進めても、世界の内側がすべてが完全な無にはならないんだ。だって「すべてが完全な無」っていうのも概念の１つだから、それが残ってしまえば何もないとは言えないからだよ。</p>
		<p class="abouttxt">さらには「すべてが完全な無」という概念もいろいろな概念が複合することで成立しているよね。
		だからそれらの概念に意味が成立するか、しないかが均衡するまで還元を進めた地点が、無への還元の終点になるよ。
		そして、それは世界の始まりだよ。</p>

		<h1 class="about">無の均衡点に位置する私は存在の仮定だよ</h1>
		<p class="centerinline"><img class="about" src="./img/blur.jpg" alt="はっきりしない"></p>
		<p class="abouttxt">世界の始まりは私の世界の始まりだよ。そして存在の成立・非成立が均衡している点から私の世界が始まっているのだから、私の世界は存在するのでも、しないのでもないよ。だったら「私」だって存在する／しないが定まらないよ。</p>
		<p class="abouttxt">つまり私の世界は「存在しないとは言い切れない」でしかない世界だし、それは「私」も同じだよ。だから私の世界や私は「存在する」というものではないんだよ。存在が保証されたり確定するのではなくて、仮定とか方便などに位置づけられるべきものだよ。</p>

		<h1 class="about">私は規則によって仮定された存在を表現するよ</h1>
		<p class="abouttxt">私の経験が規則正しいことによって、私の世界が表現されるよ。</p>
		<p class="abouttxt">じゃあ規則はどう表現されているのか？規則はどこかに書かれているのではなく（あたりまえ）、事物がそのつど規則どおりに経験されることで表現されるよ。あまりにも規則正しく事物が経験されるので、そのルールは詳しく調べられ”自然科学”と呼ばれるよ。</p>

		<h1 class="about">当たり前のことが起こっても規則は表現されないよ</h1>
		<p class="centerinline"><img class="about" src="./img/domino.jpg" alt="ドミノ"></p>
		<p class="abouttxt">規則が事物のふるまいによって表現されるにしても、当たり前のことが当たり前に起こるだけでは規則は表現されないよ。
		たとえば成り行きのストーリーがあらかじめ決まっている野球の試合をしたところで、表現されるのはストーリーであって野球のルールじゃないよね。</p>

		<h1 class="about">規則を表現するためには私の世界が動的に変化するのでなければならないよ</h1>
		<p class="abouttxt">だから世界はダイナミック（動的）でなければならないよ。世界の内側で出来事は規則どおりにしか起こらないけれど、それでもなお世界は動的であるってことになる。
		だから世界を動的にしているのは世界の内側に位置しないもののはずだよ。</p>

		<h1 class="about">世界を動的にするのは、私の意志だよ</h1>
		<p class="abouttxt">世界を動的にしているものは何か？たとえばサイコロを転がした結果などは世界を動的にしているわけじゃないよ。だってそれはただ予想と検証ができないっていうだけだから、世界の成り行きを変化させるものではないよ。同じように素粒子のふるまいみたいに本質的に確率の事象だって、世界を動的にはしないよ。</p>
		<p class="abouttxt">だから世界を動的にしているのはそういった不確かさではなくて、「予測できない世界の成り行き」を選びとる力であるはずだよ。そして私の世界の成り行きを選びとっていると言えるのはただ一つ、私の意志しかありえない。
		私の意志は、世界の内側でキシモトシンジの脳がどのように判断してもおかしくない選択に出くわした時、最後に決断を選び取るものだよ(しょっちゅうそうしているはずだ)。</p>
		<p class="abouttxt">そうやって世界の内側に位置しない私の意志が、世界の成り行きを選び取って動的に変化させているんだよ。</p>
		<p class="centerinline"><img class="about" src="./img/brain.jpg" alt="脳を通じて世界に与える影響"></p>
		<p class="abouttxt">意志の選択は世界全体を選びとるんだよ。たとえば脳がどちらを良いと判断してもおかしくない選択肢ａとｂから１つを選ぶとき、私の意志が選択肢aを選びとったのであれば、選択肢ａを選びとった脳を選びとったのであり、かつ選択肢ａを選びとった脳を含む世界そのものを選びとったってことなんだよ。</p>
		<p class="abouttxt">そして意志が私の世界のいかなる成り行きを選び取ろうとも、私の世界は矛盾せずに規則正しいままだよ。だって脳がどのような微妙な判断をしたのか、微小なイオンの反応を観測して検証するなんてできないからね。</p>

		<p class="abouttxt">また、世界が動的でなかったら矛盾することの１つとしてよく知られたものに、<a class="about" href="https://ja.wikipedia.org/wiki/%E7%8F%BE%E8%B1%A1%E5%88%A4%E6%96%AD%E3%81%AE%E3%83%91%E3%83%A9%E3%83%89%E3%83%83%E3%82%AF%E3%82%B9">現象報告のパラドクス</a>があるよ。これは私の意志が世界の内側に配置されない動的な要素であるとすることで片付くよ。</p>

		<h1 class="about">私の意志によって世界を動的にすること、それは創造だよ</h1>
		<p class="abouttxt">私の意志は世界に起こる当たり前ではないことを選びとるよ。それはあらかじめ与えられたAとBから答えを選びとるような選択ではないんだ（だって「どちらかを選べ」という状況になってどちらかを選ぶのは当たり前のことが起きただけだもんね）。そうではなくて、意志によって選択肢そのものを破壊し、新たに創りだすような決断をすることで世界は存在が描写されるんだよ。それってクリエイティブ、創造を生きることに他ならないよね。</p>
		<p class="centerinline"><img class="about" src="./img/boom.jpg" width="800" alt="爆発"></p>

		<h1 class="about">存在を表現するという存在理由そのままに、創造を生きろ（ウルトラポップ）</h1>
		<p class="abouttxt">存在を表現するという存在理由そのままに、創造を生きる（ウルトラポップ）。それはクリエイティブの爆発であり、超ハジけて生きることそのものなんだ。</p>
		<p class="centerinline"><img class="about" src="./img/explosion.jpg" width="800" alt="爆発"></p>

		<h1 class="about">創造の爆発を生きる！</h1>
		<p class="abouttxt">だから私は創造の爆発を生きることにした。生きることが創造なのだから、私は創造の爆発を生きるのだ。そして私が創造する人になることで、再び世界に登場する或る一人となるよ。</p>
		<p class="centerinline"><img class="about" src="./img/alone.jpg" width="800" alt="一人"></p>
		<hr>
		<h1 class="about">もっと詳しく</h1>
		<p class="abouttxt">ここまで、猛烈なダッシュでウルトラポップの存在表現について書いてみた。コレ以上を微に入り細に入り長々と説明してもよいのだけれど、誰も最後まで読まないだろうね。詳しい説明をお見せする方法は、いろいろ考えているのでよろしくですよ。</p>

	</div>
	<div class="contentstop2"><a class="contentstoplnk" href="..">宣言</a>　<a class="contentstoplnk" href=".">ウルトラポップとは</a></div>
	<!-- fbコメント欄 appId=413049892431122 -->
	<div class="whitebox"><div class="fb-comments" data-href="https://kisimoto.sakura.ne.jp/ultrapop/" data-width="800" data-numposts="5"></div></div>
	<div id="bottompict">

</div>
</body>
</html>
