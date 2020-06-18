<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Decision extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model'); //load dulu modelnya agr bisa dipake semua method dalam satu controller
		is_logged_in();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('decision/index', $data);
		$this->load->view('templates/footer');
	}

	public function dprofile()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('decision/dashboard', $data);
		$this->load->view('templates/footer');
	}
}
