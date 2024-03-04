<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Summary extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Xjson');
    }
    
    public function index(){

    }

    public function get_summary() {
        $this->xjson->openHeaders();
		$this->xjson->nocrypt();
        $this->xjson->keyc();

        $this->load->model('Mutasi_stok_model');
        $this->load->library('datatables');
        
        
        $id_toko = $this->input->post('id_toko');
        $id_users = $this->input->post('user_id');
        
        // $laba_hari_ini = $this->db->select('SUM(laba) AS jml_laba')
        //                             ->from('orders')
        //                             ->where('id_toko', $id_toko)
        //                             ->where('tgl_order', date('d-m-Y'))
        //                             ->get()->row();

        // $total_pembelian = $this->db->select('SUM(s.stok*b.harga_satuan) AS total')
        //                             ->from('stok_produk s')
        //                             ->join('produk_retail p', 's.id_produk=p.id_produk_2 AND p.id_toko="'.$id_toko.'"')
        //                             ->join('pembelian b', 's.id_pembelian=b.id_pembelian AND b.id_toko="'.$id_toko.'"')
        //                             ->where('s.id_toko', $id_toko)
        //                             ->get()->row();
        $total_pembelian = (Object) array(
            'total' => $this->Mutasi_stok_model->get_persediaan($id_toko),
        );
        // $laba_bulan_ini = $this->db->select('SUM(laba) AS jml_laba')
        //                               ->from('orders')
        //                               ->where('id_toko', $id_toko)
        //                               ->where('SUBSTRING(tgl_order,4,7)', date('m-Y'))
        //                               ->get()->row();
        // $laba_total = $this->db->select('SUM(laba) AS jml_laba')
        //                               ->from('orders')
        //                               ->where('id_toko', $id_toko)
        //                               ->get()->row();
        
        // $laba_hari_ini = $this->db->select('(SUM(o.laba)-rjd.total_retur) AS jml_laba')
        // ->from('orders o')
        // ->join('(SELECT rjd.id_toko, SUM(rjd.subtotal) AS total_retur FROM retur_jual_detail rjd JOIN retur_jual rj ON rjd.id_retur=rj.id_retur AND rjd.id_toko=rj.id_toko WHERE LEFT(rj.tgl,10)="'.date('d-m-Y').'" GROUP BY rj.id_toko) rjd', 'o.id_toko=rjd.id_toko', 'left')
        // ->where('o.id_toko', $id_toko)
        // ->where('o.tgl_order', date('d-m-Y'))
        // ->get()->row();
        $laba_hari_ini = $this->db->select('(SUM(o.laba)) AS jml_laba')
        ->from('orders o')
        ->where('o.id_toko', $id_toko)
        ->where('o.tgl_order', date('d-m-Y'))
        ->get()->row();
        $laba_bulan_ini = $this->db->select('SUM(o.laba) AS jml_laba')
            ->from('orders o')
            ->where('o.id_toko', $id_toko)
            ->where('SUBSTRING(o.tgl_order,4,7)', date('m-Y'))
            ->get()->row();
        $laba_total = $this->db->select('SUM(o.laba) AS jml_laba')
            ->from('orders o')
            ->where('o.id_toko', $id_toko)
            ->get()->row();

        $data = array(
            "laba_hari_ini"=>$laba_hari_ini->jml_laba,
            "total_pembelian"=>$total_pembelian->total,
            "laba_bulan_ini"=>$laba_bulan_ini->jml_laba,
            "laba_total"=>$laba_total->jml_laba
        );

		$this->xjson->ok("Sukses");
		$this->xjson->add("data", $data);
		$this->xjson->result();
    }

    public function get_produk_terlaris() {
        $this->xjson->openHeaders();
		$this->xjson->nocrypt();
        $this->xjson->keyc();

        $state = $this->input->post('state');
        $id_toko = $this->input->post('id_toko');

        $data = [];
        if($state == "today"){
            $data = $this->db->select('produk_retail.*, SUM(orders_detail.jumlah) AS jumlah')
                    ->from('orders_detail')
                    ->join('orders', 'orders_detail.id_orders_2=orders.id_orders_2 AND orders.id_toko="'.$id_toko.'"')
                    ->join('produk_retail', 'orders_detail.id_produk=produk_retail.id_produk_2 AND produk_retail.id_toko="'.$id_toko.'"')
                    ->where('orders_detail.id_toko', $id_toko)
                    ->where('orders.tgl_order', date('d-m-Y'))
                    ->group_by('orders_detail.id_produk')
                    ->order_by('jumlah', 'desc')
                    ->limit(5)
                    ->get()->result();
        }else{
            $data = $this->db->where('id_toko', $id_toko)->where('dibeli > 0')->order_by('dibeli', 'desc')->group_by('barcode')->get('produk_retail', 5)->result();
        }

        $this->xjson->ok("Sukses");
		$this->xjson->add("data", $data);
		$this->xjson->result();
    }

    public function get_penjualan_terakhir() {
        $this->xjson->openHeaders();
		$this->xjson->nocrypt();
        $this->xjson->keyc();

        $id_toko = $this->input->post('id_toko');

        $this->db->where('id_toko', $id_toko);
        $this->db->order_by('id_orders', 'DESC');
        $data = $this->db->get('orders', 5)->result();

        $this->xjson->ok("Sukses");
		$this->xjson->add("data", $data);
		$this->xjson->result();
    }

    public function get_grafik_penjualan() {
        $this->xjson->openHeaders();
		$this->xjson->nocrypt();
        $this->xjson->keyc();

        $state = $this->input->post('state');
        $id_toko = $this->input->post('id_toko');

        $data = [];
        if($state == "today"){
            $this->db->select('*,left(jam_order,5) as jam_order');
            $this->db->where('id_toko', $id_toko);
            $this->db->where('tgl_order', date('d-m-Y'));
            $this->db->group_by('LEFT(jam_order,2)');
            $orders = $this->db->get('orders')->result();

            $data_chart=[];$label=[];
            foreach($orders as $order){
                $data_chart[] = $order->nominal;
                $label[] = $order->jam_order;
            }
            $data = array("data"=>$data_chart,"label"=>$label);
        } else {
            $this->db->select('SUM(nominal) AS nominal, SUBSTRING(tgl_order,1,2) AS hari, SUM(laba) AS laba');
            $this->db->from('orders');
            $this->db->where("SUBSTRING(tgl_order,4,2)", date('m'));
            $this->db->where("SUBSTRING(tgl_order,7,4)", date('Y'));
            $this->db->where('id_toko', $id_toko);
            $this->db->group_by('tgl_order');
            $orders = $this->db->get()->result();

            $data_chart=[];$label=[];
            foreach($orders as $order){
                $data_chart[] = $order->nominal;
                $label[] = $order->hari;
            }
            $data = array("data"=>$data_chart,"label"=>$label);
        }

        $this->xjson->ok("Sukses");
		$this->xjson->add("data", $data);
		$this->xjson->result();

    }

}

/* End of file Summary.php */
