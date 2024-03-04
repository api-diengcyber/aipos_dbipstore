<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public $dir_fotoktp = 'assets/images/foto_ktp/';
	public $dir_fotoselfiektp = 'assets/images/foto_selfie_ktp/';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Ion_auth_model');
		$this->load->library('Xjson');
		$this->load->library('curl');
		$this->load->library(array('ion_auth','form_validation'));
	}

	private function checkAccountKit($uuid, $phone)
	{
		$data = array();
		$data_post = array(
			"phone" => $phone,
			"uuid" => $uuid
		);
		$this->curl->uuid = $uuid;
		$acckit = $this->curl->tokijoapi('users/accountkit', $data_post);
		$data['acckit'] = json_decode($acckit);
		$data['profile'] = array();
		if (!empty($data['acckit']->token)) {
			$data_post2 = array(
				"uuid" => $uuid
			);
			$this->curl->uuid = $uuid;
			$this->curl->bearer = $data['acckit']->token;
			$profile = $this->curl->tokijoapi('users/profile', $data_post2);
			$data['profile'] = json_decode($profile);
		}
		return (Object) $data;
	}

	private function fetchFbLogin($uuid, $email, $koordinat = '')
	{
		$data = array();
		$data_post = array(
			'uuid' => $uuid,
			'email' => $email,
			'koordinat' => $koordinat,
		);
		$this->curl->uuid = $uuid;
		$logfb = $this->curl->tokijoapi('users/loginfb', $data_post);
		$data['logfb'] = json_decode($logfb);
		$data['profile'] = array();
		if (!empty($data['logfb']->token)) {
			$data_post2 = array(
				"uuid" => $uuid
			);
			$this->curl->uuid = $uuid;
			$this->curl->bearer = $data['logfb']->token;
			$profile = $this->curl->tokijoapi('users/profile', $data_post2);
			$data['profile'] = json_decode($profile);
		}
		return (Object) $data;
	}

	public function login()
	{
		$this->xjson->openHeaders();
		$this->xjson->nocrypt();
		$this->xjson->keyc();
		$email = $this->xjson->post('email', true);
		$password = $this->xjson->post('password', true);
		$uuid = $this->xjson->post('uuid', true);
		if ($this->ion_auth->login($email, $password, 1)) {
			$id_user = $this->ion_auth->get_user_id();
			$token = $this->xjson->create_token();
			$row_cek_before = $this->db->select('*, FROM_UNIXTIME(created_on) AS created_on, FROM_UNIXTIME(last_login) AS last_login')
								->from('users')
								->where('id', $id_user)
								->get()->row();
			if ($row_cek_before) {
				$t_token = $row_cek_before->token;
				$data_update = array();
				$data_update['onlogin'] = 1;
				if (empty($row_cek_before->token)) {
					$data_update['token'] = $token;
					$t_token = $token;
				}
				$this->db->where('id', $id_user);
				$this->db->update('users', $data_update);

				$row_format_nota = $this->db->select('*')
                        ->from('format_nota')
                        ->where('id_toko', $row_cek_before->id_toko)
                        ->where('id_users', $row_cek_before->id_users)
						->get()->row();
						
				$row_update_stok_retur = $this->db->select('*')
				->from('setting_retur')
				->where('id_toko', $row_cek_before->id_toko)
				->where('jenis', 'jual')
				->get()->row();

	   			$data_res = array(
					'id_user' => $row_cek_before->id_users,
					'id_toko' => $row_cek_before->id_toko,
					'email' => $row_cek_before->email,
					'first_name' => $row_cek_before->first_name,
					'phone' => $row_cek_before->phone,
					'alamat' => $row_cek_before->alamat,
					'ip_address' => $row_cek_before->ip_address,
					'created_on' => $row_cek_before->created_on,
					'last_login' => $row_cek_before->last_login,
					'level' => $row_cek_before->level,
					'print_format' => (!empty($row_format_nota->format))?$row_format_nota->format:"praktis",
					'print_nota' => 1,
					'update_stok_on_retur' => ($row_update_stok_retur)?$row_update_stok_retur->update_stok:0,
					'url_foto' => site_url('assets/foto/'.$row_cek_before->foto),
	   			);
				$this->xjson->ok("Login Berhasil");
				$this->xjson->add("data", $data_res);
			} else {
				$this->xjson->error("Login Gagal");
			}
		} else {
			if (!empty($this->ion_auth->errors())) {
				$this->xjson->error($this->ion_auth->errors());
			} else {
				$this->xjson->error("Login Gagal");
			}
		}
		$this->xjson->result();
	}

	public function loginTelp()
	{
		$this->xjson->openHeaders();
		$this->xjson->nocrypt();
		$this->xjson->keyc();
		$phone = $this->xjson->post('phone', true);
		$uuid = $this->xjson->post('uuid', true);
		$checksAccKit = $this->checkAccountKit($uuid, $phone);
		if (!empty($checksAccKit->profile->data)) {
			$data = $checksAccKit->profile->data;
			$row = $this->db->select('*, FROM_UNIXTIME(created_on) AS created_on, FROM_UNIXTIME(last_login) AS last_login')
							->from('users')
							->where('email', $data->email)
							->get()->row();
			if ($row) {
				$data_update = array(
					'phone' => $phone
				);
				$this->db->where('id', $row->id);
				$this->db->update('users', $data_update);
				$fotoktp = "";
				if (!empty($row->fotoktp)) {
					$fotoktp = site_url($this->dir_fotoktp.$row->fotoktp);
				}
				$fotoselfiektp = "";
				if (!empty($row->fotoselfiektp)) {
					$fotoselfiektp = site_url($this->dir_fotoselfiektp.$row->fotoselfiektp);
				}
	   			$data_res = array(
					'id_user' => $row->id,
					'id_toko' => $row->id_toko,
					'email' => $row->email,
					'first_name' => $row->first_name,
					'phone' => $phone,
					'alamat' => $row->alamat,
					'ip_address' => $row->ip_address,
					'created_on' => $row->created_on,
					'last_login' => $row->last_login,
					'token' => $row->token,
					'device' => $row->device,
					'onlogin' => $row->onlogin,
					'pin' => $row->pin,
					'noktp' => $row->noktp,
					'fotoktp' => $fotoktp,
					'fotoselfiektp' => $fotoselfiektp,
					'provinsi_id' => $row->provinsi_id, 
					'kabupaten_id' => $row->kabupaten_id, 
					'kecamatan_id' => $row->kecamatan_id, 
					'kelurahan_id' => $row->kelurahan_id, 
					'kodepos' => $row->kodepos,
					'registrasi' => (bool) false,
					'accountkit' => $checksAccKit->acckit,
					'profile' => $checksAccKit->profile,
	   			);
				$this->xjson->ok("Login Berhasil");
				$this->xjson->add("data", $data_res);
			} else {
				//register new users
				$add_data = array(
					'first_name'=>$data->namars,
					'alamat'=>$data->alamatrs,
					'phone'=>$phone,
					'provinsi_id'=>$data->province,
					'kabupaten_id'=>$data->city_id,
					'kecamatan_id'=>$data->district_id
				);
				$user_id = $this->Ion_auth_model->register($data->email, 1234, $data->email, $add_data);
				if($user_id){
					$row = $this->Ion_auth_model->user($user_id)->row();
					if($row){
						$fotoktp = "";
						if (!empty($row->fotoktp)) {
							$fotoktp = site_url($this->dir_fotoktp.$row->fotoktp);
						}
						$fotoselfiektp = "";
						if (!empty($row->fotoselfiektp)) {
							$fotoselfiektp = site_url($this->dir_fotoselfiektp.$row->fotoselfiektp);
						}
						$data_res = array(
							'id_user' => $row->id,
							'id_toko' => $row->id_toko,
							'email' => $row->email,
							'first_name' => $row->first_name,
							'phone' => $row->phone,
							'alamat' => $row->alamat,
							'ip_address' => $row->ip_address,
							'created_on' => $row->created_on,
							'last_login' => $row->last_login,
							'token' => $row->token,
							'device' => $row->device,
							'onlogin' => $row->onlogin,
							'pin' => $row->pin,
							'noktp' => $row->noktp,
							'fotoktp' => $fotoktp,
							'fotoselfiektp' => $fotoselfiektp,
							'provinsi_id' => $row->provinsi_id, 
							'kabupaten_id' => $row->kabupaten_id, 
							'kecamatan_id' => $row->kecamatan_id, 
							'kelurahan_id' => $row->kelurahan_id, 
							'kodepos' => $row->kodepos,
							'registrasi' => (bool) false,
							'accountkit' => $checksAccKit->acckit,
							'profile' => $checksAccKit->profile,
						);
						$this->xjson->ok("New User Registered");
						$this->xjson->add('data',$data_res);
					}else{
						$this->xjson->error("Error User");
					}
				}else{
					$this->xjson->error("Error, Failed to create user");
				}
			}
		} else {
			$this->xjson->error("Login Gagal !");
		}
		$this->xjson->result();
	}

	public function loginFb()
	{
		$this->xjson->openHeaders();
		$this->xjson->nocrypt();
		$this->xjson->keyc();
		$uuid = $this->input->post('uuid', true);
		$email = $this->input->post('email', true);
		$koordinat = $this->input->post('koordinat', true);
		$fbl = $this->fetchFbLogin($uuid, $email, $koordinat);
		if (!empty($fbl) && !empty($fbl->logfb) && $fbl->logfb->status==true && !empty($fbl->profile->data)) {
			$data = $fbl->profile->data;
			$row_user = $this->db->select('*, FROM_UNIXTIME(created_on) AS created_on, FROM_UNIXTIME(last_login) AS last_login')->from('users')->where('email', $email)->get()->row();
			if ($row_user) { // ada user
				$fotoktp = "";
				if (!empty($row->fotoktp)) {
					$fotoktp = site_url($this->dir_fotoktp.$row_user->fotoktp);
				}
				$fotoselfiektp = "";
				if (!empty($row_user->fotoselfiektp)) {
					$fotoselfiektp = site_url($this->dir_fotoselfiektp.$row_user->fotoselfiektp);
				}
	   			$data_res = array(
					'id_user' => $row_user->id,
					'id_toko' => $row_user->id_toko,
					'email' => $row_user->email,
					'first_name' => $row_user->first_name,
					'phone' => $row_user->phone,
					'alamat' => $row_user->alamat,
					'ip_address' => $row_user->ip_address,
					'created_on' => $row_user->created_on,
					'last_login' => $row_user->last_login,
					'token' => $row_user->token,
					'device' => $row_user->device,
					'onlogin' => $row_user->onlogin,
					'pin' => $row_user->pin,
					'noktp' => $row_user->noktp,
					'fotoktp' => $fotoktp,
					'fotoselfiektp' => $fotoselfiektp,
					'provinsi_id' => $row_user->provinsi_id, 
					'kabupaten_id' => $row_user->kabupaten_id, 
					'kecamatan_id' => $row_user->kecamatan_id, 
					'kelurahan_id' => $row_user->kelurahan_id, 
					'kodepos' => $row_user->kodepos,
					'registrasi' => (bool) false,
					'accountkit' => $fbl->logfb,
					'profile' => $fbl->profile,
	   			);
				$this->xjson->ok("Login Berhasil");
				$this->xjson->add("data", $data_res);
			} else { // jika tidak ada data maka akan ditambahkan ke user
				$add_data = array(
					'first_name' => $data->namars,
					'alamat' => $data->alamatrs,
					'provinsi_id' => $data->province,
					'kabupaten_id' => $data->city_id,
					'kecamatan_id' => $data->district_id
				);
				$user_id = $this->Ion_auth_model->register($data->email, 1234, $data->email, $add_data);
				if ($user_id) {
					$row = $this->Ion_auth_model->user($user_id)->row();
					if ($row) {
						$fotoktp = "";
						if (!empty($row->fotoktp)) {
							$fotoktp = site_url($this->dir_fotoktp.$row->fotoktp);
						}
						$fotoselfiektp = "";
						if (!empty($row->fotoselfiektp)) {
							$fotoselfiektp = site_url($this->dir_fotoselfiektp.$row->fotoselfiektp);
						}
						$data_res = array(
							'id_user' => $row->id,
							'id_toko' => $row->id_toko,
							'email' => $row->email,
							'first_name' => $row->first_name,
							'phone' => $row->phone,
							'alamat' => $row->alamat,
							'ip_address' => $row->ip_address,
							'created_on' => $row->created_on,
							'last_login' => $row->last_login,
							'token' => $row->token,
							'device' => $row->device,
							'onlogin' => $row->onlogin,
							'pin' => $row->pin,
							'noktp' => $row->noktp,
							'fotoktp' => $fotoktp,
							'fotoselfiektp' => $fotoselfiektp,
							'provinsi_id' => $row->provinsi_id, 
							'kabupaten_id' => $row->kabupaten_id, 
							'kecamatan_id' => $row->kecamatan_id, 
							'kelurahan_id' => $row->kelurahan_id, 
							'kodepos' => $row->kodepos,
							'registrasi' => (bool) false,
							'accountkit' => $fbl->logfb,
							'profile' => $fbl->profile,
						);
						$this->xjson->ok("Login Berhasil");
						$this->xjson->add('data',$data_res);
					} else {
						$this->xjson->error("Login Gagal !");
					}
				} else {
					$this->xjson->error("Login Gagal !");
				}
			}
		} else {
			$this->xjson->error("Login Gagal !");
		}
		$this->xjson->result();
	}

	public function logout()
	{
		$this->xjson->openHeaders();
		$this->xjson->keyc();
		// $this->xjson->tokenc();
		$id_user = $this->xjson->post('id_user', true);
		$row_cek = $this->db->select('*, FROM_UNIXTIME(created_on) AS created_on, FROM_UNIXTIME(last_login) AS last_login')
							->from('users')
							->where('id', $id_user)
							->get()->row();
		if ($row_cek) {
			$data_update = array(
				'onlogin' => 0
			);
			$this->db->where('id', $id_user);
			$this->db->update('users', $data_update);
			$this->xjson->ok("Logout Berhasil");
		} else {
			$this->xjson->error("Logout Gagal");
		}
		$this->xjson->result();
	}

	public function registrasi()
	{
		$this->xjson->openHeaders();
		$this->xjson->nocrypt();
		$this->xjson->keyc();
		$nama = $this->xjson->post("nama", true);
		$email = $this->xjson->post("email", true);
		$phone = $this->xjson->post("phone", true);
		$provinsi = $this->xjson->post("provinsi", true);
		$kabupaten = $this->xjson->post("kabupaten", true);
		$kecamatan = $this->xjson->post("kecamatan", true);
		$alamat = $this->xjson->post("alamat", true);
		$kodepos = $this->xjson->post("kodepos", true);
		$pin = $this->xjson->post("pin", true);
		$uuid = $this->xjson->post("uuid", true);

		//register new users ci
		$add_data = array(
			'first_name'=>$nama,
			'alamat'=>$alamat,
			'provinsi_id'=>$provinsi,
			'kabupaten_id'=>$kabupaten,
			'kecamatan_id'=>$kecamatan
		);
		$user_id = $this->Ion_auth_model->register($data->email,1234,$data->email,$add_data);

		if($user_id){
			$row = $this->Ion_auth_model->user($user_id)->row();
			if($row){
				$fotoktp = "";
				if (!empty($row->fotoktp)) {
					$fotoktp = site_url($this->dir_fotoktp.$row->fotoktp);
				}
				$fotoselfiektp = "";
				if (!empty($row->fotoselfiektp)) {
					$fotoselfiektp = site_url($this->dir_fotoselfiektp.$row->fotoselfiektp);
				}
				$data_res = array(
					'id_user' => $row->id,
					'id_toko' => $row->id_toko,
					'email' => $row->email,
					'first_name' => $row->first_name,
					'phone' => $row->phone,
					'alamat' => $row->alamat,
					'ip_address' => $row->ip_address,
					'created_on' => $row->created_on,
					'last_login' => $row->last_login,
					'token' => $row->token,
					'device' => $row->device,
					'onlogin' => $row->onlogin,
					'pin' => $row->pin,
					'noktp' => $row->noktp,
					'fotoktp' => $fotoktp,
					'fotoselfiektp' => $fotoselfiektp,
					'provinsi_id' => $row->provinsi_id, 
					'kabupaten_id' => $row->kabupaten_id, 
					'kecamatan_id' => $row->kecamatan_id, 
					'kelurahan_id' => $row->kelurahan_id, 
					'kodepos' => $row->kodepos,
					'registrasi' => (bool) false,
				);
				$this->xjson->ok("Registrasi Berhasil ci");
				// $this->xjson->add('data',$data_res);
			}else{
				$this->xjson->error("Error User ci");
			}
		}else{
			$this->xjson->error("Error, Failed to create user ci");
		}


		$data_post = array(
			"uuid" => $uuid,
			"pin" => $pin,
			"address" => $alamat,
			"province" => $provinsi,
			"city" => $kabupaten,
			"district" => $kecamatan,
			"zipcode" => $kodepos,
			"email"  =>  $email,
			"name" =>  $nama,
			"phone" =>  $phone
		);
		$this->curl->uuid = $uuid;
		$reg = $this->curl->tokijoapi('users/register', $data_post);
		$data_reg = (Object) json_decode($reg);
		if (!empty($data_reg->success) && $data_reg->success==true) {
			$this->xjson->ok("Registrasi Berhasil");
			$this->xjson->add("data", $data_reg);
		} else {
			$this->xjson->error($data_reg->msg);
		}
		$this->xjson->result();
	}

	// public function registrasi()
	// {
	// 	$this->xjson->openHeaders();
	// 	$this->xjson->nocrypt();
	// 	$this->xjson->keyc();
	// 	$first_name = $this->xjson->post("first_name", true);
	// 	$email = $this->xjson->post("email", true);
	// 	$telp = $this->xjson->post("telp", true);
	// 	$alamat = $this->xjson->post("alamat", true);
	// 	$password = $this->xjson->post("password", true);
	// 	$vpassword = $this->xjson->post("vpassword", true);
	// 	$uuid = $this->xjson->post("uuid", true);
	// 	if (!empty($first_name) && !empty($email) && !empty($alamat) && !empty($password) && !empty($vpassword) && strlen($password) >= 8 && $password==$vpassword) {
	// 		$token = $this->xjson->create_token();
	// 		$additional_data = array(
	// 			'first_name' => $first_name,
	// 			'alamat' => $alamat,
	// 			'token' => $token,
	// 			'onlogin' => 1,
	// 			'phone' => $telp,
	// 		);
	// 		$checksAccKit = $this->checkAccountKit($uuid, $telp);
	// 		$id_user = $this->ion_auth->register($email, $password, $email, $additional_data);
	// 		$row_user = $this->db->where('id', $id_user)->get('users')->row();
	// 		if ($row_user) {
	// 			$registrasi = false;
	// 			// $row_ubah_device = $this->db->where('id_user', $id_user)->get('ubah_device')->row();
	// 			// if ($row_ubah_device) {
	// 			// 	if ($row_ubah_device->status=="1") {
	// 			// 		$registrasi = true;
	// 			// 	}
	// 			// }
	// 			$fotoktp = "";
	// 			if (!empty($row_cek_before->fotoktp)) {
	// 				$fotoktp = site_url($this->dir_fotoktp.$row_cek_before->fotoktp);
	// 			}
	// 			$fotoselfiektp = "";
	// 			if (!empty($row_cek_before->fotoselfiektp)) {
	// 				$fotoselfiektp = site_url($this->dir_fotoselfiektp.$row_cek_before->fotoselfiektp);
	// 			}
	//    			$data_res = array(
	// 				'id_user' => $id_user,
	// 				'id_toko' => $row_user->id_toko,
	// 				'email' => $row_user->email,
	// 				'first_name' => $row_user->first_name,
	// 				'phone' => $row_user->phone,
	// 				'alamat' => $row_user->alamat,
	// 				'ip_address' => $row_user->ip_address,
	// 				'created_on' => $row_user->created_on,
	// 				'last_login' => $row_user->last_login,
	// 				'token' => $token,
	// 				'device' => $row_user->device,
	// 				'onlogin' => $row_user->onlogin,
	// 				'pin' => $row_user->pin,
	// 				'noktp' => $row_user->noktp,
	// 				'fotoktp' => $fotoktp,
	// 				'fotoselfiektp' => $fotoselfiektp,
	// 				'provinsi_id' => $row_user->provinsi_id, 
	// 				'kabupaten_id' => $row_user->kabupaten_id,
	// 				'kecamatan_id' => $row_user->kecamatan_id, 
	// 				'kelurahan_id' => $row_user->kelurahan_id, 
	// 				'kodepos' => $row_user->kodepos,
	// 				'registrasi' => (bool) $registrasi,
	// 				'accountkit' => $checksAccKit->acckit,
	// 				'profile' => $checksAccKit->profile,
	//    			);
	// 			$this->xjson->ok("Berhasil");
	// 			$this->xjson->add("data", $data_res);
	// 		} else {
	// 			$this->xjson->error($this->ion_auth->errors()!=""?$this->ion_auth->errors():"Registrasi Gagal");
	// 		}
	// 	} else {
	// 		$err = "";
	// 		if (empty($first_name)) {
	// 			$err .= "<div>Nama Depan harus diisi</div>";
	// 		}
	// 		if (empty($email)) {
	// 			$err .= "<div>Email harus diisi</div>";
	// 		}
	// 		if (empty($telp)) {
	// 			$err .= "<div>Nomor Telepon harus diisi</div>";
	// 		}
	// 		if (empty($alamat)) {
	// 			$err .= "<div>Alamat harus diisi</div>";
	// 		}
	// 		if (empty($password)) {
	// 			$err .= "<div>Password harus diisi</div>";
	// 		} else {
	// 			if (strlen($password) < 8) {
	// 				$err .= "<div>Password minimal 8 karakter</div>";
	// 			}
	// 		}
	// 		if (empty($vpassword)) {
	// 			$err .= "<div>Confirm Password harus diisi</div>";
	// 		}
	// 		if ($password!=$vpassword) {
	// 			$err .= "<div>Password tidak cocok</div>";
	// 		}
	// 		$this->xjson->error($err);
	// 	}
	// 	$this->xjson->result();
	// }

	public function registrasiFinancial()
	{
		$this->xjson->openHeaders();
		$this->xjson->nocrypt();
		$this->xjson->keyc();
		$this->xjson->tokenc();
		$this->load->library('upload');
        $this->load->library('image_lib');
		$dir_fotoktp = 'assets/images/foto_ktp/';
		$dir_fotoselfiektp = 'assets/images/foto_selfie_ktp/';
		$id_user = $this->xjson->post('id_user', true);
		$noktp = $this->xjson->post('noktp', true);
		$pin = $this->xjson->post('pin', true);
		$device = $this->xjson->post('device', true);
		$error_file = '';
		$row = $this->db->select('u.*')
						->from('users u')
						->where('id', $id_user)
						->get()->row();
		if ($row) {
			$fotoktp = $row->fotoktp;
			$fotoselfiektp = $row->fotoselfiektp;
			$config['upload_path'] = $dir_fotoktp;
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '5000';
			$config['max_width']  = '5768';
			$config['max_height']  = '5768';
			$this->upload->initialize($config);
			if ($this->upload->do_upload('fotoktp')) {
				$dir = $dir_fotoktp.$row->fotoktp;
				if (!empty($row->fotoktp) && file_exists($dir)) {
					unlink($dir);
				}
				$data = $this->upload->data();
                $config_lib['image_library'] = 'gd2';
                $config_lib['source_image'] = $dir_fotoktp.$data['file_name'];
                $config_lib['create_thumb'] =  FALSE;
                $config_lib['maintain_ratio'] =  FALSE;
                $config_lib['quality'] = '40%';
                $config_lib['width'] = ($data['image_width']*1)/2;
                $config_lib['height'] = ($data['image_height']*1)/2;
                $config_lib['new_image'] = $dir_fotoktp.$data['file_name'];
                $this->image_lib->initialize($config_lib);
                $this->image_lib->resize();
                $this->image_lib->clear();
				$fotoktp = $data['file_name'];
			} else {
				$error_file .= $this->upload->display_errors();
			}
			$config['upload_path'] = $dir_fotoselfiektp;
			$this->upload->initialize($config);
			if ($this->upload->do_upload('fotoselfiektp')) {
				$dir = $dir_fotoselfiektp.$row->fotoselfiektp;
				if (!empty($row->fotoselfiektp) && file_exists($dir)) {
					unlink($dir);
				}
				$data = $this->upload->data();
                $config_lib['image_library'] = 'gd2';
                $config_lib['source_image'] = $dir_fotoselfiektp.$data['file_name'];
                $config_lib['create_thumb'] =  FALSE;
                $config_lib['maintain_ratio'] =  FALSE;
                $config_lib['quality'] = '40%';
                $config_lib['width'] = ($data['image_width']*1)/2;
                $config_lib['height'] = ($data['image_height']*1)/2;
                $config_lib['new_image'] = $dir_fotoselfiektp.$data['file_name'];
                $this->image_lib->initialize($config_lib);
                $this->image_lib->resize();
                $this->image_lib->clear();
				$fotoselfiektp = $data['file_name'];
			} else {
				$error_file .= $this->upload->display_errors();
			}
			if ($error_file!="") {
				$this->xjson->error($error_file);
			} else {
				$data_update = array(
					'fotoktp' => $fotoktp,
					'fotoselfiektp' => $fotoselfiektp,
					'pin' => $pin,
					'device' => $device,
					'noktp' => $noktp,
				);
				$this->db->where('id', $id_user);
				$this->db->update('users', $data_update);
				$row_ubah_device = $this->db->where('id_user', $id_user)->get('ubah_device')->row();
				if ($row_ubah_device) {
					$data_update = array(
						'id_perangkat_diubah' => $device,
						'status' => 1,
						'kode_otp' => '',
					);
					$this->db->where('id_user', $id_user);
					$this->db->update('ubah_device', $data_update);
				} else {
					$data_insert = array(
						'id_user' => $id_user,
						'id_perangkat_diubah' => $device,
						'status' => 1,
						'kode_otp' => '',
					);
					$this->db->insert('ubah_device', $data_insert);
				}
				$this->xjson->ok("Registrasi Berhasil");
				$this->xjson->add("dir_fotoktp", site_url($dir_fotoktp.$fotoktp));
				$this->xjson->add("dir_fotoselfiektp", site_url($dir_fotoselfiektp.$fotoselfiektp));
				$this->xjson->add("registrasi", (bool) true);
			}
		} else {
			$this->xjson->error("User tidak ditemukan!");
		}
		$this->xjson->result();
	}

	public function get_user()
	{
		$this->xjson->openHeaders();
		$this->xjson->nocrypt();
		$this->xjson->keyc();
		$id_user = $this->xjson->post('id_user', true);
		$row = $this->db->select('u.*')
						->from('users u')
						->where('id', $id_user)
						->get()->row();
		if ($row) {
			$this->xjson->ok("Get User!");
			$this->xjson->add("first_name", $row->first_name);
			$this->xjson->add("email", $row->email);
			$this->xjson->add("provinsi_id", $row->provinsi_id);
			$this->xjson->add("kabupaten_id", $row->kabupaten_id);
			$this->xjson->add("kecamatan_id", $row->kecamatan_id);
			$this->xjson->add("kelurahan_id", $row->kelurahan_id);
			$this->xjson->add("kodepos", $row->kodepos);
			$this->xjson->add("alamat", $row->alamat);
		} else {
			$this->xjson->error("User tidak ditemukan!");
		}
		$this->xjson->result();
	}

	public function edit_user()
	{
		$this->xjson->openHeaders();
		$this->xjson->keyc();
		$this->xjson->tokenc();
		$id_user = $this->xjson->post('id_user', true);
		$namalengkap = $this->xjson->post('namalengkap', true);
		$email = $this->xjson->post('email', true);
		$provinsi = $this->xjson->post('provinsi', true);
		$kota = $this->xjson->post('kota', true);
		$kecamatan = $this->xjson->post('kecamatan', true);
		$kelurahan = $this->xjson->post('kelurahan', true);
		$kodepos = $this->xjson->post('kodepos', true);
		$alamat = $this->xjson->post('alamat', true);
		$row = $this->db->select('u.*')
						->from('users u')
						->where('id', $id_user)
						->get()->row();
		if ($row) {
			$data_update = array(
				'first_name' => $namalengkap,
				'provinsi_id' => $provinsi,
				'kabupaten_id' => $kota,
				'kecamatan_id' => $kecamatan,
				'kelurahan_id' => $kelurahan,
				'kodepos' => $kodepos,
				'alamat' => $alamat,
			);
			$this->db->where('id', $id_user);
			$this->db->update('users', $data_update);
			$this->xjson->ok("Edit user berhasil!");
			$this->xjson->add("namalengkap", $namalengkap);
			$this->xjson->add("email", $email);
			$this->xjson->add("provinsi", $provinsi);
			$this->xjson->add("kota", $kota);
			$this->xjson->add("kecamatan", $kecamatan);
			$this->xjson->add("kelurahan", $kelurahan);
			$this->xjson->add("kodepos", $kodepos);
			$this->xjson->add("alamat", $alamat);
		} else {
			$this->xjson->error("User tidak ditemukan!");
		}
		$this->xjson->result();
	}

	public function coba()
	{
		echo md5(sha1("1234"));
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */