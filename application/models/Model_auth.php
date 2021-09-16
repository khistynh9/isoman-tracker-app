<?php

class Model_auth extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    //cek email
    public function check_email($email)
    {
        if ($email) {
            $sql = 'SELECT * FROM users WHERE email = ?';
            $query = $this->db->query($sql, array($email));
            $result = $query->num_rows();
            return ($result == 1) ? true : false;
        }

        return false;
    }

    //cek login email dan password
    public function login($email, $password)
    {
        if ($email && $password) {
            $sql = "SELECT * FROM users WHERE email = ? AND password=?";
            $query = $this->db->query($sql, array($email, $password));

            if ($query->num_rows() == 1) {
                $result = $query->row_array();
                return $result;
            } else {
                return false;
            }
        }
    }

    //cek login email dan password
    public function login_pasien($username, $password)
    {
        if ($username && $password) {
            $sql = "SELECT * FROM pasien WHERE username = ?";
            $query = $this->db->query($sql, array($username));

            if ($query->num_rows() == 1) {
                $result = $query->row_array();
                return $result;
            } else {
                return false;
            }
        }
    }
}
