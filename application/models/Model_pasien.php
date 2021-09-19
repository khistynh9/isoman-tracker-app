<?php

class Model_pasien extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    private function months()
    {
        return array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);
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
            $this->db->select('pasien.*,puskesmas.nama_puskesmas, lokasi_pasien.status, lokasi_pasien.loc_begin, lokasi_pasien.loc_end, lokasi_pasien.time_stamp');
            $this->db->from('pasien');
            // Join dg 1 tabel
            $this->db->join('lokasi_pasien', 'lokasi_pasien.nik = pasien.nik', 'LEFT');
            $this->db->join('puskesmas', 'puskesmas.id = pasien.puskesmas_id', 'LEFT');
            // End join
            $this->db->where('pasien.nik', $nik);
            $this->db->order_by('lokasi_pasien.time_stamp', 'DESC');
            $query = $this->db->get();
            return $query->result_array();
        }

        if ($user_id == 1) {
            $this->db->select('pasien.*,puskesmas.nama_puskesmas, lokasi_pasien.status, lokasi_pasien.loc_begin, lokasi_pasien.loc_end, lokasi_pasien.time_stamp');
            $this->db->from('pasien');
            // Join dg 1 tabel
            $this->db->join('lokasi_pasien', 'lokasi_pasien.nik = pasien.nik', 'LEFT');
            $this->db->join('puskesmas', 'puskesmas.id = pasien.puskesmas_id', 'LEFT');
            // End join
            $this->db->order_by('lokasi_pasien.time_stamp', 'DESC');
            $query = $this->db->get();
            return $query->result_array();
        } else {
            $this->db->select('pasien.*,puskesmas.nama_puskesmas, lokasi_pasien.status, lokasi_pasien.loc_begin, lokasi_pasien.loc_end, lokasi_pasien.time_stamp');
            $this->db->from('pasien');
            // Join dg 1 tabel
            $this->db->join('lokasi_pasien', 'lokasi_pasien.nik = pasien.nik', 'LEFT');
            $this->db->join('puskesmas', 'puskesmas.id = pasien.puskesmas_id', 'LEFT');
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

    public function edit($data = array(), $id = null, $loc = null)
    {
        $this->db->where('nik', $id);
        $update = $this->db->update('pasien', $data);

        if ($loc) {
            // user group
            $date = date('Y-m-d');
            $update_loc = array('loc_begin' => $loc, 'time_stamp' => $date);
            $this->db->where('nik', $id);
            $loc = $this->db->update('lokasi_pasien', $update_loc);
            return ($update == true && $loc == true) ? true : false;
        }

        return ($update == true) ? true : false;
    }

    public function delete($id = null)
    {
        if ($id) {
            $this->db->where('nik', $id);
            $delete = $this->db->delete('pasien');
            return ($delete == true) ? true : false;
        }
    }

    public function delete_loc($id = null)
    {
        if ($id) {
            $this->db->where('nik', $id);
            $delete = $this->db->delete('lakasi_pasien');
            return ($delete == true) ? true : false;
        }
    }

    public function orderPasien($stat)
    {

        $months = $this->months();
        $id_puskesmas = $this->session->userdata('puskesmas_id');
        $user_id = $this->session->userdata('id');
        if ($user_id == 1) {
            $sql = "SELECT month(tgl) AS bulan, COUNT(status_kondisi) AS jml_status from pasien WHERE status_kondisi = ? GROUP BY status_kondisi, month(tgl) ORDER BY month(tgl)";
            $query = $this->db->query($sql, array($stat));
        } else {
            $sql = "SELECT month(tgl) AS bulan, COUNT(status_kondisi) AS jml_status from pasien WHERE status_kondisi = ? AND puskesmas_id = ? GROUP BY status_kondisi, month(tgl) ORDER BY month(tgl)";
            $query = $this->db->query($sql, array($stat, $id_puskesmas));
        }
        $result = $query->result_array();

        $final_data = array();
        foreach ($months as $month_k => $month_y) {
            $get_mon = $month_y;

            $final_data[$get_mon] = '0';
            foreach ($result as $k => $v) {
                if ($v > 0) {
                    $month_year = $v['bulan'];

                    if ($get_mon == $month_year) {
                        $final_data[$get_mon] = $v['jml_status'];
                    }
                }
            }
        }

        return $final_data;
    }

    public function countTotalPasien($stat)
    {
        $id_puskesmas = $this->session->userdata('puskesmas_id');

        $user_id = $this->session->userdata('id');
        if ($user_id == 1) {
            $sql = "SELECT status_kondisi, COUNT(status_kondisi) AS jml_status from pasien WHERE status_kondisi = ? GROUP BY status_kondisi ORDER BY status_kondisi";
            $query = $this->db->query($sql, array($stat));
        } else {
            $sql = "SELECT status_kondisi, COUNT(status_kondisi) AS jml_status from pasien WHERE status_kondisi = ? AND puskesmas_id = ? GROUP BY status_kondisi ORDER BY status_kondisi";
            $query = $this->db->query($sql, array($stat, $id_puskesmas));
        }
        $result = $query->result_array();


        return $result;
    }
}
