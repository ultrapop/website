<?php
///////////////////////////////////////////////////////////////////
//  エラーコードを出さないぜ
///////////////////////////////////////////////////////////////////
//$host=gethostname();

//if (strpos($host, 'sakura')){
//	error_reporting(0);
//}


///////////////////////////////////////////////////////////////////
//  ユーザーエージェント別にcssをEchoする
///////////////////////////////////////////////////////////////////
function echoUA_lyr0(){
	$ua = $_SERVER['HTTP_USER_AGENT'];

	if ((strpos($ua, 'Android') !== false) && (strpos($ua, 'Mobile') !== false) || (strpos($ua, 'iPhone') !== false) || (strpos($ua, 'Windows Phone') !== false)) {
    	// スマートフォンからアクセスされた場合
		echo "<link rel=\"stylesheet\" href=\"./cmn/smph_common.css\" type=\"text/css\">";

	} elseif ((strpos($ua, 'Android') !== false) || (strpos($ua, 'iPad') !== false)) {
    	// タブレットからアクセスされた場合
		echo "<link rel=\"stylesheet\" href=\"./cmn/common.css\" type=\"text/css\">";

	} elseif ((strpos($ua, 'DoCoMo') !== false) || (strpos($ua, 'KDDI') !== false) || (strpos($ua, 'SoftBank') !== false) || (strpos($ua, 'Vodafone') !== false) || (strpos($ua, 'J-PHONE') !== false)) {
    	// 携帯からアクセスされた場合
		echo "<link rel=\"stylesheet\" href=\"./cmn/common.css\" type=\"text/css\">";
	} else {
    	// その他（PC）からアクセスされた場合
		echo "<link rel=\"stylesheet\" href=\"./cmn/common.css\" type=\"text/css\">";
	}
}

function echoUA_lyr1(){
	$ua = $_SERVER['HTTP_USER_AGENT'];

	if ((strpos($ua, 'Android') !== false) && (strpos($ua, 'Mobile') !== false) || (strpos($ua, 'iPhone') !== false) || (strpos($ua, 'Windows Phone') !== false)) {
    	// スマートフォンからアクセスされた場合
		echo "<link rel=\"stylesheet\" href=\"../cmn/smph_common.css\" type=\"text/css\">";

	} elseif ((strpos($ua, 'Android') !== false) || (strpos($ua, 'iPad') !== false)) {
    	// タブレットからアクセスされた場合
		echo "<link rel=\"stylesheet\" href=\"../cmn/common.css\" type=\"text/css\">";

	} elseif ((strpos($ua, 'DoCoMo') !== false) || (strpos($ua, 'KDDI') !== false) || (strpos($ua, 'SoftBank') !== false) || (strpos($ua, 'Vodafone') !== false) || (strpos($ua, 'J-PHONE') !== false)) {
    	// 携帯からアクセスされた場合
		echo "<link rel=\"stylesheet\" href=\"../cmn/common.css\" type=\"text/css\">";
	} else {
    	// その他（PC）からアクセスされた場合
		echo "<link rel=\"stylesheet\" href=\"../cmn/common.css\" type=\"text/css\">";
	}
}

function echoUA_lyr2(){
	$ua = $_SERVER['HTTP_USER_AGENT'];

	if ((strpos($ua, 'Android') !== false) && (strpos($ua, 'Mobile') !== false) || (strpos($ua, 'iPhone') !== false) || (strpos($ua, 'Windows Phone') !== false)) {
    	// スマートフォンからアクセスされた場合
		echo "<link rel=\"stylesheet\" href=\"../../cmn/smph_common.css\" type=\"text/css\">";

	} elseif ((strpos($ua, 'Android') !== false) || (strpos($ua, 'iPad') !== false)) {
    	// タブレットからアクセスされた場合
		echo "<link rel=\"stylesheet\" href=\"../../cmn/common.css\" type=\"text/css\">";

	} elseif ((strpos($ua, 'DoCoMo') !== false) || (strpos($ua, 'KDDI') !== false) || (strpos($ua, 'SoftBank') !== false) || (strpos($ua, 'Vodafone') !== false) || (strpos($ua, 'J-PHONE') !== false)) {
    	// 携帯からアクセスされた場合
		echo "<link rel=\"stylesheet\" href=\"../../cmn/common.css\" type=\"text/css\">";
	} else {
    	// その他（PC）からアクセスされた場合
		echo "<link rel=\"stylesheet\" href=\"../../cmn/common.css\" type=\"text/css\">";
	}
}

///////////////////////////////////////////////////////////////////
//  上部のコメントをランダム表示する
// ・表示数を取得する
// ・表示数の範囲内で乱数によりテキストを表示する
///////////////////////////////////////////////////////////////////
function echoTopCmt($pdo){

	$st = $pdo->query("SELECT id FROM headpoem");

	// !!!そもそもsqlからレコード数を取得して”前から何番目”で表示すれば良いのでは？
	// PDOでCOUNTを確実に使える方法が見つかっていないので後回しにする
	// !!!$poemsizeを取得したら、DBをロックするべきでは？


	$entryIdArray = array(); // 配列の初期化
	$poemsize = 0;
	while ($row = $st->fetch()) { // オブジェクトとして取得したレコードが残っている限りループ
		$entryIdArray[] = $row['id'];
		$poemsize=$poemsize+1;
	}
	$poemPt = rand(0,$poemsize-1);

	$st = $pdo->query("SELECT * FROM headpoem WHERE id=$entryIdArray[$poemPt]");
	$row = $st->fetch();
	$text = $row['words'];
	$text = mb_convert_encoding($text, "UTF-8","ASCII,JIS,UTF-8,EUC-JP,SJIS-win");
	echo "<p id=\"headcmt\">$text</p>";
}

///////////////////////////////////////////////////////////////////
//  上部のコメントをランダム表示する
// ・表示数を取得する
// ・表示数の範囲内で乱数によりテキストを表示する
///////////////////////////////////////////////////////////////////
function echoTopCmt2($pdo){

	$st = $pdo->query("SELECT id FROM headpoem_kisimoto");

	// !!!そもそもsqlからレコード数を取得して”前から何番目”で表示すれば良いのでは？
	// PDOでCOUNTを確実に使える方法が見つかっていないので後回しにする
	// !!!$poemsizeを取得したら、DBをロックするべきでは？


	$entryIdArray = array(); // 配列の初期化
	$poemsize = 0;
	while ($row = $st->fetch()) { // オブジェクトとして取得したレコードが残っている限りループ
		$entryIdArray[] = $row['id'];
		$poemsize=$poemsize+1;
	}
	$poemPt = rand(0,$poemsize-1);

	$st = $pdo->query("SELECT * FROM headpoem_kisimoto WHERE id=$entryIdArray[$poemPt]");
	$row = $st->fetch();
	$text = $row['words'];
	$text = mb_convert_encoding($text, "UTF-8","ASCII,JIS,UTF-8,EUC-JP,SJIS-win");
	echo "<p id=\"headcmt\">$text</p>";
}

////////////////////////////
//   関数：echoEntryRow
//         ： エントリーを１つ出力
////////////////////////////

function echoEntryRow($row,$rl_flg,$entnum){

	//エントリid 単独id記事へのリンクに使用する
	$entryid = htmlspecialchars($row['entryid']);

	// エントリ本文
	// 日本語データをUTF-8に変換して取得(サーバからはeuc-jpで返ってくる。!!変更方法が分からない)
	$text = $row['entrytext'];
	$text = mb_convert_encoding($text, "UTF-8","ASCII,JIS,UTF-8,EUC-JP,SJIS-win");

	// エントリタイトル
	// 日本語データをUTF-8に変換して取得(サーバからはeuc-jpで返ってくる。!!変更方法が分からない)
	$title = $row['entrytitle'];
	$title = mb_convert_encoding($title, "UTF-8","ASCII,JIS,UTF-8,EUC-JP,SJIS-win");

	// エントリ日付
	$dtt = htmlspecialchars($row['entrydate']);

	if($rl_flg == 0){// タイトル左右の振り分け
		echo "<div class=\"entrytitle_l\">";
	}else{
		echo "<div class=\"entrytitle_r\">";
	}

	echo "<div class=\"entrytitletext\">";
	echo "<a  class=\"entrylink\" href=\"./?sid=$entryid&entnum=1\">";
	echo "$title";
	echo "</a>";
	echo "<div class=\"entrydate\">";
	echo "$dtt";
	echo "</div>";
	echo "</div>";
	echo "</div>";

	if($rl_flg == 0){// 本文左右の振り分け
		echo "<div class=\"entrytext_l\">";
		echo "<div  class=\"extemb\">";
	}else{
		echo "<div class=\"entrytext_r\">";
		echo "<div  class=\"extemb\">";
	}
	echo $text;
	$text = strip_tags($text);
	$text = str_replace(array("\r\n", "\r", "\n"), '', $text);

	if($row['entryinvisible'] != 0){
		echo "<form method=\"post\" action=\"ctrls.php\">";
//		echo "<div class=\"post\">";
		echo "<p><input type=\"hidden\" name=\"visid\"value=\"$entryid\"></p>";
		echo "<input class=\"button\" name=\"visible\" type=\"submit\" value=\"表示\">";
//		echo "</div>";
		echo "</form>";
		
	}

	if($entnum == 1){ // エントリ数が１のときだけSNSボタンを表示
		echo "<div class=\"buttons\">";
		echo "<br><a href=\"https://twitter.com/share\" class=\"twitter-share-button\" data-url=\"https://kisimoto.sakura.ne.jp/?sid=$entryid&entnum=1\" data-via=\"ultrapop5\" data-related=\"ultrapop5\">Tweet</a>";
		echo " <div class=\"fb-like\" data-href=\"https://kisimoto.sakura.ne.jp/?sid=$entryid&entnum=1\" data-layout=\"button_count\" data-action=\"like\" data-size=\"small\" data-show-faces=\"true\" data-share=\"true\"></div>";
		echo " <a href=\"http://b.hatena.ne.jp/entry/s/kisimoto.sakura.ne.jp/?sid=$entryid&entnum=1\" class=\"hatena-bookmark-button\" data-hatena-bookmark-title=\"$title ｜キシモトシンジのスクラップブッキング\" data-hatena-bookmark-layout=\"vertical-normal\" data-hatena-bookmark-lang=\"ja\" title=\"このエントリーをはてなブックマークに追加\"><img src=\"https://b.st-hatena.com/images/entry-button/button-only@2x.png\" alt=\"このエントリーをはてなブックマークに追加\" width=\"20\" height=\"20\" style=\"border: none;\" /></a>";
		echo "</div>";
		}
	echo "</div>";
	echo "</div>";
}

?>
