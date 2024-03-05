<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tukarphone extends AI_Admin
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tukarphone_model');
    }

    public function json($kode = '')
    {
        header('Content-Type: application/json');
        echo $this->Tukarphone_model->json($this->userdata->id_toko);
    }

    public function index()
    {
        $data = array(
            'active_tukar_phone' => 'active',
        );
        $this->view('tukar_phone/tukar_phone_list', $data);
    }

    public function create()
    {
        $data = array(
            'active_tukar_phone' => 'active',
            'action' => site_url('admin/tukarphone/create_action'),
        );
        $this->view('tukar_phone/tukar_phone_form', $data);
    }

    public function create_action()
    {
        $this->db->insert('tukarphone', [
            'tgl' => date('d-m-Y H:i:s'),
            'nama_penukar' => $this->input->post('nama_penukar'),
            'alamat_penukar' => $this->input->post('alamat_penukar'),
            'no_hp_penukar' => $this->input->post('no_hp_penukar'),
        ]);
        redirect(site_url('admin/tukarphone'));
    }

    public function aksi($aksi = '')
    {
        $array = array(
            'tukartambah' => 1,
        );
        $this->session->set_userdata($array);
        if ($aksi == 'penjualan') {
            redirect(site_url('admin/penjualan_retail/create/?tp=' . md5($this->userdata->id_users)));
        } else {
            redirect(site_url('admin/pembelian/create/?tp=' . md5($this->userdata->id_users)));
        }
    }
}
