<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->logged_in();

        $this->data['page_title'] = 'Pasien';

        $this->load->model('model_pasien');
        $this->load->model('model_puskesmas');
        $this->load->model('model_users');
    }

    public function index()
    {
        if (!in_array('viewPasien', $this->hak_akses)) {
            redirect('dashboard', 'refresh');
        }

        $data_pasien = $this->model_pasien->getPasienDataLokasi();
        $puskesmas = $this->model_puskesmas->getPuskesmasData();
        $this->data['data_pasien_full'] = $data_pasien;
        $this->data['puskesmas_sata'] = $puskesmas;
        $this->render_template('pasien/index', $this->data);
    }

    public function fetchPasienData()
    {
        if (!in_array('viewPasien', $this->hak_akses)) {
            redirect('dashboard', 'refresh');
        }

        $result = array('data' => array());

        $data = $this->model_pasien->getPasienData();

        foreach ($data as $key => $value) {
            $puskesmas_data = $this->model_puskesmas->getPuskesmasData($value['puskesmas_id']);
            // button
            $buttons = '';

            $buttons = '<button type="button" class="btn btn-default btn-show-detail" data-nik="' . $value['nik'] . '" data-toggle="modal" data-target="#show-detail"><i class="fa fa-eye"></i></button>';

            if (in_array('updatePasien', $this->hak_akses)) {
                $buttons = '<button type="button" class="btn btn-default" onclick="editFunc(' . $value['nik'] . ')" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i></button>';
            }

            if (in_array('deletePasien', $this->hak_akses)) {
                $buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc(' . $value['nik'] . ')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
            }

            // $status = ($value['status'] == 1) ? '<span class="label label-success">Aktif</span>' : '<span class="label label-warning">Nonaktif</span>';

            $result['data'][$key] = array(
                $value['nik'],
                $value['nama'],
                $value['alamat'],
                $value['jenis_kel'],
                $value['no_telp'],
                $puskesmas_data['nama_puskesmas'],
                $buttons
            );
        } // /foreach
        // var_dump($result);
        // exit();
        echo json_encode($result);
    }

    public function fetchPasienDataLokasi()
    {
        if (!in_array('viewPasien', $this->hak_akses)) {
            redirect('dashboard', 'refresh');
        }

        $post_data = $this->input->post('nik');
        $data = $this->model_pasien->getPasienDataLokasi($post_data);

        echo json_encode($data);
    }

    //create user
    public function tambah()
    {
        //validasi hak akses
        if (!in_array('createPasien', $this->hak_akses)) {
            redirect('dashboard', 'refresh');
        }

        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('asal', 'Alamat Asal', 'trim|required');
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jml_kontak_erat', 'Jumlah Kontak Erat', 'required');
        $this->form_validation->set_rules('kependudukan', 'Satus Kependudukan', 'required');
        $this->form_validation->set_rules('stat_kondisi', 'Satus Kondisi', 'required');
        $this->form_validation->set_rules('no_telp', 'Nomor HP', 'required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == TRUE) {
            // true case
            //puskesmas id otomatis dari admin nakes
            $date = date('Y-m-d');
            $password = $this->input->post('password');
            $puskesmas_id = $this->session->userdata('puskesmas_id');
            $data = array(
                'nik' => $this->input->post('nik'),
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => $password,
                'no_telp' => $this->input->post('no_telp'),
                'alamat' => $this->input->post('asal'),
                'jenis_kel' => $this->input->post('gender'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'jml_kontak_erat' => $this->input->post('jml_kontak_erat'),
                'status_kondisi' => $this->input->post('stat_kondisi'),
                'status_kependudukan' => $this->input->post('kependudukan'),
                'puskesmas_id' => $puskesmas_id,
                'tgl' => $date
            );

            $create = $this->model_pasien->create($data);
            if ($create == true) {
                $this->session->set_flashdata('success', 'Berhasil Ditambahkan!');
                redirect('pasien', 'refresh');
            } else {
                $this->session->set_flashdata('errors', 'Gagal Menambahkan!!');
                redirect('pasien/tambah', 'refresh');
            }
        } else {
            $this->render_template('pasien/tambah', $this->data);
        }
    }

    //tambah lokasi pasien
    public function tambah_lokasi()
    {
        //validasi hak akses
        if (!in_array('createPasien', $this->hak_akses)) {
            redirect('dashboard', 'refresh');
        }

        $this->form_validation->set_rules('nik', 'NIK', 'trim|required');
        // $this->form_validation->set_rules('provinsi_val', 'Provinsi', 'trim|required');
        // $this->form_validation->set_rules('kec_val', 'Kecamatan', 'trim|required');
        // $this->form_validation->set_rules('kotkab_val', 'Kota/Kabupaten', 'trim|required');
        // $this->form_validation->set_rules('keldes_val', 'Kelurahan/Desa', 'trim|required');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == TRUE) {

            $nik = $this->input->post('nik');
            $loc = $this->input->post('lokasi');

            $data = array(
                'loc_begin' => $loc,
                'loc_end' => $loc,
                'keldes' => $this->input->post('keldes_val'),
                'kec' => $this->input->post('kec_val'),
                'kotkab' => $this->input->post('kotkab_val'),
                'provinsi' => $this->input->post('provinsi_val'),
                'status' => 1
            );
            //tambah
            $pasien = $this->model_pasien->getPasienData($nik);
            $create = $this->model_pasien->create_loc($data, $nik);
            if ($create == true) {
                $data_pasien = array(
                    'nik' => $nik,
                    'nama' => $pasien['nama'],
                    'loc_begin' => $loc,
                    'loc_end' => $loc,
                    'puskesmas_id' => $pasien['puskesmas_id'],
                    'status' => 1
                );

                $this->session->set_userdata($data_pasien);
                $this->session->set_flashdata('success', 'Berhasil Ditambahkan!');
                redirect('monitoring', 'refresh');
            } else {
                $this->session->set_flashdata('errors', 'Gagal Menambahkan!');
                redirect('pasien/tambah_lokasi', 'refresh');
            }
        } else {
            $data_pasen = $this->model_pasien->getPasienExist();
            $this->data['pasien_data'] = $data_pasen;
            $this->render_template('pasien/tambah_lokasi', $this->data);
        }
    }


    public function ubah($id = null)
    {
        if (!in_array('updatePasien', $this->hak_akses)) {
            redirect('dashboard', 'refresh');
        }

        if ($id) {
            $this->form_validation->set_rules('nik', 'NIK', 'required');
            $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
            $this->form_validation->set_rules('alamat', 'Alamat Asal', 'trim|required');
            $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'trim|required');
            $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
            $this->form_validation->set_rules('jml_kontak_erat', 'Jumlah Kontak Erat', 'required');
            $this->form_validation->set_rules('kependudukan', 'Satus Kependudukan', 'required');
            $this->form_validation->set_rules('stat_kondisi', 'Satus Kondisi', 'required');
            $this->form_validation->set_rules('no_telp', 'Nomor HP', 'required');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|is_unique[users.username]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');

            if ($this->form_validation->run() == TRUE) {
                // true case
                //puskesmas id otomatis dari admin nakes
                $date = date('Y-m-d');
                $loc = $this->input->post('loc_begin');

                $data = array(
                    'nik' => $this->input->post('nik'),
                    'nama' => $this->input->post('nama'),
                    'alamat' => $this->input->post('alamat'),
                    'tgl_lahir' => $this->input->post('tgl_lahir'),
                    'jml_kontak_erat' => $this->input->post('jml_kontak_erat'),
                    'no_telp' => $this->input->post('no_telp'),
                    'username' => $this->input->post('username'),
                    'password' => $this->input->post('password'),
                    'status_kependudukan' => $this->input->post('kependudukan'),
                    'status_kondisi' => $this->input->post('stat_kondisi'),
                    'puskesmas_id' => $this->input->post('puskesmas'),
                    'tgl' => $date
                );

                $update = $this->model_pasien->edit($data, $id, $loc);
                if ($update == true) {
                    $this->session->set_flashdata('success', 'Berhasil Diubah!');
                    redirect('pasien/', 'refresh');
                } else {
                    $this->session->set_flashdata('errors', 'Gagal Mengubah!!');
                    redirect('pasien/ubah/' . $id, 'refresh');
                }
            } else {
                // false case
                $pasien_data = $this->model_pasien->getPasienDataLokasi($id);

                $this->data['puskesmas_data'] = $this->model_puskesmas->getPuskesmasData();

                $this->data['pasien_data'] = $pasien_data[0];

                $this->render_template('pasien/ubah', $this->data);
            }
        }
    }

    public function delete()
    {
        if (!in_array('deletePasien', $this->hak_akses)) {
            redirect('dashboard', 'refresh');
        }

        $users_id = $this->input->post('pasien_id');

        $response = array();
        if ($users_id) {
            $delete = $this->model_pasien->delete($users_id);
            // $delete_lok = $this->model_pasien->delete_loc($users_id);
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
