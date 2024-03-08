<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Piutang_retail extends AI_Admin
{
    function __construct()
    {
        parent::__construct();
        $this->models('Piutang_retail_model, Member_retail_model, Pengaturan_akuntansi_model, Sales_order_model');
    }
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Piutang_retail_model->json($this->userdata->id_toko);
    }

    /* public function index()
    {
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_piutang' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
        );
        $this->view('piutang/piutang_list', $data);
    } */

    public function index($page = '')
    {
        $no_invoice = $this->input->post('no_invoice');
        $id_media = 4; // cod
        // $status = $this->input->post('status');
        $status = 3;
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');
        $no_resi = $this->input->post('no_resi');
        
        // data order
        $params = array('status'=>$status,'dari'=>$dari,'sampai'=>$sampai,'no_invoice'=>$no_invoice,'pembayaran'=>'2','order'=>true);
        if (!empty($no_resi)) {
            $nl = trim(preg_replace('/\s\s+/', '|', $no_resi));
            $exnl = explode('|', $nl);
            $params['multi_resi'] = $exnl;
        }

        $pagination = array('page'=>($page)?$page:1,'perpage'=>100);
        $data_order = $this->Sales_order_model->get_order($params,$pagination);
        $data_order2 = $this->Sales_order_model->_get_order($params)->get()->num_rows();

        $this->load->library('pagination');

        $config['base_url'] = base_url('admin/piutang_retail/index/');
        $config['total_rows'] =  $data_order2;
        $config['use_page_numbers'] = true;
        $config['per_page'] = $pagination['perpage'];
        
        $this->pagination->initialize($config);

        $exdari = explode("-",$dari);
        // $fdari = !empty($exdari[2])?$exdari[2]:date('Y');
        // $fdari .= '-'.(!empty($exdari[1])?$exdari[1]:date('m'));

        $fdari = date('Y')."-".date('m');
        $fsampai = date('Y')."-".date('m');

        $exsampai = explode("-",$sampai);
        // $fsampai = !empty($exsampai[2])?$exsampai[2]:date('Y');
        // $fsampai .= '-'.(!empty($exsampai[1])?$exsampai[1]:date('m'));
        
        $and_where = "";
        // if (!empty($dari) && !empty($sampai)) {
            $and_where = ' AND CONCAT(SUBSTRING(tgl_order,7,4),"-",SUBSTRING(tgl_order,4,2)) BETWEEN "'.$fdari.'" AND "'.$fsampai.'"';
        // }

        $row_no_faktur = $this->db->select('no_faktur, valid, COUNT(no_faktur) AS c')
                                ->from('orders')
                                ->where('valid IS NULL'.$and_where)
                                ->group_by('no_faktur')
                                ->having('c > 1')
                                ->get()->row();
        $row_bukan_member = $this->db->select('LEFT(bukan_member,20), valid, COUNT(LEFT(bukan_member,20)) AS c')
                            ->from('orders')
                            ->where('valid IS NULL'.$and_where)
                            ->group_by('LEFT(bukan_member,20)')
                            ->having('c > 1')
                            ->get()->row();

        $show_warning = false;
        if ($row_no_faktur || $row_bukan_member) {
        $show_warning = true;
        }
            
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_piutang' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'data_order' => $data_order,
            'status' => $status,
            'exp' => $this->db->get('expedisi')->result(),
            'dari' => $dari,
            'pagination' => $this->pagination->create_links(),
            'no_invoice' => $no_invoice,
            'id_media' => $id_media,
            'sampai' => $sampai,
            'no_resi' => $no_resi,
            'page' => $page,
            'message' => $this->session->userdata('message'),
            'show_warning' => $show_warning,
        );
        $this->view('piutang/piutang_order_list', $data);
    }

    public function lunas_action($id)
    {
        $this->load->model('Pengaturan_transaksi_model');
        $row_lo = $this->db->select('o.*')
                           // ->from('laporan_order lo')
                           ->from('orders o')
                           ->where('o.id_orders_2', $id)
                           ->get()->row();
        if ($row_lo) { 
            if ($row_lo->pembayaran != 4) {
                $data_update = array(
                    'pembayaran' => '4'
                );
                $this->db->where('id_orders_2', $row_lo->id_orders_2);
                $this->db->update('orders', $data_update);
                $id_bank = $row_lo->bank;
                $no_faktur = $row_lo->no_invoice;
                $jumlah_bayar = $row_lo->nominal;
                $ongkir = $row_lo->ongkir;
                eval($this->Pengaturan_transaksi_model->accounting('piutang'));
                $this->session->set_flashdata('message', 'Insert Record Success');
            } else {
                $this->session->set_flashdata('message', 'Insert Record Failed');
            }
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
        }
        redirect(site_url('admin/piutang_retail'));
    }

    public function read($id) 
    {
        $row = $this->Piutang_retail_model->get_by_id($id);
        if ($row) {
            $res_pb = $this->db->select('pb.*')
                               ->from('piutang_bayar pb')
                               // ->join('users u', 'pb.id_users=u.id_users AND pb.id_toko=u.id_toko')
                               ->where('pb.id_toko', $this->userdata->id_toko)
                               ->where('pb.id_piutang', $row->id_piutang)
                               // ->where('u.id_cabang', $this->userdata->id_cabang)
                               ->group_by('pb.id')
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
            $this->view('piutang/piutang_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/piutang_retail'));
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
            'action' => site_url('admin/piutang_retail/create_action'),
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
        $this->view('piutang/piutang_form', $data);
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
            redirect(site_url('admin/piutang_retail'));
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
                'action' => site_url('admin/piutang_retail/update_action'),
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
            $this->view('piutang/piutang_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/piutang_retail'));
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
            redirect(site_url('admin/piutang_retail'));
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
                'action' => site_url('admin/piutang_retail/bayar_action'),
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
            $this->view('piutang/piutang_bayar', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/piutang_retail'));
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
                $jumlah_bayar = str_replace('.','',$this->input->post('bayar',TRUE));
                $data = array(
                    'id_toko' => $this->userdata->id_toko,
                    //'no_faktur' => $this->input->post('no_faktur',TRUE),
                    //'id_pembeli' => $this->input->post('id_pembeli',TRUE),
                    'jumlah_bayar' => $row->jumlah_bayar + $jumlah_bayar,
                    'sisa' => str_replace('.','',$this->input->post('sisa',TRUE)),
                    //'tanggal' => $this->input->post('tanggal',TRUE),`
                    'deadline' => $this->input->post('deadline',TRUE),
                );
                $this->Piutang_retail_model->update($this->input->post('id', TRUE), $data);
                $data_insert = array(
                    'id_toko' => $this->userdata->id_toko,
                    'id_piutang' => $this->input->post('id', TRUE),
                    'tgl' => date('d-m-Y'),
                    'bayar' => $jumlah_bayar,
                    'sisa' => str_replace('.','',$this->input->post('sisa',TRUE)),
                    'ket' => '',
                );
                $id_piutang = $row->id_piutang;
                $ongkir = null;
                $this->db->insert('piutang_bayar', $data_insert);
                eval($this->Pengaturan_transaksi_model->accounting('piutang'));
                $this->session->set_flashdata('message', 'Update Record Success');
            } else {
                $this->session->set_flashdata('message', 'Update Record Failed');
            }
            redirect(site_url('admin/piutang_retail'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Piutang_retail_model->get_by_id($id);
        if ($row) {
            $this->Piutang_retail_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/piutang_retail'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/piutang_retail'));
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
        $this->load->view('admin/piutang/piutang_doc',$data);
    }

}

/* End of file Piutang_retail.php */
/* Location: ./application/controllers/Piutang_retail.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-08-09 04:18:37 */
/* http://harviacode.com */