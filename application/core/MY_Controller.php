<?php

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
}

class Admin_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        //cek sesi dan login

    }

    public function render_template($page = null, $data = [])
    {
        $this->load->view('template/header', $data);
        $this->load->view('template/header_menu', $data);
        $this->load->view('template/sidebar_menu', $data);
        $this->load->view($page, $data);
        $this->load->view('template/footer', $data);
    }
}
