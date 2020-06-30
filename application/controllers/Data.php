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
        $this->db->update('electre_alternatives', ['alternative' => $this->input->post('alternative')], ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">The alternative has ben looked!</div>');
        redirect('data/alternative');
    }

    public function lihatcriteria($id)
    {
        $this->db->update('electre_criterias', ['criteria' => $this->input->post('criteria')], ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">The criteria has ben looked!</div>');
        redirect('data/criteria');
    }



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
