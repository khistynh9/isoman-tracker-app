<?php

class Jabatan extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['page_title'] = 'Jabatan';
    }

    //manage users
    public function index()
    {
        $this->render_template('jabatan/index', $this->data);
    }

    //create user
    public function create()
    {
        $this->render_template('jabatan/create', $this->data);
    }

    //edit user
    public function edit()
    {
        $this->render_template('jabatan/edit', $this->data);
    }

}
