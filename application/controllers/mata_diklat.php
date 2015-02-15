<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mata_diklat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('default_model');
	}

	public function index()
	{
		$parse = array();
		$parse['query'] 	= $this->default_model->getData('mata_diklat');
		$parse['content']	= 'template/table';
		$parse['field']		= array('No','Nama','Action');
		$parse['data'] 		= 'table/mata_diklat';

		load_view('main',$parse,FALSE);
	}

	public function add($id="")
	{
		$post = $this->input->post();
		$parse = array();
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

}

/* End of file mata_diklat.php */
/* Location: ./application/controllers/mata_diklat.php */