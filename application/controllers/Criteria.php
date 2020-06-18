<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Criteria extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Criteria_model'); //load dulu modelnya agr bisa dipake semua method dalam satu controller
        is_logged_in();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Criteria Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['criteria'] = $this->Criteria_model->getAllCriteria();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('criteria/index', $data);
        $this->load->view('templates/footer2');
    }

    public function tambah()
    {
        $data['title'] = 'Criteria Data Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('criteria', 'Criteria', 'required');
        $this->form_validation->set_rules('code_crt', 'Code Criteria', 'required');
        // $this->form_validation->set_rules('weight', 'Weight', 'required'); //gak perlu karena combo-box

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('criteria/tambah', $data);
            $this->load->view('templates/footer2');
        } else {
            // echo "berhasil";
            $this->Criteria_model->tambahDataCriteria();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('criteria'); //sebelum redirect set dulu sessionnya
        }
    }

    public function hapus($id)
    {
        $this->Criteria_model->hapusDataCriteria($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('criteria');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Data Criteria';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['criteria'] = $this->Criteria_model->getCriteriaById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('criteria/detail', $data);
        $this->load->view('templates/footer2');
    }

    public function ubah($id)
    {
        $data['title'] = 'Criteria Data Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        //maka kirimkan method ini dengan parameter $id yg ada dalam tanda kurung
        $data['criteria'] = $this->Criteria_model->getCriteriaById($id);
        // $data['weight'] = $this->Criteria_model->getAllWeight();
        $data['weight'] = ['1', '2', '3', '4', '5'];

        $this->form_validation->set_rules('criteria', 'Criteria', 'required');
        $this->form_validation->set_rules('code_crt', 'Code Criteria', 'required');
        // $this->form_validation->set_rules('weight', 'Weight', 'required'); //gak perlu karena combo-box

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('criteria/ubah', $data);
            $this->load->view('templates/footer2');
        } else {
            // echo "berhasil";
            $this->Criteria_model->ubahDataCriteria();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('criteria'); //sebelum redirect set dulu sessionnya
        }
    }

    public function cari()
    {
        $data['title'] = 'Criteria Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['criteria'] = $this->Criteria_model->getAllCriteria();
        if ($this->input->post('keyword')) {
            $data['criteria'] = $this->Criteria_model->cariDataCriteria();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('criteria/index', $data);
        $this->load->view('templates/footer2');
    }
}
