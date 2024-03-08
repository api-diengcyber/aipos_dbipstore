<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pil_bank extends AI_Admin
{
    function __construct()
    {
        parent::__construct();
        $this->models('Pil_bank_model');
    }

    public function index()
    {
        $data = array(
            'active_bank' => 'active',
        );
        $this->view('pil_bank/pil_bank_list', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Pil_bank_model->json();
    }

    public function read($id) 
    {
        $row = $this->Pil_bank_model->get_by_id($id);
        if ($row) {
            $data = array(
                'active_bank' => 'active',
                'id' => $row->id,
                'bank' => $row->bank,
                'kode_akun' => $row->kode_akun,
                'kode_akun_2' => $row->kode_akun_2,
            );
            $this->view('pil_bank/pil_bank_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/pil_bank'));
        }
    }

    public function create() 
    {
        $res_akun_1 = $this->db->where('(uid < 1 OR uid IS NULL)')->where('parent', 'bank')->order_by('kode', 'asc')->get('akun')->result();
        $res_akun_2 = $this->db->where('(uid < 1 OR uid IS NULL)')->where('parent', 'bank2')->order_by('kode', 'asc')->get('akun')->result();
        
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_bank' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'button' => 'Create',
            'action' => site_url('admin/pil_bank/create_action'),
            'id' => set_value('id'),
            'bank' => set_value('bank'),
            'akun_1' => set_value('akun_1'),
            'akun_2' => set_value('akun_2'),
            'data_akun_1' => $res_akun_1,
            'data_akun_2' => $res_akun_2,
        );

        // var_dump($res_akun_1);

        $this->view('pil_bank/pil_bank_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $akun_1 = $this->input->post('akun_1', true);
            $akun_2 = $this->input->post('akun_2', true);
            
            $data = array(
                'bank' => $this->input->post('bank',TRUE),
            );
            $this->Pil_bank_model->insert($data);
            $id = $this->db->insert_id();
            
            $data_update = array(
                'uid' => $id,
            );
            $this->db->where('id', $akun_1);
            $this->db->where('parent', 'bank');
            $this->db->update('akun', $data_update);

            $data_update = array(
                'uid' => $id,
            );
            $this->db->where('id', $akun_2);
            $this->db->where('parent', 'bank2');
            $this->db->update('akun', $data_update);
            
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/pil_bank'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pil_bank_model->get_by_id($id);

        $res_akun_1 = $this->db->where('parent', 'bank')->order_by('kode', 'asc')->get('akun')->result();
        $res_akun_2 = $this->db->where('parent', 'bank2')->order_by('kode', 'asc')->get('akun')->result();

        if ($row) {

            $akun_1 = "";
            $row_a1 = $this->db->where('parent', 'bank')->where('uid', $row->id)->get('akun')->row();
            if ($row_a1) {
                $akun_1 = $row_a1->id;
            }
            $akun_2 = "";
            $row_a2 = $this->db->where('parent', 'bank2')->where('uid', $row->id)->get('akun')->row();
            if ($row_a2) {
                $akun_2 = $row_a2->id;
            }

            $data = array(
                'id_toko' => $this->userdata->id_toko,
                'nama_toko' => $this->userdata->nama_toko,
                'nama_user' => $this->userdata->email,
                'active_bank' => 'active',
                'id_modul' => $this->userdata->id_modul,
                'nama_modul' => $this->userdata->nama_modul,
                'button' => 'Update',
                'action' => site_url('admin/pil_bank/update_action'),
                'id' => set_value('id', $row->id),
                'bank' => set_value('bank', $row->bank),
                'akun_1' => set_value('akun_1', $akun_1),
                'akun_2' => set_value('akun_2', $akun_2),
                'data_akun_1' => $res_akun_1,
                'data_akun_2' => $res_akun_2,
            );
            $this->view('pil_bank/pil_bank_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/pil_bank'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $id = $this->input->post('id', TRUE);
            $akun_1 = $this->input->post('akun_1', true);
            $akun_2 = $this->input->post('akun_2', true);
            
            $data = array(
                'bank' => $this->input->post('bank',TRUE),
            );
            
            $data_update = array(
                'uid' => $id,
            );
            $this->db->where('id', $akun_1);
            $this->db->where('parent', 'bank');
            $this->db->update('akun', $data_update);

            $data_update = array(
                'uid' => $id,
            );
            $this->db->where('id', $akun_2);
            $this->db->where('parent', 'bank2');
            $this->db->update('akun', $data_update);

            $this->Pil_bank_model->update($id, $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/pil_bank'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pil_bank_model->get_by_id($id);

        if ($row) {
            $data_update = array(
                'uid' => null,
            );
            $this->db->where('parent', 'bank');
            $this->db->where('uid', $id);
            $this->db->update('akun', $data_update);

            $this->db->where('parent', 'bank2');
            $this->db->where('uid', $id);
            $this->db->update('akun', $data_update);

            $this->Pil_bank_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/pil_bank'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/pil_bank'));
        }
    }

    public function _rules() 
    {
        $this->form_validation->set_rules('bank', 'bank', 'trim|required');
        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pil_bank.php */
/* Location: ./application/controllers/Pil_bank.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-02-18 02:28:42 */
/* http://harviacode.com */