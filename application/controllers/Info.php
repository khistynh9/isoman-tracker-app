<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info extends Admin_Controller

{
    public function __construct()
    {
        parent::__construct();

        //$this->not_logged_in();

        $this->data['page_title'] = 'Informasi';

        $this->load->model('model_info');
        $this->load->model('model_users');
        $this->load->model('model_puskesmas');
    }


    public function index()

    {
        if (!in_array('viewPasien', $this->hak_akses)) {
            redirect('dashboard', 'refresh');
        }

        $this->render_template('info/index', $this->data);
    }


    public function fetchinfoData()
    {
        if (!in_array('viewPasien', $this->hak_akses)) {
            redirect('dashboard', 'refresh');
        }

        $result = array('data' => array());
        $data = $this->model_info->getinfoData();
        foreach ($data as $key => $value) {
            $puskesmas_data = $this->model_puskesmas->getPuskesmasData($value['puskesmas_id']);

            // button
            $buttons = '';

            if (in_array('updatePasien', $this->hak_akses)) {
                $buttons .= '<a href="' . base_url('info/ubah/' . $value['id']) . '" class="btn btn-default"><i class="fa fa-pencil"></i></a>';
            }

            if (in_array('deletePasien', $this->hak_akses)) {
                $buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
            }

            if ($value['status'] == 1) {
                $status = '<span class="label label-warning">Draft</span>';
            } else {
                $status = '<span class="label label-success">Publish</span>';
            }

            $img = '<img src="' . base_url($value['gambar']) . '" alt="' . $value['judul'] . '" class="img-circle" width="50" height="50" />';

            $result['data'][$key] = array(
                $img,
                $value['judul'],
                $puskesmas_data['nama_puskesmas'],
                $status,
                $buttons

            );
        } // /foreach

        echo json_encode($result);
    }

    public function tambah()
    {
        if (!in_array('createPasien', $this->hak_akses)) {
            redirect('dashboard', 'refresh');
        }

        $this->form_validation->set_rules('judul', 'Judul info', 'trim|required');
        $this->form_validation->set_rules('isi', 'Isi Info', 'trim|required');
        $this->form_validation->set_rules('status', 'status', 'trim|required');
        $this->form_validation->set_rules('tgl', 'status', 'trim|required');

        if ($this->form_validation->run() == TRUE) {

            // true case
            $upload_image = $this->upload_image();
            $puskesmas_id = $this->session->userdata('puskesmas_id');

            $data = array(
                'gambar' => $upload_image,
                'judul' => $this->input->post('judul'),
                'isi' => $this->input->post('isi'),
                'date_time' => $this->input->post('tgl'),
                'status' => $this->input->post('status'),
                'puskesmas_id' => $puskesmas_id

            );

            $create = $this->model_info->create($data);
            if ($create == true) {
                $this->session->set_flashdata('success', 'Successfully created');
                redirect('info', 'refresh');
            } else {
                $this->session->set_flashdata('errors', 'Error occurred!!');
                redirect('info/tambah', 'refresh');
            }
        } else {
            // false case
            $this->render_template('info/tambah', $this->data);
        }
    }

    public function upload_image()
    {
        // assets/images/product_image
        $config['upload_path'] = 'assets/images/info';
        $config['file_name'] =  uniqid();
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1000';
        // $config['max_width']  = '1024';s
        // $config['max_height']  = '768';

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            $error = $this->upload->display_errors();
            return $error;
        } else {
            $data = array('upload_data' => $this->upload->data());
            $type = explode('.', $_FILES['image']['name']);
            $type = $type[count($type) - 1];

            $path = $config['upload_path'] . '/' . $config['file_name'] . '.' . $type;
            return ($data == true) ? $path : false;
        }
    }

    public function ubah($info_id)
    {
        if (!in_array('updatePasien', $this->hak_akses)) {
            redirect('dashboard', 'refresh');
        }

        $this->form_validation->set_rules('judul', 'Judul info', 'trim|required');
        $this->form_validation->set_rules('isi', 'Isi', 'trim|required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            // true case
            $judul = $this->input->post('judul');
            $data = array(
                'judul' => $judul,
                'isi' => $this->input->post('isi'),
                'status' => $this->input->post('status'),
                'date_time' => $this->input->post('tgl')
            );

            if ($_FILES['image']['size'] > 0) {
                $upload_image = $this->upload_image();
                $upload_image = array('gambar' => $upload_image);

                $this->model_info->update($upload_image, $info_id);
            }

            $update = $this->model_info->update($data, $info_id);
            if ($update == true) {
                $this->session->set_flashdata('success', 'Successfully updated');
                redirect('info/', 'refresh');
            } else {
                $this->session->set_flashdata('errors', 'Error occurred!!');
                redirect('info/ubah/' . $info_id, 'refresh');
            }
        } else {
            $this->data['info_data'] = $this->model_info->getinfoData($info_id);


            $this->render_template('info/ubah', $this->data);
        }
    }



    /*

    * It removes the data from the database

    * and it returns the response into the json format

    */

    public function remove()

    {

        if (!in_array('deleteinfo', $this->hak_akses)) {

            redirect('admin/dashboard', 'refresh');
        }



        $info_id = $this->input->post('info_id');



        $response = array();

        if ($info_id) {

            $delete = $this->model_info->remove($info_id);

            if ($delete == true) {

                $response['success'] = true;

                $response['messages'] = "Successfully removed";
            } else {

                $response['success'] = false;

                $response['messages'] = "Error in the database while removing the info information";
            }
        } else {

            $response['success'] = false;

            $response['messages'] = "Refersh the page again!!";
        }



        echo json_encode($response);
    }
}
