<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Supplier_retail extends AI_Admin
{
    function __construct()
    {
        parent::__construct();
        $this->models('Supplier_retail_model');
    }

    public function index()
    {
        $data = array(
            'active_supplier' => 'active',
        );
        $this->view('supplier/supplier_list', $data);
    }
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Supplier_retail_model->json($this->userdata->id_toko);
    }

    public function read($id) 
    {
        $row = $this->Supplier_retail_model->get_by_id($id);
        if ($row) {
            $data = array(
                'active_supplier' => 'active',
                'id_supplier' => $row->id_supplier,
                'id_toko' => $row->id_toko,
                'nama_supplier' => $row->nama_supplier,
                'alamat' => $row->alamat,
                'kota' => $row->kota,
                'telp' => $row->telp,
                'fax' => $row->fax,
                'cp' => $row->cp,
                'telp_cp' => $row->telp_cp,
                'ket' => $row->ket,
            );
            $this->view('supplier/supplier_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/supplier'));
        }
    }

    public function create() 
    {
        $data = array(
            'active_supplier' => 'active',
            'button' => 'Tambah',
            'action' => site_url('admin/supplier_retail/create_action'),
            'id_supplier' => set_value('id_supplier'),
            'id_toko' => $this->userdata->id_toko,
            'nama_supplier' => set_value('nama_supplier'),
            'alamat' => set_value('alamat'),
            'kota' => set_value('kota'),
            'telp' => set_value('telp'),
            'fax' => set_value('fax'),
            'cp' => set_value('cp'),
            'telp_cp' => set_value('telp_cp'),
            'ket' => set_value('ket'),
        );
        $this->view('supplier/supplier_form', $data);

    }
    
    public function create_action() 
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'id_toko' => $this->userdata->id_toko,
                'id_users' => $this->userdata->id_users,
        		'nama_supplier' => $this->input->post('nama_supplier',TRUE),
        		'alamat' => $this->input->post('alamat',TRUE),
        		'kota' => $this->input->post('kota',TRUE),
        		'telp' => $this->input->post('telp',TRUE),
        		'fax' => $this->input->post('fax',TRUE),
        		'cp' => $this->input->post('cp',TRUE),
        		'telp_cp' => $this->input->post('telp_cp',TRUE),
        		'ket' => $this->input->post('ket',TRUE),
    	    );
            $this->Supplier_retail_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/supplier_retail'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Supplier_retail_model->get_by_id($id);
        if ($row) {
            $data = array(
                'active_supplier' => 'active',
                'button' => 'Simpan',
                'action' => site_url('admin/supplier_retail/update_action'),
                'id_supplier' => set_value('id_supplier', $row->id_supplier),
                'id_toko' => set_value('id_toko', $row->id_toko),
                'nama_supplier' => set_value('nama_supplier', $row->nama_supplier),
                'alamat' => set_value('alamat', $row->alamat),
                'kota' => set_value('kota', $row->kota),
                'telp' => set_value('telp', $row->telp),
                'fax' => set_value('fax', $row->fax),
                'cp' => set_value('cp', $row->cp),
                'telp_cp' => set_value('telp_cp', $row->telp_cp),
                'ket' => set_value('ket', $row->ket),
            );
            $this->view('supplier/supplier_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/supplier_retail'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_supplier', TRUE));
        } else {
            $data = array(
    		'id_toko' => $this->input->post('id_toko',TRUE),
    		'nama_supplier' => $this->input->post('nama_supplier',TRUE),
    		'alamat' => $this->input->post('alamat',TRUE),
    		'kota' => $this->input->post('kota',TRUE),
    		'telp' => $this->input->post('telp',TRUE),
    		'fax' => $this->input->post('fax',TRUE),
    		'cp' => $this->input->post('cp',TRUE),
    		'telp_cp' => $this->input->post('telp_cp',TRUE),
    		'ket' => $this->input->post('ket',TRUE),
    	    );

            $this->Supplier_retail_model->update($this->input->post('id_supplier', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/supplier_retail'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Supplier_retail_model->get_by_id($id);

        if ($row) {
            $this->Supplier_retail_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/supplier_retail'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/supplier_retail'));
        }
    }

    public function _rules() 
    {
    	$this->form_validation->set_rules('id_toko', 'id toko', 'trim|required');
    	$this->form_validation->set_rules('nama_supplier', 'nama supplier', 'trim|required');
    	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
    	$this->form_validation->set_rules('kota', 'kota', 'trim|required');
    	$this->form_validation->set_rules('telp', 'telp', 'trim|required');
    	$this->form_validation->set_rules('fax', 'fax', 'trim|required');
    	$this->form_validation->set_rules('cp', 'cp', 'trim|required');
    	$this->form_validation->set_rules('telp_cp', 'telp cp', 'trim|required');
    	$this->form_validation->set_rules('ket', 'ket', 'trim|required');
    	$this->form_validation->set_rules('id_supplier', 'id_supplier', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "supplier.xls";
        $judul = "supplier";
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
    	xlsWriteLabel($tablehead, $kolomhead++, "Nama Supplier");
    	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
    	xlsWriteLabel($tablehead, $kolomhead++, "Kota");
    	xlsWriteLabel($tablehead, $kolomhead++, "Telp");
    	xlsWriteLabel($tablehead, $kolomhead++, "Fax");
    	xlsWriteLabel($tablehead, $kolomhead++, "Cp");
    	xlsWriteLabel($tablehead, $kolomhead++, "Telp Cp");
    	xlsWriteLabel($tablehead, $kolomhead++, "Ket");

    	foreach ($this->Supplier_retail_model->get_by_id_toko($this->userdata->id_toko) as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->id_toko);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_supplier);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->kota);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->telp);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->fax);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->cp);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->telp_cp);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->ket);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=supplier.doc");

        $data = array(
            'supplier_data' => $this->Supplier_retail_model->get_by_id_toko($this->userdata->id_toko),
            'start' => 0
        );
        
        $this->load->view('admin/supplier/supplier_doc',$data);
    }

}

/* End of file Supplier.php */
/* Location: ./application/controllers/Supplier.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-07-29 08:59:55 */
/* http://harviacode.com */