#Croudia4PHP
##言い訳
Croudia API をPHPで扱うためのライブラリです。  
一応、[Croudia REST API 1.0](http://developer.croudia.com/docs/api10)
にあるエンドポイントは全て扱える…と思いましたが、mentionsが取得できません。~~そのうちなんとかする~~Croudia側での不具合でした

また、refresh_tokenとかその辺のアレも実装してないので、めっちゃトークン切れます。これもそのうちなんとかする  

以上の点により、あまり実用性は無いと言えます、テスト程度に使ってください

##つかいかた

example見ればわかる

##メソッド一覧

getAuthorizeURL()…認証URLを返します  
setAccessToken()…callbackに渡される code というGETパラメータを渡してアクセストークンをCroudia4PHPオブジェクトにセットします  

GET_statuses_public_timeline()  
GET_statuses_home_timeline()  
GET_statuses_user_timeline()  
~~GET_statuses_mentions()~~Croudia側での不具合により07/12/2013現在利用できません  
GET_statuses_show()  

POST_statuses_update()  
POST_statuses_destroy()  

POST_favorites_create()  
POST_favorites_destroy()  

このへんは[Croudia REST API 1.0](http://developer.croudia.com/docs/api10) を見て察してくれ
