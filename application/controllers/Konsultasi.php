<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konsultasi extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->not_logged_in();
        $this->data['page_title'] = 'Konsultasi';
        $this->load->model('model_users');
        $this->load->model('model_pasien');
    }

    //History Gejala
    public function index()
    {
        if (isset($nik)) {
            $this->data['nik_user'] = $nik;
            $this->data['user'] = $this->model_pasien->getPasienData($nik);
        }

        $this->render_template('konsultasi/livechat', $this->data);
    }

    //Live Chat
    public function chat($nik = null)
    {
        if (isset($nik)) {
            $this->data['nik_user'] = $nik;
            $this->data['user'] = $this->model_pasien->getPasienData($nik);
        }

        $this->render_template('konsultasi/livechat', $this->data);
    }
}
