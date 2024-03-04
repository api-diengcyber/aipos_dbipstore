<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mutasi_stok_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function select_stok_mutasi($as = 'stok', $sum = false)
    {
        $q = $sum?'SUM':'';
        return $q.'(((IFNULL(p1.jml,0)-IFNULL(m1.jml_mutasi,0)+IFNULL(m2.jml_mutasi,0)+IFNULL(rjd.jml,0))-IFNULL(o1.jml,0))+IFNULL(sso1.penyesuaian,0)) AS '.$as;
    }

    function select_stok_mutasi2($as = 'stok', $sum = false)
    {
        $q = $sum?'SUM':'';
        return $q.'(((IFNULL(p1.jml,0)-IFNULL(m1.jml_mutasi,0)+IFNULL(m2.jml_mutasi,0)+IFNULL(rjd.jml,0))-IFNULL(o1.jml,0))+IFNULL(sso1.penyesuaian,0)) AS '.$as;
    }

    function query_stok_mutasi($db, $id_toko, $id_users, $id_produk)
    {
        if (!empty($id_users)) {
            // join sum mutasi stok 
            $db->join('(SELECT id_toko, id_produk, SUM(jumlah) AS jml_mutasi FROM mutasi_stok WHERE status=1 AND user_asal="'.$id_users.'" GROUP BY id_toko, id_produk) AS m1', 'm1.id_produk='.$id_produk.' AND m1.id_toko='.$id_toko.'', 'left');
            // join sum mutasi stok 
            $db->join('(SELECT id_toko, id_produk, SUM(jumlah) AS jml_mutasi FROM mutasi_stok WHERE status=1 AND user_tujuan="'.$id_users.'" GROUP BY id_toko, id_produk) AS m2', 'm2.id_produk='.$id_produk.' AND m2.id_toko='.$id_toko.'', 'left');
            // join sum pembelian
            $db->join('(SELECT id_toko, id_produk, SUM(jumlah) AS jml FROM pembelian WHERE id_users="'.$id_users.'"  AND id_supplier != 0 GROUP BY id_toko, id_produk) AS p1', 'p1.id_produk='.$id_produk.' AND p1.id_toko='.$id_toko.'', 'left');
            // join sum orders
            $db->join('(SELECT od.id_toko, od.id_produk, SUM(od.jumlah) AS jml FROM orders_detail od JOIN orders o ON od.id_orders_2=o.id_orders_2 AND od.id_toko=o.id_toko WHERE o.id_users="'.$id_users.'" GROUP BY od.id_toko, od.id_produk) AS o1', 'o1.id_produk='.$id_produk.' AND o1.id_toko='.$id_toko.'', 'left');
            // last penyesuaian
            // $db->join('(SELECT * FROM stok_so WHERE verifikasi=1 ORDER BY DATE(CONCAT(SUBSTRING(tgl_so,7,4),"-",SUBSTRING(tgl_so,4,2),"-",SUBSTRING(tgl_so,1,2))) DESC, id DESC) AS sso1', 'sso1.id_produk='.$id_produk.' AND sso1.id_users="'.$id_users.'" AND sso1.id_toko="'.$id_toko.'"', 'left');
            $db->join('(SELECT s.id_toko, s.id_users, s.id_produk, SUM(s.penyesuaian) AS penyesuaian FROM stok_so s WHERE s.verifikasi=1 GROUP BY s.id_toko, s.id_users, s.id_produk) sso1', 'sso1.id_produk='.$id_produk.'  AND sso1.id_users="'.$id_users.'" AND sso1.id_toko="'.$id_toko.'"', 'left');
            // retur jual
            $db->join('(SELECT r.id_produk, r.id_toko, SUM(r.jumlah) AS jml FROM retur_jual_detail r JOIN retur_jual rj ON r.id_retur=rj.id AND r.id_toko=rj.id_toko WHERE r.status=1 AND rj.id_users="'.$id_users.'" GROUP BY r.id_toko, r.id_produk) AS rjd', 'rjd.id_produk='.$id_produk.' AND rjd.id_toko="'.$id_toko.'"', 'left');
        } else {
            // join sum mutasi stok
            $db->join('(SELECT id_toko, id_produk, SUM(jumlah) AS jml_mutasi FROM mutasi_stok WHERE status=1 GROUP BY id_toko, id_produk) AS m1', 'm1.id_produk='.$id_produk.' AND m1.id_toko='.$id_toko.'', 'left');
            // join sum mutasi stok
            $db->join('(SELECT id_toko, id_produk, SUM(jumlah) AS jml_mutasi FROM mutasi_stok WHERE status=1 GROUP BY id_toko, id_produk) AS m2', 'm2.id_produk='.$id_produk.' AND m2.id_toko='.$id_toko.'', 'left');
            // join sum pembelian
            $db->join('(SELECT id_toko, id_produk, SUM(jumlah) AS jml FROM pembelian WHERE id_supplier != 0 GROUP BY id_toko, id_produk) AS p1', 'p1.id_produk='.$id_produk.' AND p1.id_toko='.$id_toko.'', 'left');
            // join sum orders
            $db->join('(SELECT od.id_toko, od.id_produk, SUM(od.jumlah) AS jml FROM orders_detail od JOIN orders o ON od.id_orders_2=o.id_orders_2 AND od.id_toko=o.id_toko GROUP BY od.id_toko, od.id_produk) AS o1', 'o1.id_produk='.$id_produk.' AND o1.id_toko='.$id_toko.'', 'left');
            // last penyesuaian
            // $db->join('(SELECT * FROM stok_so WHERE verifikasi=1 ORDER BY DATE(CONCAT(SUBSTRING(tgl_so,7,4),"-",SUBSTRING(tgl_so,4,2),"-",SUBSTRING(tgl_so,1,2))) DESC, id DESC) AS sso1', 'sso1.id_produk='.$id_produk.' AND sso1.id_toko="'.$id_toko.'"', 'left');
            
            /* $db->join('(SELECT s.id_toko, s.id_produk, SUM(s.penyesuaian) AS penyesuaian FROM (SELECT s1.* FROM stok_so s1
            INNER JOIN (
                SELECT MAX(DATE(CONCAT(SUBSTRING(tgl_so,7,4),"-",SUBSTRING(tgl_so,4,2),"-",SUBSTRING(tgl_so,1,2)))) tgls, id_toko, id_users, id_produk
                FROM stok_so
                WHERE verifikasi = 1
                GROUP BY id_toko, id_users, tgl_so, id_produk
            ) s2
            ON DATE(CONCAT(SUBSTRING(s1.tgl_so,7,4),"-",SUBSTRING(s1.tgl_so,4,2),"-",SUBSTRING(s1.tgl_so,1,2)))=s2.tgls
            AND s1.id_toko=s2.id_toko
            AND s1.id_users=s2.id_users
            AND s1.id_produk=s2.id_produk
            WHERE s1.verifikasi=1
            ORDER BY DATE(CONCAT(SUBSTRING(s1.tgl_so,7,4),"-",SUBSTRING(s1.tgl_so,4,2),"-",SUBSTRING(s1.tgl_so,1,2))) DESC) s
            GROUP BY id_toko, id_produk) sso1', 'sso1.id_produk='.$id_produk.' AND sso1.id_toko="'.$id_toko.'"', 'left'); */
            $db->join('(SELECT s.id_toko, s.id_produk, SUM(s.penyesuaian) AS penyesuaian FROM stok_so s WHERE verifikasi=1 GROUP BY s.id_toko, s.id_produk) sso1', 'sso1.id_produk='.$id_produk.' AND sso1.id_toko="'.$id_toko.'"', 'left');
            // retur jual
            $db->join('(SELECT id_produk, id_toko, SUM(jumlah) AS jml FROM retur_jual_detail WHERE status=1 GROUP BY id_toko, id_produk) AS rjd', 'rjd.id_produk='.$id_produk.' AND rjd.id_toko="'.$id_toko.'"', 'left');
        }
    }

    function json($id_toko)
    {
		$this->datatables->select('ms.id, ms.faktur, ms.*, SUM(ms.jumlah) AS jml, CONCAT(u1.first_name," ",u1.last_name) AS nama_asal, CONCAT(u2.first_name," ",u2.last_name) AS nama_tujuan');
		$this->datatables->from('mutasi_stok ms');
		$this->datatables->join('users u1', 'ms.user_asal=u1.id_users AND ms.id_toko=u1.id_toko');
		$this->datatables->join('users u2', 'ms.user_tujuan=u2.id_users AND ms.id_toko=u2.id_toko');
		$this->datatables->where('ms.id_toko', $id_toko);
		$this->datatables->group_by('ms.faktur');
		$this->datatables->add_column('action', anchor(site_url('mutasi_stok/read/$1'),'<button type="button" class="btn btn-xs btn-success"><i class="ace-icon fa fa-print bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;", 'faktur');
		$this->datatables->add_column('action_edit', anchor(site_url('mutasi_stok/update/$1'),'<button type="button" class="btn btn-xs btn-info"><i class="ace-icon fa fa-pencil bigger-120"></i></button>')."&nbsp;&nbsp;&nbsp;&nbsp;", 'faktur');
		$this->datatables->add_column('action_verifikasi', anchor(site_url('mutasi_stok/verifikasi/$1'),'<button type="button" class="btn btn-xs btn-info"><i class="ace-icon fa fa-check bigger-120"></i></button>', 'onclick="javascript: return confirm(\'Stok sudah diterima cabang tujuan ?\')"')."&nbsp;&nbsp;&nbsp;&nbsp;", 'faktur');
		$this->datatables->add_column('action_delete', anchor(site_url('mutasi_stok/delete/$1'),'<button type="button" class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash bigger-120"></i></button>','onclick="javascript: return confirm(\'Are You Sure ?\')"'), 'faktur');
		return $this->datatables->generate();
    }

    function get_by_faktur($id_toko, $faktur)
    {
        $this->db->select('ms.*, pr.nama_produk');
        $this->db->from('mutasi_stok ms');
        $this->db->join('produk_retail pr', 'ms.id_produk=pr.id_produk_2 AND ms.id_toko=pr.id_toko', 'left');
        $this->db->where('ms.id_toko', $id_toko);
        $this->db->where('ms.faktur', $faktur);
        return $this->db->get();
    }

}
