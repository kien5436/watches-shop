<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if ($this->input->get('btn-search') !== null && $this->input->get('inp-search') !== null) {
			$collate = trim(preg_replace('/\s+/', ' ', $this->input->get('inp-search')));
			$this->load->model('Model_Admin');
			$rs = $this->Model_Admin->searchProduct($collate);
			$rs = ['rs' => $rs];
			$this->load->view('View_Products', $rs, FALSE);
		} else {
			$this->load->model('Model_Admin');
			$rs = $this->Model_Admin->advancedSearchProduct($_GET);
			$rs = ['rs' => $rs];
			$this->load->view('View_Products', $rs, FALSE);
		}		
	}

}