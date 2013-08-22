<?php

//ライブラリ読み込み
require_once("../croudia4php.php");

session_start();

$ci = "YOUR_CLIENT_KEY";
$cs = "YOUR_CLIENT_SECRET";

$_SESSION["c4p"] = new Croudia4PHP($ci, $cs);
$c4p = $_SESSION["c4p"];

$url = $c4p -> getAuthorizeURL();

echo "<a href=\"".$url."\">LOGIN</a>";