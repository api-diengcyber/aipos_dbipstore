<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migrasi_retail_model extends CI_Model {

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
        $this->load->model('Login_model');
        $this->userdata = $this->Login_model->get_data();
    }

    // datatables
    function json() {
        $this->datatables->select('p.id, p.id_temp, p.id_toko, p.barcode, p.kategori, p.deskripsi, p.satuan, p.nama_produk, p.harga_1, p.harga_2, p.harga_3, p.mingros, p.hpp, p.stok, p.status');
        $this->datatables->from('produk_retail_temp p');
        $this->datatables->where('p.id_toko', $this->userdata->id_toko);
        $this->datatables->add_column('action', anchor(site_url('outlet/migrasi/delete/$1'),'<button class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash-o bigger-120"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_temp');
        $this->datatables->group_by('p.id_temp');
        return $this->datatables->generate();
    }

    // datatables
    function json_produksi() {
        $this->datatables->select('p.id, p.id_temp, p.id_toko, p.barcode, p.kategori, p.deskripsi, p.satuan, p.nama_produk, p.harga_1, p.harga_2, p.harga_3, p.mingros, p.hpp, p.stok, p.status');
        $this->datatables->from('produk_retail_temp p');
        $this->datatables->where('p.id_toko', $this->userdata->id_toko);
        $this->datatables->add_column('action', anchor(site_url('produksi/migrasi/delete/$1'),'<button class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash-o bigger-120"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_temp');
        $this->datatables->group_by('p.id_temp');
        return $this->datatables->generate();
    }

    function import_temp_excel($file_input, $id_toko)
    {
        ini_set('memory_limit', '-1');
        try {
            $objPHPExcel= PHPExcel_IOFactory::load($file_input);      
        } catch(Exception $e) {
            die('Error loading file :' . $e->getMessage());
        }
        $totalrows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel         
        $objWorksheet = $objPHPExcel->setActiveSheetIndex(0);  
        $ins = array();
        $t = 0;
        for($i=2; $i <= $totalrows; $i++)
        {
        	$id_temp = 1;
        	$row_last_temp = $this->db->where('id_toko', $id_toko)->order_by('id_temp', 'desc')->get('produk_retail_temp')->row();
        	if ($row_last_temp) {
        		$id_temp = $row_last_temp->id_temp+1;
        	}
            $barcode = mt_rand(100000, 999999).date("is");
            $nama_produk = $objWorksheet->getCellByColumnAndRow(2, $i)->getValue();
            $kategori = $objWorksheet->getCellByColumnAndRow(3, $i)->getValue();
            $deskripsi = $objWorksheet->getCellByColumnAndRow(4, $i)->getValue();
            $harga_1 = $objWorksheet->getCellByColumnAndRow(5, $i)->getValue();
            $harga_2 = $objWorksheet->getCellByColumnAndRow(6, $i)->getValue();
            $harga_3 = $objWorksheet->getCellByColumnAndRow(7, $i)->getValue();
            $mingros = $objWorksheet->getCellByColumnAndRow(8, $i)->getValue();
            $hpp = $objWorksheet->getCellByColumnAndRow(9, $i)->getValue();
            $stok = $objWorksheet->getCellByColumnAndRow(10, $i)->getValue();
            $ins[$t] = array(
                "id_temp" => $id_temp,
                "id_toko" => $id_toko,
                "barcode"  => $barcode,
                "nama_produk" => $nama_produk,
                "kategori" => $kategori,
                "deskripsi" => $deskripsi,
                "harga_1" => $harga_1*1,
                "harga_2" => $harga_2*1,
                "harga_3" => $harga_3*1,
                "mingros" => $mingros*1,
                "hpp" => $hpp*1,
                "stok" => $stok*1,
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
        $this->db->where('id_toko', $this->userdata->id_toko);
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
        $this->db->where('id_toko', $this->userdata->id_toko);
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where('id_toko', $this->userdata->id_toko);
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Migrasi_retail_model.php */
/* Location: ./application/models/Migrasi_retail_model.php */