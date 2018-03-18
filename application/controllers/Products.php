<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class products extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	public function index()
	{
		$this->paginate();
	}

	public function paginate($page = 1)
	{
		$this->load->model('Model_Products');
		$rs = $this->Model_Products->paginate($page);
		$rs = ['rs' => $rs];
		$this->load->view('View_Products', $rs, false);
	}
}