<?php
    
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_aktivitas_model extends CI_Model {
    
    function get_data_aktivitas_sales($id_users = '',$bulan_tahun='')
    {
        $this->db->select('id_users as id_cs,CONCAT(first_name," ",RIGHT(last_name,2)) as nama_cs');
        $this->db->from('users');
        $this->db->where_in('level', [2,9]);
        if(!empty($id_users)){
            $this->db->where('id_users', $id_users);
        }
        $data_cs = $this->db->get()->result();

        $output = [];
        foreach ($data_cs as $cs) {
            $output[$cs->nama_cs] = $this->get_data_aktivitas($cs->id_cs,$bulan_tahun,'','',true);
        }
        return $output;
    }
    
    function get_data_aktivitas_sales_by_group($id_users = '', $bulan_tahun='', $id_advertiser='', $dari = '', $sampai = '')
    {
        $this->db->select('u.id_users as id_cs,CONCAT(u.first_name," ",RIGHT(u.last_name,2)) as nama_cs');
        $this->db->from('users u');
		$this->db->join('group_cs_detail gcd', 'u.id_users=gcd.id_cs');
		$this->db->join('group_cs gc', 'gcd.id_group=gc.id');
        $this->db->where_in('u.level', [2,9]);
        if (!empty($id_users)) {
            $this->db->where('u.id_users', $id_users);
        }
        if (!empty($id_advertiser)) {
            $this->db->where('gc.id_advertiser', $id_advertiser);
        }
        $data_cs = $this->db->get()->result();
        $output = [];
        foreach ($data_cs as $cs) {
            $output[$cs->nama_cs] = $this->get_data_aktivitas($cs->id_cs,$bulan_tahun,$dari,$sampai);
        }
        return $output;
    }

    function _get_produk()
    {
        $this->db->select('pr.*');
        $this->db->from('produk_retail pr');
        $this->db->order_by('pr.nama_produk', 'asc');
        return $this->db->get()->result();
    }

    function _get_media()
    {
        $this->db->select('*');
        $this->db->from('pil_media');
        $this->db->order_by('id', 'asc');
        return $this->db->get()->result();
    }

    function _get_data_aktivitas($id_users = '',$bulan_tahun='', $dari = '', $sampai = '', $blnthn = false, $id_produk = null)
    {
        $array_market = array();
        $array_market[] = 'empty';
        $res_market = $this->_get_media();
        foreach ($res_market as $key):
            $array_market[$key->id] = strtolower($key->media);
        endforeach;

        $arr_str_select = array();
        $arr_q_join = array();
        if (empty($id_produk)) {
            $res_produk = $this->_get_produk();
            foreach ($array_market as $key => $value):
                foreach ($res_produk as $key_p):
                    $as_tbl = 't_'.$value.'_'.$key_p->kode_produk;
                    $arr_str_select[] = $as_tbl.'.jumlah AS '.$value.'_'.$key_p->kode_produk;
                    $arr_q_join[] = (Object) array(
                        'q' => '(SELECT id_laporan, SUM(jumlah) AS jumlah FROM laporan_aktivitas_detail WHERE media="'.$key.'" AND id_produk="'.$key_p->id_produk_2.'" GROUP BY id_laporan) AS '.$as_tbl,
                        'on' => $as_tbl.'.id_laporan=la.id',
                        'join' => 'left',
                    );
                endforeach;
            endforeach;
        } else {
            foreach ($array_market as $key => $value):
                $as_tbl = 't_'.$value;
                $arr_str_select[] = $as_tbl.'.jumlah AS '.$value;
                $arr_q_join[] = (Object) array(
                    'q' => '(SELECT id_laporan, SUM(jumlah) AS jumlah FROM laporan_aktivitas_detail WHERE media="'.$key.'" AND id_produk="'.$id_produk.'" GROUP BY id_laporan) AS '.$as_tbl,
                    'on' => $as_tbl.'.id_laporan=la.id',
                    'join' => 'left',
                );
            endforeach;
        }
        $str_select = implode(',', $arr_str_select);

        $this->db->select('la.id as id,left(la.tanggal,10) as tanggal,CONCAT(u.first_name," ",RIGHT(u.last_name,2)) as nama_cs,la.leads,la.closing,la.totalan,
            '.$str_select.'
        ');
        $this->db->from('laporan_aktivitas la');
        $this->db->join('users u', 'u.id_users = la.id_cs');

        foreach ($arr_q_join as $key):
           $this->db->join($key->q, $key->on, $key->join); 
        endforeach;

        if (!empty($id_users)) {
            $this->db->where('la.id_cs', $id_users);
        }
        if(!empty($dari) && !empty($sampai)){
            $exdari = explode("-",$dari);
            $exsampai = explode("-",$sampai);
            $dari = $exdari[2].'-'.$exdari[1].'-'.$exdari[0];
            $sampai = $exsampai[2].'-'.$exsampai[1].'-'.$exsampai[0];
            
            $this->db->where('DATE(CONCAT(SUBSTRING(la.tanggal,7,4),"-",SUBSTRING(la.tanggal,4,2),"-",SUBSTRING(la.tanggal,1,2))) BETWEEN "'.$dari.'" AND "'.$sampai.'"');
        }
        if ($blnthn == true || !empty($bulan_tahun)) {
            if(!empty($bulan_tahun) && $bulan_tahun != '-'){
                $this->db->where('CONCAT(SUBSTRING(la.tanggal,4,2),"-",SUBSTRING(la.tanggal,7,4)) =',$bulan_tahun);
            }else{
                $this->db->where('CONCAT(SUBSTRING(la.tanggal,4,2),"-",SUBSTRING(la.tanggal,7,4)) =',date('m-Y'));
            }
        }
    }

    function get_data_aktivitas($id_users = '',$bulan_tahun='', $dari = '', $sampai = '', $blnthn = false)
    {
        $this->_get_data_aktivitas($id_users, $bulan_tahun, $dari, $sampai, $blnthn);
        $this->db->order_by('DATE(CONCAT(SUBSTRING(la.tanggal,7,4),"-",SUBSTRING(la.tanggal,4,2),"-",SUBSTRING(la.tanggal,1,2))) ASC');
        $this->db->order_by('id', 'desc');
        return $this->db->get()->result();
    }
    
    function get_data_aktivitas_sales_group_by_tgl($tgl = '', $id_users = null)
    {
        $this->_get_data_aktivitas($id_users, null, $tgl, $tgl);
        /* $this->db->select('la.id as id, la.id_cs, left(la.tanggal,10) as tanggal,CONCAT(u.first_name," ",RIGHT(u.last_name,2)) as nama_cs,la.leads,la.closing,la.totalan');
        $this->db->from('laporan_aktivitas la');
        $this->db->join('users u', 'u.id_users = la.id_cs');
		$this->db->join('group_cs_detail gcd', 'u.id_users=gcd.id_cs');
		$this->db->join('group_cs gc', 'gcd.id_group=gc.id');
        $this->db->where_in('u.level', [2,9]);
        $this->db->where('la.tanggal', $tgl);
        $this->db->order_by('u.first_name', 'asc');
        $this->db->group_by('u.id_users'); */
        $this->db->group_by('u.id_users');
        $this->db->order_by('u.first_name', 'asc');
        return $this->db->get()->result();
    }
    
    function get_data_aktivitas_sales_group_by_produk($id_produk = '', $s_tgl = '', $e_tgl = '', $id_users = null)
    {
        $this->_get_data_aktivitas($id_users, null, $s_tgl, $e_tgl, false, $id_produk);
        /* $this->db->select('la.id as id, la.id_cs, left(la.tanggal,10) as tanggal,CONCAT(u.first_name," ",RIGHT(u.last_name,2)) as nama_cs,la.leads,la.closing,la.totalan');
        $this->db->from('laporan_aktivitas la');
        $this->db->join('users u', 'u.id_users = la.id_cs');
		$this->db->join('group_cs_detail gcd', 'u.id_users=gcd.id_cs');
		$this->db->join('group_cs gc', 'gcd.id_group=gc.id');
        $this->db->where_in('u.level', [2,9]);
        $this->db->where('la.tanggal', $tgl); */
        $this->db->group_by('u.id_users');
        $this->db->order_by('u.first_name', 'asc');
        return $this->db->get()->result();
    }

    function get_by_id($id_users,$id){
        $this->db->select('*');
        $this->db->from('laporan_aktivitas la');
        $this->join('(SELECT jumlah as hbWA,id_laporan FROM laporan_aktivitas_detail where id_produk = 1 and media = 1) as hbWA)','hbWA.id_laporan =  la.id','left');
        $this->join('(SELECT jumlah as gcWA,id_laporan FROM laporan_aktivitas_detail where id_produk = 2 and media = 1) as gcWA)','gcWA.id_laporan =  la.id','left');
        $this->join('(SELECT jumlah as hbShopee,id_laporan FROM laporan_aktivitas_detail where id_produk = 1 and media = 2) as hbShopee)','hbShopee.id_laporan =  la.id','left');
        $this->join('(SELECT jumlah as gcShopee,id_laporan FROM laporan_aktivitas_detail where id_produk = 2 and media = 2) as gcShopee)','gcShopee.id_laporan =  la.id','left');
        $this->join('(SELECT jumlah as hbTokopedia,id_laporan FROM laporan_aktivitas_detail where id_produk = 1 and media = 3) as hbTokopedia)','hbTokopedia.id_laporan =  la.id','left');
        $this->join('(SELECT jumlah as gcTokopedia,id_laporan FROM laporan_aktivitas_detail where id_produk = 2 and media = 3) as gcTokopedia)','gcTokopedia.id_laporan =  la.id','left');
        $this->join('(SELECT jumlah as hbCod,id_laporan FROM laporan_aktivitas_detail where id_produk = 1 and media = 4) as hbCod)','hbCod.id_laporan =  la.id','left');
        $this->join('(SELECT jumlah as gcCod,id_laporan FROM laporan_aktivitas_detail where id_produk = 2 and media = 4) as gcCod)','gcCod.id_laporan =  la.id','left'); 
        $this->db->where('la.id', $id);
        return $this->db->get()->row();       
    }


    function get_aktivitas_total($params = array())
    {
        $this->db->select('la.*,u.first_name as nama_cs,SUM(leads) as leads, SUM(totalan) as totalan, SUM(gracilli) as gracilli, SUM(herbaskin) as herbaskin, sum(gracilli) + sum(herbaskin) as totalan_closing');
        $this->db->from('laporan_aktivitas la');
        $this->db->join('(SELECT id,SUM(JUMLAH) as herbaskin FROM laporan_aktivitas_detail WHERE id_produk = 1) as herbaskin', 'herbaskin.id = la.id', 'left');
        $this->db->join('(SELECT id,SUM(JUMLAH) as gracilli FROM laporan_aktivitas_detail WHERE id_produk = 2) as gracilli', 'gracilli.id = la.id', 'left');        
        $this->db->join('users u', 'u.id_users = la.id_cs', 'left');
        if(!empty($params['bulan'])){
            $this->db->where('right(tanggal,7)', $params['bulan']);
        }
        $this->db->order_by('id', 'desc');
        return $this->db->get()->result();
    }
    
}
    
    /* End of file Sales_aktivitas_model.php */
    
?>