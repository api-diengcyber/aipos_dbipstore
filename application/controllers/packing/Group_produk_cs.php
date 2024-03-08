<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Group_produk_cs extends AI_Admin
{
    function __construct()
    {
        parent::__construct();
        $this->models('Group_produk_cs_model:Gp_model');
    }

    public function index()
    {
        $data = array(
            'active_group_produk_cs' => 'active',
            'data_cs' => $this->_get_cs_grouped()
        );
        $this->view('group_produk_cs/group_cs_list',$data);
    } 

    function _get_cs_grouped(){
        $grop = $this->db->get('group_produk_cs')->result();
        $output = [];
        foreach ($grop as $g) {
            $output[$g->id] = $this->_get_by_group($g->id);
        }
        return $output;
    }

    function _get_by_group($id){
        $this->db->select('*');
        $this->db->from('group_produk_cs_detail gcd');
        $this->db->join('users u', 'u.id_users = gcd.id_cs');
        $this->db->where('id_group', $id);
        return $this->db->get()->result();
    }
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Gp_model->json();
    }

    public function read($id) 
    {
        $row = $this->Gp_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'group' => $row->group,
	        );
            $this->view('group_produk_cs/group_cs_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/group_produk_cs'));
        }
    }

    public function create() 
    {
        $data = array(
            'active_group_produk_cs' => 'active',
            'button' => 'Create',
            'action' => site_url('admin/group_produk_cs/create_action'),
            'id' => set_value('id'),
            'group' => set_value('group'),
            'id_produk' => "",
            'data_sales' => $this->db->select('*,"0" as selected')->where_in('level',[2,9])->get('users')->result(),
            'data_produk' => $this->db->where('id_toko',158)->get('produk_retail')->result()
	    );
        $this->view('group_produk_cs/group_cs_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'id_produk' => $this->input->post('id_produk'),
                'group' => $this->input->post('group',TRUE),
            );

            $this->Gp_model->insert($data);

            $id = $this->db->insert_id();
            
            $data_cs = $this->input->post('id_cs');
            
            $arr_cs = [];
            foreach($data_cs as $i => $val){
                $arr_cs[] = array("id_cs"=>$val,"id_group"=>$id);
            }

            $this->db->insert_batch('group_produk_cs_detail', $arr_cs);
            

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/group_produk_cs'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Gp_model->get_by_id($id);
        $data_sales = $this->db->select('u.first_name,u.id_users,IF(gcd.id_cs IS NULL,"0","1") as selected')
                              ->from('users u')
                              ->join('group_produk_cs_detail gcd','gcd.id_cs = u.id_users AND gcd.id_group = '.$id,'LEFT')
                              ->where_in('u.level',[2,9])
                              ->get()->result();
        if ($row) {
            $data = array(
                'active_group_produk_cs' => 'active',
                'button' => 'Update',
                'action' => site_url('admin/group_produk_cs/update_action'),
                'id' => set_value('id', $row->id),
                'group' => set_value('group', $row->group),
                'data_sales' => $data_sales,
                'id_produk' => $row->id_produk,
                'id_cs'=> $this->_get_cs_by_group($row->id),
                'data_produk' => $this->db->where('id_toko',158)->get('produk_retail')->result()
	        );
            $this->view('group_produk_cs/group_cs_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/group_produk_cs'));
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

            $data = array(
                'id_produk' => $this->input->post('id_produk'),
                'group' => $this->input->post('group',TRUE),
            );
            
            $data_cs = $this->input->post('id_cs');
            if(count($data_cs) > 0){
                $this->db->where('id_group', $this->input->post('id', TRUE));
                $this->db->delete('group_produk_cs_detail');
                $arr_cs = [];
                foreach($data_cs as $i => $val){
                    $arr_cs[] = array("id_cs"=>$val,"id_group"=>$this->input->post('id', TRUE));
                }
    
                $this->db->insert_batch('group_produk_cs_detail', $arr_cs);
            }
            

            $this->Gp_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/group_produk_cs'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Gp_model->get_by_id($id);

        if ($row) {
            $this->Gp_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/group_produk_cs'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/group_produk_cs'));
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

	foreach ($this->Gp_model->get_all() as $data) {
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