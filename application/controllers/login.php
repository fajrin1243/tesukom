<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
    $this->is_logged_in();
    $parse = array();
    $parse['content'] = 'form_login';

    load_view('main',$parse,FALSE);
  }

  function validate()
  {  
    $this->load->model('m_login');
    $query = $this->m_login->validate();

  		if($query) // jika data user benar
  		{
  			$data = array(
  				'username' => $this->input->post('username'),
  				'is_logged_in' => TRUE
  				);
  			$this->session->set_userdata($data);
  			redirect('mata_diklat');
  		}
  		else // username atau password salah
  		{
  			$this->index();
  		}
  	}

  	function logout()
  	{
  		$this->session->sess_destroy();
  		$this->index();
  	} 

  	public function is_logged_in()
   {
    $is_logged_in = $this->session->userdata('is_logged_in');
    if(!isset($is_logged_in) || $is_logged_in != FALSE)
    {
     redirect('mata_diklat');
     die();  
   //$this->load->view('login_form');
   }  
 } 

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */