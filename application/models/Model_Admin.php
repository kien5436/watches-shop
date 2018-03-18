<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Admin extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function checkSignin($username, $password)
	{
		$this->db->select('*'); 
		$this->db->where('username', $username);
		$this->db->where('password', sha1($password)); 
		$data = $this->db->get('users', 1, 0);
		$data = $data->result_array();
		if(!empty($data) && $data[0]['privilege'] == 'admin') return $data;
		else return false;
	}

	public function getAllData($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$data = $this->db->get('products');
		return $data = $data->result_array();
	}

	public function searchProduct($collate)
	{
		$rs = $this->getIdOrigin($collate); 
		if (empty($rs)) {
			$query = "SELECT * from products where name like '%$collate%'";
		} else {
			$rs = $rs[0]['id'];
			$query = "SELECT * from products where name like '%$collate%' or id_origin = $rs";
		}
		$rs = $this->db->query($query);
		return $rs->result_array();
	}

	public function advancedSearchProduct($collates)
	{
		$query = "SELECT * from products where";
		foreach ($collates as $key => $value) {
			if ($key == 'submit' || $key == 'btn-search') continue;
			if ($key == 'brand') {
				$key = 'id_brand';
				$value = $this->getIdBrand($value)[0]['id'];
			} else if($key == 'price') {
				switch ($value) {
					case 'lt2':
					$query .= " $key < 2000000";
					break;
					case '2-4':
					$query .= " ($key >= 2000000 and $key < 4000000)";
					break;
					case '4-6':
					$query .= " ($key >= 4000000 and $key < 6000000)";
					break;
					case '6-8':
					$query .= " ($key >= 6000000 and $key < 8000000)";
					break;
					case '8-10':
					$query .= " ($key >= 8000000 and $key < 10000000)";
					break;
					default:
					$query .= " $key >= 10000000";
					break;	
				}
				continue;
			}
			$query .= " $key LIKE '%$value%' and";
		}
		$query = rtrim($query, ' and');
		$rs = $this->db->query($query);
		return $rs->result_array();
	}

/*
	public function insertBrand($brand)
	{
		$data = ['brand' => $brand];
		$this->db->insert('brands', $data);
		return $this->db->insert_id();
	}

	public function insertOrigin($nation)
	{
		$data = ['nation' => $nation];
		$this->db->insert('brands', $data);
		return $this->db->insert_id();
	}

	public function insertColor($color)
	{
		$data = ['color' => $color];
		$this->db->insert('colors', $data);
		return $this->db->insert_id();
	}

	public function insertProvider($provider)
	{
		$data = ['name' => $provider];
		$this->db->insert('providers', $data);
		return $this->db->insert_id();
	}
*/
	public function insertProduct($name, $image, $brand, $origin, $color, $style, $clockwork, $wire, $case, $glass, $diameter, $thickness, $waterproof, $guarantee, $provider, $price)
	{
		$brand = $this->getIdBrand($brand);
		$origin = $this->getIdOrigin($origin);
		$color = $this->getIdColor($color);
		$provider = $this->getIdProvider($provider);

		$brand = $brand[0]['id'];
		$origin = $origin[0]['id'];
		$color = $color[0]['id'];
		$provider = $provider[0]['id'];
		// var_dump($brand, $origin, $color, $provider); die;


		$data = [
			'name' => $name,
			'image' => $image,
			'id_brand' => $brand,
			'id_origin' => $origin,
			'id_color' => $color,
			'style' => $style,
			'clockwork' => $clockwork,
			'wire' => $wire,
			'case' => $case,
			'glass' => $glass,
			'diameter' => $diameter,
			'thickness' => $thickness,
			'waterproof' => $waterproof,
			'guarantee' => $guarantee,
			'id_provider' => $provider,
			'price' => $price
		];
		$this->db->insert('products', $data);
		return $this->db->insert_id();
	}

	public function getBrand($id)
	{
		$this->db->select('brand');
		$this->db->where('id', $id);
		$brand = $this->db->get('brands');
		return $brand = $brand->result_array();
	}

	public function getIdBrand($brand)
	{
		$this->db->select('id');
		$this->db->where('brand', $brand);
		$id = $this->db->get('brands');
		return $id = $id->result_array();
	}

	public function getOrigin($id)
	{
		$this->db->select('nation');
		$this->db->where('id', $id);
		$origin = $this->db->get('origin');
		return $origin = $origin->result_array();
	}

	public function getIdOrigin($origin)
	{
		$this->db->select('id');
		$this->db->where('nation', $origin);
		$id = $this->db->get('origin');
		return $id = $id->result_array();
	}

	public function getColor($id)
	{
		$this->db->select('color');
		$this->db->where('id', $id);
		$color = $this->db->get('colors');
		return $color = $color->result_array();
	}

	public function getIdColor($color)
	{
		$this->db->select('id');
		$this->db->where('color', $color);
		$id = $this->db->get('colors');
		return $id = $id->result_array();
	}

	public function getProvider($id)
	{
		$this->db->select('name');
		$this->db->where('id', $id);
		$provider = $this->db->get('providers');
		return $provider = $provider->result_array();
	}

	public function getIdProvider($provider)
	{
		$this->db->select('id');
		$this->db->where('name', $provider);
		$id = $this->db->get('providers');
		return $id = $id->result_array();
	}

	public function updateProduct($id, $name, $image, $brand, $origin, $color, $style, $clockwork, $wire, $case, $glass, $diameter, $thickness, $waterproof, $guarantee, $provider, $price, $sale)
	{
		$brand = $this->getIdBrand($brand);
		$brand = $brand[0]['id'];

		$origin = $this->getIdOrigin($origin);
		$origin = $origin[0]['id'];

		$color = $this->getIdColor($color);
		$color = $color[0]['id'];

		$provider = $this->getIdProvider($provider);
		$provider = $provider[0]['id'];

		$data = [
			'name' => $name,
			'image' => $image,
			'id_brand' => $brand,
			'id_origin' => $origin,
			'id_color' => $color,
			'style' => $style,
			'clockwork' => $clockwork,
			'wire' => $wire,
			'case' => $case,
			'glass' => $glass,
			'diameter' => $diameter,
			'thickness' => $thickness,
			'waterproof' => $waterproof,
			'guarantee' => $guarantee,
			'id_provider' => $provider,
			'price' => $price,
			'sale' => $sale
		];

		$this->db->where('id', $id);
		return $this->db->update('products', $data);
	}

	public function removeProduct($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('products');
	}

	public function paginate($page)
	{
		$limit = 20;
		$offset = ($page - 1) * $limit;
		$this->db->select('id, name, image, price, sale');
		$data = $this->db->get('products', $limit, $offset);
		$data = $data->result_array();
		array_unshift($data, ceil($this->db->count_all('products') / $limit));
		return $data;
	}
}