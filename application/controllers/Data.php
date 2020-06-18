<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Alternative_model'); //load dulu modelnya agr bisa dipake semua method dalam satu controller
        $this->load->model('Criteria_model');
        is_logged_in();
        $this->load->library('form_validation');
    }

    public function alternative()
    {
        $data['title'] = 'Alternative Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['alternative'] = $this->Alternative_model->getAllAlternative();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/alternative', $data);
        $this->load->view('templates/footer2');
    }

    public function criteria()
    {
        $data['title'] = 'Criteria Data';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['criteria'] = $this->Criteria_model->getAllCriteria();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/criteria', $data);
        $this->load->view('templates/footer2');
    }

    public function lihatalternatif($id)
    {
        $this->db->update('electre_alternatives', ['name_alt' => $this->input->post('name_alt')], ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">The alternative has ben looked!</div>');
        redirect('data/alternative');
    }

    public function lihatcriteria($id)
    {
        $this->db->update('electre_criterias', ['criteria' => $this->input->post('criteria')], ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">The criteria has ben looked!</div>');
        redirect('data/criteria');
    }

    // public function tambah()
    // {
    //     $data['title'] = 'Alternative Data Management';
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    //     $this->form_validation->set_rules('name_alt', 'Nama Alternatif', 'required');
    //     $this->form_validation->set_rules('code_alt', 'Code Alternatif', 'required');
    //     $this->form_validation->set_rules('info', 'Info Lahan', 'required');
    //     $this->form_validation->set_rules('plants', 'Tanaman', 'required');

    //     if ($this->form_validation->run() == FALSE) {
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('alternative/tambah', $data);
    //         $this->load->view('templates/footer2');
    //     } else {
    //         // echo "berhasil";
    //         $this->Alternative_model->tambahDataAlternative();
    //         $this->session->set_flashdata('flash', 'Ditambahkan');
    //         redirect('alternative'); //sebelum redirect set dulu sessionnya
    //     }
    // }

    // public function detail($id)
    // {
    //     $data['title'] = 'Detail Data Alternative';
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //     $data['alternative'] = $this->Alternative_model->getAlternativeById($id);

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('data/detail', $data);
    //     $this->load->view('templates/footer2');
    // }

    public function cari()
    {
        $data['title'] = 'Alternative Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['alternative'] = $this->Alternative_model->getAllAlternative();
        if ($this->input->post('keyword')) {
            $data['alternative'] = $this->Alternative_model->cariDataAlternative();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/alternative', $data);
        $this->load->view('templates/footer2');
    }
}
