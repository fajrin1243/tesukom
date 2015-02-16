<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pdf extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('default_model');
  }

  public function index()
  {

  }

  public function mata_diklat(){
  // load view yang akan digenerate atau diconvert
  // contoh kita akan membuat pdf dari halaman welcome codeigniter
    $parse = array();
    //$parse['query']   = $this->default_model->getData('mata_diklat','',$config['per_page'], $id);
    $parse['query']   = $this->default_model->getData('mata_diklat');
    $parse['field']   = array('No','Nama');
    
    $this->load->view('pdf/mata_diklat',$parse,FALSE);
  // dapatkan output html

    $html = $this->output->get_output();

  // Load/panggil library dompdfnya
    $this->load->library('dompdf_gen');

  // Convert to PDF
    $this->dompdf->load_html($html);
    $this->dompdf->render();
  //utk menampilkan preview pdf
    $this->dompdf->stream("welcome.pdf",array('Attachment'=>0));
  //atau jika tidak ingin menampilkan (tanpa) preview di halaman browser
  //$this->dompdf->stream("welcome.pdf");

  }

}

/* End of file pdf.php */
/* Location: ./application/controllers/pdf.php */