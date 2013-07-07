<?php

//ライブラリをrequireしてください.
require_once("../croudia4php.php");

//client_id を入れてください, developer.croudia.com で取得できます.
$ci = "YOUR_CLIENT_ID";
//client_secret を入れてください, client_id と同時に発行されます.
$cs = "YOUR_CLIENT_SECRET";

//Croudia4PHPオブジェクトを生成します
$c4p = new Croudia4PHP($ci, $cs);

//GETでcode というパラメータが渡されるのでsetAccessToken()に渡してあげてください, 必須です.
//code 自体はアクセストークンではありません, 微妙なメソッド名で申し訳ない.
$c4p -> setAccessToken($_GET["code"]);

//ここでは例として"Croudia4PHP による投稿のテスト"と投稿し(ささやき)ます.
$res = $c4p -> POST_statuses_update(array("status" => "Croudia4PHP による投稿のテスト"));

//適当デバッグ, ちゃんとしたエラー処理もそのうちつけます
echo "<pre>";
var_dump($res);

//あとはセッションとか DB とかに c4p オブジェクトを入れてあげればいいと思います.
