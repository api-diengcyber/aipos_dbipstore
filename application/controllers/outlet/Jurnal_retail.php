<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jurnal_retail extends AI_Admin {

	public function __construct()
	{
		parent::__construct();
        $this->models('Jurnal_retail_model, Pil_jurnal_model, Akun_retail_model, Pengaturan_jurnal_model, Member_retail_model, Supplier_retail_model, Penjualan_retail_model, Piutang_retail_model, Hutang_retail_model, Pembelian_retail_model');
	}

	public function umum_create()
	{
        $row = $this->Pil_jurnal_model->get_by_kode("RT-JU");
        if($row){
            $kode_baru = $this->Jurnal_retail_model->get_kode_baru($this->userdata->id_toko, $row->kode);
            $data_akun_debet = "";
            $data_akun_kredit = "";
            $res = $this->Pengaturan_jurnal_model->get_by_id_pil_jurnal($this->userdata->id_toko, $row->id);
            foreach ($res as $key) {
                $res_akun = $this->Akun_retail_model->get_by_sub_kode($this->userdata->id_toko, $key->kode);
                foreach ($res_akun as $key2) {
                    if($key->debet == '1'){
                        $data_akun_debet .= "<option value='".$key2->id."'>".$key2->kode." --- ".$key2->akun."</option>";
                    }
                    if($key->kredit == '1'){
                        $data_akun_kredit .= "<option value='".$key2->id."'>".$key2->kode." --- ".$key2->akun."</option>";
                    }
                }
            }
            $data = array(
                'active_jurnal' => 'active',
                'action' => site_url('admin/jurnal_retail/umum_create_action'),
                'id_toko' => $this->userdata->id_toko,
                'tgl' => date('d-m-Y'),
                'kode' => $kode_baru,
                'faktur' => set_value('faktur'),
                'keterangan' => set_value('keterangan'),
                'nominal' => set_value('nominal'),
                'data_akun_debet' => $data_akun_debet,
                'data_akun_kredit' => $data_akun_kredit,
            );
            $this->view('jurnal/umum/umum_form', $data);
        }
	}

    public function umum_create_action()
    {
        // rules //
        $this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
        $this->form_validation->set_rules('nominal', 'nominal', 'trim|numeric');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        // rules //
        if ($this->form_validation->run() == FALSE) {
            $this->umum_create();
        } else {
            $id_toko = $this->input->post('id_toko');
            $tgl = $this->input->post('tgl');
            $kode = $this->input->post('kode');
            $akun_debet = $this->input->post('debet');
            $akun_kredit = $this->input->post('kredit');
            $faktur = $this->input->post('faktur');
            $keterangan = $this->input->post('keterangan');
            $nominal = $this->input->post('nominal');

            // debet //
            for ($i=0; $i < count($akun_debet); $i++) {
                if(!empty($akun_debet[$i])){
                    $data_debet = array(
                        'id_toko' => $id_toko,
                        'kode' => $kode,
                        'tgl' => $tgl,
                        'id_akun' => $akun_debet[$i],
                        'no_faktur' => $faktur,
                        'keterangan' => $keterangan,
                        'debet' => str_replace(".", "", $nominal[$i]),
                    );

                    $this->Jurnal_retail_model->insert($data_debet);
                }
            }
            // debet //

            // kredit //
            for ($i=0; $i < count($akun_kredit); $i++) {
                if(!empty($akun_kredit[$i])){
                    $data_kredit = array(
                        'id_toko' => $id_toko,
                        'kode' => $kode,
                        'tgl' => $tgl,
                        'id_akun' => $akun_kredit[$i],
                        'no_faktur' => $faktur,
                        'keterangan' => $keterangan,
                        'kredit' => str_replace(".", "", $nominal[$i]),
                    );

                    $this->Jurnal_retail_model->insert($data_kredit);
                }
            }
            // kredit //

            redirect(site_url('admin/jurnal_retail/umum_create'));
        }
    }

	public function penerimaan_kas_create()
	{
        $row = $this->Pil_jurnal_model->get_by_kode("RT-JKM");
        if($row){
            $kode_baru = $this->Jurnal_retail_model->get_kode_baru($this->userdata->id_toko, $row->kode);
            $data_akun_debet = "";
            $data_akun_kredit = "";
            $res = $this->Pengaturan_jurnal_model->get_by_id_pil_jurnal($this->userdata->id_toko, $row->id);
            foreach ($res as $key) {
                $res_akun = $this->Akun_retail_model->get_by_sub_kode($this->userdata->id_toko, $key->kode);
                foreach ($res_akun as $key2) {
                    if($key->debet == '1'){
                        $data_akun_debet .= "<option value='".$key2->id."'>".$key2->kode." --- ".$key2->akun."</option>";
                    }
                    if($key->kredit == '1'){
                        $data_akun_kredit .= "<option value='".$key2->id."'>".$key2->kode." --- ".$key2->akun."</option>";
                    }
                }
            }
            $data = array(
                'active_jurnal' => 'active',
                'action' => site_url('admin/jurnal_retail/penerimaan_kas_create_action'),
                'id_toko' => $this->userdata->id_toko,
                'tgl' => date('d-m-Y'),
                'kode' => $kode_baru,
                'faktur' => set_value('faktur'),
                'keterangan' => set_value('keterangan'),
                'nominal' => set_value('nominal'),
                'data_akun_debet' => $data_akun_debet,
                'data_akun_kredit' => $data_akun_kredit,
            );
            $this->view('jurnal/penerimaan_kas/penerimaan_kas_form', $data);
        }
	}

    public function penerimaan_kas_create_action()
    {
        // rules //
        $this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
        $this->form_validation->set_rules('nominal', 'nominal', 'trim|numeric');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        // rules //
        if ($this->form_validation->run() == FALSE) {
            $this->umum_create();
        } else {
            $id_toko = $this->input->post('id_toko');
            $tgl = $this->input->post('tgl');
            $kode = $this->input->post('kode');
            $akun_debet = $this->input->post('debet');
            $akun_kredit = $this->input->post('kredit');
            $faktur = $this->input->post('faktur');
            $keterangan = $this->input->post('keterangan');
            $nominal = $this->input->post('nominal');

            // debet //
            for ($i=0; $i < count($akun_debet); $i++) {
                if(!empty($akun_debet[$i])){
                    $data_debet = array(
                        'id_toko' => $id_toko,
                        'kode' => $kode,
                        'tgl' => $tgl,
                        'id_akun' => $akun_debet[$i],
                        'no_faktur' => $faktur,
                        'keterangan' => $keterangan,
                        'debet' => str_replace(".", "", $nominal[$i]),
                    );

                    $this->Jurnal_retail_model->insert($data_debet);
                }
            }
            // debet //

            // kredit //
            for ($i=0; $i < count($akun_kredit); $i++) {
                if(!empty($akun_kredit[$i])){
                    $data_kredit = array(
                        'id_toko' => $id_toko,
                        'kode' => $kode,
                        'tgl' => $tgl,
                        'id_akun' => $akun_kredit[$i],
                        'no_faktur' => $faktur,
                        'keterangan' => $keterangan,
                        'kredit' => str_replace(".", "", $nominal[$i]),
                    );

                    $this->Jurnal_retail_model->insert($data_kredit);
                }
            }
            // kredit //

            redirect(site_url('admin/jurnal_retail/penerimaan_kas_create'));
        }
    }

	public function pengeluaran_kas_create()
	{
        $row = $this->Pil_jurnal_model->get_by_kode("RT-JKK");
        if($row){
            $kode_baru = $this->Jurnal_retail_model->get_kode_baru($this->userdata->id_toko, $row->kode);
            $data_akun_debet = "";
            $data_akun_kredit = "";
            $res = $this->Pengaturan_jurnal_model->get_by_id_pil_jurnal($this->userdata->id_toko, $row->id);
            foreach ($res as $key) {
                $res_akun = $this->Akun_retail_model->get_by_sub_kode($this->userdata->id_toko, $key->kode);
                foreach ($res_akun as $key2) {
                    if($key->debet == '1'){
                        $data_akun_debet .= "<option value='".$key2->id."'>".$key2->kode." --- ".$key2->akun."</option>";
                    }
                    if($key->kredit == '1'){
                        $data_akun_kredit .= "<option value='".$key2->id."'>".$key2->kode." --- ".$key2->akun."</option>";
                    }
                }
            }
            $data = array(
                'active_jurnal' => 'active',
                'action' => site_url('admin/jurnal_retail/pengeluaran_kas_create_action'),
                'id_toko' => $this->userdata->id_toko,
                'tgl' => date('d-m-Y'),
                'kode' => $kode_baru,
                'faktur' => set_value('faktur'),
                'keterangan' => set_value('keterangan'),
                'nominal' => set_value('nominal'),
                'data_akun_debet' => $data_akun_debet,
                'data_akun_kredit' => $data_akun_kredit,
            );
            $this->view('jurnal/pengeluaran_kas/pengeluaran_kas_form', $data);
        }
	}

    public function pengeluaran_kas_create_action()
    {
        // rules //
        $this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
        $this->form_validation->set_rules('nominal', 'nominal', 'trim|numeric');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        // rules //
        if ($this->form_validation->run() == FALSE) {
            $this->umum_create();
        } else {
            $id_toko = $this->input->post('id_toko');
            $tgl = $this->input->post('tgl');
            $kode = $this->input->post('kode');
            $akun_debet = $this->input->post('debet');
            $akun_kredit = $this->input->post('kredit');
            $faktur = $this->input->post('faktur');
            $keterangan = $this->input->post('keterangan');
            $nominal = $this->input->post('nominal');

            // debet //
            for ($i=0; $i < count($akun_debet); $i++) {
                if(!empty($akun_debet[$i])){
                    $data_debet = array(
                        'id_toko' => $id_toko,
                        'kode' => $kode,
                        'tgl' => $tgl,
                        'id_akun' => $akun_debet[$i],
                        'no_faktur' => $faktur,
                        'keterangan' => $keterangan,
                        'debet' => str_replace(".", "", $nominal[$i]),
                    );

                    $this->Jurnal_retail_model->insert($data_debet);
                }
            }
            // debet //

            // kredit //
            for ($i=0; $i < count($akun_kredit); $i++) {
                if(!empty($akun_kredit[$i])){
                    $data_kredit = array(
                        'id_toko' => $id_toko,
                        'kode' => $kode,
                        'tgl' => $tgl,
                        'id_akun' => $akun_kredit[$i],
                        'no_faktur' => $faktur,
                        'keterangan' => $keterangan,
                        'kredit' => str_replace(".", "", $nominal[$i]),
                    );

                    $this->Jurnal_retail_model->insert($data_kredit);
                }
            }
            // kredit //

            redirect(site_url('admin/jurnal_retail/pengeluaran_kas_create'));
        }
    }

    public function saldo_piutang()
    {
        $id_pembeli = $this->input->post('id_pembeli');
        $row = $this->Piutang_retail_model->get_saldo_piutang($id_pembeli);
        if($row){
            $data = array(
                'saldo_piutang' => $row->saldo_piutang,
            );
        } else {
            $data = array(
                'saldo_piutang' => '0',
            );
        }
        echo json_encode($data);
    }

	public function bayar_piutang_create($id_piutang = NULL)
	{
        $row = $this->Pil_jurnal_model->get_by_kode("RT-JBP");
        if($row){
            $kode_baru = $this->Jurnal_retail_model->get_kode_baru($this->userdata->id_toko, $row->kode);
            $data_akun_debet = "";
            $data_akun_kredit = "";
            $res = $this->Pengaturan_jurnal_model->get_by_id_pil_jurnal($this->userdata->id_toko, $row->id);
            foreach ($res as $key) {
                $res_akun = $this->Akun_retail_model->get_by_sub_kode($this->userdata->id_toko, $key->kode);
                foreach ($res_akun as $key2) {
                    if($key->debet == '1'){
                        $data_akun_debet .= "<option value='".$key2->id."'>".$key2->kode." --- ".$key2->akun."</option>";
                    }
                    if($key->kredit == '1'){
                        $data_akun_kredit .= "<option value='".$key2->id."'>".$key2->kode." --- ".$key2->akun."</option>";
                    }
                }
            }

            $row_piutang = $this->Piutang_retail_model->get_by_id_and_toko($id_piutang, $this->userdata->id_toko);
            if($row_piutang){
                $data_piutang = array(
                    'id_piutang' => $row_piutang->id,
                    'id_pembeli' => $row_piutang->id_pembeli,
                );
                $saldo_piutang = $row_piutang->sisa;
            } else {
                $saldo_piutang = set_value('saldo_piutang');
            }

            $data = array(
                'active_jurnal' => 'active',
                'action' => site_url('admin/jurnal_retail/bayar_piutang_create_action'),
                'id_toko' => $this->userdata->id_toko,
                'tgl' => date('d-m-Y'),
                'kode' => $kode_baru,
                'pembeli' => set_value('pembeli'),
                'saldo_piutang' => $saldo_piutang,
                'faktur' => set_value('faktur'),
                'keterangan' => set_value('keterangan'),
                'nominal' => set_value('nominal'),
                'data_akun_debet' => $data_akun_debet,
                'data_akun_kredit' => $data_akun_kredit,
                'data_pembeli' => $this->Member_retail_model->get_by_id_toko($this->userdata->id_toko),
            );

            if($row_piutang){
                $data['data_piutang'] = $data_piutang;
            }
            $this->view('jurnal/piutang/piutang_form', $data);
        }
	}

    public function bayar_piutang_create_action()
    {
        // rules //
        $this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
        $this->form_validation->set_rules('nominal', 'nominal', 'trim|numeric');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        // rules //
        if ($this->form_validation->run() == FALSE) {
            $this->umum_create();
        } else {

            $id_piutang = $this->input->post('id_piutang');
            $id_toko = $this->input->post('id_toko');
            $tgl = $this->input->post('tgl');
            $kode = $this->input->post('kode');
            $akun_debet = $this->input->post('debet');
            $akun_kredit = $this->input->post('kredit');
            $faktur = $this->input->post('faktur');
            $pembeli = $this->input->post('pembeli');
            $keterangan = $this->input->post('keterangan');
            $nominal = str_replace(".","",$this->input->post('nominal'));

            $row_piutang = $this->Piutang_retail_model->get_by_id($id_piutang);
            if($row_piutang){
                // jika ada id piutang //
                $res_pembeli = $this->Piutang_retail_model->get_by_pembeli($pembeli);
                if($res_pembeli) {
                    // debet //
                    if(!empty($akun_debet)){
                        $data_debet = array(
                            'id_toko' => $id_toko,
                            'kode' => $kode,
                            'tgl' => $tgl,
                            'id_akun' => $akun_debet,
                            'no_faktur' => $faktur,
                            'keterangan' => $keterangan,
                            'debet' => $nominal,
                        );
                        $this->Jurnal_retail_model->insert($data_debet);
                    }
                    // debet //
                    // kredit //
                    if(!empty($akun_kredit)){
                        $data_kredit = array(
                            'id_toko' => $id_toko,
                            'kode' => $kode,
                            'tgl' => $tgl,
                            'id_akun' => $akun_kredit,
                            'no_faktur' => $faktur,
                            'keterangan' => $keterangan,
                            'kredit' => $nominal,
                        );
                        $this->Jurnal_retail_model->insert($data_kredit);
                    }
                    $data = array(
                        'jumlah_bayar' => $key->jumlah_bayar+$nominal,
                        'sisa' => $key->sisa-$nominal,
                    );
                    $this->Piutang_retail_model->update($key->id, $data);
                    
                    $this->session->set_flashdata('message', 'Create Record Success');
                    redirect(site_url('admin/jurnal_retail/bayar_piutang_create'));
                    
                } else {
                    
                    $this->session->set_flashdata('message', 'Empty Data');
                    redirect(site_url('admin/jurnal_retail/bayar_piutang_create'));
                }
            } else {
                // jika otomatis //
                $res_pembeli = $this->Piutang_retail_model->get_by_pembeli($pembeli);
                if($res_pembeli) {
                    // debet //
                    if(!empty($akun_debet)){
                        $data_debet = array(
                            'id_toko' => $id_toko,
                            'kode' => $kode,
                            'tgl' => $tgl,
                            'id_akun' => $akun_debet,
                            'no_faktur' => $faktur,
                            'keterangan' => $keterangan,
                            'debet' => $nominal,
                        );
                        $this->Jurnal_retail_model->insert($data_debet);
                    }
                    // debet //
                    // kredit //
                    if(!empty($akun_kredit)){
                        $data_kredit = array(
                            'id_toko' => $id_toko,
                            'kode' => $kode,
                            'tgl' => $tgl,
                            'id_akun' => $akun_kredit,
                            'no_faktur' => $faktur,
                            'keterangan' => $keterangan,
                            'kredit' => $nominal,
                        );
                        $this->Jurnal_retail_model->insert($data_kredit);
                    }
                    $nom = $nominal;
                    foreach ($res_pembeli as $key) {
                        $sisa = $nom - $key->sisa;
                        if($sisa > -1){
                            // jika sisa masih ada > digunakan untuk piutang lainnya
                            $data = array(
                                'jumlah_bayar' => $key->jumlah_bayar+$key->sisa,
                                'sisa' => $key->sisa-$key->sisa,
                            );
                        } else {
                            // sisa kurang dari piutang sekarang
                            $data = array(
                                'jumlah_bayar' => $key->jumlah_bayar+$nom,
                                'sisa' => $key->sisa-$nom,
                            );
                        }
                        $nom = $nom - $key->sisa;
                        $this->Piutang_retail_model->update($key->id, $data);
                    }
                    
                    $this->session->set_flashdata('message', 'Create Record Success');
                    redirect(site_url('admin/jurnal_retail/bayar_piutang_create'));
                    
                } else {
                    
                    $this->session->set_flashdata('message', 'Empty Data');
                    redirect(site_url('admin/jurnal_retail/bayar_piutang_create'));
                }
            }
        }
    }

    public function saldo_hutang()
    {
        $id_supplier = $this->input->post('id_supplier');
        $row = $this->Hutang_retail_model->get_saldo_hutang($id_supplier);
        if($row){
            $data = array(
                'saldo_hutang' => $row->saldo_hutang,
            );
        } else {
            $data = array(
                'saldo_hutang' => '0',
            );
        }
        echo json_encode($data);
    }

	public function bayar_hutang_create($id_hutang = NULL)
	{
        $row = $this->Pil_jurnal_model->get_by_kode("RT-JBH");
        if($row){
			$row_hutang = $this->db->select("h.*, fr.no_faktur, fr.dp")
						  ->from("hutang h")
						  ->join("faktur_retail fr", "h.id_faktur=fr.id_faktur AND h.id_toko=fr.id_toko")
						  ->where("h.id_toko", $this->userdata->id_toko)
						  ->where("h.id", $id_hutang)
						  ->get()->row();
            $kode_baru = $this->Jurnal_retail_model->get_kode_baru($this->userdata->id_toko, $row->kode);
            $data_akun_debet = "";
            $data_akun_kredit = "";
            // $res = $this->Pengaturan_jurnal_model->get_by_id_pil_jurnal($this->userdata->id_toko, $row->id);
            // foreach ($res as $key) {
            //     $res_akun = $this->Akun_retail_model->get_by_sub_kode($this->userdata->id_toko, $key->kode);
            //     foreach ($res_akun as $key2) {
            //         if($key->debet == '1'){
            //             $data_akun_debet .= "<option value='".$key2->id."'>".$key2->kode." --- ".$key2->akun."</option>";
            //         }
            //         if($key->kredit == '1'){
            //             $data_akun_kredit .= "<option value='".$key2->id."'>".$key2->kode." --- ".$key2->akun."</option>";
            //         }
            //     }
            // }
            $res_akun = $this->db->where('SUBSTRING(kode, 1, 7)=', '1.01.03')->order_by('kode', 'asc')->get('akun')->result();
            foreach ($res_akun as $key) {
                $data_akun_kredit .= "<option value='".$key->kode."'>".$key->kode." --- ".$key->akun."</option>";
            }
            $data = array(
                'active_hutang' => 'active',
                'action' => site_url('admin/jurnal_retail/bayar_hutang_create_action'),
                'id_toko' => $this->userdata->id_toko,
                'tgl' => date('d-m-Y'),
                'kode' => $kode_baru,
                'faktur' => set_value('faktur'),
                'saldo_hutang' => set_value('saldo_hutang'),
                'keterangan' => set_value('keterangan'),
                'nominal' => set_value('nominal'),
                'data_akun_debet' => $data_akun_debet,
                'data_akun_kredit' => $data_akun_kredit,
                'data_supplier' => $this->Supplier_retail_model->get_by_id_toko($this->userdata->id_toko),
                'id_hutang' => $id_hutang,
                'data_hutang' => $row_hutang
            );
            $this->view('jurnal/hutang/hutang_form', $data);
        }
	}

    public function bayar_hutang_create_action()
    {
        // rules //
        $this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
        $this->form_validation->set_rules('nominal', 'nominal', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        // rules //
        if ($this->form_validation->run() == FALSE) {
            $this->bayar_hutang_create($this->input->post('id'));
        } else {
            $id_toko = $this->userdata->id_toko;
			$id = $this->input->post('id', true);
            $tgl = $this->input->post('tgl', true);
            $kode = $this->input->post('kode', true);
            $akun_kredit = $this->input->post('kredit', true);
            $faktur = $this->input->post('faktur', true);
            $keterangan = $this->input->post('keterangan', true);
            $nominal = str_replace(".", "", $this->input->post('nominal', true));
			$row_hutang = $this->db->select("h.*")
								   ->from("hutang h")
                                   ->join("supplier s", "h.id_supplier=s.id_supplier AND h.id_toko=s.id_toko")
								   ->where("h.id_toko", $this->userdata->id_toko)
								   ->where("h.id", $id)
								   ->get()->row();
			if ($row_hutang) {
                if ($nominal > $row_hutang->kurang) {
                    $nominal = $row_hutang->kurang;
                }
                $id_supplier = $row_hutang->id_supplier;
                $sisa_hutang = $row_hutang->kurang-$nominal;
                $data = array(
                    'bayar' => $row_hutang->bayar+$nominal,
                    'kurang' => $sisa_hutang,
                );
                $this->Hutang_retail_model->update($row_hutang->id, $data);
                $data_insert = array(
                    'id_toko' => $id_toko,
                    'id_hutang' => $id,
                    'tgl_bayar' => $tgl,
                    'bayar' => $nominal,
                    'sisa' => $sisa_hutang,
                    'ket' => $keterangan,
                );
                $this->db->insert('hutang_bayar', $data_insert);
                eval($this->Pengaturan_transaksi_model->accounting('hutang'));
                $this->session->set_flashdata('message', 'Create Record Success');
			} else {
				$this->session->set_flashdata('message', 'Empty Data');
			}
			redirect(site_url('admin/hutang_retail/read/'.$id));
        }
    }

	public function pengaturan()
	{
        $data = array(
            'active_pengaturan_jurnal' => 'active',
            'id_toko' => $this->userdata->id_toko,
            'pil_jurnal' => $this->Pil_jurnal_model->get_by_retail(),
            'akun' => $this->Akun_retail_model->get_by_id_toko($this->userdata->id_toko),
        );
        $this->view('jurnal/pengaturan', $data);
	}

    public function generate_kode()
    {
        header('Content-Type: application/json');
        $text = $this->input->post('text', true);
        $data = array(
            'status' => 'ok',
            'kode' => $this->Pengaturan_transaksi_model->generate_kode($text),
        );
        echo json_encode($data);
    }

    public function buat_jurnal()
    {
        $no_jurnal = $this->Pengaturan_transaksi_model->generate_kode("J");
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'nama_toko' => $this->userdata->nama_toko,
            'nama_user' => $this->userdata->email,
            'active_buat_jurnal' => 'active',
            'id_modul' => $this->userdata->id_modul,
            'nama_modul' => $this->userdata->nama_modul,
            'action' => site_url('admin/jurnal_retail/buat_jurnal_action'),
            'id' => set_value('id'),
            'no_jurnal' => set_value('no_jurnal', $no_jurnal),
            'id_pil_transaksi' => set_value('id_pil_transaksi'),
            'nominal' => set_value('nominal'),
            'keterangan' => set_value('keterangan'),
            'tgl' => set_value('tgl', date('d-m-Y')),
            'data_pil_transaksi' => $this->db->where('id_toko', $this->userdata->id_toko)->order_by('kode_transaksi', 'asc')->get('pil_transaksi')->result()
        );
        $this->view('jurnal/buat_jurnal', $data);
    }

    public function buat_jurnal_action()
    {
        $this->_rules_buat_jurnal();
        if ($this->form_validation->run() == FALSE) {
            $this->buat_jurnal();
        } else {
            $tgl = $this->input->post('tgl', true);
            $no_jurnal = $this->input->post('no_jurnal', true);
            $id_pil_transaksi = $this->input->post('id_pil_transaksi', true);
            $nominal = $this->input->post('nominal', true);
            $keterangan = $this->input->post('keterangan', true);
            $row_pil_transaksi = $this->db->where('id_toko', $this->userdata->id_toko)->where('id', $id_pil_transaksi)->get('pil_transaksi')->row();
            if ($row_pil_transaksi) {
                // insert debet //
                $data_insert_debet = array(
                    'id_toko' => $this->userdata->id_toko,
                    'id_users' => $this->userdata->id_users,
                    'kode' => $no_jurnal,
                    'tgl' => $tgl,
                    'id_akun' => $row_pil_transaksi->id_debet,
                    'id_transaksi' => $id_pil_transaksi,
                    'keterangan' => $row_pil_transaksi->nama_transaksi.' ('.$keterangan.')',
                    'debet' => str_replace('.','',$nominal)
                );
                $this->db->insert('jurnal', $data_insert_debet);
                // insert kredit //
                $data_insert_kredit = array(
                    'id_toko' => $this->userdata->id_toko,
                    'id_users' => $this->userdata->id_users,
                    'kode' => $no_jurnal, 
                    'tgl' => $tgl,
                    'id_akun' => $row_pil_transaksi->id_kredit,
                    'id_transaksi' => $id_pil_transaksi,
                    'keterangan' => $row_pil_transaksi->nama_transaksi.' ('.$keterangan.')',
                    'kredit' => str_replace('.','',$nominal)
                );
                $this->db->insert('jurnal', $data_insert_kredit);
                $this->session->set_flashdata('message', 'Insert Record Success');
                redirect(site_url('admin/jurnal_retail/buat_jurnal'));
            } else {
                $this->session->set_flashdata('message', 'Insert Record Failed');
                redirect(site_url('admin/jurnal_retail/buat_jurnal'));
            }
        }
    }

    private function _rules_buat_jurnal()
    {
        $this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
        $this->form_validation->set_rules('no_jurnal', 'no_jurnal', 'trim|required');
        $this->form_validation->set_rules('id_pil_transaksi', 'id_pil_transaksi', 'trim|required');
        $this->form_validation->set_rules('nominal', 'nominal', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    
}

/* End of file Jurnal_retail.php */
/* Location: ./application/controllers/Jurnal_retail.php */