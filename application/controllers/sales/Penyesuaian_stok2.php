<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penyesuaian_stok extends AI_Admin {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
        $tgl = $this->input->post('tgl', true);
        if (empty($tgl)) {
            $tgl = date('d-m-Y');
        }
        $res_ps = $this->db->group_by('tgl_penyesuaian')->get('penyesuaian_stok')->result();
		$data = array(
            'active_penyesuaian_stok' => 'active',
			'action' => site_url('admin/penyesuaian_stok/create'),
            'tgl' => $tgl,
            'data_ps' => $res_ps,
		);
        $this->view('produk/penyesuaian_stok', $data);
    }

    public function read($tgl = '')
    {
        $res = $this->db->select('ps.*, pr.nama_produk')
                        ->from('penyesuaian_stok ps')
                        ->join('produk_retail pr', 'ps.id_produk=pr.id_produk_2 AND ps.id_toko=pr.id_toko')
                        ->where('ps.id_toko', $this->userdata->id_toko)
                        ->get()->result();
        
		$data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_penyesuaian_stok' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'data' => $res,
		);
        $this->view('produk/penyesuaian_stok_read', $data);
    }

    public function create()
    {
        $tgl = $this->input->post('tgl', true);
        $res_produk = $this->db->select('pr.*, ds.jml_stok')
                             ->from('produk_retail pr')
                             ->join('('.$this->Admin_model->query_get_stok($this->userdata->id_toko).') AS ds', 'pr.id_produk_2=ds.id_produk')
                             ->where('pr.id_toko', $this->userdata->id_toko)
                             ->order_by('pr.nama_produk', 'asc')
                             ->get()->result();
        $data = array(
            'active_penyesuaian_stok' => 'active',
			'action' => site_url('admin/penyesuaian_stok/create_action'),
            'tgl_penyesuaian' => set_value('tgl_penyesuaian', $tgl),
            'id_produk' => set_value('id_produk'),
            'stok' => set_value('stok'),
            'keterangan' => set_value('keterangan'),
            'data_produk' => $res_produk,
        );
        $this->view('produk/penyesuaian_stok_form', $data);
    }

    public function create_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            redirect('admin/penyesuaian_stok');
        } else {
            $data_insert = array(
                'id_toko' => $this->userdata->id_toko,
                'tgl_penyesuaian' => $this->input->post('tgl_penyesuaian', true),
                'id_produk' => $this->input->post('id_produk', true),
                'stok' => $this->input->post('stok', true),
                'keterangan' => $this->input->post('keterangan', true),
            );
            $this->db->insert('penyesuaian_stok', $data_insert);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect('admin/penyesuaian_stok', 'refresh');
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('tgl_penyesuaian', 'Tgl penyesuaian', 'trim|required');
		$this->form_validation->set_rules('id_produk', 'Produk', 'trim|required');
		$this->form_validation->set_rules('stok', 'Stok', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    
    public function delete($id, $tgl = '')
    {
        $row = $this->db->where('id_toko', $this->userdata->id_toko)->where('id', $id)->get('penyesuaian_stok')->row();
        if ($row) {
            $this->db->where('id', $row->id);
            $this->db->delete('penyesuaian_stok');
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/penyesuaian_stok/read/'.$tgl));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/penyesuaian_stok/read/'.$tgl));
        }
    }

    public function delete_tgl($tgl)
    {
        $row = $this->db->where('id_toko', $this->userdata->id_toko)->where('tgl_penyesuaian', $tgl)->get('penyesuaian_stok')->row();
        if ($row) {
            $this->db->where('tgl_penyesuaian', $tgl);
            $this->db->delete('penyesuaian_stok');
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/penyesuaian_stok'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/penyesuaian_stok'));
        }
    }
    
    /* public function buat_so()
    {
        $tgl = $this->input->post("tgl", true);
        $array_insert = array(
            'tgl_so' => date('d-m-Y'),
        ); 
        $this->db->insert('stok_so_info', $array_insert);
        redirect('admin/penyesuaian_stok','refresh');
    }

    public function lihat($tgl = '')
    {
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_penyesuaian_stok' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'tgl' => $tgl,
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

    public function edit($tgl = '')
    {
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_penyesuaian_stok' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'tgl' => $tgl,
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
        $tgl = $this->input->post('tgl', true);
        $data = $this->input->post('data', true);
        $decode = (array) json_decode($data);
        foreach ($decode as $key) {
            $id_produk_2 = $key[0];
            $field = $key[1];
            $old_record = $key[2];
            $new_record = $key[3];
            $stok_before = $key[4];
            if ($field=='stok_so') {
                $row = $this->db->where('tgl_so', $tgl)->where('id_produk', $id_produk_2)->get('stok_so')->row();
                if ($row) {
                    $data_update = array(
                        'stok_before' => $stok_before,
                        'stok_so' => $new_record,
                    );
                    $this->db->where('id', $row->id);
                    $this->db->update('stok_so', $data_update);
                } else {
                    $data_insert = array(
                        'tgl_so' => $tgl,
                        'id_produk' => $id_produk_2,
                        'stok_before' => $stok_before,
                        'stok_so' => $new_record,
                    );
                    $this->db->insert('stok_so', $data_insert);
                }
            }
        }
        echo json_encode($decode);
    }

    public function simpan($tgl)
    {
        $res_so = $this->db->where('tgl_so', $tgl)->get('stok_so')->result();
        foreach ($res_so as $key) {
            $this->_restok($key->id_produk, $key->stok_so);
        }
        $data_update = array(
        	'status' => 1,
        );
        $this->db->where('tgl_so', $tgl);
        $this->db->update('stok_so_info', $data_update);
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
    } */

}

/* End of file Printer_retail.php */
/* Location: ./application/controllers/Printer_retail.php */