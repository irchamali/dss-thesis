<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alternative extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Alternative_model'); //load dulu modelnya agr bisa dipake semua method dalam satu controller
        is_logged_in();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Alternative Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['alternative'] = $this->Alternative_model->getAllAlternative();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('alternative/index', $data);
        $this->load->view('templates/footer2');
    }

    public function tambah()
    {
        $data['title'] = 'Alternative Data Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('alternative', 'Nama Alternatif', 'required');
        $this->form_validation->set_rules('code_alt', 'Code Alternatif', 'required');
        $this->form_validation->set_rules('info', 'Info Lahan', 'required');
        $this->form_validation->set_rules('plants', 'Tanaman', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('alternative/tambah', $data);
            $this->load->view('templates/footer2');
        } else {
            // echo "berhasil";
            $this->Alternative_model->tambahDataAlternative();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('alternative'); //sebelum redirect set dulu sessionnya
        }
    }

    public function hapus($id)
    {
        $this->Alternative_model->hapusDataAlternative($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('alternative');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Data Alternative';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['alternative'] = $this->Alternative_model->getAlternativeById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('alternative/detail', $data);
        $this->load->view('templates/footer2');
    }

    public function ubah($id)
    {
        $data['title'] = 'Alternative Data Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        //maka kirimkan method ini dengan parameter $id yg ada dalam tanda kurung
        $data['alternative'] = $this->Alternative_model->getAlternativeById($id);
        // $data['weight'] = $this->Criteria_model->getAllWeight();
        $data['info'] = ['Organik', 'Non Organik'];

        $this->form_validation->set_rules('alternative', 'Nama Alternatif', 'required');
        $this->form_validation->set_rules('code_alt', 'Code Alternatif', 'required');
        $this->form_validation->set_rules('plants', 'Tanaman', 'required');
        // $this->form_validation->set_rules('info', 'Info Lahan', 'required');//gak perlu karena combo-box

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('alternative/ubah', $data);
            $this->load->view('templates/footer2');
        } else {
            // echo "berhasil";
            $this->Alternative_model->ubahDataAlternative();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('alternative'); //sebelum redirect set dulu sessionnya
        }
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
        $this->load->view('alternative/index', $data);
        $this->load->view('templates/footer2');
    }
}
