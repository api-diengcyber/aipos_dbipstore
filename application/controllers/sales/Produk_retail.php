<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Produk_retail extends AI_Admin
{
    function __construct()
    {
			parent::__construct();
			$this->models('Produk_retail_model, Stok_produk_model, Satuan_produk_model, Kategori_produk_retail_model, Faktur_retail_model, Pembelian_retail_model');
    }
	public function index($id_produk_2 = '') // parent id
	{
		if (!empty($this->input->get('page'))) {
			$page = $this->input->get('page');
			$this->session->set_userdata(array('page' => $page));
		}
		if (empty($this->session->userdata('page'))) {
			$this->session->set_userdata(array('page' => 10));
		}
		$data = array(
			'active_produk' => 'active',
			'produk' => $this->Produk_retail_model->get_by_id($id_produk_2),
		);
		$this->view('produk/produk_retail_list', $data);
	}

	public function json($id_produk_2 = '') // parent id
	{
		header('Content-Type: application/json');
		echo $this->Produk_retail_model->json($this->userdata->id_toko, $id_produk_2);
	}


    // public function index()
    // {
	// 		if (!empty($this->input->get('page'))) {
	// 			$page = $this->input->get('page');
	// 			$this->session->set_userdata(array('page'=>$page));
	// 		}
	// 		if (empty($this->session->userdata('page'))) {
	// 			$this->session->set_userdata(array('page'=> 10));
	// 		}
	// 		$data = array(
	// 			'active_produk' => 'active',
	// 		);
	// 		$this->view('produk/produk_retail_list', $data);
    // }
    
    // public function json() {
	// 		header('Content-Type: application/json');
	// 		echo $this->Produk_retail_model->json($this->userdata->id_toko);
    // }
		
    // public function json_data($tgl) {
		// 	header('Content-Type: application/json');
		// 	echo $this->Produk_retail_model->json_stok($this->userdata->id_toko, $tgl);
    // }
    
    public function json_data($id_stok_info, $cabang) {
        header('Content-Type: application/json');
        echo $this->Produk_retail_model->json_stok($this->userdata->id_toko, $id_stok_info, $cabang);
    }
    
    public function json_basic() {
			header('Content-Type: application/json');
			echo $this->Produk_retail_model->json_basic($this->userdata->id_toko);
		}
		
		public function datacoba2()
		{
			$this->output->enable_profiler(TRUE);
			$id_stok_info = 1;
			$id_toko = $this->userdata->id_toko;
			$cabang = 1;
        $this->load->model('Mutasi_stok_model');
        $this->db->select('pr.id_produk, pr.id_produk_2, pr.id_toko, pr.barcode, pr.id_kategori, pr.nama_produk, pr.deskripsi, pr.harga_1, pr.harga_2, pr.harga_3, s.satuan, pr.berat, pr.mingros, pr.diskon, pr.rak, pr.dibeli, pr.gambar, k.nama_kategori, b.harga_satuan AS harga_beli, sup.nama_supplier, IFNULL(sso2.penyesuaian,0) AS penyesuaian, '.$this->Mutasi_stok_model->select_stok_mutasi('stok').', IFNULL(sso2.stok_so,0) AS stok_so');
        $this->db->from('produk_retail pr');
        $this->db->join('kategori_produk k', 'pr.id_kategori=k.id_kategori_2 AND k.id_toko=pr.id_toko', 'left');
        $this->db->join('supplier sup', 'k.id_supplier=sup.id_supplier AND k.id_toko=sup.id_toko', 'left');
        $this->db->join('pembelian b', 'pr.id_produk_2=b.id_produk AND b.id_toko=pr.id_toko', 'left');
        // $this->db->join('stok_produk stok', 'pr.id_produk_2=stok.id_produk AND stok.id_pembelian=b.id_pembelian AND stok.id_toko=pr.id_toko', 'left');
        $this->db->join('satuan_produk s', 'pr.satuan=s.id_satuan AND s.id_toko=pr.id_toko', 'left');
        $this->db->join('(SELECT * FROM stok_so WHERE id_stok_info="'.$id_stok_info.'" ORDER BY DATE(CONCAT(SUBSTRING(tgl_so,7,4),"-",SUBSTRING(tgl_so,4,2),"-",SUBSTRING(tgl_so,1,2))) DESC, id DESC) AS sso2', 'sso2.id_produk=pr.id_produk_2 AND sso2.id_toko="'.$id_toko.'"', 'left');
        // $this->db->join('(SELECT id_toko, id_produk, tgl_so, SUM(stok_so) AS stok, SUM(penyesuaian) AS penyesuaian FROM `stok_so` GROUP BY id_toko, id_produk, tgl_so) AS sso', 'pr.id_produk_2=sso.id_produk AND pr.id_toko=sso.id_toko AND sso.tgl_so="'.$tgl.'"', 'left');
        $this->Mutasi_stok_model->query_stok_mutasi($this->db, $id_toko, $cabang, 'pr.id_produk_2');
        $this->db->where('pr.id_toko', $id_toko);
        // $this->db->having('stok > 0');
        $this->db->group_by('pr.id_produk_2');
        print_r($this->db->get()->result());
		}

    public function read($id) 
    {
        $row = $this->Produk_retail_model->get_by_id($id, $this->userdata->id_toko);
        $row_kategori = $this->Kategori_produk_retail_model->get_by_id($row->id_kategori);
        $row_satuan = $this->Satuan_produk_model->get_by_id($row->satuan, $row->id_produk);
        $row_stok = $this->Stok_produk_model->get_total_stok_by_id_produk($row->id_produk_2,$this->userdata->id_toko);
        $stok = 0;
        if (!empty($row_stok)) {
        	$stok = $row_stok->stok;
        }
        if ($row) {
	        $data = array(
						'active_produk' => 'active',
						'id_produk' => $row->id_produk_2,
						'id_toko' => $row->id_toko,
						'barcode' => $row->barcode,
						'id_kategori' => $row_kategori->nama_kategori,
						'nama_produk' => $row->nama_produk,
						'deskripsi' => $row->deskripsi,
						'harga_beli' => $row->harga_beli,
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
	        $this->view('produk/produk_retail_read', $data);
        } else {
					$this->session->set_flashdata('message', 'Record Not Found');
					redirect(site_url('admin/retail'));
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
		
		public function gen_barcode()
		{
			for ($i=1; $i <= 61; $i++) {
				echo $this->create_barcode().$i.'<br>';		
			}
		}

    public function create($id_produk_2='')
    {


		$barcode = $this->create_barcode();
		if($id_produk_2!=null){
			$parent = $this->Produk_retail_model->get_by_id($id_produk_2);
			$kode_produk = $parent->kode_produk;
		}else{
			$parent =null;
		}

		

		$data_kategori = $this->db->select('kp.*')
								  ->from('kategori_produk kp')
								 
								  ->where('kp.id_toko', $this->userdata->id_toko)
								  //->where('u.id_cabang', $this->userdata->id_cabang)								 
								  ->order_by('kp.nama_kategori', 'asc')
								  ->group_by('kp.id_kategori_2')
								  ->get();
		// $data_kategori = $this->db->select('kp.*, s.nama_supplier')
		// 						  ->from('kategori_produk kp')
		// 						  ->join('supplier s', 'kp.id_supplier=s.id_supplier AND kp.id_toko=s.id_toko')
		// 						  ->where('kp.id_toko', $this->userdata->id_toko)
		// 						  //->where('u.id_cabang', $this->userdata->id_cabang)
		// 						  ->order_by('s.nama_supplier', 'asc')
		// 						  ->order_by('kp.nama_kategori', 'asc')
		// 						  ->group_by('kp.id_kategori_2')
		// 						  ->get();
        $data = array(
			'parent' => $parent,
            'id_toko' => $this->userdata->id_toko,
			'id_users' => $this->userdata->id_users,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_produk' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'button' => 'Tambah',
            'action' => site_url('admin/produk_retail/create_action'),
		    'id_produk' => set_value('id_produk'),
		    'id_toko' => $this->userdata->id_toko,
		    'barcode' => set_value('barcode / IMEI', $barcode),
		  //  'barcode' => set_value('IMEI'),
		    'kategori' => set_value('kategori'),
		    'kode_produk' => set_value('kode_produk',$kode_produk),
		    'nama_produk' => set_value('nama_produk'),
		    'deskripsi' => set_value('deskripsi'),
		    'harga_beli' => set_value('harga_beli'),
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
		    'data_satuan' => $this->Satuan_produk_model->get_by_id_toko($this->userdata->id_toko),
		    'data_kategori' => $data_kategori,
        );
        $this->view('produk/produk_retail_form', $data);
    }
    
    public function create_action() 
    {
        $parent = $this->input->post('id_parent');
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create($parent);
        } else {


			if($this->input->post('id_parent')){
				
				$id_produk_2 = $this->input->post('id_parent');
				
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
				// update gambar //

				/* faktur */
				$row_faktur = $this->db->select('fr.*')
									->from('faktur_retail fr')
									->join('users u', 'fr.id_users=u.id_users AND fr.id_toko=u.id_toko')
									->where('fr.id_toko', $this->userdata->id_toko)
									->where('u.id_cabang', $this->userdata->id_cabang)
									->order_by('fr.id_faktur', 'desc')
									->group_by('fr.id_faktur')
									->get()->row();
				$id_faktur = "";
				if($row_faktur){
					// jika ada faktur //
					$id_faktur = $row_faktur->id_faktur;
				} else {
					// insert //
					$row_last_faktur = $this->db->select('id_faktur')
												->from('faktur_retail')
												->where('id_toko', $this->userdata->id_toko)
												->where('id_supplier', 0)
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
				$hpp_awal = str_replace('.', '', $this->input->post('hpp', true)); //
				$harga_beli = str_replace(".","",$this->input->post('harga_beli',TRUE));
				$id_produk_2 = $this->input->post('id_parent');
				$data = array(
					'id_produk_2' => $id_produk,
					'id_toko' => $this->userdata->id_toko,
					'id_users' => $this->userdata->id_users,
					'barcode' => $this->input->post('barcode',TRUE),
				// 	'imei' => $this->input->post('imei',TRUE),
					'id_kategori' => $this->input->post('kategori',TRUE),
					'kode_produk' => $this->input->post('kode_produk',TRUE),
					'nama_produk' => $this->input->post('nama_parent',TRUE).' - '. $this->input->post('nama_produk',TRUE),
					'deskripsi' => $this->input->post('deskripsi',TRUE),
					'harga_beli' => $harga_beli,
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
					'parent_id' => $id_produk_2,
				);

				$this->Produk_retail_model->insert($data);

				/* Pembelian */
				/*$row_pembelian = $this->db->where('id_toko', $this->input->post('id_toko',TRUE))
										->where('id_faktur', $id_faktur)
										->where('id_produk', $id_produk)
										->get('pembelian')->row();*/
				$row_pembelian = $this->db->select('p.*')
										->from('pembelian p')
										->join('users u', 'p.id_users=u.id_users AND p.id_toko=u.id_toko')
										->where('p.id_toko', $this->input->post('id_toko',TRUE))
										->where('u.id_cabang', $this->userdata->id_cabang)
										->get()->row();
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
						'harga_satuan' => $harga_beli,
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
				$this->session->set_flashdata('message', 'Produk varian berhasil disimpan');
				redirect(site_url('admin/produk_retail/index/' . $id_produk_2));

			}else{

				
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
		    // update gambar //

		    /* faktur */
	    	$row_faktur = $this->db->select('fr.*')
	    						   ->from('faktur_retail fr')
						           ->join('users u', 'fr.id_users=u.id_users AND fr.id_toko=u.id_toko')
	    						   ->where('fr.id_toko', $this->userdata->id_toko)
	    						   ->where('u.id_cabang', $this->userdata->id_cabang)
	    						   ->order_by('fr.id_faktur', 'desc')
	    						   ->group_by('fr.id_faktur')
	    						   ->get()->row();
	    	$id_faktur = "";
	    	if($row_faktur){
	    		// jika ada faktur //
	    		$id_faktur = $row_faktur->id_faktur;
	    	} else {
	    		// insert //
	            $row_last_faktur = $this->db->select('id_faktur')
	                                        ->from('faktur_retail')
	                                        ->where('id_toko', $this->userdata->id_toko)
	                                        ->where('id_supplier', 0)
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
		    $hpp_awal = str_replace('.', '', $this->input->post('hpp', true)); //
		    $harga_beli = str_replace(".","",$this->input->post('harga_beli',TRUE));

            $data = array(
            	'id_produk_2' => $id_produk,
				'id_toko' => $this->userdata->id_toko,
				'id_users' => $this->userdata->id_users,
				'barcode' => $this->input->post('barcode',TRUE),
				'id_kategori' => $this->input->post('kategori',TRUE),
				'kode_produk' => $this->input->post('kode_produk',TRUE),
				'nama_produk' => $this->input->post('nama_produk',TRUE),
				'deskripsi' => $this->input->post('deskripsi',TRUE),
				'harga_beli' => $harga_beli,
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
            /*$row_pembelian = $this->db->where('id_toko', $this->input->post('id_toko',TRUE))
            						->where('id_faktur', $id_faktur)
            						->where('id_produk', $id_produk)
            						->get('pembelian')->row();*/
            $row_pembelian = $this->db->select('p.*')
            						  ->from('pembelian p')
            						  ->join('users u', 'p.id_users=u.id_users AND p.id_toko=u.id_toko')
            						  ->where('p.id_toko', $this->input->post('id_toko',TRUE))
            						  ->where('u.id_cabang', $this->userdata->id_cabang)
            						  ->get()->row();
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
            		'harga_satuan' => $harga_beli,
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
            redirect(site_url('admin/produk_retail'));
			}



        }
    }
    
    public function update($id) 
    {
        $row = $this->Produk_retail_model->get_by_id($id, $this->userdata->id_toko);
		$data_kategori = $this->db->select('kp.*')
		->from('kategori_produk kp')
	   
		->where('kp.id_toko', $this->userdata->id_toko)
		//->where('u.id_cabang', $this->userdata->id_cabang)								 
		->order_by('kp.nama_kategori', 'asc')
		->group_by('kp.id_kategori_2')
		->get();

		// $data_kategori = $this->db->select('kp.*, s.nama_supplier')
		// 						  ->from('kategori_produk kp')
		// 						  ->join('supplier s', 'kp.id_supplier=s.id_supplier AND kp.id_toko=s.id_toko')
		// 						  ->where('kp.id_toko', $this->userdata->id_toko)
		// 						  ->order_by('s.nama_supplier', 'asc')
		// 						  ->order_by('kp.nama_kategori', 'asc')
		// 						  ->get();
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
                'action' => site_url('admin/produk_retail/update_action'),
				'id_produk' => set_value('id_produk', $row->id_produk_2),
				'id_toko' => set_value('id_toko', $row->id_toko),
				'barcode' => set_value('barcode', $row->barcode),
				'kategori' => set_value('kategori', $row->id_kategori),
				'kode_produk' => set_value('kode_produk', $row->kode_produk),
				'nama_produk' => set_value('nama_produk', $row->nama_produk),
				'deskripsi' => set_value('deskripsi', $row->deskripsi),
				'harga_beli' => set_value('harga_beli', number_format($row->harga_beli,0,',','.')),
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
	        $this->view('produk/produk_retail_form', $data);

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/produk_retail'));
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
				'kode_produk' => $this->input->post('kode_produk',TRUE),
				'nama_produk' => $this->input->post('nama_produk',TRUE),
				'deskripsi' => $this->input->post('deskripsi',TRUE),
				'harga_beli' => str_replace(".","",$this->input->post('harga_beli',TRUE)),
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
            redirect(site_url('admin/produk_retail'));
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
            redirect(site_url('admin/produk_retail'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/produk_retail'));
        }
    }

    public function excel_rekap_bulan($bulan, $tahun, $jenis = 0)
    {
			$bulan = sprintf('%02d', $bulan);
			$this->load->helper('exportexcel');
			$namaFile = "PENJUALAN_".$bulan."_".$tahun.".xls";
			$judul = "PENJUALAN ".$bulan." ".$tahun."";
			$tablehead = 0;
			$tablebody = 1;
			$nourut = 1;

			$qty_high_produk = 0;
			$row_high = $this->db->select('o.id_orders_2, od.qty_produk, o.pembayaran')
													->from('orders o')
													->join('(SELECT id_orders_2, COUNT(id_produk) AS qty_produk FROM orders_detail GROUP BY id_orders_2) AS od', 'o.id_orders_2=od.id_orders_2')
													// ->join('laporan_order lo', 'o.no_faktur=lo.no_invoice AND o.id_sales=lo.id_cs')
													->where('SUBSTRING(o.tgl_order,7,4) = ', $tahun)
													->where('SUBSTRING(o.tgl_order,4,2) = ', $bulan)
													->group_by('o.no_faktur')
													->order_by('od.qty_produk', 'desc')
													->get()->row();
			if ($row_high) {
				$qty_high_produk = $row_high->qty_produk;
			}

			// penulisan header
			header("Pragma: public");
			header("Expires: 0");
			header("Cache-Control: must-revalidate,post-check=0,pre-check=0");
			header("Content-Type: application/force-download");
			header("Content-Type: application/octet-stream");
			header("Content-Type: application/download");
			header("Content-Disposition: attachment;filename=" . $namaFile . "");
			header("Content-Transfer-Encoding: binary ");

			$res_produk = $this->db->select('*')
														 ->from('produk_retail')
														 ->get()->result();

			xlsBOF();
			$kolomhead = 0;
			xlsWriteLabel($tablehead, $kolomhead++, "NO");
			xlsWriteLabel($tablehead, $kolomhead++, "TANGGAL");
			xlsWriteLabel($tablehead, $kolomhead++, "NO FAKTUR");
			xlsWriteLabel($tablehead, $kolomhead++, "JENIS");
			xlsWriteLabel($tablehead, $kolomhead++, "NAMA");
			xlsWriteLabel($tablehead, $kolomhead++, "ALAMAT");
			xlsWriteLabel($tablehead, $kolomhead++, "NO HP");
			if ($qty_high_produk >= 5) {
				xlsWriteLabel($tablehead, $kolomhead++, "NAMA BARANG");
				xlsWriteLabel($tablehead, $kolomhead++, "SUPPLIER");
				xlsWriteLabel($tablehead, $kolomhead++, "KATEGORI");
				xlsWriteLabel($tablehead, $kolomhead++, "QTY");
				xlsWriteLabel($tablehead, $kolomhead++, "SATUAN");
				xlsWriteLabel($tablehead, $kolomhead++, "HARGA");
			} else {
				foreach ($res_produk as $key_pr) :
					xlsWriteLabel($tablehead, $kolomhead++, $key_pr->nama_produk." QTY");
					xlsWriteLabel($tablehead, $kolomhead++, $key_pr->nama_produk." HARGA");
				endforeach;
			}
			xlsWriteLabel($tablehead, $kolomhead++, "ONGKIR");
			xlsWriteLabel($tablehead, $kolomhead++, "COD");
			xlsWriteLabel($tablehead, $kolomhead++, "BAYAR");
			xlsWriteLabel($tablehead, $kolomhead++, "BAYAR-COD");
			xlsWriteLabel($tablehead, $kolomhead++, "BANK");
			xlsWriteLabel($tablehead, $kolomhead++, "SALES");
			xlsWriteLabel($tablehead, $kolomhead++, "KODE");
			xlsWriteLabel($tablehead, $kolomhead++, "STATUS");
		
			$gb_res = 'o.no_faktur';
			if ($qty_high_produk >= 5) {
				$gb_res = 'od.id_orders';
			}

			$this->db->select('od.*, o.id_orders_2, o.tgl_order, o.ongkir, o.nominal, o.laba, o.bukan_member, o.id_sales, o.no_faktur, pr.barcode, pr.id_produk_2, pr.nama_produk, sp.satuan AS satuan, u.first_name, u.last_name, kp.nama_kategori, s.nama_supplier, o.bank, o.no_hp, o.biaya_lain, o.media, o.pembayaran');
			$this->db->from('orders_detail od');
			$this->db->join('(SELECT * FROM orders WHERE pembayaran!=5) AS o', 'od.id_orders_2=o.id_orders_2 AND o.id_toko=od.id_toko');
			$this->db->join('users u', 'o.id_sales=u.id_users');
			$this->db->join('produk_retail pr', 'od.id_produk=pr.id_produk_2 AND pr.id_toko=od.id_toko', 'left');
			$this->db->join('satuan_produk sp', 'pr.satuan=sp.id_satuan AND sp.id_toko=pr.id_toko', 'left');
			$this->db->join('kategori_produk kp', 'pr.id_kategori=kp.id_kategori_2 AND kp.id_toko=pr.id_toko', 'left');
			$this->db->join('supplier s', 'kp.id_supplier=s.id_supplier AND kp.id_toko=s.id_toko');
			// ->join('laporan_order lo', 'o.no_faktur=lo.no_invoice AND o.id_sales=lo.id_cs', 'left')
			// ->join('retur_jual_detail rjd', 'rjd.id_orders_detail=od.id_orders AND rjd.id_toko=od.id_toko', 'left')
			$this->db->where('SUBSTRING(o.tgl_order,7,4)=', $tahun);
			$this->db->where('SUBSTRING(o.tgl_order,4,2)=', $bulan);
			if ($jenis == "2") {
				$this->db->where('pr.id_kategori', 7);
			} else if ($jenis == "1") {
				$this->db->where('pr.id_kategori !=', 7);
			}
			// ->order_by('u.last_name', 'asc')
			$this->db->order_by('DATE(CONCAT(SUBSTRING(o.tgl_order,7,4),"-",SUBSTRING(o.tgl_order,4,2),"-",SUBSTRING(o.tgl_order,1,2))) ASC');
			$this->db->group_by($gb_res);
			$res = $this->db->get()->result();

			$array_jml = array();

			foreach ($res as $data) :
		    $biayacod = 0;
				$kolombody = 0;
				$harga_ppn = $data->harga_jual+($data->harga_jual*(10/100));
				$namaalamat = explode('-', $data->bukan_member);
				$getjenis = substr($data->no_faktur,0,1);
				if ($data->media == 1) {
					$jenis ='Whatsapp';
				} else if($data->media == 2) {
					$jenis ='Shopee';
				} else if($data->media == 3) {
					$jenis ='Tokopedia';
				} else if($data->media == 4) {
					$jenis ='COD';
					$biayacod = $data->biaya_lain;
				} else{
					$jenis ='Lainnya';
				}
				
				if($data->bank==1){
				    $namabank = 'BRI';
				}else if($data->bank==3){
				    $namabank = 'BCA';
				}else if($data->bank==4){
				    $namabank = 'MANDIRI';
				}else {
				    $namabank = '-';
				}
				
				if ($data->media == 4) {
				    $namabank = '-';
				}
		
				$bayar      = $data->nominal+$data->ongkir+$biayacod;
				$bayarnocod = $data->nominal+$data->ongkir;
				xlsWriteNumber($tablebody, $kolombody++, $nourut);
		    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_order);
		    xlsWriteLabel($tablebody, $kolombody++, $data->no_faktur);
		    xlsWriteLabel($tablebody, $kolombody++, $jenis);
		    xlsWriteLabel($tablebody, $kolombody++, $namaalamat[0]);
		    xlsWriteLabel($tablebody, $kolombody++, $namaalamat[1]);
		    xlsWriteLabel($tablebody, $kolombody++, $data->no_hp);
				if ($qty_high_produk >= 5) {
					xlsWriteLabel($tablebody, $kolombody++, $data->nama_produk);
					xlsWriteLabel($tablebody, $kolombody++, $data->nama_supplier);
					xlsWriteLabel($tablebody, $kolombody++, $data->nama_kategori);
					xlsWriteNumber($tablebody, $kolombody++, $data->jumlah);
					xlsWriteLabel($tablebody, $kolombody++, $data->satuan);
					xlsWriteNumber($tablebody, $kolombody++, $data->harga_jual);
				} else {
					foreach ($res_produk as $key_pr) {
						$jumlah = 0;
						$harga = 0;
						$row_od = $this->db->select('SUM(od.jumlah) AS jumlah, od.harga_jual')
														->from('orders_detail od')
														->where('od.id_orders_2', $data->id_orders_2)
														->where('od.id_produk', $key_pr->id_produk_2)
														->get()->row();
						if ($row_od) {
							$jumlah = $row_od->jumlah;
							$harga = $row_od->harga_jual;
						}
						if (empty($array_jml[$key_pr->id_produk_2]['jumlah'])) {
							$array_jml[$key_pr->id_produk_2]['jumlah'] = 0;
							$array_jml[$key_pr->id_produk_2]['harga'] = 0;
						}
						$array_jml[$key_pr->id_produk_2]['jumlah'] += $jumlah;
						$array_jml[$key_pr->id_produk_2]['harga'] += $harga;
						xlsWriteNumber($tablebody, $kolombody++, $jumlah);
						xlsWriteNumber($tablebody, $kolombody++, $harga);
					}
				}
			
		    xlsWriteNumber($tablebody, $kolombody++, $data->ongkir);
		    xlsWriteNumber($tablebody, $kolombody++, $biayacod);
		    xlsWriteNumber($tablebody, $kolombody++, $bayar);
		    xlsWriteNumber($tablebody, $kolombody++, $bayarnocod);
		    xlsWriteLabel($tablebody, $kolombody++, $namabank);
		    xlsWriteLabel($tablebody, $kolombody++, $data->first_name);
		    xlsWriteLabel($tablebody, $kolombody++, $data->last_name);
		    
		    $statusMap = array(
		    		"1"=>"Menunggu Di Verifikasi",
		    		"2"=>"Di Verifikasi",
		    		"3"=>"Di Kirim",
		    		"4"=>"Selesai",
		    		"5"=>"Retur COD",
		    		"6"=>"Retur Garansi"
		    	);
		    xlsWriteLabel($tablebody, $kolombody++, $statusMap[$data->pembayaran]);
	    	$tablebody++;
				$nourut++;
			endforeach;

			if ($qty_high_produk < 5) {
				$tablebody++;
				$kolomfoot = 6;
				xlsWriteLabel($tablebody, $kolomfoot++, "TOTAL");
				foreach ($res_produk as $key_pr) {
					xlsWriteNumber($tablebody, $kolomfoot++, $array_jml[$key_pr->id_produk_2]['jumlah']);
					xlsWriteNumber($tablebody, $kolomfoot++, $array_jml[$key_pr->id_produk_2]['harga']);
				}
			}
			
			xlsEOF();
			
			// delete jurnal //
			$awal = date('Y-m').'-'.sprintf('%02d', (date('d')*1)-1);
			$bln = sprintf('%02d', $bulan);
			$this->db->where('SUBSTRING(kode,1,14)="VER-PEMBAYARAN"');
			$this->db->where('DATE(CONCAT(SUBSTRING(tgl,7,4),"-",SUBSTRING(tgl,4,2),"-",SUBSTRING(tgl,1,2))) BETWEEN "'.$awal.'" AND "'.date('Y-m-d').'"');
			$this->db->delete('jurnal');
			
			// insert jurnal //
			//$this->action_jurnal($awal, date('Y-m-d'));
			
			exit();
    }

  public function action_jurnal($awal_periode, $akhir_periode)
  {
    $this->load->model('Pengaturan_transaksi_model');
    $res_orders = $this->_get_orders_by_date($awal_periode, $akhir_periode);
    foreach ($res_orders as $k_o) :
      $res_od = $this->_get_orders_detail($k_o->id_orders_2);
      
      echo $k_o->tgl_order." :: ".$k_o->no_faktur."<br>";
      echo "<hr>";

      $jml_hpp = 0;
      $jml_sub = 0;
      foreach ($res_od as $k_od) {
        $jml_hpp += $k_od->harga_beli*$k_od->jumlah;
        $jml_sub += $k_od->sub_total;
        $laba = $k_od->sub_total-($k_od->harga_beli*$k_od->jumlah);
        /* echo "Nama Produk : ".$k_od->nama_produk."<br>";
        echo "Harga Beli : ".$k_od->harga_beli."<br>";
        echo "Jumlah : ".$k_od->jumlah."<br>";
        // echo "Harga Jual : ".$k_od->harga_jual."<br>";
        echo "Nominal : ".$k_od->sub_total."<br>";
        echo "Laba : ".$laba."<br>";
        echo ""; */
      }
      /*echo "HPP : ".$jml_hpp."<br>";
      echo "NOMINAL : ".$jml_sub."<br>";
      echo "<br><br><br>";*/

      /* $data_update = array(
        'laba' => $jml_sub-$jml_hpp,
      );
      $this->db->where('id_orders_2', $k_o->id_orders_2);
      $this->db->update('orders', $data_update); */

      $row_bayar = (Object) array();

      $jml_subtotal = $jml_sub;
      $row_bayar->ongkir = $k_o->ongkir;
      $id_tbl_order = $k_o->id_orders_2;
      $id_bank = $k_o->bank;
      $jml_hpp = $jml_hpp;
      
      $media = $k_o->media;
      $no_invoice = $k_o->no_faktur;
      $biaya_lain = $k_o->biaya_lain;
      $nominal_ongkir = $k_o->nominal_la-$biaya_lain;
      $tgl = $k_o->tgl_order;

		  eval($this->Pengaturan_transaksi_model->accounting('verifikasibayar'));

    endforeach;
  }

  function _get_orders_by_date($start, $end)
  {
    $this->db->select('o.*');
    $this->db->from('orders o');
    // $this->db->join('laporan_order lo', 'o.no_faktur=lo.no_invoice');
    $this->db->where('DATE(CONCAT(SUBSTRING(o.tgl_order,7,4),"-",SUBSTRING(o.tgl_order,4,2),"-",SUBSTRING(o.tgl_order,1,2))) BETWEEN "'.$start.'" AND "'.$end.'"');
    // $this->db->where('o.laba IS NULL');
    return $this->db->get()->result();
  }

  public function _get_orders_detail($id_orders)
  {
    $this->db->select('od.*, pr.nama_produk, pr.harga_beli');
    $this->db->from('orders_detail od');
    $this->db->join('produk_retail pr', 'od.id_produk=pr.id_produk_2');
    $this->db->where('od.id_orders_2', $id_orders);
    return $this->db->get()->result();
  }

    public function _rules() 
    {
		$this->form_validation->set_rules('id_toko', 'id toko', 'trim|required');
// 		$this->form_validation->set_rules('barcode', 'barcode', 'trim|required');
		$this->form_validation->set_rules('barcode', 'imei', 'trim|required');
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
		$this->form_validation->set_rules('satuan', 'satuan', 'trim|required');
		$this->form_validation->set_rules('kode_produk', 'kode produk', 'trim|required');
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

		foreach ($this->Produk_retail_model->get_by_id_toko($this->userdata->id_toko) as $data) {
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
            'produk_retail_data' => $this->Produk_retail_model->get_by_id_toko($this->userdata->id_toko),
            'start' => 0
        );
        $this->load->view('admin/produk/produk_retail_doc',$data);
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
		$this->load->view('admin/produk/cetak_label_barcode', $data);
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
	        	$row_produk = $this->db->select('*')
	        						   ->from('produk_retail')
	        						   ->where('id_toko', $this->userdata->id_toko)
	        						   ->where('id_produk_2', $id_produk_2)
	        						  //  ->where($field, $old_record)
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
						// $row_beli = $this->db->select('*')
						// 					->from('pembelian')
						// 					->where('id_toko', $this->userdata->id_toko)
						// 					->where('id_produk', $id_produk_2)
						// 					->get()->row();
						// if ($row_beli) {
						// 	$data_beli = array(
						// 		'harga_satuan' => $new_record
						// 	);
						// 	if ($stok_baru!=null) {
						// 		$data_beli['jumlah'] = $stok_baru;
						// 		$data_beli['total_bayar'] = $new_record * $stok_baru;
						// 	}
						// 	$this->Pembelian_retail_model->update($row_beli->id_pembelian, $data_beli);
						// }
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
			$this->view('produk/edit_semua', $data);
    }

	public function create_varian($id_produk_2)
	{
		$data = array(
			'produk' => ($id_produk_2) ? $this->Produk_retail_model->get_by_id($id_produk_2) : new stdClass(),
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
// 		var_dump($data);
		$this->view('produk/produk_retail_form', $data);
		// $this->view('produk/produk_varian_form', $data);
	}

	public function generate_varian($id_produk_2)
	{
		$data = array(
			'produk' => ($id_produk_2) ? $this->Produk_retail_model->get_by_id($id_produk_2) : new stdClass(),
		);
		$this->view('produk/produk_varian_generate_form', $data);
	}
	public function generate_varian_action($id_produk_2)
	{
		$this->db->trans_start();
		$this->load->model('Upload_model');

		$produk = $this->db->where('id_produk_2', $id_produk_2)->where('id_toko', $this->userdata->id_toko)->get('produk_retail')->row();
		$varians = $this->input->post('nama_produk');
		$gambars = $_FILES['gambar'];
		$nama_produk =  $produk->nama_produk;

		$uploaded_files = $this->Upload_model->mupload_files('assets/gambar_produk', '', $gambars);

		$i = 0;
		foreach ($varians as $varian) {
			$produk_query = $this->db->where('id_toko', $this->userdata->id_toko)->from('produk_retail')->order_by('id_produk_2', 'DESC')->get_compiled_select();
			$last_id = $this->db->query("{$produk_query} FOR UPDATE")->row();

			$output = $produk;
			$output->nama_produk =  $nama_produk . ' - ' . $varian;
			$output->id_produk  = null;
			$output->id_produk_2 = $last_id->id_produk_2 + 1;
			$output->parent_id = $id_produk_2;

			//upload gambar
			$gambar_file = $uploaded_files[$i];

			$output->gambar = !empty($gambar_file) ? $gambar_file : $produk->gambar;

			$this->db->insert('produk_retail', $output);

			$i++;
		}
		$this->db->trans_complete();

		$this->session->set_flashdata('message', 'Produk varian berhasil disimpan');
		redirect(site_url('admin/produk_retail/index/' . $id_produk_2));
	}
}

/* End of file Produk_retail.php */
/* Location: ./application/controllers/Produk_retail.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-07-26 06:49:27 */
/* http://harviacode.com */