<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Curl_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function post($url, $post = array())
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
		    CURLOPT_URL => $url,
		    CURLOPT_USERAGENT => 'AIPOS',
		    CURLOPT_POST => 1,
		    CURLOPT_POSTFIELDS => $post,
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

	public function get($url)
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
		    CURLOPT_URL => $url,
		    CURLOPT_USERAGENT => 'AIPOS',
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

}

/* End of file Curl_model.php */
/* Location: ./application/models/Curl_model.php */