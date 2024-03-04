<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi_penjualan_model extends CI_Model
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Pengaturan_transaksi_model');
    $this->load->model('Mutasi_stok_model');
  }

  function action($id_toko, $data = array())
  {
    $this->db->trans_begin();
    if (!empty($id)) {
      $r = $this->edit($id_toko, $data);
    } else {
      $r = $this->create($id_toko, $data);
    }
    if ($this->db->trans_status() === FALSE || !$r) {
      $this->db->trans_rollback();
    } else {
      $this->db->trans_commit();
    }
    return $r;
  }

  function get_last_number($id_toko, $date)
  {
    $this->db->select('IFNULL(MAX(id_orders_2)-MIN(id_orders_2),0) + IF(COUNT(id_orders_2)>0,2,1) AS next_order');
    $this->db->where('tgl_order', $date);
    $this->db->where('id_toko', $id_toko);
    $this->db->order_by('id_orders_2','desc');
    $row = $this->db->get('orders')->row();
    if (!empty($row)) {
      return $row->next_order;
    } else {
      return 1;
    }
  }


  public function get_last_id_orders2($id_toko)
  {
    $last_id = $this->db->select_max('id_orders2', 'id_orders')
    ->from('orders')
    // ->where('id_toko', $id_toko)
    ->get()
    ->row();

    // Periksa apakah query berhasil dieksekusi
    // if ($query->num_rows() > 0) {
    //     // Ambil baris pertama dari hasil query
    //     $last_id_row = $query->row();
        
    //     // Ambil nilai maksimum dari kolom id_orders2
    //     $last_id = $last_id_row->id_orders;

        return $last_id;
    // } else {
    //     // Handle jika tidak ada baris yang ditemukan
    //     return null;
    // }
  }

  function get_faktur($id_toko, $date, $id_media)
  {
    $strtime = strtotime($date);
    $current_order = $this->get_last_number($id_toko, date('d-m-Y', $strtime));
    $current_order = sprintf('%04d', $current_order);
    return $id_media.date('ymd', $strtime).$current_order;
  }

  function get_last_id_orders($id_toko)
  {
    $this->db->select('IFNULL(MAX(id_orders_2),0) + 1 AS new_id');
    $this->db->from('orders');
    $this->db->where('id_toko', $id_toko);
    $this->db->order_by('id_orders_2', 'desc');
    $row = $this->db->get()->row();
    if (!empty($row)) {
      return $row->new_id;
    } else {
      return 1;
    }
  }

  function get_orders_temp($id_toko, $id_users)
  {
    $this->db->select('ot.*, p.id_produk_2 AS produk_id, p.id_produk_2, p.barcode, p.nama_produk, p.harga_1, p.harga_2, p.harga_3, p.harga_4, p.harga_5, p.harga_6, p.diskon AS diskon_produk, p.mingros, p.dibeli, p.harga_beli');
    $this->db->from('orders_temp ot');
    $this->db->join('users u', 'ot.id_users=u.id_users AND ot.id_toko=u.id_toko');
    $this->db->join('produk_retail p', 'ot.id_produk=p.id_produk_2 AND p.id_toko=ot.id_toko');
    $this->db->where('ot.id_toko', $id_toko);
    $this->db->where('ot.id_users', $id_users);
    $this->db->where('ot.jumlah > 0');
    $this->db->order_by('ot.id_orders_temp', 'asc');
    $this->db->group_by('ot.id_orders_temp');
    return $this->db->get();
  }

  function get_produk_beli($id_toko, $id_produk)
  {
    $this->db->select('p.*, DATE(CONCAT(SUBSTRING(p.tgl_expire,7,4),"-",SUBSTRING(p.tgl_expire,4,2),"-",SUBSTRING(p.tgl_expire,1,2))) AS exp_date,'.$this->Mutasi_stok_model->select_stok_mutasi('stok', true));
    $this->db->from('pembelian p');
    $this->db->join('users u', 'p.id_users=u.id_users AND p.id_toko=u.id_toko');
    // $this->db->join('stok_produk sp', 'p.id_pembelian=sp.id_pembelian AND sp.id_toko=p.id_toko');
    $this->Mutasi_stok_model->query_stok_mutasi($this->db, $id_toko, null, 'p.id_produk');
    $this->db->where('p.id_produk', $id_produk);
    $this->db->where('p.id_toko', $id_toko);
    // Jika tidak kadaluarsa
    $this->db->where('DATE(CONCAT(SUBSTRING(p.tgl_expire,7,4),"-",SUBSTRING(p.tgl_expire,4,2),"-",SUBSTRING(p.tgl_expire,1,2))) > "'.date('Y-m-d').'"'); 
    // FIFO //
    $this->db->order_by('DATE(CONCAT(SUBSTRING(p.tgl_masuk,7,4),"-",SUBSTRING(p.tgl_masuk,4,2),"-",SUBSTRING(p.tgl_masuk,1,2))) ASC'); 
    $this->db->order_by('p.id_pembelian', 'ASC');
    $this->db->group_by('p.id_pembelian');
    return $this->db->get();
  }

  function update_stok($id_toko, $id_pembelian, $stok)
  {
    $this->db->where('id_toko', $id_toko);
    $this->db->where('id_pembelian', $id_pembelian);
    return $this->db->update('stok_produk', array('stok' => $stok));
  }

  function action_stok($id_toko, $id_produk, $jml_stok)
  {
    $res = $this->get_produk_beli($id_toko, $id_produk)->result();
    $array_tr = array();
    foreach ($res as $key) : 
      if ($jml_stok > $key->stok) {
        $k_beli = $key->stok;
      } else {
        $k_beli = $jml_stok;
      }
      // Jika opsi stok minus 
      $opsi_stok = $this->M_opsi->get_opsi_stok($id_toko);
      if ($opsi_stok->opsi == 1) {
        $k_beli = $jml_stok;
      }
      $sisa_stok = $key->stok-$k_beli;
      if ($opsi_stok->opsi == 0) {
        if ($sisa_stok < 0) {
          $sisa_stok = 0;
        }
      }
      // masukkan array
      if ($k_beli > 0) {
        $array_tr[$key->id_pembelian] = $k_beli;
      } 
      // update stok produk
      $this->update_stok($id_toko, $key->id_pembelian, $sisa_stok);
      $jml_stok -= $key->stok;
      if ($jml_stok > 0) {
        $jml_stok = $jml_stok;
      } else {
        $jml_stok = 0;
      }
    endforeach;
    return (Object) array(
      'json' => json_encode($array_tr),
    );
  }

  function update_produk($id_toko, $id_produk, $data = array())
  {
    $this->db->where('id_toko', $id_toko);
    $this->db->where('id_produk_2', $id_produk);
    return $this->db->update('produk_retail', $data);
  }

  function insert_od($id_toko, $id_users, $id_orders)
  {
    $status = true;
    $total_hp = 0;
    $res = $this->get_orders_temp($id_toko, $id_users)->result();
    foreach ($res as $key) : 
      $hp = $key->harga_beli * $key->jumlah;
      $total_hp += $hp;
      $harga_barang = $key->harga_jual * ((100-$key->diskon_produk)/100) * ((100-$key->diskon)/100) * ((100-$key->diskon2)/100) * ((100-$key->diskon3)/100) * $key->jumlah;
      // proses pengurangan database stok 
      $f_as = $this->action_stok($id_toko, $key->id_produk, $key->jumlah);
      // insert barang ke orders detail
      $data = array(
        'id_orders_2' => $id_orders,
        'id_toko' => $id_toko,
        'id_produk' => $key->id_produk,
        'pil_harga' => $key->pil_harga,
        'jumlah' => $key->jumlah,
        'jumlah_bonus' => $key->jumlah_bonus,
        'harga_satuan' => !empty($key->harga_beli)?$key->harga_beli:0,
        'harga_jual' => $key->harga_jual,
        'id_karyawan' => $id_users,
        'diskon' => $key->diskon*1,
        'diskon2' => $key->diskon2*1,
        'diskon3' => $key->diskon3*1,
        'potongan' => $key->potongan*1,
        'subtotal' => $harga_barang,
        'json' => $f_as->json,
      );
      $f_iot = $this->db->insert('orders_detail', $data);
      // update dibeli produk retail
      $dibeli = $key->dibeli + $key->jumlah + $key->jumlah_bonus;
      $f_up = $this->update_produk($id_toko, $key->id_produk, array('dibeli' => $dibeli));
      if (!$res || !$f_as || !$f_iot || !$f_up) {
        $status = false;
      }
    endforeach;
    return (Object) array(
      'status' => $status,
      'total_hp' => $total_hp,
    );
  }

  function delete_ot($id_toko, $id_users)
  {
    $this->db->where('id_toko', $id_toko);
    $this->db->where('id_users', $id_users);
    return $this->db->delete('orders_temp');
  }

  function get_member($id_toko, $id_member)
  {
    $this->db->select('m.*');
    $this->db->from('member m');
    $this->db->join('users u', 'm.id_users=u.id_users AND m.id_toko=u.id_toko', 'left');
    $this->db->where('m.id_toko', $id_toko);
    $this->db->where('m.id_member', $id_member);
    return $this->db->get();
  }

  function create($id_toko, $data)
  {
    $data = (Array) $data;
    $new_faktur = $this->get_faktur($id_toko, $data['date'], $data['id_media']);
    $new_id = $this->get_last_id_orders($id_toko);
    // insert orders detail
    $f_iod = $this->insert_od($id_toko, $data['id_users'], $new_id);
    // insert orders
    $bukan_member = $data['nama_pembeli']." - ".$data['alamat_pembeli'];
    $laba = $data['total'] - $f_iod->total_hp;
    $id_pembeli = $data['id_pembeli']!='null'?$data['id_pembeli']:'';
    $data_insert = array(
      'id_orders_2' => $new_id,
      'id_toko' => $id_toko,
      'id_users' => $data['id_users'],
      'id_sales' => $data['id_sales'],
      'no_faktur' => $new_faktur,
      'tgl_order' => $data['date'],
      'jam_order' => $data['jam'],
      'pembeli' => $id_pembeli,
      'nama_pembeli' => $data['nama_pembeli'],
      'alamat_pembeli' => $data['alamat_pembeli'],
      'no_hp' => $data['no_hp'],
      'bukan_member' => $bukan_member,
      'pembayaran' => $data['pembayaran'],
      'nominal' => $data['total'],
      'bayar' => $data['total'],
      'media' => $data['id_media'],
      'bank' => $data['id_bank'],
      'id_expedisi' => $data['id_expedisi'],
      'no_resi' => $data['no_resi'],
      'biaya_lain' => $data['biaya_cod'],
      'ongkir' => $data['ongkir'],
      'subtotal' => $data['total'] + $data['ongkir'],
      'laba' => $laba,
      'p_nama' => $data['p_nama'],
      'p_alamat' => $data['p_alamat'],
      'p_hp' => $data['p_hp'],
      'd_nama' => $data['d_nama'],
      'd_alamat' => $data['d_alamat'],
      'd_hp' => $data['d_hp'],
      'nominal_transfer' => $data['nominal_transfer'],
      'nominal_split' => $data['nominal_split'],
    );
    $f_io = $this->db->insert('orders', $data_insert);
    // delete orders temp
    $f_ot = $this->delete_ot($id_toko, $data['id_users']);
    // insert piutang
    if ($data['pembayaran'] == '2') { // kredit
      $str_deadline = mktime(0,0,0,date('m'),date('d')+$data['deadline'],date('Y'));
      $tgl_deadline = date('d-m-Y', $str_deadline);
      $row_last_piutang = $this->db->where('id_toko', $id_toko)->order_by('id_piutang', 'desc')->get('piutang')->row();
      $id_piutang = 1;
      if ($row_last_piutang) {
        $id_piutang = $row_last_piutang->id_piutang + 1;
      }
      $data_piutang = array(
        'id_piutang' => $id_piutang,
        'id_toko' => $id_toko,
        'id_users' => $data['id_users'],
        'no_faktur' => $new_faktur,
        'id_pembeli' => $data['id_pembeli'],
        'jumlah_hutang' => $data['total'],
        'jumlah_bayar' => 0,
        'sisa' => $data['total'],
        'tanggal' => $data['date'],
        'deadline' => $tgl_deadline,
        'tgl_order' => $data['date'],
      );
      $this->Piutang_retail_model->insert($data_piutang);
    }
    // insert akuntansi
    $this->Pengaturan_transaksi_model->id_toko = $id_toko;
    $this->Pengaturan_transaksi_model->id_users = $data['id_users'];
    $no_faktur = $new_faktur;
    $nama_member = $data['nama_pembeli'];
    $uid_akun = 0;
    $nominal_tunai = $data['nominal_tunai'];
    $akun_transfer = 0;
    $nominal_hutang = 0;
    $nominal_transfer = $data['nominal_transfer'];
    $total_diskon = $data['total_diskon'];
    $total_ppn = $data['total_ppn'];
    $ada_member = false;
    $hpp = $data['total'] - $laba;
    $total = $data['total'];
    $id_piutang = 0;
    $id_bank = $data['id_bank'];
    $id_orders = $new_id;
    $pembayaran = $data['pembayaran'];
    $ongkir = $data['ongkir'];
    // get member
    $row_member = $this->get_member($id_toko, $data['id_pembeli'])->row();
    if ($row_member) {
      $nama_member = strtoupper(trim(str_replace(' ','_',$row_member->nama)));
      $uid_akun = $row_member->uid_akun;
      $ada_member = true;
    }
    eval($this->Pengaturan_transaksi_model->accounting('penjualan'));
    // status
    if (!$f_iod->status || !$f_io || !$f_ot) {
      return false;
    } else {
      return (Object) array(
        'no_faktur' => $new_faktur,
        'next_no_faktur' => $this->get_faktur($id_toko, $data['date'], $data['id_media']),
      );
    }
  }

}