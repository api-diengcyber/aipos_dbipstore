<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_column_orders extends CI_Migration {

    protected $table = 'orders';

    public function up()
    {
        $fields = array(
            'p_nama' => array(
                'type' => 'VARCHAR(100)',
            ),
            'p_alamat' => array(
                'type' => 'VARCHAR(255)',
            ),
            'p_hp' => array(
                'type' => 'VARCHAR(30)',
            ),
        );
        $this->dbforge->add_column('orders', $fields);
    }

    public function down()
    {
        $this->dbforge->drop_column('orders', 'p_nama');
        $this->dbforge->drop_column('orders', 'p_alamat');
        $this->dbforge->drop_column('orders', 'p_hp');
    }

}