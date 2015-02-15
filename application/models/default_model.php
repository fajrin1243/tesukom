<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Default_model extends CI_Model {

	function getData($table='',$condition='')
	{
		if (!empty($condition)) 
		{
			$query = $this->db->get_where($table, array($parameter));
		}
		else
		{
			$query = $this->db->get($table);
		}

		return $query->result_array();
	}

	function insertData($table="",$object="")
	{
		$this->db->insert($table, $object);
		return $this->db->insert_id();
	}

	function deleteData($table="",$params="")
	{
		$this->db->delete($table, $params); 
	}
	

}

/* End of file mata_diklat.php */
/* Location: ./application/models/mata_diklat.php */