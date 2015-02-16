<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mata_diklat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('default_model');
		$this->is_logged_in();
	}

	public function test()
	{
		$tables = $this->db->list_tables();

		foreach ($tables as $table)
		{
			$data[] = $table;
		}

		echo implode('</br>', $data);
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
		$parse['controller'] = 'mata_diklat';
		$parse['level']		= $this->default_model->getData('users',array('username'=>$this->session->userdata('username')));
		$parse['query'] 	= $this->default_model->getData('mata_diklat');
		$parse['content']	= 'template/table';
		$parse['field']		= array('No','Nama','Action');
		$parse['data'] 		= 'table/mata_diklat';
		$parse['halaman'] = $this->pagination->create_links();

		load_view('main',$parse,FALSE);
	}

	public function add($id="")
	{
		$post = $this->input->post();
		$parse = array();
		$parse['level']		= $this->default_model->getData('users',array('username'=>$this->session->userdata('username')));
		$parse['query'] 	= $this->default_model->getData('mata_diklat',array('id'=>$id));
		$parse['content']	= 'add/mata_diklat';

		load_view('main',$parse,FALSE);
	}

	public function save()
	{
		$object = array();
		$post = $this->input->post();

		if (!empty($post['id'])) {
			$object['nama'] = $post['nama'];
			$this->default_model->updateData('mata_diklat',$object,$post['id']);
		}
		else
		{
			$object['nama'] = $post['nama'];
			$this->default_model->insertData('mata_diklat',$object);
		}

		redirect('mata_diklat');		
	}

	public function delete($id="")
	{
		$this->default_model->deleteData('mata_diklat',array('id' => $id));
		redirect('mata_diklat');
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

/* End of file mata_diklat.php */
/* Location: ./application/controllers/mata_diklat.php */