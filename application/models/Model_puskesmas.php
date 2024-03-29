<?php

class Model_puskesmas extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getPuskesmasData($id = null)
    {
        if ($id) {
            $sql = "SELECT * FROM puskesmas WHERE id = ?";
            $query = $this->db->query($sql, array($id));
            return $query->row_array();
        }

        $sql = "SELECT * FROM puskesmas ORDER BY id DESC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function create($data = array())
    {
        if ($data) {
            $create = $this->db->insert('puskesmas', $data);
            return ($create == true) ? true : false;
        }
    }

    public function update($id = null, $data = array())
    {
        $this->db->where('id', $id);
        $update = $this->db->update('puskesmas', $data);

        return ($update == true) ? true : false;
    }

    public function remove($id = null)
    {
        if ($id) {
            $this->db->where('id', $id);
            $delete = $this->db->delete('puskesmas');
            return ($delete == true) ? true : false;
        }
    }
}
