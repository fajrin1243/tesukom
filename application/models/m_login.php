<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model {

	public function validate()
	{
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', $this->input->post('password'));
		$query = $this->db->get('users');

		if($query->num_rows == 1)
		{
			return true;
		}

	}

}

/* End of file m_login.php */
/* Location: ./application/models/m_login.php */