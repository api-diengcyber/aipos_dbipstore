<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
    $this->load->library(array('ion_auth', 'form_validation', 'datatables'));
    $this->load->helper(array('url', 'language'));
    $this->lang->load('auth', 'indonesian');
    $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
    $this->load->model('Pengaturan_opsi_model', 'M_opsi');
    $this->load->model('Pengaturan_transaksi_model');
  }

  function get_segment()
  {
    return (array) $this->uri->segment_array();
  }

  function get_url_c()
  {
    $arr = $this->get_segment();
    return implode($arr, '/');
  }

  function get_sess_name($id_toko, $level, $controller)
  {
    return 'ai_controller_' . $id_toko . '_' . $level . '::' . $controller;
  }

  function get_menu($id_toko, $level, $arr = array())
  {
    $i = 0;
    $wh = array();
    foreach ($arr as $key) :
      $i++;
      $sw = 'SUBSTRING_INDEX(SUBSTRING_INDEX(m.controller,"/",' . $i . '),"/",-1)';
      $wh[] = '(' . $sw . '="' . $key . '" OR ' . $sw . '="*")';
    endforeach;
    $this->db->select('um.*, m.controller');
    $this->db->from('user_menu um');
    $this->db->join('pil_menu m', 'um.id_menu=m.id AND um.id_toko=m.id_toko');
    $this->db->where('um.id_toko', $id_toko);
    $this->db->where('um.level', $level);
    $this->db->where('(' . implode($wh, ' AND ') . ')');
    return $this->db->get()->row();
  }

  function check_allowed_controller($id_toko, $level, $controller)
  {
    if (empty($controller)) {
      $controller = $this->get_url_c();
      $arc = $this->get_segment();
    } else {
      $arc = explode('/', $controller);
    }
    $sess_name = $this->get_sess_name($id_toko, $level, $controller);
    if (!empty($this->session->userdata($sess_name))) {
      return $this->session->userdata($sess_name);
    } else {
      $row = $this->get_menu($id_toko, $level, $arc);
      $sess_array = array();
      if ($row) {
        $sess_array[$sess_name] = 'ok';
      } else {
        $sess_array[$sess_name] = 'blocked';
      }
      $this->session->set_userdata($sess_array);
      return $sess_array[$sess_name];
    }
  }

  function userdata()
  {
    if (!empty($this->session->userdata('ai_user_userdata'))) {
      return $this->session->userdata('ai_user_userdata');
    } else {
      return $this->get_data();
    }
  }

  function get_data()
  {
    $row = $this->db->select('u.*, t.nama_toko, t.versi_aipos, t.id_modul, pm.nama_modul, c.nama AS nama_cabang, c.jenis AS jenis_cabang')
      ->from('users u')
      ->join('toko t', 'u.id_toko=t.id')
      ->join('pil_modul pm', 't.id_modul=pm.id')
      ->join('cabang c', 'u.id_cabang=c.id AND u.id_toko=c.id_toko', 'left')
      ->where('u.id', $this->ion_auth->get_user_id())
      ->get()->row();
    if ($row) {
      // array session userdata
      $array = array(
        'ai_user_userdata' => $row,
      );
      $this->session->set_userdata($array);
      return $row;
    }
  }

  function set_foreign_0()
  {
    $this->db->query('SET FOREIGN_KEY_CHECKS = 0;');
  }

  function set_foreign_1()
  {
    $this->db->query('SET FOREIGN_KEY_CHECKS = 1;');
  }

  function get_order($id_toko)
  {
    $this->db->select('o.*');
    $this->db->from('orders o');
    $this->db->join('(SELECT id_orders_2, SUM(sub_total) AS total FROM orders_detail GROUP BY id_orders_2) AS od', 'o.id_orders_2=od.id_orders_2', 'left');
    $this->db->where('o.id_toko', $id_toko);
    $this->db->where('(o.nominal!=od.total OR od.total IS NULL)');
    return $this->db->get();
  }

  function get_od($id_toko, $id_order)
  {
    $this->db->select('od.*');
    $this->db->from('orders_detail od');
    $this->db->where('od.id_toko', $id_toko);
    $this->db->where('od.id_orders_2', $id_order);
    return $this->db->get();
  }

  function delete_od($id_toko, $id_order)
  {
    $this->db->where('id_orders_2', $id_order);
    $this->db->where('id_toko', $id_toko);
    $this->db->delete('orders_detail');
  }

  function insert_od($data)
  {
    $this->db->insert('orders_detail', $data);
  }

  function delete_od2($id_toko)
  {
    $this->db->where('id_toko', $id_toko);
    $this->db->where('jumlah < 1');
    $this->db->delete('orders_detail');
  }

  function get_produk_jual($id_toko)
  {
    $this->db->select('SUM(od.jumlah) AS jumlah');
    $this->db->from('orders o');
    $this->db->join('orders_detail od', 'o.id_orders_2=od.id_orders_2 AND o.id_toko=od.id_toko');
    $this->db->where('o.id_toko', $id_toko);
    return $this->db->get();
  }

  function query_get_stok($id_toko)
  {
    return 'SELECT pr.id_produk_2 AS id_produk, pr.nama_produk, SUM((p.jml-od.jml)+IFNULL(ps.jml,0)) AS jml_stok
    FROM produk_retail pr 
    JOIN (SELECT od.id_produk, SUM(od.jumlah) AS jml FROM orders_detail od JOIN orders o ON od.id_orders_2=o.id_orders_2 AND od.id_toko=o.id_toko AND o.pembayaran != 5 WHERE od.id_toko="' . $id_toko . '" AND od.id_orders_2>0 GROUP BY od.id_produk) AS od ON pr.id_produk_2=od.id_produk
    JOIN (SELECT id_produk, SUM(jumlah) AS jml FROM pembelian WHERE id_toko="' . $id_toko . '" GROUP BY id_produk) AS p ON pr.id_produk_2=p.id_produk 
    LEFT JOIN (SELECT id_produk, SUM(stok) AS jml FROM penyesuaian_stok WHERE id_toko="' . $id_toko . '" GROUP BY id_produk) AS ps ON pr.id_produk_2=ps.id_produk 
    GROUP BY pr.id_produk';
  }

  function get_total_stok($id_toko)
  {
    $this->db->select('ds.jml_stok');
    $this->db->from('produk_retail pr');
    $this->db->join('users u', 'pr.id_users=u.id_users AND pr.id_toko=u.id_toko');
    $this->db->join('(' . $this->query_get_stok($id_toko) . ') AS ds', 'pr.id_produk_2=ds.id_produk');
    $this->db->join('satuan_produk sat', 'pr.satuan=sat.id_satuan AND sat.id_users=u.id_users AND sat.id_toko=pr.id_toko', 'left');
    $this->db->where('pr.id_toko', $id_toko);
    $this->db->group_by('pr.id_produk_2');
    return $this->db->get();
  }
}
