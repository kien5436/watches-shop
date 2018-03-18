<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		$this->load->model('Model_Home');
		$rs = $this->Model_Home->getSomeDataProduct();
		$rs = ['rs' => $rs];
		$this->load->view('View_Home', $rs, false);
	}
}

?>