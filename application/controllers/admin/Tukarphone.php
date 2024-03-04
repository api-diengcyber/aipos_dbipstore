<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tukarphone extends AI_Admin
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(
            'active_tukar_phone' => 'active',
        );
        $this->view('tukar_phone/tukar_phone_list', $data);
    }

    public function create()
    {
        $data = array(
            'active_tukar_phone' => 'active',
        );
        $this->view('tukar_phone/tukar_phone_form', $data);
    }
}
