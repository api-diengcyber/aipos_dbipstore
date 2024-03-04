<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Xjson {

	private $array = array();
	private $key = "7124b58v63b187634b5f1346v85456b3457re66745rewr64fwer64r";
	private $isCrypt = true;
	private $isOpenheader = false;

	public function __construct()
	{
		$this->ci =& get_instance();
		$this->ci->load->library('crypto');
	}

	public function get($key, $xss_clean = false)
	{
		$valget = $this->ci->input->get($key, $xss_clean);
		$decrypt = $this->ci->crypto->decrypt($valget);
		if ($decrypt!="" && $decrypt!=null) {
			return $decrypt;
		} else {
			return $valget;
		}
	}

	public function post($key, $xss_clean = false)
	{
		$valpost = $this->ci->input->post($key, $xss_clean);
		$decrypt = $this->ci->crypto->decrypt($valpost);
		if ($decrypt!="" && $decrypt!=null) {
			return $decrypt;
		} else {
			return $valpost;
		}
	}

	public function openHeaders()
	{
		header("Content-Type: application/json");
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: POST, GET, OPTION");
		header("Access-Control-Max-Age: 3600");
		header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
		$this->isOpenheader = true;
	}

	public function yescrypt()
	{
		$this->isCrypt = true;
	}

	public function nocrypt()
	{
		$this->isCrypt = false;
	}

	public function keyc($err_res = true)
	{
		$get_key = $this->ci->input->get('key', true);
		if (!empty($get_key) && $get_key==$this->key) {
			return (bool) true;
		} else {
			if ($err_res) {
				$this->error("Key is not valid", 1);
			} else {
				return (bool) false;
			}
		}
	}

	public function create_token()
	{
		$token = sha1(date('Y-m-d H:i:s'));
		return $token;
	}

	public function tokenc($err_res = true)
	{
		$get_token = $this->ci->input->get('token', true);
		if (empty($get_token)) {
			$get_token = $this->ci->input->post('token', true);
		}
		if (!empty($get_token)) {
			$row = $this->ci->db->where('token', $get_token)->where('onlogin', 1)->where('active', 1)->get('users')->row();
			if (!$row) {
				if ($err_res) {
					$this->error("Token is not valid", 1);
				} else {
					return (bool) false;
				}
			} else {
				return (bool) true;
			}
		} else {
			if ($err_res) {
				$this->error("Token is null", 1);
			} else {
				return (bool) false;
			}
		}
	}

	public function add($key, $value)
	{
		$this->array[$key] = $value;	
	}

	public function ok($msg = "")
	{	
		$this->add('status', 'ok');
		$this->add('msg', $msg);
	}

	public function error($msg, $important = 0) // 1 important, 0 not important
	{	
		if ($this->isOpenheader==false) {
			$this->openHeaders();
		}
		http_response_code(500);
		// header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
		if ($important==1) {
			$array_err = array(
				'status' => "error",
				'msg' => $msg,
			);
			if ($this->isCrypt==true) {
				$data = array(
					'_s' => (bool) true,
					'_d' => $this->ci->crypto->encrypt(json_encode((Object) $array_err))
				);
			} else {
				$data = $array_err;
			}
			$this->yescrypt();
			echo json_encode((Object) $data);
			die(); exit();
		} else {
			$this->add('status', 'error');
			$this->add('msg', $msg);
		}
	}

	public function result($sdata = array())
	{
		if ($this->isOpenheader==false) {
			$this->openHeaders();
		}
		$array = (Object) $this->array;
		if (!empty($sdata)) {
			$array = $sdata;
		}
		if ($this->isCrypt==true) {
			$data = (Object) array(
				'_s' => (bool) true,
				'_d' => $this->ci->crypto->encrypt(json_encode($array))
			);
		} else {
			$data = $array;
		}
		$this->yescrypt();
		echo json_encode($data);
		flush();
	}

}

/* End of file Xjson.php */
/* Location: ./application/controllers/Xjson.php */