<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Group_cs extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Group_cs_model');
        $this->load->library('form_validation');        
        $this->load->library('datatables');
        $this->load->model('Login_model');
        $this->load->library('view');
        $this->Login_model->is_leadercs();
        $this->userdata = $this->Login_model->get_data();
    }

    public function index()
    {
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_group_cs' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'data_cs' => $this->_get_cs_grouped()
        );
        $this->view->render_leadercs('group_cs/group_cs_list',$data);
    } 

    function _get_cs_grouped(){
        $grop = $this->db->get('group_cs')->result();
        $output = [];
        foreach ($grop as $g) {
            $output[$g->id] = $this->_get_by_group($g->id);
        }
        return $output;
    }

    function _get_by_group($id){
        $this->db->select('*');
        $this->db->from('group_cs_detail gcd');
        $this->db->join('users u', 'u.id_users = gcd.id_cs');
        $this->db->where('id_group', $id);
        return $this->db->get()->result();
    }
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Group_cs_model->json();
    }

    public function read($id) 
    {
        $row = $this->Group_cs_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'group' => $row->group,
	        );
            $this->view->render_leadercs('group_cs/group_cs_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('leadercs/group_cs'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('leadercs/group_cs/create_action'),
            'id' => set_value('id'),
            'group' => set_value('group'),
            'data_sales' => $this->db->where_in('level',[2,9])->get('users')->result()
	    );
        $this->view->render_leadercs('group_cs/group_cs_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'group' => $this->input->post('group',TRUE),
            );

            $this->Group_cs_model->insert($data);

            $id = $this->db->insert_id();
            
            $data_cs = $this->input->post('id_cs');
            
            $arr_cs = [];
            foreach($data_cs as $i => $val){
                $arr_cs[] = array("id_cs"=>$val,"id_group"=>$id);
            }

            $this->db->insert_batch('group_cs_detail', $arr_cs);
            

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('leadercs/group_cs'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Group_cs_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('leadercs/group_cs/update_action'),
                'id' => set_value('id', $row->id),
                'group' => set_value('group', $row->group),
                'data_sales' => $this->db->where_in('level',[2,9])->get('users')->result(),
                'id_cs'=> $this->_get_cs_by_group($row->id)
	        );
            $this->view->render_leadercs('group_cs/group_cs_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('leadercs/group_cs'));
        }
    }

    function _get_cs_by_group($id)
    {
       $this->db->where('id', $id);
       $data = $this->db->get('group_cs_detail')->result();
       $output = [];
       foreach ($data as $item) {
           $output[] = $item->id_cs;
       }
       return $output;
    }

    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {

            $this->db->where('id_group', $this->input->post('id', TRUE));
            $this->db->delete('group_cs_detail');

            $data = array(
                'group' => $this->input->post('group',TRUE),
            );
            
            if(!empty($data_cs)){
                $data_cs = $this->input->post('id_cs');
                
                $arr_cs = [];
                foreach($data_cs as $i => $val){
                    $arr_cs[] = array("id_cs"=>$val,"id_group"=>$this->input->post('id', TRUE));
                }
    
                $this->db->insert_batch('group_cs_detail', $arr_cs);
            }
            

            $this->Group_cs_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('leadercs/group_cs'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Group_cs_model->get_by_id($id);

        if ($row) {
            $this->Group_cs_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('leadercs/group_cs'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('leadercs/group_cs'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('group', 'group', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "group_cs.xls";
        $judul = "group_cs";
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
	    xlsWriteLabel($tablehead, $kolomhead++, "Group");

	foreach ($this->Group_cs_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->group);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Group_cs.php */
/* Location: ./application/controllers/Group_cs.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-16 09:45:01 */
/* http://harviacode.com */