<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitoring extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['page_title'] = 'Monitoring';
    }

    //manage monitor pasien
    public function index()
    {
        $this->render_template('monitoring/index', $this->data);
    }

    //monitoring lokasi pasien
    public function lokasi()
    {
        $this->render_template('monitoring/lokasi', $this->data);
    }

    //monitoring konsultasi dengan pasien
    public function konsul()
    {
        $this->render_template('monitoring/konsul', $this->data);
    }
}
