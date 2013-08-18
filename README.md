#Croudia4PHP
##言い訳
Croudia API をPHPで扱うためのライブラリです。  
一応、[Croudia REST API 1.0](http://developer.croudia.com/docs/api10)
にあるエンドポイントは全て扱える…と思いましたが、  ~~Croudia側での不具合によりmentionsが取得できません~~  

~~また、refresh_tokenとかその辺のアレも実装してないので、めっちゃトークン切れます。これもいつかなんとかする~~  

以上の点により、あまり実用性は無いと思います、テスト程度に使ってください

##つかいかた

example見ればわかる

##メソッド一覧

getAuthorizeURL()…認証URLを返します  
setAccessToken()…callbackに渡される code というGETパラメータを渡してアクセストークンをCroudia4PHPオブジェクトにセットします  
refreshAccessToken()…アクセストークンを更新する 各メソッドでAPIを叩いて$c4p -> httphead[0] に"HTTP/1.1 401 Authorization Required"が入っているときに叩くといいとか


GET_statuses_public_timeline()  
GET_statuses_home_timeline()  
GET_statuses_user_timeline()  
GET_statuses_mentions()  
GET_statuses_show()  

POST_statuses_update()  
POST_statuses_update_with_media()  
POST_statuses_spread()  
POST_statuses_destroy()  



POST_favorites_create()  
POST_favorites_destroy()  

このへんは[Croudia REST API 1.0](http://developer.croudia.com/docs/api10) を見て察してくれ

##POST_statuses_update_with_media利用について

POSTされて$_FILESに格納されたのをそのまま受け渡します

第二引数にPOST時のnameを指定。

ローカルファイル等を扱う際は$_FILESに配列突っ込めば使える(?)


