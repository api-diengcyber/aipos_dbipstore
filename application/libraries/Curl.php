<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Curl {

	public function __construct()
	{
		$this->ci =& get_instance();
	}

	public function post($url, $post = array())
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
		    CURLOPT_URL => $url,
		    CURLOPT_USERAGENT => 'TOKOIJO',
		    CURLOPT_POST => 1,
		    CURLOPT_POSTFIELDS => $post,
	        CURLOPT_FOLLOWLOCATION => true,
	        CURLOPT_RETURNTRANSFER => true,     // return web page
	        CURLOPT_HEADER => false,    // don't return headers
	        CURLOPT_AUTOREFERER    => true,     // set referer on redirect
	        CURLOPT_CONNECTTIMEOUT => 36000,      // timeout on connect
	        CURLOPT_TIMEOUT        => 36000,      // timeout on response
	        CURLOPT_SSL_VERIFYPEER => false     // Disabled SSL Cert checks
		));
		$resp = curl_exec($curl);
		return $resp;
		curl_close($curl);
	}

	public function get($url)
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
		    CURLOPT_URL => $url,
		    CURLOPT_USERAGENT => 'TOKOIJO',
	        CURLOPT_FOLLOWLOCATION => true,
	        CURLOPT_RETURNTRANSFER => true,     // return web page
	        CURLOPT_HEADER         => false,    // don't return headers
	        CURLOPT_AUTOREFERER    => true,     // set referer on redirect
	        CURLOPT_CONNECTTIMEOUT => 36000,      // timeout on connect
	        CURLOPT_TIMEOUT        => 36000,      // timeout on response
	        CURLOPT_SSL_VERIFYPEER => false     // Disabled SSL Cert checks
		));
		$resp = curl_exec($curl);
		return $resp;
		curl_close($curl);
	}

	public $bearer = "";
	public $uuid = "";

	private function _gen_tokijokey($uuid)
	{
		return md5(md5(md5("TOKIJO2019".$uuid)));
	}

	public function tokijoapi($url, $post = array())
	{
		$header = array(
		    'Content-Type: application/json'
		);
		!empty($this->bearer)?$header[]='Authorization: Bearer '.$this->bearer:null;
		!empty($this->uuid)?$header[]='tokijokey: '.$this->_gen_tokijokey($this->uuid):null;
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_PORT => 8443,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
	        CURLOPT_HTTPHEADER => $header,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		    CURLOPT_URL => 'https://tokijo.co.id:8443/apps/v8/'.$url,
			CURLOPT_CUSTOMREQUEST => "POST",
		    CURLOPT_POSTFIELDS => json_encode($post),
	        CURLOPT_RETURNTRANSFER => true,
	        CURLOPT_CONNECTTIMEOUT => 36000,
	        CURLOPT_TIMEOUT => 36000
		));
		$this->bearer = "";
		$this->tokijokey = "";
		$resp = curl_exec($curl);
		return $resp;
		curl_close($curl);
	}

}

/* End of file Curl_model.php */
/* Location: ./application/models/Curl_model.php */