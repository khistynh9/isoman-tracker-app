<?php

class Model_pasien extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getPasienData($nik = null)
    {

        $puskesmas_id = $this->session->userdata('puskesmas_id');
        $user_id = $this->session->userdata('id');
        if ($nik) {
            $sql = "SELECT * FROM pasien WHERE nik = ?";
            $query = $this->db->query($sql, array($nik));
            return $query->row_array();
        }

        if ($user_id == 1) {
            $sql = "SELECT * FROM pasien ORDER BY nik DESC";
            $query = $this->db->query($sql);
            return $query->result_array();
        } else {
            $sql = "SELECT * FROM pasien WHERE puskesmas_id = ?";
            $query = $this->db->query($sql, array($puskesmas_id));
            return $query->result_array();
        }
    }

    public function getPasienDataLokasi($nik = null)
    {

        $puskesmas_id = $this->session->userdata('puskesmas_id');
        $user_id = $this->session->userdata('id');
        if ($nik) {
            $this->db->select('pasien.*,lokasi_pasien.status, lokasi_pasien.loc_begin, lokasi_pasien.loc_end, lokasi_pasien.time_stamp');
            $this->db->from('pasien');
            // Join dg 1 tabel
            $this->db->join('lokasi_pasien', 'lokasi_pasien.nik = pasien.nik', 'LEFT');
            // End join
            $this->db->where('pasien.nik', $nik);
            $this->db->order_by('lokasi_pasien.time_stamp', 'DESC');
            $query = $this->db->get();
            return $query->result_array();
        }

        if ($user_id == 1) {
            $this->db->select('pasien.*,lokasi_pasien.status, lokasi_pasien.loc_begin, lokasi_pasien.loc_end, lokasi_pasien.time_stamp');
            $this->db->from('pasien');
            // Join dg 1 tabel
            $this->db->join('lokasi_pasien', 'lokasi_pasien.nik = pasien.nik', 'LEFT');
            // End join
            $this->db->order_by('lokasi_pasien.time_stamp', 'DESC');
            $query = $this->db->get();
            return $query->result_array();
        } else {
            $this->db->select('pasien.*,lokasi_pasien.status, lokasi_pasien.loc_begin, lokasi_pasien.loc_end, lokasi_pasien.time_stamp');
            $this->db->from('pasien');
            // Join dg 1 tabel
            $this->db->join('lokasi_pasien', 'lokasi_pasien.nik = pasien.nik', 'LEFT');
            // End join
            $this->db->where('pasien.puskesmas_id', $puskesmas_id);
            $this->db->order_by('lokasi_pasien.time_stamp', 'DESC');
            $query = $this->db->get();
            return $query->result_array();
        }
    }

    public function getPasienExist()
    {
        $stat = 0;
        $puskesmas_id = $this->session->userdata('puskesmas_id');
        $sql = "SELECT lokasi_pasien.nik , pasien.nama FROM lokasi_pasien JOIN pasien ON pasien.nik = lokasi_pasien.nik WHERE lokasi_pasien.status = ? AND pasien.puskesmas_id = ?";
        $query = $this->db->query($sql, array($stat, $puskesmas_id));
        return $query->result_array();
    }

    public function create($data = '')
    {
        if ($data) {
            $create = $this->db->insert('pasien', $data);
            $pasien_nik = $data['nik'];
            $lokasi_data = array(
                'nik' => $pasien_nik,
                'status' => 0
            );
            $lokasi = $this->db->insert('lokasi_pasien', $lokasi_data);
            return ($create && $lokasi) ? true : false;
        }
    }

    public function create_loc($data, $nik)
    {
        $this->db->where('nik', $nik);
        $update = $this->db->update('lokasi_pasien', $data);

        return ($update == true) ? true : false;
    }



    // public function edit($data = array(), $id = null, $group_id = null)
    // {
    //     $this->db->where('id', $id);
    //     $update = $this->db->update('users', $data);

    //     if ($group_id) {
    //         // user group
    //         $update_user_group = array('jabatan_id' => $group_id);
    //         $this->db->where('user_id', $id);
    //         $user_group = $this->db->update('user_group', $update_user_group);
    //         return ($update == true && $user_group == true) ? true : false;
    //     }

    //     return ($update == true) ? true : false;
    // }

    // public function delete($id = null)
    // {
    //     if ($id) {
    //         $this->db->where('id', $id);
    //         $delete = $this->db->delete('users');
    //         return ($delete == true) ? true : false;
    //     }
    // }

    // public function countTotalUsers()
    // {
    //     $sql = "SELECT * FROM users WHERE id != ?";
    //     $query = $this->db->query($sql, array(1));
    //     return $query->num_rows();
    // }
}
