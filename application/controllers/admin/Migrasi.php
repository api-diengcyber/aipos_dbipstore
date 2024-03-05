<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migrasi extends AI_Admin
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Migrasi_retail_model');
    $this->load->model('Arus_kas_model');
    $this->load->library('form_validation');
    $this->load->library('datatables');
  }

  public function index()
  {
    $data = array(
      'active_produk' => 'active',
      'action' => site_url('admin/migrasi/import_action'),
    );
    $this->view('migrasi/migrasi_list', $data);
  }

  public function import_action()
  {
    $name_file = $_FILES['file']['name'];
    $tmp_file = $_FILES['file']['tmp_name'];
    $type_file = $_FILES['file']['type'];
    if ($type_file == 'application/vnd.ms-excel' || $type_file == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
      $format = '.xls';
      if ($type_file == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
        $format = '.xlsx';
      }
      $file_upload = 'migrasi-' . md5($this->userdata->id_toko) . $format;
      if (file_exists('assets/excel/' . $file_upload)) {
        unlink('assets/excel/' . $file_upload);
      }
      $upload = move_uploaded_file($tmp_file, 'assets/excel/' . $file_upload);
      if ($upload) {
        $excel = $this->Migrasi_retail_model->import_temp_excel('assets/excel/' . $file_upload, $this->userdata->id_toko);
        $this->session->set_flashdata('message', 'Import Success');
        redirect(site_url('admin/migrasi/preview'));
      } else {
        $this->session->set_flashdata('message', 'Import Failed');
        redirect(site_url('admin/migrasi'));
      }
    } else {
      $this->session->set_flashdata('message', 'Failed file format');
      redirect(site_url('admin/migrasi'));
    }
  }

  public function json()
  {
    header('Content-Type: application/json');
    echo $this->Migrasi_retail_model->json($this->userdata->id_toko);
  }

  public function preview()
  {
    $data = array(
      'active_produk' => 'active',
      'data_kategori' => $this->db->where('id_toko', $this->userdata->id_toko)->order_by('nama_kategori', 'asc')->get('kategori_produk')->result(),
      'data_satuan' => $this->db->where('id_toko', $this->userdata->id_toko)->order_by('satuan', 'asc')->get('satuan_produk')->result(),
    );
    $this->view('migrasi/migrasi_preview', $data);
  }

  public function updateKategoriAjax()
  {
    header('Content-type: application/json');
    $data = array();
    $id_temp = $this->input->post('id_temp', true);
    $id_kategori_2 = $this->input->post('id_kategori_2', true);
    $update = array(
      'kategori' => $id_kategori_2,
    );
    $this->db->where('id_toko', $this->userdata->id_toko);
    $this->db->where('id_temp', $id_temp);
    $this->db->update('produk_retail_temp', $update);
    $data['success'] = '1';
    echo json_encode($data);
  }

  public function updateSatuanAjax()
  {
    header('Content-type: application/json');
    $data = array();
    $id_temp = $this->input->post('id_temp', true);
    $id_satuan = $this->input->post('id_satuan', true);
    $update = array(
      'satuan' => $id_satuan,
    );
    $this->db->where('id_toko', $this->userdata->id_toko);
    $this->db->where('id_temp', $id_temp);
    $this->db->update('produk_retail_temp', $update);
    $data['success'] = '1';
    echo json_encode($data);
  }

  public function delete($id)
  {
    $row = $this->Migrasi_retail_model->get_by_id($id);
    if ($row) {
      $this->Migrasi_retail_model->delete($id);
      $this->session->set_flashdata('message', 'Delete Record Success');
      redirect(site_url('admin/migrasi/preview'));
    } else {
      $this->session->set_flashdata('message', 'Record Not Found');
      redirect(site_url('admin/migrasi/preview'));
    }
  }

  public function proses_action()
  {
    $res_temp = $this->db->select('*')
      ->from('produk_retail_temp')
      ->where('id_toko', $this->userdata->id_toko)
      ->where('status', '0')
      ->get()->result();
    $i = 0;
    $this->db->query('SET FOREIGN_KEY_CHECKS = 0;');

    $id_faktur = 1;
    $row_last_faktur = $this->db->where('id_toko', $this->userdata->id_toko)->order_by('id_faktur', 'desc')->get('faktur_retail')->row();
    if ($row_last_faktur) {
      $id_faktur = $row_last_faktur->id_faktur + 1;
    }
    $data_insert = array(
      'id_faktur' => $id_faktur,
      'id_users' => $this->userdata->id_users,
      'id_toko' => $this->userdata->id_toko,
      'tgl' => date('d-m-Y'),
      'no_faktur' => rand(100000000, 9999999999),
      'id_supplier' => 0,
      'dp' => 0,
      'pembayaran' => 0,
    );
    $this->db->insert('faktur_retail', $data_insert);

    foreach ($res_temp as $key) {
      $id_produk_2 = 1;
      $row_last_pr = $this->db->where('id_toko', $this->userdata->id_toko)->order_by('id_produk_2', 'desc')->get('produk_retail')->row();
      if ($row_last_pr) {
        $id_produk_2 = $row_last_pr->id_produk_2 + 1;
      }
      $data_pr = array(
        'id_produk_2' => $id_produk_2,
        'id_toko' => $this->userdata->id_toko,
        'id_users' => $this->userdata->id_users,
        'barcode' => $key->barcode,
        'nama_produk' => $key->nama_produk,
        'id_kategori' => $key->kategori,
        'deskripsi' => $key->deskripsi,
        'harga_1' => $key->harga_1,
        'harga_2' => $key->harga_2,
        'harga_3' => $key->harga_3,
        'mingros' => $key->mingros,
        'satuan' => $key->satuan,
      );
      $this->db->insert('produk_retail', $data_pr);
      $data_hpp = array(
        'id_toko' => $this->userdata->id_toko,
        'id_produk' => $id_produk_2,
        'hpp_rata' => $key->hpp,
        'hpp_fifo' => $key->hpp,
        'hpp_lifo' => $key->hpp,
      );
      $this->db->insert('hpp', $data_hpp);
      $id_pembelian = 1;
      $row_last_beli = $this->db->where('id_toko', $this->userdata->id_toko)->order_by('id_pembelian', 'desc')->get('pembelian')->row();
      if ($row_last_beli) {
        $id_pembelian = $row_last_beli->id_pembelian + 1;
      }
      $data_beli = array(
        'id_pembelian' => $id_pembelian,
        'id_toko' => $this->userdata->id_toko,
        'id_users' => $this->userdata->id_users,
        'id_faktur' => $id_faktur,
        'id_produk' => $id_produk_2,
        'tgl_masuk' => date('d-m-Y'),
        'tgl_expire' => date('d-m-2099'),
        'id_supplier' => '0',
        'pembayaran' => '1',
        'harga_satuan' => $key->hpp,
        'total_bayar' => $key->stok  * $key->hpp,
        'jumlah' => $key->stok,
      );
      $this->db->insert('pembelian', $data_beli);
      $data_stok = array(
        'id_toko' => $this->userdata->id_toko,
        'id_pembelian' => $id_pembelian,
        'id_produk' => $id_produk_2,
        'stok' => $key->stok,
      );
      $this->db->insert('stok_produk', $data_stok);
      $this->db->where('id', $key->id);
      $this->db->delete('produk_retail_temp');
      $i++;
    }
    $this->db->query('SET FOREIGN_KEY_CHECKS = 1;');

    $this->session->set_flashdata('message', $i . ' data inserted');
    redirect(site_url('admin/migrasi/preview'));
  }

  private function generate_faktur_v5($id_toko)
  {
    $row = $this->db->select('no_faktur')
      ->from('faktur_retail')
      ->where('id_toko', $id_toko)
      ->order_by('no_faktur', 'DESC')
      ->get()->row();
    if ($row) {
      $no_faktur = substr($row->no_faktur, 4, 11) + 1;
    } else {
      $no_faktur = 1;
    }
    $r = sprintf('%05d', $no_faktur);
    return date('my') . $r;
  }

  public function excel()
  {
    $this->load->helper('exportexcel');
    $namaFile = "migrasi_produk_retail.xls";
    $judul = "migrasi_produk_retail";
    $tablehead = 0;
    $tablebody = 1;
    $nourut = 1;
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
    xlsWriteLabel($tablehead, $kolomhead++, "IMEI");
    xlsWriteLabel($tablehead, $kolomhead++, "Nama Produk");
    xlsWriteLabel($tablehead, $kolomhead++, "Kategori");
    xlsWriteLabel($tablehead, $kolomhead++, "Deskripsi");
    xlsWriteLabel($tablehead, $kolomhead++, "Harga Jual");
    xlsWriteLabel($tablehead, $kolomhead++, "Harga Grosir");
    xlsWriteLabel($tablehead, $kolomhead++, "Harga Member");
    xlsWriteLabel($tablehead, $kolomhead++, "Mingros");
    xlsWriteLabel($tablehead, $kolomhead++, "Satuan");
    $res_temp = $this->db->where('id_toko', $this->userdata->id_toko)->get('produk_retail_temp')->result();
    foreach ($res_temp as $data) {
      $kolombody = 0;
      xlsWriteNumber($tablebody, $kolombody++, $nourut);
      xlsWriteLabel($tablebody, $kolombody++, $data->barcode);
      xlsWriteLabel($tablebody, $kolombody++, $data->nama_produk);
      xlsWriteLabel($tablebody, $kolombody++, $data->kategori);
      xlsWriteLabel($tablebody, $kolombody++, $data->deskripsi);
      xlsWriteNumber($tablebody, $kolombody++, $data->harga_1);
      xlsWriteNumber($tablebody, $kolombody++, $data->harga_2);
      xlsWriteNumber($tablebody, $kolombody++, $data->harga_3);
      xlsWriteNumber($tablebody, $kolombody++, $data->mingros);
      xlsWriteNumber($tablebody, $kolombody++, $data->satuan);
      $tablebody++;
      $nourut++;
    }
    xlsEOF();
    exit();
  }

  public function www()
  {
    $id_toko = 158;
    // $id_toko = $this->userdata->id_toko;
    # code...
    $this->db->where('id_toko', $id_toko);
    $this->db->where('harga_satuan', 0);
    // $this->db->limit(1);
    $res_od = $this->db->get('orders_detail')->result();
    foreach ($res_od as $key) :
      # code...
      // get data_pembelian
      $this->db->where('id_toko', $id_toko);
      $this->db->where('id_produk', $key->id_produk);
      $this->db->where('harga_satuan > 0');
      $this->db->order_by('DATE(CONCAT(SUBSTRING(tgl_masuk,7,4),"-",SUBSTRING(tgl_masuk,4,2),"-",SUBSTRING(tgl_masuk,1,2))) DESC');
      $this->db->order_by('id', 'desc');
      $row_p = $this->db->get('pembelian')->row();
      $harga_satuan = 0;
      if ($row_p) {
        $harga_satuan = $row_p->harga_satuan;
      }
      echo $key->id_produk . ' :: ' . $harga_satuan;
      echo '<br>';

      // update harga_satuan orders detail
      $data_update = array(
        'harga_satuan' => $harga_satuan,
      );
      $this->db->where('id_orders', $key->id_orders);
      $this->db->update('orders_detail', $data_update);

      // orders
      $this->db->where('id_toko', $id_toko);
      $this->db->where('id_orders_2', $key->id_orders_2);
      $row_o = $this->db->get('orders')->row();
      if ($row_o) :
        // get sum hpp orders detail
        $this->db->select('SUM(jumlah*IFNULL(harga_satuan,0)) AS sub_hpp');
        $this->db->from('orders_detail');
        $this->db->where('id_toko', $id_toko);
        $this->db->where('id_orders_2', $key->id_orders_2);
        $row_od = $this->db->get()->row();
        $sub_hpp = 0;
        if ($row_od) {
          $sub_hpp = $row_od->sub_hpp;
        }
        $laba = $row_o->nominal - $sub_hpp;

        // update laba orders
        $data_update = array(
          'laba' => $laba,
          'laba_bersih' => $laba,
        );
        $this->db->where('id_toko', $id_toko);
        $this->db->where('id_orders_2', $key->id_orders_2);
        $this->db->update('orders', $data_update);
      endif;

    endforeach;
  }
}

/* End of file Migrasi.php */
/* Location: ./application/controllers/Migrasi.php */
