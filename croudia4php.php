<?php

class Croudia4PHP {
	private $client_id;
	private $client_secret;
	private $access_token;
	
	public function __construct($c_id, $c_secret) {
		$this -> client_id = $c_id;
		$this -> client_secret = $c_secret;
	}
	
	public function getAuthorizeURL(){
		return "http://api.croudia.com/oauth/authorize?response_type=code&client_id=".$this -> client_id;
	}
	
	public function setAccessToken($code){
		$params = array(
			"grant_type" => "authorization_code", 
			"client_id" => $this -> client_id, 
			"client_secret" => $this -> client_secret, 
			"code" => $code
		);
		
		$opts["http"] = array(
			"method" => "POST", 
			"header"  => "Content-type: application/x-www-form-urlencoded",
			"content" => http_build_query($params)
		);
		
		$res = file_get_contents("http://api.croudia.com/oauth/token", false, stream_context_create($opts));
		$access_token = json_decode($res) -> access_token;
		$this -> access_token = $access_token;
		return $this -> access_token;
	}
	
	public function GET_statuses_public_timeline($params = array()){
		$headers = array(
			"Content-type: application/x-www-form-urlencoded", 
			"Authorization: Bearer ".$this -> access_token
		);
		$opts["http"] = array(
			"method" => "GET", 
			"header"  =>  implode("\r\n", $headers), 
			"content" => http_build_query($params)
		);
		$res = file_get_contents("http://api.croudia.com/statuses/public_timeline.json", false, stream_context_create($opts));
		return json_decode($res);
	}
	
	public function GET_statuses_home_timeline($params = array()){
		$headers = array(
			"Content-type: application/x-www-form-urlencoded", 
			"Authorization: Bearer ".$this -> access_token
		);
		$opts["http"] = array(
			"method" => "GET", 
			"header"  =>  implode("\r\n", $headers), 
			"content" => http_build_query($params)
		);
		$res = file_get_contents("http://api.croudia.com/statuses/home_timeline.json", false, stream_context_create($opts));
		return json_decode($res);
	}
	
	public function GET_statuses_user_timeline($params = array()){
		$headers = array(
			"Content-type: application/x-www-form-urlencoded", 
			"Authorization: Bearer ".$this -> access_token
		);
		$opts["http"] = array(
			"method" => "GET", 
			"header"  =>  implode("\r\n", $headers), 
			"content" => http_build_query($params)
		);
		$res = file_get_contents("http://api.croudia.com/statuses/user_timeline.json", false, stream_context_create($opts));
		return json_decode($res);
	}
	
	public function GET_statuses_mentions($params = array()){
		$headers = array(
			"Content-type: application/x-www-form-urlencoded", 
			"Authorization: Bearer ".$this -> access_token
		);
		$opts["http"] = array(
			"method" => "GET", 
			"header"  =>  implode("\r\n", $headers), 
			"content" => http_build_query($params)
		);
		$res = file_get_contents("http://api.croudia.com/statuses/mentions.json", false, stream_context_create($opts));
		return json_decode($res);
	}
	
	public function POST_statuses_update($params = array()){
		$headers = array(
			"Content-type: application/x-www-form-urlencoded", 
			"Authorization: Bearer ".$this -> access_token
		);
		$opts["http"] = array(
			"method" => "POST", 
			"header"  =>  implode("\r\n", $headers), 
			"content" => http_build_query($params)
		);
		$res = file_get_contents("http://api.croudia.com/statuses/update.json", false, stream_context_create($opts));
		return json_decode($res);
	}
	
	public function POST_statuses_destroy($params = array()){
		$headers = array(
			"Content-type: application/x-www-form-urlencoded", 
			"Authorization: Bearer ".$this -> access_token
		);
		$opts["http"] = array(
			"method" => "POST", 
			"header"  =>  implode("\r\n", $headers), 
			"content" => http_build_query($params)
		);
		$id = $params["id"];
		$res = file_get_contents("http://api.croudia.com/statuses/destroy/".$id.".json", false, stream_context_create($opts));
		return json_decode($res);
	}
	
	public function GET_statuses_show($params = array()){
		$headers = array(
			"Content-type: application/x-www-form-urlencoded", 
			"Authorization: Bearer ".$this -> access_token
		);
		$opts["http"] = array(
			"method" => "GET", 
			"header"  =>  implode("\r\n", $headers), 
			"content" => http_build_query($params)
		);
		$id = $params["id"];
		$res = file_get_contents("http://api.croudia.com/statuses/show/".$id.".json", false, stream_context_create($opts));
		return json_decode($res);
	}
	
	public function POST_favorites_create($params = array()){
		$headers = array(
			"Content-type: application/x-www-form-urlencoded", 
			"Authorization: Bearer ".$this -> access_token
		);
		$opts["http"] = array(
			"method" => "POST", 
			"header"  =>  implode("\r\n", $headers), 
			"content" => http_build_query($params)
		);
		$id = $params["id"];
		$res = file_get_contents("http://api.croudia.com/favorites/create/".$id.".json", false, stream_context_create($opts));
		return json_decode($res);
	}
	
	public function POST_favorites_destroy($params = array()){
		$headers = array(
			"Content-type: application/x-www-form-urlencoded", 
			"Authorization: Bearer ".$this -> access_token
		);
		$opts["http"] = array(
			"method" => "POST", 
			"header"  =>  implode("\r\n", $headers), 
			"content" => http_build_query($params)
		);
		$id = $params["id"];
		$res = file_get_contents("http://api.croudia.com/favorites/destroy/".$id.".json", false, stream_context_create($opts));
		return json_decode($res);
	}
	
}
