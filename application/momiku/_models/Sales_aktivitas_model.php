<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Sales_aktivitas_model extends CI_Model {
    
        function get_data_aktivitas($id_users = '',$dari='',$sampai='')
        {
            $this->db->select('
                la.id as id,left(la.tanggal,10) as tanggal,u.first_name as nama_cs,la.leads,la.closing,la.totalan,
                (SELECT jumlah from laporan_aktivitas_detail lad where lad.id_laporan = la.id and lad.media = 1 and lad.id_produk = 1) as wa_hs, 
                (SELECT jumlah from laporan_aktivitas_detail lad where lad.id_laporan = la.id and lad.media = 1 and lad.id_produk = 2) as wa_dc,
                (SELECT jumlah from laporan_aktivitas_detail lad where lad.id_laporan = la.id and lad.media = 2 and lad.id_produk = 1) as shopee_hs,
                (SELECT jumlah from laporan_aktivitas_detail lad where lad.id_laporan = la.id and lad.media = 2 and lad.id_produk = 2) as shopee_gc,
                (SELECT jumlah from laporan_aktivitas_detail lad where lad.id_laporan = la.id and lad.media = 3 and lad.id_produk = 1) as tokopedia_hs, 
                (SELECT jumlah from laporan_aktivitas_detail lad where lad.id_laporan = la.id and lad.media = 3 and lad.id_produk = 2) as tokopedia_gc,
                (SELECT jumlah from laporan_aktivitas_detail lad where lad.id_laporan = la.id and lad.media = 4 and lad.id_produk = 1) as cod_hs,
                (SELECT jumlah from laporan_aktivitas_detail lad where lad.id_laporan = la.id and lad.media = 4 and lad.id_produk = 2) as cod_gc
            ');
            $this->db->from('laporan_aktivitas la');
            $this->db->join('users u', 'u.id_users = la.id_cs');
            if(!empty($id_users)){
                $this->db->where('la.id_cs', $id_users);
            }
            if(!empty($dari) && !empty($sampai)){
                $this->db->where('tanggal BETWEEN "'.$dari.'" AND "'.$sampai.'"');
            }
            return $this->db->get()->result();
        }
    
    }

    function get_peringkat_aktivitas($user_id)
    {
        
    }
    
    /* End of file Sales_aktivitas_model.php */
    
?>