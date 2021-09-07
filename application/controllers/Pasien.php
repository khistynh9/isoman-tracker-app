<?php

class Pasien extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['page_title'] = 'Pasien';
    }

    //manage users
    public function index()
    {
        $this->render_template('pasien/index', $this->data);
    }

    //create user
    public function tambah()
    {
        $this->render_template('pasien/tambah', $this->data);
    }

    //edit user
    public function ubah()
    {
        $this->render_template('pasien/ubah', $this->data);
    }

     //Profile
     public function profile()
     {
         $this->render_template('profile/profile', $this->data);
     }
}
