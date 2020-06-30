<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Evaluation extends CI_Controller
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
        $data['title'] = 'Hasil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['getDataCriteria'] = $this->Evaluation_model->getDataCriteria();
        $data['getDataAlternative'] = $this->Evaluation_model->getDataAlternative();
        $data['sumVal'] = $this->Chart_model->getSumVal();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('evaluation/index', $data);
        $this->load->view('templates/footer2');
    }

    public function hasil()
    {
        $data['title'] = 'Evaluasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['getDataCriteria'] = $this->Evaluation_model->getDataCriteria();
        $data['getDataAlternative'] = $this->Evaluation_model->getDataAlternative();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('evaluation/hasil', $data);
        $this->load->view('templates/footer2');
    }

    public function segitiga()
    {
        $data['title'] = 'Perbandingan berpasangan alternative dengan criteria';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // bagian perhitungan segitiga
        $a = 5; // alas
        $t = 3; // tinggi
        $data['luasSegitiga'] = $this->Evaluation_model->LuasSegitiga($a, $t);

        $s = 5; // sisi
        $data['luasPersegi'] = $this->Evaluation_model->LuasPersegi($s);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('evaluation/index', $data);
        $this->load->view('templates/footer2');
    }
}
