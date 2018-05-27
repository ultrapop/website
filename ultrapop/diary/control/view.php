<!DOCTYPE html>
<html>
<head>
<a href="./">ウルトラポップエントリ編集ツール</a><br>
<meta charset="utf-8">
<title>記事投稿 | Special Blog</title>
<link rel="stylesheet" href="blog.css">
</head>
<body>
<form method="post" action="index.php">
	<div class="post">
		<h2>記事投稿</h2>
		<p>題名<input type="text" name="title" size="40" value="<?php echo $title ?>"></p>
		<p>本文<textarea name="content" rows="8" cols="40"><?php echo $content ?></textarea></p>
		<p>パスワード<input name="passwd" type="password" rows="1" cols="10"><input name="submit" type="submit" value="投稿"></p>
	</div>
</form>
<form method="post" action="index.php">
	<div class="edit">
		<h2>編集</h2>
		<p>編集ID<input type="text" name="editid" size="40" value="<?php echo $editentryid ?>"></p>
		<p>編集題名<input type="text" name="edittitle" size="40" value="<?php echo $edittitle ?>"></p>
		<p>編集本文<textarea name="edittext" rows="8" cols="40"><?php echo $edittext ?></textarea></p>
		<p>パスワード<input name="passwd" type="password" rows="1" cols="10"><input name="edit" type="submit" value="編集"></p>
	</div>
</form>
<form method="post" action="index.php">
	<div class="delete">
		<h2>削除</h2>
		<p>削除ID<input type="text" name="delid" size="40" value="<?php echo $delentryid ?>"></p>
		<p>削除題名<input type="text" name="title" size="40" value="<?php echo $deltitle ?>"></p>
		<p>削除本文<textarea name="content" rows="8" cols="40"><?php echo $deltext ?></textarea></p>
		<p>パスワード<input name="passwd" type="password" rows="1" cols="10"><input name="delete" type="submit" value="削除"></p>
	</div>
</form>
<?php
// １．DBにアクセスして、一覧を取得する
// ２．一覧を表示し、編集する場合のリンクを作成する
// ３．リンク先で、削除とか出来るようにする
// ４．超危険なので、パスワードを掛ける

$st = $pdo->query("SELECT * FROM diaryentry ORDER BY entryid DESC");

while ($row = $st->fetch()) { // エントリ出力ループ
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

	echo "$entryid ：";
	echo "$title ：";
	echo "$dtt ：";
	$text=strip_tags($text );
	$text=mb_substr($text ,0,20);
	echo "$text ：";

	echo "<a href=\"./?sid=$entryid&act=del\">削除</a> ：";
	echo "<a href=\"./?sid=$entryid&act=edit\">編集</a><br>";
}

?>

</body>
</html>
