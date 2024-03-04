<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recta_print_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
    public function print_recta_praktis2($data = array())
    {
        $this->load->library('recta_helper');
        $rprinter = new Recta_helper();
        $rprinter->oldPrinter();
        $rprinter->font('A');
        $rprinter->align('LEFT');
        $rprinter->underline(true);
        $rprinter->text('   '.strtoupper($data['nama_toko']).'         ');
        $rprinter->addCols(array(2,1,2,2,1,2));
        $rprinter->tableTextCrop(false);
        $rprinter->addRecord(1, "");
        $rprinter->addRecord(2, "");
        $rprinter->addRecord(3, "");
        $rprinter->addRecord(4, "No Faktur");
        $rprinter->addRecord(5, ":");
        $rprinter->addRecord(6, "1231413123");
        $rprinter->showOverRecord();
        $rprinter->addRecord(1, "");
        $rprinter->addRecord(2, "");
        $rprinter->addRecord(3, "");
        $rprinter->addRecord(4, "Tanggal");
        $rprinter->addRecord(5, ":");
        $rprinter->addRecord(6, "19-11-2018");
        $rprinter->showOverRecord();
        $rprinter->addRecord(1, "Kepada");
        $rprinter->addRecord(2, ":");
        $rprinter->addRecord(3, "abcd wonosobo");
        $rprinter->addRecord(4, "Jth. Tempo");
        $rprinter->addRecord(5, ":");
        $rprinter->addRecord(6, "");
        $rprinter->showOverRecord();
        $rprinter->addRecord(1, "Telp");
        $rprinter->addRecord(2, ":");
        $rprinter->addRecord(3, "08973812231");
        $rprinter->addRecord(4, "Sales");
        $rprinter->addRecord(5, ":");
        $rprinter->addRecord(6, "Josan");
        $rprinter->showOverRecord();
        $rprinter->addRecord(1, "Alamat");
        $rprinter->addRecord(2, ":");
        $rprinter->addRecord(3, "Wonosobo");
        $rprinter->addRecord(4, "");
        $rprinter->addRecord(5, "");
        $rprinter->addRecord(6, "");
        $rprinter->showOverRecord();
        $rprinter->feed(1);
        $rprinter->cut();
        $rprinter->run();
    }

    /*
    public function print_recta_praktis2($data = array())
    {
        $this->load->library('recta_helper');
        $rprinter = new Recta_helper();
        $rprinter->oldPrinter();
        $rprinter->font('A');
        $rprinter->align('LEFT');
        $rprinter->underline(true);
        $rprinter->text('   '.strtoupper($data['nama_toko']).'         ');
        $rprinter->underline(false);
        $rprinter->font('B');
        $rprinter->addCols(array(6,4));
        $rprinter->addRecord(1, !empty($data['alamat']) ? $data['alamat'] : ' - ');
        $rprinter->addRecord(2, $data['tgl_order'], "RIGHT");
        $rprinter->addRecord(1, !empty($data['telp']) ? $data['telp'] : ' - ');
        $rprinter->addRecord(2, substr($data['jam_order'],0,5), "RIGHT");
        $rprinter->removeCols();
        $rprinter->hr();
        $rprinter->font('A');
        $rprinter->addCols(array(5,5));
        $rprinter->addRecord(1, $data['no_faktur']);
        $rprinter->addRecord(2, $data['nama_pembeli'], "RIGHT");
        $rprinter->removeCols();
        $rprinter->text('');
        $rprinter->addCols(array(1,3,3,3));
        $rprinter->addRecord(1, 'Qty', "LEFT");
        $rprinter->addRecordMargin(1);
        $rprinter->addRecord(2, 'Produk');
        $rprinter->addRecord(3, 'Harga', "RIGHT");
        $rprinter->addRecord(4, 'Subtotal', "RIGHT");
        $rprinter->addCols(array(1,3,3,3));
        $rprinter->tableTextCrop(false);
        $total_harga = 0;
        foreach ($data['res_ord'] as $key) {
            $total_harga += $key->subtotal;
            $harga = number_format($key->harga_jual,0,',','.');
            $subtotal = number_format($key->subtotal,0,',','.');
            $tdiskon = "";
            if ($key->diskon > 0) {
                $tdiskon = ' ('.$key->diskon.' %)';
            }
            $rprinter->addRecord(1, $key->jumlah, "LEFT");
            $rprinter->addRecordMargin(1);
            $rprinter->addRecord(2, $key->nama_produk);
            $rprinter->addRecord(3, ' '.$harga.$tdiskon, "RIGHT");
            $rprinter->addRecord(4, ' '.$subtotal, "RIGHT");
            $rprinter->showOverRecord();
        }
        $rprinter->removeCols();
        $rprinter->text('');
        $rprinter->text('');
        $rprinter->addCols(array(7,3));
        $rprinter->addRecord(1, 'TOTAL', "RIGHT");
        $rprinter->addRecord(2, ' '.number_format($total_harga,0,',','.'), "RIGHT");
        $rprinter->removeCols();
        $rprinter->text('');
        $rprinter->feed(2);
        $rprinter->cut();
        $rprinter->run();
    }
    */

    public function print_recta_praktis($data = array())
    {
        $this->load->library('recta_helper');
        $rprinter = new Recta_helper();
        $rprinter->oldPrinter();
        $rprinter->align('CENTER');
        /*
        $rprinter->font('A');
        $rprinter->text(strtoupper($data['nama_toko']));
        */
        $rprinter->font('B');
        //$rprinter->text(!empty($data['alamat']) ? $data['alamat'] : ' - ');
        //$rprinter->text(!empty($data['telp']) ? 'Telp : '.$data['telp'] : 'Telp : - ');
        //$rprinter->hr('*');
        $rprinter->addCols(array(6,4));
        $rprinter->addRecord(1, $data['no_faktur']);
        $rprinter->addRecord(2, $data['tgl_order'].' '.substr($data['jam_order'],0,5), "RIGHT");
        /*
        $rprinter->addRecord(1, $data['first_name']);
        $rprinter->addRecord(2, $data['jam_order'], "RIGHT");
        if (!empty($data['nama_pembeli'])) {
            $rprinter->addRecord(1, $data['nama_pembeli']);
            $rprinter->addRecord(2, '');
        }
        */
        $rprinter->text('');
        $rprinter->addCols(array(2,5,3));
        $rprinter->addRecord(1, 'Qty', "LEFT");
        $rprinter->addRecordMargin(1);
        $rprinter->addRecord(2, 'Produk');
        //$rprinter->addRecord(3, 'Harga', "RIGHT");
        $rprinter->addRecord(3, 'Subtotal', "RIGHT");
        $rprinter->addCols(array(2,5,3));
        $rprinter->tableTextCrop(false);
        $total_harga = 0;
        foreach ($data['res_ord'] as $key) {
            $total_harga += $key->subtotal;
            $harga = number_format($key->harga_jual,0,',','.');
            $subtotal = number_format($key->subtotal,0,',','.');
            $tdiskon = "";
            if ($key->diskon > 0) {
                $tdiskon = ' ('.$key->diskon.' %)';
            }
            $rprinter->addRecord(1, $key->jumlah, "LEFT");
            $rprinter->addRecordMargin(1);
            $rprinter->addRecord(2, $key->nama_produk);
            //$rprinter->addRecord(3, ' '.$harga.$tdiskon, "RIGHT");
            $rprinter->addRecord(3, ' '.$subtotal, "RIGHT");
            $rprinter->showOverRecord();
        }
        $rprinter->text('');
        $rprinter->addCols(array(7,3));
        $rprinter->addRecord(1, 'TOTAL', "RIGHT");
        $rprinter->addRecord(2, ' '.number_format($total_harga,0,',','.'), "RIGHT");
        $rprinter->removeCols();
        $rprinter->text('');
        $rprinter->feed(2);
        $rprinter->cut();
        $rprinter->run();
    }

    public function print_recta_besar($data = array())
    {
        $this->load->library('recta_helper');
        $rprinter = new Recta_helper();
        $rprinter->font('A');
        $rprinter->align('LEFT');
        $rprinter->underline(true);
        $rprinter->text('   '.strtoupper($data['nama_toko']).'         ');
        $rprinter->underline(false);
        $rprinter->font('B');
        $rprinter->addCols(array(6,4));
        $rprinter->addRecord(1, !empty($data['alamat']) ? $data['alamat'] : ' - ');
        $rprinter->addRecord(2, $data['tgl_order'], "RIGHT");
        $rprinter->addRecord(1, !empty($data['telp']) ? $data['telp'] : ' - ');
        $rprinter->addRecord(2, $data['jam_order'], "RIGHT");
        $rprinter->removeCols();
        $rprinter->hr();
        $rprinter->font('A');
        $rprinter->addCols(array(5,5));
        $rprinter->addRecord(1, $data['no_faktur']);
        $rprinter->addRecord(2, $data['nama_pembeli'], "RIGHT");
        $rprinter->removeCols();
        $rprinter->text('');
        $rprinter->text('');
        $rprinter->addCols(array(2,2,3,3));
        $rprinter->addRecord(1, 'Qty', "RIGHT");
        $rprinter->addRecordMargin(1);
        $rprinter->addRecord(2, 'Produk');
        $rprinter->addRecord(3, 'Harga', "RIGHT");
        $rprinter->addRecord(4, 'Subtotal', "RIGHT");
        $rprinter->addCols(array(2,2,3,3));
        $rprinter->tableTextCrop(false);
        $total_harga = 0;
        foreach ($data['res_ord'] as $key) {
            $total_harga += $key->subtotal;
            $harga = number_format($key->harga_jual,0,',','.');
            $subtotal = number_format($key->subtotal,0,',','.');
            $tdiskon = "";
            if ($key->diskon > 0) {
                $tdiskon = ' ('.$key->diskon.' %)';
            }
            $rprinter->addRecord(1, $key->jumlah, "RIGHT");
            $rprinter->addRecordMargin(1);
            $rprinter->addRecord(2, $key->nama_produk);
            $rprinter->addRecord(3, ' '.$harga.$tdiskon, "RIGHT");
            $rprinter->addRecord(4, ' '.$subtotal, "RIGHT");
            $rprinter->showOverRecord();
        }
        $rprinter->removeCols();
        $rprinter->text('');
        $rprinter->text('');
        $rprinter->addCols(array(7,3));
        $rprinter->addRecord(1, 'TOTAL', "RIGHT");
        $rprinter->addRecord(2, ' '.number_format($total_harga,0,',','.'), "RIGHT");
        $rprinter->removeCols();
        $rprinter->text('');
        $rprinter->align('CENTER');
        $rprinter->text($data['ucapan']);
        $rprinter->text('Aplikek asi kasir dibuat www.diengcyber.com');
        $rprinter->text('');
        $rprinter->feed(2);
        $rprinter->cut();
        $rprinter->run();
    }

    public function print_recta_default($data = array())
    {
        $this->load->library('recta_helper');
        $rprinter = new Recta_helper();
        $rprinter->align('CENTER');
        $rprinter->font('A');
        $rprinter->text(strtoupper($data['nama_toko']));
        $rprinter->font('B');
        $rprinter->text(!empty($data['alamat']) ? $data['alamat'] : ' - ');
        $rprinter->text(!empty($data['telp']) ? 'Telp : '.$data['telp'] : 'Telp : - ');
        $rprinter->hr('*');
        $rprinter->addCols(array(6,4));
        $rprinter->addRecord(1, $data['no_faktur']);
        $rprinter->addRecord(2, $data['tgl_order'], "RIGHT");
        $rprinter->addRecord(1, $data['first_name']);
        $rprinter->addRecord(2, $data['jam_order'], "RIGHT");
        if (!empty($data['nama_pembeli'])) {
            $rprinter->addRecord(1, $data['nama_pembeli']);
            $rprinter->addRecord(2, '');
        }
        $rprinter->text('');
        $rprinter->addCols(array(2,2,3,3));
        $rprinter->addRecord(1, 'Qty', "RIGHT");
        $rprinter->addRecordMargin(1);
        $rprinter->addRecord(2, 'Produk');
        $rprinter->addRecord(3, 'Harga', "RIGHT");
        $rprinter->addRecord(4, 'Subtotal', "RIGHT");
        $rprinter->addCols(array(2,2,3,3));
        $rprinter->tableTextCrop(false);
        $total_harga = 0;
        foreach ($data['res_ord'] as $key) {
            $total_harga += $key->subtotal;
            $harga = number_format($key->harga_jual,0,',','.');
            $subtotal = number_format($key->subtotal,0,',','.');
            $tdiskon = "";
            if ($key->diskon > 0) {
                $tdiskon = ' ('.$key->diskon.' %)';
            }
            $rprinter->addRecord(1, $key->jumlah, "RIGHT");
            $rprinter->addRecordMargin(1);
            $rprinter->addRecord(2, $key->nama_produk);
            $rprinter->addRecord(3, ' '.$harga.$tdiskon, "RIGHT");
            $rprinter->addRecord(4, ' '.$subtotal, "RIGHT");
            $rprinter->showOverRecord();
        }
        $rprinter->text('');
        $rprinter->addCols(array(7,3));
        $rprinter->addRecord(1, 'TOTAL', "RIGHT");
        $rprinter->addRecord(2, ' '.number_format($total_harga,0,',','.'), "RIGHT");
        $rprinter->removeCols();
        $rprinter->text('');
        $rprinter->align('CENTER');
        $rprinter->text($data['ucapan']);
        $rprinter->text('Aplikasi kasir dibuat www.diengcyber.com');
        $rprinter->text('');
        $rprinter->feed(2);
        $rprinter->cut();
        $rprinter->run();
    }

}

/* End of file Recta_print_model.php */
/* Location: ./application/models/Recta_print_model.php */