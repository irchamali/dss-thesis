<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Decision extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model'); //load dulu modelnya agr bisa dipake semua method dalam satu controller
		$this->load->model('Chart_model');
		$this->load->model('Evaluation_model');
		is_logged_in();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['jumAlt'] = $this->Admin_model->getDataAlternative();
		$data['jumCrt'] = $this->Admin_model->getDataCriteria();
		$data['jumSubCrt'] = $this->Admin_model->getDataSubcriteria();
		$data['jumUser'] = $this->Admin_model->getDataUser();
		//query-areachart
		$data['graph'] = $this->Chart_model->getLabel();
		$data['sumVal'] = $this->Chart_model->getSumVal();
		//query-piechart
		$data['dataPie'] = $this->Chart_model->getDataPie();
		//query-barchart
		$data['dataBar'] = $this->Chart_model->getDataBar();

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

	public function result()
	{
		$data['title'] = 'Hasil';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['getDataCriteria'] = $this->Evaluation_model->getDataCriteria();
		$data['getDataAlternative'] = $this->Evaluation_model->getDataAlternative();
		$data['sumVal'] = $this->Chart_model->getSumVal();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('decision/result', $data);
		$this->load->view('templates/footer2');
	}
}
