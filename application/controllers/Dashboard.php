<?php

use phpDocumentor\Reflection\Types\This;

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->not_logged_in();
        $this->data['page_title'] = 'Dashboard';
        $this->load->model('model_pasien');
    }



    public function index()
    {
        $user_id = $this->session->userdata('id');
        $is_admin = ($user_id == 1) ? true : false;

        if ($this->input->post('select_puskesmas')) {
            $puskesmas = $this->input->post('select_puskesmas');
            $this->data['selected_puskesmas'] = $puskesmas;
        }

        $order_data1 = $this->model_pasien->orderPasien(1);
        $order_data2 = $this->model_pasien->orderPasien(2);
        $order_data3 = $this->model_pasien->orderPasien(3);
        $order_data4 = $this->model_pasien->orderPasien(4);
        $order_data5 = $this->model_pasien->orderPasien(5);

        $data_pasien1 = $this->model_pasien->countTotalPasien(1);
        $data_pasien2 = $this->model_pasien->countTotalPasien(2);
        $data_pasien3 = $this->model_pasien->countTotalPasien(3);
        $data_pasien4 = $this->model_pasien->countTotalPasien(4);
        $data_pasien5 = $this->model_pasien->countTotalPasien(5);

        // var_dump($data_pasien1);
        // exit();
        // $months = array();
        // for ($i = 1; $i <= 12; $i++) {
        //     $l = array_keys($datas[$i]);

        //     for ($j = 1; $j <= count($l); $j++) {
        //         if ($l[$j] == $i) {
        //             $months[$i] = $datas[$i];
        //         }
        //         var_dump($datas[$l[$j]]);
        //         exit();
        //     }
        //     //     if ($i ==) {
        //     //         # code...
        //     //     } 
        //     //    $months[$i] = $datas[$i]
        // }


        // $final_data = array();
        // foreach ($stat as $month_k => $month_y) {
        //     $get_mon = $month_y;

        //     $final_data[$get_mon] = '';

        //     foreach ($datas as $k => $v) {
        //         if ($v > 0) {
        //             $month_year = array_keys($v);
        //             // var_dump($month_year);
        //             // exit();
        //             if (in_array($get_mon, $month_year)) {
        //                 $final_data[$get_mon] = $v;
        //             }
        //         }
        //     }

        // }
        $this->data['data_pasien1'] = $data_pasien1;
        $this->data['data_pasien2'] = $data_pasien2;
        $this->data['data_pasien3'] = $data_pasien3;
        $this->data['data_pasien4'] = $data_pasien4;
        $this->data['data_pasien5'] = $data_pasien5;

        $this->data['order_data1'] = $order_data1;
        $this->data['order_data2'] = $order_data2;
        $this->data['order_data3'] = $order_data3;
        $this->data['order_data4'] = $order_data4;
        $this->data['order_data5'] = $order_data5;

        $this->data['is_admin'] = $is_admin;

        $this->render_template('dashboard', $this->data);
    }
}
