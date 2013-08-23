<?php

//ライブラリ読み込み
require_once("../croudia4php.php");
session_start();

//セッション切れをチェック
if(!isset($_SESSION["c4p"])){
	die("Error: Session timeout");
}

$c4p = $_SESSION["c4p"];

//ささやいてみよう
$res = $c4p -> POST_statuses_update(array("status" => "ｱｰてすてす"));
$res = $c4p -> POST_account_update_profile(array("description" => "ｱｰてすてす"));

//適当デバッグ
echo "<pre>";
var_dump($res);
