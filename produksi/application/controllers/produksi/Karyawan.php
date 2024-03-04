<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('form_validation');
	    $this->load->library('datatables');
        $this->load->model('Karyawan_model');
        $this->load->model('Login_model');
        $this->load->library(array('ion_auth','form_validation'));
        $this->load->model('Ion_auth_model');
        $this->load->library('view');
        $this->Login_model->is_produksi();
        $this->userdata = $this->Login_model->get_data();
	}

	public function index()
	{
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_karyawan' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
        );
        $this->view->render_produksi('karyawan/karyawan_list', $data);
	}
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Karyawan_model->json();
    }

    public function read($id)
    {
    	$row = $this->db->select('u.*')
    					->from('users u')
    					->where('u.id_toko', $this->userdata->id_toko)
    					->where('u.id_users', $id)
    					->get()->row();
    	if ($row) {
	        $data = array(
	            'id_toko' => $this->userdata->id_toko,
	            'nama_toko' => $this->userdata->nama_toko,
	            'nama_user' => $this->userdata->email,
	            'active_karyawan' => 'active',
	            'id_modul' => $this->userdata->id_modul,
	            'nama_modul' => $this->userdata->nama_modul,
	            'nama' => $row->first_name,
	            'no_hp' => $row->phone,
	            'alamat' => $row->alamat,
	        );
	        $this->view->render_produksi('karyawan/karyawan_read', $data);
    	} else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produksi/karyawan'));
    	}
    }

    public function create()
    {
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_karyawan' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'action' => site_url('produksi/karyawan/create_action'),
            'id' => set_value('id'),
			'first_name' => set_value('first_name'),
			'email' => set_value('email'),
			'phone' => set_value('phone'),
			'alamat' => set_value('alamat'),
			'password' => set_value('password'),
			'confirm_password' => set_value('confirm_password'),
        );
        $this->view->render_produksi('karyawan/karyawan_form', $data);
    }

    public function create_action()
    {
    	$this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
			$first_name = $this->input->post('first_name', true);
			$email = $this->input->post('email', true);
			$phone = $this->input->post('phone', true);
			$alamat = $this->input->post('alamat', true);
			$password = $this->input->post('password', true);
			$confirm_password = $this->input->post('confirm_password', true);
			if ($password == $confirm_password) {
				$row_last_users = $this->db->where('id_toko', $this->userdata->id_toko)->order_by('id_users', 'desc')->get('users')->row();
				$id_users = 1;
				if ($row_last_users) {
					$id_users = $row_last_users->id_users+1;
				}
				$additional_data = array(
					'id_cabang' => 1,
					'id_toko' => $this->userdata->id_toko,
					'id_users' => $id_users,
					'first_name' => $first_name,
					'phone' => $phone,
					'alamat' => $alamat,
					'level' => 4,
					'id_kota' => 1,
				);
	            $reg = $this->ion_auth->register($email, $password, $email, $additional_data);
	            if ($reg) {
	                $this->session->set_flashdata('message', 'Create Record Success');
	            } else {
	                $this->session->set_flashdata('message', 'Email sudah digunakan');
	            }
			} else {
                $this->session->set_flashdata('message', 'Password tidak sama');
			}
            redirect(site_url('produksi/karyawan'));
    	}
    }

    public function update($id)
    {
    	$row = $this->db->select('u.*')
    					->from('users u')
    					->where('u.id_toko', $this->userdata->id_toko)
    					->where('u.id_users', $id)
    					->get()->row();
    	if ($row) {
	        $data = array(
	            'id_toko' => $this->userdata->id_toko,
	            'nama_toko' => $this->userdata->nama_toko,
	            'nama_user' => $this->userdata->email,
	            'active_karyawan' => 'active',
	            'id_modul' => $this->userdata->id_modul,
	            'nama_modul' => $this->userdata->nama_modul,
	            'action' => site_url('produksi/karyawan/update_action'),
	            'id' => set_value('id', $row->id_users),
				'first_name' => set_value('first_name', $row->first_name),
				'email' => set_value('email', $row->email),
				'phone' => set_value('phone', $row->phone),
				'alamat' => set_value('alamat', $row->alamat),
				'password' => set_value('password'),
				'confirm_password' => set_value('confirm_password'),
	        );
	        $this->view->render_produksi('karyawan/karyawan_form', $data);
    	} else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produksi/karyawan'));
    	}
    }

    public function update_action()
    {
    	$this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', true));
        } else {
			$id = $this->input->post('id', true);
			$first_name = $this->input->post('first_name', true);
			$email = $this->input->post('email', true);
			$phone = $this->input->post('phone', true);
			$alamat = $this->input->post('alamat', true);
			$password = $this->input->post('password', true);
			$confirm_password = $this->input->post('confirm_password', true);
			if ($password == $confirm_password) {
				$hash = $this->Ion_auth_model->hash_password($password);
				$data_update = array(
					'first_name' => $first_name,
					'email' => $email,
					'phone' => $phone,
					'alamat' => $alamat,
					'password' => $hash,
				);
				$this->db->where('id_toko', $this->userdata->id_toko);
				$this->db->where('id_users', $id);
				$this->db->update('users', $data_update);
	            $this->session->set_flashdata('message', 'Update Record Success');
			} else {
                $this->session->set_flashdata('message', 'Password tidak sama');
			}
            redirect(site_url('produksi/karyawan'));
        }
    }

    public function delete($id)
    {
        $row = $this->db->select('u.*')
        				->from('users u')
                        ->where('u.id_toko', $this->userdata->id_toko)
        				->where('u.id_cabang', $this->userdata->id_cabang)
        				->where('u.level', 4)
        				->where('u.id_users', $id)
        				->get()->row();
        if ($row) {
        	$this->db->where('id', $row->id);
        	$this->db->delete('users');
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('produksi/karyawan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produksi/karyawan'));
        }
    }

    private function _rules()
    {
        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_rules('first_name', 'first_name', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('phone', 'phone', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('confirm_password', 'confirm_password', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Karyawan.php */
/* Location: ./application/controllers/Karyawan.php */