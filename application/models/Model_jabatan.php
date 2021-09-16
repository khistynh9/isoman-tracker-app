<?php

class Model_jabatan extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getJabatanData($groupId = null)
    {
        if ($groupId) {
            $sql = "SELECT * FROM level WHERE id = ?";
            $query = $this->db->query($sql, array($groupId));
            return $query->row_array();
        }

        $sql = "SELECT * FROM level WHERE id != ? ORDER BY id DESC";
        $query = $this->db->query($sql, array(1));
        return $query->result_array();
    }

    public function create($data = '')
    {
        $create = $this->db->insert('level', $data);
        return ($create == true) ? true : false;
    }

    public function edit($data, $id)
    {
        $this->db->where('id', $id);
        $update = $this->db->update('level', $data);
        return ($update == true) ? true : false;
    }

    public function delete($id = null)
    {
        if ($id) {
            $this->db->where('id', $id);
            $delete = $this->db->delete('level');
            return ($delete == true) ? true : false;
        }
    }

    public function existInUserGroup($id)
    {
        $sql = "SELECT * FROM users_group WHERE level_id = ?";
        $query = $this->db->query($sql, array($id));
        return ($query->num_rows() == 1) ? true : false;
    }

    public function getUserJabatanByUserId($user_id)
    {
        $sql = "SELECT * FROM users_group 
		INNER JOIN level ON level.id = users_group.level_id 
		WHERE users_group.users_id = ?";
        $query = $this->db->query($sql, array($user_id));
        $result = $query->row_array();

        return $result;
    }
}
