<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {

	var $table = "";

	function __construct()
	{
		parent::__construct();
	}

	function insert($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	function find_id($id)
	{
		if ($id == NULL)
		{
			return NULL;
		}

		$this->db->where('id', $id);
		$query = $this->db->get($this->table);

		$result = $query->result_array();
		return (count($result) > 0 ? $result[0] : NULL);
	}

	function find_all($sort = 'id', $order = 'asc')
	{
		$this->db->order_by($sort, $order);
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	function update($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update($this->table, $data);
	}

	function delete($id)
	{
		if ($id != NULL)
		{
			$this->db->where('id', $id);                    
			$this->db->delete($this->table);                        
		}
	}       
}