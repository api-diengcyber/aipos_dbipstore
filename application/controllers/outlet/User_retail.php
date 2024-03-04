<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_retail extends AI_Admin
{
    function __construct()
    {
        parent::__construct();
        $this->models('User_retail_model');
    }

    public function index()
    {
        $data = array(
            'active_user' => 'active',
        );
        $this->view('user/users_list_admin', $data);
    } 
    
    public function json($level = NULL) {
        header('Content-Type: application/json');
        echo $this->User_retail_model->json_id_toko($this->userdata->id_toko, 'admin');
    }

    public function read($id) 
    {
        $row = $this->User_retail_model->get_by_id($id);
        if ($row) {
            $data = array(
            // 'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_user' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,

			'id' => $row->id_users,
			'id_toko' => $row->id_toko,
			'ip_address' => $row->ip_address,
			'username' => $row->username,
			'password' => $row->password,
			'salt' => $row->salt,
			'email' => $row->email,
			'activation_code' => $row->activation_code,
			'forgotten_password_code' => $row->forgotten_password_code,
			'forgotten_password_time' => $row->forgotten_password_time,
			'remember_code' => $row->remember_code,
			'created_on' => $row->created_on,
			'last_login' => $row->last_login,
			'active' => $row->active,
			'first_name' => $row->first_name,
			'last_name' => $row->last_name,
			'company' => $row->company,
			'phone' => $row->phone,
			'level' => $row->level,
            'alamat' => $row->alamat,
            'tampil_foto' => 'assets/foto/'.$row->foto,
		    );

	        $active = array(
	            'active_user' => 'active', 
	        );

            $this->view('user/users_read', $data);
	        

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/user_retail'));
        }
    }

    public function create()
    {
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_user' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,

            'button' => 'Tambah',
            'action' => site_url('admin/user_retail/create_action'),
            'id' => set_value('id'),
            // 'id_toko' => $this->userdata->id_toko,
            'email' => set_value('email'),
            'ro_email' => '',
            'first_name' => set_value('first_name'),
            'last_name' => set_value('last_name'),
            'phone' => set_value('phone'),
            'alamat' => set_value('alamat'),
            'foto' => set_value('foto'),
            'level' => set_value('level'),
            'password_baru' => set_value('password_baru'),
            'pil_level' => $this->db->get('users_level_lookup')->result(),
        );

        $active = array(
            'active_user' => 'active', 
        );

        $this->view('user/users_form', $data);
        
    }

    public function create_action()
    {

        $this->_rules();
        $this->form_validation->set_rules('password_baru', 'password_baru', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            // upsdatew gambar //
            $config['upload_path'] = 'assets/foto/';
            $config['allowed_types'] = 'gif|jpeg|png|jpg|bmp';
            $config['max_size']  = '1000';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';
            
            $this->load->library('upload', $config);
            $nm_gambar = "";
            if (!$this->upload->do_upload('foto')){
                $error = array('error' => $this->upload->display_errors());
            } else{
                $data_image = $this->upload->data();
                $nm_gambar = $data_image['file_name'];
            }
            // upsdatew gambar //

            if($this->input->post('level')=='1'){
                /* ADMIN */
                $company = "ADMIN";
            } else {
                /* KASIR */
                $company = "";
            }

            $row_last_users = $this->db->select('id_users')
                                       ->from('users')
                                       ->where('id_toko', $this->userdata->id_toko)
                                       ->order_by('id_users', 'desc')
                                       ->get()->row();
            $id_users = 1;
            if ($row_last_users) {
                $id_users = $row_last_users->id_users + 1;
            }

            $identity = $this->input->post('email');
            $password = $this->input->post('password_baru');
            $email = $this->input->post('email');
            $additional_data = array(
                'id_users' => $id_users,
                'id_toko' => $this->userdata->id_toko,
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'phone' => $this->input->post('phone'),
                'alamat' => $this->input->post('alamat'),
                'foto' => $nm_gambar,
                'company' => $company,
                'active' => '1',
                'level' => $this->input->post('level'),
            );

            if($this->input->post('level')=='1'){
                /* ADMIN */
                $groups = array(1);
                $a = $this->ion_auth->register($identity, $password, $email, $additional_data, $groups);
            } else {
                /* KASIR */
                $a = $this->ion_auth->register($identity, $password, $email, $additional_data);
            }
            if($a){
                $this->session->set_flashdata('message', 'Create Record Success');
            } else {
                //$this->session->set_flashdata('message', $this->ion_auth->messages());
                $this->session->set_flashdata('message', 'Email sudah digunakan');
            }
            redirect(site_url('admin/user_retail'));
        }
    }

    public function update($id) 
    {

        $row = $this->User_retail_model->get_by_id($id);
        if ($row) {
            $data = array(
                // 'id_toko' => $this->userdata->id_toko,
                'nama_toko' => $this->userdata->nama_toko,
                'nama_user' => $this->userdata->email,
                'active_user' => 'active',
                'id_modul' => $this->userdata->id_modul,
                'nama_modul' => $this->userdata->nama_modul,

                'button' => 'Simpan',
                'action' => site_url('admin/user_retail/update_action'),
                'id' => set_value('id', $row->id),
                'id_toko' => set_value('id_toko', $row->id_toko),
				'email' => set_value('email', $row->email),
                'ro_email' => 'readonly',
				'first_name' => set_value('first_name', $row->first_name),
				'last_name' => set_value('last_name', $row->last_name),
                'phone' => set_value('phone', $row->phone),
                'alamat' => set_value('alamat', $row->alamat),
                'foto' => set_value('foto', $row->foto),
                'level' => set_value('level', $row->level),
                'tampil_foto' => 'assets/foto/'.$row->foto,
                'password_baru' => set_value('password_baru'),
                'pil_level' => $this->db->get('users_level_lookup')->result(),
			);

	        $active = array(
	            'active_user' => 'active', 
            );
            
            $this->view('user/users_form', $data);

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/user_retail'));
        }
    }
    
    public function update_action() 
    {
       $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {

            // upsdatew gambar //
            $config['upload_path'] = 'assets/foto/';
            $config['allowed_types'] = 'gif|jpeg|png|jpg';
            $config['max_size']  = '1000';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';
            
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')){
                $error = array('error' => $this->upload->display_errors());
                $nm_gambar = $this->input->post('fotolama',TRUE);
            } else{
                if(file_exists($config['upload_path'].$this->input->post('fotolama',TRUE))){
                    unlink($config['upload_path'].$this->input->post('fotolama',TRUE));
                }
                //$this->upload->do_upload('foto');
                $data_image = $this->upload->data();
                $nm_gambar = $data_image['file_name'];
            }
            // upsdatew gambar //

            if($this->input->post('level')=='1'){
                /* ADMIN */
                $company = "ADMIN";
            } else {
                /* KASIR */
                $company = "";
            }
            $users = $this->db->where('id_toko', $this->input->post('id_toko'))->where('id',$this->input->post('id'))->get('users')->row();
            $data  = array(
                // 'id_toko' => $this->input->post('id_toko',TRUE),
                'username' => $this->input->post('email',TRUE),
                'email' => $this->input->post('email',TRUE),
                'first_name' => $this->input->post('first_name',TRUE),
                'last_name' => $this->input->post('last_name',TRUE),
                'alamat' => $this->input->post('alamat',TRUE),
                'phone' => $this->input->post('phone',TRUE),
                'foto' => $nm_gambar,
                'company' => $company,
                'level' => $this->input->post('level'),
            );
            if(!empty($this->input->post('password_baru'))){
                $data['password'] = $this->input->post('password_baru');
            }
            $this->ion_auth->update($users->id, $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/user_retail'));
        }
    }
    

    public function _rules() 
    {
    	$this->form_validation->set_rules('id_toko', 'id toko', 'trim|required');
    	$this->form_validation->set_rules('email', 'email', 'trim|required');
    	$this->form_validation->set_rules('first_name', 'first name', 'trim|required');
    	$this->form_validation->set_rules('last_name', 'last name', 'trim');
    	$this->form_validation->set_rules('phone', 'phone', 'trim');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim');
        $this->form_validation->set_rules('foto', 'foto', 'trim');
        $this->form_validation->set_rules('level', 'level', 'trim|required');
    	$this->form_validation->set_rules('id', 'id', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function delete($id)
    {
        $row = $this->User_retail_model->get_by_id($id);
        if ($row) {
            $this->User_retail_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/user_retail'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/user_retail'));
        }
    }

    public function active($id)
    {
        $row = $this->User_retail_model->get_by_id($id);
        if($row->level == '1'){
            $r = '0';
        } else {
            $r = '1';
        }
        if ($r == '1') {
            $data = array('active' => '1',);
            $this->User_retail_model->update($id, $data);
            $this->session->set_flashdata('message', 'Deactive Record Success');
            redirect(site_url('admin/user_retail'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/user_retail'));
        }
    }

    public function nonactive($id)
    {
        
        $row = $this->User_retail_model->get_by_id($id);
        if($row){
            if ($row->level == '2') {
                if($row->active == '1'){
                    $data = array(
                        'active' => '0',
                    );
                    $this->User_retail_model->update($id, $data);
                    $this->session->set_flashdata('message', 'Deactive Record Success');
                } else {
                    $data = array(
                        'active' => '1',
                    );
                    $this->User_retail_model->update($id, $data);
                    $this->session->set_flashdata('message', 'Active Record Success');
                }
                redirect(site_url('admin/user_retail'));
            } else {
                $this->session->set_flashdata('message', 'ADMIN cannot Deactive');
                redirect(site_url('admin/user_retail'));
            }
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/user_retail'));
        }
        
    }

}

/* End of file Akun.php */
/* Location: ./application/controllers/Akun.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-07-31 10:45:44 */
/* http://harviacode.com */