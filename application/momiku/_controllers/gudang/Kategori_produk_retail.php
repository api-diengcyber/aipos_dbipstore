<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kategori_produk_retail extends CI_Controller
{
    function __construct()
    {
        parent::__construct(); 
	    $this->load->library('datatables');
        $this->load->library(array('ion_auth','form_validation'));
        $this->lang->load('auth');
        $this->load->model('Kategori_produk_retail_model');
        $this->load->model('Login_model');
        $this->load->library('view');
        $this->Login_model->is_gudang();
        $this->userdata = $this->Login_model->get_data();
    }

    public function index()
    {
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_kategori_produk' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
        );
        $this->view->render_gudang('kategori_produk/kategori_produk_list', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Kategori_produk_retail_model->json($this->userdata->id_toko);
    }

    public function read($id) 
    {
        $row = $this->Kategori_produk_retail_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_toko' => $this->userdata->id_toko,
                'nama_toko' => $this->userdata->nama_toko,
                'nama_user' => $this->userdata->email,
                'active_kategori_produk' => 'active',
                'id_modul' => $this->userdata->id_modul,
                'nama_modul' => $this->userdata->nama_modul,
                'id_kategori' => $row->id_kategori,
                'id_toko' => $row->id_toko,
                'nama_kategori' => $row->nama_kategori,
            );
            $this->view->render_gudang('kategori_produk/kategori_produk_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gudang/kategori_produk_retail'));
        }
    }

    public function create() 
    {
        // $data_supplier = $this->db->where('id_toko', $this->userdata->id_toko)->order_by('nama_supplier', 'asc')->get('supplier')->result();
        $data_supplier = $this->db->select('s.*')
                                  ->from('supplier s')
                                  ->join('users u', 's.id_users=u.id_users AND s.id_toko=u.id_toko')
                                  ->where('s.id_toko', $this->userdata->id_toko)
                                  ->where('u.id_cabang', $this->userdata->id_cabang)
                                  ->group_by('s.id_supplier')
                                  ->get()->result();
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_kategori_produk' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'button' => 'Tambah',
            'action' => site_url('gudang/kategori_produk_retail/create_action'),
            'id_kategori' => set_value('id_kategori'),
            'id_toko' => $this->userdata->id_toko,
            'id_supplier' => set_value('id_supplier'),
            'nama_kategori' => set_value('nama_kategori'),
            'data_supplier' => $data_supplier,
        );
        $this->view->render_gudang('kategori_produk/kategori_produk_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $row_last_kategori = $this->db->select('id_kategori_2')
                                          ->from('kategori_produk')
                                          ->where('id_toko', $this->userdata->id_toko)
                                          ->order_by('id_kategori', 'desc')
                                          ->get()->row();
            $id_kategori = 1;
            if ($row_last_kategori) {
                $id_kategori = $row_last_kategori->id_kategori_2 + 1;
            }
            $data = array(
                'id_kategori_2' => $id_kategori,
                'id_toko' => $this->input->post('id_toko',TRUE),
                'id_users' => $this->userdata->id_users,
                'id_supplier' => $this->input->post('id_supplier', true),
        		'nama_kategori' => $this->input->post('nama_kategori',TRUE),
    	    );
            $this->Kategori_produk_retail_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('gudang/kategori_produk_retail'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kategori_produk_retail_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_toko' => $this->userdata->id_toko,
                'nama_toko' => $this->userdata->nama_toko,
                'nama_user' => $this->userdata->email,
                'active_kategori_produk' => 'active',
                'id_modul' => $this->userdata->id_modul,
                'nama_modul' => $this->userdata->nama_modul,
                'button' => 'Simpan',
                'action' => site_url('gudang/kategori_produk_retail/update_action'),
                'id_kategori' => set_value('id_kategori', $row->id_kategori_2),
                'id_toko' => set_value('id_toko', $row->id_toko),
                'id_supplier' => set_value('id_supplier', $row->id_supplier),
                'nama_kategori' => set_value('nama_kategori', $row->nama_kategori),
                'data_supplier' => $this->db->where('id_toko', $this->userdata->id_toko)->order_by('nama_supplier', 'asc')->get('supplier')->result(),
            );
            $this->view->render_gudang('kategori_produk/kategori_produk_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gudang/kategori_produk_retail'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kategori', TRUE));
        } else {
            $data = array(
        		'id_toko' => $this->input->post('id_toko',TRUE),
                'id_supplier' => $this->input->post('id_supplier',TRUE),
        		'nama_kategori' => $this->input->post('nama_kategori',TRUE),
    	    );
            $this->Kategori_produk_retail_model->update($this->input->post('id_kategori', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('gudang/kategori_produk_retail'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kategori_produk_retail_model->get_by_id($id);
        if ($row) {
            $this->Kategori_produk_retail_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('gudang/kategori_produk_retail'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gudang/kategori_produk_retail'));
        }
    }

    public function _rules() 
    {
    	$this->form_validation->set_rules('id_toko', 'id toko', 'trim|required');
        $this->form_validation->set_rules('id_supplier', 'supplier', 'trim|required');
    	$this->form_validation->set_rules('nama_kategori', 'nama kategori', 'trim|required');
    	$this->form_validation->set_rules('id_kategori', 'id_kategori', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "kategori_produk.xls";
        $judul = "kategori_produk";
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
    	xlsWriteLabel($tablehead, $kolomhead++, "Id Toko");
    	xlsWriteLabel($tablehead, $kolomhead++, "Nama Kategori");

	foreach ($this->Kategori_produk_retail_model->get_by_id_toko($this->userdata->id_toko) as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->id_toko);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_kategori);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=kategori_produk.doc");
        $data = array(
            'kategori_produk_data' => $this->Kategori_produk_retail_model->get_by_id_toko($this->userdata->id_toko),
            'start' => 0
        );
        
        $this->load->view('retail/kategori_produk/kategori_produk_doc',$data);
    }

}

/* End of file Kategori_produk.php */
/* Location: ./application/controllers/Kategori_produk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-07-31 06:40:53 */
/* http://harviacode.com */