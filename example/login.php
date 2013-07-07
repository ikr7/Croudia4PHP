<?php

//ライブラリをrequireしてください.
require_once("../croudia4php.php");

//client_id を入れてください, developer.croudia.com で取得できます.
$ci = "YOUR_CLIENT_ID";
//client_secret を入れてください, client_id と同時に発行されます.
$cs = "YOUR_CLIENT_SECRET";

//Croudia4PHPオブジェクトを生成します.
$c4p = new Croudia4PHP($ci, $cs);

//認証用のURLを取得します.
$url = $c4p -> getAuthorizeURL();

echo "<a href=\"".$url."\">LOGIN</a>";