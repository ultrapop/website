function jump() {
	if (confirm("トップページに戻りますか？") == true)
		//OKならTOPページにジャンプさせる
		location.href = "http://pori2.net/";
}

//quiz();

function addanddisp() {
	var num1 = 10;
	var num2 = 5;
	for (var i = 0; i < 2; i++) {
		alert(num1 + num2 + "円");  //足し算
		num1 = num1 + num2;
	}
}

function sqr(a) {

	return a + "の２乗は" + a * a + "です。";

}

function quiz() {
	//問題を配列に入れる
	var q = new Array(
		"水を電気分解すると水素と酸素が出る。",
		"地球上で最も多い元素は炭素である。",
		"金の元素記号はGdである。",
		"血液は骨の内部で作られる。",
		"動物細胞に細胞壁は無い。"
	);

	//答え（正誤）を配列に入れる
	var ans = new Array(true, false, false, true);
	var ten = 0; //点数を入れる変数

	//５問連続出題
	for (var i = 0; i <= 4; i++) {
		if (confirm(q[i])
			== ans[i]) {
			ten = ten + 20;
		}
	}

	//採点結果発表
	alert("あなたは" + ten + "点でした！");
}

function namereq() {
	var str;  //入力文字を入れる変数

	//インプットボックスの表示＆入力文字をstrに代入
	str = prompt("お名前を教えて下さい。", "");

	//strが空の場合の処理
	if (str == "") str = "名無しの権兵衛";

	//名前を表示する
	document.write("<center>");
	document.write("ようこそ、<b>" + str + "</b>さん！");
	document.write("</center>");
}

//セレクトボックスに対応するリンク先を配列に入れる

//リンク先へジャンプさせる関数
function selectNavi() {
	var jpURL = new Array(
		"",
		"https://yahoo.co.jp/",
		"https://google.com",
		"http://hatena.ne.jp"
	);
	var num;

	//何番目のoptionが選択されたか調べる
	num = document.navi.contents.selectedIndex;

	if (num != 0) {
		//該当するリンク先へジャンプさせる
		location.href = jpURL[num];
	}
}


function modoru() {
	history.back();
}

function susumu() {
	history.forward();
}
function koshin() {
	history.reload();
}