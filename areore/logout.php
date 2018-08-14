<?php

error_reporting(0);
if( !isset( $_SESSION ) ) {
	session_start([
		'cookie_lifetime' => 864000,
	]);
}

if (isset($_SESSION["NAME"])) {
    $errorMessage = "ログアウトしました。";
} else {
    $errorMessage = "セッションがタイムアウトしました。";
}

// セッションの変数のクリア
$_SESSION = array();

// セッションクリア
@session_destroy();
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ログアウト</title>
    </head>
    <body>
        <h1>ログアウト画面</h1>
        <div><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></div>
        <ul>
            <li><a href="login.php">ログイン画面に戻る</a></li>
        </ul>
    </body>
</html>