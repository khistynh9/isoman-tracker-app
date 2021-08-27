<?php

class Users extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['page_title'] = 'User';
    }

    //manage users
    public function index()
    {
        $this->render_template('users/index', $this->data);
    }

    //create user
    public function tambah()
    {
        $this->render_template('users/tambah', $this->data);
    }

    //edit user
    public function ubah()
    {
        $this->render_template('users/edit', $this->data);
    }
}
