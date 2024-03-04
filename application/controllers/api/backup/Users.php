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
		$this->xjson->openHeaders();
		$this->xjson->nocrypt();
		$this->xjson->keyc();
		
		$user_id = $this->xjson->post('user_id');

		$foto = $this->Upload_model->images('assets/images/avatar/','',$_FILES['file']);
		if($foto){
			$this->load->model('Upload_model');
			$this->db->where('id_users', $user_id);
			$users = $this->db->get('users')->row();

			if(!$users->foto == 'users-profile.svg'){
				@unlink('assets/images/avatar/'.$users->foto);
			}
			$this->db->update('users', array('foto'=>$foto));

			$this->xjson->ok("Sukses");
			$this->xjson->add("data", $foto);
			$this->xjson->result();
		} else {
			$this->xjson->error("Gambar gagal diupload");
			$this->xjson->result();
		}
	}
	

}

/* End of file Users.php */
/* Location: ./application/controllers/api/Users.php */