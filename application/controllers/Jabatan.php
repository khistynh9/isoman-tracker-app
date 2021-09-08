<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['page_title'] = 'Jabatan';

        $this->load->model('model_jabatan');
    }

    //manage users
    public function index()
    {
        // if (!in_array('viewJabatan', $this->hak_akses)) {
        // 	redirect('admin/dashboard', 'refresh');
        // }

        $groups_data = $this->model_jabatan->getJabatanData();
        $this->data['jabatan_data'] = $groups_data;

        $this->render_template('jabatan/index', $this->data);
    }

    //create user
    public function tambah()
    {
        // if (!in_array('createJabatan', $this->hak_akses)) {
        // 	redirect('admin/dashboard', 'refresh');
        // }

        $this->form_validation->set_rules('group_name', 'Nama Jabatan', 'required');

        if ($this->form_validation->run() == TRUE) {
            // true case
            $permission = serialize($this->input->post('permission'));

            $data = array(
                'nama_level' => $this->input->post('group_name'),
                'hak_akses' => $permission
            );

            $create = $this->model_jabatan->create($data);
            if ($create == true) {
                $this->session->set_flashdata('success', 'Berhasil Ditambahkan!');
                redirect('jabatan/', 'refresh');
            } else {
                $this->session->set_flashdata('errors', 'Gagal Menambahkan!!');
                redirect('jabatan/tambah', 'refresh');
            }
        } else {
            $this->render_template('jabatan/tambah', $this->data);
        }
    }

    //edit user
    public function ubah($id = null)
    {
        // if (!in_array('updateJabatan', $this->hak_akses)) {
        //     redirect('admin/dashboard', 'refresh');
        // }

        if ($id) {
            $this->form_validation->set_rules('group_name', 'Nama Jabatan', 'required');

            if ($this->form_validation->run() == TRUE) {
                // true case
                $permission = serialize($this->input->post('permission'));

                $data = array(
                    'nama_level' => $this->input->post('group_name'),
                    'hak_akses' => $permission
                );

                $update = $this->model_jabatan->edit($data, $id);
                if ($update == true) {
                    $this->session->set_flashdata('success', 'Berhasil Diubah!');
                    redirect('jabatan', 'refresh');
                } else {
                    $this->session->set_flashdata('errors', 'Gagal Mengubah!!');
                    redirect('jabatan/ubah/' . $id, 'refresh');
                }
            } else {
                // false case
                $group_data = $this->model_jabatan->getJabatanData($id);
                $this->data['jabatan_data'] = $group_data;
                $this->render_template('jabatan/ubah', $this->data);
            }
        }
    }

    //remove level
    public function delete()
    {
        // if (!in_array('deleteJabatan', $this->hak_akses)) {
        // 	redirect('admin/dashboard', 'refresh');
        // }

        $jabatan_id = $this->input->post('jabatan_id');

        $response = array();
        if ($jabatan_id) {
            $delete = $this->model_jabatan->delete($jabatan_id);
            if ($delete == true) {
                $this->session->set_flashdata('success', 'Berhasil Dihapus!');;
            } else {
                $this->session->set_flashdata('error', 'Gagal Menghapus!!');
            }
        } else {
            $this->session->set_flashdata('error', 'Gagal Menghapus!!');
        }

        echo json_encode($response);
    }
}
