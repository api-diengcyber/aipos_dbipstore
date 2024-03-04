<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pegawai_retail extends CI_Controller
{
    function __construct()
    {
        parent::__construct();   
		$this->load->library('datatables');
		$this->load->library(array('ion_auth','form_validation'));
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth');
        $this->load->model('Pegawai_retail_model');
        $this->load->model('Member_retail_model');
        $this->load->model('Ion_auth_model');
        $this->load->model('Login_model');
        $this->load->library('view');
        $this->Login_model->is_outlet();
        $this->userdata = $this->Login_model->get_data();
    }

    public function index()
    {
        $data_member = $this->db->select('id_member, id_sales, nama, alamat, telp')
                                ->from('member')
                                ->where('id_toko', $this->userdata->id_toko)
                                ->where('id_sales > 0')
                                ->get()->result();
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_pegawai' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'data_member' => $data_member,
        );
        $this->view->render_outlet('pegawai/users_list', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Pegawai_retail_model->json_sales($this->userdata->id_toko);
    }

    public function read($id) 
    {
        $row = $this->Pegawai_retail_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_toko' => $this->userdata->id_toko,
                'nama_toko' => $this->userdata->nama_toko,
                'nama_user' => $this->userdata->email,
                'active_pegawai' => 'active',
                'id_modul' => $this->userdata->id_modul,
                'nama_modul' => $this->userdata->nama_modul,
                'id' => $row->id,
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
            );
            $this->view->render_outlet('pegawai/users_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('outlet/pegawai_retail'));
        }
    }

    public function create() 
    {
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_pegawai' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'button' => 'Tambah',
            'action' => site_url('outlet/pegawai_retail/create_action'),
            'id' => set_value('id'),
            'id_toko' => $this->userdata->id_toko,
            'first_name' => set_value('first_name'),
            'last_name' => set_value('last_name'),
            'phone' => set_value('phone'),
            'level' => set_value('level'),
            'password' => set_value('password'),
            'confirm_password' => set_value('confirm_password'),
            'email' => set_value('email'),
        );
        $data['data_toko'] = $this->Member_retail_model->get_by_id_sales_and_not();
        $this->view->render_outlet('pegawai/users_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
		    $identity = $this->input->post('email');
		    $email = $this->input->post('email');
            $password = $this->input->post('password');
		    $data_toko = $this->input->post('data_toko');
            $row_last_users = $this->db->select('id_users')
                                       ->from('users')
                                       ->where('id_toko', $this->userdata->id_toko)
                                       ->order_by('id_users', 'desc')
                                       ->get()->row();
            $id_users = 1;
            if ($row_last_users) {
                $id_users = $row_last_users->id_users + 1;
            }
            $additional_data = array(
                'id_users' => $id_users,
                'first_name' => $this->input->post('first_name'),
                'phone' => $this->input->post('phone'),
                'level' => $this->input->post('level'),
                'id_toko' => $this->input->post('id_toko'),
            );
            $data_update = array(
                'id_sales' => $id_users,
            );
            foreach ($data_toko as $key) {
                $this->Member_retail_model->update($key, $data_update);
            }
		    $this->ion_auth->register($identity, $password, $email, $additional_data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('outlet/pegawai_retail'));
        }

    }
    
    public function update($id) 
    {
        $row = $this->Pegawai_retail_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_toko' => $this->userdata->id_toko,
                'nama_toko' => $this->userdata->nama_toko,
                'nama_user' => $this->userdata->email,
                'active_pegawai' => 'active',
                'id_modul' => $this->userdata->id_modul,
                'nama_modul' => $this->userdata->nama_modul,
                'button' => 'Simpan',
                'action' => site_url('outlet/pegawai_retail/update_action'),
                'id' => set_value('id', $row->id),
                'id_users' => set_value('id_users', $row->id_users),
                'id_toko' => set_value('id_toko', $row->id_toko),
                'first_name' => set_value('first_name', $row->first_name),
                'phone' => set_value('phone', $row->phone),
                'email' => set_value('email', $row->email),
                'level' => set_value('level', $row->level),
                'password' => set_value('password', '')
            );
            if ($row->level=="4") {
                $data['data_toko'] = $this->Member_retail_model->get_by_id_sales_and_not($row->id_users);
            }
            $this->view->render_outlet('pegawai/users_form', $data);

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('outlet/pegawai_retail'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules_update();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_users', TRUE));
        } else {
            $data_toko = $this->input->post('data_toko');
            $id_users = $this->input->post('id_users');
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
            );
            if (!empty($this->input->post('password', true))) {
                $password = $this->Ion_auth_model->hash_password($this->input->post('password', true));
                $data['password'] = $password;
            }
            $this->db->where('id_toko', $this->userdata->id_toko);
            $this->db->where('id_users', $this->input->post('id_users', true));
            $this->db->update('users', $data);
            $data_member = array(
                'id_sales' => 0,
            );
            $this->db->where('id_toko', $this->userdata->id_toko);
            $this->db->where('id_sales', $id_users);
            $this->db->update('member', $data_member);
            $data_update = array(
                'id_sales' => $id_users,
            );
            foreach ($data_toko as $key) {
                $this->Member_retail_model->update($key, $data_update);
            }
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('outlet/pegawai_retail'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pegawai_retail_model->get_by_id($id);
        if ($row) {
        	if($row->id==$this->userdata->id_user){
            	$this->session->set_flashdata('message', 'Cant Delete Admin');
        	} else {
            	$this->session->set_flashdata('message', 'Delete Record Success');
            	$this->Pegawai_retail_model->delete($id);
        	}
            redirect(site_url('outlet/pegawai_retail'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('outlet/pegawai_retail'));
        }
    }

    public function _rules() 
    {
        $this->form_validation->set_rules('id_toko', 'id toko', 'trim|required');
        $this->form_validation->set_rules('first_name', 'first name', 'trim|required');
        $this->form_validation->set_rules('phone', 'phone', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('confirm_password', 'confirm_password', 'trim|required|matches[password]');
        $this->form_validation->set_rules('level', 'level', 'trim|required');
        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function _rules_update() 
    {
        $this->form_validation->set_rules('id_toko', 'id toko', 'trim|required');
        $this->form_validation->set_rules('first_name', 'first name', 'trim|required');
        $this->form_validation->set_rules('phone', 'phone', 'trim|required');
        $this->form_validation->set_rules('level', 'level', 'trim|required');
        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "users.xls";
        $judul = "users";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
    	xlsWriteLabel($tablehead, $kolomhead++, "Id Toko");
    	xlsWriteLabel($tablehead, $kolomhead++, "Ip Address");
    	xlsWriteLabel($tablehead, $kolomhead++, "Username");
    	xlsWriteLabel($tablehead, $kolomhead++, "Password");
    	xlsWriteLabel($tablehead, $kolomhead++, "Salt");
    	xlsWriteLabel($tablehead, $kolomhead++, "Email");
    	xlsWriteLabel($tablehead, $kolomhead++, "Activation Code");
    	xlsWriteLabel($tablehead, $kolomhead++, "Forgotten Password Code");
    	xlsWriteLabel($tablehead, $kolomhead++, "Forgotten Password Time");
    	xlsWriteLabel($tablehead, $kolomhead++, "Remember Code");
    	xlsWriteLabel($tablehead, $kolomhead++, "Created On");
    	xlsWriteLabel($tablehead, $kolomhead++, "Last Login");
    	xlsWriteLabel($tablehead, $kolomhead++, "Active");
    	xlsWriteLabel($tablehead, $kolomhead++, "First Name");
    	xlsWriteLabel($tablehead, $kolomhead++, "Last Name");
    	xlsWriteLabel($tablehead, $kolomhead++, "Company");
    	xlsWriteLabel($tablehead, $kolomhead++, "Phone");
    	xlsWriteLabel($tablehead, $kolomhead++, "Level");

	foreach ($this->Pegawai_retail_model->get_by_id_toko($this->userdata->id_toko) as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->id_toko);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->ip_address);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->username);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->password);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->salt);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->activation_code);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->forgotten_password_code);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->forgotten_password_time);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->remember_code);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->created_on);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->last_login);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->active);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->first_name);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->last_name);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->company);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->phone);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->level);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=users.doc");

        $data = array(
            'users_data' => $this->Pegawai_retail_model->get_by_id_toko($this->userdata->id_toko),
            'start' => 0
        );
        
        $this->load->view('retail/admin/pegawai/users_doc',$data);
    }

}

/* End of file Pegawai_retail.php */
/* Location: ./application/controllers/Pegawai_retail.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-08-02 05:48:29 */
/* http://harviacode.com */