<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Gaji_model extends CI_Model {
    
        function get_all_between($from,$to,$gaji_perjam,$jam_lembur)
        {
            /**
             * Cek if temporary data exist
             */
            $this->db->where('dari', $from);
            $this->db->where('sampai', $to);
            $row_gaji_temp = $this->db->get('gaji_temp')->row();
            if($row_gaji_temp) {
                if(!empty($gaji_perjam) || !empty($jam_lembur)){
                    $gaji = (object)array(
                        "gaji_perjam"=>$gaji_perjam,
                        "jam_lembur"=>$jam_lembur,
                        "data"=>$this->get_gaji_detail_temp($row_gaji_temp->id,$gaji_perjam,$jam_lembur),
                        "from"=>$row_gaji_temp->dari,
                        "to"=>$row_gaji_temp->sampai,
                    );
                    return $gaji;
                }else{
                    $gaji = (object)array(
                        "gaji_perjam"=>$row_gaji_temp->gaji_perjam,
                        "jam_lembur"=>$row_gaji_temp->jam_lembur,
                        "data"=>$this->get_gaji_detail_temp($row_gaji_temp->id),
                        "from"=>$row_gaji_temp->dari,
                        "to"=>$row_gaji_temp->sampai,
                    );
                    return $gaji;
                }
            }else{
                $gaji_perjam = !empty($gaji_perjam)?$gaji_perjam:5000;
                $jam_lembur = !empty($jam_lembur)?$jam_lembur:6000;

                $gaji = (object)array(
                    "gaji_perjam"=>$gaji_perjam,
                    "jam_lembur"=>$jam_lembur,
                    "data"=>$this->get_between($from,$to,$gaji_perjam,$jam_lembur),
                    "from"=>$from,
                    "to"=>$to,
                );
                return $gaji;
            }
        }

        function get_data_gaji_between($from,$to,$gaji_perjam,$jam_lembur)
        {
            $gaji_perjam = !empty($gaji_perjam)?$gaji_perjam:5000;
            $jam_lembur = !empty($jam_lembur)?$jam_lembur:6000;

            $gaji = (object)array(
                "gaji_perjam"=>$gaji_perjam,
                "jam_lembur"=>$jam_lembur,
                "data"=>$this->get_between($from,$to,$gaji_perjam,$jam_lembur),
                "from"=>$from,
                "to"=>$to,
            );
            return $gaji;
        }

        function get_gaji_detail_temp($id_gaji_temp,$gaji_perjam="",$jam_lembur="")
        {
            if(!empty($gaji_perjam) || !empty($jam_lembur)) {
                $this->db->where('id_gaji_temp', $id_gaji_temp);
                $data = $this->db->get('gaji_detail_temp')->result();
                $output = [];
                foreach($data as $item){
                    $output[] = (object)array(
                        "id_users"=>$item->id_users,
                        "nama_pegawai"=>$item->nama_pegawai,
                        "jam_kerja"=>$item->jam_kerja,
                        "total_jam"=>$item->total_jam,
                        "total_lembur"=>$item->total_lembur,
                        "gaji"=>((str_replace(',','.',$item->total_jam)) * 1 * $gaji_perjam) + ((str_replace(',','.',$item->total_lembur)) * 1 * $jam_lembur),
                        "keterangan"=>$item->keterangan,
                    );
                }
                return $output;
            }else {
                $this->db->where('id_gaji_temp', $id_gaji_temp);
                return $this->db->get('gaji_detail_temp')->result();
            }
        }

        function get_between($from,$to,$gaji_perjam,$jam_lembur)
        {
            $res_karyawan = $this->get_all_karyawan();

            $output = [];
            foreach ($res_karyawan as $item) {
                $total_jam = $this->get_total_jam_kerja_between($item->id_users,$from,$to); 
                // $total_lembur = $this->get_total_lembur_between($item->id_users,$from,$to);
                $jam_kerja = $this->get_diff_jam_kerja_between($item->id_users,$from,$to);

                $total_lembur = 0;
                foreach ($jam_kerja as $jam) {
                    $total_lembur += $jam['lembur'];
                }

                $gajiy = (str_replace(' Jam','',(str_replace(',','.',$total_jam))) * $gaji_perjam) + ((str_replace(',','.',$total_lembur)) * $jam_lembur);

                $output[] = (object)array(
                    "id_users"=>$item->id_users,
                    "nama_pegawai"=>$item->first_name,
                    "jam_kerja"=>$this->get_diff_jam_kerja_between($item->id_users,$from,$to,"CONCAT"),
                    "total_jam"=>$total_jam,
                    "total_lembur"=>$total_lembur,
                    "gaji"=>$gajiy,
                    "keterangan"=>"",
                );
            }
            return $output;
        }

        function get_all_karyawan()
        {
            $this->db->select('*');
            $this->db->from('users u');
            $this->db->where('u.level', 4);
            $this->db->where('u.first_name is not null');
            $this->db->order_by('u.first_name', 'asc');
            return $this->db->get()->result();
        }

        function get_jam_kerja_between($id_pegawai,$from,$to) 
        {
            $this->db->select('*');
            $this->db->from('jam_kerja jk');
            $this->db->where('jk.id_pegawai', $id_pegawai);
            $this->db->where('jk.tgl BETWEEN "'.$from.'" AND "'.$to.'"');
            return $this->db->get()->result();
        }

        function get_total_lembur_between($id_pegawai,$from,$to) 
        {
            $this->db->select('sum(lembur) as value');
            $this->db->from('jam_kerja jk');
            $this->db->where('jk.id_pegawai', $id_pegawai);
            $this->db->where('jk.tgl BETWEEN "'.$from.'" AND "'.$to.'"');
            $row =  $this->db->get()->row();
            if(!empty($row)){
                return ($row->value)?$row->value:0;
            }else{
                return 0;
            }
        }

        function get_diff_jam_kerja_between($id_pegawai,$from,$to,$type = "")
        {
            $res_jam_kerja = $this->get_jam_kerja_between($id_pegawai,$from,$to);

            if($type == "CONCAT"){
                $output = "";
                foreach($res_jam_kerja as $item){
                    if(!empty($item->jam_pulang)){
                        $output .= '('.$this->_diff($item->tgl.' '.$item->jam_masuk,$item->tgl.' '.$item->jam_pulang).')';
                    }else{
                        /**
                         * Jika tidak ada jam pulang set jam = 0
                         */
                        $output = '(0)';
                    }
                }
            }else{
                $output = [];
                foreach($res_jam_kerja as $item){
                    if(!empty($item->jam_pulang)){
                        $jam = $this->_diff($item->tgl.' '.$item->jam_masuk,$item->tgl.' '.$item->jam_pulang);
                        if($jam > 8){
                            $total_lembur = 0;
                            $lembur = $jam - 8;
                            if($lembur > 0){
                                $total_lembur = $lembur;
                            }else{
                                $total_lembur = 0;
                            }

                            $output[] = array(
                                "total" => 8,
                                "lembur" => $lembur
                            );
                        }else{
                            $output[] = array(
                                "total" => $jam,
                                "lembur" => 0
                            );
                        }
                    }else{
                        /**
                         * Jika tidak ada jam pulang set jam = 0
                         */
                        $output[] = array(
                                "total" => 0,
                                "lembur" => 0
                            );
                    }
                }
            }
            return $output;
        }


        function get_total_jam_kerja_between($id_pegawai,$from,$to)
        {
            $res_diff = $this->get_diff_jam_kerja_between($id_pegawai,$from,$to);
            $output = 0;
            foreach ($res_diff as $item) {
               $output += str_replace(',','.',$item['total']) * 1;
            }
            return str_replace('.',',',$output).' Jam';
        }

        function _diff($from,$to)
        {
            $start = new \DateTime($from);
            $end   = new \DateTime($to);
            $interval  = $end->diff($start);
            $total_jam =  $interval->format('%h');
            $total_menit = $interval->format('%i');
            $menit_jam = $total_menit / 60;

            return round(($total_jam+$menit_jam)*1,2);
        }
    
    }
    
    /* End of file Gaji_model.php */
    
?>