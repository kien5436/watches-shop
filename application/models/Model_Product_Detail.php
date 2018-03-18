<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Product_Detail extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function getAllData($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$data = $this->db->get('products');
		$data = $data->result_array();
		$data[0]['id_brand'] = $this->getBrand($data[0]['id_brand']);
		$data[0]['id_color'] = $this->getColor($data[0]['id_color']);
		$data[0]['id_origin'] = $this->getOrigin($data[0]['id_origin']);
		return $data;
	}

	public function getBrand($id)
	{
		$this->db->select('brand');
		$this->db->where('id', $id);
		$brand = $this->db->get('brands');
		return $brand->result_array()[0]['brand'];
	}
	
	public function getOrigin($id)
	{
		$this->db->select('nation');
		$this->db->where('id', $id);
		$origin = $this->db->get('origin');
		return $origin->result_array()[0]['nation'];
	}
	
	public function getColor($id)
	{
		$this->db->select('color');
		$this->db->where('id', $id);
		$color = $this->db->get('colors');
		return $color->result_array()[0]['color'];
	}
}