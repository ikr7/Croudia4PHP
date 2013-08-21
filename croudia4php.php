<?php

class Croudia4PHP {
	private $client_id;
	private $client_secret;
	private $access_token;
	private $refresh_token;
	
	public function __construct($client_id, $client_secret) {
		$this -> client_id = $client_id;
		$this -> client_secret = $client_secret;
	}
	
	public function getAuthorizeURL(){
		return "https://api.croudia.com/oauth/authorize?response_type=code&client_id=".$this -> client_id;
	}
	
	//GET Request
	public function get($url, $params, $headers = array("Content-type: application/x-www-form-urlencoded")){
		$opts["http"] = array(
			"method" => "GET", 
			"header"  => implode("\r\n", $headers), 
			"content" => http_build_query($params), 
			"ignore_errors" => true
		);
		
		$res = file_get_contents($url, false, stream_context_create($opts));
		if(!strpos($http_response_header[0], "200")){
			$this -> refreshAccessToken();
			$res = file_get_contents($url, false, stream_context_create($opts));
		}
		return json_decode($res);
	}
	
	//POST Request
	public function post($url, $params, $headers = array("Content-type: application/x-www-form-urlencoded")){
		$opts["http"] = array(
			"method" => "POST", 
			"header"  => implode("\r\n", $headers), 
			"content" => http_build_query($params), 
			"ignore_errors" => true
		);
		$res = file_get_contents($url, false, stream_context_create($opts));
		if(!strpos($http_response_header[0], "200")){
			$this -> refreshAccessToken();
			$res = file_get_contents($url, false, stream_context_create($opts));
		}
		return json_decode($res);
	}
	
	public function getAccessToken($code){
		$params = array(
			"grant_type" => "authorization_code", 
			"client_id" => $this -> client_id, 
			"client_secret" => $this -> client_secret, 
			"code" => $code
		);
		$res = self::post("https://api.croudia.com/oauth/token", $params);
		$access_token = $res -> access_token;
		$refresh_token = $res -> access_token;
		$this -> access_token = $access_token;
		$this -> refresh_token = $refresh_token;
		
		return $this -> access_token;
	}
	
	public function refreshAccessToken(){
		$params = array(
			"grant_type" => "refresh_token", 
			"client_id" => $this -> client_id, 
			"client_secret" => $this -> client_secret, 
			"refresh_token" => $refresh_token
		);
		$res = self::post("https://api.croudia.com/oauth/token", $params, $headers);
	}
	
	public function GET_statuses_public_timeline($params = array()){
		$headers = array(
			"Content-type: application/x-www-form-urlencoded", 
			"Authorization: Bearer ".$this -> access_token
		);
		
		$res = self::get("https://api.croudia.com/statuses/public_timeline.json", $params, $headers);
		return $res;
	}
	
	public function GET_statuses_home_timeline($params = array()){
		$headers = array(
			"Content-type: application/x-www-form-urlencoded", 
			"Authorization: Bearer ".$this -> access_token
		);
		$res = self::get("https://api.croudia.com/statuses/home_timeline.json", $params, $headers);
		return $res;
	}
	
	public function GET_statuses_user_timeline($params = array()){
		$headers = array(
			"Content-type: application/x-www-form-urlencoded", 
			"Authorization: Bearer ".$this -> access_token
		);
		$res = self::get("https://api.croudia.com/statuses/user_timeline.json", $params, $headers);
		return $res;
	}
	
	public function GET_statuses_mentions($params = array()){
		$headers = array(
			"Content-type: application/x-www-form-urlencoded", 
			"Authorization: Bearer ".$this -> access_token
		);
		$res = self::get("https://api.croudia.com/statuses/mentions.json", $params, $headers);
		return $res;
	}
	
	public function POST_statuses_update($params = array()){
		$headers = array(
			"Content-type: application/x-www-form-urlencoded", 
			"Authorization: Bearer ".$this -> access_token
		);
		$res = self::post("https://api.croudia.com/statuses/update.json", $params, $headers);
		return $res;
	}
	
	public function POST_statuses_update_with_media($params = array()){
		//未実装
		return false;
	}
	
	public function POST_statuses_destroy($params = array()){
		$headers = array(
			"Content-type: application/x-www-form-urlencoded", 
			"Authorization: Bearer ".$this -> access_token
		);
		$id = $params["id"];
		$res = self::post("https://api.croudia.com/statuses/destroy/".$id.".json", $params, $headers);
		return $res;
	}
	
	public function GET_statuses_show($params = array()){
		$headers = array(
			"Content-type: application/x-www-form-urlencoded", 
			"Authorization: Bearer ".$this -> access_token
		);
		$id = $params["id"];
		$res = self::get("https://api.croudia.com/statuses/show/".$id.".json", $params, $headers);
		return $res;
	}
	
	public function GET_secret_mails($params = array()){
		$headers = array(
			"Content-type: application/x-www-form-urlencoded", 
			"Authorization: Bearer ".$this -> access_token
		);
		$res = self::get("https://api.croudia.com/secret_mails.json", $params, $headers);
		return $res;
	}
	
	public function GET_secret_mails_sent($params = array()){
		$headers = array(
			"Content-type: application/x-www-form-urlencoded", 
			"Authorization: Bearer ".$this -> access_token
		);
		$res = self::get("https://api.croudia.com/secret_mails/sent.json", $params, $headers);
		return $res;
	}
	
	public function POST_secret_mails_new($params = array()){
		$headers = array(
			"Content-type: application/x-www-form-urlencoded", 
			"Authorization: Bearer ".$this -> access_token
		);
		$res = self::post("https://api.croudia.com/secret_mails/new.json", $params, $headers);
		return $res;
	}
	
	public function POST_secret_mails_destroy($params = array()){
		$headers = array(
			"Content-type: application/x-www-form-urlencoded", 
			"Authorization: Bearer ".$this -> access_token
		);
		$id = $params["id"];
		$res = self::post("https://api.croudia.com/secret_mails/destroy/".$id.".json", $params, $headers);
		return $res;
	}
	
	public function GET_secret_mails_show($params = array()){
		$headers = array(
			"Content-type: application/x-www-form-urlencoded", 
			"Authorization: Bearer ".$this -> access_token
		);
		$id = $params["id"];
		$res = self::get("https://api.croudia.com/secret_mails/show/".$id.".json", $params, $headers);
		return $res;
	}
	
	public function GET_users_show($params = array()){
		$headers = array(
			"Content-type: application/x-www-form-urlencoded", 
			"Authorization: Bearer ".$this -> access_token
		);
		$res = self::get("https://api.croudia.com/users/show.json", $params, $headers);
		return $res;
	}
	
	public function GET_users_lookup($params = array()){
		$headers = array(
			"Content-type: application/x-www-form-urlencoded", 
			"Authorization: Bearer ".$this -> access_token
		);
		$res = self::get("https://api.croudia.com/users/lookup.json", $params, $headers);
		return $res;
	}
	
	public function GET_account_verify_credentials($params = array()){
		$headers = array(
			"Content-type: application/x-www-form-urlencoded", 
			"Authorization: Bearer ".$this -> access_token
		);
		$res = self::get("https://api.croudia.com/account_verify_credientals.json", $params, $headers);
		return $res;
	}
	
	public function POST_account_update_profile_image($params = array()){
		//未実装
		return false;
	}
	
	public function POST_friendships_create($params = array()){
		$headers = array(
			"Content-type: application/x-www-form-urlencoded", 
			"Authorization: Bearer ".$this -> access_token
		);
		$res = self::post("https://api.croudia.com/friendships/create.json", $params, $headers);
		return $res;
	}
	
	public function POST_friendships_destroy($params = array()){
		$headers = array(
			"Content-type: application/x-www-form-urlencoded", 
			"Authorization: Bearer ".$this -> access_token
		);
		$res = self::post("https://api.croudia.com/friendships/destroy.json", $params, $headers);
		return $res;
	}
	
	public function GET_friendships_show($params = array()){
		$headers = array(
			"Content-type: application/x-www-form-urlencoded", 
			"Authorization: Bearer ".$this -> access_token
		);
		$res = self::get("https://api.croudia.com/friendships/show.json", $params, $headers);
		return $res;
	}
	
	public function GET_friendships_lookup($params = array()){
		$headers = array(
			"Content-type: application/x-www-form-urlencoded", 
			"Authorization: Bearer ".$this -> access_token
		);
		$res = self::get("https://api.croudia.com/friendships/lookup.json", $params, $headers);
		return $res;
	}
	
	public function GET_favorites($params = array()){
		$headers = array(
			"Content-type: application/x-www-form-urlencoded", 
			"Authorization: Bearer ".$this -> access_token
		);
		$res = self::get("https://api.croudia.com/favorites.json", $params, $headers);
		return $res;
	}
	
	public function POST_favorites_create($params = array()){
		$headers = array(
			"Content-type: application/x-www-form-urlencoded", 
			"Authorization: Bearer ".$this -> access_token
		);
		$id = $params["id"];
		$res = self::post("https://api.croudia.com/favorites/create/".$id.".json", $params, $headers);
		return $res;
	}
	
	public function POST_favorites_destroy($params = array()){
		$headers = array(
			"Content-type: application/x-www-form-urlencoded", 
			"Authorization: Bearer ".$this -> access_token
		);
		$id = $params["id"];
		$res = self::post("https://api.croudia.com/favorites/destroy/".$id.".json", $params, $headers);
		return $res;
	}
	
}