<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Products extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function paginate($page)
	{
		$limit = 12;
		$offset = ($page - 1) * $limit;
		$this->db->select('id, name, image, price, sale');
		$this->db->where('style', 'nữ');
		$data = $this->db->get('products', $limit, $offset);
		$data = $data->result_array();
		if(!empty($data)) array_unshift($data, ceil($this->db->count_all('products') / $limit));
		return $data;
	}
}