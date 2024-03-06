<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Produk_retail_mutasi extends AI_Admin
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_retail_mutasi_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $data = array(
            'active_mutasi_stok' => 'active',
        );
        $this->view('produk_retail_mutasi/produk_retail_mutasi_list', $data);
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Produk_retail_mutasi_model->json();
    }

    public function get_user_produk()
    {
        header('Content-Type: application/json');
        $term = $this->input->post('term');
        $id_users = $this->input->post('id_users');
        $this->db->where('(pr.nama_produk LIKE "%' . $term . '%" OR pr.barcode LIKE "%' . $term . '%")');
        $this->db->where('pr.id_toko', $this->userdata->id_toko);
        $this->db->where('pr.id_users', $id_users);
        $data = $this->db->get('produk_retail pr')->result();
        echo json_encode($data);
    }

    public function get_user_cabang()
    {
        header('Content-Type: application/json');
        $term = $this->input->post('term');
        $not_id_users = $this->input->post('not_id_users');
        $restrict_produk = $this->input->post('restrict_produk');
        if (!empty($restrict_produk)) {
            $this->db->join('produk_retail pr', 'pr.id_toko=u.id_toko AND pr.id_users=u.id_users', 'inner');
        }
        $this->db->where('(u.first_name LIKE "%' . $term . '%" OR u.username LIKE "%' . $term . '%" OR u.alamat LIKE "%' . $term . '%")');
        $this->db->where('u.id_toko', $this->userdata->id_toko);
        if (!empty($not_id_users)) {
            $this->db->where('u.id_users !=', $not_id_users);
        }
        $this->db->group_by('u.id_users');
        // $this->db->where('level !=', 1);
        $data = $this->db->get('users u')->result();
        echo json_encode($data);
    }
    public function get_user_cabang_no_admin()
    {
        header('Content-Type: application/json');
        $term = $this->input->post('term');
        $not_id_users = $this->userdata->id_users;
        $restrict_produk = $this->input->post('restrict_produk');
        if (!empty($restrict_produk)) {
            $this->db->join('produk_retail pr', 'pr.id_toko=u.id_toko AND pr.id_users=u.id_users', 'inner');
        }
        $this->db->where('(u.first_name LIKE "%' . $term . '%" OR u.username LIKE "%' . $term . '%" OR u.alamat LIKE "%' . $term . '%")');
        $this->db->where('u.id_toko', $this->userdata->id_toko);
        if (!empty($not_id_users)) {
            $this->db->where('u.id_users !=', $not_id_users);
        }
        $this->db->group_by('u.id_users');
        // $this->db->where('level !=', 1);
        $data = $this->db->get('users u')->result();
        echo json_encode($data);
    }

    public function read($id)
    {
        $row = $this->Produk_retail_mutasi_model->get_by_id($id);
        if ($row) {
            $data = array(
                'active_mutasi_stok' => 'active',
                'id' => $row->id,
                'tgl' => $row->tgl,
                'id_produk' => $row->id_produk,
                'id_users_asal' => $row->id_users_asal,
                'id_users_tujuan' => $row->id_users_tujuan,
                'keterangan' => $row->keterangan,
            );
            $this->view('produk_retail_mutasi/produk_retail_mutasi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/produk_retail_mutasi'));
        }
    }

    public function create()
    {
        $data = array(
            'active_mutasi_stok' => 'active',
            'button' => 'Create',
            'action' => site_url('admin/produk_retail_mutasi/create_action'),
            'id' => set_value('id'),
            'tgl' => set_value('tgl', date('d-m-Y')),
            'id_produk' => set_value('id_produk'),
            'id_users_asal' => set_value('id_users_asal'),
            'id_users_tujuan' => set_value('id_users_tujuan'),
            'keterangan' => set_value('keterangan'),
        );
        $this->view('produk_retail_mutasi/produk_retail_mutasi_form', $data);
    }

    public function create_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $id_produk = $this->input->post('id_produk', TRUE);
            $id_users_asal = $this->input->post('id_users_asal', TRUE);
            $id_users_tujuan = $this->input->post('id_users_tujuan', TRUE);
            $data = [
                'id_toko' => $this->userdata->id_toko,
                'id_users' => $this->userdata->id_users,
                'tgl' => $this->input->post('tgl', TRUE),
                'id_produk' => $id_produk,
                'id_users_asal' => $id_users_asal,
                'id_users_tujuan' => $id_users_tujuan,
                'keterangan' => $this->input->post('keterangan', TRUE),
            ];
            $this->db->where('id_toko', $this->userdata->id_toko);
            $this->db->where('id_produk_2', $id_produk);
            $this->db->where('id_users', $id_users_asal);
            $this->db->update('produk_retail', [
                'id_users' => $id_users_tujuan,
            ]);
            $this->Produk_retail_mutasi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/produk_retail_mutasi'));
        }
    }

    public function update($id)
    {
        $row = $this->Produk_retail_mutasi_model->get_by_id($id);
        if ($row) {
            $data = array(
                'active_mutasi_stok' => 'active',
                'button' => 'Update',
                'action' => site_url('admin/produk_retail_mutasi/update_action'),
                'id' => set_value('id', $row->id),
                'tgl' => set_value('tgl', $row->tgl),
                'id_produk' => set_value('id_produk', $row->id_produk),
                'id_users_asal' => set_value('id_users_asal', $row->id_users_asal),
                'id_users_tujuan' => set_value('id_users_tujuan', $row->id_users_tujuan),
                'keterangan' => set_value('keterangan', $row->keterangan),
            );
            $this->view('produk_retail_mutasi/produk_retail_mutasi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/produk_retail_mutasi'));
        }
    }

    public function update_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'tgl' => $this->input->post('tgl', TRUE),
                'id_produk' => $this->input->post('id_produk', TRUE),
                'id_users_asal' => $this->input->post('id_users_asal', TRUE),
                'id_users_tujuan' => $this->input->post('id_users_tujuan', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE),
            );
            $this->Produk_retail_mutasi_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/produk_retail_mutasi'));
        }
    }

    public function delete($id)
    {
        $row = $this->Produk_retail_mutasi_model->get_by_id($id);
        if ($row) {
            $this->db->where('id_toko', $this->userdata->id_toko);
            $this->db->where('id_produk_2', $row->id_produk);
            $this->db->where('id_users', $row->id_users_tujuan);
            $this->db->update('produk_retail', [
                'id_users' => $row->id_users_asal,
            ]);
            $this->Produk_retail_mutasi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/produk_retail_mutasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/produk_retail_mutasi'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
        $this->form_validation->set_rules('id_produk', 'id produk', 'trim|required');
        $this->form_validation->set_rules('id_users_asal', 'id users asal', 'trim|required');
        $this->form_validation->set_rules('id_users_tujuan', 'id users tujuan', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim');
        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Produk_retail_mutasi.php */
/* Location: ./application/controllers/Produk_retail_mutasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2024-03-06 05:31:50 */
/* http://harviacode.com */
