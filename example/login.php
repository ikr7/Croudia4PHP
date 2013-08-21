<?php

//ライブラリ読み込み
require_once("../croudia4php.php");

session_start();

// Facebookのキー
$ci = "4d779a25016826d604c7492310719e02936e1d89e420247a0473370a4a733886";
$cs = "54fb4521c543e2511e166e3a46175d0f20503c7b4150af56b7e5c5243e4decce";

$_SESSION["c4p"] = new CroudiaForPHP($ci, $cs);
$c4p = $_SESSION["c4p"];

$url = $c4p -> getAuthorizeURL();

echo "<a href=\"".$url."\">LOGIN</a>";