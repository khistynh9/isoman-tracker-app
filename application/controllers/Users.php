<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->logged_in();

        $this->data['page_title'] = 'Users';

        $this->load->model('model_users');
        $this->load->model('model_jabatan');
        $this->load->model('model_puskesmas');
    }

    //manage users
    public function index()
    {
        if (!in_array('viewUser', $this->hak_akses)) {
            redirect('dashboard', 'refresh');
        }

        $user_data = $this->model_users->getUserData();

        $result = array();
        foreach ($user_data as $k => $v) {

            $result[$k]['user_info'] = $v;

            $group = $this->model_users->getUserGroup($v['id']);
            $result[$k]['user_jabatan'] = $group;
        }

        $this->data['user_data'] = $result;

        $this->render_template('users/index', $this->data);
    }

    //create user
    public function tambah()
    {
        if (!in_array('createUser', $this->hak_akses)) {
            redirect('dashboard', 'refresh');
        }

        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('puskesmas', 'Puskesmas', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|is_unique[users.username]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('cpassword', 'Konfirmasi password', 'trim|required|matches[password]');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'trim|required');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == TRUE) {
            // true case
            $password = $this->input->post('password');
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $password,
                'email' => $this->input->post('email'),
                'nama' => $this->input->post('nama'),
                'no_hp' => $this->input->post('phone'),
                'jenis_kel' => $this->input->post('gender'),
                'puskesmas_id' => $this->input->post('puskesmas'),
            );

            $create = $this->model_users->create($data, $this->input->post('jabatan'));
            if ($create == true) {
                $this->session->set_flashdata('success', 'Berhasil Ditambahkan!');
                redirect('users', 'refresh');
            } else {
                $this->session->set_flashdata('errors', 'Gagal Menambahkan!!');
                redirect('users/tambah', 'refresh');
            }
        } else {
            // false case
            $this->data['puskesmas_data'] = $this->model_puskesmas->getPuskesmasData();
            $group_data = $this->model_jabatan->getJabatanData();
            $this->data['jabatan_data'] = $group_data;

            $this->render_template('users/tambah', $this->data);
        }
    }

    //edit user
    public function ubah($id = null)
    {
        if (!in_array('updateUser', $this->hak_akses)) {
            redirect('dashboard', 'refresh');
        }

        if ($id) {
            $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
            $this->form_validation->set_rules('puskesmas', 'Puskesmas', 'trim|required');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
            $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'trim|required');
            $this->form_validation->set_rules('phone', 'Nomor Telpon', 'trim|required');


            if ($this->form_validation->run() == TRUE) {
                // true case
                if (!$this->input->post('password') && !$this->input->post('cpassword')) {
                    $data = array(
                        'puskesmas_id' => $this->input->post('puskesmas'),
                        'username' => $this->input->post('username'),
                        'email' => $this->input->post('email'),
                        'nama' => $this->input->post('nama'),
                        'no_hp' => $this->input->post('phone'),
                        'jenis_kel' => $this->input->post('gender'),
                        'puskesmas_id' => $this->input->post('puskesmas'),
                    );

                    $update = $this->model_users->edit($data, $id, $this->input->post('jabatan'));
                    if ($update == true) {
                        $this->session->set_flashdata('success', 'Berhasil Diubah!');
                        redirect('users/', 'refresh');
                    } else {
                        $this->session->set_flashdata('errors', 'Gagal Mengubah!!');
                        redirect('users/ubah/' . $id, 'refresh');
                    }
                } else {
                    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
                    $this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');

                    if ($this->form_validation->run() == TRUE) {

                        $password = $this->input->post('password');

                        $data = array(
                            'puskesmas_id' => $this->input->post('puskesmas'),
                            'username' => $this->input->post('username'),
                            'email' => $this->input->post('email'),
                            'nama' => $this->input->post('nama'),
                            'no_hp' => $this->input->post('phone'),
                            'jenis_kel' => $this->input->post('gender'),
                            'puskesmas_id' => $this->input->post('puskesmas'),
                            'password' => $password
                        );

                        $update = $this->model_users->edit($data, $id, $this->input->post('jabatan'));
                        if ($update == true) {
                            $this->session->set_flashdata('success', 'Berhasil Diubah!');
                            redirect('users/', 'refresh');
                        } else {
                            $this->session->set_flashdata('errors', 'Gagal Mengubah!!');
                            redirect('users/ubah/' . $id, 'refresh');
                        }
                    } else {
                        // false case
                        $user_data = $this->model_users->getUserData($id);
                        $groups = $this->model_users->getUserGroup($id);

                        $this->data['puskesmas_data'] = $this->model_puskesmas->getPuskesmasData();

                        $this->data['user_data'] = $user_data;
                        $this->data['user_group'] = $groups;

                        $group_data = $this->model_jabatan->getJabatanData();
                        $this->data['jabatan_data'] = $group_data;

                        $this->render_template('users/ubah', $this->data);
                    }
                }
            } else {
                // false case
                $user_data = $this->model_users->getUserData($id);
                $groups = $this->model_users->getUserGroup($id);

                $this->data['puskesmas_data'] = $this->model_puskesmas->getPuskesmasData();

                $this->data['user_data'] = $user_data;
                $this->data['user_group'] = $groups;

                $group_data = $this->model_jabatan->getJabatanData();
                $this->data['jabatan_data'] = $group_data;

                $this->render_template('users/ubah', $this->data);
            }
        }
    }

    //delete users
    public function delete()
    {

        if (!in_array('deleteUser', $this->hak_akses)) {
            redirect('dashboard', 'refresh');
        }

        $users_id = $this->input->post('users_id');

        $response = array();
        if ($users_id) {
            $delete = $this->model_users->delete($users_id);
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

    //Profile
    public function profile()
    {

        if (!in_array('viewMonitor', $this->hak_akses)) {
            redirect('dashboard', 'refresh');
        }

        $user_id = $this->session->userdata('id');

        $user_data = $this->model_users->getUserData($user_id);
        $this->data['users_data'] = $user_data;

        $user_group = $this->model_users->getUserGroup($user_id);
        $this->data['user_group'] = $user_group;

        $this->render_template('users/profile', $this->data);
    }
}
