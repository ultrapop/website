<?php
error_reporting(0);
require_once '../../website_etc/dbpass.php';

session_start();
// セッションをログアウト状態にする
$_SESSION["NAME"]=""; //再考の余地があるが、とりあえず名前にしておく

require_once '../../website_etc/areore_dbpass.php';
$host=gethostname();

if(strpos($host, 'sakura.ne.jp')){
	$pdo = new PDO($dbname , $usr, $pass);
}elseif(strpos($host, 'local')){
	$pdo = new PDO($dbname_local, $usr, $pass);
}else{
	exit(0);
}


// エラーメッセージの初期化
$errorMessage = "";

// ログインボタンが押された場合
if (isset($_POST["login"])) {
    // 1. ユーザIDの入力チェック
    if (empty($_POST["userid"])) {  // emptyは値が空のとき
        $errorMessage = 'ユーザーIDが未入力です。';
    } else if (empty($_POST["password"])) {
        $errorMessage = 'パスワードが未入力です。';
    }

    $postedUserId = $_POST["userid"];
    if(!preg_match('/\A[a-z0-9_]++\z/ui', $_POST["userid"])){
        $errorMessage = "ユーザーIDには英数文字と_(アンダースコア)のみが使えます。";
    }else if($st = $pdo->query("select * from users where userId=\"$postedUserId\"")){
        $row = $st->fetch();
        if($row){
            if (password_verify($_POST["password"], $row['password'])) {
                $_SESSION["NAME"]=$postedUserId; //再考の余地があるが、とりあえず名前にしておく
                header('Location: index.php');
                exit(0);
            }else{
                $errorMessage = "ユーザーIDまたはパスワードが違います";//パスワード違い
            }
        }else{
            $errorMessage = "ユーザーIDまたはパスワードが違います";//該当ユーザーなし
        }
    }else{
        $errorMessage = "DBエラー";
    }
}
?>

<!doctype html>
<html>
    <head>
            <meta charset="UTF-8">
            <title>ログイン</title>
    </head>
    <body>
        <h1>ログイン画面</h1>
        <form id="loginForm" name="loginForm" action="" method="POST">
            <fieldset>
                <legend>ログインフォーム</legend>
                <div><font color="#ff0000"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></font></div>
                <label for="userid">ユーザーID</label><input type="text" id="userid" name="userid" placeholder="ユーザーIDを入力" value="<?php if (!empty($_POST["userid"])) {echo htmlspecialchars($_POST["userid"], ENT_QUOTES);} ?>">
                <br>
                <label for="password">パスワード</label><input type="password" id="password" name="password" value="" placeholder="パスワードを入力">
                <br>
                <input type="submit" id="login" name="login" value="ログイン">
            </fieldset>
        </form>
        <br>
        <form action="signUp.php">
            <fieldset>          
                <legend>新規登録フォーム</legend>
                <input type="submit" value="新規登録">
            </fieldset>
        </form>
    </body>
</html>