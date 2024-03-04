<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hutang_retail extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
	    $this->load->library('datatables');
        $this->load->library(array('ion_auth','form_validation'));
        $this->lang->load('auth');
        $this->load->model('Hutang_retail_model');
        $this->load->model('Pengaturan_transaksi_model');
        $this->load->model('Login_model');
        $this->load->library('view');
        $this->Login_model->is_admin();
        $this->userdata = $this->Login_model->get_data();
    }

    public function index()
    {
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_hutang' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
        );
        $this->view->render_admin('hutang/hutang_list', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Hutang_retail_model->json($this->userdata->id_toko);
    }

    public function read($id) 
    {
        $row = $this->db->select("h.*, fr.no_faktur, fr.dp")
                      ->from("hutang h")
                      ->join("faktur_retail fr", "h.id_faktur=fr.id_faktur AND h.id_toko=fr.id_toko")
                      ->where("h.id_toko", $this->userdata->id_toko)
                      ->where("h.id", $id)
                      ->get()->row();
        if ($row) {
            $res_bayar = $this->db->select('*')
                                  ->from('hutang_bayar')
                                  ->where("id_toko", $this->userdata->id_toko)
                                  ->where("id_hutang", $id)
                                  ->order_by('id', 'asc')
                                  ->get()->result();
            $data = array(
                'id_toko' => $this->userdata->id_toko,
                'nama_toko' => $this->userdata->nama_toko,
                'nama_user' => $this->userdata->email,
                'active_hutang' => 'active',
                'id_modul' => $this->userdata->id_modul,
                'nama_modul' => $this->userdata->nama_modul,
                'id' => $row->id,
                'tgl' => $row->tgl,
                'id_toko' => $row->id_toko,
                'id_users' => $row->id_users,
                'no_faktur' => $row->no_faktur,
                'barcode' => $row->barcode,
                'barang' => $row->barang,
                'hutang' => $row->hutang,
                'bayar' => $row->bayar,
                'kurang' => $row->kurang,
                'data_bayar' => $res_bayar,
            );
            $this->view->render_admin('hutang/hutang_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/hutang_retail'));
        }
    }

    public function create() 
    {
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_hutang' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'button' => 'Tambah',
            'action' => site_url('admin/hutang_retail/create_action'),
            'id' => set_value('id'),
            'tgl' => date("d-m-Y"),
            'id_toko' => $this->userdata->id_toko,
            'id_users' => $this->userdata->id_user,
            'no_faktur' => set_value('no_faktur'),
            'barcode' => set_value('barcode'),
            'barang' => set_value('barang'),
            'hutang' => set_value('hutang'),
            'bayar' => set_value('bayar'),
            'kurang' => set_value('kurang'),
        );
        $this->view->render_admin('hutang/hutang_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
    		'tgl' => $this->input->post('tgl',TRUE),
    		'id_toko' => $this->input->post('id_toko',TRUE),
    		'id_users' => $this->input->post('id_users',TRUE),
    		'no_faktur' => $this->input->post('no_faktur',TRUE),
    		'barcode' => $this->input->post('barcode',TRUE),
    		'barang' => $this->input->post('barang',TRUE),
    		'hutang' => str_replace('.','',$this->input->post('hutang',TRUE)),
    		'bayar' => str_replace('.','',$this->input->post('bayar',TRUE)),
    		'kurang' => str_replace('.','',$this->input->post('kurang',TRUE)),
    	    );

            $this->Hutang_retail_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/hutang_retail'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Hutang_retail_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_toko' => $this->userdata->id_toko,
                'nama_toko' => $this->userdata->nama_toko,
                'nama_user' => $this->userdata->email,
                'active_hutang' => 'active',
                'id_modul' => $this->userdata->id_modul,
                'nama_modul' => $this->userdata->nama_modul,
                'button' => 'Simpan',
                'action' => site_url('admin/hutang_retail/update_action'),
                'id' => set_value('id', $row->id),
                'tgl' => set_value('tgl', $row->tgl),
                'id_toko' => set_value('id_toko', $row->id_toko),
                'id_users' => set_value('id_users', $row->id_users),
                'no_faktur' => set_value('no_faktur', $row->no_faktur),
                'barcode' => set_value('barcode', $row->barcode),
                'barang' => set_value('barang', $row->barang),
                'hutang' => set_value('hutang', $row->hutang),
                'bayar' => set_value('bayar', $row->bayar),
                'kurang' => set_value('kurang', $row->kurang),
            );
            $this->view->render_admin('hutang/hutang_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/hutang_retail'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $hutang = str_replace('.','',$this->input->post('hutang',TRUE));
            $bayar = str_replace('.','',$this->input->post('bayar',TRUE));
            $kurang = str_replace('.','',$this->input->post('kurang',TRUE));
            $data = array(
        		'tgl' => $this->input->post('tgl',TRUE),
        		'id_toko' => $this->input->post('id_toko',TRUE),
        		'id_users' => $this->input->post('id_users',TRUE),
        		'no_faktur' => $this->input->post('no_faktur',TRUE),
        		'barcode' => $this->input->post('barcode',TRUE),
        		'barang' => $this->input->post('barang',TRUE),
        		'hutang' => $hutang,
        		'bayar' => $bayar,
        		'kurang' => $kurang,
    	    );
            $this->Hutang_retail_model->update($this->input->post('id', TRUE), $data);
            eval($this->Pengaturan_transaksi_model->accounting('hutang'));
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/hutang_retail'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Hutang_retail_model->get_by_id($id);

        if ($row) {
            $this->Hutang_retail_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/hutang_retail'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/hutang_retail'));
        }
    }

    public function _rules() 
    {
    	$this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
    	$this->form_validation->set_rules('id_toko', 'id toko', 'trim|required');
    	$this->form_validation->set_rules('id_users', 'id users', 'trim|required');
    	$this->form_validation->set_rules('no_faktur', 'no faktur', 'trim|required');
    	$this->form_validation->set_rules('barcode', 'barcode', 'trim|required');
    	$this->form_validation->set_rules('barang', 'barang', 'trim|required');
    	$this->form_validation->set_rules('hutang', 'hutang', 'trim|required|numeric');
    	$this->form_validation->set_rules('bayar', 'bayar', 'trim|required|numeric');
    	$this->form_validation->set_rules('kurang', 'kurang', 'trim|required|numeric');
    	$this->form_validation->set_rules('id', 'id', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "hutang.xls";
        $judul = "hutang";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
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
    	xlsWriteLabel($tablehead, $kolomhead++, "Tgl");
    	xlsWriteLabel($tablehead, $kolomhead++, "Id Toko");
    	xlsWriteLabel($tablehead, $kolomhead++, "Id Users");
    	xlsWriteLabel($tablehead, $kolomhead++, "No Faktur");
    	xlsWriteLabel($tablehead, $kolomhead++, "Barcode");
    	xlsWriteLabel($tablehead, $kolomhead++, "Barang");
    	xlsWriteLabel($tablehead, $kolomhead++, "Hutang");
    	xlsWriteLabel($tablehead, $kolomhead++, "Bayar");
    	xlsWriteLabel($tablehead, $kolomhead++, "Kurang");

	foreach ($this->Hutang_retail_model->get_by_id_toko($this->userdata->id_toko) as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->id_toko);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->id_users);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->no_faktur);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->barcode);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->barang);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->hutang);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->bayar);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->kurang);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=hutang.doc");

        $data = array(
            'hutang_data' => $this->Hutang_retail_model->get_by_id_toko($this->userdata->data_toko),
            'start' => 0
        );
        
        $this->load->view('retail/hutang/hutang_doc',$data);
    }

}

/* End of file Hutang_retail.php */
/* Location: ./application/controllers/Hutang_retail.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-08-09 04:44:55 */
/* http://harviacode.com */