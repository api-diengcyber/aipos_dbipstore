<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Retur extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('form_validation');
	    $this->load->library('datatables');
        $this->load->model('Produk_retail_model');
        $this->load->model('Stok_produk_model');
        $this->load->model('Faktur_retail_model');
        $this->load->model('Supplier_retail_model');
        $this->load->model('Pengaturan_transaksi_model');
        $this->load->model('Login_model');
        $this->load->library('view');
        $this->Login_model->is_produksi();
        $this->userdata = $this->Login_model->get_data();
	}

    public function index()
    {
        if (!empty($this->input->post('awal_periode')) && !empty($this->input->post('akhir_periode'))) {
            $awal_periode = $this->input->post('awal_periode');
            $akhir_periode = $this->input->post('akhir_periode');
        } else {
            $awal_periode = date('Y-m-01');
            $akhir_periode = date('Y-m-t');
        }
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_retur_pembelian_create' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
        );
        $data['data_retur'] = $this->db->select('r.*, f.no_faktur, s.nama_supplier')
                                       ->from('retur r')
                                       ->join('faktur_retail f', 'r.id_faktur=f.id_faktur AND f.id_toko=r.id_toko')
                                       ->join('supplier s', 's.id_supplier=f.id_supplier AND s.id_toko=r.id_toko')
                                       ->where('r.id_toko', $this->userdata->id_toko)
                                       ->where('DATE(CONCAT(SUBSTRING(r.tgl,7,4),"-",SUBSTRING(r.tgl,4,2),"-",SUBSTRING(r.tgl,1,2))) BETWEEN "'.$awal_periode.'" AND "'.$akhir_periode.'"')
                                       ->group_by('r.id_faktur')
                                       ->get()->result();
        $data['awal_periode'] = $awal_periode;
        $data['akhir_periode'] = $akhir_periode;
        $this->view->render_produksi('retur/retur_list', $data);
    }

    public function read($id)
    {
        $data_retur = $this->db->select('r.*, f.no_faktur, f.pembayaran, s.nama_supplier, h.deadline, h.hutang, h.kurang')
                               ->from('retur r')
                               ->join('faktur_retail f', 'r.id_faktur=f.id_faktur AND f.id_toko=r.id_toko')
                               ->join('supplier s', 's.id_supplier=f.id_supplier AND s.id_toko=r.id_toko')
                               ->join('hutang h', 'f.id_faktur=h.id_faktur AND f.id_toko=h.id_toko', 'left')
                               ->where('r.id_toko', $this->userdata->id_toko)
                               ->where('r.id', $id)
                               ->group_by('r.id_faktur')
                               ->get()->row();
        if ($data_retur) {
            $res_produk = $this->db->select('r.*, pr.nama_produk, p.harga_satuan, sp.stok, p.jumlah AS jumlah_beli')
                                   ->from('retur r')
                                   ->join('produk_retail pr', 'r.id_produk=pr.id_produk_2 AND r.id_toko=pr.id_toko')
                                   ->join('pembelian p', 'r.id_pembelian=p.id_pembelian AND r.id_produk=p.id_produk AND r.id_toko=p.id_toko')
                                   ->join('stok_produk sp', 'r.id_produk=sp.id_produk AND p.id_pembelian=sp.id_pembelian AND r.id_toko=sp.id_toko')
                                   ->where('r.id_toko', $this->userdata->id_toko)
                                   ->get()->result();
            $data = array(
                'id_toko' => $this->userdata->id_toko,
                'nama_toko' => $this->userdata->nama_toko,
                'nama_user' => $this->userdata->email,
                'active_retur_pembelian_create' => 'active',
                'id_modul' => $this->userdata->id_modul,
                'nama_modul' => $this->userdata->nama_modul,
                'tgl' => $data_retur->tgl,
                'data_produk' => $res_produk,
                'no_faktur' => $data_retur->no_faktur,
                'nama_supplier' => $data_retur->nama_supplier,
                'pembayaran' => $data_retur->pembayaran,
                'deadline' => $data_retur->deadline,
                'hutang' => $data_retur->hutang,
                'kurang' => $data_retur->kurang,
            );
            $this->view->render_produksi('retur/retur_read', $data);
        } else {
            $this->session->set_flashdata('message', 'No Record Found');
            redirect('produksi/retur');
        }
    }

	public function produk_ajax($id_faktur)
	{
		header('Content-type: application/json');
        // $res_produk = $this->Produk_retail_model->get_by_id_faktur($this->userdata->id_toko, $id_faktur);
        $res_produk = $this->db->select('p.*, stp.stok AS stok_sisa, pr.nama_produk, sp.satuan AS nama_satuan')
                               ->from('pembelian p')
                               ->join('stok_produk stp', 'p.id_pembelian=stp.id_pembelian AND p.id_toko=stp.id_toko')
                               ->join('produk_retail pr', 'p.id_produk=pr.id_produk_2 AND p.id_toko=pr.id_toko')
                               ->join('satuan_produk sp', 'pr.satuan=sp.id_satuan AND pr.id_toko=sp.id_toko')
                               ->where('p.id_toko', $this->userdata->id_toko)
                               ->where('p.id_faktur', $id_faktur)
                               ->group_by('p.id_pembelian')
                               ->get()->result();
        $no = 0;
        $html = '';
        foreach ($res_produk as $key):
            $no++;
            $html .= '<tr>
                        <td>'.$no.'</td>
                        <td>'.$key->nama_produk.' ('.$key->nama_satuan.')</td>
                        <td class="text-right"><span class="harga_satuan" data-id="'.$key->id_pembelian.'">'.number_format($key->harga_satuan*1,0,',','.').'</span></td>
                        <td class="text-right"><span class="stok_sisa" data-id="'.$key->id_pembelian.'">'.$key->stok_sisa.'</span></td>
                        <td style="padding:0px;background-color:yellow;"><input type="text" name="jumlah['.$key->id_pembelian.']" class="form-control text-right jumlah" data-id="'.$key->id_pembelian.'" value="0" style="border:none!important;background-color:yellow;color:#000;"></td>
                        <td class="text-right"><span class="subtotal" data-id="'.$key->id_pembelian.'">'.number_format(0,0,',','.').'</span></td>
                    </tr>';
        endforeach;
        $data = array(
            "status" => "ok",
            "data" => $html,
        );
		echo json_encode($data);
	}

	public function create()
	{
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_retur_pembelian_create' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'action' => site_url('produksi/retur/create_action'),
            'id' => set_value('id'),
            'tgl' => set_value('tgl', date('d-m-Y')),
            'id_faktur' => set_value('id_faktur'),
            'id_produk' => set_value('id_produk'),
            'jumlah' => set_value('jumlah'),
            'alasan' => set_value('alasan'),
            'data_faktur' => $this->Faktur_retail_model->get_by_id_toko($this->userdata->id_toko)
        );
        $this->view->render_produksi('retur/retur_form', $data);
	}

	public function create_action()
	{
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $tgl = $this->input->post('tgl', true);
            $id_faktur = $this->input->post('id_faktur', true);
            $jumlah = $this->input->post('jumlah');
            $row_faktur = $this->db->select('fr.*, h.kurang')
                                   ->from('faktur_retail fr')
                                   ->join('hutang h', 'fr.id_faktur=h.id_faktur AND fr.id_toko=h.id_toko')
                                   ->where('fr.id_toko', $this->userdata->id_toko)
                                   ->where('fr.id_faktur', $id_faktur)
                                   ->get()->row();
            $pembayaran = $row_faktur->pembayaran;
            $id_supplier = $row_faktur->id_supplier;
            $kurang = $row_faktur->kurang;
            $total = 0;
            foreach ($jumlah as $id_pembelian => $value) {
                $row_pembelian = $this->db->select('p.*, sp.id AS id_satuan_produk, sp.stok')
                                          ->from('pembelian p')
                                          ->join('stok_produk sp', 'p.id_pembelian=sp.id_pembelian AND p.id_toko=sp.id_toko')
                                          ->where('p.id_toko', $this->userdata->id_toko)
                                          ->where('p.id_faktur', $id_faktur)
                                          ->where('p.id_pembelian', $id_pembelian)
                                          ->get()->row();
                if ($row_pembelian && $value > 0) {
                    $subtotal = $row_pembelian->harga_satuan*$value;
                    $total += $subtotal;
                    $data_insert = array(
                        'tgl' => $tgl,
                        'id_toko' => $this->userdata->id_toko,
                        'id_faktur' => $id_faktur,
                        'id_produk' => $row_pembelian->id_produk,
                        'id_pembelian' => $row_pembelian->id_pembelian,
                        'jumlah' => $value,
                        'alasan' => '',
                    );
                    $this->db->insert('retur', $data_insert);
                    $data_update = array(
                        'stok' => $row_pembelian->stok-$value,
                    );
                    $this->db->where('id', $row_pembelian->id_satuan_produk);
                    $this->db->update('stok_produk', $data_update);
                }
            }
            if ($total > 0) {
                eval($this->Pengaturan_transaksi_model->accounting('buatretur'));
            }
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect('produksi/retur/create');
        }
	}

	public function update($id)
	{
        $row = $this->db->where('id_toko', $this->userdata->id_toko)
        				->where('id', $id)
        				->get('retur')->row();
        if ($row) {
            $data = array(
                'id_toko' => $this->userdata->id_toko,
                'nama_toko' => $this->userdata->nama_toko,
                'nama_user' => $this->userdata->email,
                'active_retur_pembelian' => 'active',
                'id_modul' => $this->userdata->id_modul,
                'nama_modul' => $this->userdata->nama_modul,
                'action' => site_url('produksi/retur/update_action'),
                'id' => set_value('id', $row->id),
                'tgl' => set_value('tgl', $row->tgl),
                'id_faktur' => set_value('id_faktur', $row->id_faktur),
                'id_produk' => set_value('id_produk', $row->id_produk),
                'jumlah' => set_value('jumlah', $row->jumlah),
                'alasan' => set_value('alasan', $row->alasan),
                'data_faktur' => $this->Faktur_retail_model->get_by_id_toko($this->userdata->id_toko)
            );
            $this->view->render_produksi('retur/retur_form', $data);
        }
	}
    
    public function update_action() 
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
	        $row = $this->db->where('id_toko', $this->userdata->id_toko)
	        				->where('id', $this->input->post('id', TRUE))
	        				->get('retur')->row();
	        if ($row) {
	        	$data = array(
	        		'tgl' => $this->input->post('tgl', true),
	        		'id_faktur' => $this->input->post('id_faktur', true),
	        		'id_produk' => $this->input->post('id_produk', true),
	        		'jumlah' => $this->input->post('jumlah', true),
	        		'alasan' => $this->input->post('alasan', true),
	        	);
	        	$this->db->where('id', $this->input->post('id', true));
	        	$this->db->update('retur', $data);
                $row_sp_pembelian = $this->db->select('sp.*')
                                          ->from('pembelian b')
                                          ->join('stok_produk sp', 'b.id_pembelian=sp.id_pembelian AND sp.id_toko="'.$this->userdata->id_toko.'"')
                                          ->where('b.id_toko', $this->userdata->id_toko)
                                          ->where('b.id_faktur', $this->input->post('id_faktur', true))
                                          ->where('b.id_produk', $this->input->post('id_produk', true))
                                          ->where('sp.id_produk', $this->input->post('id_produk', true))
                                          ->get()->row();
	        	if ($row_sp_pembelian) {
	        		$update_sp = array(
	        			'stok' => ($row_sp_pembelian->stok+$row->jumlah)-$this->input->post('jumlah', true),
	        		);
	        		$this->db->where('id', $row_sp_pembelian->id);
	        		$this->db->update('stok_produk', $update_sp);
	        	}
	            $this->session->set_flashdata('message', 'Update Record Success');
	            redirect('produksi/retur');
	        } else {
                $this->session->set_flashdata('message', 'Update Record Failed');
                redirect('produksi/retur');
            }
        }
    }

    public function delete($id)
    {
        $row = $this->db->where('id_toko', $this->userdata->id_toko)
        				->where('id', $id)
        				->get('retur')->row();
        if ($row) {
            $row_sp_pembelian = $this->db->select('sp.*')
                                      ->from('pembelian b')
                                      ->join('stok_produk sp', 'b.id_pembelian=sp.id_pembelian AND sp.id_toko="'.$this->userdata->id_toko.'"')
                                      ->where('b.id_toko', $this->userdata->id_toko)
                                      ->where('b.id_faktur', $row->id_faktur)
                                      ->where('b.id_produk', $row->id_produk)
                                      ->where('sp.id_produk', $row->id_produk)
                                      ->get()->row();
        	if ($row_sp_pembelian) {
                $this->db->where('id', $id);
                $this->db->delete('retur');
        		$update_sp = array(
        			'stok' => $row_sp_pembelian->stok+$row->jumlah,
        		);
        		$this->db->where('id', $row_sp_pembelian->id);
        		$this->db->update('stok_produk', $update_sp);
        	}
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect('produksi/retur');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect('produksi/retur');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
        $this->form_validation->set_rules('id_faktur', 'id faktur', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Retur.php */
/* Location: ./application/controllers/Retur.php */