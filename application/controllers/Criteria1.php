<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Criteria extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('Criteria_model','criteria_model');
		is_logged_in();

		// $this->load->model('criteria_model');
		// $this->load->library('form_validation');
		// $this->load->helper('text');
	}

	function index(){
		$data['title'] = 'Criteria Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['criteria'] = $this->criteria_model->get_criteria();
		// $crt['datae'] = $this->criteria_model->get_criteria();
        $data['criteria'] = $this->db->get('electre_criterias')->result_array();
		
		$this->form_validation->set_rules('criteria', 'Criteria', 'required');
        $this->form_validation->set_rules('code', 'Code', 'required');
        $this->form_validation->set_rules('weight', 'Weight', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('criteria/v_criteria', $data);
            $this->load->view('templates/footer2');
        } else {
            $data = [
                'criteria' => $this->input->post('criteria'),
                'code' => $this->input->post('code'),
                'weight' => $this->input->post('weight')
            ];
            $this->db->insert('electre_criterias', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New criteria data added!</div>');
            redirect('criteria');
        }

	}

	public function hapus(){
		$id = $this->input->post('id_criteria');
		$this->criteria_model->hapus($id);

		if($this->db->affected_rows()>0){
			echo "<script>alert('Data berhasil dihapus')</script>";
		}
		echo "<script>window.location='".base_url('criteria')."'</script>";
	}



	public function getubah(){
		// echo 'Ok';
		// echo $_POST['id'];
	echo json_encode($this->load->model('Criteria_model')->getCriteriaById($_POST['id']));
	}

	public function ubah($id){
		$data['title'] = 'Criteria Management';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$query = $this->Criteria_model->getCriteriaById('id',$id);
        $data ['criteria'] = $query->row_array();

        $this->form_validation->set_rules('criteria','Criteria','required');
        $this->form_validation->set_rules('code','Code','required');
		$this->form_validation->set_rules('weight','Weight','required');

		if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
			$id = $this->input->post('id_criteria');
            $criteria = $this->input->post('criteria');
			$code = $this->input->post('code');
			$weight = $this->input->post('weight');

			$this->db->set('id_criteria', $id);
			$this->db->set('criteria', $criteria);
			$this->db->set('code', $code);
            $this->db->where('weight', $weight);
            $this->db->update('electre_criterias');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('user');
		}	
	}

	// public function cari()
	// {
	// 	$data['judul'] = 'Daftar Criteria';
	// 	$data['crt'] = $this->load->model('Criteria_model')->cariDataCriteria();
	// 	//bikin method model dengan nama cariDataAlternative
	// 	$this->load->view('templates/header', $data);
	// 	$this->load->view('criteria/index', $data);
	// 	$this->load->view('templates/footer2');
	// }

	// public function hapus($id)
    // {
    //     $result = $this->load->model('criteria_model')->hapusDataCriteria($id);
    //     if($result){
    //         $this->session->set_flashdata('message','<div class="alert alert-success">Data berhasil di hapus</div>');
    // }else{
    //     $this->session->set_flashdata('message','<div class="alert alert-warning">Data Gagal di hapus</div>');
    //     redirect('criteria');
    //     }
	// }
		
		// if ($this->form_validation->run($id) ==  false) {
        //     $this->load->view('templates/header', $data);
        //     $this->load->view('templates/sidebar', $data);
        //     $this->load->view('templates/topbar', $data);
        //     $this->load->view('criteria/v_criteria', $data);
        //     $this->load->view('templates/footer2');
        // } else {
        //     $data = [
        //         'criteria' => $this->input->post('criteria'),
        //         'code' => $this->input->post('code'),
        //         'weight' => $this->input->post('weight')
        //     ];
        //     $this->db->update('electre_criterias', $data);
        //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New criteria data added!</div>');
        //     redirect('criteria');
        // }
	

	

	// public function hapus ($id)
	// {
	// 	// var_dump($_POST);
	// 	if ( $this->load->model('Criteria_model')->hapusDataCriteria($id) > 0){
	// 		Flasher::setFlash('berhasil', 'dihapus', 'success');
	// 		header('location: ' . base_url() . 'criteria');
	// 		exit;
	// 	}
	// 	else{
	// 		Flasher::setFlash('gagal', 'dihapus', 'danger');
	// 		header('location: ' . base_url() . 'criteria');
	// 		exit;
	// 	}
	// }

	// public function getubah()
	// {
	// 	// echo 'Ok';
	// 	// echo $_POST['id'];
	// echo json_encode($this->load->model('Criteria_model')->getCriteriaById($_POST['id']));
	// }


	// public function ubah()
	// {
	// 	// var_dump($_POST);
	// 	if( $this->load->model('Criteria_model')->ubahDataCriteria($_POST) > 0){
	// 		Flasher::setFlash('berhasil', 'diubah', 'success');
	// 		//sebelum diredirect set dulu flashnya
	// 		header('location: ' . base_url() . 'criteria');
	// 		exit;
	// 	}
	// 	else{
	// 		Flasher::setFlash('gagal', 'diubah', 'danger');
	// 		header('location: ' . base_url() . '/criteria');
	// 		exit;
	// 	}
	// }



	// function insert(){
	// 	$criteria=htmlspecialchars($this->input->post('criteria',TRUE),ENT_QUOTES);
	// 	$code=htmlspecialchars($this->input->post('code',TRUE),ENT_QUOTES);
	// 	$weight=htmlspecialchars($this->input->post('weight',TRUE),ENT_QUOTES);
	            
	//     echo $this->session->set_flashdata('msg','error-img');
	//     redirect('criteria');
	//     }
	

	// function update(){
	// 	$id_criteria=htmlspecialchars($this->input->post('id_criteria',TRUE),ENT_QUOTES);
	// 	$criteria=htmlspecialchars($this->input->post('criteria',TRUE),ENT_QUOTES);
	// 	$code=htmlspecialchars($this->input->post('code',TRUE),ENT_QUOTES);
	// 	$weight=htmlspecialchars($this->input->post('weight',TRUE),ENT_QUOTES);
		
	//     $this->criteria_model->update_criteria($id_criteria,$criteria,$code,$weight);
	// 	echo $this->session->set_flashdata('msg','info');
	// 	redirect('criteria');
	//     }


	// function delete(){
	// 	$id_criteria=$this->input->post('kode',TRUE);
	// 	$this->criteria_model->delete_criteria($id_criteria);
	// 	echo $this->session->set_flashdata('msg','success-hapus');
	// 	redirect('criteria');
	// }

}