<?php

//ライブラリを読み込み
require_once("../croudia4php.php");

session_start();

//セッション切れをチェック
if(!isset($_SESSION["c4p"])){
	die("Error: Session timeout");
}

//code パラメータがあるかどうかをチェック
if (!isset($_GET["code"])){
    die("Error: No code");
}

$c4p = $_SESSION["c4p"];

//アクセストークンを取得させる
$c4p -> getAccessToken($_GET["code"]);

//アプリケーションのメイン画面に移動
header("Location: main.php");
exit();
