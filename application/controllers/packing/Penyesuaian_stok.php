<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penyesuaian_stok extends AI_Admin {

	public function __construct()
	{
		parent::__construct();
		if ($this->userdata->level != '1' && $this->userdata->level != '3') {
			redirect(site_url(), 'refresh');
		}
	}

	public function index()
	{
        $tgl = $this->input->post('tgl', true);
        if (empty($tgl)) {
            $tgl = date('d-m-Y');
        }
		$data = array(
			'active_penyesuaian_stok' => 'active',
			'action' => site_url('admin/penyesuaian_stok/buat_so'),
            'tgl' => $tgl,
            'data_so' => $this->db->select('ssi.*, u.first_name, u.last_name')->from('stok_so_info ssi')->join('users u', 'ssi.id_users=u.id_users AND ssi.id_toko=u.id_toko', 'left')->get()->result(),
            'data_cabang' => $this->db->where('level=3')->where('id_toko', $this->userdata->id_toko)->get('users')->result(),
			// 'data_gudang' =>$this->db->where('id_toko', $this->userdata->id_toko)->get('gudang')->result(),
		);
		$this->view('produk/penyesuaian_stok', $data);
    }
    
    public function buat_so()
    {
        $tgl = $this->input->post("tgl", true);
        $array_insert = array(
            'tgl_so' => $tgl,
            'id_toko' => $this->userdata->id_toko,
            'id_users' => $this->input->post('cabang', true),
        ); 
        $this->db->insert('stok_so_info', $array_insert);
        redirect('admin/penyesuaian_stok','refresh');
    }

    public function lihat($id = '')
    {
        // $this->Tampilan_retail_model->admin();
         $row = $this->db->select('ssi.*, u.first_name, u.last_name')
                        ->from('stok_so_info ssi')
                        ->join('users u', 'ssi.id_users=u.id_users AND ssi.id_toko=u.id_toko')
                        ->where('ssi.id_toko', $this->userdata->id_toko)
                        ->where('ssi.id', $id)
                        ->get()->row(); 
        // $row = $this->db->select('ssi.*, g.nama_gudang')
        //                 ->from('stok_so_info ssi')
        //                 ->join('gudang g', 'ssi.id_users=g.id AND ssi.id_toko=g.id_toko')
        //                 ->where('ssi.id_toko', $this->userdata->id_toko)
        //                 ->where('ssi.id', $id)
        //                 ->get()->row();
        if (!$row) {
            redirect('admin/penyesuaian_stok');
        }
        $data = array(
            'active_penyesuaian_stok' => 'active',
            'id_stok_info' => $id,
            'tgl' => $row->tgl_so,
            'cabang' => $row->id_users,
            'nama_cabang' => $row->first_name.' '.$row->last_name,
            'lihat' => true,
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
        $this->view('produk/penyesuaian_stok_edit', $data);
    }

    public function edit($id = '')
    {
        // $this->Tampilan_retail_model->admin();
		$row = $this->db->select('ssi.*, u.first_name, u.last_name')
                        ->from('stok_so_info ssi')
                        ->join('users u', 'ssi.id_users=u.id_users AND ssi.id_toko=u.id_toko')
                        ->where('ssi.id_toko', $this->userdata->id_toko)
                        ->where('ssi.id', $id)
                        ->get()->row(); 
        // $row = $this->db->select('ssi.*, g.nama_gudang')
        //                 ->from('stok_so_info ssi')
        //                 ->join('gudang g', 'ssi.id_users=g.id AND ssi.id_toko=g.id_toko')
        //                 ->where('ssi.id_toko', $this->userdata->id_toko)
        //                 ->where('ssi.id', $id)
        //                 ->get()->row();
        if (!$row) {
            redirect('admin/penyesuaian_stok');
        }
        $data = array(
            'active_penyesuaian_stok' => 'active',
            'id_stok_info' => $id,
            'tgl' => $row->tgl_so,
            'cabang' => $row->id_users,
            'nama_cabang' => $row->first_name.' '.$row->last_name,
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
        $this->view('produk/penyesuaian_stok_edit', $data);
    }

    public function simpan_produk()
    {
        header('Content-Type: application/json');
        
        $cabang = $this->input->post('cabang', true);
        $id_stok_info = $this->input->post('id_stok_info', true);
        $data = $this->input->post('data', true);
        $decode = (array) json_decode($data);

        $row = $this->db->select('ssi.*, u.first_name, u.last_name')
                        ->from('stok_so_info ssi')
                        ->join('users u', 'ssi.id_users=u.id_users AND ssi.id_toko=u.id_toko')
                        ->where('ssi.id_toko', $this->userdata->id_toko)
                        ->where('ssi.id_users', $cabang)
                        ->where('ssi.id', $id_stok_info)
                        ->get()->row();
        if (!$row) {
            redirect('admin/penyesuaian_stok');
        }

        foreach ($decode as $key) {
            $id_produk_2 = $key[0];
            $field = $key[1];
            $old_record = $key[2];
            $new_record = $key[3];
            $stok = $key[4];
            $row2 = $this->db->where('id_stok_info', $id_stok_info)->where('id_toko', $this->userdata->id_toko)->where('id_users', $cabang)->where('id_produk', $id_produk_2)->order_by('id', 'desc')->get('stok_so')->row();
            if ($field=='stok_so') {
                if ($row2) {
                    $data_update = array(
                        // 'id_users' => $cabang,
                        'id_stok_info' => $row->id,
                        'stok_so' => $new_record,
                        'penyesuaian' => $new_record-$stok,
                    );
                    $this->db->where('id', $row2->id);
                    $this->db->update('stok_so', $data_update);
                } else {
                    $data_insert = array(
                        'id_toko' => $this->userdata->id_toko,
                        'id_stok_info' => $row->id,
                        'id_users' => $cabang,
                        'tgl_so' => $row->tgl_so,
                        'id_produk' => $id_produk_2,
                        'stok_so' => $new_record,
                        'penyesuaian' => $new_record-$stok,
                    );
                    $this->db->insert('stok_so', $data_insert);
                }
            } else if ($field == 'penyesuaian') {
            }
        }
        echo json_encode($decode);
    }

    public function simpan($id = '')
    {
        // $res_so = $this->db->where('id_toko', $this->userdata->id_toko)->where('id', $id)->get('stok_so')->result();
        // foreach ($res_so as $key) {
        //     $this->_restok($key->id_produk, $key->stok_so);
        // }
        $data_update = array(
        	'status' => 1,
        );
        $this->db->where('id_toko', $this->userdata->id_toko);
        $this->db->where('id', $id);
        $this->db->update('stok_so_info', $data_update);
        $data_update = array(
        	'verifikasi' => 1,
        );
        $this->db->where('id_toko', $this->userdata->id_toko);
        $this->db->where('id_stok_info', $id);
        $this->db->update('stok_so', $data_update);
        redirect('admin/penyesuaian_stok','refresh');
    }

    function _restok($id_produk, $stok_so)
    {
        $no = 0;
        $res_stok = $this->db->where('id_produk', $id_produk)->order_by('id', 'asc')->get('stok_produk')->result();
        foreach ($res_stok as $key) {
            if ($no == 0) {
                $data_update = array(
                    'stok' => $stok_so
                );
            } else {
                $data_update = array(
                    'stok' => 0
                );
            }
            $this->db->where('id', $key->id);
            $this->db->update('stok_produk', $data_update);
            $no++;
        }
    }

    public function mig_stok_jual()
    {
    	$res = $this->db->select('o.tgl_order, od.id_produk, SUM(od.jumlah) AS jumlah')
    					->from('orders o')
    					->join('orders_detail od', 'o.id_orders_2=od.id_orders_2')
    					->where('DATE(CONCAT(SUBSTRING(o.tgl_order,7,4),"-",SUBSTRING(o.tgl_order,4,2),"-",SUBSTRING(o.tgl_order,1,2))) >= "2020-01-01"')
    					->group_by('od.id_produk')
    					->get()->result();
    	foreach ($res as $key) {
    		$row_stok = $this->db->select('*')
    							 ->from('stok_produk')
    							 ->where('id_produk', $key->id_produk)
    							 ->where('stok > 0')
    							 ->order_by('id', 'desc')
    							 ->get()->row();
    		if ($row_stok) {
	    		$data_update = array(
	    			'stok' => $row_stok->stok-$key->jumlah,
	    		);
	    		$this->db->where('id', $row_stok->id);
	    		$this->db->update('stok_produk', $data_update);
    		}
    	}
    }

    public function mig_stok()
    {
    	$res = $this->db->select('o.tgl_order, od.jumlah, od.jumlah_bonus, od.json, pr.nama_produk')
    					->from('orders o')
                        ->join('orders_detail od', 'o.id_orders_2=od.id_orders_2 AND o.id_toko=od.id_toko')
                        ->join('produk_retail pr', 'od.id_produk=pr.id_produk_2 AND od.id_toko=pr.id_toko')
                        ->where('RIGHT(o.tgl_order,7)=', "01-2020")
                        ->group_by('od.id_orders')
    					->get()->result();
    	foreach ($res as $key):
            echo $key->tgl_order." >> ".$key->nama_produk."<br>";
            echo $key->jumlah." + ".$key->jumlah_bonus." = ".($key->jumlah+$key->jumlah_bonus)."<br>";
    		$jd = (array) json_decode($key->json);
    		foreach ($jd as $id_beli => $qty) {
    			$row_beli = $this->db->select('p.jumlah, sp.stok')
                                     ->from('pembelian p')
                                     ->join('stok_produk sp', 'p.id_pembelian=sp.id_pembelian AND sp.id_toko=p.id_toko')
    								 ->where('p.id_pembelian', $id_beli)
                                     ->get()->row();
                echo "ID_PEMBELIAN : ".$id_beli."<br>";
                echo "<pre>";
                print_r ($row_beli);
                echo "</pre>";
    		}
    		echo "<hr>";
    	endforeach;
    }

    public function unduh_excel($id = '')
    {
        $row = $this->db->select('ssi.*, u.first_name, u.last_name')
                        ->from('stok_so_info ssi')
                        ->join('users u', 'ssi.id_users=u.id_users AND ssi.id_toko=u.id_toko')
                        ->where('ssi.id_toko', $this->userdata->id_toko)
                        ->where('ssi.id', $id)
                        ->get()->row();
        if (!$row) {
            redirect('admin/penyesuaian_stok');
        }
        $this->load->model('Mutasi_stok_model');
        $this->load->helper('exportexcel');
        $namaFile = "penyesuaian_stok.xls";
        $judul = "penyesuaian_stok";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        // penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate,post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=".$namaFile."");
        header("Content-Transfer-Encoding: binary ");
        xlsBOF();
        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "NO");
        xlsWriteLabel($tablehead, $kolomhead++, "TANGGAL");
        xlsWriteLabel($tablehead, $kolomhead++, "BARCODE");
        xlsWriteLabel($tablehead, $kolomhead++, "KATEGORI");
        xlsWriteLabel($tablehead, $kolomhead++, "NAMA BARANG");
        xlsWriteLabel($tablehead, $kolomhead++, "STOK SO");

        $this->db->select('pr.*, sp.satuan AS satuan_produk, kp.nama_kategori, '.$this->Mutasi_stok_model->select_stok_mutasi().', IFNULL(sso2.stok_so,0) AS stok_so');
        $this->db->from('produk_retail pr');
        $this->db->join('satuan_produk sp', 'pr.satuan=sp.id_satuan AND sp.id_toko=pr.id_toko', 'left');
        $this->db->join('kategori_produk kp', 'pr.id_kategori=kp.id_kategori_2 AND kp.id_toko=pr.id_toko', 'left');
        $this->Mutasi_stok_model->query_stok_mutasi($this->db, $this->userdata->id_toko, null, 'pr.id_produk_2');
        $this->db->join('(SELECT * FROM stok_so WHERE id_stok_info="'.$id.'" ORDER BY DATE(CONCAT(SUBSTRING(tgl_so,7,4),"-",SUBSTRING(tgl_so,4,2),"-",SUBSTRING(tgl_so,1,2))) DESC, id DESC) AS sso2', 'sso2.id_produk=pr.id_produk_2 AND sso2.id_toko="'.$this->userdata->id_toko.'"', 'left');
        $this->db->where('pr.id_toko', $this->userdata->id_toko);
        $res = $this->db->get()->result();
        
        $nourut = 1;
        foreach ($res as $data) :
            $kolombody = 0;
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
		    xlsWriteLabel($tablebody, $kolombody++, $row->tgl_so);
		    xlsWriteLabel($tablebody, $kolombody++, $data->barcode);
		    xlsWriteLabel($tablebody, $kolombody++, $data->nama_kategori);
		    xlsWriteLabel($tablebody, $kolombody++, $data->nama_produk);
		    xlsWriteLabel($tablebody, $kolombody++, $data->stok_so);
	    	$tablebody++;
            $nourut++;
        endforeach;
        xlsEOF();
        exit();
    }

    public function import_excel()
    {
        $id = $this->input->post('id', true);
        $row = $this->db->select('ssi.*, u.first_name, u.last_name')
                        ->from('stok_so_info ssi')
                        ->join('users u', 'ssi.id_users=u.id_users AND ssi.id_toko=u.id_toko')
                        ->where('ssi.id_toko', $this->userdata->id_toko)
                        ->where('ssi.id', $id)
                        ->get()->row();
        if (!$row) {
            redirect('admin/penyesuaian_stok');
        }
    	$tmp_name = $_FILES['file']['tmp_name'];
    	$name = 'penyesuaian_'.$_FILES['file']['name'];
    	if (move_uploaded_file($tmp_name, 'assets/excel/'.$name)) {
            $ret = $this->f_import_excel('assets/excel/'.$name, $this->userdata->id_toko, $row->id_users, $row->id);
            
            redirect('admin/penyesuaian_stok');
        } else {
            redirect('admin/penyesuaian_stok');
        }
    }

    function get_produk_by_barcode($id_toko, $id_users, $barcode)
    {
        $this->load->model('Mutasi_stok_model');
        $this->db->select('pr.*, sp.satuan AS satuan_produk, '.$this->Mutasi_stok_model->select_stok_mutasi2());
        $this->db->from('produk_retail pr');
        $this->db->join('satuan_produk sp', 'pr.satuan=sp.id_satuan AND sp.id_toko=pr.id_toko', 'left');
        $this->Mutasi_stok_model->query_stok_mutasi($this->db, $id_toko, $id_users, 'pr.id_produk_2');
        $this->db->where('pr.id_toko', $id_toko);
        $this->db->where('pr.barcode', $barcode);
        return $this->db->get()->row();
    }

    function f_import_excel($file_input, $id_toko, $id_users, $id)
    {
        $this->load->library("PHPExcel");
        ini_set('memory_limit', '-1');
        try {
            $objPHPExcel= PHPExcel_IOFactory::load($file_input);      
        } catch(Exception $e) {
            die('Error loading file :' . $e->getMessage());
        }
        $totalrows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
        $objWorksheet = $objPHPExcel->setActiveSheetIndex(0);  
        $ins = array();
        $t = 0;
        for($i=2; $i <= $totalrows; $i++) {
            $row_stok = $this->get_produk_by_barcode($id_toko, $id_users, $objWorksheet->getCellByColumnAndRow(2, $i)->getValue());
            if ($row_stok) {
                $stok_penyesuaian = ($objWorksheet->getCellByColumnAndRow(5, $i)->getValue()) - $row_stok->stok;
                $data = array(
                    "tgl_so"  => $objWorksheet->getCellByColumnAndRow(1, $i)->getValue(),
                    "barcode" => $objWorksheet->getCellByColumnAndRow(2, $i)->getValue(),
                    "nama_produk" => $objWorksheet->getCellByColumnAndRow(4, $i)->getValue(),
                    "stok_so" => $objWorksheet->getCellByColumnAndRow(5, $i)->getValue(),
                    "stok_penyesuaian" => $stok_penyesuaian,
                );
                $row = $this->db->where('id_toko', $id_toko)->where('id_users', $id_users)->where('id_produk', $row_stok->id_produk_2)->where('id_stok_info', $id)->get('stok_so')->row();
                // update 
                if ($row) {
                    $data_update = array(
                        'stok_so' => $data['stok_so'],
                        'penyesuaian' => $stok_penyesuaian,
                    );
                    $this->db->where('id', $row->id);
                    $this->db->update('stok_so', $data_update);
                } else {
                    // insert
                    if ($stok_penyesuaian != 0) {
                        $data_insert = array(
                            'id_stok_info' => $id,
                            'tgl_so' => $data['tgl_so'],
                            'id_toko' => $id_toko,
                            'id_users' => $id_users,
                            'id_produk' => $row_stok->id_produk_2,
                            'stok_so' => $data['stok_so'],
                            'penyesuaian' => $stok_penyesuaian,
                        );
                        $this->db->insert('stok_so', $data_insert);
                    }
                }
                $ins[$t] = $data;
                $t++;
            }
        }
        return $ins;
    }

}

/* End of file Printer_retail.php */
/* Location: ./application/controllers/Printer_retail.php */