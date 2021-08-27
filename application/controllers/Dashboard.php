<?php

class Dashboard extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['page_title'] = 'Dashboard';
    }

    public function index()
    {
        $this->render_template('dashboard', $this->data);
    }
}
