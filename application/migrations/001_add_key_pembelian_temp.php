<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_key_pembelian_temp extends CI_Migration {

    protected $table = 'pembelian_temp';

    public function up()
    {
        // key
        $this->db->query('ALTER TABLE `'.$this->table.'` ADD INDEX (`id_users`)');
        $this->db->query('ALTER TABLE `'.$this->table.'` ADD INDEX (`id_toko`)');
        $this->db->query('ALTER TABLE `'.$this->table.'` ADD INDEX (`id_produk`)');
    }

    public function down()
    {
        $this->db->query('ALTER TABLE `'.$this->table.'` DROP INDEX (`id_users`)');
        $this->db->query('ALTER TABLE `'.$this->table.'` DROP INDEX (`id_toko`)');
        $this->db->query('ALTER TABLE `'.$this->table.'` DROP INDEX (`id_produk`)');
    }

}