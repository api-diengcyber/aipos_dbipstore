<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel extends AI_Admin {

  public function __construct()
	{
		parent::__construct();
  }

	public function index()
	{
    $dari = $this->input->post('dari', true);
    $sampai = $this->input->post('sampai', true);
    $data = array(
      'active_unduh_excel' => 'active',
      'dari'=>!empty($dari)?$dari:date('01-m-Y'),
      'sampai'=>!empty($sampai)?$sampai:date('d-m-Y'),
    );
    $this->view('excel/excel_list', $data);
  }

  public function export_action()
  {
    $this->load->helper('exportexcel');
    $namaFile = "EXCEL_".date('Y-m-d_His').".xls";
    $judul = "EXCEL ".date('Y-m-d_His')."";
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate,post-check=0,pre-check=0");
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");
    header("Content-Disposition: attachment; filename=" . $namaFile . "");
    header("Content-Transfer-Encoding: binary ");

    // query //
    $dari = $this->input->post('dari', true);
    $sampai = $this->input->post('sampai', true);
    $status = $this->input->post('status', true);
    $exdari = explode("-", $dari);
    $sdari = $exdari[2]."-".$exdari[1]."-".$exdari[0];
    $exsampai = explode("-", $sampai);
    $ssampai = $exsampai[2]."-".$exsampai[1]."-".$exsampai[0];

    $where = 'LEFT(lo.tanggal,10) BETWEEN "'.$sdari.'" AND "'.$ssampai.'"';
    if ($status == "1") { // bersih
      // $where .= ' AND lo.no_resi IS NULL OR lo.no_resi=0 AND '.$where;
      $where .= ' AND lo.status=3 AND lo.no_resi IS NULL OR lo.status=3 AND LENGTH(lo.no_resi)=0 AND '.$where;
    } else if ($status == "2") { // belum bersih
      // $where .= ' AND lo.status=3 AND lo.no_resi IS NOT NULL OR lo.status=3 AND (lo.no_resi*1)>0 AND '.$where;
      $where .= ' AND lo.status=3 AND LENGTH(lo.no_resi)>0 AND '.$where;
    }

    $res = $this->db->select('lo.*, e.nama_expedisi')
                    ->from('laporan_order lo')
                    ->join('expedisi e', 'lo.id_expedisi=e.id', 'left')
                    ->where($where)
                    ->get()->result();

    xlsBOF();
    $tablehead = 0;
    $kolomhead = 0;
    xlsWriteLabel($tablehead, $kolomhead++, "NO");
    xlsWriteLabel($tablehead, $kolomhead++, "INVOICE");
    xlsWriteLabel($tablehead, $kolomhead++, "ID ORDER");
    xlsWriteLabel($tablehead, $kolomhead++, "TANGGAL");
    xlsWriteLabel($tablehead, $kolomhead++, "NAMA");
    xlsWriteLabel($tablehead, $kolomhead++, "EKSPEDISI");
    xlsWriteLabel($tablehead, $kolomhead++, "NO RESI");

    $tablebody = 1;
    $nourut = 1;
    foreach ($res as $key) :
      $kolombody = 0;
      xlsWriteNumber($tablebody, $kolombody++, $nourut);
      xlsWriteLabel($tablebody, $kolombody++, $key->no_invoice);
      xlsWriteNumber($tablebody, $kolombody++, $key->id);
      xlsWriteLabel($tablebody, $kolombody++, $key->tanggal);
      xlsWriteLabel($tablebody, $kolombody++, $key->nama_pembeli);
      xlsWriteLabel($tablebody, $kolombody++, $key->nama_expedisi);
      xlsWriteLabel($tablebody, $kolombody++, $this->_allow_string($key->no_resi));
      $tablebody++;
      $nourut++;
    endforeach;
    
    xlsEOF();
    
    exit();
  }

  function _allow_string($text = '')
  {
    $txt = htmlentities($text);
    $txt = str_replace('&nbsp;', '', $txt);
    $txt = str_replace(' ', '', $txt);
    return $txt;
  }

  public function upload_action()
  {
    $config['upload_path'] = './assets/excel/';
    $config['allowed_types'] = '*';
    $config['max_size']  = '80000';
    $this->load->library('upload', $config);
    if ($this->upload->do_upload('file')){
      $data = $this->upload->data();
      $dir = $config['upload_path'].$data['file_name'];
      $this->_read_excel_file($dir);
      $this->session->set_flashdata('message', 'Upload berhasil');
    } else {
      $this->session->set_flashdata('message', 'Upload gagal');
      $error = $this->upload->display_errors();
    }
    redirect('admin/excel','refresh');
  }

  function _read_excel_file($file_dir)
  {
    $this->load->library("PHPExcel");
    ini_set('memory_limit', '-1');
    try {
      $inputFileType = PHPExcel_IOFactory::identify($file_dir);
      $objReader = PHPExcel_IOFactory::createReader($inputFileType);
      $objPHPExcel = $objReader->load($file_dir);
      // $objPHPExcel = PHPExcel_IOFactory::load($file_dir);
    } catch (Exception $e) {
      die('Error loading file :' . $e->getMessage());
    }
    $totalrows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
    $objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
    for ($i=2; $i <= $totalrows; $i++) :
      $st = 0;
      $data = array(
        'no' => $objWorksheet->getCellByColumnAndRow($st++, $i)->getValue(),
        'invoice' => $objWorksheet->getCellByColumnAndRow($st++, $i)->getValue(),
        'id_order' => $objWorksheet->getCellByColumnAndRow($st++, $i)->getValue(),
        'tanggal' => $objWorksheet->getCellByColumnAndRow($st++, $i)->getValue(),
        'nama' => $objWorksheet->getCellByColumnAndRow($st++, $i)->getValue(),
        'expedisi' => $objWorksheet->getCellByColumnAndRow($st++, $i)->getValue(),
        'no_resi' => $objWorksheet->getCellByColumnAndRow($st++, $i)->getValue(),
      );
      $this->_insert_excel($data);
    endfor;
  }

  function _insert_excel($data = array())
  {
    $data = (Object) $data;
    $row = $this->db->where('id', $data->id_order)->get('laporan_order')->row();
    if ($row) {
      $id_expedisi = 0;
      $row_expedisi = $this->db->where('LOWER(nama_expedisi)=', strtolower($data->expedisi))->get('expedisi')->row();
      if ($row_expedisi) {
        $id_expedisi = $row_expedisi->id;
      }
      $data_update = array(
        'id_expedisi' => $id_expedisi,
        'no_resi' => $this->_allow_string($data->no_resi),
      );
      $this->db->where('id', $data->id_order);
      $this->db->update('laporan_order', $data_update);      
    }
  }

}