<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Action extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Alternative_model'); //load dulu modelnya agr bisa dipake semua method dalam satu controller
		$this->load->model('Criteria_model');
		is_logged_in();
		$this->load->library('form_validation');
	}

	public function value()
	{
		$data['title'] = 'Alternative Data';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['alternative'] = $this->Alternative_model->getAllAlternative();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('action/value', $data);
		$this->load->view('templates/footer2');
	}

	public function weight()
	{
		$data['title'] = 'Criteria Data';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['criteria'] = $this->Criteria_model->getAllCriteria();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('action/weight', $data);
		$this->load->view('templates/footer2');
	}


	// public function hapus()
	// {
	// 	$id = $this->input->post('id_criteria');
	// 	$this->criteria_model->hapus($id);

	// 	if ($this->db->affected_rows() > 0) {
	// 		echo "<script>alert('Data berhasil dihapus')</script>";
	// 	}
	// 	echo "<script>window.location='" . base_url('criteria') . "'</script>";
	// }

	// public function getubah()
	// {
	// 	// echo 'Ok';
	// 	// echo $_POST['id'];
	// 	echo json_encode($this->load->model('Criteria_model')->getCriteriaById($_POST['id']));
	// }

	// public function ubah($id)
	// {
	// 	$data['title'] = 'Criteria Management';
	// 	$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

	// 	$query = $this->Criteria_model->getCriteriaById('id', $id);
	// 	$data['criteria'] = $query->row_array();

	// 	$this->form_validation->set_rules('criteria', 'Criteria', 'required');
	// 	$this->form_validation->set_rules('code', 'Code', 'required');
	// 	$this->form_validation->set_rules('weight', 'Weight', 'required');

	// 	if ($this->form_validation->run() == false) {
	// 		$this->load->view('templates/header', $data);
	// 		$this->load->view('templates/sidebar', $data);
	// 		$this->load->view('templates/topbar', $data);
	// 		$this->load->view('user/edit', $data);
	// 		$this->load->view('templates/footer');
	// 	} else {
	// 		$id = $this->input->post('id_criteria');
	// 		$criteria = $this->input->post('criteria');
	// 		$code = $this->input->post('code');
	// 		$weight = $this->input->post('weight');

	// 		$this->db->set('id_criteria', $id);
	// 		$this->db->set('criteria', $criteria);
	// 		$this->db->set('code', $code);
	// 		$this->db->where('weight', $weight);
	// 		$this->db->update('electre_criterias');

	// 		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
	// 		redirect('user');
	// 	}
	// }
}
