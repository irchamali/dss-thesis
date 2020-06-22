<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Action extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Alternative_model'); //load dulu modelnya agr bisa dipake semua method dalam satu controller
		$this->load->model('Criteria_model');
		$this->load->model('Subcriteria_model');
		$this->load->model('Evaluation_model');
		// $this->page->setLoadJs('assets/js/alternative');		
		is_logged_in();
		$this->load->library('form_validation');
	}

	public function value()
	{
		$data['title'] = 'Alternative Data';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['alternative'] = $this->Alternative_model->getAllAlternative();
		$data['dataView'] = $this->getDataInsert();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('action/value', $data);
		$this->load->view('templates/footer2');
	}

	public function weight()
	{
		$data['title'] = 'Weight Management';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->model('Criteria_model', 'criteria');

		$data['criteria'] = $this->criteria->getWeight();
		$data['weight'] = $this->db->get('electre_weight')->result_array();

		$this->form_validation->set_rules('criteria', 'Criteria', 'required');
		$this->form_validation->set_rules('code_crt', 'code_crt', 'required');
		$this->form_validation->set_rules('weight_id', 'Weight', 'required');

		if ($this->form_validation->run() ==  false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('action/weight', $data);
			$this->load->view('templates/footer2');
		} else {
			$data = [
				'criteria' => $this->input->post('criteria'),
				'code_crt' => $this->input->post('code_crt'),
				'weight_id' => $this->input->post('weight_id')
			];
			$this->db->insert('electre_criterias', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New critera added!</div>');
			redirect('action/weight');
		}
	}

	public function editweight($id)
	{
		$this->db->update('electre_criterias', [
			'criteria' => $this->input->post('criteria'),
			'code_crt' => $this->input->post('code_crt'),
			'weight_id' => $this->input->post('weight_id')
		], ['id_criteria' => $id]);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">The weight has ben edited!</div>');
		redirect('action/weight');
	}

	public function add($id = null)
	{
		$data['title'] = 'Tambah data alternative';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		if ($id == null) {
			if (count($_POST)) {
				$this->form_validation->set_rules('alternative', '', 'trim|required');

				if ($this->form_validation->run() == false) {
					$errors = $this->form_validation->error_array();
					$this->session->set_flashdata('errors', $errors);
					redirect(current_url());
				} else {

					$alternative = $this->input->post('alternative');
					$value = $this->input->post('value');

					$this->Alternative_model->alternative = $alternative;
					if ($this->Alternative_model->insert() == true) {
						$success = false;
						$id_alternative = $this->Alternative_model->getLastID()->id_alternative;
						foreach ($value as $item => $value) {
							$this->Evaluation_model->id_alternative = $id_alternative;
							$this->Evaluation_model->id_criteria = $item;
							$this->Evaluation_model->value = $value;
							if ($this->Evaluation_model->insert()) {
								$success = true;
							}
						}
						if ($success == true) {
							$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">The evaluations has ben added!</div>');
							redirect('action/value');
						} else {
							echo 'gagal';
						}
					}
				}
				//-----
			} else {
				$data['dataView'] = $this->getDataInsert();
				$this->load->view('templates/header', $data);
				$this->load->view('templates/sidebar', $data);
				$this->load->view('templates/topbar', $data);
				$this->load->view('action/add', $data);
				$this->load->view('templates/footer2');
			}
		}
	}


	public function edit($id = null)
	{
		$data['title'] = 'Ubah Data Alternative';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		if (count($_POST)) {
			$id_alternative = $this->uri->segment(3, 0);
			var_dump($id_alternative);
			if ($id_alternative > 0) {
				$alternative = $this->input->post('alternative');
				$value = $this->input->post('value');
				$where = array('id_alternative' => $id_alternative);
				$this->Alternative_model->alternative = $alternative;
				var_dump($alternative);
				if ($this->Alternative_model->update($where) == true) {
					$success = false;
					foreach ($value as $item => $value) {
						$this->Evaluation_model->id_alternative = $id_alternative;
						$this->Evaluation_model->id_criteria = $item;
						$this->Evaluation_model->value = $value;
						if ($this->Evaluation_model->update()) {
							$success = true;
						}
					}
					if ($success == true) {
						$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">The evaluation has been edited!</div>');
						redirect('action/value');
					} else {
						echo 'gagal';
						// $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">The evaluation data has not been edited!</div>');
						// redirect('action/value');
					}
				}
			}
		}
		$data['dataView'] = $this->getDataInsert();
		$data['valueAlternative'] = $this->Evaluation_model->getValueByAlternative($id);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('action/edit', $data);
		$this->load->view('templates/footer2');
	}



	private function getDataInsert()
	{
		$dataView = array();
		$criteria = $this->Criteria_model->getAll();
		foreach ($criteria as $item) {
			$this->Subcriteria_model->id_criteria = $item->id_criteria;
			$dataView[$item->id_criteria] = array(
				'nama' => $item->criteria,
				'data' => $this->Subcriteria_model->getById()
			);
		}

		return $dataView;
	}

	public function delete($id)
	{
		if ($this->Evaluation_model->delete($id) == true) {
			if ($this->Alternative_model->delete($id) == true) {
				$this->session->set_flashdata('message', 'Berhasil menghapus data :)');
				echo json_encode(array("status" => 'true'));
			}
		}
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
