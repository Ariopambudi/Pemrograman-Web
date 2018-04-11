<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_data_crud');
	}

	public function index()
	{
		$data1['query'] = $this->m_data_crud->Get_crud();
		$this->load->view('header');
		$this->load->view('main_crud', $data1);
	}

	public function tambah()
	{
		$this->load->view('header');
		$this->load->view('main_tambah_artikel', $data1);
	}

}
