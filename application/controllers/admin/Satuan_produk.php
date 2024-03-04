<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Satuan_produk extends AI_Admin
{
    function __construct()
    {
        parent::__construct();
        $this->models('Satuan_produk_model');
    }

    public function index()
    {
        $data = array(
            'active_satuan_produk' => 'active',
        );
        $this->view('satuan_produk/satuan_produk_list', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Satuan_produk_model->json($this->userdata->id_toko);
    }

    public function create()
    {
        $data = array(
            'active_satuan_produk' => 'active',
            'button' => 'Tambah',
            'action' => site_url('admin/satuan_produk/create_action'),
            'satuan' => set_value('satuan'),
            'id' => set_value('id'),
        );
        $this->view('satuan_produk/satuan_produk_form', $data);
    }

    public function create_action()
    {

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $row_last_satuan = $this->db->select('*')
                                        ->from('satuan_produk')
                                        ->where('id_toko', $this->userdata->id_toko)
                                        ->order_by('id_satuan', 'desc')
                                        ->get()->row();
            $id_satuan = 1;
            if ($row_last_satuan) {
                $id_satuan = $row_last_satuan->id_satuan+1;
            }
            $data = array(
                'id_satuan' => $id_satuan,
                'id_toko' => $this->userdata->id_toko,
                'id_users' => $this->userdata->id_users,
                'satuan' => $this->input->post('satuan'),
            );
            $this->Satuan_produk_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/satuan_produk'));
        }
    }

    public function update($id)
    {
        $row = $this->Satuan_produk_model->get_by_id($id, $this->userdata->id_toko);
        $data = array(
            'active_satuan_produk' => 'active',
            'button' => 'Simpan',
            'action' => site_url('admin/satuan_produk/update_action'),
            'satuan' => set_value('satuan', $row->satuan),
            'id' => set_value('id', $row->id_satuan),
        );
        $this->view('satuan_produk/satuan_produk_form', $data);
    }

    public function update_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id'));
        } else {
            $data = array(
                'id_toko' => $this->userdata->id_toko,
                'satuan' => $this->input->post('satuan'),
            );
            $this->Satuan_produk_model->update($this->input->post('id'), $data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/satuan_produk'));
        }
    }

    public function _rules() 
    {
        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_rules('satuan', 'satuan', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function delete($id)
    {
        $row = $this->Satuan_produk_model->get_by_id($id, $this->userdata->id_toko);
        if ($row) {
            $this->Satuan_produk_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/satuan_produk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/satuan_produk'));
        }
    }

}