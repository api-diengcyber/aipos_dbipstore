<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Arus_kas_model extends CI_Model {

	public $table = 'arus_kas';
    public $id = 'id_arus_kas';
	public $id_toko = 'id_toko';
    function where($join = ''){
        $where = 'id_toko = '.$this->data_login['id_toko'];
        return $where;
    }

	public function __construct()
	{
		parent::__construct();
        // $this->load->model('Hutang_retail_model');
        // $this->load->model('Tampilan_retail_model');
	}
// function cek()
// {
//     return 'aaaa';
// }
    function json($id_toko) {
        // $data_login = $this->Tampilan_retail_model->cek_login();
        $this->datatables->select('ak.id, ak.id_arus_kas, ak.id_toko, ak.tgl, ak.id_kas, ak.id_akun, ak.nominal, ak.ket, a.nama_akun as nm_akun');
        $this->datatables->from('arus_kas ak');
        $this->datatables->join('akun_sederhana a', 'ak.id_akun=a.id_akun AND a.id_toko="'.$id_toko.'"');
        $this->datatables->where('ak.id_toko', $id_toko);
        $this->datatables->add_column('action', anchor(site_url('arus_kas/read/$1'),'<button type="button" class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('arus_kas/update/$1'),'<button type="button" class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('arus_kas/delete/$1'),'<button type="button" class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash bigger-120"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_arus_kas');
        $this->db->order_by('ak.id_arus_kas', 'desc');
        return $this->datatables->generate();
    }

    function json_masuk($id_toko) {
        // $data_login = $this->Tampilan_retail_model->cek_login();
        $this->datatables->select('ak.id, ak.id_arus_kas, ak.id_toko, ak.tgl, ak.id_kas, ak.id_akun, ak.nominal, ak.ket, a.nama_akun as nm_akun');
        $this->datatables->from('arus_kas ak');
        $this->datatables->join('akun_sederhana a', 'ak.id_akun=a.id_akun AND a.id_toko="'.$id_toko.'"');
        $this->datatables->where('ak.id_toko', $id_toko);
        $this->datatables->where('ak.id_kas', '1');
        $this->datatables->add_column('action', anchor(site_url('arus_kas/read/$1'),'<button type="button" class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('arus_kas/update/$1'),'<button type="button" class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('arus_kas/delete/$1'),'<button type="button" class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash bigger-120"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_arus_kas');
        $this->db->order_by('ak.id_arus_kas', 'desc');
        return $this->datatables->generate();
    }

    function json_keluar($id_toko) {
        $data_login = $this->Tampilan_retail_model->cek_login();
        $this->datatables->select('ak.id, ak.id_arus_kas, ak.id_toko, ak.tgl, ak.id_kas, ak.id_akun, ak.nominal, ak.ket, a.nama_akun as nm_akun');
        $this->datatables->from('arus_kas ak');
        $this->datatables->join('akun_sederhana a', 'ak.id_akun=a.id_akun AND a.id_toko="'.$data_login['id_toko'].'"');
        $this->datatables->where('ak.id_toko', $data_login['id_toko']);
        $this->datatables->where('ak.id_kas', '2');
        $this->datatables->add_column('action', anchor(site_url('arus_kas/read/$1'),'<button type="button" class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('arus_kas/update/$1'),'<button type="button" class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;".anchor(site_url('arus_kas/delete/$1'),'<button type="button" class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash bigger-120"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_arus_kas');
        $this->db->order_by('ak.id_arus_kas', 'desc');
        return $this->datatables->generate();
    }

    function json_periode($id_toko, $tgl_awal, $tgl_akhir) {
        $data_login = $this->Tampilan_retail_model->cek_login();
        $this->datatables->select('ak.id, ak.id_arus_kas, ak.id_toko, ak.tgl, ak.id_kas, ak.id_akun, ak.nominal, ak.ket, a.nama_akun as nm_akun, ("") AS nominal2');
        $this->datatables->from('arus_kas ak');
        $this->datatables->join('akun_sederhana a', 'ak.id_akun=a.id_akun AND a.id_toko="'.$data_login['id_toko'].'"');
        $this->datatables->where('ak.id_toko', $data_login['id_toko']);
        $this->datatables->where('DATE(CONCAT(SUBSTRING(tgl,7,4),"-",SUBSTRING(tgl,4,2),"-",SUBSTRING(tgl,1,2))) BETWEEN "'.$tgl_awal.'" AND "'.$tgl_akhir.'"');
        $this->db->order_by('DATE(CONCAT(SUBSTRING(ak.tgl,7,4),"-",SUBSTRING(ak.tgl,4,2),"-",SUBSTRING(ak.tgl,1,2))) ASC');
        $this->db->order_by('ak.id_kas', 'ASC');
        $this->db->order_by('a.nama_akun', 'ASC');
        $this->db->order_by('ak.ket', 'ASC');
        return $this->datatables->generate();
    }

    // get data by id
    function get_by_id($id)
    {
        $data_login = $this->Tampilan_retail_model->cek_login();
        $this->db->where($this->id_toko, $data_login['id_toko']);
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // insert data
    function insert($data)
    {
        // $data_login = $this->Tampilan_retail_model->cek_login();
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $data_login = $this->Tampilan_retail_model->cek_login();
        $this->db->where($this->id_toko, $data_login['id_toko']);
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $data_login = $this->Tampilan_retail_model->cek_login();
        $this->db->where($this->id_toko, $data_login['id_toko']);
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function get_by_between_date_penjualan($id_toko, $tgl1='', $tgl2='')
    {
        /*
        $this->db->select('orders.*, users.first_name, users.last_name');
        $this->db->from($this->table);
        $this->db->join('users', 'orders.id_users=users.id_users');
        $this->db->where("DATE(CONCAT(SUBSTRING(orders.tgl_order,7,4),'-',SUBSTRING(orders.tgl_order,4,2),'-',SUBSTRING(orders.tgl_order,1,2))) BETWEEN '".$tgl1."' AND '".$tgl2."'");
        $this->db->where('orders.id_toko', $data_login['id_toko']);
        return $this->db->get()->result();
        */
        $data_login = $this->Tampilan_retail_model->cek_login();
        $this->db->select('orders.pembayaran,orders.*, SUM(orders.nominal) AS jml_nominal');
        $this->db->from('orders');
        // if ($this->cek_retur_jual($id_toko)) {
        //     $this->db->join('(SELECT * FROM retur_jual WHERE id_toko="'.$id_toko.'") r', 'r.no_faktur!=orders.no_faktur');
        // }
        $this->db->where('orders.id_toko', $data_login['id_toko']);
        $this->db->where("DATE(CONCAT(SUBSTRING(orders.tgl_order,7,4),'-',SUBSTRING(orders.tgl_order,4,2),'-',SUBSTRING(orders.tgl_order,1,2))) BETWEEN '".$tgl1."' AND '".$tgl2."'");
        $this->db->group_by('orders.tgl_order');
        return $this->db->get('')->result();
    }

    function get_by_id_toko($id_toko='',$tgl1='',$tgl2='',$deadline='',$status='',$opsi='')
	{
		$this->db->select('fr.*, fr.id as id, fr.id_faktur as id_faktur, s.nama_supplier, r.id AS id_retur');
		$this->db->from('faktur_retail fr');
		$this->db->join('supplier s', 'fr.id_supplier = s.id_supplier AND s.'.$this->where(), 'left');
		$this->db->join('hutang h', 'fr.id_faktur=h.id_faktur AND fr.id_toko=h.id_toko', 'left');
		$this->db->join('retur r', 'fr.id_faktur=r.id_faktur AND fr.id_toko=r.id_toko', 'left');
        $this->db->where("DATE(CONCAT(SUBSTRING(fr.tgl,7,4),'-',SUBSTRING(fr.tgl,4,2),'-',SUBSTRING(fr.tgl,1,2))) BETWEEN '".$tgl1."' AND '".$tgl2."'");
		$this->db->where('fr.'.$this->where());
		if(!empty($deadline)){
		if($status == 1){
		$this->db->where('DATE(CONCAT(SUBSTRING(fr.deadline,7,4),"-",SUBSTRING(fr.deadline,4,2),"-",SUBSTRING(fr.deadline,1,2))) <= "'.$deadline.'" AND DATE(CONCAT(SUBSTRING(fr.deadline,7,4),"-",SUBSTRING(fr.deadline,4,2),"-",SUBSTRING(fr.deadline,1,2))) > "'.date('Y-m-d').'"');
		}else if($status == 2){
		$this->db->where('DATE(CONCAT(SUBSTRING(fr.deadline,7,4),"-",SUBSTRING(fr.deadline,4,2),"-",SUBSTRING(fr.deadline,1,2))) < "'.$deadline.'"');
		}
		}
		//opsi pembayaran kredit
		if($opsi == 1){
		$this->db->where('fr.pembayaran', 1);
		}
		//$this->db->order_by('fr.id', 'desc');
        $this->db->order_by('fr.tgl', 'asc');
		$this->db->group_by('fr.id');
		return $this->db->get()->result();
	}

	function get_all_by_id_toko($id_toko = '',$tgl1='',$tgl2='',$deadline='',$status='',$opsi=''){
		$output = array();
		$data_faktur = $this->get_by_id_toko($id_toko,$tgl1,$tgl2,$deadline,$status,$opsi);
		foreach ($data_faktur as $df) {
			$total = 0;
			$total_hutang = 0;
			$item = 0;
			$data_transaksi = $this->db->where($this->where())
						        	   ->where('id_faktur', $df->id_faktur)
						        	   ->group_by('id_produk')
												 ->limit(50)
						        	   ->get("pembelian")->result();
			foreach ($data_transaksi as $dt) {
				$item  += $dt->jumlah;
				if ($dt->pembayaran == 1) {
					$data_hutang = $this->Hutang_retail_model->get_by_id_faktur($dt->id_faktur);
					foreach ($data_hutang as $dh) {
						$total_hutang += $dh->kurang;
					}
				}
				$total += $dt->total_bayar;
			}

			$tot_hutang = $total_hutang;
			if($total_hutang > 0){
				$total_hutang -= $df->dp;
			}
			
			$total = 0;
			$rwt = $this->db->query("SELECT SUM(total_bayar) AS total FROM `pembelian` WHERE id_faktur='".$df->id_faktur."'")->row();
			if ($rwt) {
				$total = $rwt->total;
			}

			$output[] = (object) array(
				'id'=>$df->id,
				'id_faktur'=>$df->id_faktur,
				'id_retur'=>$df->id_retur,
				'no_faktur'=>$df->no_faktur,
				'tgl'=>$df->tgl,
				'nama_supplier'=>$df->nama_supplier,
				'dp'=>$df->dp,
				'deadline'=>$df->deadline,
				'pembayaran'=>$df->pembayaran,
				'total'=> $total,
				'total_hutang'=> $total_hutang,
				'jml_produk'=>count($data_transaksi),
				'jml_item'=>$item,
				'tot_hutang'=>$tot_hutang
			);
		}
		return $output;
	}
}

/* End of file Arus_kas_model.php */
/* Location: ./application/models/Arus_kas_model.php */