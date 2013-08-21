<?php

//ライブラリ読み込み
require_once("../croudia4php.php");
session_start();

//セッション切れをチェック
if(!isset($_SESSION["c4p"])){
	die("Error: Session timeout");
}

$c4p = $_SESSION["c4p"];

$res = $c4p -> POST_statuses_update(array("status" => "Test Sasayaki."));

echo "<pre>";
var_dump($res);