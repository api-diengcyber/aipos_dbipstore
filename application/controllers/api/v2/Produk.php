<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('Xjson');
    }
    
    public function index()
    {
        
    }

    public function generate_barcode() {
        $this->xjson->openHeaders();
		$this->xjson->nocrypt();
        $this->xjson->keyc();

        $id_toko = $this->input->post('id_toko');

    	$barcode_generator = mt_rand(100000, 999999).date("is");
        
        $res = $this->db->where('barcode', $barcode_generator)->get('produk_retail')->row();

    	if($res == 0){
			$data = $barcode_generator;
    	} else {
    		$data = "";
    	}

        $this->xjson->ok("Sukses");
		$this->xjson->add("data", $data);
		$this->xjson->result();
    }

    public function save() {
        $this->xjson->openHeaders();
		$this->xjson->nocrypt();
        $this->xjson->keyc();

        $id_toko = $this->input->post('id_toko');

        if(empty($this->input->post('id_produk_2'))){
            //insert produk
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
            $row_faktur = $this->db->where('id_toko', $id_toko)->order_by('id_faktur', 'desc')->get('faktur_retail')->row();
            $id_faktur = "";
            if($row_faktur){
                // jika ada faktur //
                $id_faktur = $row_faktur->id_faktur;
            } else {
                // insert //
                $row_last_faktur = $this->db->select('id_faktur')
                                            ->from('faktur_retail')
                                            ->where('id_toko', $id_toko)
                                            ->order_by('id_faktur', 'desc')
                                            ->get()->row();
                $id_faktur = 1;
                if ($row_last_faktur) {
                    $id_faktur = $row_last_faktur->id_faktur+1;
                }
                $data_faktur = array(
                    'id_faktur' => $id_faktur,
                    'id_toko' => $this->input->post('id_toko',TRUE),
                    'tgl' => date('d-m-Y'),
                    'no_faktur' => 'FAKTUR01',
                );
                $this->db->insert('faktur_retail', $data_faktur);
                
            }
            /* faktur */
            $id_module = 2;
            if ($id_module == '1') {
                // versi free
                $harga3 = str_replace(".","",$this->input->post('harga_2',TRUE)); 
            } else {
                $harga3 = str_replace(".","",$this->input->post('harga_3',TRUE));
            }

            $row_last_produk = $this->db->select('*')
                                        ->from('produk_retail')
                                        ->where('id_toko', $id_toko)
                                        ->order_by('id_produk_2', 'desc')
                                        ->get()->row();
            $id_produk = 1;
            if ($row_last_produk) {
                $id_produk = $row_last_produk->id_produk_2+1;
            }

            $data = array(
                'id_produk_2' => $id_produk,
                'id_toko' => $this->input->post('id_toko',TRUE),
                'barcode' => $this->input->post('barcode',TRUE),
                'id_kategori' => $this->input->post('id_kategori',TRUE),
                'nama_produk' => $this->input->post('nama_produk',TRUE),
                'deskripsi' => $this->input->post('deskripsi',TRUE),
                'harga_1' => str_replace(".","",$this->input->post('harga_1',TRUE)),
                'harga_2' => str_replace(".","",$this->input->post('harga_2',TRUE)),
                'harga_3' => $harga3,
                'satuan' => $this->input->post('satuan',TRUE),
                'berat' => $this->input->post('berat',TRUE),
                'mingros' => $this->input->post('mingros',TRUE),
                'diskon' => $this->input->post('diskon',TRUE),
                'rak' => $this->input->post('rak',TRUE),
                'dibeli' => '0',
                'gambar' => $nm_gambar,
            );

            $this->db->insert('produk_retail', $data);

            /* Pembelian */
            $row_pembelian = $this->db->where('id_toko', $this->input->post('id_toko',TRUE))
                                    ->where('id_faktur', $id_faktur)
                                    ->where('id_produk', $id_produk)
                                    ->get('pembelian')->row();
            if ($row_pembelian) {
                $id_beli = $row_pembelian->id_pembelian;
            } else {
                $row_last_beli = $this->db->where('id_toko', $id_toko)->order_by('id_pembelian', 'desc')->get('pembelian')->row();
                $id_pembelian = 1;
                if ($row_last_beli) {
                    $id_pembelian = $row_last_beli->id_pembelian+1;
                }
                $data_beli = array(
                    'id_pembelian' => $id_pembelian,
                    'id_toko' => $this->input->post('id_toko',TRUE),
                    'id_faktur' => $id_faktur,
                    'id_produk' => $id_produk,
                    'tgl_masuk' => date('d-m-Y'),
                    'pembayaran' => '1',
                    'harga_satuan' => '0',
                    'jumlah' => '0',
                    'total_bayar' => '0',
                );
                $this->db->insert('pembelian', $data_beli);
                $id_beli = $id_pembelian;
            }
            /* Pembelian */

            $data_stok = array(
                'id_pembelian' => $id_beli,
                'id_produk' => $id_produk,
                'id_toko' => $this->input->post('id_toko',TRUE),
                'stok' => '0',
            );
            $this->db->insert('stok_produk', $data_stok);
            

            $output = $this->db->select('*,CONCAT("'.base_url('/assets/gambar_produk/').'",gambar) as url_gambar')->where('id_produk_2', $id_produk)->get('produk_retail')->row();
        } else {
            //update produk
            if(isset($_FILES['gambar'])){
                $config['upload_path'] = 'assets/gambar_produk/';
                $config['allowed_types'] = 'gif|jpeg|png|jpg';
                $config['max_size']  = '1000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';
                
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('gambar')){
                    $error = array('error' => $this->upload->display_errors());
                    $nm_gambar = $this->input->post('old_gambar',TRUE);
                } else{
                    $old = $this->input->post('old_gambar');
                    
                    //$this->upload->do_upload('gambar');
                    $data_image = $this->upload->data();
                    $nm_gambar = $data_image['file_name'];

                    if(!empty($old) && file_exists('assets/gambar_produk/'.$old)){
                        unlink($config['upload_path'].$this->input->post('old_gambar',TRUE));
                    }
                }
            } else {
                $nm_gambar = $this->input->post('old_gambar',TRUE);
            }
            // upsdatew gambar //

            $data = array(
				'id_toko' => $this->input->post('id_toko',TRUE),
				'barcode' => $this->input->post('barcode',TRUE),
				'id_kategori' => $this->input->post('id_kategori',TRUE),
				'nama_produk' => $this->input->post('nama_produk',TRUE),
				'deskripsi' => $this->input->post('deskripsi',TRUE),
				'harga_1' => str_replace(".","",$this->input->post('harga_1',TRUE)),
				'harga_2' => str_replace(".","",$this->input->post('harga_2',TRUE)),
				'harga_3' => str_replace(".","",$this->input->post('harga_3',TRUE)),
				'satuan' => $this->input->post('satuan',TRUE),
				'berat' => $this->input->post('berat',TRUE),
				'mingros' => $this->input->post('mingros',TRUE),
				'diskon' => $this->input->post('diskon',TRUE),
				'rak' => $this->input->post('rak',TRUE),
				'gambar' => $nm_gambar,
            );
            $this->db->where('id_produk_2', $this->input->post('id_produk'));
            $this->db->update('produk_retail', $data);
            
            $output = $this->db->select('*,CONCAT("'.base_url('/assets/gambar_produk/').'",gambar) as url_gambar')->where('id_produk_2',$this->input->post('id_produk_2'))->get('produk_retail')->row();
            
        }

        $this->xjson->ok("Sukses");
		$this->xjson->add("data", $output);
		$this->xjson->result();
    }

    public function update_stok() {
        $this->xjson->openHeaders();
		$this->xjson->nocrypt();
        $this->xjson->keyc();

        $id_toko = $this->input->post('id_toko');
		$id_produk = $this->input->post('id_produk_2', true);
		$tambah_stok = $this->input->post('tambah_stok', true);
		$harga_beli = str_replace(".","",$this->input->post('harga_satuan', true));
		$row = $this->db->where('id_produk_2', $id_produk)->where("id_toko",$id_toko)->get('produk_retail')->row();
        
		$data_json = array();
		$data_json['stok'] = "";
		if($row){
			$row_stok = $this->db->select('*')
								 ->from('stok_produk')
								 ->where('id_toko', $id_toko)
								 ->where('id_produk', $id_produk)
								 ->get()->row();
			$row_beli = $this->db->select('*')
								 ->from('pembelian')
								 ->where('id_toko', $id_toko)
								 ->where('id_produk', $id_produk)
                                 ->get()->row();

            $stok_baru = 0;                
            if(!empty($row_stok)) {
                $stok_baru = $row_stok->stok + $tambah_stok;
                if($stok_baru >= 0){
                    $stok_baru = $stok_baru;
                } else {
                    $stok_baru = 0;
                }
                
                $data_stok = array(
                    'stok' => $stok_baru,
                );
                $this->db->where('id', $row_stok->id);
                $this->db->update('stok_produk', $data_stok);
            }else{
                $stok_baru = $tambah_stok;
                $data = array(
                    "id_produk"=>$id_produk,
                    "id_toko"=>$id_toko,
                    "stok"=>$stok_baru
                );
                $this->db->insert('stok_produk', $data);
            }

			if(!empty($row_beli)) {
                $data_beli = array(
                    'harga_satuan' => $harga_beli,
                    'jumlah' => $stok_baru,
                    'total_bayar' => $harga_beli * $stok_baru,
                );
                $this->db->where('id_pembelian', $row_beli->id_pembelian);
                $this->db->update('pembelian', $data_beli);
            }else{
                $row_last_faktur = $this->db->select('id_faktur')
                                            ->from('faktur_retail')
                                            ->where('id_toko', $id_toko)
                                            ->order_by('id_faktur', 'desc')
                                            ->get()->row();
                $id_faktur = 1;
                if ($row_last_faktur) {
                    $id_faktur = $row_last_faktur->id_faktur+1;
                }
                $data_faktur = array(
                    'id_faktur' => $id_faktur,
                    'id_toko' => $this->input->post('id_toko',TRUE),
                    'tgl' => date('d-m-Y'),
                    'no_faktur' => 'FAKTUR01',
                );
                $this->db->insert('faktur_retail', $data_faktur);

                $data_beli = array(
                    'id_produk'=>$id_produk,
                    'id_faktur'=>$id_faktur,
                    'id_toko'=>$id_toko,
                    'harga_satuan' => $harga_beli,
                    'jumlah' => $stok_baru,
                    'total_bayar' => $harga_beli * $stok_baru,
                );
                $this->db->insert('pembelian', $data_beli);
            }
			
                        
			$data_json['stok'] = $stok_baru;
        }
        
        $this->xjson->ok("Sukses");
		$this->xjson->add("data", $data_json);
		$this->xjson->result();
    }

}

/* End of file Produk.php */
