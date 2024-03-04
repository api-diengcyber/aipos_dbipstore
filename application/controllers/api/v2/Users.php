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
		$foto = $this->upload_images('assets/foto/','',$_FILES['file'],false);
		
		if($foto){
			$this->db->where('id_users', $user_id);
			$users = $this->db->get('users')->row();

			if(!$users->foto == 'users-profile.svg'){
				@unlink('assets/foto/'.$users->foto);
			}
			$this->db->update('users', array('foto'=>$foto));

			$this->xjson->ok("Sukses");
			$this->xjson->add("data", base_url('assets/foto/'.$foto));
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

	public function upload_images($path, $title, $files)
	{
        $config = array(
            'upload_path'   => $path,
            'allowed_types' => 'jpg|jpeg|gif|png',
            'overwrite'     => TRUE,                       
        );

        $this->load->library('upload', $config);

        $images = array();
        $_FILES['images']['name']= $files['name'];
        $_FILES['images']['type']= $files['type'];
        $_FILES['images']['tmp_name']= $files['tmp_name'];
        $_FILES['images']['error']= $files['error'];
        $_FILES['images']['size']= $files['size'];

        $fileName = $this->clean($files['name']);

        $images = $fileName;

        $config['file_name'] = $fileName;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('images')) {
            $images = $this->upload->data()['file_name'];
        } else {
            return '';
        }

        return $images;
	}

	public function clean($string) {
       $string = str_replace(' ', '_', $string);
       return str_replace('__','_',$string);
    }
	

}

/* End of file Users.php */
/* Location: ./application/controllers/api/Users.php */