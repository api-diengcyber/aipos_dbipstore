<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Gaji_pegawai extends CI_Controller {

        
        public function __construct()
        {
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->library('datatables');
            $this->load->model('Login_model');
            $this->load->model('Gaji_model');
            $this->load->library('view');
            $this->Login_model->is_produksi();
            $this->userdata = $this->Login_model->get_data();
        }
    
        public function index()
        {
            $from = ($this->input->post('from'))?$this->input->post('from'):date('d-m-Y');
            $to = ($this->input->post('to'))?$this->input->post('to'):date('d-m-Y');
            $gaji_perjam = $this->input->post('gaji_perjam');
            $jam_lembur = $this->input->post('jam_lembur');

            $data = array(
                'id_toko' => $this->userdata->id_toko,
                'nama_toko' => $this->userdata->nama_toko,
                'nama_user' => $this->userdata->email,
                'active_home' => 'active',
                'id_modul' => $this->userdata->id_modul,
                'nama_modul' => $this->userdata->nama_modul,
                'active_gaji_pegawai' => 'active',
                'from'=>$from,
                'to'=>$to,
                'gaji_perjam'=>$gaji_perjam,
                'jam_lembur'=>$jam_lembur,
                'message'=>$this->session->flashdata('message'),
                'data_gaji' => $this->Gaji_model->get_data_gaji_between($from,$to,$gaji_perjam,$jam_lembur),
            );
            $this->view->render_produksi('gaji/gaji_list', $data);
        }

        public function simpan()
        {
           $id_users = $this->input->post('id_users');
           $gaji_perjam = $this->input->post('gaji_perjam');
           $jam_lembur = $this->input->post('jam_lembur');           
           $nama = $this->input->post('nama');
           $jam_kerja = $this->input->post('jam_kerja');
           $total_jam = $this->input->post('total_jam');
           $total_lembur = $this->input->post('total_lembur');
           $gaji = $this->input->post('gaji');
           $keterangan = $this->input->post('keterangan');
           $from = $this->input->post('from');
           $to = $this->input->post('to');
           $judul = $this->input->post('judul');
           
           /**
            * Create gaji_temp
            */

            $object_gaji = array(
                "judul"=>$judul,
                "dari"=>$from,
                "sampai"=>$to,
                "gaji_perjam"=>$gaji_perjam,
                "jam_lembur"=>$jam_lembur
            );
            $this->db->insert('gaji_temp', $object_gaji);
            $id_gaji_temp = $this->db->insert_id();

            // $this->db->where('dari', $from);
            // $this->db->where('sampai', $to);
            // $row = $this->db->get('gaji_temp')->row();

            // $id_gaji_temp = 0;
            // if($row){
            //     $array = array(
            //         "gaji_perjam"=>$gaji_perjam,
            //         "jam_lembur"=>$jam_lembur
            //     );
            //     $this->db->where('id', $row->id);
            //     $this->db->update('gaji_temp', $array);
            //     $id_gaji_temp = $row->id;
            //     /**
            //      * Delete gaji detail temp with same id_gaji_temp
            //      */
            //     // $this->db->where('id_gaji_temp', $id_gaji_temp);
            //     // $this->db->delete('gaji_detail_temp');
            // } else {
            //     $object_gaji = array(
            //         "dari"=>$from,
            //         "sampai"=>$to,
            //         "gaji_perjam"=>$gaji_perjam,
            //         "jam_lembur"=>$jam_lembur
            //     );
            //     $this->db->insert('gaji_temp', $object_gaji);
            //     $id_gaji_temp = $this->db->insert_id();
            // }

            /**
             * Create object gaji_detail_temp
             */
            $object_gaji_detail = [];
            foreach ($id_users as $key => $item) {
                $object_gaji_detail[] = array(
                    "id_gaji_temp" => $id_gaji_temp,
                    "id_users" => $item,
                    "nama_pegawai" => $nama[$key],
                    "jam_kerja" => $jam_kerja[$key],
                    "total_jam" => $total_jam[$key],
                    "total_lembur" => $total_lembur[$key],
                    "gaji" => $gaji[$key],
                    "keterangan" => $keterangan[$key],
                );
            }
            

            /**
             * Insert batch gaji_detail
             */
            
            $this->db->insert_batch('gaji_detail_temp', $object_gaji_detail);

            /**
             * Redirect back to list
             */
            $this->session->set_flashdata('message', 'Berhasil Disimpan');
            
            redirect(site_url('produksi/gaji_pegawai'),'refresh');
            
        }
    
    }
    
    /* End of file Gaji_pegawai.php */
?>