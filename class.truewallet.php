<?php
class TrueWallet{
	var $username;
	var $password;
	var $passhash; 

	public function __construct($user,$pass) {
		$this->username = $user;
		$this->password = $pass;
		$this->passhash = sha1($user.$pass);
	}

	function GetToken(){
		$header[] = "Host: api-ewm.truemoney.com"; 
		$header[] = "Content-Type: application/json"; 
		
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,'https://api-ewm.truemoney.com/api/v1/signin?&device_os=android&device_id=d520d0d12d0d48cb89394905168c6ed5&device_type=CPH1611&device_version=6.0.1&app_name=wallet&app_version=2.9.14');
		curl_setopt($ch,CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);                                                                  
		curl_setopt($ch,CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch,CURLOPT_POSTFIELDS, '{"username":"'.$this->username.'","password":"'.$this->passhash.'","type":"email","deviceToken":"fUUbZJ9nwBk:APA91bHHgBBHhP9rqBEon_BtUNz3rLHQ-sYXnezA10PRSWQTwFpMvC9QiFzh-CqPsbWEd6x409ATC5RVsHAfk_-14cSqVdGzhn8iX2K_DiNHvpYfMMIzvFx_YWpYj5OaEzMyIPh3mgtx","mobileTracking":"dJyFzn\/GIq7lrjv2RCsZbphpp0L\/W2+PsOTtOpg352mgWrt4XAEAAA=="}');                                                                  
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);     
		curl_setopt($ch,CURLOPT_USERAGENT,'');
		$result = curl_exec($ch);
		$json = json_decode($result,true);
		if($json['code'] == "20000"){
			$data['code'] = $json['code'];
			$data['accessToken'] = $json['data']['accessToken'];
			return json_encode($data);
		}else{
			$data['code'] = $json['code'];
			$data['title'] = $json['titleTh'];
			$data['message'] = $json['messageTh'];
			return json_encode($data);
		}
	}

	function Profile($token){
		$header[] = "Host: api-ewm.truemoney.com"; 
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,"https://api-ewm.truemoney.com/api/v1/profile/".$token."?&device_os=android&device_id=d520d0d12d0d48cb89394905168c6ed5&device_type=CPH1611&device_version=6.0.1&app_name=wallet&app_version=2.9.14");
		curl_setopt($ch,CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);                                                                          
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);     
		curl_setopt($ch,CURLOPT_USERAGENT,'');
		$result = curl_exec($ch);
		$json = json_decode($result,true);
		if($json['code'] == "20000"){
			$data['code'] = $json['code'];
			$data['tmnid'] = $json['data']['tmnId'];
			$data['mobileNumber'] = $json['data']['mobileNumber'];
			$data['balance'] = $json['data']['currentBalance'];
			$data['email'] = $json['data']['email'];
			$data['name'] = $json['data']['fullname'];
			$data['tssn'] = $json['data']['thaiId'];
			return json_encode($data);
		}else{
			$data['code'] = $json['code'];
			$data['title'] = $json['titleTh'];
			$data['message'] = $json['messageTh'];
			return json_encode($data);
		}
	}

	function Topup($cashcard,$token){
		$header[] = "Host: api-ewm.truemoney.com"; 
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,"https://api-ewm.truemoney.com/api/api/v1/topup/mobile/".time()."/".$token."/cashcard/".$cashcard);
		curl_setopt($ch,CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);                                                                  
		curl_setopt($ch,CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);     
		curl_setopt($ch,CURLOPT_USERAGENT,'');
		$result = curl_exec($ch);
		$json = json_decode($result,true);
		if($json['transactionId'] <> ""){
			$data['code'] = "20000";
			$data['transactionId'] = $json['transactionId'];
			$data['amount'] = $json['amount'];
			$data['Fee'] = $json['serviceFee'];
			$data['cashcard'] = $json['cashcardPin'];
			$data['createDate'] = $json['createDate'];
			$data['totalAmount'] = $json['totalAmount'];
			$data['balance'] = $json['remainingBalance'];
			return json_encode($data);
		}else{
			$data['code'] = $json['code'];
			$data['title'] = $json['titleTh'];
			$data['message'] = $json['messageTh'];
			return json_encode($data);
		}
	}
}
?>