<?php

if (!defined('BASEPATH'))
    exit ('No direct script access allowed');

class Service_order2 extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // $this->load->model('Tampilan_restaurant_model');
        // $this->load->model('Pembelian_model');
        // $this->load->model('Bahan_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    private function _to_numbers($text_number = '')
    {
        $text_number = str_replace('.', '', $text_number);
        $text_number = str_replace(',', '.', $text_number);
        return (double) $text_number * 1;
    }

    private function _to_string_format($number = '')
    {
        $number = str_replace('.', ',', $number);
        return (string) $number;
    }

    public function index()
    {
        $active = array('active_pembelian' => 'active');
        // $data_login = $this->Tampilan_restaurant_model->cek_login();
        // $this->Tampilan_restaurant_model->admin();
        // $this->Tampilan_restaurant_model->trial_expired();
        // $this->Tampilan_restaurant_model->tampilan($active, 'pembelian/pembelian_list');
    }

    public function json()
    {
        header('Content-Type: application/json');
        // $data_login = $this->Tampilan_restaurant_model->cek_login();
        // echo $this->Pembelian_model->json($this->userdata->id_toko);
    }

    public function read($id)
    {

        $active = array('active_pembelian' => 'active');
        // $data_login = $this->Tampilan_restaurant_model->cek_login();
        // $this->Tampilan_restaurant_model->admin();
        // $this->Tampilan_restaurant_model->trial_expired();
        // $row = $this->Pembelian_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'id_faktur' => $row->no_faktur,
                'dp' => $row->dp,
                'kurang' => $row->kurang,
                'pembayaran' => $row->pembayaran,
                'total_bayar' => $row->total_bayar,
                'id_toko' => $this->userdata->id_toko,
            );
            // $this->Tampilan_restaurant_model->tampilan($active, 'pembelian/pembelian_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/pembelian'));
        }
    }

    private function _get_faktur()
    {
        // $data_login = $this->Tampilan_restaurant_model->cek_login();
        $row_last_pembelian = $this->db->where('id_toko', $this->userdata->id_toko)->order_by('id_pembelian', 'desc')->get('pembelian')->row();
        $id_pembelian_baru = 1;
        if ($row_last_pembelian) {
            $id_pembelian_baru = $row_last_pembelian->id_pembelian + 1;
        }
        return "FB" . sprintf("%06d", $id_pembelian_baru);
    }

    public function ajax_bahan_term()
    {
        header('Content-Type: application/json');
        // $data_login = $this->Tampilan_restaurant_model->cek_login();
        $term = $this->input->post('term', true);
        $res = $this->db->select('b.id_bahan AS value, b.kode, b.nama AS label, s.satuan')
            ->from('bahan b')
            ->join('satuan s', 'b.id_satuan=s.id_satuan AND s.id_toko="' . $this->userdata->id_toko . '"')
            ->where('b.id_toko', $this->userdata->id_toko)
            ->like('b.nama', $term, 'both')
            ->order_by('b.nama', 'asc')
            ->limit(100)
            ->get()->result();
        echo json_encode($res);
    }

    public function ajax_submit_bahan()
    {
        header('Content-Type: application/json');
        // $data_login = $this->Tampilan_restaurant_model->cek_login();
        $data = array();
        $id_bahan = $this->input->post('id_bahan', true);
        $id_pembelian = $this->input->post('id_pembelian', true);
        $row_bahan = $this->db->select('b.*, s.satuan')
            ->from('bahan b')
            ->join('satuan s', 'b.id_satuan=s.id_satuan AND s.id_toko="' . $this->userdata->id_toko . '"')
            ->where('b.id_toko', $this->userdata->id_toko)
            ->where('b.id_bahan', $id_bahan)
            ->get()->row();
        if ($row_bahan) {
            $data['status'] = 'ok';
            $data['data'] = array();
            $data['data']['id_bahan'] = $id_bahan;
            $data['data']['nama'] = $row_bahan->nama;
            $data['data']['satuan'] = $row_bahan->satuan;
            $where_temp = "id_pembelian IS NULL";
            if (!empty ($id_pembelian)) {
                $where_temp = "id_pembelian='" . $id_pembelian . "'";
            }
            $row_temp = $this->db->where('id_toko', $this->userdata->id_toko)->where('id_user', $data_login['id_user'])->where('id_bahan', $id_bahan)->where($where_temp)->get('pembelian_temp')->row();
            if ($row_temp) {
                $data['action'] = 'update';
                $jumlah_baru = $row_temp->jumlah + 1;
                $total_harga = $row_temp->harga_satuan * $jumlah_baru;
                $pot = $row_temp->diskon > 0 ? ($row_temp->diskon / 100) * $total_harga : 0;
                $subtotal = $total_harga - $pot;
                $data_update = array(
                    'jumlah' => $jumlah_baru,
                    'total_harga' => $total_harga,
                    'pot' => $pot,
                    'subtotal' => $subtotal,
                );
                $data['data']['tgl_masuk'] = $row_temp->tgl_masuk;
                $data['data']['tgl_expire'] = $row_temp->tgl_expire;
                $data['data']['harga_satuan'] = $row_temp->harga_satuan;
                $data['data']['jumlah'] = $jumlah_baru;
                $data['data']['total_harga'] = $total_harga;
                $data['data']['diskon'] = $row_temp->diskon;
                $data['data']['pot'] = $pot;
                $data['data']['subtotal'] = $subtotal;
                $this->db->where('id_user', $data_login['id_user']);
                $this->db->where('id_toko', $this->userdata->id_toko);
                $this->db->where('id_bahan', $id_bahan);
                if (!empty ($id_pembelian)) {
                    $this->db->where('id_pembelian', $id_pembelian);
                } else {
                    $this->db->where('id_pembelian IS NULL');
                }
                $this->db->update('pembelian_temp', $data_update);
            } else {
                $data['action'] = 'insert';
                $data['data']['tgl_masuk'] = date('d-m-Y');
                $data['data']['tgl_expire'] = date('t-m-Y');
                $data['data']['harga_satuan'] = 0;
                $data['data']['jumlah'] = 1;
                $data['data']['total_harga'] = 0;
                $data['data']['diskon'] = 0;
                $data['data']['pot'] = 0;
                $data['data']['subtotal'] = 0;
                $data_insert = array(
                    'id_user' => $data_login['id_user'],
                    'id_toko' => $this->userdata->id_toko,
                    'id_bahan' => $id_bahan,
                    'tgl_masuk' => $data['data']['tgl_masuk'],
                    'tgl_expire' => $data['data']['tgl_expire'],
                    'harga_satuan' => $data['data']['harga_satuan'],
                    'jumlah' => $data['data']['jumlah'],
                    'total_harga' => $data['data']['total_harga'],
                    'diskon' => $data['data']['diskon'],
                    'pot' => $data['data']['pot'],
                    'subtotal' => $data['data']['subtotal'],
                );
                if (!empty ($id_pembelian)) {
                    $data_insert['id_pembelian'] = $id_pembelian;
                }
                $this->db->insert('pembelian_temp', $data_insert);
            }
        } else {
            $data['status'] = 'error';
        }
        echo json_encode($data);
    }

    public function ajax_update_temp()
    {
        header('Content-Type: application/json');
        // $data_login = $this->Tampilan_restaurant_model->cek_login();
        $data = array();
        $name = $this->input->post('name', true);
        $id_bahan = $this->input->post('uid', true);
        $value = $this->input->post('value', true);
        $id_pembelian = $this->input->post('id_pembelian', true);
        $where_temp = "id_pembelian IS NULL";
        if (!empty ($id_pembelian)) {
            $where_temp = "id_pembelian='" . $id_pembelian . "'";
        }
        $row_temp = $this->db->where('id_toko', $this->userdata->id_toko)->where('id_user', $data_login['id_user'])->where('id_bahan', $id_bahan)->where($where_temp)->get('pembelian_temp')->row();
        if ($row_temp) {
            $data['status'] = 'ok';
            $data['id_bahan'] = $id_bahan;
            $data['data'] = array();
            $data_update = array();
            $data_update[$name] = $value;
            $data['data'][$name] = $value;
            $total_harga = $row_temp->harga_satuan * $row_temp->jumlah;
            $pot = $row_temp->diskon > 0 ? ($row_temp->diskon / 100) * $total_harga : 0;
            $subtotal = $total_harga - $pot;
            if ($name == "jumlah") {
                $total_harga = $row_temp->harga_satuan * $value;
                if ($row_temp->stok_used == "1") {
                    $stok = $row_temp->stok + ($value - $row_temp->jumlah);
                    $data_update["stok"] = $stok;
                } else {
                    $stok = $value;
                    $data_update["stok"] = $value;
                }
                $data['data']["stok"] = $stok;
            } else if ($name == "harga_satuan") {
                $total_harga = $row_temp->jumlah * $value;
            } else if ($name == "diskon") {
                $pot = $value > 0 ? ($value / 100) * $total_harga : 0;
            }
            $subtotal = $total_harga - $pot;
            $data_update["total_harga"] = $total_harga;
            $data['data']["total_harga"] = $total_harga;
            $data_update["pot"] = $pot;
            $data['data']["pot"] = $pot;
            $data_update["subtotal"] = $subtotal;
            $data['data']["subtotal"] = $subtotal;
            $this->db->where('id_user', $data_login['id_user']);
            $this->db->where('id_toko', $this->userdata->id_toko);
            $this->db->where('id_bahan', $id_bahan);
            if (!empty ($id_pembelian)) {
                $this->db->where('id_pembelian', $id_pembelian);
            } else {
                $this->db->where('id_pembelian IS NULL');
            }
            $this->db->update('pembelian_temp', $data_update);
        } else {
            $data['status'] = 'error';
        }
        echo json_encode($data);
    }

    public function delete_temp($id)
    {
        // $data_login = $this->Tampilan_restaurant_model->cek_login();


        // Cek metode HTTP yang digunakan
        if ($this->input->method() == 'delete') {
            // Lakukan penghapusan data berdasarkan ID
            $this->db->where('id_bahan', $id);
            $this->db->where('id_user', $data_login['id_user']);
            $this->db->where('id_toko', $this->userdata->id_toko);
            $delete = $this->db->delete('pembelian_temp');  // Ganti 'nama_tabel' dengan nama tabel sesuai kebutuhan

            // Siapkan data untuk dikirim sebagai JSON
            $data = array();

            if ($delete) {
                $data['success'] = true;
                $data['message'] = 'Berhasil menghapus data.' . $id;
            } else {
                $data['success'] = false;
                $data['message'] = 'Gagal menghapus data.';
            }

            echo json_encode($data);
        } else {
            // Tanggapi jika metode HTTP bukan DELETE
            show_404(); // Atau tanggapi sesuai kebutuhan Anda
        }
    }
    public function ajax_submit()
    {
        header('Content-Type: application/json');
        // $data_login = $this->Tampilan_restaurant_model->cek_login();
        $data = array();
        $tgl = $this->input->post('tgl', true);
        $total_harga = $this->_to_numbers($this->input->post('total_harga', true));
        $diskon = $this->_to_numbers($this->input->post('diskon', true));
        $pot = $this->_to_numbers($this->input->post('pot', true));
        $total_bayar = $this->_to_numbers($this->input->post('total_bayar', true));
        $pembayaran = $this->input->post('pembayaran', true);
        $dp = $this->_to_numbers($this->input->post('dp', true));
        $kurang = $this->_to_numbers($this->input->post('kurang', true));
        $ket = $this->input->post('ket', true);
        $id_pembelian = $this->input->post('id_pembelian', true);
        $where_temp = "id_pembelian IS NULL";
        if (!empty ($id_pembelian)) {
            $where_temp = "id_pembelian='" . $id_pembelian . "'";
        }
        if ($pembayaran == "1") {
            $kurang = 0;
        }
        $row_temp = $this->db->where('id_toko', $this->userdata->id_toko)->where('id_user', $data_login['id_user'])->where($where_temp)->get('pembelian_temp')->row();
        if ($row_temp) {
            $data['status'] = 'ok';
            $id_pembelian_baru = 1;
            $row_last_pembelian = $this->db->where('id_toko', $this->userdata->id_toko)->order_by('id_pembelian', 'desc')->get('pembelian')->row();
            if ($row_last_pembelian) {
                $id_pembelian_baru = $row_last_pembelian->id_pembelian + 1;
            }
            $row_total_harga_asli = $this->db->query("SELECT SUM(total_harga) AS total_harga_asli FROM pembelian_temp WHERE id_toko='" . $this->userdata->id_toko . "' AND id_user='" . $data_login['id_user'] . "' AND " . $where_temp)->row();
            $total_harga_asli = 0;
            if ($row_total_harga_asli) {
                $total_harga_asli = $row_total_harga_asli->total_harga_asli;
            }
            $select_temp = '"' . $id_pembelian_baru . '" AS id_pembelian';
            if (!empty ($id_pembelian)) {
                $select_temp = "id_pembelian";
                $this->db->where('id_user', $data_login['id_user']);
                $this->db->where('id_toko', $this->userdata->id_toko);
                $this->db->where('id_pembelian', $id_pembelian);
                $this->db->delete('pembelian_detail');
            }
            $this->db->query("INSERT INTO pembelian_detail(id_pembelian, id_user, id_toko, id_bahan, tgl_masuk, tgl_expire, harga_satuan, jumlah, total_harga, diskon, pot, subtotal, stok, stok_used) SELECT " . $select_temp . ", id_user, id_toko, id_bahan, tgl_masuk, tgl_expire, harga_satuan, jumlah, total_harga, diskon, pot, subtotal, stok, stok_used FROM pembelian_temp WHERE id_toko='" . $this->userdata->id_toko . "' AND id_user='" . $data_login['id_user'] . "' AND " . $where_temp);
            $this->db->where('id_user', $data_login['id_user']);
            $this->db->where('id_toko', $this->userdata->id_toko);
            if (!empty ($id_pembelian)) {
                $this->db->where('id_pembelian', $id_pembelian);
            } else {
                $this->db->where('id_pembelian IS NULL');
            }
            $this->db->delete('pembelian_temp');
            if (!empty ($id_pembelian)) {
                $data_update = array(
                    'tgl' => $tgl,
                    'pembayaran' => $pembayaran,
                    'dp' => $dp,
                    'total_harga_asli' => $total_harga_asli,
                    'total_harga' => $total_harga,
                    'diskon' => $diskon,
                    'pot' => $pot,
                    'total_bayar' => $total_bayar,
                    'kurang' => $kurang,
                    'ket' => $ket,
                );
                $this->db->where('id_user', $data_login['id_user']);
                $this->db->where('id_toko', $this->userdata->id_toko);
                $this->db->where('id_pembelian', $id_pembelian);
                $this->db->update('pembelian', $data_update);
            } else {
                $data_insert = array(
                    'id_pembelian' => $id_pembelian_baru,
                    'id_toko' => $this->userdata->id_toko,
                    'id_user' => $data_login['id_user'],
                    'no_faktur' => $this->_get_faktur(),
                    'tgl' => $tgl,
                    'pembayaran' => $pembayaran,
                    'dp' => $dp,
                    'total_harga_asli' => $total_harga_asli,
                    'total_harga' => $total_harga,
                    'diskon' => $diskon,
                    'pot' => $pot,
                    'total_bayar' => $total_bayar,
                    'kurang' => $kurang,
                    'ket' => $ket,
                );
                $this->db->insert('pembelian', $data_insert);
            }
        } else {
            $data['status'] = 'error';
        }
        echo json_encode($data);
    }

    public function create()
    {
        $active = array('active_pembelian' => 'active');
        // $data_login = $this->Tampilan_restaurant_model->cek_login();
        // $this->Tampilan_restaurant_model->admin();
        // $this->Tampilan_restaurant_model->trial_expired();
        $res_temp = $this->db->select('pt.id_bahan, b.nama, b.id_satuan, pt.tgl_masuk, pt.tgl_expire, pt.harga_satuan, pt.jumlah, pt.total_harga, pt.diskon, pt.pot, pt.subtotal, pt.stok, pt.stok_used, s.satuan')
            ->from('pembelian_temp pt')
            ->join('bahan b', 'pt.id_bahan=b.id_bahan AND b.id_toko="' . $this->userdata->id_toko . '"')
            ->join('satuan s', 'b.id_satuan=s.id_satuan AND s.id_toko="' . $this->userdata->id_toko . '"')
            ->where('pt.id_toko', $this->userdata->id_toko)
            ->where('pt.id_user', $data_login['id_user'])
            ->where('pt.id_pembelian IS NULL')
            ->get()->result();
        $data = array(
            'heading' => 'Pembelian',
            'action' => site_url('admin/pembelian/ajax_submit'),
            'action_bahan_term' => site_url('admin/pembelian/ajax_bahan_term'),
            'action_submit_bahan' => site_url('admin/pembelian/ajax_submit_bahan'),
            'action_update' => site_url('admin/pembelian/ajax_update_temp'),
            'id' => set_value('id'),
            'no_faktur' => set_value('no_faktur', $this->_get_faktur()),
            'tgl' => set_value('tgl', date('d-m-Y')),
            'pembayaran' => set_value('pembayaran'),
            'dp' => set_value('dp'),
            'total_harga' => set_value('total_harga'),
            'diskon' => set_value('diskon'),
            'pot' => set_value('pot'),
            'total_bayar' => set_value('total_bayar'),
            'kurang' => set_value('kurang'),
            'ket' => set_value('ket'),
            'data_temp' => $res_temp,
            'active_service_order' => 'active',
        );
        $this->Tampilan_restaurant_model->tampilan($active, 'order_service2/pembelian_form', $data);
        $this->rview('service_order2/service_order_form', $data);
    }

    public function update($id)
    {
        $active = array('active_pembelian' => 'active');
        // $data_login = $this->Tampilan_restaurant_model->cek_login();
        // $this->Tampilan_restaurant_model->admin();
        // $this->Tampilan_restaurant_model->trial_expired();
        // $row = $this->Pembelian_model->get_by_id($id);
        if ($row) {
            $this->db->where('id_user', $data_login['id_user']);
            $this->db->where('id_toko', $this->userdata->id_toko);
            $this->db->where('id_pembelian', $row->id_pembelian);
            $this->db->delete('pembelian_temp');
            $this->db->query("INSERT INTO pembelian_temp(id_pembelian, id_user, id_toko, id_bahan, tgl_masuk, tgl_expire, harga_satuan, jumlah, total_harga, diskon, pot, subtotal, stok, stok_used) SELECT id_pembelian, id_user, id_toko, id_bahan, tgl_masuk, tgl_expire, harga_satuan, jumlah, total_harga, diskon, pot, subtotal, stok, stok_used FROM pembelian_detail WHERE id_toko='" . $this->userdata->id_toko . "' AND id_user='" . $data_login['id_user'] . "' AND id_pembelian='" . $row->id_pembelian . "'");
            $res_temp = $this->db->select('pt.id_bahan, b.nama, b.id_satuan, pt.tgl_masuk, pt.tgl_expire, pt.harga_satuan, pt.jumlah, pt.total_harga, pt.diskon, pt.pot, pt.subtotal, pt.stok, pt.stok_used, s.satuan')
                ->from('pembelian_temp pt')
                ->join('bahan b', 'pt.id_bahan=b.id_bahan AND b.id_toko="' . $this->userdata->id_toko . '"')
                ->join('satuan s', 'b.id_satuan=s.id_satuan AND s.id_toko="' . $this->userdata->id_toko . '"')
                ->where('pt.id_toko', $this->userdata->id_toko)
                ->where('pt.id_user', $data_login['id_user'])
                ->where('pt.id_pembelian', $row->id_pembelian)
                ->get()->result();
            $data = array(
                'heading' => 'Edit Pembelian',
                'action' => site_url('admin/pembelian/ajax_submit'),
                'action_bahan_term' => site_url('admin/pembelian/ajax_bahan_term'),
                'action_submit_bahan' => site_url('admin/pembelian/ajax_submit_bahan'),
                'action_update' => site_url('admin/pembelian/ajax_update_temp'),
                'id' => set_value('id', $row->id),
                'id_pembelian' => set_value('id', $row->id_pembelian),
                'no_faktur' => set_value('no_faktur', $row->no_faktur),
                'tgl' => set_value('tgl', $row->tgl),
                'pembayaran' => set_value('pembayaran', $row->pembayaran),
                'dp' => set_value('dp', $this->_to_string_format($row->dp)),
                'total_harga' => set_value('total_harga', $this->_to_string_format($row->total_harga)),
                'diskon' => set_value('diskon', $this->_to_string_format($row->diskon)),
                'pot' => set_value('pot', $this->_to_string_format($row->pot)),
                'total_bayar' => set_value('total_bayar', $this->_to_string_format($row->total_bayar)),
                'kurang' => set_value('kurang', $this->_to_string_format($row->kurang)),
                'ket' => set_value('ket', $row->ket),
                'data_temp' => $res_temp
            );
            // $this->Tampilan_restaurant_model->tampilan($active, 'pembelian/pembelian_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/pembelian'));
        }
    }

    public function delete($id)
    {
        // $row = $this->Pembelian_model->get_by_id($id);
        if ($row) {
            $this->db->where('id_pembelian', $row->id_pembelian);
            $this->db->delete('pembelian_temp');
            $this->db->where('id_pembelian', $row->id_pembelian);
            $this->db->delete('pembelian_detail');
            // $this->Pembelian_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/pembelian'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/pembelian'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_produk', 'id produk', 'trim|required');
        $this->form_validation->set_rules('tgl_masuk', 'tgl masuk', 'trim|required');
        $this->form_validation->set_rules('tgl_expire', 'tgl expire', 'trim|required');
        $this->form_validation->set_rules('pembayaran', 'pembayaran', 'trim|required');
        $this->form_validation->set_rules('harga_satuan', 'harga satuan', 'trim|required|numeric');
        $this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');
        $this->form_validation->set_rules('total_bayar', 'total bayar', 'trim|required|numeric');
        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Admin/Pembelian.php */
/* Location: ./application/controllers/Admin/Pembelian.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-02-07 07:39:45 */
/* http://harviacode.com */