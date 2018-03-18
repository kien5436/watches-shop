<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Home extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getSomeDataProduct()	
	{
		$this->db->select('id, name, image, price, sale');
		$this->db->limit(12);
		$data = $this->db->get('products');
		return $data = $data->result_array();
	}
}