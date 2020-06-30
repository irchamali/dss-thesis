<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model'); //load dulu modelnya agr bisa dipake semua method dalam satu controller
        $this->load->model('Evaluation_model');
        $this->load->model('Chart_model');

        is_logged_in();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['getDataAlternative'] = $this->Evaluation_model->getDataAlternative();
        $data['getDataCriteria'] = $this->Evaluation_model->getDataCriteria();
        $data['jumAlt'] = $this->Admin_model->getDataAlternative();
        $data['jumCrt'] = $this->Admin_model->getDataCriteria();
        $data['jumSubCrt'] = $this->Admin_model->getDataSubcriteria();
        $data['jumUser'] = $this->Admin_model->getDataUser();

        $data['graph'] = $this->Chart_model->getLabel();
        $data['sumVal'] = $this->Chart_model->getSumVal();
        $data['jumVal1'] = $this->Chart_model->getDataValue1();
        $data['jumVal2'] = $this->Chart_model->getDataValue2();
        $data['jumVal3'] = $this->Chart_model->getDataValue3();
        $data['jumVal4'] = $this->Chart_model->getDataValue4();
        $data['jumVal5'] = $this->Chart_model->getDataValue5();
        $data['jumVal6'] = $this->Chart_model->getDataValue6();
        $data['jumVal7'] = $this->Chart_model->getDataValue7();
        $data['jumVal8'] = $this->Chart_model->getDataValue8();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }


    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New role added!</div>');
            redirect('admin/role');
        }
    }


    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }


    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }

    public function editrole($id)
    {
        $this->db->update('user_role', ['role' => $this->input->post('role')], ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">The role has ben edited!</div>');
        redirect('admin/role');
    }

    public function deleterole($id)
    {
        $this->db->delete('user_role', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">The role has ben deleted!</div>');
        redirect('admin/role');
    }

    public function userMan()
    {
        $data['title'] = 'User Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['user'] = $this->Admin_model->getAllUser();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/userman', $data);
        $this->load->view('templates/footer');
    }
}
