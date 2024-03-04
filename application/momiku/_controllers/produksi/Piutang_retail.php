<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Piutang_retail extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
	    $this->load->library('datatables');
        $this->load->library(array('ion_auth','form_validation'));
        $this->lang->load('auth');
        $this->load->model('Piutang_retail_model');
        $this->load->model('Member_retail_model');
        $this->load->model('Pengaturan_akuntansi_model');
        $this->load->model('Pengaturan_transaksi_model');
        $this->load->model('Login_model');
        $this->load->library('view');
        $this->Login_model->is_produksi();
        $this->userdata = $this->Login_model->get_data();
    }
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Piutang_retail_model->json_produksi($this->userdata->id_toko);
    }

    public function index()
    {
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_piutang' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
        );
        $this->view->render_produksi('piutang/piutang_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Piutang_retail_model->get_by_id($id);
        if ($row) {
            $res_pb = $this->db->select('pb.*')
                               ->from('piutang_bayar pb')
                               ->where('pb.id_toko', $this->userdata->id_toko)
                               ->where('pb.id_piutang', $row->id_piutang)
                               ->get()->result();
            $data = array(
                'id_toko' => $this->userdata->id_toko,
                'nama_toko' => $this->userdata->nama_toko,
                'nama_user' => $this->userdata->email,
                'active_piutang' => 'active',
                'id_modul' => $this->userdata->id_modul,
                'nama_modul' => $this->userdata->nama_modul,
                'id' => $row->id_piutang,
                'id_toko' => $row->id_toko,
                'no_faktur' => $row->no_faktur,
                'id_pembeli' => $row->id_pembeli,
                'nama_member' => $row->nama_member,
                'alamat_member' => $row->alamat_member,
                'jumlah_hutang' => $row->jumlah_hutang,
                'jumlah_bayar' => $row->jumlah_bayar,
                'sisa' => $row->sisa,
                'tanggal' => $row->tanggal,
                'deadline' => $row->deadline,
                'data_bayar' => $res_pb,
            );
            $this->view->render_produksi('piutang/piutang_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produksi/piutang_retail'));
        }
    }

    public function create() 
    {
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_piutang' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'button' => 'Tambah',
            'action' => site_url('produksi/piutang_retail/create_action'),
            'id' => set_value('id'),
            'id_toko' => $this->userdata->id_toko,
            'no_faktur' => set_value('no_faktur'),
            'id_pembeli' => set_value('id_pembeli'),
            'jumlah_hutang' => set_value('jumlah_hutang'),
            'jumlah_bayar' => set_value('jumlah_bayar'),
            'sisa' => set_value('sisa'),
            'tanggal' => set_value('tanggal'),
            'deadline' => set_value('deadline'),
            'data_pembeli' => $this->Member_retail_model->get_by_id_toko($this->userdata->id_toko),
        );
        $this->view->render_produksi('piutang/piutang_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $row_last_piutang = $this->db->select('id_piutang')
                                         ->from('piutang')
                                         ->where('id_toko', $this->userdata->id_toko)
                                         ->order_by('id_piutang', 'desc')
                                         ->get()->row();
            $id_piutang = 1;
            if ($row_last_piutang) {
                $id_piutang = $row_last_piutang->id_piutang+1;
            }
            $data = array(
                'id_piutang' => $id_piutang,
        		'id_toko' => $this->input->post('id_toko',TRUE),
        		'no_faktur' => $this->input->post('no_faktur',TRUE),
        		'id_pembeli' => $this->input->post('id_pembeli',TRUE),
        		'jumlah_hutang' => str_replace('.','',$this->input->post('jumlah_hutang',TRUE)),
        		'jumlah_bayar' => str_replace('.','',$this->input->post('jumlah_bayar',TRUE)),
        		'sisa' => str_replace('.','',$this->input->post('sisa',TRUE)),
        		'tanggal' => $this->input->post('tanggal',TRUE),
        		'deadline' => $this->input->post('deadline',TRUE),
    	    );
            $this->Piutang_retail_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('produksi/piutang_retail'));
        }
    }
    
    public function update($id)
    {
        $row = $this->Piutang_retail_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_toko' => $this->userdata->id_toko,
                'nama_toko' => $this->userdata->nama_toko,
                'nama_user' => $this->userdata->email,
                'active_piutang' => 'active',
                'id_modul' => $this->userdata->id_modul,
                'nama_modul' => $this->userdata->nama_modul,
                'button' => 'Simpan',
                'action' => site_url('produksi/piutang_retail/update_action'),
                'id' => set_value('id', $row->id_piutang),
                'id_toko' => set_value('id_toko', $row->id_toko),
                'no_faktur' => set_value('no_faktur', $row->no_faktur),
                'id_pembeli' => set_value('id_pembeli', $row->id_pembeli),
                'jumlah_hutang' => set_value('jumlah_hutang', $row->jumlah_hutang),
                'jumlah_bayar' => set_value('jumlah_bayar', $row->jumlah_bayar),
                'sisa' => set_value('sisa', $row->sisa),
                'tanggal' => set_value('tanggal', $row->tanggal),
                'deadline' => set_value('deadline', $row->deadline),
                'data_pembeli' => $this->Member_retail_model->get_by_id_toko($this->userdata->id_toko),
            );
            $this->view->render_produksi('piutang/piutang_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produksi/piutang_retail'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $row = $this->Piutang_retail_model->get_by_id($this->input->post('id', TRUE));
            if ($row) {
                $jumlah_bayar = str_replace('.','',$this->input->post('jumlah_bayar',TRUE));
                $data = array(
                    'id_toko' => $this->userdata->id_toko,
                    //'no_faktur' => $this->input->post('no_faktur',TRUE),
                    //'id_pembeli' => $this->input->post('id_pembeli',TRUE),
                    'jumlah_bayar' => $row->jumlah_bayar + str_replace('.','',$this->input->post('jumlah_bayar',TRUE)),
                    'sisa' => str_replace('.','',$this->input->post('sisa',TRUE)),
                    //'tanggal' => $this->input->post('tanggal',TRUE),
                    'deadline' => $this->input->post('deadline',TRUE),
                );
                $this->Piutang_retail_model->update($this->input->post('id', TRUE), $data);
                // eval($this->Pengaturan_transaksi_model->accounting('piutang'));
                // $this->Pengaturan_akuntansi_model->jurnal_piutang($this->userdata->id_toko, date('d-m-Y'), str_replace('.','',$this->input->post('jumlah_bayar',TRUE)), $this->input->post('id', TRUE));
                $this->session->set_flashdata('message', 'Update Record Success');
            } else {
                $this->session->set_flashdata('message', 'Update Record Failed');
            }
            redirect(site_url('produksi/piutang_retail'));
        }
    }
    
    public function bayar($id)
    {
        $row = $this->Piutang_retail_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_toko' => $this->userdata->id_toko,
                'nama_toko' => $this->userdata->nama_toko,
                'nama_user' => $this->userdata->email,
                'active_piutang' => 'active',
                'id_modul' => $this->userdata->id_modul,
                'nama_modul' => $this->userdata->nama_modul,
                'button' => 'Simpan',
                'action' => site_url('produksi/piutang_retail/bayar_action'),
                'id' => set_value('id', $row->id_piutang),
                'no_faktur' => set_value('no_faktur', $row->no_faktur),
                'id_pembeli' => set_value('id_pembeli', $row->id_pembeli),
                'jumlah_hutang' => set_value('jumlah_hutang', $row->jumlah_hutang),
                'jumlah_bayar' => set_value('jumlah_bayar', $row->jumlah_bayar),
                'sisa' => set_value('sisa', $row->sisa),
                'tanggal' => set_value('tanggal', $row->tanggal),
                'deadline' => set_value('deadline', $row->deadline),
                'tgl_bayar' => set_value('tgl_bayar', date('d-m-Y')),
                'ket' => set_value('ket'),
                'bayar' => set_value('bayar'),
                'data_pembeli' => $this->Member_retail_model->get_by_id_toko($this->userdata->id_toko),
            );
            $this->view->render_produksi('piutang/piutang_bayar', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produksi/piutang_retail'));
        }
    }
    
    public function bayar_action() 
    {
        $this->_rules_bayar();
        if ($this->form_validation->run() == FALSE) {
            $this->bayar($this->input->post('id', TRUE));
        } else {
            $row = $this->Piutang_retail_model->get_by_id($this->input->post('id', TRUE));
            if ($row) {
                /*$jumlah_bayar = str_replace('.','',$this->input->post('jumlah_bayar',TRUE));
                $data = array(
                    'id_toko' => $this->userdata->id_toko,
                    //'no_faktur' => $this->input->post('no_faktur',TRUE),
                    //'id_pembeli' => $this->input->post('id_pembeli',TRUE),
                    'jumlah_bayar' => $row->jumlah_bayar + str_replace('.','',$this->input->post('jumlah_bayar',TRUE)),
                    'sisa' => str_replace('.','',$this->input->post('sisa',TRUE)),
                    //'tanggal' => $this->input->post('tanggal',TRUE),
                    'deadline' => $this->input->post('deadline',TRUE),
                );
                $this->Piutang_retail_model->update($this->input->post('id', TRUE), $data);
                eval($this->Pengaturan_transaksi_model->accounting('piutang'));*/
                // $this->Pengaturan_akuntansi_model->jurnal_piutang($this->userdata->id_toko, date('d-m-Y'), str_replace('.','',$this->input->post('jumlah_bayar',TRUE)), $this->input->post('id', TRUE));
                $this->session->set_flashdata('message', 'Update Record Success');
            } else {
                $this->session->set_flashdata('message', 'Update Record Failed');
            }
            // redirect(site_url('produksi/piutang_retail'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Piutang_retail_model->get_by_id($id);
        if ($row) {
            $this->Piutang_retail_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('produksi/piutang_retail'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produksi/piutang_retail'));
        }
    }

    public function _rules() 
    {
        $this->form_validation->set_rules('id_toko', 'id toko', 'trim|required');
        $this->form_validation->set_rules('no_faktur', 'no faktur', 'trim|required');
        $this->form_validation->set_rules('id_pembeli', 'id pembeli', 'trim|required');
        $this->form_validation->set_rules('jumlah_hutang', 'jumlah hutang', 'trim|required|numeric');
        $this->form_validation->set_rules('jumlah_bayar', 'jumlah bayar', 'trim|required|numeric');
        $this->form_validation->set_rules('sisa', 'sisa', 'trim|required|numeric');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
        $this->form_validation->set_rules('deadline', 'deadline', 'trim|required');
        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function _rules_bayar() 
    {
        $this->form_validation->set_rules('no_faktur', 'no faktur', 'trim|required');
        $this->form_validation->set_rules('id_pembeli', 'id pembeli', 'trim');
        $this->form_validation->set_rules('jumlah_hutang', 'jumlah hutang', 'trim|required');
        $this->form_validation->set_rules('jumlah_bayar', 'jumlah bayar', 'trim');
        $this->form_validation->set_rules('sisa', 'sisa', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
        $this->form_validation->set_rules('deadline', 'deadline', 'trim|required');
        $this->form_validation->set_rules('tgl_bayar', 'Tanggal Bayar', 'trim|required');
        $this->form_validation->set_rules('ket', 'Keterangan', 'trim');
        $this->form_validation->set_rules('bayar', 'Bayar', 'trim|required');
        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "piutang.xls";
        $judul = "piutang";
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
    	xlsWriteLabel($tablehead, $kolomhead++, "No Faktur");
    	xlsWriteLabel($tablehead, $kolomhead++, "Id Pembeli");
    	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Hutang");
    	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Bayar");
    	xlsWriteLabel($tablehead, $kolomhead++, "Sisa");
    	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
    	xlsWriteLabel($tablehead, $kolomhead++, "Deadline");

	   foreach ($this->Piutang_retail_model->get_by_id_toko($this->userdata->id_toko) as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->id_toko);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->no_faktur);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->id_pembeli);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->jumlah_hutang);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->jumlah_bayar);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->sisa);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->deadline);

	        $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=piutang.doc");
        $data = array(
            'piutang_data' => $this->Piutang_retail_model->get_by_id_toko($this->userdata->id_toko),
            'start' => 0
        );
        $this->load->view('produksi/piutang/piutang_doc',$data);
    }

}

/* End of file Piutang_retail.php */
/* Location: ./application/controllers/Piutang_retail.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-08-09 04:18:37 */
/* http://harviacode.com */