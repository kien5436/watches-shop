<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	public function index()
	{
		/*
			$this->load->library('pagination');
			$this->db->select('id, name, image, price, sale');                  
			$this->db->from('products');
			$offset = $this->uri->segment(2);    
			$limit = 4;        
			$this->db->limit($limit, $offset);
			$query_poster = $this->db->get();   
			// pagination        
			$config['base_url'] 		= base_url('Admin/');
			$config['total_rows'] 	= $this->db->count_all('products');
			$config['uri_segment']  = 2;
			$config['per_page'] 		= $limit;
			$config['prev_link'] 	= '&lt;';
			$config['next_link'] 	= '&gt;';
			$config['last_link'] 	= 'Cuối';
			$config['first_link']	= 'Đầu';
			$this->pagination->initialize($config);
			$paginator = $this->pagination->create_links(); 
			// End pagination                      
			$data = array(
				'paginator' => $paginator,
				'post'      => $query_poster
			);         
			$this->load->view('View_Manage_Products', $data);
		*/
		$this->paginate();
	}

	public function signin()
	{
		if($this->input->get('signout') !== null){
			$this->session->unset_userdata('user');
		}
		$user = $this->input->post('user');
		$pass = $this->input->post('pwd');
		if($user == "" || $pass== ""){
			redirect('signin','refresh');
		} else{
			$this->load->model('Model_Admin');
			$data = $this->Model_Admin->checkSignin($user, $pass);
			if($data){
				$this->session->set_userdata('user', $data[0]['name']);
				redirect('Admin','refresh');
			} else{
				redirect('signin','refresh');
			}
		}
	}

	public function cuminsoon()
	{
		$this->load->view('View_Cuming');
	}

	public function searchProduct()
	{
		if ($this->input->get('submit') !== null) {
			$collate = trim(preg_replace('/\s+/', ' ', $this->input->get('search')));
			$this->load->model('Model_Admin');
			$rs = $this->Model_Admin->searchProduct($collate);
			$rs = ['rs' => $rs];
			$this->load->view('View_Search_Admin', $rs, FALSE);
		}
	}

	public function advancedSearchProduct()
	{
		if($this->input->get('submit') !== null) {

			$this->load->model('Model_Admin');
			$rs = $this->Model_Admin->advancedSearchProduct($_GET);
			$rs = ['rs' => $rs];
			$this->load->view('View_Search_Admin', $rs, FALSE);
		}
	}

	public function addProduct()
	{
		$this->load->view('View_Add_Product');
	}

	public function insertProduct()
	{
		$image = $this->uploadImage();
		$name = $this->input->post('name');
		$brand = $this->input->post('brand');
		$origin = $this->input->post('origin');
		$color = $this->input->post('color');
		$style = $this->input->post('style');
		$clockwork = $this->input->post('clockwork');
		$wire = $this->input->post('wire');
		$case = $this->input->post('case');
		$glass = $this->input->post('glass');
		$diameter = $this->input->post('diameter');
		$thickness = $this->input->post('thickness');
		$waterproof = $this->input->post('waterproof');
		$guarantee = $this->input->post('guarantee');
		$provider = $this->input->post('provider');
		$price = $this->input->post('price');

		$this->load->model('Model_Admin');
		if ($this->Model_Admin->insertProduct($name, $image, $brand, $origin, $color, $style, $clockwork, $wire, $case, $glass, $diameter, $thickness, $waterproof, $guarantee, $provider, $price)) {
			$this->index();
		} else {
			echo "Failed to insert";
		}	
	}

	public function editProduct($id)
	{
		$this->load->model('Model_Admin');
		$rs = $this->Model_Admin->getAllData($id);

		foreach ($rs as $value) {
			$brand = $value['id_brand'];
			$origin = $value['id_origin'];
			$color = $value['id_color'];
			$provider = $value['id_provider'];
		}

		$brand = $this->Model_Admin->getBrand($brand);
		$origin = $this->Model_Admin->getOrigin($origin);
		$color = $this->Model_Admin->getcolor($color);
		$provider = $this->Model_Admin->getProvider($provider);

		foreach ($rs as $key => &$value) {
			$value['id_brand'] = $brand[0]['brand'];
			$value['id_color'] = $color[0]['color'];
			$value['id_origin'] = $origin[0]['nation'];
			$value['id_provider'] = $provider[0]['name'];
		}

		$rs = ['rs' => $rs];
		$this->load->view('View_Edit_Product', $rs, FALSE);
	}

	public function updateProduct()
	{
		$id = $this->input->post('id');
		
		$image = $this->uploadImage();
		// if(!empty($_POST['image_old'])) unlink($_POST['image_old']);
		if(!$image) $image = $this->input->post('image_old');

		$name = $this->input->post('name');
		$brand = $this->input->post('brand');
		$origin = $this->input->post('origin');
		$color = $this->input->post('color');
		$style = $this->input->post('style');
		$clockwork = $this->input->post('clockwork');
		$wire = $this->input->post('wire');
		$case = $this->input->post('case');
		$glass = $this->input->post('glass');
		$diameter = $this->input->post('diameter');
		$thickness = $this->input->post('thickness');
		$waterproof = $this->input->post('waterproof');
		$guarantee = $this->input->post('guarantee');
		$provider = $this->input->post('provider');
		$price = $this->input->post('price');
		$sale = $this->input->post('sale') ? $this->input->post('sale') : null;

		$this->load->model('Model_Admin');
		if ($this->Model_Admin->updateProduct($id, $name, $image, $brand, $origin, $color, $style, $clockwork, $wire, $case, $glass, $diameter, $thickness, $waterproof, $guarantee, $provider, $price, $sale)) {
			$this->index();
		} else {
			echo "failed to update";
		}	
	}

	public function removeProduct($id)
	{
		$this->load->model('Model_Admin');
		if ($this->Model_Admin->removeProduct($id)) {
			$this->index();
		} else {
			echo "failed to deleted";
		}
	}

	private function uploadImage()
	{
		$target_dir = "images/";
		$target_file = $target_dir . basename($_FILES["image_new"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		if(isset($_POST["submit"])) {	// Check if image file is a actual image or fake image
				if(!is_uploaded_file($_FILES["image_new"]["tmp_name"])) {
					// echo "File is not uploaded.";
					$uploadOk = 0;
				}
		} else if ($_FILES["image_new"]["size"] > 500000) {	// Check file size
			// echo "Sorry, your file is too large.";
			$uploadOk = 0;
		} else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {	// Allow certain file formats
			// echo "Sorry, only JPG, JPEG, PNG files are allowed.";
			$uploadOk = 0;
		}

		if ($uploadOk == 0) { // Check if $uploadOk is set to 0 by an error
			// echo "Sorry, your file was not uploaded.";
			return null;
		} else {
			$filename = uniqid('', true) . '.' . $imageFileType;
			$target_file = $target_dir . $filename;
			
			if (move_uploaded_file($_FILES["image_new"]["tmp_name"], $target_file)) {
				return $target_file;
			} else {
				echo "Sorry, there was an error uploading your file.";
				return null;
			}
		}
	}

	public function paginate($page = 1)
	{
		$this->load->model('Model_Admin');
		$rs = $this->Model_Admin->paginate($page);
		$rs = ['rs' => $rs];
		$this->load->view('View_Manage_Products', $rs, false);
	}
}