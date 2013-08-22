<?php

//ライブラリ読み込み
require_once("../croudia4php.php");
session_start();

//セッション切れをチェック
if(!isset($_SESSION["c4p"])){
	die("Error: Session timeout");
}

$c4p = $_SESSION["c4p"];

<<<<<<< HEAD
$res = $c4p -> POST_statuses_update(array("status" => "Facebookですよ"));
=======
//ささやいてみよう
$res = $c4p -> POST_statuses_update(array("status" => "Test Sasayaki."));
>>>>>>> 7858c30c6a2941e5f6b916ce7a41318c08884523

//適当デバッグ
echo "<pre>";
var_dump($res);
