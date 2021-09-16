<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitoring extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->logged_in();
        $this->data['page_title'] = 'Monitoring';
        $this->load->model('model_pasien');
        $this->load->model('model_puskesmas');
    }

    //manage monitor pasien
    public function index()
    {
        $pasien_data = $this->model_pasien->getPasienDataLokasi();
        $this->data['pasien_data'] = $pasien_data;
        $this->render_template('monitoring/index', $this->data);
    }

    public function fetchPasienData()
    {
        //auth
        if (!in_array('viewPasien', $this->hak_akses)) {
            redirect('admin/dashboard', 'refresh');
        }

        $result = array('data' => array());

        // data table pasien
        $data = $this->model_pasien->getPasienDataLokasi();

        foreach ($data as $key => $value) {
            if ($value['status'] == 1) {
                $status = '<span class="label label-primary">Dalam Zona</span>';
            } else {
                $status = '<span class="label label-warning">Luar Zona</span>';
            }
            $result['data'][$key] = array(
                $value['nik'],
                $value['nama'],
                $status
            );
        } // /foreach

        echo json_encode($result);
    }

    //monitoring lokasi pasien
    public function lokasi()
    {

        $this->render_template('monitoring/lokasi', $this->data);
    }

    public function ubahStat()
    {
        $nik = $this->input->post('nik');
    }
}
