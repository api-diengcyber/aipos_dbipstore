<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sinkronisasi_model extends CI_Model {

	public $api_key = 'fy437854387th786hvgt7568b87r6h4534t43';

	public function __construct()
	{
		parent::__construct();
	}

	public function client_access_server($data = array())
	{
		header('Content-Type: application/json');
		$api_key = $this->input->post('api_key', true);
		if ($api_key != $this->api_key) {
			$data = array(
				'error' => 'Api key tidak cocok',
			);
			return json_encode($data);
			exit();
		}
		return json_encode($data);
	}

	public function post($url, $post = array())
	{
		$curl = curl_init();
		$post['api_key'] = $this->api_key;
		curl_setopt_array($curl, array(
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => $url,
		    CURLOPT_USERAGENT => 'AIPOS',
		    CURLOPT_POST => 1,
		    CURLOPT_POSTFIELDS => $post,
	        CURLOPT_SSL_VERIFYPEER => false,
	        CURLOPT_FOLLOWLOCATION => true,
	        CURLOPT_HEADER => false,
		));
		$resp = curl_exec($curl);
		return $resp;
		curl_close($curl);
	}

}

/* End of file Sinkronisasi_model.php */
/* Location: ./application/models/Sinkronisasi_model.php */