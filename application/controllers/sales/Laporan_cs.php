<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_cs extends AI_Admin {

	public function __construct()
	{
    parent::__construct();
    $this->models('Sales_model:M_s, Sales_order_model:M_so, Sales_aktivitas_model:M_sa');
  }

  function json_order()
  {
  }

  function json_aktivitas()
  {
    header('Content-Type: application/json');
    echo $this->M_sa->json_aktivitas($this->userdata->id_toko);
  }

  public function index($page = "")
  {
    $dari = $this->input->post('dari');
    $sampai = $this->input->post('sampai');
    $id_users = $this->input->post('id_users');


    // data order
    $params = array('id_users'=>$id_users,'status_in'=>[1,2,3,4,5,6],'dari'=>$dari,'sampai'=>$sampai);
    $pagination = array('page'=>($page)?$page:1,'perpage'=>20);
    $data_order = $this->M_so->get_order($params,$pagination);
    
    $this->load->library('pagination');

    $config['base_url'] = base_url('admin/laporan_cs/index/');
    $config['total_rows'] =  $this->M_so->_get_order($params)->get()->num_rows();
    $config['use_page_numbers'] = true;
    $config['per_page'] = $pagination['perpage'];

    $this->pagination->initialize($config);
    //

    $data = array(
      'id_toko' => $this->userdata->id_toko,
      'nama_toko' => $this->userdata->nama_toko,
      'nama_user' => $this->userdata->email,
      'active_order_cs' => 'active',
      'data_cs' => $this->M_s->get_data_sales(),
      'dari'=>$dari,
      'sampai'=>$sampai,
      "id_users"=>$id_users,
      'id_modul' => $this->userdata->id_modul,
      'nama_modul' => $this->userdata->nama_modul,
      'data_order' => $data_order,
      'pagination'=>$this->pagination->create_links()
    );
    $this->view('laporan_cs/laporan_order', $data);
  }

  public function cetak_laporan()
  {
    $tgl = $this->input->post('tgl', true);
    $page = $this->input->post('page', true);
    
    $params = array('dari'=>$tgl,'sampai'=>$tgl,'order_asc'=>'u.first_name');
    $pagination = array('page'=>($page)?$page:1,'perpage'=>1000);
    $data_order = $this->M_so->get_order($params,$pagination);
    
    $data = array(
      'id_toko' => $this->userdata->id_toko,
      'nama_toko' => $this->userdata->nama_toko,
      'nama_user' => $this->userdata->email,
      'data_order' => $data_order,
    );
    $this->load->view('admin/laporan_cs/print_laporan', $data);
  }

  function action_req_retur_jual()
  {
    $id_order = $this->input->post('id_order');
    $data_produk = json_decode($this->input->post('produk'));


    $dp = [];
    foreach($data_produk as $produk){
      $dp[$produk->id_produk] = $produk->jumlah;
    }

    $row_lo = $this->db->where('id_orders_2', $id_order)->get('orders')->row();
    
    $this->db->select('o.no_faktur,od.*,pr.id_produk_2');
    $this->db->from('orders o');
    $this->db->join('orders_detail od', 'od.id_orders = o.id_orders_2');
    $this->db->join('produk_retail pr', 'pr.id_produk_2 = od.id_produk');
    $this->db->where('o.no_faktur', $row_lo->no_invoice);
    $data_order = $this->db->get()->result();


    if(count($data_order) > 0){
      $array_detail = [];
      $total = 0;
      $i = 0;
      foreach($data_order as $order){
        $jumlah = $dp[$order->id_produk_2];
        $subtotal = $jumlah*$order->harga_satuan;
        $total += $subtotal;
        $array_detail[$i] = array(
            'id_retur' => '',
            'id_toko' => $this->userdata->id_toko,
            'id_users' => $this->userdata->id_users,
            'id_produk' => $order->id_produk,
            'id_orders_detail' => $order->id_orders,
            'jumlah' => $jumlah,
            'harga_satuan' => $order->harga_satuan,
            'harga_jual' => $order->harga_jual,
            'subtotal' => $subtotal,
        );
        $i++;
      }

      $data_insert = array(
          'id_orders'=>$id_order,
          'id_toko' => $this->userdata->id_toko,
          'id_users' => $this->userdata->id_users,
          'id_sales' => $row_lo->id_cs,
          'tgl' => date('d-m-Y').' '.date('H:i:s'),
          'no_faktur' => $data_order[0]->no_faktur,
          'total' => $total,
      );
      $this->db->insert('retur_jual_gudang_temp', $data_insert);
      $id_retur = $this->db->insert_id();
      
      foreach ($array_detail as $detail) {
        $detail['id_retur'] = $id_retur;
        $this->db->insert('retur_jual_gudang_detail_temp', $detail);
      }

    }

    $this->db->where('id_orders_2', $id_order);
    $this->db->update('orders', array('status'=>5));
    redirect(site_url('admin/laporan_cs'),'refresh');

  }

  public function aktivitas()
  {
    // $this->output->enable_profiler(TRUE);
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');

    if (!empty($bulan)) {
      $array = array(
        'bulan' => $bulan
      );
      $this->session->set_userdata($array);
    }

    if (!empty($this->session->userdata('bulan'))) {
      $bulan = $this->session->userdata('bulan');
    } else {
      $bulan = date('m');
    }

    if (!empty($tahun)) {
      $array = array(
        'tahun' => $tahun
      );
      $this->session->set_userdata($array);
    }

    if (!empty($this->session->userdata('tahun'))) {
      $tahun = $this->session->userdata('tahun');
    } else {
      $tahun = date('Y');
    }

    $id_users = $this->input->post('id_users');

    if ($id_users != NULL) {
      $array = array(
        'l_id_users' => $id_users
      );
      $this->session->set_userdata($array);
    }

    if (!empty($this->session->userdata('l_id_users'))) {
      $id_users = $this->session->userdata('l_id_users');
    }

    $data = array(
      'id_toko' => $this->userdata->id_toko,
      'nama_toko' => $this->userdata->nama_toko,
      'nama_user' => $this->userdata->email,
      'active_aktivitas_cs' => 'active',
      'id_modul' => $this->userdata->id_modul,
      'nama_modul' => $this->userdata->nama_modul,
      'data_cs' => $this->M_s->get_data_sales(),
      'bulan'=>$bulan,
      'tahun'=>$tahun,
      "id_users"=>$id_users,
      'data_bulan'=>$this->db->get('bulan')->result(),
      'data_media' => $this->db->order_by('id', 'asc')->get('pil_media')->result(),
      'data_produk' => $this->db->order_by('nama_produk', 'asc')->where('id_toko', $this->userdata->id_toko)->get('produk_retail')->result(),
      'data_aktivitas' => $this->M_sa->get_data_aktivitas_sales($id_users,sprintf('%02d',$bulan).'-'.$tahun,'','',true)
    );
    $this->view('laporan_cs/laporan_aktivitas', $data);
  }

  public function update_aktivitas($id)
  {
    $row = $this->db->select('la.*, u.first_name')
                    ->from('laporan_aktivitas la')
                    ->join('users u', 'la.id_cs=u.id_users')
                    ->where('la.id', $id)
                    ->get()->row();
    if ($row) {
      $data = array(
        'id_toko' => $this->userdata->id_toko,
        'nama_toko' => $this->userdata->nama_toko,
        'nama_user' => $this->userdata->email,
        'active_aktivitas_cs' => 'active',
        'id_modul' => $this->userdata->id_modul,
        'nama_modul' => $this->userdata->nama_modul,
        'action' => site_url('admin/laporan_cs/update_action_aktivitas'),
        'id' => set_value('id', $id),
        'tanggal' => set_value('tanggal', $row->tanggal),
        'nama_cs' => set_value('nama_cs', $row->first_name),
        'leads' => set_value('leads', $row->leads),
        'totalan' => set_value('totalan', $row->totalan),
        'closing' => set_value('closing', $row->closing),
      );
      $this->view('laporan_cs/laporan_aktivitas_update', $data);
    } else {
      
      redirect('admin/laporan_cs/aktivitas','refresh');
      
    }
  }

  public function update_action_aktivitas()
  {
    $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
    $this->form_validation->set_rules('leads', 'leads', 'trim|required');
    $this->form_validation->set_rules('totalan', 'totalan', 'trim|required');
    $this->form_validation->set_rules('closing', 'closing', 'trim|required');
    $this->form_validation->set_rules('id', 'id', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    if ($this->form_validation->run() == FALSE) {
      $this->update_aktivitas($this->input->post('id'));
    } else {
      $data_update = array(
        'leads' => $this->input->post('leads'),
        'totalan' => $this->input->post('totalan'),
        'closing' => $this->input->post('closing'),
      );
      $this->db->where('id', $this->input->post('id'));
      $this->db->update('laporan_aktivitas', $data_update);
      
      $this->session->set_flashdata('message', 'Update Record Success');
      redirect(site_url('admin/laporan_cs/aktivitas'));
    }
  }

  public function aktivitas_total()
  {
    // $this->output->enable_profiler(TRUE);
    
    // echo "DALAM PERBAIKAN";

    $bulan = $this->input->post('bulan');
    
    $awal_periode = !empty($this->input->post('awal_periode', true))?$this->input->post('awal_periode', true):date('Y-m-01');
    $akhir_periode = !empty($this->input->post('akhir_periode', true))?$this->input->post('akhir_periode', true):date('Y-m-t');

    $params = array(
      'awal_periode' => $awal_periode,
      'akhir_periode' => $akhir_periode,
    );
    if(!empty($bulan)){
      $exp = explode('-',$bulan);
      $bulan = $exp[0].'-'.$exp[1].'-'.$exp[2];
    //   $params = array("bulan"=>$bulan);
    }

    $data = array(
      'id_toko' => $this->userdata->id_toko,
      'nama_toko' => $this->userdata->nama_toko,
      'nama_user' => $this->userdata->email,
      'active_aktivitas_total_cs' => 'active',
      'id_modul' => $this->userdata->id_modul,
      'nama_modul' => $this->userdata->nama_modul,
      'bulan' => ($bulan)?$bulan:date('d-m-Y'),
      'awal_periode' => $awal_periode,
      'akhir_periode' => $akhir_periode,
      'data_produk' => $this->db->where('id_toko', $this->userdata->id_toko)->order_by('nama_produk', 'asc')->get('produk_retail')->result(),
      'data_aktivitas' => $this->_get_by_group($params),
    );
    $this->view('laporan_cs/laporan_aktivitas_total',$data);
  }

  public function aktivitas_total_sistem()
  {
    // $this->output->enable_profiler(TRUE);
    
    // echo "DALAM PERBAIKAN";

    $bulan = $this->input->post('bulan');
    
    $awal_periode = !empty($this->input->post('awal_periode', true))?$this->input->post('awal_periode', true):date('Y-m-01');
    $akhir_periode = !empty($this->input->post('akhir_periode', true))?$this->input->post('akhir_periode', true):date('Y-m-t');

    $params = array(
      'awal_periode' => $awal_periode,
      'akhir_periode' => $akhir_periode,
      'by_system' => true,
    );
    if (!empty($bulan)) {
      $exp = explode('-',$bulan);
      $bulan = $exp[0].'-'.$exp[1].'-'.$exp[2];
    //   $params = array("bulan"=>$bulan);
    }

    $data = array(
      'id_toko' => $this->userdata->id_toko,
      'nama_toko' => $this->userdata->nama_toko,
      'nama_user' => $this->userdata->email,
      'active_aktivitas_total_cs_sistem' => 'active',
      'id_modul' => $this->userdata->id_modul,
      'nama_modul' => $this->userdata->nama_modul,
      'bulan' => ($bulan)?$bulan:date('d-m-Y'),
      'awal_periode' => $awal_periode,
      'akhir_periode' => $akhir_periode,
      'data_produk' => $this->db->where('id_toko', $this->userdata->id_toko)->order_by('nama_produk', 'asc')->get('produk_retail')->result(),
      'data_aktivitas' => $this->_get_by_group($params),
    );
    $this->view('laporan_cs/laporan_aktivitas_total_sistem',$data);
  }

  public function detail_aktivitas_total_sistem($id_cs = '', $awal_periode = '', $akhir_periode = '')
  {
    $row_sales = $this->db->where('id_toko', $this->userdata->id_toko)->where('id_users', $id_cs)->get('users')->row();
    $res = $this->db->select('o.*, SUM(od.jumlah) AS jml, GROUP_CONCAT(DISTINCT o.id_orders_2) AS gb')
                    ->from('orders o')
                    ->join('orders_detail od', 'o.id_orders_2=od.id_orders_2')
                    ->where('o.id_sales', $id_cs)
                    ->where('DATE(CONCAT(SUBSTRING(o.tgl_order,7,4),"-",SUBSTRING(o.tgl_order,4,2),"-",SUBSTRING(o.tgl_order,1,2))) BETWEEN "'.$awal_periode.'" AND "'.$akhir_periode.'"')
                    ->group_by('o.tgl_order')
                    ->get()->result();
    $data = array(
      'id_toko' => $this->userdata->id_toko,
      'nama_toko' => $this->userdata->nama_toko,
      'nama_user' => $this->userdata->email,
      'active_aktivitas_total_cs_sistem' => 'active',
      'id_modul' => $this->userdata->id_modul,
      'nama_modul' => $this->userdata->nama_modul,
      'id_cs' => $id_cs,
      'awal_periode' => $awal_periode,
      'akhir_periode' => $akhir_periode,
      'nama_sales' => $row_sales->first_name,
      'data_detail' => $res,
    );
    $this->view('laporan_cs/detail_lats',$data);
  }

  public function aktivitas_bulanan()
  {

    $bulan = ($this->input->post('bulan'))?$this->input->post('bulan'):date('m');
    $tahun = ($this->input->post('tahun'))?$this->input->post('tahun'):date('Y');

    $params = array(
      'bulan' => $bulan,
      'tahun' => $tahun,
    );

    $data = array(
      'id_toko' => $this->userdata->id_toko,
      'nama_toko' => $this->userdata->nama_toko,
      'nama_user' => $this->userdata->email,
      'active_aktivitas_bulanan' => 'active',
      'id_modul' => $this->userdata->id_modul,
      'nama_modul' => $this->userdata->nama_modul,
      'bulan'=>$bulan,
      'tahun'=>$tahun,
      'data_bulan'=>$this->db->get('bulan')->result(),
      'data_media'=>$this->db->get('pil_media')->result(),
      'data_gpc'=>$this->db->order_by('id_produk', 'asc')->get('group_produk_cs')->result(),
      'data_aktivitas' => $this->_get_by_month($params),
      'that' => $this,
    );
    $this->view('laporan_cs/laporan_aktivitas_bulanan',$data);
  }

  public function aktivitas_harian()
  {

    set_time_limit(500); // limit
    $bulan = ($this->input->post('bulan'))?$this->input->post('bulan'):date('m');
    $tahun = ($this->input->post('tahun'))?$this->input->post('tahun'):date('Y');

    $params = array(
      'bulan' => $bulan,
      'tahun' => $tahun,
      'jenis' => 'harian',
    );

    $data = array(
      'id_toko' => $this->userdata->id_toko,
      'nama_toko' => $this->userdata->nama_toko,
      'nama_user' => $this->userdata->email,
      'active_aktivitas_harian' => 'active',
      'id_modul' => $this->userdata->id_modul,
      'nama_modul' => $this->userdata->nama_modul,
      'bulan' => $bulan,
      'tahun' => $tahun,
      'data_bulan' => $this->db->get('bulan')->result(),
      'data_media' => $this->db->get('pil_media')->result(),
      'data_produk' => $this->db->order_by('nama_produk', 'asc')->where('id_toko', $this->userdata->id_toko)->get('produk_retail')->result(),
      'data_gpc' => $this->db->order_by('id_produk', 'asc')->get('group_produk_cs')->result(),
      'data_aktivitas' => $this->_get_by_month($params),
      'that' => $this,
    );
    $this->view('laporan_cs/laporan_aktivitas_harian',$data);
  }

  public function aktivitas_delete($id)
  {
    $row = $this->db->where('id', $id)->get('laporan_aktivitas')->row();
    if ($row) {
      $this->db->where('id', $id);
      $this->db->delete('laporan_aktivitas');
      $this->session->set_flashdata('message', 'Delete record success');
    } else {
      $this->session->set_flashdata('message', 'Delete record failed');
    }
    redirect('admin/laporan_cs/aktivitas');
  }

  function _get_by_group($params)
  {
    $this->db->select('*');
    $this->db->from('group_produk_cs');
    $res = $this->db->get()->result();
    $output = [];
    foreach ($res as $group) {
      $params['id'] = $group->id;
      $output[$group->group] = $this->_get_aktivitas_total($params);
    }
    return $output;
  }

  function _get_data_week($params)
  {
    $wd = $this->getWeekDetail2($params->tahun, $params->bulan);
    $cw = count($wd);

    $data_produk = array();
    $no_week = 0;
    for ($week=1; $week <= $cw*2; $week++) {
      $id_produk = 1;
      $kd_produk = 'HS';
      if ($week%2 == 1) {
        $kd_produk = 'GC';
        $id_produk = 2;
        $no_week++;
      }
      
      $week_data = $wd[$no_week-1];
      $params->week_start = $week_data['week_start'];
      $params->week_end = $week_data['week_end'];
      $params->id_produk = $id_produk;

      $leads = 0;
      $totalan = 0;
      $closing = 0;
      $row = $this->_get_aktivitas_bulanan((array)$params);
      if ($row) {
        $leads = $row->leads;
        $totalan = $row->totalan;
        $closing = $row->closing;
      }
      $data_produk[$week-1] = array(
        'nama_bulan' => $params->nama_bulan,
        'week' => $no_week,
        'week_start' => $week_data['week_start'],
        'week_end' => $week_data['week_end'],
        'kode_produk' => $kd_produk,
        'id_produk' => $id_produk,
        'leads' => $leads,
        'totalan' => $totalan,
        'closing' => $closing,
      );
    }
    return array(
      'nama_bulan' => $params->nama_bulan,
      'count_weeks' => $cw,
      'data_produk' => $data_produk,
    );
    
  }

  function _get_data_days($params)
  {
    $bln = sprintf('%02d', $params->bulan);
    $start_date = $params->tahun."-".$params->bulan."-01";
    $last_day = date('04', strtotime($start_date));
    $end_date = $params->tahun."-".$params->bulan."-".$last_day;

    $data_produk = array();

    $no_date = 0;
    for ($i=1; $i <= $last_day*2; $i++) {
      $id_produk = 1;
      $kd_produk = 'HS';
      if ($i%2 == 1) {
        $kd_produk = 'GC';
        $id_produk = 2;
        $no_date++;
      }

      $sdate = sprintf('%02d', $no_date)."-".sprintf('%02d', $params->bulan)."-".$params->tahun;
      $params->date = $sdate;
      $params->id_produk = $id_produk;

      $leads = 0;
      $totalan = 0;
      $closing = 0;
      $row = $this->_get_aktivitas_harian((array)$params);
      if ($row) {
        $leads = $row->leads;
        $totalan = $row->totalan;
        $closing = $row->closing;
      }

      $data_produk[$i] = array(
        'nama_bulan' => $params->nama_bulan,
        'date' => $sdate,
        'date_start' => $start_date,
        'date_end' => $end_date,
        'kode_produk' => $kd_produk,
        'id_produk' => $id_produk,
        'leads' => $leads,
        'totalan' => $totalan,
        'closing' => $closing,
      );
    }

    return array(
      'nama_bulan' => $params->nama_bulan,
      'data_produk' => $data_produk,
    );
  }

  function _get_by_month($params = array())
  {
    $params = (Object)$params;
    $output = array();

    if ($params->bulan == "all") {
      $res_bulan = $this->db->order_by('id', 'asc')->get('bulan')->result();
    } else {
      $res_bulan = $this->db->where('id', $params->bulan)->get('bulan')->result();
    }

    $output = array();
    foreach ($res_bulan as $k_b) :
      $params->bulan = $k_b->id;
      $params->nama_bulan = $k_b->bulan;
      if (!empty($params->jenis) && $params->jenis == "harian") {
        $output[] = $this->_get_data_days($params);
      } else {
        $output[] = $this->_get_data_week($params);
      }
    endforeach;

    return $output;
  }

  public function get_jumlah($start, $end, $id_media, $id_group, $id_produk)
  {
    $this->db->select('SUM(lad.jumlah) AS jml');
    $this->db->from('laporan_aktivitas la');
    $this->db->join('laporan_aktivitas_detail lad', 'la.id=lad.id_laporan');
    $this->db->join('group_produk_cs_detail gpcd', 'la.id_cs=gpcd.id_cs');
    $this->db->join('group_produk_cs gpc', 'gpc.id=gpcd.id_group');
    $this->db->where('DATE(CONCAT(SUBSTRING(la.tanggal,7,4),"-",SUBSTRING(la.tanggal,4,2),"-",SUBSTRING(la.tanggal,1,2))) BETWEEN "'.$start.'" AND "'.$end.'"');
    $this->db->where('lad.media', $id_media);
    $this->db->where('gpc.id_produk', $id_group);
    $this->db->where('lad.id_produk', $id_produk);
    return $this->db->get()->row();
  }

  public function get_jumlah_day($date, $id_media, $id_group, $id_produk)
  {
    $this->db->select('SUM(lad.jumlah) AS jml');
    $this->db->from('laporan_aktivitas la');
    $this->db->join('laporan_aktivitas_detail lad', 'la.id=lad.id_laporan');
    $this->db->join('group_produk_cs_detail gpcd', 'la.id_cs=gpcd.id_cs');
    $this->db->join('group_produk_cs gpc', 'gpc.id=gpcd.id_group');
    $this->db->where('la.tanggal', $date);
    $this->db->where('lad.media', $id_media);
    $this->db->where('gpc.id_produk', $id_group);
    $this->db->where('lad.id_produk', $id_produk);
    return $this->db->get()->row();
  }

  public function get_jumlah_order($start, $end, $id_media, $id_group, $id_produk)
  {
    $this->db->select('SUM(od.jumlah) AS jml');
    $this->db->from('(SELECT * FROM orders WHERE media="'.$id_media.'" AND DATE(CONCAT(SUBSTRING(tgl_order,7,4),"-",SUBSTRING(tgl_order,4,2),"-",SUBSTRING(tgl_order,1,2))) BETWEEN "'.$start.'" AND "'.$end.'" LIMIT 0,6000) AS o');
    // $this->db->join('(SELECT * FROM laporan_order WHERE media="'.$id_media.'") AS lo', 'o.no_faktur=lo.no_invoice');
    $this->db->join('(SELECT * FROM orders_detail WHERE id_produk="'.$id_produk.'") AS od', 'od.id_orders_2=o.id_orders_2 AND od.id_toko=o.id_toko');
    $this->db->join('group_produk_cs_detail gpcd', 'o.id_sales=gpcd.id_cs');
    $this->db->join('(SELECT * FROM group_produk_cs WHERE id_produk="'.$id_group.'") AS gpc', 'gpc.id=gpcd.id_group');
    // $this->db->where('DATE(CONCAT(SUBSTRING(o.tgl_order,7,4),"-",SUBSTRING(o.tgl_order,4,2),"-",SUBSTRING(o.tgl_order,1,2))) BETWEEN "'.$start.'" AND "'.$end.'"');
    // $this->db->where('lo.media', $id_media);
    // $this->db->where('gpc.id_produk', $id_group);
    // $this->db->where('od.id_produk', $id_produk);
    return $this->db->get()->row();
  }

  public function get_jumlah_order_day($date, $id_media, $id_group, $id_produk)
  {
    $this->db->select('SUM(od.jumlah) AS jml');
    $this->db->from('orders o');
    // $this->db->join('laporan_order lo', 'o.no_faktur=lo.no_invoice');
    $this->db->join('(SELECT * FROM orders_detail WHERE id_produk="'.$id_produk.'") od', 'od.id_orders_2=o.id_orders_2 AND od.id_toko=o.id_toko');
    $this->db->join('group_produk_cs_detail gpcd', 'o.id_sales=gpcd.id_cs');
    $this->db->join('group_produk_cs gpc', 'gpc.id=gpcd.id_group');
    $this->db->where('o.tgl_order', $date);
    $this->db->where('o.media', $id_media);
    $this->db->where('gpc.id_produk', $id_group);
    $this->db->where('od.id_produk', $id_produk);
    return $this->db->get()->row();
  }

  function _get_produk()
  {
    $this->db->select('pr.*');
    $this->db->from('produk_retail pr');
    $this->db->order_by('pr.nama_produk', 'asc');
    return $this->db->get()->result();
  }

  function _get_aktivitas_total($params = array())
  {
    $res_produk = $this->_get_produk();
    $q_select = '';
    foreach ($res_produk as $key) :
      $q_select .= ', SUM('.strtolower($key->kode_produk).'.'.strtolower($key->kode_produk).') AS '.strtolower($key->kode_produk).'';
    endforeach;

    $this->db->select('gpcd.id_cs,gpc.`group`,u.first_name as nama_cs,u.last_name as last_nama_cs,
    SUM(la.leads) as leads, SUM(la.totalan) as totalan, SUM(la.closing) as closing'.$q_select);
    $this->db->from('group_produk_cs gpc');
    $this->db->join('group_produk_cs_detail gpcd', 'gpc.id=gpcd.id_group');
    $this->db->join('users u','u.id_users=gpcd.id_cs');

    $this->db->join('laporan_aktivitas la','la.id_cs = gpcd.id_cs','LEFT');
    
    foreach ($res_produk as $key) :
    $this->db->join('(SELECT id_laporan,sum(jumlah) as `'.strtolower($key->kode_produk).'` FROM laporan_aktivitas_detail WHERE id_produk = '.$key->id_produk_2.' GROUP BY id_laporan) as `'.strtolower($key->kode_produk).'`', ''.strtolower($key->kode_produk).'.id_laporan = la.id', 'left');
    endforeach;

    $this->db->where('gpc.id', $params['id']);
    
    /* if(!empty($params['bulan'])){
      // $this->db->where('right(tanggal,10)', $params['bulan']);
    } */
    
    $this->db->where('DATE(CONCAT(SUBSTRING(la.tanggal,7,4),"-",SUBSTRING(la.tanggal,4,2),"-",SUBSTRING(la.tanggal,1,2))) BETWEEN "'.$params['awal_periode'].'" AND "'.$params['akhir_periode'].'"');

    $this->db->group_by('gpcd.id_cs');
    return $this->db->get()->result();
  }

  /*function _get_aktivitas_total($params = array())
  {
    $this->db->select('gpcd.id_cs,gpc.`group`,u.first_name as nama_cs,u.last_name as last_nama_cs,
    la.leads, la.totalan, la.closing,
    SUM(gracilli.gracilli) As gracilli, SUM(herbaskin.herbaskin) AS herbaskin');
    $this->db->from('group_produk_cs gpc');
    $this->db->join('group_produk_cs_detail gpcd','gpc.id = gpcd.id_group');
    $this->db->join('users u','u.id_users = gpcd.id_cs');

    $this->db->join('(SELECT id_cs, SUM(leads) as leads, SUM(totalan) as totalan, SUM(closing) as closing FROM laporan_aktivitas WHERE DATE(CONCAT(SUBSTRING(tanggal,7,4),"-",SUBSTRING(tanggal,4,2),"-",SUBSTRING(tanggal,1,2))) BETWEEN "'.$params['awal_periode'].'" AND "'.$params['akhir_periode'].'" GROUP BY id_cs) AS la','la.id_cs = gpcd.id_cs','LEFT');
    
    // $this->db->join('orders o','o.id_sales = gpcd.id_cs','LEFT');
    $this->db->join('(SELECT od.id_orders_2, o.id_sales, sum(od.jumlah) as herbaskin FROM orders_detail od JOIN orders o ON od.id_orders_2=o.id_orders_2 WHERE od.id_produk = 1 AND DATE(CONCAT(SUBSTRING(o.tgl_order,7,4),"-",SUBSTRING(o.tgl_order,4,2),"-",SUBSTRING(o.tgl_order,1,2))) BETWEEN "'.$params['awal_periode'].'" AND "'.$params['akhir_periode'].'" GROUP BY o.id_sales) as herbaskin', 'herbaskin.id_sales = gpcd.id_cs', 'left');
    $this->db->join('(SELECT od.id_orders_2, o.id_sales, sum(od.jumlah) as gracilli FROM orders_detail od JOIN orders o ON od.id_orders_2=o.id_orders_2 WHERE od.id_produk = 2 AND DATE(CONCAT(SUBSTRING(o.tgl_order,7,4),"-",SUBSTRING(o.tgl_order,4,2),"-",SUBSTRING(o.tgl_order,1,2))) BETWEEN "'.$params['awal_periode'].'" AND "'.$params['akhir_periode'].'" GROUP BY o.id_sales) as gracilli', 'gracilli.id_sales = gpcd.id_cs', 'left');

    $this->db->where('gpc.id', $params['id']);
    
    // if(!empty($params['bulan'])){
      // $this->db->where('right(tanggal,10)', $params['bulan']);
    // }  
    
    // $this->db->where('DATE(CONCAT(SUBSTRING(la.tanggal,7,4),"-",SUBSTRING(la.tanggal,4,2),"-",SUBSTRING(la.tanggal,1,2))) BETWEEN "'.$params['awal_periode'].'" AND "'.$params['akhir_periode'].'"');
    // $this->db->where('DATE(CONCAT(SUBSTRING(o.tgl_order,7,4),"-",SUBSTRING(o.tgl_order,4,2),"-",SUBSTRING(o.tgl_order,1,2))) BETWEEN "'.$params['awal_periode'].'" AND "'.$params['akhir_periode'].'"');

    $this->db->group_by('gpcd.id_cs');
    return $this->db->get()->result();
  }*/

  function _get_aktivitas_bulanan($params = array())
  {
    $this->db->select('SUM(la.leads) AS leads, SUM(la.totalan) AS totalan, SUM(la.closing) AS closing');
    $this->db->from('laporan_aktivitas la');
    $this->db->join('group_produk_cs_detail gpcd', 'gpcd.id_cs=la.id_cs');
    $this->db->join('group_produk_cs gpc', 'gpc.id=gpcd.id_group');
    $this->db->where('DATE(CONCAT(SUBSTRING(la.tanggal,7,4),"-",SUBSTRING(la.tanggal,4,2),"-",SUBSTRING(la.tanggal,1,2))) BETWEEN "'.$params['week_start'].'" AND "'.$params['week_end'].'"');
    $this->db->where('gpc.id_produk', $params['id_produk']);
    return $this->db->get()->row();
  }

  function _get_aktivitas_harian($params = array())
  {
    $this->db->select('SUM(la.leads) AS leads, SUM(la.totalan) AS totalan, SUM(la.closing) AS closing');
    $this->db->from('laporan_aktivitas la');
    $this->db->join('group_produk_cs_detail gpcd', 'gpcd.id_cs=la.id_cs');
    $this->db->join('group_produk_cs gpc', 'gpc.id=gpcd.id_group');
    $this->db->where('la.tanggal', $params['date']);
    $this->db->where('gpc.id_produk', $params['id_produk']);
    return $this->db->get()->row();
  }

  function _getIsoWeeksInYear($year) {
    $date = new DateTime;
    $date->setISODate($year, 53);
    return ($date->format("W") === "53" ? 53 : 52);
  }

  function _getStartAndEndDate($week, $year) {
    $dto = new DateTime();
    $ret['week_start'] = $dto->setISODate($year, $week)->modify('-1 days')->format('Y-m-d');
    $ret['week_end'] = $dto->modify('+6 days')->format('Y-m-d');
    return $ret;
  }

  function getWeekDetail($year, $month = '')
  {
    $data = array();
    $no = 0;
    $thnbln = $year.'-'.sprintf('%02d', $month);
    $weeks = $this->_getIsoWeeksInYear($year);
    for ($x=1; $x<=$weeks; $x++) {
      $dates = $this->_getStartAndEndDate($x, $year);
      if (!empty($month)) {
        if ((substr($dates['week_start'],0,7) == $thnbln) || (substr($dates['week_end'],0,7) == $thnbln)) {
          $data[$no] = array(
            'week' => $x,
            'week_start' => $dates['week_start'],
            'week_end' => $dates['week_end'],
          );
          $no++;
        }
      } else {
        $data[$no] = array(
          'week' => $x,
          'week_start' => $dates['week_start'],
          'week_end' => $dates['week_end'],
        );
        $no++;
      }
    }
    return $data;
  }

  function getWeekDetail2($year, $month = '')
  {
    $data = array();
    $ext = $year.'-'.sprintf('%02d',$month).'-';
    $m_start = $ext.'01';
    $d_m_end = date('t', strtotime($m_start));
    // $m_end = $d_m_end.$ext;
    $c_week = floor($d_m_end/6);
    $h = 0;
    for ($i = 0; $i < $c_week; $i++) {
        $h++;
        if ($h > $d_m_end) {
            $h = $d_m_end;
        }
        $start = $ext.sprintf('%02d', $h);
        $h+=6;
        if ($h > $d_m_end) {
            $h = $d_m_end;
        }
        $end = $ext.sprintf('%02d', $h);
        $data[$i] = array(
            'week' => $i+1,
            'week_start' => $start,
            'week_end' => $end,
        );
    }
    return $data;
  }
  
    public function update($id_order,$page = '')
    {
      $row = $this->M_so->get_order_by_id($id_order);

      $harga_gc = 0;
      $qty_gc = 0;
      $harga_hs = 0;
      $qty_hs = 0;
      $res_od = $this->db->where('id_orders_2', $id_order)->get('orders_detail')->result();
      foreach ($res_od as $key) {
          if ($key->id_produk == "1") { // HS
              $harga_hs = $key->harga_jual;
              $qty_hs = $key->jumlah;
          } else if ($key->id_produk == "2") { // GC
              $harga_gc = $key->harga_jual;
              $qty_gc = $key->jumlah;
          }
      }

      $data = array(
        'id_toko' => $this->userdata->id_toko,
        'nama_toko' => $this->userdata->nama_toko,
        'nama_user' => $this->userdata->email,
        'active_order_sales' => 'active',
        'id_modul' => $this->userdata->id_modul,
        'nama_modul' => $this->userdata->nama_modul,
        'action' => site_url('admin/laporan_cs/update_action'),
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
        'id_status' => set_value('id_status', $row->id_status),
      );
      
      $this->view('laporan_cs/order_sales_update', $data);
    }

    public function update_action()
    {
        $id_order = $this->input->post('id_order', true);
        $data_update = array(
            'bukan_member' => $this->input->post('nama', true).' - '.$this->input->post('alamat', true),
            'no_hp' => $this->input->post('no_hp', true),
            'nominal' => $this->input->post('harga', true),
            'ongkir' => $this->input->post('ongkir', true),
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
            $this->db->select('pr.*');
            $this->db->from('produk_retail pr');
            $this->db->where('id_produk_2', 1);
            $row_pr = $this->db->get()->row();
            $harga_beli = 0;
            if ($row_pr) {
              $harga_beli = $row_pr->harga_beli;
            }
            $data_insert_d = array(
                'id_orders_2' => $id_order,
                'id_produk' => 1,
                'harga_satuan' => $harga_beli,
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
            $this->db->select('pr.*');
            $this->db->from('produk_retail pr');
            $this->db->where('id_produk_2', 2);
            $row_pr = $this->db->get()->row();
            $harga_beli = 0;
            if ($row_pr) {
              $harga_beli = $row_pr->harga_beli;
            }
            $data_insert_d = array(
                'id_orders_2' => $id_order,
                'id_produk' => 2,
                'harga_satuan' => $harga_beli,
                'harga_jual' => $this->input->post('harga_gc', true),
                'jumlah' => $this->input->post('qty_gc', true),
            );
            $this->db->insert('orders_detail', $data_insert_d);
        }

        redirect(site_url('admin/laporan_cs/'),'refresh');
    }

  public function coba()
  {
    $a = $this->getWeekDetail(2019, 06);
    echo "<pre>";
    print_r ($a);
    echo "</pre>";
    
  }

}