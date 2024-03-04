<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Member_retail extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
	    $this->load->library('datatables');
        $this->load->model('Member_retail_model');
        $this->load->model('Produk_retail_model');
        $this->load->model('Login_model');
        $this->load->library('view');
        $this->Login_model->is_manager();
        $this->userdata = $this->Login_model->get_data();
    }
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Member_retail_model->json($this->userdata->id_toko);
    }

    private function _generate_code()
    {
        $res_member = $this->db->where('id_toko', $this->userdata->id_toko)->get('member')->result();
        $c = (count($res_member)*1) + 1;
        return date('Ymd').$this->userdata->id_toko.$this->userdata->id_cabang.$this->userdata->id_users.$c;
    }

    public function index()
    {
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_pelanggan' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
        );
        $this->view->render_manager('member/member_list', $data);
    }

    public function json_input_sales_temp()
    {
        header('Content-Type: application/json');
        $id_produk_2 = $this->input->post('id_produk_2', true);
        $id_member = $this->input->post('id_member', true);
        $qty = $this->input->post('qty', true);
        $row = $this->Produk_retail_model->get_by_id($id_produk_2, $this->userdata->id_toko);
        $data = array();
        if ($row) {
            $row_cek = $this->db->select('*')
                                ->from('orders_sales_temp')
                                ->where('id_toko', $this->userdata->id_toko)
                                ->where('id_member', $id_member)
                                ->where('id_users', $this->userdata->id_users)
                                ->where('id_produk', $row->id_produk_2)
                                ->where('acc_sales', 0)
                                ->get()->row();

            $row_produk = $this->db->select('pr.*, sp.satuan AS satuan_produk, SUM(stok.stok) AS stok')
                                    ->from('produk_retail pr')
                                    ->join('users u', 'pr.id_users=u.id_users AND pr.id_toko=u.id_toko')
                                    ->join('pembelian p', 'pr.id_produk_2=p.id_produk AND p.id_users=u.id_users AND pr.id_toko=p.id_toko')
                                    ->join('stok_produk stok', 'pr.id_produk_2=stok.id_produk AND stok.id_pembelian=p.id_pembelian AND stok.id_toko=pr.id_toko', 'left')
                                    ->join('satuan_produk sp', 'pr.satuan=sp.id_satuan AND sp.id_users=u.id_users AND sp.id_toko=pr.id_toko', 'left')
                                    ->where('pr.id_toko', $this->userdata->id_toko)
                                    ->where('u.id_cabang', $this->userdata->id_cabang)
                                    ->where('pr.id_produk_2', $id_produk_2)
                                    ->group_by('stok.id_produk')
                                    ->get()->row();
            $stok = 0;
            if ($row_produk) {
                $stok = $row_produk->stok*1;
            }
            if ($row_cek) {
                $input_stok = $row_cek->jumlah+1;
                if (!empty($qty)) {
                    $input_stok = $qty;
                }
                if ($stok >= $input_stok) {
                    $data_update = array(
                        'tgl' => date('d-m-Y'),
                        'jumlah' => $input_stok
                    );
                    $this->db->where('id', $row_cek->id);
                    $this->db->update('orders_sales_temp', $data_update);
                    $data['status'] = 1;
                    $data['msg'] = 'Order tersimpan';
                    if (!empty($qty)) {
                        $data['msg'] = 'Update berhasil';
                    }
                } else {
                    $data['status'] = 0;
                    $data['msg'] = 'Stok produk habis';
                }
            } else {
                if ($stok > 1) {
                    $row_ost = $this->db->where('id_toko', $this->userdata->id_toko)->order_by('id_orders_temp', 'DESC')->get('orders_sales_temp')->row();
                    
                    $id_orders_temp = 1;
                    if(!empty($row_ost) && $row_ost->id_orders_temp > 1) {
                        $id_orders_temp = $row_ost->id_orders_temp+1;
                    }

                    $data_insert = array(
                        'id_orders_temp' => $id_orders_temp,
                        'tgl' => date('d-m-Y'),
                        'id_toko' => $this->userdata->id_toko,
                        'id_member' => $id_member,
                        'id_users' => $this->userdata->id_users,
                        'id_produk' => $row->id_produk_2,
                        'jumlah' => 1
                    );
                    $this->db->insert('orders_sales_temp', $data_insert);
                    $data['status'] = 1;
                    $data['msg'] = 'Order tersimpan';
                    if (!empty($qty)) {
                        $data['msg'] = 'Update berhasil';
                    }
                } else {
                    $data['status'] = 0;
                    $data['msg'] = 'Stok produk habis';
                }
            }
        }
        echo json_encode($data);
    }

    public function json_sales_temp()
    {
        header('Content-Type: application/json');
        $id_member = $this->input->post('id_member', true);
        $res_sales_temp = $this->db->select('ost.*, p.nama_produk, SUM(stok.stok) AS stok, s.satuan AS satuan_produk')
                                    ->from('orders_sales_temp ost')
                                    ->join('users u', 'ost.id_users=u.id_users AND ost.id_toko=u.id_toko')
                                    ->join('produk_retail p', 'ost.id_produk=p.id_produk_2 AND u.id_users=p.id_users AND p.id_toko='.$this->userdata->id_toko, 'left')
                                    ->join('kategori_produk k', 'p.id_kategori=k.id_kategori_2 AND u.id_users=k.id_users AND k.id_toko='.$this->userdata->id_toko, 'left')
                                    ->join('pembelian b', 'p.id_produk_2=b.id_produk AND u.id_users=b.id_users AND b.id_toko='.$this->userdata->id_toko, 'left')
                                    ->join('stok_produk stok', 'p.id_produk_2=stok.id_produk AND stok.id_pembelian=b.id_pembelian AND stok.id_toko='.$this->userdata->id_toko, 'left')
                                    ->join('satuan_produk s', 'p.satuan=s.id_satuan AND u.id_users=s.id_users AND s.id_toko='.$this->userdata->id_toko, 'left')
                                    ->where('ost.id_toko', $this->userdata->id_toko)
                                    ->where('u.id_cabang', $this->userdata->id_cabang)
                                    ->where('ost.id_member', $id_member)
                                    ->where('ost.id_users', $this->userdata->id_users)
                                    ->where('ost.acc_sales', 0)
                                    ->order_by('p.nama_produk', 'ASC')
                                    ->group_by('stok.id_produk')
                                    ->get()->result();
        echo json_encode((Object) $res_sales_temp);
    }

    public function order_sales($id_member)
    {
        $data_produk = $this->db->select('pr.*, sp.satuan AS satuan_produk, SUM(stok.stok) AS stok')
                                ->from('produk_retail pr')
                                ->join('users u', 'ost.id_users=u.id_users AND ost.id_toko=u.id_toko')
                                ->join('pembelian p', 'pr.id_produk_2=p.id_produk AND p.id_users=u.id_users AND p.id_toko=pr.id_toko')
                                ->join('stok_produk stok', 'pr.id_produk_2=stok.id_produk AND stok.id_pembelian=p.id_pembelian AND stok.id_toko=pr.id_toko', 'left')
                                ->join('satuan_produk sp', 'pr.satuan=sp.id_satuan AND sp.id_users=u.id_users AND satuan_produk.id_toko=pr.id_toko', 'left')
                                ->where('pr.id_toko', $this->userdata->id_toko)
                                ->where('u.id_cabang', $this->userdata->id_cabang)
                                ->group_by('stok.id_produk')
                                ->get()->result();
        $nama_member = "";
        $alamat_member = "";
        $data_member = $this->Member_retail_model->get_by_id($id_member);
        if ($data_member) {
            $nama_member = $data_member->nama;
            $alamat_member = $data_member->alamat;
        }
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_pelanggan' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'nama_member' => $nama_member,
            'alamat_member' => $alamat_member,
            'id_member' => $id_member,
            'data_produk' => $data_produk,
        );
        $this->view->render_manager('member/order_sales', $data);
    }

    public function order_sales_delete($id_temp)
    {
        $this->db->where('id', $id_temp);
        $this->db->where('id_toko', $this->userdata->id_toko);
        $this->db->where('id_users', $this->userdata->id_users);
        $this->db->where('acc_sales', '0');
        $this->db->delete('orders_sales_temp');
        echo "<script>history.back()</script>";
    }

    public function order_sales_action($id_member)
    {
        $data = array('
            acc_sales' => '1'
        );
        $this->db->where('id_member', $id_member);
        $this->db->where('id_toko', $this->userdata->id_toko);
        $this->db->where('id_users', $this->userdata->id_users);
        $this->db->where('acc_sales', '0');
        $this->db->update('orders_sales_temp', $data);
        redirect('manager/member_retail/order_sales_acc/'.$id_member);
    }

    public function order_sales_acc($id_member)
    {
        $res_sales_temp = $this->db->select('ost.*, p.nama_produk, SUM(stok.stok) AS stok')
                                    ->from('orders_sales_temp ost')
                                    ->join('users u', 'ost.id_users=u.id_users AND ost.id_toko=u.id_toko')
                                    ->join('produk_retail p', 'ost.id_produk=p.id_produk_2 AND p.id_users=u.id_users AND p.id_toko='.$this->userdata->id_toko, 'left')
                                    ->join('kategori_produk k', 'p.id_kategori=k.id_kategori_2 AND k.id_users=u.id_users AND k.id_toko='.$this->userdata->id_toko, 'left')
                                    ->join('pembelian b', 'p.id_produk_2=b.id_produk AND b.id_users=u.id_users AND b.id_toko='.$this->userdata->id_toko, 'left')
                                    ->join('stok_produk stok', 'p.id_produk_2=stok.id_produk AND stok.id_pembelian=b.id_pembelian AND stok.id_toko='.$this->userdata->id_toko, 'left')
                                    ->join('satuan_produk s', 'p.satuan=s.id_satuan AND s.id_users=u.id_users AND s.id_toko='.$this->userdata->id_toko, 'left')
                                    ->where('ost.id_toko', $this->userdata->id_toko)
                                    ->where('u.id_cabang', $this->userdata->id_cabang)
                                    ->where('ost.id_member', $id_member)
                                    ->where('ost.id_users', $this->userdata->id_users)
                                    ->where('ost.acc_sales', 1)
                                    ->order_by('ost.selesai', 'asc')
                                    ->order_by('ost.acc_admin', 'asc')
                                    ->order_by('ost.acc_sales', 'asc')
                                    ->order_by('ost.id_orders_temp', 'desc')
                                    ->group_by('ost.id_orders_temp')
                                    ->limit(500)
                                    ->get()->result();
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_pelanggan' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'id_member' => $id_member,
            'data_member' => $this->Member_retail_model->get_by_id($id_member),
            'data_order' => $res_sales_temp
        );
        $this->view->render_manager('member/order_sales_acc', $data);
    }

    public function read($id) 
    {
        $row = $this->Member_retail_model->get_by_id($id);
        if ($row) {
            $data_update = array(
                'acc_admin' => 0,
            );
            $this->db->where('id_toko', $this->userdata->id_toko);
            $this->db->where('acc_admin', '1');
            $this->db->where('selesai', '0');
            $this->db->update('orders_sales_temp', $data_update);
            $row_sales = $this->db->where('id_toko', $this->userdata->id_toko)->where('id_users', $row->id_sales)->where('level', '4')->get('users')->row();
            $nama_sales = " - ";
            if ($row_sales) {
                $nama_sales = $row_sales->first_name." ".$row_sales->last_name;
            }
            $data = array(
                'id_toko' => $this->userdata->id_toko,
                'nama_toko' => $this->userdata->nama_toko,
                'nama_user' => $this->userdata->email,
                'active_pelanggan' => 'active',
                'id_modul' => $this->userdata->id_modul,
                'nama_modul' => $this->userdata->nama_modul,
                'id' => $row->id_member,
                'id_toko' => $row->id_toko,
                'kode' => $row->kode,
                'nama' => $row->nama,
                'nama_sales' => $nama_sales,
                'alamat' => $row->alamat,
                'telp' => $row->telp,
                'tgl_lahir' => $row->tgl_lahir,
                'diskon' => $row->diskon,
                'data_order_sales' => $this->db->select('ost.*, p.nama_produk')
                                                ->from('orders_sales_temp ost')
                                                ->join('users u', 'ost.id_users=u.id_users AND ost.id_toko=u.id_toko')
                                                ->join('produk_retail p', 'ost.id_produk=p.id_produk_2 AND p.id_users=u.id_users AND p.id_toko=ost.id_toko')
                                                ->where('ost.id_toko', $this->userdata->id_toko)
                                                ->where('u.id_cabang', $this->userdata->id_cabang)
                                                ->where('ost.id_member', $row->id_member)
                                                ->where('ost.acc_sales', '1')
                                                ->order_by('ost.selesai', 'asc')
                                                ->order_by('ost.acc_admin', 'asc')
                                                ->order_by('ost.acc_sales', 'asc')
                                                ->order_by('ost.id_orders_temp', 'desc')
                                                ->group_by('ost.id')
                                                ->limit(500)
                                                ->get()->result()
            );
            $this->view->render_manager('member/member_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('manager/member'));
        }
    }

    public function proses_orders()
    {
        $id_member = $this->input->post('id_member', true);
        $orders_sales = $this->input->post('orders_sales', true);
        $this->db->where('id_toko', $this->userdata->id_toko);
        $this->db->where('id_users', $this->userdata->id_users);
        $this->db->delete('orders_temp');
        foreach ($orders_sales as $key) {
            $row_orders_sales = $this->db->select('ost.*')
                                         ->from('orders_sales_temp ost')
                                         ->join('users u', 'ost.id_users=u.id_users AND ost.id_toko=u.id_toko')
                                         ->where('ost.id_toko', $this->userdata->id_toko)
                                         ->where('u.id_cabang', $this->userdata->id_cabang)
                                         ->where('ost.acc_sales', '1')
                                         ->where('ost.id_orders_temp', $key)
                                         ->get()->row();
            if ($row_orders_sales) {
                $data_insert = array(
                    'id_orders_sales' => $row_orders_sales->id_orders_temp,
                    'id_toko' => $this->userdata->id_toko,
                    'id_users' => $this->userdata->id_users,
                    'id_produk' => $row_orders_sales->id_produk,
                    'jumlah' => $row_orders_sales->jumlah,
                );
                $this->db->insert('orders_temp', $data_insert);
                $data_update = array('acc_admin' => '1');
                $this->db->where('id_orders_temp', $row_orders_sales->id_orders_temp);
                $this->db->update('orders_sales_temp', $data_update);
            }
        }
        //$this->client_send_ost();
        redirect('manager/penjualan_retail/create?id_member='.$id_member);
    }

    public function create() 
    {
        $res_sales = $this->db->select('*')
                              ->from('users')
                              ->where('level', '4')
                              ->where('id_toko', $this->userdata->id_toko)
                              ->where('id_cabang', $this->userdata->id_cabang)
                              ->order_by('first_name', 'asc')
                              ->get()->result();
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_pelanggan' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'button' => 'Tambah',
            'action' => site_url('manager/member_retail/create_action'),
            'id' => set_value('id'),
            'id_toko' => $this->userdata->id_toko,
            'id_sales' => set_value('id_sales'),
            'kode' => set_value('kode', $this->_generate_code()),
            'nama' => set_value('nama'),
            'alamat' => set_value('alamat'),
            'telp' => set_value('telp'),
            'id_pil_harga' => set_value('id_pil_harga'),
            'diskon' => set_value('diskon'),
            'pkp' => set_value('pkp'),
            'persen_pajak' => set_value('persen_pajak'),
            'id_kota' => set_value('id_kota'),
            'data_sales' => $res_sales,
            'data_kota' => $this->db->get('kota')->result(),
        );
        $this->view->render_manager('member/member_form', $data);
    }
    
    public function create_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $row_last_member = $this->db->select('id_member')
                                        ->from('member')
                                        ->where('id_toko', $this->userdata->id_toko)
                                        ->order_by('id_member', 'desc')
                                        ->get()->row();
            $id_member = 1;
            if ($row_last_member) {
                $id_member = $row_last_member->id_member+1;
            }
            $data = array(
                'id_member' => $id_member,
                'id_toko' => $this->userdata->id_toko,
                'id_users' => $this->userdata->id_users,
                'id_sales' => $this->input->post('id_sales',TRUE),
                'kode' => $this->input->post('kode',TRUE).$this->input->post('custom_kode',TRUE),
                'nama' => $this->input->post('nama',TRUE),
                'alamat' => $this->input->post('alamat',TRUE),
                'telp' => $this->input->post('telp',TRUE),
                // 'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
                'diskon' => $this->input->post('diskon',TRUE),
                'pkp' => $this->input->post('pkp',TRUE),
                'id_kota' => $this->input->post('id_kota',TRUE),
                'id_pil_harga' => $this->input->post('id_pil_harga',TRUE),
        		'persen_pajak' => $this->input->post('persen_pajak',TRUE),
    	    );
            $this->Member_retail_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('manager/member_retail'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Member_retail_model->get_by_id($id);
        $res_sales = $this->db->select('*')
                              ->from('users')
                              ->where('level', '4')
                              ->where('id_cabang', $this->userdata->id_cabang)
                              ->where('id_toko', $this->userdata->id_toko)
                              ->order_by('first_name', 'asc')
                              ->get()->result();
        if ($row) {
            $data = array(
                'id_toko' => $this->userdata->id_toko,
                'nama_toko' => $this->userdata->nama_toko,
                'nama_user' => $this->userdata->email,
                'active_pelanggan' => 'active',
                'id_modul' => $this->userdata->id_modul,
                'nama_modul' => $this->userdata->nama_modul,
                'button' => 'Simpan',
                'action' => site_url('manager/member_retail/update_action'),
                'id' => set_value('id', $row->id_member),
                'id_toko' => set_value('id_toko', $row->id_toko),
                'id_sales' => set_value('id_sales', $row->id_sales),
                'kode' => set_value('kode', $row->kode),
                'nama' => set_value('nama', $row->nama),
                'alamat' => set_value('alamat', $row->alamat),
                'telp' => set_value('telp', $row->telp),
                // 'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
                'diskon' => set_value('diskon', $row->diskon),
                'pkp' => set_value('pkp', $row->pkp),
                'persen_pajak' => set_value('persen_pajak', $row->persen_pajak),
                'id_kota' => set_value('id_kota', $row->id_kota),
                'id_pil_harga' => set_value('id_pil_harga', $row->id_pil_harga),
                'data_sales' => $res_sales,
                'data_kota' => $this->db->get('kota')->result(),
            );
            $this->view->render_manager('member/member_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('manager/member_retail'));
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
                'id_sales' => set_value('id_sales', $row->id_sales),
        		'kode' => $this->input->post('kode', TRUE),
        		'nama' => $this->input->post('nama', TRUE),
        		'alamat' => $this->input->post('alamat', TRUE),
        		'telp' => $this->input->post('telp', TRUE),
        		// 'tgl_lahir' => $this->input->post('tgl_lahir', TRUE),
        		'diskon' => $this->input->post('diskon', TRUE),
                'pkp' => $this->input->post('pkp',TRUE),
                'persen_pajak' => $this->input->post('persen_pajak',TRUE),
                'id_kota' => $this->input->post('id_kota',TRUE),
                'id_pil_harga' => $this->input->post('id_pil_harga',TRUE),
    	    );
            $this->Member_retail_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('manager/member_retail'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Member_retail_model->get_by_id($id);
        if ($row) {
            $this->Member_retail_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('manager/member_retail'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('manager/member_retail'));
        }
    }

    public function _rules() 
    {
    	// $this->form_validation->set_rules('id_sales', 'id sales', 'trim');
    	$this->form_validation->set_rules('kode', 'kode', 'trim|required');
    	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
    	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
    	$this->form_validation->set_rules('telp', 'telp', 'trim|required');
    	// $this->form_validation->set_rules('tgl_lahir', 'tgl lahir', 'trim|required');
        $this->form_validation->set_rules('diskon', 'diskon', 'trim|required');
        $this->form_validation->set_rules('id_kota', 'id_kota', 'trim|required');
    	$this->form_validation->set_rules('id_pil_harga', 'id_pil_harga', 'trim|required');
    	$this->form_validation->set_rules('id', 'id', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "member.xls";
        $judul = "member";
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
    	xlsWriteLabel($tablehead, $kolomhead++, "Kode");
    	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
    	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
    	xlsWriteLabel($tablehead, $kolomhead++, "Telp");
    	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Lahir");
    	xlsWriteLabel($tablehead, $kolomhead++, "Diskon");

	foreach ($this->Member_retail_model->get_by_id_toko($this->userdata->id_toko) as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->id_toko);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->kode);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->telp);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_lahir);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->diskon);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=member.doc");
        $data = array(
            'member_data' => $this->Member_retail_model->get_by_id_toko($this->userdata->id_toko),
            'start' => 0
        );
        $this->load->view('manager/member/member_doc',$data);
    }

    public function kartu_pelanggan()
    {
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_kartu_pelanggan' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
        );
        $this->view->render_manager('member/member_card', $data);
    }

    public function kartu_pelanggan_action()
    {
        $data_member = array();
        $list_cetak = $this->input->post('list_cetak', true);
        $z = 0;
        for ($i=0; $i < count($list_cetak); $i++) {
            $row = $this->db->select('*')
                            ->from('member')
                            ->where('id_toko', $this->userdata->id_toko)
                            ->where('id_member', $list_cetak[$i])
                            ->get()->row();
            if ($row) {
                $data_member[$z] = $row;
                $z++;
            }
        }
        $data = array(
            'data_toko' => $this->db->where('id', $this->userdata->id_toko)->get('toko')->row(),
            'data_member' => $data_member,
        );
        $this->load->view('manager/member/cetak_member_card', $data, FALSE);
    }

    public function generating_barcode($kode)
    {
        $this->load->library('zend');
        $this->zend->load('Zend/Barcode');
        Zend_Barcode::render('code128', 'image', array('text'=>$kode,'drawText' => false), array());
    }
    public function generating_qrcode($kode)
    {
        $this->load->library('ciqrcode');
        header("Content-Type: image/png");
        $params['data'] = $kode;
        $this->ciqrcode->generate($params);
    }

    public function semua_order()
    {
        $start_periode = date('d-m-Y');
        if (!empty($this->input->post('start_periode', true))) {
            $start_periode = $this->input->post('start_periode', true);
            $array = array(
                'start_periode' => $start_periode
            );
            $this->session->set_userdata($array);
        }
        if (!empty($this->session->userdata('start_periode'))) {
            $start_periode = $this->session->userdata('start_periode');
        }
        $end_periode = date('t-m-Y');
        if (!empty($this->input->post('end_periode', true))) {
            $end_periode = $this->input->post('end_periode', true);
            $array = array(
                'end_periode' => $end_periode
            );
            $this->session->set_userdata($array);
        }
        if (!empty($this->session->userdata('end_periode'))) {
            $end_periode = $this->session->userdata('end_periode');
        }
        $exsp = explode('-', $start_periode);
        $xstart_periode = $exsp[2].'-'.$exsp[1].'-'.$exsp[0];
        $exep = explode('-', $end_periode);
        $xend_periode = $exep[2].'-'.$exep[1].'-'.$exep[0];
        $data_sales_temp = $this->db->select('ost.id, ost.id_orders_temp, ost.tgl, SUM(ost.jumlah) AS jml_qty, m.nama, m.alamat')
                                    ->from('(SELECT * FROM orders_sales_temp GROUP BY CONCAT(id_orders_temp,id_toko,id_member,id_users,id_produk,jumlah)) ost')
                                    ->join('users u', 'ost.id_users=u.id_users AND ost.id_toko=u.id_toko')
                                    ->join('member m', 'ost.id_member=m.id_member AND u.id_users=m.id_users AND m.id_toko="'.$this->userdata->id_toko.'"')
                                    ->where('ost.id_users', $this->userdata->id_users)
                                    ->where('ost.id_toko', $this->userdata->id_toko)
                                    ->where('u.id_cabang', $this->userdata->id_cabang)
                                    ->where('ost.acc_sales', "1")
                                    ->where('DATE(CONCAT(SUBSTRING(ost.tgl,7,4),"-",SUBSTRING(ost.tgl,4,2),"-",SUBSTRING(ost.tgl,1,2))) BETWEEN "'.$xstart_periode.'" AND "'.$xend_periode.'"')
                                    ->order_by('DATE(CONCAT(SUBSTRING(ost.tgl,7,4),"-",SUBSTRING(ost.tgl,4,2),"-",SUBSTRING(ost.tgl,1,2))) DESC')
                                    ->order_by("ost.acc_admin", "desc")
                                    ->order_by("ost.selesai", "asc")
                                    ->order_by("ost.id_orders_temp", "asc")
                                    ->group_by("ost.id_member, ost.tgl")
                                    ->get()->result();
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_semua_order' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'start_periode' => $start_periode,
            'end_periode' => $end_periode,
            'data_sales_temp' => $data_sales_temp
        );
        $this->view->render_manager('member/semua_order', $data);
    }

    public function semua_order_detail($id)
    {
        $row_sales_temp = $this->db->select('ost.id, ost.id_orders_temp, ost.tgl, ost.id_member, SUM(ost.jumlah) AS jml_qty, m.nama, m.alamat')
                                    ->from('orders_sales_temp ost')
                                    ->join('users u', 'ost.id_users=u.id_users AND ost.id_toko=u.id_toko')
                                    ->join('member m', 'ost.id_member=m.id_member AND m.id_users=u.id_users AND m.id_toko="'.$this->userdata->id_toko.'"')
                                    ->where('ost.id_users', $this->userdata->id_users)
                                    ->where('ost.id_toko', $this->userdata->id_toko)
                                    ->where('u.id_cabang', $this->userdata->id_cabang)
                                    ->where('ost.acc_sales', "1")
                                    ->where('ost.id', $id)
                                    ->get()->row();
        if (!$row_sales_temp) {
            redirect('manager/member_retail/semua_order', 'refresh');
        }
        $jenis = 0;
        if (!empty($this->input->post('jenis', true))) {
            $jenis = $this->input->post('jenis', true);
        }
        $where = 'ost.id_orders_temp > 0';
        if ($jenis=="1") {
            $where = 'ost.acc_admin = 0';
        } else if ($jenis=="2") {
            $where = 'ost.acc_admin = 1 AND ost.selesai = 0';
        } else if ($jenis=="3") {
            $where = 'ost.acc_admin = 1 AND ost.selesai = 1';
        } else if ($jenis=="4") {
            $where = 'ost.acc_admin = 1 AND ost.selesai = 2';
        }
        $data_sales_temp = $this->db->select('ost.*, m.nama, pr.nama_produk, s.satuan AS satuan_produk')
                                    ->from('orders_sales_temp ost')
                                    ->join('users u', 'ost.id_users=u.id_users AND ost.id_toko=u.id_toko')
                                    ->join('member m', 'ost.id_member=m.id_member AND m.id_users=u.id_users AND m.id_toko="'.$this->userdata->id_toko.'"')
                                    ->join('produk_retail pr', 'ost.id_produk=pr.id_produk_2 AND pr.id_users=u.id_users AND pr.id_toko="'.$this->userdata->id_toko.'"')
                                    ->join('satuan_produk s', 'pr.satuan=s.id_satuan AND s.id_users=u.id_users AND s.id_toko="'.$this->userdata->id_toko.'"', 'left')
                                    ->where('ost.id_users', $this->userdata->id_users)
                                    ->where('ost.id_toko', $this->userdata->id_toko)
                                    ->where('u.id_cabang', $this->userdata->id_cabang)
                                    ->where('ost.acc_sales', "1")
                                    ->where('ost.tgl', $row_sales_temp->tgl)
                                    ->where('ost.id_member', $row_sales_temp->id_member)
                                    ->where($where)
                                    ->order_by("ost.acc_admin", "desc")
                                    ->order_by("ost.selesai", "asc")
                                    ->order_by("ost.id_orders_temp", "asc")
                                    ->group_by("CONCAT(ost.id_orders_temp,ost.id_toko,ost.id_member,ost.id_users,ost.id_produk,ost.jumlah)")
                                    ->get()->result();
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_semua_order' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'jenis' => $jenis,
            'row_sales_temp' => $row_sales_temp,
            'data_sales_temp' => $data_sales_temp
        );
        $this->view->render_manager('member/semua_order_detail', $data);
    }

}

/* End of file Member.php */
/* Location: ./application/controllers/Member.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-08-01 04:12:06 */
/* http://harviacode.com */