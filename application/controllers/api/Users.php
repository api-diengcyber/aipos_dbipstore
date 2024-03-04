<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Xjson');
	}

	public function update_profile()
	{
	    $this->load->model('Upload_model');
		$this->xjson->openHeaders();
		$this->xjson->nocrypt();
		$this->xjson->keyc();
		
		$user_id = $this->xjson->post('user_id');

		$foto = $this->Upload_model->images('assets/images/avatars/','',$_FILES['file'],false);
		if($foto){
			$this->load->model('Upload_model');
			$this->db->where('id_users', $user_id);
			$users = $this->db->get('users')->row();

			if(!$users->foto == 'users-profile.svg'){
				@unlink('assets/images/avatar/'.$users->foto);
			}
			$this->db->update('users', array('foto'=>$foto));

			$this->xjson->ok("Sukses");
			$this->xjson->add("data", base_url('assets/images/avatars/'.$foto));
			$this->xjson->result();
		} else {
			$this->xjson->error("Gambar gagal diupload");
			$this->xjson->result();
		}
	}

	public function change_password()
	{
		$this->xjson->openHeaders();
		$this->xjson->nocrypt();
		$this->xjson->keyc();

		$user_id = $this->xjson->post('user_id');

		$row_user = $this->db->where('id_users', $user_id)->get('users')->row();

		$this->load->library(array('ion_auth','form_validation'));
		$change = $this->ion_auth->change_password($row_user->username, $this->xjson->post('old'), $this->xjson->post('new'));


		if ($change)
		{
			$this->xjson->ok("Sukses");
			$this->xjson->add("message", $this->ion_auth->messages());
			$this->xjson->result();
		}
		else
		{
			$this->xjson->add('message', $this->ion_auth->errors());
			$this->xjson->result();
		}
	}
	

}

/* End of file Users.php */
/* Location: ./application/controllers/api/Users.php */