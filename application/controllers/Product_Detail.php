<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product_detail extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$id = $this->input->get('id');
		$this->load->model('Model_Product_Detail');
		$rs = $this->Model_Product_Detail->getAllData($id);
		$rs = ['rs' => $rs];
		$this->load->view('View_Product_Detail', $rs, false);
	}

}