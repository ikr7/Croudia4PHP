#Croudia4PHP
##言い訳
Croudia API をPHPで扱うためのライブラリです。  

未実装のメソッドがあったりアクセストークンの更新とかもいろいろアレなので あまり実用性は無いと思います、テスト程度にご利用下さい  
(誰か使ってみてバグとかあったら教えて下さい…Pull Reqください…)  
悪用すんなよ

##つかいかた

example見ればわかる

##メソッド一覧

getAuthorizeURL()…認証URLを返します  
getAccessToken()…callbackに渡される code というGETパラメータを渡してアクセストークンをCroudia4PHPオブジェクトにセットします  
refreshAccessToken()…アクセストークンを更新します(エラー出たら自動で呼ぶ感じにしたいけどできていない)  
  
public function GET_statuses_public_timeline()  
public function GET_statuses_home_timeline()  
public function GET_statuses_user_timeline()  
public function GET_statuses_mentions()  
  
public function POST_statuses_update()  
public function POST_statuses_update_with_media() (未実装です)  
public function POST_statuses_destroy()  
public function GET_statuses_show()  
  
public function GET_secret_mails()  
public function GET_secret_mails_sent()  
public function POST_secret_mails_new()  
public function POST_secret_mails_destroy()  
public function GET_secret_mails_show()  
  
public function GET_users_show()  
public function GET_users_lookup()  
  
public function GET_account_verify_credentials()  
public function POST_account_update_profile_image() (未実装です)  
public function GET_account_update_profile()  
  
public function POST_friendships_create()  
public function POST_friendships_destroy()  
public function GET_friendships_show()  
public function GET_friendships_lookup()  
  
public function POST_statuses_spread()    
  
public function GET_favorites()  
public function POST_favorites_create()  
public function POST_favorites_destroy()  

引数とかについては[Croudia REST API 1.0](http://developer.croudia.com/docs/api10) とかexample見て察して
