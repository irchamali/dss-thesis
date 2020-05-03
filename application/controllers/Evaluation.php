<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Evaluation extends CI_Controller{
	
    public function __construct()
    {
		parent::__construct();
		$this->load->model('Evaluation_model'); //load dulu modelnya agr bisa dipake semua method dalam satu controller
        is_logged_in();
        $this->load->library('form_validation');

	}

	public function index()
    {
    	$data['title'] = 'Perbandingan berpasangan alternative dengan criteria';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['evaluation'] = $this->Evaluation_model->getAllEvaluation();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('evaluation/index', $data);
        $this->load->view('templates/footer2');
        
    }

    public function form01()
    {
    	$data['title'] = 'Perbandingan berpasangan alternative dengan criteria';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['evaluation'] = $this->Evaluation_model->getAllEvaluation();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('evaluation/form01', $data);
        $this->load->view('templates/footer2');
        
    }

    // public function tambah()
    // {
    //     $data['title'] = 'Criteria Data Management';
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    //     $this->form_validation->set_rules('criteria', 'Criteria', 'required');
    //     $this->form_validation->set_rules('code_crt', 'Code Criteria', 'required');
    //     // $this->form_validation->set_rules('weight', 'Weight', 'required'); //gak perlu karena combo-box

    //     if($this->form_validation->run()== FALSE){
    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('evaluation/tambah', $data);
    //     $this->load->view('templates/footer2');
    //     }else {
    //         // echo "berhasil";
    //         $this->Criteria_model->tambahDataCriteria();
    //         $this->session->set_flashdata('flash', 'Ditambahkan'); 
    //         redirect('criteria'); //sebelum redirect set dulu sessionnya
    //     }

    // }

    // public function hapus ($id)
    // {
    //     $this->Criteria_model->hapusDataCriteria($id);
    //     $this->session->set_flashdata('flash', 'Dihapus');
    //     redirect('criteria');
    // }

    // public function detail ($id)
    // {
    //     $data['title'] = 'Detail Data Criteria';
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //     $data['criteria']= $this->Criteria_model->getCriteriaById($id);

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('evaluation/detail', $data);
    //     $this->load->view('templates/footer2');
    // }

    public function form01ubah($id)
    {
        $data['title'] = 'Criteria Data Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        //maka kirimkan method ini dengan parameter $id yg ada dalam tanda kurung
        $data['evaluation'] = $this->Evaluation_model->getEvaluationById($id);
        // $data['weight'] = $this->Criteria_model->getAllWeight();
        $data['value'] = ['1','2','3','4'];

        $this->form_validation->set_rules('id_alternative', 'idAlternative', 'required');
        $this->form_validation->set_rules('id_criteria', 'idCriteria', 'required');
        // $this->form_validation->set_rules('weight', 'Weight', 'required'); //gak perlu karena combo-box

        if($this->form_validation->run()== FALSE){
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('evaluation/form01ubah', $data);
        $this->load->view('templates/footer2');
        }else {
            // echo "berhasil";
            $this->Evaluation_model->ubahDataEvaluation();
            $this->session->set_flashdata('flash', 'Diubah'); 
            redirect('evaluation/form01'); //sebelum redirect set dulu sessionnya
        }

    }

    // public function cari()
    // {
    // 	$data['title'] = 'Criteria Management';
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    //     $data['criteria'] = $this->Criteria_model->getAllCriteria();
    //     if($this->input->post('keyword')){
    //         $data['criteria'] = $this->Criteria_model->cariDataCriteria();
    //     }
    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('evaluation/index', $data);
    //     $this->load->view('templates/footer2');
        
    // }

}