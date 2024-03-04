<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan_adv extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_adv_model');
        $this->load->library('form_validation');        
        $this->load->library('datatables');
        $this->load->model('Login_model');
        $this->load->library('view');
        $this->Login_model->is_advertiser();
        $this->userdata = $this->Login_model->get_data();
    }

    public function index()
    {
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_laporan_adv' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
        );
        $this->view->render_advertiser('laporan_adv/laporan_adv_list',$data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Laporan_adv_model->json();
    }

    public function read($id) 
    {
        $row = $this->Laporan_adv_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'tanggal' => $row->tanggal,
                'konversi' => $row->konversi,
                'klik' => $row->klik,
                'view' => $row->view,
                'anggaran' => $row->anggaran,
	        );
            $this->view->render_advertiser('laporan_adv/laporan_adv_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('advertiser/laporan_adv'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('advertiser/laporan_adv/create_action'),
            'id' => set_value('id'),
            'tanggal' => set_value('tanggal'),
            'konversi' => set_value('konversi'),
            'klik' => set_value('klik'),
            'view' => set_value('view'),
            'anggaran' => set_value('anggaran'),
            'group_cs' => $this->db->get('group_cs')->result(),
            'data_produk' => $this->db->where('id_toko',$this->userdata->id_toko)->get('produk_retail')->result(),
            'id_produk' => set_value('id_produk'),            
            'id_group' => set_value('id_group'),
            'akun_1' => set_value('akun_1'),
            'akun_2' => set_value('akun_2'),
        );
        $this->view->render_advertiser('laporan_adv/laporan_adv_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'tanggal' => $this->input->post('tanggal',TRUE),
                'konversi' => $this->input->post('konversi',TRUE),
                'klik' => $this->input->post('klik',TRUE),
                'view' => $this->input->post('view',TRUE),
                'anggaran' => $this->input->post('anggaran',TRUE),
                'id_group' => $this->input->post('id_group',TRUE),
                'id_produk' => $this->input->post('id_produk',TRUE),
                'akun_1' => $this->input->post('akun_1',TRUE),
                'akun_2' => $this->input->post('akun_2',TRUE),
            );

            $this->Laporan_adv_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('advertiser/laporan_adv'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Laporan_adv_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('advertiser/laporan_adv/update_action'),
                'id' => set_value('id', $row->id),
                'tanggal' => set_value('tanggal', $row->tanggal),
                'konversi' => set_value('konversi', $row->konversi),
                'klik' => set_value('klik', $row->klik),
                'view' => set_value('view', $row->view),
                'anggaran' => set_value('anggaran', $row->anggaran),
                'group_cs' => $this->db->get('group_cs')->result(),
                'id_group' => set_value('id_group', $row->id_group),
                'data_produk' => $this->db->where('id_toko',$this->userdata->id_toko)->get('produk_retail')->result(),
                'id_produk' => set_value('id_produk' ,$row->id_produk),  
                'akun_1' => set_value('akun_1', $row->akun_1),   
                'akun_2' => set_value('akun_2', $row->akun_2),
            );
            $this->view->render_advertiser('laporan_adv/laporan_adv_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('advertiser/laporan_adv'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                    'tanggal' => $this->input->post('tanggal',TRUE),
                    'konversi' => $this->input->post('konversi',TRUE),
                    'klik' => $this->input->post('klik',TRUE),
                    'view' => $this->input->post('view',TRUE),
                    'anggaran' => $this->input->post('anggaran',TRUE),
                    'id_group' => $this->input->post('id_group',TRUE),
                    'id_produk' => $this->input->post('id_produk',TRUE),
                    'akun_1' => $this->input->post('akun_1',TRUE),
                    'akun_2' => $this->input->post('akun_2',TRUE),
                );

            $this->Laporan_adv_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('advertiser/laporan_adv'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Laporan_adv_model->get_by_id($id);

        if ($row) {
            $this->Laporan_adv_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('advertiser/laporan_adv'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('advertiser/laporan_adv'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('konversi', 'konversi', 'trim|required|numeric');
	$this->form_validation->set_rules('klik', 'klik', 'trim|required|numeric');
    $this->form_validation->set_rules('view', 'view', 'trim|required|numeric');
	$this->form_validation->set_rules('anggaran', 'anggaran', 'trim|required|numeric');
	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "laporan_adv.xls";
        $judul = "laporan_adv";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
        xlsWriteLabel($tablehead, $kolomhead++, "Konversi");
        xlsWriteLabel($tablehead, $kolomhead++, "Klik");
        xlsWriteLabel($tablehead, $kolomhead++, "View");
        xlsWriteLabel($tablehead, $kolomhead++, "Anggaran");

	foreach ($this->Laporan_adv_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
            xlsWriteNumber($tablebody, $kolombody++, $data->konversi);
            xlsWriteNumber($tablebody, $kolombody++, $data->klik);
            xlsWriteNumber($tablebody, $kolombody++, $data->view);
            xlsWriteNumber($tablebody, $kolombody++, $data->anggaran);

            $tablebody++;
                $nourut++;
            }

        xlsEOF();
        exit();
    }

    public function per_group()
    {
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_per_group' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'per_group'=>$this->_get_per_group(),
            'total_per_group'=>$this->_get_total_per_group()
        );
        $this->view->render_advertiser('laporan_adv/laporan_per_group', $data);    
    }

    public function total_per_group(){
        $data = array(
            'per_group'=>$this->_get_total_per_group()
        );
        $this->view->render_advertiser('laporan_adv/laporan_total_per_group', $data);
    }

    public function grand_all_team()
    {
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_grand_all_team' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'data_grand'=>$this->_grand_all_team()
        );
        $this->view->render_advertiser('laporan_adv/laporan_grand_total', $data, FALSE);
    }

    public function excel_all_team()
    {

    }

    public function excel_per_group()
    {
        header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
        header("Content-Disposition: attachment; filename=laporan_advertising_".date('d-M-Y').".xls");  //File name extension was wrong
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private",false);
        $data = array(
            'per_group'=>$this->_get_per_group()
        );
        echo $this->load->view('advertiser/laporan_adv/laporan_per_group', $data,TRUE);
        // $this->load->view('advertiser/laporan_adv/laporan_per_group', $data);    
    }

    function _grand_all_team()
    {
        $this->db->select('
            la.tanggal,
            lak.leads,
            SUM(anggaran) as daily,
            SUM(konversi) as konversi,
            SUM(anggaran) / sum(konversi) as dashboard,
            ROUND((SUM(anggaran) / lak.leads),2) as per_wa,
            SUM(akun_1) as akun_1,
            SUM(akun_2) as akun_2,
            (SUM(akun_1) + SUM(akun_2)) as total_akun,
            ((leads / sum(konversi))*100) as pers_leads
        ');
        $this->db->from('laporan_adv as la');
        $this->db->join('(SELECT SUM(leads) as leads,tanggal FROM laporan_aktivitas GROUP BY tanggal) as lak', 'la.tanggal = lak.tanggal',"left");
        $this->db->where('RIGHT(la.tanggal,7)', date("m-Y"));
        $this->db->group_by('la.tanggal');
        $data = $this->db->get()->result();
        
        $output = [];
        
        $data_group = $this->db->get("group_cs")->result();
        
        foreach($data as $item){
            $output[] = (object)array(
                    "tanggal"=>$item->tanggal,
                    "leads"=>$item->leads,
                    "daily"=>$item->daily,
                    "konversi"=>$item->konversi,
                    "dashboard"=>$item->dashboard,
                    "per_wa"=>$item->per_wa,
                    "akun_1"=>$item->akun_1,
                    "akun_2"=>$item->akun_2,
                    "data_adv"=>$this->_get_data_adv($item->tanggal,$data_group),
                    "total_akun"=>$item->total_akun,
                    "pers_leads"=>$item->pers_leads
                ); 
        }
        
        return array("data_group"=>$data_group,"data_laporan"=>$output);
    }
    
    function _get_data_adv($tanggal,$data_group){
        $output = array();
        foreach($data_group as $item){
            $anggaran = $this->_get_anggaran_per_group($item->id,$tanggal);
            $output[$item->id] = $anggaran;
        }
        return $output;
    }

    function _get_anggaran_per_group($id,$tanggal){
        $this->db->select("(SUM(akun_1) + sum(akun_2)) as anggaran_pengiklan");
        $this->db->from("laporan_adv la");
        $this->db->where("la.tanggal",$tanggal);
        $this->db->where("la.id_group",$id);
        return $this->db->get()->row();
    }

    function _get_per_group(){
        $res_group = $this->db->get('group_cs')->result();
        $output = [];
        foreach ($res_group as $group) {
            $data_laporan = $this->_get_laporan_by_group_and_month($group->id,date("m-Y"));
            $output[$group->group] = $data_laporan; 
        }
        return $output;
    }

    function _get_laporan_by_group_and_month($id_group,$bulan) {
        $data_produk = $this->db->where('id_toko',$this->userdata->id_toko)->get('produk_retail')->result();
        
        $output = [];
        foreach ($data_produk as $produk) {
            $data_laporan = $this->_get_laporan($id_group,$bulan,$produk->id_produk_2);
            $output[$produk->nama_produk] =  $data_laporan;
        }

        return $output;
        
    }

    function _get_total_per_group(){
        $res_group = $this->db->get('group_cs')->result();
        $output = [];
        foreach ($res_group as $group) {
            $data_laporan = $this->_get_total_laporan($group->id,date("m-Y"));
            $output[$group->group] = $data_laporan; 
        }
        return $output;
    }

    function _get_total_laporan($id_group,$bulan)
    {
        $this->db->select('
            la.id,
            tanggal,
            akun_1,
            akun_2,
            (la.akun_1 + la.akun_2) as total_akun_iklan,
            SUM(konversi) as konversi,
            SUM(anggaran) as daily,
            (SUM(anggaran) / SUM(konversi)) as per_wa,
            (SUM(anggaran) / SUM(konversi)) as dashboard,
            ((SELECT SUM(leads) FROM laporan_aktivitas WHERE tanggal = la.tanggal)) as leads,
            (((SELECT SUM(leads) FROM laporan_aktivitas WHERE tanggal = la.tanggal) /  SUM(konversi)) * 100) as pers_leads
            '
        );
        $this->db->from('laporan_adv la');
        $this->db->where('id_group', $id_group);
        $this->db->where('right(tanggal,7)', $bulan);
        $this->db->group_by('la.tanggal');
        return $this->db->get()->result();
    }

    function _get_laporan($id_group,$bulan,$id_produk_2)
    {
        $this->db->select('
            la.id,
            tanggal,
            konversi,
            klik,
            view,
            anggaran,
            (anggaran / (SELECT SUM(leads) FROM laporan_aktivitas WHERE tanggal = la.tanggal)) as per_wa,
            (anggaran / konversi) as dashboard,
            ((view / klik) * 100) as pers_view,
            (konversi / view) as pers_konversi,
            (SELECT SUM(leads) FROM laporan_aktivitas WHERE tanggal = la.tanggal) as leads
        ');
        $this->db->from('laporan_adv la');
        $this->db->where('id_group', $id_group);
        $this->db->where('right(tanggal,7)', $bulan);
        $this->db->where('id_produk', $id_produk_2);
        return $this->db->get()->result();
    }

}

/* End of file Laporan_adv.php */
/* Location: ./application/controllers/Laporan_adv.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-17 04:14:12 */
/* http://harviacode.com */