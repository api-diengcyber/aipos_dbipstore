<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_sales extends AI_Admin {

	public function __construct()
	{
		parent::__construct();
        $this->models('Sales_order_model');
    }
    
    public function normalisasi()
    {
        $res_no_faktur = $this->db->select('no_faktur, bukan_member, valid, COUNT(no_faktur) AS c, GROUP_CONCAT(DISTINCT id_orders_2 SEPARATOR ";") AS f')
                                ->from('(SELECT * FROM orders WHERE id_orders_2 > 0) AS orders')
                                ->where('valid IS NULL')
                                ->group_by('no_faktur')
                                ->having('c > 1')
                                ->get()->result();
        foreach ($res_no_faktur as $key):
            $expf = explode(";", $key->f);
            sort($expf);
            // echo $key->no_faktur." (".$key->c.") ".$key->f."<br>";
            foreach ($expf as $key2 => $value2) :
            	if ($key2 == 0) { // tidak dihapus
                    // echo $key->no_faktur." >> ".$key->bukan_member." >> ".$value2." -- tidak dihapus <br>";
            	} else { // dihapus
                    // echo $key->no_faktur." >> ".$key->bukan_member." >> ".$value2." -- dihapus <br>";
                    //SET foreign_key_checks = 0;
                    $this->db->query('SET foreign_key_checks = 0');
                    $this->db->where('id_orders_2', $value2);
                    $this->db->delete('orders_detail');
                    $this->db->where('id_orders_2', $value2);
                    $this->db->delete('orders');
                    $this->db->query('SET foreign_key_checks = 1');
                    //SET foreign_key_checks = 1;
            	}
	        endforeach;
	        
	        $res_jurnal = $this->normalisasi_jurnal($key->no_faktur);
	        foreach ($res_jurnal as $key3 => $value3) :
            	if ($key3 == 0) { // tidak dihapus
                    // echo $value3." -- tidak dihapus <br>";
            	} else { // dihapus
                    // echo $value3." -- dihapus <br>";
                    $this->db->where('kode', $value3);
                    $this->db->delete('jurnal');
            	}
	        endforeach;
        endforeach;
    }
    
    public function normalisasi_jurnal($no_faktur)
    {
    	$res = $this->db->select('j.*')
    					->from('jurnal j')
    					->where('j.id_toko', $this->userdata->id_toko)
    					->like('j.kode', $no_faktur, 'both')
    					->group_by('j.kode')
    					->get()->result();
    	$arr = array();
    	foreach ($res as $key) :
    		$arr[] = $key->kode;
		endforeach;
		return $arr;
    }

    public function get_last_inv()
    {
        $row_last = $this->db->select('o.*')
                             ->from('orders o')
                            //  ->where('lo.id_toko', $this->userdata->id_toko)
                             ->order_by('id_orders_2', 'desc')
                             ->order_by('no_faktur', 'desc')
                             ->get()->row();
        if ($row_last) {
            return $row_last->no_faktur + 1;
        } else {
            return null;
        }
    }

	public function index($page = '')
	{
        $no_invoice = $this->input->post('no_invoice');
        $id_media = $this->input->post('id_media');
        $status = $this->input->post('status');
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');
        
        $this->normalisasi();

        /* if ($this->session->userdata('dari') != $dari || $this->session->userdata('sampai') != $sampai) {
            $page = 0;
        }

        if (!empty($dari)) {
            $array = array(
                'dari' => $dari
            );            
            $this->session->set_userdata($array);
        }
        if (!empty($sampai)) {
            $array = array(
                'sampai' => $sampai
            );            
            $this->session->set_userdata($array);
        }

        if (empty($dari)) {
            $dari = date('d-m-Y', strtotime('-1 day'));
        }
        if (empty($sampai)) {
            $sampai = date('d-m-Y');
        }

        if (!empty($this->session->userdata('dari'))) {
            $dari = $this->session->userdata('dari');
        }

        if (!empty($this->session->userdata('sampai'))) {
            $sampai = $this->session->userdata('sampai');
        }
 */
        // validasi data //
        $res_no_faktur = $this->db->select('no_faktur, COUNT(no_faktur) AS c, GROUP_CONCAT(DISTINCT id_orders_2 SEPARATOR ";") AS f')
                                ->from('orders')
                                ->where('status', 1)
                                ->group_by('no_faktur')
                                ->having('c > 1')
                                ->get()->result();
        foreach ($res_no_faktur as $key):
            $expf = explode(";", $key->f);
            sort($expf);

            foreach ($expf as $key2 => $value2):
                if ($key2 > 0) { // update
                    $new_inv = $this->get_last_inv();
                    // echo $this->get_last_inv()." > ".$value2."<br>";
                    $data_update = array(
                        'no_faktur' => $new_inv,
                    );
                    $this->db->where('id_orders_2', $value2);
                    $this->db->where('status', 1);
                    $this->db->update('orders', $data_update);
                } else {
                    // echo $key->no_invoice." > ".$value2."<br>";
                }
            endforeach;

        endforeach;
        
        $row_no_faktur = $this->db->select('no_faktur, COUNT(no_faktur) AS c, GROUP_CONCAT(DISTINCT id_orders_2 SEPARATOR ";") AS f')
                        ->from('orders')
                        ->where('status', 1)
                        ->group_by('no_faktur')
                        ->having('c > 1')
                        ->get()->row();

        // data order
        $params = [
            'status'=>$status,
            'dari' => $dari,
            'sampai' => $sampai,
            'no_invoice' => $no_invoice,
            'id_media' => $id_media,
            'q_order' => 'DATE(CONCAT(SUBSTRING(o.tgl_order,7,4),"-",SUBSTRING(o.tgl_order,4,2),"-",SUBSTRING(o.tgl_order,1,2))) DESC'
        ];
        $pagination = ['page'=>($page) ? $page : 1,'perpage' => 200];
        $data_order = $this->Sales_order_model->get_order($params,$pagination);
        $data_order2 = $this->Sales_order_model->_get_order($params)->get()->num_rows();
        // $data_order = array();

        $this->load->library('pagination');

        $config['base_url'] = base_url('admin/order_sales/index/');
        $config['total_rows'] =  $data_order2;
        $config['use_page_numbers'] = true;
        $config['per_page'] = $pagination['perpage'];
        
        $this->pagination->initialize($config);

		$exdari = explode("-",$dari);
        // $fdari = !empty($exdari[2])?$exdari[2]:date('Y');
        // $fdari .= '-'.(!empty($exdari[1])?$exdari[1]:date('m'));

        $fdari = date('Y')."-".date('m');
        $fsampai = date('Y')."-".date('m');

		$exsampai = explode("-",$sampai);
        // $fsampai = !empty($exsampai[2])?$exsampai[2]:date('Y');
        // $fsampai .= '-'.(!empty($exsampai[1])?$exsampai[1]:date('m'));
        
        $and_where = "";
        // if (!empty($dari) && !empty($sampai)) {
            $and_where = ' AND CONCAT(SUBSTRING(tgl_order,7,4),"-",SUBSTRING(tgl_order,4,2)) BETWEEN "'.$fdari.'" AND "'.$fsampai.'"';
        // }

        $row_bukan_member = $this->db->select('LEFT(bukan_member,20), valid, COUNT(LEFT(bukan_member,20)) AS c')
                            ->from('orders')
                            ->where('valid IS NULL'.$and_where)
                            ->where('SUBSTRING(tgl_order,4,2)=', date('m'))
                            ->where('SUBSTRING(tgl_order,7,4)=', date('Y'))
                            ->group_by('LEFT(bukan_member,20)')
                            ->having('c > 1')
                            ->get()->row();

        $show_warning = false;
        if ($row_no_faktur) {
            $show_warning = true;
        }
        
	 	$data = array(
            'active_order_sales' => 'active',
            'data_order' => $data_order,
            'status' => $status,
            'exp' => $this->db->get('expedisi')->result(),
            'dari' => $dari,
            'pagination' => $this->pagination->create_links(),
            'no_invoice' => $no_invoice,
            'id_media' => $id_media,
            'sampai' => $sampai,
            'page' => $page,
            'message' => $this->session->userdata('message'),
            'show_warning' => $show_warning,
        );
        $this->view('order_sales/order_sales_list', $data);
	}
	
	public function update_expedisi($id_order,$id_expedisi,$page='')
	{
	    $this->db->where('id_orders_2',$id_order);
	    $this->db->update('orders',array('id_expedisi'=>$id_expedisi));
	    redirect(base_url('admin/order_sales/index/'.$page),'refresh');
    }
    
    public function delete_verifikasi_pembayaran($id_order, $page='')
    {
        $row = $this->db->where('id_orders_2', $id_order)->where('status', 2)->get('orders')->row();
        if ($row) {
            // $this->db->where('no_faktur', $row->no_invoice);
            // $this->db->delete('orders');
            $data_update = array(
                'status' => 1
            );
            $this->db->where('id_orders_2', $id_order);
            $this->db->update('orders', $data_update);

            // $this->db->where('SUBSTRING(kode,1,14)="VER-PEMBAYARAN"');
            $this->db->like('kode', $row->no_invoice, 'both');
            $this->db->where('(SUBSTRING(kode,1,14)="VER-PEMBAYARAN" OR SUBSTRING(kode,1,17)="VER-SALDO-TERBUKA")');
            $this->db->delete('jurnal');
        }
	    redirect(base_url('admin/order_sales/index/'.$page),'refresh');
    }

    public function konfirmasi_delete()
    {
        $id_order = $this->input->post('id_order', true);
        $password = $this->input->post('password', true);
        $row = $this->db->where('id_toko', $this->userdata->id_toko)->where('id_users', $this->userdata->id_users)->get('users')->row();
        $r = $this->Ion_auth_model->hash_password_db($this->session->userdata('user_id'), $password);
        if ($r) {
            $this->session->set_flashdata('message', 'Hapus data berhasil');
            $this->delete_orders($id_order);
        } else {
            $this->session->set_flashdata('message', 'Hapus data gagal');
            redirect(base_url('admin/order_sales'),'refresh');
        }
    }

    public function delete_orders($id_order,$page='')
    {
        $row = $this->db->where('id_orders_2', $id_order)->where('status', 3)->get('orders')->row();
        if ($row) {
            // $this->db->where('no_faktur', $row->no_invoice);
            // $this->db->delete('orders');

            $data_update = array(
                'status' => 1
            );
            $this->db->where('id_orders_2', $id_order);
            $this->db->update('orders', $data_update);

            // $this->db->where('SUBSTRING(kode,1,14)="VER-PEMBAYARAN"');
            $this->db->like('kode', $row->no_invoice, 'both');
            $this->db->where('(SUBSTRING(kode,1,14)="VER-PEMBAYARAN" OR SUBSTRING(kode,1,17)="VER-SALDO-TERBUKA")');
            $this->db->delete('jurnal');
        }
	    redirect(base_url('admin/order_sales/index/'.$page),'refresh');
    }

    public function packing($id_order)
    {
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_order_sales' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'data_order' => $this->Sales_order_model->get_order_by_id($id_order),
        );
        $this->load->view('admin/order_sales/packing', $data);
    }

    public function multi_verifikasi()
    {
        $no_resi = $this->input->post('no_resi');
        $exp = explode(PHP_EOL,$no_resi);    
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_order_sales' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'data_order' =>  $this->Sales_order_model->get_res_order_by_resi($exp),
        );
       
        $this->view('order_sales/multi_verifikasi', $data);
    }

    public function action_multi_verifikasi()
    {
        $orders = $this->input->post('orders');
        foreach ($orders as $order) {
            $this->db->where('id_orders_2', $order);
            $this->db->update('orders', ['status' => 4]);
        }
    }

    public function diterima()
	{
	   // $this->output->enable_profiler(true);
        $status = 3; // diterima
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');
        
	 	$data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_order_sales_diterima' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'data_order' => $this->Sales_order_model->get_diterima($dari,$sampai),
            'status' => $status,
            'dari' => $dari,
            'sampai' => $sampai,
        );
        
        $this->view('order_sales/order_sales_list_diterima', $data);
	}

    public function verifikasi_pembayaran($id_order, $page = '')
    {
        $data = [
            'id_order' => $id_order,
            'no_resi' => '',
        ];
        $this->Sales_order_model->verifikasi_pembayaran($data);
        redirect(site_url('admin/order_sales/index/'.$page),'refresh');
    }

    public function saldo_terbuka($id_order, $page = '')
    {
        $this->Sales_order_model->saldo_terbuka($id_order, $this->userdata->id_toko);
        redirect(site_url('admin/order_sales/index/'.$page),'refresh');
    }

    public function update($id_order,$page = '')
    {
        $row = $this->Sales_order_model->get_order_by_id($id_order);

        $harga_gc = 0;
        $qty_gc = 0;
        $harga_hs = 0;
        $qty_hs = 0;
        $res_od = $this->db->where('id_orders_2', $id_order)->get('orders_detail')->result();
        foreach ($res_od as $key) {
            if ($key->id_produk == "1") { // HS
                $harga_hs = $key->harga;
                $qty_hs = $key->jumlah;
            } else if ($key->id_produk == "2") { // GC
                $harga_gc = $key->harga;
                $qty_gc = $key->jumlah;
            }
        }

        // if ($row->bank*1 == 0 && $row->media*1 == 4) {
    	 	$data = array(
                'id_toko' => $this->userdata->id_toko,
                'nama_toko' => $this->userdata->nama_toko,
                'nama_user' => $this->userdata->email,
                'active_order_sales' => 'active',
                'id_modul' => $this->userdata->id_modul,
                'nama_modul' => $this->userdata->nama_modul,
                'action' => site_url('admin/order_sales/update_action'),
                'id_order' => set_value('id_order', $row->id_order),
                'nama' => set_value('nama', $row->nama_penerima),
                'alamat' => set_value('alamat', $row->alamat_penerima),
                'no_hp' => set_value('no_hp', $row->no_hp),
                'harga_gc' => set_value('harga_gc', $harga_gc),
                'qty_gc' => set_value('qty_gc', $qty_gc),
                'harga_hs' => set_value('harga_hs', $harga_hs),
                'qty_hs' => set_value('qty_hs', $qty_hs),
                'harga' => set_value('harga', $row->harga),
                'ongkir' => set_value('ongkir', $row->ongkir),
                'biaya_lain' => set_value('biaya_lain'),
                'nominal' => set_value('nominal', $row->nominal),
                'selisih' => set_value('selisih', $row->selisih),
                'id_status' => set_value('id_status', $row->id_status),
                'bank' => set_value('bank', $row->bank),
            );
            $this->view('order_sales/order_sales_update', $data);
        // } else {
        //     redirect('admin/order_sales','refresh');
        // }
    }

    public function update_action()
    {
        $id_order = $this->input->post('id_order', true);
        $data_update = array(
            'nama_pembeli' => $this->input->post('nama', true),
            'alamat' => $this->input->post('alamat', true),
            'no_hp' => $this->input->post('no_hp', true),
            'harga' => $this->input->post('harga', true),
            'ongkir' => $this->input->post('ongkir', true),
            'biaya_lain' => $this->input->post('biaya_lain', true),
            'nominal' => $this->input->post('nominal', true),
            'selisih' => $this->input->post('selisih', true),
            'bank' => $this->input->post('bank', true),
            
        );
        $this->db->where('id_orders_2', $id_order);
        $this->db->update('orders', $data_update);

        // HS //
        $this->db->where('id_orders_2', $id_order);
        $this->db->where('id_produk', 1);
        $row_hs = $this->db->get('orders_detail')->row();
        if ($row_hs) {
            $data_update_d = array(
                'harga_jual' => $this->input->post('harga_hs', true),
                'jumlah' => $this->input->post('qty_hs', true),
            );
            $this->db->where('id_orders_2', $id_order);
            $this->db->where('id_produk', 1);
            $this->db->update('orders_detail', $data_update_d);
        } else {
            $data_insert_d = array(
                'id_orders_2' => $id_order,
                'id_produk' => 1,
                'harga_jual' => $this->input->post('harga_hs', true),
                'jumlah' => $this->input->post('qty_hs', true),
            );
            $this->db->insert('orders_detail', $data_insert_d);
        }

        // GC //
        $this->db->where('id_orders_2', $id_order);
        $this->db->where('id_produk', 2);
        $row_gc = $this->db->get('orders_detail')->row();
        if ($row_gc) {
            $data_update_d = array(
                'harga_jual' => $this->input->post('harga_gc', true),
                'jumlah' => $this->input->post('qty_gc', true),
            );
            $this->db->where('id_orders_2', $id_order);
            $this->db->where('id_produk', 2);
            $this->db->update('orders_detail', $data_update_d);
        } else {
            $data_insert_d = array(
                'id_orders_2' => $id_order,
                'id_produk' => 2,
                'harga_jual' => $this->input->post('harga_gc', true),
                'jumlah' => $this->input->post('qty_gc', true),
            );
            $this->db->insert('orders_detail', $data_insert_d);
        }

        redirect(site_url('admin/order_sales/'),'refresh');
    }

    public function verifikasi_status($id_order,$page='')
    {
        $row = $this->Sales_order_model->get_order_by_id($id_order);
        if ($row) {
            $data_update = array(
                'status' => 3
            );
            $this->db->where('id_orders_2', $id_order);
            $this->db->update('orders', $data_update);
            
            // data tgl kirim
            $data_ov = array(
                "id_toko" => 158,
                "id_orders" => $id_order,
                "tgl_kirim" => date('Y-m-d'),
            );
            $this->db->insert('orders_verifikasi', $data_ov);
        }
        redirect(site_url('admin/order_sales/'),'refresh');
    }

    public function delete($id_order,$page = '')
    {
        $this->Sales_order_model->delete($id_order);
        redirect(site_url('admin/order_sales/index/'.$page),'refresh');
    }

    public function laporan_order()
    {
        $res = $this->db->select('o.*')
                        ->from('orders o')
                        // ->where('LEFT(o.tanggal,10)=', '2020-01-21')
                        ->order_by('o.no_faktur', 'asc')
                        ->order_by('o.bukan_member', 'asc')
                        ->get()->result();
        $last_inv = '';
        foreach ($res as $key):
            $color = '#000';
            if ($last_inv == $key->no_invoice) {
                $color = '#f00';
                echo '<div style="color:'.$color.';">'.$key->no_invoice." >> ".$key->nama_pembeli.'</div>';
                echo '<div style="color:'.$color.';">'.$key->tanggal.'</div>';
                echo "<hr>";
            }
            $last_inv = $key->no_invoice;
        endforeach;
    }

    public function orders()
    {
        $res = $this->db->query('SELECT o.no_faktur, o.tgl_order, o.bukan_member, COUNT(o.no_faktur) AS c FROM orders o WHERE SUBSTRING(o.tgl_order,4,2)="01" AND SUBSTRING(o.tgl_order,7,4)="2020" GROUP BY o.no_faktur HAVING c > 1')->result();
        foreach ($res as $key):
            $res_orders = $this->db->select('o.*')
                                   ->from('orders o')
                                   ->where('o.no_faktur', $key->no_faktur)
                                   ->get()->result();
            $last_same = '';
            foreach ($res_orders as $key_orders) {
                $p = $key_orders->no_faktur.";".$key_orders->tgl_order.";".$key_orders->bukan_member;
                $color = '#000';
                $delete = false;
                if ($last_same == $p) {
                    $color = '#f00';
                    $delete = true;
                }
                echo "<div style='color:".$color.";'>".$key_orders->id_orders." > " .$key_orders->id_orders_2." > ".$key_orders->no_faktur." :: ".$key_orders->tgl_order." :: ".$key_orders->bukan_member." :: </div>";
                echo "<hr>";
                if ($delete) {
                    $this->db->where('id_orders_2', $key_orders->id_orders_2);
                    $this->db->delete('orders');
                    $this->db->where('id_orders_2', $key_orders->id_orders_2);
                    $this->db->delete('orders_detail');
                }
                $last_same = $p;
            }
        endforeach;
    }

}

/* End of file Order_sales.php */
/* Location: ./application/controllers/admin/Order_sales.php */