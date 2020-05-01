<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
        $data['judul'] = 'Home';
        // $data['nama'] = $this->load->models('User_model')->getUser();
        $this->load->view('home/h_header', $data);
        $this->load->view('home/index');
        $this->load->view('home/h_footer');
	}
}