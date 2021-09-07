<?php

class Konsultasi extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['page_title'] = 'Konsultasi';
    }

    //History Gejala
    public function index()
    {
        $this->render_template('konsultasi/index', $this->data);
    }

    //Live Chat
    public function chat()
    {
        $this->render_template('konsultasi/livechat', $this->data);
    }
}

