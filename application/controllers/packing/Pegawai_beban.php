<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pegawai_beban extends AI_Admin
{
    function __construct()
    {
        parent::__construct();   
        $this->models('Pegawai_retail_model, Member_retail_model');
        $this->models('User_retail_model');
    }

    public function karyawan()
    {
        $data_member = $this->db->select('id_member, id_sales, nama, alamat, telp')
                    ->from('member')
                    ->where('id_toko', $this->userdata->id_toko)
                    ->where('id_sales > 0')
                    ->get()->result();
                    $karyawan = $this->db->select('u.*') 
                               ->from('users u') 
                               ->join('beban b','b.id_users=u.id_users')
                               ->where('u.id_users!=',$this->userdata->id_users)
                               ->where('u.id_toko',$this->userdata->id_toko) 
                               ->get()
                               ->result();
                             //  var_dump($karyawan);
                    
                               
            $data = array(
            'beban_karyawan_active' => 'active',
            'data_member' => $data_member,
            'type' => 'karyawan',
            );
            $this->view('pegawai2/users_list', $data);
    }
    public function non_karyawan()
    {
        $data_member = $this->db->select('id_member, id_sales, nama, alamat, telp')
                    ->from('member')
                    ->where('id_toko', $this->userdata->id_toko)
                    ->where('id_sales > 0')
                    ->get()->result();
            $data = array(
            'beban_non_karyawan_active' => 'active',
            'data_member' => $data_member,
            'type' => 'non_karyawan',
            );
            $this->view('pegawai2/users_list', $data);
    }

    public function json($level = NULL) {
        header('Content-Type: application/json');
        echo $this->User_retail_model->json_beban_id_toko($this->userdata->id_toko, 'admin');
    }
    public function json_non() {
        header('Content-Type: application/json');
        echo $this->User_retail_model->json_beban_non_id_toko();
    }



    public function index()
    {

        if($this->input->get('karyawan')){
            $this->karyawan();
        }

        $data_member = $this->db->select('id_member, id_sales, nama, alamat, telp')
                                ->from('member')
                                ->where('id_toko', $this->userdata->id_toko)
                                ->where('id_sales > 0')
                                ->get()->result();
        $data = array(
            'beban_karyawan_active' => 'active',
            'data_member' => $data_member, 
            'type'=> 'karyawan'
        );
        $this->view('pegawai2/users_list', $data);
    } 
    
    // public function json() {
    //     header('Content-Type: application/json');
    //     echo $this->Pegawai_retail_model->json_sales($this->userdata->id_toko);
    // }

    public function read($id) 
    {
        $row = $this->db->select('b.*,u.*')
            ->from('beban b')
            ->join('users u','u.id_users=b.id_users')
            ->where('b.id_beban',$id)
            ->where('b.id_toko',$this->userdata->id_toko)
            ->get()
            ->row();
        if ($row) {
            $data = array(
                'type' => 'karyawan',
                'id_toko' => $this->userdata->id_toko,
                'nama_toko' => $this->userdata->nama_toko,
                'nama_user' => $this->userdata->email,
                'beban_karyawan_active' => 'active',
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
                'beban_per' => $row->beban_per,
                'nominal' => $row->nominal,
            );
            $this->view('pegawai2/users_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/pegawai_beban'));
        }
    }
    public function read_non($id) 
    {
        $row = $this->db->select('b.*')
            ->from('beban b')
            // ->join('users u','u.id_users=b.id_users')
            ->where('b.id_beban',$id)
            ->where('b.id_toko',$this->userdata->id_toko)
            ->get()
            ->row();
        if ($row) {
            $data = array(
                'type' => 'non_karyawan',
                'id_toko' => $this->userdata->id_toko,
                'nama_toko' => $this->userdata->nama_toko,
                'nama' => $row->nama,
                'nama_user' => $this->userdata->email,
                'beban_karyawan_active' => 'active',
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
                'beban_per' => $row->beban_per,
                'nominal' => $row->nominal,
            );
            $this->view('pegawai2/users_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/pegawai_beban'));
        }
    }

    public function create() 
    {
        $karyawan = $this->db->select("*")
                    ->from('users')
                    ->where('id_toko',$this->userdata->id_toko)
                    ->where('id_users!=',$this->userdata->id_users)
                    ->get()
                    ->result();
        $data = array(
            'type' => 'karyawan',
            'karyawan' => $karyawan,
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'beban_karyawan_active' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'button' => 'Tambah',
            'action' => site_url('admin/pegawai_beban/create_action'),
            'id' => set_value('id'),
            'id_toko' => $this->userdata->id_toko,
            'first_name' => set_value('first_name'),
            'last_name' => set_value('last_name'),
            'phone' => set_value('phone'),
            'level' => set_value('level'),
            'password' => set_value('password'),
            'confirm_password' => set_value('confirm_password'),
            'beban_per' => set_value('beban_per'),
            'nominal' => set_value('nominal'), 
            'id_user'=> set_value('id_user')
        );
        // $data['data_toko'] = $this->Member_retail_model->get_by_id_sales_and_not();
        // var_dump($data['data_toko']);
        $this->view('pegawai2/users_form', $data);
    }
    public function create_non() 
    {
        $karyawan = $this->db->select("*")
                    ->from('users')
                    ->where('id_toko',$this->userdata->id_toko)
                    ->where('id_users!=',$this->userdata->id_users)
                    ->get()
                    ->result();
        $data = array(
            'type' => 'non_karyawan',
            'karyawan' => $karyawan,
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'beban_karyawan_active' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'button' => 'Tambah',
            'action' => site_url('admin/pegawai_beban/create_action_none'),
            'id' => set_value('id'),
            'id_toko' => $this->userdata->id_toko,
            'first_name' => set_value('first_name'),
            'last_name' => set_value('last_name'),
            'phone' => set_value('phone'),
            'level' => set_value('level'),
            'password' => set_value('password'),
            'confirm_password' => set_value('confirm_password'),
            'beban_per' => set_value('beban_per'),
            'nominal' => set_value('nominal'),
            'nama' => set_value('nama'),
        );
        // $data['data_toko'] = $this->Member_retail_model->get_by_id_sales_and_not();
        // var_dump($data['data_toko']);
        $this->view('pegawai2/users_form', $data);
    }
    
    public function create_action() 
    {
        // $this->_rules();
        // if ($this->form_validation->run() == FALSE) {
        //     // $this->create();
        //     echo "val";
        // } else {
        //     echo "aa";
		    // $identity = $this->input->post('email');
		    // $email = $this->input->post('email');
            // $password = $this->input->post('password');
		    $id_users = $this->input->post('id_users');
		    $beban_per = $this->input->post('beban_per');
		    $nominal = $this->input->post('nominal');
		    
            $data =  [
                    'id_toko' => $this->userdata->id_toko,
                    'id_users' => $id_users,
                    'beban_per' => $beban_per,
                    'nominal' => $nominal,
            ];
            // var_dump($data);
            $this->db->insert('beban', $data);

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/pegawai_beban'));
        // }

    }
    public function create_action_none() 
    {
        // $this->_rules();
        // if ($this->form_validation->run() == FALSE) {
        //     // $this->create();
        //     echo "val";
        // } else {
        //     echo "aa";
		    // $identity = $this->input->post('email');
		    // $email = $this->input->post('email');
            // $password = $this->input->post('password');
		    $nama = $this->input->post('nama');
		    $beban_per = $this->input->post('beban_per');
		    $nominal = $this->input->post('nominal');
		    
            $data =  [
                    'id_toko' => $this->userdata->id_toko,
                    'nama' => $nama,
                    'beban_per' => $beban_per,
                    'nominal' => $nominal,
            ];
            // var_dump($data);
            $this->db->insert('beban', $data);

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/pegawai_beban/non_karyawan'));
        // }

    }
    
    public function update($id) 
    {
        $row = $this->db->select('b.*')
                ->from('beban b')
                ->join('users u','u.id_users=b.id_users')
                ->where('b.id_beban',$id)
                ->where('b.id_toko',$this->userdata->id_toko)
                ->get()
                ->row();
        $karyawan = $this->db->select("*")
                ->from('users')
                ->where('id_toko',$this->userdata->id_toko)
                ->where('id_users!=',$this->userdata->id_users)
                ->get()
                ->result();
        if ($row) {
            
            $data = array(
                'type' => 'karyawan',
                'id_beban' => $id,
                'karyawan' => $karyawan,
                'id_user' => $row->id_users,
                'id_toko' => $this->userdata->id_toko,
                'nama_toko' => $this->userdata->nama_toko,
                'nama_user' => $this->userdata->email,
                'beban_karyawan_active' => 'active',
                'id_modul' => $this->userdata->id_modul,
                'nama_modul' => $this->userdata->nama_modul,
                'button' => 'Simpan',
                'action' => site_url('admin/pegawai_beban/update_action'),
                'id' => set_value('id', $row->id),
                'id_users' => set_value('id_users', $row->id_users),
                'id_toko' => set_value('id_toko', $row->id_toko),
                'first_name' => set_value('first_name', $row->first_name),
                'phone' => set_value('phone', $row->phone),
                'email' => set_value('email', $row->email),
                'level' => set_value('level', $row->level),
                'password' => set_value('password', ''),
                'beban_per' => set_value('beban_per',$row->beban_per),
                'nominal' => set_value('nominal',$row->nominal),
            );
            // var_dump($data);
            // if ($row->level=="4") {
            //     $data['data_toko'] = $this->Member_retail_model->get_by_id_sales_and_not($row->id_users);
            // }
            $this->view('pegawai2/users_form', $data);

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/pegawai_beban'));
        }
    }
    public function update_non($id) 
    {
        $row = $this->db->select('b.*')
                ->from('beban b')
                // ->join('users u','u.id_users=b.id_users')
                ->where('b.id_beban',$id)
                ->where('b.id_toko',$this->userdata->id_toko)
                ->get()
                ->row();
        $karyawan = $this->db->select("*")
                ->from('users')
                ->where('id_toko',$this->userdata->id_toko)
                ->where('id_users!=',$this->userdata->id_users)
                ->get()
                ->result();
        if ($row) {
            
            $data = array(
                'type' => 'non_karyawan',
                'id_beban' => $id,
                'karyawan' => $karyawan,
                'id_user' => $row->id_users,
                'id_toko' => $this->userdata->id_toko,
                'nama_toko' => $this->userdata->nama_toko,
                'nama_user' => $this->userdata->email,
                'beban_karyawan_active' => 'active',
                'id_modul' => $this->userdata->id_modul,
                'nama_modul' => $this->userdata->nama_modul,
                'button' => 'Simpan',
                'action' => site_url('admin/pegawai_beban/update_action_non'),
                'id' => set_value('id', $row->id),
                'id_users' => set_value('id_users', $row->id_users),
                'id_toko' => set_value('id_toko', $row->id_toko),
                'first_name' => set_value('first_name', $row->first_name),
                'phone' => set_value('phone', $row->phone),
                'email' => set_value('email', $row->email),
                'level' => set_value('level', $row->level),
                'password' => set_value('password', ''),
                'beban_per' => set_value('beban_per',$row->beban_per),
                'nominal' => set_value('nominal',$row->nominal),
                'nama' => set_value('nama',$row->nama),
            );
            // var_dump($data);
            // if ($row->level=="4") {
            //     $data['data_toko'] = $this->Member_retail_model->get_by_id_sales_and_not($row->id_users);
            // }
            $this->view('pegawai2/users_form', $data);

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/pegawai_beban'));
        }
    }
    
    public function update_action() 
    {
        $id_beban = $this->input->post('id_beban');
        $id_users = $this->input->post('id_users');
        $beban_per = $this->input->post('beban_per');
        $nominal = $this->input->post('nominal');

        $data =  [
            'id_toko' => $this->userdata->id_toko,
            'id_users' => $id_users,
            'beban_per' => $beban_per,
            'nominal' => $nominal,
            ];
            $this->db->where('id_beban', $id_beban);
            $this->db->update('beban', $data);;

            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/pegawai_beban/karyawan'));
        // $this->_rules_update();
        // if ($this->form_validation->run() == FALSE) {
        //     $this->update($this->input->post('id_users', TRUE));
        // } else {
        //     $data_toko = $this->input->post('data_toko');
        //     $id_users = $this->input->post('id_users');
        //     $data = array(
        //         'first_name' => $this->input->post('first_name'),
        //         'email' => $this->input->post('email'),
        //         'phone' => $this->input->post('phone'),
        //     );
        //     if (!empty($this->input->post('password', true))) {
        //         $password = $this->Ion_auth_model->hash_password($this->input->post('password', true));
        //         $data['password'] = $password;
        //     }
        //     $this->db->where('id_toko', $this->userdata->id_toko);
        //     $this->db->where('id_users', $this->input->post('id_users', true));
        //     $this->db->update('users', $data);
        //     $data_member = array(
        //         'id_sales' => 0,
        //     );
        //     $this->db->where('id_toko', $this->userdata->id_toko);
        //     $this->db->where('id_sales', $id_users);
        //     $this->db->update('member', $data_member);
        //     $data_update = array(
        //         'id_sales' => $id_users,
        //     );
        //     foreach ($data_toko as $key) {
        //         $this->Member_retail_model->update($key, $data_update);
        //     }
        //     $this->session->set_flashdata('message', 'Update Record Success');
        //     redirect(site_url('admin/pegawai_retail'));
        // }
    }
    public function update_action_non() 
    {
        $id_beban = $this->input->post('id_beban');
        $nama = $this->input->post('nama');
        $beban_per = $this->input->post('beban_per');
        $nominal = $this->input->post('nominal');

        $data =  [
            'id_toko' => $this->userdata->id_toko,
            'nama' => $nama,
            'beban_per' => $beban_per,
            'nominal' => $nominal,
            ];
            $this->db->where('id_beban', $id_beban);
            $this->db->update('beban', $data);;

            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/pegawai_beban/non_karyawan'));
        // $this->_rules_update();
        // if ($this->form_validation->run() == FALSE) {
        //     $this->update($this->input->post('id_users', TRUE));
        // } else {
        //     $data_toko = $this->input->post('data_toko');
        //     $id_users = $this->input->post('id_users');
        //     $data = array(
        //         'first_name' => $this->input->post('first_name'),
        //         'email' => $this->input->post('email'),
        //         'phone' => $this->input->post('phone'),
        //     );
        //     if (!empty($this->input->post('password', true))) {
        //         $password = $this->Ion_auth_model->hash_password($this->input->post('password', true));
        //         $data['password'] = $password;
        //     }
        //     $this->db->where('id_toko', $this->userdata->id_toko);
        //     $this->db->where('id_users', $this->input->post('id_users', true));
        //     $this->db->update('users', $data);
        //     $data_member = array(
        //         'id_sales' => 0,
        //     );
        //     $this->db->where('id_toko', $this->userdata->id_toko);
        //     $this->db->where('id_sales', $id_users);
        //     $this->db->update('member', $data_member);
        //     $data_update = array(
        //         'id_sales' => $id_users,
        //     );
        //     foreach ($data_toko as $key) {
        //         $this->Member_retail_model->update($key, $data_update);
        //     }
        //     $this->session->set_flashdata('message', 'Update Record Success');
        //     redirect(site_url('admin/pegawai_retail'));
        // }
    }
    
    public function delete_karyawan($id) 
    {

        $this->db->where('id_beban', $id);
        $this->db->delete('beban');

            $this->session->set_flashdata('message', 'Success Delete Record');
            redirect(site_url('admin/pegawai_beban/karyawan'));
        
    }
    public function delete_karyawan_non($id) 
    {

        $this->db->where('id_beban', $id);
        $this->db->delete('beban');

            $this->session->set_flashdata('message', 'Success Delete Record');
            redirect(site_url('admin/pegawai_beban/non_karyawan'));
        
    }

    public function _rules() 
    {
        $this->form_validation->set_rules('id_user', 'user', 'trim|required');
        $this->form_validation->set_rules('beban_per', 'beban_per', 'trim|required');
        $this->form_validation->set_rules('nominal', 'nominal', 'trim|required');
        // $this->form_validation->set_rules('id_toko', 'id toko', 'trim|required');
        // $this->form_validation->set_rules('first_name', 'first name', 'trim|required');
        // $this->form_validation->set_rules('phone', 'phone', 'trim|required');
        // $this->form_validation->set_rules('password', 'password', 'trim|required');
        // $this->form_validation->set_rules('confirm_password', 'confirm_password', 'trim|required|matches[password]');
        // $this->form_validation->set_rules('level', 'level', 'trim|required');
        // $this->form_validation->set_rules('id', 'id', 'trim');
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