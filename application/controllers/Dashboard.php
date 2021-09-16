<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->not_logged_in();
        $this->data['page_title'] = 'Dashboard';
    }

    public function index()
    {
        $user_id = $this->session->userdata('id');
        $is_admin = ($user_id == 1) ? true : false;

        $this->data['is_admin'] = $is_admin;

        $this->render_template('dashboard', $this->data);
    }
}
