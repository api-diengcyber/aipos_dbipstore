<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migrasi_retail_model extends CI_Model
{

    public $table = 'produk_retail_temp';
    public $id = 'id_temp';
    public $barcode = 'barcode';
    public $nama_produk = 'nama_produk';
    public $id_toko = 'id_toko';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
        $this->load->library("PHPExcel");
    }

    // datatables
    function json()
    {
        $this->datatables->select('p.id, p.id_temp, p.id_toko, p.barcode, p.kategori, p.deskripsi, p.satuan, p.nama_produk, p.harga_1, p.harga_2, p.harga_3, p.mingros, p.hpp, p.stok, p.status');
        $this->datatables->from('produk_retail_temp p');
        $this->datatables->add_column('action', anchor(site_url('migrasi/delete/$1'), '<button class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash-o bigger-120"></i></button>', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_temp');
        $this->datatables->group_by('p.id_temp');
        return $this->datatables->generate();
    }

    function import_temp_excel($file_input, $id_toko)
    {
        ini_set('memory_limit', '-1');
        try {
            $objPHPExcel = PHPExcel_IOFactory::load($file_input);
        } catch (Exception $e) {
            die('Error loading file :' . $e->getMessage());
        }
        $totalrows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel         
        $objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
        $ins = array();
        $t = 0;
        for ($i = 2; $i <= $totalrows; $i++) {
            $id_temp = 1;
            $row_last_temp = $this->db->where('id_toko', $id_toko)->order_by('id_temp', 'desc')->get('produk_retail_temp')->row();
            if ($row_last_temp) {
                $id_temp = $row_last_temp->id_temp + 1;
            }
            $barcode = $objWorksheet->getCellByColumnAndRow(1, $i)->getValue();
            if (empty($barcode)) {
                $barcode = mt_rand(100000, 999999) . date("is");
            }
            $nama_produk = $objWorksheet->getCellByColumnAndRow(2, $i)->getValue();
            $kategori = $objWorksheet->getCellByColumnAndRow(3, $i)->getValue();
            if (empty($kategori)) {
                $kategori = 1;
            }
            $deskripsi = $objWorksheet->getCellByColumnAndRow(4, $i)->getValue();
            $harga_1 = $objWorksheet->getCellByColumnAndRow(5, $i)->getValue();
            $harga_2 = $objWorksheet->getCellByColumnAndRow(6, $i)->getValue();
            $harga_3 = $objWorksheet->getCellByColumnAndRow(7, $i)->getValue();
            $mingros = $objWorksheet->getCellByColumnAndRow(8, $i)->getValue();
            $satuan = $objWorksheet->getCellByColumnAndRow(11, $i)->getValue();
            if (empty($satuan)) {
                $satuan = 1;
            }
            $ins[$t] = array(
                "id_temp" => $id_temp,
                "id_toko" => $id_toko,
                "barcode"  => trim($barcode),
                "nama_produk" => trim($nama_produk),
                "kategori" => $kategori,
                "deskripsi" => trim($deskripsi),
                "satuan" => $satuan,
                "harga_1" => $harga_1 * 1,
                "harga_2" => $harga_2 * 1,
                "harga_3" => $harga_3 * 1,
                "mingros" => $mingros * 1,
                "status" => '0',
            );
            $this->db->insert('produk_retail_temp', $ins[$t]);
            $t++;
        }
        return $ins;
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
}

/* End of file Migrasi_retail_model.php */
/* Location: ./application/models/Migrasi_retail_model.php */
