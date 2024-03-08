<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Printer_retail extends AI_Admin {

	public function __construct()
	{
		parent::__construct();
        $this->libraries('escpos');
        $this->models('Printer_model');
	}

	public function index()
	{
		$sistem_operasi = array(
			'Windows',
			'Linux',
		);
        $row = $this->Printer_model->get_by_server($this->userdata->id_toko);
        if ($row) {
            $print_er = $row->printer;
        } else {
            $print_er = $this->Printer_model->default_printer;
        }
		$sistem_operasi_default = $this->Printer_model->linux();
        $row_fn = $this->db->select('*')
                           ->from('format_nota')
                           ->where('id_toko', $this->userdata->id_toko)
                           ->where('id_users', $this->userdata->id_users)
                           ->get()->row();
        $format_nota = 'kecil';
        if ($row_fn) {
            $format_nota = $row_fn->format;
        }
		$data = array(
            'active_printer' => 'active',
			'action' => site_url('admin/printer_retail/create_action'),
			'sistem_operasi' => $sistem_operasi,
			'default' => $sistem_operasi_default,
			'printer' => $print_er,
			'data_client_server' => $this->Printer_model->get_by_id_toko($this->userdata->id_toko),
            'opsi_printer' => $this->M_opsi->get_opsi_printer($this->userdata->id_toko, $this->userdata->id_users)->opsi,
            'format_nota'=> $format_nota
		);
        $this->view('printer/set_printer', $data);
	}

	public function create_action()
	{
		$this->form_validation->set_rules('port_printer', 'port printer', 'trim|required');
        if ($this->form_validation->run() == TRUE) {
        	$data = array(
        		'printer' => $this->input->post('port_printer'),
        	);
        	$row = $this->Printer_model->get_by_server($this->userdata->id_toko);
        	$this->Printer_model->update($row->id, $data);
            $this->session->set_flashdata('message', 'Save done');
            redirect(site_url('admin/printer_retail'));
            echo $row->id;
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/printer_retail'));
        }
	}

	public function print_test($printer = null)
	{
        $printer = $this->input->post('printer');
        try {

            //windows $connector = new Escpos\PrintConnectors\WindowsPrintConnector("POS-58");
            $connector = new Escpos\PrintConnectors\FilePrintConnector($printer);
            //$printer = database
            //$connector = new Escpos\PrintConnectors\".$printer.";
            $printer = new Escpos\Printer($connector);
            
            /* header */ 
            //$printer->selectPrintMode(Escpos\Printer::MODE_EMPHASIZED);
            $printer->setJustification(Escpos\Printer::JUSTIFY_CENTER);
            
            /*
            Epson TM-T88III (graphics() yes, bitimage() yes, character test works too)
            Okipos (Winbond/Nuvotron chip):
            Okipos 80 Plus III (parallel interface, (graphics() no, bitimage() no, character test works too))
            Zijiang (Chinese company, Winbond/Nuvotron used)
            ZJ-5890T (USB interface , graphics() no, bitimage () yes)
            ZJ-5870 (USB interface , graphics() no, bitimage () yes)
            NT-58H (USB interface , graphics() no, bitimage () yes)
            Xprinter (another Chinese company, higher quality than ZiJiang) (testing these in next couple days)
            XP-T58K
            XP-58III
            XP-58IIIA
            XP-58IIIK
            XP-Q800 (80mm auto cutter) all functions apart from graphics works
            XP-76IIN (label printer, 58mm)
            */
            //$printer->graphics($tux);

            $printer->setEmphasis(false);
            $printer->text("TEST PRINT");
            $printer->feed(4);

            /* footer */
            /* Close printer */
            $printer->cut();
            $printer->pulse();
            //$printer->close();

        } catch(Exception $e) {
            echo "Couldn't print to this printer: " . $e->getMessage() . "\n";
        }
	}
    
    public function change_print(){
        $opsi = $this->input->post('opsi');
        $data = array('opsi'=>$opsi);
        $this->db->where('id_toko', $this->userdata->id_toko);
        $this->db->where('id_user', $this->userdata->id_users);
        $this->db->update('printer_mode', $data);
    }
    
    public function change_format_nota(){
        $format = $this->input->post('format', true);
        $data = array(
            'id_toko' => $this->userdata->id_toko,
            'id_users' => $this->userdata->id_users,
            'format' => $format
        );
        $row = $this->db->select('*')
                        ->from('format_nota')
                        ->where('id_toko', $this->userdata->id_toko)
                        ->where('id_users', $this->userdata->id_users)
                        ->get()->row();
        if ($row) {
            $this->db->where('id', $row->id);
            $this->db->update('format_nota', $data);
        } else {
            $this->db->insert('format_nota', $data);
        }
    }

}

/* End of file Printer_retail.php */
/* Location: ./application/controllers/Printer_retail.php */