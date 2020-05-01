<?php

Class Fungsi {

    protected $ci;

    function __construct(){
        $this->ci =& get_instance();
    }

    function user_login(){
        $this->ci->load->model('user_model');
        $user_id = $this->ci->session->userdata('user_id');
        $user_data = $this->ci->user_m->get($user_id)->row();
        return $user_data;
    }
}