<?php

class Example_model extends MY_Model {
	
	public function __construct() {
		
		parent::__construct();
		
		$this->set_table('example_model');
		
		// Now you can use $this->example_model->get_by+id($id) etc in your controllers
		
	}
	
}

/* End of file: Example_model.php */
/* Location: application/models/Example_model.php */