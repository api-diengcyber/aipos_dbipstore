<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crypto {

	private $key = "rs57drsa5d4s8a7df5gf87s8fr57v6d7s5f68sd5f7ds5gf7asd5f76asd5f80asd9f7asdfbg67"; // STATIC

	public function __construct()
	{
		$this->ci =& get_instance();
	}

	/**
	* Decrypt data from a CryptoJS json encoding string
	*
	* @param mixed $this->key
	* @param mixed $jsonString
	* @return mixed
	*/
	public function decrypt($data) {
		$exdata = explode(';', $data);
	    try {
	        $salt = hex2bin(!empty($exdata[2]) ? $exdata[2] : "");
	        $iv  = hex2bin(!empty($exdata[1]) ? $exdata[1] : "");
	    } catch(Exception $e) { return null; }
	    $ct = base64_decode($exdata[0]);
	    $concatedPassphrase = $this->key.$salt;
	    $md5 = array();
	    $md5[0] = md5($concatedPassphrase, true);
	    $result = $md5[0];
	    for ($i = 1; $i < 3; $i++) {
	        $md5[$i] = md5($md5[$i - 1].$concatedPassphrase, true);
	        $result .= $md5[$i];
	    }
	    $key = substr($result, 0, 32);
	    $data = openssl_decrypt($ct, 'aes-256-cbc', $key, true, $iv);
	    return $data;
	}

	/**
	* Encrypt value to a cryptojs compatiable json encoding string
	*
	* @param mixed $this->key
	* @param mixed $value
	* @return string
	*/
	public function encrypt($value) {
	    $salt = openssl_random_pseudo_bytes(8);
	    $salted = '';
	    $dx = '';
	    while (strlen($salted) < 48) {
	        $dx = md5($dx.$this->key.$salt, true);
	        $salted .= $dx;
	    }
	    $key = substr($salted, 0, 32);
	    $iv  = substr($salted, 32,16);
	    $encrypted_data = openssl_encrypt($value, 'aes-256-cbc', $key, true, $iv);
	    $data = array(base64_encode($encrypted_data), bin2hex($iv), bin2hex($salt));
	    return implode(';', $data);
	}

}