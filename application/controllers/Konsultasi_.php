<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konsultasi extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->not_logged_in();
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
