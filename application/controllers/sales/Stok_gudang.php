<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Stok_gudang extends AI_Admin
{
    function __construct()
    {
        parent::__construct();
        $this->models('Gudang_model,Stok_gudang_model');
    }

    public function index()
    {
        $data = array(
            'active_stok_gudang' => 'active',
            'data_gudang' => $this->Gudang_model->get_all(),
            'data_produk_stok' => $this->Stok_gudang_model->get_produk_stok(),
            'action' => site_url('admin/stok_gudang/create_action_all'),
        );
        $this->view('stok_gudang/stok_gudang_list', $data);
    }

    public function create_action_all()
    {
        $data_gudang = (array) $this->input->post('id_produk');
        
        foreach ($data_gudang as $id_gudang => $data_produk):
            foreach ($data_produk as $id_produk => $stok):
                echo $id_gudang." ".$id_produk." =  ".$stok."<br>";
                $row = $this->Stok_gudang_model->get_cek($id_gudang, $id_produk);
                if ($row) { // update
                    $data_update = array(
                        'tgl_update' => date('Y-m-d'),
                        'stok' => $stok,
                    );
                    $this->Stok_gudang_model->update($row->id, $data_update);
                } else { // insert
                    $data_insert = array(
                        'id_toko' => $this->userdata->id_toko,
                        'id_gudang' => $id_gudang,
                        'id_produk' => $id_produk,
                        'tgl' => date('Y-m-d'),
                        'stok' => $stok,
                    );
                    $this->Stok_gudang_model->insert($data_insert);
                }
            endforeach;
        endforeach;

        $this->session->set_flashdata('message', 'Insert Record Success');
        redirect(site_url('admin/stok_gudang'));
    }
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Stok_gudang_model->json();
    }

    public function read($id) 
    {
        $row = $this->Stok_gudang_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_toko' => $this->userdata->id_toko,
                'nama_toko' => $this->userdata->nama_toko,
                'nama_user' => $this->userdata->email,
                'active_stok_gudang' => 'active',
                'id_modul' => $this->userdata->id_modul,
                'nama_modul' => $this->userdata->nama_modul,
                'id' => $row->id,
                'id_gudang' => $row->id_gudang,
                'id_produk' => $row->id_produk,
                'stok' => $row->stok,
                'nama_gudang' => $row->nama_gudang,
                'nama_produk' => $row->nama_produk,
            );
            $this->view('stok_gudang/stok_gudang_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/stok_gudang'));
        }
    }

    public function create() 
    {
        $res_gudang = $this->db->where('id_toko', $this->userdata->id_toko)->get('gudang')->result();
        $res_produk = $this->db->where('id_toko', $this->userdata->id_toko)->get('produk_retail')->result();
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_stok_gudang' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'button' => 'Create',
            'action' => site_url('admin/stok_gudang/create_action'),
            'id' => set_value('id'),
            'id_gudang' => set_value('id_gudang'),
            'id_produk' => set_value('id_produk'),
            'stok' => set_value('stok'),
            'data_gudang' => $res_gudang,
            'data_produk' => $res_produk,
        );
        $this->view('stok_gudang/stok_gudang_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'id_toko' => $this->userdata->id_toko,
                'id_gudang' => $this->input->post('id_gudang',TRUE),
                'id_produk' => $this->input->post('id_produk',TRUE),
                'stok' => $this->input->post('stok',TRUE),
            );
            $this->Stok_gudang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/stok_gudang'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Stok_gudang_model->get_by_id($id);
        $res_gudang = $this->db->where('id_toko', $this->userdata->id_toko)->get('gudang')->result();
        $res_produk = $this->db->where('id_toko', $this->userdata->id_toko)->get('produk_retail')->result();
        if ($row) {
            $data = array(
                'id_toko' => $this->userdata->id_toko,
                'nama_toko' => $this->userdata->nama_toko,
                'nama_user' => $this->userdata->email,
                'active_stok_gudang' => 'active',
                'id_modul' => $this->userdata->id_modul,
                'nama_modul' => $this->userdata->nama_modul,
                'button' => 'Update',
                'action' => site_url('admin/stok_gudang/update_action'),
                'id' => set_value('id', $row->id),
                'id_gudang' => set_value('id_gudang', $row->id_gudang),
                'id_produk' => set_value('id_produk', $row->id_produk),
                'stok' => set_value('stok', $row->stok),
                'data_gudang' => $res_gudang,
                'data_produk' => $res_produk,
            );
            $this->view('stok_gudang/stok_gudang_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/stok_gudang'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'id_toko' => $this->userdata->id_toko,
                'id_gudang' => $this->input->post('id_gudang',TRUE),
                'id_produk' => $this->input->post('id_produk',TRUE),
                'stok' => $this->input->post('stok',TRUE),
            );

            $this->Stok_gudang_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/stok_gudang'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Stok_gudang_model->get_by_id($id);
        if ($row) {
            $this->Stok_gudang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/stok_gudang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/stok_gudang'));
        }
    }

    public function _rules() 
    {
        $this->form_validation->set_rules('id_gudang', 'id gudang', 'trim|required');
        $this->form_validation->set_rules('id_produk', 'id produk', 'trim|required');
        $this->form_validation->set_rules('stok', 'stok', 'trim|required');
        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Stok_gudang.php */
/* Location: ./application/controllers/Stok_gudang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-02-20 05:16:29 */
/* http://harviacode.com */