<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Criteria extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('Criteria_model','criteria_model');
		is_logged_in();

	}

	function index(){
		$data['title'] = 'Criteria Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$this->load->model('criteria_model');
		$data['row']= $this->criteria_model->get();

		$this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('criteria/index', $data);
        $this->load->view('templates/footer2');
	}

	function add(){
		$this->load->library('form_validation');
		$this->load->view('');
	}


}