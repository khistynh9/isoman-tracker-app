<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Puskesmas extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->logged_in();

        $this->data['page_title'] = 'Puskesmas';
        $this->load->model('model_puskesmas');
    }

    public function index()
    {
        $puskesmas_data = $this->model_puskesmas->getPuskesmasData();
        $this->data['puskesmas_data'] = $puskesmas_data;
        $this->render_template('puskesmas/index', $this->data);
    }

    public function fetchPuskesmasData()
    {
        //auth
        // if (!in_array('viewBerita', $this->hak_akses)) {
        //     redirect('admin/dashboard', 'refresh');
        // }

        $result = array('data' => array());

        // data table puskesmas
        $data = $this->model_puskesmas->getPuskesmasData();

        foreach ($data as $key => $value) {
            // button
            $buttons = '';

            //if (in_array('updateBerita', $this->hak_akses)) {
            $buttons = '<button type="button" class="btn btn-default" onclick="editFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i></button>';
            //}

            //if (in_array('deleteBerita', $this->hak_akses)) {
            $buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc(' . $value['id'] . ')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
            //}

            $result['data'][$key] = array(
                $value['nama_puskesmas'],
                $value['alamat'],
                $buttons
            );
        } // /foreach

        echo json_encode($result);
    }

    public function tambah()
    {
        // if (!in_array('createBerita', $this->hak_akses)) {
        //     redirect('admin/dashboard', 'refresh');
        // }

        $response = array();

        $this->form_validation->set_rules('nama', 'Nama Puskesmas', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'nama_puskesmas' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat')
            );

            $create = $this->model_puskesmas->create($data);
            if ($create == true) {
                $response['success'] = true;
                $response['messages'] = 'Data Berhasil Ditambahkan!';
            } else {
                $response['success'] = false;
                $response['messages'] = 'Data Gagal Ditambahkan!';
            }
        } else {
            $response['success'] = false;
            foreach ($_POST as $key => $value) {
                $response['messages'][$key] = form_error($key);
            }
        }

        echo json_encode($response);
    }

    public function fetchPuskesmasDataById($id = null)
    {
        if ($id) {
            $data = $this->model_puskesmas->getPuskesmasData($id);
            echo json_encode($data);
        }
    }

    public function ubah($id)
    {
        //auth
        // if (!in_array('updateBerita', $this->hak_akses)) {
        //     redirect('admin/dashboard', 'refresh');
        // }

        $response = array();

        if ($id) {
            $this->form_validation->set_rules('edit_nama', 'Nama Puskesmas', 'trim|required');
            $this->form_validation->set_rules('edit_alamat', 'alamat', 'trim|required');

            $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'nama_Puskesmas' => $this->input->post('edit_nama'),
                    'alamat' => $this->input->post('edit_alamat')
                );

                $update = $this->model_puskesmas->update($id, $data);
                if ($update == true) {
                    $response['success'] = true;
                    $response['messages'] = 'Data Berhasil Diubah!';
                } else {
                    $response['success'] = false;
                    $response['messages'] = 'Data Gagal Diubah!';
                }
            } else {
                $response['success'] = false;
                foreach ($_POST as $key => $value) {
                    $response['messages'][$key] = form_error($key);
                }
            }
        } else {
            $response['success'] = false;
            $response['messages'] = 'Error please refresh the page again!!';
        }

        echo json_encode($response);
    }

    public function hapus()
    {
        //auth
        // if (!in_array('deleteBerita', $this->hak_akses)) {
        //     redirect('admin/dashboard', 'refresh');
        // }

        $puskesmas_id = $this->input->post('puskesmas_id');

        $response = array();
        if ($puskesmas_id) {
            $delete = $this->model_puskesmas->remove($puskesmas_id);
            if ($delete == true) {
                $response['success'] = true;
                $response['messages'] = "Data Berhasil Dihapus!";
            } else {
                $response['success'] = false;
                $response['messages'] = "Data Gagal Dihapus!";
            }
        } else {
            $response['success'] = false;
            $response['messages'] = "Refersh kembali halaman!!";
        }

        echo json_encode($response);
    }
}
