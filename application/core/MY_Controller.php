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
    var $hak_akses = array();

    public function __construct()
    {
        parent::__construct();

        $group_data = array();
        if (!$this->session->userdata('logged_in')) {
            $session_data = array('logged_in' => FALSE);
            $this->session->set_userdata($session_data);
        } else {
            $user_id = $this->session->userdata('id');
            $this->load->model('model_jabatan');
            $group_data = $this->model_jabatan->getUserJabatanByUserId($user_id);

            $this->load->model('model_users');
            $user_data = $this->model_users->getUserGroup($user_id);
            $this->data['user_datas'] = $user_data;

            $this->data['user_hak'] = unserialize($group_data['hak_akses']);

            $this->hak_akses = unserialize($group_data['hak_akses']);
        }
    }

    public function logged_in()
    {
        $session_data = $this->session->userdata();
        if ($session_data['logged_in'] == TRUE) {
            redirect('dashboard', 'refresh');
        }
    }

    public function not_logged_in()
    {
        $session_data = $this->session->userdata();
        if ($session_data['logged_in'] == FALSE) {
            redirect('login', 'refresh');
        }
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
