<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Produk_retail extends CI_Controller
{
    function __construct()
    {
        parent::__construct();   
		$this->load->library('datatables');
		$this->load->library(array('ion_auth','form_validation'));
		$this->lang->load('auth');
        $this->load->model('Produk_retail_model'); 
        $this->load->model('Stok_produk_model'); 
        $this->load->model('Satuan_produk_model');
        $this->load->model('Kategori_produk_retail_model');
        $this->load->model('Faktur_retail_model');
        $this->load->model('Pembelian_retail_model');
        $this->load->model('Login_model');
        $this->load->library('view');
        $this->Login_model->is_produksi();
        $this->userdata = $this->Login_model->get_data();
    }

    public function index()
    {
		if(!empty($this->input->get('page'))){
			$page = $this->input->get('page');
			$this->session->set_userdata(array('page'=>$page));
		}
		if(empty($this->session->userdata('page'))){
			$this->session->set_userdata(array('page'=> 10));
		}
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_produk' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
        );
        $this->view->render_produksi('produk/produk_retail_list', $data);
    }
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Produk_retail_model->json_produksi($this->userdata->id_toko);
    }

    public function read($id) 
    {
        $row = $this->Produk_retail_model->get_by_id($id, $this->userdata->id_toko);
        $row_kategori = $this->Kategori_produk_retail_model->get_by_id($row->id_kategori);
        $row_satuan = $this->Satuan_produk_model->get_by_id($row->satuan, $row->id_produk);
        $row_stok = $this->Stok_produk_model->get_total_stok_by_id_produk($row->id_produk_2,$this->userdata->id_toko);
        $stok = 0;
        if(!empty($row_stok)){
        	$stok = $row_stok->stok;
        }
        if ($row) {
	        $data = array(
	            'id_toko' => $this->userdata->id_toko,
	            'nama_toko' => $this->userdata->nama_toko,
	            'nama_user' => $this->userdata->email,
	            'active_produk' => 'active',
	            'id_modul' => $this->userdata->id_modul,
	            'nama_modul' => $this->userdata->nama_modul,
				'id_produk' => $row->id_produk_2,
				'id_toko' => $row->id_toko,
				'barcode' => $row->barcode,
				'id_kategori' => $row_kategori->nama_kategori,
				'nama_produk' => $row->nama_produk,
				'deskripsi' => $row->deskripsi,
				'harga_1' => $row->harga_1,
				'harga_2' => $row->harga_2,
				'harga_3' => $row->harga_3,
				'harga_4' => $row->harga_4,
				'harga_5' => $row->harga_5,
				'harga_6' => $row->harga_6,
				'harga_7' => $row->harga_7,
				'satuan' => !empty($row_satuan->satuan) ? $row_satuan->satuan : '',
				'berat' => $row->berat,
				'mingros' => $row->mingros,
				'diskon' => $row->diskon,
				'rak' => $row->rak,
				'gambar' => $row->gambar,
				'stok' => $stok,
				'tampil_gambar' => 'assets/gambar_produk/'.$row->gambar,
	        );
	        $this->view->render_produksi('produk/produk_retail_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produksi/retail'));
        }
    }

    function create_barcode()
    {
    	$barcode_generator = mt_rand(100000, 999999).date("is");
    	$res = $this->Produk_retail_model->get_by_barcode_all($barcode_generator, $this->userdata->id_toko);
    	if($res == 0){
			return $barcode_generator;
    	} else {
    		return "";
    	}
    }

    public function create($bar = NULL)
    {
		$barcode = $this->create_barcode();
		$this->db->select('kp.*, s.nama_supplier');
		$this->db->from('kategori_produk kp');
		$this->db->join('users u', 'kp.id_users=u.id_users AND kp.id_toko=u.id_toko');
		$this->db->join('supplier s', 'kp.id_supplier=s.id_supplier AND kp.id_toko=s.id_toko');
		$this->db->where('kp.id_toko', $this->userdata->id_toko);
        if (!empty($this->userdata->id_cabang)) {
            $this->db->where('u.id_cabang', $this->userdata->id_cabang);
        }
		$this->db->where('u.level', 2);
		$this->db->order_by('s.nama_supplier', 'asc');
		$this->db->order_by('kp.nama_kategori', 'asc');
		$data_kategori = $this->db->get();
		$this->db->select('sp.*');
		$this->db->from('satuan_produk sp');
		$this->db->join('users u', 'sp.id_users=u.id_users AND sp.id_toko=u.id_toko');
		$this->db->where('sp.id_toko', $this->userdata->id_toko);
        if (!empty($this->userdata->id_cabang)) {
            $this->db->where('u.id_cabang', $this->userdata->id_cabang);
        }
		$this->db->where('u.level', 2);
		$data_satuan = $this->db->get()->result();
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_produk' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'button' => 'Tambah',
            'action' => site_url('produksi/produk_retail/create_action'),
		    'id_produk' => set_value('id_produk'),
		    'id_toko' => $this->userdata->id_toko,
		    'barcode' => set_value('barcode', $barcode),
		    'kategori' => set_value('kategori'),
		    'nama_produk' => set_value('nama_produk'),
		    'jenis' => set_value('jenis'),
		    'deskripsi' => set_value('deskripsi'),
		    'harga_1' => set_value('harga_1'),
		    'harga_2' => set_value('harga_2'),
		    'harga_3' => set_value('harga_3'),
		    'harga_4' => set_value('harga_4'),
		    'harga_5' => set_value('harga_5'),
		    'harga_6' => set_value('harga_6'),
		    'harga_7' => set_value('harga_7'),
		    'stok' => set_value('stok'),
		    'satuan' => set_value('satuan'),
		    'berat' => set_value('berat'),
		    'mingros' => set_value('mingros'),
		    'diskon' => set_value('diskon'),
		    'rak' => set_value('rak'),
		    'stok_awal' => set_value('stok_awal'),
		    'hpp_awal' => set_value('hpp_awal'),
		    'allow_awal' => true,
		    'gambar' => set_value('gambar'),
		    'gambarlama' => set_value('gambarlama'),
		    'data_satuan' => $data_satuan,
		    'data_kategori' => $data_kategori,
        );
        $this->view->render_produksi('produk/produk_retail_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

		    // upsdatew gambar //
		    $config['upload_path'] = 'assets/gambar_produk/';
		    $config['allowed_types'] = 'gif|jpeg|png|jpg';
	    	$config['max_size']  = '1000';
		    $config['max_width'] = '2000';
		    $config['max_height'] = '2000';
		   	
		   	$this->load->library('upload', $config);
		   	$nm_gambar = "";
		    if (!$this->upload->do_upload('gambar')) {
		   		$error = array('error' => $this->upload->display_errors());
		   	} else {
		    	$data_image = $this->upload->data();
				$nm_gambar = $data_image['file_name'];
		    }
		    // upsdatew gambar //

		    /* faktur */
	    	$this->db->select('fr.*');
			$this->db->from('faktur_retail fr');
			$this->db->join('users u', 'fr.id_users=u.id_users AND fr.id_toko=u.id_toko');
			$this->db->where('fr.id_toko', $this->userdata->id_toko);
			if (!empty($this->userdata->id_cabang)) {
				$this->db->where('u.id_cabang', $this->userdata->id_cabang);
			}
			$this->db->order_by('fr.id_faktur', 'desc');
			$this->db->group_by('fr.id_faktur');
			$row_faktur = $this->db->get()->row();
	    	$id_faktur = "";
	    	if($row_faktur){
	    		// jika ada faktur //
	    		$id_faktur = $row_faktur->id_faktur;
	    	} else {
	    		// insert //
	            $row_last_faktur = $this->db->select('id_faktur')
	                                        ->from('faktur_retail')
	                                        ->where('id_toko', $this->userdata->id_toko)
	                                        // ->where('id_supplier', 0)
	                                        ->order_by('id_faktur', 'desc')
	                                        ->get()->row();
	            $id_faktur = 1;
	            if ($row_last_faktur) {
	                $id_faktur = $row_last_faktur->id_faktur+1;
	            }
	    		$data_faktur = array(
	    			'id_faktur' => $id_faktur,
	    			'id_toko' => $this->input->post('id_toko',TRUE),
	    			'id_users' => $this->userdata->id_users,
	    			'tgl' => date('d-m-Y'),
	    			'no_faktur' => 'FAKTUR01',
	    		);
	    		$this->Faktur_retail_model->insert($data_faktur);
	    	}
		    /* faktur */

		    $row_last_produk = $this->db->select('*')
		    							->from('produk_retail')
		    							->where('id_toko', $this->userdata->id_toko)
		    							->order_by('id_produk_2', 'desc')
		    							->get()->row();
		    $id_produk = 1;
		    if ($row_last_produk) {
		    	$id_produk = $row_last_produk->id_produk_2+1;
		    }

		    $stok_awal = $this->input->post('stok', true);
		    $hpp_awal = str_replace('.', '', $this->input->post('hpp', true));

            $data = array(
            	'id_produk_2' => $id_produk,
				'id_toko' => $this->input->post('id_toko',TRUE),
				'id_users' => $this->userdata->id_users,
				'barcode' => $this->input->post('barcode',TRUE),
				'id_kategori' => $this->input->post('kategori',TRUE),
				'nama_produk' => $this->input->post('nama_produk',TRUE),
				'jenis' => $this->input->post('jenis',TRUE),
				'deskripsi' => $this->input->post('deskripsi',TRUE),
				'harga_1' => str_replace(".","",$this->input->post('harga_1',TRUE)),
				'harga_2' => str_replace(".","",$this->input->post('harga_2',TRUE)),
				'harga_3' => str_replace(".","",$this->input->post('harga_3',TRUE)),
				'harga_4' => str_replace(".","",$this->input->post('harga_4',TRUE)),
				'harga_5' => str_replace(".","",$this->input->post('harga_5',TRUE)),
				'harga_6' => str_replace(".","",$this->input->post('harga_6',TRUE)),
				'harga_7' => str_replace(".","",$this->input->post('harga_7',TRUE)),
				'satuan' => $this->input->post('satuan',TRUE),
				'berat' => $this->input->post('berat',TRUE),
				'mingros' => $this->input->post('mingros',TRUE),
				'diskon' => $this->input->post('diskon',TRUE),
				'rak' => $this->input->post('rak',TRUE),
				'dibeli' => '0',
				'gambar' => $nm_gambar,
		    );

            $this->Produk_retail_model->insert($data);

            /* Pembelian */
            $row_pembelian = $this->db->where('id_toko', $this->input->post('id_toko',TRUE))
            						->where('id_faktur', $id_faktur)
            						->where('id_produk', $id_produk)
            						->get('pembelian')->row();
            if ($row_pembelian) {
            	$id_beli = $row_pembelian->id_pembelian;
            } else {
            	$row_last_beli = $this->db->where('id_toko', $this->userdata->id_toko)->order_by('id_pembelian', 'desc')->get('pembelian')->row();
            	$id_pembelian = 1;
            	if ($row_last_beli) {
            		$id_pembelian = $row_last_beli->id_pembelian+1;
            	}
            	$total_bayar = $hpp_awal*$stok_awal;
            	$data_beli = array(
            		'id_pembelian' => $id_pembelian,
            		'id_toko' => $this->input->post('id_toko',TRUE),
	    			'id_users' => $this->userdata->id_users,
            		'id_faktur' => $id_faktur,
            		'id_produk' => $id_produk,
            		'tgl_masuk' => date('d-m-Y'),
            		'tgl_expire' => date('d-m-2099'),
            		'pembayaran' => '1',
            		'harga_satuan' => $hpp_awal,
            		'jumlah' => $stok_awal,
            		'total_bayar' => $total_bayar,
            	);
            	$this->Pembelian_retail_model->insert($data_beli);
            	$id_beli = $id_pembelian;
            }
            /* Pembelian */

            $data_stok = array(
            	'id_pembelian' => $id_beli,
            	'id_produk' => $id_produk,
            	'id_toko' => $this->input->post('id_toko', TRUE),
            	'stok' => $stok_awal,
            );
            $this->Stok_produk_model->insert($data_stok);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('produksi/produk_retail'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Produk_retail_model->get_by_id($id, $this->userdata->id_toko);
		$data_kategori = $this->db->select('kp.*, s.nama_supplier')
								  ->from('kategori_produk kp')
								  ->join('supplier s', 'kp.id_supplier=s.id_supplier AND kp.id_toko=s.id_toko')
								  ->where('kp.id_toko', $this->userdata->id_toko)
								  ->order_by('s.nama_supplier', 'asc')
								  ->order_by('kp.nama_kategori', 'asc')
								  ->get();
        if ($row) {
        	$row_sp = $this->db->select('sp.*, p.harga_satuan')
        					   ->from('stok_produk sp')
        					   ->join('pembelian p', 'sp.id_pembelian=p.id_pembelian AND sp.id_toko=p.id_toko')
        					   ->join('faktur_retail fr', 'p.id_faktur=fr.id_faktur AND p.id_toko=fr.id_toko')
        					   ->where('sp.id_toko', $this->userdata->id_toko)
        					   ->where('sp.id_produk', $row->id_produk_2)
        					   ->where('fr.id_supplier', 0)
        					   ->order_by('sp.id', 'asc')
        					   ->get()->row();
        	$stok_awal = 0;
        	$hpp_awal = 0;
        	$allow_awal = false;
        	if ($row_sp) {
        		$stok_awal = $row_sp->stok;
        		$hpp_awal = $row_sp->harga_satuan;
	        	$allow_awal = true;
        	}
	        $data = array(
	            'id_toko' => $this->userdata->id_toko,
	            'nama_toko' => $this->userdata->nama_toko,
	            'nama_user' => $this->userdata->email,
	            'active_produk' => 'active',
	            'id_modul' => $this->userdata->id_modul,
	            'nama_modul' => $this->userdata->nama_modul,
                'button' => 'Simpan',
                'action' => site_url('produksi/produk_retail/update_action'),
				'id_produk' => set_value('id_produk', $row->id_produk_2),
				'id_toko' => set_value('id_toko', $row->id_toko),
				'barcode' => set_value('barcode', $row->barcode),
				'kategori' => set_value('kategori', $row->id_kategori),
				'nama_produk' => set_value('nama_produk', $row->nama_produk),
			    'jenis' => set_value('jenis', $row->jenis),
				'deskripsi' => set_value('deskripsi', $row->deskripsi),
				'harga_1' => set_value('harga_1', number_format($row->harga_1,0,',','.')),
				'harga_2' => set_value('harga_2', number_format($row->harga_2,0,',','.')),
				'harga_3' => set_value('harga_3', number_format($row->harga_3,0,',','.')),
				'harga_4' => set_value('harga_4', number_format($row->harga_4,0,',','.')),
				'harga_5' => set_value('harga_5', number_format($row->harga_5,0,',','.')),
				'harga_6' => set_value('harga_6', number_format($row->harga_5,0,',','.')),
				'harga_7' => set_value('harga_7', number_format($row->harga_5,0,',','.')),
				'satuan' => $row->satuan,
				'berat' => set_value('berat', $row->berat),
				'mingros' => set_value('mingros', $row->mingros),
				'diskon' => set_value('diskon', $row->diskon),
				'rak' => set_value('rak', $row->rak),
				'stok_awal' => set_value('stok_awal', $stok_awal),
				'hpp_awal' => set_value('hpp_awal', $hpp_awal),
				'allow_awal' => $allow_awal,
				'gambar' => set_value('gambar', $row->gambar),
				'gambarlama' => set_value('gambar', $row->gambar),
				'tampil_gambar' => 'assets/gambar_produk/'.$row->gambar,
		    	'data_satuan' => $this->Satuan_produk_model->get_by_id_toko($row->id_toko),
			    'data_kategori' => $data_kategori,
	        );
	        $this->view->render_produksi('produk/produk_retail_form', $data);

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produksi/produk_retail'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_produk', TRUE));
        } else {

		    // upsdatew gambar //
		    $config['upload_path'] = 'assets/gambar_produk/';
		    $config['allowed_types'] = 'gif|jpeg|png|jpg';
	    	$config['max_size']  = '1000';
		    $config['max_width'] = '2000';
		    $config['max_height'] = '2000';
		   	
		   	$this->load->library('upload', $config);
		    if (!$this->upload->do_upload('gambar')){
		   		$error = array('error' => $this->upload->display_errors());
				$nm_gambar = $this->input->post('gambarlama',TRUE);
		   	} else{
				unlink($config['upload_path'].$this->input->post('gambarlama',TRUE));
				//$this->upload->do_upload('gambar');
		    	$data_image = $this->upload->data();
				$nm_gambar = $data_image['file_name'];
		    }
		    // upsdatew gambar //
            $data = array(
				'id_toko' => $this->input->post('id_toko',TRUE),
				'barcode' => $this->input->post('barcode',TRUE),
				'id_kategori' => $this->input->post('kategori',TRUE),
				'nama_produk' => $this->input->post('nama_produk',TRUE),
				'jenis' => $this->input->post('jenis',TRUE),
				'deskripsi' => $this->input->post('deskripsi',TRUE),
				'harga_1' => str_replace(".","",$this->input->post('harga_1',TRUE)),
				'harga_2' => str_replace(".","",$this->input->post('harga_2',TRUE)),
				'harga_3' => str_replace(".","",$this->input->post('harga_3',TRUE)),
				'harga_4' => str_replace(".","",$this->input->post('harga_4',TRUE)),
				'harga_5' => str_replace(".","",$this->input->post('harga_5',TRUE)),
				'harga_6' => str_replace(".","",$this->input->post('harga_6',TRUE)),
				'harga_7' => str_replace(".","",$this->input->post('harga_7',TRUE)),
				'satuan' => $this->input->post('satuan',TRUE),
				'berat' => $this->input->post('berat',TRUE),
				'mingros' => $this->input->post('mingros',TRUE),
				'diskon' => $this->input->post('diskon',TRUE),
				'rak' => $this->input->post('rak',TRUE),
				'gambar' => $nm_gambar,
		    );
            $this->Produk_retail_model->update($this->input->post('id_produk', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('produksi/produk_retail'));
        }
    }

	private function deleteJoin($table_name, $q)
	{
		$this->db->query('DELETE t1 FROM '.$table_name.' t1 INNER JOIN users u ON t1.id_users=u.id_users AND t1.id_toko=u.id_toko WHERE t1.id_toko="'.$this->userdata->id_toko.'" AND u.id_cabang="'.$this->userdata->id_cabang.'" AND '.$q);
	}
    
    public function delete($id) 
    {
        $row = $this->Produk_retail_model->get_by_id($id, $this->userdata->id_toko);
        if ($row) {
        	$this->db->query('SET FOREIGN_KEY_CHECKS = 0;');
        	$this->deleteJoin('stok_produk', 't1.id_produk="'.$row->id_produk_2.'"');
        	$this->deleteJoin('pembelian', 't1.id_produk="'.$row->id_produk_2.'"');
        	$this->deleteJoin('produk_retail', 't1.id_produk_2="'.$row->id_produk_2.'"');
        	$this->db->query('SET FOREIGN_KEY_CHECKS = 1;');
            /*$this->Produk_retail_model->delete($id);
            $row_stok = $this->Stok_produk_model->get_by_id_produk($row->id_produk, $row->id_toko);
            if($row_stok){
            	$this->Stok_produk_model->delete($row_stok->id);
            }*/
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('produksi/produk_retail'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produksi/produk_retail'));
        }
    }

    public function excel_rekap_bulan($bulan, $tahun)
    {
		$bulan = sprintf('%02d', $bulan);
        $this->load->helper('exportexcel');
        $namaFile = "PENJUALAN_".$bulan."_".$tahun.".xls";
        $judul = "PENJUALAN ".$bulan." ".$tahun."";
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
		xlsWriteLabel($tablehead, $kolomhead++, "NO");
		xlsWriteLabel($tablehead, $kolomhead++, "TANGGAL");
		xlsWriteLabel($tablehead, $kolomhead++, "NO FAKTUR");
		xlsWriteLabel($tablehead, $kolomhead++, "KODE");
		xlsWriteLabel($tablehead, $kolomhead++, "NAMA TOKO");
		xlsWriteLabel($tablehead, $kolomhead++, "ALAMAT");
		xlsWriteLabel($tablehead, $kolomhead++, "KOTA");
		xlsWriteLabel($tablehead, $kolomhead++, "NAMA BARANG");
		xlsWriteLabel($tablehead, $kolomhead++, "PRINCIPAL");
		xlsWriteLabel($tablehead, $kolomhead++, "KATEGORI");
		xlsWriteLabel($tablehead, $kolomhead++, "QTY");
		xlsWriteLabel($tablehead, $kolomhead++, "QTY BONUS");
		xlsWriteLabel($tablehead, $kolomhead++, "SATUAN");
		xlsWriteLabel($tablehead, $kolomhead++, "HARGA");
		xlsWriteLabel($tablehead, $kolomhead++, "(+PPN)");
		xlsWriteLabel($tablehead, $kolomhead++, "DISKON");
		xlsWriteLabel($tablehead, $kolomhead++, "JUMLAH");
		xlsWriteLabel($tablehead, $kolomhead++, "SALES");
		
		$res = $this->db->select('od.*, o.tgl_order, o.no_faktur, m.nama AS nama_toko, m.kode AS kode_toko, m.alamat AS alamat_toko, m.telp AS telp_toko, pr.barcode, pr.nama_produk, sp.satuan AS satuan, u.first_name, kp.nama_kategori, SUM(rjd.jumlah) AS jumlah_retur, s.nama_supplier')
						->from('orders_detail od')
						->join('orders o', 'od.id_orders_2=o.id_orders_2 AND o.id_toko=od.id_toko')
						->join('member m', 'o.pembeli=m.id_member AND m.id_toko=o.id_toko', 'left')
						->join('users u', 'm.id_sales=u.id_users AND level=4 AND u.id_toko=m.id_toko', 'left')
						->join('produk_retail pr', 'od.id_produk=pr.id_produk_2 AND pr.id_toko=od.id_toko', 'left')
						->join('satuan_produk sp', 'pr.satuan=sp.id_satuan AND sp.id_toko=pr.id_toko', 'left')
						->join('kategori_produk kp', 'pr.id_kategori=kp.id_kategori_2 AND kp.id_toko=pr.id_toko', 'left')
						->join('supplier s', 'kp.id_supplier=s.id_supplier AND kp.id_toko=s.id_toko')
						->join('retur_jual_detail rjd', 'rjd.id_orders_detail=od.id_orders AND rjd.id_toko=od.id_toko', 'left')
						->where('SUBSTRING(o.tgl_order,7,4)=', $tahun)
						->where('SUBSTRING(o.tgl_order,4,2)=', $bulan)
						->group_by('od.id_orders')
						->get()->result();
		
		foreach ($res as $data):
            $kolombody = 0;
			$harga_ppn = $data->harga_jual+($data->harga_jual*(10/100));
			$diskon = ($data->diskon+$data->diskon2+$data->diskon3)*1;
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
		    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_order);
		    xlsWriteLabel($tablebody, $kolombody++, $data->no_faktur);
		    xlsWriteLabel($tablebody, $kolombody++, $data->kode_toko);
		    xlsWriteLabel($tablebody, $kolombody++, $data->nama_toko);
		    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_toko);
		    xlsWriteLabel($tablebody, $kolombody++, "");
		    xlsWriteLabel($tablebody, $kolombody++, $data->nama_produk);
		    xlsWriteLabel($tablebody, $kolombody++, $data->nama_supplier);
		    xlsWriteLabel($tablebody, $kolombody++, $data->nama_kategori);
		    xlsWriteLabel($tablebody, $kolombody++, $data->jumlah-$data->jumlah_retur);
		    xlsWriteLabel($tablebody, $kolombody++, $data->jumlah_bonus);
		    xlsWriteLabel($tablebody, $kolombody++, $data->satuan);
		    xlsWriteLabel($tablebody, $kolombody++, number_format($data->harga_jual,0,',','.'));
		    xlsWriteLabel($tablebody, $kolombody++, number_format($harga_ppn,0,',','.'));
		    xlsWriteLabel($tablebody, $kolombody++, $diskon);
		    xlsWriteLabel($tablebody, $kolombody++, number_format($data->subtotal,0,',','.'));
		    xlsWriteLabel($tablebody, $kolombody++, $data->first_name);
	    	$tablebody++;
            $nourut++;
		endforeach;

        xlsEOF();
        exit();
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('id_toko', 'id toko', 'trim|required');
		$this->form_validation->set_rules('barcode', 'barcode', 'trim|required');
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
		$this->form_validation->set_rules('satuan', 'satuan', 'trim|required');
		$this->form_validation->set_rules('nama_produk', 'nama produk', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim');
		$this->form_validation->set_rules('harga_1', 'harga 1', 'trim|required');
		$this->form_validation->set_rules('harga_2', 'harga 2', 'trim');
		$this->form_validation->set_rules('harga_3', 'harga 3', 'trim');
		$this->form_validation->set_rules('harga_4', 'harga 4', 'trim');
		$this->form_validation->set_rules('harga_5', 'harga 5', 'trim');
		$this->form_validation->set_rules('harga_6', 'harga 6', 'trim');
		$this->form_validation->set_rules('harga_7', 'harga 7', 'trim');
		$this->form_validation->set_rules('berat', 'berat', 'trim');
		$this->form_validation->set_rules('mingros', 'mingros', 'trim');
		$this->form_validation->set_rules('diskon', 'diskon', 'trim');
		$this->form_validation->set_rules('rak', 'rak', 'trim');
		$this->form_validation->set_rules('gambar', 'gambar', 'trim');
		$this->form_validation->set_rules('id_produk', 'id_produk', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "produk_retail_".$this->userdata->id_toko.".xls";
        $judul = "produk_retail";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Barcode");
		xlsWriteLabel($tablehead, $kolomhead++, "Kategori");
		xlsWriteLabel($tablehead, $kolomhead++, "Nama Produk");
		xlsWriteLabel($tablehead, $kolomhead++, "Deskripsi");
		xlsWriteLabel($tablehead, $kolomhead++, "Harga 1");
		xlsWriteLabel($tablehead, $kolomhead++, "Harga 2");
		xlsWriteLabel($tablehead, $kolomhead++, "Harga 3");
		xlsWriteLabel($tablehead, $kolomhead++, "Stok");
		xlsWriteLabel($tablehead, $kolomhead++, "Satuan");
		xlsWriteLabel($tablehead, $kolomhead++, "Mingros");
		xlsWriteLabel($tablehead, $kolomhead++, "Diskon");
		xlsWriteLabel($tablehead, $kolomhead++, "Dibeli");

		foreach ($this->Produk_retail_model->get_by_id_toko_produksi($this->userdata->id_toko) as $data) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
		    xlsWriteLabel($tablebody, $kolombody++, $data->barcode);
		    xlsWriteLabel($tablebody, $kolombody++, $data->nama_kategori);
		    xlsWriteLabel($tablebody, $kolombody++, $data->nama_produk);
		    xlsWriteLabel($tablebody, $kolombody++, $data->deskripsi);
		    xlsWriteNumber($tablebody, $kolombody++, $data->harga_1);
		    xlsWriteNumber($tablebody, $kolombody++, $data->harga_2);
		    xlsWriteNumber($tablebody, $kolombody++, $data->harga_3);
		    xlsWriteNumber($tablebody, $kolombody++, $data->stok);
		    xlsWriteLabel($tablebody, $kolombody++, $data->satuan_produk);
		    xlsWriteNumber($tablebody, $kolombody++, $data->mingros);
		    xlsWriteLabel($tablebody, $kolombody++, $data->diskon);
		    xlsWriteNumber($tablebody, $kolombody++, $data->dibeli);
	    	$tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=produk_retail.doc");
        $data = array(
            'produk_retail_data' => $this->Produk_retail_model->get_by_id_toko_produksi($this->userdata->id_toko),
            'start' => 0
        );
        $this->load->view('produksi/produk/produk_retail_doc',$data);
    }

    public function import_excel()
    {
    	$tmp_name = $_FILES['file']['tmp_name'];
    	$name = $_FILES['file']['name'];
    	if (move_uploaded_file($tmp_name, 'assets/excel/'.$name)){
    		$excel = $this->Produk_retail_model->import_excel('assets/excel/'.$name, $this->userdata->id_toko);
    		//print_r($excel);
    		redirect(site_url());
    	} else {
    		echo $this->upload->display_errors();
    	}
    }

	public function generating_barcode($kode)
	{
		$this->load->library('zend');
		$this->zend->load('Zend/Barcode');
		Zend_Barcode::render('code128', 'image', array('text'=>$kode), array());
	}

    public function cetak_label_barcode()
    {
		$id_produk = $this->input->post('id_produk', true);
		$jml_cetak = $this->input->post('jml_cetak', true);
		$z = 0;
		$data_cetak = array();
		sort($id_produk);
		for ($i=0; $i < count($id_produk); $i++) {
			$row_produk = $this->db->select('*')
								   ->from('produk_retail')
								   ->where('id_toko', $this->userdata->id_toko)
								   ->where('id_produk_2', $id_produk[$i])
								   ->get()->row();
			if ($row_produk) {
				for ($c=1; $c <= $jml_cetak[$i]; $c++) {
					$data_cetak[$z]['barcode'] = $row_produk->barcode;
					$data_cetak[$z]['nama_produk'] = $row_produk->nama_produk;
					$data_cetak[$z]['harga_1'] = $row_produk->harga_1;
					$z++;
				}
			}
		}
		$data = array(
			'cetak' => $data_cetak,
		);
		$this->load->view('produksi/produk/cetak_label_barcode', $data);
    }

    public function simpan_semua_produk()
    {
        header('Content-Type: application/json');
        $data = $this->input->post('data', true);
        $decode = json_decode($data);
        $result = array();
        $i = 0;
        foreach ($decode as $key) {
        	$id_produk_2 = $key[0];
        	$field = $key[1];
        	$old_record = $key[2];
        	$new_record = $key[3];
        	if ($field=='nama_kategori') {
        		$row_kategori_old = $this->db->select('*')
										->from('kategori_produk')
										->where('id_toko', $this->userdata->id_toko)
										->where('nama_kategori', $old_record)
										->get()->row();
				if ($row_kategori_old) {
					$old_record = $row_kategori_old->id_kategori_2;
				}
        		$row_kategori_new = $this->db->select('*')
										->from('kategori_produk')
										->where('id_toko', $this->userdata->id_toko)
										->where('nama_kategori', $new_record)
										->get()->row();
				if ($row_kategori_new) {
					$new_record = $row_kategori_new->id_kategori_2;
				}
				$field = 'id_kategori';
        	}
        	if ($field=='satuan') {
        		$row_satuan_old = $this->db->select('*')
										->from('satuan_produk')
										->where('id_toko', $this->userdata->id_toko)
										->where('satuan', $old_record)
										->get()->row();
				if ($row_satuan_old) {
					$old_record = $row_satuan_old->id_satuan;
				}
        		$row_satuan_new = $this->db->select('*')
										->from('satuan_produk')
										->where('id_toko', $this->userdata->id_toko)
										->where('satuan', $new_record)
										->get()->row();
				if ($row_satuan_new) {
					$new_record = $row_satuan_new->id_satuan;
				}
				$field = 'satuan';
        	}
        	$stok_baru = null;
        	if ($field=='stok') {
				$row_stok = $this->db->select('*')
									 ->from('stok_produk')
									 ->where('id_toko', $this->userdata->id_toko)
									 ->where('id_produk', $id_produk_2)
									 ->get()->row();
				if ($row_stok) {
					$stok_baru = $new_record;
					$data_stok = array(
						'stok' => $new_record,
					);
					$this->Stok_produk_model->update($row_stok->id, $data_stok);
				}
        	}
        	if ($field=='harga_beli') {    		
				$row_beli = $this->db->select('*')
									 ->from('pembelian')
									 ->where('id_toko', $this->userdata->id_toko)
									 ->where('id_produk', $id_produk_2)
									 ->get()->row();
				if ($row_beli) {
					$data_beli = array(
						'harga_satuan' => $new_record
					);
					if ($stok_baru!=null) {
						$data_beli['jumlah'] = $stok_baru;
						$data_beli['total_bayar'] = $new_record * $stok_baru;
					}
					$this->Pembelian_retail_model->update($row_beli->id_pembelian, $data_beli);
				}
        	}
    		if ($field!='stok' && $field!='harga_beli') {
	        	$row_produk = $this->db->select('*')
	        						   ->from('produk_retail')
	        						   ->where('id_toko', $this->userdata->id_toko)
	        						   ->where('id_produk_2', $id_produk_2)
	        						   ->where($field, $old_record)
	        						   ->get()->row();
	        	if ($row_produk) {
	        		$data_update = array(
	        			$field => $new_record,
	        		);
	        		$this->db->where('id_toko', $row_produk->id_toko);
	        		$this->db->where('id_produk_2', $row_produk->id_produk_2);
	        		$this->db->update('produk_retail', $data_update);
		        	$i++;
	        	}
	        }
        }
        echo json_encode(array('status'=>'ok'));
    }

    public function edit_semua()
    {
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_produk' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
			'data_kategori' => $this->db->select('*')
										->from('kategori_produk')
										->where('id_toko', $this->userdata->id_toko)
										->order_by('nama_kategori', 'asc')
										->get()->result(),
			'data_satuan' => $this->db->select('*')
										->from('satuan_produk')
										->where('id_toko', $this->userdata->id_toko)
										->order_by('id_satuan', 'asc')
										->get()->result(),
        );
        $this->view->render_produksi('produk/edit_semua', $data);
    }

}

/* End of file Produk_retail.php */
/* Location: ./application/controllers/Produk_retail.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-07-26 06:49:27 */
/* http://harviacode.com */