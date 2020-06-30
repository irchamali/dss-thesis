<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Method extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Evaluation_model'); //load dulu modelnya agr bisa dipake semua method dalam satu controller
        $this->load->model('Chart_model');
        is_logged_in();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Hasil Evaluasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['getDataCriteria'] = $this->Evaluation_model->getDataCriteria();
        $data['getDataAlternative'] = $this->Evaluation_model->getDataAlternative();
        $data['sumVal'] = $this->Chart_model->getSumVal();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('method/index', $data);
        $this->load->view('templates/footer2');
    }
}
