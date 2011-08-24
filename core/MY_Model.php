<?php

/**
* Extended Model
*
* @package MY_Model
* @category Libraries
* @author Adam Griffiths
* @link http://adamgriffiths.co.uk
* @version 1.0.0
* @copyright Adam Griffiths 2011
*
* MY_Model provides a bunch of readily available functions that most models might need, saving you some time.
*/

class MY_Model extends CI_Model
{
	protected $table = null;
	
	
	public function __construct()
	{
		parent::__construct();
		log_message('debug', 'MY_Model Loaded');
	}
	
	
	
	/**
	* @author Adam Griffiths
	* @param string
	*
	* The name of the table you want your model to use.
	*/
	public function set_table($table)
	{
		$this->table = $table;
	}
	
	
	
	/**
	* @author Adam Griffiths
	* @return array
	*
	* Lists all of the items inside the database table.
	*/
	public function list_items()
	{
		$query = $this->db->get($this->table);
		return $query->result_array();
	}
	
	
	
	/**
	* @author Adam Griffiths
	* @param array
	*
	* Adds a new record to the database table. Performs no validation, so all data passed through should be validated first.
	*/
	public function add($data)
	{
		if($this->db->insert($this->table, $data))
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	
	
	/**
	* @author Adam Griffiths
	* @param integer
	* @param array
	*
	* Allows you to edit a single record, the first parameter is the record id, the second is the data you want to edit.
	*/
	public function edit($id, $data)
	{
		if($this->db->update($this->table, $data, array('id' => $id)));
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	
	
	/**
	* @author Adam Griffiths
	* @param integer
	*
	* Allows you to delete a record from the database.
	*/
	public function delete($id)
	{
		if($this->db->delete($this->table, array('id' => $id)))
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	
	
	/**
	* @author Adam Griffiths
	* @param integer
	*
	* Retrieves a single entry from the database based on it's ID..
	*/
	public function get_by_id($id)
	{
		$query = $this->db->where('id', $id)->get($this->table);
		return $query->row_array();
	}
}

/* End of file: MY_Model.php */
/* Location: application/core/MY_Model.php */