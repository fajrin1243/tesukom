<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kompetensi_keahlian extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('default_model');
		$this->is_logged_in();
	}

	public function index($id="")
	{
		//$config = array();
		//$config['base_url'] = base_url().'index.php/mata_diklat/index';
		//$config['total_rows'] = $this->db->get('mata_diklat')->num_rows();
		//$config['per_page'] = '3';
		//$this->pagination->initialize($config);

		$parse = array();
		//$parse['query'] 	= $this->default_model->getData('mata_diklat','',$config['per_page'], $id);
		$parse['controller'] = 'kompetensi_keahlian';
		$parse['level']		= $this->default_model->getData('users',array('username'=>$this->session->userdata('username')));
		$parse['query'] 	= $this->default_model->getJoin('a.id as id,a.nama,b.nama as mata_diklat,b.id as id_diklat','kompetensi_keahlian as a','mata_diklat as b','a.diklat_id=b.id');
		$parse['content']	= 'template/table';
		$parse['field']		= array('No','Mata Diklat','Kompetensi Keahlian','Action');
		$parse['data'] 		= 'table/kompetensi_keahlian';
		$parse['halaman']   = $this->pagination->create_links();

		load_view('main',$parse,FALSE);
	}

	public function add($id="")
	{
		$post = $this->input->post();
		$parse = array();
		$parse['dropdown']	= $this->default_model->getData('mata_diklat');
		$parse['level']		= $this->default_model->getData('users',array('username'=>$this->session->userdata('username')));
		$parse['query'] 	= $this->default_model->getData('kompetensi_keahlian',array('id'=>$id));
		$parse['content']	= 'add/kompetensi_keahlian';

		load_view('main',$parse,FALSE);
	}

	public function save()
	{
		$object = array();
		$post = $this->input->post();

		if (!empty($post['id'])) {
			$object['diklat_id']	= $post['diklat_id'];
			$object['nama'] 		= $post['nama'];
			$this->default_model->updateData('kompetensi_keahlian',$object,$post['id']);
		}
		else
		{
			$object['diklat_id']	= $post['diklat_id'];
			$object['nama']			= $post['nama'];
			$this->default_model->insertData('kompetensi_keahlian',$object);
		}

		redirect('kompetensi_keahlian');		
	}

	public function delete($id="")
	{
		$this->default_model->deleteData('kompetensi_keahlian',array('id' => $id));
		redirect('kompetensi_keahlian');
	}

	public function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			echo "You don\'t have permission to access this page. <a href='".base_url('index.php/login')."'>Login</a>"; 
			die();  
   //$this->load->view('login_form');
		}  
	} 

}

/* End of file kompetensi_keahlian.php */
/* Location: ./application/controllers/kompetensi_keahlian.php */